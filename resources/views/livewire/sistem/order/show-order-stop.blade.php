<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-500">
                Ordenes
            </h2>
            <a class="ml-auto" href="{{ route('sistem.order.null') }}">
                <x-jet-secondary-button class="ml-auto bg-green-200">
                    Anuladas
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.order.new') }}">
                <x-jet-secondary-button class="ml-auto bg-green-200">
                    Lanzadas
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.order.progress') }}">
                <x-jet-secondary-button class="ml-auto bg-green-200">
                    En Curso
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.order.index') }}">
                <x-jet-secondary-button class="ml-auto bg-slate-300">
                    Todas
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.order.closed') }}">
                <x-jet-secondary-button class="ml-auto bg-green-200">
                  Cerradas
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.orders.create') }}">
                <x-button-enlace>
                    Agregar orden
                </x-button-enlace>
            </a>
        </div>
    </x-slot>


    <div class="container px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-table-responsive>
            <div class="px-6 py-4 ">
                <div class="flex items-center  text-gray-500">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control  text-gray-700">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>ordenes </span>

                    <x-jet-input type="text" class="w-full m-4" wire:model="search" placeholder="Buscar" />
                </div>

            </div>

            @if ($orders->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50">


                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                wire:click="order('created_at')">
                                Fecha
                                @if ($sort == 'created_at')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                               >
                                Estado


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            wire:click="order('pedidoCliente')">
                            Su Pedido
                            @if ($sort == 'pedidoCliente')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            wire:click="order('pedido')">
                            Pedido
                            @if ($sort == 'pedido')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            wire:click="order('orden')">
                            Orden
                            @if ($sort == 'orden')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            wire:click="order('amount')">
                            Cantidad.
                            @if ($sort == 'amount')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                               >
                                Articulo

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                              >
                                Nombre


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                             >
                                Cliente


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            >
                               EDO.


                           </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                            wire:click="order('material')">
                            Mat.
                            @if ($sort == 'material')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                              >
                                F. Entrega

                            </th>

                            @can('admin.view')
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                                </th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('sistem.orders.edit.stop', $order) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-1000">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ date('d/m/Y', strtotime($order->created_at)) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->orderstate->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->pedidoCliente }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        P/{{ $order->pedido }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        O/{{ $order->orden }}
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm text-right leading-5 text-gray-900">
                                        {{ number_format( $order->amount )}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->article->CodeCentral }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->article->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->customer->abbreviated }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        @if ($order->article->statusArticle == 'AUTORIZADO')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                AUTORIZADO
                                            </span>
                                        @elseif ($order->article->statusArticle == 'REPETICION')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                REPETICION
                                            </span>
                                        @elseif ($order->article->statusArticle == 'PENDIENTE')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">
                                                PENDIENTE
                                            </span>
                                        @elseif ($order->article->statusArticle == 'RECHAZADO')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                RECHAZADO
                                            </span>
                                        @elseif ($order->article->statusArticle == 'SUSPENDIDO')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                SUSPENDIDO
                                            </span>
                                        @elseif ($order->article->statusArticle == 'DEROGADO')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                DEROGADO
                                            </span>
                                        @elseif ($order->article->statusArticle == 'NUEVO')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                                NUEVO
                                            </span>
                                            @elseif ($order->article->statusArticle == '')
                                            <span>

                                            </span>
                                        @endif

                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($order->material == '1')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Si
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                No
                                            </span>
                                        @endif


                                    </div>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        @if ($order->dateDelivery)
                                            {{ date('d/m/Y', strtotime($order->dateDelivery)) }}
                                        @else
                                            Sin fecha
                                        @endif


                                    </div>

                                </td>

                                @can('admin.view')
                                    <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">

                                        <x-jet-danger-button wire:click="$emit('deliteorder', {{ $order }} )">
                                            <i class="fas fa-trash"></i>
                                        </x-jet-danger-button>
                                    </td>
                                @endcan
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

            @if ($orders->haspages())
                <div class="px-6 py-4">
                    {{ $orders->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliteorder', order => {
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

                        livewire.emit('delete', order);

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
