@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='colorl';
@endphp
<section class="content-header">
   <h1>Color list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Master Process</a></li>
      <li class=""><a href="{{route('color-list')}}">Color list</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Color List</h3>
            </div>
            <div class="box-body">
               {{-- errorm message show here --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Color</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach ($colors as $color)

                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$color->name}}</td>
                           <td>
                              <div style="height:40px; width:120px; background-color:red;">{{$color->color}}</div>
                           </td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{ route('color-edit-route', ['id' => $color->id]) }}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{ route('color-destroy-route', ['id' => $color->id]) }}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('color-create-route')}}" class="btn btn-flat bg-purple">Add Color</a>
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
<!-- /.main content -->
@endsection
