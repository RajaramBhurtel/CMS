<x-layout >
    <x-main title="Single Booking">
       <x-panel>
        <div class="max-w-4xl mx-auto my-10">
            @if($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="booking_add" method="post" action="/booking/createSingle">
                @csrf
                <div class="flex mb-4">
                    <div class="w-1/3 mr-2">
                        <label for="cn" class="block text-sm font-medium text-gray-700">CN No</label>
                        <input id="cn_no" name="cn_no" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="{{ generateBookingCode() }}" readonly>
                    </div>
                    <div class="w-1/3 mx-2">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input id="date" name="date" type="date" class="h-10 px-2  mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="w-1/3 ml-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" name="category" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            <option value="Domestic">Domestic</option>
                            <option value="International">International</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Payment Mode</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                        <input type="radio" id="payment_mode" name="payment_mode" class="h-10 px-2 form-radio text-indigo-500 focus:ring-indigo-500" name="payment-mode" value="cash" checked>
                            <span class="ml-2">Cash</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                        <input type="radio" id="payment_mode" name="payment_mode" class="h-10 px-2 form-radio text-indigo-500 focus:ring-indigo-500" name="payment-mode" value="credit">
                            <span class="ml-2">Credit</span>
                        </label>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="shipper" class="block text-sm font-medium text-gray-700">Shipper</label>
                                <select id="shipper_id" name="shipper_id" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md"  onChange="getAddress('shipper', this.value);">
                                    <option value>Choose Shipper</option>
                                    @foreach (\App\Models\Shipper::all() as $shipper)
                                    <option
                                        value="{{ $shipper->id }}"
                                        {{ old('shipper_id') == $shipper->id ? 'selected' : '' }}
                                    >{{ ucwords($shipper->name) }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div>
                                <input id="one_time_shipper" name="one_time_shipper" type="text" placeholder="Create new shipper" class="h-10 px-2 mt-6  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="shipper_number" class="block text-sm font-medium text-gray-700">Number</label>
                                <input id="shipper_number" name="shipper_number" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div id="find_address">
                                <label for="shipper_address" class="block text-sm font-medium text-gray-700">Address</label>
                                <div id="autocomplete" class="autocomplete-container billing" data-address-type="shipper"></div>
                                <input type="hidden" name="shipper_address1" id="shipper_address_1" >
                                <input type="hidden" name="shipper_address2" id="shipper_address_2" >
                                <input type="hidden" name="shipper_longitude" id="shipper_longitude" >
                                <input type="hidden" name="shipper_latitude" id="shipper_latitude" >
                            </div>
                        
                        </div>
                    </div>
                    <div class="w-1/2 ml-2">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="consignee" class="block text-sm font-medium text-gray-700">Shipper</label>
                                <select id="consignee_id" name="consignee_id" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md " onChange="getAddress('consignee', this.value);">
                                    <option value>Choose Consignee</option>
                                    @foreach (\App\Models\Consignee::all() as $consignee)
                                        <option
                                            value="{{ $consignee->id }}"
                                            {{ old('consignee_id') == $consignee->id ? 'selected' : '' }}
                                        >{{ ucwords($consignee->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input id="one_time_consignee" name="one_time_consignee" type="text" placeholder="Create new consignee" class="h-10 px-2 mt-6  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="consignee_number" class="block text-sm font-medium text-gray-700">Number</label>
                                <input id="consignee_number" name="consignee_number"  type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div id="find_address">
                                <label for="consignee_address" class="block text-sm font-medium text-gray-700">Address</label>
                                <div id="autocomplete" class="autocomplete-container billing" data-address-type="consignee"></div>
                                <input type="hidden" name="consignee_address1" id="consignee_address_1" >
                                <input type="hidden" name="consignee_address2"  id="consignee_address_2" >
                                <input type="hidden" name="consignee_longitude"  id="consignee_longitude" >
                                <input type="hidden" name="consignee_latitude"  id="consignee_latitude" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div>
                            <label for="content_type" class="block text-sm font-medium text-gray-700">Content Type</label>
                            <select id="content_type" name="content_type"  class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option value="doc">Doc</option>
                                <option value="non_doc">Non Doc</option>
                            </select>
                        </div>
                        <div>
                            <label for="merchandise_type" class="block text-sm font-medium text-gray-700">Merchandise Type</label>
                            <select id="merchandise_code" name="merchandise_code"class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option value>Choose Merchandise</option>
                                    @foreach (\App\Models\Merchandise::all() as $merchandise)
                                        <option
                                            value="{{ $merchandise->id }}"
                                            {{ old('merchandise_id') == $merchandise->id ? 'selected' : '' }}
                                        >{{ ucwords($merchandise->name) }}</option>
                                    @endforeach>
                            </select>
                        </div>
                        <div>
                            <label for="mode" class="block text-sm font-medium text-gray-700">Mode</label>
                            <select id="mode" name="mode" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option value="surface">Surface</option>
                                <option value="by_air">By Air</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input id="quantity" name="quantity" type="number" value="0" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                            <input id="weight" name="weight" type="number" value="0" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div>
                            <label for="individual_price" class="block text-sm font-medium text-gray-700">Individual Price</label>
                            <input id="individual_price" name="individual_price"  value="0" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="price-before-discount" class="block text-sm font-medium text-gray-700">Price Before Discount</label>
                            <input id="price_before_discount" name="price_before_discount" value="0" type="h-10 px-2 text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                            <input id="discount" name="discount" type="text" value="0" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="price-after-discount" class="block text-sm font-medium text-gray-700">Price After Discount</label>
                            <input id="price_after_discount"  name="price_after_discount" value="0" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="biller" class="block text-sm font-medium text-gray-700">Biller</label>
                            <input id="biller" name="biller"  type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="Sabin Bhurtel" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols gap-2">
                        <x-form.label name="description"/>
                        <textarea name="description" id="description" cols="10" rows="10" class=" mt-1 px-4 block w-full shadow-md sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="h-10   px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">Save Booking</button>
                </div>
            </form>
        </div>


       </x-panel>
    </x-main >
</x-layout >
<script>
    // function getShipperAddress(){
    //     var shipper_code = $("#shipper").val();
    //     var url = "/booking/getShipperAddress";
    //             $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             type: "POST",
    //             url: url,
    //             async: true,
    //             data: {shipper_id : shipper_code},
    //             success : function(data) {
    //                 if(data){
    //                     // console.log(data.address_1);
    //                     $("#address_1").val(data.address_1);
    //                     $("#address_2").val(data.address_2);
    //                     $("#longitude").val(data.longitude);
    //                     $("#latitude").val(data.latitude);

    //                 }
    //             }
    //         });
    // }
    // function getConsigneeAddress(){
    //     var consignee_code = $("#consignee").val();
    //     var url = "/booking/getConsigneeAddress";
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             type: "POST",
    //             url: url,
    //             async: true,
    //             data: {consignee_id : consignee_code},
    //             success : function(data) {
    //                 if(data){
    //                     // console.log(data.address_1);
    //                     $("#address_1").val(data.address_1);
    //                     $("#address_2").val(data.address_2);
    //                     $("#longitude").val(data.longitude);
    //                     $("#latitude").val(data.latitude);

    //                 }
    //             }
    //         });
    // }

    function getAddress(entity, id) {
        var url = "/booking/get" + entity.charAt(0).toUpperCase() + entity.slice(1) + "Address";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: url,
            async: true,
            data: { [entity + "_id"]: id },
            success: function(data) {
                console.log(data);
                if (data) {
                    $("#" + entity + "_address_1").val(data.address_1);
                    $("#" + entity + "_address_2").val(data.address_2);
                    $("#" + entity + "_longitude").val(data.longitude);
                    $("#" + entity + "_latitude").val(data.latitude);
                    $("#" + entity + "_number").val(data.phone);
                }
            }
        });
    }

</script>
@php
function generateBookingCode()
{
    $lastCode = \App\Models\Booking::orderByDesc('id')->value('cn_no');

    if ($lastCode) {
        $codeNumber = intval(substr($lastCode, 2)) + 1;
        return str_pad($codeNumber, 8, '0', STR_PAD_LEFT);
    }

    return '10000001';
}

@endphp