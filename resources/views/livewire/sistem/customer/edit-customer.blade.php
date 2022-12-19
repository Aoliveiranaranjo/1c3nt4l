<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Introduzca la información que desea editar del cliente</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código de cliente"/>
                <x-jet-input
                    wire:model.defer='customer.Cod'
                    type="number"
                    class="w-full"/>
                <x-jet-input-error for="customer.Cod"/>

            </div>
            {{-- nif --}}
            <div>
                <x-jet-label value="NIF"/>
                <x-jet-input
                    wire:model.defer='customer.nif'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="customer.nif"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="Nombre completo"/>
                <x-jet-input
                    wire:model.defer='customer.name'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="customer.name"/>
            </div>
            {{-- abreviación cliente --}}
            <div>
                <x-jet-label value="Abreviación Nombre"/>
                <x-jet-input
                    wire:model.defer='customer.abbreviated'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="customer.abbreviated"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- status --}}
            <div>
                <x-jet-label value="Activo"/>
                <x-jet-input
                    wire:model.defer='customer.status'
                    type="checkbox"
                    class="text-center mt-1 border-blue-500"/>
                <x-jet-input-error for="customer.status"/>
            </div>

        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save">
                    Actualizar cliente
            </x-jet-button>

        </div>
    </div>
</div>
