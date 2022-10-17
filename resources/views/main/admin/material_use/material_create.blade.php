@extends("layouts/admin/main")
@section("content")
@php
 $mhead='material';
 $phead='mur';
@endphp
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
    <section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) মেটেরিয়াল ইউস রেকর্ড ক্রিয়েট @else Material Use Record Create @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) মেটেরিয়াল ইউস রেকর্ড ক্রিয়েট @else Material Use Record Create @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if($cart)
            <center><h4>@if ( Auth::User()->language == 1 ) ফর্ম ফিলাপ করুন কার্ট করার জন্যে @else Now Fill Up The Fields Add To Cart @endif</h4></center>
        @else
        <h3>@if ( Auth::User()->language == 1 ) প্রোডাক্ট সার্চ করুন এবং কার্ট করুন @else Search Product And Add To Record-Cart @endif</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <form action="{{ route('add-to-record-cart') }}" method="POST" id="add_to_cart">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Product Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">Itm</span>
                            <select class="form-control select2" name="item_id" id="item_id" required>
                                <option value="">-Select-</option>
                                @foreach($product as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Project</label>
                        <div class="input-group">
                            <span class="input-group-addon">PN</span>
                            <select class="form-control select2" name="project_id" id="project_id" required>
                                <option value="">-Select-</option>
                                @foreach($project as $data)
                                <option value="{{ $data->id }}">{{ $data->id }}-{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label></label>
                        <div class="input-group" style="padding-top: 5px;">
                            <input type="submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="ADD"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
            <form method="POST" action="{{ route('store-to-cart') }}">
                @csrf
            <br>
             <span id="result"></span>
        <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th>Item</th>
                <th>SN</th>
                <th>Oty</th>
                <th>Cost</th>
                <th>Price</th>
            </tr>
           </thead>

        @if($cart)
           <tbody>
                    <input type="hidden" name="cookie_id" readonly="readonly" value="{{ $cookie_id }}" class="form-control"><input type="hidden" name="created_by" value="{{ $created_by }}" readonly="readonly" class="form-control">
            <tr>
                <td>
                    <input type="hidden" name="item_id" readonly="readonly" value="{{ $item_id }}" class="form-control">
                    <input type="text" name="item_name" readonly="" value="{{ $item_name }}" class="form-control">
                </td>
                <td>
                    <input type="hidden" name="project_id" value="{{ $project_id }}" readonly="readonly" class="form-control"><input type="text" name="project_name" value="{{ $project_name }}" readonly="readonly" class="form-control">
                </td>
                <td><input type="text" name="quantity" id="quantity" onkeyup="return set_quantity()" onchange="return set_grand_total()" class="form-control"></td>
                <td><input type="text" name="cost" id="cost" value="{{ $cost }}" class="form-control"></td>
                <input type="hidden" name="asl" id="asl" value="1" class="form-control">
                <td><input type="text" name="price" id="price" class="form-control"></td>
            </tr>
           </tbody>
           <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td></td>
                <td><input type="text" name="total" id="total" class="form-control" onchange="return set_grand_total()" readonly/></td>
            </tr>
{{--             <tr>
                <td colspan="3">Discount(%)</td>
                <td><input type="text" name="discount" id="discount" onchange="return set_discount()" onkeyup="return set_grand_total()" class="form-control"></td>
                <td><input type="text" name="discount_amount" id="discount_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">VAT (%)</td>
                <td><input type="text" name="vat" id="vat" class="form-control" onchange="return set_vat()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="vat_amount" id="vat_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">TAX (%)</td>
                <td><input type="text" name="tax" id="tax" class="form-control" onchange="return set_tax()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="tax_amount" id="tax_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">AIT (%)</td>
                <td><input type="text" name="ait" id="ait" class="form-control" onchange="return set_ait()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="ait_amount" id="ait_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">Others:</td>
                <td></td>
                <td><input type="text" name="other_amount" id="other_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr>
            <tr>
                <td colspan="3">Speed Money:</td>
                <td></td>
                <td><input type="text" name="speed_money_amount" id="speed_money_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr>
            <tr>
                <td colspan="3">Fractional Discount:    </td>
                <td></td>
                <td><input type="text" name="fraction_discount_amount" id="fraction_discount_amount" onkeyup="return set_grand_total()" class="form-control"></td>
            </tr> --}}
            {{-- <tr>
                <td colspan="3">Freight:</td>
                <td></td>
                <td><input type="text" name="freight_amount" id="freight_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr> --}}
            <tr>
                <td colspan="3">Grand total </td>
                <td></td>
                <td><input type="text" name="price" id="grand_total" class="form-control" readonly/></td>
            </tr>
            <tr>
            </tr>
           </tfoot>
           @endif
       </table>
                <center align="center">
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Add To Cart" />
                <a href="" class="btn btn-flat bg-gray  ">Cart List</a>
                </center>
      </form>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <!--end same barcode-->
    </section>
    <!-- /.main content -->



<script>
    function set_quantity() {
        var quantity = $('#quantity').val();
        var cost = $('#cost').val();
        var price = $('#price').val();
        if (quantity) {
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        } else {
            var quantity = 1;
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        }
        $('#price').val(set_sub_total);
        $('#total').val(set_sub_total);
        $('#grand_total').val(set_sub_total);
    }
    function set_grand_total() {
        var total = $('#total').val();
        var set_grand_total_amount = parseInt(total) ;
        $('#grand_total').val(set_grand_total_amount);
    }
</script>


@endsection
