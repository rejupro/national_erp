@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ইডিট কালার @else Edit Color @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) ইডিট কালার @else Edit Color @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) ইডিট কালার @else Edit Color @endif</h3>
            </div>
            <div class="box-body">
               {{-- errorm message show here --}}
               <form action="{{route('color-update-route',$color->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                          <input type="text" name="name" maxlength="25" value="{{$color->name}}" id="name" class="form-control" placeholder="e.g. Green"  />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>@if ( Auth::User()->language == 1 ) কালার @else Color @endif</label>
                                          <br>
                                          <input type="text" class="basic" id="basic" data-preferred-format="hex" value="{{$color->color}}" data-fouc />
                                          {{-- <input type="hidden" name="colval" id="colval"> --}}
                                       </div>
                                    </div>
                                 </div>
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
                        <input type="submit" name="save_color" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="{{route('color-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
