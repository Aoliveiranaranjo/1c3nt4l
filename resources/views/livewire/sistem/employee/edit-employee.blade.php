<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

    <h1 class="mb-8 text-3xl font-semibold text-center">Introduzca la información que desea editar del empleado</h1>

    <div class="p-6 bg-white rounded-lg shadow-xl">



        <div class="grid grid-cols-1 gap-6 mb-4">

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- código --}}
                <div>
                    <x-jet-label value="Código del artículo" />
                    <x-jet-input wire:model.defer='employee.codigo' type="text" class="w-full" />
                    <x-jet-input-error for="employee.codigo" />

                </div>
                {{-- nombre --}}
                <div>
                    <x-jet-label value="Nombre completo" />
                    <x-jet-input wire:model.defer='employee.name' type="text" class="w-full" />
                    <x-jet-input-error for="employee.name" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- DNI --}}
                <div>
                    <x-jet-label value="DNI" />
                    <x-jet-input wire:model.defer='employee.dni' type="text" class="w-full" />
                    <x-jet-input-error for="employee.dni" />
                </div>
                {{-- fecha de inicio --}}
                <div>
                    <x-jet-label value="Fecha de inicio" />
                    <x-jet-input wire:model.defer='employee.antiquity' type="date" class="w-full" />
                    <x-jet-input-error for="employee.antiquity" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- email --}}
                <div>
                    <x-jet-label value="E-mail" />
                    <x-jet-input wire:model.defer='employee.email' type="text" class="w-full" />
                    <x-jet-input-error for="employee.email" />
                </div>

                <div>
                    <x-jet-label value="Activo" />
                    <x-jet-input wire:model.defer='employee.status' type="checkbox"
                        class="text-center mt-1 border-blue-500" />
                    <x-jet-input-error for="employee.status" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- telf y de emer --}}
                <div>
                    <x-jet-label value="Teléfono" />
                    <x-jet-input wire:model.defer='employee.phone' type="number" class="w-full" />
                    <x-jet-input-error for="employee.phone" />
                </div>
                {{-- telf y de emer --}}
                <div>
                    <x-jet-label value="Teléfono de emergencia" />
                    <x-jet-input wire:model.defer='employee.emergencyPhone' type="number" class="w-full" />
                    <x-jet-input-error for="employee.emergencyPhone" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-4">
                <div>
                    <div>
                        <x-jet-label value="Selecciona un cliente:" />
                        <select class="w-full" wire:model.defer="employee.sex_id">
                            @foreach ($sexs as $sex)
                                <option value="{{ $sex->id }}" selected>{{ $sex->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <x-jet-label value="Selecciona un cliente:" />
                        <select class="w-full" wire:model.defer="employee.charge_id">
                            @foreach ($charges as $charge)
                                <option value="{{ $charge->id }}" selected>{{ $charge->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <x-jet-label value="Selecciona un cliente:" />
                        <select class="w-full select2" wire:model.defer="employee.group_id">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            {{-- boton --}}
            <div class="flex items-center justify-end mt-4">

                <x-jet-action-message class="mr-3 text-red-600" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar empleado
                </x-jet-button>

            </div>
        </div>

    </div>
</div>
