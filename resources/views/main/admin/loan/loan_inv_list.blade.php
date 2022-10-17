@extends("layouts/admin/main")
@section("content")
@php
 $mhead='loan';
 $phead='loaninvlist';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) লন ইনভয়েস @else Loan Invoice @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) লন ইনভয়েস @else Loan Invoice @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">@if ( Auth::User()->language == 1 ) লন ইনভয়েস @else Loan Invoice @endif</h3>
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
                   <table class="table table-bordered table-striped" >
                      <thead class="text-uppercase">
                         <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ইনভয়েস নাঃ @else Invoice No @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) লন আইডি @else Loan ID @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এমাউন্ট @else Amount @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) প্রফিট এমাউন্ট @else Profit Amount @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ইন্সটলমেন্ট @else Installment @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) টোটাল @else Total @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                         </tr>
                      </thead>
                      <tbody>
                             
                           @php $i=1; @endphp
                           @foreach ($loaninvoice as $data)
                              <tr>
                                 <td class="center">{{$i++}}</td>
                                 <td>{{$data->inv_no}}</td>
                                 <td>{{$data->loan_id}}</td>
                                 <td>@if($data->amount>0) @php echo number_format("$data->amount") @endphp @endif</td>
                                 <td>@if($data->profit_amount>0) @php echo number_format("$data->profit_amount",2) @endphp @endif</td>
                                 <td>{{$data->installment}}</td>
                                 <td>@php echo number_format("$data->total",2) @endphp</td>
                                 <td nowrap="">
                                  {{-- <a class="btn btn-flat bg-purple" href="{{route('loaninvoice-edit-route',$data->id)}}"><i class="fa fa-edit"></i></a> --}}
                                   <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('loaninvoice-delete-route',$data->id)}}"><i class="fa fa-trash"></i></a>
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
                         <a href="{{route('loaninvoice-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড লন @else Add Loan @endif</a>
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