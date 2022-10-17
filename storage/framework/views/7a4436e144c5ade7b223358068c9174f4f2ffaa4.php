<?php $__env->startSection("content"); ?>
<?php
 $mhead='daily';
 $phead='dec';
?>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস ক্রিয়েট <?php else: ?> Expenses Create <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস ক্রিয়েট <?php else: ?> Expenses Create <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস ক্রিয়েট <?php else: ?> Expenses Create <?php endif; ?></h3>
            </div>
            <div class="box-body">

               <form id="dynamic_form"    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title"><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস ভাউচার <?php else: ?> EXPENSES VOUCHER <?php endif; ?></h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><b><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস নাঃ <?php else: ?> Expenses No: <?php endif; ?></b></span>
                                 <input type="text" class="form-control" maxlength="15" name="voucher_no"  value="<?php echo e($pay_track); ?>"  readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date: <?php endif; ?></b></span>
                                 <input type="text" class="form-control datetimepicker" name="date"  value="<?php echo e(today()); ?>" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্টঃ <?php else: ?> Project: <?php endif; ?></b></span>
                                 <select class="form-control select2" name="project_id" >
                                    <option value="">-Select-</option>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>" <?php if(old('project_id') == $project->id): ?> selected <?php endif; ?>><?php echo e($project->project_id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Staff Name: <?php endif; ?></b></span>
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
                        
                        
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                              <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="e.g. Narration"><?php if(isset($_SESSION['axes_joudata']['note'])){echo $_SESSION['axes_joudata']['note'];}?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ক্রেডিটস <?php else: ?> Other Credits <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> ব্যালেন্স <?php else: ?> Balance <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্স হেড <?php else: ?> Expense Head <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> টাইপ <?php else: ?> Type <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> এমাউন্ট <?php else: ?> Amount <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> চেক <?php else: ?> Cheque <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> রিমার্ক <?php else: ?> Remark <?php endif; ?></th>
                                    <th><?php if( Auth::User()->language == 1 ): ?> অপসন <?php else: ?> option <?php endif; ?></th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                 <th colspan="4" style="text-align:center;"><?php if( Auth::User()->language == 1 ): ?> টোটাল <?php else: ?> Total <?php endif; ?></th>
                                 <th colspan="1" style="text-align:center;"><input type="text" id="total_count" name="total" ></th>
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
                        <input type="submit" name="save_journal" id="submit" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> সেভ <?php else: ?> Save <?php endif; ?>"/> <a href="<?php echo e(route('expense-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
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
           html += '<th style="width:200px;"><select class="form-control select2"  name="other_credits[]"><option selected value="">-No Source-</option><option  value="LE_5">Cash</option><?php $__currentLoopData = $bankAccount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="BA_<?php echo e($account->id); ?>"><?php echo e($account->name); ?>-<?php echo e($account->acc_no); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__currentLoopData = $mobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobiles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="MA_<?php echo e($mobiles->id); ?>"><?php echo e($mobiles->mname); ?>-<?php echo e($mobiles->mobile); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:50px;"><span>৳</span><span id="sbalance">0.00</span></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="expense_head[]"><option value="">-Select-</option><?php $__currentLoopData = $expensehead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($head->id); ?>"><?php echo e($head->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="type_id[]" id="type"><option value="0">-Select-</option><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type->id); ?>" ><?php echo e($type->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:200px;"><input type="text"  style="width:200px;" maxlength="10" class="value" id="ämount'+count+'" name="amount[]" placeholder="e.g. 500" onchange="get_total_amount('+count+')" autocomplete="off"></th>';
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

    $('#dynamic_form').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url:'<?php echo e(route("expenselist-store-route")); ?>',
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
                     //   dynamic_field(1);
                     //   $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                       window.location.href = "<?php echo e(route('expense-list')); ?>";
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });

   });




</script>


<script type="text/javascript">

   function getNewVal(item)
    {
        const base_url = "<?php echo e(url('/').'/'); ?>";

    var mysupplier_id = $("#supplier_id").val();
    $.ajax({
    type: "get",
    url: base_url+"get-supplier-exp-invoice/"+item.value,
    cache: false,
    success: function(data){
        // console.log(data);
        let data_html='';
        data.result.invoices.forEach(element => {
            data_html+=`
                <tr>
                <td>
                <input type="checkbox" name="purchase_detail_id[]" value="${element.id}"></td>
                <td>${element.purchase_track}</td>
                <td>${element.item_name}</td>
                <td>${element.grand_total}</td>
                </tr>
            `
        });
        data_html+='';
        $('#itemdata').append(data_html);
        $('#balance').html(data.payable_amount);
    }
    })
        // alert(item.value);
    }

    function getBalance(item)
    {
    //     const base_url = "<?php echo e(url('/').'/'); ?>";

    // var mysupplier_id = $("#supplier_id").val();
    // $.ajax({
    // type: "get",
    // url: base_url+"get-supplier-invoice/"+item.value,
    // cache: false,
    // success: function(data){
    //     // console.log(data);
    //     let data_html='';
    //     data.result.invoices.forEach(element => {
    //         data_html+=`
    //             <tr>
    //             <td>
    //             <input type="checkbox" name="purchase_detail_id[]" value="${element.id}"></td>
    //             <td>${element.purchase_track}</td>
    //             <td>${element.item_name}</td>
    //             <td>${element.grand_total}</td>
    //             </tr>
    //         `
    //     });
    //     data_html+='';
    //     $('#itemdata').append(data_html);
    //     $('#balance').html(data.payable_amount);
    // }
    // })
        alert(item.value);
    }
</script>

<!-- /page script -->
<script>
   function show_cheque_date($id){
      var set_id= $id;
      $('#ceque_date'+set_id+"").show();
   }
   function get_total_amount($id){
      var set_id= $id;
     var initial_total = $('#total_count').val();
     var amount = $('#ämount'+set_id+"").val();
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/dailyprocess/expenses_create.blade.php ENDPATH**/ ?>