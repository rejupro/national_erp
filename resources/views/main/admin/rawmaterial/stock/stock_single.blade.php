@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='raw_materialstock';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল স্টক ভিউ @else Raw Material Stock View @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল স্টক ভিউ @else Raw Material Stock View @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">{{$material_name}}</h3>
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
							   <th>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) সাপ্লায়ার @else Supplier @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ডিসকাউন্ট (%) @else Discount(%) @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ডিসকাউন্ট  @else Discount @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) সরাসরি ডিসকাউন্ট  @else Direct Discount @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ভ্যাট (%) @else Vat(%) @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ভ্যাট @else Vat @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ট্যাক্স(%) @else Tax(%) @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) ট্যাক্স @else Tax @endif</th>
							   <th>@if ( Auth::User()->language == 1 ) অন্যান্য @else Others @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) ফ্র্যাক ডিস @else Frac Dis @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) গ্রান্ড টোটাল @else Grand Total @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
	                           <th class="text-center">@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
	                           <th class="text-center">@if ( Auth::User()->language == 1 ) মেকড @else Maked @endif</th>
	                           <th class="text-center">@if ( Auth::User()->language == 1 ) স্টক @else Stock @endif</th>
	                           <th class="text-center">@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
								@foreach($datas as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->stock_invoice}}</td>
										<td>{{$data->price}} bdt</td>
										<td>{{$data->supplier_name}}</td>
										<td>{{$data->dis_percen}}%</td>
										<td>{{$data->dis_percen_amount}} bdt</td>
										<td>{{$data->direct_dis}} bdt</td>
										<td>{{$data->vat_percen}}%</td>
										<td>{{$data->vat_percen_amount}} bdt</td>
										<td>{{$data->tax_percen}}%</td>
										<td>{{$data->tax_percen_amount}} bdt</td>
										<td>{{$data->others}} bdt</td>
										<td>{{$data->frac_dis}} bdt</td>
										<td>{{$data->grand_total}} bdt</td>
                                        <td>{{$data->date}}</td>
                                        <td class="text-center">{{$data->quantity}} {{$qty_type}}</td>
                                        <td class="text-center">{{$data->maked_quantity}} {{$qty_type}}</td>
                                        <td class="text-center">{{$data->quantity - $data->maked_quantity}} {{$qty_type}}</td>
                                        <td class="text-center">
                                        	@if($data->finished == 1)
                                        	<span class="btn btn-warning">Stock Out</span>
                                        	@else
                                        	<span class="btn btn-success">Available</span>
                                        	@endif
                                        </td>
                                    </tr>
                                @endforeach
	                      </tbody>
                          <tfoot>
                            <tr>
								<td colspan="2" style="text-align: right"><strong>@if ( Auth::User()->language == 1 ) ডিফল্ট প্রাইস @else Default Price @endif : </strong></td>
								<td class="text-center"><strong>{{$total_price}} bdt</strong></td>
								<td colspan="8"></td>
								<td colspan="2" style="text-align: right"><strong>@if ( Auth::User()->language == 1 ) সর্বমোট @else Grand Total @endif : </strong></td>
								<td class="text-center">{{$grand_total}} bdt</td>
                                <td colspan="" style="text-align: right;padding-right: 10px"><strong>@if ( Auth::User()->language == 1 ) সর্বমোট @else Total Quantity @endif : </strong></td>
                                <td class="text-center"><strong>{{$total}} {{$qty_type}}</strong></td>
                                <td></td>
                                <td colspan="2"></td>
                            </tr>
                          </tfoot>
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







