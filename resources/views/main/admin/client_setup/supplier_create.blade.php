@extends("layouts/admin/main")
@section("content")
@php
 $mhead='client';
 $phead='sc';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) সাপ্লায়ার ক্রিয়েট @else Supplier Create @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) সাপ্লায়ার ক্রিয়েট @else Supplier Create @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) সাপ্লায়ার ক্রিয়েট @else Supplier Create @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here  --}}
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif
               <form action="{{route('supplier-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>
                                    <select class="form-control" name="status" id="status">
                                       <option value="1">Acive</option>
                                       <option value="0">De-Acive</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>
                                    <input type="text" name="code" maxlength="15" value="{{$sup_track}}" id="code" class="form-control" placeholder="e.g. ABA/SU/001" readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কন্টাক্ট নেম @else Contact Name @endif</label>
                                    <input type="text" name="c_name" maxlength="45" value="" id="cperson" class="form-control" placeholder="e.g. Md.Rahman Sumon(CEO)"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কন্টাক্ট নাম্বার @else Contact Number @endif</label>
                                    <input type="text" name="c_num" maxlength="18" value="" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কন্টাক্ট ফোন @else Contact Phone @endif</label>
                                    <input type="text" name="c_phone" maxlength="14" value="" id="cphone" class="form-control" placeholder="e.g. +88-02-721xxx1"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) সিলেক্ট আন্ডার @else Select Under @endif</label>
                                    <select class="form-control select2" name="under_id" id="orsupid">
                                       <option value="">-Select-</option>
                                       @foreach ($zones as $zone)
                                       <option value="{{$zone->id}}">{{$zone->zone}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                      <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কন্টাক্ট ইমেইল @else Contact Email @endif</label>
                               <input type="text" name="c_email" maxlength="45" value="" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) ক্রেডিট লিমিট @else Credit Limit @endif</label>
                                    <input type="text" name="credit_limit" maxlength="12" value="0" id="climit" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 350000.00"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) সিলেক্ট গ্রুপ @else Select Group @endif</label>
                                    <select class="form-control select2" name="cgrp_id" id="scgid">
                                       <option value="">-Select-</option>
                                       @foreach ($groups as $group)
                                       <option value="{{$group->id}}">{{$group->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) র‍্যানকিং @else Ranking @endif</label>
                                    <input type="text" name="ranking" maxlength="3" value="0" id="rank" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 127"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) এড্রেস @else Address  @endif</label>
                                    <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Office Address"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) ফ্যাক্টরি এড্রেস @else Factory Address @endif</label>
                                    <textarea class="form-control" name="f_address" id="faddress" maxlength="200" rows="4" placeholder="Factory Address"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_suplier" id="submit" class="btn btn-flat bg-purple btn-sm" value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('supplier-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
