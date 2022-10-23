@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>Attendance Record</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Attendance Record</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-9">    
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Attendance &amp; Leave Entry</h3>
    </div>
    <div class="box-body">
     {{-- Error --}}
    <form action="payr_attreclist.php" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="col-md-12 popup_details_div">    
    <div class="row">
    <input type="hidden" id="syear" name="year" value="" readonly> 
    <input type="hidden" id="smonth" name="month" value="" readonly>     
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
    <th width="3%">#</th>
    <th width="23%">Name</th>
    <th width="16%">Designation</th>
    <th width="13%">G.Salary</th>
    <th width="9%">Absent</th>
    <th width="9%">Late</th>
    <th width="9%">Leave</th>
    <th width="9%">P.Day</th>
    <th width="9%">P.Amo</th>
    </tr>
    </thead>
    <tbody id="dataemploye">
        <tr>
            <td width="3%"></td>
            <td width="23%"></td>
            <td width="16%"></td>
            <td width="13%"></td>
            <td width="9%"></td>
            <td width="9%"></td>
            <td width="9%"></td>
            <td width="9%"></td>
            <td width="9%"></td>
        </tr>      
    </tbody>    
    </table>    
    </div>    
    </div>
    </div>
        
    <div class="clearfix" ></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <input type="submit" name="save_attnl" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <input type="button" id="sreset" class="btn btn-flat bg-red btn-sm " value="Reset"/>
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
    <h3 class="box-title">Salary Month</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" >
    <div class="col-md-12 popup_details_div">
    <div class="col-md-1"></div>
    <div class="col-md-10">    
    
    <div class="row">
    <div class="col-md-6">
    <label>Year</label>
    <select class="form-control" id="year" name="year">
    </select>
    </div>
    <div class="col-md-6">
    <label>Salary Month</label>
    <select class="form-control" id="month" name="month" onchange="getAllEmploye(this.value)">
    </select>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <label>Branch</label>
    <select class="form-control" name="pono" id="brid" onchange="getAllEmploye(this.value)">
    <option value=" ">-Select Branch-</option>
    <option value="0">-No Branch-</option>
    <option value=""></option>
    </select>
    </div>    
    </div>
        
    </div>    
    <div class="col-md-1"></div>    
    </div>
    <div class="clearfix" ></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-6"></div>
    <div class="col-md-6 text-right" >
    <input type="button" id="reset" class="btn btn-flat bg-red btn-sm " value="Reset"/>    
    <input type="button" id="triview" class="btn btn-flat bg-purple btn-sm" value="Submit"/>
    </div> 
    </div>    
    </div>
    </div>
    </div>
    </div>    
    </div>
    </div>        
    </section>
    <!-- /.main content --> 

@endsection