<?php $__env->startSection("content"); ?>
<?php
$mhead='requisition';
$phead='req_list';
?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন রেকর্ড <?php else: ?> Requisition Record <?php endif; ?></h1>
      <ol class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
      <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন রেকর্ড <?php else: ?> Requisition Record <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন লিস্ট <?php else: ?> Requisition List <?php endif; ?></h3>
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
                           <th><?php if( Auth::User()->language == 1 ): ?> তারিখ ও সময় <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> ভাউচার নাঃ <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> রিকুইজিশন ফর <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> স্টাফ নেম <?php else: ?> Name <?php endif; ?></th>
                           <th><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Name <?php endif; ?></th>
                           <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
                        </tr>
                     </thead>
                    
                     <?php if($requisition): ?>
                        <tbody>
                           <?php
                               $i=1;
                           ?>
                           <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                             <td width="30px"><?php echo e($i++); ?></td>
                             <td width="30px"><?php echo e($data->created_at); ?></td>
                             <td width="60px"><?php echo e($data->code); ?></td>
                             <td width="60px"><?php echo e($data->project->name); ?>-<?php echo e($data->project->project_id); ?></td>
                              <?php if($data->stf_id != null): ?>
                                 <td width="65px"><?php echo e($data->staff->name); ?></td>
                              <?php else: ?>
                              <td></td>
                              <?php endif; ?>
                             <td width="65px"><?php echo e($data->status); ?></td>
                             <td width="60px">
                                <?php if($data->status=='Pending'): ?> <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-edit-route',$data->code)); ?>"><i class="fa fa-edit"></i></a>
                                <a class="empty" onclick="return confirm('Are you sure you want to delete this item?');" style="cursor: pointer;" href="<?php echo e(route('requisition-delete-route',$data->code)); ?>"><i class="fa fa-trash"></i></a><?php endif; ?>
                                <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-view-route',$data->id)); ?>"><i class="fa fa-eye"></i></a>
                             </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>

                     <?php endif; ?>

                      <!-- /if -->
                      <?php if($daterequisition): ?>
                      <tbody>
                       <?php
                           $i=1;
                       ?>
                       <?php $__currentLoopData = $daterequisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                         <td width="30px"><?php echo e($i++); ?></td>
                         <td width="30px"><?php echo e($data->created_at); ?></td>
                         <td width="60px"><?php echo e($data->code); ?></td>
                         <td width="60px"><?php echo e($data->project->name); ?>-<?php echo e($data->project->project_id); ?></td>
                         <?php if($data->staff->name != null): ?>
                           <td width="65px"><?php echo e($data->staff->name); ?></td>
                         <?php else: ?>
                          <td></td>
                         <?php endif; ?>
                         <td width="65px"><?php echo e($data->status); ?></td>
                         <td width="60px">
                            <?php if($data->status=='Pending'): ?> <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-edit-route',$data->code)); ?>"><i class="fa fa-edit"></i></a>
                            <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-delete-route',$data->code)); ?>"><i class="fa fa-trash"></i></a><?php endif; ?>
                            <a class="empty" style="cursor: pointer;" href="<?php echo e(route('requisition-view-route',$data->code)); ?>"><i class="fa fa-eye"></i></a>
                         </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tbody>

                   <?php endif; ?>
                    
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="<?php echo e(route('requisition-create-route')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড রিকুইজিশন <?php else: ?> Add Requisition <?php endif; ?></a>
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
                     <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> তারিখ অনুযায়ী ফিল্টার <?php else: ?> Date Range Filter <?php endif; ?></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     <form action="<?php echo e(route('daterequisition-list-route')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                     <?php echo csrf_field(); ?>
                        <div class="col-md-12 popup_details_div">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="col-md-1"></div>
                                 <div class="col-md-10">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Date From</label>
                                             <div class="input-group date datetimepicker">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" name="start_date" value=""  class="form-control" placeholder="Date From" readonly="true">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group" >
                                             <label>Date To</label>
                                             <div class="input-group date datetimepicker">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" name="end_date" value=""  class="form-control" placeholder="Date To" readonly="true">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-1"></div>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix" ></div>
                        <div class="col-md-12 nopadding widgets_area"></div>
                        <div class="row"style="margin-top: 15px" >
                           <div class="col-md-8"></div>
                           <div class="col-md-4 text-right" >
                              <input type="submit" name="date_filter" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> সাবমিট <?php else: ?> Submit <?php endif; ?>"/>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">History </h3>
                  </div>
                 
                  <div class="box-body" >
                     
                  </div>
               </div>
            </div>
         </div> -->
      </div>
   </div>
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/requisition/requisition_list.blade.php ENDPATH**/ ?>