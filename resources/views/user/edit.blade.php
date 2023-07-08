<x-layout >
    <x-main title="Edit User">
        
          <x-panel>
            <div class="left-0  flex  justify-center bg-gray-200">
              <div class="bg-white rounded shadow-lg p-8">
                <div class="text-xl font-bold mb-4 text-center">EDIT</div>
                <form id="user_update" method="post" action="/user/{{$user->id}}/update">
                  @csrf
                  @method('PATCH')
                  <table class="font-bold" style="font-size: 13px;">
                    <tbody>
                      <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
                      <tr>
                        <td>
                          Name&nbsp;<b class="street">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="name" id="name" placeholder="Name" class="ml-2 w-300 h-10 text-blue-500" value="{{$user->name}}">
                        </td>
                        @error('name')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          User Name&nbsp;<b class="street">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="username" id="username" placeholder="User Name" class="ml-2 w-300 h-10 text-blue-500" value="{{$user->username}}">
                        </td>
                        @error('username')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Email&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="email" id="email" placeholder="User Email" class="ml-2 w-300 h-10 text-blue-500" value="{{$user->email}}">
                        </td>
                        @error('email')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                       <tr>
                        <td>
                          Role&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <select name="role" id="name" class="ml-2 w-300 h-10 text-blue-400">
                            <option value="User">General User</option>
                            <option value="Manager">Manager</option>
                          </select>
                        </td>
                        @error('role')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                      </tr>
                      <tr>
                        <td>
                          Password&nbsp;<b class="">*</b>
                        </td>
                        <td><span class="ml-1">:</span></td>
                        <td>
                          <input type="text" name="password" id="password" placeholder="User Password" class="ml-2 w-300 h-10 text-blue-500 placeholder-blue-400" value="">
                        </td>
                        @error('password')
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
    