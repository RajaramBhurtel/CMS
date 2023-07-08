<x-layout >
    <x-main title="Create New Merchandise">
        
          <x-panel>
            <div class="left-0  flex  justify-center bg-gray-200">
              <div class="bg-white rounded shadow-lg p-8">
                <div class="text-xl font-bold mb-4 text-center">ADD</div>
                <form id="merchandise_add" method="post" action="/merchandise/create">
                  @csrf
                  <table class="font-bold" style="font-size: 13px;">
                    <tbody>
                      <tr>
                        <td>
                          Merchandise Code&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="merchandise_code" id="merchandise_code" placeholder="Merchandise Code" value="{{ generateMerchandiseCode() }}" class="ml-2 w-300 h-10 text-blue-400" readonly>
                        </td>
                        @error('merchandise_code')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Merchandise Name&nbsp;<b class="street">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="name" id="name" placeholder="Merchandise Name" class="ml-2 w-300 h-10 text-blue-400">
                        </td>
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <div class="text-center">
                    <button class="bg-indigo-500 hover:bg-indigo-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded">
                      <x-component.icons name="fa fa-save" /> Save
                    </button>
                  </div>
                </form>               
              </div>
            </div>
          </x-panel> 
    </x-main >
</x-layout >

  @php
  function generateMerchandiseCode()
  {
      $lastCode = \App\Models\Merchandise::orderByDesc('id')->value('merchandise_code');

      if ($lastCode) {
          $codeNumber = intval(substr($lastCode, 2)) + 1;
          return 'MR' . str_pad($codeNumber, 3, '0', STR_PAD_LEFT);
      }

      return 'MR001';
  }
  @endphp
    