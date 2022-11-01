@extends("layouts/admin/main")
@section("content")
@php
 $mhead='product';
 $phead='rawproduct_stock';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 )  প্রোডাক্ট স্টক  @else  Product Stock @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 )  প্রোডাক্ট স্টক  @else  Product Stock @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">{{$batch}}</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
		                   <table class="table table-bordered table-striped">
		                      <thead class="text-uppercase">
		                         <tr>
		                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
		                           <th>@if ( Auth::User()->language == 1 )  ম্যাটেরিয়ালস @else Material @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) টাইপ @else Type @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) গিভেন @else Given @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) প্যাকেট টাইপ @else Packate Type @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) প্যাকেট ওয়েট @else Packate Weight @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) কস্ট @else Cost @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) মেকড @else Maked @endif</th>
		                         </tr>
		                      </thead>
		                      <tbody>
									@php $i = 1; @endphp
									@foreach($rawmaterial as $single)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$single->name}}</td>
										<td>{{$single->give_type}}</td>
										<td>{{$single->given_amount}}</td>
										<td>{{$single->packate_type}}</td>
										<td>{{$single->packate_weight}}</td>
										<td>{{$single->product_cost}}</td>
										<td>{{$single->maked}}</td>
									</tr>
									@endforeach
		                      </tbody>
		                      
		                   </table>
		                </div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">{{$batch}}</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
		                   <table class="table table-bordered table-striped">
		                      <thead class="text-uppercase">
		                         <tr>
		                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
		                           <th>@if ( Auth::User()->language == 1 ) এক্সপেন্স নাম @else Expense Name @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) এক্সপেন্স প্রাইস @else Expense Price @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
								   <th>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</th>
		                         </tr>
		                      </thead>
		                      <tbody>
									@php $i = 1; @endphp
									@foreach($expense as $single)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$single->name}}</td>
										<td>{{$single->expense_price}}</td>
										<td>{{$single->expense_quantity}}</td>
										<td>{{$single->expense_total}}</td>
									</tr>
									@endforeach
		                      </tbody>
		                      
		                   </table>
		                </div>
					</div>
				</div>
			</div>	
		</div>
			
	</section>

	 <!-- /.main content -->

@endsection







