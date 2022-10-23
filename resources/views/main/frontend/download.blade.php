@extends("layouts/frontend/main")
@section("content")

        <!-- BREADCRUMBS AREA START -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs">
                            <h1 class="breadcrumbs-title">Download</h1>
                            <ul class="breadcrumbs-list">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>Download</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS AREA END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- CONTACT AREA START -->
            <div class="contact-area pt-115 pb-115">
                <div class="container">
                    <div class="row">
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="pdf">
                    			<a href="{{asset('public/front/images/download/JobReference.pdf')}}" target="_blank"><img src="{{asset('public/front/images/download/pdfLogo.jpg')}}"> </a>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
            <!-- CONTACT AREA END -->
        </section>
        <!-- End page content -->
@endsection