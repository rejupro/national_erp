@extends("layouts/admin/main")
@section("content")
@php
 $mhead='project';
 $phead='prt';
@endphp
    <section class="content-header">
        <h1>Project Type</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Type</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Project Type List</h3>
    </div>
    <div class="box-body">
    {{-- Error message show here   --}}
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-striped" id="datarec">
                <thead class="text-uppercase">
                    <tr>
                        <th style="width:40px;">SN</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th style="width:40px; text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($datas as $data)
                    <tr>
                        <td class="center">{{$i++}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->description}}</td>
                        <td nowrap="">
                            <a class="btn btn-flat bg-purple" href="{{ route('project-type-edit-page',$data->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-flat bg-purple" href="{{ route('delete-protype',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                    <a href="{{ route('project-type-create-page') }}" class="btn btn-flat bg-purple">Add Type</a>
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
