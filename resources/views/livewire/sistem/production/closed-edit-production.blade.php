<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Terminar esta producción</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            <h3 class="text-2x1">Para declarar terminada la producción marque la casilla siguiente:</h3>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">


            <div class="text-center">
                <x-jet-label value="Terminar producción" />
                <x-jet-input wire:model='production.dateClosed' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="production.dateClosed" />
            </div>

        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            <h3 class="text-2x1">Para declarar terminada tambien la ORDEN  marque la casilla siguiente:</h3>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">


            <div class="text-center">
                <x-jet-label value="Terminar Orden" />
                <x-jet-input wire:model='order.dateEnd' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="order.dateEnd" />
            </div>

        </div>



        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Terminando producción
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Terminar Porducción
            </x-jet-button>

        </div>

    </div>

</div>
