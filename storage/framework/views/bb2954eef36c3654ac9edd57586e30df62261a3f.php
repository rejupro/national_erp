<!doctype html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

  <meta name="author" content="FalconSolutionLtd">
  
  <!-- <meta name="robots" content="noindex"> -->

  <!-- <link rel="canonical" href="https://www.falconsolutionbd.com/" /> -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <meta name="msvalidate.01" content="FC42D3A7503555FF8A78D6F1B6F18755" />
  
  <!-- for G Sute -->
  <meta name="google-site-verification" content="google-site-verification=wnXFrW-wxZlA5zCNtp4x15r1Oof6obg41TZxDIqvxMY" />
  
  <meta name="google-site-verification" content="FuRJsyiaQx-EDG05Cbk-VNkNOaPMWSmx9D-mmLUEbDI" />
  
  <meta name="google-site-verification" content="google-site-verification=FuRJsyiaQx-EDG05Cbk-VNkNOaPMWSmx9D-mmLUEbDI" />

  <?php if($metadata): ?>
  <title><?php echo e($metadata['title']); ?></title>
  <?php else: ?>
  <title>Falcon Solution Ltd</title>
  <?php endif; ?>
  <meta name="description" content="<?php echo e($metadata['description']); ?>">
  <meta name="keywords" content="<?php echo e($metadata['keywords']); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('public/front/images/icons/favicon.png')); ?>">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/bootstrap.min.css')); ?>">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/lib/css/nivo-slider.css')); ?>">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/core.css')); ?>">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/shortcode/shortcodes.css')); ?>">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/style.css')); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/responsive.css')); ?>">
    <!-- User style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/custom.css')); ?>">
    
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="<?php echo e(asset('public/front/css/style-customizer.css')); ?>">

    <!-- <link rel="canonical" href="https://www.falconsolutionbd.com/" /> -->

    <!-- Modernizr JS -->
    <script src="<?php echo e(asset('public/front/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>


   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147245144-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-147245144-1');
    </script>
    
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "Falcon Solution Ltd",
          "image": "",
          "@id": "",
          "url": "https://www.falconsolutionbd.com/",
          "telephone": "+880 1744-798865",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Flat#4/6, House#1/5 Mizan Tower, Kallyanpur Bus Stand, Kallyanpur,",
            "addressLocality": "Dhaka",
            "postalCode": "1207",
            "addressCountry": "BD"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 23.7780622,
            "longitude": 90.36148589999999
          } ,
          "sameAs": [
            "https://www.facebook.com/falconsolutionltdbd",
            "https://twitter.com/falconsolutionl",
            "https://www.youtube.com/channel/UCCmgubeZxwgVFzV4_PrqWrA",
            "https://www.linkedin.com/in/falconsolutionltdbd/",
            "https://www.pinterest.com/falconsolutionltdbd",
            "https://www.falconsolutionbd.com/"
          ] 
        }
        </script>
  
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat"
          attribution=install_email
          page_id="187681425329211">
        </div>
        <!-- Load Facebook SDK END -->
  
        <!-- HEADER AREA START -->
        <header class="header-area header-wrapper">
            <div class="header-top-bar bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="logo">
                                <a href="<?php echo e(route('index')); ?>">
                                    <img src="<?php echo e(asset('public/front/images/logo/logo.png')); ?>" alt="Falcon Solution Ltd" title="Falcon Solution Ltd">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 hidden-sm hidden-xs">
                            <div class="company-info clearfix">
                                <div class="company-info-item">
                                    <div class="header-icon">
                                        <img src="<?php echo e(asset('public/front/images/icons/phone.png')); ?>" alt="Phone" title="Phone">
                                    </div>
                                    <div class="header-info">
                                        <h6>+88 01744 79 88 65</h6>
                                        <p>We are open 9 am - 6pm</p>
                                    </div>
                                </div>
                                <div class="company-info-item">
                                    <div class="header-icon">
                                        <img src="<?php echo e(asset('public/front/images/icons/mail-open.png')); ?>" alt="E-mail" title="E-mail">
                                    </div>
                                    <div class="header-info">
                                        <h6><a href="mailto:falconsolution18@gmail.com" title="You can mail us">falconsolution18@gmail.com</a></h6>
                                        <p>You can mail us</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-middle-area  transparent-header hidden-xs">
                <div class="container">
                    <div class="full-width-mega-drop-menu">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sticky-logo">
                                    <a href="">
                                        <img src="<?php echo e(asset('public/front/images/logo/logo.png')); ?>" alt="Falcon Solution Ltd" title="Falcon Solution Ltd">
                                    </a>
                                </div>
                                <nav id="primary-menu">
                                  <ul class="main-menu">
                                    <li><a href="<?php echo e(route('index')); ?>" title="Home">Home</a></li>
                                    <li><a href="<?php echo e(route('about_us')); ?>" title="About Us">About Us</a></li>
                                    <li><a href="<?php echo e(route('services')); ?>" title="Services">Services<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                      <ul class="drop-menu">
                                        <li><a href="<?php echo e(route('pu_flooring')); ?>" title="PU Flooring in Bangladesh">PU Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('pu_foam_spray')); ?>" title="PU Foam Spray">PU Foam Spray</a></li>
                                        <li><a href="<?php echo e(route('epoxy_flooring')); ?>" title="Epoxy Flooring in Bangladesh">Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_parking')); ?>" title="Epoxy Parking in Bangladesh">Epoxy Parking Solution</a></li>
                                        <li><a href="<?php echo e(route('self_leveling_epoxy_flooring')); ?>" title="Self Leveling Epoxy Flooring in Bangladesh">Self Leveling Epoxy Flooring</a></li>
                                        <li><a href="<?php echo e(route('metallic_epoxy_flooring')); ?>" title="Metallic Epoxy Flooring in Bangladesh">Metallic Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_3d_flooring')); ?>" title="3D Epoxy Flooring in Bangladesh">3D Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_wall_coating_and_paint')); ?>" title="Epoxy Wall Coating and Paint in Bangladesh">Epoxy Wall Coating and Paint</a></li>
                                        <li><a href="<?php echo e(route('etp_protective_coating')); ?>" title="ETP Protective Coating in Bangladesh">ETP Protective Coating</a></li>
                                        <li><a href="<?php echo e(route('fair_face_plaster')); ?>" title="Fair Face Plaster in Bangladesh">Fair Face Plaster</a></li>
                                        <li><a href="<?php echo e(route('polished_concrete')); ?>" title="Polished Concrete in Bangladesh">Polished Concrete</a></li>
                                        <li><a href="<?php echo e(route('vinyl_flooring')); ?>" title="Vinyl Flooring in Bangladesh">Vinyl Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('waterproofing')); ?>" title="Waterproofing in Bangladesh">Waterproofing Solution</a></li>
                                        <li><a href="<?php echo e(route('dampproofing')); ?>" title="Damp Proofing in Bangladesh">Damp Proofing Solution</a></li>
                                        <li><a href="<?php echo e(route('floor_hardener')); ?>" title="Floor Hardener in Bangladesh">Floor Hardener Solution</a></li>
                                        <li><a href="<?php echo e(route('expansion_joint_work')); ?>" title="Expansion Joint Work in Bangladesh">Expansion Joint Work</a></li>
                                        <li><a href="<?php echo e(route('construction_chemicals')); ?>" title="Construction Chemicals in Bangladesh">Construction Chemicals</a></li>
                                        <li><a href="<?php echo e(route('interior_design')); ?>" title="Interior Design in Bangladesh">Interior Design</a></li>
                                        <li><a href="<?php echo e(route('commercial_residential_flooring')); ?>" title="Commercial & Residential Flooring in Bangladesh">Commercial & Residential Flooring Solution</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('product_list')); ?>" title="Product List">Product List</a></li>
                                    
                                    <li><a href="<?php echo e(route('projects')); ?>" title="Projects">projects<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                      <ul class="drop-menu">
                                        <li><a href="<?php echo e(route('project_polished_concrete')); ?>" title="Polished Concrete">Polished Concrete</a></li>
                                        <li><a href="<?php echo e(route('project_pu_flooring')); ?>" title="PU Flooring">PU Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('project_vinyl_flooring')); ?>" title="Vinyl Flooring">Vinyl Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_flooring')); ?>" title="Epoxy Flooring">Epoxy Flooring Solution</a></li>
                                        <!--<li><a href="<?php echo e(route('project_epoxy_parking_flooring')); ?>" title="Epoxy Parking">Epoxy Parking Solution</a></li>-->
                                        <!--<li><a href="<?php echo e(route('project_self_leveling_epoxy_flooring')); ?>" title="Self Leveling Epoxy Flooring">Self Leveling Epoxy Flooring</a></li>-->
                                        <!--<li><a href="<?php echo e(route('project_metallic_epoxy_flooring')); ?>" title="Metallic Epoxy Flooring">Metallic Epoxy Flooring Solution</a></li>-->
                                        <li><a href="<?php echo e(route('project_epoxy_3d_flooring')); ?>" title="3D Epoxy Flooring">3D Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_marking')); ?>" title="Epoxy i-Marking Flooring">Epoxy i-Marking Flooring</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_wall_coating_and_paint')); ?>" title="Epoxy Wall Coating and Paint">Epoxy Wall Coating and Paint</a></li>
                                        <!--<li><a href="<?php echo e(route('project_etp_protective_coating')); ?>" title="ETP Protective Coating">ETP Protective Coating</a></li>-->
                                        <li><a href="<?php echo e(route('project_fair_face_plaster')); ?>" title="Fair Face Plaster">Fair Face Plaster</a></li>
                                        <li><a href="<?php echo e(route('project_pu_foam_spray')); ?>" title="PU Foam Spray">PU Foam Spray</a></li>
                                        <li><a href="<?php echo e(route('project_waterproofing')); ?>" title="Waterproofing">Waterproofing Solution</a></li>
                                        <!--<li><a href="<?php echo e(route('project_dampproofing')); ?>" title="Damp Proofing">Damp Proofing Solution</a></li>-->
                                        <li><a href="<?php echo e(route('project_floor_hardener')); ?>" title="Floor Hardener">Floor Hardener Solution</a></li>
                                        <li><a href="<?php echo e(route('project_expansion_joint_work')); ?>" title="Expansion Joint Work">Expansion Joint Work</a></li>
                                        <li><a href="<?php echo e(route('project_construction_chemicals')); ?>" title="Construction Chemicals">Construction Chemicals</a></li>
                                        <li><a href="<?php echo e(route('project_interior_design')); ?>" title="Interior Design in Bangladesh">Interior Design</a></li>
                                        <li><a href="<?php echo e(route('project_commercial_residential_flooring')); ?>" title="Commercial & Residential Flooring">Commercial & Residential Flooring Solution</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('meet_our_teams')); ?>" title="Meet Our Teams">Meet Our Teams</a></li>
                                    <li><a href="<?php echo e(route('blog')); ?>" title="Blog">Blog</a></li>
                                    <!--<li><a href="<?php echo e(route('download')); ?>" title="Download Files">Download</a></li>-->
                                    <li><a href="<?php echo e(route('contact_us')); ?>" title="Contact Us">Contact Us</a></li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER AREA END -->

        <!-- MOBILE MENU AREA START -->
        <div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="<?php echo e(route('index')); ?>" title="Home">Home</a></li>
                                    <li><a href="<?php echo e(route('about_us')); ?>" title="About Us">About Us</a></li>
                                    <li><a href="<?php echo e(route('services')); ?>" title="Services">Services<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                      <ul class="drop-menu">
                                        <li><a href="<?php echo e(route('pu_flooring')); ?>" title="PU Flooring in Bangladesh">PU Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_flooring')); ?>" title="Epoxy Flooring in Bangladesh">Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_parking')); ?>" title="Epoxy Parking in Bangladesh">Epoxy Parking Solution</a></li>
                                        <li><a href="<?php echo e(route('self_leveling_epoxy_flooring')); ?>" title="Self Leveling Epoxy Flooring in Bangladesh">Self Leveling Epoxy Flooring</a></li>
                                        <li><a href="<?php echo e(route('metallic_epoxy_flooring')); ?>" title="Metallic Epoxy Flooring in Bangladesh">Metallic Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_3d_flooring')); ?>" title="3D Epoxy Flooring in Bangladesh">3D Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('epoxy_wall_coating_and_paint')); ?>" title="Epoxy Wall Coating and Paint in Bangladesh">Epoxy Wall Coating and Paint</a></li>
                                        <li><a href="<?php echo e(route('etp_protective_coating')); ?>" title="ETP Protective Coating in Bangladesh">ETP Protective Coating</a></li>
                                        <li><a href="<?php echo e(route('fair_face_plaster')); ?>" title="Fair Face Plaster in Bangladesh">Fair Face Plaster</a></li>
                                        <li><a href="<?php echo e(route('polished_concrete')); ?>" title="Polished Concrete in Bangladesh">Polished Concrete</a></li>
                                        <li><a href="<?php echo e(route('vinyl_flooring')); ?>" title="Vinyl Flooring in Bangladesh">Vinyl Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('waterproofing')); ?>" title="Waterproofing in Bangladesh">Waterproofing Solution</a></li>
                                        <li><a href="<?php echo e(route('dampproofing')); ?>" title="Damp Proofing in Bangladesh">Damp Proofing Solution</a></li>
                                        <li><a href="<?php echo e(route('floor_hardener')); ?>" title="Floor Hardener in Bangladesh">Floor Hardener Solution</a></li>
                                        <li><a href="<?php echo e(route('expansion_joint_work')); ?>" title="Expansion Joint Work in Bangladesh">Expansion Joint Work</a></li>
                                        <li><a href="<?php echo e(route('construction_chemicals')); ?>" title="Construction Chemicals in Bangladesh">Construction Chemicals</a></li>
                                        <li><a href="<?php echo e(route('interior_design')); ?>" title="Interior Design in Bangladesh">Interior Design</a></li>
                                        <li><a href="<?php echo e(route('commercial_residential_flooring')); ?>" title="Commercial & Residential Flooring in Bangladesh">Commercial & Residential Flooring Solution</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('product_list')); ?>" title="Product List">Product List</a></li>
                                    
                                    <li><a href="<?php echo e(route('projects')); ?>" title="Projects">projects<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                      <ul class="drop-menu">
                                        <li><a href="<?php echo e(route('project_polished_concrete')); ?>" title="Polished Concrete">Polished Concrete</a></li>
                                        <li><a href="<?php echo e(route('pu_foam_spray')); ?>" title="PU Foam Spray">PU Foam Spray</a></li>
                                        <li><a href="<?php echo e(route('project_vinyl_flooring')); ?>" title="Vinyl Flooring">Vinyl Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_flooring')); ?>" title="Epoxy Flooring">Epoxy Flooring Solution</a></li>
                                        <!--<li><a href="<?php echo e(route('project_epoxy_parking_flooring')); ?>" title="Epoxy Parking">Epoxy Parking Solution</a></li>-->
                                        <!--<li><a href="<?php echo e(route('project_self_leveling_epoxy_flooring')); ?>" title="Self Leveling Epoxy Flooring">Self Leveling Epoxy Flooring</a></li>-->
                                        <!--<li><a href="<?php echo e(route('project_metallic_epoxy_flooring')); ?>" title="Metallic Epoxy Flooring">Metallic Epoxy Flooring Solution</a></li>-->
                                        <li><a href="<?php echo e(route('project_epoxy_3d_flooring')); ?>" title="3D Epoxy Flooring">3D Epoxy Flooring Solution</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_marking')); ?>" title="Epoxy i-Marking Flooring">Epoxy i-Marking Flooring</a></li>
                                        <li><a href="<?php echo e(route('project_epoxy_wall_coating_and_paint')); ?>" title="Epoxy Wall Coating and Paint">Epoxy Wall Coating and Paint</a></li>
                                        <!--<li><a href="<?php echo e(route('project_etp_protective_coating')); ?>" title="ETP Protective Coating">ETP Protective Coating</a></li>-->
                                        <li><a href="<?php echo e(route('project_fair_face_plaster')); ?>" title="Fair Face Plaster">Fair Face Plaster</a></li>
                                        <li><a href="<?php echo e(route('project_pu_foam_spray')); ?>" title="PU Foam Spray">PU Foam Spray</a></li>
                                        <li><a href="<?php echo e(route('project_waterproofing')); ?>" title="Waterproofing">Waterproofing Solution</a></li>
                                        <!--<li><a href="<?php echo e(route('project_dampproofing')); ?>" title="Damp Proofing">Damp Proofing Solution</a></li>-->
                                        <li><a href="<?php echo e(route('project_floor_hardener')); ?>" title="Floor Hardener">Floor Hardener Solution</a></li>
                                        <li><a href="<?php echo e(route('project_expansion_joint_work')); ?>" title="Expansion Joint Work">Expansion Joint Work</a></li>
                                        <!--<li><a href="project-construction-chemicals" title="Construction Chemicals">Construction Chemicals</a></li>-->
                                        <li><a href="<?php echo e(route('project_interior_design')); ?>" title="Interior Design in Bangladesh">Interior Design</a></li>
                                        <li><a href="<?php echo e(route('project_commercial_residential_flooring')); ?>" title="Commercial & Residential Flooring">Commercial & Residential Flooring Solution</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('meet_our_teams')); ?>" title="Meet Our Teams">Meet Our Teams</a></li>
                                    <li><a href="<?php echo e(route('blog')); ?>" title="Blog">Blog</a></li>
                                    <!--<li><a href="<?php echo e(route('download')); ?>" title="Download Files">Download</a></li>-->
                                    <li><a href="<?php echo e(route('contact_us')); ?>" title="Contact Us">Contact Us</a></li>
                                  </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MOBILE MENU AREA END -->


                                <?php /**PATH C:\xampp\htdocs\newfalconsolutions\resources\views/layouts/frontend/header.blade.php ENDPATH**/ ?>