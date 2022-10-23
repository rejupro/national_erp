<?php $__env->startSection("content"); ?>
<?php
$mhead='master';
$phead='sizec';
?>
<section class="content-header">
   <h1>Add Brand</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Master Process</a></li>
      <li class=""><a href="<?php echo e(route('brand-create-route')); ?>">Add Brand</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add New Size</h3>
            </div>
            <div class="box-body">
               <form action="<?php echo e(route('size-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="formId_037548942576347671623005240976">
                  <?php echo csrf_field(); ?>
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
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Size Name</label>
                                 <input type="text" name="name" maxlength="35" value="" id="pname" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Size Name">
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                              </div>
                           </div>
                           <div class="col-md-3"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row" style="margin-top: 15px">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right">
                        <input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"> <a href="<?php echo e(route('size-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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
                     <h3 class="box-title">History </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-history" style="background-color: transparent !important;border: 0px  !important;max-height:400px;min-height: 500px">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/master/sizecreate.blade.php ENDPATH**/ ?>