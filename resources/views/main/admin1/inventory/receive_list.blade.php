@extends("layouts/admin/main")
@section("content")
@php
 $mhead='inventory';
 $phead='pror';
@endphp
    <section class="content-header">
    <h1>Received</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Received</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Receive Record</h3>
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
    <th style="width:40px; text-align:center;">SN</th>
    <th>Date</th>
    <th>Challan No</th>
    <th>Purchase No</th>
    <th>Receive Date</th>
    <th>Note</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    @php $i=1; @endphp
    <tbody>
    @foreach($receipt as $data)
    <tr>
    <td class="text-center">{{ $i++ }}</td>
    <td>{{ $data->created_at }}</td>
    <td>{{ $data->challan_no }}</td>
    <td>{{ $data->pur_invoice }}</td>
    <td>{{ $data->rcv_date }}</td>
    <td>{{ $data->note }}</td>
    <td nowrap="">
        <a class="btn btn-flat bg-purple details-invoice" href="{{route('proreceive-view',['id' => $data->id])}}"><i class="fa fa-eye cat-child"></i></a>
        {{-- <a class="btn btn-flat bg-purple" href="{{route('proreceive-destroy',['id' => $data->id])}}"><i class="fa fa-trash"></i></a> --}}
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
    <a href="{{route('proreceive-create-route')}}" class="btn btn-flat bg-purple">Create Receive</a>
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
