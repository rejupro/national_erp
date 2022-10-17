<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='pror';
?>
    <section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> রিসিভড <?php else: ?> Received <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রিসিভড <?php else: ?> Received <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> রিসভ রেকর্ড <?php else: ?> Receive Record <?php endif; ?></h3>
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
    <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> চালান নাঃ <?php else: ?> Challan No <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> পারচেস নাঃ <?php else: ?> Purchase No <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> রিসিভ ডেট <?php else: ?> Receive Date <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></th>
    <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
    </tr>
    </thead>
    <?php $i=1; ?>
    <tbody>
    <?php $__currentLoopData = $receipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="text-center"><?php echo e($i++); ?></td>
    <td><?php echo e($data->created_at); ?></td>
    <td><?php echo e($data->challan_no); ?></td>
    <td><?php echo e($data->pur_invoice); ?></td>
    <td><?php echo e($data->rcv_date); ?></td>
    <td><?php echo e($data->note); ?></td>
    <td nowrap="">
        <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('proreceive-view',['id' => $data->id])); ?>"><i class="fa fa-eye cat-child"></i></a>
        <a class="btn btn-flat bg-purple" href="<?php echo e(route('productreceive-delete',['id' => $data->challan_no])); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('proreceive-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট রিসিভ <?php else: ?> Create Receive <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/inventory/receive_list.blade.php ENDPATH**/ ?>