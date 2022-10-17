<?php $__env->startSection("content"); ?>
<?php
 $mhead='urole';
 $phead='alluser';
?>
    <section class="content-header">
        <h1>User List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="mas_brandcreate.php">User & Role</a></li>
        <li class=""><a href="#">User List</a></li>
        </ol>
    </section>
   <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">User List</h3>
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
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">SN</th>
    <th>Name</th>
    <th>Email</th>
    <th>Access</th>
    <th>Status</th>
    <th style="width:40px; text-align:center;">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td class="center"><?php echo e($i++); ?></td>
    <td><?php echo e($data->name); ?></td>
    <td><?php echo e($data->email); ?></td>
    <td><?php echo e($data->role); ?></td>
    <td><?php if($data->status==1): ?> Active <?php else: ?> Deactive <?php endif; ?></td>
    <td nowrap="">
    
    <!--<a class="btn btn-flat bg-purple chpass" ><i class="fa fa-key"></i></a>-->
    
    
    <a class="btn btn-flat bg-purple" href="<?php echo e(route('user-delete-page',$data->id)); ?>" ><i class="fa fa-trash"></i></a>

    </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>
    </div>
    <div class="clearfix" ></div>
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-12 table-responsive">
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <a href="<?php echo e(route('user-create-page')); ?>" class="btn btn-flat bg-purple">Create User</a>
    </div>
    </div>
    </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\newfalconsolutions\resources\views/main/admin/user_role/user_list.blade.php ENDPATH**/ ?>