@extends("layouts/admin/main")
@section("content")
@php
$mhead='project';
$phead='prr';
@endphp
  <!-- Main content -->

    <aside class="right-side-details" style="display: block;">
        <section class="side-cont">
        <div class="side-head">
        <div class="row"> 
        <div class="col-md-12">    
        <div class="col-md-11 text-left">
        <button class="btn btn-flat bg-teal" id="stprint"><i class="fa fa-print"></i></button>     
        </div>    
        <div class="col-md-1 text-right">
            <a href='{{ url()->previous() }}'><button class="btn btn-flat bg-red" id="closedet"><span><i class="fa fa-times"></i></span></button></a>
        </div>
        </div>
        </div>    
        </div>     
        <div class="box box-solid">
        <div class="box-body">   
        <div class="row"> 
        <div class="col-md-12">
        <div class="col-md-3">
        <div id="profile">
        <div class="card">
        <div class="card-container">
        <div class="card-item">
        <div class="card-header">
        <div class="card-header-bg"></div>
        <img src="" class="card-header-img">
        <div class="card-header-text">
        <span class="card-header-name">
       {{$data->name }}</span>
        <span class="card-header-job">
        <b>ID:</b> {{$data->project_id}}</span>
        <span class="card-header-job">
            <b> Status:</b>{{$data->status }}</span>
        <span class="card-header-job">
            <b>Contact Person:</b> {{$data->cperson }}</span>
        <br>
        <span class="card-header-job">
            {{$data->address }}</span>
        </div>
        </div>
        <ul class="card-detail">
            <li class="card-detail-li">
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Payment Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str">{{$paymentCount}}</p>
            </li>
            <li class="card-detail-li">
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Receive Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str">{{$receiveCount}}</p>
            </li>
            <li class="card-detail-li">
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Expense Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str">{{$expenseCount}}</p>
            </li>
        </ul>    
        <div class="card-social">
          
        </div>
        </div>
        </div>
        </div>
            
        
         </div>    
        </div>    
        <div class="col-md-9">
        <div id="details">
        <div class="lightpage">  
        <div class="axestab ui-tabs ui-corner-all ui-widget ui-widget-content">
          
            <ul>
                <li><a href="#overview">
                <span>Overview</span></a></li>
               
                </ul>    
                <div class="tabcontents">
                    <div id="overview">
                   
                    <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="tile wide quote">
                    <div class="header">
                    <div class="count">@php echo number_format("$receivetotal",2) @endphp</div>
                    </div>
                    <div class="body">
                    <div class="title">Total Debit</div>
                    </div>
                    </div>    
                    </div>
                    <div class="col-md-4">
                    <div class="tile wide invoices">
                    <div class="header">
                    <div class="count">@php  echo number_format("$dtotal",2) @endphp</div>
                    </div>
                    <div class="body">
                    <div class="title">Total Credit</div>
                    </div>
                    </div>    
                    </div>
                        <div class="col-md-4">
                            <div class="tile job">
                                <div class="header">
                                    <div class="count">@php  echo number_format("$balance",2) @endphp</div>
                                </div>
                                <div class="body">
                                    <div class="title">Outstanding Balance</div>
                                </div>
                            </div>        
                        </div> 
                    
                    </div>    
                    </div>  
                    <h2>Project Payment Voucher</h2>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="cart cart-sm">     
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                        <thead>
                        <tr>
                        <td style="width:40px;">SN</td>
                        <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                        </tr>    
                        </thead>
                        </table>
                        <div class="cart-det style-3 item" style="padding:0px;">    
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                        <tbody id="tradata">
                           @php
                               $i=1;
                           @endphp
                           @foreach ($paymentdetails as $datas)
                            <tr>
                                <td  style="width:40px;" class="center">{{$i++}}</td>
                                <td style="text-align:left; width:100px;">{{date('d-m-Y', strtotime($datas->date))}}</td>
                                <td style="text-align:left; width:90px;"><a  href="{{route('paymentvoucher-view-route',['id'=>$datas->voucher_no])}}" id="">{{$datas->voucher_no}}</a></td>
                                <td style="text-align:left; width:90px;">@php echo number_format("$datas->amount",2) @endphp</td>         
                            </tr> 
                            @endforeach
                            
                        </tbody>  
                        <tfoot>
                            <tr>
                                <td colspan="3" class="center">Total</td>
                                <td>@php echo number_format("$paymenttotal") @endphp</td>

                            </tr>
                        </tfoot>  
                        </table>
                        </div>    
                        </div>    
                        </div>    
                        
                        </div> 
                        <br>
                        <br>
                        <h2>Project Receive Voucher</h2>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="cart cart-sm">     
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                        <thead>
                        <tr>
                        <td style="width:40px;">SN</td>
                        <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                        </tr>    
                        </thead>
                        </table>
                        <div class="cart-det style-3 item" style="padding:0px;">    
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                        <tbody id="tradata">
                           @php
                               $i=1;
                           @endphp
                           @foreach ($receivedetails as $datas)
                            <tr>
                                <td  style="width:40px;" class="center">{{$i++}}</td>
                                <td style="text-align:left; width:100px;">{{date('d-m-Y', strtotime($datas->date))}}</td>
                                <td style="text-align:left; width:90px;"><a  href="{{route('receivevoucher-view-route',['id'=>$datas->voucher_no])}}" id="">{{$datas->voucher_no}}</a></td>
                                <td style="text-align:left; width:90px;">@php echo number_format("$datas->amount",2) @endphp</td>         
                            </tr> 
                            @endforeach
                            
                        </tbody>  
                        <tfoot>
                            <tr>
                                <td colspan="3" class="center">Total</td>
                                <td>@php echo number_format("$receivetotal",2) @endphp</td>

                            </tr>
                        </tfoot>  
                        </table>
                        </div>    
                        </div>    
                        </div>    
                        
                        </div> 
                        <br>
                        <br>
                        <h2>Project Expense Voucher</h2>
                        <div class="col-md-12">
                            <div class="row">
                            <div class="cart cart-sm">     
                                <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                    <td style="width:40px;">SN</td>
                                    <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                                    </tr>    
                                    </thead>
                                    </table>
                                    <div class="cart-det style-3 item" style="padding:0px;">    
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                                    <tbody id="tradata">
                                       @php
                                           $i=1;
                                       @endphp
                                       @foreach ($expensedetails as $datas2)
                                        <tr>
                                            <td  style="width:40px;" class="center">{{$i++}}</td>
                                            <td style="text-align:left; width:100px;">{{date('d-m-Y', strtotime($datas2->date))}}</td>
                                            <td style="text-align:left; width:90px;"><a  href="{{route('expensevoucher-view-route',['id' => $datas2->voucher_no])}}">{{$datas2->voucher_no}}</a></td>
                                            <td style="text-align:left; width:90px;">@php echo number_format("$datas2->amount",2) @endphp</td>         
                                        </tr> 
                                        @endforeach
                                        
                                    </tbody>  
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="center">Total</td>
                                            <td>@php echo number_format("$expensetotal") @endphp</td>
            
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
        <script type="text/javascript">
        $(".axestab").tabs({ 
          //show: { effect: "slide", direction: "left", duration: 200, easing: "easeOutBack" } ,
          //hide: { effect: "slide", direction: "right", duration: 200, easing: "easeInQuad" } 
        });
        $('.datetimepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, clearBtn: true, orientation: 'auto bottom'});
        $("#stprint").click(function() {    
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
        mode: mode,
        popClose: close
        };
        $("div.printableArea").printArea(options);
        });    
        </script>    
         </div>
        </div>     
        </div>
        </div>    
        </div>
        </div>
        </section>    
        </aside>



@endsection
