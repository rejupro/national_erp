@extends("layouts/admin/main")  
@section("content") 

  
<section class="content-header">
    <h1>Material Use Record Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Material Use Record Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('record-store-update') }}" method="POST">
            @csrf
            <div class="box box-solid">
                <input type="hidden" value="{{ $record_no }}" id="record_no" name="record_no" readonly=""> 
                <input type="hidden" value="{{ $cookie_id }}" id="cookie_id" name="cookie_id" readonly=""> 
                <div class="box-body">   
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="col-md-7 shortcuts" id="checkview">
                                    <div class="addpurchase">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4">
                                                <div class="small-box">
                                                    <div class="inner">
                                                        <h3 id="pabamo">
                                                            @php $sum=0; @endphp
                                                            @foreach($recrd as $data)
                                                            @php $sum = $data->price + $sum; @endphp
                                                            @endforeach
                                                            {{ $sum }}
                                                        </h3>
                                                        <p>Total Payable</p>
                                                    </div>   
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <br>   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Employee Name</label>    
                                                    <select class="form-control select2 select2-hidden-accessible" name="send_person_id" id="ivt" tabindex="-1" aria-hidden="true">
                                                            <option selected="" value="">-Select-</option>    
                                                                @foreach($employee as $data)   
                                                                    <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}
                                                                    </option>
                                                                @endforeach  
                                                       </select> 
                                                </div>    
                                                <div class="form-group">
                                                    <label>Ref</label>
                                                    <input type="text" maxlength="25" class="form-control" name="ref" id="ref" value="" placeholder="e.g. #ORD8976453" autocomplete="off">    
                                                </div>   
                                            </div>
                                            <div class="col-md-8">    
                                                <div class="form-group">    
                                                    <label>Note</label>
                                                    <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Invoice Note"></textarea>    
                                                </div>

                                                <div class="form-group">
                                                    <label>Challan Date</label>
                                                    <input type="text" class="form-control datetimepicker" name="challan_date" id="purdt" value="" placeholder="challan Date" autocomplete="off" readonly="">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-12 text-center side-checkhead">
                                            <button class="btn btn-flat bg-blue saveseinv" type="submit" id="saveinv"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>    
                                            <button class="btn btn-flat bg-gray saveseinv" id="sinvprint"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp; Invoice &nbsp;&nbsp;<i class="fa fa-print"></i></button>   
                                        </div>    
                                    </div>   
                            
                            </div> 
                        </form>   
                            <div class="col-md-5">
                                <div class="invhold scrol-y" id="invhold">
                                
                                    <div class="col-md-12 cart-border-left text-center">
                                        <div class="horizontal-scroll">
                                            <h5 class="text-center" style="font-size: 20px;">Material Use Details</h5> 
                                        <div>
                                        @foreach($recrd as $data)
                                        <div class="text-center header-line-height">
                                            <small class="text-center" style="font-size: 15px;">RMC</small>
                                            <br> <small class="text-center">{{ date('Y-m-d', strtotime(now())) }}</small>
                                            <br> <small class="text-center" style="font-size: 12px;"><strong>Material Use Receipt</strong></small>
                                            <br> <small class="text-left">Project Name:{{ $data->project_name }}</small> 
                                            <small class="text-left invoice-show" style="display: none;">Invoice ID:{{ $data->record_no }}</small>
                                        </div> 
                                        <div class="invoice-table">
                                            <table class="table product-card-font" style="font-weight: 500;">
                                                <thead class="border-top-0">    
                                                    <tr>
                                                        <th class="cart-summary-table text-left">Items</th> 
                                                        <th class="cart-summary-table text-left">Qty</th> 
                                                        <th class="cart-summary-table text-right">Price</th>
                                                        <th class="cart-summary-table text-right"></th>
                                                        <th class="cart-summary-table text-right" width="80px;">Total Price</th>
                                                    </tr>   
                                                </thead> 
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="cart-summary-table text-left">{{ $data->item_name }}<br></td>
                                                        <td class="cart-summary-table">{{ $data->quantity }}</td> 
                                                        <td class="text-right cart-summary-table">{{ $data->cost }} TK </td> 
                                                        <td class="text-right cart-summary-table"></td> 
                                                        <td class="text-right cart-summary-table">{{ $data->cost*$data->quantity }} TK </td>
                                                        
                                                    </tr>
                                                </tbody> 
                                                <tfoot>
                                                    <tr>
                                                        <td class="cart-summary-table font-weight-bold text-left">Freight</td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="text-right cart-summary-table ">{{ $data->freight_amount }} Tk </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="cart-summary-table font-weight-bold text-left">Total</td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        @php $summ = 0; @endphp
                                                        @foreach($recrd as $data)
                                                            @php $summ = $data->price + $summ; @endphp
                                                        @endforeach
                                                        <td class="text-right cart-summary-table ">{{ $summ }} Tk  </td>
                                                    </tr> 
                                                </tfoot>
                                            </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>     
                </div>
            </div> 
    </section>
    <!-- /.main content -->
  <script type="text/javascript">
    function pay_amount() {
        var payable = $('#payable').val();
        var  paid= $('#paid').val();
        if (paid) {
            var set_due = (parseInt(payable) - parseInt(paid));
            var set_paid = parseInt(paid);
        } else {
            var set_due = parseInt(payable);
            var set_paid = paid;
        }
        $('#dueamo').html(set_due);
        $('#paidamo').html(set_paid);
        $('#balance').val(set_due);
        $('#due').val(set_due);
    }
  </script>
