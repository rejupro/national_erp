@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='disl';
@endphp
<section class="content-header">
   <h1>District list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Master Process</a></li>
      <li class=""><a href="#">District list</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">All District</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped" id="datarec">
                    <thead class="text-uppercase">
                       <tr>
                          <th style="width:40px;">SN</th>
                          <th>District</th>
                          <th>Country</th>
                          <th style="width:40px; text-align:center;">Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($districts as $district)

                       <tr>
                          <td class="center">{{$i++}}</td>
                          <td>{{$district->district}}</td>
                          <td>
                             <div>{{$district->country}}</div>
                          </td>
                          <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="{{ route('district-edit-route', ['id' => $district->id]) }}"><i class="fa fa-edit"></i></a>
                             <a class="btn btn-flat bg-purple" href="{{ route('district-destroy-route', ['id' => $district->id]) }}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{ route('district-create-route') }}" class="btn btn-flat bg-purple" id="addnew">Add New</a>
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
