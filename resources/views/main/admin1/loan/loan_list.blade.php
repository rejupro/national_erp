@extends("layouts/admin/main")
@section("content")
@php
 $mhead='loan';
 $phead='loanlist';
@endphp
<section class="content-header">
   <h1>Loan list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan list</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">Loan List</h3>
             </div>
             <div class="box-body">
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
                   <table class="table table-bordered table-striped" >
                      <thead class="text-uppercase">
                         <tr>
                            <th style="width:40px;">SN</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Type</th>
                            <th>Receive</th>
                            <th>Payable</th>
                            <th>Total Loan</th>
                            <th>Balance</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             
                           @php $i=1; @endphp
                           @foreach ($loan as $data)
                              <tr>
                                 <td class="center">{{$i++}}</td>
                                 <td>{{$data->code}}</td>
                                 <td>{{$data->name}}</td>
                                 <td>{{$data->mobile}}</td>
                                 <td>{{$data->type}}</td>
                                 <td>{{$data->debit}}</td>
                                 <td>{{$data->credit}}</td>
                                 <td>{{$data->balance}}</td>
                                 <td>@php $balance=$data->credit - $data->debit @endphp {{$balance}}</td>
                                 <td nowrap="">
                                  <a class="btn btn-flat bg-purple" href="{{route('loan-edit-route',$data->id)}}"><i class="fa fa-edit"></i></a>
                                   <a class="btn btn-flat bg-purple" href="{{route('loan-delete-route',$data->code)}}"><i class="fa fa-trash"></i></a>
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
                         <a href="{{route('loan-create-route')}}" class="btn btn-flat bg-purple">Add Loan</a>
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
