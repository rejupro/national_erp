<?php $__env->startSection("content"); ?>
<?php
 $mhead='inventory';
 $phead='prod';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> সেলস ডেলিভারি ক্রিয়েট <?php else: ?> Sales Delivery Create <?php endif; ?></h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> সেলস ডেলিভারি ক্রিয়েট <?php else: ?> Sales Delivery Create <?php endif; ?></a></li>
        </ol>
</section>
<!-- Main content -->
<section class="content">

   <div class="row">
   <div class="col-md-9">
   <div class="box box-solid">
   <div class="box-header with-border">
   <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> সেলস ডেলিভারি রিসিভ <?php else: ?> Sales Product Receive <?php endif; ?></h3>
   </div>
   <div class="box-body">
   
   <?php if($delivery==NULL): ?>
   <div class="col-md-12">
   <form action="<?php echo e(route('product-delivery-store')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
       <?php echo csrf_field(); ?>
   <div class="row">
   <div class="col-md-4">
   <div class="form-group">
   <label><?php if( Auth::User()->language == 1 ): ?> সেলস ইনভয়েস <?php else: ?> Sales Invoice <?php endif; ?></label>
   <select class="form-control select2" name="sales_invoice" id="sales_invoice" required>
   <option value="">-Select Invoice-</option>
   <?php $__currentLoopData = $sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php if($data->quantity > $data->dqty): ?><option value="<?php echo e($data->sales_invoice); ?>"><?php echo e($data->sales_invoice); ?><?php endif; ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </select>
   </div>
   <div class="form-group">
   <div class="input-group">
   <span class="input-group-addon">CNo:</span>
   <input type="text" maxlength="15" class="form-control" value="<?php echo e($challan_no); ?>" name="challan_no" required readonly>
   </div>
   </div>
   <div class="form-group" >
   <div class="input-group">
   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
   <input type="text" class="form-control datetimepicker" name="deli_date" id="deli_date" value="<?php echo e(today()); ?>" placeholder="Delivery Date" autocomplete="off">
   </div>
   </div>
   </div>
   <div class="col-md-8">
   <div class="form-group">
   <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
   <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Challan Note"></textarea>
   </div>
   </div>
   </div>
           <div class="text-center" >
               <br>
               <input type="submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> এড <?php else: ?> ADD <?php endif; ?>"/>
           </div>
   </form>
   <?php endif; ?>
   <?php if($delivery): ?>
   <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('prodelivery-stock-store')); ?>" accept-charset="utf-8">
       <?php echo csrf_field(); ?>
       <input  type="hidden" value="<?php echo e($challan_no); ?>" name="challan_no">
       <input type="hidden" value="<?php echo e($deli_date); ?>" name="deli_date">
       <input type="hidden" value="<?php echo e($note); ?>" name="note">
       <input type="hidden" value="<?php echo e($order_no); ?>" name="order_no">
   <div class="row">
   <div class="cart cart-sm">
   <table class="table table-bordered table-striped" style="margin-bottom: 0;">
   <thead>
   <th style="width:35px; text-align:center;">SN</th>
   <th style="width:100px; text-align:center;">Product ID</th>
   <th style="width:280px; text-align:left;">Product</th>
   <th style="width:60px; text-align:center;">Sales</th>
   <th style="width:60px; text-align:center;">Delivered</th>
   <th style="width:60px; text-align:center;">Now Qty</th>
   <th style="width:60px; text-align:center;">Rest Qty</th>
   </thead>
   <tbody>
       <?php $i=1; ?>
       <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($data->quantity > $data->dqty): ?>
       <input type="hidden" name="sales_invoice[]" id="sales_invoice" value="<?php echo e($sales_invoice); ?>" class="form-control" readonly/>
       <tr>
           <td><?php echo e($i++); ?></td>
           <td><input type="text" name="item_id[]" id="item_id" value="<?php echo e($data->item_id); ?>" class="form-control" readonly/></td>
           <td><input type="text" name="item_name[]" id="item_name" value="<?php echo e($data->item_name); ?>" class="form-control" readonly/></td>
           <td><input type="text" name="sales_qty[]" id="sales_qty" value="<?php echo e($data->quantity); ?>" class="form-control" readonly/></td>
           <td><input type="text" name="dqty[]" id="dqty" value="<?php echo e($data->dqty); ?>" class="form-control" readonly/></td>
           <td><input type="text" name="deli_qty[]" id="deli_qty" class="form-control" value="0"></td>
           <td><input type="text" name="rest_qty[]" id="rest_qty" value="<?php echo e($data->quantity - $data->dqty); ?>" class="form-control" readonly></td>
       </tr>
       <?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </tbody>
   </table>
   </div>
   </div>
   <input type="submit" id="save_delivered" class="btn btn-flat bg-purple btn-sm " value="Delivered"/> <a href="<?php echo e(route('prodelivery-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
   </form>
   <?php endif; ?>
   </div>
</div>
</div>
</div>
</div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/inventory/delivery_create.blade.php ENDPATH**/ ?>