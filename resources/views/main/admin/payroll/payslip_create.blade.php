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
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি মাসিক সেলারি পেইস্লিপ @else Employee Monthly Salary PaySlip @endif</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box-body">
                    {{--Error message show here   --}}
                        <form action="{{ route('payslip-store') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            @csrf
                            @if($salary)
                            <input type="hidden" name="id" value="{{ $salary->id }}">
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি নাম @else Employee Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2 reju_emp" name="emp_id" id="emp_id" >
                                                                <option value="{{ $salary->emp_id }}">-{{ $salary->emp_name }}-</option>
                                                                @foreach($employee as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) মাস @else Month @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">M</span>
                                                            <select class="form-control select2" name="month" id="month">
                                                                <option value="{{ $salary->month }}">-Default-</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                <option value="13">Bonus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id" id="branch_id" onchange="return more_branch()">
                                                                <option value="">-Select-</option>
                                                                @foreach($branch as $data)
                                                                <option value="{{ $data->id }}" @if($data->id == $salary->branch_id) selected="selected" @endif>{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) সেলারি এমাউন্ট @else Salary Amount @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control sallery_ajax" name="salary" id="salary" value="{{ $salary->salary }}" placeholder="Salary Amount" autocomplete="off" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) টোটাল প্রেজেন্ট ডেস @else Total Present Days @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="{{ $salary->present_day }}" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) টোটাল আবসেন্ট ডেস @else Total Absent Days @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="{{ $salary->absent_day }}" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ডিউ সেলারিজ @else Due Salaries @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">DS</span>
                                                            <input type="number" maxlength="45" class="form-control" name="due_salary" id="due_salary" value="{{ $salary->due_salary }}" placeholder="Due Salary" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) জরিমানা @else Fine @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="{{ $salary->fine }}" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) লন @else Loan @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="{{ $salary->loan }}" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) অগ্রিম সেলারি @else Salary Advance @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">SA</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary_advance" id="salary_advance" value="{{ $salary->salary_advance }}" placeholder="Deduction(Salary Advance)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) কমিসন @else Commision @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="{{ $salary->commission }}" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) নেট পেয়েবল @else Net Payable @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="{{ $salary->net_payable }}" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) রিমার্ক @else Remark @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">RM</span>
                                                            <input type="text" maxlength="45" class="form-control" name="remark" id="remark" value="{{ $salary->remark }}" placeholder="Remarks" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি নেম @else Employee Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">EN</span>
                                                            <select class="form-control select2 reju_emp" name="emp_id" id="emp_id" >
                                                                <option value="">-Select-</option>
                                                                @foreach($employee as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) মাস @else Month @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">M</span>
                                                            <select class="form-control select2" name="month" id="month">
                                                                <option value="">-Select-</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                <option value="13">Bonus</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id" id="branch_id" onchange="return more_branch()">
                                                                <option value="">-Select-</option>
                                                                @foreach($branch as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) সেলারি এমাউন্ট @else Salary Amount @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">S</span>
                                                            <input type="number" maxlength="45" class="form-control sallery_ajax" name="salary" id="salary" value="0" placeholder="Salary Amount" autocomplete="off" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) টোটাল প্রেজেন্ট ডেস @else Total Present Days @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">PD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="present_day" id="present_day" value="0" placeholder="Total Present Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) টোটাল আবসেন্ট ডেস @else Total Absent Days @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">AD</span>
                                                            <input type="number" maxlength="45" class="form-control" name="absent_day" id="absent_day" value="0" placeholder="Total Absent Days" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ডিউ সেলারিজ @else Due Salaries @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">DS</span>
                                                            <input type="number" maxlength="45" class="form-control" name="due_salary" id="due_salary" value="0" placeholder="Due Salary" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) জরিমানা @else Fine @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">F</span>
                                                            <input type="number" maxlength="45" class="form-control" name="fine" id="fine" value="0" placeholder="Deduction(Fine)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) লন @else Loan @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">L</span>
                                                            <input type="number" maxlength="45" class="form-control" name="loan" id="loan" value="0" placeholder="Deduction(Loan)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) অগ্রিম সেলারি @else Salary Advance @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">SA</span>
                                                            <input type="number" maxlength="45" class="form-control" name="salary_advance" id="salary_advance" value="0" placeholder="Deduction(Salary Advance)" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) কমিসন @else Commision @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">CM</span>
                                                            <input type="number" maxlength="45" class="form-control" name="commission" id="commission" value="0" placeholder="Commission" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) নেট পেয়েবল @else Net Payable @endif</label>
                                                        <div class="input-group">
                                                             <span class="input-group-addon">NP</span>
                                                            <input type="number" maxlength="45" class="form-control" name="net_payable" id="net_payable" value="0" placeholder="Net Payble" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) রিমার্ক @else Remark @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">RM</span>
                                                            <input type="text" maxlength="45" class="form-control" name="remark" id="remark" value="0" placeholder="Remarks" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            @endif
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{ route('payslip-list-page') }}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
                                <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
	function more_branch() {
		var branch_id_1 = $('#branch_id1').val();
		if(branch_id_1==1){
			$('#branch_select_2').show();
			$('#branch_select_3').show();
		}
	}


    $(function () {
        $(document).on("change", ".reju_emp", function () {
            var id = $(this).val();
            var url = '{{ route("payslip_salaryajax", ":id") }}';
            url = url.replace(':id', id);
        
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    console.log(response.data);
                    if(response != null){
                        $('.sallery_ajax').val(response.data);
                    }
                }
            });
            

        });
    });



</script>
@endsection
