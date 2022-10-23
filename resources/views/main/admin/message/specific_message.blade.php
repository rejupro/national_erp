@extends("layouts/admin/main")
@section("content")
@php
$mhead='message';
$phead='ms';
@endphp
<!-- Main content -->

<aside class="right-side-details" style="display: block;">
	<section class="side-cont">
		<div class="side-head">
			<div class="row"> 
				<div class="col-md-12">    
					<div class="col-md-11 text-left">
						<button class="btn btn-flat bg-teal" id="stprint"><i class="fa fa-print"></i></button>     
					</div>    
					<div class="col-md-1 text-right">
						<a href='{{ url()->previous() }}'><button class="btn btn-flat bg-red" id="closedet"><span><i class="fa fa-times"></i></span></button></a>
					</div>
				</div>
			</div>    
		</div>     
		<div class="box box-solid">
			<div class="box-body">   
				<div class="row"> 
					<div class="col-md-12">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<div id="profile">
								<div class="card">
									<div class="card-container">
										<div class="card-item">
											<div class="card-header">
												<div class="card-header-bg"></div>
												<img src="{{asset('public/front/images/logo/logo.png')}}" class="card-header-img">
												<div class="card-header-text">
													<span class="card-header-name">
													{{$message->name }}</span>
													<span class="card-header-job">
														{{$message->email }}</span>
													<span class="card-header-job">
														{{$message->message }}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
@endsection
