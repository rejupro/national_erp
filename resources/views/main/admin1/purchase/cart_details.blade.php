@extends("layouts/admin/main")
@section("content")
    <section class="content-header">
    <h1>Cart List</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Purchase</a></li>
            <li class=""><a href="#">Cart List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Cart Information</h3>
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
        {{-- Error message here  --}}
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th style="width:40px; text-align:center;">S.N</th>
        <th>PID</th>
        <th>Company Name</th>
        <th>Supplier Name</th>
        <th>Item Name</th>
        <th>Color</th>
        <th>Cost/unit</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @if ($cart)
        	@php $i=1; @endphp
        @foreach($cart as $data)
        <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $data->purchase_track }}</td>
        <td>{{ $data->company_name }}</td>
        <td>{{ $data->supplier_name }}</td>
        <td>{{ $data->item_name }}</td>
        <td>{{ $data->color }}</td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->quantity }}</td>
        <td>{{ $data->total }}</td>
        <td nowrap="">
            <a class="btn btn-flat bg-purple" href="{{route('edit-to-cart',$data->id) }}" ><i class="fa fa-edit"></i></a>
            <a class="btn btn-flat bg-purple" href="{{route('delete_cart_list',['id' => $data->id]) }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @else
            <p>No data available.</p>
        @endif
        </tbody>
        </table>
        </div>
        </div>
        </div>
        <a href="{{ route('view_checkout_page') }}"  class="btn btn-flat bg-gray  ">Checkout</a> <a type="button" href="{{ route('purchase-create-page') }}" class="btn btn-flat bg-gray  ">Add More</a>
        </div>
        </div>
        <div style="display: none;">
        <table id="expcsv"></table>
        </div>
    </section>
    <!-- /.main content -->
@endsection