@endsection


{{-- <script type="text/javascript">
    function cashcalculation(){
    var pab = parseFloat($('#pabamo').html());
    var cash = parseFloat($('#cash').val());
    var adv = parseFloat($('#balance').val());
    var adj = parseFloat($('#adjust').val());    
    var paid=0; due=0; chang=0;
    if(isNaN(cash)){
    cash=0;    
    }
    if(isNaN(adj)){
    adj=0;    
    }
        
    if((cash+adj)<=pab){
    paid=cash;
    due=(pab-(cash+adj));
    chang=0;    
    }else{
    paid=pab;
    due=0;
    chang=((cash+adj)-pab);    
    }
    $('#paidamo').html(paid);
    $('#dueamo').html(due);
    $('#changamo').html(chang);   
    }
        
    $(document).on('keyup', '#cash', function() { 
    cashcalculation();
    });
        
    $(document).on('keyup', '#adjust', function() {
    var pab = parseFloat($('#pabamo').html());    
    var adv = parseFloat($('#balance').val());
    var adj = parseFloat($('#adjust').val());    
    var maxad = 0;
    if(pab<=adv){
    maxad=pab;
    }else{
    maxad=adv;    
    }
    if(adj>maxad){
    $('#adjust').val(maxad);    
    }    
    cashcalculation();
    });
        
    $(document).on('change', '#baid', function() {
    id_arr = $(this).val();
    id = id_arr.split("_");
    type=id[0];
    if(type=='BA'){
    document.getElementById("chkno").disabled=false; 
    document.getElementById("chkdt").disabled=false;     
    }else{
    $('#chkno').val('');
    $('#chkdt').val('');    
    document.getElementById("chkno").disabled=true; 
    document.getElementById("chkdt").disabled=true;    
    }    
    });    
        
    $(document).on('click', '.tabpoint', function() { 
    var tval=$(this).attr('id');
    if (tval=='tbank'){
    $("#caname").val("");    
    $("#chbid").val("").trigger("change");
    $("#caid").val("").trigger("change");
    $("#mobid").val("").trigger("change");
    $("#trxid").val("");    
    }else if(tval=='tcard'){
    $("#baid").val("").trigger("change");
    $("#chkno").val("");
    $("#chkdt").val("");    
    $("#mobid").val("").trigger("change");
    $("#trxid").val("");
    }else if(tval=='tmobile'){
    $("#baid").val("").trigger("change");
    $("#chkno").val("");
    $("#chkdt").val("");
    $("#caname").val("");    
    $("#chbid").val("").trigger("change");
    $("#caid").val("").trigger("change");    
    }
            
    });    
    
    function chek_error(){
    var result = true;    
    var baid = $('#baid').val();
    var chkno = $('#chkno').val();
    var chkdt = $('#chkdt').val();
        
    var caname = $('#caname').val();
    var chbid = $('#chbid').val();
    var caid = $('#caid').val();
        
    var mobid = $('#mobid').val();
    var trxid = $('#trxid').val(); 
    
    $('.LV_invalid_field').removeClass('LV_invalid_field');     
    $('.LV_validation_message').remove();    
        
    if(baid != ''){
    if(chkno.length>=0 && chkno.length<5){
    $('#chkno').addClass('LV_invalid_field');   
    $('#chkno').after("<span class='LV_validation_message LV_invalid'>Enter Valid Cheque No!</span>").addClass('has-error'); 
    result=false;
    }else{
    $('#chkno').removeClass('LV_invalid_field');
    result=true;    
    } 
    
    if(chkdt.length<=0){
    $('#chkdt').addClass('LV_invalid_field');   
    $('#chkdt').after("<span class='LV_validation_message LV_invalid'>Enter Cheque Date!</span>").addClass('has-error');
    result=false;    
    }else{
    $('#chkdt').removeClass('LV_invalid_field');
    result=true;    
    }    
    }    
    
    if(caname.length>0){
    if(chbid == '-Select-' || chbid == ''){
    $('#chbid').addClass('LV_invalid_field');   
    $('#chbid').after("<span class='LV_validation_message LV_invalid'>Can't be empty!</span>").addClass('has-error'); 
    result=false;
    } else {
    $('#chbid').removeClass('LV_invalid_field');
    result=true;    
    }
        
    if(caid == '-Select-' || caid == ''){
    $('#caid').addClass('LV_invalid_field');   
    $('#caid').after("<span class='LV_validation_message LV_invalid'>Can't be empty!</span>").addClass('has-error'); 
    result=false;
    } else {
    $('#caid').removeClass('LV_invalid_field');
    result=true;    
    }    
    }    
    
    if(mobid != ''){
    if(trxid.length>=0 && trxid.length<5){
    $('#trxid').addClass('LV_invalid_field');   
    $('#trxid').after("<span class='LV_validation_message LV_invalid'>Enter Valid TrxID No!</span>").addClass('has-error'); 
    result=false;
    }else{
    $('#trxid').removeClass('LV_invalid_field');
    result=true;    
    }    
    }    
    
    if(!result){
    return false;    
    }else{
    return true;     
    }    
        
    }
        
    $(".select2").select2();    
    $('.datetimepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, clearBtn: true, orientation: 'auto bottom'});    
</script> --}} 


 