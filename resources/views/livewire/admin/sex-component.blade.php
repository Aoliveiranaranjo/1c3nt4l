<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de Salas
            </h2>

        </div>
    </x-slot>

    {{-- Formulacio crear --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar tipo de sexo
        </x-slot>

        <x-slot name="description">
            En esta sección podrás agregar nuevos tipos de sexos
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">

                <x-jet-label>Nombre</x-jet-label>
                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>
        {{-- Lista de sexo --}}
        <x-jet-action-section>
            <x-slot name="title">
                Lista de Sexos
            </x-slot>

            <x-slot name="description">
                Aquí encontrarás listado de sexo.
            </x-slot>

            <x-slot name="content">
                <table class="text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="py-2 w-full">
                                Nombre
                            </th>
                            <th class="py-2 px-6">
                                Estado
                            </th>
                            <th class="py-2">
                                Acción
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-300">
                        @foreach ($sexs as $sex)
                        <tr>
                            <td class="py-2">
                                <span class="uppercase">
                                    {{ $sex->name }}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="text-center" >
                                    @if ($sex->status == "1")
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
                                        wire:click="edit('{{$sex->id}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deletesex', '{{$sex->id }}')">Eliminar</a>

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
            Editar sexo
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
        livewire.on('deletesex', sexId => {
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

                        livewire.emit('delete', sexId);

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
