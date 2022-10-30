<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='raw_materialstock';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল স্টক <?php else: ?> Raw Material Stock <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল স্টক <?php else: ?> Raw Material Stock <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল স্টক <?php else: ?> Raw Material Stock <?php endif; ?></h3>
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
	                           <th><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল কোড <?php else: ?> Material Code <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> ইমেজ <?php else: ?> Image <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> টোটাল পারচেস <?php else: ?> Total Purchase <?php endif; ?></th>
	                           <!-- <th><?php if( Auth::User()->language == 1 ): ?> টোটাল সেল <?php else: ?> Total Sell <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> কারেন্ট স্টক <?php else: ?> Current Stock <?php endif; ?></th> -->
	                           <th style="width:100px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
	                         </tr>
	                      </thead>
	                      <tbody>
								<?php $i = 1; ?>
								<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($data->code); ?></td>
                                    <td><?php echo e($data->material_name); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('public/' . $data->image)); ?>" alt="" style="max-height: 80px; max-width: 80px">
                                    </td>
                                    <td><?php echo e($data->total_stock); ?> <?php echo e($data->qty_type); ?></td>
                                    <!-- <td><?php echo e($data->make_material); ?> <?php echo e($data->qty_type); ?></td>
                                    <td><?php echo e($data->total_stock - $data->make_material); ?> <?php echo e($data->qty_type); ?></td> -->
                                    <td class="text-center">
										<a class="btn btn-flat bg-purple" href="<?php echo e(route('material_stocksingle', ['id' => $data->material_id])); ?>" title="Show Details" ><i class="fa fa-eye"></i></a>
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
	                         <a href="<?php echo e(route('rawmaterial_purchasestore')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড স্টক <?php else: ?> Add Stock <?php endif; ?></a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/stock/stock_main.blade.php ENDPATH**/ ?>