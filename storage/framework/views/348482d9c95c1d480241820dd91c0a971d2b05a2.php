<?php $__env->startSection("content"); ?>
<?php
 $mhead='bank';
 $phead='mobc';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট ক্রিয়েট <?php else: ?> Mobile Account Create <?php endif; ?></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
                <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট <?php else: ?> Mobile Account <?php endif; ?></a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট ক্রিয়েট <?php else: ?> Mobile Account Create <?php endif; ?></h3>
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
        <form action="<?php echo e(route('create-mobileaccount-store')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
           <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                <input type="text" name="mname" maxlength="45" value="" class="form-control" placeholder="Ex: Bkash"  />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php if( Auth::User()->language == 1 ): ?> নাম্বার <?php else: ?> Number <?php endif; ?></label>
                                <input type="text" name="mobile" maxlength="11" value="" class="form-control" placeholder="017XXXXXXXXX"  />
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
            <div class="clearfix" ></div>
            <div class="col-md-12 nopadding widgets_area"></div>
            <div class="row"style="margin-top: 15px" >
                <div class="col-md-8"></div>
                <div class="col-md-4 text-right" >
                    <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('mobileaccount-list')); ?>" class="btn btn-flat bg-grayss"><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/bank/mobileaccount_create.blade.php ENDPATH**/ ?>