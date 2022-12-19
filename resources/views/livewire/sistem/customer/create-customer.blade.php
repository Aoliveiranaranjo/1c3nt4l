<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear un cliente</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código de cliente"/>
                <x-jet-input
                    wire:model.defer='Cod'
                    type="number"
                    class="w-full"/>
                <x-jet-input-error for="Cod"/>

            </div>
            {{-- nif --}}
            <div >
                <x-jet-label value="NIF"/>
                <x-jet-input
                    wire:model.defer='nif'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="nif"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="Nombre completo"/>
                <x-jet-input
                    wire:model.defer='name'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="name"/>
            </div>
            {{-- abreviación cliente --}}
            <div>
                <x-jet-label value="Abreviación nombre"/>
                <x-jet-input
                    wire:model.defer='abbreviated'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="abbreviated"/>
            </div>
        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Cliente creado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                    Crear cliente
            </x-jet-button>

        </div>

    </div>
</div>
