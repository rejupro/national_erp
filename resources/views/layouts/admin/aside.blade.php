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
         <li> <a href="{{ route('home') }}" @if(isset($phead) && $phead=='dashboard') class="active" @endif><i class="fa fa-dashboard ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</span></a></li>
          @if(Auth::User()->manage_project || Auth::User()->status == 007)
         <li class="treeview @if(isset($mhead) && $mhead=='project') menu-open @endif">
            <a href="#">
            <i class="fa fa-folder-open-o ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ম্যানেজ প্রোজেক্ট @else Manage Project @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='project') style="display: block;" @endif>
               @if($project_group == 'project_group' || Auth::User()->status == 007)
               <li><a href="{{route('progroup-list-create')}}" @if(isset($phead) && $phead=='prgl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট গ্রুপ @else Project Group @endif </a></li>
               @endif
               @if($project_group_create == 'project_group_create' || Auth::User()->status == 007)
               <li><a href="{{route('progroup-page-create')}}"  @if(isset($phead) && $phead=='prgc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট গ্রুপ ক্রিয়েট @else Project Group Create @endif</a></li>
               @endif
               @if($project_sub_group == 'project_sub_group' || Auth::User()->status == 007)
               <li><a href="{{route('prosubgroup-list-create')}}" @if(isset($phead) && $phead=='prsgl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ @else Project Sub-Group @endif</a></li>
               @endif
               @if($project_sub_group_create == 'project_sub_group_create' || Auth::User()->status == 007)
               <li><a href="{{route('prosubgroup-page-create')}}" @if(isset($phead) && $phead=='prsgc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ক্রিয়েট @else Project Sub-Group Create @endif</a></li>
               @endif
               @if($project_type == 'project_type' || Auth::User()->status == 007)
               <li><a href="{{route('project-type-list-page')}}" @if(isset($phead) && $phead=='prt') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট টাইপ @else Project Type @endif</a></li>
               @endif
               @if($project_type_create == 'project_type_create' || Auth::User()->status == 007)
               <li><a href="{{route('project-type-create-page')}}" @if(isset($phead) && $phead=='prtc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট টাইপ ক্রিয়েট @else Project Type Create @endif</a></li>
               @endif
               @if($contractor_list == 'contractor_list' || Auth::User()->status == 007)
               <li><a href="{{route('project-contractor-list-page')}}" @if(isset($phead) && $phead=='prcl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) কন্ট্রাকটর লিস্ট @else Contractor List @endif</a></li>
               @endif
               @if($add_contractor == 'add_contractor' || Auth::User()->status == 007)
               <li><a href="{{route('project-contractor-create-page')}}" @if(isset($phead) && $phead=='prcc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড কন্ট্রাকটর @else Add contractor @endif</a></li>
               @endif
               @if($project_record == 'project_record' || Auth::User()->status == 007)
               <li><a href="{{route('project-list-page')}}" @if(isset($phead) && $phead=='prr') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোজেক্ট রেকর্ড @else Project Record @endif</a></li>
               @endif
               @if($add_new_project == 'add_new_project' || Auth::User()->status == 007)
               <li><a href="{{route('project-create-page')}}" @if(isset($phead) && $phead=='prc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড নিউ প্রোজেক্ট @else Add New Project @endif </a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->daily_process || Auth::User()->status == 007)
         <li class="treeview @if(isset($mhead) && $mhead=='daily') menu-open @endif">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ডেইলি প্রসেস @else Daily Process @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='daily') style="display: block;" @endif>
               @if($daily_expense == 'daily_expense' || Auth::User()->status == 007)
               <li><a href="{{route('daily-expense-list')}}" @if(isset($phead) && $phead=='dexr') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ডেইলি এক্সপেন্স @else Daily Expense @endif</a></li>
               @endif
               @if($daily_expense_create == 'daily_expense_create' || Auth::User()->status == 007)
               <li><a href="{{route('daily-expense-create-route')}}" @if(isset($phead) && $phead=='dexc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ডেইলি এক্সপেন্স ক্রিয়েট @else Daily Expenses Create @endif</a></li>
               @endif
               @if($expenses_record == 'expenses_record' || Auth::User()->status == 007)
               <li><a href="{{route('expense-list')}}" @if(isset($phead) && $phead=='der') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এক্সপেন্স রেকর্ড @else Expenses Record @endif</a></li>
               @endif
               @if($create_expenses == 'create_expenses' || Auth::User()->status == 007)
               <li><a href="{{route('expense-create-route')}}" @if(isset($phead) && $phead=='dec') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ক্রিয়েট এক্সপেন্সেস @else Create Expenses @endif</a></li>
               @endif
               <li><a href="{{route('expense-typelist')}}" @if(isset($phead) && $phead=='headtype_list') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) হেড টাইপ লিস্ট @else Head Type List @endif</a></li>
               @if($expenses_head == 'expenses_head' || Auth::User()->status == 007)
               <li><a href="{{route('expense-head-list')}}" @if(isset($phead) && $phead=='deh') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এক্সপেন্সেস হেড @else Expenses Head @endif</a></li>
               @endif
               @if($add_expenses_head == 'add_expenses_head' || Auth::User()->status == 007)
               <li><a href="{{route('expense-head-create-route')}}" @if(isset($phead) && $phead=='dehc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড এক্সপেন্সেস হেড @else Add Expenses Head @endif</a></li>
               @endif
               @if($daily_sales_report == 'daily_sales_report' || Auth::User()->status == 007)
               <li><a href="{{ route('daily-sales-list-page') }}" @if(isset($phead) && $phead=='slsrprtlst') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ডেইলি সেলস রিপোর্ট @else Daily Sales Report @endif</a></li>
               @endif
               @if($bike_reading_report == 'bike_reading_report' || Auth::User()->status == 007)
               <li><a href="{{ route('bike-reading-list-page') }}" @if(isset($phead) && $phead=='bikeread') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) বাইক রিডিং রিপোর্ট @else Bike Reading Report @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->requisition_record || Auth::User()->status == 007)
         <li class="treeview @if(isset($mhead) && $mhead=='requisition') menu-open @endif">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) রিকুইজিশন @else Requisition @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='requisition') style="display: block;" @endif>
               @if($requisition_create == 'requisition_create' || Auth::User()->status == 007)
               <li><a href="{{route('requisition-create-route')}}" @if(isset($phead) && $phead=='req_create') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) রিকুইজিশন ক্রিয়েট @else Requisition Create @endif </a></li>
               @endif
               @if($all_requisitions == 'all_requisitions' || Auth::User()->status == 007)
               <li><a href="{{route('requisition-list-route')}}" @if(isset($phead) && $phead=='req_list') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) সব রিকুইজিশন @else All Requisitions @endif </a></li>
               @endif
               @if($approve_requisitions == 'approve_requisitions' || Auth::User()->status == 007)
               <li><a href="{{route('requisition-aprrovelist-route')}}" @if(isset($phead) && $phead=='req_app_list') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এপ্রুভ রিকুইজিশন @else Approve Requisitions @endif </a></li>
               @endif
               @if($pending_requisitions == 'pending_requisitions' || Auth::User()->status == 007)
               <li><a href="{{route('requisition-pendinglist-route')}}" @if(isset($phead) && $phead=='req_pen_list') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) পেন্ডিং রিকুইজিশন @else Pending Requisitions @endif </a></li>
               @endif
               {{-- <li><a href="{{route('requisitionreturn')}}" @if(isset($phead) && $phead=='return_requi') class="active" @endif><i class="fa fa-caret-right"></i>Return Requisitions </a></li> --}}
               {{-- <li><a href="{{route('returnrequisition-list-route')}}" @if(isset($phead) && $phead=='return_req_list') class="active" @endif><i class="fa fa-caret-right"></i>Return Requisitions list</a></li> --}}
               {{-- <li><a href="{{route('requisition-balancelist-route')}}" @if(isset($phead) && $phead=='balance_list') class="active" @endif><i class="fa fa-caret-right"></i>Balance list</a></li> --}}
               
            </ul>
         </li>
         @endif
         @if(Auth::User()->purchase || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='purchase') menu-open @endif>
            <a href="#">
            <i class="fa fa-shopping-basket ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) পারচেস @else Purchase @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='purchase') style="display: block;" @endif>
               @if($purchase_invoice == 'purchase_invoice' || Auth::User()->status == 007)
               <li><a href="{{ route('purchase-list-page') }}" @if(isset($phead) && $phead=='puri') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) পারচেস ইনভয়েস @else Purchase Invoice @endif</a></li>
               @endif
               @if($purchase_invoice_create == 'purchase_invoice_create' || Auth::User()->status == 007)
               <li><a href="{{ route('purchase-create-page') }}" @if(isset($phead) && $phead=='puric') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) পারচেস ইনভয়েস ক্রিয়েট @else Purchase Invoice Create @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->material_use || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='material') menu-open @endif>
            <a href="#">
            <i class="fa fa-shopping-bag ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) মেটেরিয়াল ইউস ও সেলস @else Materials Use &amp; Sales @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='material') style="display: block;" @endif>
               @if($create_material_use_record == 'create_material_use_record' || Auth::User()->status == 007)
               <li><a href="{{ route('materialuse-create-page') }}" @if(isset($phead) && $phead=='mur') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) ক্রিয়েট মেটেরিয়ালস ইউস-রেকর্ড @else Create Materials Use-Record @endif</a></li>
               @endif
               @if($material_send_for_use == 'material_send_for_use' || Auth::User()->status == 007)
               <li><a href="{{ route('view_material-record-list') }}" @if(isset($phead) && $phead=='msfu') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) মেটেরিয়াল সেন্ড ফর ইউস @else Materials Send For Use @endif</a></li>
               @endif
               @if($sales_invoice == 'sales_invoice' || Auth::User()->status == 007)
               <li><a href="{{ route('sales-list-page') }}" @if(isset($phead) && $phead=='si') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সেলস ইনভয়েস @else Sales Invoice @endif</a></li>
               @endif
               @if($sales_invoice_create == 'sales_invoice_create' || Auth::User()->status == 007)
               <li><a href="{{ route('sales-create-page') }}" @if(isset($phead) && $phead=='sic') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সেলস ইনভয়েস ক্রিয়েট @else Sales Invoice Create @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->inventory || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='inventory') menu-open @endif>
            <a href="#">
            <i class="fa fa-barcode ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ইনভেন্টরি @else Inventory @endif</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='inventory') style="display: block;" @endif>
               @if($product_delivery == 'product_delivery' || Auth::User()->status == 007)
               <li><a href="{{route('prodelivery-list')}}" @if(isset($phead) && $phead=='prod') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোডাক্ট ডেলিভারি @else Product Delivery @endif</a></li>
               @endif
               @if($product_received == 'product_received' || Auth::User()->status == 007)
               <li><a href="{{route('proreceive-list')}}" @if(isset($phead) && $phead=='pror') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোডাক্ট রিসিভড @else Product Received @endif</a></li>
               @endif
               @if($branch_stock == 'branch_stock' || Auth::User()->status == 007)
               <li><a href="{{route('bstock-list')}}" @if(isset($phead) && $phead=='branchs') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ব্রাঞ্চ স্টক @else Branch Stock @endif</a></li>
               @endif
               @if($warehouse_stock == 'warehouse_stock' || Auth::User()->status == 007)
               <li><a href="{{route('whstock-list')}}" @if(isset($phead) && $phead=='warehs') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ওয়্যারহাউস স্টক @else Warehouse Stock @endif</a></li>
               @endif
               {{-- <li><a href="{{route('combinedstock-list')}}"><i class="fa fa-caret-right"></i> Combined Stock</a></li> --}}
               @if($transfer_from_branch == 'transfer_from_branch' || Auth::User()->status == 007)
               <li><a href="{{ route('branch-transfer-stock-list') }}" @if(isset($phead) && $phead=='brancht') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ব্রাঞ্ছ থেকে ট্রান্সফার @else Transfer From Branch @endif</a></li>
               @endif
               @if($transfer_from_warehouse == 'transfer_from_warehouse' || Auth::User()->status == 007)
               <li><a href="{{ route('warehouse-transfer-stock-list') }}" @if(isset($phead) && $phead=='wareht') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ওয়্যারহাউস থেকে ট্রান্সফার @else Transfer From Warehouse @endif</a></li>
               @endif
               {{-- <li><a href="#"><i class="fa fa-caret-right"></i> Product Disposal</a></li> --}}
            </ul>
         </li>
         @endif
         @if(Auth::User()->client || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='client') menu-open @endif>
            <a href="#">
            <i class="fa fa-handshake-o ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ক্লায়েন্ট/ডিপার্টমেন্ট সেটাপ @else Client/Department Setup @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='client') style="display: block;" @endif>
               @if($client_department_list == 'client_department_list' || Auth::User()->status == 007)
               <li><a href="{{route('customer-list')}}" @if(isset($phead) && $phead=='cl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ক্লায়েন্ট/ডিপার্টমেন্ট লিস্ট @else Client/Department List @endif</a></li>
               @endif
               @if($add_client_department == 'add_client_department' || Auth::User()->status == 007)
               <li><a href="{{route('customer-create-route')}}" @if(isset($phead) && $phead=='ccustomer') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ক্লায়েন্ট/ডিপার্টমেন্ট @else Add Client/Department @endif</a></li>
               @endif
               @if($supplier_list == 'supplier_list' || Auth::User()->status == 007)
               <li><a href="{{route('supplier-list')}}" @if(isset($phead) && $phead=='sl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাপ্লায়ার লিস্ট @else Supplier List @endif</a></li>
               @endif
               @if($add_supplier == 'add_supplier' || Auth::User()->status == 007)
               <li><a href="{{route('supplier-create-route')}}" @if(isset($phead) && $phead=='sc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড সাপ্লায়ার @else Add Supplier @endif</a></li>
               @endif
               @if($all_group == 'all_group' || Auth::User()->status == 007)
               <li><a href="{{route('group-list')}}" @if(isset($phead) && $phead=='allg') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সব গ্রুপ @else All Group @endif</a></li>
               @endif
               @if($add_group == 'add_group' || Auth::User()->status == 007)
               <li><a href="{{route('group-create-route')}}" @if(isset($phead) && $phead=='gc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড গ্রুপ @else Add Group @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->product || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='product') menu-open @endif>
            <a href="#">
            <i class="fa fa-shopping-cart ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) প্রোডাক্ট সেটাপ @else Product Setup @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='product') style="display: block;" @endif>
               @if($category_list == 'category_list' || Auth::User()->status == 007)
               <li><a href="{{route('category-list')}}" @if(isset($phead) && $phead=='catl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ক্যাটেগরি লিস্ট @else Category List @endif</a></li>
               @endif
               @if($category_create == 'category_create' || Auth::User()->status == 007)
               <li><a href="{{route('category-create-route')}}" @if(isset($phead) && $phead=='catc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ক্যাটেগরি ক্রিয়েট @else Category Create @endif</a></li>
               @endif
               @if($subcategory_list == 'subcategory_list' || Auth::User()->status == 007)
               <li><a href="{{route('subcategory-list')}}" @if(isset($phead) && $phead=='scatl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি লিস্ট @else Sub-Category List @endif</a></li>
               @endif
               @if($subcategory_create == 'subcategory_create' || Auth::User()->status == 007)
               <li><a href="{{route('subcategory-create-route')}}" @if(isset($phead) && $phead=='scatc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাব-ক্যাটেগরি ক্রিয়েট @else Sub-Category Create @endif</a></li>
               @endif
               @if($product_list == 'product_list' || Auth::User()->status == 007)
               <li><a href="{{route('product-list')}}" @if(isset($phead) && $phead=='prol') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) প্রোডাক্ট লিস্ট @else Product List @endif</a></li>
               @endif
               @if($add_new_product == 'add_new_product' || Auth::User()->status == 007)
               <li><a href="{{route('product-create-route')}}" @if(isset($phead) && $phead=='proc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড নিউ প্রোডাক্ট @else Add New Product @endif</a></li>
               @endif
            </ul>
         </li>
         @endif

         
         <li class="treeview" @if(isset($mhead) && $mhead=='raw_material') menu-open @endif>
            <a href="#">
            <i class="fa fa-shopping-cart ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) রো ম্যাটেরিয়াল @else Raw Materials @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='raw_material') style="display: block;" @endif>
               <li><a href="{{route('rawmaterial-list')}}" @if(isset($phead) && $phead=='raw_materiallist') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) রো ম্যাটেরিয়াল লিস্ট @else Raw Material List @endif</a></li>
               <li><a href="{{route('rawmaterial-purchase')}}" @if(isset($phead) && $phead=='material_purchase') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 )  ম্যাটেরিয়াল পারচেস @else Material Purchase @endif</a></li>
               <li><a href="{{route('material_stock')}}" @if(isset($phead) && $phead=='raw_materialstock') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 )  ম্যাটেরিয়াল স্টক @else Material Stock @endif</a></li>
               <li><a href="{{route('other_rawmaterial')}}" @if(isset($phead) && $phead=='other_materiallist') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 )  অন্যান্য এক্সপেন্স @else Other Expense @endif</a></li>
               <li><a href="{{route('rawproduct_create')}}" @if(isset($phead) && $phead=='rawproduct_create') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 )  রো প্রোডাক্ট ক্রিয়েট @else Raw Product Create @endif</a></li>
            </ul>
         </li>


         @if(Auth::User()->master || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='master') menu-open @endif>
            <a href="#">
            <i class="fa fa-sun-o ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) মাস্টার সেটাপ @else Master Setup @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='master') style="display: block;" @endif>
               <li><a href="{{route('brand-list')}}" @if(isset($phead) && $phead=='bl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ব্র্যান্ড লিস্ট @else Brand List @endif</a></li>
               <li><a href="{{route('brand-create-route')}}" @if(isset($phead) && $phead=='bc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ব্র্যান্ড @else Add Brand @endif</a></li>
               <li><a href="{{route('manufacture-list')}}" @if(isset($phead) && $phead=='ml') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ম্যানুফেকচারার লিস্ট @else Manufacturer List @endif</a></li>
               <li><a href="{{route('manufacture-create-route')}}" @if(isset($phead) && $phead=='mc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ম্যানুফেকচারার @else Add Manufacturer @endif</a></li>
               <li><a href="{{route('unit-list')}}" @if(isset($phead) && $phead=='ul') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ইউনিট লিস্ট @else Unit List @endif</a></li>
               <li><a href="{{route('unit-create-route')}}" @if(isset($phead) && $phead=='uc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ইউনিট @else Add Unit @endif</a></li>
               <li><a href="{{route('size-list')}}" @if(isset($phead) && $phead=='sizel') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাইজ লিস্ট @else Size List @endif</a></li>
               <li><a href="{{route('size-create-route')}}" @if(isset($phead) && $phead=='sizec') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এড সাইজ @else Add Size @endif</a></li>
               <li><a href="{{route('currency-list')}}" @if(isset($phead) && $phead=='currl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) কারেন্সি লিস্ট @else Currency List @endif</a></li>
               <li><a href="{{route('currency-create-route')}}" @if(isset($phead) && $phead=='currc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড কারেন্সি @else Add Currency @endif</a></li>
               <li><a href="{{route('country-list')}}" @if(isset($phead) && $phead=='counl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) দেশের লিস্ট @else Country List @endif</a></li>
               <li><a href="{{route('country-create-route')}}" @if(isset($phead) && $phead=='counc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) দেশ যুক্তকরন @else Add Country @endif</a></li>
               {{-- <li><a href="{{route('transport-list')}}" @if(isset($phead) && $phead=='tranl') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) ট্রান্সপোর্টার লিস্ট @else Transporter List @endif</a></li>
               <li><a href="{{route('transport-create-route')}}" @if(isset($phead) && $phead=='tranc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ট্রান্সপোর্টার @else Add Transporter @endif</a></li> --}}
               <li><a href="{{route('color-list')}}" @if(isset($phead) && $phead=='colorl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) কালার লিস্ট @else Color List @endif</a></li>
               <li><a href="{{route('color-create-route')}}" @if(isset($phead) && $phead=='colorc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড কালার @else Add Color @endif</a></li>
               <li><a href="{{route('district-list')}}" @if(isset($phead) && $phead=='disl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) জেলার লিস্ট @else District List @endif</a></li>
               <li><a href="{{route('district-create-route')}}" @if(isset($phead) && $phead=='disc') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) জেলা যুক্তকরন @else Add District @endif</a></li>
               <li><a href="{{route('zone-list')}}" @if(isset($phead) && $phead=='zonel') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) জোন লিস্ট @else Zone List @endif</a></li>
               <li><a href="{{route('zone-create-route')}}" @if(isset($phead) && $phead=='zonec') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এড জোন @else Add Zone @endif</a></li>
               </ul>
         </li>
         @endif
         @if(Auth::User()->account || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='account') menu-open @endif>
            <a href="#">
            <i class="fa fa-money ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) একাউন্ট সেটাপ @else Accounts Setup @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='account') style="display: block;" @endif>
               @if($ac_class == 'ac_class' || Auth::User()->status == 007)
              <li><a href="{{route('class-list')}}" @if(isset($phead) && $phead=='class') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ক্লাস @else Class @endif</a></li>
               @endif
               @if($ac_group_list == 'ac_group_list' || Auth::User()->status == 007)
              <li><a href="{{route('acc-group-list')}}" @if(isset($phead) && $phead=='grpl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) গ্রুপ লিস্ট @else Group List @endif</a></li>
               @endif
               @if($ac_group_create == 'ac_group_create' || Auth::User()->status == 007)
              <li><a href="{{route('acc-group-create-route')}}" @if(isset($phead) && $phead=='grpc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) গ্রুপ ক্রিয়েট @else Group Cteate @endif</a></li>
               @endif
               @if($ac_subgroup_list == 'ac_subgroup_list' || Auth::User()->status == 007)
              <li><a href="{{route('subgroup-list')}}" @if(isset($phead) && $phead=='subgrpl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাব-গ্রুপ লিস্ট @else Sub-Group List @endif</a></li>
               @endif
               @if($ac_subgroup_create == 'ac_subgroup_create' || Auth::User()->status == 007)
              <li><a href="{{route('subgroup-create-route')}}" @if(isset($phead) && $phead=='subgrpc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) সাব-গ্রুপ ক্রিয়েট @else Sub-Group Create @endif</a></li>
               @endif
               @if($ac_ledger_list == 'ac_ledger_list' || Auth::User()->status == 007)
              <li><a href="{{route('ledger-list')}}" @if(isset($phead) && $phead=='ledgrl') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লেদজার লিস্ট @else Ledger List @endif</a></li>
               @endif
               @if($ac_ledger_create == 'ac_ledger_create' || Auth::User()->status == 007)
              <li><a href="{{route('ledger-create-route')}}" @if(isset($phead) && $phead=='ledgrc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) লেদজার ক্রিয়েট @else Ledger Create @endif</a></li>
               @endif
               @if($ac_payment_voucherlist == 'ac_payment_voucherlist' || Auth::User()->status == 007)
              <li><a href="{{route('paymentvouchar-list')}}" @if(isset($phead) && $phead=='payl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) পেইমেন্ট ভাউচার লিস্ট @else Payment Voucher List @endif</a></li>
               @endif
               @if($ac_payment_vouchercreate == 'ac_payment_vouchercreate' || Auth::User()->status == 007)
              <li><a href="{{route('paymentvouchar-create-route')}}" @if(isset($phead) && $phead=='payc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) পেইমেন্ট ভাউচার ক্রিয়েট @else Payment Voucher Create @endif</a></li>
               @endif
               @if($ac_receive_voucherlist == 'ac_receive_voucherlist' || Auth::User()->status == 007)
              <li><a href="{{route('receivevoucher-list')}}" @if(isset($phead) && $phead=='recl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) রিসিভ ভাউচার লিস্ট @else Receive Voucher List @endif</a></li>
               @endif
               @if($ac_receive_vouchercreate == 'ac_receive_vouchercreate' || Auth::User()->status == 007)
              <li><a href="{{route('receivevoucher-create-route')}}" @if(isset($phead) && $phead=='recc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) রিসিভ ভাউচার ক্রিয়েট @else Receive Voucher Create @endif</a></li>
               @endif
               @if($ac_journal_entrylist == 'ac_journal_entrylist' || Auth::User()->status == 007)
              <li><a href="{{route('journal-list')}}" @if(isset($phead) && $phead=='jourl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) জার্নাল এনট্রি লিস্ট @else Journal Entry List @endif</a></li>
               @endif
               @if($ac_journal_entrycreate == 'ac_journal_entrycreate' || Auth::User()->status == 007)
              <li><a href="{{route('journallist-create-route')}}" @if(isset($phead) && $phead=='jourc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) জার্নাল এনট্রি ক্রিয়েট @else Journal Entry Create @endif</a></li>
               @endif
           </ul>
         </li>
         @endif
         @if(Auth::User()->loan || Auth::User()->status == 007)
         <li class="treeview @if(isset($mhead) && $mhead=='loan') menu-open @endif">
            <a href="#">
            <i class="fa fa-credit-card ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ইন্সটলমেন্ট ও লন সেটাপ @else Installment &amp; Loan Setup @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu"  @if(isset($mhead) && $mhead=='loan') style="display: block;" @endif>
               @if($loan_id_list == 'loan_id_list' || Auth::User()->status == 007)
               <li><a href="{{route('loan-list-route')}}" @if(isset($phead) && $phead=='loanlist') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন আইডি লিস্ট @else Loan ID List @endif</a></li>
               @endif
               @if($loan_id_create == 'loan_id_create' || Auth::User()->status == 007)
               <li><a href="{{route('loan-create-route')}}" @if(isset($phead) && $phead=='loancreate') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন আইডি ক্রিয়েট @else Loan ID Create @endif</a></li>
               @endif
               @if($loan_invoice_list == 'loan_invoice_list' || Auth::User()->status == 007)
               <li><a href="{{route('loaninvoice-list-route')}}" @if(isset($phead) && $phead=='loaninvlist') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন ইনভয়েস লিস্ট @else Loan Invoice List @endif</a></li>
               @endif
               @if($loan_invoice_create == 'loan_invoice_create' || Auth::User()->status == 007)
               <li><a href="{{route('loaninvoice-create-route')}}" @if(isset($phead) && $phead=='loaninvcreate') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন ইনভয়েস ক্রিয়েট @else Loan Invoice Create @endif</a></li>
               @endif
               @if($loan_payment == 'loan_payment' || Auth::User()->status == 007)
               <li><a href="{{route('loanpayment-create-route')}}" @if(isset($phead) && $phead=='loanpayment') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন পেইমেন্ট @else Loan Payment @endif</a></li>
               @endif
               @if($loan_receive == 'loan_receive' || Auth::User()->status == 007)
               <li><a href="{{route('loanreceive-create-route')}}" @if(isset($phead) && $phead=='loanreceive') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) লন রিসিভ @else Loan Receive @endif</a></li>
               @endif
               
            </ul>
         </li>
         @endif
         @if(Auth::User()->lc || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='lcsetup') menu-open @endif>
           <a href="#">
           <i class="fa fa-credit-card ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) এলসি সেটাপ @else LC Setup @endif</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu" @if(isset($mhead) && $mhead=='lcsetup') style="display: block;" @endif>
              {{-- <li><a href="{{route('lc-port-setup')}}"><i class="fa fa-caret-right"></i>Port Setup</a></li>
              <li><a href="{{route('lc-cost-type')}}"><i class="fa fa-caret-right"></i>Cost Type</a></li> --}}
               @if($pi_list == 'pi_list' || Auth::User()->status == 007)
              <li><a href="{{route('lc-list-pi')}}" @if(isset($phead) && $phead=='pil') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) পিআই লিস্ট @else PI List @endif</a></li>
               @endif
               @if($pi_setup == 'pi_setup' || Auth::User()->status == 007)
              <li><a href="{{route('lc-create-pi')}}" @if(isset($phead) && $phead=='pi') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) পিআই সেটাপ @else PI Setup @endif</a></li>
               @endif
               @if($lc_list == 'lc_list' || Auth::User()->status == 007)
              <li><a href="{{route('list-lc-setup')}}" @if(isset($phead) && $phead=='lcsetupl') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এলসি লিস্ট @else LC List @endif</a></li>
               @endif
               @if($lc_setup == 'lc_setup' || Auth::User()->status == 007)
              <li><a href="{{route('create-lc-setup')}}" @if(isset($phead) && $phead=='lcsetupc') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এলসি সেটাপ @else LC Setup @endif</a></li>
               @endif
             
           </ul>
        </li>
         @endif
        @if(Auth::User()->financial || Auth::User()->status == 007)
        <!-- <li class="treeview" @if(isset($mhead) && $mhead=='finance') menu-open @endif>
           <a href="#">
           <i class="fa fa-bar-chart ani_icon"></i> <span>Finance Record</span>
           <span class="pull-right-container">
           <i class="fa fa-angle-left pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu" @if(isset($mhead) && $mhead=='finance') style="display: block;" @endif>
              <li><a href="{{ route('finance_chart_of_account') }}" @if(isset($phead) && $phead=='coa') class="active" @endif><i class="fa fa-caret-right"></i> Chart of Account</a></li>
              <li><a href="{{ route('finance_profit_and_loss') }}" @if(isset($phead) && $phead=='pal') class="active" @endif><i class="fa fa-caret-right"></i> Profit And Loss</a></li>
              <li><a href="{{ route('finance_trial_balance') }}" @if(isset($phead) && $phead=='tb') class="active" @endif><i class="fa fa-caret-right"></i>Trial Balance </a></li>
              <li><a href="{{ route('finance_balance_sheet') }}" @if(isset($phead) && $phead=='bs') class="active" @endif><i class="fa fa-caret-right"></i> Balance Sheet</a></li>
              {{-- <li><a href="#"><i class="fa fa-caret-right"></i> Finance Analysis</a></li> --}}
           </ul>
        </li> -->
        @endif
         @if(Auth::User()->payroll || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='payroll') menu-open @endif>
            <a href="#">
            <i class="fa fa-clock-o ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) পেইরোল @else Payroll @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='payroll') style="display: block;" @endif>
               @if($department_list == 'department_list' || Auth::User()->status == 007)
               <li><a href="{{ route('department-list-page') }}" @if(isset($phead) && $phead=='dl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ডিপার্টমেন্ট লিস্ট @else Department List @endif</a></li>
               @endif
               @if($add_department == 'add_department' || Auth::User()->status == 007)
               <li><a href="{{ route('department-create-page') }}" @if(isset($phead) && $phead=='dc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ডিপার্টমেন্ট @else Add Department @endif</a></li>
               @endif
               @if($designation_list == 'designation_list' || Auth::User()->status == 007)
               <li><a href="{{ route('designation-list-page') }}" @if(isset($phead) && $phead=='degl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ডেজিগনেসন লিস্ট @else Designation List @endif</a></li>
               @endif
               @if($add_designation == 'add_designation' || Auth::User()->status == 007)
               <li><a href="{{ route('designation-create-page') }}" @if(isset($phead) && $phead=='degc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ডেজিগনেসন @else Add Designation @endif</a></li>
               @endif
               @if($employee_list == 'employee_list' || Auth::User()->status == 007)
               <li><a href="{{ route('employee-list-page') }}" @if(isset($phead) && $phead=='empl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ইমপ্লয়ি লিস্ট @else Employee List @endif </a></li>
               @endif
               @if($add_employee == 'add_employee' || Auth::User()->status == 007)
               <li><a href="{{ route('employee-create-page') }}" @if(isset($phead) && $phead=='empc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ইমপ্লয়ি @else Add Employee @endif</a></li>
               @endif
               @if($leave_type == 'leave_type' || Auth::User()->status == 007)
               <li><a href="{{ route('leavetype-list-page') }}" @if(isset($phead) && $phead=='lt') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) লিভ টাইপ @else Leave Type @endif</a></li>
               @endif
               @if($add_leave_type == 'add_leave_type' || Auth::User()->status == 007)
               <li><a href="{{ route('leavetype-create-page') }}" @if(isset($phead) && $phead=='ltc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড লিভ টাইপ @else Add Leave Type @endif</a></li>
               @endif
               @if($leav_record == 'leav_record' || Auth::User()->status == 007)
               <li><a href="{{ route('leaveapp-list-page') }}" @if(isset($phead) && $phead=='lar') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) লিভ রেকর্ড @else Leave Record @endif</a></li>
               @endif
               @if($add_leave_application == 'add_leave_application' || Auth::User()->status == 007)
               <li><a href="{{ route('leaveapp-create-page') }}" @if(isset($phead) && $phead=='ala') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড লিভ অ্যাপ্লিকেশান @else Add Leave Application @endif</a></li>
               @endif
               @if($sallery_list == 'sallery_list' || Auth::User()->status == 007)
               <li><a href="{{ route('salary-list-page') }}" @if(isset($phead) && $phead=='salarycreate') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) স্যালারি লিস্ট @else Salary List @endif</a></li>
               @endif
               @if($sallery_payslip == 'sallery_payslip' || Auth::User()->status == 007)
               <li><a href="{{ route('payslip-list-page') }}" @if(isset($phead) && $phead=='payrollcreate') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) স্যালারি পেইস্লিপ @else Salary Payslip @endif </a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->bank  || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='bank') menu-open @endif>
            <a href="#">
            <i class="fa fa-credit-card-alt ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ব্যাংক @else Bank @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='bank') style="display: block;" @endif>
               @if($bank_list == 'bank_list' || Auth::User()->status == 007)
              <li><a href="{{ route('create-bank-list') }}" @if(isset($phead) && $phead=='bankl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ব্যাংক লিস্ট @else Bank List @endif</a></li>
               @endif
               @if($add_bank == 'add_bank' || Auth::User()->status == 007)
              <li><a href="{{ route('create-bank-page') }}" @if(isset($phead) && $phead=='bankc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ব্যাংক @else Add Bank @endif</a></li>
               @endif
               @if($bank_account == 'bank_account' || Auth::User()->status == 007)
              <li><a href="{{ route('create-bankaccount-list') }}" @if(isset($phead) && $phead=='accl') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) ব্যাংক একাউন্ট @else Bank Account @endif</a></li>
               @endif
               @if($add_bank_account == 'add_bank_account' || Auth::User()->status == 007)
              <li><a href="{{ route('create-bankaccount-page') }}" @if(isset($phead) && $phead=='accc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ব্যাংক একাউন্ট @else Add Bank Account @endif</a></li>
               @endif
               @if($mobile_account == 'mobile_account' || Auth::User()->status == 007)
              <li><a href="{{ route('mobileaccount-list') }}" @if(isset($phead) && $phead=='mobl') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) মোবাইল একাউন্ট @else Mobile Account @endif</a></li>
               @endif
               @if($add_mobile_account == 'add_mobile_account' || Auth::User()->status == 007)
              <li><a href="{{ route('create-mobileaccount-page') }}" @if(isset($phead) && $phead=='mobc') class="active" @endif><i class="fa fa-caret-right"></i>@if ( Auth::User()->language == 1 ) এড মোবাইল একাউন্ট @else Add Mobile Account @endif</a></li>
               @endif
               @if($all_transaction == 'all_transaction' || Auth::User()->status == 007)
              <li><a href="{{ route('banktransaction-list') }}" @if(isset($phead) && $phead=='alltran') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) অল ট্রানজেক্সন @else All Transaction @endif</a></li>
               @endif
               @if($add_transaction == 'add_transaction' || Auth::User()->status == 007)
              <li><a href="{{ route('banktransaction-create-route') }}" @if(isset($phead) && $phead=='alltranc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ট্রানজেক্সন @else Add Transaction @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         @if(Auth::User()->personal || Auth::User()->status == 007)
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
         @endif
         @if(Auth::User()->report || Auth::User()->status == 007)
         <li> <a href="{{ route('report-all') }}"><i class="fa fa-pie-chart ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) রিপোর্ট @else Report @endif</span></a></li>
         @endif
         @if(Auth::User()->user_role || Auth::User()->status == 007)
         <li class="treeview" @if(isset($mhead) && $mhead=='urole') menu-open @endif>
            <a href="#">
            <i class="fa fa-address-card-o ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) ইউজার ও রোল @else User &amp; Role @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='urole') style="display: block;" @endif>
               @if($role_list == 'role_list' || Auth::User()->status == 007)
               <li><a href="{{ route('role-list-page') }}" @if(isset($phead) && $phead=='rolel') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) রোল লিস্ট @else Role List @endif</a></li>
               @endif
               @if($add_role == 'add_role' || Auth::User()->status == 007)
               <li><a href="{{ route('role-create-page') }}" @if(isset($phead) && $phead=='rolec') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড রোল @else Add Role @endif</a></li>
               @endif
               @if($all_user == 'all_user' || Auth::User()->status == 007)
               <li><a href="{{ route('user-list-page') }}" @if(isset($phead) && $phead=='alluser') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) অল ইউজার @else All User @endif</a></li>
               @endif
               @if($add_user == 'add_user' || Auth::User()->status == 007)
               <li><a href="{{ route('user-create-page') }}" @if(isset($phead) && $phead=='alluserc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) এড ইউজার @else Add User @endif</a></li>
               @endif
            </ul>
         </li>
         @endif
         <li class="treeview" @if(isset($mhead) && $mhead=='company') menu-open @endif>
            <a href="#">
            <i class="fa fa-industry ani_icon"></i> <span>@if ( Auth::User()->language == 1 ) কোম্পানি ও সেটিংস @else Company &amp; Setting  @endif</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" @if(isset($mhead) && $mhead=='company') style="display: block;" @endif>
               <li><a href="{{ route('company-create-setup') }}" @if(isset($phead) && $phead=='csetup') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) কোম্পানি সেটাপ @else Company Setup @endif</a></li>
               <!--<li><a href="{{ route('local-create-setup') }}" @if(isset($phead) && $phead=='lsetup') class="active" @endif><i class="fa fa-caret-right"></i> Local Setting</a></li>-->
               <li><a href="{{route('branch-list')}}" @if(isset($phead) && $phead=='branch') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ব্রাঞ্চ @else Branch @endif</a></li>
               <li><a href="{{route('warehouse-list')}}" @if(isset($phead) && $phead=='wareh') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ওয়্যারহাউস @else Warehouse @endif</a></li>
               <li><a href="{{route('warehouse-create-route')}}" @if(isset($phead) && $phead=='warehc') class="active" @endif><i class="fa fa-caret-right"></i> @if ( Auth::User()->language == 1 ) ওয়্যারহাউস ক্রিয়েট @else Warehouse Create @endif</a></li>
            </ul>
         </li>
      </ul>
   </section>
</aside>
