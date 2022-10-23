@extends("layouts/admin/main")
@section("content")
@php
 $mhead='product';
 $phead='proc';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এড নিউ প্রোডাক্ট @else Add New Product @endif</h1>
   <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) এড নিউ প্রোডাক্ট @else Add New Product @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) এড নিউ প্রোডাক্ট @else Add New Product @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif
               <form action="{{route('product-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-9">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                       <input type="text" name="name" maxlength="65" value="" id="name" class="form-control" placeholder="e.g. Denim" required />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>
                                       <!-- <input type="text" name="code" maxlength="45" value="{{$pro_track}}" id="code" class="form-control" placeholder="e.g. Mr.Sumon" readonly/> -->
                                       <input type="text" name="code" maxlength="45" value="" id="code" class="form-control" placeholder="e.g. pro-code1" required />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 {{-- <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Parent (Optional)</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="parent_id" id="parent_id">
                                             <option value="">-Select-</option>
                                             <option value=""></option>
                                          </select>
                                          <span class="input-group-addon"><a href="pro_parentcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div> --}}
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ক্যাটেগরি @else Category @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                             <option value="">-Select-</option>
                                             @foreach($categorys as $category)
                                             <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="{{route('category-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) সাবক্যাটেগরি @else SubCategory @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="sub_cat_id" id="sub_cat_id">
                                             <option value="">-Select-</option>
                                             @foreach($subcategorys as $subcategory)
                                             <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="{{route('subcategory-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ব্রান্ড @else Brand @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="brand_id" id="brand_id">
                                             <option value="">-Select-</option>
                                             @foreach($brands as $brand)
                                             <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="{{route('brand-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ম্যানুফেকচারার @else Manufacturer @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="manufac_id" id="manufac_id">
                                            <option value="">-Select-</option>
                                            @foreach($manufactures as $manufacture)
                                            <option value="{{$manufacture->id}}">{{$manufacture->manufacture_name}}</option>
                                           @endforeach
                                         </select>
                                          <span class="input-group-addon"><a href="{{route('manufacture-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ইউনিট @else Unit @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="unit_id" id="unit_id">
                                             <option value="">-Select-</option>
                                             @foreach($units as $unit)
                                             <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="{{route('unit-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) পারচেস স্ক্যান @else Purchase Scan @endif</label>
                                       {{-- <select class="form-control" name="pmode" id="pmode">
                                          <option value="">-Select-</option>
                                          <option value="0">Barcode</option>
                                          <option value="1">Serial</option>
                                          <option value="2">IMEI</option>
                                       </select> --}}
                                       <input type="text" name="pur_scan" maxlength="65" value="" id="pur_scan" class="form-control" placeholder="e.g. Denim"/>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) দেশ @else Country @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="country_id" id="country_id">
                                             <option value="">-Select-</option>
                                             @foreach($countrys as $country)
                                             <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="{{route('country-create-route')}}"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>
                                       <select class="form-control select2" name="status" id="status">
                                          <option value="1">Active</option>
                                          <option value="0">De-Active</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) সার্টিফেকেট @else Certificate @endif</label>
                                       <input type="text" maxlength="100" value="" name="certificate" id="certificate" class="form-control" placeholder="e.g. ISO:9901"/>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) মিনিমাম স্টক @else Minimum Stock @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="0" name="min_stock" id="min_stock" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) মডেল নাঃ @else Model No @endif</label>
                                       <input type="text" maxlength="25" class="form-control" name="model" id="model" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) খরচ @else Cost @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="0" name="cost" id="cost" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ওয়ারেন্টি ডেস @else Warranty Days @endif</label>
                                       <input type="text" maxlength="4" class="form-control" min="0" value="0" name="w_day" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ব্রান্ড নাঃ @else Brand No @endif</label>
                                       <input type="text" maxlength="25" class="form-control" name="brand_no" id="brand_no" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="0" name="price" id="price" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) বারকোড (অপশনাল) @else Barcode (Optional) @endif</label>
                                       <input type="text" maxlength="25" class="form-control" name="barcode" id="barcode" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ইমেজ @else Image @endif</label>
                                       <div style="width:200px; height:245px;">
                                          <img src="../img/product/no_image.png" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
                                       </div>
                                       <br>
                                       <input type="file" class="btn btn-file bg-purple btn-sm" name="avater" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
                                       <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_item" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('product-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
