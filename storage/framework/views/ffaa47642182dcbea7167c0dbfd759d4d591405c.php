<?php $__env->startSection("content"); ?>
    <?php
    $mhead='urole';
    $phead='rolec';
    ?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> রোল ক্রিয়েট <?php else: ?> Role Create <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রোল ক্রিয়েট <?php else: ?> Role Create <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এসাইন নিউ রোল <?php else: ?> Assign New Role <?php endif; ?></h3>
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
                                        <div class="col-md-12">
                                            <label><?php if( Auth::User()->language == 1 ): ?> ইউজার নেম <?php else: ?> User name <?php endif; ?></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">N</span>
                                                <select class="form-control select2" name="id" id="uid" required>
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($usr->id); ?>"><?php echo e($usr->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group" >
                                                <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">De-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> মডিউল অ্যাক্সেস <?php else: ?> Module Access <?php endif; ?></label>
                    <!-- Menu Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-groups-item project">
                                    Manage Project
                                    <div class="material-switch pull-right">
                                        <input id="project" name="manage_project" value="manage_project" type="checkbox" class="access" checked="">
                                        <label for="project" class="label-success"></label>
                                    </div>
                                    <!-- Project Subgroup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Project Group
                                            <div class="material-switch pull-right">
                                                <input id="project_group" name="project_group" value="project_group" type="checkbox" class="access under_project" checked="">
                                                <label for="project_group" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Group Create
                                            <div class="material-switch pull-right">
                                                <input id="project_group_create" name="project_group_create" value="project_group_create" type="checkbox" class="access under_project" checked="">
                                                <label for="project_group_create" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Sub Group
                                            <div class="material-switch pull-right">
                                                <input id="project_sub_group" name="project_sub_group" value="project_sub_group" type="checkbox" class="access under_project" checked="">
                                                <label for="project_sub_group" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Sub Group Create
                                            <div class="material-switch pull-right">
                                                <input id="project_sub_group_create" name="project_sub_group_create" value="project_sub_group_create" type="checkbox" class="access under_project" checked="">
                                                <label for="project_sub_group_create" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Type
                                            <div class="material-switch pull-right">
                                                <input id="project_type" name="project_type" value="project_type" type="checkbox" class="access under_project" checked="">
                                                <label for="project_type" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Type Create
                                            <div class="material-switch pull-right">
                                                <input id="project_type_create" name="project_type_create" value="project_type_create" type="checkbox" class="access under_project" checked="">
                                                <label for="project_type_create" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Contractor List
                                            <div class="material-switch pull-right">
                                                <input id="contractor_list" name="contractor_list" value="contractor_list" type="checkbox" class="access under_project" checked="">
                                                <label for="contractor_list" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Add Contractor
                                            <div class="material-switch pull-right">
                                                <input id="add_contractor" name="add_contractor" value="add_contractor" type="checkbox" class="access under_project" checked="">
                                                <label for="add_contractor" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Project Record
                                            <div class="material-switch pull-right">
                                                <input id="project_record" name="project_record" value="project_record" type="checkbox" class="access under_project" checked="">
                                                <label for="project_record" class="label-success"></label>
                                            </div>
                                        </li> 
                                        <li class="list-groups-item">
                                            Add New Project
                                            <div class="material-switch pull-right">
                                                <input id="add_new_project" name="add_new_project" value="add_new_project" type="checkbox" class="access under_project" checked="">
                                                <label for="add_new_project" class="label-success"></label>
                                            </div>
                                        </li> 
                                    </ul>
                                </li>
                                    
                                <li class="list-groups-item daily2">
                                    Daily Process
                                    <div class="material-switch pull-right">
                                        <input id="daily" name="daily_process" value="daily_process" type="checkbox" class="access" checked="">
                                        <label for="daily" class="label-success"></label>
                                    </div>
                                    <!-- Daily Process -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Daily Expense
                                            <div class="material-switch pull-right">
                                                <input id="daily_expense" name="daily_expense" value="daily_expense" type="checkbox" class="access" checked="">
                                                <label for="daily_expense" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Daily Expenses Create
                                            <div class="material-switch pull-right">
                                                <input id="daily_expense_create" name="daily_expense_create" value="daily_expense_create" type="checkbox" class="access" checked="">
                                                <label for="daily_expense_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Expenses Record
                                            <div class="material-switch pull-right">
                                                <input id="expenses_record" name="expenses_record" value="expenses_record" type="checkbox" class="access" checked="">
                                                <label for="expenses_record" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Create Expenses
                                            <div class="material-switch pull-right">
                                                <input id="create_expenses" name="create_expenses" value="create_expenses" type="checkbox" class="access" checked="">
                                                <label for="create_expenses" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Expenses Head
                                            <div class="material-switch pull-right">
                                                <input id="expenses_head" name="expenses_head" value="expenses_head" type="checkbox" class="access" checked="">
                                                <label for="expenses_head" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Expenses Head
                                            <div class="material-switch pull-right">
                                                <input id="add_expenses_head" name="add_expenses_head" value="add_expenses_head" type="checkbox" class="access" checked="">
                                                <label for="add_expenses_head" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Daily Sales Report
                                            <div class="material-switch pull-right">
                                                <input id="daily_sales_report" name="daily_sales_report" value="daily_sales_report" type="checkbox" class="access" checked="">
                                                <label for="daily_sales_report" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Bike Reading Report
                                            <div class="material-switch pull-right">
                                                <input id="bike_reading_report" name="bike_reading_report" value="bike_reading_report" type="checkbox" class="access" checked="">
                                                <label for="bike_reading_report" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-groups-item">
                                    Requisition Record
                                    <div class="material-switch pull-right">
                                        <input id="requisition_record" name="requisition_record" value="requisition_record" type="checkbox" class="access" checked="">
                                        <label for="requisition_record" class="label-success"></label>
                                    </div>
                                    <!-- Requisition -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Requisition Create
                                            <div class="material-switch pull-right">
                                                <input id="requisition_create" name="requisition_create" value="requisition_create" type="checkbox" class="access" checked="">
                                                <label for="requisition_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            All Requisitions
                                            <div class="material-switch pull-right">
                                                <input id="all_requisitions" name="all_requisitions" value="all_requisitions" type="checkbox" class="access" checked="">
                                                <label for="all_requisitions" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Approve Requisitions
                                            <div class="material-switch pull-right">
                                                <input id="approve_requisitions" name="approve_requisitions" value="approve_requisitions" type="checkbox" class="access" checked="">
                                                <label for="approve_requisitions" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Pending Requisitions
                                            <div class="material-switch pull-right">
                                                <input id="pending_requisitions" name="pending_requisitions" value="pending_requisitions" type="checkbox" class="access" checked="">
                                                <label for="pending_requisitions" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Purchase
                                    <div class="material-switch pull-right">
                                        <input id="purchase" value="purchase" name="purchase" type="checkbox" class="access" checked="">
                                        <label for="purchase" class="label-success"></label>
                                    </div>
                                    <!-- Purchase -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Purchase Invoice
                                            <div class="material-switch pull-right">
                                                <input id="purchase_invoice" name="purchase_invoice" value="purchase_invoice" type="checkbox" class="access" checked="">
                                                <label for="purchase_invoice" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Purchase Invoice Create
                                            <div class="material-switch pull-right">
                                                <input id="purchase_invoice_create" name="purchase_invoice_create" value="purchase_invoice_create" type="checkbox" class="access" checked="">
                                                <label for="purchase_invoice_create" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Material Use & Sales
                                    <div class="material-switch pull-right">
                                        <input id="material_use" value="material_use" name="material_use" type="checkbox" class="access" checked="">
                                        <label for="material_use" class="label-success"></label>
                                    </div>
                                    <!-- Material Use -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Create Materials Use-Record
                                            <div class="material-switch pull-right">
                                                <input id="create_material_use_record" name="create_material_use_record" value="create_material_use_record" type="checkbox" class="access" checked="">
                                                <label for="create_material_use_record" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Materials Send For Use
                                            <div class="material-switch pull-right">
                                                <input id="material_send_for_use" name="material_send_for_use" value="material_send_for_use" type="checkbox" class="access" checked="">
                                                <label for="material_send_for_use" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sales Invoice
                                            <div class="material-switch pull-right">
                                                <input id="sales_invoice" name="sales_invoice" value="sales_invoice" type="checkbox" class="access" checked="">
                                                <label for="sales_invoice" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sales Invoice Create
                                            <div class="material-switch pull-right">
                                                <input id="sales_invoice_create" name="sales_invoice_create" value="sales_invoice_create" type="checkbox" class="access" checked="">
                                                <label for="sales_invoice_create" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul> 
                                </li>
                                <li class="list-groups-item">
                                    Inventory
                                    <div class="material-switch pull-right">
                                        <input id="inventory" value="inventory" name="inventory" type="checkbox" class="access" checked="">
                                        <label for="inventory" class="label-success"></label>
                                    </div>
                                    <!-- Inventory -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Product Delivery
                                            <div class="material-switch pull-right">
                                                <input id="product_delivery" name="product_delivery" value="product_delivery" type="checkbox" class="access" checked="">
                                                <label for="product_delivery" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Product Received
                                            <div class="material-switch pull-right">
                                                <input id="product_received" name="product_received" value="product_received" type="checkbox" class="access" checked="">
                                                <label for="product_received" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Branch Stock
                                            <div class="material-switch pull-right">
                                                <input id="branch_stock" name="branch_stock" value="branch_stock" type="checkbox" class="access" checked="">
                                                <label for="branch_stock" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Warehouse Stock
                                            <div class="material-switch pull-right">
                                                <input id="warehouse_stock" name="warehouse_stock" value="warehouse_stock" type="checkbox" class="access" checked="">
                                                <label for="warehouse_stock" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Transfer From Branch
                                            <div class="material-switch pull-right">
                                                <input id="transfer_from_branch" name="transfer_from_branch" value="transfer_from_branch" type="checkbox" class="access" checked="">
                                                <label for="transfer_from_branch" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Transfer From Warehouse
                                            <div class="material-switch pull-right">
                                                <input id="transfer_from_warehouse" name="transfer_from_warehouse" value="transfer_from_warehouse" type="checkbox" class="access" checked="">
                                                <label for="transfer_from_warehouse" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Client Setup
                                    <div class="material-switch pull-right">
                                        <input id="client" type="checkbox" value="client" name="client" class="access" checked="">
                                        <label for="client" class="label-success"></label>
                                    </div>
                                    <!-- Client Department Setup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Client/Department List
                                            <div class="material-switch pull-right">
                                                <input id="client_department_list" name="client_department_list" value="client_department_list" type="checkbox" class="access" checked="">
                                                <label for="client_department_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Client/Department
                                            <div class="material-switch pull-right">
                                                <input id="add_client_department" name="add_client_department" value="add_client_department" type="checkbox" class="access" checked="">
                                                <label for="add_client_department" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Supplier List
                                            <div class="material-switch pull-right">
                                                <input id="supplier_list" name="supplier_list" value="supplier_list" type="checkbox" class="access" checked="">
                                                <label for="supplier_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Supplier
                                            <div class="material-switch pull-right">
                                                <input id="add_supplier" name="add_supplier" value="add_supplier" type="checkbox" class="access" checked="">
                                                <label for="add_supplier" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            All Group
                                            <div class="material-switch pull-right">
                                                <input id="all_group" name="all_group" value="all_group" type="checkbox" class="access" checked="">
                                                <label for="all_group" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Group
                                            <div class="material-switch pull-right">
                                                <input id="add_group" name="add_group" value="add_group" type="checkbox" class="access" checked="">
                                                <label for="add_group" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Product Setup
                                    <div class="material-switch pull-right">
                                        <input id="product" name="product" value="product" type="checkbox" class="access" checked="">
                                        <label for="product" class="label-success"></label>
                                    </div>
                                    <!-- Product Setup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Category List
                                            <div class="material-switch pull-right">
                                                <input id="category_list" name="category_list" value="category_list" type="checkbox" class="access" checked="">
                                                <label for="category_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Category Create
                                            <div class="material-switch pull-right">
                                                <input id="category_create" name="category_create" value="category_create" type="checkbox" class="access" checked="">
                                                <label for="category_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sub-Category List
                                            <div class="material-switch pull-right">
                                                <input id="subcategory_list" name="subcategory_list" value="subcategory_list" type="checkbox" class="access" checked="">
                                                <label for="subcategory_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sub-Category Create
                                            <div class="material-switch pull-right">
                                                <input id="subcategory_create" name="subcategory_create" value="subcategory_create" type="checkbox" class="access" checked="">
                                                <label for="subcategory_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Product List
                                            <div class="material-switch pull-right">
                                                <input id="product_list" name="product_list" value="product_list" type="checkbox" class="access" checked="">
                                                <label for="product_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add New Product
                                            <div class="material-switch pull-right">
                                                <input id="add_new_product" name="add_new_product" value="add_new_product" type="checkbox" class="access" checked="">
                                                <label for="add_new_product" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Master Setup
                                    <div class="material-switch pull-right">
                                        <input id="master" name="master" value="master" type="checkbox" class="access" checked="">
                                        <label for="master" class="label-success"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                
                                <li class="list-groups-item">
                                    Accounts Setup
                                    <div class="material-switch pull-right">
                                        <input id="account" name="account" value="account" type="checkbox" class="access" checked="">
                                        <label for="account" class="label-success"></label>
                                    </div>
                                    <!-- Account Setup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Class
                                            <div class="material-switch pull-right">
                                                <input id="ac_class" name="ac_class" value="ac_class" type="checkbox" class="access" checked="">
                                                <label for="ac_class" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Group List
                                            <div class="material-switch pull-right">
                                                <input id="ac_group_list" name="ac_group_list" value="ac_group_list" type="checkbox" class="access" checked="">
                                                <label for="ac_group_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Group Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_group_create" name="ac_group_create" value="ac_group_create" type="checkbox" class="access" checked="">
                                                <label for="ac_group_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sub-Group List
                                            <div class="material-switch pull-right">
                                                <input id="ac_subgroup_list" name="ac_subgroup_list" value="ac_subgroup_list" type="checkbox" class="access" checked="">
                                                <label for="ac_subgroup_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Sub-Group Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_subgroup_create" name="ac_subgroup_create" value="ac_subgroup_create" type="checkbox" class="access" checked="">
                                                <label for="ac_subgroup_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Ledger List
                                            <div class="material-switch pull-right">
                                                <input id="ac_ledger_list" name="ac_ledger_list" value="ac_ledger_list" type="checkbox" class="access" checked="">
                                                <label for="ac_ledger_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Ledger Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_ledger_create" name="ac_ledger_create" value="ac_ledger_create" type="checkbox" class="access" checked="">
                                                <label for="ac_ledger_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Payment Voucher List
                                            <div class="material-switch pull-right">
                                                <input id="ac_payment_voucherlist" name="ac_payment_voucherlist" value="ac_payment_voucherlist" type="checkbox" class="access" checked="">
                                                <label for="ac_payment_voucherlist" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Payment Voucher Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_payment_vouchercreate" name="ac_payment_vouchercreate" value="ac_payment_vouchercreate" type="checkbox" class="access" checked="">
                                                <label for="ac_payment_vouchercreate" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Receive Voucher List
                                            <div class="material-switch pull-right">
                                                <input id="ac_receive_voucherlist" name="ac_receive_voucherlist" value="ac_receive_voucherlist" type="checkbox" class="access" checked="">
                                                <label for="ac_receive_voucherlist" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Receive Voucher Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_receive_vouchercreate" name="ac_receive_vouchercreate" value="ac_receive_vouchercreate" type="checkbox" class="access" checked="">
                                                <label for="ac_receive_vouchercreate" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Journal Entry List
                                            <div class="material-switch pull-right">
                                                <input id="ac_journal_entrylist" name="ac_journal_entrylist" value="ac_journal_entrylist" type="checkbox" class="access" checked="">
                                                <label for="ac_journal_entrylist" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Journal Entry Create
                                            <div class="material-switch pull-right">
                                                <input id="ac_journal_entrycreate" name="ac_journal_entrycreate" value="ac_journal_entrycreate" type="checkbox" class="access" checked="">
                                                <label for="ac_journal_entrycreate" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Installment & Loan Setup
                                    <div class="material-switch pull-right">
                                        <input id="loan" name="loan" value="loan" type="checkbox" class="access" checked="">
                                        <label for="loan" class="label-success"></label>
                                    </div>
                                    <!-- Installment & Loan Setup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Loan Id List
                                            <div class="material-switch pull-right">
                                                <input id="loan_id_list" name="loan_id_list" value="loan_id_list" type="checkbox" class="access" checked="">
                                                <label for="loan_id_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Loan Id Create
                                            <div class="material-switch pull-right">
                                                <input id="loan_id_create" name="loan_id_create" value="loan_id_create" type="checkbox" class="access" checked="">
                                                <label for="loan_id_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Loan Invoice List
                                            <div class="material-switch pull-right">
                                                <input id="loan_invoice_list" name="loan_invoice_list" value="loan_invoice_list" type="checkbox" class="access" checked="">
                                                <label for="loan_invoice_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Loan Invoice Create
                                            <div class="material-switch pull-right">
                                                <input id="loan_invoice_create" name="loan_invoice_create" value="loan_invoice_create" type="checkbox" class="access" checked="">
                                                <label for="loan_invoice_create" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Loan Payment
                                            <div class="material-switch pull-right">
                                                <input id="loan_payment" name="loan_payment" value="loan_payment" type="checkbox" class="access" checked="">
                                                <label for="loan_payment" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Loan Receive
                                            <div class="material-switch pull-right">
                                                <input id="loan_receive" name="loan_receive" value="loan_receive" type="checkbox" class="access" checked="">
                                                <label for="loan_receive" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    LC Setup
                                    <div class="material-switch pull-right">
                                        <input id="lc" name="lc" value="lc" type="checkbox" class="access" checked="">
                                        <label for="lc" class="label-success"></label>
                                    </div>
                                    <!-- LC Setup -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            PI List
                                            <div class="material-switch pull-right">
                                                <input id="pi_list" name="pi_list" value="pi_list" type="checkbox" class="access" checked="">
                                                <label for="pi_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            PI Setup
                                            <div class="material-switch pull-right">
                                                <input id="pi_setup" name="pi_setup" value="pi_setup" type="checkbox" class="access" checked="">
                                                <label for="pi_setup" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            LC List
                                            <div class="material-switch pull-right">
                                                <input id="lc_list" name="lc_list" value="lc_list" type="checkbox" class="access" checked="">
                                                <label for="lc_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            LC Setup
                                            <div class="material-switch pull-right">
                                                <input id="lc_setup" name="lc_setup" value="lc_setup" type="checkbox" class="access" checked="">
                                                <label for="lc_setup" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <!-- <li class="list-groups-item">
                                    Financials
                                    <div class="material-switch pull-right">
                                        <input id="financial" name="financial" value="financial" type="checkbox" class="access" checked="">
                                        <label for="financial" class="label-success"></label>
                                    </div>
                                </li> -->
                                <li class="list-groups-item">
                                    Payroll
                                    <div class="material-switch pull-right">
                                        <input id="payroll" name="payroll" value="payroll" type="checkbox" class="access" checked="">
                                        <label for="payroll" class="label-success"></label>
                                    </div>
                                    <!-- Payroll -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Department List
                                            <div class="material-switch pull-right">
                                                <input id="department_list" name="department_list" value="department_list" type="checkbox" class="access" checked="">
                                                <label for="department_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Department
                                            <div class="material-switch pull-right">
                                                <input id="add_department" name="add_department" value="add_department" type="checkbox" class="access" checked="">
                                                <label for="add_department" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Designation List
                                            <div class="material-switch pull-right">
                                                <input id="designation_list" name="designation_list" value="designation_list" type="checkbox" class="access" checked="">
                                                <label for="designation_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Designation
                                            <div class="material-switch pull-right">
                                                <input id="add_designation" name="add_designation" value="add_designation" type="checkbox" class="access" checked="">
                                                <label for="add_designation" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Employee List 
                                            <div class="material-switch pull-right">
                                                <input id="employee_list" name="employee_list" value="employee_list" type="checkbox" class="access" checked="">
                                                <label for="employee_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Employee 
                                            <div class="material-switch pull-right">
                                                <input id="add_employee" name="add_employee" value="add_employee" type="checkbox" class="access" checked="">
                                                <label for="add_employee" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Leave Type
                                            <div class="material-switch pull-right">
                                                <input id="leave_type" name="leave_type" value="leave_type" type="checkbox" class="access" checked="">
                                                <label for="leave_type" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Leave Type
                                            <div class="material-switch pull-right">
                                                <input id="add_leave_type" name="add_leave_type" value="add_leave_type" type="checkbox" class="access" checked="">
                                                <label for="add_leave_type" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Leave Record
                                            <div class="material-switch pull-right">
                                                <input id="leav_record" name="leav_record" value="leav_record" type="checkbox" class="access" checked="">
                                                <label for="leav_record" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Leave Application
                                            <div class="material-switch pull-right">
                                                <input id="add_leave_application" name="add_leave_application" value="add_leave_application" type="checkbox" class="access" checked="">
                                                <label for="add_leave_application" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Salary List
                                            <div class="material-switch pull-right">
                                                <input id="sallery_list" name="sallery_list" value="sallery_list" type="checkbox" class="access" checked="">
                                                <label for="sallery_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Salary Payslip
                                            <div class="material-switch pull-right">
                                                <input id="sallery_payslip" name="sallery_payslip" value="sallery_payslip" type="checkbox" class="access" checked="">
                                                <label for="sallery_payslip" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Bank
                                    <div class="material-switch pull-right">
                                        <input id="bank" name="bank" value="bank" type="checkbox" class="access" checked="">
                                        <label for="bank" class="label-success"></label>
                                    </div>
                                    <!-- Bank -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Bank List
                                            <div class="material-switch pull-right">
                                                <input id="bank_list" name="bank_list" value="bank_list" type="checkbox" class="access" checked="">
                                                <label for="bank_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Bank
                                            <div class="material-switch pull-right">
                                                <input id="add_bank" name="add_bank" value="add_bank" type="checkbox" class="access" checked="">
                                                <label for="add_bank" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Bank Account
                                            <div class="material-switch pull-right">
                                                <input id="bank_account" name="bank_account" value="bank_account" type="checkbox" class="access" checked="">
                                                <label for="bank_account" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Bank Account
                                            <div class="material-switch pull-right">
                                                <input id="add_bank_account" name="add_bank_account" value="add_bank_account" type="checkbox" class="access" checked="">
                                                <label for="add_bank_account" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Mobile Account
                                            <div class="material-switch pull-right">
                                                <input id="mobile_account" name="mobile_account" value="mobile_account" type="checkbox" class="access" checked="">
                                                <label for="mobile_account" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Mobile Account
                                            <div class="material-switch pull-right">
                                                <input id="add_mobile_account" name="add_mobile_account" value="add_mobile_account" type="checkbox" class="access" checked="">
                                                <label for="add_mobile_account" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            All Transaction
                                            <div class="material-switch pull-right">
                                                <input id="all_transaction" name="all_transaction" value="all_transaction" type="checkbox" class="access" checked="">
                                                <label for="all_transaction" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Transaction
                                            <div class="material-switch pull-right">
                                                <input id="add_transaction" name="add_transaction" value="add_transaction" type="checkbox" class="access" checked="">
                                                <label for="add_transaction" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <li class="list-groups-item">
                                    Report
                                    <div class="material-switch pull-right">
                                        <input id="report" name="report" value="report" type="checkbox" class="access" checked="">
                                        <label for="report" class="label-success"></label>
                                    </div>
                                </li>
                                <li class="list-groups-item">
                                    User &amp; Role
                                    <div class="material-switch pull-right">
                                        <input id="user_role" name="user_role" value="user_role" type="checkbox" class="access" checked="">
                                        <label for="user_role" class="label-success"></label>
                                    </div>
                                    <!-- User & Role -->
                                    <ul class="project_ul" style="margin-top: 15px">
                                        <li class="list-groups-item">
                                            Role List
                                            <div class="material-switch pull-right">
                                                <input id="role_list" name="role_list" value="role_list" type="checkbox" class="access" checked="">
                                                <label for="role_list" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add Role
                                            <div class="material-switch pull-right">
                                                <input id="add_role" name="add_role" value="add_role" type="checkbox" class="access" checked="">
                                                <label for="add_role" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            All User
                                            <div class="material-switch pull-right">
                                                <input id="all_user" name="all_user" value="all_user" type="checkbox" class="access" checked="">
                                                <label for="all_user" class="label-success"></label>
                                            </div>
                                        </li>
                                        <li class="list-groups-item">
                                            Add User
                                            <div class="material-switch pull-right">
                                                <input id="add_user" name="add_user" value="add_user" type="checkbox" class="access" checked="">
                                                <label for="add_user" class="label-success"></label>
                                            </div>
                                        </li>
                                    </ul>    
                                </li>
                                <!-- <li class="list-groups-item">
                                    Personal
                                    <div class="material-switch pull-right">
                                        <input id="personal" name="personal" value="personal" type="checkbox" class="access" checked="">
                                        <label for="personal" class="label-success"></label>
                                    </div>
                                </li> -->
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
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                    <input type="submit" name="role_setting" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('role-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ  <?php else: ?> Close <?php endif; ?></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.main content -->


    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script>
        $( document ).ready(function() {

            if($('input.access').is(':checked')) {
                $(this).parent().parent().find('ul.project_ul').show();
            }else{
                $(this).parent().parent().find('ul.project_ul').hide();
            }
            $('input.access').change( function() {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().find('ul.project_ul').find('input.access').attr('checked','checked');
                    $(this).parent().parent().find('ul.project_ul').show();
                }else{
                    $(this).parent().parent().find('ul.project_ul').find('input.access').removeAttr('checked');
                    $(this).parent().parent().find('ul.project_ul').hide();
                }
            });


            // if($('#project').is(':checked')) {
            //     $('.project ul.project_ul').show();
            // }else{
            //     $('.project ul.project_ul').hide();
            // }
            // $('#project').change( function() {
            //     if ($(this).is(':checked')) {
            //         $('.project ul.project_ul').find('input.access').attr('checked','checked');
            //         $('.project ul.project_ul').show();
            //     }else{
            //         $('.project ul.project_ul').find('input.access').removeAttr('checked');
            //         $('.project ul.project_ul').hide();
            //     }
            // });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/user_role/role_create.blade.php ENDPATH**/ ?>