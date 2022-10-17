<?php $__env->startSection("content"); ?>
<?php
$mhead='salarycreate';
$phead='salarycreate';
?>
<section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> স্যালারি জেনারেট <?php else: ?> Salary Generate <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> স্যালারি জেনারেট <?php else: ?> Salary Generate <?php endif; ?></a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> স্যালারি সিট <?php else: ?> Salary Sheet <?php endif; ?></h3>
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
                                <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> সেলারি <?php else: ?> Salary <?php endif; ?></th>
                                <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
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
                                        </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('salary-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                <a href="<?php echo e(route('salary-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড সেলারি <?php else: ?> Add Salary <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/salary_list.blade.php ENDPATH**/ ?>