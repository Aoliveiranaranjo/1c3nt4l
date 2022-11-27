<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de usuario
            </h2>

            <a class="ml-auto" href="{{ route('admin.users.create') }}">
                <x-button-enlace >
                    Agregar usuario
                </x-button-enlace>
            </a>
        </div>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table-responsive>
            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar" />

            </div>

            @if ($users->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('id')">
                                Id

                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('name')">
                                Nombre

                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('email')">
                                Email

                                {{-- Sort --}}
                                @if ($sort == 'email')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th
                                class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500  bg-gray-50">
                                Rol

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('isActive')">
                                Estado

                                {{-- Sort --}}
                                @if ($sort == 'isActive')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->email }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">

                                        @if (count($user->roles))
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        @else
                                            No posee
                                        @endif


                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($user->banned_at ==  false)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Activo
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Sin acceso
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('admin.users.edit', $user) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>

                                    <x-jet-danger-button wire:click="$emit('deliteuser', {{ $user }} )">
                                        <i class="fas fa-trash"></i>
                                    </x-jet-danger-button>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More rows... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay registros coincidentes
                </div>
            @endif

            @if ($users->haspages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliteuser', user => {
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

                        livewire.emit('delete', user);

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
