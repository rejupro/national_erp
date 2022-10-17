@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>Edit Leave Request</h1>
        <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="#">Payroll</a></li>
        <li class="active"><a href="{{ route('leaveapp-edit-page',$data->id) }}">Edit Leave Request</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Leave Requestt</h3>
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
        {{-- Error message show here  --}}
        <form action="{{ route('leaveapp-update-page',$data->id) }}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">    
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group" >
        <label>Employee</label>
        <div class="input-group">
        <span class="input-group-addon">EM</span>
        <select class="form-control select2" name="emp_id" id="empid">
        <option value="{{ $data->emp_id }}">{{ $data->emp_name }}</option>
        @foreach($employee as $emp)
        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
        @endforeach
        </select>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group" >
        <label>Leave Type</label>
        <select class="form-control select2" name="l_id" id="lid">
        <option value="{{ $data->l_id }}">{{ $data->leave_name }}</option>
        @foreach($leave as $leaves)
        <option value="{{ $leaves->id }}">{{ $leaves->leave_name }}</option>
        @endforeach                                                             
        </select>
        </div>        
        </div> 
        <div class="col-md-3">
        <div class="form-group" >
        <label>Apply Date</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="apply_date" id="apply" value="{{ date('d-m-Y', strtotime($data->apply_date)) }}" placeholder="" autocomplete="off">
        </div>
        </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-3">    
        <div class="form-group" >
        <label>Leave From</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="start_date" id="fdate" value="{{ date('d-m-Y', strtotime($data->start_date)) }}" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVF</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label>Leave To</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control datetimepicker" name="end_date" id="tdate" value="{{ date('d-m-Y', strtotime($data->end_date)) }}" placeholder="" autocomplete="off">
        <span class="input-group-addon">LVT</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label>Leave Days</label>
        <div class="input-group">
        <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
        </span>
        <input type="text" class="form-control" name="days" id="days" value="{{ $data->days }}" placeholder="" autocomplete="off">
        <span class="input-group-addon">DAY</span>
        </div>
        </div>
        </div>
        <div class="col-md-3">    
        <div class="form-group" >
        <label>Status</label>
        <div class="input-group">
        <span class="input-group-addon">ST</span>    
        <select class="form-control" name="status" id="status">
        @if($data->status==2)
        <option value="{{ $data->status }}">Pending</option>
        <option value="1">Approve</option>
        <option value="0">Disapprove</option>   
        @elseif($data->status==1)
        <option value="{{ $data->status }}">Approve </option>
        <option value="2">Pending</option>
        <option value="0">Disapprove</option> 
        @else
        <option value="{{ $data->status }}">Dis-Approve </option>
        <option value="2">Pending</option>
        <option value="3">Approve</option> 
        @endif  
        </select>    
        </div>
        </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-6">    
        <div class="form-group">
        <label>Reason</label>
        <div class="input-group">
        <span class="input-group-addon">RE</span>
        <textarea class="form-control" name="reason" id="reason" maxlength="250" rows="5" placeholder="Reason">{{ $data->reason }}</textarea>
        </div>    
        </div>
        </div>
        <div class="col-md-6">    
        <div class="form-group">
        <label>Note</label>
        <div class="input-group">
        <span class="input-group-addon">PA</span>
        <textarea class="form-control" name="note" id="note" maxlength="250" rows="5" placeholder="Note"> {{ $data->note }} </textarea>
        </div>    
        </div>
        </div>    
        </div>
            
        </div>    
        <div class="col-md-1"></div>
        </div>    
        </div>
            
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>    
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <input type="submit" name="save_lar" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="{{ route('leaveapp-list-page') }}" class="btn btn-flat bg-gray  ">Close</a>
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