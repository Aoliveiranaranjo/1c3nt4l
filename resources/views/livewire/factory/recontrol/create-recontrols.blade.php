<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear un cliente</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            <div>
                <x-jet-label value="Selecciona un cliente" />
                <select wire:model.defer="client_id"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="" disabled>Selecciona un cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" selected>
                            {{ $client->name }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="client_id" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">

            <div>
                <x-jet-label value="Código Art." />
                <x-jet-input wire:model.defer='codCentral' type="text" class="w-full" />
                <x-jet-input-error for="codCentral" />

            </div>

            <div>
                <x-jet-label value="Referencia del cliente" />
                <x-jet-input wire:model.defer='reference' type="text" class="w-full" />
                <x-jet-input-error for="reference" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div>
                <x-jet-label value="Nombre artículo" />
                <x-jet-input wire:model.defer='name' type="text" class="w-full" />
                <x-jet-input-error for="name" />
            </div>

            <div>
                <x-jet-label value="Lote" />
                <x-jet-input wire:model.defer='lote' type="text" class="w-full" />
                <x-jet-input-error for="lote" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">

            <div>
                <x-jet-label value="Cuba" />
                <x-jet-input wire:model.defer='cuba' type="text" class="w-full" />
                <x-jet-input-error for="cuba" />

            </div>

            <div>
                <x-jet-label value="Fecha de entrada" />
                <x-jet-input wire:model.defer='dateIn' type="date" class="w-full" />
                <x-jet-input-error for="dateIn" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            <div>
                <x-jet-label value="Fecha de expiración" />
                <x-jet-input wire:model.defer='expirationDate' type="date" class="w-full" />
                <x-jet-input-error for="expirationDate" />
            </div>

            <div>
                <x-jet-label value="Fecha de envío a recontrol" />
                <x-jet-input wire:model.defer='datedelivery' type="date" class="w-full" />
                <x-jet-input-error for="datedelivery" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            <div class="text-center">
                <x-jet-label value="Nueva expiración" />
                <x-jet-input wire:model.defer='expirationNew' type="date" class="w-44" />
                <x-jet-input-error for="expirationNew" />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6  mb-4">
            <div class="text-center">
                <x-jet-label value="Micro" />
                <x-jet-input wire:model.defer='micro' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="micro" />
            </div>
            <div class="text-center">
                <x-jet-label value="Físico" />
                <x-jet-input wire:model.defer='fisico' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="fisico" />
            </div>
            <div class="text-center">
                <x-jet-label value="Conservante" />
                <x-jet-input wire:model.defer='conservantes' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="conservantes" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            <div>
                <x-jet-label value="Observación" />
                <x-jet-input wire:model.defer='observation' type="text" class="w-full" />
                <x-jet-input-error for="observation" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            <div>
                <x-jet-label value="Selecciona un estado del recontrol" />
                <select wire:model.defer="status"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="" disabled>Selecciona un estado</option>

                        <option value="SIN RESPUESTA" selected>SIN RESPUESTA</option>
                        <option value="OKEY" selected>OKEY</option>
                        <option value="NOK" selected>NOK</option>

                </select>
                <x-jet-input-error for="status" />
            </div>
        </div>



        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creado recontrol
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                Crear recontrol
            </x-jet-button>

        </div>

    </div>
</div>
