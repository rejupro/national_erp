@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='raw_materialstock';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল স্টক @else Raw Material Stock @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল স্টক @else Raw Material Stock @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল স্টক @else Raw Material Stock @endif</h3>
					</div>
					<div class="box-body">
					{{-- Error message here    --}}
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
	                           <th>@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল কোড @else Material Code @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) ইমেজ @else Image @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) টোটাল পারচেস @else Total Purchase @endif</th>
	                           <!-- <th>@if ( Auth::User()->language == 1 ) টোটাল সেল @else Total Sell @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) কারেন্ট স্টক @else Current Stock @endif</th> -->
	                           <th style="width:100px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
								@foreach($datas as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>{{$data->material_name}}</td>
                                    <td>
                                        <img src="{{asset('public/' . $data->image)}}" alt="" style="max-height: 80px; max-width: 80px">
                                    </td>
                                    <td>{{$data->total_stock}} {{$data->qty_type}}</td>
                                    <!-- <td>{{$data->make_material}} {{$data->qty_type}}</td>
                                    <td>{{$data->total_stock - $data->make_material}} {{$data->qty_type}}</td> -->
                                    <td class="text-center">
										<a class="btn btn-flat bg-purple" href="{{ route('material_stocksingle', ['id' => $data->material_id]) }}" title="Show Details" ><i class="fa fa-eye"></i></a>
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
	                         <a href="{{route('rawmaterial_purchasestore')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড স্টক @else Add Stock @endif</a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

@endsection







