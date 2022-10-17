<?php
   use App\Updaterole;
   $user_id = Auth::User()->id;
   $datas = Updaterole::where('user_id',$user_id)->first();
   
      // Project
      $project_group = isset($datas['project_group']) ? $datas['project_group'] : "";
      $project_group_create = isset($datas['project_group_create']) ? $datas['project_group_create'] : "";
      $project_sub_group = isset($datas['project_sub_group']) ? $datas['project_sub_group'] : "";
      $project_sub_group_create = isset($datas['project_sub_group_create']) ? $datas['project_sub_group_create'] : "";
      $project_type = isset($datas['project_type']) ? $datas['project_type'] : "";
      $project_type_create = isset($datas['project_type_create']) ? $datas['project_type_create'] : "";
      $contractor_list = isset($datas['contractor_list']) ? $datas['contractor_list'] : "";
      $add_contractor = isset($datas['add_contractor']) ? $datas['add_contractor'] : "";
      $project_record = isset($datas['project_record']) ? $datas['project_record'] : "";
      $add_new_project = isset($datas['add_new_project']) ? $datas['add_new_project'] : "";
      // Daily
      $daily_expense = isset($datas['daily_expense']) ? $datas['daily_expense'] : "";
      $daily_expense_create = isset($datas['daily_expense_create']) ? $datas['daily_expense_create'] : "";
      $expenses_record = isset($datas['expenses_record']) ? $datas['expenses_record'] : "";
      $create_expenses = isset($datas['create_expenses']) ? $datas['create_expenses'] : "";
      $expenses_head = isset($datas['expenses_head']) ? $datas['expenses_head'] : "";
      $add_expenses_head = isset($datas['add_expenses_head']) ? $datas['add_expenses_head'] : "";
      $daily_sales_report = isset($datas['daily_sales_report']) ? $datas['daily_sales_report'] : "";
      $bike_reading_report = isset($datas['bike_reading_report']) ? $datas['bike_reading_report'] : "";
      // Requisition
      $requisition_create = isset($datas['requisition_create']) ? $datas['requisition_create'] : "";
      $all_requisitions = isset($datas['all_requisitions']) ? $datas['all_requisitions'] : "";
      $approve_requisitions = isset($datas['approve_requisitions']) ? $datas['approve_requisitions'] : "";
      $pending_requisitions = isset($datas['pending_requisitions']) ? $datas['pending_requisitions'] : "";
      // Purchase
      $purchase_invoice = isset($datas['purchase_invoice']) ? $datas['purchase_invoice'] : "";
      $purchase_invoice_create = isset($datas['purchase_invoice_create']) ? $datas['purchase_invoice_create'] : "";
      // Material use & sales
      $create_material_use_record = isset($datas['create_material_use_record']) ? $datas['create_material_use_record'] : "";
      $material_send_for_use = isset($datas['material_send_for_use']) ? $datas['material_send_for_use'] : "";
      $sales_invoice = isset($datas['sales_invoice']) ? $datas['sales_invoice'] : "";
      $sales_invoice_create = isset($datas['sales_invoice_create']) ? $datas['sales_invoice_create'] : "";
      // Inventory
      $product_delivery = isset($datas['product_delivery']) ? $datas['product_delivery'] : "";
      $product_received = isset($datas['product_received']) ? $datas['product_received'] : "";
      $branch_stock = isset($datas['branch_stock']) ? $datas['branch_stock'] : "";
      $warehouse_stock = isset($datas['warehouse_stock']) ? $datas['warehouse_stock'] : "";
      $transfer_from_branch = isset($datas['transfer_from_branch']) ? $datas['transfer_from_branch'] : "";
      $transfer_from_warehouse = isset($datas['transfer_from_warehouse']) ? $datas['transfer_from_warehouse'] : "";
      // Client department setup
      $client_department_list = isset($datas['client_department_list']) ? $datas['client_department_list'] : "";
      $add_client_department = isset($datas['add_client_department']) ? $datas['add_client_department'] : "";
      $supplier_list = isset($datas['supplier_list']) ? $datas['supplier_list'] : "";
      $add_supplier = isset($datas['add_supplier']) ? $datas['add_supplier'] : "";
      $all_group = isset($datas['all_group']) ? $datas['all_group'] : "";
      $add_group = isset($datas['add_group']) ? $datas['add_group'] : "";
      // Product setup
      $category_list = isset($datas['category_list']) ? $datas['category_list'] : "";
      $category_create = isset($datas['category_create']) ? $datas['category_create'] : "";
      $subcategory_list = isset($datas['subcategory_list']) ? $datas['subcategory_list'] : "";
      $subcategory_create = isset($datas['subcategory_create']) ? $datas['subcategory_create'] : "";
      $product_list = isset($datas['product_list']) ? $datas['product_list'] : "";
      $add_new_product = isset($datas['add_new_product']) ? $datas['add_new_product'] : "";
      // Account setup
      $ac_class = isset($datas['ac_class']) ? $datas['ac_class'] : "";
      $ac_group_list = isset($datas['ac_group_list']) ? $datas['ac_group_list'] : "";
      $ac_group_create = isset($datas['ac_group_create']) ? $datas['ac_group_create'] : "";
      $ac_subgroup_list = isset($datas['ac_subgroup_list']) ? $datas['ac_subgroup_list'] : "";
      $ac_subgroup_create = isset($datas['ac_subgroup_create']) ? $datas['ac_subgroup_create'] : "";
      $ac_ledger_list = isset($datas['ac_ledger_list']) ? $datas['ac_ledger_list'] : "";
      $ac_ledger_create = isset($datas['ac_ledger_create']) ? $datas['ac_ledger_create'] : "";
      $ac_payment_voucherlist = isset($datas['ac_payment_voucherlist']) ? $datas['ac_payment_voucherlist'] : "";
      $ac_payment_vouchercreate = isset($datas['ac_payment_vouchercreate']) ? $datas['ac_payment_vouchercreate'] : "";
      $ac_receive_voucherlist = isset($datas['ac_receive_voucherlist']) ? $datas['ac_receive_voucherlist'] : "";
      $ac_receive_vouchercreate = isset($datas['ac_receive_vouchercreate']) ? $datas['ac_receive_vouchercreate'] : "";
      $ac_journal_entrylist = isset($datas['ac_journal_entrylist']) ? $datas['ac_journal_entrylist'] : "";
      $ac_journal_entrycreate = isset($datas['ac_journal_entrycreate']) ? $datas['ac_journal_entrycreate'] : "";
      // Installment loan setup
      $loan_id_list = isset($datas['loan_id_list']) ? $datas['loan_id_list'] : "";
      $loan_id_create = isset($datas['loan_id_create']) ? $datas['loan_id_create'] : "";
      $loan_invoice_list = isset($datas['loan_invoice_list']) ? $datas['loan_invoice_list'] : "";
      $loan_invoice_create = isset($datas['loan_invoice_create']) ? $datas['loan_invoice_create'] : "";
      $loan_payment = isset($datas['loan_payment']) ? $datas['loan_payment'] : "";
      $loan_receive = isset($datas['loan_receive']) ? $datas['loan_receive'] : "";
      // lc setup
      $pi_list = isset($datas['pi_list']) ? $datas['pi_list'] : "";
      $pi_setup = isset($datas['pi_setup']) ? $datas['pi_setup'] : "";
      $lc_list = isset($datas['lc_list']) ? $datas['lc_list'] : "";
      $lc_setup = isset($datas['lc_setup']) ? $datas['lc_setup'] : "";
      // payroll
      $department_list = isset($datas['department_list']) ? $datas['department_list'] : "";
      $add_department = isset($datas['add_department']) ? $datas['add_department'] : "";
      $designation_list = isset($datas['designation_list']) ? $datas['designation_list'] : "";
      $add_designation = isset($datas['add_designation']) ? $datas['add_designation'] : "";
      $employee_list = isset($datas['employee_list']) ? $datas['employee_list'] : "";
      $add_employee = isset($datas['add_employee']) ? $datas['add_employee'] : "";
      $leave_type = isset($datas['leave_type']) ? $datas['leave_type'] : "";
      $add_leave_type = isset($datas['add_leave_type']) ? $datas['add_leave_type'] : "";
      $leav_record = isset($datas['leav_record']) ? $datas['leav_record'] : "";
      $add_leave_application = isset($datas['add_leave_application']) ? $datas['add_leave_application'] : "";
      $sallery_list = isset($datas['sallery_list']) ? $datas['sallery_list'] : "";
      $sallery_payslip = isset($datas['sallery_payslip']) ? $datas['sallery_payslip'] : "";
      // bank
      $bank_list = isset($datas['bank_list']) ? $datas['bank_list'] : "";
      $add_bank = isset($datas['add_bank']) ? $datas['add_bank'] : "";
      $bank_account = isset($datas['bank_account']) ? $datas['bank_account'] : "";
      $add_bank_account = isset($datas['add_bank_account']) ? $datas['add_bank_account'] : "";
      $mobile_account = isset($datas['mobile_account']) ? $datas['mobile_account'] : "";
      $add_mobile_account = isset($datas['add_mobile_account']) ? $datas['add_mobile_account'] : "";
      $all_transaction = isset($datas['all_transaction']) ? $datas['all_transaction'] : "";
      $add_transaction = isset($datas['add_transaction']) ? $datas['add_transaction'] : "";
      // user & role
      $role_list = isset($datas['role_list']) ? $datas['role_list'] : "";
      $add_role = isset($datas['add_role']) ? $datas['add_role'] : "";
      $all_user = isset($datas['all_user']) ? $datas['all_user'] : "";
      $add_user = isset($datas['add_user']) ? $datas['add_user'] : "";
   
