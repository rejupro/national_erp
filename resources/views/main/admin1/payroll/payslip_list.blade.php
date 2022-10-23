@extends("layouts/admin/main")
@section("content")
@php
$mhead='payroll';
$phead='sals';
@endphp
<section class="content-header">
    <h1>Payslip Generate</h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Payslip Generate</a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salary Sheet</h3>
                </div>
                <div class="box-body">
                    {{-- Error message --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12 popup_details_div">
                        <div class="row">
                            <input type="hidden" id="syear" name="year" value="" readonly>
                            <input type="hidden" id="smonth" name="month" value="" readonly>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="datarec">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>G.Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php $i=0; @endphp
                                    <tbody id="dataemploye">
                                        @foreach($salary as $data)
                                        <td>{{ $i = $i+1 }}</td>
                                        <td>{{ $data->emp_name }}</td>
                                        <td>{{ $data->desg_name }}</td>
                                        <td>@php echo number_format("$data->total_salary",2) @endphp</td>
                                        <td nowrap="" style="text-align:center;">
                                            <a class="btn btn-flat bg-purple" href="{{ route('payslip-edit-page',$data->id) }}"><i class="fa fa-edit"></i>
                                            </a> <a class="btn btn-flat bg-purple" href="{{ route('payslip-delete-page',$data->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
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
                                            <select class="form-control" name="pono" id="brid" onchange="getAllSalary(this.value)">
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
        </div> --}}
    </div>
</section>
<!-- /.main content -->

@endsection
