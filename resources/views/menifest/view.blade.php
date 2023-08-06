<x-layout >
  <x-main title="View Menifest">
    {{-- <a href=""  class="btn btn-primary" ><i class=""></i>&nbsp;&nbsp;PRINT CNNO</a> --}}
      <x-panel >
    <button type="submit" id="pbill" onclick="preview();" class="h-10   px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded-md">  <x-component.icons name="fa fa-print" /> Print</button>

        <div class="box-body table-responsive mt-[-10px]" id="datap">
    <center>
        <div id="logo" class="mt-5">
            <img class="mt-3 h-14 w-14 logo" src="{{ URL::asset('logo.png') }}" alt="EICCS" />
            <div class="p-3 company-details text-xs text-center">
                <h3 class="ml-95 text-lg font-bold text-center">Everest Innovative Courier & Cargo Service</h3>
                <hr class="border-dotted border-black w-380 ml-95 mt-1">
                <p class="ml-95 mt-2 text-xs">
                    Kalimati, Kathmandu, Nepal | Tel: 01-5244145, 01-5244257
                </p>
                <p class="ml-200 mt-1 website">
                    <span>www.eiccs.com.np</span>
                </p>
            </div>
        </div>
    </center>
    <br>
    <table>
        <tr>
            <td>Orgin: EICCS KTM</td>
            <td><span class="ml-2">Destination:</span> {{$menifest->location}}</td>
            <td><span class="ml-2">Mode:</span> {{$menifest->mode}}</td>
            <td><span class="ml-2">Date:</span> {{$menifest->date}}</td>
        </tr>
    </table>
    <br>
    <center>
        <table class="table table-bordered" id="branch_table">
            <tr class="text-xs bg-blue-500 text-white">
                <td>S.No</td>
                <td>CN.No</td>
                <td>Consignee</td>
                <td>Address</td>
                <td>Content</td>
                <td>Qty</td>
                <td>Wt</td>
            </tr>
            @php
                $i = 1;
                // dd($bookings);
            @endphp
            @foreach ($bookings as $booking)
                <tr class="text-xs bg-white">
                    <td>{{$i}}</td>
                    <td>{{$booking->cn_no}}</td>
                    <td>{{$booking->consignee_name}}</td>
                    <td>{{$booking->consignee_address1}}</td>
                    <td>{{$booking->merchandise_name}}</td>
                    <td>{{$booking->quantity}}</td>
                    <td>{{$booking->weight}}</td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </table>
    </center>
    <table class="table">
        <tr>
            <td>PREPARED BY<br></td>
            <td>RECEIVED BY<br></td>
            <td>DATE<br></td>
            <td>INCHARGE<br></td>
        </tr>
    </table>
</div><!-- /.box-body -->

        </div>

            
          
      </x-panel>      
  </x-main >
</x-layout >

<script type="text/javascript">
function preview(){
var printContents = document.getElementById('datap').innerHTML;
 var originalContents = document.body.innerHTML;

 document.body.innerHTML = printContents;
  // Add CSS styles for print media
  var style = document.createElement('style');
  style.innerHTML = `
    @media print {
      body {
        width: 148mm;
        height: 210mm;
      }
      
      #datap {
        width: 100%;
        height: 100%;
        page-break-after: auto;
        margin: 0 auto;
      }
      #datap {
  display: grid;
  grid-template-columns: 1fr 1fr; /* Two equal-width columns */
  gap: 10px; /* Gap between columns */
}

.left {
  grid-column: 1; /* Place left content in the first column */
}

.right {
  grid-column: 2; /* Place right content in the second column */
}

      /* Adjust other styles as needed */

    }
  `;
  document.head.appendChild(style);

 window.print();

 document.body.innerHTML = originalContents;
 document.head.removeChild(style);
} 
</script>