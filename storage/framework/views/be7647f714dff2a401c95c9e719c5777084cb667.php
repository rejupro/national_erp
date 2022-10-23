<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Axes Business Automation</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('public/frontend/img/favicon.png')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/font-awesome-animation.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/bootstrap-datepicker.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/plugins/datatable/dataTables.bootstrap.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/plugins/datepic/daterangepicker.css?V=1.0')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/plugins/treetable/css/jquery.treetable.css')); ?>">
        <link href="<?php echo e(asset('public/frontend/plugins/piker/spectrum.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/frontend/plugins/select/select2.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/frontend/plugins/toastr/toastr.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('public/frontend/plugins/livevalidation/live_validation.css')); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/axes.css?V=1.0')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/custome.css?V=1.0')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/user_themes/theme1.css?V=1.0')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/responsive.css?V=1.0')); ?>">
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('public/frontend/chat/chatcss/chat.css')); ?>">    
    
 
     
        <style>
    body { padding-right: 0 !important }
    .file_loading_div {
        height: 4px;
        width: 100%;
        position: relative;
        overflow: hidden;
        background-color: #ddd;
    }
    .file_loading_div:before{
        display: block;
        position: absolute;
        content: "";
        left: -200px;
        width: 200px;
        height: 4px;
        background-color: #2980b9;
        animation: loadings 2s linear infinite;
    }

    @keyframes  loadings{
        from {left: -200px; width: 30%;}
        50% {width: 30%;}
        70% {width: 70%;}
        80% { left: 50%;}
        95% {left: 120%;}
        to {left: 100%;}
    }
    /*shake bell icon*/
    .shake_bell {
        animation: shake_me 2s cubic-bezier(.36,.07,.19,.97) both infinite;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
    }
    

    @keyframes  shake_me {
        10%, 90% {
            transform: translate3d(-1px, 0, 0);
            ;
        }
  
        20%, 80% {
            transform: translate3d(2px, 0, 0);
        }

        30%, 50%, 70% {
            transform: translate3d(-4px, 0, 0);
        }

        40%, 60% {
            transform: translate3d(4px, 0, 0);
        }
    }
    .hideBg{
        background: none !important;
    }
    
    .table_tr_active{
        /*background: #f39c1259 !important;*/
        background-color: #076fef99 !important;
        color: #fff !important;
    }
</style>
                <style>
            .enquiry_tab .nav-tabs li a{
                padding: 5px;
                color: #fff;
                padding-bottom: 7px;
                text-transform: uppercase;
            } .enquiry_tab .nav-tabs li.active a{
                color: #000;
            }
        </style>
                <style>.cke{visibility:hidden;}</style>
</head>


<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        <style>
        .sidebar-mini .icon_logo{
        display: none;
        }
        .sidebar-collapse .icon_logo{
        display: block;
            }
        .sidebar-collapse .main_logo{
        display: none;
        }
        </style>


<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.admin.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.admin.quick', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <!-- /.main content -->    
</div>

<?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
</body>  
</html><?php /**PATH /home/bdwwsoft/rmc/resources/views/layouts/admin/main.blade.php ENDPATH**/ ?>