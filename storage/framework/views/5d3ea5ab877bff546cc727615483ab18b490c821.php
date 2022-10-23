<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='raw_materiallist';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> রো ম্যাটেরিয়াল লিস্ট <?php else: ?> Raw Material List <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রো ম্যাটেরিয়াল লিস্ট <?php else: ?> Raw Material List <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content">
	    <div class="row">
	       <div class="col-md-8">
	          <div class="box box-solid">
	             <div class="box-header with-border">
	                <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> রো ম্যাটেরিয়াল লিস্ট <?php else: ?> Raw Material List <?php endif; ?></h3>
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
	                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
	                         </tr>
	                      </thead>
	                      <tbody>

	                      </tbody>
	                   </table>
	                </div>
	                <div class="clearfix" ></div>
	                <div class="row"style="margin-top: 15px" >
	                   <div class="col-md-12 table-responsive">
	                      <div class="col-md-8"></div>
	                      <div class="col-md-4 text-right" >
	                         <a href="<?php echo e(route('product-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড প্রোডাক্ট <?php else: ?> Add Products <?php endif; ?></a>
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
	                      <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?> History <?php endif; ?> </h3>
	                   </div>
	                   <!-- /.box-header -->
	                   <div class="box-body" >
	                      
	                   </div>
	                </div>
	             </div>
	          </div>
	       </div>
	    </div>
	 </section>
	 <!-- /.main content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/rawmaterial_list.blade.php ENDPATH**/ ?>