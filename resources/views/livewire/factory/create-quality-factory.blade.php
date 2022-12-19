<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Crear inicio de Calidad. O/{{ $production->order->orden }}</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">


        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Comprobar especificación del producto" />
                <x-jet-input wire:model.defer='item1' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item1" />
            </div>
            <div>
                <x-jet-label value="Aspecto, color y olor según muestra tipo" />
                <x-jet-input wire:model.defer='item2' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item2" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Control funcional" />
                <x-jet-input wire:model.defer='item3' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item3" />
            </div>
            <div>
                <x-jet-label value="Prueba de estanqueidad" />
                <x-jet-input wire:model.defer='item4' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item4" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Aspecto: burbuja de expansión, ausencia de partículas, presencia tubo de inmersión" />
                <x-jet-input wire:model.defer='item5' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item5" />
            </div>
            <div class="">
                <x-jet-label value="Limpieza de línea de montaje" />
                <x-jet-input wire:model.defer='item6' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item6" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Comprobación de materiales" />
                <x-jet-input wire:model.defer='item7' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item7" />
            </div>
            <div class="">
                <x-jet-label value="Tolva y contenedores cerrados" />
                <x-jet-input wire:model.defer='item8' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item8" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Seguridad de la máquina y personal" />
                <x-jet-input wire:model.defer='item9' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item9" />
            </div>
            <div class="">
                <x-jet-label value="Instrumentos de control calibrados" />
                <x-jet-input wire:model.defer='item10' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item10" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Comprobar temperatura del bulk" />
                <x-jet-input wire:model.defer='item11' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item11" />
            </div>
            <div class="">
                <x-jet-label value="Control de paletización" />
                <x-jet-input wire:model.defer='item12' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item12" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Control de etiquetas de cajas" />
                <x-jet-input wire:model.defer='item13' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item13" />
            </div>
            <div class="">
                <x-jet-label value="Anotar lote preparado" />
                <x-jet-input wire:model.defer='lote' type="text" class="w-full" />
                <x-jet-input-error for="lote" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Muestra tipo" />
                <x-jet-input wire:model.defer='item15' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="item15" />
            </div>
            <div class="">
                <x-jet-label value="Muestra fecha" />
                <x-jet-input wire:model.defer='muestraDate' type="date" class="w-full" />
                <x-jet-input-error for="muestraDate" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div class="">
                <x-jet-label value="Observación de inicio" />
                <x-jet-input wire:model.defer='observation' type="text" class="w-full" />
                <x-jet-input-error for="observation" />
            </div>
            <div class="">
                <x-jet-label value="Confirmar el inico de calidad" />
                <x-jet-input wire:model.defer='status' type="checkbox" class="border-blue-500" />
                <x-jet-input-error for="status" />
            </div>

        </div>


        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando inicio de máquina por Calidad
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Crear inicio
            </x-jet-button>

        </div>

    </div>


</div>
