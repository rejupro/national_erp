<?php $__env->startSection("content"); ?>
<?php
 $mhead='client';
 $phead='sl';
?>
<section class="content-header">
   <h1>Supplier List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Client</a></li>
      <li class=""><a href="#">Supplier List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Supplier List</h3>
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
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Code</th>
                           <th style="min-width:150px;">Contact</th>
                           <th>Address</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php $i=1; ?>
                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                           <td class="center"><?php echo e($i++); ?></td>
                           <td><a  href="<?php echo e(route('supplier-details-page',['id' => $supplier->id])); ?>"><?php echo e($supplier->name); ?></a></td>
                           <td><?php echo e($supplier->code); ?></td>
                           <td><?php echo e($supplier->c_phone); ?></td>
                           <td><?php echo e($supplier->address); ?></td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="<?php echo e(route('supplier-edit-route',['id'=>$supplier->id])); ?>" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="<?php echo e(route('supplier-destroy-route',['id'=>$supplier->id])); ?>" ><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('supplier-create-route')); ?>" class="btn btn-flat bg-purple">Add Supplier</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3">
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/client_setup/supplier_list.blade.php ENDPATH**/ ?>