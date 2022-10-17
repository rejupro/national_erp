<?php $__env->startSection("content"); ?>
<?php
 $mhead='client';
 $phead='ccustomer';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ক্লায়েন্ট/ডিপার্টমেন্ট ক্রিয়েট <?php else: ?> Client/Department Create <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ক্লায়েন্ট/ডিপার্টমেন্ট ক্রিয়েট <?php else: ?> Client/Department Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এড নিউ ক্লায়েন্ট/ডিপার্টমেন্ট  <?php else: ?> Add New Client/Department <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('customer-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman" required/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                    <select class="form-control" name="status" id="status" required>
                                       <option value="1">Acive</option>
                                       <option value="0">De-Acive</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></label>
                                    <input type="text" name="code" value="<?php echo e($cus_track); ?>"  class="form-control"  readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট নেম <?php else: ?> Contact Name <?php endif; ?></label>
                                    <input type="text" name="c_name" maxlength="45" value="" id="cperson" class="form-control" placeholder="e.g. Md.Rahman Sumon(CEO)"/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট নাম্বার <?php else: ?> Contact Number <?php endif; ?></label>
                                    <input type="text" name="c_num" maxlength="18" value="" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70" required/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট ইমেইল <?php else: ?> Contact Email <?php endif; ?></label>
                                    <input type="text" name="c_email" maxlength="45" value="" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                              
                           </div>
                           
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?></label>
                                    <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Address" required></textarea>
                                 </div>
                              </div>
                              
                           </div>
                           
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_customer" id="submit" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('customer-list')); ?>" class="btn btn-flat bg-gray"><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
   </div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/client_setup/customer_create.blade.php ENDPATH**/ ?>