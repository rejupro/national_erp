<?php $__env->startSection("content"); ?>
<?php
 $mhead='raw_material';
 $phead='other_materiallist';
?>

    <section class="content-header">
	    <h1><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ম্যাটেরিয়াল ইডিট <?php else: ?> Ohter Material Edit <?php endif; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
	        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> অন্যান্য ম্যাটেরিয়াল ইডিট <?php else: ?> Ohter Material Edit <?php endif; ?></a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content">
	    <div class="row">
			<div class="col-md-1"></div>
	       <div class="col-md-10">
	          <div class="box box-solid">
	             <div class="box-header with-border">
	                <h3 class="box-title"><?php echo e($data->name); ?></h3>
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
				   <form action="<?php echo e(route('other_rawmaterialupdate', $data->id)); ?>" method="post" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
				    <div class="row ">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল কোড <?php else: ?> Material Code <?php endif; ?></label>
								<input type="text" name="code" maxlength="35" value="<?php echo e($data->code); ?>" id="code" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Code">
							</div>
							<div class="form-group">
								<label><?php if( Auth::User()->language == 1 ): ?> মেটেরিয়াল নেম <?php else: ?> Material Name <?php endif; ?></label>
								<input type="text" name="name" maxlength="35" value="<?php echo e($data->name); ?>" id="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Material Name">
							</div>
							<div class="form-group">
								<label><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></label>
								<input type="number" name="price" maxlength="35" value="<?php echo e($data->price); ?>" id="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" placeholder="Price">
							</div>
							<div class="form-group">
								<label><?php if( Auth::User()->language == 1 ): ?> ইমেজ <?php else: ?> Image <?php endif; ?></label>
								<input accept="image/*" class="form-control" type='file' name="image" id="imgInp" />
								<?php if($data->image): ?>
								<img id="blah" src="<?php echo e(asset('public/' . $data->image)); ?>" style="max-height: 100px" alt="" />
								<?php else: ?>
								<img id="blah" src="<?php echo e(asset('public/Upload/rawmaterial/no_image.jpg')); ?>" style="max-height: 100px; max-width: 100px">
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
								<textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"><?php echo e(old('description')); ?></textarea>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-5"></div>
						<div class="col-md-4 text-right">
							<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value=" Save "> <a href="<?php echo e(route('rawmaterial-list')); ?>" class="btn btn-flat bg-gray  "> Close </a>
						</div>
					</div>
					</form>
	             </div>
	          </div>
	       </div>
		   
	    </div>
	 </section>
	 <!-- /.main content -->

	 <script>
			imgInp.onchange = evt => {
				const [file] = imgInp.files
				if (file) {
					blah.src = URL.createObjectURL(file)
				}
			}
	 </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\national\resources\views/main/admin/rawmaterial/other/othermaterial_edit.blade.php ENDPATH**/ ?>