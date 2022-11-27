<div wire:init="loaddecreases">
    <div  class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Merma de la O/{{ $production->order->orden }}</h2>

        <x-table-responsive>

            <div class="px-6 py-4  flex  justify-end items-center mt-4">

                  @livewire('factory.create-decrease-component-factory', ['production' => $production], key('create-create-decrease-component-factory-' . $production->id))


            </div>
            @if (count($decreases))

            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 mb-4 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50">
                            Fecha
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Código
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Tipo de componente
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Cantidad
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Observación
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($decreases as $item)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ date('d/m/Y H:i:s', strtotime($item->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->code}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->observation}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($decreases->hasPages())

            <div class="px-6 py-3">
                {{$decreases->links()}}
            </div>

            @endif

            @else
                <div class="px-6 py-4">
                    No existe registro de merma
                </div>
            @endif




        </x-table-responsive>


    </div>

    @push('js')
         <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deletedecrease', decreaseId =>{
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

                Livewire.emitTo('show-decreases', 'delete', decreaseId);



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

