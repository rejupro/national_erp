@extends("layouts/admin/main")
@section("content")
@php
 $mhead='client';
 $phead='cl';
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
        ID:{{$data->id}}</span>
        <span class="card-header-job">
            {{$data->email }}</span>
        <span class="card-header-job">
            {{$data->mobile }}</span>
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
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Sales Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str">{{$salesCount}}</p>
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
                    <div class="count">@php echo number_format("$debit") @endphp</div>
                    </div>
                    <div class="body">
                    <div class="title">Total Debit</div>
                    </div>
                    </div>    
                    </div>
                    <div class="col-md-4">
                    <div class="tile wide invoices">
                    <div class="header">
                    <div class="count">@php echo number_format("$credit") @endphp</div>
                    </div>
                    <div class="body">
                    <div class="title">Total Credit</div>
                    </div>
                    </div>    
                    </div>
                        <div class="col-md-4">
                            <div class="tile job">
                                <div class="header">
                                    <div class="count">{{$balance}}</div>
                                </div>
                                <div class="body">
                                    <div class="title">Outstanding Balance</div>
                                </div>
                            </div>        
                        </div> 
                    
                    </div>    
                    </div>  
                    <h2>Customer Payment Details</h2>
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
                                <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple details-invoice" href="{{route('paymentvoucher-view-route',['id'=>$datas->voucher_no])}}" id="">{{$datas->voucher_no}}</a></td>
                                <td style="text-align:left; width:90px;">@php echo number_format("$datas->amount") @endphp</td>         
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
                        <h2>Customer Receive Details</h2>
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
                                    <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple details-invoice" href="{{route('receivevoucher-view-route',['id'=>$datas->voucher_no])}}" id="">{{$datas->voucher_no}}</a></td>
                                    <td style="text-align:left; width:90px;">@php echo number_format("$datas->amount") @endphp</td>         
                                </tr> 
                                @endforeach
                                
                            </tbody>  
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="center">Total</td>
                                    <td>@php echo number_format("$receivetotal") @endphp</td>
    
                                </tr>
                            </tfoot>  
                            </table>
                            </div>    
                            </div>    
                            </div> 
                        </div> 
                        <br>
                        <h2>Customer Sales Voucher</h2>
                        <div class="col-md-12">
                            <div class="row">
                            <div class="cart cart-sm">     
                                <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                    <td style="width:40px;">SN</td>
                                    <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Total</strong></td>  
                                    <td style="text-align:left; width:90px;"><strong>Paid</strong></td> 
                                    <td style="text-align:left; width:90px;"><strong>Due</strong></td>       
                                    </tr>    
                                    </thead>
                                    </table>
                                    <div class="cart-det style-3 item" style="padding:0px;">    
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                                    <tbody id="tradata">
                                       @php
                                           $i=1;
                                       @endphp
                                       @foreach ($salesdetails as $datas2)
                                        <tr>
                                            <td style="width:40px;" class="center">{{$i++}}</td>
                                            <td style="text-align:left; width:100px;">{{date('d-m-Y', strtotime($datas2->sales_date))}}</td>
                                            <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple" href="{{route('sales-view-page',['id' => $datas2->id])}}">{{$datas2->sales_invoice}}</a></td>
                                            <td style="text-align:left; width:90px;">@php echo number_format("$datas2->payable") @endphp</td> 
                                            <td style="text-align:left; width:90px;">@php echo number_format("$datas2->paid") @endphp</td> 
                                            <td style="text-align:left; width:90px;">@php echo number_format("$datas2->balance") @endphp</td>            
                                        </tr> 
                                        @endforeach
                                        
                                    </tbody>  
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="center">Total</td>
                                            <td>@php echo number_format("$salespayabletotal") @endphp</td>
                                            <td>@php echo number_format("$salespaidtotal") @endphp</td>
                                            <td>@php echo number_format("$salesduetotal") @endphp</td>
            
                                        </tr>
                                    </tfoot>  
                                    </table>
                            </div>    
                            </div>    
                            </div>    
                            </div> 

                            <br>
                        <h2>Customer Journal Voucher</h2>
                        <div class="col-md-12">
                            <div class="row">
                            <div class="cart cart-sm">     
                                <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                    <td style="width:40px;">SN</td>
                                    <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Total</strong></td>  
                                   
                                    </tr>    
                                    </thead>
                                    </table>
                                    <div class="cart-det style-3 item" style="padding:0px;">    
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                                    <tbody id="tradata">
                                       @php
                                           $i=1;
                                       @endphp
                                       @foreach ($journaldetails as $datas3)
                                        <tr>
                                            <td style="width:40px;" class="center">{{$i++}}</td>
                                            <td style="text-align:left; width:100px;">{{date('d-m-Y', strtotime($datas3->date))}}</td>
                                            <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple" href="{{route('journallist-view-route',['id' => $datas3->id])}}">{{$datas3->journal_no}}</a></td>
                                            <td style="text-align:left; width:90px;">@php echo number_format("$datas3->debit_amount") @endphp</td> 
                                        </tr> 
                                        @endforeach
                                        
                                    </tbody>  
                                    <!-- <tfoot>
                                        <tr>
                                            <td colspan="3" class="center">Total</td>
                                            <td>@php echo number_format("$salespayabletotal") @endphp</td>
                                            <td>@php echo number_format("$salespaidtotal") @endphp</td>
                                            <td>@php echo number_format("$salesduetotal") @endphp</td>
            
                                        </tr>
                                    </tfoot>   -->
                                    </table>
                            </div>    
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
