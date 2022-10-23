<?php $__env->startSection("content"); ?>
<?php
 $mhead='lcsetup';
 $phead='lcsetupc';
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
<section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> এড এলসি ইনফরমেশন <?php else: ?> Add LC Information <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এড এলসি ইনফরমেশন <?php else: ?> Add LC Information <?php endif; ?></a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এড এলসি ইনফরমেশন <?php else: ?> Add LC Information <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('lc-setup.insert')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label><?php if( Auth::User()->language == 1 ): ?> এলসি নাঃ <?php else: ?> LC No <?php endif; ?></label>
                                      <input type="text" name="lc_no" maxlength="45" value="<?php echo e($lc_track); ?>" placeholder="LC-000001" id="lc_no" class="form-control"/>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label><?php if( Auth::User()->language == 1 ): ?> শিপমেন্ট ডেট <?php else: ?> Shipment Date <?php endif; ?></label>
                                      <input type="date" name="ship_date"  value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" id="ship_date" class="form-control"/>
                                  </div>
                              </div>
                            </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> পিআই কোড <?php else: ?> PI Code <?php endif; ?></label>
                                    <select class="form-control" name="pi_code" id="pi_code">
                                        <option selected>Choose Please.....</option>
                                        <?php $__currentLoopData = $pi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($pis->pi_code); ?>"><?php echo e($pis->pi_code); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> এক্সপায়রি ডেট <?php else: ?> Expiry Date <?php endif; ?></label>
                                    <input type="date" name="exp_date"  value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" id="exp_date" class="form-control"/>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার নেম <?php else: ?> Supplier Name <?php endif; ?></label>
                                        <input type="text" name="s_name"  value="" id="s_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> লোকান ব্যাংক <?php else: ?> Local Bank <?php endif; ?></label>
                                        <select class="form-control" name="local_bank" id="local_bank">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($banks->id); ?>"><?php echo e($banks->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> বায়ার নেম <?php else: ?> Buyer name <?php endif; ?></label>
                                        <input type="text" name="b_name"  value="" id="b_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> সুবিধাভোগী ব্যাংক <?php else: ?> Beneficiary Bank <?php endif; ?></label>
                                        <select class="form-control" name="bene_bank" id="bene_bank">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($banks->id); ?>"><?php echo e($banks->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> টোটাল এমাউন্ট <?php else: ?> Total Amount <?php endif; ?></label>
                                        <input type="text" name="t_amount" maxlength="45" value="" id="t_amount" class="form-control"/>
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
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('list-lc-setup')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?> History  <?php endif; ?></h3>
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

<script>

$('#pi_code').change(function(){
    var id = $(this).val();
    var url = '<?php echo e(route("getDetails", ":id")); ?>';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#t_amount').val(response.extra1);
                $('#s_name').val(response.supplier.name);
                $('#b_name').val(response.buyer.name);
            }
        }
    });
});


</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/lc_setup/lc_setup.blade.php ENDPATH**/ ?>