<x-layout >
    <x-main title="Create Menifest">
        <div class="max-w-4xl mx-auto my-10 ">
            <form action="#">
                <div class="mb-10">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex">
                            <div class="mr-10 flex-auto">
                                
                                <x-form.input-label name="booking_date" type="date"/>
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
                                <x-form.input name="cn_no[]"  />
                               
                            </td>
                            <td class="p-1">
                                <input id="cn_no" name="consignee[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                            <td class="p-1">
                                <input id="cn_no" name="address[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>

                            </td>
                            <td class="p-1">
                                <input id="cn_no" name="contact[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                          
                            <td class="p-1">
                                <input id="cn_no" name="booked_on[]" type="text" class="h-10 px-2 mt-1  block w-full shadow-md sm:text-sm border-gray-300 rounded-md" value="" readonly>
                            </td>
                        </tr>
                    </table>
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
        var url = "https://techvisit.net/software/logistics/branch/manifest/getRequiredmanifest";
            $.ajax({
                type: "POST",
                url: url,
                async: true,
                data: {cn : cnNo, location : location},
                //dataType: "json",
                success : function(data) {
                    if(data){
                        //alert(data);
                        if(data == 'false'){
                            alert("MANIFEST ALREADY CREATED");
                            $("#"+a).val(" ").replace(/\s+/g, '');
                            $("#"+a).focus();
                            return false;
                        }
                            var obj = JSON.parse(data);
                            if(obj.con_address != location){
                                alert("CNNO NOT MATCH ACCORDING TO RECEIVER LOCATION !");
                            }
                            if(obj.one_time_con){
                                $("#con_"+a).val(obj.one_time_con);
                            }else{
                                $("#con_"+a).val(obj.consignee_name);
                            }
                            $("#addr_"+a).val(obj.location_name);
                            $("#cont_"+a).val(obj.con_mobile);
                            $("#booked_"+a).val(obj.booking_date_bs);
    
                            i++;
                            document.getElementById("mytable").insertRow(-1).innerHTML = '<td><input type="text" name="cnno[]" class="form-control" id="'+i+'" onChange="cnBox(this.id);" autofocus="true" /></td><td><input type="text" name="consignee_name[]" class="form-control" id="con_'+i+'" readonly></td><td><input type="text" name="address[]" class="form-control" id="addr_'+i+'" readonly></td><td><input type="text" name="contact[]" class="form-control" id="cont_'+i+'" readonly></td><td><input type="text" name="book[]" class="form-control" id="booked_'+i+'" readonly></td>';
                                $("#mytable tr:last td:first input").focus();
                            
                        
                    }
                }
            });
    
            
        
    }
    </script>