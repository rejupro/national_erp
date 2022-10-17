<?php $__env->startSection("content"); ?>
<?php
 $mhead='client';
 $phead='sc';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার ক্রিয়েট <?php else: ?> Supplier Create <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার ক্রিয়েট <?php else: ?> Supplier Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার ক্রিয়েট <?php else: ?> Supplier Create <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('supplier-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                    <select class="form-control" name="status" id="status">
                                       <option value="1">Acive</option>
                                       <option value="0">De-Acive</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></label>
                                    <input type="text" name="code" maxlength="15" value="<?php echo e($sup_track); ?>" id="code" class="form-control" placeholder="e.g. ABA/SU/001" readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট নেম <?php else: ?> Contact Name <?php endif; ?></label>
                                    <input type="text" name="c_name" maxlength="45" value="" id="cperson" class="form-control" placeholder="e.g. Md.Rahman Sumon(CEO)"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট নাম্বার <?php else: ?> Contact Number <?php endif; ?></label>
                                    <input type="text" name="c_num" maxlength="18" value="" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট ফোন <?php else: ?> Contact Phone <?php endif; ?></label>
                                    <input type="text" name="c_phone" maxlength="14" value="" id="cphone" class="form-control" placeholder="e.g. +88-02-721xxx1"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট আন্ডার <?php else: ?> Select Under <?php endif; ?></label>
                                    <select class="form-control select2" name="under_id" id="orsupid">
                                       <option value="">-Select-</option>
                                       <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($zone->id); ?>"><?php echo e($zone->zone); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                      <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কন্টাক্ট ইমেইল <?php else: ?> Contact Email <?php endif; ?></label>
                               <input type="text" name="c_email" maxlength="45" value="" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> ক্রেডিট লিমিট <?php else: ?> Credit Limit <?php endif; ?></label>
                                    <input type="text" name="credit_limit" maxlength="12" value="0" id="climit" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 350000.00"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> সিলেক্ট গ্রুপ <?php else: ?> Select Group <?php endif; ?></label>
                                    <select class="form-control select2" name="cgrp_id" id="scgid">
                                       <option value="">-Select-</option>
                                       <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> র‍্যানকিং <?php else: ?> Ranking <?php endif; ?></label>
                                    <input type="text" name="ranking" maxlength="3" value="0" id="rank" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 127"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address  <?php endif; ?></label>
                                    <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Office Address"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> ফ্যাক্টরি এড্রেস <?php else: ?> Factory Address <?php endif; ?></label>
                                    <textarea class="form-control" name="f_address" id="faddress" maxlength="200" rows="4" placeholder="Factory Address"></textarea>
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
                        <input type="submit" name="save_suplier" id="submit" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('supplier-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/client_setup/supplier_create.blade.php ENDPATH**/ ?>