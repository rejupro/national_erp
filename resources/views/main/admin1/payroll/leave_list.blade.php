@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='lt';
@endphp
    <section class="content-header">
        <h1>Leave Type</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="#">Payroll</a></li>
        <li class="active"><a href="{{ route('leavetype-list-page') }}">Leave Type</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Leave Type</h3>
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
    {{-- Error messages show here    --}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">SN</th>
    <th>Name</th>
    <th style="text-align:center;">Days</th>
    <th>Description</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    <tbody>
        @php $i=0; @endphp
        @foreach($data as $leave)
        <tr>
        <td class="center">{{ $i++ }}</td>
        <td>{{ $leave->leave_name }}</td>
        <td style="text-align:center;">{{ $leave->leave_days }}</td>
        <td>{{ $leave->description }}</td>
        <td nowrap="">
        <a class="btn btn-flat bg-purple" href="{{ route('leavetype-edit-page',$leave->id) }}"><i class="fa fa-edit"></i></a>
        <a class="btn btn-flat bg-purple" href="{{ route('leavetype-delete-page',$leave->id) }}"><i class="fa fa-trash"></i></a>
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
    <a href="{{ route('leavetype-create-page') }}" class="btn btn-flat bg-purple">Add Leave</a>
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
    {{-- History --}}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- /.main content -->
@endsection
