<x-layout >
    @php
        $total = 0 ;
    @endphp
    <x-main title="Cash Report">
        <div class="p-4 bg-gray-100">
           <form id="searchForm" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="flex-grow">
                <label for="booking code" class="block text-gray-600">From</label>
                <input
                  type="date"
                  id="date_from"
                  name="date_from"
                  value="{{ request('date_from') }}"
                  placeholder="Search by number"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                  required
                  />
              </div>
              
          
              <!-- Date -->
              <div class="flex-grow">
                <label for="date" class="block text-gray-600">To</label>
                <input
                  type="date"
                  id="date_to"
                  name="date_to"
                  value="{{ request('date_from') }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                  required
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
        @if ( isset($bookings ))
            <x-panel>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold  text-gray-500 uppercase tracking-wider">Booking Code</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold  text-gray-500 uppercase tracking-wider">Booked</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold  text-gray-500 uppercase tracking-wider">Sender</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold  text-gray-500 uppercase tracking-wider">Destination</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold  text-gray-500 uppercase tracking-wider">Amount</th>
                                        
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
                                                            if ($booking->shipper_id) {
                                                                $shipperName = App\Models\Shipper::find($booking->shipper_id)->name;
                                                            } else {
                                                                $shipperName = $booking->one_time_shipper;
                                                            } 
                                                        @endphp 
                                                            {{ $shipperName }} 
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
                                                            {{ $booking->price_after_discount }}
                                                        </div>
                                                    </div>
                                                </td> 
                                            </tr>
                                           <?php 
                                                $total += $booking->price_after_discount; 
                                           ?>
                                        @endforeach
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider"> </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider"></th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider"></th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">{{$total}}</th>
                                        
                                        </tr>
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
            
        @endif
    </x-main >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#searchButton').on('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Gather form data
            var formData = {
                from: $('#date_from').val(),
                to: $('#date_to').val(),
            };

            // Send an AJAX request
            $.ajax({
                type: 'GET', // or 'POST', depending on your route and controller
                url: '/report/search', // Replace with your route
                data: formData,
                success: function (data) {
                    $('body').html(data); // Update the results on the page
                }
            });
        });
    });
</script>

</x-layout >