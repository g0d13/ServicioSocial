<div class="shadow bg-white p-3 rounded-3 overlay-scrollbar">
    <p class="text-muted mb-3 fs-4 fw-bold">{{ $title }}</p>
    <a href="#!" class="btn btn-sm btn-primary">Ver todos</a>
    <table class="table table table-borderless align-middle ">

        <thead class="border-top border-bottom" style="background: rgb(245, 245, 245)!important;">
        @foreach ($headers as $h)
            <th class="text-uppercase text-muted " style="font-size: 12px;">{{ $h }}</th>
        @endforeach
        </thead>
        <tbody>
        @foreach ($dataArray as $d)
            @foreach ($headers as $h)
                <td class="border-bottom  {{ $h == 'Id' ? 'text-primary' : 'text-muted' }}" style="font-size: 14px;">
                    {{ $d[$h] }}</td>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
