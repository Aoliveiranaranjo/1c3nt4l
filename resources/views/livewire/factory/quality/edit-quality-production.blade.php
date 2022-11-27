<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para editar ordenes</h1>

    <div class="grid grid-cols-2 gap-6  mb-4">

        <div>
            <x-jet-label value="Orden" />
            <x-jet-input value=" O/{{ $order->orden }}" type="text" class="w-full bg-gray-200" disabled>

            </x-jet-input>

        </div>
        <div>
            <x-jet-label value="Pedido" />
            <x-jet-input value=" P/{{ $order->pedido }}" type="text" class="w-full bg-gray-200" disabled />
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6  mb-4">

        <div>
            <x-jet-label value="Pedido cliente" />
            <x-jet-input value=" {{ $order->pedidoCliente ?? 'No Aplica' }}" type="text" class="w-full bg-gray-200"
                disabled>

            </x-jet-input>

        </div>
        <div>
            <x-jet-label value="Código Central" />
            <x-jet-input value=" {{ $order->article->CodeCentral }}" type="text" class="w-full bg-gray-200"
                disabled />
        </div>
    </div>


    <div class="grid grid-cols-2 gap-6  mb-4">

        <div>
            <x-jet-label value="Nombre del artículo" />
            <x-jet-input value=" {{ $order->article->name }}" type="text" class="w-full bg-gray-200" disabled>

            </x-jet-input>

        </div>
        <div>
            <x-jet-label value="Referencia del cliente" />
            <x-jet-input value=" {{ $order->article->CodeClient }}" type="text" class="w-full bg-gray-200"
                disabled />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6  mb-4">

        <div>
            <x-jet-label value="Nombre del cliente" />
            <x-jet-input value="{{ $order->article->customer->name }}" type="text" class="w-full bg-gray-200"
                disabled />

        </div>
    </div>


    <div class="grid grid-cols-3 gap-6  mb-4">

        <div>
            <x-jet-label value="Cantidad a producir" />
            <x-jet-input value=" {{ number_format($order->amount) }}" type="text"
                class="w-full text-right bg-blue-200" disabled>

            </x-jet-input>

        </div>
        <div>
            <x-jet-label value="Produción PT" />
            <x-jet-input value=" {{ number_format($order->qualityProductions->sum('unid')) }}" type="text"
                class="w-full text-right bg-green-200" disabled />
        </div>
        <div>
            <x-jet-label value="PT pendiente  " />
            <x-jet-input value=" {{ number_format($order->amount - $order->qualityProductions->sum('unid')) }}"
                type="text" class="w-full text-right bg-red-200" disabled />
        </div>

    </div>
    <div class="grid grid-cols-1 gap-6 mb-4">
        <div class="text-center">
            <x-jet-label value="% de PT producida: "/>
            <x-jet-input

                value="{{number_format(   $order->qualityProductions->sum('unid') * 100 / $order->amount  )}}% "
                type="text"
                class="w-30 text-center bg-green-200" disabled/>
        </div>
    </div>

    @livewire('factory.quality.show-internal-quality-production', ['order' => $order], key('show-internal-quality-production-' . $order->id))



</div>
