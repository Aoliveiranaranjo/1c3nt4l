<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Registrar Producción
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva producción
        </x-slot>
        <x-slot name="content">

            <div class="bg-white shadow-xl rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Lote de PT" />
                        <x-jet-input wire:model.defer='lote_pt' type="text" class="w-full" />
                        <x-jet-input-error for="lote_pt" />

                    </div>
                    <div>
                        <x-jet-label value="Código de SP o formula VRAC" />
                        <x-jet-input wire:model.defer='sp' type="text" class="w-full" />
                        <x-jet-input-error for="sp" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Lote de contenedor" />
                        <x-jet-input wire:model.defer='lote_conte' type="text" class="w-full" />
                        <x-jet-input-error for="lote_conte" />
                    </div>
                    <div>
                        <x-jet-label value="Cuba" />
                        <x-jet-input wire:model.defer='cuba' type="text" class="w-full" />
                        <x-jet-input-error for="cuba" />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Nº Palet" />
                        <x-jet-input wire:model.defer='palet' type="number" class="w-full" />
                        <x-jet-input-error for="palet" />
                    </div>
                    <div>
                        <x-jet-label value="Cajas" />
                        <x-jet-input wire:model.defer='box' type="number" class="w-full" />
                        <x-jet-input-error for="box" />
                    </div>
                    <div>
                        <x-jet-label value="Unidades" />
                        <x-jet-input wire:model.defer='unid' type="number" class="w-full" />
                        <x-jet-input-error for="unid" />
                    </div>
                </div>


        </x-slot>
        <x-slot name="footer">
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">
                    Registrar producción
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>
    </div>

</div>
