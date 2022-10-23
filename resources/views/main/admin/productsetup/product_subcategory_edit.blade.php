@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি ইডিট @else Sub-Category Edit @endif</h1>
   <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি ইডিট @else Sub-Category Edit @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি ইডিট @else Sub-Category Edit @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here   --}}
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif
               <form action="{{route('subcategory-update-route',$subcategory->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">

                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি নেম @else Sub-Category Name @endif</label>
                                 <input type="text" name="name" maxlength="45" value="{{$subcategory->name}}" id="sname" class="form-control" placeholder="Sub-Category Name" />
                              </div>
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) সিলেক্ট ক্যাটেগরি @else Select Category @endif</label>
                                 <select class="form-control select2" name="cat_id" id="cat_id">
                                    @foreach($categorys as $category)
                                    <option value="{{$category->id}}" @php echo ($subcategory->cat_id == $category->id ? "selected" : ""); @endphp>{{$category->name}}</option>
                                    @endforeach
                              </div>
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$subcategory->description}}</textarea>
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
                        <input type="submit" name="save_subcategory" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="pro_subcategorylist.php" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
                     {{-- History here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
