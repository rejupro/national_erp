<?php $__env->startSection("content"); ?>
<?php
$mhead='payrollcreate';
$phead='payrollcreate';
?>
<section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> পেইস্লিপ জেনারেট <?php else: ?> Payslip Generate <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> পেইস্লিপ জেনারেট <?php else: ?> Payslip Generate <?php endif; ?></a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> পেইস্লিপ জেনারেট <?php else: ?> Payslip Generate <?php endif; ?></h3>
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
                    <div class="col-md-12 popup_details_div">
                        <div class="row">
                            <input type="hidden" id="syear" name="year" value="" readonly>
                            <input type="hidden" id="smonth" name="month" value="" readonly>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="datarec">
                                    <thead>
                                        <tr>
                                            <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> মাস <?php else: ?> Month <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> সেলারি <?php else: ?> Salary <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> প্রেজেন্ট ডেস <?php else: ?> Present Days <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> আবসেন্ট ডেস <?php else: ?> Absent Days <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> ডিউ সেলারিজ <?php else: ?> Due Salaries <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> জরিমানা <?php else: ?> Fine <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> লন <?php else: ?> Loan <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> অগ্রিম সেলারি <?php else: ?> Salary Advance <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> কমিসন <?php else: ?> Commision <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> নেট পেয়েবল <?php else: ?> Net Payable <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> রিমার্ক <?php else: ?> Remark <?php endif; ?></th>
                                            <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                                        </tr>
                                    </thead>
                                    <?php $i=0; ?>
                                    <tbody id="dataemploye">
                                        <?php $__currentLoopData = $salary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i = $i+1); ?></td>
                                            <td><?php echo e($data->emp_name); ?></td>
                                            <td><?php echo e($data->desg_name); ?></td>
                                            <td>
                                                <?php if($data->month == 1): ?>
                                                January
                                                <?php elseif($data->month == 2): ?>
                                                February
                                                <?php elseif($data->month == 3): ?>
                                                March
                                                <?php elseif($data->month == 4): ?>
                                                April
                                                <?php elseif($data->month == 5): ?>
                                                May
                                                <?php elseif($data->month == 6): ?>
                                                June
                                                <?php elseif($data->month == 7): ?>
                                                July
                                                <?php elseif($data->month == 8): ?>
                                                August
                                                <?php elseif($data->month == 9): ?>
                                                September
                                                <?php elseif($data->month == 10): ?>
                                                October
                                                <?php elseif($data->month == 11): ?>
                                                November
                                                <?php elseif($data->month == 12): ?>
                                                December
                                                <?php else: ?>
                                                Bonus
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($data->salary); ?></td>
                                            <td><?php echo e($data->present_day); ?></td>
                                            <td><?php echo e($data->absent_day); ?></td>
                                            <td><?php echo e($data->due_salary); ?></td>
                                            <td><?php echo e($data->fine); ?></td>
                                            <td><?php echo e($data->loan); ?></td>
                                            <td><?php echo e($data->salary_advance); ?></td>
                                            <td><?php echo e($data->commission); ?></td>
                                            <td><?php echo e($data->net_payable); ?></td>
                                            <td><?php echo e($data->remark); ?></td>
                                            <td nowrap="" style="text-align:center;">
                                                <a class="btn btn-flat bg-purple" href="<?php echo e(route('payslip-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i>
                                                </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('payslip-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                    <a href="<?php echo e(route('payslip-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড পেইস্লিপ <?php else: ?> Add Payslip <?php endif; ?></a>
                                    </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/payslip_list.blade.php ENDPATH**/ ?>