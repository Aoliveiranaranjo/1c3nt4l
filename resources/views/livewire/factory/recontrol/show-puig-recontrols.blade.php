<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista recontroles general
            </h2>
            <a class="ml-auto" href="{{ route('factory.recontrol.show.index') }}">
                <x-jet-secondary-button class="ml-auto ">
                    Todos
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('factory.recontrol.show.index.puig') }}">
                <x-jet-secondary-button class="ml-auto  bg-slate-300">
                    Puig
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('factory.recontrol.show.index.loreal') }}">
                <x-jet-secondary-button class="ml-auto">
                    Loreal
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('factory.recontrol.history.index') }}">
                <x-jet-secondary-button class="ml-auto">
                    Antiguos
                </x-jet-secondary-button>
            </a>
            <a class="ml-auto" href="{{ route('factory.recontrol.create') }}">
                <x-button-enlace>
                    Agregar recontrol
                </x-button-enlace>
            </a>
        </div>
    </x-slot>

    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table-responsive>
            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar" />

            </div>

            @if ($recontrols->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">

                        </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                            wire:click="order('created_at')">
                            Fecha

                            {{-- Sort --}}
                            @if ($sort == 'created_at')
                                @if ($direction == 'asc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @endif
                            @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                            @endif

                        </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('client')">
                                Cliente

                                {{-- Sort --}}
                                @if ($sort == 'client')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('status')">
                                Estado

                                {{-- Sort --}}
                                @if ($sort == 'status')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('codCentral')">
                                Código

                                @if ($sort == 'codCentral')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('reference')">
                                Referencia

                                {{-- Sort --}}
                                @if ($sort == 'reference')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('name')">
                                Nombre

                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('lote')">
                                Lote

                                {{-- Sort --}}
                                @if ($sort == 'lote')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('cuba')">
                                Cuba

                                {{-- Sort --}}
                                @if ($sort == 'cuba')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('dateIn')">
                                Entrada

                                {{-- Sort --}}
                                @if ($sort == 'dateIn')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('expirationDate')">
                                Expiró

                                {{-- Sort --}}
                                @if ($sort == 'expirationDate')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('datedelivery')">
                                Envío

                                {{-- Sort --}}
                                @if ($sort == 'datedelivery')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('expirationNew')">
                                Nuevo Ven.

                                {{-- Sort --}}
                                @if ($sort == 'expirationNew')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('micro')">
                                Micro

                                {{-- Sort --}}
                                @if ($sort == 'micro')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('fisico')">
                                Físico

                                {{-- Sort --}}
                                @if ($sort == 'fisico')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('conservantes')">
                                Conservantes

                                {{-- Sort --}}
                                @if ($sort == 'conservantes')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="cursor-pointer px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50"
                                wire:click="order('observation')">
                                Observaciones

                                {{-- Sort --}}
                                @if ($sort == 'observation')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($recontrols as $recontrol)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('factory.recontrol.edit.puig', $recontrol) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ date('d/m/Y', strtotime($recontrol->created_at)) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $recontrol->client->abbreviated }}
                                    </div>
                                </td>
                                <td class=" text-center px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        @if ($recontrol->status == 'SIN RESPUESTA')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">
                                                S/respuesta
                                            </span>
                                        @elseif ($recontrol->status == 'OKEY')
                                            <span
                                                class="inline-flex px-2 text-lg font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                OKEY
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-lg font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                NOK
                                            </span>
                                        @endif

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $recontrol->codCentral }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900 uppercase">
                                        {{ $recontrol->reference }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $recontrol->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $recontrol->lote }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap uppercase">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $recontrol->cuba }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-center text-xs ">
                                        @if ($recontrol->dateIn)
                                            {{ date('d/m/Y', strtotime($recontrol->dateIn)) }}
                                        @else
                                            Sin fecha
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-center text-xs ">
                                        @if ($recontrol->expirationDate)
                                            {{ date('d/m/Y', strtotime($recontrol->expirationDate)) }}
                                        @else
                                            Sin fecha
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-center text-xs ">
                                        @if ($recontrol->datedelivery)
                                            {{ date('d/m/Y', strtotime($recontrol->datedatedeliveryIn)) }}
                                        @else
                                            Sin fecha
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-center text-xs ">
                                        @if ($recontrol->expirationNew)
                                            {{ date('d/m/Y', strtotime($recontrol->expirationNew)) }}
                                        @else
                                            Sin fecha
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($recontrol->micro  == '1')
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                OK
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                NOK
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($recontrol->fisico  == '1')
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                OK
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                NOK
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($recontrol->conservantes  == '1')
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                OK
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-ms font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                NOK
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-ms leading-5 text-gray-900">
                                        {{ $recontrol->observation }}
                                    </div>

                                </td>


                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">


                                    <x-jet-danger-button wire:click="$emit('deliterecontrol', {{ $recontrol }} )">
                                        <i class="fas fa-trash"></i>
                                    </x-jet-danger-button>
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

            @if ($recontrols->haspages())
                <div class="px-6 py-4">
                    {{ $recontrols->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliterecontrol', recontrol => {
                Swal.fire({
                    title: '¿Eliminaras la información?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        livewire.emit('delete', recontrol);

                        Swal.fire(
                            '¡Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
