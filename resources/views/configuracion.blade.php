<x-app-layout>
    <x-slot name="header">
        Configuracion
    </x-slot>
    <div class="card p-4">
        <form>
            <label for="usb">Selecciona puerto USB</label>
            <select id="usb" class="form-select form-select" aria-label=".form-select-sm example">
                <option selected>Seleccionar</option>
                <option value="1">COM1</option>
                <option value="2">COM2</option>
                <option value="3">COM3</option>
            </select>
        </form>
    </div>
</x-app-layout>
