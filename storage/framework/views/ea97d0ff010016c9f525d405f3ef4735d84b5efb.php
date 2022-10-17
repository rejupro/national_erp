<?php $__env->startSection("content"); ?>
<?php
 $mhead='loan';
 $phead='loancreate';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> লন ক্রিয়েট <?php else: ?> Loan Create <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> লন ক্রিয়েট <?php else: ?> Loan Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> লন ক্রিয়েট <?php else: ?> Loan Create <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('loan-store-route')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. "/>
                                 </div>
                              </div>
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></label>
                                    <input type="text" name="code" maxlength="15" value="<?php echo e($loan_track); ?>" id="code" class="form-control" readonly />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                   <label><?php if( Auth::User()->language == 1 ): ?> টাইপ <?php else: ?> Type <?php endif; ?></label>
                                   <select class="form-control" name="type" id="type">
                                      <option value="">Select One</option>
                                      <option value="Person">Person</option>
                                      <option value="Bank">Bank</option>
                                      <option value="Inter Company">Inter Company</option>
                                   </select>
                                </div>
                             </div>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label><?php if( Auth::User()->language == 1 ): ?> নাম্বার <?php else: ?> Number <?php endif; ?></label>
                                  <input type="text" name="mobile" maxlength="11" value="" id="mobile" class="form-control" placeholder="e.g.017XXXXXXXXXX"/>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                  <label><?php if( Auth::User()->language == 1 ): ?> একাউন্ট নাঃ <?php else: ?> Account No <?php endif; ?></label>
                                  <input type="text" name="acc_no" maxlength="16" value="" id="acc_no" class="form-control" placeholder="e.g. 142545554444" />
                               </div>
                            </div>
                         </div>
                           
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?></label>
                                   <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Address"></textarea>
                                </div>
                             </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
                                    <textarea class="form-control" name="description" id="description" maxlength="200" rows="4" placeholder="Description"></textarea>
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
                        <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('loan-list-route')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/loan/loan_create.blade.php ENDPATH**/ ?>