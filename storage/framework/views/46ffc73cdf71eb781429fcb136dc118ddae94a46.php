<?php $__env->startSection("content"); ?>
<?php
 $mhead='daily';
 $phead='dexr';
?>
<section class="content-header">
   <h1>Daily Expenses List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Daily Process</a></li>
      <li class=""><a href="#">Daily Expenses List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Daily Expenses Record</h3>
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
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>Project Code</th>
                           <th>Staff Name</th>
                           <th>Total Price</th>
                           <th>Note</th>
                           <th>Details</th>
                           <th style="width:40px; text-align:center;">Action</th>
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
                             <a class="btn btn-flat bg-purple" href="<?php echo e(route('daily-expense-destroy-route',['id' => $data->id])); ?>"><i class="fa fa-trash"></i></a>
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
                        <a href="<?php echo e(route('daily-expense-create-route')); ?>" class="btn btn-flat bg-purple">Add Expenses</a>
                        
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
                     <h3 class="box-title">Date Range Filter</h3>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/dailyprocess/daily_expense_list.blade.php ENDPATH**/ ?>