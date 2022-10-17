@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='colorc';
@endphp
<section class="content-header">
   <h1>Add Color</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_mancreate.php">Master Process</a></li>
      <li class=""><a href="{{route('color-create-route')}}">Add Color</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Color</h3>
            </div>
            <div class="box-body">
               {{-- errorm message show here --}}
               <form action="{{route('color-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" maxlength="25" value="" id="name" class="form-control" placeholder="e.g. Green"  />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Color</label>
                                          <br>
                                          <input type="text" name="color" class="basic" id="basic" data-preferred-format="hex" placeholder="#f20b02" data-fouc />
                                          {{-- <input type="hidden" name="color" id="colval"> --}}
                                       </div>
                                    </div>
                                 </div>
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
                        <input type="submit" name="save_color" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{route('color-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
