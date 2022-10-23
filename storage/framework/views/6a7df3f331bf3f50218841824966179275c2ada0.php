<?php $__env->startSection("content"); ?>
<?php
 $mhead='daily';
 $phead='dexr';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস লিস্ট <?php else: ?> Daily Expenses List <?php endif; ?></h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস লিস্ট <?php else: ?> Daily Expenses List <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ডেইলি এক্সপেন্সেস লিস্ট <?php else: ?> Daily Expenses List <?php endif; ?></h3>
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
                           <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>ক
                           <th><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট কোড <?php else: ?> Project Code <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> স্টাফ নাম <?php else: ?> Staff Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> টোটাল প্রাইস <?php else: ?> Total Price <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ডিটেইলস <?php else: ?> Details <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <?php
                               $i=1;
                           ?>
                           
                           <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                           <td class="center"><?php echo e($i++); ?></td>
                           <td><?php echo e(date('d-m-Y', strtotime($data->date))); ?></td>
                           <td><?php if($data->project_id !=null): ?><a  href="<?php echo e(route('project-details-page',['id' => $data->project_id])); ?>"><?php echo e(data_get($data,'project.project_id')); ?></a><?php endif; ?></td>
                           <td><?php if($data->stf_id !=null): ?>
                              <?php
                                    $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
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
                           <td style="text-align:right;"><?php echo number_format("$data->grand_total") ?></td>
                           <td><?php echo e($data->address); ?></td>
                           <td><?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data->id==$datas->daily_expense_model_id): ?><p><?php echo e($datas->requisition_item); ?></p><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="<?php echo e(route('daily-expense-view-route',['id' => $data->voucher_no])); ?>"><i class="fa fa-eye"></i></a>
                             <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('daily-expense-destroy-route',['id' => $data->id])); ?>"><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('daily-expense-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড এক্সপেন্সেস <?php else: ?> Add Expenses <?php endif; ?></a>
                        
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
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                        <a class=" pull-right" data-widget="collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i></a>
                     </div>
                     <!-- /. tools -->
                     <i class="fa fa-filter" aria-hidden="true"></i>
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> তারিখ দিয়ে ফিল্টার <?php else: ?> Date Range Filter <?php endif; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     
                  </div>
               </div>
            </div>
         </div>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/dailyprocess/daily_expense_list.blade.php ENDPATH**/ ?>