@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Item list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC</a></li>
      <li class=""><a href="#">Item list</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">Item List</h3>
             </div>
             <div class="box-body">
                {{-- Error message here    --}}
                <div class="col-md-12 table-responsive">
                   <table class="table table-bordered table-striped" id="datarec">
                      <thead class="text-uppercase">
                         <tr>
                            <th style="width:40px;">SN</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Brand</th>
                            <th>Unit Price</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             <tr>
                                 <td colspan="8">No data is available</td>
                             </tr>

                         <tr>
                            <td class="center"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                <div class="clearfix" ></div>
                <div class="row"style="margin-top: 15px" >
                   <div class="col-md-12 table-responsive">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 text-right" >
                         <a href="" class="btn btn-flat bg-purple">Add Item</a>
                      </div>
                   </div>
                </div>
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
                      {{-- History show here --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- /.main content -->

@endsection
