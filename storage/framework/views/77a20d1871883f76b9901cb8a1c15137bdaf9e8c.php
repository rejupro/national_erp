<?php $__env->startSection("content"); ?>
<?php
 $mhead='account';
 $phead='jourc';
?>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
</head>
<section class="content-header">
   <h1>Journal Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Journal Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Journal</h3>
            </div>
            <div class="box-body">

               <form id="dynamic_form" action="<?php echo e(route("journallist-store-route")); ?>"  method="POST" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">JOURNAL VOUCHER</h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Journal No</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="journal_no" id="invno" value="<?php echo e($jur_track); ?>" placeholder="e.g. JOU010120101" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date" id="apdate" value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Project:</b></span>
                                 <select class="form-control select2" name="project_id" id="prjid">
                                    <option value="">-Select-</option>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>" <?php if(old('project_id') == $project->id): ?> selected <?php endif; ?>><?php echo e($project->project_id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label>Narration</label>
                              <textarea class="form-control" name="narration" id="note" maxlength="250" rows="5" placeholder="e.g. Narration"><?php if(isset($_SESSION['axes_joudata']['note'])){echo $_SESSION['axes_joudata']['note'];}?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th colspan="2" style="text-align:center;">Debit</th>
                                    <th rowspan="2" style="text-align:center;">Amount</th>
                                    <th colspan="2" style="text-align:center;">Credit</th>
                                    <th colspan="2" style="text-align:center;">Cheque Details</th>
                                    <th rowspan="2" style="text-align:center;">Remark</th>
                                    <th rowspan="2" style="text-align:center;">Option</th>
                                 </tr>
                                 <tr>
                                    <th style="text-align:center;">Sub-Group</th>
                                    <th style="text-align:center;">Ledger</th>
                                    <th style="text-align:center;">Ledger</th>
                                    <th style="text-align:center;">Sub-Group</th>
                                    <th style="text-align:center;">Cheque No</th>
                                    <th style="text-align:center;">Date</th>
                                 </tr>
                              </thead>
                              <tbody >
                              </tbody>
                              <tfoot >
                                 <th colspan="2" style="text-align:center;">Total</th>
                                 <th colspan="1" style="text-align:center;"><input type="text" id="total_count" name="total"></th>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_journal" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('journal-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- page script -->
<script>
   var number=0;
   $(document).ready(function(){

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {

     html = '<tr>';
           html += '<th style="width:200px;"><select class="form-control select2" name="debit_sub_group_id[]" id="debit_sub_group_id'+count+'" onchange="find_debit_ledger('+count+')"><option value="">-Select-</option><?php $__currentLoopData = $sub_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($subgroup['id']); ?>" <?php if(old('debit_sub_group_id') == $subgroup['id']): ?> selected <?php endif; ?>><?php echo e($subgroup['name']); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="debit_ledger_id[]" id="debit_ledger_id'+count+'"><option selected value="">-Select-</option></select></th>';
           html += '<th style="width:120px;"><input type="text" maxlength="10" class="form-control" name="debit_amount[]"  id="amount'+count+'"   onchange="get_total_amount('+count+')" placeholder="e.g. 500" autocomplete="off"></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="credit_ledger_id[]" id="credit_ledger_id'+count+'"><option selected value="">-Select-</option></select></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="credit_sub_group_id[]" id="credit_sub_group_id'+count+'" onchange="find_credit_ledger('+count+')"><option value="">-Select-</option><?php $__currentLoopData = $sub_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($subgroup['id']); ?>" <?php if(old('credit_sub_group_id') == $subgroup['id']): ?> selected <?php endif; ?>><?php echo e($subgroup['name']); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:150px;"><input type="text" maxlength="25" class="form-control" name="cheque_no[]" onchange="show_cheque_date('+count+')"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
           html += '<th style="width:100px;"><input type="date"  style="width:200px; display:none;"class="form-control" id="ceque_date'+count+'" name="cheque_date[]"  placeholder="Date:" autocomplete="off" ></th>';
           html += '<th style="width:200px;"><input type="text" maxlength="35" class="form-control" name="ref[]"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
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
    }

    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });

   //  $('#dynamic_form').on('submit', function(event){
   //         event.preventDefault();
   //         $.ajax({
   //             url:'<?php echo e(route("journallist-store-route")); ?>',
   //             method:'POST',
   //             data:$(this).serialize(),
   //             dataType:'json',
   //             beforeSend:function(){
   //                 $('#save').attr('disabled','disabled');
   //             },
   //             success:function(data)
   //             {
   //                 if(data.error)
   //                 {
   //                     var error_html = '';
   //                     for(var count = 0; count < data.error.length; count++)
   //                     {
   //                         error_html += '<p>'+data.error[count]+'</p>';
   //                     }
   //                     $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
   //                 }
   //                 else
   //                 {
   //                   //   dynamic_field(1);
   //                   //   $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
   //                     window.location.href = "<?php echo e(route('journal-list')); ?>";
   //                 }
   //                 $('#save').attr('disabled', false);
   //             }
   //         })
   //  });

   });

   $(function () {
       $("select").select2();
   });


   </script>


<script>
   function show_cheque_date($id){
      var set_id= $id;
      $('#ceque_date'+set_id+"").show();
   }
   function get_total_amount($id){
      var set_id= $id;
     var initial_total = $('#total_count').val();
     var amount = $('#amount'+set_id+"").val();
     alert
     if(initial_total<1){
      $('#total_count').val(amount);
     }else{
        var set_initial_total = parseInt(initial_total) + parseInt(amount);
         $('#total_count').val(set_initial_total);
         $('#grand_total').val(set_initial_total);
     }
   }
</script>

<script>
function find_debit_ledger($id){
   var set_id=$id;
   var sub_grp_id=$('#debit_sub_group_id'+set_id+"").val();
  // alert(sub_grp_id)
   $.ajax({
      type:'get',
      url:'<?php echo e(route('find_debit_ledger')); ?>',
      data:{'sub_grp_id':sub_grp_id},
      success:function(result){
        
         $('#debit_ledger_id'+set_id+"").html(result);

         return false;
      },
      error:function(){

      },
   });
}
function find_credit_ledger($id){
   var set_id=$id;
   var sub_grp_id=$('#credit_sub_group_id'+set_id+"").val();
  // alert(sub_grp_id)
   $.ajax({
      type:'get',
      url:'<?php echo e(route('find_debit_ledger')); ?>',
      data:{'sub_grp_id':sub_grp_id},
      success:function(result){
        
         $('#credit_ledger_id'+set_id+"").html(result);

         return false;
      },
      error:function(){

      },
   });
}
</script>


<!-- /page script -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/accounts/jour_create.blade.php ENDPATH**/ ?>