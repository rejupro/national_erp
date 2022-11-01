@extends("layouts/admin/main")
@section("content")
@php
 $mhead='product';
 $phead='rawproduct_stock';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) প্রোডাক্ট স্টক  @else  Product Stock @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 )  প্রোডাক্ট স্টক  @else  Product Stock @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 )  প্রোডাক্ট স্টক  @else Product Stock @endif</h3>
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
	                           <th>@if ( Auth::User()->language == 1 ) প্রোডাক্ট ব্যাচ @else Product Batch @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) প্রোডাক্ট @else Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) প্রোডাক্ট কস্ট @else Product Cost @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) প্যাকেট এক্সপেন্স (%) @else Packate Expense @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) অন্যান্য এক্সপেন্স  @else Other Expense @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ডিডাকসন  @else Deduction @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ভালো প্রোডাক্ট @else Well Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) নস্ট প্রোডাক্ট @else Wasted Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) এক্সট্রা প্রোডাক্ট @else Extra Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) রেডি প্রোডাক্ট @else Ready Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) সেল প্রোডাক্ট @else Sell Product @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) স্টক স্ট্যাটাস @else Stock Status @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
                @foreach($stock as $single)
                	<tr>
                		<td>{{$i++}}</td>
                		<td>{{$single->product_batch}}</td>
                		<td>{{$single->name}}</td>
                		<td>{{$single->product_cost}}</td>
                		<td>{{$single->packate_expense}}</td>
                		<td>{{$single->other_expense}}</td>
                		<td>{{$single->deduction_expense}}</td>
                		<td>{{$single->well_product}}</td>
                		<td>{{$single->wasted_product}}</td>
                		<td>{{$single->extra_product}}</td>
                		<td>{{$single->total_ready_product}}</td>
                		<td>{{$single->sell_product}}</td>
                		<td>
                			@if($single->stock_status == 1)
                			<span class="badge badge-secondary">Out of Stock</span>
                			@else
                			<span class="badge badge-success">Stock Available</span>
                			@endif
                		</td>
                		<td style="text-align: center">
                			<a class="btn btn-flat bg-purple" href="{{route('rawproduct_stockbatch', $single->product_batch)}}" title="Show Details"><i class="fa fa-eye"></i></a>
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
	                         <a href="{{route('rawproduct_create')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড স্টক @else Add Stock @endif</a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

@endsection







