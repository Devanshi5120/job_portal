@extends('layouts.app')
@section('styles')
<style>
    .top_rw{ background-color:#f4f4f4; }
 .td_w{ }
 button{ padding:5px 10px; font-size:14px;}
 .invoice-box {
     max-width: 890px;
     margin: auto;
     padding:10px;
     border: 1px solid #eee;
     box-shadow: 0 0 10px rgba(0, 0, 0, .15);
     font-size: 14px;
     line-height: 24px;
     font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
     color: #555;
 }
 .invoice-box table {
     width: 100%;
     line-height: inherit;
     text-align: left;
     /* border-bottom: solid 1px #ccc; */
 }
 .invoice-box table td {
     padding: 5px;
     vertical-align:middle;
 }
 .invoice-box table tr td:nth-child(2) {
     text-align: right;
 }
 .invoice-box table tr.top table td {
     padding-bottom: 20px;
 }
 .invoice-box table tr.top table td.title {
     font-size: 45px;
     line-height: 45px;
     color: #333;
 }
 .invoice-box table tr.information table td {
     padding-bottom: 40px;
 }
 .invoice-box table tr.heading td {
     background: #eee;
     border-bottom: 1px solid #ddd;
     font-weight: bold;
     font-size:12px;
 }
 .invoice-box table tr.details td {
     padding-bottom: 20px;
 }
 .invoice-box table tr.item td{
     border-bottom: 1px solid #eee;
 }
 .invoice-box table tr.item.last td {
     border-bottom: none;
 }
 .invoice-box table tr.total td:nth-child(2) {
     border-top: 2px solid #eee;
     font-weight: bold;
 }
 @media only screen and (max-width: 600px) {
     .invoice-box table tr.top table td {
         width: 100%;
         display: block;
         text-align: center;
     }
     .invoice-box table tr.information table td {
         width: 100%;
         display: block;
         text-align: center;
     }
 }
 / RTL /
 .rtl {
     direction: rtl;
     font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
 }
 .rtl table {
     text-align: right;
 }
 .rtl table tr td:nth-child(2) {
     text-align: left;
 }
 </style>
@endsection
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('failed') }}
    <!-- here to 'withWarning()' -->
</div>
@endif


    <form action="{{ route('invoicereportData.index') }}" method="POST">
        @csrf
        <div class="row">   
            <a class="btn btn-default" id="btnExport" value="Export" style="margin-left: 350px;"><i class="fa fa-print"></i> Print</a>

        </div>
    </form>          

    <div id="tblCustomers" class="invoice-box" >
        <table cellpadding="0" cellspacing="0">
        <tr class="top_rw">
           <td colspan="2">
              <h2 style="margin-bottom: 0px;"> Tax invoice/Bill of Supply/Cash memo </h2>
              <span style=""> Number: 27B00032991LQ354 Date: 21-11-2018 </span>
           </td>
            <td  style="width:30%; margin-right: 10px;">
                PaytmMall Order Id: 6580083283
           </td>
        </tr>
        @if ($patient)
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                            <b> Sold By:{{ $patient->name}}</b> <br>
                                Delhivery Pvt. Ltd. Plot No. A5 Indian Corporation <br>
