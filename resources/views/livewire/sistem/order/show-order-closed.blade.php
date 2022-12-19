<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-500">
                Listado de Ordenes Cerradas
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
            <a class="ml-auto" href="{{ route('sistem.order.stop') }}">
                <x-jet-secondary-button class="ml-auto bg-green-200">
                    Paralizadas
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('sistem.order.index') }}">
                <x-jet-secondary-button class="ml-auto bg-slate-300">
                    Todas
                </x-jet-secondary-button>
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

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('dateEnd')">
                                F. Final

                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('estado')">
                                Estado


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('pedidoCliente')">
                                Su Pedido

                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('pedido')">
                                Pedido


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('orden')">
                                Orden



                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('amount')">
                                Cantidad


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('articleCod')">
                                Articulo

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('articleName')">
                                Nombre


                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('cliente')">
                                Cliente


                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('material')">
                                Mat.

                            </th>

                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50"
                                wire:click="order('dateDelivery')">
                                F. Entrega

                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        @if ($order->dateEnd)
                                            {{ date('d/m/Y  H:i:s', strtotime($order->dateEnd)) }}
                                        @else
                                        @endif
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->estado }}
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
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->amount }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->articleCod }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->articleName }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $order->customer->abbreviated }}
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


                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">

                                    <x-jet-danger-button wire:click="$emit('restaurarorder', {{ $order }} )">
                                        Restaurar
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

            @if ($orders->haspages())
                <div class="px-6 py-4">
                    {{ $orders->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('restaurarorder', order => {
                Swal.fire({
                    title: '¿Restaurar la orden?',
                    text: "¡Podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, restaura!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('restaurarOrder', order);

                        Swal.fire(
                            'Restaurado!',
                            'Su archivo ha sido restaurado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
