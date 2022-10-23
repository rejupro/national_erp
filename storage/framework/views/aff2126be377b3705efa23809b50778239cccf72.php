	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Project Sub-Group Edit</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Sub-Group Edit</a></li>
        </ol>
    </section>
     <!-- Main content -->
     <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Sub-Group</h3>
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
        <form action="<?php echo e(route('edit-prosubgroup-update',$subgroup->id)); ?>"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">
            
                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">    
                                    <div class="form-group">
                                       
                                        <label>Sub-Group Name</label>
                                        <input type="text" name="name" maxlength="45" value="<?php echo e($subgroup->name); ?>" id="name" class="form-control" placeholder="e. g. LGED" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Group Code</label>
                                        <input type="text" name="code" maxlength="6" value="<?php echo e($subgroup->code); ?>" class="form-control" placeholder="e.g 101020"  />
                                    </div>    
                                </div>
                            </div>    
                            <div class="form-group">
                                <label>Select Group</label>
                                <select class="form-control select2" name="pgid" id="pgid">
                                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($groups->id); ?>" <?php echo ($subgroup->pgid == $groups->id ? "selected" : ""); ?>><?php echo e($groups->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>    
                            </div>    
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" maxlength="250" rows="6" value="" name="description" placeholder="Description"><?php echo e($subgroup->description); ?></textarea>
                            </div>   
                        </div>    
                        <div class="col-md-3"></div>    
                    </div>    
                </div>    
                
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 nopadding widgets_area"></div>    
            <div class="row"style="margin-top: 15px" >
                <div class="col-md-8"></div>
                <div class="col-md-4 text-right" >
                <input type="submit" name="save_subgroup" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="<?php echo e(route('prosubgroup-list-create')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/manage_project/project_subgroup_edit.blade.php ENDPATH**/ ?>