@extends("layouts/admin/main")
@section("content")
@php
 $mhead='lcsetup';
 $phead='lcsetupl';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এলসি লিস্ট @else LC list @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) এলসি লিস্ট @else LC list @endif</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">@if ( Auth::User()->language == 1 ) এলসি লিস্ট @else LC list @endif</h3>
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
                {{-- Error message here    --}}
                <div class="col-md-12 table-responsive">
                   <table class="table table-bordered table-striped" id="datarec">
                      <thead class="text-uppercase">
                         <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এলসি নাঃ @else LC No @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) পিআই কোড @else PI Code @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) শিপমেন্ট ডেট @else Shipment Date @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এক্সপায়রি ডেট @else Expiry Date @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) টোটাল এমাউন্ট @else Total Amount @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                         </tr>
                      </thead>
                      <tbody>
                             {{-- <tr>
                                 <td colspan="8">No data is available</td>
                             </tr> --}}
                             @php $i=1; @endphp
                             @foreach($lc as $data)
                              <tr>
                                 <td class="center">{{$i++}}</td>
                                 <td>{{$data->lc_no}}</td>
                                 <td>{{$data->pi_code}}</td>
                                 <td>{{date('d-m-Y', strtotime($data->ship_date))}}</td>
                                 <td>{{date('d-m-Y', strtotime($data->exp_date))}}</td>
                                 <td>@php echo number_format("$data->t_amount",2) @endphp</td>
                                 <td nowrap="">
                                 <a class="btn btn-flat bg-purple details-invoice" href="{{route('lc-setup-show',$data->id)}}"><i class="fa fa-eye cat-child"></i></a>
                                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('lc-setup-delete',['id' => $data->id])}}"><i class="fa fa-trash"></i></a>
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
                         <a href="{{route('create-lc-setup')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড এলসি @else Add LC @endif</a>
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
                      <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History  @endif</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body" >
                      {{-- History show here --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- /.main content -->

@endsection
