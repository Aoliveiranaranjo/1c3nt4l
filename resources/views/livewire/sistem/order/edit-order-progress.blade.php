<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para editar ordenes</h1>


    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6 mb-4">
            {{-- código --}}
            <div>
                <div wire:ignore>
                    <x-jet-label value="Selecciona un artículo:" />
                    <select class="w-full select2" wire:model="order.article_id">

                        @foreach ($articles as $article)
                            <option value="{{ $article->id }}" selected>{{ $article->CodeCentral }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6  mb-4">
                {{-- código del articulo --}}
                <div>
                    <x-jet-label value="Selecciona un estado de la orden:" />
                    <select class="w-full form-control" wire:model.defer="order.orderstate_id">
                        @foreach ($orderstates as $orderstate)
                            <option value="{{ $orderstate->id }}" selected>{{ $orderstate->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
            </div>
            <div class="grid grid-cols-1 gap-6  mb-4">

                {{-- materiales --}}
                <div class="text-center">
                    <x-jet-label>
                        Hay materiales
                    </x-jet-label>
                    <x-jet-input wire:model.defer='order.material' type="checkbox" class="text-center mt-1 border-blue-500">
                    </x-jet-input>

                    <x-jet-input-error for="order.material" />
                </div>


            </div>

            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- Pedido cliente --}}
                <div>
                    <x-jet-label value="Pedido cliente" />
                    <x-jet-input wire:model.defer='order.pedidoCliente' type="text" class="w-full" />
                    <x-jet-input-error for="order.pedidoCliente" />

                </div>
                {{-- Pedido Central --}}
                <div>
                    <x-jet-label>
                        Pedido Central: <b> P/ </b>
                    </x-jet-label>
                    <x-jet-input wire:model.defer='order.pedido' type="number" class="w-full" />
                    <x-jet-input-error for="order.pedido" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- numero de orden --}}
                <div>
                    <x-jet-label>
                        Orden: <b> O/ </b>
                    </x-jet-label>
                    <x-jet-input wire:model.defer='order.orden' type="number" class="w-full" />
                    <x-jet-input-error for="order.orden" />
                </div>
                {{-- cantidad --}}
                <div>
                    <x-jet-label value="Cantidad a producir" />
                    <x-jet-input wire:model.defer='order.amount' type="number" class="w-full" />
                    <x-jet-input-error for="order.amount" />
                </div>

            </div>

            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- fecha de entrega --}}
                <div>
                    <x-jet-label value="Fecha estimada de entrega" />
                    <x-jet-input wire:model.defer='order.dateDelivery' type="date" class="w-full" />
                    <x-jet-input-error for="order.dateDelivery" />
                </div>
                {{-- fecha de final --}}
                <div>
                    <x-jet-label value="Fecha de terminación" />
                    <x-jet-input wire:model.defer='order.dateEnd' type="date" class="w-full" />
                    <x-jet-input-error for="order.dateEnd" />
                </div>
            </div>

            {{-- boton --}}
            <div class="flex  justify-end items-center mt-4">
                <x-jet-action-message class="mr-3  text-red-600" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Editar orden
                </x-jet-button>

            </div>

        </div>
    </div>
    @livewire('sistem.order.show-order-production', ['order' => $order], key('show-order-production-' . $order->id))

    @livewire('sistem.production.create-production', ['order' => $order], key('create-production-' . $order->id))

    <script>
        document.addEventListener('livewire:load', function() {
            $('.select2').select2();
            $('.select2').on('change', function() {
                // alert(this.value)
                @this.set('order.article_id', $(this).val());
            });
        })
    </script>
</div>
