
<?php $__env->startSection("content"); ?>
<?php
$mhead='report';
$menuh='Report';
$phead='report';
$page='Customer Statement';
$ractive='C';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'REVCS';
?>
<section class="content-header">
  <h1>Customer Statement</h1>
  <ol class="breadcrumb">
     <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
     <li><a href="mas_brandcreate.php">Report</a></li>
     <li class=""><a href="#">Customer Statement</a></li>
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
    <li  <?php if($ractive=='A'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customerlist-report')); ?>">Customer List</a></li>
    <li  <?php if($ractive=='B'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customerbalance-report')); ?>">Customer Balance</a></li>
    <li  <?php if($ractive=='C'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customerstatement-report')); ?>">Customer Statement</a></li>
    <li  <?php if($ractive=='D'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customeritemstate-report')); ?>">Customer Item Statement</a></li>
    <li  <?php if($ractive=='E'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customerduecol-report')); ?>">Customer Due Collection</a></li>
    <li  <?php if($ractive=='F'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customeroverview-report')); ?>">Customer Overview</a></li>`
    <li  <?php if($ractive=='G'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('revoverview-report')); ?>">Overview</a></li>
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Select District</label>
                <select class="form-control select2" name="did" >
                <option value="">-Select-</option>
                </select>    
            </div>
        </div>        
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Zone</label>
                <select class="form-control select2" name="zid" id="zid">
                <option value="">-Select-</option>
                </select>     
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
     <?php echo $__env->make('main.admin.report.reportstylestate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
     <div class="pcs-template ">
      <div class="pcs-template-header pcs-header-content" id="header">
      <div class="pcs-template-fill-emptydiv"></div>
      </div>
      
      
      <div class="pcs-template-body">
      <table style="line-height:18px;" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tbody><tr>
      <td>
      <img src="<?php echo e(asset('public/frontend/img/no_logo_1589308197.png')); ?>" style="width:100.00px;height:87.00px;" id="logo_content">
      </td>
      
      <td width="50%" class="pcs-orgname text-align-right">
      <b>Axes Business Automation</b><br>
      <span style="white-space: pre-wrap;" id="tmp_org_address"><p>Banasree Staff Quarter Road, Nagdarpar (Police Box), Khilgaon, Dhaka - 1219<br><strong>Phone:</strong> 7217831<br><strong>Mobile:</strong> 01616170070<br><strong>Email:</strong> axes@gmail.com<br><strong>Web:</strong> http://www.axesgl.com</p></span>
      </td>
      </tr>
      <tr>
      <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" class="title-section">
      <tbody><tr>
      <td class="pcs-entity-title" style="padding-top:6px;line-height:30px;"><b>Statement of Accounts</b></td>
      </tr>
      <tr>
        <td style="font-size:12px; border-top: 1px solid #000;border-bottom: 1px solid #000;" height="24" class="text-align-right"><?php echo e($today ."To". $today); ?></td>
      </tr>
      </tbody></table>
      </td>
      </tr>
      <tr>
      <td style="padding:20px 0px 0px 5px;">
      <table cellpadding="0" cellspacing="0" border="0" width="70%">
      <tbody><tr>
      <td class="pcs-label"><b>To</b></td>
      </tr>
      <tr>
      <td>
      <span style="white-space: pre-wrap;" id="tmp_billing_address"><strong><span class="pcs-customer-name" id="zb-pdf-customer-detail"></span></strong></span>
      </td>
      </tr>
      </tbody></table>
      </td>
      <td style="padding:20px 0px 30px 0px;" valign="bottom">
      <table cellpadding="5" cellspacing="0" width="79%" border="0" class="summary-section">
      <tbody><tr>
      <td class="pcs-label" style="padding:4px 6px 4px 6px; border-bottom:1px solid #dcdcdc;" bgcolor="#e8e8e8" colspan="5"><b>Account Summary</b></td>
      </tr>
      <tr>
      <td class="pcs-label" style="padding-top:6px;" width="50%">Opening Balance</td>
      <td style="padding:6px 0px 0px 6px;" class="text-align-right"></td>
      </tr>
      <tr>
      <td class="pcs-label" style="padding-top:4px;">Debit Amount</td>
      <td style="padding:6px 0px 0px 6px;" class="text-align-right"></td>
      </tr>
      <tr>
      <td class="pcs-label">Credit Amount</td>
      <td style="padding:4px 0px 2px 6px;" class="text-align-right"></td>
      </tr>
   
      <tr>
      <td class="pcs-label" style="padding-top:6px;border-top:1px solid #000;">Outstanding Balance</td>
      <td style="padding:6px 0px 0px 6px;border-top:1px solid #000;" class="text-align-right"></td>
      </tr>
      </tbody></table>
      </td>
      </tr>
      </tbody></table>
      <table style="line-height:18px;margin-top:10px;" cellpadding="2" cellspacing="0" border="0" width="100%" class="trpadding">
      <thead>
      <tr height="26">
      <th width="15%" class="pcs-itemtable-header"><b>Date</b></th>
      <th width="14%" class="pcs-itemtable-header"><b>Transactions</b></th>
      <th width="25%" class="pcs-itemtable-header"><b>Details</b></th>
      <th width="13%" class="text-align-right pcs-itemtable-header"><b>Amount</b></th>
      <th width="13%" class="text-align-right pcs-itemtable-header"><b>Payments</b></th>
      <th width="20%" class="text-align-right pcs-itemtable-header"><b>Balance</b></th>
      </tr>
      </thead>
      <tbody class="itemBody">
       
      <tr class="trclass_oddrow breakrow-inside breakrow-after" style="border-bottom: 1px solid #8f948f66;">
      <td class="box-padding"></td>
      <td class="box-padding">***Opening Balance***</td>
      <td class="box-padding"></td>
      <td class="text-align-right box-padding"></td>
      <td class="text-align-right box-padding"></td>
      <td class="text-align-right box-padding"></td>
      </tr> 
     
      <tr class="trclass_oddrow breakrow-inside breakrow-after" style="border-bottom: 1px solid #8f948f66;">
      <td class="box-padding"></td>
      <td class="box-padding"></td>
      <td class="box-padding"></td>
      <td class="text-align-right box-padding"></td>
      <td class="text-align-right box-padding"></td>
      <td class="text-align-right box-padding"><strong></strong></td>
      </tr>
      </tbody>
      </table>
      <table width="100%" style="border-top: 1px solid #dcdcdc;">
      <tbody>
      <tr>
      <td></td>
      <td width="50%">
      <table width="100%">
      <tbody>
      <tr>
      <td width="50%" class="box-padding" align="right" valign="middle"><b>Outstanding Balance</b></td>
      <td class="box-padding" align="right" valign="middle"><strong></strong></td>
      </tr>
      </tbody>
      </table>
      </td>
      </tr>
      </tbody>
      </table>
        
      </div>
      <div class="pcs-template-footer">
      <div>
            
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
    <!-- /.main content --> 



<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/report/rep_revcustomerstate.blade.php ENDPATH**/ ?>