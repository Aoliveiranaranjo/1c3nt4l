<section class="text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4 text-center">
            @can('adminGeAdmJPlanPlaniEncar.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('sistem.production.active') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl fa-solid fa-industry"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">@livewire('dashboard.dashboard-count-production-active')</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Producción</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncar.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('sistem.employee.dashboard.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl fa-solid fa-users-gear"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">@livewire('dashboard.dashboard-count-employees')</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Empleados</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarJefMecaMecCali.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.fault.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-red-500 w-12 h-12 mb-3 inline-block text-5xl fa-solid fa-wrench"></i>

                            <h2 class="title-font font-medium text-3xl text-red-900">@livewire('dashboard.dashboard-count-faults')</h2>
                            <p class="leading-relaxed text-red-900 text-2xl">Averías</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarJefMecaMecanico.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.change.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i
                                class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-sharp fa-solid fa-screwdriver-wrench"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">@livewire('dashboard.dashboard-count-change')</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Cambios</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarCalidad.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('quality.production.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl fa-solid fa-box"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">Producción</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900"> Calidad</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarCalidad.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.recontrol.show.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-solid fa-bottle-water"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">Recontroles</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Calidad</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarCalidad.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.qualities.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i
                                class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-solid fa-hourglass-start"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">Inicios</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Calidad</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarJefMecaMecanico.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.mechanic.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-solid fa-gears"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">Inicios</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Mecánicos</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarResponsable.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.production.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-solid fa-users-gear"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">@livewire('dashboard.dashboard-count-production-active')</h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">Fabricación</p>
                        </div>
                    </a>
                </div>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarCalAlma.view')
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <a href="{{ route('factory.store.pt.index') }}">
                        <div
                            class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                            <i class="text-indigo-600 w-12 h-12 mb-3 inline-block text-5xl  fa-solid fa-cubes"></i>

                            <h2 class="title-font font-medium text-3xl text-indigo-900">@livewire('dashboard.dashboard-count-store-pt') </h2>
                            <p class="leading-relaxed text-2xl text-indigo-900">PT Almacén</p>
                        </div>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</section>
