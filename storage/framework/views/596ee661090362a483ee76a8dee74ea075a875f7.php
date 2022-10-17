<?php $__env->startSection("content"); ?>
<?php
 $mhead='company';
 $phead='csetup';
?>
<section class="content-header">
   <h1>Company Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Company</a></li>
      <li class=""><a href="#">Company setup</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Update Company</h3>
    </div>
    <div class="box-body">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
     <?php endif; ?>
    <form action="<?php echo e(route('company-edit-store',$data->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <?php echo csrf_field(); ?>
    <div class="col-md-12 popup_details_div">
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="row">
    <div class="col-md-12">
    <div class="form-group" >
    <label>Name (English)</label>
    <div class="input-group">
    <span class="input-group-addon">N</span>
    <input type="text" maxlength="45" class="form-control" name="name" id="name" Value="<?php echo e($data->name); ?>" placeholder="Company Name" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>নাম (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">ন</span>
    <input type="text" maxlength="255" class="form-control" name="bname" id="bname" Value="<?php echo e($data->bname); ?>" placeholder="কম্পানির নাম" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Slogan (English)</label>
    <div class="input-group">
    <span class="input-group-addon">D</span>
    <input type="text" maxlength="75" class="form-control" name="dialog" id="dialog" Value="<?php echo e($data->dialog); ?>" placeholder="Company Dialog" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>স্লোগান (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">D</span>
    <input type="text" maxlength="350" class="form-control" name="bdialog" id="bdialog" Value="<?php echo e($data->bdialog); ?>" placeholder="কম্পানির স্লোগান" autocomplete="off">
    </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Mobile</label>
    <div class="input-group">
    <span class="input-group-addon">MO</span>
    <input type="text" maxlength="18" class="form-control" name="mobile" id="mobile" value="<?php echo e($data->mobile); ?>" onkeypress="return isNumberKey(event)" placeholder="Mobile No:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Phone</label>
    <div class="input-group">
    <span class="input-group-addon">PH</span>
    <input type="text" maxlength="14" class="form-control" name="phone" id="phone" Value="<?php echo e($data->phone); ?>" onkeypress="return isNumberKey(event)" placeholder="Phone No:" autocomplete="off">
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>Fax</label>
    <div class="input-group">
    <span class="input-group-addon">FN</span>
    <input type="text" maxlength="14" class="form-control" name="fax" id="fax" value="<?php echo e($data->fax); ?>" onkeypress="return isNumberKey(event)" placeholder="e. g 72178xx" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>Web</label>
    <div class="input-group">
    <span class="input-group-addon">W</span>
    <input type="web" maxlength="35" class="form-control" name="web" id="web" value="<?php echo e($data->web); ?>"  placeholder="e.g. https://www.bdsoft.org" autocomplete="off">
    </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group" >
    <label>Email</label>
    <div class="input-group">
    <span class="input-group-addon">EM</span>
    <input type="email" maxlength="45" class="form-control" name="email" id="email" value="<?php echo e($data->email); ?>" placeholder="Email Address:" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>TIN</label>
    <div class="input-group">
    <span class="input-group-addon">T</span>
    <input type="text" maxlength="15" class="form-control" name="tin" id="tin" value="<?php echo e($data->tin); ?>" onkeypress="return isNumberKey(event)" placeholder="e. g 10-10-xxxxx" autocomplete="off">
    </div>
    </div>
    <div class="form-group" >
    <label>VAT</label>
    <div class="input-group">
    <span class="input-group-addon">V</span>
    <input type="text" maxlength="15" class="form-control" name="vat" id="vat" value="<?php echo e($data->vat); ?>" onkeypress="return isNumberKey(event)" placeholder="e. g 10-10-xxxxx" autocomplete="off">
    </div>
    </div>
    <div class="form-group">
    <label>Address (English)</label>
    <div class="input-group">
    <span class="input-group-addon">AD</span>
    <textarea class="form-control" name="address" id="address" maxlength="250" rows="5" placeholder="Address" required><?php echo e($data->address); ?></textarea>
    </div>
    </div>
    <div class="form-group">
    <label>ঠিকানা (বাংলা)</label>
    <div class="input-group">
    <span class="input-group-addon">AD</span>
    <textarea class="form-control" name="baddress" id="baddress" maxlength="350" rows="5" placeholder="ঠিকানা"><?php echo e($data->baddress); ?></textarea>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Image</label>
    <div style="width:200px; height:245px;">
    <img src="<?php echo e(asset($data->image)); ?>" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <br>
    <input type="file" class="btn btn-flat bg-purple btn-sm" name="image" value="<?php echo e($data->image); ?>" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-1"></div>
    </div>

    </div>
    <div class="clearfix" ></div>
    <div class="col-md-12 nopadding widgets_area"></div>
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-8 ">
    </div>
    <div class="col-md-4 text-right" >
    <input type="submit" name="upd_com" id="submit" class="btn btn-flat bg-purple btn-sm" value="Update"/>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/company/company_setting.blade.php ENDPATH**/ ?>