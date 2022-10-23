@extends("layouts/frontend/main")
@section("content")
        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            <h2 class="breadcrumbs-title">Projects - Interior Design</h2>
                            <ul class="breadcrumbs-list">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>Projects - Interior Design</li>
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
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/01.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/01.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/02.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/02.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/03.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/03.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/09.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/09.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/10.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/10.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/11.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/11.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/12.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/12.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/13.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/13.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/14.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/14.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/15.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/15.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/16.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/16.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/04.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/04.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/05.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/05.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/06.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/06.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/07.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/07.jpg')}}" alt="" /></a>
                            <a class="fancybox" rel="group" href="{{asset('public/front/images/gallery/interiorDesign/08.jpg')}}"><img src="{{asset('public/front/images/gallery/interiorDesign/08.jpg')}}" alt="" /></a>
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