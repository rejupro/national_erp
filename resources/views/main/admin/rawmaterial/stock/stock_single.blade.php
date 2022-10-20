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
	                           <th>@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল কোড @else Material Code @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) ইনভয়েস নাম্বার @else Invoice Number @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
	                           <th class="text-center">@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
								@foreach($datas as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->code}}</td>
                                        <td>{{$data->stock_invoice}}</td>
                                        <td>{{$data->date}}</td>
                                        <td class="text-center">{{$data->quantity}} {{$qty_type}}</td>
                                    </tr>
                                @endforeach
	                      </tbody>
                          <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: right;padding-right: 10px"><strong>@if ( Auth::User()->language == 1 ) সর্বমোট @else Total Quantity @endif : </strong></td>
                                <td class="text-center"><strong>{{$total}} {{$qty_type}}</strong></td>
                                
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







