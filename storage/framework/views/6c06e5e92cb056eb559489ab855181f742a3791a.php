<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Falcon Solution Ltd</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('public/front/images/icons/favicon.png')); ?>">
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


<body class="loginbg">
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

    <div class="wrapper">
        <div class="login-box" style=" margin-bottom: 5px;">
            <div class="login-logo">
                <img src="<?php echo e(asset('public/front/images/logo/logo.png')); ?>" style="width: 289px; height: 90px;"/>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <p class="text-red text-center"><!-- Error --></p>    
                <form action="<?php echo e(route('login')); ?>" autocomplete="off" method="POST" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
                        <span class="fa fa-envelope form-control-feedback"></span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
                        <span class="fa fa-lock form-control-feedback"></span>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-4"></div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" name="login" class="btn btn-flat bg-purple btn-sm" style="background: linear-gradient(to bottom,#198c6b 0,#000 200%)!important;">Sign In</button>
                        </div>
                        <div class="col-xs-4"></div>
                    </div>
                </form>                        
                <!-- /.col -->                   
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-box-body -->
        </div>
    </div>
    <div  class="modal fade modal-msg" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body" ><p></p></div>
                <div class="modal-footer">
                    <a class="btn btn-flat bg-purple" data-dismiss="modal" aria-label="Close">OK</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('public/frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <!--iCheck-->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck/all.css')); ?>">
    <script src="<?php echo e(asset('plugins/icheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap-datepicker.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/checkedit/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/piker/spectrum.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/datatable/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/treetable/js/jquery.treetable.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/select/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/axes.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/common.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/jquery.PrintArea.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/axes-scanner.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/notify/notify.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/list/list.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/list/list.pagination.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/livevalidation/live_validation.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/parsley.js')); ?>"></script>



</body>  
</html>


<?php /**PATH C:\xampp\htdocs\newfalconsolutions\resources\views/auth/login.blade.php ENDPATH**/ ?>