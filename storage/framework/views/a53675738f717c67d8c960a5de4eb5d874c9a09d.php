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
   <h1>PI Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC Setup</a></li>
      <li class=""><a href="#">PI Setup</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add PI Information</h3>
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
                                    <label>PI Code</label>
                                    <input type="text" name="pi_code" value="<?php echo e($pi_track); ?>" maxlength="45" value="" id="pi_code" class="form-control"/>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>PI Issue date </label>
                                    <input type="date" name="pi_date"   value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" id="pi_date" class="form-control"/>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
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
                                        <label>Buyer name</label>
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
                                        <label>Payment terms</label>
                                        <input type="text" name="p_terms"  value="" id="p_terms" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Issue By</label>
                                        <input type="text" name="issue_by"  value="" id="issue_by" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency type</label>
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
                                        <label>Note</label>
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
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('lc-list-pi')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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
                     <h3 class="box-title">History </h3>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/falconso/public_html/resources/views/main/admin/lc_setup/pi_create.blade.php ENDPATH**/ ?>