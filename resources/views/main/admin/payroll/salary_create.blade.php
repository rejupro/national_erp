@extends("layouts/admin/main")
@section("content")
@php
 $mhead='salarycreate';
 $phead='salarycreate';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি সেলারি ক্রিয়েট @else Employee Salary Create @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি সেলারি ক্রিয়েট @else Employee Salary Create @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি সেলারি ক্রিয়েট @else Employee Salary Create @endif</h3>
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
                        <form action="{{ route('salary-store') }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            @csrf
                            @if($salary)
                            <input type="hidden" name="id" id="id" value="{{ $salary->id }}">
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="form-group" >
                                                <label>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি নেম @else Employee Name @endif</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">EN</span>
                                                    <select class="form-control select2" name="emp_id" id="emp_id" >
                                                        <option value="{{ $salary->emp_id }}">{{ $salary->emp_name }}</option>
                                                        @foreach($employee as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id1" id="branch_id1">
                                                                <option value="{{ $salary->branch_id1 }}">{{ $salary->branch_name1 }}</option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary1" id="salary1" value="{{ $salary->salary1 }}" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_2" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id2" id="branch_id2" >
                                                                <option value="{{ $salary->branch_id2 }}">{{ $salary->branch_name2 }}</option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary2" id="salary2" value="{{ $salary->salary2 }}" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_3" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id3" id="branch_id3" >
                                                                <option value="{{ $salary->branch_id3 }}">{{ $salary->branch_name1 }}</option>
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary3" id="salary3" value="{{ $salary->salary3 }}" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group" >
                                                <label>@if ( Auth::User()->language == 1 ) সেলারি এমাউন্ট @else Salary Amount @endif</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">TS</span>
                                                    <input type="text" maxlength="45" class="form-control" name="total_salary" id="total_salary" placeholder="e.g. Sumon" autocomplete="off" >
                                                </div>
                                            </div> --}}
                                        </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="form-group" >
                                                <label>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি নেম @else Employee Name @endif</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">EN</span>
                                                    <select class="form-control select2" name="emp_id" id="emp_id" >
                                                        <option value="">-Select-</option>
                                                        @foreach($employee as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id1" id="branch_id1">
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary1" id="salary1" value="0" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_2" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id2" id="branch_id2" >
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary2" id="salary2" value="0" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="branch_select_3" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ নেম @else Branch Name @endif</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">BN</span>
                                                            <select class="form-control select2" name="branch_id3" id="branch_id3" >
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
                                                            <input type="number" maxlength="45" class="form-control" name="salary3" id="salary3" value="0" placeholder="e.g. Sumon" autocomplete="off" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group" >
                                                <label>Total Salary Amount</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">TS</span>
                                                    <input type="text" maxlength="45" class="form-control" name="total_salary" id="total_salary" placeholder="e.g. Sumon" autocomplete="off" >
                                                </div>
                                            </div> --}}
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
                                <input type="submit" name="save_emp" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{ route('salary-list-page') }}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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


<script type="text/javascript">
	function more_branch() {
		var branch_id_1 = $('#branch_id1').val();
		if(branch_id_1==1){
			$('#branch_select_2').show();
			$('#branch_select_3').show();
		}
	}
</script>
@endsection
