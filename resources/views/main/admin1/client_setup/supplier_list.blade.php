@extends("layouts/admin/main")
@section("content")
@php
 $mhead='client';
 $phead='sl';
@endphp
<section class="content-header">
   <h1>Supplier List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Client</a></li>
      <li class=""><a href="#">Supplier List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Supplier List</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here  --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Code</th>
                           <th style="min-width:150px;">Contact</th>
                           <th>Address</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                        @foreach ($suppliers as $supplier)
                         <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$supplier->name}}</td>
                           <td>{{$supplier->code}}</td>
                           <td>{{$supplier->c_phone}}</td>
                           <td>{{$supplier->address}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('supplier-edit-route',['id'=>$supplier->id])}}" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('supplier-destroy-route',['id'=>$supplier->id])}}" ><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('supplier-create-route')}}" class="btn btn-flat bg-purple">Add Supplier</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
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
