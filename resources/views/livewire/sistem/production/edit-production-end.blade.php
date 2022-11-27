<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h2 class="text-3xl text-center font-semibold mb-8">Edición y vista de esta Producción </h2>

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
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- articulo codigo y articlulo nombre --}}
            <div>
                <x-jet-label value="Código del artículo: " />
                <x-jet-input value="{{ $production->order->article->CodeCentral }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="Nombre del artículo: " />
                <x-jet-input value="{{ $production->article->name }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- cliente y cantidad a producir --}}
            <div>
                <x-jet-label value="cliente: " />
                <x-jet-input value="{{ $production->order->customer->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="cantidad a producir: " />
                <x-jet-input value="{{ $production->order->amount }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">

            <div>
                <x-jet-label value="Fin de producción: " />
                <x-jet-input value="{{ date('d/m/Y', strtotime($production->dateEnd)) }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="cantidad a producir: " />
                <x-jet-input value="{{ $production->order->amount }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
        </div>
        @if ($production->productionparts->count())
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class="text-center">
                    <x-jet-label class="text-center" value="Cantidad producida: " />
                    <x-jet-input value="{{ $production->productionparts->sum('amount') }} " type="text"
                        class="text-right mb-4 text-2xl bg-green-200" disabled />
                </div>
            </div>
        @else
        @endif

        <div class="text-3xl text-center font-semibold mb-8">
            <h3>Si desea reactivar la producción debe quitar la selección de produccion cerrada.</h3>
        </div>
        <div class="text-2xl text-center font-semibold mb-8">
            <h3>Asi como seleccionar el estado, sala, máquina y observación de esta producción en la que desea continuar
            </h3>
        </div>


        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- fecha final --}}
            <div class="text-center">
                <x-jet-label value="Produccion cerrada" />
                <x-jet-input value="production.dateEnd" wire:model='production.dateEnd' type="checkbox "
                    class="text-center mt-1 border-blue-500" />
                <x-jet-input-error for="production.dateEnd" />
            </div>
        </div>



        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código del articulo --}}
            <div>
                <x-jet-label value="Selecciona un tipo de producción" />
                <select class="w-full" wire:model="production.typeorder_id">
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
                <select class="w-full" wire:model="production.state_production_id">
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
                <select class="w-full" wire:model="room_id">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" selected>{{ $room->nameRoom }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="room_id" />
            </div>


            <div>
                <x-jet-label value="Selecciona una maquína" />
                <select class="w-full" wire:model.defer="production.machine_id">
                    @foreach ($machines as $machine)
                        <option value="{{ $production->machine_id = $machine->id }}" selected>
                            {{ $machine->codMachine }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="production.machine_id" />
            </div>
        </div>


        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- observation --}}
            <div class="">
                <x-jet-label value="Observaciones para la producción" />
                <x-jet-input wire:model='production.observation' type="text" class="w-full" />
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

    @livewire('sistem.production.closed-edit-production', ['production' => $production], key('closed-edit-production-' . $production->id))

</div>
