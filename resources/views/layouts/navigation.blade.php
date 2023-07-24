<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <x-nav-dropdown title="Apps" align="right" width="48">
                        @can('view-any', App\Models\Commune::class)
                        <x-dropdown-link href="{{ route('communes.index') }}">
                        Communes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\SecteurActvite::class)
                        <x-dropdown-link href="{{ route('secteur-actvites.index') }}">
                        Secteur Actvites
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Programme::class)
                        <x-dropdown-link href="{{ route('programmes.index') }}">
                        Programmes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Phase::class)
                        <x-dropdown-link href="{{ route('phases.index') }}">
                        Phases
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\FormeJuridique::class)
                        <x-dropdown-link href="{{ route('forme-juridiques.index') }}">
                        Forme Juridiques
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ActifPoste::class)
                        <x-dropdown-link href="{{ route('actif-postes.index') }}">
                        Actif Postes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ChargePoste::class)
                        <x-dropdown-link href="{{ route('charge-postes.index') }}">
                        Charge Postes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\DevisFournisseur::class)
                        <x-dropdown-link href="{{ route('devis-fournisseurs.index') }}">
                        Devis Fournisseurs
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Poste::class)
                        <x-dropdown-link href="{{ route('postes.index') }}">
                        Postes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\TypeAccompagnement::class)
                        <x-dropdown-link href="{{ route('type-accompagnements.index') }}">
                        Type Accompagnements
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\TypeAccompPost::class)
                        <x-dropdown-link href="{{ route('type-accomp-posts.index') }}">
                        Type Accomp Posts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\TypeDocument::class)
                        <x-dropdown-link href="{{ route('type-documents.index') }}">
                        Type Documents
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\User::class)
                        <x-dropdown-link href="{{ route('users.index') }}">
                        Users
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Accompagnement::class)
                        <x-dropdown-link href="{{ route('accompagnements.index') }}">
                        Accompagnements
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\AccompagnementPost::class)
                        <x-dropdown-link href="{{ route('accompagnement-posts.index') }}">
                        Accompagnement Posts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Formation::class)
                        <x-dropdown-link href="{{ route('formations.index') }}">
                        Formations
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Module::class)
                        <x-dropdown-link href="{{ route('modules.index') }}">
                        Modules
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Porteur::class)
                        <x-dropdown-link href="{{ route('porteurs.index') }}">
                        Porteurs
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Projet::class)
                        <x-dropdown-link href="{{ route('projets.index') }}">
                        Projets
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Conseiller::class)
                        <x-dropdown-link href="{{ route('conseillers.index') }}">
                        Conseillers
                        </x-dropdown-link>
                        @endcan
                </x-nav-dropdown>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

                @can('view-any', App\Models\Commune::class)
                <x-responsive-nav-link href="{{ route('communes.index') }}">
                Communes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\SecteurActvite::class)
                <x-responsive-nav-link href="{{ route('secteur-actvites.index') }}">
                Secteur Actvites
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Programme::class)
                <x-responsive-nav-link href="{{ route('programmes.index') }}">
                Programmes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Phase::class)
                <x-responsive-nav-link href="{{ route('phases.index') }}">
                Phases
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\FormeJuridique::class)
                <x-responsive-nav-link href="{{ route('forme-juridiques.index') }}">
                Forme Juridiques
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ActifPoste::class)
                <x-responsive-nav-link href="{{ route('actif-postes.index') }}">
                Actif Postes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ChargePoste::class)
                <x-responsive-nav-link href="{{ route('charge-postes.index') }}">
                Charge Postes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\DevisFournisseur::class)
                <x-responsive-nav-link href="{{ route('devis-fournisseurs.index') }}">
                Devis Fournisseurs
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Poste::class)
                <x-responsive-nav-link href="{{ route('postes.index') }}">
                Postes
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\TypeAccompagnement::class)
                <x-responsive-nav-link href="{{ route('type-accompagnements.index') }}">
                Type Accompagnements
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\TypeAccompPost::class)
                <x-responsive-nav-link href="{{ route('type-accomp-posts.index') }}">
                Type Accomp Posts
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\TypeDocument::class)
                <x-responsive-nav-link href="{{ route('type-documents.index') }}">
                Type Documents
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\User::class)
                <x-responsive-nav-link href="{{ route('users.index') }}">
                Users
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Accompagnement::class)
                <x-responsive-nav-link href="{{ route('accompagnements.index') }}">
                Accompagnements
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\AccompagnementPost::class)
                <x-responsive-nav-link href="{{ route('accompagnement-posts.index') }}">
                Accompagnement Posts
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Formation::class)
                <x-responsive-nav-link href="{{ route('formations.index') }}">
                Formations
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Module::class)
                <x-responsive-nav-link href="{{ route('modules.index') }}">
                Modules
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Porteur::class)
                <x-responsive-nav-link href="{{ route('porteurs.index') }}">
                Porteurs
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Projet::class)
                <x-responsive-nav-link href="{{ route('projets.index') }}">
                Projets
                </x-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Conseiller::class)
                <x-responsive-nav-link href="{{ route('conseillers.index') }}">
                Conseillers
                </x-responsive-nav-link>
                @endcan

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>