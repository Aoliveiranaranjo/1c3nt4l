<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Informción inicio. Calidad O/{{ $production->order->orden }}</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <h3 class="text-2xl text-center font-semibold mb-8">El departamento de calidad han dado inicio favorable a la
                O/{{ $production->order->orden }}
            </h3>
            <thead>
                <tr>
                    <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                    Fecha
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                    Hora
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                    Lote
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                    Observación
                </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ date('d/m/Y', strtotime($production->qualities->created_at )) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ date('H:i:s', strtotime($production->qualities->created_at  )) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ $production->qualities->lote }}
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ $production->qualities->observation }}
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>


</div>
