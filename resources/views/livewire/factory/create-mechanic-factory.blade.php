<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Crear inicio de Mecánico. O/{{ $production->order->orden }}</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Registro de limpieza:" />
                <x-jet-input wire:model.defer='item1' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item1" />
            </div>
            <div class="">
                <x-jet-label value="Verificación tolva y contenedor cerrado:" />
                <x-jet-input wire:model.defer='item2' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item2" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Producto terminado cumple con la especificación:" />
                <x-jet-input wire:model.defer='item3' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item3" />
            </div>
            <div class="">
                <x-jet-label value="Lote correcto:" />
                <x-jet-input wire:model.defer='item4' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item4" />
            </div>

        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Anotar lote:" />
                <x-jet-input wire:model.defer='lote' type="text" class="w-full" />
                <x-jet-input-error for="lote" />
            </div>
            <div class="">
                <x-jet-label value="Loteado o marcaje correcto. Color y forma:" />
                <x-jet-input wire:model.defer='item5' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item5" />
            </div>

        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Comprobación seguridad máquina:" />
                <x-jet-input wire:model.defer='item6' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item6" />
            </div>
            <div class="">
                <x-jet-label value="Comprobación protecciones de máquina:" />
                <x-jet-input wire:model.defer='item7' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item7" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Verificación de que no hay piezas sueltas o herramientas en el interior de la máquina:" />
                <x-jet-input wire:model.defer='item8' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="item8" />
            </div>
            <div class="">
                <x-jet-label value="Velocidad de la máquina o cadencia:" />
                <x-jet-input wire:model.defer='cadence' type="number" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="cadence" />
            </div>

        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Observación de inicio" />
                <x-jet-input wire:model.defer='observation' type="text" class="w-full" />
                <x-jet-input-error for="observation" />
            </div>
        </div>

        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando inicio de máquina
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Crear inicio
            </x-jet-button>

        </div>

    </div>


</div>
