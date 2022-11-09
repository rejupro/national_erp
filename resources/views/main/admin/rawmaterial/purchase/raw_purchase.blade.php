@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='material_purchase';
@endphp
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল পারচেস @else Material Purchase @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল পারচেস @else Material Purchase @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header with-border">
					    <h3 class="box-title">@if ( Auth::User()->language == 1 ) ম্যাটেরিয়াল লিস্ট @else Material List @endif</h3>
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
                        <div class="col-md-12 table-responsive">
                            @foreach($products as $product)
                            <div class="product-content product-select puritem" onclick="catmethod({{ $product->id }})">
                                <img src="{{asset('public/'. $product->image)}}" class="product-image">
                                <div class="info">
                                    <h3>15 Pcs</h3>
                                </div>
                                <div class="product-detail">
                                    <b class="name">{{$product->name}}</b>
                                </div><div class="product-code">
                                    <b class="sku">{{$product->code}}</b>
                                    <b class="indexg" style="display:none;"></b>
                                </div>
                            </div>  
                            @endforeach  
                        </div>
                        <div class="clearfix" ></div>
                        <div class="col-md-12 table-responsive" style="margin-top: 30px">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right" >
                                <a href="{{route('rawmaterial-add')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড ম্যাটেরিয়াল @else Add Material @endif</a>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
            
            <div class="col-md-5">
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
                                    <th width="60px">@if ( Auth::User()->language == 1 ) কোয়ানটিটি টাইপ @else Qty Type @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</th>
                                    <th class="text-center" width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
                                </tr>
                            </thead>
                            <tbody id="cartData">
                                
                            </tbody>
                            <tfoot id="cartFooter">
                                <tr>
                                    <td colspan="3" style="text-align: right">Discount (%)</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="discount" style="height: 24px;" max="100" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="discountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right">Discount Amount</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="discount_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="discount_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right">Vat (%)</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="vat" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="vatfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right">Tax (%)</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="tax" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="taxfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right">Others</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="others_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="others_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right">Fractional Discount:</td>
                                    <td><input type="number" class="form-control" onchange="count_grand_total()" id="fraction_discount_amount" style="height: 24px;" value="0" min="0"></td>
                                    <td><input type="text" class="form-control" id="fraction_discount_amountfinal" style="height: 24px;" readonly value="0"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right"><strong>Grand Total: </style></td>
                                    <td></td>
                                    <td><input type="text" class="form-control" id="total_amount" style="height: 24px; font-weight: bold" readonly value="0"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="purchase_checkout text-center d-none" style="margin-top: 15px">
                            <button type="submit" id="submit_purchase" class="btn btn-flat bg-purple" onClick="insertData()">Submit Purchase </button>
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
        $('#cartFooter').hide();

        

        function insertData(){

            var material_id = $('#material_id').val();
            var qty_type = $('#qty_type').val();
            var quantity = $('#quantity').val();
            var price = $('#price').val();
            var supplier = $('#supplier').val();
            // details
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
                    material_id:material_id, qty_type:qty_type, quantity:quantity, price:price, supplier:supplier, dis_percen:dis_percen, dis_percen_amount:dis_percen_amount, direct_dis:direct_dis, vat_percen:vat_percen,
                    vat_percen_amount:vat_percen_amount, tax_percen:tax_percen, tax_percen_amount:tax_percen_amount, others:others, frac_dis:frac_dis, grand_total:grand_total,
                },
                url: "{{route('rawmaterial_purchasestore')}}",
                success:function(response){
                    if(response.qty_error){
                        toastr.error(response.qty_error);
                    }else{
                        toastr.success(response.message);
                        allCartData();
                        $('#cartFooter .form-control').val('0');
                        $('#cartFooter').hide();

                    }
                    
                },
                error:function(error){
                    if(error.responseJSON.errors.qty_type){
                        toastr.error(error.responseJSON.errors.qty_type[0]);
                    }else if(error.responseJSON.errors.quantity){
                        toastr.error(error.responseJSON.errors.quantity[0]);
                    }else if(error.responseJSON.errors.price){
                        toastr.error(error.responseJSON.errors.price[0]);
                    }else if(error.responseJSON.errors.supplier){
                        toastr.error(error.responseJSON.errors.supplier[0]);
                    }else{
                        toastr.error('Please Fillup all options carefully & grand total should be minimum 1');
                    }
                    
                }
            });
        }

        // Add to Cart
        function catmethod(id){
            var cpostid = id;
            var url = "{{ route('rawtocart', ":id") }}";
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
                url: "{{route('rawcartdata')}}",
                dataType: 'json',
                success:function(response){
                    $('#count').val(response.count);
                    if(response.count > 0){
                        $('#submit_purchase').show();
                        $('#total_amount').val('');
                    }
                    var allData = "";
                    var i = 1;
                    $.each(response.data, function(key, value){
                        allData += `<tr>

                                        <td>${ i++ }</td>
                                        <td>
                                            <input type="hidden" value="${value.material_id}" name="material_id" id="material_id" >
                                            ${value.material_name}
                                        </td>
                                        <td>
                                            <select class="form-control" id="qty_type">
                                                <option value="" selected="">Select Type</option>
                                                <option value="ton">Ton</option>
                                                <option value="litre">Litre</option>
                                                <option value="pcs">Pcs</option>
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" id="quantity" value="${value.quantity}" min="1"></td>
                                        <td><input type="number" class="form-control" id="price" onchange="change_total()" value="" min="1"></td>
                                        <td class="text-center"><a href="#" onclick="remove_from_cart(${value.id})" class="remove">
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
            var url = "{{ route('rawcartremove', ":id") }}";
            url = url.replace(':id', cpostid);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    toastr.success(response.message);
                    allCartData();
                    $('#cartFooter').hide();
                }
            });
        }


        // change total
        function change_total(){
            var price = parseFloat(parseFloat($('#price').val()).toFixed(2))
            var amount = $('#total_amount').val(price);
            $('#cartFooter').show();
        }

        // Value Count
        function count_grand_total(){

            var full_total = $('#price').val();
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







