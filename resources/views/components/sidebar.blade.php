<div class="sidebar max-h-screen top-0 h-screen bg-gray-800 text-blue-100 w-64 fixed inset-y-0 left-0 transform transition duration-200 ease-in-out z-50"
            x-data="{ open: true }" x-on:togglesidebar.window=" open = !open" x-show="true"
            :class="open === true ? 'md:translate-x-0 md:sticky ':'-translate-x-full' ">


            <header class=" h-[64px] py-2 shadow-lg px-4 md:sticky top-0 bg-gray-800 z-40">
                <!-- logo -->
                <a href="#" class="text-white flex items-center space-x-2 group hover:text-white">
                    <x-component.logo />
                </a>
            </header>


            <!-- nav -->
            <nav class="px-4 pt-4 scroller overflow-y-scroll max-h-[calc(100vh-64px)]" x-data="{selected:'Tasks'}">
                <ul class="flex flex-col space-y-2">

                    <!-- ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 ">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>Dashboard </div>
                        </a>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Booking' ? '':'Booking')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>Booking</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Booking') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Booking') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="booking/single"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Single Booking </div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Bulk Booking </div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Master Booking Records </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>            
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Manifest' ? '':'Manifest')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Manifest</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Manifest') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Manifest') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Create Menifest</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Master Menifest </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Delivery' ? '':'Delivery')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Delivery</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Delivery') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Delivery') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Delivery Runsheet</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Master Delivery </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Reports' ? '':'Reports')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Reports</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Reports') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Reports') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Daily Sales Report</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Daily Credit Report </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Customers' ? '':'Customers')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Customers</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Customers') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Customers') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Create</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> View </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Users' ? '':'Users')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Users</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Users') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>
                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Users') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Create</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> View </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Merchandise' ? '':'Merchandise')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                            </div>
                            <div>Merchandise</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Merchandise') }">
                                <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Merchandise') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="#"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> View </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>