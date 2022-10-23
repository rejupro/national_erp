<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='lt';
?>
    <section class="content-header">
        <h1>Leave Type</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="#">Payroll</a></li>
        <li class="active"><a href="<?php echo e(route('leavetype-list-page')); ?>">Leave Type</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Leave Type</h3>
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
    <th style="width:40px;">SN</th>
    <th>Name</th>
    <th style="text-align:center;">Days</th>
    <th>Description</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td class="center"><?php echo e($i++); ?></td>
        <td><?php echo e($leave->leave_name); ?></td>
        <td style="text-align:center;"><?php echo e($leave->leave_days); ?></td>
        <td><?php echo e($leave->description); ?></td>
        <td nowrap="">
        <a class="btn btn-flat bg-purple" href="<?php echo e(route('leavetype-edit-page',$leave->id)); ?>"><i class="fa fa-edit"></i></a>
        <a class="btn btn-flat bg-purple" href="<?php echo e(route('leavetype-delete-page',$leave->id)); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('leavetype-create-page')); ?>" class="btn btn-flat bg-purple">Add Leave</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\newfalconsolutions\resources\views/main/admin/payroll/leave_list.blade.php ENDPATH**/ ?>