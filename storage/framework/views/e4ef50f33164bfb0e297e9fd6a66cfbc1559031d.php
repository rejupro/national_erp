
<?php $__env->startSection("content"); ?>
<?php
 $mhead='slrptlst';
 $phead='slsrprtlst';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ডেইলি সেলস রিপোর্ট <?php else: ?> Daily Sales Report <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ডেইলি সেলস রিপোর্ট <?php else: ?> Daily Sales Report <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ডেইলি সেলস রিপোর্ট <?php else: ?> Daily Sales Report <?php endif; ?></h3>
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
                           <th><?php if( Auth::User()->language == 1 ): ?> কোম্পানি নাম <?php else: ?> Company Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> কোনট্রাক্ট পারসন <?php else: ?> Contract Person <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> কোনট্রাক্ট নাঃ <?php else: ?> Contract No. <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ভিজিটিং ডেট <?php else: ?> Visiting Date <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                       <?php $i=1; ?>
                     <tbody>
                        <?php $__currentLoopData = $report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                           	<td class="center"><?php echo e($i++); ?></td>
	                           	<td class="center"><?php echo e($data->company_name); ?></td>
	                           	<td class="center"><?php echo e($data->contract_name); ?></td>
	                           	<td class="center"><?php echo e($data->contract_designation); ?></td>
	                           	<td class="center"><?php echo e($data->contract_mobile); ?></td>
	                           	<td class="center"><?php echo e($data->contract_address); ?></td>
	                           	<td class="center"><?php echo e(date('d-m-Y', strtotime($data->contract_date))); ?></td>
	                           	<td class="center">
	                           		<a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('daily-sales-view-page',$data->id)); ?>" data-toggle="modal" data-target="#flipFlop"><i class="fa fa-eye cat-child"></i></a>
	                           		<a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('daily-sales-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i></a>
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
                        <a href="<?php echo e(route('daily-sales-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড ডেইলি সেলস রিপোর্ট <?php else: ?> Add Daily Sales Report <?php endif; ?></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->

<!-- The modal -->
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/daily_sale_records/daily_sale_records_list.blade.php ENDPATH**/ ?>