	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ইডিট লিভ রিকুয়েস্ট <?php else: ?> Edit Leave Request <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ইডিট লিভ রিকুয়েস্ট <?php else: ?> Edit Leave Request <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ইডিট লিভ রিকুয়েস্ট <?php else: ?> Edit Leave Request <?php endif; ?></h3>
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
        
        <form action="<?php echo e(route('leaveapp-update-page',$data->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <?php echo csrf_field(); ?>
        <div class="col-md-12 popup_details_div">    
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি <?php else: ?> Name <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">EM</span>
        <select class="form-control select2" name="emp_id" id="empid">
        <option value="<?php echo e($data->emp_id); ?>"><?php echo e($data->emp_name); ?></option>
        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> লিভ টাইপ <?php else: ?> Leave Type <?php endif; ?></label>
        <select class="form-control select2" name="l_id" id="lid">
        <option value="<?php echo e($data->l_id); ?>"><?php echo e($data->leave_name); ?></option>
        <?php $__currentLoopData = $leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaves): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($leaves->id); ?>"><?php echo e($leaves->leave_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                             
        </select>
        </div>        
        </div> 
        <div class="col-md-3">
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> অ্যাপ্লাই ডেট <?php else: ?> Apply Date <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="apply_date" id="apply" value="<?php echo e(date('d-m-Y', strtotime($data->apply_date))); ?>" placeholder="" autocomplete="off">
        </div>
        </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-3">    
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> লিভ ফ্রম <?php else: ?> Leave From <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="start_date" id="fdate" value="<?php echo e(date('d-m-Y', strtotime($data->start_date))); ?>" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVF</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> লিভ টু <?php else: ?> Leave To <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="end_date" id="tdate" value="<?php echo e(date('d-m-Y', strtotime($data->end_date))); ?>" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVT</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> লিভ ডেস <?php else: ?> Leave Days <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control" name="days" id="days" value="<?php echo e($data->days); ?>" placeholder="" autocomplete="off">
        <span class="input-group-addon">DAY</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">ST</span>    
        <select class="form-control" name="status" id="status">
        <?php if($data->status==2): ?>
        <option value="<?php echo e($data->status); ?>">Pending</option>
        <option value="1">Approve</option>
        <option value="0">Disapprove</option>   
        <?php elseif($data->status==1): ?>
        <option value="<?php echo e($data->status); ?>">Approve </option>
        <option value="2">Pending</option>
        <option value="0">Disapprove</option> 
        <?php else: ?>
        <option value="<?php echo e($data->status); ?>">Dis-Approve </option>
        <option value="2">Pending</option>
        <option value="3">Approve</option> 
        <?php endif; ?>  
        </select>    
        </div>
        </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-6">    
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> কারন <?php else: ?> Reason <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">RE</span>
        <textarea class="form-control" name="reason" id="reason" maxlength="250" rows="5" placeholder="Reason"><?php echo e($data->reason); ?></textarea>
        </div>    
        </div>
        </div>
        <div class="col-md-6">    
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
        <div class="input-group">
        <span class="input-group-addon">PA</span>
        <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="Note"> <?php echo e($data->note); ?> </textarea>
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
        <input type="submit" name="save_lar" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> আপডেট <?php else: ?> Update <?php endif; ?>"/> <a href="<?php echo e(route('leaveapp-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
        <!-- /.main content -->  

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/leaveapp_edit.blade.php ENDPATH**/ ?>