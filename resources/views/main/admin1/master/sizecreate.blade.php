@extends("layouts/admin/main")
@section("content")
@php
$mhead='master';
$phead='sizec';
@endphp
<section class="content-header">
   <h1>Add Brand</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Master Process</a></li>
      <li class=""><a href="{{route('brand-create-route')}}">Add Brand</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add New Size</h3>
            </div>
            <div class="box-body">
               <form action="{{route('size-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formId_037548942576347671623005240976">
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
                                 <label>Size Name</label>
                                 <input type="text" name="name" maxlength="35" value="" id="pname" class="@error('name') is-invalid @enderror form-control" placeholder="Size Name">
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
                  <div class="clearfix"></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row" style="margin-top: 15px">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right">
                        <input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="{{route('size-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
                  <div class="box-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-history" style="background-color: transparent !important;border: 0px  !important;max-height:400px;min-height: 500px">
                              {{-- <ul class="timeline">
                                 <li><span class="label label-success">07 Jun 2021</span></li>
                                 <li>
                                    <i class="fa fa-chevron-right bg-gray"></i>
                                    <div class="timeline-item" style="background-color: transparent !important">
                                       <span class="time"><i class="fa fa-clock-o"></i> 12:42:05 AM</span>
                                       <h3 class="timeline-header"> <a href="#">You</a></h3>
                                       <div class="timeline-body">
                                          <p class="timeline-title">Size has been deleted</p>
                                          Size name: ALIEN
                                       </div>
                                    </div>
                                 </li>
                              </ul> --}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
