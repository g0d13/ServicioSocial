<x-app-layout>
    <x-slot name="header">
        Bitacora
    </x-slot>
    <div class="container">
        <form action="">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="mt-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mt-3">
                        <label>Detalles</label>
                        <textarea name="detalles" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mt-3">
                        <label>Mecánico</label>
                        <select name="mecanico_id" class="form-control">
                            <option value="">--Seleccione el mecánico--</option>
                            @foreach ($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}">{{ $mecanico->nombre }} {{ $mecanico->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
