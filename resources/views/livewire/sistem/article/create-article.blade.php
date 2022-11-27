<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear un artículo</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- código --}}
            <div  wire:ignore>
                <x-jet-label value="Selecciona un cliente:"/>
                <select class="select2 w-full "
                wire:model="customer_id">
                <option class="disable" value="">Seleccione un cliente</option>

                @foreach ($customers as $customer)
                <option value="{{ $customer->id}} ">{{ $customer->name }}</option>

                @endforeach

            </select>

        </div>
        <x-jet-input-error for="customer_id"/>

        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código del artículo"/>
                <x-jet-input
                    wire:model.defer='CodeCentral'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="CodeCentral"/>

            </div>
            {{-- referencia cliente --}}
            <div >
                <x-jet-label value="Referencia cliente"/>
                <x-jet-input
                    wire:model.defer='CodeClient'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="CodeClient"/>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- nombre cliente --}}
            <div>
                <x-jet-label value="Nombre del artículo"/>
                <x-jet-input
                    wire:model.defer='name'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="name"/>
            </div>

        </div>
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- código --}}
            <div  wire:ignore>
                <x-jet-label value="Selecciona un estado del artículo:"/>
                <select class="w-80 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model="statusArticle">
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
        <x-jet-input-error for="statusArticle"/>

        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando artículo
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save"
                class="ml-auto">
                    Crear artículo
            </x-jet-button>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change', function(){
                // alert(this.value)
                @this.set('customer_id', $(this).val());
            });
        })
    </script>
</div>
