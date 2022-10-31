@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_sale';
 $phead='raw_saleall';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) সব সেল @else All Sale @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) সব সেল @else All Sale @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) সব সেল @else All Sale @endif</h3>
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
	                           <th>@if ( Auth::User()->language == 1 ) ইনভয়েস নাম্বার @else Invoice Number @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) সাপ্লায়ার @else Supplier @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) গ্রান্ড টোটাল @else Grand Total @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</th>
	                           <th style="width:100px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
								@foreach($sales as $single)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $single->invoice_no }}</td>
									<td>{{ $single->supplier_name }}</td>
									<td>{{ $single->date }}</td>
									<td>{{ $single->grand_total }}</td>
									<td> <span class="badge" style="background: #8DC43E;">Delivered</span> </td>
									<td style="text-align: center" class=" ">
			                			<a class="btn btn-flat bg-purple" href="{{route('raw_salesingle', $single->id)}}" title="Show Details"><i class="fa fa-eye"></i></a>
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
	                         <a href="{{route('raw_salecreate')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড স্টক @else Add Stock @endif</a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

@endsection







