@extends("layouts/admin/main")
@section("content")
    <section class="content-header">
    <h1>Received Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Received Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Purchase Product Receive</h3>
        </div>
        <div class="box-body">
        {{-- Error message show here   --}}
        @if($receipt==NULL)
        <div class="col-md-12">
        <form action="{{ route('product-receive-store') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
            @csrf
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label>Purchase Invoice</label>
        <select class="form-control select2" name="pur_invoice" id="pur_invoice">
        <option value="">-Select Invoice-</option>
        @foreach($purchase as $data)
        <option value="{{ $data->pur_invoice }}">{{ $data->pur_invoice }}</option>
        @endforeach
        </select>
        </div>
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon">CNo:</span>
        <input type="text" maxlength="15" class="form-control" value="" name="challan_no">
        </div>
        </div>
        <div class="form-group" >
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        <input type="text" class="form-control datetimepicker" name="rcv_date" id="rcv_date" value="" placeholder="Receive Date" autocomplete="off">
        </div>
        </div>
        </div>
        <div class="col-md-8">
        <div class="form-group">
        <label>Note</label>
        <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Challan Note"></textarea>
        </div>
        </div>
        </div>
                <div class="text-center" >
                    <br>
                    <input type="submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="ADD"/>
                </div>
        </form>
        @endif
        @if($receipt)
        <form enctype="multipart/form-data" method="POST" action="{{ route('product-stock-store') }}" accept-charset="utf-8">
            @csrf
            <input type="text" value="{{ $challan_no }}" name="challan_no">
            <input type="text" value="{{ $rcv_date }}" name="rcv_date">
            <input type="text" value="{{ $note }}" name="note">
            <input type="text" value="{{ $order_no }}" name="order_no">
        <div class="row">
        <div class="cart cart-sm">
        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
        <thead>
        <th style="width:35px; text-align:center;">SN</th>
        <th style="width:100px; text-align:center;">Product ID</th>
        <th style="width:280px; text-align:left;">Product</th>
        <th style="width:60px; text-align:center;">Purchase</th>
        <th style="width:60px; text-align:center;">Received</th>
        <th style="width:60px; text-align:center;">Rest Qty</th>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @foreach($product as $data)
            <input type="hidden" name="pur_invoice[]" id="pur_invoice" value="{{ $pur_invoice }}" class="form-control" readonly/>
            <tr>
                <td>{{ $i++ }}</td>
                <td><input type="text" name="item_id[]" id="item_id" value="{{ $data->item_id }}" class="form-control" readonly/></td>
                <td><input type="text" name="item_name[]" id="item_name" value="{{ $data->item_name }}" class="form-control" readonly/></td>
                <td><input type="text" name="purchase_qty[]" id="purchase_qty" value="{{ $data->quantity }}" class="form-control" readonly/></td>
                <td><input type="text" name="rcv_qty[]" id="rcv_qty" class="form-control"></td>
                <td><input type="text" name="rest_qty[]" id="rest_qty" value="0" class="form-control"></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
        <input type="submit" id="save_receiv" class="btn btn-flat bg-purple btn-sm " value="Receive"/> <a href="{{route('proreceive-list')}}" class="btn btn-flat bg-gray  ">Close</a>
        </form>
        @endif
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- /.main content -->

@endsection
{{-- $(document).ready(function(){
    $("#search_id").on('change', function(){
      var search_id =$(this).val();
      alert(search_id);
      $.ajax({
        type:'get',
        url:'{{ route('loan_find_member') }}',
        data:{'id':search_id},
        success:function(data){
          $("#member_no").val(data);
        },
        error:function(){

        },
      });

    }); --}}
