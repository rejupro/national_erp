@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>Leave Edit</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="#">Payroll</a></li>
        <li class="active"><a href="{{ route('leavetype-edit-page',$data->id) }}">Leave Edit</a></li>
        </ol>
    </section>
      <!-- Main content -->
      <section class="content">
        
        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Leave</h3>
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
        {{-- Error mess show here --}}
        <form action="{{ route('leavetype-update-page',$data->id) }}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">
        
        <div class="row ">
        <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-8">    
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="leave_name" maxlength="25" value="{{ $data->leave_name }}" id="pname" class="form-control" placeholder="e.g. Casual Leave" />
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Days</label>
        <input type="text" name="leave_days" maxlength="3" value="{{ $data->leave_days }}" id="days" onkeypress="return isNumberKey(event)" class="form-control" placeholder="e.g. 15" />
        </div>    
        </div>
        </div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="form-group" >
        <label>Status</label> 
        <select class="form-control" name="status">
        <option value="1">Active</option>
        <option value="0">De-Active</option>
        </select>    
        </div>    
        </div>    
        <div class="col-md-3"></div>    
        </div>    
        <div class="row">
        <div class="col-md-12">    
        <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" maxlength="150" rows="6" name="description" placeholder="Description">{{ $data->description }}</textarea>
        </div>
        </div>    
        </div>    
        </div>
        </div>    
        <div class="col-md-2"></div>    
        </div>    
        </div>    
        
        </div>
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>    
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <input type="submit" name="save_leave" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{ route('leavetype-list-page') }}" class="btn btn-flat bg-gray  ">Close</a>
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