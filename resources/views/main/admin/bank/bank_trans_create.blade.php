@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='alltranc';
@endphp
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ট্রানজেকসন এড @else Transaction Add @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) ট্রানজেকসন এড @else Transaction Add @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) ট্রানজেকসন এড @else Transaction Add @endif</h3>
            </div>
            <div class="box-body">

               <form id="dynamic_form"    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">@if ( Auth::User()->language == 1 ) ট্রানজেকসন রেকর্ড @else TRANSACTION RECORD @endif</h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Trans. No:</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="trans_no"  value="{{$pay_track}}"  readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date"   value="{{ date('Y-m-d', strtotime(now())) }}" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label>Note</label>
                              <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="e.g. Narration"><?php if(isset($_SESSION['axes_joudata']['note'])){echo $_SESSION['axes_joudata']['note'];}?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th>Deposit From</th>
                                    <th>Balance</th>
                                    <th>Deposit To</th>
                                    <th>Balance</th>
                                    <th>Amount</th>
                                    <th>Cheque</th>
                                    <th>Date</th>
                                    <th>Ref</th>
                                    <th>option</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                 <th colspan="4" style="text-align:center;">Total</th>
                                 <th colspan="1" style="text-align:center;"><input type="text" id="total_count" name="total"></th>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_journal" id="submit" class="btn btn-flat bg-purple btn-sm" value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('banktransaction-list')}}" class="btn btn-flat bg-gray ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- page script -->
<script>
   var number=0;
   $(document).ready(function(){

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {

     html = '<tr>';
           html += '<th style="width:200px;"><select class="form-control select2"  name="deposit_from[]"><option selected value="">-No Sourch-</option><option value="cash">Cash</option>@foreach($bankAccount as $account)<option value="{{$account->bank->sort}}-{{$account->acc_no}}">{{$account->acc_no}}-{{$account->bbrname}}-{{$account->bank->sort}}</option>@endforeach</select></th>';
           html += '<th style="width:50px;"><span>$ </span><span id="sbalance">0.00</span></th>';
           html += '<th style="width:200px;"><select onchange="getNewVal(this);" class="form-control select2" name="deposit_to[]" id="supplier_id"><option value="">-Select-</option><option value="cash">Cash</option>@foreach($bankAccount as $account)<option value="{{$account->bank->sort}}-{{$account->acc_no}}">{{$account->acc_no}}-{{$account->bbrname}}-{{$account->bank->sort}}</option>@endforeach</select></th>';
           html += '<th style="width:50px;"><span>৳ </span><span id="balance">0.00</span></th>';
           html += '<th style="width:200px;"><input type="text"  style="width:200px;" maxlength="10" class="form-control" id="ämount'+count+'" name="amount[]" placeholder="e.g. 500" onchange="get_total_amount('+count+')" autocomplete="off"></th>';
           html += '<th style="width:150px;"><input type="text" maxlength="25" class="form-control" name="cheque_no[]" onchange="show_cheque_date('+count+')"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
           html += '<th style="width:100px;"><input type="date"  style="width:200px; display:none;"class="form-control" id="ceque_date'+count+'" name="cheque_date[]"  placeholder="Date:" autocomplete="off" ></th>';
           html += '<th style="width:200px;"><input type="text" maxlength="35" class="form-control" name="ref[]"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
           if(number > 1)
           {
               html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
               $('tbody').append(html);
           }
           else
           {
               html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
               $('tbody').html(html);
           }
    }

    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });

    $('#dynamic_form').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url:'{{ route("banktransactionlist-store-route") }}',
               method:'POST',
               data:$(this).serialize(),
               dataType:'json',
               beforeSend:function(){
                   $('#save').attr('disabled','disabled');
               },
               success:function(data)
               {
                   if(data.error)
                   {
                       var error_html = '';
                       for(var count = 0; count < data.error.length; count++)
                       {
                           error_html += '<p>'+data.error[count]+'</p>';
                       }
                       $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                   }
                   else
                   {
                     //   dynamic_field(1);
                     //   $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                       window.location.href = "{{ route('banktransaction-list')}}";
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });

   });




</script>



<script type="text/javascript">

   // function getNewVal(item)
   //  {
   //      const base_url = "{{ url('/').'/' }}";

   //  var mysupplier_id = $("#supplier_id").val();
   //  $.ajax({
   //  type: "get",
   //  url: base_url+"get-supplier-bnk-invoice/"+item.value,
   //  cache: false,
   //  success: function(data){
        
   //      let data_html='';
   //      data.result.invoices.forEach(element => {
   //          data_html+=`
   //              <tr>
   //              <td>
   //              <input type="checkbox" name="purchase_detail_id[]" value="${element.id}"></td>
   //              <td>${element.purchase_track}</td>
   //              <td>${element.item_name}</td>
   //              <td>${element.grand_total}</td>
   //              </tr>
   //          `
   //      });
   //      data_html+='';
   //      $('#itemdata').append(data_html);
   //      $('#balance').html(data.payable_amount);
   //  }
   //  })
        
   //  }

    function getBalance(item)
    {
    //     const base_url = "{{ url('/').'/' }}";

    // var mysupplier_id = $("#supplier_id").val();
    // $.ajax({
    // type: "get",
    // url: base_url+"get-supplier-invoice/"+item.value,
    // cache: false,
    // success: function(data){
    //     // console.log(data);
    //     let data_html='';
    //     data.result.invoices.forEach(element => {
    //         data_html+=`
    //             <tr>
    //             <td>
    //             <input type="checkbox" name="purchase_detail_id[]" value="${element.id}"></td>
    //             <td>${element.purchase_track}</td>
    //             <td>${element.item_name}</td>
    //             <td>${element.grand_total}</td>
    //             </tr>
    //         `
    //     });
    //     data_html+='';
    //     $('#itemdata').append(data_html);
    //     $('#balance').html(data.payable_amount);
    // }
    // })
        alert(item.value);
    }
</script>

<script>
   function show_cheque_date($id){
      var set_id= $id;
      $('#ceque_date'+set_id+"").show();
   }
   function get_total_amount($id){
      var set_id= $id;
     var initial_total = $('#total_count').val();
     var amount = $('#ämount'+set_id+"").val();
     alert
     if(initial_total<1){
      $('#total_count').val(amount);
     }else{
        var set_initial_total = parseInt(initial_total) + parseInt(amount);
         $('#total_count').val(set_initial_total);
         $('#grand_total').val(set_initial_total);
     }
   }
</script>

<!-- /page script -->
@endsection
