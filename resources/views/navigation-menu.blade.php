<div class="w-full text-white bg-black dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <a href="/" class="flex flex-row items-center space-x-4 text-lg font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                <img src="/img/logoW.png" class="w-10 h-10" alt="logo">
                <p>CARS Rent</p>
            </a>
            <div>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-red-500 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out " href="/">Home</a>
            <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-red-500 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out " href="/articles">Artciles</a>
            @can('manage-demande')
            <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-red-500 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out " href="/partner#articles">Partner</a>
            <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-red-500 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out " href="/partner#demandes">Demandes</a>
            @endcan
        </nav>


        <div class="flex flex-row justify-end pb-2 px-2">
            @if (auth()->user()->role == 2)
            @livewire('notification-bell')
            @livewire('cart-notification')
            @livewire('history-bell')
            @endif

            @livewire('feedback-bell')
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                   
                        @if(str_contains(Auth::user()->profile_photo_path, 'https') == true)
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                        @else
                            <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                        @endif   

                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                        <x-jet-dropdown-link href="/profile/{{ auth()->user()->id }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
    </div>
</div>