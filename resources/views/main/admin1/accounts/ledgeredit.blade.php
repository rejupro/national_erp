@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Ledger Edit</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Ledger Edit</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Ledger</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               <form action="{{route('ledger-update-route',$ledger->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-7">
                                       <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" maxlength="45" value="{{$ledger->name}}" id="name" class="form-control" placeholder="e.g. Petty Cash" />
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label>Code</label>
                                          <input type="text" name="code" maxlength="3" value="{{$ledger->codes}}" id="code" class="form-control" placeholder="e.g. 11-4040" readonly/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Select Group</label>
                                          <select class="form-control" name="grp_id" id="grp_id" onchange="getAllSubgroup(this.value)">
                                             <option value="">-Select-</option>
                                             @foreach($groups as $group)
                                                <option value="{{$group->id}}" @php echo ($ledger->grp_id == $group->id ? "selected" : ""); @endphp>{{$group->name}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Select Sub-Group</label>
                                          <select class="form-control" name="sub_grp_id" id="sub_grp_id">
                                            @foreach($subgroups as $subgroup)
                                            <option value="{{$subgroup->id}}" @php echo ($ledger->sub_grp_id == $subgroup->id ? "selected" : ""); @endphp>{{$subgroup->name}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>Description</label>
                                          <textarea class="form-control" maxlength="150" rows="6" name="description" placeholder="Description">{{$ledger->description}}</textarea>
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
                        <input type="submit" name="save_ledger" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="acc_ledgerlist.php" class="btn btn-flat bg-gray  ">Close</a>
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
<!-- page script -->
<script type="text/javascript">
   $(document).ready(function () {
   var name = new LiveValidation('name');
   name.add(Validate.Presence);
   var grid = new LiveValidation('grid');
   grid.add(Validate.Presence);
   var sgrid = new LiveValidation('sgrid');
   sgrid.add(Validate.Presence);
   });

   function getAllSubgroup(id){
   $.ajax({
   url: 'axe_getsub.php',
   type: 'post',
   data: {subgroup : id},
   success:function(data) {
   $('#sgrid').html(data);
   }
   });
   };
</script>
<!-- /page script -->
@endsection
