
<?php $__env->startSection("content"); ?>
<?php
 $mhead='purchase';
 $phead='puric';
?>

    <section class="content-header">
        <h1>Purchase Create</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#">Purchase</a></li>
            <li class=""><a href="#">Purchase Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="<?php echo e(route('purchase-store-page')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="box box-solid">
                <input type="hidden" value="<?php echo e($invoice); ?>" id="pur_invoice" name="pur_invoice" readonly="">
                <input type="hidden" value="<?php echo e($supid); ?>" id="supid" name="supid" readonly="">
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
                                                        <?php echo e($purchase->grand_total); ?>

                                                    </h3>
                                                    <p>Total Payable</p>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo e($purchase->grand_total); ?>" id="payable" name="payable" readonly="">
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="paidamo">0</h3>
                                                    <p>Paid Amount</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="dueamo">
                                                    </h3>
                                                    <p>Total Due</p>
                                                </div>
                                                <input type="hidden" value="<?php echo e($purchase->grand_total); ?>" id="due" name="due" readonly="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Balance (0)</label>
                                                <input type="text" maxlength="10" class="form-control cashr" value="0" name="balance" id="balance" placeholder="e.g. 500" autocomplete="off" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Paid</label>
                                                <input type="text" maxlength="10" class="form-control cashr" name="paid" id="paid" value="0" onchange="return pay_amount()" placeholder="e.g. 500" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Purchase Date</label>
                                                <input type="text" class="form-control datetimepicker" name="purchase_date" id="purdt" value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" placeholder="Purchase Date" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Next Due Date</label>
                                                <input type="text" class="form-control datetimepicker" name="next_date" id="next_date" value="" placeholder="Next Due Date" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-top: 2px solid red; border-bottom: 2px solid black;">
                                        <div class="col-xs-3">
                                            <!-- required for floating -->
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs tabs-left sideways">
                                                <li class=""><a href="#bankpay" data-toggle="tab" class="tabpoint" id="tbank" aria-expanded="false">Bank</a></li>
                                                <li class="active"><a href="#cardpay" data-toggle="tab" class="tabpoint" id="tcard" aria-expanded="true">Card</a></li>
                                                <li class=""><a href="#mobilepay" data-toggle="tab" class="tabpoint" id="tmobile" aria-expanded="false">Mobile</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-9">
                                            <!-- Tab panes -->
                                            <div class="tab-content" style="padding-top: 10px;">
                                                <div class="tab-pane" id="bankpay">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Select Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="bank_id" id="bank_id" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque No</label>
                                                                <input type="text" maxlength="20" class="form-control" name="cheque_no" id="cheque_no" value="" placeholder="e.g. KA7865467" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque Date</label>
                                                                <input type="text" class="form-control datetimepicker" name="cheque_date" id="cheque_date" value="" placeholder="Cheque Date" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="cardpay">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Card Holder Name</label>
                                                                <input type="text" maxlength="35" class="form-control" name="caname" id="caname" value="" placeholder="e.g. Md.Sumon" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Card Holder Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="chbid" id="chbid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Withdrwn Bank</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="w_bid" id="w_bid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="mobilepay">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mobile Account</label>
                                                                <select class="form-control select2 select2-hidden-accessible" name="mobid" id="mobid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>
                                                                    <?php $__currentLoopData = $mob_acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->mname); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>TrxID</label>
                                                                <input type="text" maxlength="20" class="form-control" name="trxid" id="trxid" value="" placeholder="e.g. KA7865467" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Store</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="product_store" id="ivt" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Branch">
                                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="BR-<?php echo e($data->id); ?>" <?php if($data->id== session()->get('brand_id')): ?> selected <?php endif; ?>><?php echo e($data->id); ?> - <?php echo e($data->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>
                                                    <optgroup label="Warehouse">
                                                        <?php $__currentLoopData = $w_house; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="WH-<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ref</label>
                                                <input type="text" maxlength="25" class="form-control" name="ref" id="ref" value="" placeholder="e.g. #ORD8976453" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label>Purchase Person</label>
                                                <input type="text" maxlength="25" class="form-control" name="created_by" id="created_by" value="<?php echo e(Auth::User()->name); ?>" readonly="readonly" autocomplete="off">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Project</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="project_id" id="project_id" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->project_id); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group"> -->
                                                <!-- <label>Requisition No.</label>
                                                <select class="form-control select2 select2-hidden-accessible" name="requisition_id" id="requisition_id" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->code); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Invoice Note"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lc_no" id="lc_no" value="" placeholder="e.g. #LC8976453" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label>PI No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="pi_no" id="pi_no" value="" placeholder="e.g. #PI8976453" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Value:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lc_value" id="lcvlue" onkeypress="return isNumberKey(event)" value="" placeholder="e.g. 560" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C Date:</label>
                                                    <input type="text" class="form-control datetimepicker" name="lc_date" id="lc_date" value="" placeholder="PI Date" autocomplete="off" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label>PI Data:</label>
                                                    <input type="text" class="form-control datetimepicker" name="pi_date" id="pi_date" value="" placeholder="PI Date" autocomplete="off" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Bank:</label>
                                                    <select class="form-control select2 select2-hidden-accessible" name="lc_bank" id="lc_bank" tabindex="-1" aria-hidden="true">
                                                        <option value="">-Select-</option>
                                                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?> - <?php echo e($data->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center side-checkhead">
                                        <button class="btn btn-flat bg-blue saveseinv" type="submit" id="saveinv"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
                                        
                                    </div>
                                </div>

                            </div>
        </form>
        <div class="col-md-5">
            <div class="invhold scrol-y" id="invhold">

                <div class="col-md-12 cart-border-left text-center">
                    <div class="horizontal-scroll">
                        <h5 class="text-center" style="font-size: 20px;">Purchase Details</h5>
                        <div>
                            <div class="text-center header-line-height">
                                <small class="text-center" style="font-size: 15px;">RMC</small>
                                <br> <small class="text-center"><?php echo e(date('Y-m-d', strtotime(now()))); ?></small>
                                <br> <small class="text-center" style="font-size: 12px;"><strong>Purchase Receipt</strong></small>
                                <br> <small class="text-left">Sold By: <?php echo e($purchase->supplier_name); ?></small>
                                <br> <small><span>Purchase From: <?php echo e($purchase->company_name); ?></span></small>
                                <small class="text-left invoice-show" style="display: none;">Invoice ID:<?php echo e($purchase->purchase_track); ?></small>
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
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="cart-summary-table text-left"><?php echo e($data->item_name); ?><br></td>
                                            <td class="cart-summary-table"><?php echo e($data->quantity); ?></td>
                                            <td class="text-right cart-summary-table">TK <?php echo e($data->cost); ?></td>
                                            <td class="text-right cart-summary-table"></td>
                                            <td class="text-right cart-summary-table">TK <?php echo e($data->total); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Discount(<?php echo e($purchase->discount); ?>%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table">TK <?php echo e($purchase->discount_amount); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">VAT(<?php echo e($purchase->vat); ?>%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk <?php echo e($purchase->vat_amount); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">TAX(<?php echo e($purchase->tax); ?>%)</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk <?php echo e($purchase->tax_amount); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Speed Money</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk <?php echo e($purchase->speed_money_amount); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Freight</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk <?php echo e($purchase->freight_amount); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Adjust</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk  <?php echo e($purchase->fraction_discount_amount); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="cart-summary-table font-weight-bold text-left">Total</td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="cart-summary-table"></td>
                                        <td class="text-right cart-summary-table ">Tk  <?php echo e($purchase->grand_total); ?></td>
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






<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/purchase/purchase_checkout.blade.php ENDPATH**/ ?>