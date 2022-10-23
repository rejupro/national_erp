@extends("layouts/admin/main")
@section("content")
@php
$mhead='message';
$phead='ms';
@endphp
<section class="content-header">
	<h1>Contact Message</h1>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="{{ route('contact_message_list') }}"><a href="#">Message List</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-8">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Message List</h3>
				</div>
				<div class="box-body">
					<div class="col-md-12 table-responsive">
						<table class="table table-bordered table-striped" id="datarec">
							<thead class="text-uppercase">
								<tr>
									<th style="width:40px;">SN</th>
									<th>Name</th>
									<th>email</th>
									<th style="width:40px; text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody>
								@php $i=1; @endphp
								@foreach($message as $data)
								<tr>
									<td class="center">{{$i++}}</td>
									<td>{{$data->name}}</td>
									<td>{{$data->email}}</td>
									<td nowrap="">
										<a class="btn btn-flat bg-purple" href="{{ route('view_full_message',$data->id) }}" ><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="clearfix" ></div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
