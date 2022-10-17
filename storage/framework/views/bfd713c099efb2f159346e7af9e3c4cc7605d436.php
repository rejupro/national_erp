<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='pror';
?>
    <section class="content-header">
    <h1>Received</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Received</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Receive Record</h3>
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
    <thead>
    <tr>
    <th style="width:40px; text-align:center;">SN</th>
    <th>Date</th>
    <th>Challan No</th>
    <th>Purchase No</th>
    <th>Receive Date</th>
    <th>Note</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    <?php $i=1; ?>
    <tbody>
    <?php $__currentLoopData = $receipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="text-center"><?php echo e($i++); ?></td>
    <td><?php echo e($data->created_at); ?></td>
    <td><?php echo e($data->challan_no); ?></td>
    <td><?php echo e($data->pur_invoice); ?></td>
    <td><?php echo e($data->rcv_date); ?></td>
    <td><?php echo e($data->note); ?></td>
    <td nowrap="">
        <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('proreceive-view',['id' => $data->id])); ?>"><i class="fa fa-eye cat-child"></i></a>
        <a class="btn btn-flat bg-purple" href="<?php echo e(route('productreceive-delete',['id' => $data->challan_no])); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('proreceive-create-route')); ?>" class="btn btn-flat bg-purple">Create Receive</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/inventory/receive_list.blade.php ENDPATH**/ ?>