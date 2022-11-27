<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h2 class="text-3xl text-center font-semibold mb-8">Inicio de Mecánicos. Orden: O/ {{ $production->order->orden }} </h2>

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
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- articulo codigo y articlulo nombre--}}
                <div>
                    <x-jet-label value="Código del artículo: "/>
                    <x-jet-input
                        value="{{ $production->order->article->CodeCentral }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>
                <div>
                    <x-jet-label value="Nombre del artículo: "/>
                    <x-jet-input
                        value="{{ $production->article->name }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- cliente y cantidad a producir--}}
                <div>
                    <x-jet-label value="cliente: "/>
                    <x-jet-input
                        value="{{ $production->order->customer->name }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>
                <div>
                    <x-jet-label value="cantidad a producir: "/>
                    <x-jet-input
                        value="{{ $production->order->amount }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-6  mb-4">
                {{-- cliente y cantidad a producir--}}
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
                        value="{{ $production->machine->codMachine }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>
            </div>

    </div>

    @if ( $production->start->production_id ?? "" == $production->id)
    @livewire('factory.show-mechanic-one', ['production' => $production], key('show-show-mechanic-one-' . $production->id))


    @else

    @livewire('factory.create-mechanic-factory', ['production' => $production], key('create-mechanic-factory-' . $production->id))


    @endif


</div>


