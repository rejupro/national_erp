<?php $__env->startSection("content"); ?>
<?php
 $mhead='product';
 $phead='scatc';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি ক্রিয়েট <?php else: ?> Sub-Category Create <?php endif; ?></h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি ক্রিয়েট <?php else: ?> Sub-Category Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি ক্রিয়েট <?php else: ?> Sub-Category Create <?php endif; ?></h3>
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
               <form action="<?php echo e(route('subcategory-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি নেম <?php else: ?> Sub-Category Name <?php endif; ?></label>
                                 <input type="text" name="name" maxlength="45" value="" id="sname" class="form-control" placeholder="Sub-Category Name" />
                              </div>
                              <div class="form-group">
                                 <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট ক্যাটেগরি <?php else: ?> Select Category <?php endif; ?></label>
                                 <select class="form-control select2" name="cat_id" id="cat_id">
                                    <option value="">-Select-</option>
                                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                              </div>
                           </div>
                           <div class="col-md-3"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_subcategory" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('subcategory-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/productsetup/product_subcategory_create.blade.php ENDPATH**/ ?>