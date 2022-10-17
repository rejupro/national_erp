<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='degl';
?>
    <section class="content-header">
        <h1>Designation List</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>

            <li><a href="#">Payroll</a></li>
            <li class="<?php echo e(route('designation-list-page')); ?>"><a href="#">Designation List</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Designation</h3>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="box-body">
                    
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" id="datarec">
                            <thead>
                            <tr>
                            <th style="width:40px;">SN</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width:40px; text-align:center;">Action</th>
                            </tr>
                            </thead>
                            <?php $i=0; ?>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <td class="center"><?php $i++; echo $i; ?></td>
                                <td><?php echo e($desg->desg_name); ?></td>
                                <td><?php echo e($desg->description); ?></td>
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('designation-edit-page',$desg->id)); ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('designation-delete-page',$desg->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                    <a href="<?php echo e(route('designation-create-page')); ?>" class="btn btn-flat bg-purple">Add Designation</a>
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
                            <h3 class="box-title">History </h3>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/payroll/designation_list.blade.php ENDPATH**/ ?>