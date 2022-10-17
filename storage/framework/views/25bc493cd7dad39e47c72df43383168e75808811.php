<?php $__env->startSection("content"); ?>
<?php
 $mhead='account';
 $phead='class';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ক্লাস <?php else: ?> Class <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ক্লাস <?php else: ?> Class <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> একাউন্ট ক্লাস <?php else: ?> Account Class <?php endif; ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:40px; text-align:center;">SN</th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                                            <th><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($i++); ?></td>
                                            <td style="font-style: italic; font-weight: 600;"><?php echo e($data->name); ?></td>
                                            <td><?php echo e($data->description); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/accounts/class.blade.php ENDPATH**/ ?>