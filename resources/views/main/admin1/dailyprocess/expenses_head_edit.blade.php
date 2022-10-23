@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Expenses Head Edit</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Daily Process</a></li>
      <li class=""><a href="#">Expenses Head Edit</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Expenses Head</h3>
            </div>
            <div class="box-body">
               {{-- Error message   --}}
               <form action="{{route('expense-head-update-route',$expense->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" maxlength="35" value="{{$expense->name}}" id="name" class="form-control" placeholder="e.g. Electric Bill"  />
                              </div>
                              <div class="form-group">
                                 <label>Expeses Type</label>
                                 <select class="form-control" name="e_type" id="etype">
                                    <option value="">-Select-</option>
                                    <option value="Administrative Expenses" {{ $expense->e_type == 'Administrative Expenses' ?: 'selected' }}>Administrative Expenses</option>
                                    <option value="Operating Expenses}" {{ $expense->e_type == 'Operating Expenses}' ?: 'selected' }}>Operating Expenses</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$expense->description}}</textarea>
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
                        <input type="submit" name="save_exphead" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"></a>
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
                     <h3 class="box-title">History</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
