<?php $__env->startSection("content"); ?>
<?php
$mhead='daily';
$phead='dexr';
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
                        <a href="<?php echo e(route('daily-expense-view-route',['id' => $lists->voucher_no])); ?>">
                           <?php if($lists->voucher_no==$data->voucher_no): ?>
                           <li class="invpiv active" >
                           <?php else: ?>
                           <li class="invpiv" >
                           <?php endif; ?>
                              <p><strong class="pino"><?php echo e($lists->voucher_no); ?></strong><br><br><strong><?php echo e(date('d-m-Y', strtotime($lists->date))); ?></strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳<?php echo number_format("$lists->grand_total",2) ?></strong></div>
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
                                       <img src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($data->voucher_no, 'C39')); ?>" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Payment N°:</strong> <?php echo e($data->voucher_no); ?>

                                       <br><strong>Date:</strong><?php echo e(date('d-m-Y', strtotime($data->date))); ?>

                                       <?php if($data->stf_id!=null): ?><br><strong>Em/Co Name:</strong> 
                                             <?php
                                                $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                                $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                                $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
                                                $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                                                if($type == 'CO'){
                                                   $sname=DB::table('procontractors')->where('id', $id)->first();
                                                   $revname=$sname->name;
                                                }
                                                if($type == 'EP'){
                                                   $sname=DB::table('employees')->where('id', $id)->first(); 
                                                   $revname=$sname->name;
                                                
                                                   }
                                          ?>
                                       <?php echo e($revname); ?>

                                       <?php endif; ?>
                                       <br><strong>Project Code:</strong> <?php if($data->project_id!=null): ?><?php echo e($data->project->project_id); ?><?php endif; ?>
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">DAILY EXPENSES VOUCHER</h3>
                              </center>
                              <div class="etat_content">
                                    <div class="page_split">
                                     


                                        <hr>
                                        <br>

                                        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                   <th style="width:5% !important;">N°</th>
                                                   <th style="width:12.5% !important;">Expense/Product</th>
                                                   <th style="width:12.5% !important;">Type</th>
                                                   <th style="width:12.5% !important;">Unit</th>
                                                   <th style="width:10% !important;">Net Price</th>
                                                   <th style="width:10% !important;">Quantity</th>
                                                   <th style="width:17.5% !important;">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                ?>
                                                      <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      
                                                <tr>
                                                   <td class="text-md-center"><?php echo e($i++); ?></td>
                                                   <td class="text-md-center"><?php echo e($datas->requisition_item); ?></td>
                                                   <td class="text-md-center"><?php echo e(optional($datas->types)->name); ?></td>
                                                   <td class="text-md-center"><?php echo e(optional($datas->unit)->name); ?></td>
                                                   <td class="text-md-center"><?php echo e($datas->nprice); ?></td>
                                                   <td class="text-md-center"><?php echo e($datas->qty); ?></td>
                                                   <td style="text-align:right;"><?php echo number_format("$datas->price") ?></td> 
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" style="font-weight: bold;text-align:center;">-Total-</td>
                                                    <td id="total" style="text-align:right;"><?php echo number_format("$data->grand_total",2) ?></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td id="word_translate" colspan="7"><span style="font-weight: bold;">In Word:</span> <?php echo e(NumConvert::word($data->grand_total)); ?> taka only</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><span style="font-weight: bold;">Note:<?php echo e($data->note); ?> </span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                <div class="row">

                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Prepared By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Checked By</p>
                                    </div>
                                    <div class="col-xs-4">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Approved By</p>
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




<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/dailyprocess/daily_expense_view.blade.php ENDPATH**/ ?>