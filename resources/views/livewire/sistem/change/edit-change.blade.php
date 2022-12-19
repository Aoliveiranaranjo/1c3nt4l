<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

    <h1 class="mb-8 text-3xl font-semibold text-center">Introduzca la información que desea editar del cambio</h1>


    <div class="container  mx-auto max-w-7xl sm:px-6 lg:px-8 bg-white shadow-xl rounded-lg p-6">

        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- orden y pedido --}}
            <div>
                <x-jet-label value="Orden: " />
                <x-jet-input value="O/{{ $change->production->order->orden }} " type="text" class="w-full  bg-gray-200"
                    disabled />
            </div>
            <div>
                <x-jet-label value="Pedido: " />
                <x-jet-input value="P/{{ $change->production->order->pedido }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- pedido cliente y estado --}}
            <div>
                <x-jet-label value="Pedido cliente: " />
                <x-jet-input value="{{ $change->production->order->pedidoCliente }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="Estado: " />
                <x-jet-input value="{{ $change->production->state_production->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- articulo codigo y articlulo nombre --}}
            <div>
                <x-jet-label value="Código del artículo: " />
                <x-jet-input value="{{ $change->production->order->article->CodeCentral }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="Nombre del artículo: " />
                <x-jet-input value="{{ $change->production->article->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- cliente y cantidad a producir --}}
            <div>
                <x-jet-label value="Cliente: " />
                <x-jet-input value="{{ $change->production->order->customer->name }} " type="text"
                    class="w-full  bg-gray-200" disabled />
            </div>
            <div>
                <x-jet-label value="Cantidad a producir: " />
                <x-jet-input value="{{ number_format($change->production->order->amount) }}" type="text"
                    class="w-full text-right bg-gray-200" disabled />
            </div>
        </div>



        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- pry --}}
            <div class="text-center">
                <x-jet-label value="Prioridad del cambio" />
                <x-jet-input wire:model.defer='change.pry' type="number" class="text-center" />
                <x-jet-input-error for="change.pry" />
            </div>
        </div>


        <div class="grid grid-cols-2 gap-6  mb-4">
            <div >
                <x-jet-label value="Selecciona un estado del cambio" />
                <select wire:model.defer="change.statechange_id" class="w-full  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" disabled>Seleciona un estado del cambio</option>
                    @foreach ($statechanges as $statechange)
                    <option value="{{ $statechange->id }}" selected>{{ $statechange->name }} </option>

                    @endforeach

                </select>
                <x-jet-input-error for="change.statechange_id" />
            </div>

            <div>
                <x-jet-label value="Selecciona un tipo de cambio" />
                <select wire:model.defer="change.typechange_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" disabled selected>Seleciona un tipo de cambio</option>
                    @foreach ($typechanges as $typechange)
                        <option value="{{ $typechange->id }}" selected>{{ $typechange->name }}

                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="change.typechange_id" />
            </div>

        </div>

        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- pry --}}
            <div class="">
                <x-jet-label value="Descripción del cambio" />
                <x-jet-input wire:model.defer='change.description' type="text" class="w-full" />
                <x-jet-input-error for="change.description" />
            </div>
        </div>


        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Editando cambio
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Editar Cambio
            </x-jet-button>

        </div>

    </div>

</div>
