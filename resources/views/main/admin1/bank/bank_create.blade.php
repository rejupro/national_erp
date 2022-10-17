@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='bankc';
@endphp
    <section class="content-header">
        <h1>Bank Create</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="mas_brandcreate.php">Bank</a></li>
                <li class=""><a href="{{ route('create-bank-page') }}">Bank Create</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Add New Bank</h3>
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
        <form action="{{ route('create-bank-store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
           @csrf
            <div class="col-md-12 popup_details_div">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="name" maxlength="100" value="" class="form-control" placeholder="Bank Name"  />
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{-- <div class="form-group">
                                <label>Sort Name</label>
                                <input type="text" name="sort" maxlength="100" value="" class="form-control" placeholder="Sort Name"  />
                            </div> --}}
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
                    <input type="submit" name="save_bank" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{ route('create-bank-list') }}" class="btn btn-flat bg-grayss">Close</a>
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
        <h3 class="box-title">History </h3>
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
