<div wire:init="loadproductionParts">
    <div  class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Produción de la O/{{ $production->order->orden }}</h2>

        <x-table-responsive>

            <div class="px-6 py-4  flex  justify-end items-center mt-4">

                  @livewire('factory.create-production-part-component-factory', ['production' => $production], key('create-production-part-component-factory-' . $production->id))


            </div>
            @if (count($productionParts))

            <table class="min-w-full divide-y divide-gray-200">
                <thead>

                    <div class="grid grid-cols-3 gap-6 px-6 py-4 mb-4">
                        <div>
                            <x-jet-label value="Cantidad a producir: "/>
                            <x-jet-input
                                value="{{ number_format($production->order->amount )}} "
                                type="text"
                                class="w-full text-right  bg-blue-200" disabled/>
                        </div>
                        <div>
                            <x-jet-label value="Cantidad producida: "/>
                            <x-jet-input
                                value="{{number_format( $productionParts->sum('amount') )}} "
                                type="text"
                                class="w-full text-right bg-green-200" disabled/>
                        </div>
                        <div>
                            <x-jet-label value="Cantidad pendiente de producir: "/>
                            <x-jet-input
                                value="{{ number_format($production->order->amount - $productionParts->sum('amount') )}} "
                                type="text"
                                class="w-full text-right bg-red-200" disabled/>
                        </div>
                    </div>

                    <tr>
                        <th class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                            Fecha
                        </th>
                        <th class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                            Hora
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Cantidad
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($productionParts as $item)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($item->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('H:i:s', strtotime($item->created_at )) }}
                        </td>
                        <td class="text-right px-6 py-4">
                            {{ number_format($item->amount)}}
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
            <div class="mb-4">

                <x-jet-label value="Título del producción" />
                <x-jet-input wire:model="productionPart.amount" type="text" class="w-full" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <div class="mb-4">
                <x-jet-secondary-button wire:click="$set('open_edit', false)">
                    Cancelar
                </x-jet-secondary-button>
            </div>
            <div class="mb-4">
                <x-jet-danger-button wire:click="update"  wire:loading.attr="disabled"  wire:target="save" class="disabled:opacity-25">
                    Actualizar
                </x-jet-danger-button>.
            </div>

        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
         <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteproductionPart', productionPartId =>{
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

                Livewire.emitTo('show-productionParts', 'delete', productionPartId);



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

