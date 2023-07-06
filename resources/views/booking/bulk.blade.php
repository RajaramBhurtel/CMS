<x-layout >
    <x-main title="Bulk Booking">
        <div class="max-w-4xl mx-auto my-10 ">
            <form action="#">
                <div class="mb-10">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex">
                            <div class="mr-10 flex-auto">
                                <x-form.input-label name="booking_date" type="date"/>
                            </div>
                            <div>
                                <label for="booking_date_ad" class="block text-sm font-medium text-gray-700">Date BS:</label>
                                <select class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" name="customer" id="customer" style="width: 200px;">
                                    <option value="">Choose Customer</option>
                                    <option value="18">Gurans Life Insurance Co Ltd</option>
                                    <option value="19">Civil Bank Ltd</option>
                                    <option value="20">Vega Pharmaceuticals Pvt Ltd</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                              
                <div class="box-body table-responsive" style="margin-top: -10px;">
                    <table class="table table-bordered" id="mytable">
                        <tr class="bg-gray-800 text-white">
                            <td class="p-2 border-white">Consignee</td>
                            <td class="p-2 border-white">Description</td>
                            <td class="p-2 border-white"><nobr>M.Mode</nobr></td>
                            <td class="p-2 border-white">Content</td>
                            <td class="p-2 border-white">Location</td>
                            <td class="p-2 border-white">Address</td>
                            <td class="p-2 border-white">Weight</td>
                            <td class="p-2 border-white">Qty</td>
                            <td class="p-2 border-white"><nobr>Payment</nobr></td>
                            <td class="p-2 border-white">Amount</td>
                            <td class="p-2 border-white">M.Number</td>
                            <td class="p-2 border-white"><nobr>Cross Number</nobr></td>
                        </tr>
                        <tr>
                            <td class="p-1">
                                <x-form.input name="consignee[]"  />
                               
                            </td>
                            <td class="p-1">
                                <x-form.input name="desc[]"  />
                            </td>
                            <td class="p-1">
                                <select class="form-control h-10 mt-1  block w-36 shadow-md sm:text-sm border-gray-300 rounded-md " name="mailing_mode[]" id="mailing_mode_1">
                                    <option value="">Mailing</option>
                                    <option value="Surface">Surface</option>
                                    <option value="Air">By Air</option>
                                </select>
                            </td>
                            <td class="p-1">
                                <select name="mer_type[]" id="mer_type_1" class="form-control h-10 mt-1  block w-36 shadow-md sm:text-sm border-gray-300 rounded-md " autofocus>
                                    <option value="">Content</option>
                                    <option value="Doc">Doc</option>
                                    <option value="Non-Doc">Non-Doc</option>
                                </select>
                            </td>
                            <td class="p-1">
                                <select class="form-control h-10 mt-1  block w-36 shadow-md sm:text-sm border-gray-300 rounded-md " name="location[]" id="location_1">
                                    <option value="">Location</option>
                                    <option value="158">Dhanagdhimai, Siraha</option>
                                    <option value="1">Abhukhaireni</option>
                                    <option value="2">Acham/Mangalsen</option>
                                </select>
                            </td>
                            <td class="p-1">
                                <x-form.input name="address[]"  />
                            </td>
                            <td class="p-1">
                                <x-form.input name="weight[]" type="number" />
                            </td>
                            <td class="p-1">
                                <x-form.input name="qty[]" type="number" />
                            </td>
                            <td class="p-1">
                                <select name="payment_mode[]" id="payment_mode_1" class="w-36 h-10 mt-1  block w-36 shadow-md sm:text-sm border-gray-300 rounded-md ">
                                    <option value="cash" >Cashs</option>
                                    <option value="credit"  selected>Credit</option>
                                </select>
                            </td>
                            <td class="p-1">
                                <x-form.input name="cash_amount[]" type="number" />
                            </td>
                            <td class="p-1">
                                <x-form.input name="mobile[]" type="number" />
                            </td>
                            <td class="p-1">
                                <x-form.input name="cross_number[]" type="number" />
                            </td>
                        </tr>
                    </table>
                </div>
                
            </form>
        </div>
    </x-main >
</x-layout >
    
    