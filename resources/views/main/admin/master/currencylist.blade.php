@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='currl';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) কারেন্সি লিস্ট @else Currency List @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) কারেন্সি লিস্ট @else Currency List @endif</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) কারেন্সি লিস্ট @else Currency List @endif</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) সর্ট @else Sort @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) সিম্বল @else Symbol @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) এক্সচেঞ্জ রেট @else Exchange Rate @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach ($currencies as $currency)
                        <tr>
                            <td class="center">{{$i++}}</td>
                            <td>{{$currency->name}}</td>
                            <td>{{$currency->sort}}</td>
                            <td>{{$currency->symbol}}</td>
                            <td>{{$currency->x_rate}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('currency-edit-route',['id'=>$currency->id])}}" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('currency-edit-route',['id'=>$currency->id])}}" ><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('currency-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড কারেন্সি @else Add Currency @endif</a>
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
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
