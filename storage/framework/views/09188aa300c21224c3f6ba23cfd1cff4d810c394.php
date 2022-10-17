<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='brancht';
?>
<section class="content-header">
   <h1>Branch Transfer </h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Branch Transfer </a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Transfer Record</h3>
    </div>
    <div class="box-body">
      
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px; text-align:center;">SN</th>
    <th>Date</th>
    <th>Transfer No</th>
    <th>From</th>
    <th>To</th>
    <th>Note</th>
    
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
    <a href="<?php echo e(route('branch-transfer-stock-create')); ?>" class="btn btn-flat bg-purple">Create Transfer</a>
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
    <h3 class="box-title">History </h3>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\newfalconsolutions\resources\views/main/admin/inventory/branch_tr_list.blade.php ENDPATH**/ ?>