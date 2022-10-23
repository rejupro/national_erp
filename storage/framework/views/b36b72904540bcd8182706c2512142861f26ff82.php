	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Employee Edit</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="#">Payroll</a></li>
        <li class=""><a href="<?php echo e(route('employee-edit-page',$data->id)); ?>">Employee Edit</a></li>
        </ol>
    </section>
   <!-- Main content -->
   <section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Edit Employee</h3>
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
    
    <form action="<?php echo e(route('employee-update-page',$data->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <?php echo csrf_field(); ?>
    <div class="col-md-12 popup_details_div">    
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Department</label>
    <div class="input-group">
    <span class="input-group-addon">DP</span>
    <select class="form-control select2" name="dept_id" id="dipid" >
    <option value="<?php echo e($data->dept_id); ?>"><?php echo e($data->dept_name); ?></option>
    <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->dept_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>Designation</label>
    <div class="input-group">
    <span class="input-group-addon">DS</span>
    <select class="form-control select2" name="desg_id" id="desid" >
    <option value="<?php echo e($data->desg_id); ?>"><?php echo e($data->desg_name); ?></option>
    <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($des->id); ?>"><?php echo e($dep->desg_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                              
    </select>
    </div>
    </div>        
    </div>    
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group" >
    <label>Name</label>
    <div class="input-group">
    <span class="input-group-addon">N</span>
    <input type="text" maxlength="45" class="form-control" name="name" value="<?php echo e($data->name); ?>" id="name" placeholder="e.g. Sumon" autocomplete="off" >
    </div>
    </div>
    </div>
    </div>    
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Father Name</label>
    <div class="input-group">
    <span class="input-group-addon">FN</span>
    <input type="text" maxlength="45" class="form-control" name="fname" id="fname" value="<?php echo e($data->fname); ?>" placeholder="e.g. Abul Kalam" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>Mobile</label>
    <div class="input-group">
    <span class="input-group-addon">MO</span>
    <input type="text" maxlength="18" class="form-control" name="mobile" id="mobile" value="<?php echo e($data->mobile); ?>" placeholder="e. g. 0161xx700xx" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>Email</label>
    <div class="input-group">
    <span class="input-group-addon">EM</span>
    <input type="email" maxlength="45" class="form-control" name="email" id="email" value="<?php echo e($data->email); ?>" placeholder="e.g. info@axesgl.com" autocomplete="off">
    </div>
    </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>Mother Name</label>
    <div class="input-group">
    <span class="input-group-addon">MN</span>
    <input type="text" maxlength="45" class="form-control" name="mname" id="mname" value="<?php echo e($data->mname); ?>" placeholder="e.g. Begum Feroza" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>Phone</label>
    <div class="input-group">
    <span class="input-group-addon">PH</span>
    <input type="text" maxlength="14" class="form-control" name="phone" id="inputPhone" value="<?php echo e($data->phone); ?>" placeholder="Phone No:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>NID No</label>
    <div class="input-group">
    <span class="input-group-addon">NI</span>
    <input type="text" maxlength="17" class="form-control" name="nidno" id="nidno" value="<?php echo e($data->nidno); ?>" onkeypress="return isNumberKey(event)" placeholder="NID No:" autocomplete="off">
    </div>
    </div>    
    </div>    
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Date of Birth</label>
    <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-calendar"></span>
    </span>
    <input type="text" class="form-control datetimepicker" name="dob" id="dob" value="<?php echo e($data->dob); ?>" placeholder="Date of Birth:" autocomplete="off" >
    <span class="input-group-addon">DOB</span>
    </div>
    </div>
    <div class="form-group" >
    <label>Joining Date</label>
    <div class="input-group">
    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    <input type="text" maxlength="18" class="form-control datetimepicker" name="join_date" value="<?php echo e($data->join_date); ?>" id="job" placeholder="Joining Date:" autocomplete="off" >
    <span class="input-group-addon">JOB</span>
    </div>
    </div>
    <div class="form-group" >
    <label>Salary</label>
    <div class="input-group">
    <span class="input-group-addon">SA</span>
    <input type="text" maxlength="6" class="form-control" name="salary" id="salary" value="<?php echo e($data->salary); ?>" onkeypress="return isNumberKey(event)" placeholder="Salary:" autocomplete="off" >
    </div>
    </div>
    <div class="form-group" >
    <label>Status</label>
    <div class="input-group">
    <span class="input-group-addon">ST</span>    
    <select class="form-control" name="status">
    <option value="1">Active</option>
    <option value="0">De-Active</option>
    </select>    
    </div>
    </div>
    <div class="form-group" >
    <label>Branch</label>
    <div class="input-group">
    <span class="input-group-addon">BR</span>
    <select class="form-control select2" name="wbrid" id="wbrid" >
    <option value="<?php echo e($data->wbrid); ?>"><?php echo e($data->br_name); ?></option>
    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($brn->id); ?>"><?php echo e($dep->br_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                                       
    </select>
    </div>
    </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="inputIMAGE" class="control-label mb-10">Image</label>
    <div style="width:200px; height:245px;">
    <img src="<?php echo e(asset($data->item)); ?>" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <br>    
    <input type="file" class="btn btn-flat bg-purple btn-sm" name="item" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
        
    </div>    
    </div>    
    </div>
    <div class="row">
    <div class="col-md-6">    
    <div class="form-group">
    <label>Residential Address</label>
    <div class="input-group">
    <span class="input-group-addon">RA</span>
    <textarea class="form-control" name="address" id="address" maxlength="250" rows="5" placeholder="Residential Address" ><?php echo e($data->address); ?></textarea>
    </div>    
    </div>
    </div>
    <div class="col-md-6">    
    <div class="form-group">
    <label>Permanent Address</label>
    <div class="input-group">
    <span class="input-group-addon">PA</span>
    <textarea class="form-control" name="paddress" id="paddress" maxlength="250" rows="5" placeholder="Permanent Address" ><?php echo e($data->paddress); ?></textarea>
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
    <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="<?php echo e(route('employee-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/payroll/employee_edit.blade.php ENDPATH**/ ?>