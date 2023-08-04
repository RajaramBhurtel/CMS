<x-layout >
    <x-main title="Create Menifest">
        <div class="max-w-4xl mx-auto my-10 ">
            <form action="/manifest/createMenifest" method="post">
                @csrf
                <div class="mb-10">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex">
                            <div class="mr-10 flex-auto">
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input id="date" name="date" type="date" class="h-10 px-2  mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <select id="location" name="location"class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                                    <option value>Choose Location</option>
                                        @foreach ($address as $addrs)
                                            <option
                                                value="{{ $addrs }}"
                                                {{ old('addrs') == $addrs ? 'selected' : '' }}
                                            >{{ ucwords($addrs) }}</option>
                                        @endforeach>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                              
                <div class="box-body table-responsive" style="margin-top: -10px;">
                    <table class="table table-bordered" id="mytable">
                        <tr class="bg-gray-800 text-white">
                            <td class="p-2 border-white">CN No</td>
                            <td class="p-2 border-white">Consignee</td>
                            <td class="p-2 border-white"><nobr>Address</nobr></td>
                            <td class="p-2 border-white">Contact No</td>
                            <td class="p-2 border-white">Booked On</td>
                        </tr>
                        <tr>
                            <td class="p-1">
                                <input id="1" name="cn_no[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" onchange="cnBox(this.id);" autofocus="">
                               
                            </td>
                            <td class="p-1">
                                <input id="con_1" name="consignee[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                            <td class="p-1">
                                <input id="addr_1" name="address[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>

                            </td>
                            <td class="p-1">
                                <input id="cont_1" name="contact[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                          
                            <td class="p-1">
                                <input id="booked_1" name="booked_on[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                        </tr>
                    </table>
                    <div class="flex justify-center">
                        <button type="submit" class="h-10   px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">Save Manifest</button>
                    </div>
                </div>
                
            </form>
        </div>
    </x-main >
</x-layout >
    
<script type="text/javascript">
    function cnBox(a){
        var i = a;
        var cnNo = $("#"+a).val();
        var location = $("#location").val();
        if(!location){
            alert("Choose Destination Location !");
            $("#location").focu();
            $("#"+a).val(" ");
            $("#"+a).val(" ").replace(/\s+/g, '');
            return false;
        }
        var url = "/menifest/getRequiredmanifest";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                type: "POST",
                url: url,
                async: true,
                data: {cn_no : cnNo},
                //dataType: "json",
                success : function(data) {
                    if(data){
                        if(data == 'false'){
                            alert("MANIFEST ALREADY CREATED");
                            $("#"+a).val(" ").replace(/\s+/g, '');
                            $("#"+a).focus();
                            return false;
                        }
                        // var obj = JSON.parse(data);
                        if(data.consignee_address2 != location){
                            alert("CNNO NOT MATCH ACCORDING TO RECEIVER LOCATION !");
                        }
                        if(data.one_time_consignee){
                                console.log(data.one_time_consignee);
                                $("#con_"+a).val(data.one_time_consignee);
                            }else{
                                $("#con_"+a).val(data.consignee_name);
                            }
                            $("#addr_"+a).val(data.consignee_address1);
                            $("#cont_"+a).val(data.consignee_number);
                            $("#booked_"+a).val(data.date);
    
                            i++;

                            var html1 = '<td class="p-1"><input id="'+i+'" name="cn_no[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" onchange="cnBox(this.id);" autofocus=""></td><td class="p-1"><input id="con_'+i+'" name="consignee[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td>';
                            var html2 =  '<td class="p-1"><input id="addr_'+i+'" name="address[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td><td class="p-1"><input id="cont_'+i+'" name="contact[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td><td class="p-1"><input id="booked_'+i+'" name="booked_on[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td>';
                            document.getElementById("mytable").insertRow(-1).innerHTML = html1 + html2;
                                                        
//document.getElementById("mytable").insertRow(-1).innerHTML = '<td class="p-1"><input id="'+i+'" name="cn_no[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" onchange="cnBox(this.id);" autofocus=""></td><td class="p-1"><input id="con_'+i+'" name="consignee[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td><td class="p-1"><input id="addr_'+i+'" name="address[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td>
// <td class="p-1"><input id="cont_'+i+'" name="contact[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td><td class="p-1"><input id="booked_'+i+'" name="booked_on[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly></td>';
    
    $("#mytable tr:last td:first input").focus();
                    }
                }
            });
    
            
        
    }
    </script>