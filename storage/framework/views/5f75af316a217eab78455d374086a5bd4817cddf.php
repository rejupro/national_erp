
<?php $__env->startSection("content"); ?>
<?php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Mobile Statement';
$ractive='D';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'AMST';
?>
<section class="content-header">
    <h1>Mobile Statement</h1>
    <ol class="breadcrumb">
       <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       <li><a href="mas_brandcreate.php">Report</a></li>
       <li class=""><a href="#">Mobile Statement</a></li>
    </ol>
 </section>
<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
    <div class="col-md-3">    
    <div class="box box-solid">
    
    <div class="box-body">
    <div class="col-md-12">    
    <div class="row">    
    <div class="roles-menu">   
    <ul class="nav">
        <li  <?php if($ractive=='A'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('ledgerstate-report')); ?>">Ledger Statement</a></li>
        <li  <?php if($ractive=='B'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('cashstate-report')); ?>">Cash Statement</a></li>
        <li  <?php if($ractive=='C'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('bankstate-report')); ?>">Bank Statement</a></li>
        <li  <?php if($ractive=='D'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('mobilestate-report')); ?>">Mobile Statement</a></li>
        <li  <?php if($ractive=='E'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('profitloss-report')); ?>">Journal History</a></li>
        <li  <?php if($ractive=='F'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('journalhistory-report')); ?>">Profit & Loss</a></li>
        <li  <?php if($ractive=='G'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('trailbalance-report')); ?>">Trial Balance</a></li>
        <li  <?php if($ractive=='H'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('balancesheet-report')); ?>">Balance Sheet</a></li>
        <li  <?php if($ractive=='I'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('accountoverview-report')); ?>">Overview</a></li>
    </ul>
    </div>
    </div>
    <hr>    
    <form  onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <!--From Data-->   
    <div class="col-md-12">    
        <div class="row">   
        <div class="form-group" >
        <label>Branch</label>
        <div class="input-group">
        <span class="input-group-addon">BR</span>
        <select class="form-control select2" name="ibrid" id="ibrid">
        <option value="A">-All Branch-</option>
        <option value="0">-Corporate Branch-</option>    
        </select>
        </div>
        </div>       
        </div>
        </div>
        <div class="col-md-12">
        <div class="row">    
            <div class="form-group" >
                <label>Select Head</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-plus"></span></span>    
                    <select class="form-control select2" name="lid" id="lid">
                    <option value="">-Select-</option>     
                    </select>     
                </div>   
            </div>    
        </div>
        </div>    
        <div class="row"> 
            <div class="col-md-6">    
                <div class="form-group" >
                    <label>From</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="date" maxlength="18" class="form-control" name="tfdate" value="" required autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">    
                <div class="form-group" >
                    <label>To</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="date" maxlength="18" class="form-control" name="ttdate" value="" required autocomplete="off" required>
                    </div>
                </div>
            </div>    
        </div> 
        
    
    <!--End From Data-->    
    <div class="clearfix"></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-4"></div>
    <div class="col-md-8 text-right" >
    <input type="submit" name="filter_submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/> <a href="axe_report.php" class="btn btn-flat bg-gray  ">Close</a>
    </div> 
    </div>     
    </form>    
    </div>
    </div>
    </div>  
    </div>
    <div class="col-md-9">
    <div class="row">    
    <div class="side-head"> 
    <div class="col-md-12">    
    <div class="col-md-4 text-left">
    <button class="btn btn-flat bg-teal" id="print"><i class="fa fa-print"></i></button> 
    <button class="btn btn-flat bg-blue"><i class="fa fa-envelope-o"></i></button> 
    <button class="btn btn-flat bg-gray"><i class="fa fa-file-pdf-o"></i></button>     
    </div>
    <div class="col-md-7 text-center">
    <select name="Page_resolution" id="resolution" onchange="setPrinterConfig()" style="width: 205px;height: 28px;border: 1px solid red;">
    <option value="A4" selected="selected">A4 [210mm × 297mm]</option>   
    <option value="A5">A5 [148mm × 210mm]</option>
    <option value="Letter">US Letter [216mm × 279mm]</option>
    <option value="Legal">US Legal [216mm × 356mm]</option>
    </select>
    <select name="Page_size" id="rotate" onchange="setPrinterConfig()" style="width: 120px;height: 28px;border: 1px solid red;">
    <option value="portrait">Portrait</option>
    <option value="landscape">Landscape</option>
    </select>    
    </div>    
    <div class="col-md-1 text-right">
    
    </div>
    </div>
    </div>    
    </div>
    <div class="row">
    <div class="invhold scrol-y" id="invhold">
    <div class="printableArea">    
     <?php echo $__env->make('main.admin.report.reportstyle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="wrapper" style="background: none;">    
    <div id="wrap_invoice" class="page A4 landscape">
    <div class="invoice_header etat_header">
    <div class="row model1">
        <div class="col-xs-3 invoice-logo">
            <img src="<?php echo e(asset(companyData()->image)); ?>" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
        </div>
        <div class="col-xs-5 invoice-header-info" id="adheight">
            <h4><?php echo e(companyData()->name); ?></h4>
            <p><?php echo e(companyData()->address); ?><br><strong>Phone:</strong><?php echo e(companyData()->phone); ?><br><strong>Mobile:</strong> <?php echo e(companyData()->mobile); ?><br><strong>Email:</strong> <?php echo e(companyData()->email); ?><br><strong>Web:</strong> <?php echo e(companyData()->web); ?></p>
        </div>
    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
      <img src = 'data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($oavno, 'C39')); ?>' style='margin-right: -10px;padding-bottom: 5px;'/>
      <br><strong>Ref N°:</strong><?php echo e($oavno); ?>

      <br><strong>Date:</strong> <?php echo e($today); ?>   
    </div>
    </div>
    <hr>
    <div class="clearfix"></div>
    </div>
    <center>
    <h3 class="page-title">Mobile Statement</h3>
    </center>    
    <div class="etat_content">
        <div class="page_split">
        <hr>    
        <div class="row row-equal">
        <div class="col-xs-4 text-left">
        <h3 class="inv col"><b>Start Date: </b></h3>
        </div>
        <div class="col-xs-4 text-center">
        <h3 class="inv col"><b>Statement For: </b></h3>
        </div>    
        <div class="col-xs-4 text-right">
        <h3 class="inv col"><b>End Date: </b></h3>
        </div>
        </div>    
        <hr>
        <br> 
        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
        <thead>
        <tr>
        <th rowspan="2" style="text-align:left; width:90px;"><strong>Date</strong></th>
        <th rowspan="2" style="text-align:left; width:340px;"><strong>Particulars</strong></th>
        <th colspan="3" style="text-align:center; width:330px;"><strong>Transction Details</strong></th>
        <th rowspan="2" style="text-align:center;"><strong>Remarks</strong></th>
        </tr>
        <tr>
        <th style="text-align:center; width:110px;"><strong>Debit</strong></th>
        <th style="text-align:center; width:110px;"><strong>Credit</strong></th>
        <th style="text-align:right; width:110px;"><strong>Balance</strong></th>
        </tr>
        </thead>
        <tbody>    
        <tr>
            <td style="text-align:left; width:90px;"></td>    
            <td style="text-align:right; width:340px;"><strong>Opening Balance</strong></td>
            <td style="text-align:right; width:110px;"><strong></strong></td>
            <td style="text-align:right; width:110px;"><strong></strong></td>
            <td style="text-align:right; width:110px;"><strong></strong></td>    
        <td></td>
        </tr>
        <tr>
            <td style="text-align:left; width:90px;"></td>
            <td style="text-align:left; width:340px;"></td>
            <td style="text-align:right; width:110px;"></td>
            <td style="text-align:right; width:110px;"></td>
            <td style="text-align:right; width:110px;"><strong></strong></td>
            <td></td>    
        </tr>    

        <tr>
        <td colspan="2"><strong>Total</strong></td>
        <td style="text-align:right;"><strong></strong></td>
        <td style="text-align:right;"><strong></strong></td>
        <td colspan="2"><strong>End Balance:&nbsp;&nbsp;<span style="color: red;font-weight: bolder;"></span></strong></td>
        </tr>    
        </tbody>
        </table>
        <div style="clear: both;"></div>   
        <div id="not-printed">
        <br> 
        <br>
        <br>    
        </div>    
        </div>    
        </div>
        <div style="clear: both;"></div>
        <div class="invoice_footer">
        <hr>
        <p style="margin-top: -5px;">Falcon Solution LTD. © 2021</p>
        </div>
        <div style="clear: both;"></div>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/report/rep_accmobilestate.blade.php ENDPATH**/ ?>