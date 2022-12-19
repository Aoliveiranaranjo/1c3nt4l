<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

    <h1 class="mb-8 text-3xl font-semibold text-center">Complete la información para crear un empleado</h1>

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código de empleado"/>
                <x-jet-input
                    wire:model.defer='codigo'
                    type="number"
                    class="w-full"/>
                <x-jet-input-error for="codigo"/>

            </div>
            {{-- dni --}}
            <div >
                <x-jet-label value="DNI"/>
                <x-jet-input
                    wire:model.defer='dni'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="dni"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- nombre completo --}}
            <div>
                <x-jet-label value="Nombre completo"/>
                <x-jet-input
                    wire:model.defer='name'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="name"/>
            </div>
            {{-- inicio de relacion --}}
            <div>
                <x-jet-label value="fecha de inicio de relación"/>
                <x-jet-input
                    wire:model.defer='antiquity'
                    type="date"
                    class="w-full"/>
                <x-jet-input-error for="antiquity"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="E-mail"/>
                <x-jet-input
                    wire:model.defer='email'
                    type="email"
                    class="w-full"/>
                <x-jet-input-error for="email"/>
            </div>
            {{-- abreviación cliente --}}
            <div>
                <x-jet-label value="Teléfono"/>
                <x-jet-input
                    wire:model.defer='phone'
                    type="number"
                    class="w-full"/>
                <x-jet-input-error for="phone"/>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="Teléfono de emergencia"/>
                <x-jet-input
                    wire:model.defer='emergencyPhone'
                    type="number"
                    class="w-full"/>
                <x-jet-input-error for="emergencyPhone"/>
            </div>
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="Sexo"/>
                <select name="sex_id" id="sex_id" wire:model.defer="sex_id" class="w-full mb-4">
                    <Option value="" > Seleccione un cargo </Option>
                    @foreach ($sexs as $sex)
                    <Option value="{{$sex->id}}" > {{$sex->name}} </Option>
                    @endforeach

                </select>
                <x-jet-input-error for="sex_id"/>

            </div>
        </div>


        <div class="grid grid-cols-2 gap-3 mb-4">

            {{-- abreviación cliente --}}
            <div>
                <x-jet-label value="Cargo"/>
                <select name="charge_id"  id="charge_id" wire:model.defer="charge_id" class="w-full mb-4 form-control">
                    <Option value="" > Seleccione un cargo </Option>
                    @foreach ($charges as $charge)
                    <Option value="{{$charge->id}}" > {{$charge->name}} </Option>
                    @endforeach

                </select>
                <x-jet-input-error for="charge_id"/>
            </div>
            <div>
                <x-jet-label value="Grupo"/>
                <select name="group_id" id="group_id" wire:model.defer="group_id" class="w-full mb-4">
                    <Option value="" > Seleccione un cargo </Option>
                    @foreach ($groups as $group)
                    <Option value="{{$group->id}}" > {{$group->name}} </Option>
                    @endforeach

                </select>
                <x-jet-input-error for="group_id"/>
            </div>
        </div>
        {{-- boton --}}
        <div class="flex items-center justify-end mt-4">
            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Creando empleado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                    Crear empleado
            </x-jet-button>

        </div>

    </div>
</div>
