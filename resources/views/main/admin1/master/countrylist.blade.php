@extends("layouts/admin/main")
@section("content")
@php
 $mhead='master';
 $phead='counl';
@endphp
<section class="content-header">
   <h1>Country List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_mancreate.php">Master Process</a></li>
      <li class=""><a href="{{route('country-list')}}">Country List</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Country List</h3>
            </div>
            <div class="box-body">
               {{-- errorm message show here --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach($countries as $country)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$country->name}}</td>
                           <td>{{$country->description}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('country-edit-route',['id'=>$country->id])}}" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('country-destroy-route',['id'=>$country->id])}}" ><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('country-create-route')}}" class="btn btn-flat bg-purple">Add Country</a>
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
