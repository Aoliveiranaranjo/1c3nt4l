<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Introduzca la información que desea editar del usuario</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- nombre --}}
            <div>
                <x-jet-label value="nombre" />
                <x-jet-input wire:model='user.name' type="text" class="w-full" />
                <x-jet-input-error for="user.name" />

            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- status --}}
            <div>
                <x-jet-label value="Revocar Usuario" />
                <x-jet-input wire:model='user.banned_at' type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="user.banned_at" />
            </div>
            <div>
                <h3 class="text-2xl text-center text-red-700 font-semibold mb-8"> Rol asignado</h3>
                @foreach ($user->roles as $item)
                    <div class="text-2xl text-center text-red-700 font-semibold mb-8">
                        {{ $item->name }}
                    </div>
                @endforeach
            </div>

        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Actualizar usuario
            </x-jet-button>

        </div>
    </div>

    @livewire('admin.user.assign-role-user', ['user' => $user], key('assign-role-user-' . $user->id))


</div>
