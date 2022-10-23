
<?php $__env->startSection("content"); ?>
<?php
 $mhead='loan';
 $phead='loancreate';
?>
<section class="content-header">
   <h1>Loan Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Loan</h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('loan-store-route')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. "/>
                                 </div>
                              </div>
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" maxlength="15" value="<?php echo e($loan_track); ?>" id="code" class="form-control" readonly />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                   <label>Type</label>
                                   <select class="form-control" name="type" id="type">
                                      <option value="">Select One</option>
                                      <option value="Person">Person</option>
                                      <option value="Bank">Bank</option>
                                      <option value="Inter Company">Inter Company</option>
                                   </select>
                                </div>
                             </div>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Mobile</label>
                                  <input type="text" name="mobile" maxlength="11" value="" id="mobile" class="form-control" placeholder="e.g.017XXXXXXXXXX"/>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                  <label>Account No</label>
                                  <input type="text" name="acc_no" maxlength="16" value="" id="acc_no" class="form-control" placeholder="e.g. 142545554444" />
                               </div>
                            </div>
                         </div>
                           
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Address</label>
                                   <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Address"></textarea>
                                </div>
                             </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="description" maxlength="200" rows="4" placeholder="Description"></textarea>
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
                        <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('loan-list-route')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/loan/loan_create.blade.php ENDPATH**/ ?>