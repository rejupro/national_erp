
<?php $__env->startSection("content"); ?>
<?php
 $mhead='loan';
 $phead='loanlist';
?>
<section class="content-header">
   <h1>Loan list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan list</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">Loan List</h3>
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
                   <table class="table table-bordered table-striped" >
                      <thead class="text-uppercase">
                         <tr>
                            <th style="width:40px;">SN</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Type</th>
                            <th>Receive</th>
                            <th>Payable</th>
                            <th>Total Loan</th>
                            <th>Balance</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             
                           <?php $i=1; ?>
                           <?php $__currentLoopData = $loan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                 <td class="center"><?php echo e($i++); ?></td>
                                 <td><?php echo e($data->code); ?></td>
                                 <td><?php echo e($data->name); ?></td>
                                 <td><?php echo e($data->mobile); ?></td>
                                 <td><?php echo e($data->type); ?></td>
                                 <td><?php echo e($data->debit); ?></td>
                                 <td><?php echo e($data->credit); ?></td>
                                 <td><?php echo e($data->balance); ?></td>
                                 <td><?php $balance=$data->credit - $data->debit ?> <?php echo e($balance); ?></td>
                                 <td nowrap="">
                                  <a class="btn btn-flat bg-purple" href="<?php echo e(route('loan-edit-route',$data->id)); ?>"><i class="fa fa-edit"></i></a>
                                   <a class="btn btn-flat bg-purple" href="<?php echo e(route('loan-delete-route',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                         <a href="<?php echo e(route('loan-create-route')); ?>" class="btn btn-flat bg-purple">Add Loan</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/loan/loan_list.blade.php ENDPATH**/ ?>