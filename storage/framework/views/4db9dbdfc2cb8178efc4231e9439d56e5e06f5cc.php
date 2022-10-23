<?php $__env->startSection("content"); ?>
<?php
 $mhead='purchase';
 $phead='puri';
?>
<section class="side-cont">
   <?php echo $__env->make('layouts.admin.print_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="box box-solid">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-3">
                  <div id="test-list" class="notebooks">
                     <input type="text" class="search">
                     <ul class="list" id="listitem">
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('purchese-view-page',['id'=>$lists->id])); ?>">
                           <?php if($lists->pur_invoice==$results->pur_invoice): ?>
                           <li class="invpiv active" >
                           <?php else: ?>
                           <li class="invpiv" >
                           <?php endif; ?>
                              <p><strong class="pino"><?php echo e($lists->pur_invoice); ?></strong><br><br><strong><?php echo e(date('d-m-Y', strtotime($lists->purchase_date))); ?></strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳<?php echo number_format("$lists->payable",2) ?></strong></div>
                           </li>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                     </ul>
                     <div class="whole">
                        <span>
                           <a class="pagination-prev disabled" href="#">
                           &lt;&lt;
                           </a>
                           <ul class="pagination-layout">
                              <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                           </ul>
                           <a class="pagination-next" href="#">
                           &gt;&gt;
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="invhold scrol-y" id="invhold">
                      <?php echo $__env->make('layouts.admin.print_head2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="wrapper" style="width: 407.726px; height: 574.703px; overflow: hidden;">
                           <div id="wrap_invoice" class="page A4 portrait" style="transform: scale(0.51); transform-origin: 10px 0px 0px;">
                              <div class="invoice_header etat_header">
                                 <div class="row model1">
                                    <div class="col-xs-3 invoice-logo">
                                       <img src="<?php echo e(asset(companyData()->image)); ?>" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4><?php echo e(companyData()->name); ?></h4>
                                       <p><?php echo e(companyData()->address); ?><br><strong>Phone:</strong><?php echo e(companyData()->phone); ?><br><strong>Mobile:</strong> <?php echo e(companyData()->mobile); ?><br><strong>Email:</strong> <?php echo e(companyData()->email); ?><br><strong>Web:</strong> <?php echo e(companyData()->web); ?></p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                        <img src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($results->pur_invoice, 'C39')); ?>" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br>
                                        <strong>Invoice N°:</strong> <?php echo e($results->pur_invoice); ?>

                                        <?php if($details->supplier_name!= null): ?><br><strong>Supplier Name:</strong> <?php echo e($details->supplier_name); ?><?php endif; ?>
                                        <?php if($results->project_id!= null): ?><br><strong>Project Code:</strong> <?php echo e($results->project->project_id); ?><?php endif; ?>
                                     </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">PURCHASE INVOICE</h3>
                              </center>
                              <div class="etat_content">
                                 <div class="page_split">
                                    <hr>
                                    <div class="row-cols row">
                                       <div class="clearfix"></div>
                                    </div>
                                    <br>
                                    <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                       <thead>
                                          <tr>
                                             <th style="width:5% !important;">N°</th>
                                             <th style="width:52.5% !important;">Description(Code)</th>
                                             <th style="width:12.5% !important;">Price</th>
                                             <th style="width:10% !important;">Qty</th>
                                             <th style="width:7.5% !important;">Dis</th>
                                             <th style="width:12.5% !important;">Total</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        <?php
                                        $i=1;
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                             <td class="text-md-center"><?php echo e($i++); ?></td>
                                             <td class="text-md-left"><?php echo e($detail->product->name); ?></td>
                                             <td class="text-md-right"><?php echo number_format("$detail->cost",2) ?></td>
                                             <td class="text-md-center"><?php echo e($detail->quantity); ?></td>
                                             <td class="text-md-center"><?php echo number_format("$detail->discount",2) ?></td>
                                             <td class="text-md-right"><?php echo number_format("$detail->total",2) ?></td>
                                          </tr>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Discount Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$details->discount_amount",2) ?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Vat Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$details->vat_amount",2) ?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Tax Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$details->tax_amount",2) ?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Grand Total</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$details->grand_total",2) ?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Total Paid</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$results->paid",2) ?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Due</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap"><?php echo number_format("$results->balance",2) ?></td>
                                          </tr>
                                          
                                         
                                       </tbody>
                                    </table>
                                    <!-- AMOUNT IN WORDS -->
                                    <p>
                                       <b>Amount in words:
                                       </b>
                                       <span style="text-transform: uppercase;">
                                       <?php echo e(NumConvert::word($detail->grand_total)); ?>

                                       <b>Taka</b> Only.</span>
                                    </p>
                                 </div>
                              </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                 <div class="row">
                                    <div class="col-xs-4 col-xs-offset-8">
                                       <p>&nbsp;</p>
                                       <p>&nbsp;</p>
                                       <p style="border-bottom: 1px solid #666;">&nbsp;</p>
                                       <p class="text-md-center">Authorized Singnature</p>
                                    </div>
                                 </div>
                                 <p>&nbsp;</p>
                                 <div style="clear: both;"></div>
                              </div>
                              <div class="invoice_footer">
                                 <hr>
                                 <p style="margin-top: -5px;">Axes Business Automation. © 2021</p>
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
   </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/purchase/purchase_view.blade.php ENDPATH**/ ?>