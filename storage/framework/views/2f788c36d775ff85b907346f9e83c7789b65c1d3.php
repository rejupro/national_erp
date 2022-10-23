<?php $__env->startSection("content"); ?>
<?php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Daily Cash Statement';
$ractive='A';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'DCST';

?>
<section class="content-header">
    <h1>Daily Cash Statement</h1>
    <ol class="breadcrumb">
       <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       <li><a href="mas_brandcreate.php">Report</a></li>
       <li class=""><a href="#">Daily Cash Statement</a></li>
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
        <li  <?php if($ractive=='A'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('dailycashstate-report')); ?>">Daily Cash Statement</a></li>
    </ul>
    </div>
    </div>
    <hr>    
    <form  <?php echo e(route('dailycashstate-report')); ?> enctype="multipart/form-data" method="get" accept-charset="utf-8">
        <?php echo csrf_field(); ?>
    <!--From Data-->   
    
        
        <div class="row"> 
            <div class="col-md-12">    
                <div class="form-group" >
                    <label>From</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" maxlength="18" class="form-control" name="start_date" value='<?php echo e($today); ?>' required autocomplete="off" required>
                    </div>
                </div>
            </div>
              
        </div> 
        <div class="row"> 
           
            <div class="col-md-12">    
                <div class="form-group" >
                    <label>To</label>
                    <div class="input-group date datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" maxlength="18" class="form-control" name="end_date" value='<?php echo e($today); ?>' required autocomplete="off" required>
                    </div>
                </div>
            </div>    
        </div> 
      
        <?php if($br== 1): ?>
            <div class="col-md-12">
            <div class="row">    
                <div class="form-group" >
                    <label>Select Branch</label>
                   
                        
                        <select class="form-control select2" name="brid" id="brid">
                            <option value="">-Select-</option>   
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </select>     
                      
                </div>    
            </div>
            </div> 
        <?php endif; ?>   
        
    
    <!--End From Data-->    
    <div class="clearfix"></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-4"></div>
    <div class="col-md-8 text-right" >
    <input type="submit" name="filter_submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/>
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
    <h3 class="page-title">Daily Cash Statement</h3>
    </center>    
    <div class="etat_content">
        <div class="page_split">
        <hr>    
        <div class="row row-equal">
        <div class="col-xs-4 text-left">
        <h3 class="inv col"><b>Start Date: <?php echo e(date('d-m-Y', strtotime($start))); ?></b></h3>
        </div>
        <div class="col-xs-4 text-center">
        
        </div>    
        <div class="col-xs-4 text-right">
        <h3 class="inv col"><b>End Date:<?php echo e(date('d-m-Y', strtotime($end))); ?> </b></h3>
        </div>
        </div>    
        <hr>
        <br> 
        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
            <th style="width: 40px !important;">SN</th>
            <th>Particular</th>
            <th>Type</th>
            <th style="width: 150px !important;">Amount</th>    
            </tr>
            </thead>
            <tbody>    
                
            <tr>
            <td rowspan="2" colspan="2">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Opening Balance</strong></td>
            <td></td>
            <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>       
            </tr>
            
            <tr>
            <td colspan="4"></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Inflow of Fund</strong></td>    
            </tr>    
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Received Payment</strong></td>    
            </tr>
            <?php $i=1; ?>
            <?php $__currentLoopData = $receives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="width: 40px !important;"><?php echo e($i++); ?></th>
                    <?php
                    if($receive->project_id != null){
                        $prname=DB::table('projects')->where('id', $receive->project_id)->first();
                        $pname=$prname->project_id;
                    }else{
                        $pname='';
                    }
                     
                    ?>
                    <th><?php echo e($receive->voucher_no); ?> - <?php echo e($pname); ?></th>
                    <th><?php $__currentLoopData = $revdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                           <?php if($receive->voucher_no==$revdata->voucher_no): ?><p>
                        
                        
                            <?php
                                    $first = filter_var($revdata->receive_from, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($revdata->receive_from, FILTER_SANITIZE_STRING);
                                    $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                                    //dd($id);
                                    if($type == 'SU'){
                                        $sname=DB::table('suppliers')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'CO'){
                                        $sname=DB::table('procontractors')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EP'){
                                        $sname=DB::table('employees')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    }
                                    if($type == 'CU'){
                                        $sname=DB::table('customers')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    }
                                    if($type == 'LD'){
                                        $sname=DB::table('ledgers')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    } 
                                    if($type == 'LO'){
                                        $data=DB::table('loaninvoices')->where('id', $id)->first(); 
                                        $ids=$data->loan_id;
                                        $sname=DB::table('loans')->where('code',$ids)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EH'){
                                        $sname=DB::table('expenseheads')->where('id', $id)->first(); 

                                        $revname=$sname->name;
                                    }
                                ?>
                                <?php echo e($revname); ?>

                            </p>
                            <?php endif; ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </th>
                    <th style="width: 150px !important;text-align:right;"><?php echo number_format("$receive->amount") ?></th>    
                    </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$receivetotal") ?></strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Revenue</strong></td>    
            </tr>
            <?php $i=1; ?>
            <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="width: 40px !important;"><?php echo e($i++); ?></th>
                    <th><?php echo e($journal->journal_no); ?></th>
                    <th></th>
                    <th style="width: 150px !important;text-align:right;"><?php echo number_format("$journal->total") ?></th>    
                    </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$journaltotal") ?></strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Sales</strong></td>    
            </tr>
            <?php $i=1; ?>
            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="width: 40px !important;"><?php echo e($i++); ?></th>
                    <th><?php echo e($sale->sales_invoice); ?> - <?php echo e($sale->cusname); ?></th>
                    <th><?php $__currentLoopData = $sadetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($sale->sales_invoice==$sadata->sale_track): ?><p><?php echo e($sadata->product->name); ?></p><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></th>
                    <th style="width: 150px !important;text-align:right;"><?php echo number_format("$sale->paid") ?></th>    
                    </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$salestotal") ?></strong></td>    
            </tr>
            <tr>
            <td colspan="4"></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;<strong><i class="fa fa-caret-right"></i>&nbsp;Outflow of Fund</strong></td>    
            </tr>    
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Paid Payment</strong></td>    
            </tr>
            <?php $i=1; ?>
            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="width: 40px !important;"><?php echo e($i++); ?></th>
                    <?php
                    if($payment->project_id != null){
                        $parname=DB::table('projects')->where('id', $payment->project_id)->first();
                        $paname=$parname->project_id;
                    }else{
                        $paname='';
                    }
                     
                    ?>
                    <th><?php echo e($payment->voucher_no); ?> - <?php echo e($paname); ?></th>
                    <th><?php $__currentLoopData = $paydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paydata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $first = filter_var($paydata->payment_to, FILTER_SANITIZE_NUMBER_INT);
                        $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                        $second=filter_var($paydata->payment_to, FILTER_SANITIZE_STRING);
                        $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                        //dd($id);
                            if($type == 'SU'){
                                $sname=DB::table('suppliers')->where('id', $id)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'CO'){
                                $sname=DB::table('procontractors')->where('id', $id)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'EP'){
                                $sname=DB::table('employees')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'CU'){
                                $sname=DB::table('customers')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'LD'){
                                $sname=DB::table('ledgers')->where('id', $id)->first(); 
                                $payname=$sname->name;
                            }
                            if($type == 'LO'){
                                $data=DB::table('loaninvoices')->where('id', $id)->first(); 
                                $ids=$data->loan_id;
                                $sname=DB::table('loans')->where('code',$ids)->first();
                                $payname=$sname->name;
                            }
                            if($type == 'EH'){
                                $sname=DB::table('expenseheads')->where('id', $id)->first(); 

                                $payname=$sname->name;
                            }

                        
                    ?>
                            <?php if($payment->voucher_no==$paydata->voucher_no): ?>
                               

                                <p><?php echo e($payname); ?></p>
                            <?php endif; ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </th>
                    <th style="width: 150px !important;text-align:right;"><?php echo number_format("$payment->amount") ?></th>    
                    </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$paymenttotal") ?></strong></td>    
            </tr>
            
             <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Daily Project Expenses </strong></td>    
            </tr>

            <?php
                $i=1;
            ?>
            <?php $__currentLoopData = $dexpenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
                <td class="center"><?php echo e($i++); ?></td>
                <td><?php echo e($data->voucher_no); ?></td>

                <?php if($data->stf_id!=null): ?>
                <?php
                        $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                        $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                        $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
                        $type = preg_replace("/[^A-Za-z\-]/",'', $second);

                        if($type == 'CO'){
                            $sname=DB::table('procontractors')->where('id', $id)->first();
                            $dname=$sname->name;
                        }
                        if($type == 'EP'){
                            $sname=DB::table('employees')->where('id', $id)->first(); 
                            $dname=$sname->name;
                        
                            }
                    ?>
                
                <?php endif; ?>
                <td><?php echo e(data_get($data,'project.project_id')); ?> => <?php if($data->stf_id !=null): ?><?php echo e($dname); ?><?php endif; ?> <?php $__currentLoopData = $ddetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data->id==$datas->daily_expense_model_id): ?><p><?php echo e($datas->requisition_item); ?></p><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                <td style="text-align:right;"><?php echo number_format("$data->grand_total") ?></td>

                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
             <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$dexpensetotal") ?></strong></td>    
            </tr>
            <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Purchase </strong></td>    
            </tr>
            <?php $i=1; ?>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="width: 40px !important;"><?php echo e($i++); ?></th>
                    <th><?php echo e($purchase->pur_invoice); ?> - <?php echo e($purchase->supname); ?></th>
                    <th><?php $__currentLoopData = $purdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($purchase->pur_invoice==$purdata->purchase_track): ?><p><?php echo e($purdata->product->name); ?></p><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></th>
                    <th style="width: 150px !important;text-align:right;"><?php echo number_format("$purchase->paid") ?></th>    
                    </tr>
                <tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="3" style="text-align:center;"><strong>Total</strong></td>
            <td style="text-align:right;"><strong><?php echo number_format("$purchasetotal") ?></strong></td>    
            </tr>    
            </tbody>
            </table>
            <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr>
                <td colspan="2" rowspan="2"><strong>Transaction Summery</strong></td>
                <td rowspan="2" style="text-align:center;"><strong>Opening</strong></td>    
                <td colspan="3" style="text-align:center;"><strong>From <?php echo e(date('d-m-Y', strtotime($start))); ?> to <?php echo e(date('d-m-Y', strtotime($end))); ?></strong></td>
                <td rowspan="2" style="text-align:center;"><strong>Closing</strong></td>    
                </tr>
                <tr>
                <td style="text-align:center;"><strong>Received</strong></td>
                <td style="text-align:center;"><strong>Payment</strong></td>
                <td style="text-align:center;"><strong>Balance</strong></td>    
                </tr>    
                <tr>
                <td rowspan="2">Cash</td>
                <td></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>    
                <td style="text-align:right;"><strong><?php if($recivedpaytotal > 0): ?><?php echo number_format("$recivedpaytotal") ?> <?php else: ?> <?php echo e($recivedpaytotal); ?> <?php endif; ?> </strong></td> 
                <td style="text-align:right;"><strong><?php if($paymantpaytotal > 0): ?><?php echo number_format("$paymantpaytotal") ?> <?php else: ?> <?php echo e($paymantpaytotal); ?> <?php endif; ?> </strong></td> 
                <td style="text-align:right;"><strong><?php if($recivedpaytotal - $paymantpaytotal > 0): ?><?php $tc = $recivedpaytotal - $paymantpaytotal ;echo number_format("$tc") ?> <?php else: ?> <?php echo e($recivedpaytotal - $paymantpaytotal); ?> <?php endif; ?></strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>          
                </tr>    
                    
                
                    
                <tr>
                <td colspan="1" style="text-align:right;"><strong>Total</strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>    
                <td style="text-align:right;"><strong><?php if($recivedpaytotal > 0): ?><?php echo number_format("$recivedpaytotal") ?> <?php else: ?> <?php echo e($recivedpaytotal); ?> <?php endif; ?> </strong></td> 
                <td style="text-align:right;"><strong><?php if($paymantpaytotal > 0): ?><?php echo number_format("$paymantpaytotal") ?> <?php else: ?> <?php echo e($paymantpaytotal); ?> <?php endif; ?> </strong></td> 
                <td style="text-align:right;"><strong><?php if($recivedpaytotal - $paymantpaytotal > 0): ?><?php $tc = $recivedpaytotal - $paymantpaytotal ;echo number_format("$tc") ?> <?php else: ?> <?php echo e($recivedpaytotal - $paymantpaytotal); ?> <?php endif; ?></strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>          
                </tr>
                <tr>
                <td colspan="5"></td>
                </tr>    
                <tr>
                <td>Bank</td>
                <td></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>          
                <td style="text-align:right;"><strong><?php if($noncashrecieve > 0): ?><?php echo number_format("$noncashrecieve") ?> <?php else: ?> <?php echo e($noncashrecieve); ?> <?php endif; ?></strong></td> 
                <td style="text-align:right;"><strong><?php if($noncashpayment > 0): ?><?php echo number_format("$noncashpayment") ?> <?php else: ?> <?php echo e($noncashpayment); ?> <?php endif; ?></strong></td> 
                <td style="text-align:right;"><strong><?php if($noncashrecieve - $noncashpayment > 0): ?><?php $tnp = $noncashrecieve - $noncashpayment ; echo number_format("$tnp") ?> <?php else: ?> <?php echo e($noncashrecieve - $noncashpayment); ?> <?php endif; ?></strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>                   
                </tr>     
                <tr>
                <td colspan="2" style="text-align:right;"><strong>Total</strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>          
                <td style="text-align:right;"><strong><?php if($noncashrecieve > 0): ?><?php echo number_format("$noncashrecieve") ?> <?php else: ?> <?php echo e($noncashrecieve); ?> <?php endif; ?></strong></td> 
                <td style="text-align:right;"><strong><?php if($noncashpayment > 0): ?><?php echo number_format("$noncashpayment") ?> <?php else: ?> <?php echo e($noncashpayment); ?> <?php endif; ?></strong></td> 
                <td style="text-align:right;"><strong><?php if($noncashrecieve - $noncashpayment > 0): ?><?php $tnp = $noncashrecieve - $noncashpayment ; echo number_format("$tnp") ?> <?php else: ?> <?php echo e($noncashrecieve - $noncashpayment); ?> <?php endif; ?></strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>          
                </tr>
                <tr>
                <td colspan="5"></td>
                </tr>
                <tr>
                <td colspan="2" style="text-align:right;"><strong>Closing Balance</strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>    
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td> 
                <td style="text-align:right;"><strong>0.00</strong></td>
                <td style="text-align:right;"><strong><?php if($totalbalance > 0): ?><?php echo number_format("$totalbalance") ?> <?php else: ?> <?php echo e($totalbalance); ?> <?php endif; ?></strong></td>      
                </tr>    
                </tbody></table>
       
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
        <p style="margin-top: -5px;">RMC. © 2021</p>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/admin/report/rep_daicashst.blade.php ENDPATH**/ ?>