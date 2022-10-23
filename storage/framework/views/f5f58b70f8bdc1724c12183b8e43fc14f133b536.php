<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='brancht';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ ট্রান্সফার <?php else: ?> Branch Transfer <?php endif; ?> </h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ ট্রান্সফার <?php else: ?> Branch Transfer <?php endif; ?></a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ট্রান্সফার রেকর্ড <?php else: ?> Transfer Record <?php endif; ?></h3>
    </div>
    <div class="box-body">
      
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> ট্রান্সফার নাঃ <?php else: ?> Transfer No <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> হতে <?php else: ?> From <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> কাছে <?php else: ?> To <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></th>
   <!-- <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th> -->
    </tr>
    </thead>
       <?php if($transfer): ?>
    <?php $i=1; ?>
    <tbody>
      <?php $__currentLoopData = $transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="text-center"><?php echo e($i++); ?></td>
    <td><?php echo e($data->created_at); ?></td>
    <td>TRSF-<?php echo e($data->id); ?></td>
    <td><?php echo e($data->branch_name); ?></td>
    <td><?php echo e($data->branches_name); ?></td>
    <td><?php echo e($data->quantity); ?></td>
    
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <?php endif; ?>
    </table>
    </div>
    <div class="clearfix" ></div>
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-12 table-responsive">
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <a href="<?php echo e(route('branch-transfer-stock-create')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট ট্রান্সফার <?php else: ?> Create Transfer <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/inventory/branch_tr_list.blade.php ENDPATH**/ ?>