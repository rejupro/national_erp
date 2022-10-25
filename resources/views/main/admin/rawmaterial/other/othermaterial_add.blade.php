@extends("layouts/admin/main")
@section("content")
@php
 $mhead='raw_material';
 $phead='other_materiallist';
@endphp

    <section class="content-header">
	    <h1>@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল এড @else Ohter Material Add @endif</h1>
	    <ol class="breadcrumb">
	        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
	        <li class=""><a href="">@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল এড @else Ohter Material Add @endif</a></li>
	     </ol>
    </section>
    <!-- Main content -->
	<section class="content">
	    <div class="row">
			<div class="col-md-1"></div>
	       <div class="col-md-10">
	          <div class="box box-solid">
	             <div class="box-header with-border">
	                <h3 class="box-title">@if ( Auth::User()->language == 1 ) অন্যান্য ম্যাটেরিয়াল এড @else Ohter Material Add @endif</h3>
	             </div>
	             <div class="box-body">
	                {{-- Error message here    --}}
	                @if ($errors->any())
	                  <div class="alert alert-danger">
	                     <ul>
	                           @foreach ($errors->all() as $error)
	                           <li>{{ $error }}</li>
	                           @endforeach
	                     </ul>
	                  </div>
	               @endif
				   <form action="{{route('other_rawmaterialstore')}}" method="post" enctype="multipart/form-data">
					@csrf
				    <div class="row ">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>@if ( Auth::User()->language == 1 ) মেটেরিয়াল কোড @else Material Code @endif</label>
								<input type="text" name="code" maxlength="35" value="{{ old('code') }}" id="code" class="@error('name') is-invalid @enderror form-control" placeholder="Code">
							</div>
							<div class="form-group">
								<label>@if ( Auth::User()->language == 1 ) মেটেরিয়াল নেম @else Material Name @endif</label>
								<input type="text" name="name" maxlength="35" value="{{ old('name') }}" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Material Name">
							</div>
							<div class="form-group">
								<label>@if ( Auth::User()->language == 1 ) প্রাইস @else Price @endif</label>
								<input type="number" name="price" maxlength="35" value="{{ old('price') }}" id="name" class="@error('name') is-invalid @enderror form-control" placeholder="Price">
							</div>
							<div class="form-group">
								<label>@if ( Auth::User()->language == 1 ) ইমেজ @else Image @endif</label>
								<input accept="image/*" class="form-control" type='file' name="image" id="imgInp" />
  								<img id="blah" src="#" style="max-height: 100px" alt="" />
							</div>
							<div class="form-group">
								<label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
								<textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row" style="margin-top: 15px">
						<div class="col-md-5"></div>
						<div class="col-md-4 text-right">
							<input type="submit" name="save_brand" id="submit" class="btn btn-flat bg-purple btn-sm " value=" Save "> <a href="{{route('rawmaterial-list')}}" class="btn btn-flat bg-gray  "> Close </a>
						</div>
					</div>
					</form>
	             </div>
	          </div>
	       </div>
		   
	    </div>
	 </section>
	 <!-- /.main content -->

	 <script>
			imgInp.onchange = evt => {
				const [file] = imgInp.files
				if (file) {
					blah.src = URL.createObjectURL(file)
				}
			}
	 </script>

@endsection