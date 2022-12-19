<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-500">
               Producto terminados por entregar
            </h2>
            <a class="ml-auto" href="{{ route('factory.store.pt.closed') }}">
                <x-jet-secondary-button class="ml-auto text-white bg-blue-400">
                    PT Entregados
                </x-jet-secondary-button>
            </a>
        </div>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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

                    <span>PT </span>

                    <x-jet-input type="text" class="w-full m-4" wire:model="search" placeholder="Buscar" />
                </div>

            </div>

            @if ($qualityProductions->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('pry')">
                                ORDEN

                                {{-- Sort --}}
                                @if ($sort == 'pry')
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
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                PEDIDO
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                CÓDIGO
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                NOMBRE
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                CLIENTE
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                LOTE
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                PALET
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                CAJAS
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                UNIDADES
                            </th>
                            <th>

                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($qualityProductions as $qualityProduction)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('factory.store.pt.edit', $qualityProduction) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                        cali
                                    </a>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        O/{{ $qualityProduction->order->orden }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        P/{{ $qualityProduction->order->pedido }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $qualityProduction->order->article->CodeCentral }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $qualityProduction->order->article->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $qualityProduction->order->customer->abbreviated }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm text-center leading-5 text-gray-900">
                                        {{ $qualityProduction->lote_pt }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm text-center leading-5 text-gray-900">
                                        {{ $qualityProduction->palet }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm text-center leading-5 text-gray-900">
                                        {{ $qualityProduction->box }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm text-center leading-5 text-gray-900">
                                        {{ $qualityProduction->unid }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <x-jet-secondary-button wire:click="$emit('deliveryqualityProduction', {{ $qualityProduction }} )" class="text-gray-700 bg-gray-200 hover:bg-red-500  hover:text-white">
                                        <i class="fa-solid fa-truck"></i>
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

            @if ($qualityProductions->haspages())
                <div class="px-6 py-4">
                    {{ $qualityProductions->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliveryqualityProduction', qualityProduction => {
                Swal.fire({
                    title: '¿Entregaras este producto?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, entregado!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('delivery', qualityProduction);

                        Swal.fire(
                            '¡Entregado!',
                            'El producto fue entregado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
