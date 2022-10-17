@extends("layouts/admin/main")
@section("content")
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
    <section class="content-header">
    <h1>Material Use Record Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Material Use Record Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

            <center><h4>Now Fill Up The Fields Add To Cart</h4></center>

        <h3>Search Product And Add To Cart</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <form action="" method="" id="add_to_cart">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" >
                        <label>Product Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">Itm</span>
                            <select class="form-control select2" name="item_id" id="item_id" required>
                                <option value=""></option>
                                {{-- @foreach($product as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Company Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">CN</span>
                            <input type="text" maxlength="45" class="form-control" name="company_name" id="company_name" value="" placeholder="e.g. Sumon" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Supplier</label>
                        <div class="input-group">
                            <span class="input-group-addon">SN</span>
                            <select class="form-control select2" name="supplier_id" id="supplier_id" required>
                                <option value=""></option>
                                {{-- @foreach($supplier as $data)
                                <option value="{{ $data->id }}">{{ $data->id }}-{{ $data->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Color</label>
                        <div class="input-group">
                            <span class="input-group-addon">C</span>
                            <select class="form-control select2" name="color">
                                <option selected value="">-select-</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="white">White</option>
                                <option value="black">Black</option>
                                <option value="yellow">Yellow</option>
                            </select>
                        </div>
                    </div>
                </div>
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


           <tbody>
                <tr>
                    <td>
                        <input type="test" name="item_name" readonly="" value="" class="form-control">
                    </td>
                    <td><input type="text" name="supplier_id" value="" readonly="readonly" class="form-control"></td>
                    <td><input type="text" name="quantity" id="quantity" onchange="return set_quantity()" class="form-control"></td>
                    <td><input type="text" name="cost" id="cost" value="" class="form-control"></td>
                    {{-- <input type="hidden" name="asl" id="asl" value="1" class="form-control">
                    <td><input type="text" name="price" id="price" class="form-control"></td> --}}
                </tr>
            </tbody>
           <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td></td>
                <td><input type="text" name="total" id="total" class="form-control" value="" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">Discount(%)</td>
                <td><input type="text" name="discount" id="discount" onchange="return set_discount()" onkeyup="return set_grand_total()" class="form-control"  value=""></td>
                <td><input type="text" name="discount_amount" id="discount_amount" class="form-control"  value="" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">VAT (%)</td>
                <td><input type="text" name="vat" id="vat" class="form-control" onchange="return set_vat()"  onkeyup="return set_grand_total()"  value="" ></td>
                <td><input type="text" name="vat_amount" id="vat_amount"   value="" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">TAX (%)</td>
                <td><input type="text" name="tax" id="tax" class="form-control" onchange="return set_tax()"  onkeyup="return set_grand_total()"   value="" ></td>
                <td><input type="text" name="tax_amount" id="tax_amount"   value="" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">AIT (%)</td>
                <td><input type="text" name="ait" id="ait" class="form-control" onchange="return set_ait()"  onkeyup="return set_grand_total()"   value=""></td>
                <td><input type="text" name="ait_amount" id="ait_amount"   value="" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">Others:</td>
                <td></td>
                <td><input type="text" name="other_amount" id="other_amount" class="form-control" onkeyup="return set_grand_total()"   value=""  ></td>
            </tr>
            <tr>
                <td colspan="3">Speed Money:</td>
                <td></td>
                <td><input type="text" name="speed_money_amount" id="speed_money_amount" class="form-control" onkeyup="return set_grand_total()"  value="" ></td>
            </tr>
            <tr>
                <td colspan="3">Freight:</td>
                <td></td>
                <td><input type="text" name="freight_amount" id="freight_amount" class="form-control" onkeyup="return set_grand_total()"  value=""></td>
            </tr>
            <tr>
                <td colspan="3">Fractional Discount:    </td>
                <td></td>
                <td><input type="text" name="fraction_discount_amount" id="fraction_discount_amount" onkeyup="return set_grand_total()" class="form-control"  value=""></td>
            </tr>
            <tr>
                <td colspan="3">Grand total </td>
                <td></td>
                <td><input type="text" name="grand_total" id="grand_total"   value="" class="form-control" readonly/></td>
            </tr>
            <tr>
            </tr>
           </tfoot>

       </table>
                <center align="center">
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Update To Cart" />
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
    }

    function set_discount() {
        var total = $('#total').val();
        var discount = $('#discount').val();
        if (discount) {
            var set_discount_amount = (parseInt(discount) * parseInt(total))/100;
        } else {
            var set_discount_amount = 0;
        }
        $('#discount_amount').val(set_discount_amount);
    }

    function set_vat() {
        var total = $('#total').val();
        var vat = $('#vat').val();
        if (vat) {
            var set_vat_amount = (parseInt(vat) * parseInt(total))/100;
        } else {
            var set_vat_amount = 0;
        }
        $('#vat_amount').val(set_vat_amount);
    }

    function set_tax() {
        var total = $('#total').val();
        var tax = $('#tax').val();
        if (tax) {
            var set_tax_amount = (parseInt(tax) * parseInt(total))/100;
        } else {
            var set_tax_amount = 0;
        }
        $('#tax_amount').val(set_tax_amount);
    }

    function set_ait() {
        var total = $('#total').val();
        var ait = $('#ait').val();
        if (ait) {
            var set_ait_amount = (parseInt(ait) * parseInt(total))/100;
        } else {
            var set_ait_amount = 0;
        }
        $('#ait_amount').val(set_ait_amount);
    }

    function set_grand_total() {
        var total = $('#total').val();
        var discount_amount = $('#discount_amount').val();
        var vat_amount = $('#vat_amount').val();
        var tax_amount = $('#tax_amount').val();
        var ait_amount = $('#ait_amount').val();
        var other_amount = $('#other_amount').val();
        var speed_money_amount = $('#speed_money_amount').val();
        var freight_amount = $('#freight_amount').val();
        var fraction_discount_amount = $('#fraction_discount_amount').val();
        var set_grand_total_amount = parseInt(total) - parseInt(discount_amount) + parseInt(vat_amount) + parseInt(tax_amount) + parseInt(ait_amount) + parseInt(other_amount) + parseInt(speed_money_amount) + parseInt(freight_amount) - parseInt(fraction_discount_amount);
        $('#grand_total').val(set_grand_total_amount);
    }
</script>


@endsection
