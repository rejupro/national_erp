


<?php $__env->startSection("content"); ?>
    <?php
    $mhead='requisition';
    $phead='req_create';
    ?>
    
    <section class="content-header">
        <h1>Requisition Successfull</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="">Requisition</a></li>
            <li class=""><a href="#">Requisition Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Your Requisition Create Successfully.Thanks.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
       
    <!-- /.main content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/projects/rmc_construction/final_v5/rmc_final/resources/views/main/admin/requisition/requisition_success.blade.php ENDPATH**/ ?>