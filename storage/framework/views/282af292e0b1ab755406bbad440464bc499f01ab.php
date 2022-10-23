
<?php $__env->startSection("content"); ?>
<?php
$mhead='bike_read';
$phead='bikeread';
?>
<section class="content-header">
	<h1><?php if( Auth::User()->language == 1 ): ?> বাইক রিডিং লিস্ট <?php else: ?> Bike Reading List <?php endif; ?></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট <?php else: ?> Project Sub-Group Create <?php endif; ?></a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> বাইক রিডিং লিস্ট <?php else: ?> Bike Reading List <?php endif; ?></h3>
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
									<th><?php if( Auth::User()->language == 1 ): ?> বাইক নাম্বার <?php else: ?> Bike Number <?php endif; ?></th>
									<th><?php if( Auth::User()->language == 1 ): ?> ওপেন ওয়েল রিড <?php else: ?> Open Oil Read <?php endif; ?></th>
									<th><?php if( Auth::User()->language == 1 ): ?> ওয়েল কোস্ট <?php else: ?> Oil Cost <?php endif; ?></th>
									<th><?php if( Auth::User()->language == 1 ): ?> ইন্ড ওয়েল রিড <?php else: ?> End Oil Read <?php endif; ?></th>
									<th><?php if( Auth::User()->language == 1 ): ?> সার্ভিস কোস্ট <?php else: ?> Service Cost <?php endif; ?></th>
									<th><?php if( Auth::User()->language == 1 ): ?> রিড ডেট <?php else: ?> Read Date <?php endif; ?></th>
									<th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
								</tr>
							</thead>
							<?php $i=1; ?>
							<tbody>
								<?php $__currentLoopData = $read; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td class="center"><?php echo e($i++); ?></td>
									<td class="center"><?php echo e($data->bike_no); ?></td>
									<td class="center"><?php echo e($data->open_read); ?></td>
									<td class="center"><?php echo e($data->oil_cost); ?></td>
									<td class="center"><?php echo e($data->end_read); ?></td>
									<td class="center"><?php echo e($data->service_cost); ?></td>
									<td class="center"><?php echo e(date('d-m-Y', strtotime($data->read_date))); ?></td>
									<td class="center">
										<a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('bike-reading-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i></a>
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
								<a href="<?php echo e(route('bike-reading-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড বাইক রিডিং <?php else: ?> Add Bike Reading <?php endif; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header">
							<h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ফিল্টার ও প্রিন্ট <?php else: ?> Filter And Print <?php endif; ?></h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body" >
							<form action="<?php echo e(route('bike-reading-report-page')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<div class="row"> 
									<div class="col-md-6">    
										<div class="form-group" >
											<label>From</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												<input type="date" maxlength="18" class="form-control" name="from" value="" required autocomplete="off" required>
											</div>
										</div>
									</div>
									<div class="col-md-6">    
										<div class="form-group" >
											<label>To</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												<input type="date" maxlength="18" class="form-control" name="to" value="" required autocomplete="off" required>
											</div>
										</div>
									</div> 
									<div class="col-md-12">    
										<div class="form-group" >
											<button type="submit" data-toggle="modal" data-target="#flipFlop" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড বাইক রিডিং <?php else: ?> Add Bike Reading <?php endif; ?></button> 
										</div>
									</div>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.main content -->

<!-- The modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/bike_reading/bike_reading_list.blade.php ENDPATH**/ ?>