<?php $__env->startSection("content"); ?>
<?php
 $mhead='bank';
 $phead='mobl';
?>
    <section class="content-header">
        <h1>Mobile Account</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">Bank</a></li>
                <li class=""><a href="#">Mobile Account List</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">All Account List</h3>
        </div>
        <div class="box-body">

        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead>
                <tr>
                    <th style="width:40px;">SN</th>
                    <th>Name</th>
                    <th>Number</th>
                    <!--<th>Deposit</th>-->
                    <!--<th>Widrawn</th>-->
                    <!--<th>Balance</th>-->
                    <th style="width:40px; text-align:center;">Action</th>
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
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('delete-mobileaccount',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
        <a href="<?php echo e(route('create-mobileaccount-page')); ?>" class="btn btn-flat bg-purple">Add Bank</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/bank/mobileaccount_list.blade.php ENDPATH**/ ?>