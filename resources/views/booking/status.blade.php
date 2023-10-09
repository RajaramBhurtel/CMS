<x-layout >
    <x-main title="Check Status">
         <div class="p-4 bg-gray-100 flex">
            <form id="searchForm" class=" mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex-grow mb-4">
                    <label for="Booking" class="block mb-4 text-gray-600">Check Status by CN Number</label>
                    <input
                    type="text"
                    id="booking_code"
                    name="booking_code"
                    value="{{ request('booking_code') }}"
                    placeholder="Search by Code"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                    />
                </div>
                <div class="flex-grow">
                    <label for="search" class="block mb-4 text-gray-600 invisible">Search</label>
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
        @if ( isset($booking ))
            <x-panel>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Consignee</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Update</th>
                                       
                                    </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        @php
                                                        if ($booking->consignee_id) {
                                                            $consigneeName = App\Models\Shipper::find($booking->consignee_id)->name;
                                                        } else {
                                                            $consigneeName = $booking->one_time_consignee;
                                                        } 
                                                    @endphp 
                                                        {{ $consigneeName }} 
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $booking->consignee_address1 }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $booking->status }}
                                                    </div>
                                                </div>
                                            </td> 
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $booking->updated_at }}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-panel>
        @endif
    </x-main >
     <script>
        $(document).ready(function () {
            $('#searchButton').on('click', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Gather form data
                var formData = {
                    cn_no: $('#booking_code').val(),
                };

                // Send an AJAX request
                $.ajax({
                    type: 'GET', // or 'POST', depending on your route and controller
                    url: '/check', // Replace with your route
                    data: formData,
                    success: function (data) {
                        $('body').html(data); // Update the results on the page
                    }
                });
            });
        });
    </script>
</x-layout >
    