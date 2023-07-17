<x-layout >
  <x-main title="View ">
    {{-- <a href=""  class="btn btn-primary" ><i class=""></i>&nbsp;&nbsp;PRINT CNNO</a> --}}
      <x-panel >
    <button type="submit" id="pbill" onclick="preview();" class="h-10   px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">  <x-component.icons name="fa fa-print" /> Print</button>

        <div id="datap">
          <div  class="flex  mx-auto my-10 border-2 border-black w-[700px] h-[400px]">
            <div class="left border-r-2 border-black w-3/4">
                <div class="top border-b border-black flex">
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
                <hr class="border-solid border-black ">
                <div class="bottom border-black h-5/6 ">
                    <table class="table m-2">
                      <tbody>
                        <tr >
                          <td class="w-1/2">
                            <span class="text-xs">
                              {{-- Origin: <br> --}}
                              Sender: <b class="text-xs">
                                      @php
                                        if ($booking->shipper_id) {
                                            $shipperName = App\Models\Shipper::find($booking->shipper_id)->name;
                                        } else {
                                            $shipperName = $booking->one_time_shipper;
                                        } 
                                      @endphp 
                                        {{ $shipperName }}  
                                      </b>
                              <br>
                              Number: <b class="text-xs">{{$booking->shipper_number}}</b><br>
                              Address: <b class="text-xs">{{$booking->shipper_address1}}, {{$booking->shipper_address2}}</b><br>
                              </b></b>
                            </span>
                          </td>
                          <td class="w-1/2">
                            <span class="text-xs">
                              Receiver: <b class="text-xs">
                              @php
                                    if ($booking->consignee_id) {
                                        $consigneeName = App\Models\Consignee::find($booking->shipper_id)->name;
                                    } else {
                                        $consigneeName = $booking->one_time_consignee;
                                    } 
                                @endphp 
                                  {{$consigneeName}}
                              </b>
                              <br>
                              Number: <b class="text-xs">{{$booking->consignee_number}}</b><br>
                              Address: <b class="text-xs">{{$booking->consignee_address1}}, {{$booking->consignee_address2}}</b><br>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="ml-8 text-xs mt-3 mb-3">
                      <hr class="border-solid border-black w-380 ml-95 mt-1">

                    <span class="ml-8 mb-2 text-xs">Description: &nbsp;{{$booking->description}} <b class="text-xs"></b>&nbsp;&nbsp;</span>
                    <table class=" border-solid border-black mt-2 ml-5 border-2 min-w-[95%]" >
                      <tbody>
                        <tr>
                          <td class="text-center text-xs border  border-black">Mailing Mode</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{$booking->mode === 'by_air' ? 'Air' : 'Surface'}}
                          </b></td>
                          <td class="text-center text-xs border  border-black">Payment Mode</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{ucfirst($booking->payment_mode)}}</b></td>
                        </tr>
                        <tr>
                          <td class="text-center text-xs border  border-black">Declared Value</td>
                          <td class="text-center border  border-black"><b class="text-xs">0</b></td>
                          <td class="text-center text-xs border  border-black">Quantity</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{$booking->quantity}}</b></td>
                        </tr>
                        <tr>
                          <td class="text-center text-xs border  border-black">Content</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{ucfirst($booking->content_type)}}</b></td>
                          <td class="text-center   text-xs border  border-black">Weight</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{$booking->weight}}</b></td>
                        </tr>
                        <tr>
                          <td class="text-center text-xs border  border-black">Booked On:</td>
                          <td class="text-center border  border-black"><b class="text-xs">{{$booking->date}} AD</b></td>
                          <td class="text-center text-xs border  border-black">Amount:</td>
                          <td class="text-center border  border-black"><b class="text-xs">Rs {{$booking->price_after_discount}}</b></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <p class=" text-xs mt-3 mb-3">
                      @php
                          $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                          $words = $formatter->format($booking->price_after_discount);
                      @endphp
                      Received with thanks NRs <b class="text-xs">{{$booking->price_after_discount}}</b>. In Words {{$words}}
                    </p>
              </div>
          </div>
          <div class="right w-1/4">
            <div class="top border-b border-black">
              <p class="text-xs text-center border ">
                <b>Courier Consignment</b>
              </p>
              <p class="text-center"></p>
              <div class=" text-center text-xs  w-176">
                {!! DNS1D::getBarcodeHTML('10000001', 'PHARMA',2,80, 'black', true) !!}
                {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlcyf1kJNUTZqLcHaLsR_gKfuoaumFl-Sd0m1Lgd3ADg&s" alt=""> --}}
               {{$booking->cn_no}}
              </div>
            </div>
            <div class="bottom h-5/6 p-1">
              <p class="text-center text-xs">
                <b>TERMS AND CONDITIONS:</b>
              </p>
              <p class=" text-xs mt-1 text-justify">
                Unless a greater value is declared in writing in the space provided on this airway bill and freight on
                value charges are paid, the shipper declares and agrees that the declared value of the shipment is up to
                Rs.100, the shipper agrees that he has read and understands the terms and conditions.
              </p>
              <p class="text-center text-xs mt-4">
                <b class="">Sabin Bhurtel</b>
                <br><br>
                -------------------<br>
                <span>
                  <b>For: EICCS</b>
                </span>
              </p>
            </div>
          </div>
        </div>
        </div>

            
          
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