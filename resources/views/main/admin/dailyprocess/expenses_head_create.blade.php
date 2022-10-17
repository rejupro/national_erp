@extends("layouts/admin/main")
@section("content")
@php
 $mhead='daily';
 $phead='dehc';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এক্সপেন্স হেড ক্রিয়েট @else Expenses Head Create @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) এক্সপেন্স হেড ক্রিয়েট @else Expenses Head Create @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">>@if ( Auth::User()->language == 1 ) এক্সপেন্স হেড ক্রিয়েট @else Expenses Head Create @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message   --}}
               <form action="{{route('expense-head-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                 <input type="text" name="name" maxlength="35" value="" id="name" class="form-control" placeholder="e.g. Electric Bill"  />
                              </div>
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) টাইপ @else Type @endif</label>
                                 <select class="form-control" name="e_type" id="etype">
                                    <option value="">-Select-</option>
                                    @foreach($data as $single)
                                    <option value="{{$single->name}}">{{$single->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                              </div>
                           </div>
                           <div class="col-md-3"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_exphead" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
