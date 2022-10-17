@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) কন্ট্রাকটর ইডিট @else Contractor Edit @endif</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) কন্ট্রাকটর ইডিট @else Contractor Edit @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) কন্ট্রাকটর ইডিট @else Contractor Edit @endif</h3>
        </div>
        <div class="box-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('project-contractor-update-page',$data->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         @csrf
            <div class="col-md-12 popup_details_div">
                <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="col-md-12">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>    
                                        <input type="text" name="name" maxlength="45" value="{{$data->name}}" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>    
                                        <select class="form-control" name="status" id="status">
                                            <option value="{{$data->status}}">{{$data->status}}</option> 
                                            <option value="Active">Active</option> 
                                            <option value="De-Acive">De-Acive</option>     
                                        </select>
                                    </div>    
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>    
                                        <input type="text" name="code" maxlength="15" value="{{$data->code}}" id="code" class="form-control" placeholder="e.g. ABA/CO/001" readonly/>
                                    </div>    
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) কনটাক্ট নাম্বার @else Contact Number @endif</label>    
                                        <input type="text" name="mobile" maxlength="18" value="{{$data->mobile}}" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) কনটাক্ট ইমেইল @else Contact Email @endif</label>    
                                        <input type="text" name="email" maxlength="45" value="{{$data->email}}" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                    </div>    
                                </div>    
                                <div class="col-md-3">    
                                
                                </div>    
                            </div>   
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">    
                                        <label>@if ( Auth::User()->language == 1 ) এড্রেস @else Address @endif</label>
                                        <textarea class="form-control" name="address" id="address" maxlength="150" rows="4" placeholder="Address">{{$data->address}}</textarea>    
                                    </div>
                                </div>    
                                <div class="col-md-6">    
                                    <div class="form-group">
                                        <label>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</label>
                                        <textarea class="form-control" name="note" id="note" maxlength="150" rows="4" placeholder="About">{{$data->note}}</textarea>   
                                    </div>
                                </div>    
                            </div> 
                            
                        </div>    
                    </div>    
                <div class="col-md-1"></div>    
            </div>
            <div class="clearfix" ></div>
            <div class="col-md-12 nopadding widgets_area"></div>    
            <div class="row"style="margin-top: 15px" >
            <div class="col-md-8 ">
            </div>
            <div class="col-md-4 text-right" >
                <input type="submit" name="save_contractor" id="submit" class="btn btn-flat bg-purple btn-sm" value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="{{route('project-contractor-list-page')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
            </div> 
            </div>     
        </form>    
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
        {{-- History --}}
        </div>
        </div>
        </div>
        </div>
        </div>
        </div> 
    </section>
    <!-- /.main content -->    

@endsection