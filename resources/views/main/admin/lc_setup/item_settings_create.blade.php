@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Item Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC</a></li>
      <li class=""><a href="#">Item Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Item</h3>
            </div>
            <div class="box-body">
               {{-- Error mess show here  --}}
               <form action="" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. "/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" name="brand" id="brand">
                                       <option value="1">Select One</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" maxlength="15" value="" id="code" class="form-control" placeholder="e.g. ABA/CU/001" />
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Short Name</label>
                                    <input type="text" name="c_name" maxlength="45" value="" id="cperson" class="form-control" placeholder="e.g."/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Style No</label>
                                    <input type="text" name="m_name" maxlength="45" value="" id="mname" class="form-control" placeholder="e.g."/>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <label>Unit Price</label>
                                    <input type="text" name="nid" maxlength="17" value="" id="nid" class="form-control" placeholder="e.g.0"/>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control" name="brand" id="brand">
                                        <option value="1">BDT</option>
                                     </select>
                                </div>
                             </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="1">Select One</option>
                                     </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Subcategory</label>
                                    <select class="form-control" name="subcategory" id="subcategory">
                                        <option value="1">Select One</option>
                                     </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>UOM</label>
                                    <select class="form-control" name="uom" id="uom">
                                        <option value="1">Select One</option>
                                     </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="address" maxlength="200" rows="4" placeholder="Address"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                   <label>Image</label>
                                   <div style="width:200px; height:200px;">
                                      <img src="../img/product/no_image.png" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
                                   </div>
                                   <br>
                                   <input type="file" class="btn btn-file bg-purple btn-sm" name="avater" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
                                </div>
                             </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_customer" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="main_cutomerlist.php" class="btn btn-flat bg-gray  ">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">History </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
