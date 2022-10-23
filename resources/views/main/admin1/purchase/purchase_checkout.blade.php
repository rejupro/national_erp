@extends("layouts/admin/main")
@section("content")


    <section class="content-header">
        <h1>Purchase Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Purchase Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('purchase-store-page') }}" method="POST">
            @csrf
            <div class="box box-solid">
                <input type="hidden" value="{{ $invoice }}" id="pur_invoice" name="pur_invoice" readonly="">
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
                                                        {{ $purchase->grand_total }}
                                                    </h3>
                                                    <p>Total Payable</p>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{ $purchase->grand_total }}" id="payable" name="payable" readonly="">
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="paidamo">0</h3>
                                                    <p>Paid Amount</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="dueamo">
                                                    </h3>
                                                    <p>Total Due</p>
                                                </div>
                                                <input type="hidden" value="" id="due" name="due" readonly="">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4 col-xs-4">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="changamo">0</h3>
                                                    <p>Change</p>
                                                </div>

                                            </div>
                                        </div>  --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Balance (0)</label>
                                                <input type="text" maxlength="10" class="form-control cashr" value="0" name="balance" id="balance" placeholder="e.g. 500" autocomplete="off" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Paid</label>
                                                <input type="text" maxlength="10" class="form-control cashr" name="paid" id="paid" onchange="return pay_amount()" placeholder="e.g. 500" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Purchase Date</label>
                                                <input type="text" class="form-control datetimepicker" name="purchase_date" id="purdt" value="{{ date('Y-m-d', strtotime(now())) }}" placeholder="Purchase Date" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Next Due Date</label>
                                                <input type="text" class="form-control datetimepicker" name="next_date" id="next_date" value="" placeholder="Next Due Date" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-top: 2px solid red; border-bottom: 2px solid black;">
                                        <div class="col-xs-3">
                                            <!-- required for floating -->
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs tabs-left sideways">
                                                <li class=""><a href="#bankpay" data-toggle="tab" class="tabpoint" id="tbank" aria-expanded="false">Bank</a></li>
                                                <li class="active"><a href="#cardpay" data-toggle="tab" class="tabpoint" id="tcard" aria-expanded="true">Card</a></li>
                                                <li class=""><a href="#mobilepay" data-toggle="tab" class="tabpoint" id="tmobile" aria-expanded="false">Mobile</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-9">
                                            <!-- Tab panes -->
                                            <div class="tab-content" style="padding-top: 10px;">
                                                <div class="tab-pane" id="bankpay">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Select Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="bank_id" id="bank_id" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    @foreach($bank as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque No</label>
                                                                <input type="text" maxlength="20" class="form-control" name="cheque_no" id="cheque_no" value="" placeholder="e.g. KA7865467" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque Date</label>
                                                                <input type="text" class="form-control datetimepicker" name="cheque_date" id="cheque_date" value="" placeholder="Cheque Date" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="cardpay">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Card Holder Name</label>
                                                                <input type="text" maxlength="35" class="form-control" name="caname" id="caname" value="" placeholder="e.g. Md.Sumon" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Card Holder Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="chbid" id="chbid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    @foreach($bank as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Withdrwn Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="w_bid" id="w_bid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    @foreach($bank as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="mobilepay">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mobile Account</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="mobid" id="mobid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    @foreach($mob_acc as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->mname }}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- <span class="select2 select2-container select2-container default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-mobid-container"><span class="select2-selection__rendered" id="select2-mobid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>TrxID</label>
                                                                <input type="text" maxlength="20" class="form-control" name="trxid" id="trxid" value="" placeholder="e.g. KA7865467" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Store</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="product_store" id="ivt" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Branch">
                                                        <option selected="" value="BR_0">-No Branch-</option>
                                                        @foreach($branch as $data)
                                                            <option value="BR-{{ $data->id }}">{{ $data->id }} - {{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Warehouse">
                                                        @foreach($w_house as $data)
                                                            <option value="WH-{{ $data->id }}">{{ $data->id }} - {{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ref</label>
                                                <input type="text" maxlength="25" class="form-control" name="ref" id="ref" value="" placeholder="e.g. #ORD8976453" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Purchase Person</label>
                                                <input type="text" maxlength="25" class="form-control" name="created_by" id="created_by" value="{{ Auth::User()->name }}" readonly="readonly" autocomplete="off">
                                                {{-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 185.25px;"><span class="selection"><span class="select2-selection select2-selection single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-purp-container"><span class="select2-selection__rendered" id="select2-purp-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>  --}}
                                            </div>
                                            <div class="form-group">
                                                <label>Project</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="project_id" id="project_id" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>
                                                    @foreach($project as $data)
                                                        <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- <div class="form-group"> -->
                                                <!-- <label>Requisition No.</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="requisition_id" id="requisition_id" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>
                                                    @foreach($requisition as $data)
                                                        <option value="{{ $data->id }}">{{$data->code}}
                                                        </option>
                                                    @endforeach
                                                </select> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Invoice Note"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lc_no" id="lc_no" value="" placeholder="e.g. #LC8976453" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label>PI No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="pi_no" id="pi_no" value="" placeholder="e.g. #PI8976453" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Value:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lc_value" id="lcvlue" onkeypress="return isNumberKey(event)" value="" placeholder="e.g. 560" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C Date:</label>
                                                    <input type="text" class="form-control datetimepicker" name="lc_date" id="lc_date" value="" placeholder="PI Date" autocomplete="off" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label>PI Data:</label>
                                                    <input type="text" class="form-control datetimepicker" name="pi_date" id="pi_date" value="" placeholder="PI Date" autocomplete="off" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Bank:</label>
                                                    <select class="form-control select2 select2-hidden-accessible" name="lc_bank" id="lc_bank" tabindex="-1" aria-hidden="true">
                                                        <option value="">-Select-</option>
                                                        @foreach($bank as $data)
                                                            <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 170.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lcbank-container"><span class="select2-selection__rendered" id="select2-lcbank-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>  --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center side-checkhead">
                                        <button class="btn btn-flat bg-blue saveseinv" type="submit" id="saveinv"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
                                        {{--<button class="btn btn-flat bg-gray saveseinv" id="sinvprint"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp; Invoice &nbsp;&nbsp;<i class="fa fa-print"></i></button>--}}
                                    </div>
                                </div>

                            </div>
        </form>
        <div class="col-md-5">
            <div class="invhold scrol-y" id="invhold">

                <div class="col-md-12 cart-border-left text-center">
                    <div class="horizontal-scroll">
                        <h5 class="text-center" style="font-size: 20px;">Purchase Details</h5>
                        <div>
                            <div class="text-center header-line-height">
                                <small class="text-center" style="font-size: 15px;">RMC</small>
                                <br> <small class="text-center">{{ date('Y-m-d', strtotime(now())) }}</small>
                                <br> <small class="text-center" style="font-size: 12px;"><strong>Purchase Receipt</strong></small>
                                <br> <small class="text-left">Sold By: {{ $purchase->supplier_name }}</small>
                                <br> <small><span>Purchase From: {{ $purchase->company_name }}</span></small>
                                <small class="text-left invoice-show" style="display: none;">Invoice ID:{{ $purchase->purchase_track }}</small>
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
                                    @foreach($cart as $data)
                                        <tr>
                                            <td class="cart-summary-table text-left">{{ $data->item_name }}<br></td>
                                            <td class="cart-summary-table">{{ $data->quantity }}</td>
                                            <td class="text-right cart-summary-table">TK {{ $data->cost }}</td>
                                            <td class="text-right cart-summary-table"></td>
                                            <td class="text-right cart-summary-table">TK {{ $data->total }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Discount({{ $purchase->discount }}%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table">TK {{ $purchase->discount_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">VAT({{ $purchase->vat }}%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk {{ $purchase->vat_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">TAX({{ $purchase->tax }}%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk {{ $purchase->tax_amount }}</td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Speed Money</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk {{ $purchase->speed_money_amount }}</td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Freight</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk {{ $purchase->freight_amount }}</td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Adjust</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk  {{ $purchase->fraction_discount_amount }}</td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Total</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk  {{ $purchase->grand_total }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
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


