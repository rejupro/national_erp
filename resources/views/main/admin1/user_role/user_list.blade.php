@extends("layouts/admin/main")
@section("content")
@php
 $mhead='urole';
 $phead='alluser';
@endphp
    <section class="content-header">
        <h1>User List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="mas_brandcreate.php">User & Role</a></li>
        <li class=""><a href="#">User List</a></li>
        </ol>
    </section>
   <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">User List</h3>
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
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">SN</th>
    <th>Name</th>
    <th>Email</th>
    <th>Access</th>
    <th>Status</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach($user as $data)
    <tr>
    <td class="center">{{ $i++ }}</td>
    <td>{{ $data->name }}</td>
    <td>{{ $data->email }}</td>
    <td>{{ $data->role }}</td>
    <td>@if($data->status==1) Active @else Deactive @endif</td>
    <td nowrap="">
    {{-- <a class="btn btn-flat bg-purple" href="#" ><i class="fa fa-edit"></i></a>     --}}
    <!--<a class="btn btn-flat bg-purple chpass" ><i class="fa fa-key"></i></a>-->
    {{-- <a class="btn btn-flat bg-purple" href="#" ><i class="fa fa-edit"></i></a> --}}
    {{-- <a class="btn btn-flat bg-purple chpass" href="#" ><i class="fa fa-key"></i>  --}}
    <a class="btn btn-flat bg-purple" href="{{route('user-delete-page',$data->id)}}" ><i class="fa fa-trash"></i></a>

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
    <a href="{{route('user-create-page')}}" class="btn btn-flat bg-purple">Create User</a>
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
