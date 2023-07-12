<x-layout >
    <x-main title="Edit Shipper">
        
          <x-panel>
            <div class="left-0  flex  justify-center bg-gray-200">
              <div class="bg-white rounded shadow-lg p-8">
                <div class="text-xl font-bold mb-4 text-center">EDIT</div>
                <form id="shipper_update" method="post" action="/shipper/{{$shipper->id}}/update">
                  @csrf
                  @method('PATCH')
                  <table class="font-bold" style="font-size: 13px;">
                    <tbody>
                      <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
                      <tr>
                        <td>
                          Shipper Name&nbsp;<b class="street">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="name" id="name" placeholder="Shipper Name" class="ml-2 w-300 h-10 text-blue-500" value="{{$shipper->name}}">
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
                        <td id="find_address">
                          <div id="autocomplete" class="autocomplete-container" data-address-type="shipper"></div>
                          <input type="hidden" name="shipper_address_1" id="shipper_address_1" >
                          <input type="hidden" name="shipper_address_2" id="shipper_address_2" >
                          <input type="hidden" name="shipper_longitude" id="shipper_longitude" >
                          <input type="hidden" name="shipper_latitude" id="shipper_latitude" >
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
                          <input type="text" name="phone" id="phone" placeholder="Phone Number" class="ml-2 w-300 h-10 text-blue-500" value="{{$shipper->phone}}">
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
                          <input type="text" name="email" id="email" placeholder="Shipper Email" class="ml-2 w-300 h-10 text-blue-500" value="{{$shipper->email}}">
                        </td>
                        @error('email')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <div class="text-center">
                    
                  <button class="bg-indigo-600  hover:bg-indigo-800 text-white uppercase text-sm font-semibold px-4 py-2 rounded"> 
                    <x-component.icons name="fa fa-save" /> Update</button>

                  </div>
                </form>
                
              </div>
            </div>
          </x-panel> 
    </x-main >
</x-layout >
    