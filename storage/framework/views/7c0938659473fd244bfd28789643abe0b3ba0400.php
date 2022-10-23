<?php $__env->startSection("content"); ?>
<?php
 $mhead='material';
 $phead='mur';
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
    <section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল ইউস রেকর্ড ক্রিয়েট <?php else: ?> Material Use Record Create <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল ইউস রেকর্ড ক্রিয়েট <?php else: ?> Material Use Record Create <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if($cart): ?>
            <center><h4><?php if( Auth::User()->language == 1 ): ?> ফর্ম ফিলাপ করুন কার্ট করার জন্যে <?php else: ?> Now Fill Up The Fields Add To Cart <?php endif; ?></h4></center>
        <?php else: ?>
        <h3><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট সার্চ করুন এবং কার্ট করুন <?php else: ?> Search Product And Add To Record-Cart <?php endif; ?></h3>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
        <form action="<?php echo e(route('add-to-record-cart')); ?>" method="POST" id="add_to_cart">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Product Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">Itm</span>
                            <select class="form-control select2" name="item_id" id="item_id" required>
                                <option value="">-Select-</option>
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Project</label>
                        <div class="input-group">
                            <span class="input-group-addon">PN</span>
                            <select class="form-control select2" name="project_id" id="project_id" required>
                                <option value="">-Select-</option>
                                <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?>-<?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label></label>
                        <div class="input-group" style="padding-top: 5px;">
                            <input type="submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="ADD"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php endif; ?>
            <form method="POST" action="<?php echo e(route('store-to-cart')); ?>">
                <?php echo csrf_field(); ?>
            <br>
             <span id="result"></span>
        <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th>Item</th>
                <th>SN</th>
                <th>Oty</th>
                <th>Cost</th>
                <th>Price</th>
            </tr>
           </thead>

        <?php if($cart): ?>
           <tbody>
                    <input type="hidden" name="cookie_id" readonly="readonly" value="<?php echo e($cookie_id); ?>" class="form-control"><input type="hidden" name="created_by" value="<?php echo e($created_by); ?>" readonly="readonly" class="form-control">
            <tr>
                <td>
                    <input type="hidden" name="item_id" readonly="readonly" value="<?php echo e($item_id); ?>" class="form-control">
                    <input type="text" name="item_name" readonly="" value="<?php echo e($item_name); ?>" class="form-control">
                </td>
                <td>
                    <input type="hidden" name="project_id" value="<?php echo e($project_id); ?>" readonly="readonly" class="form-control"><input type="text" name="project_name" value="<?php echo e($project_name); ?>" readonly="readonly" class="form-control">
                </td>
                <td><input type="text" name="quantity" id="quantity" onkeyup="return set_quantity()" onchange="return set_grand_total()" class="form-control"></td>
                <td><input type="text" name="cost" id="cost" value="<?php echo e($cost); ?>" class="form-control"></td>
                <input type="hidden" name="asl" id="asl" value="1" class="form-control">
                <td><input type="text" name="price" id="price" class="form-control"></td>
            </tr>
           </tbody>
           <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td></td>
                <td><input type="text" name="total" id="total" class="form-control" onchange="return set_grand_total()" readonly/></td>
            </tr>

            
            <tr>
                <td colspan="3">Grand total </td>
                <td></td>
                <td><input type="text" name="price" id="grand_total" class="form-control" readonly/></td>
            </tr>
            <tr>
            </tr>
           </tfoot>
           <?php endif; ?>
       </table>
                <center align="center">
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Add To Cart" />
                <a href="" class="btn btn-flat bg-gray  ">Cart List</a>
                </center>
      </form>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <!--end same barcode-->
    </section>
    <!-- /.main content -->



<script>
    function set_quantity() {
        var quantity = $('#quantity').val();
        var cost = $('#cost').val();
        var price = $('#price').val();
        if (quantity) {
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        } else {
            var quantity = 1;
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        }
        $('#price').val(set_sub_total);
        $('#total').val(set_sub_total);
        $('#grand_total').val(set_sub_total);
    }
    function set_grand_total() {
        var total = $('#total').val();
        var set_grand_total_amount = parseInt(total) ;
        $('#grand_total').val(set_grand_total_amount);
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/material_use/material_create.blade.php ENDPATH**/ ?>