@extends("layouts/admin/main")
@section("content")
@php
 $mhead='company';
 $phead='wareh';
@endphp
<section class="content-header">
   <h1>Warehouse List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Company</a></li>
      <li class=""><a href="#">Warehouse List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Warehouse List</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here     --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th></th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th style="width:40px; text-align:center;"></th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach ($warehouses as $warehouse)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$warehouse->name}}</td>
                           <td>{{$warehouse->phone}}</td>
                           <td>{{$warehouse->email}}</td>
                           <td>{{$warehouse->address}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('warehouse-edit-route',['id' => $warehouse->id])}}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('warehouse-destroy-route',['id' => $warehouse->id])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('warehouse-create-route')}}" class="btn btn-flat bg-purple">Add Warehouse</a>
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
                     <h3 class="box-title">History</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History message show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
