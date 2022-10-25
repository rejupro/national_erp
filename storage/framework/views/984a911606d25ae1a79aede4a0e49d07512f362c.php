<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='other_materiallist';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ম্যাটেরিয়াল লিস্ট <?php else: ?> Other Material List <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ম্যাটেরিয়াল লিস্ট <?php else: ?> Other Material List <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content" style="padding-top: 25px;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="box box-solid">
					<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ম্যাটেরিয়াল লিস্ট <?php else: ?> Other Material List <?php endif; ?></h3>
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
	                           <th><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></th>
	                           <th><?php if( Auth::User()->language == 1 ): ?> ইমেজ <?php else: ?> Image <?php endif; ?></th>
	                           <th style="width:100px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
	                         </tr>
	                      </thead>
	                      <tbody>
								<?php $i = 1; ?>
								<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($i++); ?></td>
									<td><?php echo e($data->code); ?></td>
									<td><?php echo e($data->name); ?></td>
									<td><?php echo e($data->price); ?></td>
									<td>
										<?php if($data->image): ?>
										<img src="<?php echo e(asset('public/' . $data->image)); ?>" alt="" style="max-height: 100px; max-width: 100px">
										<?php else: ?>
										<img src="<?php echo e(asset('public/Upload/rawmaterial/no_image.jpg')); ?>" style="max-height: 100px; max-width: 100px">
										<?php endif; ?>
									</td>
									<td>
									<a class="btn btn-flat bg-purple" href="<?php echo e(route('other_rawmaterialedit', ['id' => $data->id])); ?>" ><i class="fa fa-edit"></i></a>
									<a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('other_rawmaterialdelete',['id' => $data->id])); ?>"><i class="fa fa-trash"></i></a>
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
	                         <a href="<?php echo e(route('other_rawmaterialadd')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড এক্সপেন্স <?php else: ?> Add Expense <?php endif; ?></a>
	                      </div>
	                   </div>
	                </div>

				</div>
			</div>
		</div>
	</section>

	 <!-- /.main content -->

<?php $__env->stopSection(); ?>








<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/other/othermaterial_list.blade.php ENDPATH**/ ?>