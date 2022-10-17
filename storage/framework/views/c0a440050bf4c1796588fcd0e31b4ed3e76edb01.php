<?php $__env->startSection("content"); ?>
<?php
 $mhead='payroll';
 $phead='empl';
?>
    <section class="content-header">
        <h1><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি লিস্ট <?php else: ?> Employee List <?php endif; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
            <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট সাব-গ্রুপ ইডিট <?php else: ?> Project Sub-Group Edit <?php endif; ?></a></li>
        </ol>
    </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> ইমপ্লয়ি লিস্ট <?php else: ?> Employee List <?php endif; ?></h3>
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
                        <thead>
                            <tr>

                                <th style="width:40px;"><?php if( Auth::User()->language == 1 ): ?> সিরিয়াল <?php else: ?> SN <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> আইডি নাঃ <?php else: ?> ID No <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> ডেজিগনেসন <?php else: ?> Designation <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> ডিপার্টমেন্ট <?php else: ?> Department <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> মোবাইল <?php else: ?> Mobile <?php endif; ?></th>
                                <th><?php if( Auth::User()->language == 1 ): ?> ইমেইল <?php else: ?> Email <?php endif; ?></th>
                                <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="center"><?php $i++; echo $i; ?></td>
                                <!-- <td><img style="height: 80px; width: 80px; border-radius :50%;" src="<?php echo e(asset($emp->item)); ?>"></td> -->
                                <td><?php echo e($emp->id); ?></td>
                                <td><a  href="<?php echo e(route('employee-details-page',['id' => $emp->id])); ?>"><?php echo e($emp->name); ?></a></td>
                                <td><?php if($emp->designation!=null): ?><?php echo e($emp->designation->desg_name); ?><?php endif; ?></td>
                                <td><?php if($emp->department!=null): ?><?php echo e($emp->department->dept_name); ?><?php endif; ?></td>
                                
                                <td><?php echo e($emp->mobile); ?></td>
                                <td><?php echo e($emp->email); ?></td>
                                <!-- <td><?php echo e($emp->salary); ?></td> -->
                                <!-- <td><?php echo e($emp->debit); ?></td> -->
                                <!-- <td><?php echo e($emp->credit); ?></td> -->
                                <!-- <td><?php echo e($emp->balance); ?></td> -->
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('employee-edit-page',$emp->id)); ?>" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(route('employee-delete-page',$emp->id)); ?>"><i class="fa fa-trash"></i></a>
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
                                <a href="<?php echo e(route('employee-create-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> এড ইমপ্লয়ি <?php else: ?> Add Employee <?php endif; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>


</section>
    <!-- /.main content -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/payroll/employee_list.blade.php ENDPATH**/ ?>