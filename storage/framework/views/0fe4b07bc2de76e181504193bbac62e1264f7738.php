<?php $__env->startSection("content"); ?>
<?php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Item Statement';
$ractive='E';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'SALIR';
?>
<section class="content-header">
   <h1>Item Statement</h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="">Report</a></li>
      <li class=""><a href="#">Item Statement</a></li>
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
                            <li  <?php if($ractive=='A'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales-list-report')); ?>">Sales Record (Invoice)</a></li>
                            <li  <?php if($ractive=='B'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('return-sales-list-report')); ?>">Return Record (Invoice)</a></li>
                            <li  <?php if($ractive=='C'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer-list-report')); ?>">Customer Wise (Invoice)</a></li>
                            <li  <?php if($ractive=='D'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales-item-list-report')); ?>">Item Wise</a></li>
                            <li  <?php if($ractive=='E'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales-itemst-list-report')); ?>">Item Statement</a></li>
                            <li  <?php if($ractive=='F'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales-reriodic-report')); ?>">Periodic Sales Record</a></li>
                            <li  <?php if($ractive=='H'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales-overview-report')); ?>">Overview</a></li>
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
                                       <option>-All Branch-</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                               <div class="form-group" >
                                  <label>Customer</label>
                                  <div class="input-group">
                                     <span class="input-group-addon">CUS</span>
                                     <select class="form-control select2" name="ibrid" id="ibrid">
                                        <option>-All Customer-</option>
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
                                    <input type="text" maxlength="18" class="form-control" name="tfdate" value="" required autocomplete="off" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" >
                                 <label>To</label>
                                 <div class="input-group date datetimepicker">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" maxlength="18" class="form-control" name="ttdate" value="" required autocomplete="off" required>
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
                           <option value="A4" selected="selected">A4 [210mm ?? 297mm]</option>
                           <option value="A5">A5 [148mm ?? 210mm]</option>
                           <option value="Letter">US Letter [216mm ?? 279mm]</option>
                           <option value="Legal">US Legal [216mm ?? 356mm]</option>
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
                                    <br><strong>Ref N??:</strong><?php echo e($oavno); ?>

                                    <br><strong>Date:</strong> <?php echo e($today); ?>

                                 </div>
                              </div>
                              <hr>
                              <div class="clearfix"></div>
                           </div>
                           <center>
                              <h3 class="page-title">SALES ITEM STATEMENT RECORD</h3>
                           </center>
                           <div class="etat_content">
                              <div class="page_split">
                                 <hr>
                                 <div class="row row-equal">
                                    <div class="col-xs-4 text-left">
                                       
                                    </div>
                                    <div class="col-xs-4 text-center">
                                       
                                    </div>
                                    <div class="col-xs-4 text-right">
                                       
                                    </div>
                                 </div>
                                 <hr>
                                 <br>

                                 <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                    <tr>
                                    <th rowspan="2" style="text-align:left; width:30px;"><strong>SN</strong></th>
                                    <th rowspan="2" style="text-align:left; width:90px;"><strong>SKU/Code</strong></th>
                                    <th rowspan="2" style="text-align:left; width:280px;"><strong>Item</strong></th>
                                    <th colspan="10" style="text-align:center;"><strong>Sales Details</strong></th>
                                    <th colspan="5" style="text-align:center;"><strong>Sales Details</strong></th>
                                    </tr>
                                    <tr>
                                    <th>PU.Qty</th>
                                    <th>MRP</th>
                                    <th>Dis</th>
                                    <th>VAT</th>
                                    <th>TAX</th>
                                    <th>OTA</th>
                                    <th>SPM</th>
                                    <th>FRE</th>
                                    <th>LES</th>
                                    <th>Total</th>
                                    <th>OP.Qty</th>
                                    <th>RC.Qty</th>
                                    <th>RE.Qty</th>
                                    <th>DL.Qty</th>
                                    <th>CL.Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                    ?>
                                    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                <td class="text-md-center"><?php echo e($i++); ?></td>
                                <td><?php echo e($data->purchase_track); ?></td>
                                <td><?php echo e($data->item_name); ?></td>
                                <td class="text-md-center"><?php echo e($data->quantity); ?></td>
                                <td class="text-md-right"></td>
                                <td class="text-md-right"><?php echo e($data->discount_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->vat_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->tax_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->other_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->speed_money_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->fraction_discount_amount); ?></td>
                                <td class="text-md-right"><?php echo e($data->price); ?></td>
                                <td class="text-md-right"><?php echo e($data->total); ?></td>

                                    <td class="text-md-right"></td>
                                    <td class="text-md-center"></td>
                                    <td class="text-md-center"></td>
                                    <td class="text-md-center"></td>
                                    <td class="text-md-center"></td>
                                    <td class="text-md-center"></td>
                                    </tr>

                                    <tr>
                                    <td class="text-md-center" colspan="3"><strong>-Total-</strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-right"><strong></strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    <td class="text-md-center"><strong></strong></td>
                                    </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/report/sales_itemStList.blade.php ENDPATH**/ ?>