Warehouse Park Village Dive-anjur, Bhiwandi, Off <br>
Nh-3, Near Mankoli Naka, District Thane, Pin Code :
421302 <br>
Mumbai, Maharashtra - 421302 <br>
PAN: AALFN0535C <br>
GSTIN: 27AALFN0535C1ZK <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endif
            @if ($patient)
            <tr class="information">
                  <td colspan="3">
                    <table>
                        <tr>
                            <td colspan="2">
                            <b> Shipping Address:  </b> <br>
                            {{ $patient->address }} <br>
                            {{ $patient->city }}<br>
                            {{ $patient->mobileno }}<br>
                              
                            </td>
                            @endif
                            <td> <b> Billing Address: {{ $data['name'] }} </b> <br>
                                {{ $data['address'] }},<br>
                                {{ $data['city'] }},<br>
                                {{ $data['state'] }},<br>
                                {{ $data['pincode'] }}. <br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
                            <td colspan="3">
            <table cellspacing="0px" cellpadding="2px">
            <tr class="heading">
                <td style="width:25%;">
                    Medicine Name
                </td>
                <td style="width:10%; text-align:center;">
                    QTY.
                </td>
                <td style="width:10%; text-align:right;">
                    PRICE (INR)
                </td>
                 <td style="width:15%; text-align:right;">
                   TAX RATE & TYPE
                </td>
                 <td style="width:15%; text-align:right;">
                    TAX AMOUNT (INR)
                </td>
                 <td style="width:15%; text-align:right;">
                   TOTAL AMOUNT (INR)
                </td>
            </tr>
            @if ($medicinesale)
            {{-- @foreach($medicinesale as $invoice) --}}
            <tr class="item">
               <td style="width:25%;">
              {{$medicinesale->medicine->medicinename}}   
                </td>
                <td style="width:10%; text-align:center;">
                 {{ $medicinesale->medicine->stock }}
                </td>
                <td style="width:10%; text-align:right;">
                    {{ $medicinesale->medicine->price }}
                </td>
                 <td style="width:15%; text-align:right;">
                    {{$medicinesale->gst->value}}%
                </td>
                 <td style="width:15%; text-align:right;">
                    {{$medicinesale->price * $medicinesale->gst->value / 100}}
                </td>
                 <td style="width:15%; text-align:right;">
                    <p id="value">{{$medicinesale->price * $medicinesale->gst->value / 100 + $medicinesale->price}}</p>
                    
                </td>
            </tr>
       
            @endif

            <tr class="item">
               <td style="width:25%;"> <b> Grand Total </b> </td>
                <td style="width:10%; text-align:center;">
                    {{ $medicinesale->medicine->stock }}
                </td>
                <td style="width:10%; text-align:right;">
                     {{ $medicinesale->medicine->price }}
                </td>
                 <td style="width:15%; text-align:right;">
                </td>
                 <td style="width:15%; text-align:right;">
                    {{$medicinesale->price * $medicinesale->gst->value / 100}}
                </td>
                 <td style="width:15%; text-align:right;">
                    {{$medicinesale->price * $medicinesale->gst->value / 100 + $medicinesale->price}}
                </td>
            </tr>
            </td>
            </table>
            <tr class="total">
                  <td colspan="3" align="right">  Total Amount in Words :  <b  id="word">  </b> </td>
                 

            </tr>
            <tr>
               <td colspan="3">
                 <table cellspacing="0px" cellpadding="2px">
                    <tr>
                        <td width="50%">
                        <b> Declaration: </b> <br>
We declare that this invoice shows the actual price of the goods
described above and that all particulars are true and correct. The
goods sold are intended for end user consumption and not for resale.
                        </td>
                        <td>
                         * This is a computer generated invoice and does not
                          require a physical signature
                        </td>
                    </tr>
                     <tr>
                        <td width="50%">
                        </td>
                        <td>
                             <b> Authorized Signature </b>
                            <br>
                            <br>
                            ...................................
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>
                 </table>
               </td>
            </tr>
        </table>
    </div>
         </div>
        </div>
@endsection
@section('scripts')
    
{{-- Dowunload invoice pdf --}}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        });

        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/subcategory-by-id/" + id,
                    success: function(response) {
                        $("#subcategory_id").html("");
                        $.each(response, function(data, value) {
                            $("#subcategory_id").append($("<option></option>").val(value
                                .id).html(value.name));
                        })
                    }
                });
            });
            
    
            $(document).ready(function () {
  var amount = document.getElementById('value').textContent;
  var fraction = Math.round(frac(amount) * 100);
  var f_text = "";
  if (fraction > 0) {
    f_text = "AND " + convert_number(fraction) + " Paisa";
  }
  var words = convert_number(amount) + " Rupee " + f_text + " Only";
  document.getElementById("word").innerHTML = words;
  return convert_number(amount) + " Rupee " + f_text + " Only";
});
function frac(f) {
  return f % 1;
}
function convert_number(number) {
  console.log('number: ' + number);
  if ((number < 0) || (number > 999999999)) {
    return "NUMBER OUT OF RANGE!";
  }
  var Gn = Math.floor(number / 10000000); 
  number -= Gn * 10000000; 
  var kn = Math.floor(number / 100000); 
  number -= kn * 100000; 
  var Hn = Math.floor(number / 1000); 
  number -= Hn * 1000; 
  var Dn = Math.floor(number / 100); 
  number = number % 100; 
  var tn = Math.floor(number / 10); 
  var one = Math.floor(number % 10); 
  var res = "";

  if (Gn > 0) {
    res += (convert_number(Gn) + " Crore");
  }
  if (kn > 0) {
    res += (((res == "") ? "" : " ") +
    convert_number(kn) + " Lakh");
  }
  if (Hn > 0) {
    res += (((res == "") ? "" : " ") +
    convert_number(Hn) + " Thousand");
  }
  if (Dn) {
    res += (((res == "") ? "" : " ") +
    convert_number(Dn) + " Hundred");
  }
    
    var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen");
    
    var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");
    
    if (tn > 0 || one > 0) {
      if (!(res == "")) {
        res += " ";
      }
      if (tn < 2) {
        res += ones[tn * 10 + one];
      }
      else {
        res += tens[tn];
        if (one > 0) {
          res += (" " + ones[one]);
        }
      }
    }
    if (res == "") {
      res = "Zero";
    }
    return res;
  }
});
    </script>
@endsection
