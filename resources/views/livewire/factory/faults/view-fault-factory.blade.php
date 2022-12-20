<div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Avería de la O/{{ $production->order->orden }}</h2>

        <x-table-responsive>
            @if (count($faults))
            @else
                <div class="px-6 py-4  flex  justify-end faults-center mt-4">

                    @livewire('factory.create-fault-component-factory', ['production' => $production], key('create-create-fault-component-factory-' . $production->id))


                </div>
            @endif
            @if (count($faults))

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Incio
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Hora
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Descripción
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Asignado
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Asistente
                            </th>
                            <th
                                class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Fin
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Hora
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Responsable
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($faults as $fault)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($fault->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('H:i', strtotime($fault->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $fault->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $fault->mechanicOne->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $fault->mechanic->name }}
                                </td>
                                <td class="px-6 py-4">

                                    {{ $i = $fault->updated_at == $fault->created_at ? 'AVERÍA' : date('d/m/Y', strtotime($fault->updated_at)) }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $i = $fault->updated_at == $fault->created_at ? 'ACTIVA' : date('H:i', strtotime($fault->updated_at)) }}
                                </td>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $fault->user->name }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($faults->hasPages())
                    <div class="px-6 py-3">
                        {{ $faults->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No existe avería
                </div>
            @endif




        </x-table-responsive>


    </div>
</div>
