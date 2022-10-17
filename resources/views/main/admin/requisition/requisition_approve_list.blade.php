@extends("layouts/admin/main")
@section("content")
@php
$mhead='requisition';
$phead='req_app_list';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এপ্রুভ রিকুইজিশন রেকর্ড @else Approve Requisition Record @endif</h1>
   <ol class="breadcrumb">
   <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) এপ্রুভ রিকুইজিশন রেকর্ড @else Approve Requisition Record @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) এপ্রুভ রিকুইজিশন লিস্ট  @else Approve Requisition List @endif</h3>
            </div>
            <div class="box-body">
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
                           <th>@if ( Auth::User()->language == 1 ) তারিখ ও সময় @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ভাউচার নাঃ @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) রিকুইজিশন ফর @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) স্টাফ নেম @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Name @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($requisition as $data)
                        <tr>
                           <td width="30px">{{$i++}}</td>
                           <td width="30px">{{date('d-m-Y', strtotime($data->created_at))}}</td>
                           <td width="60px">{{$data->code}}</td>
                           <td width="60px">{{$data->project->project_id}}</td>
                           <td width="65px">{{$data->staff->name}}</td>
                           <td width="65px">{{$data->status}}</td>
                           <td width="60px">
                              @php 
                               $brid=Auth::User()->brand_id;
                              @endphp
                              {{-- <a class="empty" style="cursor: pointer;" href="{{route('requisition-edit-route',$data->code)}}"><i class="fa fa-edit"></i></a> --}}
                              @if($brid==1)
                                  <a class="empty" onclick="return confirm('Are you sure you want to delete this item?');" style="cursor: pointer;" href="{{route('requisition-delete-route',$data->code)}}"><i class="fa fa-trash"></i></a>
                              @endif
                              <a class="empty" style="cursor: pointer;" href="{{route('requisition-view-route',$data->id)}}"><i class="fa fa-eye"></i></a>
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
                        <a href="{{route('requisition-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড রিকুইজিশন @else Add Requisition @endif</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
