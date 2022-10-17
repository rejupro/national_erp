<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='lar';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> লিভ রেকর্ড <?php else: ?> Leave Record <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> লিভ রেকর্ড <?php else: ?> Leave Record <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> লিভ রেকর্ড <?php else: ?> Leave Record <?php endif; ?></h3>
    </div>
    <div class="box-body">
    
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি <?php else: ?> Employee <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> লিভ টাইপ <?php else: ?> Leave Type <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> কারন <?php else: ?> Reason <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> হতে <?php else: ?> From <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> কাছে <?php else: ?> To <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> ডেজ <?php else: ?> Days <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></th>
    <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
    </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="center"><?php echo e($i++); ?></td>
    <td><?php echo e($leave->created_at); ?></td>
    <td><?php echo e($leave->name); ?></td>
    <td><?php echo e($leave->leave_name); ?></td>
    <td><?php echo e($leave->reason); ?></td>
    <td><?php echo e(date('d-m-Y', strtotime($leave->start_date))); ?></td>
    <td><?php echo e(date('d-m-Y', strtotime($leave->end_date))); ?></td>
    <td><?php echo e($leave->days); ?></td>
    <td>
     <?php if($leave->status==1): ?>
     Approved
     <?php elseif($leave->status==2): ?>
     Pending
     <?php else: ?>
     Disapprove
     <?php endif; ?>
    </td>
    <td nowrap="" style="text-align:center;">
    <a class="btn btn-flat bg-purple" href="<?php echo e(route('leaveapp-edit-page',$leave->id)); ?>"><i class="fa fa-edit"></i>
    </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('leaveapp-delete-page',$leave->id)); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('leaveapp-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড অ্যাপ্লিকেশান <?php else: ?> Add Application <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/payroll/leaveapp_list.blade.php ENDPATH**/ ?>