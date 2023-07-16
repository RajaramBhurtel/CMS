<x-layout >
    <x-main title="View ">
        <x-panel>
          <div class="flex max-w-4xl mx-auto my-10 border-2 border-black">
            <div class="left border-r-2 border-black w-3/4">
              <div class="flex top border-b border-black">
                <img class="mt-3 h-20 w-20" src="{{ URL::asset ('logo.png') }}" alt="EICCS"/>
                <div class="p-3 text-center">
                  <h3 class="ml-95 text-2xl font-bold">Everest Innovative Courier & Cargo Service</h3>
                  <hr class="border-dotted border-black w-380 ml-95 mt-1">
                  <p class="ml-95 mt-2">
                    Kalimati , Kathmandu , Nepal | Tel : 01-5244145 , 01-5244257
                  </p>
                  <p class="ml-200 mt-1">
                    <span>www.eiccs.com.np</span>
                  </p>
                </div>
              </div>
              <hr class="border-solid border-black w-486 ml-n2 mt-n2">
              <div class="bottom  border-black">
                <table class="table m-8">
                  <tbody>
                    <tr >
                      <td class="w-1/2">
                        <span class="text-sm">
                          {{-- Origin: <br> --}}
                          Sender: <b class="text-base">
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
                          Number: <b class="text-base">{{$booking->shipper_number}}</b><br>
                          Address: <b class="text-base">{{$booking->shipper_address1}}, {{$booking->shipper_address2}}</b><br>
                          </b></b>
                        </span>
                      </td>
                      <td class="w-1/2">
                        <span class="text-sm">
                          Receiver: <b class="text-base">
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
                           Number: <b class="text-base">{{$booking->consignee_number}}</b><br>
                          Address: <b class="text-base">{{$booking->consignee_address1}}, {{$booking->consignee_address2}}</b><br>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <hr class="mb-4 border-black">

                <span class="ml-8 mb-2 text-sm">Description: &nbsp;{{$booking->description}} <b class="text-base"></b>&nbsp;&nbsp;</span>
                <table class=" border-solid border-black mt-2 ml-5 border-2 min-w-[95%]" >
                  <tbody>
                    <tr>
                      <td class="text-center border p-2 border-black">Mailing Mode</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{$booking->mode === 'by_air' ? 'Air' : 'Surface'}}
</b></td>
                      <td class="text-center border p-2 border-black">Payment Mode</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{ucfirst($booking->payment_mode)}}</b></td>
                    </tr>
                    <tr>
                      <td class="text-center border p-2 border-black">Declared Value</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">0</b></td>
                      <td class="text-center border p-2 border-black">Quantity</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{$booking->quantity}}</b></td>
                    </tr>
                    <tr>
                      <td class="text-center border p-2 border-black">Content</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{ucfirst($booking->content_type)}}</b></td>
                      <td class="text-center border p-2 border-black">Weight</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{$booking->weight}}</b></td>
                    </tr>
                    <tr>
                      <td class="text-center border p-2 border-black">Booked On:</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">{{$booking->date}} AD</b></td>
                      <td class="text-center border p-2 border-black">Amount:</td>
                      <td class="text-center border p-2 border-black"><b class="text-base">Rs {{$booking->price_after_discount}}</b></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-center  border p-2 border-black">&nbsp;Don't Put Cash in Envelope</td>

                    </tr>
                  </tbody>
                </table>
                <p class="ml-8 text-sm mt-3 mb-3">
                  @php
                      $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                      $words = $formatter->format($booking->price_after_discount);
                  @endphp
                  Received with thanks NRs <b class="text-base">{{$booking->price_after_discount}}</b>. In Words {{$words}}
                </p>
              </div>
            </div>
            <div class="right w-1/4">
              <div class="top border-b border-black">
                <p class="text-xs text-center border p-2">
                  <b>Courier Consignment <br>Note Non Negotiable</b>
                </p>
                <p class="text-center"></p>
                <div class="ml-15 pl-6 text-center overflow-auto w-176">
                  {!! DNS1D::getBarcodeHTML('11111111', 'PHARMA',2,80, 'black', true) !!}
                  {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlcyf1kJNUTZqLcHaLsR_gKfuoaumFl-Sd0m1Lgd3ADg&s" alt=""> --}}
                 {{$booking->cn_no}}
                </div>
              </div>
              <div class="bottom ">
                <p class="text-center mt-5 text-xs">
                  <b>TERMS AND CONDITIONS:</b>
                </p>
                <p class="ml-8 text-xs mt-1">
                  Unless a greater value is declared in writing in the space provided on this airway bill and freight on
                  value charges are paid, the shipper declares and agrees that the declared value of the shipment is up to
                  Rs.100, the shipper agrees that he has read and understands the terms and conditions set on that shipment
                  does not contain any currency or any material which violates the conditions of carriage
                </p>
                <hr class="border-solid border-black mt-4">
                <p class="text-center mt-4">
                  <b class="mt-2">Sabin Bhurtel</b>
                  <br><br><br>
                  ----------------------------------------<br>
                  <span>
                    <b>For: EICCS</b>
                  </span>
                </p>
              </div>
            </div>
          </div>

              
            
        </x-panel>      
    </x-main >
</x-layout >