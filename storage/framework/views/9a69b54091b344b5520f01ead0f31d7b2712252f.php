<?php $__env->startSection("content"); ?>
<?php
$mhead='report';
$menuh='Report';
$phead='report';
$page='PERIODIC INVENTORY COUNT';
$ractive='D';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'INVPL';
?>
<section class="content-header">
   <h1>PERIODIC INVENTORY COUNT</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Report</a></li>
      <li class=""><a href="#">PERIODIC INVENTORY COUNT</a></li>
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
                              <li  <?php if($ractive=='A'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-product-list-report')); ?>">PRODUCT LIST</a></li>
                              <li  <?php if($ractive=='B'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-sales-list-report')); ?>">SERIAL RECORD</a></li>
                              <li  <?php if($ractive=='C'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-summary-report')); ?>">INVENTORY SUMMARY</a></li>
                              <li  <?php if($ractive=='D'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-periodic-count-report')); ?>">PERIODIC INVENTORY COUNT</a></li>
                              <li  <?php if($ractive=='E'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-valuation-report')); ?>">INVENTORY VALUATION</a></li>
                              <li  <?php if($ractive=='F'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-perio-valuation-report')); ?>">PERIODIC INVENTORY VALUATION</a></li>
                              <li  <?php if($ractive=='H'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('inv-overview-report')); ?>">Overview</a></li>
                           </ul>
                        </div>
                     </div>
                     <hr>
                     
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
                              <h3 class="page-title">PERIODIC INVENTORY SUMMARY</h3>
                           </center>
                           <div class="etat_content">
                              <div class="page_split">
                                 <hr>
                                 <div class="row row-equal">
                                    <div class="col-xs-4 text-left">
                                       <h3 class="inv col"><b>Start Date: </b></h3>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                       <h3 class="inv col"><b>Branch: </b></h3>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                       <h3 class="inv col"><b>End Date: </b></h3>
                                   </div>
                                 </div>
                                 <hr>
                                 <br>
                                  
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
                              <p style="margin-top: -5px;"></p>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/report/rep_invPeriodic.blade.php ENDPATH**/ ?>