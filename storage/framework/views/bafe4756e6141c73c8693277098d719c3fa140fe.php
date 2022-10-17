
<aside class="main-sidebar">
   <section class="sidebar">
      <ul class="sidebar-menu tree" data-widget="tree">
         <li> <a href="<?php echo e(route('home')); ?>" <?php if(isset($phead) && $phead=='dashboard'): ?> class="active" <?php endif; ?>><i class="fa fa-dashboard ani_icon"></i> <span>Dashboard</span></a></li>
          <?php if(Auth::User()->manage_project || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='project'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-folder-open-o ani_icon"></i> <span>Manage Project</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='project'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('progroup-list-create')); ?>" <?php if(isset($phead) && $phead=='prgl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Group</a></li>
               <li><a href="<?php echo e(route('progroup-page-create')); ?>"  <?php if(isset($phead) && $phead=='prgc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Group Create</a></li>
               <li><a href="<?php echo e(route('prosubgroup-list-create')); ?>" <?php if(isset($phead) && $phead=='prsgl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Sub-Group</a></li>
               <li><a href="<?php echo e(route('prosubgroup-page-create')); ?>" <?php if(isset($phead) && $phead=='prsgc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Sub-Group Create</a></li>
               <li><a href="<?php echo e(route('project-type-list-page')); ?>" <?php if(isset($phead) && $phead=='prt'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Type</a></li>
               <li><a href="<?php echo e(route('project-type-create-page')); ?>" <?php if(isset($phead) && $phead=='prtc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Type Create</a></li>
               <li><a href="<?php echo e(route('project-contractor-list-page')); ?>" <?php if(isset($phead) && $phead=='prcl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Contractor List</a></li>
               <li><a href="<?php echo e(route('project-contractor-create-page')); ?>" <?php if(isset($phead) && $phead=='prcc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add contractor</a></li>
               <li><a href="<?php echo e(route('project-list-page')); ?>" <?php if(isset($phead) && $phead=='prr'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Project Record</a></li>
               <li><a href="<?php echo e(route('project-create-page')); ?>" <?php if(isset($phead) && $phead=='prc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add New Project </a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->daily_process || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='daily'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span>Daily Process</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='daily'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('daily-expense-list')); ?>" <?php if(isset($phead) && $phead=='dexr'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Daily Expense</a></li>
               <li><a href="<?php echo e(route('daily-expense-create-route')); ?>" <?php if(isset($phead) && $phead=='dexc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Daily Expenses Create</a></li>
               <li><a href="<?php echo e(route('expense-list')); ?>" <?php if(isset($phead) && $phead=='der'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Expenses Record</a></li>
               <li><a href="<?php echo e(route('expense-create-route')); ?>" <?php if(isset($phead) && $phead=='dec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Create Expenses</a></li>
               <li><a href="<?php echo e(route('expense-head-list')); ?>" <?php if(isset($phead) && $phead=='deh'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Expenses Head</a></li>
               <li><a href="<?php echo e(route('expense-head-create-route')); ?>" <?php if(isset($phead) && $phead=='dehc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Expenses Head</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='requisition'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-edit ani_icon"></i> <span>Requisition</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='requisition'): ?> style="display: block;" <?php endif; ?>>
                 <?php if(Auth::User()->requisition_create || Auth::User()->status == 007): ?>
                  <li><a href="<?php echo e(route('requisition-create-route')); ?>" <?php if(isset($phead) && $phead=='req_create'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Requisition Create </a></li>
                 <?php endif; ?>
                <?php if(Auth::User()->requisition_record || Auth::User()->status == 007): ?>
                 <li><a href="<?php echo e(route('requisition-list-route')); ?>" <?php if(isset($phead) && $phead=='req_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>All Requisitions </a></li>
                 <li><a href="<?php echo e(route('requisition-aprrovelist-route')); ?>" <?php if(isset($phead) && $phead=='req_app_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Approve Requisitions </a></li>
                 <li><a href="<?php echo e(route('requisition-pendinglist-route')); ?>" <?php if(isset($phead) && $phead=='req_pen_list'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Pending Requisitions </a></li>
                 
                 
                 
                <?php endif; ?>
               
            </ul>
         </li>
         <?php if(Auth::User()->purchase || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='purchase'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-basket ani_icon"></i> <span>Purchase</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='purchase'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('purchase-list-page')); ?>" <?php if(isset($phead) && $phead=='puri'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Purchase Invoice</a></li>
               <li><a href="<?php echo e(route('purchase-create-page')); ?>" <?php if(isset($phead) && $phead=='puric'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Purchase Invoice Create</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->material_use || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='material'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-bag ani_icon"></i> <span>Materials Use &amp; Sales</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='material'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('materialuse-create-page')); ?>" <?php if(isset($phead) && $phead=='mur'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Create Materials Use-Record</a></li>
               <li><a href="<?php echo e(route('view_material-record-list')); ?>" <?php if(isset($phead) && $phead=='msfu'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Materials Send For Use</a></li>
               <li><a href="<?php echo e(route('sales-list-page')); ?>" <?php if(isset($phead) && $phead=='si'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sales Invoice</a></li>
               <li><a href="<?php echo e(route('sales-create-page')); ?>" <?php if(isset($phead) && $phead=='sic'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sales Invoice Create</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->inventory || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='inventory'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-barcode ani_icon"></i> <span>Inventory</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='inventory'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('prodelivery-list')); ?>" <?php if(isset($phead) && $phead=='prod'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Product Delivery</a></li>
               <li><a href="<?php echo e(route('proreceive-list')); ?>" <?php if(isset($phead) && $phead=='pror'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Product Received</a></li>
               <li><a href="<?php echo e(route('bstock-list')); ?>" <?php if(isset($phead) && $phead=='branchs'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Branch Stock</a></li>
               <li><a href="<?php echo e(route('whstock-list')); ?>" <?php if(isset($phead) && $phead=='warehs'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Warehouse Stock</a></li>
               
               <li><a href="<?php echo e(route('branch-transfer-stock-list')); ?>" <?php if(isset($phead) && $phead=='brancht'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Transfer From Branch</a></li>
               <li><a href="<?php echo e(route('warehouse-transfer-stock-list')); ?>" <?php if(isset($phead) && $phead=='wareht'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Transfer From Warehouse</a></li>
               
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->client || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='client'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-handshake-o ani_icon"></i> <span>Client/Department Setup</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='client'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('customer-list')); ?>" <?php if(isset($phead) && $phead=='cl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Client/Department List</a></li>
               <li><a href="<?php echo e(route('customer-create-route')); ?>" <?php if(isset($phead) && $phead=='ccustomer'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Client/Department</a></li>
               <li><a href="<?php echo e(route('supplier-list')); ?>" <?php if(isset($phead) && $phead=='sl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Supplier List</a></li>
               <li><a href="<?php echo e(route('supplier-create-route')); ?>" <?php if(isset($phead) && $phead=='sc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Supplier</a></li>
               <li><a href="<?php echo e(route('group-list')); ?>" <?php if(isset($phead) && $phead=='allg'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> All Group</a></li>
               <li><a href="<?php echo e(route('group-create-route')); ?>" <?php if(isset($phead) && $phead=='gc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Group</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->product || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='product'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-shopping-cart ani_icon"></i> <span>Product Setup</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='product'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('category-list')); ?>" <?php if(isset($phead) && $phead=='catl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Category List</a></li>
               <li><a href="<?php echo e(route('category-create-route')); ?>" <?php if(isset($phead) && $phead=='catc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Category Create</a></li>
               <li><a href="<?php echo e(route('subcategory-list')); ?>" <?php if(isset($phead) && $phead=='scatl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sub-Category List</a></li>
               <li><a href="<?php echo e(route('subcategory-create-route')); ?>" <?php if(isset($phead) && $phead=='scatc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sub-Category Create</a></li>
               <li><a href="<?php echo e(route('product-list')); ?>" <?php if(isset($phead) && $phead=='prol'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Product List</a></li>
               <li><a href="<?php echo e(route('product-create-route')); ?>" <?php if(isset($phead) && $phead=='proc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add New Product</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->master || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='master'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-sun-o ani_icon"></i> <span>Master Setup</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='master'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('brand-list')); ?>" <?php if(isset($phead) && $phead=='bl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Brand List</a></li>
               <li><a href="<?php echo e(route('brand-create-route')); ?>" <?php if(isset($phead) && $phead=='bc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Brand</a></li>
               <li><a href="<?php echo e(route('manufacture-list')); ?>" <?php if(isset($phead) && $phead=='ml'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Manufacturer List</a></li>
               <li><a href="<?php echo e(route('manufacture-create-route')); ?>" <?php if(isset($phead) && $phead=='mc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Manufacturer</a></li>
               <li><a href="<?php echo e(route('unit-list')); ?>" <?php if(isset($phead) && $phead=='ul'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Unit List</a></li>
               <li><a href="<?php echo e(route('unit-create-route')); ?>" <?php if(isset($phead) && $phead=='uc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Unit</a></li>
               <li><a href="<?php echo e(route('size-list')); ?>" <?php if(isset($phead) && $phead=='sizel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Size List</a></li>
               <li><a href="<?php echo e(route('size-create-route')); ?>" <?php if(isset($phead) && $phead=='sizec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Add Size</a></li>
               <li><a href="<?php echo e(route('currency-list')); ?>" <?php if(isset($phead) && $phead=='currl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Currency List</a></li>
               <li><a href="<?php echo e(route('currency-create-route')); ?>" <?php if(isset($phead) && $phead=='currc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Currency</a></li>
               <li><a href="<?php echo e(route('country-list')); ?>" <?php if(isset($phead) && $phead=='counl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Country List</a></li>
               <li><a href="<?php echo e(route('country-create-route')); ?>" <?php if(isset($phead) && $phead=='counc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Country</a></li>
               
               <li><a href="<?php echo e(route('color-list')); ?>" <?php if(isset($phead) && $phead=='colorl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Color List</a></li>
               <li><a href="<?php echo e(route('color-create-route')); ?>" <?php if(isset($phead) && $phead=='colorc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Color</a></li>
               <li><a href="<?php echo e(route('district-list')); ?>" <?php if(isset($phead) && $phead=='disl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> District List</a></li>
               <li><a href="<?php echo e(route('district-create-route')); ?>" <?php if(isset($phead) && $phead=='disc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Add District</a></li>
               <li><a href="<?php echo e(route('zone-list')); ?>" <?php if(isset($phead) && $phead=='zonel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Zone List</a></li>
               <li><a href="<?php echo e(route('zone-create-route')); ?>" <?php if(isset($phead) && $phead=='zonec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Add Zone</a></li>
               </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->account || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='account'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-money ani_icon"></i> <span>Accounts Setup</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='account'): ?> style="display: block;" <?php endif; ?>>
              <li><a href="<?php echo e(route('class-list')); ?>" <?php if(isset($phead) && $phead=='class'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Class</a></li>
              <li><a href="<?php echo e(route('acc-group-list')); ?>" <?php if(isset($phead) && $phead=='grpl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Group List</a></li>
              <li><a href="<?php echo e(route('acc-group-create-route')); ?>" <?php if(isset($phead) && $phead=='grpc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Group Cteate</a></li>
              <li><a href="<?php echo e(route('subgroup-list')); ?>" <?php if(isset($phead) && $phead=='subgrpl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sub-Group List</a></li>
              <li><a href="<?php echo e(route('subgroup-create-route')); ?>" <?php if(isset($phead) && $phead=='subgrpc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Sub-Group Create</a></li>
              <li><a href="<?php echo e(route('ledger-list')); ?>" <?php if(isset($phead) && $phead=='ledgrl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Ledger List</a></li>
              <li><a href="<?php echo e(route('ledger-create-route')); ?>" <?php if(isset($phead) && $phead=='ledgrc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Ledger Create</a></li>
              <li><a href="<?php echo e(route('paymentvouchar-list')); ?>" <?php if(isset($phead) && $phead=='payl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Payment Voucher List</a></li>
              <li><a href="<?php echo e(route('paymentvouchar-create-route')); ?>" <?php if(isset($phead) && $phead=='payc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Payment Voucher Create</a></li>
              <li><a href="<?php echo e(route('receivevoucher-list')); ?>" <?php if(isset($phead) && $phead=='recl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Receive Voucher List</a></li>
              <li><a href="<?php echo e(route('receivevoucher-create-route')); ?>" <?php if(isset($phead) && $phead=='recc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Receive Voucher Create</a></li>
              <li><a href="<?php echo e(route('journal-list')); ?>" <?php if(isset($phead) && $phead=='jourl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Journal Entry List</a></li>
              <li><a href="<?php echo e(route('journallist-create-route')); ?>" <?php if(isset($phead) && $phead=='jourc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Journal Entry Create</a></li>
           </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->loan || Auth::User()->status == 007): ?>
         <li class="treeview <?php if(isset($mhead) && $mhead=='loan'): ?> menu-open <?php endif; ?>">
            <a href="#">
            <i class="fa fa-credit-card ani_icon"></i> <span>Installment &amp; Loan Setup</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu"  <?php if(isset($mhead) && $mhead=='loan'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('loan-list-route')); ?>" <?php if(isset($phead) && $phead=='loanlist'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan ID List</a></li>
               <li><a href="<?php echo e(route('loan-create-route')); ?>" <?php if(isset($phead) && $phead=='loancreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan ID Create</a></li>
               <li><a href="<?php echo e(route('loaninvoice-list-route')); ?>" <?php if(isset($phead) && $phead=='loaninvlist'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan Invoice List</a></li>
               <li><a href="<?php echo e(route('loaninvoice-create-route')); ?>" <?php if(isset($phead) && $phead=='loaninvcreate'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan Invoice Create</a></li>
               <li><a href="<?php echo e(route('loanpayment-create-route')); ?>" <?php if(isset($phead) && $phead=='loanpayment'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan Payment</a></li>
               <li><a href="<?php echo e(route('loanreceive-create-route')); ?>" <?php if(isset($phead) && $phead=='loanreceive'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Loan Receive</a></li>
               
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->lc || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='lcsetup'): ?> menu-open <?php endif; ?>>
           <a href="#">
           <i class="fa fa-credit-card ani_icon"></i> <span>LC Setup</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
           </a>
           <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='lcsetup'): ?> style="display: block;" <?php endif; ?>>
              
              <li><a href="<?php echo e(route('lc-list-pi')); ?>" <?php if(isset($phead) && $phead=='pil'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>PI List</a></li>
              <li><a href="<?php echo e(route('lc-create-pi')); ?>" <?php if(isset($phead) && $phead=='pi'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>PI Setup</a></li>
              <li><a href="<?php echo e(route('list-lc-setup')); ?>" <?php if(isset($phead) && $phead=='lcsetupl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>LC List</a></li>
              <li><a href="<?php echo e(route('create-lc-setup')); ?>" <?php if(isset($phead) && $phead=='lcsetupc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>LC Setup</a></li>
             
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
            <i class="fa fa-clock-o ani_icon"></i> <span>Payroll</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='payroll'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('department-list-page')); ?>" <?php if(isset($phead) && $phead=='dl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Department List</a></li>
               <li><a href="<?php echo e(route('department-create-page')); ?>" <?php if(isset($phead) && $phead=='dc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Department</a></li>
               <li><a href="<?php echo e(route('designation-list-page')); ?>" <?php if(isset($phead) && $phead=='degl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Designation List</a></li>
               <li><a href="<?php echo e(route('designation-create-page')); ?>" <?php if(isset($phead) && $phead=='degc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Designation</a></li>
               <li><a href="<?php echo e(route('employee-list-page')); ?>" <?php if(isset($phead) && $phead=='empl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Employee List </a></li>
               <li><a href="<?php echo e(route('employee-create-page')); ?>" <?php if(isset($phead) && $phead=='empc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Employee</a></li>
               <li><a href="<?php echo e(route('leavetype-list-page')); ?>" <?php if(isset($phead) && $phead=='lt'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Leave Type</a></li>
               <li><a href="<?php echo e(route('leavetype-create-page')); ?>" <?php if(isset($phead) && $phead=='ltc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Leave Type</a></li>
               <li><a href="<?php echo e(route('leaveapp-list-page')); ?>" <?php if(isset($phead) && $phead=='lar'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Leave Record</a></li>
               <li><a href="<?php echo e(route('leaveapp-create-page')); ?>" <?php if(isset($phead) && $phead=='ala'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Leave Application</a></li>
               <li><a href="<?php echo e(route('salary-create-page')); ?>" <?php if(isset($phead) && $phead=='salary'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Salary </a></li>
               <li><a href="<?php echo e(route('payslip-list-page')); ?>" <?php if(isset($phead) && $phead=='sals'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Salary Sheet &amp; Payslip</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->bank  || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='bank'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-credit-card-alt ani_icon"></i> <span>Bank</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='bank'): ?> style="display: block;" <?php endif; ?>>
              <li><a href="<?php echo e(route('create-bank-list')); ?>" <?php if(isset($phead) && $phead=='bankl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Bank List</a></li>
              <li><a href="<?php echo e(route('create-bank-page')); ?>" <?php if(isset($phead) && $phead=='bankc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Bank</a></li>
              <li><a href="<?php echo e(route('create-bankaccount-list')); ?>" <?php if(isset($phead) && $phead=='accl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Bank Account</a></li>
              <li><a href="<?php echo e(route('create-bankaccount-page')); ?>" <?php if(isset($phead) && $phead=='accc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Bank Account</a></li>
              <li><a href="<?php echo e(route('mobileaccount-list')); ?>" <?php if(isset($phead) && $phead=='mobl'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Mobile Account</a></li>
              <li><a href="<?php echo e(route('create-mobileaccount-page')); ?>" <?php if(isset($phead) && $phead=='mobc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i>Add Mobile Account</a></li>
              <li><a href="<?php echo e(route('banktransaction-list')); ?>" <?php if(isset($phead) && $phead=='alltran'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> All Transaction</a></li>
              <li><a href="<?php echo e(route('banktransaction-create-route')); ?>" <?php if(isset($phead) && $phead=='alltranc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Transaction</a></li>
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
         <li> <a href="<?php echo e(route('report-all')); ?>"><i class="fa fa-pie-chart ani_icon"></i> <span>Report</span></a></li>
         <?php endif; ?>
         <?php if(Auth::User()->user_role || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='urole'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-address-card-o ani_icon"></i> <span>User &amp; Role</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='urole'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('role-list-page')); ?>" <?php if(isset($phead) && $phead=='rolel'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Role List</a></li>
               <li><a href="<?php echo e(route('role-create-page')); ?>" <?php if(isset($phead) && $phead=='rolec'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add Role</a></li>
               <li><a href="<?php echo e(route('user-list-page')); ?>" <?php if(isset($phead) && $phead=='alluser'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> All User</a></li>
               <li><a href="<?php echo e(route('user-create-page')); ?>" <?php if(isset($phead) && $phead=='alluserc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Add User</a></li>
            </ul>
         </li>
         <?php endif; ?>
         <?php if(Auth::User()->company_set || Auth::User()->status == 007): ?>
         <li class="treeview" <?php if(isset($mhead) && $mhead=='company'): ?> menu-open <?php endif; ?>>
            <a href="#">
            <i class="fa fa-industry ani_icon"></i> <span>Company &amp; Setting </span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" <?php if(isset($mhead) && $mhead=='company'): ?> style="display: block;" <?php endif; ?>>
               <li><a href="<?php echo e(route('company-create-setup')); ?>" <?php if(isset($phead) && $phead=='csetup'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Company Setup</a></li>
               <!--<li><a href="<?php echo e(route('local-create-setup')); ?>" <?php if(isset($phead) && $phead=='lsetup'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Local Setting</a></li>-->
               <li><a href="<?php echo e(route('branch-list')); ?>" <?php if(isset($phead) && $phead=='branch'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Branch</a></li>
               <li><a href="<?php echo e(route('warehouse-list')); ?>" <?php if(isset($phead) && $phead=='wareh'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Warehouse</a></li>
               <li><a href="<?php echo e(route('warehouse-create-route')); ?>" <?php if(isset($phead) && $phead=='warehc'): ?> class="active" <?php endif; ?>><i class="fa fa-caret-right"></i> Warehouse Create</a></li>
            </ul>
         </li>
         <?php endif; ?>
      </ul>
   </section>
</aside>
<?php /**PATH /var/www/html/projects/rmc_construction/final_v5/rmc_final/resources/views/layouts/admin/aside.blade.php ENDPATH**/ ?>