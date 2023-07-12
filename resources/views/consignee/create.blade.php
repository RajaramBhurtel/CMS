<x-layout >
    <x-main title="Create New Consignee">
        
          <x-panel>
            <div class="left-0  flex  justify-center bg-gray-200">
              <div class="bg-white rounded shadow-lg p-8">
                <div class="text-xl font-bold mb-4 text-center">ADD</div>
                <form id="consignee_add" method="post" action="/consignee/create">
                  @csrf
                  <table class="font-bold" style="font-size: 13px;">
                    <tbody>
                      <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
                      <tr>
                        <td>
                          Consignee Name&nbsp;<b class="street">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="name" id="name" placeholder="Consignee Name" class="ml-2 w-300 h-10 text-blue-400">
                        </td>
                        @error('name')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Address&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td  id="find_address">
                            <div id="autocomplete" class="autocomplete-container " data-address-type="consignee"></div>
                            <input type="hidden" name="consignee_address_1" id="consignee_address_1" >
                            <input type="hidden" name="consignee_address_2"  id="consignee_address_2" >
                            <input type="hidden" name="consignee_longitude"  id="consignee_longitude" >
                            <input type="hidden" name="consignee_latitude"  id="consignee_latitude" >
                        </td>
                        @error('address')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Phone No.&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="phone" id="phone" placeholder="Phone Number" class="ml-2 w-300 h-10 text-blue-400">
                        </td>
                        @error('phone')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Email&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="email" id="email" placeholder="Consignee Email" class="ml-2 w-300 h-10 text-blue-400">
                        </td>
                        @error('email')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <div class="text-center">
                    
                  <button class="bg-indigo-500 hover:bg-indigo-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded"> 
                    <x-component.icons name="fa fa-save" /> Save</button>

                  </div>
                </form>
                
              </div>
            </div>
          </x-panel> 
    </x-main >
</x-layout >
    