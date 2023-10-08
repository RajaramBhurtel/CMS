<x-layout >
    <x-main title="Master Delivery">
        <div class="p-4 bg-gray-100">
            <form id="searchForm" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex-grow">
                    <label for="delivery code" class="block text-gray-600">Delivery Code</label>
                    <input
                    type="text"
                    id="delivery_code"
                    name="delivery_code"
                    value="{{ request('delivery_code') }}"
                    placeholder="Search by Code"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                    />
                </div>
            <!-- Date -->
                <div class="flex-grow">
                    <label for="date" class="block text-gray-600">Date</label>
                    <input
                    type="date"
                    id="sdate"
                    name="sdate"
                    value=""
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                    />
                </div>

            <!-- Location -->
                <div class="flex-grow">
                    <label for="location" class="block text-gray-600">Route</label>
                    <input
                    type="text"
                    id="route"
                    name="route"
                    value="{{ request('route') }}"
                    placeholder="Search by route"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                    />
                </div>

            <!-- Submit Button -->
                <div class="flex-grow">
                    <label for="search" class="block text-gray-600 invisible">Search</label>
                    <button
                    type="button"
                    id="searchButton"
                    class="w-full px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200"
                    >
                    Search
                    </button>
                </div>
            </form>
        </div>
        <x-panel>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S.N</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Code</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivered On</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions </th>                                      </th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($deliverys as $delivery)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $i }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $delivery->delivery_code }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ ucfirst($delivery->route) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ ucfirst($delivery->vehicle) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $delivery->date }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-5">
                                                <a href="/delivery/{{ $delivery->id }}/view" class="text-blue-500 hover:text-blue-600"> <x-component.icons name="fa-regular fa-eye" /> View</a>
                                           
                                                <form method="POST" action="/delivery/{{ $delivery->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs text-red-400 hover:text-red-600"><x-component.icons name="fa-solid fa-trash-can" /> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $i ++;
                                        @endphp
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="mt-4 place-items-center">
                            {{ $deliverys->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </x-panel>
    </x-main >
    <script>
        $(document).ready(function () {
            $('#searchButton').on('click', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Gather form data
                var formData = {
                    delivery_code: $('#delivery_code').val(),
                    date: $('#sdate').val(),
                    route: $('#route').val(),
                };

                // Send an AJAX request
                $.ajax({
                    type: 'GET', // or 'POST', depending on your route and controller
                    url: '/delivery/search', // Replace with your route
                    data: formData,
                    success: function (data) {
                        $('body').html(data); // Update the results on the page
                    }
                });
            });
        });
    </script>
</x-layout >
    