<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='warehs';
?>
<section class="content-header">
   <h1>Warehouse Stock</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Warehouse Stock</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Warehouse Stock Status</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped table-hover table_list" id="datarec">
                     <thead>
                        <tr>
                           <th rowspan="2" style="width:40px;" class="text-center">SN</th>
                           <th rowspan="2" style="width:80px;">Image</th>
                           <th rowspan="2">Name</th>
                           <th rowspan="2">SKU</th>
                           <th rowspan="2">Warehouse</th>
                           <th colspan="2" class="text-center">Purchase Details</th>
                           <th colspan="2" class="text-center">Sales Details</th>
                           <th colspan="2" class="text-center">Transaction Details</th>
                           <th rowspan="2" class="text-center">Adjust</th>
                           <th rowspan="2" class="text-center">Available</th>
                        </tr>
                        <tr>
                           <th class="text-center">Purchase</th>
                           <th class="text-center">Received</th>
                           <th class="text-center">Sold</th>
                           <th class="text-center">Delivery</th>
                           <th class="text-center">Received</th>
                           <th class="text-center">Send</th>
                        </tr>
                     </thead>
                        <?php
                             $i=1; $total=0;
                         ?>
                     <tbody>
                         <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                        <tr>
                           <td class="text-center"><?php echo e($i++); ?></td>
                           <td class="text-center"><img src="" height="40px" width="40px"></td>
                           <td><b class="prodetail" id="" style="cursor: pointer;"></b><?php echo e($data->product_name); ?></td>
                           <td><?php echo e($data->code); ?></td>
                           <td><?php echo e($data->name); ?></td>
                           <td class="text-center"><?php echo e($data->quantity); ?></td>
                           <td class="text-center"><?php echo e($data->recv_qty); ?></td>
                           <td class="text-center"><?php echo e($data->sold_qty); ?></td>
                           <td class="text-center"><?php echo e($data->deli_qty); ?></td>
                           <td class="text-center"><?php echo e($data->recv_qty); ?></td>
                           <td class="text-center"><?php echo e($data->deli_qty); ?></td>
                           <td class="text-center"><?php echo e($data->recv_qty - $data->deli_qty); ?></td>
                           <td class="text-center"><?php echo e($data->quantity - $data->sold_qty); ?></td>
                        </tr>
                        <?php $total = $total + $data->quantity - $data->sold_qty; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td class="text-center" colspan="5"><strong>-Total-</strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong><?php echo e($total); ?></td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/inventory/warehouse_stock.blade.php ENDPATH**/ ?>