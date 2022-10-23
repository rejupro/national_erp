@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='ml';
@endphp
<section class="content-header">
   <h1>Manufacturer List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_manlist.php">Master Process</a></li>
      <li class=""><a href="{{route('manufacture-list')}}">Manufacturer List</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Manufacturer List</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Contact</th>
                           <th>Address</th>
                           <th>Main Product</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach($manufactures as $manufacture)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$manufacture->manufacture_name}}</td>
                           <td>{{$manufacture->c_mobile}}</td>
                           <td>{{$manufacture->address}}</td>
                           <td>{{$manufacture->main_product}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('manufacture-edit-route',['id' => $manufacture->id]) }}" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('manufacture-destroy-route',['id' => $manufacture->id]) }}" ><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('manufacture-create-route')}}" class="btn btn-flat bg-purple">Add Manufacturer</a>
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
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
