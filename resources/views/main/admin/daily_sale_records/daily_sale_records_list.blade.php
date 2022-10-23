@extends("layouts/admin/main")
@section("content")
@php
 $mhead='slrptlst';
 $phead='slsrprtlst';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ডেইলি সেলস রিপোর্ট @else Daily Sales Report @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ডেইলি সেলস রিপোর্ট @else Daily Sales Report @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) ডেইলি সেলস রিপোর্ট @else Daily Sales Report @endif</h3>
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
                           <th>@if ( Auth::User()->language == 1 ) কোম্পানি নাম @else Company Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) কোনট্রাক্ট পারসন @else Contract Person @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) কোনট্রাক্ট নাঃ @else Contract No. @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এড্রেস @else Address @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ভিজিটিং ডেট @else Visiting Date @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                       @php $i=1; @endphp
                     <tbody>
                        @foreach ($report as $data)
	                        <tr>
	                           	<td class="center">{{ $i++ }}</td>
	                           	<td class="center">{{ $data->company_name }}</td>
	                           	<td class="center">{{ $data->contract_name }}</td>
	                           	<td class="center">{{ $data->contract_designation }}</td>
	                           	<td class="center">{{ $data->contract_mobile }}</td>
	                           	<td class="center">{{ $data->contract_address }}</td>
	                           	<td class="center">{{ date('d-m-Y', strtotime($data->contract_date)) }}</td>
	                           	<td class="center">
	                           		<a class="btn btn-flat bg-purple details-invoice" href="{{route('daily-sales-view-page',$data->id)}}" data-toggle="modal" data-target="#flipFlop"><i class="fa fa-eye cat-child"></i></a>
	                           		<a class="btn btn-flat bg-purple details-invoice" href="{{route('daily-sales-edit-page',$data->id)}}"><i class="fa fa-edit"></i></a>
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
                        <a href="{{route('daily-sales-create-page')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড ডেইলি সেলস রিপোর্ট @else Add Daily Sales Report @endif</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->

<!-- The modal -->
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

		</div>
	</div>
</div>
@endsection
