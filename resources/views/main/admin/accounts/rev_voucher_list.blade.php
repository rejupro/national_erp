@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='recl';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) রিসিভ রেকর্ড @else Receive Record @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) রিসিভ রেকর্ড @else Receive Record @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) রিসিভ রেকর্ড @else Receive Record @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error messages show --}}
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
                     <thead>
                        <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ভাউচার নাঃ @else Voucher No: @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) প্রোজেক্ট নাঃ @else Project No: @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এমাউন্ট @else Amount @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($results as $result)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{date('d-m-Y', strtotime($result->date))}}</td>
                           <td>{{$result->voucher_no}}</td>
                           @if($result->project !=null)
                           <td>{{$result->project->project_id}}</td>
                           @else 
                           <td></td>
                           @endif
                           <td style="text-align:right;"><span>৳ </span>@php echo number_format("$result->amount",2) @endphp</td>
                           <td>{{$result->note}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple details-invoice" href="{{route('receivevoucher-view-route',['id'=>$result->voucher_no])}}" id=""><i class="fa fa-eye cat-child"></i></a>
                              <!--<a class="btn btn-flat bg-purple" href="#"><i class="fa fa-edit"></i></a>-->
                              <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('receivevoucher-destroy-route',['id'=>$result->voucher_no])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('receivevoucher-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) ক্রিয়েট রিসিভ @else Create Receive @endif</a>
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
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History show here  --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
