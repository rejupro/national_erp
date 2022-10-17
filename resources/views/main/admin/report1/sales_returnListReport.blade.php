@extends("layouts/admin/main")
@section("content")
@php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Return Record (Invoice)';
$ractive='B';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'SALRR';
@endphp
<section class="content-header">
   <h1>Return Record (Invoice)</h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Report</a></li>
      <li class=""><a href="#">Return Record (Invoice)</a></li>
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
                            <li  @if($ractive=='A') class="active" @endif><a href="{{route('sales-list-report')}}">Sales Record (Invoice)</a></li>
                            <li  @if($ractive=='B') class="active" @endif><a href="{{route('return-sales-list-report')}}">Return Record (Invoice)</a></li>
                            <li  @if($ractive=='C') class="active" @endif><a href="{{route('customer-list-report')}}">Customer Wise (Invoice)</a></li>
                            <li  @if($ractive=='D') class="active" @endif><a href="{{route('sales-item-list-report')}}">Item Wise</a></li>
                            <li  @if($ractive=='E') class="active" @endif><a href="{{route('sales-itemst-list-report')}}">Item Statement</a></li>
                            <li  @if($ractive=='F') class="active" @endif><a href="{{route('sales-reriodic-report')}}">Periodic Sales Record</a></li>
                            <li  @if($ractive=='H') class="active" @endif><a href="{{route('sales-overview-report')}}">Overview</a></li>
                           </ul>
                        </div>
                     </div>
                     <hr>
                     <form  onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <!--From Data-->
                        <div class="col-md-12">
                           <div class="row">
                              <div class="form-group" >
                                 <label>Branch</label>
                                 <div class="input-group">
                                    <span class="input-group-addon">BR</span>
                                    <select class="form-control select2" name="ibrid" id="ibrid">
                                       <option>-All Branch-</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group" >
                                 <label>From</label>
                                 <div class="input-group date datetimepicker">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" maxlength="18" class="form-control" name="tfdate" value="" required autocomplete="off" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" >
                                 <label>To</label>
                                 <div class="input-group date datetimepicker">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" maxlength="18" class="form-control" name="ttdate" value="" required autocomplete="off" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--End From Data-->
                        <div class="clearfix"></div>
                        <div class="col-md-12 nopadding widgets_area"></div>
                        <div class="row"style="margin-top: 15px" >
                           <div class="col-md-4"></div>
                           <div class="col-md-8 text-right" >
                              <input type="submit" name="filter_submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/> <a href="axe_report.php" class="btn btn-flat bg-gray  ">Close</a>
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
                              <h3 class="page-title">SALES RETURN</h3>
                           </center>
                           <div class="etat_content">
                              <div class="page_split">
                                 <hr>
                                 <div class="row row-equal">
                                    <div class="col-xs-4 text-left">
                                       {{-- <h3 class="inv col"><b>Start Date: {{$purchase->purchase_date}}</b></h3> --}}
                                    </div>
                                    <div class="col-xs-4 text-center">
                                       {{-- <h3 class="inv col"><b>Branch: {{$purchase->product_store}}</b></h3> --}}
                                    </div>
                                    <div class="col-xs-4 text-right">
                                       {{-- <h3 class="inv col"><b>End Date: {{$purchase->next_date}}</b></h3> --}}
                                    </div>
                                 </div>
                                 <hr>
                                 <br>
                                 <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                       <tr>
                                          <th style="text-align:left; width:30px;"><strong>SN</strong></th>
                                          <th style="text-align:left;"><strong>Date</strong></th>
                                          <th style="text-align:left;"><strong>Invoice</strong></th>
                                          <th style="text-align:left;"><strong>Vendor</strong></th>
                                          <th style="text-align:center;"><strong>MRP</strong></th>
                                          <th style="text-align:center;"><strong>DIS</strong></th>
                                          <th style="text-align:center;"><strong>VAT</strong></th>
                                          <th style="text-align:center;"><strong>TAX</strong></th>
                                          <th style="text-align:center;"><strong>SPD</strong></th>
                                          <th style="text-align:center;"><strong>OTH</strong></th>
                                          <th style="text-align:center;"><strong>FRE</strong></th>
                                          <th style="text-align:center;"><strong>LES</strong></th>
                                          <th style="text-align:center;"><strong>Total</strong></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($detail as $data)

                                       <tr>
                                          <td class="text-md-center">{{$i++}}</td>
                                          <td></td>
                                          <td>{{$data->purchase_track}}</td>
                                          <td>{{$data->supplier_name}}</td>
                                          <td class="text-md-right"></td>
                                          <td class="text-md-right">{{$data->discount_amount}}</td>
                                          <td class="text-md-right">{{$data->vat_amount}}</td>
                                          <td class="text-md-right">{{$data->tax_amount}}</td>
                                          <td class="text-md-right">{{$data->speed_money_amount}}</td>
                                          <td class="text-md-right">{{$data->other_amount}}</td>
                                          <td class="text-md-right">{{$data->freight_amount}}</td>
                                          <td class="text-md-right">{{$data->discount_amount}}</td>
                                          <td class="text-md-right">{{$data->total}}</td>
                                       </tr>
                                       <tr>
                                          <td class="text-md-center" colspan="4"><strong>-Total-</strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong></td>
                                          <td class="text-md-right"><strong></strong>{{$data->grand_total}}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
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
                              <p style="margin-top: -5px;"></p>
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
