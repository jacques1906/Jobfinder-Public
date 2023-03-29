<header class="text-gray-600 body-font border-b border-gray-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('listings.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">JobsFinder</span>
        </a>





        <nav class="md:ml-auto flex flex-wrap items-center text-base">
            <a href="{{ route('users.index') }}" class="mr-5 hover:text-gray-900">recherche</a>
        </nav>    

        @if (auth()->check())
        <nav class="md:ml-auto flex flex-wrap items-center text-base">
            <a href="{{ route('dashboard') }}" class="mr-5 hover:text-gray-900">tableau de bord</a>
        </nav>
    @endif


        @if(!\Auth::check() || \Auth::user()->role == "Human_Resource")
        <a href="{{ route('listings.create') }}" class="md:ml-auto flex flex-wrap items-center text-base justify-center  bg-indigo-500 text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-600 rounded mr-2 ">postuler un emploi
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
        </a>
    @endif
    
    
<div class=" inline-flex items-center text-base mt-4 md:mt-0">
    @auth
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                <div>{{ Auth::user()->role}}  bienvenue {{ Auth::user()->name }}</div>

                <div class="ml-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
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

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Se connecter</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">S'enregistrer</a>
        @endif
    @endauth
</div>

<!-- Hamburger -->
<div class="flex items-center -mr-2 sm:hidden">
    <button @click="open = ! open"
            class="inline-flex justify-center items-center p-2 text-gray-400 rounded-md transition duration-150 ease-in-out hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
</div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
@auth
<div class="px-4">
    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
</div>

<div class="mt-3 space-y-1">
    <x-responsive-nav-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-responsive-nav-link>
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
</div>
@else
<div class="space-y-1">
    <x-responsive-nav-link :href="route('login')">
        {{ __('Login') }}
    </x-responsive-nav-link>
    @if (Route::has('register'))
        <x-responsive-nav-link :href="route('register')">
            {{ __('Register') }}
        </x-responsive-nav-link>
    @endif
</div>
@endauth
</div>
</div>
</div>


</header>
