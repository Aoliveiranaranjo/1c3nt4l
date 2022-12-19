<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Alta trabajador
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar alta de trabajador
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-1 gap-6  mb-4">
                <div>
                    <x-jet-label value="Selecciona un empleado"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="employee_id">
                        <option value="" disabled >Seleciona un empleado</option>
                        @foreach ($employees as $item)

                       <option value="{{ $item->id }}" selected>{{ $item->name }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="employee_id"/>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled"  wire:target="save" class="disabled:opacity-25">
                    Registrar alta
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>


</div>
