<?php $__env->startSection("content"); ?>
<?php
 $mhead='bank';
 $phead='accl';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ব্যাংক একাউন্ট লিস্ট <?php else: ?> Bank Account List <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ব্যাংক একাউন্ট লিস্ট <?php else: ?> Bank Account List <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ব্যাংক একাউন্ট লিস্ট <?php else: ?> Bank Account List <?php endif; ?></h3>
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
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
        <tr>
            <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
            <th><?php if( Auth::User()->language == 1 ): ?> ব্যাংক <?php else: ?> Bank <?php endif; ?></th>
            <th><?php if( Auth::User()->language == 1 ): ?> এ/সি নাঃ <?php else: ?> A/C No <?php endif; ?></th>
            <th><?php if( Auth::User()->language == 1 ): ?> টাইটেল <?php else: ?> Title <?php endif; ?></th>
            <th><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ <?php else: ?> Branch <?php endif; ?></th>
            <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
        </tr>
    </thead>
        <tbody>
            <?php 
            $i=1;
            
            ?>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="center"><?php echo e($i++); ?></td>
                <td><?php echo e($data->bank->name); ?></td>
                <td><?php echo e($data->acc_no); ?></td>
                <td><?php echo e($data->acc_title); ?></td>
                <td><?php echo e($data->bbrname); ?></td>
                <!--<td><?php echo e($data->bbrcode); ?></td>-->
                <!--<td><?php echo e($data->bbrlocation); ?></td>-->
                <!--<td><?php echo e($data->debit); ?></td>-->
                <!--<td><?php echo e($data->credit); ?></td>-->
                <!--<td><strong><?php echo e($data->balance); ?></strong></td>-->
                <td nowrap="">
                    
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('edit-bankaccount-page',$data->id)); ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('delete-bankaccount-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('create-bankaccount-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড একাউন্ট <?php else: ?> Add Account <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/bank/bankaccount_list.blade.php ENDPATH**/ ?>