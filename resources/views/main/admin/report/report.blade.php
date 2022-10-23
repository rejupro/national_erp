@extends("layouts/admin/main")
@section("content")
@php
 $mhead='report';
 $phead='report';
@endphp

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
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) ডেইলি রিপোর্ট @else Daily Report @endif</a>
                                <ul class="smenu-treeview-menu">
                                {{-- <li><a href="#" ><i class="fa fa-caret-right"></i>Purchase</a></li>
                                <li><a href="#" ><i class="fa fa-caret-right"></i> Sales</a></li>
                                <li><a href="#" ><i class="fa fa-caret-right"></i>Expenses</a></li> --}}
                                <li><a href="{{route('dailycashstate-report')}}" ><i class="fa fa-caret-right"></i>Daily Cash Statement</a></li>
                                {{-- <li><a href="#" ><i class="fa fa-caret-right"></i>Profit &amp; Loss (Invoice)</a></li>
                                <li><a href="#" ><i class="fa fa-caret-right"></i> Profit &amp; Loss (Item)</a></li> --}}
                                {{-- <li><a href="#" ><i class="fa fa-caret-right"></i> Overview</a></li>     --}}
                                </ul>
                                </li>
                            
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) প্রোজেক্ট রিপোর্ট @else Project Report @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('project-list-report')}}" ><i class="fa fa-caret-right"></i>Project Status</a></li>
                                        <li><a href="{{route('project-details-report')}}" ><i class="fa fa-caret-right"></i> Project Details</a></li>
                                        <li><a href="{{route('project-contructorlist-report')}}" ><i class="fa fa-caret-right"></i>Contractor List</a></li>
                                        <li><a href="{{route('project-contructorbalance-report')}}" ><i class="fa fa-caret-right"></i>Contractor Balance</a></li>
                                        <li><a href="{{route('project-contructorstate-report')}}" ><i class="fa fa-caret-right"></i>Contractor Statement</a></li>
                                        <li><a href="{{route('project-overview-report')}}" ><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>    
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) সেলস @else Sales @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('sales-list-report')}}">Sales Record (Invoice)</a></li>
                                        <li><a href="{{route('return-sales-list-report')}}">Return Record (Invoice)</a></li>
                                        <li><a href="{{route('customer-list-report')}}">Customer Wise (Invoice)</a></li>
                                        <li><a href="{{route('sales-item-list-report')}}">Item Wise</a></li>
                                        <li><a href="{{route('sales-itemst-list-report')}}">Item Statement</a></li>
                                        <li><a href="{{route('sales-reriodic-report')}}">Periodic Sales Record</a></li>
                                        <li><a href="{{route('sales-overview-report')}}">Overview</a></li>
                                    </ul>
                                </li>
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> @if ( Auth::User()->language == 1 ) একাউন্ট @else Account @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('ledgerstate-report')}}"><i class="fa fa-caret-right"></i>Ledger Statement</a></li>
                                        <li><a href="{{route('cashstate-report')}}"><i class="fa fa-caret-right"></i>Cash Statement</a></li>
                                        <!-- <li><a href="{{route('bankstate-report')}}p"><i class="fa fa-caret-right"></i>Bank Statement</a></li> -->
                                        <li><a href="{{route('mobilestate-report')}}"><i class="fa fa-caret-right"></i>Mobile Statement</a></li>    
                                        <li><a href="{{route('journalhistory-report')}}"><i class="fa fa-caret-right"></i>Journal History</a></li>    
                                        <li><a href="{{route('trailbalance-report')}}"><i class="fa fa-caret-right"></i>Trial Balance</a></li>
                                        <li><a href="{{route('balancesheet-report')}}"><i class="fa fa-caret-right"></i>Balance Sheet</a></li>
                                        <li><a href="{{route('profitloss-report')}}"><i class="fa fa-caret-right"></i> Profit &amp; Loss</a></li>
                                        <li><a href="{{route('accountoverview-report')}}" ><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="smenu">
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) পারচেস @else Purchase @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('purchase-list-report')}}" ><i class="fa fa-caret-right"></i>Purchase Record (Invoice)</a></li>
                                        <li><a href="{{route('return-purchase-list-report')}}" ><i class="fa fa-caret-right"></i>Retrun Record (Invoice)</a></li>
                                        <li><a href="{{route('supplier-list-report')}}" ><i class="fa fa-caret-right"></i>Supplier Wise (Invoice)</a></li>
                                        <li><a href="{{route('item-list-report')}}" ><i class="fa fa-caret-right"></i>Item Wise</a></li>
                                        <li><a href="{{route('itemst-list-report')}}" ><i class="fa fa-caret-right"></i>Item Statement</a></li>
                                        <li><a href="{{route('pur-reriodic-report')}}" ><i class="fa fa-caret-right"></i>Periodic Purchase Record</a></li>
                                        <li><a href="{{route('pur-overview-report')}}" ><i class="fa fa-caret-right"></i>Overview</a></li>
                                    </ul>
                                </li>
                            
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) রিসেভেবল @else Receivables @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('customerlist-report')}}" ><i class="fa fa-caret-right"></i>Customer List</a></li>
                                        <li><a href="{{route('customerbalance-report')}}" ><i class="fa fa-caret-right"></i>Customer Balance</a></li>
                                        <li><a href="{{route('customerstatement-report')}}" ><i class="fa fa-caret-right"></i>Customer Statement</a></li>
                                        <li><a href="{{route('customeritemstate-report')}}" ><i class="fa fa-caret-right"></i>Customer Statement (Item)</a></li>    
                                        <li><a href="{{route('customerduecol-report')}}" ><i class="fa fa-caret-right"></i>Customer Due Collection</a></li>
                                        <li><a href="{{route('customeroverview-report')}}" ><i class="fa fa-caret-right"></i>Customer Overview</a></li>
                                        <li><a href="{{route('revoverview-report')}}" ><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                            
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> @if ( Auth::User()->language == 1 ) ভাউচার @else Voucher @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('payments-report')}}"><i class="fa fa-caret-right"></i>Payment</a></li>
                                        <li><a href="{{route('receipts-report')}}"><i class="fa fa-caret-right"></i>Receipt</a></li>
                                        <li><a href="{{route('journal-report')}}"><i class="fa fa-caret-right"></i>Journal</a></li>
                                        <li><a href="{{route('payrevstate-report')}}"><i class="fa fa-caret-right"></i> Payment &amp; Receipt Statement</a></li>
                                        <li><a href="{{route('internaltrans-report')}}"><i class="fa fa-caret-right"></i>Internal Transaction</a></li>
                                        {{-- <li><a href="{{route('vouoverview-report')}}" ><i class="fa fa-caret-right"></i> Overview</a></li>     --}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="smenu">
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-exchange" aria-hidden="true"></i> @if ( Auth::User()->language == 1 ) ইনভেন্টোরি @else Inventory @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('inv-product-list-report')}}" ><i class="fa fa-caret-right"></i> Product List</a></li>
                                        <li><a href="{{route('inv-sales-list-report')}}" ><i class="fa fa-caret-right"></i>Serial Record</a></li>
                                        <li><a href="{{route('inv-summary-report')}}" ><i class="fa fa-caret-right"></i>Inventory Summary</a></li>
                                        <li><a href="{{route('inv-periodic-count-report')}}" ><i class="fa fa-caret-right"></i>Periodic Inventory Count</a></li>
                                        <li><a href="{{route('inv-valuation-report')}}" ><i class="fa fa-caret-right"></i>Inventory Valuation</a></li>
                                        <li><a href="{{route('inv-perio-valuation-report')}}" ><i class="fa fa-caret-right"></i>Periodic Inventory Valuation</a></li>
                                        <li><a href="{{route('inv-overview-report')}}" ><i class="fa fa-caret-right"></i>Overview</a></li>
                                    </ul>
                                </li>
                                
                                <li class="smenu-treeview"><a href="#" class="smenu-title"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> @if ( Auth::User()->language == 1 ) পেয়েবলস @else Payables @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('supllierlist-report')}}" ><i class="fa fa-caret-right"></i>Supplier List</a></li>
                                        <li><a href="{{route('supllierbalance-report')}}" ><i class="fa fa-caret-right"></i>Supplier Balance</a></li>
                                        <li><a href="{{route('supllierstatement-report')}}" ><i class="fa fa-caret-right"></i>Supplier Statement</a></li>
                                        <li><a href="{{route('supllieritemstate-report')}}" ><i class="fa fa-caret-right"></i>Supplier Statement (Item)</a></li>
                                        <li><a href="{{route('supllieroverview-report')}}" ><i class="fa fa-caret-right"></i>Supplier Overview</a></li>    
                                    </ul>
                                </li>    
                                
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i>@if ( Auth::User()->language == 1 ) পেইরোল @else Payroll @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('employee-list-report')}}"><i class="fa fa-caret-right"></i>Employee List</a></li>
                                        {{-- <li><a href="{{route('attendance-report')}}"><i class="fa fa-caret-right"></i>Attendance</a></li> --}}
                                        <li><a href="{{route('leaverecord-report')}}"><i class="fa fa-caret-right"></i>Leave Record</a></li>
                                        <li><a href="{{route('salaryreport-report')}}"><i class="fa fa-caret-right"></i>Salary Report</a></li>
                                        <li><a href="{{route('commissionreport-report')}}"><i class="fa fa-caret-right"></i>Commission Report</a></li>
                                        <li><a href="{{route('payrrolloverview-report')}}"><i class="fa fa-caret-right"></i>Overview</a></li>    
                                    </ul>
                                </li>
                                <li class="smenu-treeview">
                                    <a href="#" class="smenu-title"><i class="fa fa-sticky-note" aria-hidden="true"></i> @if ( Auth::User()->language == 1 ) ফিনান্স রেকর্ড @else Finance Record @endif</a>
                                    <ul class="smenu-treeview-menu">
                                        <li><a href="{{route('finance_chart_of_account')}}"><i class="fa fa-caret-right"></i>Chart of Account</a></li>
                                        <li><a href="{{route('finance_profit_and_loss')}}"><i class="fa fa-caret-right"></i>Profit And Loss</a></li>
                                        <li><a href="{{route('finance_trial_balance')}}"><i class="fa fa-caret-right"></i>Trail Balance</a></li>
                                        <li><a href="{{route('finance_balance_sheet')}}"><i class="fa fa-caret-right"></i>Balance Sheet</a></li>
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

@endsection