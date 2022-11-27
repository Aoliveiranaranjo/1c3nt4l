<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de clientes
            </h2>

            <a class="ml-auto" href="{{ route('sistem.customers.create') }}">
                <x-button-enlace>
                    Agregar cliente
                </x-button-enlace>
            </a>
        </div>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table-responsive>
            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar" />

            </div>

            @if ($customers->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('Cod')">
                                Cod

                                @if ($sort == 'Cod')
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
                                wire:click="order('nif')">
                                Nif

                                {{-- Sort --}}
                                @if ($sort == 'nif')
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
                                wire:click="order('status')">
                                Edo.

                                {{-- Sort --}}
                                @if ($sort == 'status')
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
                                wire:click="order('abbreviated')">
                                Abreviación

                                {{-- Sort --}}
                                @if ($sort == 'abbreviated')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            @can('admin.view')
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                                </th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($customers as $customer)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $customer->Cod }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $customer->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $customer->nif }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($customer->status == '1')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Activo
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Inactivo
                                            </span>
                                        @endif


                                    </div>

                                </td>


                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $customer->abbreviated }}
                                    </div>

                                </td>

                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('sistem.customers.edit', $customer) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>
                                    @can('admin.view')
                                        <x-jet-danger-button wire:click="$emit('deliteCustomer', {{ $customer }} )">
                                            <i class="fas fa-trash"></i>
                                        </x-jet-danger-button>
                                    @endcan
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

            @if ($customers->haspages())
                <div class="px-6 py-4">
                    {{ $customers->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliteCustomer', customer => {
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

                        livewire.emit('delete', customer);

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
