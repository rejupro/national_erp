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
                        <div class="col-md-12 table-responsive">
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
                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th width="30px"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                                <th width="150px"><?php if( Auth::User()->language == 1 ): ?> আইটেম নেম <?php else: ?> Item Name <?php endif; ?></th>
                                <th width="60px"><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি টাইপ <?php else: ?> Qty Type <?php endif; ?></th>
                                <th width="70px"><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
                                <th class="text-center" width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
                            </tr>
                        </thead>
                        <tbody id="cartData">
                            
                        </tbody>
                    </table>
                    </div>
				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script>
        allCartData();

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
                    console.log(response);
                    var allData = "";
                    var i = 1;
                    $.each(response.data, function(key, value){
                        allData += `<tr>
                                        <td>${ i++ }</td>
                                        <td>${value.material_name}</td>
                                        <td>
                                            <select class="form-control">
                                                <option value="ton">Ton</option>
                                                <option value="kg">Kg</option>
                                                <option value="litre">Litre</option>
                                                <option value="mililitre">Mililitre</option>
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" value="${value.quantity}" min="1"></td>
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
                }
            });
        }





    </script>

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/purchase/raw_purchase.blade.php ENDPATH**/ ?>