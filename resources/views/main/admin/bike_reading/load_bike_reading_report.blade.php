@extends("layouts/admin/main")
@section("content")
@php
$mhead='bike_read';
$phead='bikeread';
$page='Bike Reading';
$ractive='H';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'ABNS';
@endphp
<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-10">
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
										<h3 class="page-title">Bike Reading Report</h3>
									</center>    
									<div class="etat_content">
										<div class="page_split">
											<hr>
											<br> 
											<table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
												<thead class="text-uppercase">
													<tr>
														<th style="width:20px;">SN</th>
														<th>Bike Number</th>
														<th>Open Oil Read</th>
														<th>Oil Cost</th>
														<th>End Oil Read</th>
														<th>Service Cost</th>
														<th>Read Date</th>
													</tr>
												</thead>
												@php $i=1; @endphp
												<tbody>
													@foreach ($read as $data)
													<tr>
														<td class="center">{{ $i++ }}</td>
														<td class="center">{{ $data->bike_no }}</td>
														<td class="center">{{ $data->open_read }}</td>
														<td class="center">{{ $data->oil_cost }}</td>
														<td class="center">{{ $data->end_read }}</td>
														<td class="center">{{ $data->service_cost }}</td>
														<td class="center">{{ date('d-m-Y', strtotime($data->read_date)) }}</td>
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