<?php $__env->startSection("content"); ?>
<?php
 $mhead='master';
 $phead='currl';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> কারেন্সি লিস্ট <?php else: ?> Currency List <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> কারেন্সি লিস্ট <?php else: ?> Currency List <?php endif; ?></a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> কারেন্সি লিস্ট <?php else: ?> Currency List <?php endif; ?></h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> সর্ট <?php else: ?> Sort <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> সিম্বল <?php else: ?> Symbol <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> এক্সচেঞ্জ রেট <?php else: ?> Exchange Rate <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php $i=1; ?>
                         <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="center"><?php echo e($i++); ?></td>
                            <td><?php echo e($currency->name); ?></td>
                            <td><?php echo e($currency->sort); ?></td>
                            <td><?php echo e($currency->symbol); ?></td>
                            <td><?php echo e($currency->x_rate); ?></td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="<?php echo e(route('currency-edit-route',['id'=>$currency->id])); ?>" ><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="<?php echo e(route('currency-edit-route',['id'=>$currency->id])); ?>" ><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('currency-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড কারেন্সি <?php else: ?> Add Currency <?php endif; ?></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/master/currencylist.blade.php ENDPATH**/ ?>