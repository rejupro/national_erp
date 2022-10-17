<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার ইডিট <?php else: ?> Manufacturer Edit <?php endif; ?></h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার ইডিট <?php else: ?> Manufacturer Edit <?php endif; ?></a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার ইডিট <?php else: ?> Manufacturer Edit <?php endif; ?></h3>
            </div>
            <div class="box-body">
               <form action="<?php echo e(route('manufacture-update-route',$manufacture->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                  <div class="col-md-12 popup_details_div">
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার নেম <?php else: ?> Manufacturer Name <?php endif; ?></label>
                                       <input type="text" name="manufacture_name" maxlength="45" value="<?php echo e($manufacture->manufacture_name); ?>" id="name" class="form-control" placeholder="e.g. Sun Sui Hong"/>
                                       <input type="hidden" maxlength="11" value="" class="form-control" name="mid" autocomplete="off" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট পারসন <?php else: ?> Contact Person <?php endif; ?></label>
                                       <input type="text" name="c_person" maxlength="45" value="<?php echo e($manufacture->c_person); ?>" id="cperson" class="form-control" placeholder="e.g. Mr.Sumon"  />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট মোবাইল <?php else: ?> Contact Mobile <?php endif; ?></label>
                                       <input type="text" name="c_mobile" maxlength="18" value="<?php echo e($manufacture->c_mobile); ?>" id="cmobile" class="form-control" placeholder="e.g. 016161xxxx0"/>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট ইমেইল <?php else: ?> Contact Email <?php endif; ?></label>
                                       <input type="text" name="c_email" maxlength="45" value="<?php echo e($manufacture->c_email); ?>" id="email" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?></label>
                                       <textarea class="form-control" maxlength="150" rows="5" name="address" id="address" placeholder="e.g. Address"><?php echo e($manufacture->address); ?></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> মেইন প্রোডাক্ট <?php else: ?> Main Product <?php endif; ?></label>
                                       <textarea class="form-control" maxlength="250" rows="5" name="main_product" id="mainpro" placeholder="Comma ',' use for multiple item e.g. Puma,Adidas etc."><?php echo e($manufacture->main_product); ?></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
                                       <textarea class="form-control" maxlength="250" rows="5" name="description" placeholder="Description"><?php echo e($manufacture->description); ?></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ওয়েব <?php else: ?> Web <?php endif; ?></label>
                                       <input type="text" name="web" maxlength="45" value="<?php echo e($manufacture->web); ?>" id="web" class="form-control" placeholder="e.g. http://www.axesgl.com"/>
                                    </div>
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> র‍্যাংক <?php else: ?> Rank <?php endif; ?></label>
                                       <input type="text" name="rank" maxlength="3" value="<?php echo e($manufacture->rank); ?>" id="rank" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 127"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="update_manfa" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> আপডেট <?php else: ?> Update <?php endif; ?>"/> <a href="<?php echo e(route('manufacture-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/master/manufactureredit.blade.php ENDPATH**/ ?>