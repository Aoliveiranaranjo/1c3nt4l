<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h2 class="text-3xl text-center font-semibold mb-8">Producción Orden: O/ {{ $production->order->orden }} </h2>

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
            <div class="grid grid-cols-3 gap-6  mb-4">

                <div>
                    <x-jet-label value="Fecha inicio mecánico"/>
                    <x-jet-input
                        value="{{ $i = $production->start->created_at ?? 'Sin inicio' ? :  date('d/m/Y H:i:s', strtotime($production->start->created_at)) }} "
                        type="text"
                        class="w-full text-center  bg-gray-200" disabled/>
                </div>
                <div>
                    <x-jet-label value="Fecha inicio calidad"/>
                    <x-jet-input
                        value="{{ $i = $production->start->qualitie->created_at ?? 'Sin inicio' ? :   date('d/m/Y H:i:s', strtotime($production->start->qualitie->created_at ?? 'Sin inicio')) }} "
                        type="text"
                        class="w-full text-center  bg-gray-200" disabled/>
                </div>
                <div>
                    <x-jet-label value="Fecha inicio responsable"/>
                    <x-jet-input
                        value="{{ $i = $production->start->responsible->created_at ?? 'Sin inicio' ? :  date('d/m/Y H:i:s', strtotime( $production->start->responsible->created_at ?? 'Sin inicio'))  }} "
                        type="text"
                        class="w-full text-center  bg-gray-200" disabled/>
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
                    <x-jet-label value="Máquína"/>
                    <x-jet-input
                        value="{{ $production->machine->codMachine }} {{ $production->machine->abbreviated }} "
                        type="text"
                        class="w-full  bg-gray-200" disabled/>
                </div>

            </div>

            <br>
            <br>

            @if ($production->observation == null )

            @else
            <div class="grid grid-cols-1 gap-6  mb-4">
                <div class=" px-2 text-2x1 font-semibold leading-5 text-red-800 bg-gray-200 rounded">
                    <h2 class="px-2 text-2x1 font-semibold leading-5 text-red-800 bg-gray-200 rounded-full">Observaciones: </h2>
                    <h2 class="text-red-700 text-2xl ">{{ $production->observation }} </h2>

                </div>

            </div>
            @endif


    </div>


    @if ( $production->id = $production->start->production_id ?? "" )

    @livewire('factory.faults.view-fault-factory', ['production' => $production], key('faults.view-fault-factory-sistem-' . $production->id))

    @livewire('factory.show-incident-component-factory', ['production' => $production], key('show-incident-component-factory-' . $production->id))

    @livewire('factory.show-employee-component-factory', ['production' => $production], key('show-employee-component-factory-' . $production->id))

    @livewire('sistem.employee.show-employee-production-factory', ['production' => $production], key('show-employee-production-factory-' . $production->id))

    @livewire('factory.show-decrease-component-factory', ['production' => $production], key('show-decrease-component-factory-' . $production->id))

    @livewire('factory.show-production-part-component-factory', ['production' => $production], key('show-production-part-component-factory-' . $production->id))

    @else
        <div class="max-w-4xl py-12 text-gray-700">
        <h2 class="text-3xl text-center font-semibold mb-8">La O/{{ $production->order->orden }}, requiere el inicio de mecánica.</h2>
            <p class="text-2xl"> Por favor, contactar al departamento encargado del inicio de la producción. Gracias! </p>
        </div>
    @endif


</div>


