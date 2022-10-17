@extends("layouts/admin/main")
@section("content")
@php
$mhead='bike_read';
$phead='bikeread';
@endphp
<section class="content-header">
	<h1>@if ( Auth::User()->language == 1 ) বাইক রিডিং লিস্ট @else Bike Reading List @endif</h1>
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট @else Project Sub-Group Create @endif</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) বাইক রিডিং লিস্ট @else Bike Reading List @endif</h3>
				</div>
				<div class="box-body">
					{{-- Error message show here    --}}
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered table-striped" id="datarec">
							<thead class="text-uppercase">
								<tr>
									<th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
									<th>@if ( Auth::User()->language == 1 ) বাইক নাম্বার @else Bike Number @endif</th>
									<th>@if ( Auth::User()->language == 1 ) ওপেন ওয়েল রিড @else Open Oil Read @endif</th>
									<th>@if ( Auth::User()->language == 1 ) ওয়েল কোস্ট @else Oil Cost @endif</th>
									<th>@if ( Auth::User()->language == 1 ) ইন্ড ওয়েল রিড @else End Oil Read @endif</th>
									<th>@if ( Auth::User()->language == 1 ) সার্ভিস কোস্ট @else Service Cost @endif</th>
									<th>@if ( Auth::User()->language == 1 ) রিড ডেট @else Read Date @endif</th>
									<th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
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
									<td class="center">
										<a class="btn btn-flat bg-purple details-invoice" href="{{route('bike-reading-edit-page',$data->id)}}"><i class="fa fa-edit"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="clearfix" ></div>
					<div class="row"style="margin-top: 15px" >
						<div class="col-md-12 table-responsive">
							<div class="col-md-8"></div>
							<div class="col-md-4 text-right" >
								<a href="{{route('bike-reading-create-page')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড বাইক রিডিং @else Add Bike Reading @endif</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title">@if ( Auth::User()->language == 1 ) ফিল্টার ও প্রিন্ট @else Filter And Print @endif</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body" >
							<form action="{{ route('bike-reading-report-page') }}" method="POST">
								@csrf
								<div class="row"> 
									<div class="col-md-6">    
										<div class="form-group" >
											<label>From</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												<input type="date" maxlength="18" class="form-control" name="from" value="" required autocomplete="off" required>
											</div>
										</div>
									</div>
									<div class="col-md-6">    
										<div class="form-group" >
											<label>To</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												<input type="date" maxlength="18" class="form-control" name="to" value="" required autocomplete="off" required>
											</div>
										</div>
									</div> 
									<div class="col-md-12">    
										<div class="form-group" >
											<button type="submit" data-toggle="modal" data-target="#flipFlop" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড বাইক রিডিং @else Add Bike Reading @endif</button> 
										</div>
									</div>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.main content -->

<!-- The modal -->
@endsection
