
<?php $__env->startSection("content"); ?>
<?php
$mhead='bike_read';
$phead='bikeread';
?>
<section class="content-header">
	<h1>Bike Reading List</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		
		<li class=""><a href="#">Bike Reading List</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Bike Reading List</h3>
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
									<th style="width:20px;">SN</th>
									<th>Bike Number</th>
									<th>Open Oil Read</th>
									<th>Oil Cost</th>
									<th>End Oil Read</th>
									<th>Service Cost</th>
									<th>Read Date</th>
									<th style="text-align:center;">Action</th>
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
								<a href="<?php echo e(route('bike-reading-create-page')); ?>" class="btn btn-flat bg-purple">Add Bike Reading</a>
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
							<h3 class="box-title">Filter And Print</h3>
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
											<button type="submit" data-toggle="modal" data-target="#flipFlop" class="btn btn-flat bg-purple">Add Bike Reading</button> 
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/bike_reading/bike_reading_list.blade.php ENDPATH**/ ?>