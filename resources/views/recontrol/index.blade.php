@extends('layouts.recontrol')

<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px8">

@section('content')
    <section class="text-gray-700  body-font">
        <div class="container px-5 py-24 mx-auto">

            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.recontrol.show.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">

                            <p class="leading-relaxed text-2xl text-indigo-900">Todos</p>
                        </div>
                    </a>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.recontrol.show.index.loreal') }}">
                        <div
                            class=" border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">


                            <p class="leading-relaxed text-2xl text-indigo-900">Loreal</p>
                        </div>
                </div>
                </a>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.recontrol.show.index.puig') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">


                            <p class="leading-relaxed text-2xl text-indigo-900">Puig</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

</div>
