@extends("layouts/admin/main")
@section("content")
@php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Daily Cash Statement';
$ractive='A';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'DCST';

@endphp
<section class="content-header">
    <h1>Daily Cash Statement</h1>
    <ol class="breadcrumb">
       <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       <li><a href="mas_brandcreate.php">Report</a></li>
       <li class=""><a href="#">Daily Cash Statement</a></li>
    </ol>
 </section>
<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
    <div class="col-md-3">    
    <div class="box box-solid">
    
    <div class="box-body">
    <div class="col-md-12">    
    <div class="row">    
    <div class="roles-menu">   
    <ul class="nav">
        <li  @if($ractive=='A') class="active" @endif><a href="{{route('dailycashstate-report')}}">Daily Cash Statement</a></li>
    </ul>
    </div>
    </div>
    <hr>    
    <form  {{route('dailycashstate-report')}} enctype="multipart/form-data" method="get" accept-charset="utf-8">
        @csrf
    <!--From Data-->   
    {{-- <div class="col-md-12">    
        <div class="row">   
            <div class="form-group" >
                <label>Branch</label>
                <div class="input-group">
                    <span class="input-group-addon">BR</span>
                    <select class="form-control select2" name="ibrid" id="ibrid">
                        <option value="A">-All Branch-</option>
                        <option value="0">-Corporate Branch-</option>    
                    </select>
                </div>
            </div>       
        </div>
        </div> --}}
        {{-- <div class="col-md-12">
        <div class="row">    
            <div class="form-group" >
                <label>Select Head</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-plus"></span></span>    
                    <select class="form-control select2" name="lid" id="lid">
                        <option value="">-Select-</option>     
                    </select>     
                </div>   
            </div>    
        </div>
        </div>     --}}
        <div class="row"> 
            <div class="col-md-12">    
                <div class="form-group" >
                    <label>From</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" maxlength="18" class="form-control" name="start_date" value='{{$today}}' required autocomplete="off" required>
                    </div>
                </div>
            </div>
              
        </div> 
        <div class="row"> 
           
            <div class="col-md-12">    
                <div class="form-group" >
                    <label>To</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" maxlength="18" class="form-control" name="end_date" value='{{$today}}' required autocomplete="off" required>
                    </div>
                </div>
            </div>    
        </div> 
      
        @if($br== 1)
            <div class="col-md-12">
            <div class="row">    
                <div class="form-group" >
                    <label>Select Branch</label>
                   
                        
                        <select class="form-control select2" name="brid" id="brid">
                            <option value="">-Select-</option>   
                            @foreach ($branches as $branch )
                            <option value="{{ $branch->id}}">{{ $branch->name}}</option>  
                            @endforeach  
                        </select>     
                      
                </div>    
            </div>
            </div> 
        @endif   
        
    
    <!--End From Data-->    
    <div class="clearfix"></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-4"></div>
    <div class="col-md-8 text-right" >
    <input type="submit" name="filter_submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/>
    </div> 
    </div>     
    </form>    
    </div>
    </div>
    </div>  
    </div>
    <div class="col-md-9">
    <div class="row">    
    <div class="side-head"> 
    <div class="col-md-12">    
    <div class="col-md-4 text-left">
    <button class="btn btn-flat bg-teal" id="print"><i class="fa fa-print"></i></button> 
    <button class="btn btn-flat bg-blue"><i class="fa fa-envelope-o"></i></button> 
    <button class="btn btn-flat bg-gray"><i class="fa fa-file-pdf-o"></i></button>     
    </div>
    <div class="col-md-7 text-center">
    <select name="Page_resolution" id="resolution" onchange="setPrinterConfig()" style="width: 205px;height: 28px;border: 1px solid red;">
    <option value="A4" selected="selected">A4 [210mm × 297mm]</option>   
    <option value="A5">A5 [148mm × 210mm]</option>
    <option value="Letter">US Letter [216mm × 279mm]</option>
    <option value="Legal">US Legal [216mm × 356mm]</option>
    </select>
    <select name="Page_size" id="rotate" onchange="setPrinterConfig()" style="width: 120px;height: 28px;border: 1px solid red;">
    <option value="portrait">Portrait</option>
    <option value="landscape">Landscape</option>
    </select>    
    </div>    
    <div class="col-md-1 text-right">
    
    </div>
    </div>
    </div>    
    </div>
    <div class="row">
    <div class="invhold scrol-y" id="invhold">
    <div class="printableArea">    
     @include('main.admin.report.reportstyle')
    
    <div class="wrapper" style="background: none;">    
    <div id="wrap_invoice" class="page A4 landscape">
    <div class="invoice_header etat_header">
    <div class="row model1">
        <div class="col-xs-3 invoice-logo">
            <img src="{{asset(companyData()->image)}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
        </div>
        <div class="col-xs-5 invoice-header-info" id="adheight">
            <h4>{{ companyData()->name }}</h4>
            <p>{{ companyData()->address }}<br><strong>Phone:</strong>{{ companyData()->phone }}<br><strong>Mobile:</strong> {{ companyData()->mobile }}<br><strong>Email:</strong> {{ companyData()->email }}<br><strong>Web:</strong> {{ companyData()->web }}</p>
        </div>
    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
      <img src = 'data:image/png;base64,{{DNS1D::getBarcodePNG($oavno, 'C39')}}' style='margin-right: -10px;padding-bottom: 5px;'/>
      <br><strong>Ref N°:</strong>{{$oavno }}
      <br><strong>Date:</strong> {{ $today }}   
    </div>
    </div>
    <hr>
    <div class="clearfix"></div>
    </div>
    <center>
    <h3 class="page-title">Daily Cash Statement</h3>
    </center>    
    <div class="etat_content">
        <div class="page_split">
        <hr>    
        <div class="row row-equal">
        <div class="col-xs-4 text-left">
        <h3 class="inv col"><b>Start Date: {{date('d-m-Y', strtotime($start))}}</b></h3>
        </div>
        <div class="col-xs-4 text-center">
        {{-- <h3 class="inv col"><b>Statement For: </b></h3> --}}
        </div>    
        <div class="col-xs-4 text-right">
        <h3 class="inv col"><b>End Date:{{date('d-m-Y', strtotime($end))}} </b></h3>
        </div>
        </div>    
        <hr>
        <br> 
        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
            <th style="width: 40px !important;">SN</th>
            <th>Particular</th>
            <th>Type</th>
            <th style="width: 150px !important;">Amount</th>    
            </tr>
            </thead>
            <tbody>    
                
            <tr>
            <td rowspan="2" colspan="2">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Opening Balance</strong></td>
            <td></td>
            <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>       
            </tr>
            {{-- <tr>
            <td>Md. Rokibul Islam</td>
            <td style="text-align:right;"><strong>0.00</strong></td>    
            </tr>     --}}
            <tr>
            <td colspan="4"></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Inflow of Fund</strong></td>    
            </tr>    
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Received Payment</strong></td>    
            </tr>
            @php $i=1; @endphp
            @foreach($receives as $receive)
                <tr>
                    <th style="width: 40px !important;">{{$i++}}</th>
                    @php
                    if($receive->project_id != null){
                        $prname=DB::table('projects')->where('id', $receive->project_id)->first();
                        $pname=$prname->project_id;
                    }else{
                        $pname='';
                    }
                     
                    @endphp
                    <th>{{$receive->voucher_no}} - {{$pname}}</th>
                    <th>@foreach($revdetails as $revdata) 
                           @if($receive->voucher_no==$revdata->voucher_no)<p>
                        
                        
                            @php
                                    $first = filter_var($revdata->receive_from, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($revdata->receive_from, FILTER_SANITIZE_STRING);
                                    $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                                    //dd($id);
                                    if($type == 'SU'){
                                        $sname=DB::table('suppliers')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'CO'){
                                        $sname=DB::table('procontractors')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EP'){
                                        $sname=DB::table('employees')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    }
                                    if($type == 'CU'){
                                        $sname=DB::table('customers')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    }
                                    if($type == 'LD'){
                                        $sname=DB::table('ledgers')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    } 
                                    if($type == 'LO'){
                                        $data=DB::table('loaninvoices')->where('id', $id)->first(); 
                                        $ids=$data->loan_id;
                                        $sname=DB::table('loans')->where('code',$ids)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EH'){
                                        $sname=DB::table('expenseheads')->where('id', $id)->first(); 

                                        $revname=$sname->name;
                                    }
                                @endphp
                                {{$revname}}
                            </p>
                            @endif 
                        @endforeach
                    </th>
                    <th style="width: 150px !important;text-align:right;">@php echo number_format("$receive->amount") @endphp</th>    
                    </tr>
                <tr>
            @endforeach
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$receivetotal") @endphp</strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Revenue</strong></td>    
            </tr>
            @php $i=1; @endphp
            @foreach($journals as $journal)
                <tr>
                    <th style="width: 40px !important;">{{$i++}}</th>
                    <th>{{$journal->journal_no}}</th>
                    <th></th>
                    <th style="width: 150px !important;text-align:right;">@php echo number_format("$journal->total") @endphp</th>    
                    </tr>
                <tr>
            @endforeach
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$journaltotal") @endphp</strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sales</strong></td>    
            </tr>
            @php $i=1; @endphp
            @foreach($sales as $sale)
                <tr>
                    <th style="width: 40px !important;">{{$i++}}</th>
                    <th>{{$sale->sales_invoice}} - {{$sale->cusname}}</th>
                    <th>@foreach($sadetails as $sadata) @if($sale->sales_invoice==$sadata->sale_track)<p>{{$sadata->product->name}}</p>@endif @endforeach</th>
                    <th style="width: 150px !important;text-align:right;">@php echo number_format("$sale->paid") @endphp</th>    
                    </tr>
                <tr>
            @endforeach
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$salestotal") @endphp</strong></td>    
            </tr>
            <tr>
            <td colspan="4"></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Outflow of Fund</strong></td>    
            </tr>    
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Paid Payment</strong></td>    
            </tr>
            @php $i=1; @endphp
            @foreach($payments as $payment)
                <tr>
                    <th style="width: 40px !important;">{{$i++}}</th>
                    @php
                    if($payment->project_id != null){
                        $parname=DB::table('projects')->where('id', $payment->project_id)->first();
                        $paname=$parname->project_id;
                    }else{
                        $paname='';
                    }
                     
                    @endphp
                    <th>{{$payment->voucher_no}} - {{$paname}}</th>
                    <th>@foreach($paydetails as $paydata)
                        @php
                        $first = filter_var($paydata->payment_to, FILTER_SANITIZE_NUMBER_INT);
                        $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                        $second=filter_var($paydata->payment_to, FILTER_SANITIZE_STRING);
                        $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                        //dd($id);
                            if($type == 'SU'){
                                $sname=DB::table('suppliers')->where('id', $id)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'CO'){
                                $sname=DB::table('procontractors')->where('id', $id)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'EP'){
                                $sname=DB::table('employees')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'CU'){
                                $sname=DB::table('customers')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'LD'){
                                $sname=DB::table('ledgers')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'LO'){
                                $data=DB::table('loaninvoices')->where('id', $id)->first(); 
                                $ids=$data->loan_id;
                                $sname=DB::table('loans')->where('code',$ids)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'EH'){
                                $sname=DB::table('expenseheads')->where('id', $id)->first(); 

                                $payname=$sname->name;
                            }

                        
                    @endphp
                            @if($payment->voucher_no==$paydata->voucher_no)
                               

                                <p>{{$payname}}</p>
                            @endif 
                        @endforeach
                    </th>
                    <th style="width: 150px !important;text-align:right;">@php echo number_format("$payment->amount") @endphp</th>    
                    </tr>
                <tr>
            @endforeach
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$paymenttotal") @endphp</strong></td>    
            </tr>
            {{-- <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Expenses</strong></td>    
            </tr>
            @php $i=1; @endphp
             @foreach ($expenses as $expense)
                <tr>
                    <td class="center">{{$i++}}</td>
                    <td>{{$expense->voucher_no}}</td>
                    <td>@if($expense->project!=null){{$expense->project->project_id}} @endif =>@if($expense->stf_id!=null){{$expense->staff->name}} @endif @foreach($edetails as $edata) @if($expense->voucher_no==$edata->voucher_no)<p>{{$edata->expense_name}}</p>@endif @endforeach</td>
                    <td style="text-align:right;">@php echo number_format("$expense->amount") @endphp</td>

                </tr>
                @endforeach
            <tr>
                <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
                <td style="text-align:right;"><strong>@php echo number_format("$expensetotal") @endphp</strong></td>    
            </tr>  --}}
             <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Daily Project Expenses </strong></td>    
            </tr>

            @php
                $i=1;
            @endphp
            @foreach ($dexpenses as $data)
             <tr>
                <td class="center">{{$i++}}</td>
                <td>{{$data->voucher_no}}</td>

                @if($data->stf_id!=null)
                @php
                        $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                        $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                        $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
                        $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                        if($type == 'CO'){
                            $sname=DB::table('procontractors')->where('id', $id)->first();
                            $dname=$sname->name;
                        }
                        if($type == 'EP'){
                            $sname=DB::table('employees')->where('id', $id)->first(); 
                            $dname=$sname->name;
                        
                            }
                    @endphp
                
                @endif
                <td>{{data_get($data,'project.project_id')}} => @if($data->stf_id !=null){{$dname}}@endif @foreach($ddetails as $datas) @if($data->id==$datas->daily_expense_model_id)<p>{{$datas->requisition_item}}</p>@endif @endforeach</td>
                <td style="text-align:right;">@php echo number_format("$data->grand_total") @endphp</td>

                
            </tr>
            @endforeach  
             <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$dexpensetotal") @endphp</strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Purchase </strong></td>    
            </tr>
            @php $i=1; @endphp
            @foreach($purchases as $purchase)
                <tr>
                    <th style="width: 40px !important;">{{$i++}}</th>
                    <th>{{$purchase->pur_invoice}} - {{$purchase->supname}}</th>
                    <th>@foreach($purdetails as $purdata) @if($purchase->pur_invoice==$purdata->purchase_track)<p>{{$purdata->product->name}}</p>@endif @endforeach</th>
                    <th style="width: 150px !important;text-align:right;">@php echo number_format("$purchase->paid") @endphp</th>    
                    </tr>
                <tr>
            @endforeach
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong>@php echo number_format("$purchasetotal") @endphp</strong></td>    
            </tr>    
            </tbody>
            </table>
            <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr>
                <td colspan="2" rowspan="2"><strong>Transaction Summery</strong></td>
                <td rowspan="2" style="text-align:center;"><strong>Opening</strong></td>    
                <td colspan="3" style="text-align:center;"><strong>From {{date('d-m-Y', strtotime($start))}} to {{date('d-m-Y', strtotime($end))}}</strong></td>
                <td rowspan="2" style="text-align:center;"><strong>Closing</strong></td>    
                </tr>
                <tr>
                <td style="text-align:center;"><strong>Received</strong></td>
                <td style="text-align:center;"><strong>Payment</strong></td>
                <td style="text-align:center;"><strong>Balance</strong></td>    
                </tr>    
                <tr>
                <td rowspan="2">Cash</td>
                <td></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>    
                <td style="text-align:right;"><strong>@if($recivedpaytotal > 0)@php echo number_format("$recivedpaytotal") @endphp @else {{$recivedpaytotal}} @endif </strong></td> 
                <td style="text-align:right;"><strong>@if($paymantpaytotal > 0)@php echo number_format("$paymantpaytotal") @endphp @else {{$paymantpaytotal}} @endif </strong></td> 
                <td style="text-align:right;"><strong>@if($recivedpaytotal - $paymantpaytotal > 0)@php $tc = $recivedpaytotal - $paymantpaytotal ;echo number_format("$tc") @endphp @else {{$recivedpaytotal - $paymantpaytotal}} @endif</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>          
                </tr>    
                    
                {{-- <tr>
                <td>Md. Rokibul Islam</td>
                <td style="text-align:right;"><strong>0.00</strong></td>    
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td>
                <td style="text-align:right;"><strong>0.00</strong></td>    
                </tr>     --}}
                    
                <tr>
                <td colspan="1" style="text-align:right;"><strong>Total</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>    
                <td style="text-align:right;"><strong>@if($recivedpaytotal > 0)@php echo number_format("$recivedpaytotal") @endphp @else {{$recivedpaytotal}} @endif </strong></td> 
                <td style="text-align:right;"><strong>@if($paymantpaytotal > 0)@php echo number_format("$paymantpaytotal") @endphp @else {{$paymantpaytotal}} @endif </strong></td> 
                <td style="text-align:right;"><strong>@if($recivedpaytotal - $paymantpaytotal > 0)@php $tc = $recivedpaytotal - $paymantpaytotal ;echo number_format("$tc") @endphp @else {{$recivedpaytotal - $paymantpaytotal}} @endif</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>          
                </tr>
                <tr>
                <td colspan="5"></td>
                </tr>    
                <tr>
                <td>Bank</td>
                <td></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>          
                <td style="text-align:right;"><strong>@if($noncashrecieve > 0)@php echo number_format("$noncashrecieve") @endphp @else {{$noncashrecieve}} @endif</strong></td> 
                <td style="text-align:right;"><strong>@if($noncashpayment > 0)@php echo number_format("$noncashpayment") @endphp @else {{$noncashpayment}} @endif</strong></td> 
                <td style="text-align:right;"><strong>@if($noncashrecieve - $noncashpayment > 0)@php $tnp = $noncashrecieve - $noncashpayment ; echo number_format("$tnp") @endphp @else {{$noncashrecieve - $noncashpayment}} @endif</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>                   
                </tr>     
                <tr>
                <td colspan="2" style="text-align:right;"><strong>Total</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>          
                <td style="text-align:right;"><strong>@if($noncashrecieve > 0)@php echo number_format("$noncashrecieve") @endphp @else {{$noncashrecieve}} @endif</strong></td> 
                <td style="text-align:right;"><strong>@if($noncashpayment > 0)@php echo number_format("$noncashpayment") @endphp @else {{$noncashpayment}} @endif</strong></td> 
                <td style="text-align:right;"><strong>@if($noncashrecieve - $noncashpayment > 0)@php $tnp = $noncashrecieve - $noncashpayment ; echo number_format("$tnp") @endphp @else {{$noncashrecieve - $noncashpayment}} @endif</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>          
                </tr>
                <tr>
                <td colspan="5"></td>
                </tr>
                <tr>
                <td colspan="2" style="text-align:right;"><strong>Closing Balance</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>    
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td>
                <td style="text-align:right;"><strong>@if($totalbalance > 0)@php echo number_format("$totalbalance") @endphp @else {{$totalbalance}} @endif</strong></td>      
                </tr>    
                </tbody></table>
       
        <div style="clear: both;"></div>   
        <div id="not-printed">
        <br> 
        <br>
        <br>    
        </div>    
        </div>    
        </div>
        <div style="clear: both;"></div>
        <div class="invoice_footer">
        <hr>
        <p style="margin-top: -5px;">Falcon Solution LTD. © 2021</p>
        </div>
        <div style="clear: both;"></div>
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



@endsection