<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ওয়ারহাউজ ট্রান্সফার ক্রিয়েট <?php else: ?> Warehouse Transfer Create <?php endif; ?></h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ওয়ারহাউজ ট্রান্সফার ক্রিয়েট <?php else: ?> Warehouse Transfer Create <?php endif; ?></a></li>
   </ol>
</section>


<section class="content">
        
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ওয়ারহাউজ ট্রান্সফার ক্রিয়েট <?php else: ?> Warehouse Transfer Create <?php endif; ?></h3>
                    </div>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <div class="box-body">
                        <form action="<?php echo e(route('warehouse-transfer-stock-store')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                         <div class="form-group" >
                                             <label><?php if( Auth::User()->language == 1 ): ?> ওয়ারহাউজের নাম (হতে) <?php else: ?> Warehouse Name(From) <?php endif; ?></label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">FBN</span>
                                                 <select class="form-control select2" name="warehouse_id_from" id="warehouse_id_from" onchange="return find_product()">
                                                 <option value="">-Select-</option> 
                                                 <?php $__currentLoopData = $warehouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label><?php if( Auth::User()->language == 1 ): ?> ওয়ারহাউজের নাম (কাছে) <?php else: ?> Warehouse Name(To) <?php endif; ?></label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">TBN</span>
                                                 <select class="form-control select2" name="warehouse_id_to" id="warehouse_id_to">
                                                 <option value="">-Select-</option> 
                                                 <?php $__currentLoopData = $warehouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                 <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                             </div>
                                         </div> 
                                    </div>  
                                    <center><h4><?php if( Auth::User()->language == 1 ): ?> অথবা <?php else: ?> Or <?php endif; ?></h4></center>
                                    <div class="row">
                                         <div class="form-group" >
                                             <label><?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চের নাম (হতে) <?php else: ?> Branch Name(To) <?php endif; ?></label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">TBN</span>
                                                 <select class="form-control select2" name="branch_id_to" id="branch_id_to">
                                                 <option value="">-Select-</option> 
                                                 <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                 <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্টের নাম <?php else: ?> Product Name <?php endif; ?></label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">PN</span>
                                                 <select class="form-control select2" name="product_id" id="product_id">
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                       <div class="form-group">
                                             <label><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></label>
                                             <div class="form-group">
                                               <div class="input-group">
                                                   <span class="input-group-addon">QT</span>    
                                                   <input type="number" data-minlength="8" name="quantity" class="form-control" id="pass" placeholder="Transfer Quantity" required="">
                                               </div>
                                           </div>
                                      </div>
                                   </div>
                                </div>    
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>    
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_user" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('warehouse-transfer-stock-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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

<script type="text/javascript">
    function find_product() {
        var warehouse_id_from = $('#warehouse_id_from').val();
            $('#product_id').empty();
            $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
            var url = '<?php echo e(route("find_product_for_transfer_warehouse", ":slug")); ?>';
            url = url.replace(':slug', warehouse_id_from);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                     $('#product_id').empty();
                     $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
                    $.each(response.data, function(index, value) {
                        $('#product_id').append('<option value="'+value.product_id+'" selected >'+value.product_name+'</option>');
                        alert(value.product_id);
                    });
                }
            });
        };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/inventory/warehouse_tr_create.blade.php ENDPATH**/ ?>