@extends("layouts/admin/main")
@section("content")
@php
$mhead='payrollcreate';
$phead='payrollcreate';
@endphp
<section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) পেইস্লিপ জেনারেট @else Payslip Generate @endif</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) পেইস্লিপ জেনারেট @else Payslip Generate @endif</a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">@if ( Auth::User()->language == 1 ) পেইস্লিপ জেনারেট @else Payslip Generate @endif</h3>
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
                                            <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) মাস @else Month @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) সেলারি @else Salary @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) প্রেজেন্ট ডেস @else Present Days @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) আবসেন্ট ডেস @else Absent Days @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) ডিউ সেলারিজ @else Due Salaries @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) জরিমানা @else Fine @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) লন @else Loan @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) অগ্রিম সেলারি @else Salary Advance @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) কমিসন @else Commision @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) নেট পেয়েবল @else Net Payable @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) রিমার্ক @else Remark @endif</th>
                                            <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                                        </tr>
                                    </thead>
                                    @php $i=0; @endphp
                                    <tbody id="dataemploye">
                                        @foreach($salary as $data)
                                        <tr>
                                            <td>{{ $i = $i+1 }}</td>
                                            <td>{{ $data->emp_name }}</td>
                                            <td>{{ $data->desg_name }}</td>
                                            <td>
                                                @if($data->month == 1)
                                                January
                                                @elseif($data->month == 2)
                                                February
                                                @elseif($data->month == 3)
                                                March
                                                @elseif($data->month == 4)
                                                April
                                                @elseif($data->month == 5)
                                                May
                                                @elseif($data->month == 6)
                                                June
                                                @elseif($data->month == 7)
                                                July
                                                @elseif($data->month == 8)
                                                August
                                                @elseif($data->month == 9)
                                                September
                                                @elseif($data->month == 10)
                                                October
                                                @elseif($data->month == 11)
                                                November
                                                @elseif($data->month == 12)
                                                December
                                                @else
                                                Bonus
                                                @endif
                                            </td>
                                            <td>{{ $data->salary }}</td>
                                            <td>{{ $data->present_day }}</td>
                                            <td>{{ $data->absent_day }}</td>
                                            <td>{{ $data->due_salary }}</td>
                                            <td>{{ $data->fine }}</td>
                                            <td>{{ $data->loan }}</td>
                                            <td>{{ $data->salary_advance }}</td>
                                            <td>{{ $data->commission }}</td>
                                            <td>{{ $data->net_payable }}</td>
                                            <td>{{ $data->remark }}</td>
                                            <td nowrap="" style="text-align:center;">
                                                <a class="btn btn-flat bg-purple" href="{{ route('payslip-edit-page',$data->id) }}"><i class="fa fa-edit"></i>
                                                </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('payslip-delete-page',$data->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="clearfix" ></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-12 table-responsive">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right" >
                                    <a href="{{ route('payslip-create-page') }}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড পেইস্লিপ @else Add Payslip @endif</a>
                                    </div>
                                </div>
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
