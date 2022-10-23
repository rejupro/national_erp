@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='empl';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি লিস্ট @else Employee List @endif</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
            <li class=""><a href="">@if ( Auth::User()->language == 1 ) প্রোজেক্ট সাব-গ্রুপ ইডিট @else Project Sub-Group Edit @endif</a></li>
        </ol>
    </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h3 class="box-title">@if ( Auth::User()->language == 1 ) ইমপ্লয়ি লিস্ট @else Employee List @endif</h3>
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
                 {{-- Error messages show here  --}}
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped" id="datarec">
                        <thead>
                            <tr>

                                <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) আইডি নাঃ @else ID No @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) ডিপার্টমেন্ট @else Department @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) মোবাইল @else Mobile @endif</th>
                                <th>@if ( Auth::User()->language == 1 ) ইমেইল @else Email @endif</th>
                                <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($data as $emp)
                            <tr>
                                <td class="center">@php $i++; echo $i; @endphp</td>
                                <!-- <td><img style="height: 80px; width: 80px; border-radius :50%;" src="{{ asset($emp->item) }}"></td> -->
                                <td>{{ $emp->id }}</td>
                                <td><a  href="{{route('employee-details-page',['id' => $emp->id])}}">{{ $emp->name }}</a></td>
                                <td>@if($emp->designation!=null){{ $emp->designation->desg_name }}@endif</td>
                                <td>@if($emp->department!=null){{ $emp->department->dept_name }}@endif</td>
                                {{-- <td>{{ $emp->branch->name }}</td> --}}
                                <td>{{ $emp->mobile }}</td>
                                <td>{{ $emp->email }}</td>
                                <!-- <td>{{ $emp->salary }}</td> -->
                                <!-- <td>{{ $emp->debit }}</td> -->
                                <!-- <td>{{ $emp->credit }}</td> -->
                                <!-- <td>{{ $emp->balance }}</td> -->
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="{{ route('employee-edit-page',$emp->id) }}" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('employee-delete-page',$emp->id) }}"><i class="fa fa-trash"></i></a>
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
                                <a href="{{ route('employee-create-page') }}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড ইমপ্লয়ি @else Add Employee @endif</a>
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
