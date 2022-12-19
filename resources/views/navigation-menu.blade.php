<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Escritorio
                    </x-jet-nav-link>
                    @can('adminGeAdmJPlanPlaniEncar.view')
                        <x-jet-nav-link href="{{ route('sistem.customer.index') }} " :active="request()->routeIs('sistem.customer.*')">
                            Clientes
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('sistem.article.index') }} " :active="request()->routeIs('sistem.article.*')">
                            Artículos
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('sistem.order.index') }} " :active="request()->routeIs('sistem.order.*')">
                            Ordenes
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('sistem.production.index') }} " :active="request()->routeIs('sistem.production.*')">
                            Planificación
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('sistem.change.index') }} " :active="request()->routeIs('sistem.change.*')">
                            Cambios
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('sistem.employee.index') }} " :active="request()->routeIs('sistem.employee.*')">
                            Emplead@s
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('sistem.machine.index') }} " :active="request()->routeIs('sistem.machine.*')">
                            Maquínas
                        </x-jet-nav-link>
                    @endcan
                    @can('responsables.view')
                        <x-jet-nav-link href="{{ route('factory.production.index') }} " :active="request()->routeIs('factory.production.*')">
                            Producción Salas
                        </x-jet-nav-link>
                    @endcan
                    @can('JefMecMecanicos.view')
                        <x-jet-nav-link href="{{ route('factory.mechanic.index') }} " :active="request()->routeIs('factory.mechanic.*')">
                            Inicio mecánico
                        </x-jet-nav-link>
                    @endcan
                    @can('calidad.view')
                        <x-jet-nav-link href="{{ route('factory.qualities.index') }} " :active="request()->routeIs('factory.qualities.*')">
                            Inicio calidad
                        </x-jet-nav-link>
                    @endcan

                    <div class="relative ml-3">
                        @can('admin.view')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">

                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        Listado
                                    </button>
                                    </span>
                                    <span class="inline-flex rounded-md">

                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Todos los listados...
                                    </div>
                                    <x-jet-nav-link href="{{ route('admin.users.index') }} " :active="request()->routeIs('admin.users.*')">
                                        Usuarios
                                    </x-jet-nav-link> <br>

                                    <x-jet-nav-link href="{{ route('admin.rooms.index') }} " :active="request()->routeIs('admin.rooms.*')">
                                        Salas
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('admin.state-changes.index') }} " :active="request()->routeIs('admin.state-changes.*')">
                                        Listado de Estado del cambio
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('admin.order-states.index') }} " :active="request()->routeIs('admin.order-states.*')">
                                        Lista de estado de ordenes
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.state-productions.index') }} "
                                        :active="request()->routeIs('admin.state-productions.*')">
                                        Lista de estado de producción
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.type-orders.index') }} " :active="request()->routeIs('admin.type-orders.*')">
                                        Lista de tipos de ordenes
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.incident-types.index') }} " :active="request()->routeIs('admin.incident-types.*')">
                                        Lista de tipos de incidencias
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.type-changes.index') }} " :active="request()->routeIs('admin.type-changes.*')">
                                        Lista de tipos de cambios
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.sexes.index') }} " :active="request()->routeIs('admin.sexes.*')">
                                        Tipos de sexo
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.charges.index') }} " :active="request()->routeIs('admin.charges.*')">
                                        Lista de tipos cargos
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.groups.index') }} " :active="request()->routeIs('admin.groups.*')">
                                        Tipos de grupos
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.mechanic.index') }} " :active="request()->routeIs('admin.mechanic.*')">
                                        Lista mecanicos
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.client-recontrol.index') }} " :active="request()->routeIs('admin.client-recontrol.*')">
                                        Lista clientes recontrol
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.type-fault.index') }} " :active="request()->routeIs('admin.type-fault.*')">
                                        Lista tipos averías
                                    </x-jet-nav-link>
                                    <x-jet-nav-link href="{{ route('admin.type-decrease.index') }} " :active="request()->routeIs('admin.type-decrease.*')">
                                        Lista tipos de mermas
                                    </x-jet-nav-link>
                                    <div class="border-t border-gray-100"></div>
                                    <!-- Authentication -->
                                </x-slot>
                            </x-jet-dropdown>
                        @endcan
                    </div>
                    <!-- Settings Dropdown de lista de vistas de fabrica de la app -->
                    <div class="relative ml-3">
                        @can('adminGeAdmJPlanPlaniEncar.view')
                            <x-jet-dropdown align="left" width="48">
                                <x-slot name="trigger">

                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        Fabricación
                                    </button>
                                    </span>
                                    <span class="inline-flex rounded-md">

                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Lista de fabricación...
                                    </div>

                                    <x-jet-nav-link href="{{ route('factory.production.index') }} " :active="request()->routeIs('factory.production.*')">
                                        Producción Salas
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('factory.mechanic.index') }} " :active="request()->routeIs('factory.mechanic.*')">
                                        Inicio mecánico
                                    </x-jet-nav-link>

                                    <x-jet-nav-link href="{{ route('factory.qualities.index') }} " :active="request()->routeIs('factory.qualities.*')">
                                        Inicio calidad
                                    </x-jet-nav-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                </x-slot>
                            </x-jet-dropdown>
                        @endcan
                    </div>


                </div>


            </div>













            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            @can('admin.view')
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
                            @endcan
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Escritorio
            </x-jet-responsive-nav-link>


            @can('adminGeAdmJPlanPlaniEncar.view')
                <x-jet-responsive-nav-link href="{{ route('sistem.customer.index') }}" :active="request()->routeIs('sistem.customer.*')">
                    Clientes
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sistem.article.index') }}" :active="request()->routeIs('sistem.article.*')">
                    Artículos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sistem.order.index') }}" :active="request()->routeIs('sistem.order.*')">
                    Ordenes
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sistem.order.index') }}" :active="request()->routeIs('sistem.order.*')">
                    Planificación
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sistem.change.index') }}" :active="request()->routeIs('sistem.change.*')">
                    Cambios
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sistem.employee.index') }}" :active="request()->routeIs('sistem.employee.*')">
                    Empleados
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('sistem.machine.index') }}" :active="request()->routeIs('sistem.machine.*')">
                    Maquínas
                </x-jet-responsive-nav-link>
            @endcan

            @can('admin.view')
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Zona Admin...
                </div>
                <x-jet-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                    Usuarios
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.rooms.index') }}" :active="request()->routeIs('admin.rooms.*')">
                    Salas
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.state-changes.index') }}" :active="request()->routeIs('admin.state-changes.*')">
                    Listado de Estado del cambio
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.order-states.index') }}" :active="request()->routeIs('admin.order-states.*')">
                    Lista de estado de ordenes
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.state-productions.index') }}" :active="request()->routeIs('admin.state-productions.*')">
                    Lista Estado de producción
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.type-orders.index') }}" :active="request()->routeIs('admin.type-orders.*')">
                    Lista Tipos de ordenes
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.incident-types.index') }}" :active="request()->routeIs('admin.incident-types.*')">
                    Lista Tipos de incidencias
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.type-changes.index') }}" :active="request()->routeIs('admin.type-changes.*')">
                    Lista Tipos de cambios
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.sexes.index') }}" :active="request()->routeIs('admin.sexes.*')">
                    Tipos de sexo
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.charges.index') }}" :active="request()->routeIs('admin.charges.*')">
                    Lista Tipos cargos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.groups.index') }}" :active="request()->routeIs('admin.groups.*')">
                    Tipos de grupos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.mechanic.index') }}" :active="request()->routeIs('admin.mechanic.*')">
                    Lista mecánicos
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.client-recontrol.index') }}" :active="request()->routeIs('admin.client-recontrol.*')">
                    Lista Clientes recontrol
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.type-fault.index') }}" :active="request()->routeIs('admin.type-fault.*')">
                    Lista Tipos averías
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('admin.type-decrease.index') }}" :active="request()->routeIs('admin.type-decrease.*')">
                    Lista Tipos de mermas
                </x-jet-responsive-nav-link>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarResponsable.view')
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Fabricación
                </div>
            @endcan

            @can('adminGeAdmJPlanPlaniEncarResponsable.view')
                <x-jet-responsive-nav-link href="{{ route('factory.production.index') }}" :active="request()->routeIs('factory.production.*')">
                    Producción Salas
                </x-jet-responsive-nav-link>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarJefMecaMecanico.view')
                <x-jet-responsive-nav-link href="{{ route('factory.mechanic.index') }}" :active="request()->routeIs('factory.mechanic.*')">
                    Inicio mecánico
                </x-jet-responsive-nav-link>
            @endcan
            @can('adminGeAdmJPlanPlaniEncarCalidad.view')
                <x-jet-responsive-nav-link href="{{ route('factory.qualities.index') }}" :active="request()->routeIs('factory.qualities.*')">
                    Inicio calidad
                </x-jet-responsive-nav-link>
            @endcan



        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                @can('admin.view')
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>
                @endcan

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
