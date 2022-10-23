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
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি মাসিক সেলারি পেইস্লিপ <?php else: ?> Employee Monthly Salary PaySlip <?php endif; ?></h3>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি নাম <?php else: ?> Employee Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2 reju_emp" name="emp_id" id="emp_id" >
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> মাস <?php else: ?> Month <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch Name <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> সেলারি এমাউন্ট <?php else: ?> Salary Amount <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control sallery_ajax" name="salary" id="salary" value="<?php echo e($salary->salary); ?>" placeholder="Salary Amount" autocomplete="off" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল প্রেজেন্ট ডেস <?php else: ?> Total Present Days <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="<?php echo e($salary->present_day); ?>" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল আবসেন্ট ডেস <?php else: ?> Total Absent Days <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="<?php echo e($salary->absent_day); ?>" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ডিউ সেলারিজ <?php else: ?> Due Salaries <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> জরিমানা <?php else: ?> Fine <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="<?php echo e($salary->fine); ?>" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> লন <?php else: ?> Loan <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="<?php echo e($salary->loan); ?>" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> অগ্রিম সেলারি <?php else: ?> Salary Advance <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> কমিসন <?php else: ?> Commision <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="<?php echo e($salary->commission); ?>" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> নেট পেয়েবল <?php else: ?> Net Payable <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="<?php echo e($salary->net_payable); ?>" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> রিমার্ক <?php else: ?> Remark <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি নেম <?php else: ?> Employee Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2 reju_emp" name="emp_id" id="emp_id" >
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> মাস <?php else: ?> Month <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch Name <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> সেলারি এমাউন্ট <?php else: ?> Salary Amount <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control sallery_ajax" name="salary" id="salary" value="0" placeholder="Salary Amount" autocomplete="off" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল প্রেজেন্ট ডেস <?php else: ?> Total Present Days <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="0" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল আবসেন্ট ডেস <?php else: ?> Total Absent Days <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="0" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ডিউ সেলারিজ <?php else: ?> Due Salaries <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> জরিমানা <?php else: ?> Fine <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="0" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> লন <?php else: ?> Loan <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="0" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> অগ্রিম সেলারি <?php else: ?> Salary Advance <?php endif; ?></label>
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
                                                        <label><?php if( Auth::User()->language == 1 ): ?> কমিসন <?php else: ?> Commision <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="0" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> নেট পেয়েবল <?php else: ?> Net Payable <?php endif; ?></label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="0" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> রিমার্ক <?php else: ?> Remark <?php endif; ?></label>
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
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('payslip-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
	function more_branch() {
		var branch_id_1 = $('#branch_id1').val();
		if(branch_id_1==1){
			$('#branch_select_2').show();
			$('#branch_select_3').show();
		}
	}


    $(function () {
        $(document).on("change", ".reju_emp", function () {
            var id = $(this).val();
            var url = '<?php echo e(route("payslip_salaryajax", ":id")); ?>';
            url = url.replace(':id', id);
        
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    console.log(response.data);
                    if(response != null){
                        $('.sallery_ajax').val(response.data);
                    }
                }
            });
            

        });
    });



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/payslip_create.blade.php ENDPATH**/ ?>