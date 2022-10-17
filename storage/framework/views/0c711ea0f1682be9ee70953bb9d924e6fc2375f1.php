<?php $__env->startSection("content"); ?>
<?php
 $mhead='report';
 $phead='report';
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
            
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div style="width: 200px" class="input-group pull-right">
                                <div class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <input type="text" class="form-control search_text" placeholder="Search.." onkeyup="search_text()" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="smenu">
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i>Daily Report</a>
                                <ul class="smenu-treeview-menu">
                                
                                <li><a href="<?php echo e(route('dailycashstate-report')); ?>" ><i class="fa fa-caret-right"></i>Daily Cash Statement</a></li>
                                
                                
                                </ul>
                                </li>
                            
                                   
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>Sales</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('sales-list-report')); ?>">Sales Record (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('return-sales-list-report')); ?>">Return Record (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('customer-list-report')); ?>">Customer Wise (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('sales-item-list-report')); ?>">Item Wise</a></li>
                                        <li><a href="<?php echo e(route('sales-itemst-list-report')); ?>">Item Statement</a></li>
                                        <li><a href="<?php echo e(route('sales-reriodic-report')); ?>">Periodic Sales Record</a></li>
                                        <li><a href="<?php echo e(route('sales-overview-report')); ?>">Overview</a></li>
                                    </ul>
                                </li>
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> Account</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('ledgerstate-report')); ?>"><i class="fa fa-caret-right"></i>Ledger Statement</a></li>
                                        <li><a href="<?php echo e(route('cashstate-report')); ?>"><i class="fa fa-caret-right"></i>Cash Statement</a></li>
                                        <li><a href="<?php echo e(route('bankstate-report')); ?>p"><i class="fa fa-caret-right"></i>Bank Statement</a></li>
                                        <li><a href="<?php echo e(route('mobilestate-report')); ?>"><i class="fa fa-caret-right"></i>Mobile Statement</a></li>    
                                        <li><a href="<?php echo e(route('journalhistory-report')); ?>"><i class="fa fa-caret-right"></i>Journal History</a></li>    
                                        <li><a href="<?php echo e(route('trailbalance-report')); ?>"><i class="fa fa-caret-right"></i>Trial Balance</a></li>
                                        <li><a href="<?php echo e(route('balancesheet-report')); ?>"><i class="fa fa-caret-right"></i>Balance Sheet</a></li>
                                        <li><a href="<?php echo e(route('profitloss-report')); ?>"><i class="fa fa-caret-right"></i> Profit &amp; Loss</a></li>
                                        <li><a href="<?php echo e(route('accountoverview-report')); ?>" ><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="smenu">
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i>Purchase</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('purchase-list-report')); ?>" ><i class="fa fa-caret-right"></i>Purchase Record (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('return-purchase-list-report')); ?>" ><i class="fa fa-caret-right"></i>Retrun Record (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('supplier-list-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier Wise (Invoice)</a></li>
                                        <li><a href="<?php echo e(route('item-list-report')); ?>" ><i class="fa fa-caret-right"></i>Item Wise</a></li>
                                        <li><a href="<?php echo e(route('itemst-list-report')); ?>" ><i class="fa fa-caret-right"></i>Item Statement</a></li>
                                        <li><a href="<?php echo e(route('pur-reriodic-report')); ?>" ><i class="fa fa-caret-right"></i>Periodic Purchase Record</a></li>
                                        <li><a href="<?php echo e(route('pur-overview-report')); ?>" ><i class="fa fa-caret-right"></i>Overview</a></li>
                                    </ul>
                                </li>
                            
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>Receivables</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('customerlist-report')); ?>" ><i class="fa fa-caret-right"></i>Customer List</a></li>
                                        <li><a href="<?php echo e(route('customerbalance-report')); ?>" ><i class="fa fa-caret-right"></i>Customer Balance</a></li>
                                        <li><a href="<?php echo e(route('customerstatement-report')); ?>" ><i class="fa fa-caret-right"></i>Customer Statement</a></li>
                                        <li><a href="<?php echo e(route('customeritemstate-report')); ?>" ><i class="fa fa-caret-right"></i>Customer Statement (Item)</a></li>    
                                        <li><a href="<?php echo e(route('customerduecol-report')); ?>" ><i class="fa fa-caret-right"></i>Customer Due Collection</a></li>
                                        <li><a href="<?php echo e(route('customeroverview-report')); ?>" ><i class="fa fa-caret-right"></i>Customer Overview</a></li>
                                        <li><a href="<?php echo e(route('revoverview-report')); ?>" ><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                            
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> Voucher</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('payments-report')); ?>"><i class="fa fa-caret-right"></i>Payment</a></li>
                                        <li><a href="<?php echo e(route('receipts-report')); ?>"><i class="fa fa-caret-right"></i>Receipt</a></li>
                                        <li><a href="<?php echo e(route('journal-report')); ?>"><i class="fa fa-caret-right"></i>Journal</a></li>
                                        <li><a href="<?php echo e(route('payrevstate-report')); ?>"><i class="fa fa-caret-right"></i> Payment &amp; Receipt Statement</a></li>
                                        <li><a href="<?php echo e(route('internaltrans-report')); ?>"><i class="fa fa-caret-right"></i>Internal Transaction</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="smenu">
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i> Inventory</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('inv-product-list-report')); ?>" ><i class="fa fa-caret-right"></i> Product List</a></li>
                                        <li><a href="<?php echo e(route('inv-sales-list-report')); ?>" ><i class="fa fa-caret-right"></i>Serial Record</a></li>
                                        <li><a href="<?php echo e(route('inv-summary-report')); ?>" ><i class="fa fa-caret-right"></i>Inventory Summary</a></li>
                                        <li><a href="<?php echo e(route('inv-periodic-count-report')); ?>" ><i class="fa fa-caret-right"></i>Periodic Inventory Count</a></li>
                                        <li><a href="<?php echo e(route('inv-valuation-report')); ?>" ><i class="fa fa-caret-right"></i>Inventory Valuation</a></li>
                                        <li><a href="<?php echo e(route('inv-perio-valuation-report')); ?>" ><i class="fa fa-caret-right"></i>Periodic Inventory Valuation</a></li>
                                        <li><a href="<?php echo e(route('inv-overview-report')); ?>" ><i class="fa fa-caret-right"></i>Overview</a></li>
                                    </ul>
                                </li>
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Payables</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('supllierlist-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier List</a></li>
                                        <li><a href="<?php echo e(route('supllierbalance-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier Balance</a></li>
                                        <li><a href="<?php echo e(route('supllierstatement-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier Statement</a></li>
                                        <li><a href="<?php echo e(route('supllieritemstate-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier Statement (Item)</a></li>
                                        <li><a href="<?php echo e(route('supllieroverview-report')); ?>" ><i class="fa fa-caret-right"></i>Supplier Overview</a></li>    
                                    </ul>
                                </li>    
                                
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i>Payroll</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('employee-list-report')); ?>"><i class="fa fa-caret-right"></i>Employee List</a></li>
                                        <li><a href="<?php echo e(route('attendance-report')); ?>"><i class="fa fa-caret-right"></i>Attendance</a></li>
                                        <li><a href="<?php echo e(route('leaverecord-report')); ?>"><i class="fa fa-caret-right"></i>Leave Record</a></li>
                                        <li><a href="<?php echo e(route('salaryreport-report')); ?>"><i class="fa fa-caret-right"></i>Salary Report</a></li>
                                        <li><a href="<?php echo e(route('commissionreport-report')); ?>"><i class="fa fa-caret-right"></i>Commission Report</a></li>
                                        <li><a href="<?php echo e(route('payrrolloverview-report')); ?>"><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> Finance Record</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="<?php echo e(route('finance_chart_of_account')); ?>"><i class="fa fa-caret-right"></i>Chart of Account</a></li>
                                        <li><a href="<?php echo e(route('finance_profit_and_loss')); ?>"><i class="fa fa-caret-right"></i>Profit And Loss</a></li>
                                        <li><a href="<?php echo e(route('finance_trial_balance')); ?>"><i class="fa fa-caret-right"></i>Trail Balance</a></li>
                                        <li><a href="<?php echo e(route('finance_balance_sheet')); ?>"><i class="fa fa-caret-right"></i>Balance Sheet</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    <!-- /.main content --> 

        <!-- page script -->
            <script type="text/javascript">
                function search_text() {
                var term = $(".search_text").val();
                $('.smenu-treeview-menu a').each(function () {
                var str = $(this).text().toLowerCase();
                if (term.trim() && str.indexOf(term) >= 0) {
                $(this).css("background-color", "yellow");
                } else {
                $(this).css("background-color", "transparent");
                }
                });
                }
            </script>    
        <!-- /page script --> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/report/report.blade.php ENDPATH**/ ?>