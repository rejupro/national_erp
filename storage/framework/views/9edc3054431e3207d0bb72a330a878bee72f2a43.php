<?php $__env->startSection("content"); ?>

    <?php
    $mhead='material';
    $phead='sic';
    ?>
    <section class="content-header">
        <h1>Sales Create</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="<?php echo e(route('sales-list-page')); ?>">Sales</a></li>
            <li class="active"><a href="#">Sales Create</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" name="search" id="search" onkeyup="return search_product()" placeholder="e.g. Product Code or Name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <ul style="margin-top: 0;" class="pagination alphabets">
                                            <li>
                                                <a data-id=""  href="<?php echo e(route('purchase-create-page')); ?>"><b>ALL</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='A')" value="A"><b>A</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='B')" value="B"><b>B</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='C')" value="C"><b>C</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='D')" value="D"><b>D</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='E')" value="E"><b>E</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='F')" value="F"><b>F</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='G')" value="G"><b>G</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='H')" value="H"><b>H</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='I')" value="I"><b>I</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='J')" value="J"><b>J</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='K')" value="K"><b>K</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='L')" value="L"><b>L</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='M')" value="M"><b>M</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='N')" value="N"><b>N</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='O')" value="O"><b>O</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='P')" value="P"><b>P</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='Q')" value="Q"><b>Q</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='R')" value="R"><b>R</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='S')" value="S"><b>S</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='T')" value="T"><b>T</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='U')" value="U"><b>U</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='V')" value="V"><b>V</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='W')" value="W"><b>W</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='X')" value="X"><b>X</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='Y')" value="Y"><b>Y</b></a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="search_product_by_alphabet($id='Z')" value="Z"><b>Z</b></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="purchaseitem" >

                                <div class="product-panel style-2"style="height: 185px;">
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" onclick="add_to_cart(<?php echo e($id=$products->product_id); ?>)">
                                            <div class="product-content product-select puritem" id="" title="">
                                                <img src="<?php echo e(asset($products->avater)); ?>" class="product-image">
                                                <div class="info">
                                                    <h3><?php echo e($products->quantity); ?> Pcs</h3>
                                                    <p><?php echo e($products->cost); ?> BDT</p>
                                                </div>
                                                <div class="product-detail">
                                                    <b class="name"><?php echo e($products->product_name); ?></b>
                                                </div><div class="product-code">
                                                    <b class="sku"><?php echo e($products->code); ?></b>
                                                    <b class="indexg" style="display:none;"><?php echo e($products->pur_scan); ?></b>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <form action="<?php echo e(route('add_purchase_details')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user-o">CN</span></span>
                                                <select class="form-control select2 select2-hidden-accessible" name="supplier_id" id="supid" tabindex="-1" aria-hidden="true" required>
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">INV</span>
                                                <input type="text" class="form-control" id="invoice" name="purchase_track" placeholder="e.g. SALE-INV-0000" value="<?php echo e($invoice); ?>" readonly="readonly" autocomplete="off">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <select class="form-control select2" name="pcode" id="pcode"  onchange="add_to_cart_from_search()">
                                                    <option value="">-Search Here-</option>
                                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($products->product_id); ?>"><?php echo e($products->product_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select><span class="input-group-addon"><a id="addpro" href="<?php echo e(route('product-create-route')); ?>"><span class="fa fa-plus"></span></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-barcode"></span></span>
                                                <input type="text" class="form-control" id="bcode" name="pur_bar_code" placeholder="e.g. Barcode" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <center><h4 style="color: red;"><span>* </span>For expand click on serial no. only..&nbsp;&nbsp;&nbsp;&nbsp;<span>* </span>For collaps click on product name only..</h4></center>
                                    <div class="cart cart-sm">
                                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                            <thead>
                                            <tr>
                                                <th width="30px">SN</th>
                                                <th width="190px">Item</th>
                                                <th width="60px">Cost</th>
                                                <th width="60px">Qty</th>
                                                <th width="35px">ASL</th>
                                                <th width="65px">SubTotal</th>
                                                <th width="60px">Price</th>
                                                <th width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>
                                            </tr>
                                            </thead>
                                        </table>
                                        <div class="cart-msg style-3 item" style="padding:0px;">
                                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                                <tbody id="itemdata">
                                                <?php if($cart): ?>
                                                    <?php $i=0; ?>
                                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $i=$i+1; ?>
                                                        <tr>
                                                            <input type="hidden" name="item_id[]" id="item_id<?php echo e($carts->id); ?>" value="<?php echo e($carts->product_id); ?>">
                                                            <td class="text-center" width="30px"><a href="#" onclick="expand(<?php echo e($id=$i); ?>)"><?php echo e($i); ?></a></td>
                                                            <td class="accordion-toggle" style="cursor: pointer;" width="190px"><a href="#"  onclick="collaps(<?php echo e($id=$i); ?>)"><?php echo e($carts->item_name); ?></a>
                                                                <input type="hidden" name="item_name[]" value="<?php echo e($carts->item_name); ?>" readonly="readonly">
                                                            </td>
                                                            <td width="60px">
                                                                <input type="text" min="1" class="form-control cost" id="cost<?php echo e($i); ?>" value="<?php echo e($carts->cost); ?>" name="cost[]" size="2" style="height: 24px;">
                                                            </td>
                                                            <td width="60px">
                                                                <input type="text" min="1" onchange="calculate_total_grand()"  onkeyup="product_sub_total_with_quantity(<?php echo e($id=$i); ?>)" class="form-control quantity" id="quantity<?php echo e($i); ?>" name="quantity[]" value="0" size="2" style="height: 24px;">
                                                            </td>
                                                            
                                                            <td class="text-center" width="35px">
                                                                <input type="checkbox" class="asl" id="asl" value="1" name="asl[]" checked>
                                                            </td>
                                                            <td width="65px" class="text-right">
                                                                <input type="text" class="form-control price" id="price<?php echo e($i); ?>" value="<?php echo e($carts->cost); ?>" name="price[]" size="2" style="height: 24px;">
                                                            </td>
                                                            <td width="60px">
                                                                <input type="text" min="1" class="form-control price" id="grand_total<?php echo e($i); ?>" name="grand_total[]" value="<?php echo e($carts->cost); ?>" size="2" style="height: 24px;">
                                                            </td>
                                                            <td class="text-center" width="25px">
                                                                <a href="#" onclick="remove_from_cart( <?php echo e($id=$carts->id); ?>)" class="remove">
                                                                    <span style="cursor: pointer;" class="fa fa-times"></span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8" class="" id="sub_table<?php echo e($i); ?>" style="display: none;">
                                                                <div class="accordian-body" id="pitem<?php echo e($i); ?>">
                                                                    <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                                                        <thead>
                                                                        <tr>
                                                                            <th colspan="3" class="text-center">Purchase Discount</th>
                                                                            <th rowspan="2" class="text-center">Warranty Days</th>
                                                                            <th colspan="2" class="text-center">Sales Discount</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="text-center">Percent(%)</th>
                                                                            <th class="text-center">Fixed</th>
                                                                            <th class="text-center">Total</th>
                                                                            <th class="text-center">Percent(%)</th>
                                                                            <th class="text-center">Fixed</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" min="0" class="form-control disp" id="pur_discount<?php echo e($i); ?>" name="pur_discount[]" value="0" onchange="calculate_total_grand()"  onkeyup="product_sub_total_with_quantity(<?php echo e($id=$i); ?>)" size="2" style="height: 24px;" readonly="readonly">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" min="0" class="form-control disf" id="pur_discount_amount<?php echo e($i); ?>"  name="pur_discount_amount[]" value="0" onchange="calculate_total_grand()"  onkeyup="product_sub_total_with_quantity(<?php echo e($id=$i); ?>)" readonly="readonly" size="2" style="height: 24px;">
                                                                            </td>
                                                                            <td id="pur_discount_amount<?php echo e($i); ?>" class="text-right">0</td>
                                                                            <td>
                                                                                <input type="text" min="1" class="form-control wdays" id="warranty<?php echo e($i); ?>" name="warranty[]" value="0" size="2" style="height: 24px;">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" min="0" id="sal_discount<?php echo e($i); ?>" class="form-control sdisp" name="sal_discount[]" value="0" onchange="calculate_total_grand()"  onkeyup="product_sub_total_with_quantity(<?php echo e($id=$i); ?>)" size="2" style="height: 24px;">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" min="0" id="sal_discount_amount<?php echo e($i); ?>" class="form-control sdisf" name="sal_discount_amount[]"  onchange="calculate_total_grand()"  onkeyup="product_sub_total_with_quantity(<?php echo e($id=$i); ?>)" value="0" size="2" style="height: 24px;">
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon">CL</span>
                                                                                        <select class="form-control" name="col_id[]" id="col_id">
                                                                                            <option value="">-Select-</option>
                                                                                            <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($colors->id); ?>" style="background-color: #ffffff; font-color:#000000"><?php echo e($colors->name); ?></option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon">SZ</span>
                                                                                        <select class="form-control" name="size_id[]" id="size_id">
                                                                                            <option value="">-Select-</option>
                                                                                            <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sizes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($sizes->id); ?>" style="background-color: #ffffff; font-color:#000000"><?php echo e($sizes->name); ?></option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <input type="hidden" name="count" id="count" value="<?php echo e($i); ?>">
                                        
                                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                            <tfoot id="itemfoot">
                                            <tr>
                                                <td width="30px"></td>
                                                <td width="190px"></td>
                                                <td width="60px"></td>
                                                <td width="60px"></td>
                                                <td width="35px"></td>
                                                <td width="65px"></td>
                                                <td width="60px"></td>
                                                <td width="25px"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center" width="220px">-Total-</td>
                                                <td width="60px"></td><td colspan="2" width="95px"></td>
                                                <td width="65px" class="text-right"><input type="text" size="4" style="height: 24px;" id="total_amount" onchange="count_grand_total()" ></td>
                                                <td colspan="2" width="85px"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">Discount (%)</td>
                                                <td colspan="2">
                                                    <input type="hide" maxlength="5" min="0" onchange="count_grand_total()" class="form-control" id="discount" name="discount" value="0" size="2" style="height: 24px;"></td>
                                                <td id="discount_amnt" class="text-right"></td>
                                                <td colspan="2" width="85px"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">Discount (Amnt)</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="5" min="0" onchange="count_grand_total()"  class="form-control" id="discount_amount" name="discount_amount" value="0" size="2" style="height: 24px;"></td>
                                                <td id="discount_amount_tk" class="text-right">0</td>
                                                <td colspan="2" width="85px"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">VAT (%)</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="5" min="0" onchange="count_grand_total()"  class="form-control" id="vat" name="vat" value="0" size="2" style="height: 24px;">

                                                    <input type="hide" maxlength="5" min="0" onchange="count_grand_total()"  class="form-control" id="vat_amount" name="vat_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="vat_amnt" class="text-right">0</td>
                                                <td colspan="2"></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">TAX (%)</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="5" min="0" onchange="count_grand_total()"  class="form-control" id="tax" name="tax" value="0" size="2" style="height: 24px;">
                                                    <input type="hide" maxlength="5" min="0" onchange="count_grand_total()"  class="form-control" id="tax_amount" name="tax_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="tax_amnt" class="text-right">0</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">
                                                    <div style="display: inline;">
                                                        
                                                    </div><span id="otdname">Others:</span>
                                                </td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="7" min="0" onchange="count_grand_total()"  class="form-control" id="others_amount" name="others_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="others_amnt" class="text-right">0</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" align="right">Speed Money:</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="6" min="0" onchange="count_grand_total()"  class="form-control" id="speed_money_amount" name="speed_money_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="spmoney" class="text-right">0</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">Freight:</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="6" min="0" onchange="count_grand_total()"  class="form-control" id="freight_amount" name="freight_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="freight_amnt" class="text-right">0</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">Fractional Discount:</td>
                                                <td colspan="2">
                                                    <input type="text" maxlength="6" min="0" onchange="count_grand_total()"  class="form-control" id="fraction_discount_amount" name="fraction_discount_amount" value="0" size="2" style="height: 24px;">
                                                </td>
                                                <td id="frac_dis_amnt" class="text-right">0</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right"><strong>Grand Total:</strong></td>
                                                <input type="hidden" name="final_grand_total" id="final_grand_total" >
                                                <td colspan="2"></td>
                                                <td id="grtotal" class="text-right"><strong></strong></td>
                                                <td colspan="2"></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="row" id="serialpro">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td colspan="4" align="center">No IMEI/Serial Information!</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row" id="extra">
                                    <div class="col-md-6">
                                        <input type="button" id="emptycart" class="btn btn-flat bg-red btn-sm" value="Empty">
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <input type="submit" id="save_purchase" class="btn btn-flat bg-purple btn-sm" value="Checkout">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" readonly="readonly" name="total_prchase" id="total_prchase" value="0">
    </section>
    <!-- page script -->
    <script type="text/javascript">
        function search_product_by_alphabet($id) {
            var search_data = $id;
            $.ajax({
                type:'get',
                url:'<?php echo e(route('search_product_by_alphabet_for_sale')); ?>',
                data:{'id':search_data},
                success:function(product){
                    $("#purchaseitem").html(product);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function search_product() {
            var search_data = $('#search').val();
            $.ajax({
                type:'get',
                url:'<?php echo e(route('search_product_by_name_for_sale')); ?>',
                data:{'id':search_data},
                success:function(product){
                    $("#purchaseitem").html(product);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function search_by_name_code() {
            var search_data = $('#pcode').val();
            $.ajax({
                type:'get',
                url:'<?php echo e(route('search_product_by_name_code_for_sale')); ?>',
                data:{'id':search_data},
                success:function(product){
                    $("#purchaseitem").html(product);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function add_to_cart($id) {
            var product_id = $id;
            $.ajax({
                type:'get',
                url:'<?php echo e(route('add-to-cart_for_sale')); ?>',
                data:{'id':product_id},
                success:function(product){
                    window.setTimeout(function () {
                        window.location.href = "<?php echo e(route('sales-create-page')); ?>";
                    }, 100);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function add_to_cart_from_search() {
            var product_id = $('#pcode').val();
            $.ajax({
                type:'get',
                url:'<?php echo e(route('add-to-cart_for_sale')); ?>',
                data:{'id':product_id},
                success:function(product){
                    window.setTimeout(function () {
                        window.location.href = "<?php echo e(route('sales-create-page')); ?>";
                    }, 100);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function remove_from_cart($id) {
            var product_id = $id;
            $.ajax({
                type:'get',
                url:'<?php echo e(route('delete_cart_list_for_sale')); ?>',
                data:{'id':product_id},
                success:function(product){
                    window.setTimeout(function () {
                        window.location.href = "<?php echo e(route('sales-create-page')); ?>";
                    }, 100);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script type="text/javascript">
        function expand($id){
            var set_id = $id;
            $('#sub_table' +set_id+"").show();
        }
    </script>
    <script type="text/javascript">
        function collaps($id){
            var set_id = $id;
            $('#sub_table' +set_id+"").hide();
        }
    </script>
    <script type="text/javascript">
        function product_sub_total_with_quantity($id){

            var set_id = $id;
            var sal_discount = $('#sal_discount' +set_id+ "").val();
            var sal_discount_amount = $('#sal_discount_amount' +set_id+ "").val();
            if(sal_discount>0){
                var quantity = $('#quantity' +set_id+ "").val();
                var cost = $('#cost' +set_id+ "").val();
                var set_price = (parseFloat(quantity) * parseFloat(cost));
                var total_amount = $('#total_amount').val();
                var set_discount_amount = (parseFloat(sal_discount)/100) * parseFloat(set_price);
                $('#sal_discount_amount' +set_id+ "").val(set_discount_amount);
                var set_sub_total = parseFloat(set_price) - parseFloat(set_discount_amount);
                // var full_total = $('#total_prchase').val();
                //     if(full_total == 0){
                //         $('#total_prchase').val(set_sub_total);
                //         $('#total_amount').val(set_sub_total);
                //         $('#final_grand_total').val(set_sub_total);
                //         $('#grtotal').html(set_sub_total);
                //     }
                //     else{
                //         var final_price = $('#price' +set_id+ "").val();
                //         var set_full_total = (parseFloat(full_total) - parseFloat(final_price)) + parseFloat(set_sub_total);
                //         $('#total_prchase').val(set_full_total);
                //         $('#total_amount').val(set_full_total);
                //         $('#final_grand_total').val(set_full_total);
                //         $('#grtotal').html(set_full_total);
                //     }
                $('#price' +set_id+ "").val(set_sub_total);
                $('#grand_total' +set_id+ "").val(set_price);
            }
            else if(sal_discount_amount>0){
                var quantity = $('#quantity' +set_id+ "").val();
                var cost = $('#cost' +set_id+ "").val();
                var set_price = (parseFloat(quantity) * parseFloat(cost));
                var total_amount = $('#total_amount').val();
                var set_discount = (parseFloat(sal_discount_amount)/parseFloat(cost)) * 100 ;
                $('#sal_discount' +set_id+ "").val(set_discount);
                var set_sub_total = parseFloat(set_price) - parseFloat(sal_discount_amount);
                // var full_total = $('#total_prchase').val();
                //     if(full_total == 0){
                //         $('#total_prchase').val(set_sub_total);
                //         $('#total_amount').val(set_sub_total);
                //         $('#final_grand_total').val(set_sub_total);
                //         $('#grtotal').html(set_sub_total);
                //     }
                //     else{
                //         var final_price = $('#price' +set_id+ "").val();
                //         var set_full_total = (parseFloat(full_total) - parseFloat(final_price)) + parseFloat(set_sub_total);
                //         $('#total_prchase').val(set_full_total);
                //         $('#total_amount').val(set_full_total);
                //         $('#final_grand_total').val(set_full_total);
                //         $('#grtotal').html(set_full_total);
                //     }
                $('#price' +set_id+ "").val(set_sub_total);
                $('#grand_total' +set_id+ "").val(set_price);
            }
            else{
                var quantity = $('#quantity' +set_id+ "").val();
                var cost = $('#cost' +set_id+ "").val();
                var set_price = (parseFloat(quantity) * parseFloat(cost));
                var total_amount = $('#total_amount').val();
                $('#price' +set_id+ "").val(set_price);
                $('#grand_total' +set_id+ "").val(set_price);
                var full_total = $('#total_prchase').val();
                // if(full_total == 0){
                //     $('#total_prchase').val(set_price);
                //     $('#total_amount').val(set_price);
                //     $('#final_grand_total').val(set_price);
                //     $('#grtotal').html(set_price);
                // }
                // else{
                //     var set_full_total = parseFloat(full_total) + parseFloat(set_price);
                //     $('#total_prchase').val(set_full_total);
                //     $('#total_amount').val(set_full_total);
                //     $('#final_grand_total').val(set_full_total);
                //     $('#grtotal').html(set_full_total);
                // }
            }
        }
    </script>

    <script type="text/javascript">
        function calculate_total_grand() {
            var count = $('#count').val();
            var c = parseFloat(count) + 1;
            var i = 1;
            var total = 0;
            for(i ; i < c ; i++){
                var price = $('#price'+ i +"").val();
                var total = parseFloat(price) + parseFloat(total);
            }
            $('#total_amount').val(total);
            $('#purchase_total').val(total);
            $('#final_grand_total').val(total);
            $('#grtotal').html(total);

        }
    </script>

    <script type="text/javascript">
        function product_grand_total($id) {
            var i = $id;
            var j = 1;
            for(j; j<=i ; j++){
                var full_total = $('#total_prchase').val();
                var price = $('#price'+j+"").val();
                if(full_total == 0){
                    $('#total_prchase').val(price);
                }
                else{
                    var set_full_total = parseFloat(full_total) + parseFloat(price);
                    alert(set_full_total);
                    $('#total_prchase').val(set_full_total);
                    $('#total_amount').val(set_full_total);
                }
            }
        }
    </script>

    <script type="text/javascript">
        function count_grand_total(){
            var full_total = $('#total_amount').val();
            var discount = $('#discount').val();
            var discount_amount = $('#discount_amount').val();
            var vat = $('#vat').val();
            var tax = $('#tax').val();
            var others_amount = $('#others_amount').val();
            var speed_money_amount = $('#speed_money_amount').val();
            var freight_amount = $('#freight_amount').val();
            var fraction_discount_amount = $('#fraction_discount_amount').val();

            if(discount>0){
                var with_discount = parseFloat(full_total) - (parseFloat(full_total) * parseFloat(discount)/100);
                $('#discount_amnt').html(parseFloat(full_total) * parseFloat(discount)/100);
                $('#discount_amount').val(parseFloat(full_total) * parseFloat(discount)/100);
                $('#discount_amount').hide();
            }else{
                var with_discount = parseFloat(full_total) - parseFloat(discount_amount);
                $('#discount_amount_tk').html(discount_amount);
                $('#discount').val(parseFloat(discount_amount)/(parseFloat(full_total)*100));
                $('#discount').hide();
            }
            var with_vat = parseFloat(with_discount) + (parseFloat(full_total) * (parseFloat(vat)/100));
            var with_tax = parseFloat(with_vat) + (parseFloat(full_total) * (parseFloat(tax)/100));
            var with_others = parseFloat(with_tax) + parseFloat(others_amount);
            var with_speed_money_amount = parseFloat(with_others) + parseFloat(speed_money_amount);
            var with_freight_amount = parseFloat(with_speed_money_amount) + parseFloat(freight_amount);
            var with_fraction_discount_amount = parseFloat(with_freight_amount) - parseFloat(fraction_discount_amount);
            $('#final_grand_total').val(with_fraction_discount_amount);
            $('#grtotal').html(with_fraction_discount_amount);

            $('#vat_amnt').html(parseFloat(full_total) * parseFloat(vat)/100);
            $('#vat_amount').val(parseFloat(full_total) * parseFloat(vat)/100);
            $('#tax_amount').val(parseFloat(full_total) * parseFloat(tax)/100);
            $('#tax_amnt').html(parseFloat(full_total) * parseFloat(tax)/100);
            $('#others_amnt').html(others_amount);
            $('#spmoney').html(speed_money_amount);
            $('#freight_amnt').html(freight_amount);
            $('#frac_dis_amnt').html(fraction_discount_amount);
        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/sales/sales_create.blade.php ENDPATH**/ ?>