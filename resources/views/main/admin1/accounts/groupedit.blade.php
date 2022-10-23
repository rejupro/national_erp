@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Edit Group</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Edit Group</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Account Group</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               <form action="{{route('acc-group-update-route',$group->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" maxlength="35" value="{{$group->name}}" id="name" class="form-control" placeholder="e.g. Current Assets" />
                              </div>
                              <div class="form-group">
                                 <label>Select Class</label>
                                 <select class="form-control select2" name="class_name" id="class_name">
                                    <option value="">-Select-Class</option>
                                    <option value="Assets" {{ $group->class_name == 'Assets' ?: 'selected' }}>Assets</option>
                                    <option value="Liabilities" {{ $group->class_name == 'Liabilities' ?: 'selected' }}>Liabilities</option>
                                    <option value="Owner's Equity" {{ $group->class_name == 'Owner\'s Equity' ?: 'selected' }}>Owner's Equity</option>
                                    <option value="Expenses" {{ $group->class_name == 'Expenses' ?: 'selected' }}>Expenses</option>
                                    <option value="Revenue" {{ $group->class_name == 'Revenue' ?: 'selected' }}>Revenue</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$group->description}}</textarea>
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
                        <input type="submit" name="save_group" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{route('acc-group-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
                     {{-- History Show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
