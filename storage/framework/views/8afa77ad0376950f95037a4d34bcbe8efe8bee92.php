	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
    <h1><?php if( Auth::User()->language == 1 ): ?> কন্ট্রাকটর ইডিট <?php else: ?> Contractor Edit <?php endif; ?></h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> কন্ট্রাকটর ইডিট <?php else: ?> Contractor Edit <?php endif; ?></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> কন্ট্রাকটর ইডিট <?php else: ?> Contractor Edit <?php endif; ?></h3>
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
        <form action="<?php echo e(route('project-contractor-update-page',$data->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">
                <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="col-md-12">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>    
                                        <input type="text" name="name" maxlength="45" value="<?php echo e($data->name); ?>" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>    
                                        <select class="form-control" name="status" id="status">
                                            <option value="<?php echo e($data->status); ?>"><?php echo e($data->status); ?></option> 
                                            <option value="Active">Active</option> 
                                            <option value="De-Acive">De-Acive</option>     
                                        </select>
                                    </div>    
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></label>    
                                        <input type="text" name="code" maxlength="15" value="<?php echo e($data->code); ?>" id="code" class="form-control" placeholder="e.g. ABA/CO/001" readonly/>
                                    </div>    
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট নাম্বার <?php else: ?> Contact Number <?php endif; ?></label>    
                                        <input type="text" name="mobile" maxlength="18" value="<?php echo e($data->mobile); ?>" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> কনটাক্ট ইমেইল <?php else: ?> Contact Email <?php endif; ?></label>    
                                        <input type="text" name="email" maxlength="45" value="<?php echo e($data->email); ?>" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                    </div>    
                                </div>    
                                <div class="col-md-3">    
                                
                                </div>    
                            </div>   
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">    
                                        <label><?php if( Auth::User()->language == 1 ): ?> এড্রেস <?php else: ?> Address <?php endif; ?></label>
                                        <textarea class="form-control" name="address" id="address" maxlength="150" rows="4" placeholder="Address"><?php echo e($data->address); ?></textarea>    
                                    </div>
                                </div>    
                                <div class="col-md-6">    
                                    <div class="form-group">
                                        <label><?php if( Auth::User()->language == 1 ): ?> নোট <?php else: ?> Note <?php endif; ?></label>
                                        <textarea class="form-control" name="note" id="note" maxlength="150" rows="4" placeholder="About"><?php echo e($data->note); ?></textarea>   
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
            <div class="col-md-8 ">
            </div>
            <div class="col-md-4 text-right" >
                <input type="submit" name="save_contractor" id="submit" class="btn btn-flat bg-purple btn-sm" value="<?php if( Auth::User()->language == 1 ): ?> আপডেট <?php else: ?> Update <?php endif; ?>"/> <a href="<?php echo e(route('project-contractor-list-page')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
            </div> 
            </div>     
        </form>    
        </div>
        </div>
        </div>
        <div class="col-md-3">
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/main/admin/manage_project/project_contractor_edit.blade.php ENDPATH**/ ?>