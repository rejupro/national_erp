@extends("layouts/admin/main")
@section("content")
@php
$mhead='salarycreate';
$phead='salarycreate';
@endphp
<section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) স্যালারি জেনারেট @else Salary Generate @endif</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) স্যালারি জেনারেট @else Salary Generate @endif</a></li>
    </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">@if ( Auth::User()->language == 1 ) স্যালারি সিট @else Salary Sheet @endif</h3>
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
                        {{--Error message show here  --}}
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" id="datarec">
                            <thead>
                                <tr>
                                <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) সেলারি @else Salary @endif</th>
                                <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                                </tr>
                            </thead>
                            @php $i=0; @endphp
                            <tbody>
                                @foreach($salary as $data)
                                <tr>
                                    <td>{{ $i = $i+1 }}</td>
                                    <td>{{ $data->emp_name }}</td>
                                    <td>{{ $data->desg_name }}</td>
                                    <td>@php echo number_format("$data->total_salary",2) @endphp</td>
                                    <td nowrap="" style="text-align:center;">
                                        <a class="btn btn-flat bg-purple" href="{{ route('salary-edit-page',$data->id) }}"><i class="fa fa-edit"></i>
                                        </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('salary-delete-page',$data->id) }}"><i class="fa fa-trash"></i></a>
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
                                <a href="{{ route('salary-create-page') }}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড সেলারি @else Add Salary @endif</a>
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
