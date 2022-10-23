@extends("layouts/admin/main")
@section("content")
@php
$mhead='daily';
$phead='dexr';
@endphp
<section class="side-cont">
   @include('layouts.admin.print_head')
   <div class="box box-solid">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-3">
                  <div id="test-list" class="notebooks">
                     <input type="text" class="search">
                     <ul class="list" id="listitem">
                        @foreach ($list as $lists)
                        <a href="{{route('daily-expense-view-route',['id' => $lists->voucher_no])}}">
                           @if($lists->voucher_no==$data->voucher_no)
                           <li class="invpiv active" >
                           @else
                           <li class="invpiv" >
                           @endif
                              <p><strong class="pino">{{$lists->voucher_no}}</strong><br><br><strong>{{date('d-m-Y', strtotime($lists->date))}}</strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳@php echo number_format("$lists->grand_total",2) @endphp</strong></div>
                           </li>
                        </a>
                        @endforeach
                     </ul>
                     <div class="whole">
                        <span>
                           <a class="pagination-prev disabled" href="#">
                           &lt;&lt;
                           </a>
                           <ul class="pagination-layout">
                              <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                           </ul>
                           <a class="pagination-next" href="#">
                           &gt;&gt;
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="invhold scrol-y" id="invhold">
                      @include('layouts.admin.print_head2')
                        <div class="wrapper" style="width: 407.726px; height: 574.703px; overflow: hidden;">
                           <div id="wrap_invoice" class="page A4 portrait" style="transform: scale(0.51); transform-origin: 10px 0px 0px;">
                              <div class="invoice_header etat_header">
                                 <div class="row model1">
                                    <div class="col-xs-3 invoice-logo">
                                       <img src="{{asset(companyData()->image)}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>{{ companyData()->name }}</h4>
                                       <p>{{ companyData()->address }}<br><strong>Phone:</strong>{{ companyData()->phone }}<br><strong>Mobile:</strong> {{ companyData()->mobile }}<br><strong>Email:</strong> {{ companyData()->email }}<br><strong>Web:</strong> {{ companyData()->web }}</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->voucher_no, 'C39')}}" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Payment N°:</strong> {{$data->voucher_no}}
                                       <br><strong>Date:</strong>{{date('d-m-Y', strtotime($data->date))}}
                                       @if($data->stf_id!=null)<br><strong>Em/Co Name:</strong> 
                                             @php
                                                $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                                $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                                $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
                                                $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                                                if($type == 'CO'){
                                                   $sname=DB::table('procontractors')->where('id', $id)->first();
                                                   $revname=$sname->name;
                                                }
                                                if($type == 'EP'){
                                                   $sname=DB::table('employees')->where('id', $id)->first(); 
                                                   $revname=$sname->name;
                                                
                                                   }
                                          @endphp
                                       {{$revname}}
                                       @endif
                                       <br><strong>Project Code:</strong> @if($data->project_id!=null){{$data->project->project_id}}@endif
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">DAILY EXPENSES VOUCHER</h3>
                              </center>
                              <div class="etat_content">
                                    <div class="page_split">
                                     


                                        <hr>
                                        <br>

                                        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                   <th style="width:5% !important;">N°</th>
                                                   <th style="width:12.5% !important;">Expense/Product</th>
                                                   <th style="width:12.5% !important;">Type</th>
                                                   <th style="width:12.5% !important;">Unit</th>
                                                   <th style="width:10% !important;">Net Price</th>
                                                   <th style="width:10% !important;">Quantity</th>
                                                   <th style="width:17.5% !important;">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                      @foreach ($details as $datas)
                                                      
                                                <tr>
                                                   <td class="text-md-center">{{$i++}}</td>
                                                   <td class="text-md-center">{{$datas->requisition_item}}</td>
                                                   <td class="text-md-center">{{optional($datas->types)->name}}</td>
                                                   <td class="text-md-center">{{optional($datas->unit)->name}}</td>
                                                   <td class="text-md-center">{{$datas->nprice}}</td>
                                                   <td class="text-md-center">{{$datas->qty}}</td>
                                                   <td style="text-align:right;">@php echo number_format("$datas->price") @endphp</td> 
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" style="font-weight: bold;text-align:center;">-Total-</td>
                                                    <td id="total" style="text-align:right;">@php echo number_format("$data->grand_total",2) @endphp</td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td id="word_translate" colspan="7"><span style="font-weight: bold;">In Word:</span> {{ NumConvert::word($data->grand_total)}} taka only</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><span style="font-weight: bold;">Note:{{$data->note}} </span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                <div class="row">

                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Prepared By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Checked By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Approved By</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div style="clear: both;"></div>
                                </div>
                              <div class="invoice_footer">
                                 <hr>
                                 <p style="margin-top: -5px;">Axes Business Automation. © 2021</p>
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
   </div>
</section>

@endsection



