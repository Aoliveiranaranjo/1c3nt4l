<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h2 class="text-3xl text-center font-semibold mb-8">Asignar mecánico para la avería</h2>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- orden y pedido--}}
            <div>
                <x-jet-label value="Orden: "/>
                <x-jet-input
                    value="O/{{ $production->order->orden }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Pedido: "/>
                <x-jet-input
                    value="P/{{ $production->order->pedido }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- pedido cliente y estado--}}
            <div>
                <x-jet-label value="Pedido cliente: "/>
                <x-jet-input
                    value="{{ $production->order->pedidoCliente }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Estado: "/>
                <x-jet-input
                    value="{{ $production->state_production->name }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 text-center mb-4">
            <div>
                <x-jet-label value="Nombre del artículo: " />
                <x-jet-input value="{{ $production->article->name }} " type="text" class="w-full text-center bg-gray-200"
                    disabled />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6 text-center mb-4">
            {{-- articulo codigo y articlulo nombre --}}
            <div>
                <x-jet-label value="Código del artículo: " />
                <x-jet-input value="{{ $production->order->article->CodeCentral }} " type="text"
                    class="w-50 text-center bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="% Producida: "/>
                <x-jet-input
                    value="{{number_format( $production->productionParts->sum('amount') * 100 / $production->order->amount )}}% "
                    type="text"
                    class="w-22 text-center bg-green-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Estado del artículo: " />
                <x-jet-input value="{{ $production->order->article->statusArticle }} " type="text"
                    class="w-50 text-center bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- cliente y cantidad a producir--}}
            <div>
                <x-jet-label value="Cliente: "/>
                <x-jet-input
                    value="{{ $production->order->customer->name }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-4">
            <div>
                <x-jet-label value="Cantidad a producir: "/>
                <x-jet-input
                    value="{{ number_format($production->order->amount )}} "
                    type="text"
                    class="w-full text-right  bg-blue-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Cantidad producida: "/>
                <x-jet-input
                    value="{{number_format( $production->productionParts->sum('amount') )}} "
                    type="text"
                    class="w-full text-right bg-green-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Cantidad pendiente de producir: "/>
                <x-jet-input
                    value="{{ number_format($production->order->amount - $production->productionParts->sum('amount') )}} "
                    type="text"
                    class="w-full text-right bg-red-200" disabled/>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6  mb-4">

            <div>
                <x-jet-label value="Tipo de orden"/>
                <x-jet-input
                    value="{{ $production->typeorder->name }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Sala"/>
                <x-jet-input
                    value="{{ $production->machine->room->nameRoom }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
            <div>
                <x-jet-label value="Máqiuna"/>
                <x-jet-input
                    value="{{ $production->machine->codMachine }}  {{ $production->machine->abbreviated }} "
                    type="text"
                    class="w-full  bg-gray-200" disabled/>
            </div>
            <br>
            <br>
        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            <div>
                <x-jet-label value="Selecciona un mecánico para la avería" />
                <select wire:model="fault.mechanic_asig"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full">
                    <option value="" disabled>Sin el mecánico asignado</option>
                    @foreach ($mechanics as $mechanic)
                        <option value="{{ $mechanic->id }}" selected>{{ $mechanic->abbreviated }}

                        </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="fault.mechanic_asig" />
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

</div>
