
<?php $__env->startSection("content"); ?>
<?php
$mhead='addbike_read';
$phead='addbikeread';
?>
<section class="content-header">
	<h1>Bike Reading List</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="<?php echo e(route('bike-reading-list-page')); ?>">Bike Reading List</a></li>
		<li class=""><a href="#">Add Bike Reading</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Add Bike Reading</h3>
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
					<form action="<?php echo e(route('bike-reading-store')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
						<?php echo csrf_field(); ?>
						<?php if(!empty($read)): ?>
							<input type="hidden" name="id" value="<?php echo e($read->id); ?>">
							<div class="col-md-12 popup_details_div">
								<div class="row ">
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Read Date</label>
												<input type="date" name="read_date" maxlength="35" value="<?php echo e($read->read_date); ?>" id="read_date" class="form-control" required="required" placeholder="Read Date">
											</div>
											<div class="form-group">
												<label>Bike Number</label>
												<input type="text" name="bike_no" maxlength="35" value="<?php echo e($read->bike_no); ?>" id="bike_no" class="form-control" required="required" placeholder="Bike Number">
											</div>
											<div class="form-group">
												<label>Open Oil Read</label>
												<input type="text" name="open_read" maxlength="35" value="<?php echo e($read->open_read); ?>" id="open_read" class="form-control" required="required" placeholder="Open Oil Read">
											</div>
											<div class="form-group">
												<label>Oil Cost</label>
												<input type="number" name="oil_cost" value="<?php echo e($read->oil_cost); ?>" id="oil_cost" class="form-control" required="required" placeholder="Oil Cost">
											</div>
											<div class="form-group">
												<label>End Oil Read</label>
												<input type="text" name="end_read" maxlength="35" value="<?php echo e($read->end_read); ?>" id="end_read" class="form-control" required="required" placeholder="End Oil Read">
											</div>
											<div class="form-group">
												<label>Service Cost</label>
												<input type="number" name="service_cost" maxlength="11" value="<?php echo e($read->service_cost); ?>" id="service_cost" class="form-control" required="required" placeholder="Service Cost">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea class="form-control" required="required" maxlength="250" rows="6" name="comments" placeholder="Comments"><?php echo e($read->comments); ?></textarea>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						<?php else: ?>
							<input type="hidden" name="id" value="">
							<div class="col-md-12 popup_details_div">
								<div class="row ">
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Read Date</label>
												<input type="date" name="read_date" maxlength="35" value="" id="read_date" class="form-control" required="required" placeholder="Read Date">
											</div>
											<div class="form-group">
												<label>Bike Number</label>
												<input type="text" name="bike_no" maxlength="35" value="" id="bike_no" class="form-control" required="required" placeholder="Bike Number">
											</div>
											<div class="form-group">
												<label>Open Oil Read</label>
												<input type="text" name="open_read" maxlength="35" value="" id="open_read" class="form-control" required="required" placeholder="Open Oil Read">
											</div>
											<div class="form-group">
												<label>Oil Cost</label>
												<input type="number" name="oil_cost" value="" id="oil_cost" class="form-control" required="required" placeholder="Oil Cost">
											</div>
											<div class="form-group">
												<label>End Oil Read</label>
												<input type="text" name="end_read" maxlength="35" value="" id="end_read" class="form-control" required="required" placeholder="End Oil Read">
											</div>
											<div class="form-group">
												<label>Service Cost</label>
												<input type="number" name="service_cost" maxlength="11" value="0" id="service_cost" class="form-control" required="required" placeholder="Service Cost">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea class="form-control" required="required" maxlength="250" rows="6" name="comments" placeholder="Comments"></textarea>
											</div>
										</div>
										<div class="col-md-3"></div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<div class="clearfix"></div>
						<div class="col-md-12 nopadding widgets_area"></div>
						<div class="row" style="margin-top: 15px">
							<div class="col-md-8"></div>
							<div class="col-md-4 text-right">
								<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="<?php echo e(route('bike-reading-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/bike_reading/bike_reading_entry.blade.php ENDPATH**/ ?>