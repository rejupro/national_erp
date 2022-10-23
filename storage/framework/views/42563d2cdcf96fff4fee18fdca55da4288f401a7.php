<?php $__env->startSection("content"); ?>
<?php
 $mhead='master';
 $phead='bc';
?>
    <section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> এড ব্র্যান্ড <?php else: ?> Add Brand <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এড ব্র্যান্ড <?php else: ?> Add Brand <?php endif; ?></a></li>
    </ol>
    </section>
    <!-- Main content -->
    <section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এড ব্র্যান্ড <?php else: ?> Add Brand <?php endif; ?></h3>
    </div>
    <div class="box-body">

    <form action="<?php echo e(route('brand-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formId_037548942576347671623005240976">
        <?php echo csrf_field(); ?>

    <div class="col-md-12 popup_details_div">
        <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <div class="row ">
    <div class="col-md-12">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="form-group">
    <label><?php if( Auth::User()->language == 1 ): ?> ব্র্যান্ড নেম <?php else: ?> Brand Name <?php endif; ?></label>
    <input type="text" name="name" maxlength="35" value="" id="pname" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Brand Name">
    </div>
    <div class="form-group">
    <label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
    <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
    </div>
    </div>
    <div class="col-md-3"></div>
    </div>
    </div>

    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 nopadding widgets_area"></div>
    <div class="row" style="margin-top: 15px">
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right">
    <input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"> <a href="<?php echo e(route('brand-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
    <div class="box-body">
    <div class="row"><div class="col-md-12"><div class="alert alert-history" style="background-color: transparent !important;border: 0px  !important;max-height:400px;min-height: 500px"><ul class="timeline"><li><span class="label label-success">07 Jun 2021</span></li><li><i class="fa fa-chevron-right bg-gray"></i>
    <div class="timeline-item" style="background-color: transparent !important">
    <span class="time"><i class="fa fa-clock-o"></i> 12:42:05 AM</span><h3 class="timeline-header"> <a href="#">You</a></h3>
    <div class="timeline-body">
    <p class="timeline-title">Brand has been deleted</p>Brand name: ALIEN</div></div></li></ul></div></div></div></div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/master/brandcreate.blade.php ENDPATH**/ ?>