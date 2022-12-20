<div wire:init="loadqualityProductions">
    <div>
        <br>
        <h2 class="text-3xl text-center font-semibold mb-8">
            Producción de la O/{{ $order->orden }}</h2>

        <x-table-responsive>

            <div class="px-6 py-4   flex  justify-end items-center mt-4">


                <div class="px-3 py-2  mt-2 text-xs">
                    <x-jet-label value="" />
                    <x-jet-input value=" Producciones: &nbsp {{ count($qualityProductions) }}" type="text"
                        class="w-40  bg-gray-200" disabled />
                </div>


                @livewire('factory.quality.create-internal-quality-production', ['order' => $order], key('create-internal-quality-production-' . $order->id))


            </div>
            @if (count($qualityProductions))

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>

                        <tr>
                            <th
                                class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">

                            </th>
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
                                Lote PT
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                SP O VRAC
                            </th>

                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                LOTE CONT
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                CUBA
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Nº PALET
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                CAJAS
                            </th>
                            <th
                                class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                UNIDADES
                            </th>



                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($qualityProductions as $qualityProduction)
                            <tr class="bg-white text-xs  border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium flex ">

                                    <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-1000"
                                        wire:click="edit( {{ $qualityProduction }} )">
                                        <i class="fas fa-edit"></i>
                                    </x-jet-secondary-button>
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($qualityProduction->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('H:i:s', strtotime($qualityProduction->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->lote_pt }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->sp ?? 'No Aplica' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->lote_conte ?? 'No Aplica' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->cuba ?? 'No Aplica' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->palet }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $qualityProduction->box }}
                                </td>
                                <td class="px-6 py-4 text-center bg-green-300">
                                    {{ number_format($qualityProduction->unid) }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existe registro de producción
                </div>
            @endif



        </x-table-responsive>


    </div>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar el producción:
        </x-slot>

        <x-slot name='content'>
            <div class="bg-white shadow-xl rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Lote de PT" />
                        <x-jet-input wire:model='qualityProduction.lote_pt' type="text" class="w-full" />
                        <x-jet-input-error for="qualityProduction.lote_pt" />

                    </div>
                    <div>
                        <x-jet-label value="Código de SP o formula VRAC" />
                        <x-jet-input wire:model='qualityProduction.sp' type="text" class="w-full" />
                        <x-jet-input-error for="qualityProduction.sp" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Lote de contenedor" />
                        <x-jet-input wire:model='qualityProduction.lote_conte' type="text" class="w-full" />
                        <x-jet-input-error for="qualityProduction.lote_conte" />
                    </div>
                    <div>
                        <x-jet-label value="Cuba" />
                        <x-jet-input wire:model='qualityProduction.cuba' type="text" class="w-full" />
                        <x-jet-input-error for="qualityProduction.cuba" />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6  mb-4">
                    <div>
                        <x-jet-label value="Nº Palet" />
                        <x-jet-input wire:model='qualityProduction.palet' type="number" class="w-full" />
                        <x-jet-input-error for="qualityProduction.palet" />
                    </div>
                    <div>
                        <x-jet-label value="Cajas" />
                        <x-jet-input wire:model='qualityProduction.box' type="number" class="w-full" />
                        <x-jet-input-error for="qualityProduction.box" />
                    </div>
                    <div>
                        <x-jet-label value="Unidades" />
                        <x-jet-input wire:model='qualityProduction.unid' type="number" class="w-full" />
                        <x-jet-input-error for="qualityProduction.unid" />
                    </div>
                </div>


                </x-slot>

                <x-slot name='footer'>
                    <div class="mb-4">
                        <x-jet-secondary-button wire:click="$set('open_edit', false)">
                            Cancelar
                        </x-jet-secondary-button>
                    </div>
                    <div class="mb-4">
                        <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save"
                            class="disabled:opacity-25">
                            Actualizar
                        </x-jet-danger-button>.
                    </div>

                </x-slot>
            </div>
    </x-jet-dialog-modal>


    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deletequalityProduction', qualityProductionId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('show-qualityProductions', 'delete', qualityProductionId);



                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
