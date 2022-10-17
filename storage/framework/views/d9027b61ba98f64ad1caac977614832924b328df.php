<?php $__env->startSection("content"); ?>
<?php
 $mhead='project';
 $phead='prc';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট রেকর্ড ক্রিয়েট <?php else: ?> Project Record Create <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট রেকর্ড ক্রিয়েট <?php else: ?> Project Record Create <?php endif; ?></a></li>
        </ol>
    </section>
     <!-- Main content -->
     <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট রেকর্ড ক্রিয়েট <?php else: ?> Project Record Create <?php endif; ?></h3>
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
        <form action="<?php echo e(route('project-store-page')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">

        <div class="row ">
        <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট আইডি <?php else: ?> Project ID <?php endif; ?></label>
        <input type="text" name="project_id" maxlength="20" id="prjid"  value=""   class="form-control" placeholder="e. g. EDU487K" />
        </div>
        </div>
        <div class="col-md-8">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্টের নাম <?php else: ?> Project Name <?php endif; ?></label>
        <input type="text" name="name" maxlength="60" value="" id="name" class="form-control" placeholder="e.g Rapura Water Line"  />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট গ্রুপ <?php else: ?> Select Group <?php endif; ?></label>
        <select class="form-control select2" name="pgid" id="pgid" >
        <option value="">-Select-</option>
            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($groups->id); ?>"><?php echo e($groups->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> সাব-গ্রুপ <?php else: ?> Sub-Group <?php endif; ?></label>
        <select class="form-control select2" name="psgid" id="psgid">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $subgroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subgroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($subgroups->id); ?>"><?php echo e($subgroups->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট স্ট্যাটাস <?php else: ?> Project Status <?php endif; ?></label>
        <select class="form-control" name="status" id="status">
        <option value="">-Select-</option>
        <option value="Start">Start</option>
        <option value="On-Process">On-Process</option>
        <option value="Done">Done</option>
        <option value="Apply">Apply</option>
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট পারসন <?php else: ?> Contact Person <?php endif; ?></label>
        <input type="text" name="cperson" maxlength="35" value="" class="form-control" placeholder="e.g Mr.Enamul Haque"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট নাম্বার <?php else: ?> Contact Number <?php endif; ?></label>
        <input type="text" name="cnumber" maxlength="18" value="" class="form-control" placeholder="e.g +880161xxxxx70"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট ভেলু <?php else: ?> Project Value <?php endif; ?></label>
        <input type="text" name="prjamount" maxlength="16" value=""  class="form-control" placeholder="e.g 3,50,00,000"  />
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> টারগেট এস্পেন্সেস <?php else: ?> Target Expenses <?php endif; ?></label>
        <input type="text" name="prjexamount" maxlength="16" value=""  class="form-control" placeholder="e.g 2,50,00,000"  />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট কনটাক্টর <?php else: ?> Select Contractor <?php endif; ?></label>
        <select class="form-control select2" name="coid" id="coid">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $contractor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($contractors->id); ?>"><?php echo e($contractors->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট এমাউন্ট <?php else: ?> Contact Amount <?php endif; ?></label>
        <input type="text" name="coamount" maxlength="16" value=""  class="form-control" placeholder="e.g 2,10,00,000"  />
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট ক্লায়েন্ট/ডিপার্টমেন্ট <?php else: ?> Select Client/Department <?php endif; ?></label>
        <select class="form-control select2" name="client" id="client">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($customers->id); ?>"><?php echo e($customers->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট ডিটেইলস <?php else: ?> Project Details <?php endif; ?></label>
        <textarea class="form-control" maxlength="250" rows="6" name="prjdetails" placeholder="e.g. Details"></textarea>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?> </label>
        <textarea class="form-control" maxlength="150" rows="6" name="address" placeholder="e.g. Address"></textarea>
        </div>
        </div>
        </div>
        </div>
        <div class="col-md-1"></div>
        </div>
        </div>

        </div>
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <input type="submit" name="save_project" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('project-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?>  History  <?php endif; ?> </h3>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/manage_project/project_create.blade.php ENDPATH**/ ?>