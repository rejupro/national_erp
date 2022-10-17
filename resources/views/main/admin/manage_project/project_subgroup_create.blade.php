@extends("layouts/admin/main")
@section("content")
@php
 $mhead='project';
 $phead='prsgc';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট @else Project Sub-Group Create @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট @else Project Sub-Group Create @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট @else Project Sub-Group Create @endif</h3>
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
        <form action="{{route('prosubgroup-store-create')}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">

            <div class="row ">
                <div class="col-md-12">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) সাব-গ্রুপের নাম @else Sub-Group Name @endif</label>
                                        <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e. g. LGED" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) গ্রুপ কোড @else Group Code @endif</label>
                                        <input type="text" name="code" maxlength="6"  readonly="" value="{{ $results}}" class="form-control" placeholder="e.g 101020"  />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@if ( Auth::User()->language == 1 ) সিলেক্ট গ্রুপ @else Select Group @endif</label>
                                <select class="form-control select2" name="pgid" id="pgid">
                                <option value="">-Select-</option>
                                @foreach($group as $groups)
                                    <option value="{{$groups->id}}">{{$groups->name}}</option>
                                @endforeach
                                </select>
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
                <input type="submit" name="save_subgroup" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('prosubgroup-list-create')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
        {{-- History show here --}}
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- /.main content -->

@endsection
