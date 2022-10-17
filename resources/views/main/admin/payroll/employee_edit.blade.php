@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি ইডিট @else Employee Edit @endif</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
            <li class=""><a href="">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি ইডিট @else Employee Edit @endif</a></li>
        </ol>
    </section>
   <!-- Main content -->
   <section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি ইডিট @else Employee Edit @endif</h3>
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
    {{--Error message show here   --}}
    <form action="{{ route('employee-update-page',$data->id) }}" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        @csrf
    <div class="col-md-12 popup_details_div">    
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) ডিপার্টমেন্ট @else Department @endif</label>
    <div class="input-group">
    <span class="input-group-addon">DP</span>
    <select class="form-control select2" name="dept_id" id="dipid" >
    <option value="{{ $data->dept_id }}">{{ $data->dept_name }}</option>
    @foreach($department as $dep)
    <option value="{{ $dep->id }}">{{ $dep->dept_name }}</option>
    @endforeach
    </select>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</label>
    <div class="input-group">
    <span class="input-group-addon">DS</span>
    <select class="form-control select2" name="desg_id" id="desid" >
    <option value="{{ $data->desg_id }}">{{ $data->desg_name }}</option>
    @foreach($designation as $des)
    <option value="{{ $des->id }}">{{ $dep->desg_name }}</option>
    @endforeach                                                              
    </select>
    </div>
    </div>        
    </div>    
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
    <div class="input-group">
    <span class="input-group-addon">N</span>
    <input type="text" maxlength="45" class="form-control" name="name" value="{{ $data->name }}" id="name" placeholder="e.g. Sumon" autocomplete="off" >
    </div>
    </div>
    </div>
    </div>    
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) পিতার নাম @else Father Name @endif</label>
    <div class="input-group">
    <span class="input-group-addon">FN</span>
    <input type="text" maxlength="45" class="form-control" name="fname" id="fname" value="{{ $data->fname }}" placeholder="e.g. Abul Kalam" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) মোবাইল @else Mobile @endif</label>
    <div class="input-group">
    <span class="input-group-addon">MO</span>
    <input type="text" maxlength="18" class="form-control" name="mobile" id="mobile" value="{{ $data->mobile }}" placeholder="e. g. 0161xx700xx" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) ইমেইল @else Email @endif</label>
    <div class="input-group">
    <span class="input-group-addon">EM</span>
    <input type="email" maxlength="45" class="form-control" name="email" id="email" value="{{ $data->email }}" placeholder="e.g. info@axesgl.com" autocomplete="off">
    </div>
    </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) মাতার নাম @else Mother Name @endif</label>
    <div class="input-group">
    <span class="input-group-addon">MN</span>
    <input type="text" maxlength="45" class="form-control" name="mname" id="mname" value="{{ $data->mname }}" placeholder="e.g. Begum Feroza" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) ফোন @else Phone @endif</label>
    <div class="input-group">
    <span class="input-group-addon">PH</span>
    <input type="text" maxlength="14" class="form-control" name="phone" id="inputPhone" value="{{ $data->phone }}" placeholder="Phone No:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) এনআইডি নাম্বার @else NID No @endif</label>
    <div class="input-group">
    <span class="input-group-addon">NI</span>
    <input type="text" maxlength="17" class="form-control" name="nidno" id="nidno" value="{{ $data->nidno }}" onkeypress="return isNumberKey(event)" placeholder="NID No:" autocomplete="off">
    </div>
    </div>    
    </div>    
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) জন্মতারিখ @else Date of Birth @endif</label>
    <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-calendar"></span>
    </span>
    <input type="text" class="form-control datetimepicker" name="dob" id="dob" value="{{ $data->dob }}" placeholder="Date of Birth:" autocomplete="off" >
    <span class="input-group-addon">DOB</span>
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) জয়েনিং ডেট @else Joining Date @endif</label>
    <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    <input type="text" maxlength="18" class="form-control datetimepicker" name="join_date" value="{{ $data->join_date }}" id="job" placeholder="Joining Date:" autocomplete="off" >
    <span class="input-group-addon">JOB</span>
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) সেলারি @else Salary @endif</label>
    <div class="input-group">
    <span class="input-group-addon">SA</span>
    <input type="text" maxlength="6" class="form-control" name="salary" id="salary" value="{{ $data->salary }}" onkeypress="return isNumberKey(event)" placeholder="Salary:" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>
    <div class="input-group">
    <span class="input-group-addon">ST</span>    
    <select class="form-control" name="status">
    <option value="1">Active</option>
    <option value="0">De-Active</option>
    </select>    
    </div>
    </div>
    <div class="form-group" >
    <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ @else Branch @endif</label>
    <div class="input-group">
    <span class="input-group-addon">BR</span>
    <select class="form-control select2" name="wbrid" id="wbrid" >
    <option value="{{ $data->wbrid }}">{{ $data->br_name }}</option>
    @foreach($branch as $brn)
    <option value="{{ $brn->id }}">{{ $dep->br_name }}</option>
    @endforeach                                                                                                       
    </select>
    </div>
    </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="inputIMAGE" class="control-label mb-10">@if ( Auth::User()->language == 1 ) ইমেজ @else Image @endif</label>
    <div style="width:200px; height:245px;">
    <img src="{{ asset($data->item) }}" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <br>    
    <input type="file" class="btn btn-flat bg-purple btn-sm" name="item" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
        
    </div>    
    </div>    
    </div>
    <div class="row">
    <div class="col-md-6">    
    <div class="form-group">
    <label>@if ( Auth::User()->language == 1 ) রেসিডেন্টাল এড্রেস @else Residential Address @endif</label>
    <div class="input-group">
    <span class="input-group-addon">RA</span>
    <textarea class="form-control" name="address" id="address" maxlength="250" rows="5" placeholder="Residential Address" >{{ $data->address }}</textarea>
    </div>    
    </div>
    </div>
    <div class="col-md-6">    
    <div class="form-group">
    <label>@if ( Auth::User()->language == 1 ) পারমানেন্ট এড্রেস @else Permanent Address @endif</label>
    <div class="input-group">
    <span class="input-group-addon">PA</span>
    <textarea class="form-control" name="paddress" id="paddress" maxlength="250" rows="5" placeholder="Permanent Address" >{{ $data->paddress }}</textarea>
    </div>    
    </div>
    </div>    
    </div>
    
    </div>    
    <div class="col-md-1"></div>
    </div>
    </div>
        
    <div class="clearfix" ></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="{{ route('employee-list-page') }}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
    {{-- History --}}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </section>


    
@endsection
