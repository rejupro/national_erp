@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='rawproduct_create';
@endphp
	<style>
		.disabled{
			display: none
		}
	</style>
    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) রো প্রোডাক্ট ক্রিয়েট @else Raw Product Create @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) রো প্রোডাক্ট ক্রিয়েট @else Raw Product Create @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title">@if ( Auth::User()->language == 1 ) রো প্রোডাক্ট ক্রিয়েট @else Raw Product Create @endif</h3>
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
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-4">
								<label>Product Batch</label>
								<input type="text" class="form-control" placeholder="Enter Batch">
							</div>
							<div class="col-md-4">
								<label>Product Name</label>
								<select class="form-control select2 select2-hidden-accessible" name="supplier" id="supplier" tabindex="-1" aria-hidden="true" required>
									<option value="" selected="" disabled="">Select Option</option>
									@foreach($products as $product)
									<option>{{$product->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-4">
								<label>Material Name</label>
								<select class="form-control select2 select2-hidden-accessible" name="supplier" id="supplier" tabindex="-1" aria-hidden="true" required>
									<option value="" selected="" disabled="">Select Option</option>
									@foreach($rawmaterial as $single)
									<option>{{$single->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
	                    <table class="table table-bordered table-striped" style="margin-top: 15px">
							<thead>
								<tr>
									<th>Material Name</th>
									<th>Given Type</th>
									<th>Rest Amount</th>
									<th>Given Amount</th>
									<th>Packet Type</th>
									<th>Packet Weight</th>
									<th>Maked</th>
									<th><a class="empty"><i class="fa fa-trash"></i></a></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="hidden" value="1" name="product_id[]" class="form-control" id="product_id" readonly>
										<span>something</span>	
									</td>
									<td>
										<select class="form-control give_type" id="give_type" name="give_type[]">
											<option value="" disabled selected="">Select</option>
											<option value="ton">Ton</option>
											<option value="kg">Kg</option>
											<option value="litre">Litre</option>
										</select>
									</td>
									<td>
										<input type="text" id="rest_amount" name="rest_amount[]" class="form-control rest_amount" readonly>
									</td>
									<td>
										<input type="number" id="given_amount" value="44" name="given_amount[]" class="form-control given_amount disabled" onchange="given_amount()">
									</td>
									<td>
										<select class="form-control packate_type disabled" id="packate_type" name="packate_type[]">
											<option value="" selected="" disabled>Selec Option</option>
											<option value="">Gm</option>
											<option value="">Kg</option>
											<option value="">MiliLitre</option>
											<option value="">Litre</option>
										</select>
									</td>
									<td>
										<input type="number" id="packate_weight" name="packate_weight[]" class="form-control packate_weight disabled" value="">
									</td>
									<td>
										<input type="text" class="form-control" id="maked" name="maked[]" readonly>
									</td>
									<td class="text-center"><a href="#" onclick="remove_from_cart(57)" class="remove">
										<span style="cursor: pointer;" class="fa fa-times"></span>
									</a></td>
								</tr>
								<!-- double -->
								<tr>
									<td>
										<input type="hidden" value="2" name="product_id[]" class="form-control" id="product_id[]" readonly>
										<span>something</span>	
									</td>
									<td>
										<select class="form-control give_type" id="give_type" name="give_type[]">
											<option value="" disabled selected="">Select</option>
											<option value="ton">Ton</option>
											<option value="kg">Kg</option>
											<option value="litre">Litre</option>
										</select>
									</td>
									<td>
										<input type="text" id="rest_amount" name="rest_amount[]" class="form-control rest_amount" readonly>
									</td>
									<td>
										<input type="number" id="given_amount" value="55" name="given_amount[]" class="form-control given_amount disabled" onchange="given_amount()">
									</td>
									<td>
										<select class="form-control packate_type disabled" id="packate_type" name="packate_type[]">
											<option value="" selected="" disabled>Selec Option</option>
											<option value="">Gm</option>
											<option value="">Kg</option>
											<option value="">MiliLitre</option>
											<option value="">Litre</option>
										</select>
									</td>
									<td>
										<input type="number" id="packate_weight" name="packate_weight[]" class="form-control packate_weight disabled" value="">
									</td>
									<td>
										<input type="text" class="form-control" id="maked" name="maked[]" readonly>
									</td>
									<td class="text-center"><a href="#" onclick="remove_from_cart(57)" class="remove">
										<span style="cursor: pointer;" class="fa fa-times"></span>
									</a></td>
								</tr>
							</tbody>
	                   		<tbody id="single_material">
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Well Product</strong></td>
									<td><input type="text" class="form-control" readonly ></td>
									<td></td>
								</tr>
							</tbody>
	                   		<tbody id="multiple_material">
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Well Product</strong></td>
									<td><input type="number" class="form-control"></td>
									<td></td>
								</tr>
							</tbody>
							<div id="expense_name">
								<tr>
									<td colspan="4"></td>
									<td colspan="3">
										<label><strong>Select Expense</strong></label>
										<select class="form-control select2 select2-hidden-accessible" name="supplier" id="supplier" tabindex="-1" aria-hidden="true" required>
											<option value="">1</option>
										</select>
									</td>
									<td></td>
								</tr>
							</div>
							<div id="expense_list">
								<tr>
									<td colspan="4"></td>
									<td>Expense Name</td>
									<td>Expense Quantity</td>
									<td>Expense Price</td>
									<td>
										<a href="#" onclick="remove_from_cart(57)" class="remove">
										<span style="cursor: pointer;" class="fa fa-times"></span>
										</a>
									</td>
								</tr>
							</div>
							<div id="final_product">
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Other Expense</strong></td>
									<td><input type="text" class="form-control"  ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Deduction Expense</strong></td>
									<td><input type="text" class="form-control"  ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Wasted Product</strong></td>
									<td><input type="text" class="form-control"  ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Extra Product</strong></td>
									<td><input type="text" class="form-control"  ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="2" style="text-align: right"><strong>Total Ready Product</strong></td>
									<td><input type="text" class="form-control" id="total_readyproduct" readonly></td>
									<td></td>
								</tr>
							</div>
	                    </table>
	                </div>
	                <div class="clearfix" ></div>
	                <div class="row"style="margin-top: 15px" >
	                   <div class="col-md-12 table-responsive">
	                      <div class="col-md-8"></div>
	                      <div class="col-md-4 text-right" >
	                         <button href="#" class="btn btn-flat bg-purple" onClick="submitRawProduct('event')">@if ( Auth::User()->language == 1 ) এড ম্যাটেরিয়াল @else Add Material @endif</button>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->
	 <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
	<script>
		$(document).ready(function(){
			$('#multiple_material').hide();
		})

		$(".give_type").change(function(){
			$(this).parent().parent().find('.given_amount').removeClass('disabled');
		});
		$('.given_amount').on('keyup', function(){
		  $(this).parent().parent().find('.packate_type').removeClass('disabled');
		});
		$(".packate_type").change(function(){
			$(this).parent().parent().find('.packate_weight').removeClass('disabled');
		});

		function submitRawProduct(){
			var product_id = $('input[name="product_id[]"]').map(function(){ 
                return this.value; 
            }).get();
			var give_type = $('select[name="give_type[]"]').map(function(){ 
                return this.value; 
            }).get();
			var maked = $('input[name="maked[]"]').map(function(){ 
                return this.value; 
            }).get();
            if(maked.length < 1){
            	toastr.warning('Please Input Maked Products');
            }
            var total_readyproduct = $('#total_readyproduct').val();
            
			$.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                	product_id:product_id, give_type:give_type, maked:maked, total_readyproduct:total_readyproduct
                },
                url: "{{route('rawproduct_store')}}",
                success:function(response){
                	toastr.success(response.message);
                	console.log(response.data);
                    // if(response.qty_error){
                    //     toastr.error(response.qty_error);
                    // }else{
                    //     toastr.success(response.message);
                    //     allCartData();
                    //     $('#cartFooter .form-control').val('0');
                    //     $('#cartFooter').hide();

                    // }
                    
                },
                error:function(error){
                    console.log(error)
                    if(error.responseJSON.errors.total_readyproduct){
                        toastr.error('Please Fillup All Options');
                    }
                }
            });
		}





	</script> 

@endsection







