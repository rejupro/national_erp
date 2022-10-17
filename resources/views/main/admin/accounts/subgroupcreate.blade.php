@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='subgrpc';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এড সাব-গ্রুপ @else Add Sub-Group @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) এড সাব-গ্রুপ @else Add Sub-Group @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) এড সাব-গ্রুপ @else Add Sub-Group @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               <form action="{{route('subgroup-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                 <input type="text" name="name" maxlength="35" value="" id="name" class="form-control" placeholder="e.g. Cash At Hand" />
                              </div>
                              <div class="form-group">
                                 <label for="">@if ( Auth::User()->language == 1 ) গ্রুপ @else Group @endif</label>
                                <select class="form-control select2" name="grp_id" id="grp_id">
                                    <option value="">--Select--</option>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if(old('grp_id') == $group->id) selected @endif>{{$group->name}}</option>
                                    @endforeach
                                 </select>
                                 {{-- <select class="form-control select2" name="grp_id" id="grp_id">
                                    <label>Select Group</label>
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if(old('grp_id') == $group->id) selected @endif>{{$group->name}}</option>
                                    @endforeach --}}
                                    {{-- @foreach($projects as $project)
                                    <option value="{{$project->id}}" @if(old('project_id') == $project->id) selected @endif>{{$project->name}}</option>
                                    @endforeach --}}
                                 {{-- </select> --}}
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
                        <input type="submit" name="save_sgroup" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('subgroup-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
                     {{-- histroy Show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
