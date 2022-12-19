<div wire:init="loademployees">
    <div  class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Trabajadoras activas de la O/{{ $production->order->orden }}</h2>

        <x-table-responsive>

            <div class="px-6 py-4  flex  justify-end items-center mt-4">

                  @livewire('factory.create-employee-component-factory', ['production' => $production], key('create-create-employee-component-factory-' . $production->id))

                </div>

                @if (count($employees))


            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                            Fecha
                        </th>
                        <th class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                            Hora
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Nombre
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">

                        </th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $item)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($item->trabajadoras->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('H:i:s', strtotime($item->trabajadoras->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->name }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                            <x-jet-danger-button wire:click="$emit('bajaemployee',  {{ $item->id }} )">
                                <i class="fas fa-arrow-circle-down"></i>
                            </x-jet-danger-button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @if ($employees->hasPages())

            <div class="px-6 py-3">
                {{$employees->links()}}
            </div>

            @endif

            @else
                <div class="px-6 py-4">
                    No existe trabajadoras activas
                </div>
            @endif




        </x-table-responsive>


    </div>

      @push('script')


        <script>
            Livewire.on('bajaemployee', itemId=>{
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

                Livewire.emitTo('factory.show-employee-component-factory', 'baja',  itemId);



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

