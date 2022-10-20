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
                            <div class="product-content product-select puritem" onclick="catmethod({{$product->id}})">
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
                        <div class="col-md-12 table-responsive">
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
                        
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                            <thead>
                                <tr style="display:none"><input type="hidden" name="count" id="count" value=""></tr>
                                <tr>
                                    <th width="30px">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                                    <th width="150px">@if ( Auth::User()->language == 1 ) আইটেম নেম @else Item Name @endif</th>
                                    <th width="60px">@if ( Auth::User()->language == 1 ) কোয়ানটিটি টাইপ @else Qty Type @endif</th>
                                    <th width="70px">@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
                                    <th class="text-center" width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
                                </tr>
                            </thead>
                            <tbody id="cartData">
                                
                            </tbody>
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


        function insertData(){

            var material_id = $('#material_id').val();
            var qty_type = $('#qty_type').val();
            var quantity = $('#quantity').val();

            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    material_id:material_id, qty_type:qty_type, quantity:quantity
                },
                url: "{{route('rawmaterial_purchasestore')}}",
                success:function(response){
                    if(response.qty_error){
                        toastr.error(response.qty_error);
                    }else{
                        toastr.success(response.message);
                        allCartData();
                    }
                    
                },
                error:function(error){
                    if(error.responseJSON.errors.qty_type){
                        toastr.error(error.responseJSON.errors.qty_type[0]);
                    }
                    if(error.responseJSON.errors.quantity[0]){
                        toastr.error(error.responseJSON.errors.quantity[0]);
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
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" id="quantity" value="${value.quantity}" min="1"></td>
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
                }
            });
        }





    </script>

@endsection







