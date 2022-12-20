<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

    <h1 class="mb-8 text-3xl font-semibold text-center">Introduzca la información que desea editar del articulo</h1>

    <div class="p-6 bg-white rounded-lg shadow-xl">



        <div class="grid grid-cols-1 gap-6 mb-4">
            {{-- código --}}
            <div>
                <div  wire:ignore>
                    <x-jet-label value="Selecciona un cliente:"/>
                    <select class="w-full select2"
                        wire:model="article.customer_id">
                       @foreach ($customers as $customer)

                       <option value="{{ $customer->id}}" selected>{{ $customer->name }}</option>

                       @endforeach
                    </select>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código del artículo"/>
                <x-jet-input
                    wire:model.defer='article.CodeCentral'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="article.CodeCentral"/>

            </div>
            {{-- nombre --}}
            <div>
                <x-jet-label value="Nombre del artículo"/>
                <x-jet-input
                    wire:model.defer='article.name'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="article.name"/>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6 mb-4">
            {{-- referencia cliente --}}
            <div>
                <x-jet-label value="Referecia cliente"/>
                <x-jet-input
                    wire:model.defer='article.CodeClient'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="article.CodeClient"/>
            </div>
            {{-- abreviación cliente --}}
            <div class="text-center">
                <x-jet-label value="Activo"/>
                <x-jet-input
                    wire:model.defer='article.status'
                    type="checkbox"
                    class="text-center"/>
                <x-jet-input-error for="article.status"/>
            </div>
            <div  wire:ignore>
                <x-jet-label value="Selecciona un estado del artículo:"/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model="article.statusArticle">
                <option value=""disabled>Seleccione un estado del artículo</option>


                <option value="NUEVO">NUEVO</option>
                <option value="AUTORIZADO ">AUTORIZADO</option>
                <option value="DEROGADO ">DEROGADO</option>
                <option value="PENDIENTE ">PENDIENTE</option>
                <option value="REPETICION ">REPETICION</option>
                <option value="RECHAZADO ">RECHAZADO</option>
                <option value="SUSPENDIDO ">SUSPENDIDO</option>

                </select>

             </div>
        </div>


        <x-jet-input-error for="article.statusArticle"/>
        {{-- boton --}}
        <div class="flex items-center justify-end mt-4">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save">
                    Actualizar artículo
            </x-jet-button>

        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change', function(){
                // alert(this.value)
                @this.set('article.customer_id', $(this).val());
            });
        })
    </script>


</div>
