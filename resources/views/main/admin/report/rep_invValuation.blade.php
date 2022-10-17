@extends("layouts/admin/main")
@section("content")
@php
$mhead='report';
$menuh='Report';
$phead='report';
$page='INVENTORY VALUATION';
$ractive='E';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'INVPL';
@endphp

<section class="content-header">
   <h1>INVENTORY VALUATION</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Report</a></li>
      <li class=""><a href="#">INVENTORY VALUATION</a></li>
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
                              <li  @if($ractive=='A') class="active" @endif><a href="{{route('inv-product-list-report')}}">PRODUCT LIST</a></li>
                              <li  @if($ractive=='B') class="active" @endif><a href="{{route('inv-sales-list-report')}}">SERIAL RECORD</a></li>
                              <li  @if($ractive=='C') class="active" @endif><a href="{{route('inv-summary-report')}}">INVENTORY SUMMARY</a></li>
                              <li  @if($ractive=='D') class="active" @endif><a href="{{route('inv-periodic-count-report')}}">PERIODIC INVENTORY COUNT</a></li>
                              <li  @if($ractive=='E') class="active" @endif><a href="{{route('inv-valuation-report')}}">INVENTORY VALUATION</a></li>
                              <li  @if($ractive=='F') class="active" @endif><a href="{{route('inv-perio-valuation-report')}}">PERIODIC INVENTORY VALUATION</a></li>
                              <li  @if($ractive=='H') class="active" @endif><a href="{{route('inv-overview-report')}}">Overview</a></li>
                           </ul>
                        </div>
                     </div>
                     <hr>
                     {{-- <form  onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Branch</label>
                                 <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                    <option value="">-Select-</option>
                                    @foreach($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                               <label>Item</label>
                               <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                  <option value="">-Select-</option>
                                  @foreach($categorys as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                               </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                               <label>Category</label>
                               <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                  <option value="">-Select-</option>
                                  @foreach($categorys as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                               </select>
                            </div>
                         </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Sub-Category</label>
                                 <select class="form-control select2" name="sub_cat_id" id="sub_cat_id">
                                    <option value="">-Select-</option>
                                    @foreach($subcategorys as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                   @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Brand</label>
                                 <select class="form-control select2" name="brand_id" id="brand_id">
                                    <option value="">-Select-</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                   @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Status</label>
                                 <select class="form-control" name="status">
                                    <option value="A">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">De-Active</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 nopadding widgets_area"></div>
                        <div class="row"style="margin-top: 15px" >
                           <div class="col-md-4"></div>
                           <div class="col-md-8 text-right" >
                              <input type="submit" name="filter_submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/> <a href="axe_report.php" class="btn btn-flat bg-gray  ">Close</a>
                           </div>
                        </div>
                     </form> --}}
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
                              <h3 class="page-title">INVENTORY VALUATION</h3>
                           </center>
                           <div class="etat_content">
                              <div class="page_split">
                                 <hr>
                                 <div class="row row-equal">
                                    <div class="col-xs-4 text-left">
                                       <h3 class="inv col"><b>Start Date: </b></h3>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                       <h3 class="inv col"><b>Branch: </b></h3>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                       <h3 class="inv col"><b>End Date: </b></h3>
                                    </div>
                                 </div>
                                 <hr>
                                 <br>
                                 <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                    <tr>
                                    <th style="width: 40px !important;" rowspan="2">SN</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Code</th>
                                    <th rowspan="2">Category</th>
                                    <th colspan="9">Purchase Details</th>
                                    <th colspan="6">Sold Details</th>
                                    <th colspan="2">Closing Details</th>
                                    </tr>
                                    <tr>
                                    <th>Pur</th>
                                    <th>Rec</th>
                                    <th>Ret</th>
                                    <th>Irec</th>
                                    <th>Sen</th>
                                    <th>Dis</th>
                                    <th>Bal</th>
                                    <th>Cost</th>
                                    <th>Value</th>
                                    <th>Sel</th>
                                    <th>Del</th>
                                    <th>Ret</th>
                                    <th>Nsel</th>
                                    <th>Price</th>
                                    <th>Value</th>
                                    <th>Avq</th>
                                    <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                    <td style="text-align:center;"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:right;"></td>
                                    <td style="text-align:right;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:right;"></td>
                                    <td style="text-align:right;"></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:right;"></td>
                                    </tr>

                                    <tr>
                                    <td style="text-align:center;" colspan="4"><strong>-Total-</strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:right;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"></td>
                                    <td style="text-align:right;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    <td style="text-align:center;"><strong></strong></td>
                                    </tr>
                                    <tr>

                                    </tr>
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
