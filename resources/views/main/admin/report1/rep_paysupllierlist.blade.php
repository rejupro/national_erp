@extends("layouts/admin/main")
@section("content")
@php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Supplier List';
$ractive='A';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'PAYSL';
@endphp

<section class="content-header">
  <h1>Supplier List</h1>
  <ol class="breadcrumb">
     <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
     <li><a href="mas_brandcreate.php">Report</a></li>
     <li class=""><a href="#">Supplier List</a></li>
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
      <li  @if($ractive=='A') class="active" @endif><a href="{{route('supllierlist-report')}}">Suppliers List</a></li>
      <li  @if($ractive=='B') class="active" @endif><a href="{{route('supllierbalance-report')}}">Suppliers Balance</a></li>
      <li  @if($ractive=='C') class="active" @endif><a href="{{route('supllierstatement-report')}}">Suppliers Statement</a></li>
      <li  @if($ractive=='D') class="active" @endif><a href="{{route('supllieritemstate-report')}}">Suppliers Item Statement</a></li>
      <li  @if($ractive=='E') class="active" @endif><a href="{{route('supllieroverview-report')}}">Suppliers Overview</a></li>`
      <li  @if($ractive=='F') class="active" @endif><a href="{{route('revoverview-report')}}">Overview</a></li>
    </ul>
    </div>
    </div>
    <hr>    
    <form  onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <!--From Data-->    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Select District</label>
                <select class="form-control select2" name="did" >
                <option value="">-Select-</option>
                </select>    
            </div>
        </div>        
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Zone</label>
                <select class="form-control select2" name="zid" id="zid">
                <option value="">-Select-</option>
                </select>     
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
    <h3 class="page-title">Supplier List</h3>
    </center>    
    <div class="etat_content">
    <div class="page_split">    
    <hr>
    <br>
    <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
      <thead>
      <tr>
        <th style="width:40px;">SN</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Code</th>
        <th>Address</th>
      </tr>    
      </thead>
      <tbody>
        @php $i=1; @endphp
        @foreach ($suppliers as $supplier)
       <tr>
          <td class="center">{{$i++}}</td>
          <td>{{$supplier->name}}</td>
          <td>{{$supplier->c_num}}</td>
          <td>{{$supplier->code}}</td>
          <td>{{$supplier->address}}</td>
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