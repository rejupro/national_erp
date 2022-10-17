<?php $__env->startSection("content"); ?>
<?php
$mhead='payrollcreate';
$phead='payrollcreate';
?>
<section class="content-header">
    <h1>Payslip Generate</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="#">Payroll</a></li>
        <li class=""><a href="#">Payslip List</a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary Sheet</h3>
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Month</th>
                                            <th>Salary</th>
                                            <th>Present Days</th>
                                            <th>Absent Days</th>
                                            <th>Due Salaries</th>
                                            <th>Fine</th>
                                            <th>Loan</th>
                                            <th>Salary Advance</th>
                                            <th>Commision</th>
                                            <th>Net Payable</th>
                                            <th>Remark</th>
                                            <th>Action</th>
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
                                                </a> <a class="btn btn-flat bg-purple" href="<?php echo e(route('payslip-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                    <a href="<?php echo e(route('payslip-create-page')); ?>" class="btn btn-flat bg-purple">Add Payslip</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/payroll/payslip_list.blade.php ENDPATH**/ ?>