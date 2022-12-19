<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear una nueva orden</h1>

        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-1 gap-6  mb-4">
                {{-- código del articulo--}}
                <div  wire:ignore>
                    <x-jet-label value="Selecciona un artículo:"/>
                    <select class="select2 w-full"
                    wire:model="article_id">
                    <option class="disable" value="">Seleccione un artículo</option>

                    @foreach ($articles as $article)
                    <option value="{{ $article->id}} ">{{ $article->CodeCentral }}</option>

                    @endforeach

                </select>

                </div>
            <x-jet-input-error for="article_id"/>

            </div>

            <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- nombre del articulo --}}
                <div>
                    <x-jet-label value="Nombre del artículo"/>
                    <x-jet-input

                    value="{{ $article_id==''?'': $article->name  }}"
                    type="text"
                    class="w-full bg-gray-200" disabled/>


                </div>

                {{-- referencia articulo --}}


                <div >
                    <x-jet-label value="referencia del cliente"/>
                    <x-jet-input
                        value="{{ $article_id==''?'': $article->CodeClient  }}"
                        type="text"
                        class="w-full bg-gray-200" disabled/>


                </div>
            </div>

            <div class="grid grid-cols-1 gap-6  mb-4">
                {{-- nombre del cliente --}}
                    <div>
                        <x-jet-label value="Nombre del cliente"/>
                        <x-jet-input

                        value="{{ $article_id==''?'': $article->customer->name  }}"
                        type="text"
                        class="w-full bg-gray-200" disabled/>

                    </div>
                </div>
                <br>


            <div class="grid grid-cols-2 gap-6  mb-4">
                {{-- Pedido cliente --}}
                <div>
                    <x-jet-label value="Pedido cliente"/>
                    <x-jet-input
                        wire:model.defer='pedidoCliente'
                        type="text"
                        class="w-full"/>
                    <x-jet-input-error for="pedidoCliente"/>

                </div>
                {{-- Pedido Central --}}
                <div >
                    <x-jet-label>
                        Pedido Central: <b> P/ </b>
                    </x-jet-label>
                    <x-jet-input
                        wire:model.defer='pedido'
                        type="number"
                        class="w-full"/>
                        <x-jet-input-error for="pedido"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-6  mb-4">
                {{-- numero de orden --}}
                <div>
                    <x-jet-label>
                        Orden: <b> O/ </b>
                    </x-jet-label>
                    <x-jet-input
                        wire:model.defer='orden'
                        type="number"
                        class="w-full"/>
                    <x-jet-input-error for="orden"/>
                </div>
                            {{-- cantidad --}}
                <div>
                    <x-jet-label value="Cantidad a producir"/>
                    <x-jet-input
                        wire:model.defer='amount'
                        type="number"
                        class="w-full"/>
                    <x-jet-input-error for="amount"/>
                </div>
                {{-- fecha de entregra --}}
                <div>
                    <x-jet-label value="Fecha de entrega"/>
                    <x-jet-input
                        wire:model.defer='dateDelivery'
                        type="date"
                        class="w-full"/>
                    <x-jet-input-error for="dateDelivery"/>
                </div>
        </div>

        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando orden
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                    Crear orden
            </x-jet-button>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change', function(){
                // alert(this.value)
                @this.set('article_id', $(this).val());
            });
        })
    </script>
</div>
