
<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='empl';
?>
  <!-- Main content -->

    <aside class="right-side-details" style="display: block;">
        <section class="side-cont">
        <div class="side-head">
        <div class="row"> 
        <div class="col-md-12">    
        <div class="col-md-11 text-left">
        <button class="btn btn-flat bg-teal" id="stprint"><i class="fa fa-print"></i></button>     
        </div>    
        <div class="col-md-1 text-right">
            <a href='<?php echo e(url()->previous()); ?>'><button class="btn btn-flat bg-red" id="closedet"><span><i class="fa fa-times"></i></span></button></a>
        </div>
        </div>
        </div>    
        </div>     
        <div class="box box-solid">
        <div class="box-body">   
        <div class="row"> 
        <div class="col-md-12">
        <div class="col-md-3">
        <div id="profile">
        <div class="card">
        <div class="card-container">
        <div class="card-item">
        <div class="card-header">
        <div class="card-header-bg"></div>
        <img src="" class="card-header-img">
        <div class="card-header-text">
        <span class="card-header-name">
       <?php echo e($data->name); ?></span>
        <span class="card-header-job">
        ID:<?php echo e($data->id); ?></span>
        <span class="card-header-job">
            <?php echo e($data->email); ?></span>
        <span class="card-header-job">
            <?php echo e($data->mobile); ?></span>
        <br>
        <span class="card-header-job">
            <?php echo e($data->address); ?></span>
        </div>
        </div>
        <ul class="card-detail">
            <li class="card-detail-li">
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Payment Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str"><?php echo e($paymentCount); ?></p>
            </li>
            <li class="card-detail-li">
                <p class="card-detail-txt"><span class="card-detail-icon post"><i class="fa fa-file-text-o"></i></span>Daily Expense Voucher&nbsp;&nbsp; </p>
                <p class="card-detail-str"><?php echo e($dailyexpCount); ?></p>
            </li>
        </ul>    
        <div class="card-social">
          
        </div>
        </div>
        </div>
        </div>
            
        
         </div>    
        </div>    
        <div class="col-md-9">
        <div id="details">
        <div class="lightpage">  
        <div class="axestab ui-tabs ui-corner-all ui-widget ui-widget-content">
          
            <ul>
                <li><a href="#overview">
                <span>Overview</span></a></li>
               
                </ul>    
                <div class="tabcontents">
                    <div id="overview">
                   
                    <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="tile wide quote">
                    <div class="header">
                    <div class="count"><?php echo number_format("$paymenttotal") ?></div>
                    </div>
                    <div class="body">
                    <div class="title">Total Debit</div>
                    </div>
                    </div>    
                    </div>
                    <div class="col-md-4">
                    <div class="tile wide invoices">
                    <div class="header">
                    <div class="count"><?php echo number_format("$dailyexptotal") ?></div>
                    </div>
                    <div class="body">
                    <div class="title">Total Credit</div>
                    </div>
                    </div>    
                    </div>
                        <div class="col-md-4">
                            <div class="tile job">
                                <div class="header">
                                    <div class="count"><?php echo e($paymenttotal-$dailyexptotal); ?></div>
                                </div>
                                <div class="body">
                                    <div class="title">Outstanding Balance</div>
                                </div>
                            </div>        
                        </div> 
                    
                    </div>    
                    </div>  
                    <h2>Employee Payment Details</h2>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="cart cart-sm">     
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                        <thead>
                        <tr>
                        <td style="width:40px;">SN</td>
                        <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                        <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                        </tr>    
                        </thead>
                        </table>
                        <div class="cart-det style-3 item" style="padding:0px;">    
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                        <tbody id="tradata">
                           <?php
                               $i=1;
                           ?>
                           <?php $__currentLoopData = $paymentdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td  style="width:40px;" class="center"><?php echo e($i++); ?></td>
                                <td style="text-align:left; width:100px;"><?php echo e(date('d-m-Y', strtotime($datas->created_at))); ?></td>
                                <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('paymentvoucher-view-route',['id'=>$datas->voucher_no])); ?>" id=""><?php echo e($datas->voucher_no); ?></a></td>
                                <td style="text-align:left; width:90px;"><?php echo number_format("$datas->amount") ?></td>         
                            </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>  
                        <tfoot>
                            <tr>
                                <td colspan="3" class="center">Total</td>
                                <td><?php echo number_format("$paymenttotal") ?></td>

                            </tr>
                        </tfoot>  
                        </table>
                        </div>    
                        </div>    
                        </div>    
                        
                        </div> 
                        <br>
                        <br>
                        <h2>Employee Daily Expense Voucher</h2>
                        <div class="col-md-12">
                            <div class="row">
                            <div class="cart cart-sm">     
                                <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                    <td style="width:40px;">SN</td>
                                    <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                                    </tr>    
                                    </thead>
                                    </table>
                                    <div class="cart-det style-3 item" style="padding:0px;">    
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                                    <tbody id="tradata">
                                       <?php
                                           $i=1;
                                       ?>
                                       <?php $__currentLoopData = $dailyexp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td  style="width:40px;" class="center"><?php echo e($i++); ?></td>
                                            <td style="text-align:left; width:100px;"><?php echo e(date('d-m-Y', strtotime($datas2->date))); ?></td>
                                            <td style="text-align:left; width:90px;"><a class="btn btn-flat bg-purple" href="<?php echo e(route('daily-expense-view-route',['id' => $datas2->voucher_no])); ?>"><?php echo e($datas2->voucher_no); ?></a></td>
                                            <td style="text-align:left; width:90px;"><?php echo number_format("$datas2->grand_total") ?></td>         
                                        </tr> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </tbody>  
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="center">Total</td>
                                            <td><?php echo number_format("$dailyexptotal") ?></td>
            
                                        </tr>
                                    </tfoot>  
                                    </table>
                            </div>    
                            </div>    
                            </div>    
                            </div> 
                            <h2>Employee Daily Expense Details</h2>
                                <div class="col-md-12">
                                    <div class="row">
                                    <div class="cart cart-sm">     
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                    <tr>
                                    <td style="width:40px;">SN</td>
                                    <td style="text-align:left; width:100px;"><strong>Date</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Invoice</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Expense/Product</strong></td>
                                    <td style="text-align:left; width:90px;"><strong>Amount</strong></td>         
                                    </tr>    
                                    </thead>
                                    </table>
                                    <div class="cart-det style-3 item" style="padding:0px;">    
                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
                                    <tbody id="tradata">
                                    <?php
                                        $i=1;
                                    ?>
                                    <?php $__currentLoopData = $dailyexpdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td  style="width:40px;" class="center"><?php echo e($i++); ?></td>
                                            <td style="text-align:left; width:100px;"><?php echo e(date('d-m-Y', strtotime($datas3->created_at))); ?></td>
                                            <td style="text-align:left; width:90px;"><?php echo e($datas3->daily_expense_model_id); ?></td>
                                            <td style="text-align:left; width:90px;"><?php echo e($datas3->requisition_item); ?></td>
                                            <td style="text-align:left; width:90px;"><?php echo number_format("$datas3->price") ?></td>         
                                        </tr> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </tbody>  
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="center">Total</td>
                                            <td><?php echo number_format("$dailyexptotal") ?></td>

                                        </tr>
                                    </tfoot>  
                                    </table>
                                    </div>    
                                    </div>    
                                    </div>    
                                    
                                    </div>   
                            </div>      
                            </div>
                            
                    
                    </div>
        
        </div>
        <script type="text/javascript">
        $(".axestab").tabs({ 
          //show: { effect: "slide", direction: "left", duration: 200, easing: "easeOutBack" } ,
          //hide: { effect: "slide", direction: "right", duration: 200, easing: "easeInQuad" } 
        });
        $('.datetimepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, clearBtn: true, orientation: 'auto bottom'});
        $("#stprint").click(function() {    
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
        mode: mode,
        popClose: close
        };
        $("div.printableArea").printArea(options);
        });    
        </script>    
         </div>
        </div>     
        </div>
        </div>    
        </div>
        </div>
        </section>    
        </aside>



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/payroll/employee_details.blade.php ENDPATH**/ ?>