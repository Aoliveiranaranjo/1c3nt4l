<div>
    <h2 class="text-3xl text-center font-semibold mb-8">Crear un cambio relacionado a esta producción</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- pry --}}
            <div class="text-center">
                <x-jet-label value="Prioridad del cambio" />
                <x-jet-input wire:model.defer='pry' type="number" class="" />
                <x-jet-input-error for="pry" />
            </div>
        </div>


        <div class="grid grid-cols-2 gap-6  mb-4">
            <div>
                <x-jet-label value="Selecciona un estado del cambio" />
                <select class="w-full" wire:model.defer="statechange_id">
                    <option value="" disabled>Seleciona un estado del cambio</option>
                    <option value="2" selected>Nuevo </option>
                </select>
                <x-jet-input-error for="statechange_id" />
            </div>

            <div>
                <x-jet-label value="Selecciona un tipo de cambio" />
                <select class="w-full" wire:model.defer="typechange_id">
                    <option value="" disabled selected>Seleciona un tipo de cambio</option>
                    @foreach ($typechanges as $typechange)
                        <option value="{{ $typechange->id }}" selected>{{ $typechange->name }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="typechange_id" />
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- pry --}}
            <div class="">
                <x-jet-label value="Descripción del cambio" />
                <x-jet-input wire:model.defer='description' type="text" class="w-full" />
                <x-jet-input-error for="description" />
            </div>
        </div>


        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando Cambio
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Crear Cambio
            </x-jet-button>

        </div>

    </div>

</div>
