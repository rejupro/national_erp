<?php $__env->startSection("content"); ?>
    <section class="content-header">
    <h1>Brand List</h1>
    <ol class="breadcrumb">
    <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="mas_brandlist.php">Master Process</a></li>
    <li class=""><a href="#">Brand List</a></li>
    </ol>
    </section>
<section class="content">


    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Edit Brand</h3>
    </div>
    <div class="box-body">
    <form action="<?php echo e(route('brand-update-route',$brand->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
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
    <label>Brand Name</label>
    <input type="text" name="name" maxlength="35" value="<?php echo e($brand->name); ?>" id="pname" class="form-control" placeholder="Brand Name"  />
    <input type="hidden" maxlength="11" value="" class="form-control" name="bid" autocomplete="off" readonly>
    </div>
    <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" maxlength="250" rows="6" name="description" value="" placeholder="Description"><?php echo e($brand->description); ?></textarea>
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
    <input type="submit" name="update_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="<?php echo e(route('brand-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/master/brandedit.blade.php ENDPATH**/ ?>