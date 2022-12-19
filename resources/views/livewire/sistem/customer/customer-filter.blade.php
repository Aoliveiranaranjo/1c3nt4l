<div>
    {{-- filtro --}}
    <div class="bg-white rounded p-8 shadow mb-6">
        <h2 class="text-2x1 font-semibold mb-4">Generar reporte cliente</h2>
        {{-- <div class="mb-4">
            Nombre cliente:
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="" id="">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
        </div> --}}

        <div class="space-x-4 mb-4">
            Buscar cliente:
            <x-jet-input type="text" wire:model="filters.search" class="w-full" placeholder="Buscar" />

        </div>
        <div class="space-x-4 mb-4">
            Código cliente:
            <x-jet-input type="text" wire:model="filters.cod" class="w-36" placeholder="" />

        </div>
        <div class="flex space-x-4 mb-4">
            <div>
                Desde fecha:
                <x-jet-input wire:model="filters.fromDate" type="date" class="w-36" />
            </div>
            <div>
                Hasta fecha:
                <x-jet-input wire:model="filters.toDate" type="date" class="w-36" />
            </div>
        </div>

        <div class="space-x-4 mb-4">
            Selecciona un estado:
            <select wire:model="filters.status"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-36">
                    <option value="true" selected>Activo</option>
                    <option value="false" selected>Inactivo</option>
                
            </select>
            <x-jet-input-error for="filters.status" />
        </div>
     
        <div>
            <x-jet-button wire:click="generateReport">
                Generar reporte
            </x-jet-button>

        </div>

    </div>


    {{-- tabla --}}
    <div class="container max-w-7xl mx-auto">
        <x-table-responsive>

            @if ($customers->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class=" px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Cod


                            </th>
                            <th
                                class=" px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Nombre


                            </th>
                            <th
                                class=" px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Nif


                            </th>
                            <th
                                class=" px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Edo.

                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Abreviación

                            </th>

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

</div>
