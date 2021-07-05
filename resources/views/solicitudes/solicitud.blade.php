<x-app-layout>
    <x-slot name="header">
        Solicitud
    </x-slot>
    <div class="container">
        <form action="" method="POST">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="mt-3">
                        <label>Prioridad</label>
                        <input type="text" class="form-control" name="prioridad">
                    </div>
                    <div class="mt-3">
                        <label>Problema</label>
                        <select name="problema_id" class="form-control" >
                            <option value="">--Seleccione el problema--</option>
                            @foreach ($problemas as $problema)
                                <option value="{{ $problema->id }}">{{ $problema->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Módulo</label>
                        <input type="text" class="form-control" name="modulo">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-3">
                        <label>Supervisor</label>
                        <select name="supervisor_id" class="form-control" >
                            <option value="">--Seleccione el supervisor--</option>
                            @foreach ($supervisores as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->nombre }} {{ $supervisor->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Maquina</label>
                        <select name="maquina_id" class="form-control" >
                            <option value="">--Seleccione la máquina--</option>
                            @foreach ($maquinas as $maquina)
                                <option value="{{ $maquina->id }}">{{ $maquina->marca }} - {{ $maquina->modelo }} - {{ $maquina->operador }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Bitácora</label>
                        <select name="bitacora_id" class="form-control" >
                            <option value="">--Seleccione la bitácora--</option>
                            @foreach ($bitacoras as $bitacora)
                                <option value="{{ $bitacora->id }}">{{ $bitacora->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
</x-app-layout>
