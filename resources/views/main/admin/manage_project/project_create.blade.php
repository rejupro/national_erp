@extends("layouts/admin/main")
@section("content")
@php
 $mhead='project';
 $phead='prc';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) প্রোজেক্ট রেকর্ড ক্রিয়েট @else Project Record Create @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোজেক্ট রেকর্ড ক্রিয়েট @else Project Record Create @endif</a></li>
        </ol>
    </section>
     <!-- Main content -->
     <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) প্রোজেক্ট রেকর্ড ক্রিয়েট @else Project Record Create @endif</h3>
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
        <form action="{{route('project-store-page')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         @csrf
            <div class="col-md-12 popup_details_div">

        <div class="row ">
        <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) প্রোজেক্ট আইডি @else Project ID @endif</label>
        <input type="text" name="project_id" maxlength="20" id="prjid"  value=""   class="form-control" placeholder="e. g. EDU487K" />
        </div>
        </div>
        <div class="col-md-8">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) প্রোজেক্টের নাম @else Project Name @endif</label>
        <input type="text" name="name" maxlength="60" value="" id="name" class="form-control" placeholder="e.g Rapura Water Line"  />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) সিলেক্ট গ্রুপ @else Select Group @endif</label>
        <select class="form-control select2" name="pgid" id="pgid" >
        <option value="">-Select-</option>
            @foreach($group as $groups)
                <option value="{{$groups->id}}">{{$groups->name}}</option>
            @endforeach
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) সাব-গ্রুপ @else Sub-Group @endif</label>
        <select class="form-control select2" name="psgid" id="psgid">
        <option value="">-Select-</option>
            @foreach($subgroup as $subgroups)
              <option value="{{$subgroups->id}}">{{$subgroups->name}}</option>
            @endforeach
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) প্রোজেক্ট স্ট্যাটাস @else Project Status @endif</label>
        <select class="form-control" name="status" id="status">
        <option value="">-Select-</option>
        <option value="Start">Start</option>
        <option value="On-Process">On-Process</option>
        <option value="Done">Done</option>
        <option value="Apply">Apply</option>
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) কনটাক্ট পারসন @else Contact Person @endif</label>
        <input type="text" name="cperson" maxlength="35" value="" class="form-control" placeholder="e.g Mr.Enamul Haque"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) কনটাক্ট নাম্বার @else Contact Number @endif</label>
        <input type="text" name="cnumber" maxlength="18" value="" class="form-control" placeholder="e.g +880161xxxxx70"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) প্রোজেক্ট ভেলু @else Project Value @endif</label>
        <input type="text" name="prjamount" maxlength="16" value=""  class="form-control" placeholder="e.g 3,50,00,000"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) টারগেট এস্পেন্সেস @else Target Expenses @endif</label>
        <input type="text" name="prjexamount" maxlength="16" value=""  class="form-control" placeholder="e.g 2,50,00,000"  />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) সিলেক্ট কনটাক্টর @else Select Contractor @endif</label>
        <select class="form-control select2" name="coid" id="coid">
        <option value="">-Select-</option>
            @foreach($contractor as $contractors)
                <option value="{{$contractors->id}}">{{$contractors->name}}</option>
            @endforeach
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) কনটাক্ট এমাউন্ট @else Contact Amount @endif</label>
        <input type="text" name="coamount" maxlength="16" value=""  class="form-control" placeholder="e.g 2,10,00,000"  />
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) সিলেক্ট ক্লায়েন্ট/ডিপার্টমেন্ট @else Select Client/Department @endif</label>
        <select class="form-control select2" name="client" id="client">
        <option value="">-Select-</option>
            @foreach($customer as $customers)
              <option value="{{$customers->id}}">{{$customers->name}}</option>
            @endforeach
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) প্রোজেক্ট ডিটেইলস @else Project Details @endif</label>
        <textarea class="form-control" maxlength="250" rows="6" name="prjdetails" placeholder="e.g. Details"></textarea>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) এড্রেস @else Address @endif </label>
        <textarea class="form-control" maxlength="150" rows="6" name="address" placeholder="e.g. Address"></textarea>
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
        <input type="submit" name="save_project" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('project-list-page')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
        {{-- History  --}}
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- /.main content -->

@endsection
