<x-layout >
    <x-main title="Single Booking">
       <x-panel>
        <div class="max-w-4xl mx-auto my-10">
            <form>
                <div class="flex mb-4">
                    <div class="w-1/3 mr-2">
                        <label for="cn" class="block text-sm font-medium text-gray-700">CN No</label>
                        <input id="cn" type="text" class="h-10  mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="w-1/3 mx-2">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input id="date" type="date" class="h-10  mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="w-1/3 ml-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Payment Mode</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                        <input type="radio" class="h-10 form-radio text-indigo-500 focus:ring-indigo-500" name="payment-mode" value="cash">
                            <span class="ml-2">Cash</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                        <input type="radio" class="h-10 form-radio text-indigo-500 focus:ring-indigo-500" name="payment-mode" value="credit">
                            <span class="ml-2">Credit</span>
                        </label>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-1/2 mr-2">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="shipper" class="block text-sm font-medium text-gray-700">Shipper</label>
                                <select id="shipper" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div>
                                <input id="new_shipper" type="text" class="h-10 mt-6  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="shipper_number" class="block text-sm font-medium text-gray-700">Number</label>
                                <input id="shipper_number" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="shipper_city" class="block text-sm font-medium text-gray-700">City</label>
                                <input id="shipper_city" type="text" class="h-10  mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="shipper_location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input id="shipper_location" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                            </div>
                        
                        </div>
                    </div>
                    <div class="w-1/2 ml-2">
                        <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="consignee_name" class="block text-sm font-medium text-gray-700">Consignee Name</label>
                            <select id="consignee" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div>
                            <input id="new_consignee" type="text" class="h-10 mt-6  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="consignee_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                            <input id="consignee_number" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="consignee_city" class="block text-sm font-medium text-gray-700">City</label>
                            <input id="consignee_city" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="consignee_location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input id="consignee_location" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div>
                            <label for="content_type" class="block text-sm font-medium text-gray-700">Content Type</label>
                            <select id="content_type" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div>
                            <label for="merchandise_type" class="block text-sm font-medium text-gray-700">Merchandise Type</label>
                            <select id="merchandise_type" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div>
                            <label for="mode" class="block text-sm font-medium text-gray-700">Mode</label>
                            <select id="mode" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input id="quantity" type="number" value="0" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                            <input id="weight" type="number" value="0" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-5 gap-2">
                        <div>
                            <label for="individual_price" class="block text-sm font-medium text-gray-700">Individual Price</label>
                            <input id="individual_price" value="0" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="price-before-discount" class="block text-sm font-medium text-gray-700">Price Before Discount</label>
                            <input id="price-before-discount" value="0" type="h-10 text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                            <input id="discount" type="text" value="0" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="price-after-discount" class="block text-sm font-medium text-gray-700">Price After Discount</label>
                            <input id="price-after-discount" value="0" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="biller" class="block text-sm font-medium text-gray-700">Biller</label>
                            <input id="biller" type="text" class="h-10 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols gap-2">
                        <x-form.label name="description"/>
                        <textarea name="description" id="description" cols="10" rows="10" class=" mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="h-10  px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">Save Booking</button>
                </div>
            </form>
        </div>


       </x-panel>
    </x-main >
</x-layout >
    