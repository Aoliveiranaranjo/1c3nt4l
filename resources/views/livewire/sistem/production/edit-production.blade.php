<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h2 class="text-3xl text-center font-semibold mb-8">Edición y vista de esta Producción</h2>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- orden y pedido --}}
            <div>
                <x-jet-label value="Orden: " />
                <x-jet-input value="O/{{ $production->order->orden }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
            <div>
                <x-jet-label value="Pedido: " />
                <x-jet-input value="P/{{ $production->order->pedido }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- pedido cliente y estado --}}
            <div>
                <x-jet-label value="Pedido cliente: " />
                <x-jet-input value="{{ $production->order->pedidoCliente }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
            <div>
                <x-jet-label value="Estado: " />
                <x-jet-input value="{{ $production->state_production->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 text-center mb-4">
            <div>
                <x-jet-label value="Nombre del artículo: " />
                <x-jet-input value="{{ $production->article->name }} " type="text"
                    class="w-full text-center bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6 text-center mb-4">
            {{-- articulo codigo y articlulo nombre --}}
            <div>
                <x-jet-label value="Código del artículo: " />
                <x-jet-input value="{{ $production->order->article->CodeCentral }} " type="text"
                    class="w-50 text-center bg-gray-200" disabled />
            </div>
            @if ($production->productionparts->count())
            <div>
                <x-jet-label value="% Producida: " />
                <x-jet-input
                    value="{{ number_format(($production->productionParts->sum('amount') * 100) / $production->order->amount) }}% "
                    type="text" class="w-22 text-center bg-green-200" disabled />
            </div>
            @else
            @endif
            <div>
                <x-jet-label value="Estado del artículo: " />
                <x-jet-input value="{{ $production->order->article->statusArticle }} " type="text"
                    class="w-50 text-center bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- cliente y cantidad a producir --}}
            <div>
                <x-jet-label value="Cliente: " />
                <x-jet-input value="{{ $production->order->customer->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-4">
            <div>
                <x-jet-label value="Cantidad a producir: " />
                <x-jet-input value="{{ number_format($production->order->amount) }} " type="text"
                    class="w-full text-right  bg-blue-200" disabled />
            </div>
            @if ($production->productionparts->count())
                <div>
                    <x-jet-label value="Cantidad producida: " />
                    <x-jet-input value="{{ number_format($production->productionParts->sum('amount')) }} "
                        type="text" class="w-full text-right bg-green-200" disabled />
                </div>


            <div>
                <x-jet-label value="Cantidad pendiente de producir: " />
                <x-jet-input
                    value="{{ number_format($production->order->amount - $production->productionParts->sum('amount')) }} "
                    type="text" class="w-full text-right bg-red-200" disabled />
            </div>
            @else
            @endif
        </div>

        <div class="grid grid-cols-3 gap-6  mb-4">

            <div>
                <x-jet-label value="Tipo de orden" />
                <x-jet-input value="{{ $production->typeorder->name }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
            <div>
                <x-jet-label value="Sala" />
                <x-jet-input value="{{ $production->machine->room->nameRoom }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="Máqiuna" />
                <x-jet-input value="{{ $production->machine->codMachine }}   {{ $production->machine->abbreviated }} "
                    type="text" class="w-full  bg-gray-200" disabled />
            </div>

        </div>
        @if ($production->observation == null)
        @else
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class=" px-2 text-2x1 font-semibold leading-5 text-red-800 bg-gray-200 rounded">
                    <h2 class="px-2 text-2x1 font-semibold leading-5 text-red-800 bg-gray-200 rounded-full">
                        Observaciones: </h2>
                    <h2 class="text-red-700 text-2xl ">{{ $production->observation }} </h2>

                </div>

            </div>
        @endif


        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- pry --}}
            <div class="text-center">
                <x-jet-label value="Prioridad de la producción" />
                <x-jet-input wire:model.defer='production.pry' type="number" class="" />
                <x-jet-input-error for="production.pry" />
            </div>

            {{-- limpieza --}}
            <div class="text-center">
                <x-jet-label>
                    Horas de limpieza
                </x-jet-label>
                <x-jet-input wire:model.defer='production.cleaning' type="number" class="">
                </x-jet-input>

                <x-jet-input-error for="production.cleaning" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- cambios --}}
            <div class="text-center">
                <x-jet-label value="Horas por cambio" />
                <x-jet-input wire:model.defer='production.changeH' type="number" class="" />
                <x-jet-input-error for="production.changeH" />
            </div>

            {{-- Mul por unidad --}}
            <div class="text-center">
                <x-jet-label>
                    Múltiplos por unidad
                </x-jet-label>
                <x-jet-input wire:model.defer='production.multiUnid' type="number" class="">
                </x-jet-input>

                <x-jet-input-error for="production.multiUnid" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código del articulo --}}
            <div>
                <x-jet-label value="Selecciona un tipo de producción" />
                <select wire:model.defer="production.typeorder_id"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="" disabled>Sin tipo de producción</option>
                    @foreach ($typeorders as $typeorder)
                        <option value="{{ $typeorder->id }}" selected>{{ $typeorder->name }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="production.typeorder_id" />
            </div>

            <div>
                <x-jet-label value="Selecciona un estado de producción" />
                <select wire:model.defer="production.state_production_id"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    @foreach ($stateproductions as $stateproduction)
                        <option value="{{ $stateproduction->id }}" selected>{{ $stateproduction->name }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="production.state_production_id" />
            </div>

        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código del articulo --}}
            <div>
                <x-jet-label value="Selecciona una sala" />
                <select wire:model="room_id"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" selected>{{ $room->nameRoom }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="room_id" />
            </div>


            <div>
                <x-jet-label value="Selecciona una maquína" />
                <select wire:model="production.machine_id"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    @foreach ($machines as $machine)
                        <option value="{{ $production->machine_id = $machine->id }}" selected>
                            {{ $machine->codMachine }} {{ $machine->abbreviated }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="production.machine_id" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- fecha final --}}
            <div class="text-center">
                <x-jet-label value="Fin de producción" />
                <x-jet-input wire:model='production.dateEnd' type="checkbox "
                    class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="production.dateEnd" />
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- observation --}}
            <div class="">
                <x-jet-label value="Observaciones para la producción" />
                <x-jet-input wire:model.defer='production.observation' type="text" class="w-full" />
                <x-jet-input-error for="production.observation" />
            </div>
        </div>

        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>
            <div class="mb-4">

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Editar producción
                </x-jet-button>
            </div>
        </div>

    </div>

    @livewire('sistem.change.show-change-production', ['production' => $production], key('show-change-producion-' . $production->id))

    @livewire('sistem.change.create-change', ['production' => $production], key('create-change-' . $production->id))

</div>
