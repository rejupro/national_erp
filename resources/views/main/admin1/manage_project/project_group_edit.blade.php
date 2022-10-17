@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>Project Group Edit</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Group Edit</a></li>
        </ol>
    </section>
       <!-- Main content -->
       <section class="content">
        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Project Group</h3>
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
        <form action="{{route('edit-progroup-update',$data->id)}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">
        
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-8">    
        <div class="form-group">
        <label>Group Name</label>
        <input type="text" name="name" maxlength="45" value="{{$data->name}}" id="cname" class="form-control" placeholder="e.g Tower"  />
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Group Code</label>
        <input type="text" name="code" maxlength="6" value="{{$data->code}}" class="form-control" placeholder="e.g 101020"  />
        </div>    
        </div>    
        </div>        
        <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" maxlength="250" rows="6" name="description"  placeholder="Description">{{$data->description}}</textarea>
        </div>   
        </div>    
        <div class="col-md-3"></div>    
        </div>    
        </div>    
        
        </div>
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>    
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <input type="submit" name="save_group" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{route('progroup-list-create')}}" class="btn btn-flat bg-gray  ">Close</a>
        </div> 
        </div>     
        </form>    
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">History </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
         {{-- history --}}
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
<!-- /.main content --> 
    
@endsection