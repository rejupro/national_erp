@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='degl';
@endphp
    <section class="content-header">
        <h1>Designation List</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>

            <li><a href="#">Payroll</a></li>
            <li class="{{ route('designation-list-page') }}"><a href="#">Designation List</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Designation</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box-body">
                    {{-- Error message Show here   --}}
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" id="datarec">
                            <thead>
                            <tr>
                            <th style="width:40px;">SN</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width:40px; text-align:center;">Action</th>
                            </tr>
                            </thead>
                            @php $i=0; @endphp
                            <tbody>
                                @foreach($data as $desg)
                                <tr>
                                <td class="center">@php $i++; echo $i; @endphp</td>
                                <td>{{ $desg->desg_name }}</td>
                                <td>{{ $desg->description }}</td>
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="{{ route('designation-edit-page',$desg->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-flat bg-purple" href="{{ route('designation-delete-page',$desg->id) }}"><i class="fa fa-trash"></i></a>
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
                                    <a href="{{ route('designation-create-page') }}" class="btn btn-flat bg-purple">Add Designation</a>
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
                            {{-- History mess show here --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.main content -->
@endsection
