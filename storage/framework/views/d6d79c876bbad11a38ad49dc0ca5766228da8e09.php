<?php $__env->startSection("content"); ?>
<?php
 $mhead='bank';
 $phead='mobl';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট <?php else: ?> Mobile Account <?php endif; ?></h1>
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
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট <?php else: ?> Mobile Account <?php endif; ?></h3>
        </div>
        <div class="box-body">

        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead>
                <tr>
                    <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                    <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                    <th><?php if( Auth::User()->language == 1 ): ?> নাম্বার <?php else: ?> Number <?php endif; ?></th>
                    <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="center"><?php echo e($data->id); ?></td>
                    <td><?php echo e($data->mname); ?></td>
                    <td><?php echo e($data->mobile); ?></td>
                    <!--<td><?php echo e($data->deposite); ?></td>-->
                    <!--<td><?php echo e($data->withdrawn); ?></td>-->
                    <!--<td><?php echo e($data->balance); ?></td>-->
                    <td nowrap="">
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('edit-mobileaccount-page',$data->id)); ?>"><i class="fa fa-edit"></i></a> 
                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('delete-mobileaccount',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
        <a href="<?php echo e(route('create-mobileaccount-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড ব্যাংক <?php else: ?> Add Bank <?php endif; ?></a>
        </div>
        </div>
        </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/bank/mobileaccount_list.blade.php ENDPATH**/ ?>