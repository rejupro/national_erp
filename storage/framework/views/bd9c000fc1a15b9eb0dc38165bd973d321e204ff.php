<?php $__env->startSection("content"); ?>
    <?php
    $mhead='daily';
    $phead='dexc';
    ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস ক্রিয়েট <?php else: ?> Daily Expenses Create <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস ক্রিয়েট <?php else: ?> Daily Expenses Create <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস ক্রিয়েট <?php else: ?> Daily Expenses Create <?php endif; ?></h3>
                    </div>
                    <div class="box-body">
                    </div id="result">
                    </div>
                    <form id="dynamic_form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12 popup_details_div">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট কোড <?php else: ?> Project Code <?php endif; ?></label>
                                                <select class="form-control select2" name="project_id" id="project_id">
                                                    <option value="">-Select-</option>
                                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->project_id); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Staff Name <?php endif; ?></label>
                                                <select class="form-control select2" name="stf_id" id="stf_id">
                                                    <option value="">Employees</option>
                                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="EP_<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="">Contractor</option>
                                                    <?php $__currentLoopData = $contractor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="CO_<?php echo e($datas->id); ?>"><?php echo e($datas->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></label>
                                                <input type="text" class="form-control datetimepicker" name="date"  value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" placeholder="Date:" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> ভাউচার নাঃ <?php else: ?> Voucher No <?php endif; ?></label>
                                                <input type="text" name="voucher_no" maxlength="45" value="<?php echo e($code); ?>" id="voucher_no" class="form-control" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" id="user_table">
                                                <thead>
                                                <tr>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্স/প্রোডাক্ট নেম <?php else: ?> Expense/Product Name <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> ইউনিট <?php else: ?> Unit <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> টাইপ <?php else: ?> Type <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> নেট প্রাইস <?php else: ?> Net Price <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> টোটাল প্রাইস <?php else: ?> Total Price <?php endif; ?></th>
                                                    <th><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                <td colspan="4"><?php if( Auth::User()->language == 1 ): ?> টোটাল <?php else: ?> Total <?php endif; ?></td>
                                                <td colspan="1"><input type="text" name="total" maxlength="18" value="0" id="total" class="form-control" /></td>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-13">
                                            <div class="form-group">
                                                <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                                                <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Write your note here"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="clearfix" ></div>
                        <div class="col-md-12 nopadding widgets_area"></div>
                        <div class="row"style="margin-top: 15px" >
                            <div class="col-md-7 "></div>
                            <div class="col-md-4 text-right" >
                                <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('daily-expense-list')); ?>" class="btn btn-flat bg-gray"><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
           
        </div>
        <script>
            var number=0;
            $(document).ready(function(){

                var count = 1;
                

                dynamic_field(count);

                function dynamic_field(number)
                {
                    html = '<tr>';
                    html += '<td><select onchange="getNewVal(this);" class="form-control select2" name="requisition_item[]" required><option selected value="">-Select-</option><optgroup label="Expenses"><?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="<?php echo e($data->name); ?>"><?php echo e($data->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Products"><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="<?php echo e($product->name); ?>"><?php echo e($product->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup></select></td>';
                    html += '<td> <select name="unit_id[]" id="unit_id'+count+'" class="form-control"><option value="" selected>Choose Please.....</option><?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>';
                    html += '<th style="width:200px;"><select class="form-control select2" name="type_id[]" id="type"><option value="0">-Select-</option><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type->id); ?>" ><?php echo e($type->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
                    html += '<td><input type="number" name="nprice[]" id="nprice'+count+'" class="form-control nprice"/></td>';
                    html += '<td><input type="number" name="qty[]" id="qty'+count+'" class="form-control qty" onblur="net_price_count('+count+')" /></td>';
                    html += '<td><input type="number" name="price[]" id="price'+count+'" class="form-control price" onclick="calculationAll('+count+')" /></td>';
                  
                    if(number > 1)
                    {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button><button type="button" name="remove" id="" class="btn btn-danger remove" onclick="remove_price('+count+')">Remove</button></td></tr>';
                        $('tbody').append(html);
                    }
                    else
                    {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button><button type="button" name="remove" id="" class="btn btn-danger remove" onclick="remove_price('+count+')">Remove</button></td></tr>';
                        $('tbody').html(html);
                    }
                    //End testing
                }

                $(document).on('click', '#add', function(){
                    count++;
                    dynamic_field(count);
                });
                $(document).on('click', '.remove', function(){
                    count--;
                    $(this).closest("tr").remove();
                });

                $('#dynamic_form').on('submit', function(event){
                    event.preventDefault();
                   // alert("i huhuhu");
                    $.ajax({
                        url:'<?php echo e(url('/dailyexpenselist/store')); ?>',
                        method:'POST',
                        data:$(this).serialize(),
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').attr('disabled','disabled');
                        },
                        success:function(data)
                        {
                            if(data.error)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    error_html += '<p>'+data.error[count]+'</p>';
                                }
                                $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                            }
                            else
                            {
                                window.location.href = "<?php echo e(route('daily-expense-list')); ?>";
                                
                            }
                            $('#save').attr('disabled', false);
                        }
                    })
                });

            });

          
            

        </script>  
        <script>
            function net_price_count($id){
                var set_id = $id;
                var qty = $('#qty'+set_id+"").val();
                var nprice = $('#nprice'+set_id+"").val();
                var price = parseInt(qty) * parseInt(nprice);
                $('#price'+set_id+"").val(price);


                let amount = $('#amount').val()

                $('#balance').val((parseFloat(amount) - parseFloat(price)))

            }
            function calculationAll($id){
                var initial_total = 0;
                var i = $id;
                var j = 1;
                for(j; j<=i ; j++) {
                    var amount = $('#price'+j+"").val();
                    var set_initial_total = parseInt(initial_total) + parseInt(amount);
                    var initial_total = set_initial_total;
                    $('#total').val(set_initial_total);
                }
            }
            function remove_price($id) {
                var i = $id;
                var initial_total = $('#total').val();
                var price = $('#price'+i+"").val();
                if(price>0) {
                    var set_initial_total = parseInt(initial_total) - parseInt(price);
                    $('#total').val(set_initial_total);
                }else{
                    $('#total').val(0);
                }
            }
        </script>
    </section>

        <script>

$(function () {
    $(document).on("change", "#pay_vaucher_id", function () {
        var id = $(this).val();
            var url = '<?php echo e(route("daily-expense", ":id")); ?>';
            url = url.replace(':id', id);
        
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    //alert(response.mobile);
                    if(response != null){
                        // $('#dsgn_id').val(response.designation.desg_name);
                        $('#amount').val(response.amount);
                        // $('#cemail').val(response.email);
                    }
                }
            });
        

    });
});

    // $function balance() {
    //     var set_initial_total = parseInt(initial_total) + parseInt(amount);
    //     $('#amount').val(response.amount);
    // }
  
       
        
        // $(function () {
        //         $("select").select2();
        //     });
        </script>
    <!-- /.main content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national2\resources\views/main/admin/dailyprocess/daily_expense_create.blade.php ENDPATH**/ ?>