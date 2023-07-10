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
                        <td>
                          <div id="autocomplete" class="autocomplete-container"></div>
                          <input type="hidden" name="address_1" id="address_1" value="{{$shipper->address_1}}">
                          <input type="hidden" name="address_2" id="address_2" value="{{$shipper->address_2}}">
                          <input type="hidden" name="longitude" id="longitude" value="{{$shipper->longitude}}">
                          <input type="hidden" name="latitude" id="latitude"   value="{{$shipper->latitude}}">
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
    @section('scripts')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
</x-layout >
    