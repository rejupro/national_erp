@extends("layouts/admin/main")
@section("content")
<section class="content-header">
    <h1>Edit District</h1>
    <ol class="breadcrumb">
    <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="mas_mancreate.php">Master Process</a></li>
    <li class=""><a href="#">Edit District</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Edit District</h3>
    </div>
    <div class="box-body">
       {{-- errorm message show here --}}
    <form action="{{route('district-update-route',$district->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf
    @method('patch')
        <div class="col-md-12 popup_details_div">

    <div class="row ">
    <div class="col-md-12">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Country</label>
     <input type="text" name="country" maxlength="35" value="{{$district->country}}" id="name" class="form-control" placeholder="e.g. Bangladesh"/>
    </div>
    <div class="form-group">
    <label>District</label>
      <input type="text" name="district" maxlength="35" value="{{$district->district}}" id="name" class="form-control" placeholder="e.g. Dhaka"/>
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
    <input type="submit" name="save_country" id="submit" class="btn btn-flat bg-purple btn-sm " value="Upadte"/> <a href="{{route('distrct-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
