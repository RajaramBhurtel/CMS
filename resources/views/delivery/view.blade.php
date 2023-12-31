<x-layout >
  <x-main title="View Deliveries">
    {{-- <a href=""  class="btn btn-primary" ><i class=""></i>&nbsp;&nbsp;PRINT CNNO</a> --}}
      <x-panel >
    <button type="submit" id="pbill" onclick="preview();" class="h-10   px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">  <x-component.icons name="fa fa-print" /> Print</button>

        <div class="box-body table-responsive mt-[-10px]" id="datap">
    <center>
        <div id="logo" class="mt-5">
            <img class="mt-3 h-14 w-14 logo" src="{{ URL::asset('logo.png') }}" alt="EICCS" />
            <div class="p-3 company-details text-xs text-center">
                <h3 class="ml-95 text-lg font-bold text-center">Everest Innovative Courier & Cargo Service</h3>
                <hr class="border-dotted border-black w-380 ml-95 mt-1">
                <p class="ml-95 mt-2 text-xs">
                    Kalimati, Kathmandu, Nepal | Tel: 01-5244145, 01-5244257
                </p>
                <p class="ml-200 mt-1 website">
                    <span>www.eiccs.com.np</span>
                </p>
            </div>
        </div>
    </center>
    <br>
    <table>
        <tr>
            <td class="text-sm font-medium text-gray-900">Orgin: EICCS KTM</td>
            <td class="text-sm font-medium text-gray-900"><span class="ml-4" >Route:</span> {{  ucfirst( $delivery->route )}}</td>
            <td class="text-sm font-medium text-gray-900"><span class="ml-4">Vehicle:</span> {{  ucfirst(  $delivery->vehicle )}}</td>
            <td class="text-sm font-medium text-gray-900"><span class="ml-4">Date:</span> {{$delivery->date}}</td>
        </tr>
    </table>
    <br>
    <center>
        {{-- <table class="" id="">
            <tr class="text-xs bg-blue-500 text-white">
                <td>S.No</td>
                <td>CN.No</td>
                <td>Consignee</td>
                <td>Address</td>
                <td>Content</td>
                <td>Qty</td>
                <td>Wt</td>
            </tr>
            @php
                $i = 1;
                // dd($bookings);
            @endphp
            @foreach ($bookings as $booking)
                <tr class="text-xs bg-white">
                    <td>{{$i}}</td>
                    <td>{{$booking->cn_no}}</td>
                    <td>{{$booking->consignee_name}}</td>
                    <td>{{$booking->consignee_address1}}</td>
                    <td>{{$booking->merchandise_name}}</td>
                    <td>{{$booking->quantity}}</td>
                    <td>{{$booking->weight}}</td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </table> --}}
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S.No</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cn No</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Consignee</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content </th> 
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantaty </th> 
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Weight </th> 
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipped date </th> 
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status </th> 
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action </th> 
              </tr>
              @php
                $i = 1;
                // dd($bookings);
            @endphp
              @foreach ($bookings as $booking)
                  <tr>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$i}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->cn_no}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->consignee_name}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->consignee_address1}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->merchandise_name}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->quantity}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->weight}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{$booking->shipped_date}}
                              </div>
                          </div>
                      </td> 
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                                {{ ucfirst( $booking->status )}}
                              </div>
                          </div>
                      </td>
                      <td class="px-4 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="text-sm font-medium text-gray-900">
                               <form method="POST" action="/delivery/{{ $booking->id }}/update">
                                    @csrf
                                    @method('POST')
                                    <button class="text-xs text-green-400 hover:text-green-400"><x-component.icons name="fa-solid fa-trash-can" /> Delivered</button>
                                </form>
                                <form method="POST" action="/delivery/{{ $booking->id }}/cancel">
                                    @csrf
                                    @method('POST')
                                    <button class="text-xs text-red-400 hover:text-red-600"><x-component.icons name="fa-solid fa-trash-can" /> Cancelled</button>
                                </form>
                              </div>
                          </div>
                      </td>
                  </tr>
                  @php
                    $i++;
                @endphp
              @endforeach
          </tbody>
          
      </table>
    </center>
    <table class="table mt-5 min-w-full divide-y divide-gray-200">
        <tr class="justify-items-center">
            <td class="text-sm font-medium text-gray-900">Delivery BY : {{$delivery->user}}</td>
        </tr>
        <tr class="justify-items-center">
            <td class="text-sm font-medium text-gray-900">Route : {{ $route }}</td>
        </tr>
    </table>
</div><!-- /.box-body -->           
          
      </x-panel>      
  </x-main >
</x-layout >

<script type="text/javascript">
function preview(){
var printContents = document.getElementById('datap').innerHTML;
 var originalContents = document.body.innerHTML;

 document.body.innerHTML = printContents;
  // Add CSS styles for print media
  var style = document.createElement('style');
  style.innerHTML = `
    @media print {
      body {
        width: 148mm;
        height: 210mm;
      }
      
      #datap {
        width: 100%;
        height: 100%;
        page-break-after: auto;
        margin: 0 auto;
      }
      #datap {
  display: grid;
  grid-template-columns: 1fr 1fr; /* Two equal-width columns */
  gap: 10px; /* Gap between columns */
}

.left {
  grid-column: 1; /* Place left content in the first column */
}

.right {
  grid-column: 2; /* Place right content in the second column */
}

      /* Adjust other styles as needed */

    }
  `;
  document.head.appendChild(style);

 window.print();

 document.body.innerHTML = originalContents;
 document.head.removeChild(style);
} 
</script>