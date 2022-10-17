<?php $__env->startSection("content"); ?>
<?php
 $mhead='account';
 $phead='payl';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট রেকর্ড <?php else: ?> Payment Record <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট রেকর্ড <?php else: ?> Payment Record <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট রেকর্ড <?php else: ?> Payment Record <?php endif; ?></h3>
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
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ভাউচার নাঃ <?php else: ?> Voucher No: <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট নাঃ <?php else: ?> Project No: <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> এমাউন্ট <?php else: ?> Amount <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php
                             $i=1;
                         ?>
                         <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td class="center"><?php echo e($i++); ?></td>
                           <td><?php echo e(date('d-m-Y', strtotime($result->date))); ?></td>
                           <td><?php echo e($result->voucher_no); ?></td>
                           <?php if($result->project !=null): ?>
                           <td><?php echo e($result->project->project_id); ?></td>
                           <?php else: ?> 
                           <td></td>
                           <?php endif; ?>
                           <td style="text-align:right;"><?php echo number_format("$result->amount",2) ?></td>
                           <td><?php echo e($result->note); ?></td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('paymentvoucher-view-route',['id'=>$result->voucher_no])); ?>" id=""><i class="fa fa-eye cat-child"></i></a>
                              <!--<a class="btn btn-flat bg-purple" href="#"><i class="fa fa-edit"></i></a>-->
                              <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('paymentvoucher-destroy-route',['id'=>$result->voucher_no])); ?>"><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('paymentvouchar-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট পেইমেন্ট <?php else: ?> Create Payment <?php endif; ?></a>
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
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?> History <?php endif; ?> </h3>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/accounts/pay_voucher_list.blade.php ENDPATH**/ ?>