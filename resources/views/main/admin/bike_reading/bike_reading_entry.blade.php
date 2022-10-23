@extends("layouts/admin/main")
@section("content")
@php
$mhead='addbike_read';
$phead='addbikeread';
@endphp
<section class="content-header">
	<h1>Bike Reading List</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="{{ route('bike-reading-list-page') }}">Bike Reading List</a></li>
		<li class=""><a href="#">Add Bike Reading</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Add Bike Reading</h3>
				</div>
				<div class="box-body">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="{{ route('bike-reading-store') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
						@csrf
						@if(!empty($read))
							<input type="hidden" name="id" value="{{ $read->id }}">
							<div class="col-md-12 popup_details_div">
								<div class="row ">
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Read Date</label>
												<input type="date" name="read_date" maxlength="35" value="{{ $read->read_date }}" id="read_date" class="form-control" required="required" placeholder="Read Date">
											</div>
											<div class="form-group">
												<label>Bike Number</label>
												<input type="text" name="bike_no" maxlength="35" value="{{ $read->bike_no }}" id="bike_no" class="form-control" required="required" placeholder="Bike Number">
											</div>
											<div class="form-group">
												<label>Open Oil Read</label>
												<input type="text" name="open_read" maxlength="35" value="{{ $read->open_read }}" id="open_read" class="form-control" required="required" placeholder="Open Oil Read">
											</div>
											<div class="form-group">
												<label>Oil Cost</label>
												<input type="number" name="oil_cost" value="{{ $read->oil_cost }}" id="oil_cost" class="form-control" required="required" placeholder="Oil Cost">
											</div>
											<div class="form-group">
												<label>End Oil Read</label>
												<input type="text" name="end_read" maxlength="35" value="{{ $read->end_read }}" id="end_read" class="form-control" required="required" placeholder="End Oil Read">
											</div>
											<div class="form-group">
												<label>Service Cost</label>
												<input type="number" name="service_cost" maxlength="11" value="{{ $read->service_cost }}" id="service_cost" class="form-control" required="required" placeholder="Service Cost">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea class="form-control" required="required" maxlength="250" rows="6" name="comments" placeholder="Comments">{{ $read->comments }}</textarea>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						@else
							<input type="hidden" name="id" value="">
							<div class="col-md-12 popup_details_div">
								<div class="row ">
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Read Date</label>
												<input type="date" name="read_date" maxlength="35" value="" id="read_date" class="form-control" required="required" placeholder="Read Date">
											</div>
											<div class="form-group">
												<label>Bike Number</label>
												<input type="text" name="bike_no" maxlength="35" value="" id="bike_no" class="form-control" required="required" placeholder="Bike Number">
											</div>
											<div class="form-group">
												<label>Open Oil Read</label>
												<input type="text" name="open_read" maxlength="35" value="" id="open_read" class="form-control" required="required" placeholder="Open Oil Read">
											</div>
											<div class="form-group">
												<label>Oil Cost</label>
												<input type="number" name="oil_cost" value="" id="oil_cost" class="form-control" required="required" placeholder="Oil Cost">
											</div>
											<div class="form-group">
												<label>End Oil Read</label>
												<input type="text" name="end_read" maxlength="35" value="" id="end_read" class="form-control" required="required" placeholder="End Oil Read">
											</div>
											<div class="form-group">
												<label>Service Cost</label>
												<input type="number" name="service_cost" maxlength="11" value="0" id="service_cost" class="form-control" required="required" placeholder="Service Cost">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea class="form-control" required="required" maxlength="250" rows="6" name="comments" placeholder="Comments"></textarea>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						@endif
						<div class="clearfix"></div>
						<div class="col-md-12 nopadding widgets_area"></div>
						<div class="row" style="margin-top: 15px">
							<div class="col-md-8"></div>
							<div class="col-md-4 text-right">
								<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="{{ route('bike-reading-list-page') }}" class="btn btn-flat bg-gray  ">Close</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		{{-- <div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title">History </h3>
						</div>
						<div class="box-body">
							<div class="row"><div class="col-md-12"><div class="alert alert-history" style="background-color: transparent !important;border: 0px  !important;max-height:400px;min-height: 500px"><ul class="timeline"><li><span class="label label-success">07 Jun 2021</span></li><li><i class="fa fa-chevron-right bg-gray"></i>
								<div class="timeline-item" style="background-color: transparent !important">
									<span class="time"><i class="fa fa-clock-o"></i> 12:42:05 AM</span><h3 class="timeline-header"> <a href="#">You</a></h3>
									<div class="timeline-body">
										<p class="timeline-title">Brand has been deleted</p>Brand name: ALIEN</div></div></li></ul></div></div></div></div>
									</div>
								</div>
							</div>
						</div> --}}
	</div>
</section>
@endsection
