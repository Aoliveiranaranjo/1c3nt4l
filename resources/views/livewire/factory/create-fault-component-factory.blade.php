<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Registrar Avería
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva Avería
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div>
                    <x-jet-label value="Selecciona un tipo de avería"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="fault_type_id">
                        <option value="" disabled >Seleciona un tipo de avería</option>
                        @foreach ($faultTypes as $faultType)

                       <option value="{{ $faultType->id }}" selected>{{ $faultType->name }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="fault_type_id"/>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class="">
                    <x-jet-label value="Describe la avería"/>
                    <x-jet-input
                        wire:model.defer='description'
                        type="text"
                        class="w-full"/>
                    <x-jet-input-error for="description"/>
                </div>

            </div>


        </x-slot>
        <x-slot name="footer">
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled"  wire:target="save" class="disabled:opacity-25">
                    Registrar avería
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>


</div>
