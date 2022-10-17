@extends("layouts/frontend/main")
@section("content")

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            <h2 class="breadcrumbs-title">Projects - Construction Chemicals</h2>
                            <ul class="breadcrumbs-list">
                                <li><a href="{{ route('index') }}">Home</a></li>
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
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/01.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/01.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/02.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/02.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/03.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/03.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/pu/04.jpg')}}"><img src="{{asset('public/front/images/gallery/pu/04.jpg')}}" alt="" /></a>
                            <!-- Gallery fancyBox End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT SHELTEK AREA END -->
            <!-- SERVICES AREA END -->
        </section>
        <!-- End page content -->
@endsection