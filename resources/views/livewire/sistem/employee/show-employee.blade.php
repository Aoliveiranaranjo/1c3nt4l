<div>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-500">
                Lista de emplead@s
            </h2>
            <a class="ml-auto" href="{{ route('sistem.employee.dashboard.index') }}">
                <x-jet-secondary-button class="ml-auto">
                    Empleados en producción
                </x-jet-secondary-button>
            </a>

            <a class="ml-auto" href="{{ route('sistem.employees.create') }}">
                <x-button-enlace>
                    Agregar emplead@
                </x-button-enlace>
            </a>
        </div>
    </x-slot>


    <div class="container px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-table-responsive>
            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar" />

            </div>

            @if ($employees->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                wire:click="order('codigo')">
                                Cód.
                                @if ($sort == 'codigo')
                                    @if ($direction == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif

                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
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
                            @can('adminGeAdmJPlan.view')

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                    wire:click="order('dni')">
                                    DNI

                                    {{-- Sort --}}
                                    @if ($sort == 'dni')
                                        @if ($direction == 'asc')
                                            <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                        @endif
                                    @else
                                        <i class="float-right mt-1 fas fa-sort"></i>
                                    @endif

                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                    wire:click="order('antiquity')">
                                    Ant.

                                    {{-- Sort --}}
                                    @if ($sort == 'antiquity')
                                        @if ($direction == 'asc')
                                            <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                        @endif
                                    @else
                                        <i class="float-right mt-1 fas fa-sort"></i>
                                    @endif

                                </th>
                            @endcan
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
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
                            @can('adminGeAdmJPlan.view')
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                    Teléfono.


                                </th>
                            @endcan
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Emergencia
                            </th>
                            @can('adminGeAdmJPlan.view')
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                    wire:click="order('charge_id')">
                                    Cargo

                                    {{-- Sort --}}
                                    @if ($sort == 'charge_id')
                                        @if ($direction == 'asc')
                                            <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                        @endif
                                    @else
                                        <i class="float-right mt-1 fas fa-sort"></i>
                                    @endif

                                </th>
                            @endcan
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase cursor-pointer bg-gray-50"
                                wire:click="order('group_id')">
                                Grupo

                                {{-- Sort --}}
                                @if ($sort == 'group_id')
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
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                Sex
                            </th>
                            @can('adminGeAdmJPlan.view')
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                    Email
                                </th>
                            @endcan
                            @can('admin.view')
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">

                                </th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($employees as $employee)
                            <tr>

                                <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                    <a href=" {{ route('sistem.employees.edit', $employee) }} ">
                                        <x-jet-secondary-button class="text-indigo-500 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </x-jet-secondary-button>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $employee->codigo }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $employee->name }}
                                    </div>

                                </td>
                                @can('adminGeAdmJPlan.view')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $employee->dni }}
                                        </div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ date('d/m/Y', strtotime($employee->antiquity)) }}
                                        </div>
                                    </td>
                                @endcan
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        @if ($employee->status == '1')
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
                                @can('adminGeAdmJPlan.view')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $employee->phone }}
                                        </div>

                                    </td>
                                @endcan
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $employee->emergencyPhone }}
                                    </div>

                                </td>
                                @can('adminGeAdmJPlan.view')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $employee->charge->name }}
                                        </div>
                                    </td>
                                @endcan
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $employee->group->name }}
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $employee->sex->name }}
                                    </div>

                                </td>
                                @can('adminGeAdmJPlan.view')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $employee->email }}
                                        </div>

                                    </td>
                                @endcan

                                @can('admin.view')
                                    <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
                                        <x-jet-danger-button wire:click="$emit('deliteemployee', {{ $employee }} )">
                                            <i class="fas fa-trash"></i>
                                        </x-jet-danger-button>
                                    </td>
                                @endcan
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

            @if ($employees->haspages())
                <div class="px-6 py-4">
                    {{ $employees->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    @push('script')
        <script>
            livewire.on('deliteemployee', employee => {
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

                        livewire.emit('delete', employee);

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
