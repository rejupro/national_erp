@extends("layouts/frontend/main")
@section("content")
    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Projects - PU Flooring Solution</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li>Projects - PU Flooring Solution</li>
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
                        <div><h4>Arla Foods Bangladesh Ltd.</h4></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Gallery fancyBox Start -->
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/1.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/1.jpg')}}" alt="" /></a>
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/2.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/2.jpg')}}" alt="" /></a>
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/3.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/3.jpg')}}" alt="" /></a>
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/4.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/4.jpg')}}" alt="" /></a>
                        <!-- Gallery fancyBox End -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div><h4>Arla Foods Bangladesh Ltd.</h4></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/5.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/5.jpg')}}" alt="" /></a>
                        <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/6.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/6.jpg')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT SHELTEK AREA END -->
        <!-- SERVICES AREA END -->
    </section>
    <!-- End page content -->
@endsection