<header class="main-header" style="background-color: #11c16e!important;">
    <a href="<?php echo e(route('home')); ?>" class="logo" >
        <img src="<?php echo e(asset('public/front/images/logo/logo2.png')); ?>" class="main_logo" style="margin-top: 5px; width: 180px; height: 60px;" />
        
        <img class="icon_logo" style="    margin-top: 12px;    margin-left:7px;" src="<?php echo e(asset('public/front/images/icons/favicon.png')); ?>" />
        <p class="axtitle_mobile">
            <span class="span1"><br>A Comprehensive thought together, for better and individual growth.</span>
            <span class="span2">Today, 05 Jun 2021 || আজ শনিবার, ৫ জ্যৈষ্ঠ ১৪২৮</span>
        </p>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="toggle_sidebar_menu_call()">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <a class="axtitle" >
           <span><b class="cgold">Falcon Solutions LTD</b><br><?php echo e(companyData()->dialog); ?></span>
        </a>

        <div class="navbar-custom-menu ">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="welmsg">
                    <li class="welmsg">
                        <div class="col-md-12"><?php echo e(Auth::User()->name); ?></div>
                        <div class="col-md-12" style="padding-top: 2px;"  id="app">
                            <div class="dateeng">
                                <span d-text="dateEn.day"></span>
                                <span d-text="dateEn.date"></span>
                                <span d-text="dateEn.month"></span>
                                <span d-text="dateEn.year"></span>
                          </div>
                          <div class="datebng">
                              <span d-text="dateBd.day"></span>
                              <span d-text="dateBd.date"></span>
                              <span d-text="dateBd.month"></span>
                              <span d-text="dateBd.year"></span>
                           <div>
                        </div>
                        </li>
                        <li class="dropdown notifications-menu"></li>
                        <li class="dropdown user user-menu menu-myaccount">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo e(asset('public/frontend/img/user/DV-Lo_1586579338.png')); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"></span>
                            </a>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="border-radius: 50%!important; background: linear-gradient(to bottom,#198d6c 0,#06231b 200%)!important;" >
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </li>

                    <ul class="dropdown-menu">
                        <!-- User image background-color: #2b755e75!important; -->
                        <li class="user-header" style="background-image:url(public/frontend/img/user/DV-Lo_1586579338.jpg)">
                            <p><b>Md.Nur-e-Alam Bhuiyan</b><small>Admin<br></small>
                                <span style="font-size: 10px; color: #ddd;" id="profile_last_active"></span>
                            </p>
                        </li>


                        <li class="submenus">
                            <ul class="text-center">
                                <li><a href="axe_profile.php" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="axe_chpassword.php" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-refresh" ></i> Password</a></li>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-sign-out" ></i> Sign Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" onclick="window.location = window.location" title="Refresh Page" style="padding-left: 27px;padding-right: 27px;">
                        <i class="fa fa-refresh"></i>
                    </a>

                </li>
            </ul>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\New_falcon_laravel\resources\views/layouts/admin/header.blade.php ENDPATH**/ ?>