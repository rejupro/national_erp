@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) প্রোডাক্ট ইডিট @else Product Edit @endif</h1>
   <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোডাক্ট ইডিট @else Product Edit @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) প্রোডাক্ট ইডিট @else Product Edit @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               <form action="{{route('product-update-route',$product->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-9">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                       <input type="text" name="name" maxlength="65" value="{{$product->name}}" id="name" class="form-control" placeholder="e.g. Denim"/>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>
                                       <input type="text" name="code" maxlength="45" value="{{$product->code}}" id="code" class="form-control" placeholder="e.g. Mr.Sumon" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) প্যারেন্ট (অপশনাল) @else Parent (Optional) @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="parent_id" id="parent_id">
                                             <option value="">-Select-</option>
                                             <option value=""></option>
                                          </select>
                                          <span class="input-group-addon"><a href="pro_parentcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ক্যাটেগরি @else Category @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}" @php echo ($product->cat_id == $category->id ? "selected" : ""); @endphp>{{$category->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="pro_categorycreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) সাবক্যাটেগরি @else SubCategory @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="sub_cat_id" id="sub_cat_id">
                                            @foreach($subcategorys as $subcategory)
                                            <option value="{{$subcategory->id}}" @php echo ($product->sub_cat_id == $subcategory->id ? "selected" : ""); @endphp>{{$subcategory->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="pro_subcategorylist.php"><span class="fa fa-plus"></span></a></span>
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
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @php echo ($product->brand_id == $brand->id ? "selected" : ""); @endphp>{{$brand->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="mas_brandcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ম্যানুফেকচারার @else Manufacturer @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="manufac_id" id="manufac_id">
                                            @foreach($manufactures as $manufacture)
                                            <option value="{{$manufacture->id}}" @php echo ($product->manufac_id == $manufacture->id ? "selected" : ""); @endphp>{{$manufacture->manufacture_name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="mas_mancreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ইউনিট @else Unit @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="unit_id" id="unit_id">
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}" @php echo ($product->unit_id == $unit->id ? "selected" : ""); @endphp>{{$unit->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="mas_unitcreate.php"><span class="fa fa-plus"></span></a></span>
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
                                       <input type="text" name="pur_scan" maxlength="65" value="{{$product->pur_scan}}" id="pur_scan" class="form-control" placeholder="e.g. Denim"/>

                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) দেশ @else Country @endif</label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="country_id" id="country_id">
                                            @foreach($countrys as $country)
                                            <option value="{{$country->id}}" @php echo ($product->country_id == $country->id ? "selected" : ""); @endphp>{{$country->name}}</option>
                                            @endforeach
                                          </select>
                                          <span class="input-group-addon"><a href="mas_countrycreate.php"><span class="fa fa-plus"></span></a></span>
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
                                       <input type="text" maxlength="100" value="{{$product->certificate}}" name="certificate" id="certificate" class="form-control" placeholder="e.g. ISO:9901"/>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) মিনিমাম স্টক @else Minimum Stock @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="{{$product->min_stock}}" name="min_stock" id="min_stock" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) মডেল নাঃ @else Model No @endif</label>
                                       <input type="text" maxlength="25" class="form-control" name="model" value="{{$product->model}}" id="model" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) খরচ @else Cost @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="{{$product->cost}}" name="cost" id="cost" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ওয়ারেন্টি ডেস @else Warranty Days @endif</label>
                                       <input type="text" maxlength="4" class="form-control" min="0" value="{{$product->w_day}}" name="w_day" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) ব্রান্ড নাঃ @else Brand No @endif</label>
                                       <input type="text" maxlength="25" class="form-control" value="{{$product->brand_no}}" name="brand_no" id="brand_no" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="{{$product->price}}" name="price" id="price" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label>@if ( Auth::User()->language == 1 ) বারকোড (অপশনাল) @else Barcode (Optional) @endif</label>
                                       <input type="text" maxlength="25" class="form-control" name="barcode" value="{{$product->barcode}}" id="barcode" autocomplete="off">
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
                                       <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$product->description}}</textarea>
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
                        <input type="submit" name="save_item" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="{{route('product-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
