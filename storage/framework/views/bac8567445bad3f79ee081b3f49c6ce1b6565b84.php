<?php $__env->startSection("content"); ?>
<?php
 $mhead='bank';
 $phead='bankl';
?>
    <section class="content-header">
        <h1>Bank List</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">Bank</a></li>
                <li class=""><a href="#">Bank List</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Bank List</h3>
        </div>
        <div class="box-body">

        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead>
                <tr>
                    <th style="width:40px;">SN</th>
                    <th>Name</th>
                    <!--<th>Sort Name</th>-->
                    <th style="width:40px; text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $i=1;
                ?>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="center"><?php echo e($i++); ?></td>
                    <td><?php echo e($data->name); ?></td>
                    <!--<td><?php echo e($data->sort); ?></td>-->
                    <td nowrap="">
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('edit-bank-page',$data->id)); ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('delete-bank',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
        <a href="<?php echo e(route('create-bank-page')); ?>" class="btn btn-flat bg-purple">Add Bank</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/rmc_construction/final_v5/rmc_final/resources/views/main/admin/bank/bank_list.blade.php ENDPATH**/ ?>