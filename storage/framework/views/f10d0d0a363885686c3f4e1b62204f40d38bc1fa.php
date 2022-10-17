<?php $__env->startSection("content"); ?>
<?php
 $mhead='urole';
 $phead='rolel';
?>
    <section class="content-header">
        <h1> <?php if( Auth::User()->language == 1 ): ?> ইউজার রোল <?php else: ?> User Role <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li><a href="<?php echo e(route('role-list-page')); ?>"><?php if( Auth::User()->language == 1 ): ?> ইউজার ও রোল <?php else: ?> User & Role <?php endif; ?></a></li>
        </ol>
    </section><!-- Main content -->
    <section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> সব রোল <?php else: ?> All Role <?php endif; ?></h3>
    </div>
    <div class="box-body">
        
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> অ্যাক্সেস <?php else: ?> Access <?php endif; ?></th>
    <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
    </tr>
    </thead>
    <?php $i=1; ?>
    <tbody>
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="center"><?php echo e($i++); ?></td>
    <td><?php echo e($usr->name); ?></td>
    <td>
        <?php echo e($usr->company_set); ?>,<?php echo e($usr->manage_project); ?>,<?php echo e($usr->daily_process); ?>,
        <?php echo e($usr->requisition_record); ?>,<?php echo e($usr->requisition_create); ?>,<?php echo e($usr->purchase); ?>,
        <?php echo e($usr->material_use); ?>,<?php echo e($usr->inventory); ?>,<?php echo e($usr->client); ?>,
        <?php echo e($usr->product); ?>,<?php echo e($usr->master); ?>,<?php echo e($usr->account); ?>,
        <?php echo e($usr->loan); ?>,<?php echo e($usr->lc); ?>,<?php echo e($usr->financial); ?>,
        <?php echo e($usr->payroll); ?>,<?php echo e($usr->bank); ?>,<?php echo e($usr->user_role); ?>,
        <?php echo e($usr->report); ?>,<?php echo e($usr->personal); ?>,<?php echo e($usr->company_set); ?>

    </td>
    <td nowrap="">
    <a class="btn btn-flat bg-purple" href="<?php echo e(route('role-edit-page',$usr->id)); ?>" ><i class="fa fa-edit"></i></a>
    <a class="btn btn-flat bg-purple" href="<?php echo e(route('role-delete-page',$usr->id)); ?>" ><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('role-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড রোল <?php else: ?> Add Role <?php endif; ?> </a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>

    </section>
    <!-- /.main content -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/user_role/role_list.blade.php ENDPATH**/ ?>