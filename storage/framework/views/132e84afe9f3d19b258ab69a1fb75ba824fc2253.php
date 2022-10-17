<?php $__env->startSection("content"); ?>
<?php
 $mhead='material';
 $phead='msfu';
?>
    <section class="content-header">
    <h1>Matrial Use List</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Matrial Use List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Matrial Use Record</h3>
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
        <th style="width:40px; text-align:center;">SN</th>
        <th>Date</th>
        <th>Product Name</th>
        <th>Project Code</th>
        <th>Cost</th>
        <th>QTY</th>
        <th>Freight</th>
        <th>Price</th>
        <th style="width:40px; text-align:center;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0; ?>
        <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($i++); ?></td>
            <td><?php echo e($data->created_at); ?></td>
            <td><?php echo e($data->item_name); ?></td>
            <td><?php echo e($data->project_name); ?></td>
            <td><?php echo e($data->cost); ?></td>
            <td><?php echo e($data->quantity); ?></td>
            <td><?php echo e($data->freight_amount); ?></td>
            <td><?php echo number_format("$data->price",2) ?></td>
            <td nowrap="">
                <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('material-view-page',['id'=>$data->id])); ?>"><i class="fa fa-eye cat-child"></i></a>
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
        <a href="<?php echo e(route('materialuse-create-page')); ?>" class="btn btn-flat bg-purple">Add More</a>
        <a href="<?php echo e(route('materialuse-checkout-page')); ?>" class="btn btn-flat bg-purple">Save Record</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

            </div>
            </div>
            </div>
        </div>
        </div> --}}
        </div>
        <div style="display: none;">
        <table id="expcsv"></table>
        </div>
    </section>
    <!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/material_use/material_list.blade.php ENDPATH**/ ?>