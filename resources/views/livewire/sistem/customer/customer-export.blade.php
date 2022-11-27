<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                Lista de clientes
            </h2>

            {{-- <a class="ml-auto" href="{{ route('sistem.articles.create') }}">
                <x-button-enlace>
                    Agregar articulo
                </x-button-enlace>
            </a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('sistem.customer.customer-filter')

        </div>
    </div>

</x-app-layout>
