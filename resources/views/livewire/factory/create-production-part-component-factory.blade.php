<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Registrar Producción
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva producción
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Ingrese la cantidad producida:" />
                <x-jet-input class="w-full" type="number" wire:model.defer="amount" />

                <x-jet-input-error for="amount" />

            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled"  wire:target="save" class="disabled:opacity-25">
                    Registrar producción
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>


</div>
