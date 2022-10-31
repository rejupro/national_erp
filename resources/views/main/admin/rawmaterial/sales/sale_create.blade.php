@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_sale';
 $phead='raw_salecreate';
@endphp
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <style>
        .product-content{
            width: 125px;
        }
    </style>
    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) প্রোডাক্ট সেলস @else Product Sales @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোডাক্ট সেলস @else Product Sales @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-solid">
					<div class="box-header with-border">
					    <h3 class="box-title">@if ( Auth::User()->language == 1 ) প্রোডাক্ট লিস্ট @else Product List @endif</h3>
					</div>
					<div class="box-body">
                        {{-- Error message here    --}}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="col-md-12 table-responsive" style="max-height: 500px; overflow-y:scroll">
                            @foreach($products as $single)
                            <div class="product-content product-select puritem" onclick="catmethod({{$single->id}})">
                                <img src="{{asset($single->avater)}}" class="product-image">
                                <div class="info">
                                    <h3>Pcs</h3>
                                </div>
                                <div class="product-detail">
                                    <b class="name">{{$single->name}}</b>
                                </div><div class="product-code">
                                    <b class="sku">{{$single->code}}</b>
                                    <b class="indexg" style="display:none;"></b>
                                </div>
                            </div>   
                            @endforeach
                        </div>
                    </div>

				</div>
			</div>
            
            <div class="col-md-6">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) কার্ট লিস্ট @else Cart List @endif</h3>
					</div>
					<div class="box-body">
                        <label>Select Supplier</label>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-user-o"></span></span>    
                                <select class="form-control select2 select2-hidden-accessible" name="supplier" id="supplier" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected="">-Select-</option> 
                                    @foreach($supplier as $single)
                                    <option value="{{$single->id}}">{{$single->name}}</option>
                                    @endforeach
                                </select>
                                {{-- <span class="input-group-addon"><a id="addsup"><span class="fa fa-plus"></span></a></span>  --}}  
                            </div>    
                        </div> 
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                            <thead>
                                <tr style="display:none"><input type="hidden" name="count" id="count" value=""></tr>
                                <tr>
                                    <th width="30px">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                                    <th width="150px">@if ( Auth::User()->language == 1 ) আইটেম নেম @else Item Name @endif</th>
                                    <th width="60px">@if ( Auth::User()->language == 1 ) ব্যাচ @else Batch @endif</th>
                                    <th width="60px">@if ( Auth::User()->language == 1 ) স্টক @else Stock @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) টোটাল @else Total @endif</th>
                                    <th class="text-center" width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
                                </tr>
                            </thead>
                            <tbody id="cartData">
                                
                            </tbody>
                            <tfoot id="cartFooter">
                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2" class="text-center">Total Price</td>
                                    <td><input type="text" id="total_price" class="form-control" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Discount (%)</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="discount" style="height: 24px;" max="100" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="discountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Discount Amount</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="discount_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="discount_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Vat (%)</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="vat" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="vatfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Tax (%)</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="tax" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="taxfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Others</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="others_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="others_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right">Fractional Discount:</td>
                                    <td><input type="text" class="form-control" onchange="count_grand_total()" id="fraction_discount_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="fraction_discount_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right"><strong>Grand Total: </style></td>
                                    <td></td>
                                    <td><input type="text" class="form-control" id="total_amount" style="height: 24px; font-weight: bold" readonly value="0"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="purchase_checkout text-center d-none" style="margin-top: 15px">
                            <button type="submit" id="submit_purchase" class="btn btn-flat bg-purple" onClick="insertData()">Submit Sales </button>
                        </div>
                        
                    </div>
				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script>

        allCartData();
        $('#submit_purchase').hide();
        $('#cartFooter .form-control').val("0");
        

        function insertData(){
            var supplier = $('#supplier').val();
            var product_id = $('input[name="product_id[]"]').map(function(){ 
                return this.value; 
            }).get();
            var product_batch = $('select[name="product_batch[]"]').map(function(){ 
                return this.value; 
            }).get();
            var price = $('input[name="price[]"]').map(function(){ 
                return this.value; 
            }).get();
            var quantity = $('input[name="quantity[]"]').map(function(){ 
                return this.value; 
            }).get();
            var product_price = $('input[name="product_price[]"]').map(function(){ 
                return this.value; 
            }).get();


            // details
            total_price = $('#total_price').val();

            var dis_percen = $('#discount').val();
            var dis_percen_amount = $('#discountfinal').val();
            var direct_dis = $('#discount_amountfinal').val();
            var vat_percen = $('#vat').val();
            var vat_percen_amount = $('#vatfinal').val();
            var tax_percen = $('#tax').val();
            var tax_percen_amount = $('#taxfinal').val();
            var others = $('#others_amountfinal').val();
            var frac_dis = $('#fraction_discount_amountfinal').val();
            var grand_total = $('#total_amount').val();
            
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                   supplier: supplier,

                   product_id:product_id,
                   product_batch:product_batch,
                   price:price,
                   quantity:quantity,
                   product_price: product_price,

                   total_price:total_price, //total price without vat tax others
                   dis_percen:dis_percen,
                   dis_percen_amount:dis_percen_amount,
                   direct_dis:direct_dis,
                   vat_percen:vat_percen,
                   vat_percen_amount:vat_percen_amount,
                   tax_percen:tax_percen,
                   tax_percen_amount:tax_percen_amount,
                   others:others,
                   frac_dis:frac_dis,
                   grand_total:grand_total,
                },
                url: "{{route('rawproduct_salestore')}}",
                success:function(response){
                    allCartData();
                    if(response){
                        toastr.success(response.message);
                    }
                    window.setTimeout(function () {
                        window.location.href = "{{ route('raw_salecreate') }}";
                    }, 2000);
                },
                error:function(error){
                    if(error.responseJSON.errors.supplier){
                        toastr.error('Please Select Supplier');
                    }else{
                        toastr.error('Please Select All Options');
                    }
                    
                }
            });
        }

        // Add to Cart
        function catmethod(id){
            var cpostid = id;
            var url = "{{ route('producttocart', ":id") }}";
            url = url.replace(':id', cpostid);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    if(response.message_error){
                        toastr.error(response.message_error);
                    }else{
                        toastr.success(response.message);
                    }
                    allCartData();
                }
            });
        }

        // Show Cart
        function allCartData(){
            $.ajax({
                type: 'GET',
                url: "{{route('salecartdata')}}",
                dataType: 'json',
                success:function(response){
                    $('#count').val(response.count);
                    if(response.count > 0){
                        $('#submit_purchase').show();
                        $('#total_amount').val('0');
                    }else{

                    }
                    var allData = "";
                    var i = 1;
                    $.each(response.data, function(key, value){
                        allData += `<tr>
                                        <td>${ i++ }</td>
                                        <td>
                                            <input type="hidden" value="${value.product_id}" name="product_id[]" id="product_id${key+1}" >
                                            ${value.product_name}
                                        </td>
                                        <td>
                                            <select class="form-control" name="product_batch[]" onchange="product_batch(${key+1})" id="product_batch${key+1}">
                                                <option value="" selected="" disabled>Select Type</option>`;
                                                $.each(value.batch, function(key, value){
                                                allData +=    `<option value="${value.product_batch}">${value.product_batch}</option>`;
                                                }); 
                                        allData +=    `</select>
                                        </td>
                                        <td><input type="text" class="form-control" id="stock_amount${key+1}" name="stock_amount[]" value="0" min="1" readonly></td>
                                        <td><input type="text" class="form-control" name="price[]" id="price${key+1}" value="0" min="1" ></td>
                                        <td><input type="text" class="form-control quantity" id="quantity${key+1}" name="quantity[]" onkeyup="change_total(${key+1})" value="0" min="1" style="display: none" ></td>
                                        <td><input type="text" class="form-control product_price" id="product_price${key+1}" name="product_price[]" value="0" min="1" readonly></td>
                                        <td class="text-center"><a href="#" onclick="remove_from_cart(${value.product_id})" class="remove">
                                                            <span style="cursor: pointer;" class="fa fa-times"></span>
                                                        </a></td>
                                    </tr>`
                    });
                    $('tbody#cartData').html(allData);
                }
            })
        }


        // Remove Data
        function remove_from_cart(id){
            var cpostid = id;
            var url = "{{ route('salecartdataremove', ":id") }}";
            url = url.replace(':id', cpostid);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    toastr.success(response.message);
                    allCartData();
                    if(response.count < 1){
                        window.setTimeout(function () {
                            window.location.href = "{{ route('raw_salecreate') }}";
                        }, 1500);
                    }
                }
            });
        }
        // Product Batch
        function product_batch($id){
            var set_id = $id;
            $('#quantity' + set_id).show();
            var product_batch = $('#product_batch' + set_id).val();
            var url = "{{ route('batch_stock', ":id") }}";
            url = url.replace(':id', product_batch);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    $('#stock_amount' + set_id).val(response.rest_amount);
                    $('#price' + set_id).val(response.product_price);
                }
            });
        }

        // change total
        function change_total($id){
            var set_id = $id;
            var price = $('#price' + set_id).val();
            var quantity = $('#quantity' + set_id).val();
            var stock_amount = $('#stock_amount' + set_id).val();
            if(parseFloat(quantity) > 0){
                $('#price' + set_id).attr('disabled', 'disabled')
            }
            $('#product_price' + set_id).val(parseFloat(parseFloat(price) * parseFloat(quantity)).toFixed(2));
            var product_price = 0;
            $( ".product_price" ).each( function(){
              product_price += parseFloat( $( this ).val() ) || 0;
            });
            $('#total_price').val(parseFloat(product_price));
            $('#total_amount').val(parseFloat(product_price));

            if(parseFloat(stock_amount) < parseFloat(quantity) ){
                $('#quantity' + set_id).val("0");
                $('#product_price' + set_id).val("0");
                $('#total_price').val("0");
                $('#total_amount').val("0");
                toastr.error('Quantity More then Rest Amount Please check Stock');
            }


        }

        // Value Count
        function count_grand_total(){
            var full_total = $('#total_price').val();
            var discount = $('#discount').val();
            var discount_amount = $('#discount_amount').val();
            var vat = $('#vat').val();
            var tax = $('#tax').val();
            var others_amount = $('#others_amount').val();
            var fraction_discount_amount = $('#fraction_discount_amount').val();

            if(discount>0){
                var with_discount = parseFloat(full_total) - (parseFloat(full_total) * parseFloat(discount)/100);
                $('#discountfinal').val(parseFloat(full_total) * parseFloat(discount)/100);
                $('#discount_amount').val(parseFloat(full_total) * parseFloat(discount)/100);
                $('#discount_amount').hide();
            }else{
                var with_discount = parseFloat(full_total) - parseFloat(discount_amount);
                $('#discount_amountfinal').val(discount_amount);
                //$('#discount').val(parseFloat(discount_amount)/(parseFloat(full_total)*100));
                $('#discount').hide();
            }
            var with_vat = parseFloat(with_discount) + parseFloat(full_total) * (parseFloat(vat)/100);
            var with_tax = parseFloat(with_vat) + (parseFloat(full_total) * (parseFloat(tax)/100));
            var with_others = parseFloat(with_tax) + parseFloat(others_amount);
            var with_fraction_discount_amount = parseFloat(with_others) - parseFloat(fraction_discount_amount);
            $('#total_amount').val(with_fraction_discount_amount);
            //$('#grtotal').html(with_fraction_discount_amount);

            
            $('#vatfinal').val(parseFloat(full_total) * parseFloat(vat)/100);
            $('#taxfinal').val(parseFloat(full_total) * parseFloat(tax)/100);
            $('#others_amountfinal').val(others_amount);
            $('#fraction_discount_amountfinal').val(fraction_discount_amount);
        }


    </script>

@endsection







