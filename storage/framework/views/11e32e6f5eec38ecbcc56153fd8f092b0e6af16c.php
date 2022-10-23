<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='empc';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি ক্রিয়েট <?php else: ?> Employee Create <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি ক্রিয়েট <?php else: ?> Employee Create <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি ক্রিয়েট <?php else: ?> Employee Create <?php endif; ?></h3>
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
                    
                        <form action="<?php echo e(route('employee-store-page')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ডিপার্টমেন্ট <?php else: ?> Department <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">DP</span>
                                                            <select class="form-control select2" name="dept_id" id="dipid" >
                                                                <option value="">-Select-</option>
                                                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->dept_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">DS</span>
                                                            <select class="form-control select2" name="desg_id" id="desid" >
                                                                <option value="">-Select-</option>
                                                                <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->desg_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">N</span>
                                                            <input type="text" maxlength="45" class="form-control" name="name" id="name" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> পিতার নাম <?php else: ?> Father Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">FN</span>
                                                            <input type="text" maxlength="45" class="form-control" name="fname" id="fname" placeholder="e.g. Abul Kalam" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> মোবাইল <?php else: ?> Mobile <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">MO</span>
                                                            <input type="text" maxlength="18" class="form-control" name="mobile" id="mobile" placeholder="e. g. 0161xx700xx" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ইমেইল <?php else: ?> Email <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EM</span>
                                                            <input type="email" maxlength="45" class="form-control" name="email" id="email" placeholder="e.g. info@axesgl.com" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> মাতার নাম <?php else: ?> Mother Name <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">MN</span>
                                                            <input type="text" maxlength="45" class="form-control" name="mname" id="mname" placeholder="e.g. Begum Feroza" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ফোন <?php else: ?> Phone <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">PH</span>
                                                            <input type="text" maxlength="14" class="form-control" name="phone" id="inputPhone" placeholder="Phone No:" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> এনআইডি নাম্বার <?php else: ?> NID No <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">NI</span>
                                                            <input type="text" maxlength="17" class="form-control" name="nidno" id="nidno" onkeypress="return isNumberKey(event)" placeholder="NID No:" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> জন্মতারিখ <?php else: ?> Date of Birth <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                            </span>
                                                            <input type="text" class="form-control datetimepicker" name="dob" id="dob" placeholder="Date of Birth:" autocomplete="off" >
                                                            <span class="input-group-addon">DOB</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> জয়েনিং ডেট <?php else: ?> Joining Date <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input type="text" maxlength="18" class="form-control datetimepicker" name="join_date" id="job" placeholder="Joining Date:" autocomplete="off" >
                                                            <span class="input-group-addon">JOB</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> সেলারি <?php else: ?> Salary <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">SA</span>
                                                            <input type="text" maxlength="6" class="form-control" name="salary" id="salary"  onkeypress="return isNumberKey(event)" placeholder="Salary:" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">ST</span>
                                                            <select class="form-control" name="status">
                                                                <option value="1">Active</option>
                                                                <option value="0">De-Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ <?php else: ?> Branch <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BR</span>
                                                            <select class="form-control select2" name="wbrid" id="wbrid" >
                                                                <option value="1">-Select-</option>
                                                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputIMAGE" class="control-label mb-10"><?php if( Auth::User()->language == 1 ): ?> ইমেজ <?php else: ?> Image <?php endif; ?></label>
                                                        <div style="width:200px; height:245px;">
                                                            <img src="../img/emp/demp.jpg" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
                                                        </div>
                                                        <br>
                                                        <input type="file" class="btn btn-flat bg-purple btn-sm" name="item" id="profile-img" accept=".png, .gif, .jpg, .jpeg">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php if( Auth::User()->language == 1 ): ?> রেসিডেন্টাল এড্রেস <?php else: ?> Residential Address <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">RA</span>
                                                            <textarea class="form-control" name="address" id="address" maxlength="250" rows="5" placeholder="Residential Address" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php if( Auth::User()->language == 1 ): ?> পারমানেন্ট এড্রেস <?php else: ?> Permanent Address <?php endif; ?></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">PA</span>
                                                            <textarea class="form-control" name="paddress" id="paddress" maxlength="250" rows="5" placeholder="Permanent Address" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('employee-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/payroll/employee_create.blade.php ENDPATH**/ ?>