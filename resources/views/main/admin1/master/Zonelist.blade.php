@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='zonel';
@endphp
<section class="content-header">
   <h1>Zone list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Master Process</a></li>
      <li class=""><a href="{{route('zone-list')}}">Zone list</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">All Zone</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px; text-align:center;">SN</th>
                           <th>District</th>
                           <th>Zone</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $i=1; @endphp
                        @foreach($zones as $zone)
                       <tr>
                          <td class="center">{{$i++}}</td>
                          <td>{{$zone->district}}</td>
                          <td>{{$zone->zone}}</td>
                          <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="{{route('zone-edit-route',['id'=>$zone->id])}}" ><i class="fa fa-edit"></i></a>
                             <a class="btn btn-flat bg-purple" href="{{route('zone-destroy-route',['id'=>$zone->id])}}" ><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('zone-create-route')}}" class="btn btn-flat bg-purple" id="addnew">Add New</a>
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
                  <div class="box-body" id="hisdata">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
