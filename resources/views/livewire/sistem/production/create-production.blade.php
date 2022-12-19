<div>

    <h2 class="text-3xl text-center font-semibold mb-8">Crear una producción relacionada a esta orden</h2>

        <div  class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- código del articulo--}}
                <div>
                    <x-jet-label value="Selecciona un tipo de producción"/>
                    <select class="w-full"
                        wire:model.defer="typeorder_id">
                        <option value="" disabled >Seleciona un tipo de producción</option>
                        @foreach ($typeorders as $typeorder)

                       <option value="{{ $typeorder->id }}" selected>{{ $typeorder->name }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="typeorder_id"/>
                </div>

                <div>
                    <x-jet-label value="Selecciona un estado de producción"/>
                    <select class="w-full"
                        wire:model.defer="state_production_id">
                        <option value="" disabled selected>Seleciona un estado de producción</option>
                        @foreach ($stateproductions as $stateproduction)

                    <option value="{{ $stateproduction->id }}" selected>{{ $stateproduction->name }}

                        </option>

                    @endforeach
                    </select>
                    <x-jet-input-error for="state_production_id"/>
                </div>

            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- código del articulo--}}
                <div>
                    <x-jet-label value="Selecciona una sala"/>
                    <select class="w-full"
                        wire:model="room_id">
                        <option value="" disabled  selected>Seleciona una sala</option>
                        @foreach ($rooms as $room)

                       <option value="{{ $room->id }}" selected>{{ $room->nameRoom }}

                        </option>

                       @endforeach
                    </select>
                    <x-jet-input-error for="room_id"/>
                </div>
                <div>
                    <x-jet-label value="Selecciona una maquína"/>
                    <select class="w-full"
                    wire:model.defer="machine_id">
                    <option value="" disabled selected>Seleciona una maquína</option>
                    @foreach ($machines as $machine)

                    <option value="{{ $machine->id }}" selected>{{ $machine->codMachine }}  {{ $machine->abbreviated }}

                    </option>

                    @endforeach
                </select>
                <x-jet-input-error for="machine_id"/>
            </div>

            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- pry --}}
                <div class="text-center">
                    <x-jet-label value="Prioridad de la producción"/>
                    <x-jet-input
                        wire:model.defer='pry'
                        type="number"
                        class=""/>
                    <x-jet-input-error for="pry"/>
                </div>

                {{--limpieza --}}
                <div class="text-center">
                    <x-jet-label>
                        Horas de limpieza
                    </x-jet-label>
                    <x-jet-input
                        wire:model.defer='cleaning'
                        type="number"
                        class="" >
                    </x-jet-input>

                    <x-jet-input-error for="cleaning"/>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- cambios --}}
                <div class="text-center">
                    <x-jet-label value="Horas por cambio"/>
                    <x-jet-input
                        wire:model.defer='changeH'
                        type="number"
                        class="" />
                    <x-jet-input-error for="changeH"/>
                </div>

               {{--Mul por unidad --}}
                <div class="text-center">
                    <x-jet-label>
                       Múltiplos por unidad
                    </x-jet-label>
                    <x-jet-input
                        wire:model.defer='multiUnid'
                        type="number"
                        class=""  >
                    </x-jet-input>

                    <x-jet-input-error for="multiUnid"/>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6  mb-4">
                {{-- observation --}}
                <div class="">
                    <x-jet-label value="Observaciones para la producción"/>
                    <x-jet-input
                        wire:model.defer='observation'
                        type="text"
                        class="w-full" />
                    <x-jet-input-error for="observation"/>
                </div>
            </div>



    {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
            Creado producción
            </x-jet-action-message>

            <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save">
                Crear producción
            </x-jet-button>

        </div>

    </div>

</div>

