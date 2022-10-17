<?php if(auth()->guard()->check()): ?>
    <script>window.location = "<?php echo e(route('home')); ?>";</script>
<?php endif; ?>

<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Login | National Green Care ERP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('public/hawor/images/favicon.ico')); ?>">

        <!-- preloader css -->
        <link rel="stylesheet" href="<?php echo e(asset('public/hawor/css/preloader.min.css')); ?>" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('public/hawor/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('public/hawor/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('public/hawor/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <!-- <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                
                            </div>
                        </div>
                    </div> -->
                    <!-- end col -->
                    <div class="col-xxl-12 col-lg-12">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-primary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>

                            <div class="customlogin-page">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-3 text-center">
                                        <a href="<?php echo e(url('/')); ?>" class="d-block auth-logo">
                                            <img src="<?php echo e(asset('public/hawor/images/logo.png')); ?>" alt="" height="100">
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0"></h5>
                                            <?php if($errors->any()): ?>
                                                <div class="alert alert-danger" style="margin-top: 15px;">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <form class="mt-3" action="<?php echo e(route('login')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="ইমেইল লিখুন" required="required">
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
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>

                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name="password" placeholder="পাসওয়ার্ড লিখুন" aria-label="Password" aria-describedby="password-addon"  required="required">
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
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                            <div class="row mb-4">

                                                
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>. Crafted with <i class="mdi mdi-heart text-danger"></i> by Webase Solutions</p>
                                    </div>
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('public/hawor/libs/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/hawor/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/hawor/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/hawor/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/hawor/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/hawor/libs/feather-icons/feather.min.js')); ?>"></script>
        <!-- pace js -->
        <script src="<?php echo e(asset('public/hawor/libs/pace-js/pace.min.js')); ?>"></script>
        <!-- password addon init -->
        <script src="<?php echo e(asset('public/hawor/js/pages/pass-addon.init.js')); ?>"></script>

    </body>
    
</html>


<?php /**PATH /home3/nationa2/app.nationalgreencare.com/resources/views/auth/login.blade.php ENDPATH**/ ?>