@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='mobc';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) মোবাইল একাউন্ট ক্রিয়েট @else Mobile Account Create @endif</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
                <li class=""><a href="">@if ( Auth::User()->language == 1 ) মোবাইল একাউন্ট @else Mobile Account @endif</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) মোবাইল একাউন্ট ক্রিয়েট @else Mobile Account Create @endif</h3>
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
        <form action="{{ route('create-mobileaccount-store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
           @csrf
            <div class="col-md-12 popup_details_div">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                <input type="text" name="mname" maxlength="45" value="" class="form-control" placeholder="Ex: Bkash"  />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>@if ( Auth::User()->language == 1 ) নাম্বার @else Number @endif</label>
                                <input type="text" name="mobile" maxlength="11" value="" class="form-control" placeholder="017XXXXXXXXX"  />
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
            <div class="clearfix" ></div>
            <div class="col-md-12 nopadding widgets_area"></div>
            <div class="row"style="margin-top: 15px" >
                <div class="col-md-8"></div>
                <div class="col-md-4 text-right" >
                    <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{ route('mobileaccount-list') }}" class="btn btn-flat bg-grayss">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
