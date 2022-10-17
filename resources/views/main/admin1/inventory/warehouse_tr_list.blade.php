@extends("layouts/admin/main")
@section("content")
@php
 $mhead='inventory';
 $phead='wareht';
@endphp
<section class="content-header">
   <h1>Warehouse Transfer </h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Warehouse Transfer </a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Transfer Record</h3>
    </div>
    <div class="box-body">
      {{--  Erorr--}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px; text-align:center;">SN</th>
    <th>Date</th>
    <th>Transfer No</th>
    <th>From</th>
    <th>To</th>
    <th>Quantity</th>
    {{-- <th style="width:40px; text-align:center;">Action</th>  --}}
    </tr>
    </thead>
    @if($transfer)
    @php $i=1; @endphp
    <tbody>
      @foreach($transfer as $data)
    <tr>
    <td class="text-center">{{ $i++ }}</td>
    <td>{{ $data->created_at }}</td>
    <td>TRSF-{{ $data->id }}</td>
    <td>{{ $data->warehouse_name }}</td>
    <td>{{ $data->warehouses_name }}</td>
    <td>{{ $data->quantity }}</td>
    {{-- <td nowrap="">
    <a class="btn btn-flat bg-purple details-invoice" href="#" ><i class="fa fa-eye cat-child"></i></a>
    <a class="btn btn-flat bg-purple" href="#" ><i class="fa fa-trash"></i></a>
    <form action="inv_bratra.php" id="" method="post" >
    <input type="hidden" name="deltra" value="" />
    </form>
    </td> --}}
    </tr>
    @endforeach
    </tbody>
    @endif
    </table>
    </div>
    <div class="clearfix" ></div>
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-12 table-responsive">
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <a href="{{ route('warehouse-transfer-stock-create') }}" class="btn btn-flat bg-purple">Create Transfer</a>
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
     {{-- history --}}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- /.main content -->



@endsection
