<div wire:init="loadincidents">
    <div  class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">
            Incidencias de la O/{{ $production->order->orden }}</h2>

        <x-table-responsive>

            <div class="px-6 py-4  flex  justify-end items-center mt-4">

                  @livewire('factory.create-incident-component-factory', ['production' => $production], key('create-create-incident-component-factory-' . $production->id))


            </div>
            @if (count($incidents))

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
                            Tipo
                        </th>
                        <th class="px-4 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                            Descripción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ date('d/m/Y', strtotime($incident->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('H:i:s', strtotime($incident->created_at )) }}
                        </td>
                        <td class="px-6 py-4">
                            {{  $incident->incident_type->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{$incident->description}}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($incidents->hasPages())

            <div class="px-6 py-3">
                {{$incidents->links()}}
            </div>

            @endif

            @else
                <div class="px-6 py-4">
                    No existe registro de incidencias
                </div>
            @endif




        </x-table-responsive>


    </div>


    @push('js')
         <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteincident', incidentId =>{
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

                Livewire.emitTo('show-incidents', 'delete', incidentId);



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

