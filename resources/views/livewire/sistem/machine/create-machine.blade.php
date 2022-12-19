<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete la información para crear un máquina</h1>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6  mb-4">
            {{-- código --}}
            <div wire:ignore>
                <x-jet-label value="Selecciona una sala:" />
                <select class="select2 w-full " wire:model.defer="room_id">
                    <option class="disable" value="">Seleccione una sala</option>

                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }} ">{{ $room->nameRoom }}</option>
                    @endforeach

                </select>

            </div>
            <x-jet-input-error for="room_id" />

        </div>

        <div class="grid grid-cols-2 gap-6  mb-4">
            {{-- código --}}
            <div>
                <x-jet-label value="Código de la máquina" />
                <x-jet-input wire:model.defer='codMachine' type="text" class="w-full" />
                <x-jet-input-error for="codMachine" />
            </div>
            {{-- cadencia --}}
            <div>
                <x-jet-label value="Indica la cadencia" />
                <x-jet-input wire:model.defer='cadence' type="number" class="w-full" />
                <x-jet-input-error for="cadence" />
            </div>


        </div>
        <div class="grid grid-cols-2 gap-6  mb-4">

            {{-- nombre --}}
            <div>
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model.defer='name' type="text" class="w-full" />
                <x-jet-input-error for="name" />
            </div>
            <div>
                <x-jet-label value="Abreviación" />
                <x-jet-input wire:model.defer='abbreviated' type="text" class="w-full" />
                <x-jet-input-error for="abbreviated" />
            </div>
        </div>
        {{-- boton --}}
        <div class="flex  justify-end items-center mt-4">
            <x-jet-action-message class="mr-3  text-red-600" on="saved">
                Creando máquina
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                Crear máquina
            </x-jet-button>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('.select2').select2();
            $('.select2').on('change', function() {
                // alert(this.value)
                @this.set('room_id', $(this).val());
            });
        })
    </script>
</div>
