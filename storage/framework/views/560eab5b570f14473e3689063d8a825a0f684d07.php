<?php $__env->startSection("content"); ?>
<?php
 $mhead='product';
 $phead='rawproduct_stock';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট স্টক  <?php else: ?>  Product Stock <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?>  প্রোডাক্ট স্টক  <?php else: ?>  Product Stock <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?>  প্রোডাক্ট স্টক  <?php else: ?> Product Stock <?php endif; ?></h3>
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
	                   <table class="table table-bordered table-striped" id="datarec">
	                      <thead class="text-uppercase">
	                         <tr>
	                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট ব্যাচ <?php else: ?> Product Batch <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট <?php else: ?> Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট কস্ট <?php else: ?> Product Cost <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> প্যাকেট এক্সপেন্স (%) <?php else: ?> Packate Expense <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> অন্যান্য এক্সপেন্স  <?php else: ?> Other Expense <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ডিডাকসন  <?php else: ?> Deduction <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ভালো প্রোডাক্ট <?php else: ?> Well Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> নস্ট প্রোডাক্ট <?php else: ?> Wasted Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> এক্সট্রা প্রোডাক্ট <?php else: ?> Extra Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> রেডি প্রোডাক্ট <?php else: ?> Ready Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> সেল প্রোডাক্ট <?php else: ?> Sell Product <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> স্টক স্ট্যাটাস <?php else: ?> Stock Status <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
	                         </tr>
	                      </thead>
	                      <tbody>
								<?php $i = 1; ?>
                <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<tr>
                		<td><?php echo e($i++); ?></td>
                		<td><?php echo e($single->product_batch); ?></td>
                		<td><?php echo e($single->name); ?></td>
                		<td><?php echo e($single->product_cost); ?></td>
                		<td><?php echo e($single->packate_expense); ?></td>
                		<td><?php echo e($single->other_expense); ?></td>
                		<td><?php echo e($single->deduction_expense); ?></td>
                		<td><?php echo e($single->well_product); ?></td>
                		<td><?php echo e($single->wasted_product); ?></td>
                		<td><?php echo e($single->extra_product); ?></td>
                		<td><?php echo e($single->total_ready_product); ?></td>
                		<td><?php echo e($single->sell_product); ?></td>
                		<td>
                			<?php if($single->stock_status == 1): ?>
                			<span class="badge badge-secondary">Out of Stock</span>
                			<?php else: ?>
                			<span class="badge badge-success">Stock Available</span>
                			<?php endif; ?>
                		</td>
                		<td style="text-align: center">
                			<a class="btn btn-flat bg-purple" href="<?php echo e(route('rawproduct_stockbatch', $single->product_batch)); ?>" title="Show Details"><i class="fa fa-eye"></i></a>
                		</td>
                	</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
	                      </tbody>
	                      
	                   </table>
	                </div>
	                <div class="clearfix" ></div>
	                <div class="row"style="margin-top: 15px" >
	                   <div class="col-md-12 table-responsive">
	                      <div class="col-md-8"></div>
	                      <div class="col-md-4 text-right" >
	                         <a href="<?php echo e(route('rawproduct_create')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড স্টক <?php else: ?> Add Stock <?php endif; ?></a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/rawproduct/rawproduct_stock.blade.php ENDPATH**/ ?>