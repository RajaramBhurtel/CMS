<x-layout >
    <x-main title="Master Booking">
        <div class="p-4 bg-gray-100">
           <form id="searchForm" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="flex-grow">
                <label for="booking code" class="block text-gray-600">Booking Code</label>
                <input
                  type="text"
                  id="booking_code"
                  name="booking_code"
                  value="{{ request('booking_code') }}"
                  placeholder="Search by number"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                />
              </div>
              <!-- Consignee -->
              <div class="flex-grow">
                <label for="consignee" class="block text-gray-600">Consignee</label>
                <select id="consignee_id" name="consignee_id"class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    <option value>Choose Consignee</option>
                        @foreach ($consignees as $consignee)
                            <option
                                value="{{ $consignee->id }}"
                                {{ old('consignee->name') == $consignee->name ? 'selected' : '' }}
                            >{{ ucwords($consignee->name) }}</option>
                        @endforeach>
                </select>
              </div>
          
              <!-- Shipper -->
              <div class="flex-grow">
                <label for="shipper" class="block text-gray-600">Sender</label>
                <select id="shipper_id" name="shipper_id"class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    <option value>Choose Sender</option>
                        @foreach ($shippers as $shipper)
                            <option
                                value="{{ $shipper->id }}"
                                {{ old('shipper->name') == $shipper->name ? 'selected' : '' }}
                            >{{ ucwords($shipper->name) }}</option>
                        @endforeach>
                </select>
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
                <label for="location" class="block text-gray-600">Shipper Location</label>
                <input
                  type="text"
                  id="shipper_address2"
                  name="shipper_address2"
                  value="{{ request('shipper_address2') }}"
                  placeholder="Search by Location"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                />
              </div>
              <div class="flex-grow">
                <label for="location" class="block text-gray-600">Consignee Location</label>
                <input
                  type="text"
                  id="consignee_address2"
                  name="consignee_address2"
                  placeholder="Search by Location"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                />
              </div>

              <!-- Location -->
              <div class="flex-grow">
                <label for="location" class="block text-gray-600">Shipper Number</label>
                <input
                  type="text"
                  id="shipper_number"
                  name="shipper_number"
                  value="{{ request('shipper_number') }}"
                  placeholder="Search by number"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                />
              </div>
              <div class="flex-grow">
                <label for="location" class="block text-gray-600">Consignee Number</label>
                <input
                  type="text"
                  id="consignee_number"
                  name="consignee_number"
                  placeholder="Search by Number"
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
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Code</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booked</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Consignee</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                       
                                    </tr>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $booking->cn_no }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $booking->date }}
                                                    </div>
                                                </div>
                                            </td>
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
                                                        {{ $booking->consignee_number }}
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
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/booking/{{ $booking->id }}/view" class="text-blue-500 hover:text-blue-600"> <x-component.icons name="fa-regular fa-eye" /> View</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/booking/{{ $booking->id }}">
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
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </x-panel>
    </x-main >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#searchButton').on('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Gather form data
            var formData = {
                cn_no: $('#booking_code').val(),
                consignee_id: $('#consignee_id').val(),
                shipper_id: $('#shipper_id').val(),
                date: $('#sdate').val(),
                shipper_address2: $('#shipper_address2').val(),
                consignee_address2: $('#consignee_address2').val(),
                shipper_number: $('#shipper_number').val(),
                consignee_number: $('#consignee_number').val(),
            };

            // Send an AJAX request
            $.ajax({
                type: 'GET', // or 'POST', depending on your route and controller
                url: '/booking/search', // Replace with your route
                data: formData,
                success: function (data) {
                    $('body').html(data); // Update the results on the page
                }
            });
        });
    });
</script>

</x-layout >