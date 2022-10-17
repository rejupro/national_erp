<?php $__env->startSection("content"); ?>
<?php
 $mhead='daily';
 $phead='dexr';
?>
<section class="content-header">
   <h1>Expenses List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Daily Process</a></li>
      <li class=""><a href="#">Daily Expenses List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Daily Expenses Record</h3>
            </div>
            <div class="box-body">
               
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>Project Id</th>
                           <th>Staff Name</th>
                           <th>Product Item</th>
                           <th>Total Price</th>
                           <th>Note</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <?php
                               $i=1;
                           ?>
                           
                           <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                           <td class="center"><?php echo e($i++); ?></td>
                           <td><?php echo e($data->date); ?></td>
                           <td><?php echo e(data_get($data,'project.project_id')); ?></td>
                           <td><?php echo e($data->staff->name); ?></td>
                           <td><?php echo e($data->product->name); ?></td>
                           <td><?php echo e($data->grand_total); ?></td>
                           <td><?php echo e($data->address); ?></td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="<?php echo e(route('daily-expense-view-route',['id' => $data->id])); ?>"><i class="fa fa-eye"></i></a>
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
                        <a href="<?php echo e(route('daily-expense-create-route')); ?>" class="btn btn-flat bg-purple">Add Expenses</a>
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
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                        <a class=" pull-right" data-widget="collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i></a>
                     </div>
                     <!-- /. tools -->
                     <i class="fa fa-filter" aria-hidden="true"></i>
                     <h3 class="box-title">Date Range Filter</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     
                  </div>
               </div>
            </div>
         </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/rmc_construction/final_v5/rmc_final/resources/views/main/admin/dailyprocess/daily_expense_list.blade.php ENDPATH**/ ?>