@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='accc';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ব্যাংক একাউন্ট ক্রিয়েট @else Bank Account Create @endif</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
            <li class=""><a href="">@if ( Auth::User()->language == 1 ) ব্যাংক একাউন্ট ক্রিয়েট @else Bank Account Create @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) ব্যাংক একাউন্ট ক্রিয়েট @else Bank Account Create @endif</h3>
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
        <form action="{{route('bankaccount_create_store')}}"  enctype="multipart/form-data" method="POST" accept-charset="utf-8">
         @csrf
        <div class="col-md-12 popup_details_div">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-5">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) একাউন্ট নাঃ @else Account No @endif</label>
        <div class="input-group">
            <input type="hidden" class="form-control" maxlength="25" name="uid" value="1" required="" autocomplete="off">
        <span class="input-group-addon">AC</span>
        <input type="text" class="form-control" maxlength="25" name="acc_no" id="acno" placeholder="Account No" required="" autocomplete="off">
        </div>
        </div>
        </div>
        <div class="col-md-7">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) একাউন্ট টাইটেল @else Account Title @endif</label>
        <div class="input-group">
        <span class="input-group-addon">AT</span>
        <input type="text" class="form-control" maxlength="45" name="acc_title" id="title" placeholder="Account Title" required="" autocomplete="off">
        </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-5">
        <div class="form-group" >
        <label for="inputName" class="control-label mb-10">@if ( Auth::User()->language == 1 ) সিলেক্ট ব্যাংক @else Select Bank @endif</label>
        <div class="input-group">
        <span class="input-group-addon">BA</span>
        <select class="form-control select2" name="bid" id="bank" required>

            @foreach($datas as $data)
              <option value="{{ $data->id }}">@php echo $data->name; @endphp</option>
            @endforeach

        </select>
        </div>
        </div>
        </div>
        <div class="col-md-7">
        <div class="form-group">
        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
        <div class="input-group">
        <span class="input-group-addon">BN</span>
        <input type="text" class="form-control" maxlength="45" name="bbrname" id="branch" placeholder="Branch Name" required="" autocomplete="off">
        </div>
        </div>
        </div>
        </div>
        <!--<div class="row">-->
        <!--<div class="col-md-3">-->
        <!--<div class="form-group">-->
        <!--<label>Branch Code</label>-->
        <!--<div class="input-group">-->
        <!--<span class="input-group-addon">BC</span>-->
        <!--<input type="text" class="form-control" maxlength="6" name="bbrcode" id="code"  placeholder="Branch Code" required="" autocomplete="off">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-9">-->
        <!--<div class="form-group">-->
        <!--<label>Branch Location</label>-->
        <!--<div class="input-group">-->
        <!--<span class="input-group-addon">BL</span>-->
        <!--<input type="text" class="form-control" maxlength="250" name="bbrlocation" id="location" placeholder="Branch Location" required="" autocomplete="off">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

        </div>
        <div class="col-md-1"></div>
        </div>
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <input type="submit" name="save_account" id="submit" class="btn btn-flat bg-purple btn-sm" value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('create-bankaccount-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
