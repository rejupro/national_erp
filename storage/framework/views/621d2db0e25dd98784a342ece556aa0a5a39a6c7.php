<?php $__env->startSection("content"); ?>
<?php
 $mhead='product';
 $phead='rawproduct_stock';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?>  প্রোডাক্ট স্টক  <?php else: ?>  Product Stock <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?>  প্রোডাক্ট স্টক  <?php else: ?>  Product Stock <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo e($batch); ?></h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
		                   <table class="table table-bordered table-striped">
		                      <thead class="text-uppercase">
		                         <tr>
		                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
		                           <th><?php if( Auth::User()->language == 1 ): ?>  ম্যাটেরিয়ালস <?php else: ?> Material <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> টাইপ <?php else: ?> Type <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> গিভেন <?php else: ?> Given <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> প্যাকেট টাইপ <?php else: ?> Packate Type <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> প্যাকেট ওয়েট <?php else: ?> Packate Weight <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> কস্ট <?php else: ?> Cost <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> মেকড <?php else: ?> Maked <?php endif; ?></th>
		                         </tr>
		                      </thead>
		                      <tbody>
									<?php $i = 1; ?>
									<?php $__currentLoopData = $rawmaterial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i++); ?></td>
										<td><?php echo e($single->name); ?></td>
										<td><?php echo e($single->give_type); ?></td>
										<td><?php echo e($single->given_amount); ?></td>
										<td><?php echo e($single->packate_type); ?></td>
										<td><?php echo e($single->packate_weight); ?></td>
										<td><?php echo e($single->product_cost); ?></td>
										<td><?php echo e($single->maked); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                      </tbody>
		                      
		                   </table>
		                </div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo e($batch); ?></h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
		                   <table class="table table-bordered table-striped">
		                      <thead class="text-uppercase">
		                         <tr>
		                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
		                           <th><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্স নাম <?php else: ?> Expense Name <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্স প্রাইস <?php else: ?> Expense Price <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
								   <th><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></th>
		                         </tr>
		                      </thead>
		                      <tbody>
									<?php $i = 1; ?>
									<?php $__currentLoopData = $expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i++); ?></td>
										<td><?php echo e($single->name); ?></td>
										<td><?php echo e($single->expense_price); ?></td>
										<td><?php echo e($single->expense_quantity); ?></td>
										<td><?php echo e($single->expense_total); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                      </tbody>
		                      
		                   </table>
		                </div>
					</div>
				</div>
			</div>	
		</div>
			
	</section>

	 <!-- /.main content -->

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national2\resources\views/main/admin/rawmaterial/rawproduct/rawproduct_stockbatch.blade.php ENDPATH**/ ?>