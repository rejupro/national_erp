@extends("layouts/frontend/main")
@section("content")
 <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            <h1 class="breadcrumbs-title">Services</h1>
                            <ul class="breadcrumbs-list">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS AREA END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            
            <!-- SERVICES AREA START -->
            <div class="featured-flat-area pt-115 pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>OUR SERVICES</h2>
                                <p>Service is important to you, so it is important to us. Our business success is depends on best service. Our goal is to create a customer to us dependable and reliable. We are achieving this by providing continue support and prompt service after the sale. Be assured that you are buying World best product and application service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-flat">
                        <div class="row">
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ route('polished_concrete') }}"> <img src="{{asset('public/front/images/flat/polished-concrete.jpg')}}" alt="Polished Concrete"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('polished-concrete-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Polished Concrete</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('pu-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/pu-flooring.jpg')}}" alt="PU Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('pu-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>PU Flooring Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('vinyl-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Vinyl-Flooring.jpg')}}" alt="Vinyl Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('vinyl-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Vinyl Flooring Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('epoxy-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/epoxy-flooring.jpg')}}" alt="Epoxy Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('epoxy-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Epoxy Flooring Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('self-leveling-epoxy-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Self-Leveling-Epoxy-Flooring.jpg')}}" alt="Self Leveling Epoxy Flooring"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('self-leveling-epoxy-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Self Leveling Epoxy Flooring</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('metallic-epoxy-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Metallic-Epoxy-Flooring.jpg')}}" alt="Metallic Epoxy Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('metallic-epoxy-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Metallic Epoxy Flooring Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('epoxy-parking-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Epoxy-Parking-Solutions.jpg')}}" alt="Epoxy Parking Solution"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('epoxy-parking-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Epoxy Parking Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('epoxy-3d-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/3D-Epoxy-Flooring-Solutions.jpg')}}" alt="3D Epoxy Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('epoxy-3d-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>3D Epoxy Flooring Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('epoxy-wall-coating-and-paint-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Epoxy-Wall-Coating-and-Paint.jpg')}}" alt="Epoxy Wall Coating and Paint"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('epoxy-wall-coating-and-paint-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Epoxy Wall Coating and Paint</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('etp-protective-coating-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/etp-protective-coating.jpg')}}" alt="ETP Protective Coating"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('etp-protective-coating-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>ETP Protective Coating</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('floor-hardener-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Floor-Hardener.jpg')}}" alt="Floor Hardener Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('floor-hardener-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Floor Hardener Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('fair-face-plaster')}}"><img src="{{asset('public/front/images/flat/Fair-Face-Plaste.jpg')}}" alt="Fair Face Plaster"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('fair-face-plaster')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Fair Face Plaster</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('waterproofing-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/waterproofing.jpg')}}" alt="Waterproofing Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('waterproofing-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Waterproofing Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('dampproofing-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Damp-Proofing-Solutions.jpg')}}" alt="Damp Proofing Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('dampproofing-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Damp Proofing Solution</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('construction-chemicals-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Construction-Chemicals.jpg')}}" alt="Construction Chemicals"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('construction-chemicals-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Construction Chemicals</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('pu-foam-spray-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/PU-Foam-Spray.jpg')}}" alt="PU Foam Spray"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('pu-foam-spray-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>PU Foam Spray</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('commercial-residential-flooring-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/commercial-residential-flooring.jpg')}}" alt="Commercial & Residential Flooring Solutions"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('commercial-residential-flooring-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Commercial & Residential Flooring</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- flat-item -->
                            <div class="col-md-4 hidden-sm col-xs-12">
                                <div class="flat-item">
                                    <div class="flat-item-image">
                                        <a href="{{ URL::to('expansion-joint-work-in-bangladesh')}}"><img src="{{asset('public/front/images/flat/Expansion-Joint-Work.jpg')}}" alt="Expansion Joint Work"></a>
                                        <div class="flat-link">
                                            <a href="{{ URL::to('expansion-joint-work-in-bangladesh')}}">More Details</a>
                                        </div>
                                        <ul class="flat-desc">
                                            <li>
                                                <span>Expansion Joint Work</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SERVICES AREA END -->
@endsection