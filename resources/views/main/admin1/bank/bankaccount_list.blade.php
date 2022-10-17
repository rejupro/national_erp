@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='accl';
@endphp
    <section class="content-header">
        <h1>Bank Account List</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="mas_brandcreate.php">Bank</a></li>
                <li class=""><a href="{{ route('create-bank-page') }}">Bank Account List</a></li>
            </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">All Account</h3>
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
            <th>Bank</th>
            <th>A/C No</th>
            <th>Title</th>
            <th>Branch</th>
            <!--<th>Location</th>-->
            <!--<th>Debit</th>-->
            <!--<th>Credit</th>-->
            <!--<th>Balance</th>-->
            <th style="width:40px; text-align:center;">Action</th>
        </tr>
    </thead>
        <tbody>
            @php 
            $i=1;
            
            @endphp
            @foreach($datas as $data)
            <tr>
                <td class="center">{{ $i++ }}</td>
                <td>{{ $data->bank->name }}</td>
                <td>{{ $data->acc_no }}</td>
                <td>{{ $data->acc_title }}</td>
                <td>{{ $data->bbrname }}</td>
                <!--<td>{{ $data->bbrcode }}</td>-->
                <!--<td>{{ $data->bbrlocation }}</td>-->
                <!--<td>{{ $data->debit }}</td>-->
                <!--<td>{{ $data->credit }}</td>-->
                <!--<td><strong>{{ $data->balance }}</strong></td>-->
                <td nowrap="">
                    {{-- <a class="btn btn-flat bg-purple details-invoice" href=""><i class="fa fa-eye cat-child"></i></a> --}}
                    <a class="btn btn-flat bg-purple" href="{{ route('edit-bankaccount-page',$data->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-flat bg-purple" href="{{ route('delete-bankaccount-page',$data->id) }}"><i class="fa fa-trash"></i></a>
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
    <a href="{{ route('create-bankaccount-page') }}" class="btn btn-flat bg-purple">Add Account</a>
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
