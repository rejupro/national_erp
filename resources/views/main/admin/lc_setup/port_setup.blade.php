@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Port Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC Setup</a></li>
      <li class=""><a href="#">Port Setup</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Create New Port For LC Setup</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here  --}}
               <form action="" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif --}}
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Port Name</label>
                                 <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="Category Name"  />
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
                        <input type="submit" name="save_category" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="" class="btn btn-flat bg-gray  ">Close</a>
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

   <div class="row">
    <div class="col-md-8">
       <div class="box box-solid">
          <div class="box-header with-border">
             <h3 class="box-title">Port List</h3>
          </div>
          <div class="box-body">
             {{-- Error message here    --}}
             <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped" id="datarec">
                   <thead class="text-uppercase">
                      <tr>
                         <th style="width:40px;">SN</th>
                         <th>Name</th>
                         <th>Description</th>
                         <th style="width:40px; text-align:center;">Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     

                      <tr>
                         <td class="center"></td>
                         <td></td>
                         <td></td>
                         <td nowrap="">
                          <a class="btn btn-flat bg-purple" href=""><i class="fa fa-edit"></i>
                          </a> <a class="btn btn-flat bg-purple" href=""><i class="fa fa-trash"></i></a>
                       </td>
                      </tr>
                     
                   </tbody>
                </table>
             </div>
           
          </div>
       </div>
    </div>
 </div>
</section>
<!-- /.main content -->
@endsection
