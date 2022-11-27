<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Registrar Merma
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva merma
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div>
                    <x-jet-label value="Selecciona un tipo de componente"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="decrease_type_id">
                        <option value="" disabled >Seleciona un tipo de componente</option>
                        @foreach ($decreaseTypes as $decreaseType)

                       <option value="{{ $decreaseType->id }}" selected>{{ $decreaseType->name }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="decrease_type_id"/>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                <div class="">
                    <x-jet-label value="Código del componente"/>
                    <x-jet-input
                        wire:model.defer='code'
                        type="text"
                        class="w-full"/>
                    <x-jet-input-error for="code"/>
                </div>
                <div class="">
                    <x-jet-label value="Cantidad merma"/>
                    <x-jet-input
                        wire:model.defer='amount'
                        type="number"
                        class="w-full"/>
                    <x-jet-input-error for="amount"/>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class="">
                    <x-jet-label value="Observación"/>
                    <x-jet-input
                        wire:model.defer='observation'
                        type="text"
                        class="w-full"/>
                    <x-jet-input-error for="observation"/>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled"  wire:target="save" class="disabled:opacity-25">
                    Registrar merma
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>


</div>
