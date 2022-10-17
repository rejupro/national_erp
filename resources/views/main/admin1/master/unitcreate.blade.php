@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='uc';
@endphp
<section class="content-header">
    <h1>Add Unit</h1>
    <ol class="breadcrumb">
    <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="mas_mancreate.php">Master Process</a></li>
    <li class=""><a href="{{route('unit-create-route')}}">Add Unit</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Add New Unit</h3>
    </div>
    <div class="box-body">
    <form action="{{route('unit-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        @csrf
    <div class="col-md-12 popup_details_div">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row ">
    <div class="col-md-12">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Unit Name</label>
    <input type="text" name="name" maxlength="35" value="" id="pname" class="form-control" placeholder="Unit Name"  />
    </div>
    <div class="form-group">
    <label>Description</label>
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
    <input type="submit" name="save_unit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{route('unit-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
