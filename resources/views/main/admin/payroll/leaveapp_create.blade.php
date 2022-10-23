@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='ala';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) লিভ অ্যাপ্লিকেশান @else Leave Application @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) লিভ অ্যাপ্লিকেশান @else Leave Application @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) এড লিভ রেকুয়েস্ট @else Add Leave Request @endif</h3>
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
        {{-- Error message show here  --}}
        <form action="{{ route('leaveapp-store-page') }}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি @else Name @endif</label>
        <div class="input-group">
        <span class="input-group-addon">EM</span>
        <select class="form-control select2" name="emp_id" id="empid">
        <option value="">-Select-</option>
        @foreach($employee as $emp)
        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
        @endforeach
        </select>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) লিভ টাইপ @else Leave Type @endif </label>
        <select class="form-control select2" name="l_id" id="lid">
        <option value="">-Select-</option>
        @foreach($leave as $data)
        <option value="{{ $data->id }}">{{ $data->leave_name }}</option>
        @endforeach
        </select>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) অ্যাপ্লাই ডেট @else Apply Date @endif</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="apply_date" id="apply" value="<?php echo date('Y-m-d');?>" placeholder="" autocomplete="off">
        </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) লিভ ফ্রম @else Leave From @endif</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="start_date" id="fdate" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVF</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) লিভ টু @else Leave To @endif</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="end_date" id="tdate" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVT</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) লিভ ডেস @else Leave Days @endif</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control" name="days" id="days" placeholder="" autocomplete="off">
        <span class="input-group-addon">DAY</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>
        <div class="input-group">
        <span class="input-group-addon">ST</span>
        <select class="form-control" name="status" id="status">
        <option value="2">Pending</option>
        <option value="1">Approve</option>
        <option value="0">Disapprove</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) কারন @else Reason @endif</label>
        <div class="input-group">
        <span class="input-group-addon">RE</span>
        <textarea class="form-control" name="reason" id="reason" maxlength="250" rows="5" placeholder="Reason"></textarea>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</label>
        <div class="input-group">
        <span class="input-group-addon">PA</span>
        <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="Note"></textarea>
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
        <input type="submit" name="save_lar" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{ route('leaveapp-list-page') }}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
        <!-- /.main content -->

@endsection
