@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Sub-Category Edit</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Product Process</a></li>
      <li class=""><a href="#">Sub-Category Edit</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Sub-Category</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here   --}}
               <form action="{{route('subcategory-update-route',$subcategory->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">

                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Sub-Category Name</label>
                                 <input type="text" name="name" maxlength="45" value="{{$subcategory->name}}" id="sname" class="form-control" placeholder="Sub-Category Name" />
                              </div>
                              <div class="form-group">
                                 <label>Select Category</label>
                                 <select class="form-control select2" name="cat_id" id="cat_id">
                                    @foreach($categorys as $category)
                                    <option value="{{$category->id}}" @php echo ($subcategory->cat_id == $category->id ? "selected" : ""); @endphp>{{$category->name}}</option>
                                    @endforeach
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$subcategory->description}}</textarea>
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
                        <input type="submit" name="save_subcategory" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="pro_subcategorylist.php" class="btn btn-flat bg-gray  ">Close</a>
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
                     {{-- History here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
