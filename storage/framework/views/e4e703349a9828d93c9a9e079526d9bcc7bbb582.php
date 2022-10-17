<?php $__env->startSection("content"); ?>
    <?php
    $mhead='urole';
    $phead='rolec';
    ?>
    <section class="content-header">
        <h1>Role Create</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?php echo e(route('role-list-page')); ?>">User & Role</a></li>
            <li class=""><a href="<?php echo e(route('role-create-page')); ?>">Role Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assign New Role</h3>
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
                        

                        <form action="<?php echo e(route('role-store-page')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 popup_details_div">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label>User name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">N</span>
                                                <select class="form-control select2" name="id" id="uid">
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group" >
                                                <label>Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">De-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Module Access</label>
                                                <ul class="list-group">
                                                    <li class="list-groups-item">
                                                        Manage Project
                                                        <div class="material-switch pull-right">
                                                            <input id="project" name="manage_project" value="manage_project" type="checkbox" class="access" checked="">
                                                            <label for="project" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Daily Process
                                                        <div class="material-switch pull-right">
                                                            <input id="daily" name="daily_process" value="daily_process" type="checkbox" class="access" checked="">
                                                            <label for="daily" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Requisition Record
                                                        <div class="material-switch pull-right">
                                                            <input id="requisition_record" name="requisition_record" value="requisition_record" type="checkbox" class="access" checked="">
                                                            <label for="requisition_record" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Requisition Create
                                                        <div class="material-switch pull-right">
                                                            <input id="requisition_create" name="requisition_create" value="requisition_create" type="checkbox" class="access" checked="">
                                                            <label for="requisition_create" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Purchase
                                                        <div class="material-switch pull-right">
                                                            <input id="purchase" value="purchase" name="purchase" type="checkbox" class="access" checked="">
                                                            <label for="purchase" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Material Use & Sales
                                                        <div class="material-switch pull-right">
                                                            <input id="material_use" value="material_use" name="material_use" type="checkbox" class="access" checked="">
                                                            <label for="material_use" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Inventory
                                                        <div class="material-switch pull-right">
                                                            <input id="inventory" value="inventory" name="inventory" type="checkbox" class="access" checked="">
                                                            <label for="inventory" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Client Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="client" type="checkbox" value="client" name="client" class="access" checked="">
                                                            <label for="client" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Product Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="product" name="product" value="product" type="checkbox" class="access" checked="">
                                                            <label for="product" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Master Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="master" value="master" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Installment & Loan Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="loan" value="loan" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Accounts Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="account" name="account" value="account" type="checkbox" class="access" checked="">
                                                            <label for="account" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        LC Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="lc" value="lc" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Financials
                                                        <div class="material-switch pull-right">
                                                            <input id="financial" name="financial" value="financial" type="checkbox" class="access" checked="">
                                                            <label for="financial" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Payroll
                                                        <div class="material-switch pull-right">
                                                            <input id="payroll" name="payroll" value="payroll" type="checkbox" class="access" checked="">
                                                            <label for="payroll" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Bank
                                                        <div class="material-switch pull-right">
                                                            <input id="bank" name="bank" value="bank" type="checkbox" class="access" checked="">
                                                            <label for="bank" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        User &amp; Role
                                                        <div class="material-switch pull-right">
                                                            <input id="user" name="user_role" value="user_role" type="checkbox" class="access" checked="">
                                                            <label for="user_role" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Report
                                                        <div class="material-switch pull-right">
                                                            <input id="report" name="report" value="report" type="checkbox" class="access" checked="">
                                                            <label for="report" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Personal
                                                        <div class="material-switch pull-right">
                                                            <input id="personal" name="personal" value="personal" type="checkbox" class="access" checked="">
                                                            <label for="personal" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Company Settings
                                                        <div class="material-switch pull-right">
                                                            <input id="company" name="company" value="company" type="checkbox" class="access" checked="">
                                                            <label for="company" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>

                                <div class="row" id="edaily">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>

                                <div class="row" id="ebank">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                    <input type="submit" name="role_setting" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="<?php echo e(route('role-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </section>
    <!-- /.main content -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/user_role/role_create.blade.php ENDPATH**/ ?>