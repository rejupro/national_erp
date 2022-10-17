@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Edit Manufacturer</h1>
   <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Master Process</a></li>
      <li class=""><a href="{{route('manufacture-edit-route',$manufacture->id)}}">Edit Manufacturer</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Manufacturer</h3>
            </div>
            <div class="box-body">
               <form action="{{route('manufacture-update-route',$manufacture->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
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
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Manufacturer Name</label>
                                       <input type="text" name="manufacture_name" maxlength="45" value="{{$manufacture->manufacture_name}}" id="name" class="form-control" placeholder="e.g. Sun Sui Hong"/>
                                       <input type="hidden" maxlength="11" value="" class="form-control" name="mid" autocomplete="off" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact Person</label>
                                       <input type="text" name="c_person" maxlength="45" value="{{$manufacture->c_person}}" id="cperson" class="form-control" placeholder="e.g. Mr.Sumon"  />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact Mobile</label>
                                       <input type="text" name="c_mobile" maxlength="18" value="{{$manufacture->c_mobile}}" id="cmobile" class="form-control" placeholder="e.g. 016161xxxx0"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact Email</label>
                                       <input type="text" name="c_email" maxlength="45" value="{{$manufacture->c_email}}" id="email" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Address</label>
                                       <textarea class="form-control" maxlength="150" rows="5" name="address" id="address" placeholder="e.g. Address">{{$manufacture->address}}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Main Product</label>
                                       <textarea class="form-control" maxlength="250" rows="5" name="main_product" id="mainpro" placeholder="Comma ',' use for multiple item e.g. Puma,Adidas etc.">{{$manufacture->main_product}}</textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Description</label>
                                       <textarea class="form-control" maxlength="250" rows="5" name="description" placeholder="Description">{{$manufacture->description}}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Web</label>
                                       <input type="text" name="web" maxlength="45" value="{{$manufacture->web}}" id="web" class="form-control" placeholder="e.g. http://www.axesgl.com"/>
                                    </div>
                                    <div class="form-group">
                                       <label>Rank</label>
                                       <input type="text" name="rank" maxlength="3" value="{{$manufacture->rank}}" id="rank" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 127"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="update_manfa" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{route('manufacture-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
