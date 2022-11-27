<div class="max-w-4xl py-12 text-gray-700">
    <h2 class="text-3xl text-center font-semibold mb-8">Asignar role a usuario de nombre: {{ $user->name }}.</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">

        <div class="text-2xl px- py-3 text-red-500 bg-gray-50">
            Selecciona abajo un rol y mira el rol actulizado arriba. veras el cambio en la parte superior y en rojo
        </div>
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <x-table-responsive>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-red-500 uppercase bg-gray-50">
                                Listado de Roles

                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>


                            <td wire:key="{{ $user->email }}" class="px-6 py-4 whitespace-no-wrap">


                                <label class="ml-2">
                                    <input value="Admin"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Admin
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Gerencia"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Gerencia
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Administración"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Administración
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Jefe de Planificación"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Jefe de Planificación
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Jefe de Mecánico"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Jefe de Mecánico
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Planificación"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Planificación
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Encargada"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Encargada
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Calidad"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Calidad
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Mecánico"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Mecánico
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Almacén"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Almacén
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Responsables"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Responsables
                                </label>
                                <br>
                                <label class="ml-2">
                                    <input value="Visita"
                                    wire:change="assignRole({{ $user->id }}, $event.target.value)"
                                    type="radio" name=" {{ $user->email }} ">
                                    Visita
                                </label>
                                <br>

                            </td>

                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </x-table-responsive>
        </div>
    </div>
    {{ $user->id }}
</div>
