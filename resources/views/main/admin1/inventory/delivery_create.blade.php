@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Sales Delivery Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Sales Delivery Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">

   <div class="row">
   <div class="col-md-9">
   <div class="box box-solid">
   <div class="box-header with-border">
   <h3 class="box-title">Sales Product Receive</h3>
   </div>
   <div class="box-body">
   {{-- Error message show here   --}}
   @if($delivery==NULL)
   <div class="col-md-12">
   <form action="{{ route('product-delivery-store') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
       @csrf
   <div class="row">
   <div class="col-md-4">
   <div class="form-group">
   <label>Sales Invoice</label>
   <select class="form-control select2" name="sales_invoice" id="sales_invoice">
   <option value="">-Select Invoice-</option>
   @foreach($sale as $data)
   <option value="{{ $data->sales_invoice }}">{{ $data->sales_invoice }}</option>
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
   <input type="text" class="form-control datetimepicker" name="deli_date" id="deli_date" value="" placeholder="Delivery Date" autocomplete="off">
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
   @if($delivery)
   <form enctype="multipart/form-data" method="POST" action="{{ route('prodelivery-stock-store') }}" accept-charset="utf-8">
       @csrf
       <input  type="hidden" value="{{ $challan_no }}" name="challan_no">
       <input type="hidden" value="{{ $deli_date }}" name="deli_date">
       <input type="hidden" value="{{ $note }}" name="note">
       <input type="hidden" value="{{ $order_no }}" name="order_no">
   <div class="row">
   <div class="cart cart-sm">
   <table class="table table-bordered table-striped" style="margin-bottom: 0;">
   <thead>
   <th style="width:35px; text-align:center;">SN</th>
   <th style="width:100px; text-align:center;">Product ID</th>
   <th style="width:280px; text-align:left;">Product</th>
   <th style="width:60px; text-align:center;">Sales</th>
   <th style="width:60px; text-align:center;">Delivered</th>
   <th style="width:60px; text-align:center;">Rest Qty</th>
   </thead>
   <tbody>
       @php $i=0; @endphp
       @foreach($product as $data)
       <input type="hidden" name="sales_invoice[]" id="sales_invoice" value="{{ $sales_invoice }}" class="form-control" readonly/>
       <tr>
           <td>{{ $i++ }}</td>
           <td><input type="text" name="item_id[]" id="item_id" value="{{ $data->item_id }}" class="form-control" readonly/></td>
           <td><input type="text" name="item_name[]" id="item_name" value="{{ $data->item_name }}" class="form-control" readonly/></td>
           <td><input type="text" name="sales_qty[]" id="sales_qty" value="{{ $data->quantity }}" class="form-control" readonly/></td>
           <td><input type="text" name="deli_qty[]" id="deli_qty" class="form-control"></td>
           <td><input type="text" name="rest_qty[]" id="rest_qty" value="0" class="form-control"></td>
       </tr>
       @endforeach
   </tbody>
   </table>
   </div>
   </div>
   <input type="submit" id="save_delivered" class="btn btn-flat bg-purple btn-sm " value="Delivered"/> <a href="{{ route('prodelivery-list') }}" class="btn btn-flat bg-gray  ">Close</a>
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
