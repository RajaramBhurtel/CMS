<x-layout >
    <x-main title="Master Menifest">
<div class="p-4 bg-gray-100">
    <form id="searchForm" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="flex-grow">
            <label for="menifest code" class="block text-gray-600">Menifest Code</label>
            <input
            type="text"
            id="menifest_code"
            name="menifest_code"
            value="{{ request('menifest_code') }}"
            placeholder="Search by number"
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
            <label for="location" class="block text-gray-600">Location</label>
            <input
            type="text"
            id="location"
            name="location"
            value="{{ request('location') }}"
            placeholder="Search by Location"
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menifest Code</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipped On</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mode</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions </th>                                      </th>
                                    </tr>
                                    @foreach ($menifests as $menifest)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $menifest->menifests_code }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $menifest->date }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $menifest->location }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ ucfirst($menifest->mode) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-5">
                                                <a href="/menifest/{{ $menifest->id }}/view" class="text-blue-500 hover:text-blue-600"> <x-component.icons name="fa-regular fa-eye" /> View</a>
                                           
                                                <form method="POST" action="/menifest/{{ $menifest->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs text-red-400 hover:text-red-600"><x-component.icons name="fa-solid fa-trash-can" /> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="mt-4 place-items-center">
                            {{ $menifests->links() }}
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
                menifests_code: $('#menifest_code').val(),
                date: $('#sdate').val(),
                location: $('#location').val(),
            };

            // Send an AJAX request
            $.ajax({
                type: 'GET', // or 'POST', depending on your route and controller
                url: '/menifest/search', // Replace with your route
                data: formData,
                success: function (data) {
                    $('body').html(data); // Update the results on the page
                }
            });
        });
    });
</script>
</x-layout >
    