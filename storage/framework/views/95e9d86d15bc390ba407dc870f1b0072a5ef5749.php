
<?php echo $__env->make('layouts.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.main content -->    
</div>

<?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php /**PATH /home/falconso/public_html/resources/views/layouts/frontend/main.blade.php ENDPATH**/ ?>