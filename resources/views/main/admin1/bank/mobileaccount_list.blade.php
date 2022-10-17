@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='mobl';
@endphp
    <section class="content-header">
        <h1>Mobile Account</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">Bank</a></li>
                <li class=""><a href="#">Mobile Account List</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">All Account List</h3>
        </div>
        <div class="box-body">

        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead>
                <tr>
                    <th style="width:40px;">SN</th>
                    <th>Name</th>
                    <th>Number</th>
                    <!--<th>Deposit</th>-->
                    <!--<th>Widrawn</th>-->
                    <!--<th>Balance</th>-->
                    <th style="width:40px; text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td class="center">{{ $data->id }}</td>
                    <td>{{ $data->mname }}</td>
                    <td>{{ $data->mobile}}</td>
                    <!--<td>{{ $data->deposite }}</td>-->
                    <!--<td>{{ $data->withdrawn}}</td>-->
                    <!--<td>{{ $data->balance}}</td>-->
                    <td nowrap="">
                    <a class="btn btn-flat bg-purple" href="{{ route('edit-mobileaccount-page',$data->id) }}"><i class="fa fa-edit"></i></a> 
                    <a class="btn btn-flat bg-purple" href="{{ route('delete-mobileaccount',$data->id) }}"><i class="fa fa-trash"></i></a>
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
        <a href="{{ route('create-mobileaccount-page') }}" class="btn btn-flat bg-purple">Add Bank</a>
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
