<?php $__env->startSection("content"); ?>
<?php
$mhead='addslrptlst';
$phead='addslsrprtlst';
?>
<section class="content-header">
	<h1>Daily Expenses Add</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="<?php echo e(route('daily-sales-list-page')); ?>">Daily Sales Report List</a></li>
		<li class=""><a href="#">Add Daily Sales Report</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-10">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Add Daily Sales Report</h3>
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
					<form action="<?php echo e(route('daily-sales-store-page')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
						<?php echo csrf_field(); ?>
						<?php if(!empty($report)): ?>
						<input type="hidden" name="id" value="<?php echo e($report->id); ?>">
						<div class="col-md-12 popup_details_div">
							<div class="row ">
								<div class="col-md-12">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Company Name</label>
											<input type="text" name="company_name" maxlength="35" value="<?php echo e($report->company_name); ?>" id="company_name" class="form-control" placeholder="Company Name">
										</div>
										<div class="form-group">
											<label>Contract Person Name</label>
											<input type="text" name="contract_name" maxlength="35" value="<?php echo e($report->contract_name); ?>" id="contract_name" class="form-control" placeholder="Contract Person Name">
										</div>
										<div class="form-group">
											<label>Contract Person Email</label>
											<input type="email" name="contract_email" value="<?php echo e($report->contract_email); ?>" id="contract_email" class="form-control" placeholder="Contract Person Email">
										</div>
										<div class="form-group">
											<label>Contract Person Designation</label>
											<input type="text" name="contract_designation" maxlength="35" value="<?php echo e($report->contract_designation); ?>" id="contract_designation" class="form-control" placeholder="Contract Person Designation">
										</div>
										<div class="form-group">
											<label>Contract Mobile Number</label>
											<input type="telephone" name="contract_mobile" maxlength="11" value="<?php echo e($report->contract_mobile); ?>" id="contract_mobile" class="form-control" placeholder="Contract Mobile Number">
										</div>
										<div class="form-group">
											<label>Interested Products</label>
											<textarea class="form-control" maxlength="250" rows="6" name="interested_product" placeholder="Interested Products"><?php echo e($report->interested_product); ?></textarea>
										</div>
										<div class="form-group">
											<label>Contract Address</label>
											<textarea class="form-control" maxlength="250" rows="6" name="contract_address" placeholder="Contract Address"><?php echo e($report->contract_address); ?></textarea>
										</div>
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control" maxlength="250" rows="6" name="comments" placeholder="Comments"><?php echo e($report->comments); ?></textarea>
										</div>
										<div class="form-group">
											<label>Visitor Employee</label>
											<div class="input-group">
												<select class="form-control select2" name="employee_id" id="employee_id">
													<option value="<?php echo e($report->employee_id); ?>"><?php echo e($report->employee_name); ?></option>
													<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												<span class="input-group-addon"><a href="<?php echo e(route('employee-create-page')); ?>"><span class="fa fa-plus"></span></a></span>
											</div>
										</div>
										<input type="hidden" name="branch_id" maxlength="35" value="<?php echo e($report->branch_id); ?>" id="branch_id" class="form-control" placeholder="Company Name">
										<div class="form-group">
											<label>Visiting Date</label>
											<input type="date" name="contract_date" maxlength="35" value="<?php echo e($report->contract_date); ?>" id="contract_date" class="form-control" placeholder="Visiting Date">
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
											<label>Company Name</label>
											<input type="text" name="company_name" maxlength="35" value="" id="company_name" class="form-control" placeholder="Company Name">
										</div>
										<div class="form-group">
											<label>Contract Person Name</label>
											<input type="text" name="contract_name" maxlength="35" value="" id="contract_name" class="form-control" placeholder="Contract Person Name">
										</div>
										<div class="form-group">
											<label>Contract Person Email</label>
											<input type="email" name="contract_email" value="" id="contract_email" class="form-control" placeholder="Contract Person Email">
										</div>
										<div class="form-group">
											<label>Contract Person Designation</label>
											<input type="text" name="contract_designation" maxlength="35" value="" id="contract_designation" class="form-control" placeholder="Contract Person Designation">
										</div>
										<div class="form-group">
											<label>Contract Mobile Number</label>
											<input type="telephone" name="contract_mobile" maxlength="11" value="" id="contract_mobile" class="form-control" placeholder="Contract Mobile Number">
										</div>
										<div class="form-group">
											<label>Interested Products</label>
											<textarea class="form-control" maxlength="250" rows="6" name="interested_product" placeholder="Interested Products"></textarea>
										</div>
										<div class="form-group">
											<label>Contract Address</label>
											<textarea class="form-control" maxlength="250" rows="6" name="contract_address" placeholder="Contract Address"></textarea>
										</div>
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control" maxlength="250" rows="6" name="comments" placeholder="Comments"></textarea>
										</div>
										<div class="form-group">
											<label>Visitor Employee</label>
											<div class="input-group">
												<select class="form-control select2" name="employee_id" id="employee_id">
													<option value="">-Select Sales Representative-</option>
													<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												<span class="input-group-addon"><a href="<?php echo e(route('employee-create-page')); ?>"><span class="fa fa-plus"></span></a></span>
											</div>
										</div>
										<input type="hidden" name="branch_id" maxlength="35" value="<?php echo e(Auth::User()->brand_id); ?>" id="branch_id" class="form-control" placeholder="Company Name">
										<div class="form-group">
											<label>Visiting Date</label>
											<input type="date" name="contract_date" maxlength="35" value="" id="contract_date" class="form-control" placeholder="Visiting Date">
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
								<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="<?php echo e(route('daily-sales-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/daily_sale_records/add_daily_sales_record.blade.php ENDPATH**/ ?>