<?php $__env->startSection("content"); ?>
<?php
$mhead='project';
$phead='prr';
?>
    <section class="content-header">
        <h1>Project Record List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Record List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Project Record</h3>
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
            <thead class="text-uppercase">
                <tr>
                    <th style="width:40px;">SN</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Sub-Group</th>
                    <th>Contact</th>
                    <th>Contractor</th>
                    <th>Status</th>
                    <th style="width:40px; text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="center"><?php echo e($i++); ?></td>
                    <td><a  href="<?php echo e(route('project-details-page',['id' => $data->id])); ?>"><?php echo e($data->project_id); ?></a></td>
                    <td><?php echo e($data->name); ?></td>
                    <td><?php if($data->pgid !=0): ?><?php echo e(data_get($data,'group.name')); ?><?php endif; ?></td>
                    <td><?php if($data->psgid!=0): ?><?php echo e(data_get($data,'subgroup.name')); ?> <?php endif; ?></td>
                    <td><?php echo e($data->cperson); ?></td>
                    <td><?php if($data->coid!=0): ?><?php echo e(data_get($data,'contractor.name')); ?><?php endif; ?></td>
                    <td><?php echo e($data->status); ?></td>
                    <td nowrap="">
                        <a class="btn btn-flat bg-purple" href="<?php echo e(route('project-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('project-view-page',$data->id)); ?>"><i class="fa fa-eye cat-child"></i></a>
                        <a class="btn btn-flat bg-purple" href="<?php echo e(route('project-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>
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
        <a href="<?php echo e(route('project-create-page')); ?>" class="btn btn-flat bg-purple">Add Project</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/manage_project/project_list.blade.php ENDPATH**/ ?>