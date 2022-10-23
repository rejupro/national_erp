
<?php $__env->startSection("content"); ?>
<?php
$mhead='salarycreate';
$phead='salarycreate';
?>
<section class="content-header">
    <h1>Salary Generate</h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Salary List</a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary Sheet</h3>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="box-body">
                        
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" id="datarec">
                            <thead>
                                <tr>
                                <th style="width:40px;">SN</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Salary</th>
                                <th style="width:40px; text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <?php $i=0; ?>
                            <tbody>
                                <?php $__currentLoopData = $salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i = $i+1); ?></td>
                                    <td><?php echo e($data->emp_name); ?></td>
                                    <td><?php echo e($data->desg_name); ?></td>
                                    <td><?php echo number_format("$data->total_salary",2) ?></td>
                                    <td nowrap="" style="text-align:center;">
                                        <a class="btn btn-flat bg-purple" href="<?php echo e(route('salary-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i>
                                        </a> <a class="btn btn-flat bg-purple" href="<?php echo e(route('salary-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                <a href="<?php echo e(route('salary-create-page')); ?>" class="btn btn-flat bg-purple">Add Salary</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>
</section>
<!-- /.main content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/payroll/salary_list.blade.php ENDPATH**/ ?>