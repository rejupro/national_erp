<?php $__env->startSection("content"); ?>

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            <h2 class="breadcrumbs-title">Projects - Construction Chemicals</h2>
                            <ul class="breadcrumbs-list">
                                <li><a href="<?php echo e(route('index')); ?>">Home</a></li>
                                <li>Projects - Construction Chemicals</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS AREA END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            
            <!-- ABOUT SHELTEK AREA START -->
            <div class="about-sheltek-area ptb-115">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Gallery fancyBox Start -->
                            <a class="fancybox" rel="group" href="<?php echo e(asset('public/front/images/gallery/pu/01.jpg')); ?>"><img src="<?php echo e(asset('public/front/images/gallery/pu/01.jpg')); ?>" alt="" /></a>
                            <a class="fancybox" rel="group" href="<?php echo e(asset('public/front/images/gallery/pu/02.jpg')); ?>"><img src="<?php echo e(asset('public/front/images/gallery/pu/02.jpg')); ?>" alt="" /></a>
                            <a class="fancybox" rel="group" href="<?php echo e(asset('public/front/images/gallery/pu/03.jpg')); ?>"><img src="<?php echo e(asset('public/front/images/gallery/pu/03.jpg')); ?>" alt="" /></a>
                            <a class="fancybox" rel="group" href="<?php echo e(asset('public/front/images/gallery/pu/04.jpg')); ?>"><img src="<?php echo e(asset('public/front/images/gallery/pu/04.jpg')); ?>" alt="" /></a>
                            <!-- Gallery fancyBox End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT SHELTEK AREA END -->
            <!-- SERVICES AREA END -->
        </section>
        <!-- End page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/frontend/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/main/frontend/project_construction_chemicals.blade.php ENDPATH**/ ?>