<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de mecánicos
            </h2>

        </div>
    </x-slot>
  {{-- Formulacio crear --}}
  <x-jet-form-section submit="save" class="mb-6">
    <x-slot name="title">
        Agregar nuevo mecánico
    </x-slot>

    <x-slot name="description">
        En esta sección podrás agregar un nuevo mecánico.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">

            <x-jet-label>Nombre</x-jet-label>
            <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
            <x-jet-input-error for="createForm.name" />
        </div>
        <div class="col-span-6 sm:col-span-4">

            <x-jet-label>E-mail</x-jet-label>
            <x-jet-input type="text" wire:model="createForm.email" class="w-full" />
            <x-jet-input-error for="createForm.email" />
        </div>
        <div class="col-span-6 sm:col-span-4">

            <x-jet-label>Abreviación</x-jet-label>
            <x-jet-input type="text" wire:model="createForm.abbreviated" class="w-full" />
            <x-jet-input-error for="createForm.abbreviated" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            Agregar
        </x-jet-button>
    </x-slot>

</x-jet-form-section>

    {{-- Lista de Estado de cambios --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de mecánicos.
        </x-slot>

        <x-slot name="description">
            Aquí encontrarás todos los mecánicos.
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 px-6 w-full">
                            Nombre
                        </th>
                        <th class="py-2 px-4 ">
                            E-mail
                        </th>
                        <th class="py-2 px-6">
                            Abrev.
                        </th>
                        <th class="py-2 px-6">
                            Estado
                        </th>
                        <th class="py-2 w-full">
                            Acción
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($mechanics as $mechanic)
                    <tr>
                        <td class="py-2">
                            <span class="uppercase">
                                {{ $mechanic->name }}
                            </span>
                        </td>
                        <td class="py-2">
                            <span class="uppercase">
                                {{ $mechanic->email }}
                            </span>
                        </td>
                        <td class="py-2 text-center">
                            <span class="uppercase">
                                {{ $mechanic->abbreviated }}
                            </span>
                        </td>
                        <td class="py-2">
                            <div class="text-center" >
                                @if ($mechanic->status == "1")
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Activo
                                </span>
                                @else
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                    Inactivo
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="py-2">
                            <div class="flex divide-x divide-gray-300 font-semibold ">
                                <a class="pr-2  hover:text-blue-600 cursor-pointer"
                                    wire:click="edit('{{$mechanic->id}}')">Editar</a>
                                <a class="pl-2 hover:text-red-600 cursor-pointer"
                                    wire:click="$emit('deletemechanic', '{{$mechanic->id }}')">Eliminar</a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-action-section>
    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar estado de cambios.
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />
                <x-jet-input-error for="editForm.name" />
            </div>
            <div>
                <x-jet-label>
                    E-mail
                </x-jet-label>
                <x-jet-input wire:model="editForm.email" type="text" class="w-full mt-1" />
                <x-jet-input-error for="editForm.email" />
            </div>
            <div>
                <x-jet-label>
                    Abreviación
                </x-jet-label>
                <x-jet-input wire:model="editForm.abbreviated" type="text" class="mt-1" />
                <x-jet-input-error for="editForm.abbreviated" />
            </div>
            <div>
                <x-jet-label>
                    Estado
                </x-jet-label>
                <x-jet-input wire:model="editForm.status" type="checkbox" class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="editForm.status" />
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
    <script>
        livewire.on('deletemechanic', mechanicId => {
                Swal.fire({
                    title: '¿Eliminaras la información?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('delete', mechanicId);

                        Swal.fire(
                    '¡Eliminado!',
                    'Su archivo ha sido eliminado.',
                    'success'
                        )
                    }
                })
            })

    </script>
    @endpush

</div>
