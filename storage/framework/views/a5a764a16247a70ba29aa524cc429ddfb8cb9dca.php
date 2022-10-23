<?php $__env->startSection("content"); ?>
<?php
 $mhead='lcsetup';
 $phead='pi';
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> এড পিআই ইনফরমেশন <?php else: ?> Add PI Information <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এড পিআই ইনফরমেশন <?php else: ?> Add PI Information <?php endif; ?></a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এড পিআই ইনফরমেশন <?php else: ?> Add PI Information <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form id="dynamic_form"  enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> পিআই কোড <?php else: ?> PI Code <?php endif; ?></label>
                                    <input type="text" name="pi_code" value="<?php echo e($pi_track); ?>" maxlength="45" value="" id="pi_code" class="form-control"/>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> পিআই ইস্যু ডেট <?php else: ?> PI Issue date  <?php endif; ?></label>
                                    <input type="date" name="pi_date"   value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" id="pi_date" class="form-control"/>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> স্প্লায়ার নেম <?php else: ?> Supplier Name <?php endif; ?></label>
                                    <select class="form-control" name="s_id" id="s_id">
                                        <option selected>Choose Please.....</option>
                                        <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> বায়ার নেম <?php else: ?> Buyer name <?php endif; ?></label>
                                        <select class="form-control" name="b_id" id="b_id">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> পেইমেন্ট টার্মস <?php else: ?> Payment terms <?php endif; ?></label>
                                        <input type="text" name="p_terms"  value="" id="p_terms" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> ইস্যু বাই <?php else: ?> Issue By <?php endif; ?></label>
                                        <input type="text" name="issue_by"  value="" id="issue_by" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> কারেন্সি টাইপ <?php else: ?> Currency type <?php endif; ?></label>
                                        <select class="form-control" name="cur_type" id="cur_type">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($currencys->id); ?>"><?php echo e($currencys->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                                        <input type="text" name="note"  value="" id="note" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped" id="user_table">
                                        <thead>
                                         <tr>
                                             <th>Item</th>
                                             <th>Oty</th>
                                             <th>Cost</th>
                                             <th>Price</th>
                                             <th>Action</th>
                                         </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                         <tr>
                                             <td colspan="2">Total</td>
                                             <td><input type="text" name="extra1" class="form-control" /></td>

                                         </tr>
                                        </tfoot>
                                     </table>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <?php echo csrf_field(); ?>
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('lc-list-pi')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?> History <?php endif; ?> </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- /.main content -->
<script>
    var number=0;
    $(document).ready(function(){

     var count = 1;

     dynamic_field(count);

     function dynamic_field(number)
     {

      html = '<tr>';
            html += '<td> <select name="item[]" id="item[]" class="form-control"><option selected>Choose Please.....</option><?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($products->id); ?>"><?php echo e($products->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>';
            html += '<td><input type="text" name="oty[]" id="oty[]" class="form-control" /></td>';
            html += '<td><input type="text" name="cost[]" id="cost[]" class="form-control" /></td>';
            html += '<td><input type="text" name="price[]" id="price[]" class="form-control" /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
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
            $.ajax({
                url:'<?php echo e(route("pi-setup.insert")); ?>',
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
                        // dynamic_field(1);
                        // $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        window.location.href = "<?php echo e(route('lc-list-pi')); ?>";
                    }
                    $('#save').attr('disabled', false);
                }
            })
     });

    });


    $('#item[]').change(function(){
    var id = $(this).val();
    var url = '<?php echo e(route("getDetails1", ":id")); ?>';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#cost[]').val(response.price);
            }
        }
    });
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/lc_setup/pi_create.blade.php ENDPATH**/ ?>