@extends("layouts/admin/main")
@section("content")
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1>Payment Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Payment Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Payment</h3>
            </div>
            <div class="box-body">
               <form method="POST" id="dynamic_form"  enctype="multipart/form-data"  >
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">PAYMENT VOUCHER</h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Voucher No:</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="voucher_no"  value="{{$pay_track}}" placeholder="e.g. PAV121119101" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date"  value="" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Project:</b></span>
                                 <select class="form-control select2" name="project_id" >
                                    <option value="">-Select-</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}" @if(old('project_id') == $project->id) selected @endif>{{$project->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th>Sourch</th>
                                    <th>Balance</th>
                                    <th>Pay To</th>
                                    <th>Balance</th>
                                    <th>Type</th>    
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
                                 <th colspan="2" style="text-align:center;">Total</th>
                                 <th style="text-align:center;" ><div id="totalvalue"></div></th>
                                 <th colspan="2" style="text-align:center;"><input type="number"  class="form-control" name="total"   placeholder="Total"/></th>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Note</label>
                              <textarea class="form-control" name="note" id="note" maxlength="250" rows="3" placeholder="e.g. Note"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="{{route('paymentvouchar-list')}}" class="btn btn-flat bg-gray">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
     
   </div>
</section>
<!-- /.main content -->
<!-- page script -->

<script>
   var number=0;
   $(document).ready(function(){
   
    var count = 1;
   
    dynamic_field(count);
   
    function dynamic_field(number)
    {
   
     html = '<tr>';
           html += '<th style="width:200px;"><select class="form-control select2" onchange="getBalance(this);" name="payment_source[]"><option selected value="">-No Sourch-</option><option value="cash">Cash</option></select></th>';
           html += '<th style="width:50px;"><span>$ </span><span id="sbalance">0.00</span></th>';
           html += '<th style="width:200px;"><select onchange="getNewVal(this);" class="form-control select2" name="payment_to[]" id="supplier_id"><option value="">-Select-</option>@foreach($suppliers as $supplier)<option value="{{$supplier->id}}">{{$supplier->name}}</option>@endforeach</select></th>';
           html += '<th style="width:50px;"><span>$ </span><span id="balance">0.00</span></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="type_id[]" id="type"><option value="0">-Select-</option>@foreach($types as $type)<option value="{{$type->id}}" >{{$type->name}}</option>@endforeach</select></th>';
           html += '<th style="width:200px;"><input type="text"  style="width:200px;" maxlength="10" class="value" name="amount[]" placeholder="e.g. 500" autocomplete="off"></th>';
           html += '<th style="width:150px;"><input type="text" maxlength="25" class="form-control" name="cheque_no[]"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
           html += '<th style="width:100px;"><input type="date"  style="width:200px;"class="form-control" name="cheque_date[]"  placeholder="Date:" autocomplete="off" ></th>';
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
               url:'{{ route("paymentvouchar-store-route") }}',
               type:'POST',
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
                       dynamic_field(1);
                       $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });
   
   });


  

</script>

<script>
$(function() {
    $('.value').change(function() {
        var total = 0;

        $('.value').each(function() {
            if( $(this).val() != '' )
                total += parseInt($(this).val());
        });

        $('#totalvalue').html(total);
    });
}); 
</script>





<script type="text/javascript">

   function getNewVal(item)
    {
        const base_url = "{{ url('/').'/' }}";

    var mysupplier_id = $("#supplier_id").val();
    $.ajax({
    type: "get",
    url: base_url+"get-supplier-invoice/"+item.value,
    cache: false,
    success: function(data){
        // console.log(data);
        let data_html='';
        data.result.invoices.forEach(element => {
            data_html+=`
                <tr>
                <td>
                <input type="checkbox" name="purchase_detail_id[]" value="${element.id}"></td>
                <td>${element.purchase_track}</td>
                <td>${element.item_name}</td>
                <td>${element.grand_total}</td>
                </tr>
            `
        });
        data_html+='';
        $('#itemdata').append(data_html);
        $('#balance').html(data.payable_amount);
    }
    })
        // alert(item.value);
    }

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



<!-- /page script -->
@endsection
