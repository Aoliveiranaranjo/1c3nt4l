<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Crear inicio de Responsable de Maquína.
        O/{{ $production->order->orden }}</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">


        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label
                    value="Comprobación de preparación de OF, Registro de limpieza, Especificación de Producto e Imputación" />
                <x-jet-input wire:model='item1' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="item1" />
            </div>
            <div class="">
                <x-jet-label value="Verificación despeje de línea del producto anterior" />
                <x-jet-input wire:model='item2' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="item2" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Verificación orden y limpieza en máquina y sala" />
                <x-jet-input wire:model='item3' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="item3" />
            </div>
            <div class="">
                <x-jet-label value="Informar  y aplicar la seguridad laboral en la producción al grupo de trabajo" />
                <x-jet-input wire:model='item4' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="item4" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Verificar protocolo de trabajo" />
                <x-jet-input wire:model='item5' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="item5" />
            </div>
            <div class="">
                <x-jet-label value="Confirmar el inicio de la producción" />
                <x-jet-input wire:model='status' type="checkbox" class=" border-blue-500" />
                <x-jet-input-error for="status" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Observación de inicio" />
                <x-jet-input wire:model='observation' type="text" class="w-full" />
                <x-jet-input-error for="observation" />
            </div>
        </div>



        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando inicio de máquina por Responsable
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Crear inicio
            </x-jet-button>

        </div>

    </div>
</div>
