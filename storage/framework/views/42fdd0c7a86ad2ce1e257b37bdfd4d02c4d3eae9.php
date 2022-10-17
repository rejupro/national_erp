<?php $__env->startSection("content"); ?>
<?php
 $mhead='finance';
 $phead='bs';
?>
<section class="content-header">
   <h1>BALANCE SHEET</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Financials</a></li>
      <li class=""><a href="#">BALANCE SHEET</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Balance Sheet</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12 table-responsive">
                        <div class="row">
                            <center>
                                <h3 class="page-title">BALANCE SHEET</h3>
                            </center>
                        </div>
                        <div class="row" id="itemdata">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <h4>FROM: </h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4>To: </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix" ></div>
                            <!-- ASSETS -->
                            <table class="table table-bordered   table-hover">
                                <thead>
                                    <tr>
                                        <td width="50%" class="bg-gray"><b>ASSETS</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Opening</b></td>
                                        <td width="16.16%" class="bg-gray"><b>During Time</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Closing</b></td>
                                    </tr>
                                </thead>
                                <?php $i=0; $j=0; $debit=0; $credit=0; ?>
                                <tbody>
                                    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i==0): ?>
                                    <?php $i = $i+1; ?>
                                    <tr>
                                        <td ><b><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_asset->group_name); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($j==0): ?>
                                    <?php $j = $j+1; ?>
                                    <tr>
                                        <td style="padding-left: 15px;"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_asset->subgroup_name); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="padding-left:30px;"><?php echo e($v_asset->ledger_name); ?></td>
                                        <td class="text-right"><?php echo e($v_asset->debit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_asset->debit_amount - $v_asset->credit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_asset->credit_amount); ?></td>
                                    </tr>
                                    <?php
                                    $debit=$v_asset->debit_amount+$debit;
                                    $credit=$v_asset->credit_amount+$credit;
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: right;padding-right:20px;"><strong>Total </strong></td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit - $credit); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit - $credit); ?></b>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom:none;border-top:none;">
                                        <td colspan="4"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--/ASSETS-->
                            <!--LIABILITIES-->
                            <table class="table table-bordered   table-hover">
                                <tbody>
                                    <tr>
                                        <td width="50%" class="bg-gray"><b>LIABILITIES</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Opening</b></td>
                                        <td width="16.16%" class="bg-gray"><b>During Time</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Closing</b></td>
                                    </tr>
                                    <?php $k=0; $l=0; $debit1=0; $credit1=0; ?>
                                    <?php $__currentLoopData = $liabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_liability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($k==0): ?>
                                    <?php $k = $k+1; ?>
                                    <tr>
                                        <td ><b><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_liability->group_name); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($l==0): ?>
                                    <?php $l = $l+1; ?>
                                    <tr>
                                        <td style="padding-left: 15px;"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_liability->subgroup_name); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="padding-left:30px;"><?php echo e($v_liability->ledger_name); ?></td>
                                        <td class="text-right"><?php echo e($v_liability->debit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_liability->debit_amount - $v_liability->credit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_liability->credit_amount); ?></td>
                                    </tr>
                                    <?php
                                    $debit1=$v_liability->debit_amount+$debit1;
                                    $credit1=$v_liability->credit_amount+$credit1;
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: right;padding-right:20px;"><strong>Total </strong></td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit1); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit1 - $credit1); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit - $credit1); ?></b>
                                        </td>
                                    </tr>
                                    <!--/LIABILITIES-->
                                    <!--OWNER'S EQUITY-->
                                    <tr>
                                        <td width="50%" class="bg-gray"><b>OWNER'S EQUITY</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Opening</b></td>
                                        <td width="16.16%" class="bg-gray"><b>During Time</b></td>
                                        <td width="16.16%" class="bg-gray"><b>Closing</b></td>
                                    </tr>
                                    <?php $m=0; $n=0; $debit2=0; $credit2=0; ?>
                                    <?php $__currentLoopData = $equity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_equity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($m==0): ?>
                                    <?php $m = $m+1; ?>
                                    <tr>
                                        <td ><b><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_equity->group_name); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if($n==0): ?>
                                    <?php $n = $n+1; ?>
                                    <tr>
                                        <td style="padding-left: 15px;"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;<?php echo e($v_equity->subgroup_name); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td style="padding-left:30px;"><?php echo e($v_equity->ledger_name); ?></td>
                                        <td class="text-right"><?php echo e($v_equity->debit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_equity->debit_amount - $v_equity->credit_amount); ?></td>
                                        <td class="text-right"><?php echo e($v_liability->credit_amount); ?></td>
                                    </tr>
                                    <?php
                                    $debit2=$v_equity->debit_amount+$debit2;
                                    $credit2=$v_equity->credit_amount+$credit2;
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: right;padding-right:20px;"><strong>Total </strong></td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit2); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($debit2 - $credit2); ?></b>
                                        </td>
                                        <td style="text-align: right; border-top: 1px double #000000;"><b><?php echo e($credit2); ?></b>
                                        </td>
                                    </tr>
                                    <!--/OWNER'S EQUITY-->
                                    <?php if(empty($liabilities) && empty($equity)): ?>
                                    <tr>
                                        <td ><b><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;Retained earnings </b></td>
                                        <td class="text-right"><?php echo e($debit - $debit1 - $debit2); ?></td>
                                        <td class="text-right"><?php echo e(($debit - $debit1 - $debit2) - ($credit - $credit1 -$credit2)); ?></td>
                                        <td class="text-right"><?php echo e($credit - $credit1 - $credit2); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr style="border-bottom:none;border-top:none;">
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td ><b>&nbsp;Total Liabilities and Owner's Equity</b></td>
                                        <td style="text-align: right; border-top: 1px double #000000; border-bottom: 4px double #000000;"><b><?php echo e($debit1 + $debit2); ?></b></td>
                                        <td style="text-align: right; border-top: 1px double #000000; border-bottom: 4px double #000000;"><b><?php echo e(($debit1 + $debit2) - ($credit1 + $credit2)); ?></b></td>
                                        <td style="text-align: right; border-top: 1px double #000000; border-bottom: 4px double #000000;"><b><?php echo e($credit1 + $credit2); ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--/LIABILITIES and OWNER'S EQUITY-->
                            <table class="table table-bordered   table-hover">
                                <tbody>
                                    <tr>
                                        <td width="50%" class="bg-gray"><b>Common Financial Ratios</b></td>
                                        <td width="16.16%" class="bg-gray"></td>
                                        <td width="16.16%" class="bg-gray"></td>
                                        <td width="16.16%" class="bg-gray"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left:15px;"><b>Debt Ratio</b> (Total Liabilities / Total Assets)</td>
                                        <?php if(empty($liabilities) && empty($equity)): ?>
                                        <td width="16.16%" class="text-right"><?php echo e($debit1/$debit); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e(($debit1 - $credit1)/($debit - $credit)); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e($credit1/$credit); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left:15px;"><b>Current Ratio</b> (Current Assets / Current Liabilities)</td>
                                        <td width="16.16%" class="text-right"></td>
                                        <td width="16.16%" class="text-right"></td>
                                        <td width="16.16%" class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left:15px;"><b>Working Capital</b> (Current Assets - Current Liabilities)</td>
                                        <td width="16.16%" class="text-right"></td>
                                        <td width="16.16%" class="text-right"></td>
                                        <td width="16.16%" class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left:15px;"><b>Assets-to-Equity Ratio</b> (Total Assets / Owner's Equity)</td>
                                        <?php if(empty($liabilities) && empty($equity)): ?>
                                        <td width="16.16%" class="text-right"><?php echo e($debit/$debit2); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e(($debit - $credit)/($debit2 - $credit2)); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e($credit/$credit1); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td width="50%" style="padding-left:15px;"><b>Debt-to-Equity Ratio</b> (Total Liabilities / Owner's Equity)</td>
                                        <?php if(empty($liabilities) && empty($equity)): ?>
                                        <td width="16.16%" class="text-right"><?php echo e($debit1/$debit2); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e(($debit1 - $credit1)/($debit2 - $credit2)); ?></td>
                                        <td width="16.16%" class="text-right"><?php echo e($credit1/$credit2); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
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
                        <div class="box-body" >
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group" >
                                        <label>From:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="stdate" placeholder="From Date" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label>To:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="endate" placeholder="End Date" autocomplete="off" readonly>
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
                                    <input type="button" id="reset" class="btn btn-flat bg-red btn-sm " value="Reset"/>
                                    <input type="button" id="blview" class="btn btn-flat bg-purple btn-sm" value="Submit"/>
                                </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/finance/fin_blncsheet.blade.php ENDPATH**/ ?>