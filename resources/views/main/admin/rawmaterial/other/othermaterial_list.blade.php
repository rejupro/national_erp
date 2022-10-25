@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='other_materiallist';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল লিস্ট @else Other Material List @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল লিস্ট @else Other Material List @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল লিস্ট @else Other Material List @endif</h3>
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
	                           <th>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</th>
	                           <th>@if ( Auth::User()->language == 1 ) ইমেজ @else Image @endif</th>
	                           <th style="width:100px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
	                         </tr>
	                      </thead>
	                      <tbody>
								@php $i = 1; @endphp
								@foreach($datas as $data)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$data->code}}</td>
									<td>{{$data->name}}</td>
									<td>{{$data->price}}</td>
									<td>
										@if($data->image)
										<img src="{{asset('public/' . $data->image)}}" alt="" style="max-height: 100px; max-width: 100px">
										@else
										<img src="{{asset('public/Upload/rawmaterial/no_image.jpg')}}" style="max-height: 100px; max-width: 100px">
										@endif
									</td>
									<td>
									<a class="btn btn-flat bg-purple" href="{{ route('other_rawmaterialedit', ['id' => $data->id]) }}" ><i class="fa fa-edit"></i></a>
									<a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('other_rawmaterialdelete',['id' => $data->id]) }}"><i class="fa fa-trash"></i></a>
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
	                         <a href="{{route('other_rawmaterialadd')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড এক্সপেন্স @else Add Expense @endif</a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

@endsection







