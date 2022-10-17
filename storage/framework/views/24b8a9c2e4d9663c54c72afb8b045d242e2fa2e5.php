<?php $__env->startSection("content"); ?>
<?php
$mhead='requisition';
$phead='req_pen_list';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> পেন্ডিং রিকুইজিশন রেকর্ড <?php else: ?> Pending Requisition Record <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> পেন্ডিং রিকুইজিশন রেকর্ড <?php else: ?> Pending Requisition Record <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> পেন্ডিং রিকুইজিশন লিস্ট <?php else: ?> Pending Requisition List  <?php endif; ?></h3>
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
                        <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> তারিখ ও সময় <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ভাউচার নাঃ <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ফর <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Name <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
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
                           <td width="65px"> <a href="<?php echo e(route('requisition-statusapprove-route',$data->id)); ?>" class="btn btn-flat bg-purple">Approve</a><a href="<?php echo e(route('requisition-statuscancel-route',$data->id)); ?>" class="btn btn-flat bg-red">Cancel</a></td>
                           <td width="60px">
                              <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-edit-route',$data->code)); ?>"><i class="fa fa-edit"></i></a>
                              <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-delete-route',$data->code)); ?>"><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('requisition-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড রিকুইজিশন <?php else: ?> Add Requisition <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/requisition/requisition_pending_list.blade.php ENDPATH**/ ?>