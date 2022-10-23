@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='currc';
@endphp
<section class="content-header">
   <h1>Add Currency</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_mancreate.php">Master Process</a></li>
      <li class=""><a href="#">Add Currency</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Currency</h3>
            </div>
            <div class="box-body">
               {{-- errorm message show here --}}
               <form action="{{route('currency-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" maxlength="25" value="" id="name" class="form-control" placeholder="e.g. Taka" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Sort</label>
                                          <input type="text" name="sort" maxlength="3" value="" id="sort" class="form-control" placeholder="e.g. BDT" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Symbol</label>
                                          <input type="text" name="symbol" maxlength="11" value="" id="symbol" class="form-control" placeholder="e.g. ৳" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Ex-Rate</label>
                                          <input type="text" name="x_rate" maxlength="6" value="" id="exrate" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 1" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group" >
                                          <label>Default</label>
                                          <select class="form-control" name="default" id="status">
                                             <option value="0">No</option>
                                             <option value="1">Yes</option>
                                          </select>
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
                        <input type="submit" name="save_curency" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{route('currency-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
