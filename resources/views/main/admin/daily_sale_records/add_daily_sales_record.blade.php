@extends("layouts/admin/main")
@section("content")
@php
$mhead='addslrptlst';
$phead='addslsrprtlst';
@endphp
<section class="content-header">
	<h1>Daily Expenses Add</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="{{ route('daily-sales-list-page') }}">Daily Sales Report List</a></li>
		<li class=""><a href="#">Add Daily Sales Report</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Add Daily Sales Report</h3>
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
					<form action="{{ route('daily-sales-store-page') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
						@csrf
						@if(!empty($report))
						<input type="hidden" name="id" value="{{ $report->id }}">
						<div class="col-md-12 popup_details_div">
							<div class="row ">
								<div class="col-md-12">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" name="company_name" maxlength="35" value="{{ $report->company_name }}" id="company_name" class="form-control" placeholder="Company Name">
										</div>
										<div class="form-group">
											<label>Contract Person Name</label>
											<input type="text" name="contract_name" maxlength="35" value="{{ $report->contract_name }}" id="contract_name" class="form-control" placeholder="Contract Person Name">
										</div>
										<div class="form-group">
											<label>Contract Person Email</label>
											<input type="email" name="contract_email" value="{{ $report->contract_email }}" id="contract_email" class="form-control" placeholder="Contract Person Email">
										</div>
										<div class="form-group">
											<label>Contract Person Designation</label>
											<input type="text" name="contract_designation" maxlength="35" value="{{ $report->contract_designation }}" id="contract_designation" class="form-control" placeholder="Contract Person Designation">
										</div>
										<div class="form-group">
											<label>Contract Mobile Number</label>
											<input type="telephone" name="contract_mobile" maxlength="11" value="{{ $report->contract_mobile }}" id="contract_mobile" class="form-control" placeholder="Contract Mobile Number">
										</div>
										<div class="form-group">
											<label>Interested Products</label>
											<textarea class="form-control" maxlength="250" rows="6" name="interested_product" placeholder="Interested Products">{{ $report->interested_product }}</textarea>
										</div>
										<div class="form-group">
											<label>Contract Address</label>
											<textarea class="form-control" maxlength="250" rows="6" name="contract_address" placeholder="Contract Address">{{ $report->contract_address }}</textarea>
										</div>
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control" maxlength="250" rows="6" name="comments" placeholder="Comments">{{ $report->comments }}</textarea>
										</div>
										<div class="form-group">
											<label>Visitor Employee</label>
											<div class="input-group">
												<select class="form-control select2" name="employee_id" id="employee_id">
													<option value="{{ $report->employee_id }}">{{ $report->employee_name }}</option>
													@foreach($employee as $data)
													<option value="{{$data->id}}">{{$data->name}}</option>
													@endforeach
												</select>
												<span class="input-group-addon"><a href="{{route('employee-create-page')}}"><span class="fa fa-plus"></span></a></span>
											</div>
										</div>
										<input type="hidden" name="branch_id" maxlength="35" value="{{ $report->branch_id }}" id="branch_id" class="form-control" placeholder="Company Name">
										<div class="form-group">
											<label>Visiting Date</label>
											<input type="date" name="contract_date" maxlength="35" value="{{ $report->contract_date }}" id="contract_date" class="form-control" placeholder="Visiting Date">
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
											<label>Company Name</label>
											<input type="text" name="company_name" maxlength="35" value="" id="company_name" class="form-control" placeholder="Company Name">
										</div>
										<div class="form-group">
											<label>Contract Person Name</label>
											<input type="text" name="contract_name" maxlength="35" value="" id="contract_name" class="form-control" placeholder="Contract Person Name">
										</div>
										<div class="form-group">
											<label>Contract Person Email</label>
											<input type="email" name="contract_email" value="" id="contract_email" class="form-control" placeholder="Contract Person Email">
										</div>
										<div class="form-group">
											<label>Contract Person Designation</label>
											<input type="text" name="contract_designation" maxlength="35" value="" id="contract_designation" class="form-control" placeholder="Contract Person Designation">
										</div>
										<div class="form-group">
											<label>Contract Mobile Number</label>
											<input type="telephone" name="contract_mobile" maxlength="11" value="" id="contract_mobile" class="form-control" placeholder="Contract Mobile Number">
										</div>
										<div class="form-group">
											<label>Interested Products</label>
											<textarea class="form-control" maxlength="250" rows="6" name="interested_product" placeholder="Interested Products"></textarea>
										</div>
										<div class="form-group">
											<label>Contract Address</label>
											<textarea class="form-control" maxlength="250" rows="6" name="contract_address" placeholder="Contract Address"></textarea>
										</div>
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control" maxlength="250" rows="6" name="comments" placeholder="Comments"></textarea>
										</div>
										<div class="form-group">
											<label>Visitor Employee</label>
											<div class="input-group">
												<select class="form-control select2" name="employee_id" id="employee_id">
													<option value="">-Select Sales Representative-</option>
													@foreach($employee as $data)
													<option value="{{$data->id}}">{{$data->name}}</option>
													@endforeach
												</select>
												<span class="input-group-addon"><a href="{{route('employee-create-page')}}"><span class="fa fa-plus"></span></a></span>
											</div>
										</div>
										<input type="hidden" name="branch_id" maxlength="35" value="{{ Auth::User()->brand_id }}" id="branch_id" class="form-control" placeholder="Company Name">
										<div class="form-group">
											<label>Visiting Date</label>
											<input type="date" name="contract_date" maxlength="35" value="" id="contract_date" class="form-control" placeholder="Visiting Date">
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
								<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="{{ route('daily-sales-list-page') }}" class="btn btn-flat bg-gray  ">Close</a>
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
