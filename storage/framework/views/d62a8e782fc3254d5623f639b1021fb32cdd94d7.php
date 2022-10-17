<?php $__env->startSection("content"); ?>
<?php
 $mhead='salarycreate';
 $phead='salarycreate';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি সেলারি ক্রিয়েট <?php else: ?> Employee Salary Create <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি সেলারি ক্রিয়েট <?php else: ?> Employee Salary Create <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি সেলারি ক্রিয়েট <?php else: ?> Employee Salary Create <?php endif; ?></h3>
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
                    
                        <form action="<?php echo e(route('salary-store')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <?php if($salary): ?>
                            <input type="hidden" name="id" id="id" value="<?php echo e($salary->id); ?>">
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="form-group" >
                                                <label><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি নেম <?php else: ?> Employee Name <?php endif; ?></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">EN</span>
                                                    <select class="form-control select2" name="emp_id" id="emp_id" >
                                                        <option value="<?php echo e($salary->emp_id); ?>"><?php echo e($salary->emp_name); ?></option>
                                                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id1" id="branch_id1">
                                                                <option value="<?php echo e($salary->branch_id1); ?>"><?php echo e($salary->branch_name1); ?></option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary1" id="salary1" value="<?php echo e($salary->salary1); ?>" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_2" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id2" id="branch_id2" >
                                                                <option value="<?php echo e($salary->branch_id2); ?>"><?php echo e($salary->branch_name2); ?></option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary2" id="salary2" value="<?php echo e($salary->salary2); ?>" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_3" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id3" id="branch_id3" >
                                                                <option value="<?php echo e($salary->branch_id3); ?>"><?php echo e($salary->branch_name1); ?></option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary3" id="salary3" value="<?php echo e($salary->salary3); ?>" placeholder="e.g. Sumon" autocomplete="off" >
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
                                            <div class="form-group" >
                                                <label><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি নেম <?php else: ?> Employee Name <?php endif; ?></label>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id1" id="branch_id1">
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary1" id="salary1" value="0" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_2" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id2" id="branch_id2" >
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary2" id="salary2" value="0" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_3" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ নেম <?php else: ?> Branch Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id3" id="branch_id3" >
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary3" id="salary3" value="0" placeholder="e.g. Sumon" autocomplete="off" >
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
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('salary-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/salary_create.blade.php ENDPATH**/ ?>