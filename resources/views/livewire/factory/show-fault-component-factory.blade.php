<div wire:init="loadfaults">
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
                                Fecha
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

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($faults as $fault)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($fault->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('H:i:s', strtotime($fault->created_at)) }}
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


                                <td class="px-6 py-4 font-medium flex ">

                                    <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-1000"
                                        wire:click="edit( {{ $fault }} )">
                                        <i class="fas fa-edit"></i>
                                    </x-jet-secondary-button>
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

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Declarar el fin a la avería:
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value="Selecciona el mecánico reparo la avería" />
                <select
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer="fault.mechanic_id">

                    @foreach ($mechanics as $mechanic)
                        <option value="{{ $mechanic->id }}" selected>{{ $mechanic->name}}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="fault.mechanic_id" />
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
                    Fin de avería
                </x-jet-danger-button>.
            </div>

        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deletefault', faultId => {
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

                        Livewire.emitTo('show-faults', 'delete', faultId);



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
