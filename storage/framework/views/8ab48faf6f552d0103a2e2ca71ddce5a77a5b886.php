<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1>Edit Color</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_mancreate.php">Master Process</a></li>
      <li class=""><a href="#">Edit Color</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Color</h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('color-update-route',$color->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" maxlength="25" value="<?php echo e($color->name); ?>" id="name" class="form-control" placeholder="e.g. Green"  />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label>Color</label>
                                          <br>
                                          <input type="text" class="basic" id="basic" data-preferred-format="hex" value="<?php echo e($color->color); ?>" data-fouc />
                                          
                                       </div>
                                    </div>
                                 </div>
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
                        <input type="submit" name="save_color" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="<?php echo e(route('color-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/master/coloredit.blade.php ENDPATH**/ ?>