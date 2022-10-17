<?php $__env->startSection("content"); ?>
<?php
 $mhead='finance';
 $phead='coa';
?>
<section class="content-header">
   <h1>Chart of Account</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Financials</a></li>
      <li class=""><a href="#">Chart of Account</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Trial Balanch</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <div class="row">
                     <center>
                        <h3 class="page-title">CHART OF ACCOUNT</h3>
                     </center>
                  </div>
                  <div class="row">
                     <table class="table table-bordered table-hover treetable" id="itemdata">
                        <thead>
                           <th width="50%">Account Head</th>
                           <th width="16.16%">Debit</th>
                           <th width="16.16%">Credit</th>
                           <th width="16.16%">Balance</th>
                        </thead>
                        <?php
                        $count_class=0;
                        $count_group=0;
                        $count_subgroup=0;
                        $count_ledger=0;

                        $asset_debit=0;
                        $asset_credit=0;
                        $asset_blnc=0;

                        $group_debit=0;
                        $group_credit=0;
                        $group_blnc=0;

                        $subgroup_debit=0;
                        $subgroup_credit=0;
                        $subgroup_blnc=0;

                        $ledger_debit=0;
                        $ledger_credit=0;
                        $ledger_blnc=0;

                        $total_debit=0;
                        $total_credit=0;
                        $total_balance=0;
                        ?>
                        <tbody>
                           <?php $__currentLoopData = $chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php
                           $asset_debit = $charts->debit_amount + $asset_debit;
                           $asset_credit = $charts->credit_amount + $asset_credit;
                           $asset_blnc = $asset_blnc + ($asset_debit - $asset_credit);
                           ?>
                           <?php if($charts->class_id != $count_class): ?>
                           <?php
                           $count_class=$charts->class_id;
                           ?>
                           <tr data-tt-id="" class="branch collapsed" style="background-color:#e0f7fa">
                              <td><b>&nbsp;<?php echo e($charts->class_name); ?></b></td>
                              <td style="text-align:right;"><?php echo e($asset_debit); ?></td>
                              <td style="text-align:right;"><?php echo e($asset_credit); ?></td>
                              <td style="text-align:right;"><?php echo e($asset_blnc); ?></td>
                           </tr>
                           <?php else: ?>
                           <?php
                           $asset_debit=0;
                           $asset_credit=0;
                           $asset_blnc = 0;
                           $count_class =0;
                           ?>
                           <?php endif; ?>

                           <?php
                           $group_debit = $charts->debit_amount + $group_debit;
                           $group_credit = $charts->credit_amount + $group_credit;
                           $group_blnc = $group_blnc + ($group_debit - $group_credit);
                           ?>
                           <?php if($charts->group_id != $count_group): ?>
                           <?php
                           $count_group=$charts->group_id;
                           ?>
                           <tr id="load_groups" class="branch collapsed">
                              <td><b>&nbsp;&nbsp;<?php echo e($charts->group_name); ?></b></td>
                              <td style="text-align:right;"><?php echo e($group_debit); ?></td>
                              <td style="text-align:right;"><?php echo e($group_credit); ?></td>
                              <td style="text-align:right;"><?php echo e($group_blnc); ?></td>
                           </tr>
                           <?php else: ?>
                           <?php
                           $group_debit = 0;
                           $group_credit = 0;
                           $group_blnc = 0;
                           $count_group =0;
                           ?>
                           <?php endif; ?>

                           <?php
                           $subgroup_debit = $charts->debit_amount + $subgroup_debit;
                           $subgroup_credit = $charts->credit_amount + $subgroup_credit;
                           $subgroup_blnc = $subgroup_blnc + ($subgroup_debit - $subgroup_credit);
                           ?>
                           <?php if($charts->subgroup_id != $count_subgroup): ?>
                           <?php
                           $count_subgroup=$charts->subgroup_id;
                           ?>
                           <tr id="load_subgroups" class="branch collapsed">
                              <td><b>&nbsp;&nbsp;&nbsp;<?php echo e($charts->subgroup_name); ?></b></td>
                              <td style="text-align:right;"><?php echo e($subgroup_debit); ?></td>
                              <td style="text-align:right;"><?php echo e($subgroup_credit); ?></td>
                              <td style="text-align:right;"><?php echo e($subgroup_blnc); ?></td>
                           </tr>
                           <?php else: ?>
                           <?php
                           $subgroup_debit = 0;
                           $subgroup_credit =0;
                           $subgroup_blnc = 0;
                           $count_subgroup =0;
                           ?>
                           <?php endif; ?>

                           <?php
                           $ledger_debit = 0;
                           $ledger_credit = 0;
                           $ledger_blnc = 0;
                           $ledger_debit = $charts->debit_amount + $ledger_debit;
                           $ledger_credit = $charts->credit_amount + $ledger_credit;
                           $ledger_blnc = $ledger_blnc + ($ledger_debit - $ledger_credit);
                           $count_ledger = 0;
                           ?>
                           <?php if($charts->ledger_id != $count_ledger): ?>
                           <?php
                           $count_ledger=$charts->ledger_id;
                           ?>
                           <tr data-tt-id="" data-tt-parent-id="" class="branch collapsed">
                              <td><b>&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo e($charts->ledger_name); ?></td>
                              <td style="text-align:right;"><?php echo e($ledger_debit); ?></td>
                              <td style="text-align:right;"><?php echo e($ledger_credit); ?></td>
                              <td style="text-align:right;"><?php echo e($ledger_blnc); ?></td>
                           </tr>
                           <?php endif; ?>
                           <?php
                           $total_debit = $charts->debit_amount + $total_debit;
                           $total_credit = $charts->debit_amount + $total_credit;
                           $total_balance = $total_balance + ($total_debit - $total_credit);

                           ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td style="text-align:center;"><b>-Total-</b></td>
                              <td style="text-align:right;"><?php echo e($total_debit); ?></td>
                              <td style="text-align:right;"><?php echo e($total_credit); ?></td>
                              <td style="text-align:right;"><?php echo e($total_balance); ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="clearfix" ></div>
               
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">Account Summery</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     <div class="col-md-12 table-responsive">

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/finance/fin_chartofacc.blade.php ENDPATH**/ ?>