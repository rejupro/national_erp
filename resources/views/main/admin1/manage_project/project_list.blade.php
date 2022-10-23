@extends("layouts/admin/main")
@section("content")
@php
$mhead='project';
$phead='prr';
@endphp
    <section class="content-header">
        <h1>Project Record List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Record List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Project Record</h3>
        </div>
        <div class="box-body">
        {{--Error message show here  --}}
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead class="text-uppercase">
                <tr>
                    <th style="width:40px;">SN</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Sub-Group</th>
                    <th>Contact</th>
                    <th>Contractor</th>
                    <th>Status</th>
                    <th style="width:40px; text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($project as $data)
                <tr>
                    <td class="center">{{$i++}}</td>
                    <td>{{$data->project_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>@if($data->pgid !=0){{data_get($data,'group.name')}}@endif</td>
                    <td>@if($data->psgid!=0){{data_get($data,'subgroup.name')}} @endif</td>
                    <td>{{$data->cperson}}</td>
                    <td>@if($data->coid!=0){{data_get($data,'contractor.name')}}@endif</td>
                    <td>{{$data->status}}</td>
                    <td nowrap="">
                        <a class="btn btn-flat bg-purple" href="{{route('project-edit-page',$data->id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-flat bg-purple details-invoice" href="{{route('project-view-page',$data->id)}}"><i class="fa fa-eye cat-child"></i></a>
                        <a class="btn btn-flat bg-purple" href="{{route('project-delete-page',$data->id)}}"><i class="fa fa-trash"></i></a>
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
        <a href="{{route('project-create-page')}}" class="btn btn-flat bg-purple">Add Project</a>
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
