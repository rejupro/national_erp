<?php $__env->startSection("content"); ?>
<?php
 $mhead='account';
 $phead='recc';
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
   <h1>Receive Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Receive Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Receive</h3>
            </div>
            <div class="box-body">

               <form id="dynamic_form"    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">RECEIVE VOUCHER</h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Voucher No:</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="voucher_no"  value="<?php echo e($pay_track); ?>"  readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date"  value="<?php echo e(date('Y-m-d', strtotime(now()))); ?>" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Project:</b></span>
                                 <select class="form-control select2" name="project_id" >
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
                              <label>Note</label>
                              <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="e.g. Narration"><?php if(isset($_SESSION['axes_joudata']['note'])){echo $_SESSION['axes_joudata']['note'];}?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                    <th>Receive to</th>
                                    <th>Balance</th>
                                    <th>Receive From</th>
                                    <th>Balance</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Cheque</th>
                                    <th>Date</th>
                                    <th>Remark</th>
                                    <th>option</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                 <th colspan="5" style="text-align:center;">Total</th>
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
                        <input type="submit" name="save_journal" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('receivevoucher-list')); ?>" class="btn btn-flat bg-gray">Close</a>
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
           html += '<th style="width:200px;"><select class="form-control select2" name="receive_to[]"><option selected value="">-Source-</option><option  value="LE_5">Cash</option><?php $__currentLoopData = $bankAccount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="BA_<?php echo e($account->id); ?>"><?php echo e($account->name); ?>-<?php echo e($account->acc_no); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__currentLoopData = $mobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobiles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="MA_<?php echo e($mobiles->id); ?>"><?php echo e($mobiles->mname); ?>-<?php echo e($mobiles->mobile); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:50px;"><span>৳ </span><span id="sbalance">0.00</span></th>';
           html += '<th style="width:200px;"><select onchange="getNewVal(this);" class="form-control select2" name="receive_from[]" id="supplier_id"><option selected value="">-Select-</option><optgroup label="Supplier"><?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="SU_<?php echo e($supplier->id); ?>"><?php echo e($supplier->code); ?>-<?php echo e($supplier->name); ?>-<?php echo e($supplier->c_phone); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Customer"><?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="CU_<?php echo e($customers->id); ?>"><?php echo e($customers->code); ?>-<?php echo e($customers->name); ?>-<?php echo e($customers->c_phone); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Contractor"><?php $__currentLoopData = $contructor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contructors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="CO_<?php echo e($contructors->id); ?>"><?php echo e($contructors->code); ?>-<?php echo e($contructors->name); ?>-<?php echo e($contructors->mobile); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Employee"><?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="EP_<?php echo e($employees->id); ?>"><?php echo e($employees->name); ?>-<?php echo e($employees->mobile); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Ledger"><?php $__currentLoopData = $ledger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ledgers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="LD_<?php echo e($ledgers->id); ?>"><?php echo e($ledgers->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><optgroup label="Expenses"><?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option style="background-color:ash;" value="EH_<?php echo e($expense->id); ?>"><?php echo e($expense->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup></select></th>';
           html += '<th style="width:50px;"><span>৳ </span><span id="balance">0.00</span></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="type_id[]" id="type"><option value="0">-Select-</option><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type->id); ?>" ><?php echo e($type->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></th>';
           html += '<th style="width:200px;"><input type="text"  style="width:200px;" maxlength="25" class="form-control" id="ämount'+count+'" name="amount[]" placeholder="e.g. 500" onchange="get_total_amount('+count+')" autocomplete="off"></th>';
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
               url:'<?php echo e(route("receivelist-store-route")); ?>',
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
                       window.location.href = "<?php echo e(route('receivevoucher-list')); ?>";
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });

   });


   $(function () {
       $("select").select2();
   });

</script>



<script type="text/javascript">

   function getNewVal(item)
    {
        const base_url = "<?php echo e(url('/').'/'); ?>";

    var mysupplier_id = $("#supplier_id").val();
    $.ajax({
    type: "get",
    url: base_url+"get-supplier-rcv-invoice/"+item.value,
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

<!-- /page script -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/accounts/rev_voucher_create.blade.php ENDPATH**/ ?>