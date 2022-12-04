<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

    <h1 class="mb-8 text-3xl font-semibold text-center">Introduzca la información que desea editar de la máquina</h1>

    <div class="p-6 bg-white rounded-lg shadow-xl">



        <div class="grid grid-cols-1 gap-6 mb-4">
            {{-- código --}}
            <div  wire:ignore>
                <div  wire:ignore>
                    <x-jet-label value="Selecciona un cliente:"/>
                    <select class="w-full select2"
                        wire:model="machine.room_id">
                       @foreach ($rooms as $room)

                       <option value="{{ $room->id}}" selected>{{ $room->nameRoom }}</option>

                       @endforeach
                    </select>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código de la máquina"/>
                <x-jet-input
                    wire:model.defer='machine.codMachine'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="machine.codMachine"/>

            </div>
            {{-- nombre --}}
            <div>
                <x-jet-label value="Nombre de la máquina"/>
                <x-jet-input
                    wire:model.defer='machine.name'
                    type="text"
                    class="w-full"/>
                    <x-jet-input-error for="machine.name"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- referencia cliente --}}
            <div>
                <x-jet-label value="Cadencia"/>
                <x-jet-input
                    wire:model.defer='machine.cadence'
                    type="text"
                    class="w-full"/>
                <x-jet-input-error for="machine.cadence"/>
            </div>
            <div>
                <x-jet-label value="Abreviación" />
                <x-jet-input wire:model.defer='machine.abbreviated' type="text" class="w-full" />
                <x-jet-input-error for="machine.abbreviated" />
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 mb-4">
             <div>
                <x-jet-label value="Estado"/>
                    <x-jet-input
                        wire:model.defer='machine.status'
                        type="checkbox"
                        class="text-center"/>
                <x-jet-input-error for="machine.status"/>
           </div>
        </div>
        {{-- boton --}}
        <div class="flex items-center justify-end mt-4">

            <x-jet-action-message class="mr-3 text-red-600" on="saved">
                Actualizado
            </x-jet-action-message>

            <x-jet-button
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save">
                    Actualizar maquína
            </x-jet-button>

        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change', function(){
                // alert(this.value)
                @this.set('machine.room_id', $(this).val());
            });
        })
    </script>


</div>
