<?php

namespace App\Exports;

use App\Models\Bitacora;
use App\Models\Planta;
use App\Models\Solicitud;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\DB;

class BitacoraExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $index = 0;
    private $tipo = null;
    private $planta = null;
    private $fecha = null;
    private $plantaId = null;

    public function __construct($tipo, $plantaId)
    {
        $this->tipo = $tipo;
        $this->plantaId = $plantaId;
    }

    public function collection()
    {
        $solicitudes = [];

        if ($this->tipo === 'D') {
            $solicitudes = Solicitud::with('bitacora')->with('reparacion')->where(DB::raw("date(solicitudes.created_at)"), '=', DB::raw("curdate()"))->get();
            $this->fecha = Carbon::now()->format('d-m-Y');
       } elseif ($this->tipo === 'S') {
            $solicitudes = Solicitud::with('bitacora')->with('reparacion')->where(DB::raw("yearweek(solicitudes.created_at)"), '=', DB::raw("yearweek(now())"))->get();
            $this->fecha = Carbon::now()->subDays(Carbon::now()->dayOfWeek)->format('d-m-y'). ' al '.Carbon::now()->subDays(Carbon::now()->dayOfWeek)->addDays(6)->format('d-m-y');
       } else if ($this->tipo === 'M') {
            $solicitudes = Solicitud::with('bitacora')->with('reparacion')->where(DB::raw("month(solicitudes.created_at)"), '=', DB::raw("month(now())"))->get();
            $this->fecha = Carbon::now()->monthName;
       }

        // $this->index = sizeof($solicitudes);


        $aux = [];

        foreach ($solicitudes as $solicitud) {
            if ($solicitud->bitacora->planta_id == $this->plantaId) {

                $mecanico = User::find($solicitud->bitacora->mecanico_id);
                $this->planta = Planta::find($solicitud->bitacora->planta_id)->nombre;
                array_push($aux, [
                    'Prioridad' => $solicitud->prioridad ?? '',
                    'Operación' => $solicitud->operacion ?? '',
                    'No. Maquina' => $solicitud->maquina_id ?? '',
                    'Módulo' => $solicitud->modulo ?? '',
                    'Código del problema' => $solicitud->problema_id ?? '',
                    'LLamó al mecanico' => $solicitud->created_at ?? '',
                    'Llegó el mecánico' => $solicitud->llegada_mecanico ?? '',
                    'Quedó lista' => $solicitud->reparacion->quedo_lista ?? '',
                    'Tipo de reparación' => $solicitud->reparacion->tipo_reparacion ?? '',
                    'Nombre del mecanico' => $mecanico->nombre . ' ' . $mecanico->apellidos ?? ''
                ]);
                $this->index ++;
            }
        }

        return collect($aux);
    }

    public function headings(): array
    {
        return [
            ['RUTINA DIARIA DE MANTENIMIENTO CORRECTIVO'],
            [],
            [],
            [],
            [
                'Prioridad',
                'Operación',
                'No. Maquina',
                'Módulo',
                'Código del problema',
                'LLamó al mecanico',
                'Llegó el mecánico',
                'Quedó lista',
                'Tipo de reparación',
                'Nombre del mecánico'
            ]
        ];
    }

    public function columnFormats(): array
    {
        return ['H' => NumberFormat::FORMAT_DATE_DDMMYYYY];
    }

    public function styles($sheet)
    {
        // combinar columnas
        $sheet->mergeCells('A1:J1');
        $sheet->mergeCells('C2:E2');
        $sheet->mergeCells('H2:J2');
        $sheet->mergeCells('F4:H4');
        // Agregar campos
        $sheet->setCellValue('B2', 'Planta:');
        $sheet->setCellValue('C2', $this->planta);
        $sheet->setCellValue('G2', 'Fecha:');
        $sheet->setCellValue('H2', $this->fecha);
        $sheet->setCellValue('F4', 'HORAS');
        $sheet->getRowDimension(4)->setRowHeight(30);
        $sheet->getRowDimension(5)->setRowHeight(30);


        // alineación de texto
        $textCenter = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );

        $textRight = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
            )
        );

        $textVerticalCenter = array(
            'alignment' => array(
                'vertical' => Alignment::VERTICAL_CENTER,
            )
        );

        $allBorders = [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ];

        $borderButtom = [
            'bottom' => [
                'borderStyle' => Border::BORDER_THIN,
            ]
        ];

        $sheet->getStyle("A1:C1")->applyFromArray($textCenter);
        $sheet->getStyle("F4:H4")->applyFromArray($textCenter);
        $sheet->getStyle("B2")->applyFromArray($textRight);
        $sheet->getStyle("G2")->applyFromArray($textRight);
        $sheet->getStyle("A4:J4")->applyFromArray($textVerticalCenter);
        $sheet->getStyle("A5:J5")->applyFromArray($textVerticalCenter);

        $textColumn = [
            'name'      =>  'Calibri',
            'size'      =>  12,
            'bold'      =>  true,
        ];

        // estilos
        return [
            1    => ['font' => ['bold' => true, 'size' => 14]],
            2    => ['font' => ['bold' => true, 'size' => 12]],
            'A:J' => [
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'size' => [
                    'height' => 50
                ]
            ],
            'A1'    => ['font' => ['bold' => true]],
            4    => ['font' => ['bold' => true, 'size' => 12]],
            'A5:J5'    => [
                'font' => $textColumn,
                'borders' => $allBorders,

            ],
            'F4:H4' => [
                'borders' => $allBorders,
                'font' => $textColumn,
            ],
            'H2:J2' => [
                'borders' => $borderButtom,
            ],
            'C2:E2' => [
                'borders' => $borderButtom,
            ],
            'A6:A' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'B6:B' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'C6:C' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'D6:D' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'E6:E' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'F6:F' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'G6:G' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'H6:H' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'I6:I' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
            'J6:J' . ($this->index + 6 - 1) => [ 'borders' => $allBorders],
        ];
    }
}