?>

<aside class="main-sidebar">
   <section class="sidebar">
      <ul class="sidebar-menu tree" data-widget="tree">
         <li> <a href="<?php echo e(route('home')); ?>" <?php if(isset($phead) && $phead=='dashboard'): ?> class="active" <?php endif; ?>><i class="fa fa-dashboard ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></span></a></li>
          <?php if(Auth::User()->manage_project || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='project'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-folder-open-o ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ম্যানেজ প্রোজেক্ট <?php else: ?> Manage Project <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='project'): ?> style="display: block;" <?php endif; ?>>
               <?php if($project_group == 'project_group' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('progroup-list-create')); ?>" <?php if(isset($phead) && $phead=='prgl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট গ্রুপ <?php else: ?> Project Group <?php endif; ?> </a></li>
               <?php endif; ?>
               <?php if($project_group_create == 'project_group_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('progroup-page-create')); ?>"  <?php if(isset($phead) && $phead=='prgc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট গ্রুপ ক্রিয়েট <?php else: ?> Project Group Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($project_sub_group == 'project_sub_group' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('prosubgroup-list-create')); ?>" <?php if(isset($phead) && $phead=='prsgl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট সাব-গ্রুপ <?php else: ?> Project Sub-Group <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($project_sub_group_create == 'project_sub_group_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('prosubgroup-page-create')); ?>" <?php if(isset($phead) && $phead=='prsgc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট <?php else: ?> Project Sub-Group Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($project_type == 'project_type' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-type-list-page')); ?>" <?php if(isset($phead) && $phead=='prt'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট টাইপ <?php else: ?> Project Type <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($project_type_create == 'project_type_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-type-create-page')); ?>" <?php if(isset($phead) && $phead=='prtc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট টাইপ ক্রিয়েট <?php else: ?> Project Type Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($contractor_list == 'contractor_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-contractor-list-page')); ?>" <?php if(isset($phead) && $phead=='prcl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> কন্ট্রাকটর লিস্ট <?php else: ?> Contractor List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_contractor == 'add_contractor' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-contractor-create-page')); ?>" <?php if(isset($phead) && $phead=='prcc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড কন্ট্রাকটর <?php else: ?> Add contractor <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($project_record == 'project_record' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-list-page')); ?>" <?php if(isset($phead) && $phead=='prr'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট রেকর্ড <?php else: ?> Project Record <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_new_project == 'add_new_project' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('project-create-page')); ?>" <?php if(isset($phead) && $phead=='prc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড নিউ প্রোজেক্ট <?php else: ?> Add New Project <?php endif; ?> </a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->daily_process || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='daily'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ডেইলি প্রসেস <?php else: ?> Daily Process <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='daily'): ?> style="display: block;" <?php endif; ?>>
               <?php if($daily_expense == 'daily_expense' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('daily-expense-list')); ?>" <?php if(isset($phead) && $phead=='dexr'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্স <?php else: ?> Daily Expense <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($daily_expense_create == 'daily_expense_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('daily-expense-create-route')); ?>" <?php if(isset($phead) && $phead=='dexc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্স ক্রিয়েট <?php else: ?> Daily Expenses Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($expenses_record == 'expenses_record' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('expense-list')); ?>" <?php if(isset($phead) && $phead=='der'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এক্সপেন্স রেকর্ড <?php else: ?> Expenses Record <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($create_expenses == 'create_expenses' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('expense-create-route')); ?>" <?php if(isset($phead) && $phead=='dec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট এক্সপেন্সেস <?php else: ?> Create Expenses <?php endif; ?></a></li>
               <?php endif; ?>
               <li><a href="<?php echo e(route('expense-typelist')); ?>" <?php if(isset($phead) && $phead=='headtype_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> হেড টাইপ লিস্ট <?php else: ?> Head Type List <?php endif; ?></a></li>
               <?php if($expenses_head == 'expenses_head' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('expense-head-list')); ?>" <?php if(isset($phead) && $phead=='deh'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস হেড <?php else: ?> Expenses Head <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_expenses_head == 'add_expenses_head' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('expense-head-create-route')); ?>" <?php if(isset($phead) && $phead=='dehc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড এক্সপেন্সেস হেড <?php else: ?> Add Expenses Head <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($daily_sales_report == 'daily_sales_report' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('daily-sales-list-page')); ?>" <?php if(isset($phead) && $phead=='slsrprtlst'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ডেইলি সেলস রিপোর্ট <?php else: ?> Daily Sales Report <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($bike_reading_report == 'bike_reading_report' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('bike-reading-list-page')); ?>" <?php if(isset($phead) && $phead=='bikeread'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> বাইক রিডিং রিপোর্ট <?php else: ?> Bike Reading Report <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->requisition_record || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='requisition'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন <?php else: ?> Requisition <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='requisition'): ?> style="display: block;" <?php endif; ?>>
               <?php if($requisition_create == 'requisition_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('requisition-create-route')); ?>" <?php if(isset($phead) && $phead=='req_create'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ক্রিয়েট <?php else: ?> Requisition Create <?php endif; ?> </a></li>
               <?php endif; ?>
               <?php if($all_requisitions == 'all_requisitions' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('requisition-list-route')); ?>" <?php if(isset($phead) && $phead=='req_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> সব রিকুইজিশন <?php else: ?> All Requisitions <?php endif; ?> </a></li>
               <?php endif; ?>
               <?php if($approve_requisitions == 'approve_requisitions' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('requisition-aprrovelist-route')); ?>" <?php if(isset($phead) && $phead=='req_app_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এপ্রুভ রিকুইজিশন <?php else: ?> Approve Requisitions <?php endif; ?> </a></li>
               <?php endif; ?>
               <?php if($pending_requisitions == 'pending_requisitions' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('requisition-pendinglist-route')); ?>" <?php if(isset($phead) && $phead=='req_pen_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> পেন্ডিং রিকুইজিশন <?php else: ?> Pending Requisitions <?php endif; ?> </a></li>
               <?php endif; ?>
               
               
               
               
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->purchase || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='purchase'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-basket ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> পারচেস <?php else: ?> Purchase <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='purchase'): ?> style="display: block;" <?php endif; ?>>
               <?php if($purchase_invoice == 'purchase_invoice' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('purchase-list-page')); ?>" <?php if(isset($phead) && $phead=='puri'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> পারচেস ইনভয়েস <?php else: ?> Purchase Invoice <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($purchase_invoice_create == 'purchase_invoice_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('purchase-create-page')); ?>" <?php if(isset($phead) && $phead=='puric'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> পারচেস ইনভয়েস ক্রিয়েট <?php else: ?> Purchase Invoice Create <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->material_use || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='material'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-bag ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল ইউস ও সেলস <?php else: ?> Materials Use &amp; Sales <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='material'): ?> style="display: block;" <?php endif; ?>>
               <?php if($create_material_use_record == 'create_material_use_record' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('materialuse-create-page')); ?>" <?php if(isset($phead) && $phead=='mur'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট মেটেরিয়ালস ইউস-রেকর্ড <?php else: ?> Create Materials Use-Record <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($material_send_for_use == 'material_send_for_use' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('view_material-record-list')); ?>" <?php if(isset($phead) && $phead=='msfu'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল সেন্ড ফর ইউস <?php else: ?> Materials Send For Use <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($sales_invoice == 'sales_invoice' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('sales-list-page')); ?>" <?php if(isset($phead) && $phead=='si'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সেলস ইনভয়েস <?php else: ?> Sales Invoice <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($sales_invoice_create == 'sales_invoice_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('sales-create-page')); ?>" <?php if(isset($phead) && $phead=='sic'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সেলস ইনভয়েস ক্রিয়েট <?php else: ?> Sales Invoice Create <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->inventory || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='inventory'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-barcode ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ইনভেন্টরি <?php else: ?> Inventory <?php endif; ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='inventory'): ?> style="display: block;" <?php endif; ?>>
               <?php if($product_delivery == 'product_delivery' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('prodelivery-list')); ?>" <?php if(isset($phead) && $phead=='prod'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট ডেলিভারি <?php else: ?> Product Delivery <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($product_received == 'product_received' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('proreceive-list')); ?>" <?php if(isset($phead) && $phead=='pror'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট রিসিভড <?php else: ?> Product Received <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($branch_stock == 'branch_stock' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('bstock-list')); ?>" <?php if(isset($phead) && $phead=='branchs'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ স্টক <?php else: ?> Branch Stock <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($warehouse_stock == 'warehouse_stock' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('whstock-list')); ?>" <?php if(isset($phead) && $phead=='warehs'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ওয়্যারহাউস স্টক <?php else: ?> Warehouse Stock <?php endif; ?></a></li>
               <?php endif; ?>
               
               <?php if($transfer_from_branch == 'transfer_from_branch' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('branch-transfer-stock-list')); ?>" <?php if(isset($phead) && $phead=='brancht'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্ছ থেকে ট্রান্সফার <?php else: ?> Transfer From Branch <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($transfer_from_warehouse == 'transfer_from_warehouse' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('warehouse-transfer-stock-list')); ?>" <?php if(isset($phead) && $phead=='wareht'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ওয়্যারহাউস থেকে ট্রান্সফার <?php else: ?> Transfer From Warehouse <?php endif; ?></a></li>
               <?php endif; ?>
               
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->client || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='client'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-handshake-o ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ক্লায়েন্ট/ডিপার্টমেন্ট সেটাপ <?php else: ?> Client/Department Setup <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='client'): ?> style="display: block;" <?php endif; ?>>
               <?php if($client_department_list == 'client_department_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('customer-list')); ?>" <?php if(isset($phead) && $phead=='cl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ক্লায়েন্ট/ডিপার্টমেন্ট লিস্ট <?php else: ?> Client/Department List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_client_department == 'add_client_department' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('customer-create-route')); ?>" <?php if(isset($phead) && $phead=='ccustomer'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ক্লায়েন্ট/ডিপার্টমেন্ট <?php else: ?> Add Client/Department <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($supplier_list == 'supplier_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('supplier-list')); ?>" <?php if(isset($phead) && $phead=='sl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাপ্লায়ার লিস্ট <?php else: ?> Supplier List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_supplier == 'add_supplier' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('supplier-create-route')); ?>" <?php if(isset($phead) && $phead=='sc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড সাপ্লায়ার <?php else: ?> Add Supplier <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($all_group == 'all_group' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('group-list')); ?>" <?php if(isset($phead) && $phead=='allg'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সব গ্রুপ <?php else: ?> All Group <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_group == 'add_group' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('group-create-route')); ?>" <?php if(isset($phead) && $phead=='gc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড গ্রুপ <?php else: ?> Add Group <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->product || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='product'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-cart ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট সেটাপ <?php else: ?> Product Setup <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='product'): ?> style="display: block;" <?php endif; ?>>
               <?php if($category_list == 'category_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('category-list')); ?>" <?php if(isset($phead) && $phead=='catl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ক্যাটেগরি লিস্ট <?php else: ?> Category List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($category_create == 'category_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('category-create-route')); ?>" <?php if(isset($phead) && $phead=='catc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ক্যাটেগরি ক্রিয়েট <?php else: ?> Category Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($subcategory_list == 'subcategory_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('subcategory-list')); ?>" <?php if(isset($phead) && $phead=='scatl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি লিস্ট <?php else: ?> Sub-Category List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($subcategory_create == 'subcategory_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('subcategory-create-route')); ?>" <?php if(isset($phead) && $phead=='scatc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাব-ক্যাটেগরি ক্রিয়েট <?php else: ?> Sub-Category Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($product_list == 'product_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('product-list')); ?>" <?php if(isset($phead) && $phead=='prol'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট লিস্ট <?php else: ?> Product List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_new_product == 'add_new_product' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('product-create-route')); ?>" <?php if(isset($phead) && $phead=='proc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড নিউ প্রোডাক্ট <?php else: ?> Add New Product <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>

         
         <li class="treeview" <?php if(isset($mhead) && $mhead=='raw_material'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-cart ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> রো ম্যাটেরিয়াল <?php else: ?> Raw Materials <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='raw_material'): ?> style="display: block;" <?php endif; ?>>
               <?php if($category_list == 'category_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('category-list')); ?>" <?php if(isset($phead) && $phead=='raw_materiallist'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> রো ম্যাটেরিয়াল লিস্ট <?php else: ?> Raw Material List <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>


         <?php if(Auth::User()->master || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='master'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-sun-o ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> মাস্টার সেটাপ <?php else: ?> Master Setup <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='master'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('brand-list')); ?>" <?php if(isset($phead) && $phead=='bl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ব্র্যান্ড লিস্ট <?php else: ?> Brand List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('brand-create-route')); ?>" <?php if(isset($phead) && $phead=='bc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ব্র্যান্ড <?php else: ?> Add Brand <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('manufacture-list')); ?>" <?php if(isset($phead) && $phead=='ml'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার লিস্ট <?php else: ?> Manufacturer List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('manufacture-create-route')); ?>" <?php if(isset($phead) && $phead=='mc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ম্যানুফেকচারার <?php else: ?> Add Manufacturer <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('unit-list')); ?>" <?php if(isset($phead) && $phead=='ul'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ইউনিট লিস্ট <?php else: ?> Unit List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('unit-create-route')); ?>" <?php if(isset($phead) && $phead=='uc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ইউনিট <?php else: ?> Add Unit <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('size-list')); ?>" <?php if(isset($phead) && $phead=='sizel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাইজ লিস্ট <?php else: ?> Size List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('size-create-route')); ?>" <?php if(isset($phead) && $phead=='sizec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এড সাইজ <?php else: ?> Add Size <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('currency-list')); ?>" <?php if(isset($phead) && $phead=='currl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> কারেন্সি লিস্ট <?php else: ?> Currency List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('currency-create-route')); ?>" <?php if(isset($phead) && $phead=='currc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড কারেন্সি <?php else: ?> Add Currency <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('country-list')); ?>" <?php if(isset($phead) && $phead=='counl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> দেশের লিস্ট <?php else: ?> Country List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('country-create-route')); ?>" <?php if(isset($phead) && $phead=='counc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> দেশ যুক্তকরন <?php else: ?> Add Country <?php endif; ?></a></li>
               
               <li><a href="<?php echo e(route('color-list')); ?>" <?php if(isset($phead) && $phead=='colorl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> কালার লিস্ট <?php else: ?> Color List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('color-create-route')); ?>" <?php if(isset($phead) && $phead=='colorc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড কালার <?php else: ?> Add Color <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('district-list')); ?>" <?php if(isset($phead) && $phead=='disl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> জেলার লিস্ট <?php else: ?> District List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('district-create-route')); ?>" <?php if(isset($phead) && $phead=='disc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> জেলা যুক্তকরন <?php else: ?> Add District <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('zone-list')); ?>" <?php if(isset($phead) && $phead=='zonel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> জোন লিস্ট <?php else: ?> Zone List <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('zone-create-route')); ?>" <?php if(isset($phead) && $phead=='zonec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এড জোন <?php else: ?> Add Zone <?php endif; ?></a></li>
               </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->account || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='account'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-money ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> একাউন্ট সেটাপ <?php else: ?> Accounts Setup <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='account'): ?> style="display: block;" <?php endif; ?>>
               <?php if($ac_class == 'ac_class' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('class-list')); ?>" <?php if(isset($phead) && $phead=='class'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ক্লাস <?php else: ?> Class <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_group_list == 'ac_group_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('acc-group-list')); ?>" <?php if(isset($phead) && $phead=='grpl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> গ্রুপ লিস্ট <?php else: ?> Group List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_group_create == 'ac_group_create' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('acc-group-create-route')); ?>" <?php if(isset($phead) && $phead=='grpc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> গ্রুপ ক্রিয়েট <?php else: ?> Group Cteate <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_subgroup_list == 'ac_subgroup_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('subgroup-list')); ?>" <?php if(isset($phead) && $phead=='subgrpl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাব-গ্রুপ লিস্ট <?php else: ?> Sub-Group List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_subgroup_create == 'ac_subgroup_create' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('subgroup-create-route')); ?>" <?php if(isset($phead) && $phead=='subgrpc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> সাব-গ্রুপ ক্রিয়েট <?php else: ?> Sub-Group Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_ledger_list == 'ac_ledger_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('ledger-list')); ?>" <?php if(isset($phead) && $phead=='ledgrl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লেদজার লিস্ট <?php else: ?> Ledger List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_ledger_create == 'ac_ledger_create' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('ledger-create-route')); ?>" <?php if(isset($phead) && $phead=='ledgrc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> লেদজার ক্রিয়েট <?php else: ?> Ledger Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_payment_voucherlist == 'ac_payment_voucherlist' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('paymentvouchar-list')); ?>" <?php if(isset($phead) && $phead=='payl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট ভাউচার লিস্ট <?php else: ?> Payment Voucher List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_payment_vouchercreate == 'ac_payment_vouchercreate' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('paymentvouchar-create-route')); ?>" <?php if(isset($phead) && $phead=='payc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট ভাউচার ক্রিয়েট <?php else: ?> Payment Voucher Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_receive_voucherlist == 'ac_receive_voucherlist' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('receivevoucher-list')); ?>" <?php if(isset($phead) && $phead=='recl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> রিসিভ ভাউচার লিস্ট <?php else: ?> Receive Voucher List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_receive_vouchercreate == 'ac_receive_vouchercreate' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('receivevoucher-create-route')); ?>" <?php if(isset($phead) && $phead=='recc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> রিসিভ ভাউচার ক্রিয়েট <?php else: ?> Receive Voucher Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_journal_entrylist == 'ac_journal_entrylist' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('journal-list')); ?>" <?php if(isset($phead) && $phead=='jourl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> জার্নাল এনট্রি লিস্ট <?php else: ?> Journal Entry List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($ac_journal_entrycreate == 'ac_journal_entrycreate' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('journallist-create-route')); ?>" <?php if(isset($phead) && $phead=='jourc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> জার্নাল এনট্রি ক্রিয়েট <?php else: ?> Journal Entry Create <?php endif; ?></a></li>
               <?php endif; ?>
           </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->loan || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='loan'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-credit-card ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ইন্সটলমেন্ট ও লন সেটাপ <?php else: ?> Installment &amp; Loan Setup <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu"  <?php if(isset($mhead) && $mhead=='loan'): ?> style="display: block;" <?php endif; ?>>
               <?php if($loan_id_list == 'loan_id_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loan-list-route')); ?>" <?php if(isset($phead) && $phead=='loanlist'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন আইডি লিস্ট <?php else: ?> Loan ID List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($loan_id_create == 'loan_id_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loan-create-route')); ?>" <?php if(isset($phead) && $phead=='loancreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন আইডি ক্রিয়েট <?php else: ?> Loan ID Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($loan_invoice_list == 'loan_invoice_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loaninvoice-list-route')); ?>" <?php if(isset($phead) && $phead=='loaninvlist'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন ইনভয়েস লিস্ট <?php else: ?> Loan Invoice List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($loan_invoice_create == 'loan_invoice_create' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loaninvoice-create-route')); ?>" <?php if(isset($phead) && $phead=='loaninvcreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন ইনভয়েস ক্রিয়েট <?php else: ?> Loan Invoice Create <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($loan_payment == 'loan_payment' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loanpayment-create-route')); ?>" <?php if(isset($phead) && $phead=='loanpayment'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন পেইমেন্ট <?php else: ?> Loan Payment <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($loan_receive == 'loan_receive' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('loanreceive-create-route')); ?>" <?php if(isset($phead) && $phead=='loanreceive'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> লন রিসিভ <?php else: ?> Loan Receive <?php endif; ?></a></li>
               <?php endif; ?>
               
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->lc || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='lcsetup'): ?> menu-open <?php endif; ?>>
           <a href="#">
           <i class="fa fa-credit-card ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> এলসি সেটাপ <?php else: ?> LC Setup <?php endif; ?></span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='lcsetup'): ?> style="display: block;" <?php endif; ?>>
              
               <?php if($pi_list == 'pi_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('lc-list-pi')); ?>" <?php if(isset($phead) && $phead=='pil'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> পিআই লিস্ট <?php else: ?> PI List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($pi_setup == 'pi_setup' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('lc-create-pi')); ?>" <?php if(isset($phead) && $phead=='pi'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> পিআই সেটাপ <?php else: ?> PI Setup <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($lc_list == 'lc_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('list-lc-setup')); ?>" <?php if(isset($phead) && $phead=='lcsetupl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এলসি লিস্ট <?php else: ?> LC List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($lc_setup == 'lc_setup' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-lc-setup')); ?>" <?php if(isset($phead) && $phead=='lcsetupc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এলসি সেটাপ <?php else: ?> LC Setup <?php endif; ?></a></li>
               <?php endif; ?>
             
           </ul>
        </li>
         <?php endif; ?>
        <?php if(Auth::User()->financial || Auth::User()->status == 007): ?>
        <!-- <li class="treeview" <?php if(isset($mhead) && $mhead=='finance'): ?> menu-open <?php endif; ?>>
           <a href="#">
           <i class="fa fa-bar-chart ani_icon"></i> <span>Finance Record</span>
           <span class="pull-right-container">
           <i class="fa fa-angle-left pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='finance'): ?> style="display: block;" <?php endif; ?>>
              <li><a href="<?php echo e(route('finance_chart_of_account')); ?>" <?php if(isset($phead) && $phead=='coa'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Chart of Account</a></li>
              <li><a href="<?php echo e(route('finance_profit_and_loss')); ?>" <?php if(isset($phead) && $phead=='pal'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Profit And Loss</a></li>
              <li><a href="<?php echo e(route('finance_trial_balance')); ?>" <?php if(isset($phead) && $phead=='tb'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Trial Balance </a></li>
              <li><a href="<?php echo e(route('finance_balance_sheet')); ?>" <?php if(isset($phead) && $phead=='bs'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Balance Sheet</a></li>
              
           </ul>
        </li> -->
        <?php endif; ?>
         <?php if(Auth::User()->payroll || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='payroll'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-clock-o ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> পেইরোল <?php else: ?> Payroll <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='payroll'): ?> style="display: block;" <?php endif; ?>>
               <?php if($department_list == 'department_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('department-list-page')); ?>" <?php if(isset($phead) && $phead=='dl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ডিপার্টমেন্ট লিস্ট <?php else: ?> Department List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_department == 'add_department' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('department-create-page')); ?>" <?php if(isset($phead) && $phead=='dc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ডিপার্টমেন্ট <?php else: ?> Add Department <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($designation_list == 'designation_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('designation-list-page')); ?>" <?php if(isset($phead) && $phead=='degl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন লিস্ট <?php else: ?> Designation List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_designation == 'add_designation' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('designation-create-page')); ?>" <?php if(isset($phead) && $phead=='degc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ডেজিগনেসন <?php else: ?> Add Designation <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($employee_list == 'employee_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('employee-list-page')); ?>" <?php if(isset($phead) && $phead=='empl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি লিস্ট <?php else: ?> Employee List <?php endif; ?> </a></li>
               <?php endif; ?>
               <?php if($add_employee == 'add_employee' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('employee-create-page')); ?>" <?php if(isset($phead) && $phead=='empc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ইমপ্লয়ি <?php else: ?> Add Employee <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($leave_type == 'leave_type' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('leavetype-list-page')); ?>" <?php if(isset($phead) && $phead=='lt'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> লিভ টাইপ <?php else: ?> Leave Type <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_leave_type == 'add_leave_type' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('leavetype-create-page')); ?>" <?php if(isset($phead) && $phead=='ltc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড লিভ টাইপ <?php else: ?> Add Leave Type <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($leav_record == 'leav_record' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('leaveapp-list-page')); ?>" <?php if(isset($phead) && $phead=='lar'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> লিভ রেকর্ড <?php else: ?> Leave Record <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_leave_application == 'add_leave_application' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('leaveapp-create-page')); ?>" <?php if(isset($phead) && $phead=='ala'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড লিভ অ্যাপ্লিকেশান <?php else: ?> Add Leave Application <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($sallery_list == 'sallery_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('salary-list-page')); ?>" <?php if(isset($phead) && $phead=='salarycreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> স্যালারি লিস্ট <?php else: ?> Salary List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($sallery_payslip == 'sallery_payslip' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('payslip-list-page')); ?>" <?php if(isset($phead) && $phead=='payrollcreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> স্যালারি পেইস্লিপ <?php else: ?> Salary Payslip <?php endif; ?> </a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->bank  || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='bank'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-credit-card-alt ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ব্যাংক <?php else: ?> Bank <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='bank'): ?> style="display: block;" <?php endif; ?>>
               <?php if($bank_list == 'bank_list' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-bank-list')); ?>" <?php if(isset($phead) && $phead=='bankl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ব্যাংক লিস্ট <?php else: ?> Bank List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_bank == 'add_bank' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-bank-page')); ?>" <?php if(isset($phead) && $phead=='bankc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ব্যাংক <?php else: ?> Add Bank <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($bank_account == 'bank_account' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-bankaccount-list')); ?>" <?php if(isset($phead) && $phead=='accl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> ব্যাংক একাউন্ট <?php else: ?> Bank Account <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_bank_account == 'add_bank_account' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-bankaccount-page')); ?>" <?php if(isset($phead) && $phead=='accc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ব্যাংক একাউন্ট <?php else: ?> Add Bank Account <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($mobile_account == 'mobile_account' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('mobileaccount-list')); ?>" <?php if(isset($phead) && $phead=='mobl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> মোবাইল একাউন্ট <?php else: ?> Mobile Account <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_mobile_account == 'add_mobile_account' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('create-mobileaccount-page')); ?>" <?php if(isset($phead) && $phead=='mobc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i><?php if( Auth::User()->language == 1 ): ?> এড মোবাইল একাউন্ট <?php else: ?> Add Mobile Account <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($all_transaction == 'all_transaction' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('banktransaction-list')); ?>" <?php if(isset($phead) && $phead=='alltran'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> অল ট্রানজেক্সন <?php else: ?> All Transaction <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_transaction == 'add_transaction' || Auth::User()->status == 007): ?>
              <li><a href="<?php echo e(route('banktransaction-create-route')); ?>" <?php if(isset($phead) && $phead=='alltranc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ট্রানজেক্সন <?php else: ?> Add Transaction <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->personal || Auth::User()->status == 007): ?>
         <!--<li class="treeview">-->
         <!--   <a href="#">-->
         <!--   <i class="fa fa-user ani_icon"></i> <span>Personal</span>-->
         <!--   <span class="pull-right-container">-->
         <!--   <i class="fa fa-angle-left pull-right"></i>-->
         <!--   </span>-->
         <!--   </a>-->
         <!--   <ul class="treeview-menu">-->
         <!--      <li><a href="#"><i class="fa fa-caret-right"></i> Personal Note</a></li>-->
         <!--      <li><a href="#"><i class="fa fa-caret-right"></i> Todo</a></li>-->
               
         <!--   </ul>-->
         <!--</li>-->
         <?php endif; ?>
         <?php if(Auth::User()->report || Auth::User()->status == 007): ?>
         <li> <a href="<?php echo e(route('report-all')); ?>"><i class="fa fa-pie-chart ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> রিপোর্ট <?php else: ?> Report <?php endif; ?></span></a></li>
         <?php endif; ?>
         <?php if(Auth::User()->user_role || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='urole'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-address-card-o ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> ইউজার ও রোল <?php else: ?> User &amp; Role <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='urole'): ?> style="display: block;" <?php endif; ?>>
               <?php if($role_list == 'role_list' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('role-list-page')); ?>" <?php if(isset($phead) && $phead=='rolel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> রোল লিস্ট <?php else: ?> Role List <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_role == 'add_role' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('role-create-page')); ?>" <?php if(isset($phead) && $phead=='rolec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড রোল <?php else: ?> Add Role <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($all_user == 'all_user' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('user-list-page')); ?>" <?php if(isset($phead) && $phead=='alluser'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> অল ইউজার <?php else: ?> All User <?php endif; ?></a></li>
               <?php endif; ?>
               <?php if($add_user == 'add_user' || Auth::User()->status == 007): ?>
               <li><a href="<?php echo e(route('user-create-page')); ?>" <?php if(isset($phead) && $phead=='alluserc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> এড ইউজার <?php else: ?> Add User <?php endif; ?></a></li>
               <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='company'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-industry ani_icon"></i> <span><?php if( Auth::User()->language == 1 ): ?> কোম্পানি ও সেটিংস <?php else: ?> Company &amp; Setting  <?php endif; ?></span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='company'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('company-create-setup')); ?>" <?php if(isset($phead) && $phead=='csetup'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> কোম্পানি সেটাপ <?php else: ?> Company Setup <?php endif; ?></a></li>
               <!--<li><a href="<?php echo e(route('local-create-setup')); ?>" <?php if(isset($phead) && $phead=='lsetup'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Local Setting</a></li>-->
               <li><a href="<?php echo e(route('branch-list')); ?>" <?php if(isset($phead) && $phead=='branch'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ব্রাঞ্চ <?php else: ?> Branch <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('warehouse-list')); ?>" <?php if(isset($phead) && $phead=='wareh'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ওয়্যারহাউস <?php else: ?> Warehouse <?php endif; ?></a></li>
               <li><a href="<?php echo e(route('warehouse-create-route')); ?>" <?php if(isset($phead) && $phead=='warehc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> <?php if( Auth::User()->language == 1 ): ?> ওয়্যারহাউস ক্রিয়েট <?php else: ?> Warehouse Create <?php endif; ?></a></li>
            </ul>
         </li>
      </ul>
   </section>
</aside>
<?php /**PATH C:\xampp\htdocs\national\resources\views/layouts/admin/aside.blade.php ENDPATH**/ ?>