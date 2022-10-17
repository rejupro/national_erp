
<?php $__env->startSection("content"); ?>
<?php
$mhead='message';
$phead='ms';
?>
<!-- Main content -->

<aside class="right-side-details" style="display: block;">
	<section class="side-cont">
		<div class="side-head">
			<div class="row"> 
				<div class="col-md-12">    
					<div class="col-md-11 text-left">
						<button class="btn btn-flat bg-teal" id="stprint"><i class="fa fa-print"></i></button>     
					</div>    
					<div class="col-md-1 text-right">
						<a href='<?php echo e(url()->previous()); ?>'><button class="btn btn-flat bg-red" id="closedet"><span><i class="fa fa-times"></i></span></button></a>
					</div>
				</div>
			</div>    
		</div>     
		<div class="box box-solid">
			<div class="box-body">   
				<div class="row"> 
					<div class="col-md-12">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<div id="profile">
								<div class="card">
									<div class="card-container">
										<div class="card-item">
											<div class="card-header">
												<div class="card-header-bg"></div>
												<img src="<?php echo e(asset('public/front/images/logo/logo.png')); ?>" class="card-header-img">
												<div class="card-header-text">
													<span class="card-header-name">
													<?php echo e($message->name); ?></span>
													<span class="card-header-job">
														<?php echo e($message->email); ?></span>
													<span class="card-header-job">
														<?php echo e($message->message); ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/message/specific_message.blade.php ENDPATH**/ ?>