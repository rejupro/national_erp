<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট ইডিট <?php else: ?> Product Edit <?php endif; ?></h1>
   <ol class="breadcrumb">
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i><?php if( Auth::User()->language == 1 ): ?> ড্যাসবোর্ড <?php else: ?> Dashboard <?php endif; ?></a></li>
        <li class=""><a href=""><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট ইডিট <?php else: ?> Product Edit <?php endif; ?></a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title"><?php if( Auth::User()->language == 1 ): ?> প্রোডাক্ট ইডিট <?php else: ?> Product Edit <?php endif; ?></h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('product-update-route',$product->id)); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-9">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> নাম <?php else: ?> Name <?php endif; ?></label>
                                       <input type="text" name="name" maxlength="65" value="<?php echo e($product->name); ?>" id="name" class="form-control" placeholder="e.g. Denim"/>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> কোড <?php else: ?> Code <?php endif; ?></label>
                                       <input type="text" name="code" maxlength="45" value="<?php echo e($product->code); ?>" id="code" class="form-control" placeholder="e.g. Mr.Sumon" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> প্যারেন্ট (অপশনাল) <?php else: ?> Parent (Optional) <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="parent_id" id="parent_id">
                                             <option value="">-Select-</option>
                                             <option value=""></option>
                                          </select>
                                          <span class="input-group-addon"><a href="pro_parentcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ক্যাটেগরি <?php else: ?> Category <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="cat_id" id="cat_id" onchange="getAllSubgroup(this.value)">
                                            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo ($product->cat_id == $category->id ? "selected" : ""); ?>><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="pro_categorycreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> সাবক্যাটেগরি <?php else: ?> SubCategory <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="sub_cat_id" id="sub_cat_id">
                                            <?php $__currentLoopData = $subcategorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subcategory->id); ?>" <?php echo ($product->sub_cat_id == $subcategory->id ? "selected" : ""); ?>><?php echo e($subcategory->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="pro_subcategorylist.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ব্রান্ড <?php else: ?> Brand <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="brand_id" id="brand_id">
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($brand->id); ?>" <?php echo ($product->brand_id == $brand->id ? "selected" : ""); ?>><?php echo e($brand->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="mas_brandcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ম্যানুফেকচারার <?php else: ?> Manufacturer <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="manufac_id" id="manufac_id">
                                            <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($manufacture->id); ?>" <?php echo ($product->manufac_id == $manufacture->id ? "selected" : ""); ?>><?php echo e($manufacture->manufacture_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="mas_mancreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ইউনিট <?php else: ?> Unit <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="unit_id" id="unit_id">
                                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($unit->id); ?>" <?php echo ($product->unit_id == $unit->id ? "selected" : ""); ?>><?php echo e($unit->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="mas_unitcreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> পারচেস স্ক্যান <?php else: ?> Purchase Scan <?php endif; ?></label>
                                       
                                       <input type="text" name="pur_scan" maxlength="65" value="<?php echo e($product->pur_scan); ?>" id="pur_scan" class="form-control" placeholder="e.g. Denim"/>

                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> দেশ <?php else: ?> Country <?php endif; ?></label>
                                       <div class="input-group">
                                          <select class="form-control select2" name="country_id" id="country_id">
                                            <?php $__currentLoopData = $countrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>" <?php echo ($product->country_id == $country->id ? "selected" : ""); ?>><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <span class="input-group-addon"><a href="mas_countrycreate.php"><span class="fa fa-plus"></span></a></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> স্ট্যাটাস <?php else: ?> Status <?php endif; ?></label>
                                       <select class="form-control select2" name="status" id="status">
                                          <option value="1">Active</option>
                                          <option value="0">De-Active</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> সার্টিফেকেট <?php else: ?> Certificate <?php endif; ?></label>
                                       <input type="text" maxlength="100" value="<?php echo e($product->certificate); ?>" name="certificate" id="certificate" class="form-control" placeholder="e.g. ISO:9901"/>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> মিনিমাম স্টক <?php else: ?> Minimum Stock <?php endif; ?></label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="<?php echo e($product->min_stock); ?>" name="min_stock" id="min_stock" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> মডেল নাঃ <?php else: ?> Model No <?php endif; ?></label>
                                       <input type="text" maxlength="25" class="form-control" name="model" value="<?php echo e($product->model); ?>" id="model" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> খরচ <?php else: ?> Cost <?php endif; ?></label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="<?php echo e($product->cost); ?>" name="cost" id="cost" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ওয়ারেন্টি ডেস <?php else: ?> Warranty Days <?php endif; ?></label>
                                       <input type="text" maxlength="4" class="form-control" min="0" value="<?php echo e($product->w_day); ?>" name="w_day" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ব্রান্ড নাঃ <?php else: ?> Brand No <?php endif; ?></label>
                                       <input type="text" maxlength="25" class="form-control" value="<?php echo e($product->brand_no); ?>" name="brand_no" id="brand_no" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> প্রাইস <?php else: ?> Price <?php endif; ?></label>
                                       <input type="text" maxlength="6" class="form-control" min="0" value="<?php echo e($product->price); ?>" name="price" id="price" onkeypress="return isNumberKey(event)" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> বারকোড (অপশনাল) <?php else: ?> Barcode (Optional) <?php endif; ?></label>
                                       <input type="text" maxlength="25" class="form-control" name="barcode" value="<?php echo e($product->barcode); ?>" id="barcode" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ইমেজ <?php else: ?> Image <?php endif; ?></label>
                                       <div style="width:200px; height:245px;">
                                          <img src="../img/product/no_image.png" id="profile-img-tag" style="width: 100%; height: 100%; object-fit: contain;">
                                       </div>
                                       <br>
                                       <input type="file" class="btn btn-file bg-purple btn-sm" name="avater" id="profile-img" accept=".png, .gif, .jpg, .jpeg">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label><?php if( Auth::User()->language == 1 ): ?> ডিসক্রিপসন <?php else: ?> Description <?php endif; ?></label>
                                       <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"><?php echo e($product->description); ?></textarea>
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
                        <input type="submit" name="save_item" id="submit" class="btn btn-flat bg-purple btn-sm " value="<?php if( Auth::User()->language == 1 ): ?> আপডেট <?php else: ?> Update <?php endif; ?>"/> <a href="<?php echo e(route('product-list')); ?>" class="btn btn-flat bg-gray  "><?php if( Auth::User()->language == 1 ): ?> ক্লোজ <?php else: ?> Close <?php endif; ?></a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-4">
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
</section>
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\national\resources\views/main/admin/productsetup/product_edit.blade.php ENDPATH**/ ?>