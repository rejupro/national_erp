<?php $__env->startSection("content"); ?>
<?php
 $mhead='loan';
 $phead='loaninvcreate';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> লন ইনভয়েস ক্রিয়েট <?php else: ?> Loan Invoice Create <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> লন ইনভয়েস ক্রিয়েট <?php else: ?> Loan Invoice Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> লন ইনভয়েস ক্রিয়েট <?php else: ?> Loan Invoice Create <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('loaninvoice-store-route')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> লন আইডি <?php else: ?> Loan ID <?php endif; ?></label>
                                    <select class="form-control" name="loan_id" id="loan_id">
                                        <option selected>Choose Please.....</option>
                                        <?php $__currentLoopData = $loanid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($loanids->code); ?>"><?php echo e($loanids->code); ?> <?php echo e($loanids->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                 </div>
                              </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label><?php if( Auth::User()->language == 1 ): ?> ইনভয়েস নাঃ <?php else: ?> Invoice No <?php endif; ?></label>
                                      <input type="text" name="inv_no" maxlength="45" value="<?php echo e($loaninv_track); ?>"  id="inv_no" class="form-control"/>
                                   </div>
                                </div>
                            </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                     <label><?php if( Auth::User()->language == 1 ): ?> লন এমাউন্ট <?php else: ?> Loan Amount <?php endif; ?></label>
                                     <input type="text" name="amount"  value="" id="amount"  onchange="count_grand_total()"  class="form-control"/>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> প্রফিট এমাউন্ট <?php else: ?> Profit Amount <?php endif; ?></label>
                                    <input type="text" name="profit_amount"  value="" id="profit_amount" value="0" onchange="count_grand_total()" class="form-control" placeholder="2000"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> প্রফিট % <?php else: ?> Profit % <?php endif; ?></label>
                                    <input type="text" name="profit_per"  value="" id="profit_per" value="0" onchange="count_grand_total()"  class="form-control" placeholder="10%"/>
                                 </div>
                              </div>
                           </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল <?php else: ?> Total <?php endif; ?></label>
                                        <input type="text" name="total"  value="" id="total" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                     <label><?php if( Auth::User()->language == 1 ): ?> ইন্সটলমেন্ট <?php else: ?> Installment <?php endif; ?></label>
                                     <input type="text" name="installment"  value="" id="installment" class="form-control"/>
                                 </div>
                             </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                                        <input type="text" name="note"  value="" id="note" class="form-control"/>
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
                        <?php echo csrf_field(); ?>
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('loaninvoice-list-route')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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


<script type="text/javascript">
   function count_grand_total(){
       var amount = $('#amount').val();
       var profit_per = $('#profit_per').val();
       var profit_amount = $('#profit_amount').val();

           if(profit_per>0){
               var with_discount = parseInt(amount) + (parseInt(amount) * parseInt(profit_per)/100);
               $('#profit_amount').hide();
               $('#total').val(with_discount);
               return false;
           }else if(profit_amount >0){
               var with_amount = parseInt(amount) + parseInt(profit_amount);
               $('#profit_per').hide()
               $('#total').val(with_amount);
               return false;
           }else{
               $('#total').val(amount);
               return false;
           }

           return false;
         
   }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/loan/loan_inv_create.blade.php ENDPATH**/ ?>