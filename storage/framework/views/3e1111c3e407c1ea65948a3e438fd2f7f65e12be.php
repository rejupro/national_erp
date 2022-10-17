<?php $__env->startSection("content"); ?>
<?php
 $mhead='urole';
 $phead='alluserc';
?>
    <section class="content-header">
        <h1>User Create</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="mas_brandcreate.php">User & Role</a></li>
        <li class=""><a href="#">User Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">Add New User</h3>
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
                        <form action="<?php echo e(route('user-store-page')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">E</span>
                                                    <input type="email" class="form-control" maxlength="45" name="email" id="email" placeholder="Email" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" >
                                                <label>Name (English)</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">N</span>
                                                    <input type="text" maxlength="255" class="form-control" name="ename" id="ename" placeholder="e. g Sumon" autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">P</span>
                                                            <input type="password" data-minlength="8" name="password" class="form-control" id="pass" placeholder="Password" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                    <label>Confirm Password</label>
                                                        <div class="input-group">
                                                        <span class="input-group-addon">CP</span>
                                                        <input type="password" name="cpassword" class="form-control" id="cpass" placeholder="Confirm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label>Branch</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">BR</span>
                                                    <select class="form-control select2" name="brand_id" id="ibrid">
                                                        <option value="">-Select-</option>
                                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($br->id); ?>"><?php echo e($br->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label>Status</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">ST</span>
                                                    <select class="form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">De-Active</option>
                                                    </select>
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
                                <input type="submit" name="save_user" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="<?php echo e(route('user-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/user_role/user_create.blade.php ENDPATH**/ ?>