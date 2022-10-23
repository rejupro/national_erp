<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='material_purchase';
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল পারচেস <?php else: ?> Material Purchase <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল পারচেস <?php else: ?> Material Purchase <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header with-border">
					    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল লিস্ট <?php else: ?> Material List <?php endif; ?></h3>
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
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-content product-select puritem" onclick="catmethod(<?php echo e($product->id); ?>)">
                                <img src="<?php echo e(asset('public/'. $product->image)); ?>" class="product-image">
                                <div class="info">
                                    <h3>15 Pcs</h3>
                                </div>
                                <div class="product-detail">
                                    <b class="name"><?php echo e($product->name); ?></b>
                                </div><div class="product-code">
                                    <b class="sku"><?php echo e($product->code); ?></b>
                                    <b class="indexg" style="display:none;"></b>
                                </div>
                            </div>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </div>
                        <div class="clearfix" ></div>
                        <div class="col-md-12 table-responsive" style="margin-top: 30px">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right" >
                                <a href="<?php echo e(route('rawmaterial-add')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড ম্যাটেরিয়াল <?php else: ?> Add Material <?php endif; ?></a>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
            
            <div class="col-md-5">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> কার্ট লিস্ট <?php else: ?> Cart List <?php endif; ?></h3>
					</div>
					<div class="box-body">
                        <label>Select Supplier</label>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-user-o"></span></span>    
                                <select class="form-control select2 select2-hidden-accessible" name="supplier" id="supplier" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected="">-Select-</option>  
                                    <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($single->id); ?>"><?php echo e($single->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                  
                            </div>    
                        </div> 
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                            <thead>
                                <tr style="display:none"><input type="hidden" name="count" id="count" value=""></tr>
                                <tr>
                                    <th width="30px"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                                    <th width="150px"><?php if( Auth::User()->language == 1 ): ?> আইটেম নেম <?php else: ?> Item Name <?php endif; ?></th>
                                    <th width="60px"><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি টাইপ <?php else: ?> Qty Type <?php endif; ?></th>
                                    <th width="70px"><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
                                    <th width="70px"><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></th>
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
                url: "<?php echo e(route('rawmaterial_purchasestore')); ?>",
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
                    }
                    if(error.responseJSON.errors.quantity){
                        toastr.error(error.responseJSON.errors.quantity[0]);
                    }
                    if(error.responseJSON.errors.price){
                        toastr.error(error.responseJSON.errors.price[0]);
                    }
                    if(error.responseJSON.errors.supplier){
                        toastr.error(error.responseJSON.errors.supplier[0]);
                    }
                    
                }
            });
        }

        // Add to Cart
        function catmethod(id){
            var cpostid = id;
            var url = "<?php echo e(route('rawtocart', ":id")); ?>";
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
                url: "<?php echo e(route('rawcartdata')); ?>",
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
            var url = "<?php echo e(route('rawcartremove', ":id")); ?>";
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

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/purchase/raw_purchase.blade.php ENDPATH**/ ?>