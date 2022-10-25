<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='raw_materialstock';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল স্টক ভিউ <?php else: ?> Raw Material Stock View <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ম্যাটেরিয়াল স্টক ভিউ <?php else: ?> Raw Material Stock View <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php echo e($material_name); ?></h3>
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
	                           <th><?php if( Auth::User()->language == 1 ): ?> ইনভয়েস নাম্বার <?php else: ?> Invoice Number <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার <?php else: ?> Supplier <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ডিসকাউন্ট (%) <?php else: ?> Discount(%) <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ডিসকাউন্ট  <?php else: ?> Discount <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> সরাসরি ডিসকাউন্ট  <?php else: ?> Direct Discount <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ভ্যাট (%) <?php else: ?> Vat(%) <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ভ্যাট <?php else: ?> Vat <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ট্যাক্স(%) <?php else: ?> Tax(%) <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> ট্যাক্স <?php else: ?> Tax <?php endif; ?></th>
							   <th><?php if( Auth::User()->language == 1 ): ?> অন্যান্য <?php else: ?> Others <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> ফ্র্যাক ডিস <?php else: ?> Frac Dis <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> গ্রান্ড টোটাল <?php else: ?> Grand Total <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
	                           <th class="text-center"><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
	                         </tr>
	                      </thead>
	                      <tbody>
								<?php $i = 1; ?>
								<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($data->stock_invoice); ?></td>
										<td><?php echo e($data->price); ?> bdt</td>
										<td><?php echo e($data->supplier_name); ?></td>
										<td><?php echo e($data->dis_percen); ?>%</td>
										<td><?php echo e($data->dis_percen_amount); ?> bdt</td>
										<td><?php echo e($data->direct_dis); ?> bdt</td>
										<td><?php echo e($data->vat_percen); ?>%</td>
										<td><?php echo e($data->vat_percen_amount); ?> bdt</td>
										<td><?php echo e($data->tax_percen); ?>%</td>
										<td><?php echo e($data->tax_percen_amount); ?> bdt</td>
										<td><?php echo e($data->others); ?> bdt</td>
										<td><?php echo e($data->frac_dis); ?> bdt</td>
										<td><?php echo e($data->grand_total); ?> bdt</td>
                                        <td><?php echo e($data->date); ?></td>
                                        <td class="text-center"><?php echo e($data->quantity); ?> <?php echo e($qty_type); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                      </tbody>
                          <tfoot>
                            <tr>
								<td colspan="2" style="text-align: right"><strong><?php if( Auth::User()->language == 1 ): ?> ডিফল্ট প্রাইস <?php else: ?> Default Price <?php endif; ?> : </strong></td>
								<td class="text-center"><strong><?php echo e($total_price); ?> bdt</strong></td>
								<td colspan="8"></td>
								<td colspan="2" style="text-align: right"><strong><?php if( Auth::User()->language == 1 ): ?> সর্বমোট <?php else: ?> Grand Total <?php endif; ?> : </strong></td>
								<td class="text-center"><?php echo e($grand_total); ?> bdt</td>
                                <td colspan="" style="text-align: right;padding-right: 10px"><strong><?php if( Auth::User()->language == 1 ): ?> সর্বমোট <?php else: ?> Total Quantity <?php endif; ?> : </strong></td>
                                <td class="text-center"><strong><?php echo e($total); ?> <?php echo e($qty_type); ?></strong></td>
                                
                            </tr>
                          </tfoot>
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








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/stock/stock_single.blade.php ENDPATH**/ ?>