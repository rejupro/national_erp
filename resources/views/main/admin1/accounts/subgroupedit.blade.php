@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Edit Sub-Group</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Edit Sub-Group</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Account Sub-Group</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               <form action="{{route('subgroup-update-route',$subgroup->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" maxlength="35" value="{{$subgroup->name}}" id="name" class="form-control" placeholder="e.g. Cash At Hand" />
                              </div>
                              <div class="form-group">
                                 <label>Select Group</label>
                                 <select class="form-control select2" name="grp_id" id="grp_id">
                                    <option value="">-Select-</option>

                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}" @php echo ($subgroup->grp_id == $group->id ? "selected" : ""); @endphp>{{$group->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{$subgroup->description}}</textarea>
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
                        <input type="submit" name="save_sgroup" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{route('subgroup-list')}}" class="btn btn-flat bg-gray  ">Close</a>
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
                     {{-- histroy Show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
