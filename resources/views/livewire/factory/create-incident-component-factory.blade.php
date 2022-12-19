<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Registrar incidencia
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva incidencia
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div>
                    <x-jet-label value="Selecciona un tipo de incidencia"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="incident_type_id">
                        <option value="" disabled >Seleciona un tipo de incidencia</option>
                        @foreach ($incidentTypes as $incidentType)

                       <option value="{{ $incidentType->id }}" selected>{{ $incidentType->name }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="incident_type_id"/>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class="">
                    <x-jet-label value="Descripción de la incidencia"/>
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
                    Registrar incidencia
                </x-jet-danger-button>.
            </div>

        </x-slot>
    </x-jet-dialog-modal>


</div>
