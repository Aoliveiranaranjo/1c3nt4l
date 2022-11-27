<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Introduzca la información que desea editar la produccion</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div>
                <x-jet-label value="Lote de PT" />
                <x-jet-input wire:model.defer='qualityProduction.lote_pt' type="text" class="w-full" />
                <x-jet-input-error for="qualityProduction.lote_pt" />

            </div>
            <div>
                <x-jet-label value="Código de SP o formula VRAC" />
                <x-jet-input wire:model.defer='qualityProduction.sp' type="text" class="w-full" />
                <x-jet-input-error for="qualityProduction.sp" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div>
                <x-jet-label value="Lote de contenedor" />
                <x-jet-input wire:model.defer='qualityProduction.lote_conte' type="text" class="w-full" />
                <x-jet-input-error for="qualityProduction.lote_conte" />
            </div>
            <div>
                <x-jet-label value="Cuba" />
                <x-jet-input wire:model.defer='qualityProduction.cuba' type="text" class="w-full" />
                <x-jet-input-error for="qualityProduction.cuba" />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6  mb-4">
            <div>
                <x-jet-label value="Nº Palet" />
                <x-jet-input wire:model.defer='qualityProduction.palet' type="number" class="w-full" />
                <x-jet-input-error for="qualityProduction.palet" />
            </div>
            <div>
                <x-jet-label value="Cajas" />
                <x-jet-input wire:model.defer='qualityProduction.box' type="number" class="w-full" />
                <x-jet-input-error for="qualityProduction.box" />
            </div>
            <div>
                <x-jet-label value="Unidades" />
                <x-jet-input wire:model.defer='qualityProduction.unid' type="number" class="w-full" />
                <x-jet-input-error for="qualityProduction.unid" />
            </div>
        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Actualizar producción
            </x-jet-button>

        </div>
    </div>
</div>
