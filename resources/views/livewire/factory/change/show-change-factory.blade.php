<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de cambios
            </h2>

        </div>
    </x-slot>
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table-responsive>

            @if (count($changes))

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50">

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                wire:click="order('pry')">
                                PRY

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
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                FECHA
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                ESTADO
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase  bg-gray-50">
                                TIPO
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Sala
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Maqu??na
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Orden
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Mec??nico Limpieza
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Mec??nico Cambio
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Cliente
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Descripci??n
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Observaci??n
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($changes as $change)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-center whitespace-no-wrap">
                                    <a href=" {{ route('factory.change.edit', $change) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>
                                    <a href=" {{ route('sistem.changes.edit', $change) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                        plani

                                    </a>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->pry }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ date('d/m/Y', strtotime($change->created_at)) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->statechange->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->typechange->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->production->machine->room->nameRoom }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->production->machine->codMachine }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        O/{{ $change->production->order->orden }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->mechanicOne->abbreviated ?? 'NO' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->mechanic->abbreviated }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->production->order->customer->abbreviated }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->description }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->observation }}
                                    </div>
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

            @if ($changes->haspages())
                <div class="px-6 py-4">
                    {{ $changes->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('delitechange', change => {
                Swal.fire({
                    title: '??Eliminaras la informaci??n?',
                    text: "??No podr??s revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '??S??, b??rralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('delete', change);

                        Swal.fire(
                            '??Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush



</div>
