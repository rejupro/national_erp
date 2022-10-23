@extends("layouts/admin/main")
@section("content")
{{-- @php
 $mhead='company';
 $phead='csetup';
@endphp --}}
<section class="content-header">
   <h1>Company Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Company</a></li>
      <li class=""><a href="#">Company setup</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Create Company</h3>
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
    <form action="{{ route('company-store-create') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
      @csrf
    <div class="col-md-12 popup_details_div">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="row">
    <div class="col-md-12">
    <div class="form-group" >
    <label>Name (English)</label>
    <div class="input-group">
    <span class="input-group-addon">N</span>
    <input type="text" maxlength="45" class="form-control" name="name" id="name" Value="" placeholder="Company Name" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>নাম (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">ন</span>
    <input type="text" maxlength="255" class="form-control" name="bname" id="bname" Value="" placeholder="কম্পানির নাম" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Slogan (English)</label>
    <div class="input-group">
    <span class="input-group-addon">D</span>
    <input type="text" maxlength="75" class="form-control" name="dialog" id="dialog" Value="" placeholder="Company Dialog" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>স্লোগান (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">D</span>
    <input type="text" maxlength="350" class="form-control" name="bdialog" id="bdialog" Value="" placeholder="কম্পানির স্লোগান" autocomplete="off">
    </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Mobile</label>
    <div class="input-group">
    <span class="input-group-addon">MO</span>
    <input type="text" maxlength="18" class="form-control" name="mobile" id="mobile" value="" onkeypress="return isNumberKey(event)" placeholder="Mobile No:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Phone</label>
    <div class="input-group">
    <span class="input-group-addon">PH</span>
    <input type="text" maxlength="14" class="form-control" name="phone" id="phone" Value="" onkeypress="return isNumberKey(event)" placeholder="Phone No:" autocomplete="off">
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>Fax</label>
    <div class="input-group">
    <span class="input-group-addon">FN</span>
    <input type="text" maxlength="14" class="form-control" name="fax" id="fax" value="" onkeypress="return isNumberKey(event)" placeholder="e. g 72178xx" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Web</label>
    <div class="input-group">
    <span class="input-group-addon">W</span>
    <input type="web" maxlength="35" class="form-control" name="web" id="web" value=""  placeholder="e.g. https://www.bdsoft.org" autocomplete="off">
    </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Email</label>
    <div class="input-group">
    <span class="input-group-addon">EM</span>
    <input type="email" maxlength="45" class="form-control" name="email" id="email" value="" placeholder="Email Address:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>TIN</label>
    <div class="input-group">
    <span class="input-group-addon">T</span>
    <input type="text" maxlength="15" class="form-control" name="tin" id="tin" value="" onkeypress="return isNumberKey(event)" placeholder="e. g 10-10-xxxxx" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>VAT</label>
    <div class="input-group">
    <span class="input-group-addon">V</span>
    <input type="text" maxlength="15" class="form-control" name="vat" id="vat" value="" onkeypress="return isNumberKey(event)" placeholder="e. g 10-10-xxxxx" autocomplete="off">
    </div>
    </div>
    <div class="form-group">
    <label>Address (English)</label>
    <div class="input-group">
    <span class="input-group-addon">AD</span>
    <textarea class="form-control" name="address" id="address" maxlength="250" rows="5" placeholder="Address" ></textarea>
    </div>
    </div>
    <div class="form-group">
    <label>ঠিকানা (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">AD</span>
    <textarea class="form-control" name="baddress" id="baddress" maxlength="350" rows="5" placeholder="ঠিকানা" ></textarea>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Image</label>
    <div style="width:200px; height:245px;">
    <img src="" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <br>
    <input type="file" class="btn btn-flat bg-purple btn-sm" name="image" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
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
    <div class="col-md-8 ">
    </div>
    <div class="col-md-4 text-right" >
    <input type="submit" name="submit" id="submit" class="btn btn-flat bg-purple btn-sm" value="Create"/>
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
