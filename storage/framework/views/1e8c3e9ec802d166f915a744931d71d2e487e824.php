<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='branchs';
?>
    <section class="content-header">
    <h1>Branch Stock</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Branch Stock</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Branch Stock Status</h3>
        </div>
        <div class="box-body">
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped table-hover table_list" id="datarec">
        <thead>
        <tr>
            <th rowspan="2" style="width:40px;" class="text-center">SN</th>
            <th rowspan="2" style="width:80px;">Branch</th>
            
            <th rowspan="2">Name</th>
            <th rowspan="2">SKU</th>
            <th colspan="4" class="text-center">Purchase Details</th>
            <th colspan="3" class="text-center">Transaction Details</th>
            <th colspan="5" class="text-center">Sold Details</th>
            
            <th rowspan="2" class="text-center">DP.Qty</th>
            <th rowspan="2" class="text-center">In-Stock</th>
            <th colspan="2" class="text-center">Sold Summary</th>
        </tr>
        <tr>
            <th class="text-center">Purchase</th>
            <th class="text-center">Received</th>
            <th class="text-center">Return</th>
            <th class="text-center">Balance</th>
            <th class="text-center">Received</th>
            <th class="text-center">Send</th>
            <th class="text-center">Balance</th>
            <th class="text-center bg-aqua">Sold</th>
            <th class="text-center">Deli</th>
            <th class="text-center">AD.Bal</th>
            <th class="text-center">Return</th>
            <th class="text-center">Balance</th>
            <th class="text-center bg-aqua">UnDeli</th>
            <th class="text-center bg-aqua">Net.Sales</th>
        </tr>
        </thead>
        <?php $i=1; $total=0; ?>
        <tbody>
        <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td class="text-center"><?php echo e($i++); ?></td>
        <td class="text-center"><?php echo e($data->name); ?></td>
        
        <td><b class="prodetail" style="cursor: pointer;"><?php echo e($data->product_name); ?></b></td>
        <td><?php echo e($data->code); ?></td>
        <td class="text-center"><?php echo e($data->purchase_qty); ?></td>
        <td class="text-center"><?php echo e($data->recv_qty); ?></td>
        <td class="text-center"><?php echo e($data->rest_qty); ?></td>
        <td class="text-center"><?php echo e($data->purchase_qty - $data->recv_qty); ?></td>
        <td class="text-center"><?php echo e($data->recv_qty); ?></td>
        <td class="text-center"><?php echo e($data->deli_qty); ?></td>
        <td class="text-center"><?php echo e($data->recv_qty - $data->deli_qty); ?></td>
        <td class="text-center"><?php echo e($data->sold_qty); ?></td>
        <td class="text-center"><?php echo e($data->deli_qty); ?></td>
        <td class="text-center"></td>
        <td class="text-center"><?php echo e($data->return_qty); ?></td>
        <td class="text-center"><?php echo e($data->sold_qty - $data->deli_qty); ?></td>
        <td class="text-center"><?php echo e($data->return_qty); ?></td>
        <td class="text-center"><?php echo e($data->recv_qty - $data->deli_qty); ?></td>
        <td class="text-center"><?php echo e($data->sold_qty - $data->deli_qty); ?></td>
        <td class="text-center"><?php echo e($data->sold_qty); ?></td>

        </tr>
        <?php $total = $total + $data->purchase_qty - $data->sold_qty; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        
        </tfoot>
        </table>
        </div>

        <div class="clearfix" ></div>
        <div class="row text-center" style="margin-top: 15px" >
        <span style="font-size: 12px; font-style: oblique; font-weight: bold; color: red;">DELI: Delivered, AD.BAL: Balance after Delivered, SUP.REC: Warrany Received from Supplier, DP.QTY: Disposal or Adjust Product, UNDELI: Undelivered Product after Sold.</span>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- /.main content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/inventory/branch_stock.blade.php ENDPATH**/ ?>