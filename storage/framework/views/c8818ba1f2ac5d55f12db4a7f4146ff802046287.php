
<?php $__env->startSection("content"); ?>
<?php
$mhead='requisition';
$phead='req_app_list';
?>
<section class="content-header">
   <h1>Approve Requisition Record</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Requisition</a></li>
      <li class=""><a href="#">Approve Requisition Record</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Requisition List</h3>
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
                     <thead class="text-uppercase">
                        <tr>
                           <th width="30px">SN</th>
                           <th width="30px">Date & Time</th>
                           <th width="60px">Requisition V.No</th>
                           <th width="60px">Requisition For</th>
                           <th width="60px">Staff Name</th>
                           <th width="60px">Status</th>
                           <th width="60px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php
                             $i=1;
                         ?>
                         <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td width="30px"><?php echo e($i++); ?></td>
                           <td width="30px"><?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></td>
                           <td width="60px"><?php echo e($data->code); ?></td>
                           <td width="60px"><?php echo e($data->project->project_id); ?></td>
                           <td width="65px"><?php echo e($data->staff->name); ?></td>
                           <td width="65px"><?php echo e($data->status); ?></td>
                           <td width="60px">
                              <?php 
                               $brid=Auth::User()->brand_id;
                              ?>
                              
                              <?php if($brid==1): ?>
                                  <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-delete-route',$data->code)); ?>"><i class="fa fa-trash"></i></a>
                              <?php endif; ?>
                              <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-view-route',$data->id)); ?>"><i class="fa fa-eye"></i></a>
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
                        <a href="<?php echo e(route('requisition-create-route')); ?>" class="btn btn-flat bg-purple">Add Requisition</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/requisition/requisition_approve_list.blade.php ENDPATH**/ ?>