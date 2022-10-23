
<?php $__env->startSection("content"); ?>
<?php
 $mhead='loan';
 $phead='loaninvlist';
?>
<section class="content-header">
   <h1>Loan Invoice</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan Invoice</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">Loan Invoice List</h3>
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
                            <th>Invoice No</th>
                            <th>Loan ID</th>
                            <th>Amount</th>
                            <th>Profit Amount</th>
                            <th>Installment</th>
                            <th>Total</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             
                           <?php $i=1; ?>
                           <?php $__currentLoopData = $loaninvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                 <td class="center"><?php echo e($i++); ?></td>
                                 <td><?php echo e($data->inv_no); ?></td>
                                 <td><?php echo e($data->loan_id); ?></td>
                                 <td><?php if($data->amount>0): ?> <?php echo number_format("$data->amount") ?> <?php endif; ?></td>
                                 <td><?php if($data->profit_amount>0): ?> <?php echo number_format("$data->profit_amount",2) ?> <?php endif; ?></td>
                                 <td><?php echo e($data->installment); ?></td>
                                 <td><?php echo number_format("$data->total",2) ?></td>
                                 <td nowrap="">
                                  
                                   <a class="btn btn-flat bg-purple" href="<?php echo e(route('loaninvoice-delete-route',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
                         <a href="<?php echo e(route('loaninvoice-create-route')); ?>" class="btn btn-flat bg-purple">Add Loan</a>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/loan/loan_inv_list.blade.php ENDPATH**/ ?>