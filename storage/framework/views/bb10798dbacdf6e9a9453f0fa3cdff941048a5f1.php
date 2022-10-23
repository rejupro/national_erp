<?php $__env->startSection("content"); ?>
<?php
 $mhead='finance';
 $phead='tb';
?>
<section class="content-header">
   <h1>Trial Balance</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Financials</a></li>
      <li class=""><a href="#">Trial Balance</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Trial Balanch</h3>
                </div>
                <div class="box-body">
                    
                    <div class="col-md-12 table-responsive">
                        <div class="row">
                            <center>
                                <h3 class="page-title">TRIAL BALANCE</h3>
                            </center>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-hover treetable" id="itemdata">

                                <thead>
                                    <tr>
                                     <th rowspan="3" style="text-align:center;"> Head of Accounts </th>
                                     <th rowspan="3" style="text-align:center;"> Beginning<br>Balance<br></th>
                                     <th colspan="3" style="text-align:center;"> During the Period </th>
                                     <th rowspan="3" style="text-align:center;"> Ending<br>Balance<br></th>
                                 </tr>
                                 <tr><th colspan="3" style="text-align:center;"> From:  To: </th></tr>
                                 <tr class="tabhead">
                                     <th style="text-align:center;">Debit</th>
                                     <th style="text-align:center;">Credit</th>
                                     <th style="text-align:center;">Net Activity</th>
                                 </tr>
                             </thead>
                            <?php if($trial_debit): ?>
                             <tbody>
                                <!-- Debit -->
                                <?php
                                $begining_balance=0;
                                $begining_balance_subgroup=0;
                                $begining_balance_ledger=0;
                                $total_debit=0;
                                $total_credit=0;
                                $total_net_activity=0;
                                $total_balance=0;
                                $count_group=0;
                                $count_subgroup=0;
                                ?>
                                <?php $__currentLoopData = $trial_debit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trials_debit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $begining_balance = $trials_debit->debit_amount + $begining_balance; ?>
                                <?php if($trials_debit->group_id != $count_group): ?>
                                <?php  $count_group=$trials_debit->group_id;  ?>
                                <tr data-tt-id="" class="branch collapsed" style="background-color:#e0f7fa">
                                    <td><b>&nbsp;<?php echo e($trials_debit->group_name); ?></b></td>
                                    <td style="text-align:right;"><?php echo e($begining_balance); ?></td>
                                    <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                    <td style="text-align:right;"><?php echo e($trials_debit->credit_amount); ?></td>
                                    <td style="text-align:right;">0</td>
                                    <?php if($trials_debit->credit_amount == 0): ?>
                                    <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                    <?php else: ?>
                                    <td style="text-align:right;"><?php echo e($trials_debit->debit_amount - $trials_debit->credit_amount); ?></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php $begining_balance_subgroup = $trials_debit->debit_amount + $begining_balance_subgroup; ?>
                                <?php if($trials_debit->subgroup_id != $count_subgroup): ?>
                                <?php  $count_subgroup=$trials_debit->subgroup_id;  ?>
                                <p id="load_subgroups">
                                    <tr data-tt-id="" data-tt-parent-id="" class="table-success branch collapsed">
                                        <td style="padding-left: 15px;"><b>&nbsp;<?php echo e($trials_debit->subgroup_name); ?></b></td>
                                        <td style="text-align:right;"><?php echo e($begining_balance_subgroup); ?></td>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                        <td style="text-align:right;"><?php echo e($trials_debit->credit_amount); ?></td>
                                        <td style="text-align:right;">0</td>
                                        <?php if($trials_debit->credit_amount == 0): ?>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                        <?php else: ?>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount - $trials_debit->credit_amount); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                </p>
                                <?php endif; ?>
                                <?php $begining_balance_ledger = $trials_debit->debit_amount + $begining_balance_ledger;
                                ?>
                                <p id="load_ledger">
                                    <tr data-tt-id="" data-tt-parent-id="" class="leaf collapsed">
                                        <td style="padding-left:30px;"><?php echo e($trials_debit->ledger_name); ?></td>
                                        <td style="text-align:right;"><?php echo e($begining_balance); ?></td>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                        <td style="text-align:right;"><?php echo e($trials_debit->credit_amount); ?></td>
                                        <td style="text-align:right;">0</td>
                                        <?php if($trials_debit->credit_amount == 0): ?>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount); ?></td>
                                        <?php else: ?>
                                        <td style="text-align:right;"><?php echo e($trials_debit->debit_amount - $trials_debit->credit_amount); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                </p>
                                <?php
                                $total_debit = $total_debit + $trials_debit->debit_amount;
                                $total_credit = $total_credit + $trials_debit->credit_amount;
                                $total_net_activity = $total_net_activity + 0;
                                $total_balance = $total_balance + ($trials_debit->debit_amount - $trials_debit->credit_amount);
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- /Debit -->
                            </tbody>
                            <tfoot>
                                <tr style="background-color:#ffeee8; font-weight:200px; background-color: #bfffa3;">
                                    <td style="padding-left: 15px;"><b>Total Trial Balance</b></td>
                                    <td style="text-align:right;"><b>Total Begining Balance = </b><?php echo e($begining_balance); ?></td>
                                    <td style="text-align:right; color: green;"><b>Total Debit = </b><?php echo e($total_debit); ?></td>
                                    <td style="text-align:right; color: red;"><b>Total Credit = </b><?php echo e($total_credit); ?></td>
                                    <td style="text-align:right;">Total Activity = <?php echo e($total_net_activity); ?></td>
                                    <td style="text-align:right; color: blue;"><b>Total Balance = </b><?php echo e($total_balance); ?></td>
                                </tr>
                                <tr style="background-color:#ffeee8; font-weight:200px; background-color: #ffcbb3;">
                                    <td style="padding-left: 15px;"><b>Mismatch</b></td>
                                    <td style="text-align:right;"><b>Total Begining Balance = </b><?php echo e($begining_balance); ?></td>
                                    <td style="text-align:right; color: green;"><b>Total Debit = </b><?php echo e($total_debit); ?></td>
                                    <td style="text-align:right; color: red;"><b>Total Credit = </b><?php echo e($total_credit); ?></td>
                                    <td style="text-align:right;">Total Activity = <?php echo e($total_net_activity); ?></td>
                                    <td style="text-align:right; color: blue;"><b>Total Balance = </b><?php echo e($total_balance); ?></td>
                                </tr>
                            </tfoot>
                            <?php else: ?>
                            <center><h4>There Is No Record To Show</h4></center>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Filter</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="<?php echo e(route('trial_balance_filter_by_date')); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <div class="box-body" >
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group" >
                                        <label>From:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="start_date" placeholder="From Date" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label>To:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="end_date" placeholder="End Date" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right" >
                                    
                                    <input type="submit" class="btn btn-flat bg-purple btn-sm" value="Submit"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
<!-- /.main content -->


    <!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/finance/fin_trialblnc.blade.php ENDPATH**/ ?>