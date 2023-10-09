<nav class="bg-gray-800 shadow-xl sticky w-full top-0 text-black z-50" x-data="{ mobilemenue: false }">
    <div class="mx-auto ">
        <div class="flex items-stretch justify-between h-16">

            <div class="flex items-center">
                <div class="-mr-2 flex" x-data>
                    <!-- Mobile menu button -->
                    <button type="button" @click="$dispatch('togglesidebar')"
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="md:hidden flex items-center pl-6">
                <div class="flex-shrink-0 md:hidden">

                    <a href="#" class="text-white flex items-center space-x-2 group">
                        <x-component.logo/>
                    </a>
                </div>

                <!-- toggel sidebar -->
                <div class="text-white cursor-pointer hidden md:block" @click="$dispatch('togglesidebar')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>

            </div>
            <div class=" md:flex items-stretch">
                <!-- Profile Menu DT -->
                <div class="ml-4 flex md:ml-6 ">

                    <!-- Profile dropdown -->
                    <div class="relative bg-gray-700 px-4 text-gray-400 hover:text-white text-sm cursor-pointer"
                        x-data="{open: false}">
                        @auth
                            <div class="flex items-center min-h-full" @click="open = !open">

                                <div class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    {{-- <img class="h-8 w-8 rounded-full"
                                        src="https://assets.codepen.io/3321250/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1646800353&width=512"
                                        alt=""> --}}
                                </div>
                                
                                    <div class="flex flex-col ml-4">
                                        <span>{{ auth()->user()->name }} </span>
                                        <span>{{ auth()->user()->role }}</span>
                                    </div>
                            
                            </div>

                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-0 min-w-full rounded-b-md shadow py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" role="menu"
                                aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="/user/{{ auth()->user()->id }}/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">My Profile</a>

                                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Projects</a> --}}

                                <form method="POST" action="/user/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">
                                    @csrf
                                    <button type="submit">Sign out</button>
                                </form>
                            </div>
                         @else
                                <div class="flex flex-col mt-6">
                                    
                                    <span> <x-component.icons name="fa-regular fa-user" /> Guest </span>
                                </div>
                            @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>


</nav>