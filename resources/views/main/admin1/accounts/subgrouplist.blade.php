@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='subgrpl';
@endphp
<section class="content-header">
   <h1>Sub-Group List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Sub-Group List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Account Sub-Group</h3>
            </div>
            <div class="box-body">
               {{--Error Message Show Here  --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Group</th>
                           <th>Description</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $i=1; @endphp
                        @foreach($subgroups as $subgroup)
                    <tr>
                    <td class="center">{{$i++}}</td>
                    <td>{{$subgroup->name}}</td>
                    <td>{{$subgroup->group->name}}</td>
                    <td>{{$subgroup->description}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('subgroup-edit-route',['id' => $subgroup->id])}}" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('subgroup-destroy-route',['id' => $subgroup->id])}}" ><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="{{route('subgroup-create-route')}}" class="btn btn-flat bg-purple">Add Sub-Group</a>
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
                     {{-- History Show Here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
