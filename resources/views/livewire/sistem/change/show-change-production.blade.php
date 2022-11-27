<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Cambios de esta producción</h2>
    <div wire:model='render'>
        <x-table-responsive>

            @if ($changes->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">

                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Prioridad
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Estado
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Tipo
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                                Mecánico
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($changes as $change)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('sistem.changes.edit', $change) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->pry }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->statechange->name }}
                                    </div>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->typechange->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $change->mechanic->name }}
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

        </x-table-responsive>
    </div>

</div>
