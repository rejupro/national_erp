@extends("layouts/admin/main")
@section("content")
@php
 $mhead='urole';
 $phead='rolel';
@endphp
    <section class="content-header">
        <h1>User Role</h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('role-list-page') }}">User & Role</a></li>
        </ol>
    </section><!-- Main content -->
    <section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">All Role</h3>
    </div>
    <div class="box-body">
        {{-- error --}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">SN</th>
    <th>Name</th>
    <th>Access</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    @php $i=1; @endphp
    <tbody>
    @foreach($user as $usr)
    <tr>
    <td class="center">{{ $i++ }}</td>
    <td>{{ $usr->name }}</td>
    <td>
        {{ $usr->company_set }},{{ $usr->manage_project }},{{ $usr->daily_process }},
        {{ $usr->requisition_record }},{{ $usr->requisition_create }},{{ $usr->purchase }},
        {{ $usr->material_use }},{{ $usr->inventory }},{{ $usr->client }},
        {{ $usr->product }},{{ $usr->master }},{{ $usr->account }},
        {{ $usr->loan }},{{ $usr->lc }},{{ $usr->financial }},
        {{ $usr->payroll }},{{ $usr->bank }},{{ $usr->user_role }},
        {{ $usr->report }},{{ $usr->personal }},{{ $usr->company_set }}
    </td>
    <td nowrap="">
    <a class="btn btn-flat bg-purple" href="{{ route('role-edit-page',$usr->id) }}" ><i class="fa fa-edit"></i></a>
    <a class="btn btn-flat bg-purple" href="{{ route('role-delete-page',$usr->id) }}" ><i class="fa fa-trash"></i></a>
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
    <a href="{{ route('role-create-page') }}" class="btn btn-flat bg-purple">Add Role</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    {{-- <div class="col-md-4">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-solid">
    <div class="box-header">
    <h3 class="box-title">History </h3>
    </div>
    <div class="box-body" >
    </div>
    </div>
    </div>
    </div>
    </div> --}}
    </div>

    </section>
    <!-- /.main content -->



@endsection
