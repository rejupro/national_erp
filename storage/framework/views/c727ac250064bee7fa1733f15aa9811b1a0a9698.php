<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='rawproduct_create';
?>
	<style>
		
		.packate_weight{
			display: none;
		}

	</style>
    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> রো প্রোডাক্ট ক্রিয়েট <?php else: ?> Raw Product Create <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রো প্রোডাক্ট ক্রিয়েট <?php else: ?> Raw Product Create <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> রো প্রোডাক্ট ক্রিয়েট <?php else: ?> Raw Product Create <?php endif; ?></h3>
					</div>
					<div class="box-body">
					
					<?php if($errors->any()): ?>
					<div class="alert alert-danger">
						<ul>
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php endif; ?>
					<div class="col-md-12 table-responsive">
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-4">
								<label>Product Batch</label>
								<input type="text" class="form-control" id="product_batch" placeholder="Enter Batch">
							</div>
							<div class="col-md-4">
								<label>Product Name</label>
								<select class="form-control select2 select2-hidden-accessible" name="supplier" id="product" tabindex="-1" aria-hidden="true" required>
									<option value="" selected="" disabled="">Select Option</option>
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Material Name</label>
								<select class="form-control select2 select2-hidden-accessible" name="material_onchange" id="material_onchange" onchange="material_onchange()" tabindex="-1" aria-hidden="true" required>
									<option value="" selected="" disabled="">Select Option</option>
									<?php $__currentLoopData = $rawmaterial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($single->material_id); ?>"><?php echo e($single->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						
	                    <table class="table table-bordered table-striped" style="margin-top: 15px">
							<thead>
								<tr>
									<th>Material Name</th>
									<th>Material Price(tk)</th>
									<th>Given Type</th>
									<th>Rest Amount</th>
									<th>Given Amount</th>
									<th>Packet Type</th>
									<th>Packet Weight</th>
									<th>Product Cost</th>
									<th>Maked</th>
									<th><a class="empty"><i class="fa fa-trash"></i></a></th>
								</tr>
							</thead>
							<tbody id="cartData">

							</tbody>
	                   		<tbody id="multiple_material">
								<tr>
									<td colspan="3"></td>
									<td colspan="5" style="text-align: right"><strong>Well Product</strong></td>
									<td><input type="text" id="multiple_well" onkeyup="getTotalProduct()" class="form-control" value="0"></td>
									<td></td>
								</tr>
							</tbody>
							<div id="expense_name">
								<tr>
									<td colspan="5"></td>
									<td colspan="4">
										<label><strong>Select Expense</strong></label>
										<select class="form-control select2 select2-hidden-accessible" name="expense_onchange" id="expense_onchange" onchange="expense_onchange()">
											<option value="" selected="" disabled>Select Expense</option>
											<?php $__currentLoopData = $expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($single->id); ?>"><?php echo e($single->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</td>
									<td></td>
								</tr>
							</div>
							<div>
								<tr>
									<td colspan="5"></td>
									<th>Expense Name</th>
									<th>Expense Price</th>
									<th>Expense Quantity</th>
									<th>Expense Total</th>
									<th>
										<a href="#" class="remove">
										<span style="cursor: pointer;" class="fa fa-times"></span>
										</a>
									</th>
								</tr>
								<tbody id="expense_list">
									
								</tbody>
								
							</div>
							<div id="final_product">
								<tr>
									<td colspan="5"></td>
									<td colspan="3" style="text-align: right"><strong>Other Expense</strong></td>
									<td><input type="text" id="other_expense" value="0" class="form-control"  ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td colspan="3" style="text-align: right"><strong>Deduction Expense</strong></td>
									<td><input type="text" class="form-control" id="deduction_expense" value="0" ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td colspan="3" style="text-align: right"><strong>Wasted Product</strong></td>
									<td><input type="text" class="form-control" onkeyup="getTotalProduct()" value="0" id="wasted_product"></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td colspan="3" style="text-align: right"><strong>Extra Product</strong></td>
									<td><input type="text" class="form-control" onkeyup="getTotalProduct()" value="0" id="extra_product"></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td colspan="3" style="text-align: right"><strong>Total Ready Product</strong></td>
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
	                         <button href="#" class="btn btn-flat bg-purple" onClick="submitRawProduct('event')"><?php if( Auth::User()->language == 1 ): ?> এড ম্যাটেরিয়াল <?php else: ?> Add Material <?php endif; ?></button>
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
			allCartData();
			expenseList();
		})
		// Validations
		function given_amount($id){
			var set_id = $id;
			$('#packate_type' + set_id).show();
		}
		function packate_weight($id){
			var set_id = $id;
			var given_amount = $('#given_amount' + set_id).val();
			var packate_type = $('#packate_type' + set_id).val();
			var packate_weight = $('#packate_weight' + set_id).val();
			var material_price = $('#material_price' + set_id).val();
			var stock_qty = $('#stock_qty' + set_id).val();
			var give_type= $('#give_type' + set_id).val();
			if(give_type === 'kg'){
				if(packate_type === 'kg'){
					var outputval = parseFloat(given_amount) / parseFloat(packate_weight);
					$('#maked' + set_id).val(parseFloat(outputval).toFixed(2));
					// price
					var packate_price = material_price * given_amount / stock_qty
					$('#product_cost' + set_id).val(parseFloat(packate_price).toFixed(2));
				}else if(packate_type === 'gm'){
					var outputval = (parseFloat(given_amount)*1000) / parseFloat(packate_weight);
					$('#maked' + set_id).val(parseFloat(outputval).toFixed(2));
					// price
					var packate_price = material_price * given_amount / stock_qty
					$('#product_cost' + set_id).val(parseFloat(packate_price).toFixed(2));
				}
			}
			if(give_type === 'litre'){
				if(packate_type === 'litre'){
					var outputval = given_amount / packate_weight;
					$('#maked' + set_id).val(parseFloat(outputval).toFixed(2));
					// price
					var packate_price = material_price * given_amount / stock_qty
					$('#product_cost' + set_id).val(parseFloat(packate_price).toFixed(2));
				}else if(packate_type === 'mililitre'){
					var outputval = (given_amount*1000) / packate_weight;
					$('#maked' + set_id).val(parseFloat(outputval).toFixed(2));
					// price
					var packate_price = material_price * given_amount / stock_qty
					$('#product_cost' + set_id).val(parseFloat(packate_price).toFixed(2));
				}
			}

			$('#given_amount' + set_id).attr('disabled', 'disabled');



		}
		function packate_type($id){
			var set_id = $id;
			var give_type= $('#give_type' + set_id).val();
			var packate_type = $('#packate_type' + set_id).val();
			if(give_type === 'kg'){
				if(packate_type === 'kg' || packate_type ==='gm'){
					$('#packate_weight' + set_id).show();
					$('#packate_weight' + set_id).val('');
					$('#maked' + set_id).val('');
				}else{
					toastr.error('Please select appropriate type');
					$('#packate_weight' + set_id).hide();
					$('#product_cost' + set_id).val('');
					$('#maked' + set_id).val('');
				}
			}
			if(give_type === 'litre'){
				if(packate_type === 'litre' || packate_type ==='mililitre'){
					$('#packate_weight' + set_id).show();
					$('#packate_weight' + set_id).val('');
					$('#maked' + set_id).val('');
				}else{
					toastr.error('Please select appropriate type');
					$('#packate_weight' + set_id).hide();
					$('#product_cost' + set_id).val('');
					$('#maked' + set_id).val('');
				}
			}

			var given_amount = $('#given_amount' + set_id).val();
			var rest_amount = $('#rest_amount' + set_id).val();
			if(rest_amount < given_amount){
				$('#given_amount' + set_id).val('0');
				toastr.warning('Given Amount More Then Rest Amount');
			}
		}
		// Total Product Count
		function getTotalProduct(){
			var multiple_well = $('#multiple_well').val();
			var wasted_product = $('#wasted_product').val();
			var extra_product = $('#extra_product').val();
			var final_product = parseFloat(multiple_well) - parseFloat(wasted_product) + parseFloat(extra_product);
			if(final_product < 1){
				$('#total_readyproduct').val('');
			}else{
				$('#total_readyproduct').val(final_product);
			}
			

		}
		

		function submitRawProduct(){
			var product_batch = $('#product_batch').val();
			var product = $('#product').val();

			var product_id = $('input[name="product_id[]"]').map(function(){ 
                return this.value; 
            }).get();
			var give_type = $('input[name="give_type[]"]').map(function(){ 
                return this.value; 
            }).get();
			var given_amount = $('input[name="given_amount[]"]').map(function(){ 
                return this.value; 
            }).get();
			var packate_type = $('select[name="packate_type[]"]').map(function(){ 
                return this.value; 
            }).get();
			var packate_weight = $('input[name="packate_weight[]"]').map(function(){ 
                return this.value; 
            }).get();
			var product_cost = $('input[name="product_cost[]"]').map(function(){ 
                return this.value; 
            }).get();
			var maked = $('input[name="maked[]"]').map(function(){ 
                return this.value; 
            }).get();
			var stock_invoice = $('input[name="stock_invoice[]"]').map(function(){ 
                return this.value; 
            }).get();

			// Expense Total
			var expense_id = $('input[name="expense_id[]"]').map(function(){ 
                return this.value; 
            }).get();
			var expense_price = $('input[name="expense_price[]"]').map(function(){ 
                return this.value; 
            }).get();
			var expense_qty = $('input[name="expense_qty[]"]').map(function(){ 
                return this.value; 
            }).get();
			var expense_total = $('input[name="expense_total[]"]').map(function(){ 
                return this.value; 
            }).get();

			// Expense Total
			var total = 0;
			$( ".expense_total" ).each( function(){
			  total += parseFloat( $( this ).val() ) || 0;
			});
			var other_expense = $('#other_expense').val();
			var deduction_expense = $('#deduction_expense').val();
			if(!other_expense){
				$('#other_expense').val("0");
			}
			if(!deduction_expense){
				$('#deduction_expense').val("0");
			}
			var totalproPrice = 0;
			$( ".product_cost" ).each( function(){
			  totalproPrice += parseFloat( $( this ).val() ) || 0;
			});
			var totalHisab = parseFloat(totalproPrice) + parseFloat(total) + parseFloat(other_expense) - parseFloat(deduction_expense);
			
            var well_product = $('#multiple_well').val();
            var wasted_product = $('#wasted_product').val();
            var extra_product = $('#extra_product').val();
            var total_readyproduct = $('#total_readyproduct').val();
			$.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                	product_batch:product_batch, 
                	product:product, //top

                	product_id:product_id, 
                	totalHisab:totalHisab,  //total cost with expense
                	total:total, //packate price
                	other_expense:other_expense,
                	deduction_expense:deduction_expense,
                	well_product:well_product,
                	wasted_product:wasted_product,
                	extra_product:extra_product,
                	give_type:give_type,
                	given_amount:given_amount,
                	packate_type:packate_type,
                	packate_weight:packate_weight,
                	product_cost:product_cost,
                	maked:maked,
                	stock_invoice:stock_invoice,
                	total_readyproduct:total_readyproduct, //below expense
                	expense_id:expense_id,
                	expense_price:expense_price,
                	expense_qty:expense_qty,
                	expense_total:expense_total,
                },
                url: "<?php echo e(route('rawproduct_store')); ?>",
                success:function(response){
                	toastr.success(response.message);
                	console.log(response.data);
                },
                error:function(error){
                    console.log(error)
                    if(error){
                        toastr.error('Please Fillup All Options');
                    }
                }
            });
		}
		// Add to cart
		function material_onchange(){
			var material_id = $('#material_onchange').val();
            var url = "<?php echo e(route('rawproduct_cart', ":id")); ?>";
            url = url.replace(':id', material_id);
			$.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success:function(response){
                	allCartData();
                	if(response.stock_error){
                        toastr.error(response.stock_error);
                    }else if(response.dataExist){
                        toastr.error(response.dataExist);
                    }else{
                    	toastr.success(response.message);
                    }
                    
                }
            })
		}

		// Show Cart
        function allCartData(){
            $.ajax({
                type: 'GET',
                url: "<?php echo e(route('rawproduct_cartlist')); ?>",
                dataType: 'json',
                success:function(response){
                	if(response.cartcount > 1){
                		$("#multiple_well").val('0');
                	}
                    var allData = "";
                    var i = 1;
                    $.each(response.data, function(key, value){
                        allData += `<tr>
									<td>
										<input type="hidden" value="${value.material_id}" name="product_id[]" class="form-control" id="product_id${key+1}" readonly>
										<span>${value.material_name}</span>	
									</td>
									<td>
										<input type="text" class="form-control" id="material_price${key+1}" value="${value.material_price}" readonly>
									</td>
									<td>
										<input name="give_type[]" class="form-control" id="give_type${key+1}" value="${value.qty_type}" readonly>
									</td>
									<td>
										<input type="hidden" id="stock_qty${key+1}" value="${value.stock_qty}">
										<input type="hidden" id="stock_invoice${key+1}" name="stock_invoice[]" value="${value.stock_invoice}">
										<input type="text" id="rest_amount${key+1}" name="rest_amount[]" value="${value.rest_amount}" class="form-control rest_amount" readonly style="width: 80px">
									</td>
									<td>
										<input type="text" id="given_amount${key+1}" name="given_amount[]" class="form-control given_amount disabled" onkeyup="given_amount(${key+1})">
									</td>
									<td>
										<select class="form-control packate_type disabled" id="packate_type${key+1}" name="packate_type[]" onchange="packate_type(${key+1})" style="display:none">
											<option value="" selected="" disabled>Selec Option</option>
											<option value="gm">Gm</option>
											<option value="kg">Kg</option>
											<option value="mililitre">MiliLitre</option>
											<option value="litre">Litre</option>
										</select>
									</td>
									<td>
										<input type="text" id="packate_weight${key+1}" name="packate_weight[]" class="form-control packate_weight disabled" onkeyup="packate_weight(${key+1})" min="1">
									</td>
									<td>
										<input type="text" class="form-control product_cost" id="product_cost${key+1}" name="product_cost[]" readonly>
									</td>
									<td>
										<input type="text" class="form-control maked" id="maked${key+1}" name="maked[]" readonly>
									</td>
									<td class="text-center"><a href="#" onclick="remove_from_cart(${value.material_id})" class="remove">
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
            var url = "<?php echo e(route('rawproduct_cartremove', ":id")); ?>";
            url = url.replace(':id', cpostid);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    toastr.warning(response.message);
                    allCartData();
                }
            });
        }

        // Expense
        function expense_onchange(){
        	var expense_id = $('#expense_onchange').val();
            var url = "<?php echo e(route('expense_cartadd', ":id")); ?>";
            url = url.replace(':id', expense_id);
			$.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success:function(response){
                	expenseList();
                	console.log(response.data);
                	if(response.dataExist){
                        toastr.error(response.dataExist);
                    }else{
                    	toastr.success(response.message);
                    }
                    
                }
            })
        }
        function expenseList(){
        	$.ajax({
	            type: 'GET',
	            url: "<?php echo e(route('expense_cartlist')); ?>",
	            dataType: 'json',
	            success:function(response){
	                console.log(response)
	                var allExpense = "";
	                var i = 1;
	                $.each(response.data, function(key, value){
	                    allExpense += `<tr>
										<td colspan="5"></td>
										<td><input type="hidden" value="${value.othermaterial_id}" name="expense_id[]">${value.othermaterial_name}</td>
										<td><input type="text" class="form-control" id="expense_price${key+1}" name="expense_price[]" value="${value.price}" readonly></td>
										<td><input type="text" class="form-control" name="expense_qty[]" id="expense_qty${key+1}" onkeyup="expense_qty(${key+1})" value="0"></td>
										<td><input type="text" class="form-control expense_total" name="expense_total[]" id="expense_total${key+1}" readonly value="0"></td>
										<td>
											<a href="#" class="remove" onclick="expenseRemove(${value.othermaterial_id})">
											<span style="cursor: pointer;" class="fa fa-times"></span>
											</a>
										</td>
									</tr>`
	                });
	                $('tbody#expense_list').html(allExpense);
	            }
	        })
        }
        // Expense Math
        function expense_qty($id){
			var set_id = $id;
			var price = $('#expense_price' + set_id).val();
			var expense_qty = $('#expense_qty' + set_id).val();
			var output = price * expense_qty;
			$('#expense_total' + set_id).val(parseFloat(output).toFixed(2));
		}
        // Remove Expense
        function expenseRemove(id){
            var cpostid = id;
            var url = "<?php echo e(route('expense_cartremove', ":id")); ?>";
            url = url.replace(':id', cpostid);
            $.ajax({
                type: 'GET',
                url: url,
                success:function(response){
                    toastr.warning(response.message);
                    expenseList();
                }
            });
        }

	</script> 

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/rawproduct/rawproduct_create.blade.php ENDPATH**/ ?>