@extends("layouts/admin/main")
@section("content")
<section class="content-header">
    <h1>Edit Shipping Line</h1>
    <ol class="breadcrumb">
    <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="mas_mancreate.php">Master Process</a></li>
    <li class=""><a href="{{route('transport-edit-route',$transport->id)}}">Edit Shipping Line</a></li>
    </ol>
</section>
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Edit Shipping Line</h3>
    </div>
    <div class="box-body">
       {{-- errorm message show here --}}
    <form action="{{route('transport-update-route',$transport->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf
    @method('patch')
        <div class="col-md-12 popup_details_div">

    <div class="row">
    <div class="col-md-12">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="col-md-12">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <label>Sort Name</label>
    <input type="text" name="sort" maxlength="8" value="{{$transport->sort}}" id="sort" class="form-control" placeholder="e.g. OOCL"  />
    </div>
    </div>
    <div class="col-md-8">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" maxlength="35" value="{{$transport->name}}" id="name" class="form-control" placeholder="e.g. Orient Overseas Container Line"  />
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label>Contact No</label>
    <input type="text" name="contact" maxlength="18" value="{{$transport->contact}}" id="contact" class="form-control" placeholder="e.g. +880161xxxxxxx"  />
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" maxlength="150" rows="6" name="address" placeholder="Address">{{$transport->address}}</textarea>
    </div>
    </div>
    </div>
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
    <input type="submit" name="save_ship" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="mas_shiplist.php" class="btn btn-flat bg-gray  ">Close</a>
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

@endsection
