  
<?php $__env->startSection("content"); ?> 

  
<section class="content-header">
    <h1>Material Use Record Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Material Use Record Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="<?php echo e(route('record-store-update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="box box-solid">
                <input type="hidden" value="<?php echo e($record_no); ?>" id="record_no" name="record_no" readonly=""> 
                <input type="hidden" value="<?php echo e($cookie_id); ?>" id="cookie_id" name="cookie_id" readonly=""> 
                <div class="box-body">   
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="col-md-7 shortcuts" id="checkview">
                                    <div class="addpurchase">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4">
                                                <div class="small-box">
                                                    <div class="inner">
                                                        <h3 id="pabamo">
                                                            <?php $sum=0; ?>
                                                            <?php $__currentLoopData = $recrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $sum = $data->price + $sum; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($sum); ?>

                                                        </h3>
                                                        <p>Total Payable</p>
                                                    </div>   
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <br>   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Employee Name</label>    
                                                    <select class="form-control select2 select2-hidden-accessible" name="send_person_id" id="ivt" tabindex="-1" aria-hidden="true">
                                                            <option selected="" value="">-Select-</option>    
                                                                <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                       </select> 
                                                </div>    
                                                <div class="form-group">
                                                    <label>Ref</label>
                                                    <input type="text" maxlength="25" class="form-control" name="ref" id="ref" value="" placeholder="e.g. #ORD8976453" autocomplete="off">    
                                                </div>   
                                            </div>
                                            <div class="col-md-8">    
                                                <div class="form-group">    
                                                    <label>Note</label>
                                                    <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Invoice Note"></textarea>    
                                                </div>

                                                <div class="form-group">
                                                    <label>Challan Date</label>
                                                    <input type="text" class="form-control datetimepicker" name="challan_date" id="purdt" value="" placeholder="challan Date" autocomplete="off" readonly="">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-12 text-center side-checkhead">
                                            <button class="btn btn-flat bg-blue saveseinv" type="submit" id="saveinv"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>    
                                            <button class="btn btn-flat bg-gray saveseinv" id="sinvprint"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp; Invoice &nbsp;&nbsp;<i class="fa fa-print"></i></button>   
                                        </div>    
                                    </div>   
                            
                            </div> 
                        </form>   
                            <div class="col-md-5">
                                <div class="invhold scrol-y" id="invhold">
                                
                                    <div class="col-md-12 cart-border-left text-center">
                                        <div class="horizontal-scroll">
                                            <h5 class="text-center" style="font-size: 20px;">Material Use Details</h5> 
                                        <div>
                                        <?php $__currentLoopData = $recrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="text-center header-line-height">
                                            <small class="text-center" style="font-size: 15px;">RMC</small>
                                            <br> <small class="text-center"><?php echo e(date('Y-m-d', strtotime(now()))); ?></small>
                                            <br> <small class="text-center" style="font-size: 12px;"><strong>Material Use Receipt</strong></small>
                                            <br> <small class="text-left">Project Name:<?php echo e($data->project_name); ?></small> 
                                            <small class="text-left invoice-show" style="display: none;">Invoice ID:<?php echo e($data->record_no); ?></small>
                                        </div> 
                                        <div class="invoice-table">
                                            <table class="table product-card-font" style="font-weight: 500;">
                                                <thead class="border-top-0">    
                                                    <tr>
                                                        <th class="cart-summary-table text-left">Items</th> 
                                                        <th class="cart-summary-table text-left">Qty</th> 
                                                        <th class="cart-summary-table text-right">Price</th>
                                                        <th class="cart-summary-table text-right"></th>
                                                        <th class="cart-summary-table text-right" width="80px;">Total Price</th>
                                                    </tr>   
                                                </thead> 
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="cart-summary-table text-left"><?php echo e($data->item_name); ?><br></td>
                                                        <td class="cart-summary-table"><?php echo e($data->quantity); ?></td> 
                                                        <td class="text-right cart-summary-table"><?php echo e($data->cost); ?> TK </td> 
                                                        <td class="text-right cart-summary-table"></td> 
                                                        <td class="text-right cart-summary-table"><?php echo e($data->cost*$data->quantity); ?> TK </td>
                                                        
                                                    </tr>
                                                </tbody> 
                                                <tfoot>
                                                    <tr>
                                                        <td class="cart-summary-table font-weight-bold text-left">Freight</td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="text-right cart-summary-table "><?php echo e($data->freight_amount); ?> Tk </td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="cart-summary-table font-weight-bold text-left">Total</td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <td class="cart-summary-table"></td> 
                                                        <?php $summ = 0; ?>
                                                        <?php $__currentLoopData = $recrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $summ = $data->price + $summ; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <td class="text-right cart-summary-table "><?php echo e($summ); ?> Tk  </td>
                                                    </tr> 
                                                </tfoot>
                                            </table>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>     
                </div>
            </div> 
    </section>
    <!-- /.main content -->
  <script type="text/javascript">
    function pay_amount() {
        var payable = $('#payable').val();
        var  paid= $('#paid').val();
        if (paid) {
            var set_due = (parseInt(payable) - parseInt(paid));
            var set_paid = parseInt(paid);
        } else {
            var set_due = parseInt(payable);
            var set_paid = paid;
        }
        $('#dueamo').html(set_due);
        $('#paidamo').html(set_paid);
        $('#balance').val(set_due);
        $('#due').val(set_due);
    }
  </script>
<?php $__env->stopSection(); ?>


 


 
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/material_use/material_checkout.blade.php ENDPATH**/ ?>