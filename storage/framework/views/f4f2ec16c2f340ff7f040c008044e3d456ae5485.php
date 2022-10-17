<?php $__env->startSection("content"); ?>
<?php
 $mhead='daily';
 $phead='der';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস লিস্ট <?php else: ?> Expenses List <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস লিস্ট <?php else: ?> Expenses List <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস রেকর্ড <?php else: ?> Expenses Record <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <?php if($errors->any()): ?>
                     <div class="alert alert-danger">
                        <ul>
                           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><?php echo e($error); ?></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
               <?php endif; ?>
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> এক্সপেন্সেস নাঃ <?php else: ?> Expenses No <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট আইডি <?php else: ?> Project Id <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Staff Name <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> এমাউন্ট <?php else: ?> Amount <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></th>
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> ডিটেইলস <?php else: ?> Details <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php $i=1; ?>
                         <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td class="center"><?php echo e($i++); ?></td>
                           <td><?php echo e(date('d-m-Y', strtotime($expense->date))); ?></td>
                           <td><?php echo e($expense->voucher_no); ?></td>
                           <td><?php if($expense->project!=null): ?><?php echo e($expense->project->project_id); ?> <?php endif; ?></td>
                           <td><?php if($expense->stf_id !=null): ?>
                              <?php
                                    $first = filter_var($expense->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($expense->stf_id, FILTER_SANITIZE_STRING);
                                    $type = preg_replace("/[^A-Za-z\-]/",'', $second);
                                    
                                    if($type == 'CO'){
                                        $sname=DB::table('procontractors')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EP'){
                                        $sname=DB::table('employees')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    
                                        }
                              ?>
                             <?php echo e($revname); ?>

                                 
                              <?php endif; ?>
                           </td>
                           <td style="text-align:right;"><?php echo number_format("$expense->amount",2) ?></td>
                           <td><?php echo e($expense->note); ?></td>
                           <td><?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($expense->voucher_no==$data->voucher_no): ?><p><?php echo e($data->expense_name); ?></p><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="<?php echo e(route('expensevoucher-view-route',['id' => $expense->voucher_no])); ?>"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('expensevoucher-destroy-route',['id' => $expense->voucher_no])); ?>"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="<?php echo e(route('expense-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড এক্সপেন্সেস <?php else: ?> Add Expenses <?php endif; ?></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?>  History  <?php endif; ?> </h3>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/dailyprocess/expenses_list.blade.php ENDPATH**/ ?>