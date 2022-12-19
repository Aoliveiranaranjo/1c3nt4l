<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear un usuario</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- nombre --}}
            <div>
                <x-jet-label value="Nombre"/>
                <x-jet-input
                    wire:model='name'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="name"/>

            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- email --}}
            <div >
                <x-jet-label value="E-mail"/>
                <x-jet-input
                    wire:model='email'
                    type="email"
                    class="w-full"/>
                    <x-jet-input-error for="email"/>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- contraseña --}}
            <div>
                <x-jet-label value="Contraseña"/>
                <x-jet-input
                    wire:model='password'
                    type="password"
                    class="w-full"/>
                <x-jet-input-error for="password"/>
            </div>

        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Usuario creado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                    Crear usuario
            </x-jet-button>

        </div>

    </div>

</div>
