<div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Trabajadoras de la orden</h2>

        <x-table-responsive>

            @if (count($production))


                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Fecha
                            </th>
                            <th
                                class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Hora
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Nombre
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Baja
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Hora
                            </th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($production as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($item->created_at )) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('H:i:s', strtotime($item->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->employee->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($item->updated_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('H:i:s', strtotime($item->updated_at)) }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @if ($production->hasPages())
                    <div class="px-6 py-3">
                        {{ $production->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No existe trabajadoras registrada
                </div>
            @endif




        </x-table-responsive>


    </div>

    @push('script')
        <script>
            Livewire.on('bajaemployee', itemId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podras revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, dar de baja!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('factory.show-employee-component-factory', 'baja', itemId);



                        Swal.fire(
                            '¡Baja realizada!',
                            'La baja se ha tramitado satisfactoriamente.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
