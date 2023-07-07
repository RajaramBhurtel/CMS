<div class="sidebar max-h-screen top-0 h-screen bg-gray-800 text-blue-100 w-64 fixed inset-y-0 left-0 transform transition duration-200 ease-in-out z-50"
            x-data="{ open: true }" x-on:togglesidebar.window=" open = !open" x-show="true"
            :class="open === true ? 'md:translate-x-0 md:sticky ':'-translate-x-full' ">


            <header class=" h-[64px] py-2 shadow-lg px-4 md:sticky top-0 bg-gray-800 z-40">
                <!-- logo -->
                <a href="/" class="text-white flex items-center space-x-2 group hover:text-white">
                    <x-component.logo />
                </a>
            </header>


            <!-- nav -->
            <nav class="px-4 pt-4 scroller overflow-y-scroll max-h-[calc(100vh-64px)]" x-data="{selected:'Tasks'}">
                <ul class="flex flex-col space-y-2">

                    <!-- ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="/"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 ">
                            <div class="pr-2">
                                <x-component.icons name="fa-solid fa-gauge" />
                            </div>
                            <div>Dashboard </div>
                        </a>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Booking' ? '':'Booking')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <x-component.icons name="fa-solid fa-receipt" />
                            </div>
                            <div>Booking</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Booking') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Booking') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="{{ url('booking/single')}}"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Single Booking </div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="{{ url('/booking/bulk') }}"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> Bulk Booking </div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="{{ url('booking/master')}}"
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
                                <x-component.icons name="fa-solid fa-hard-drive" />
                            </div>
                            <div>Manifest</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Manifest') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
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
                                <x-component.icons name="fa-solid fa-truck" />
                            </div>
                            <div>Delivery</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Delivery') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
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
                                <x-component.icons name="fa-regular fa-rectangle-list" />
                            </div>
                            <div>Reports</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Reports') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
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
                        <a href="#" @click.prevent="selected = (selected === 'Shipper' ? '':'Shipper')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <x-component.icons name="fa-solid fa-users" />
                            </div>
                            <div>Shipper</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Shipper') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Shipper') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                            <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="{{ url('shipper/create')}}"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div>Create</div>
                                    </a>
                                </li>
                                <!-- Item -->
                                <li class="text-sm text-gray-500 ">
                                    <a href="{{ url('shipper/view')}}"
                                        class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                                        <div> View </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- List ITEM -->
                    <li class="text-sm text-gray-500 ">
                        <a href="#" @click.prevent="selected = (selected === 'Consignee' ? '':'Consignee')"
                            class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div class="pr-2">
                                <x-component.icons name="fa-solid fa-user-tie" />
                            </div>
                            <div>Consignee</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Consignee') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
                            </div>
                        </a>


                        <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                            :style="(selected === 'Consignee') ? 'max-height: ' + $el.scrollHeight + 'px':''">
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
                                <x-component.icons name="fa-solid fa-user" />
                            </div>
                            <div>Users</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Users') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
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
                                <x-component.icons name="fa-solid fa-bolt-lightning" />
                            </div>
                            <div>Merchandise</div>
                            <div class="absolute right-1.5 transition-transform duration-300"
                                :class="{ 'rotate-180': (selected === 'Merchandise') }">
                                <x-component.icons name="fa-solid fa-angle-down" />
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