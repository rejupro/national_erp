<?php $__env->startSection("content"); ?>
<?php
$mhead='requisition';
$phead='req_list';
?>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ইডিট  <?php else: ?> Requisition Edit <?php endif; ?></h1>
      <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ইডিট <?php else: ?> Requisition Edit <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ইডিট <?php else: ?> Requisition Edit <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form id="dynamic_form" action="<?php echo e(route('requisition-update-route',$requisition->id)); ?>"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                  <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                     <label><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট কোড <?php else: ?> Project Code <?php endif; ?></label>
                                    <select class="form-control" name="project_id" id="project_id">
                                    <option value="">-Select-</option>
                                       <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo ($requisition->project_id == $data->id ? "selected" : ""); ?>><?php echo e($data->project_id); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                    <select class="form-control" name="status" id="status">
                                       <option value="Pending" <?php if($requisition->status=='Pending'): ?>   selected <?php endif; ?>>Pending</option>
                                       <option value="Approve" <?php if($requisition->status=='Approve'): ?>   selected <?php endif; ?>>Approve</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ভাঃ নাম্বার <?php else: ?> Requisition V.No <?php endif; ?></label>
                                    <input type="text" name="code" maxlength="15" value="<?php echo e($requisition->code); ?>" id="code" class="form-control" placeholder="e.g. ABA/SU/001" readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <span class="input-group-addon"><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Staff Name <?php endif; ?></span>
                                    <select class="form-control" name="stf_id" id="stf_id" >
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>" <?php if($requisition->stf_id == $data->id ): ?> selected   <?php endif; ?>><?php echo e($data->name); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></label>
                                    <input type="text" name="dsgn_id" maxlength="45" value="<?php echo e($requisition->dsgn_id); ?>" id="dsgn_id" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট নাম্বার <?php else: ?> Contact Number <?php endif; ?></label>
                                    <input type="text" name="cnumber" maxlength="18" value="<?php echo e($requisition->cnumber); ?>" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট ইমেইল <?php else: ?> Contact Email <?php endif; ?></label>
                                    <input type="text" name="cemail" maxlength="45" value="<?php echo e($requisition->cemail); ?>" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="table table-bordered table-striped" id="user_table">
                                    <thead>
                                       <tr>
                                       <th><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সে/প্রোডাক্ট নাম <?php else: ?> Expense/Product Name <?php endif; ?></th>
                                       <th><?php if( Auth::User()->language == 1 ): ?> ইউনিট <?php else: ?> Unit <?php endif; ?></th>
                                       <th><?php if( Auth::User()->language == 1 ): ?> নেট প্রাইস <?php else: ?> Net Price <?php endif; ?></th>
                                       <th><?php if( Auth::User()->language == 1 ): ?> কোয়ানটিটি <?php else: ?> Quantity <?php endif; ?></th>
                                       <th><?php if( Auth::User()->language == 1 ): ?> টোটাল প্রাইস <?php else: ?> Total Price <?php endif; ?></th>
                                       <th><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; ?>
                                        
                                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $i=$i+1; ?>
                                        <tr>
                                           
                                             <input type="hidden" name="detail_id[]" value='<?php echo e($detail->id); ?>' />
                                            
                                            <td>
                                             <input type="text" name="requisition_item[]" id="requisition_item<?php echo e($i); ?>" value="<?php echo e($detail->requisition_item); ?>" class="form-control requisition_item" />
                                            </td>
                                            <td> <select name="unit_id[]" id="unit_id<?php echo e($i); ?>" class="form-control"><option selected value="">Choose Please.....</option><?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($data->id); ?>" <?php if($data->id == $detail->unit_id): ?> selected <?php endif; ?>><?php echo e($data->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>
                                            <td><input type="text" name="nprice[]" id="nprice<?php echo e($i); ?>" value="<?php echo e($detail->nprice); ?>" class="form-control nprice" /></td>
                                            <td><input type="text" name="qty[]" id="qty<?php echo e($i); ?>" value="<?php echo e($detail->qty); ?>"  onblur="net_price_count(<?php echo e($i); ?>)" class="form-control qty" /></td>
                                            <td><input type="text" name="price[]" id="price<?php echo e($i); ?>" value="<?php echo e($detail->price); ?>" onclick="calculationAll(<?php echo e($i); ?>)"  class="form-control price" /></td>
                                            <?php if($d != 0): ?>
                                                <td><button type="button" name="remove" id="remove<?php echo e($i); ?>" class="btn btn-danger remove" onclick="remove_price(<?php echo e($i); ?>)">Remove</button></td>
                                            <?php else: ?>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                     <input type="hidden" name="count" id="count" value="<?php echo e($i); ?>">
                                    <tfoot>
                                       <td colspan="3"><?php if( Auth::User()->language == 1 ): ?> টোটাল <?php else: ?> Total <?php endif; ?></td>
                                       <td colspan="1"><input type="text" name="total" maxlength="18" value="<?php echo e($requisition->grand_total); ?>" id="total" class="form-control" /></td>
                                    </tfoot>
                                 </table>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-13">
                                 <div class="form-group">
                                    <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                                    <textarea class="form-control" name="address" id="address" value="" maxlength="200" rows="4" placeholder="Site Numbers, RMN Core, Office Address"><?php echo e($requisition->address); ?></textarea>
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
                     <div class="col-md-8 "></div>
                     <div class="col-md-4 text-right" >
                        
                        <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> আপডেট <?php else: ?> Update <?php endif; ?>"><a href="<?php echo e(route('requisition-list-route')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
   </div>


  
   <script>
      var number= $('#count').val();
      $(document).ready(function(){

       var count = <?php echo $i; ?> + 1;
       dynamic_field(count);

       function dynamic_field(number)
       {

        html = '<tr>';
              html += '<td><input type="text" name="requisition_item[]" id="requisition_item'+count+'" class="form-control requisition_item"/></td>';
               html += '<td> <select name="unit_id[]" id="unit_id'+count+'" class="form-control"><option value="" selected>Choose Please.....</option><?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td>';
               html += '<td><input type="text" name="nprice[]" id="nprice'+count+'" class="form-control nprice"/></td>';
               html += '<td><input type="text" name="qty[]" id="qty'+count+'" onblur="net_price_count('+count+')" class="form-control qty"/></td>';
               html += '<td><input type="text" name="price[]" id="price'+count+'" class="form-control price" onclick="calculationAll('+count+')" /></td>';
              if(number > 1)
              {
                  html += '<td><button type="button" name="remove" id="remove'+count+'" class="btn btn-danger remove" onclick="remove_price('+count+')">Remove</button></td></tr>';
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

      });
   </script>
    <script>
        function select_employee_phone(){
            var emp_id = $('#stf_id').val();
            $.ajax({
                type:'get',
                url:'<?php echo e(route('select_employee_phone')); ?>',
                data:{'id':emp_id},
                success:function(result){
                    $('#cnumber').val(result);
                    return false;
                },
                error:function(){

                },
            });
        }
    </script>
    <script>
       function net_price_count($id){
          var set_id = $id;
          var qty = $('#qty'+set_id+"").val();
          var nprice = $('#nprice'+set_id+"").val();
          var price = parseInt(qty) * parseInt(nprice);
          $('#price'+set_id+"").val(price);

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

   $('#stf_id').change(function(){
       var id = $(this).val();
       var url = '<?php echo e(route("requisitiongetDetails", ":id")); ?>';
       url = url.replace(':id', id);
   
       $.ajax({
           url: url,
           type: 'get',
           dataType: 'json',
           success: function(response){
               if(response != null){
                   $('#dsgn_id').val(response.designation.desg_name);
                   $('#cnumber').val(response.mobile);
                   $('#cemail').val(response.email);
               }
           }
       });
   });
   
   
   </script>
<!-- /.main content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/requisition/requisition_edit.blade.php ENDPATH**/ ?>