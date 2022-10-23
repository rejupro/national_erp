<?php $__env->startSection("content"); ?>
<?php
 $mhead='master';
 $phead='currc';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> এড কারেন্সি <?php else: ?> Add Currency <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এড কারেন্সি <?php else: ?> Add Currency <?php endif; ?></a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এড কারেন্সি <?php else: ?> Add Currency <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('currency-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                          <input type="text" name="name" maxlength="25" value="" id="name" class="form-control" placeholder="e.g. Taka" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label><?php if( Auth::User()->language == 1 ): ?> সর্ট <?php else: ?> Sort <?php endif; ?></label>
                                          <input type="text" name="sort" maxlength="3" value="" id="sort" class="form-control" placeholder="e.g. BDT" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label><?php if( Auth::User()->language == 1 ): ?> সিম্বল <?php else: ?> Symbol <?php endif; ?></label>
                                          <input type="text" name="symbol" maxlength="11" value="" id="symbol" class="form-control" placeholder="e.g. ৳" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label><?php if( Auth::User()->language == 1 ): ?> এক্সচেঞ্জ রেট <?php else: ?> Exchange Rate <?php endif; ?></label>
                                          <input type="text" name="x_rate" maxlength="6" value="" id="exrate" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 1" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group" >
                                          <label><?php if( Auth::User()->language == 1 ): ?> ডিফল্ট <?php else: ?> Default <?php endif; ?></label>
                                          <select class="form-control" name="default" id="status">
                                             <option value="0">No</option>
                                             <option value="1">Yes</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_curency" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('currency-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/master/currencycreate.blade.php ENDPATH**/ ?>