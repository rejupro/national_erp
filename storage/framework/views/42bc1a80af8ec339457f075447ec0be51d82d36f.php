
<?php $__env->startSection("content"); ?>
<?php
 $mhead='payrollcreate';
 $phead='payrollcreate';
?>
    <section class="content-header">
        <h1>Payslip Generate</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="<?php echo e(route('payslip-list-page')); ?>">Payslip List</a></li>
        <li class=""><a href="<?php echo e(route('payslip-create-page')); ?>">Payslip Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Monthly Salary PaySlip</h3>
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
                    
                        <form action="<?php echo e(route('payslip-store')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <?php if($salary): ?>
                            <input type="hidden" name="id" value="<?php echo e($salary->id); ?>">
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Employee Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2" name="emp_id" id="emp_id" >
                                                                <option value="<?php echo e($salary->emp_id); ?>">-<?php echo e($salary->emp_name); ?>-</option>
                                                                <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Month</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">M</span>
                                                            <select class="form-control select2" name="month" id="month">
                                                                <option value="<?php echo e($salary->month); ?>">-Default-</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                <option value="13">Bonus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Branch Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id" id="branch_id" onchange="return more_branch()">
                                                                <option value="">-Select-</option>
                                                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>" <?php if($data->id == $salary->branch_id): ?> selected="selected" <?php endif; ?>><?php echo e($data->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Salary Amount</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary" id="salary" value="<?php echo e($salary->salary); ?>" placeholder="Salary Amount" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Total Present Days</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="<?php echo e($salary->present_day); ?>" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Total Absent Days</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="<?php echo e($salary->absent_day); ?>" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Due Salary</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">DS</span>
                                                            <input type="number" maxlength="45" class="form-control" name="due_salary" id="due_salary" value="<?php echo e($salary->due_salary); ?>" placeholder="Due Salary" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Fine)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="<?php echo e($salary->fine); ?>" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Loan)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="<?php echo e($salary->loan); ?>" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Salary Advance)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">SA</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary_advance" id="salary_advance" value="<?php echo e($salary->salary_advance); ?>" placeholder="Deduction(Salary Advance)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Commission</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="<?php echo e($salary->commission); ?>" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Net Payble</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="<?php echo e($salary->net_payable); ?>" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Remarks</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">RM</span>
                                                            <input type="text" maxlength="45" class="form-control" name="remark" id="remark" value="<?php echo e($salary->remark); ?>" placeholder="Remarks" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Employee Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2" name="emp_id" id="emp_id" >
                                                                <option value="">-Select-</option>
                                                                <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Month</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">M</span>
                                                            <select class="form-control select2" name="month" id="month">
                                                                <option value="">-Select-</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                <option value="13">Bonus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Branch Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id" id="branch_id" onchange="return more_branch()">
                                                                <option value="">-Select-</option>
                                                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Salary Amount</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary" id="salary" value="0" placeholder="Salary Amount" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Total Present Days</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="0" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Total Absent Days</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="0" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Due Salary</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">DS</span>
                                                            <input type="number" maxlength="45" class="form-control" name="due_salary" id="due_salary" value="0" placeholder="Due Salary" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Fine)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="0" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Loan)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="0" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Deduction(Salary Advance)</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">SA</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary_advance" id="salary_advance" value="0" placeholder="Deduction(Salary Advance)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Commission</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="0" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Net Payble</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="0" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>Remarks</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">RM</span>
                                                            <input type="text" maxlength="45" class="form-control" name="remark" id="remark" value="0" placeholder="Remarks" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="<?php echo e(route('payslip-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
                                </div>
                            </div>
                        </form>
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


<script type="text/javascript">
	function more_branch() {
		var branch_id_1 = $('#branch_id1').val();
		if(branch_id_1==1){
			$('#branch_select_2').show();
			$('#branch_select_3').show();
		}
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/payroll/payslip_create.blade.php ENDPATH**/ ?>