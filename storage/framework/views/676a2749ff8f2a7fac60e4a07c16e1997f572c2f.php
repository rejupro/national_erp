	
<?php $__env->startSection("content"); ?> 
<?php
 $mhead='material';
 $phead='msfu';
?> 
    <section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়ালস চালান <?php else: ?> Materrials Challan <?php endif; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়ালস চালান <?php else: ?> Materrials Challan <?php endif; ?></a></li>
    </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-9">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> চালান রেকর্ড <?php else: ?> Challan Record <?php endif; ?></h3>
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
    <th><?php if( Auth::User()->language == 1 ): ?> তারিখ <?php else: ?> Date <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্টের নাম <?php else: ?> Product Name <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> প্রোজেক্ট <?php else: ?> Project <?php endif; ?></th>
    <th><?php if( Auth::User()->language == 1 ): ?> টোটাল <?php else: ?> Total <?php endif; ?></th>
    <th style="width:40px; text-align:center;"><?php if( Auth::User()->language == 1 ): ?> অ্যাকশন <?php else: ?> Action <?php endif; ?></th>
    
    </tr>
    </thead>   
    <?php $i=1; ?>
    <tbody>
       <?php $__currentLoopData = $use; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
           <td><?php echo e($i++); ?></td>
       <td><?php echo e($data->created_at); ?></td>
       <td><?php echo e($data->item_name); ?></td>
       <td><?php echo e($data->project_name); ?></td>
       <td><?php echo number_format("$data->price",2) ?></td>
       <td nowrap="">
        <a class="btn btn-flat bg-purple details-invoice" href="<?php echo e(route('material-delete-page',['id'=>$data->id])); ?>"><i class="fa fa-trash"></i></a>
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
    <a href="<?php echo e(route('materialuse-checkout-page')); ?>" class="btn btn-flat bg-purple"><?php if( Auth::User()->language == 1 ): ?> ক্রিয়েট চালান <?php else: ?> Create Challan <?php endif; ?></a>
    </div>
    </div>    
    </div>    
    </div>
    </div>
    </div>
    <div class="col-md-3">
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
    
    <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
    <input type="text" name="tfdate" id="tfdate" value=""  class="form-control" placeholder="Date From" readonly="true">
    </div>
    </div>        
    </div>
    <div class="col-md-6">
    <div class="form-group" >
    <label>Date To</label>
    <div class="input-group date datetimepicker">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    <input type="text" name="ttdate" id="tdate" value=""  class="form-control" placeholder="Date To" readonly="true">
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
    <div class="col-md-2" >
        
    </div>       
    <div class="col-md-10 text-right" >    
    <input type="button" id="csvexp" class="btn btn-flat bg-purple btn-sm " value="Exp->CSV"/>   
    </div> 
    </div>     
    </form>    
        
    </div>
    </div>
    </div>
    
    </div>    
    <div class="row">
    <div class="col-md-12">
    <div class="box box-solid">
    <div class="box-header">
    <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> হিস্টোরি <?php else: ?> History <?php endif; ?> </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" >
     
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>    
    <div style="display: none;">
    <table id="expcsv"></table>
    </div>    
    </section>
    <!-- /.main content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/main/admin/material_use/use_record.blade.php ENDPATH**/ ?>