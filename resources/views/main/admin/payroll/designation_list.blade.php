@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='degl';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ডেজিগনেসন লিস্ট @else Designation List @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ডেজিগনেসন লিস্ট @else Designation List @endif</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">@if ( Auth::User()->language == 1 ) ডেজিগনেসন লিস্ট @else Designation List @endif</h3>
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
                    {{-- Error message Show here   --}}
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-striped" id="datarec">
                            <thead>
                            <tr>
                            <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                            <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                            <th>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</th>
                            <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                            </tr>
                            </thead>
                            @php $i=0; @endphp
                            <tbody>
                                @foreach($data as $desg)
                                <tr>
                                <td class="center">@php $i++; echo $i; @endphp</td>
                                <td>{{ $desg->desg_name }}</td>
                                <td>{{ $desg->description }}</td>
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="{{ route('designation-edit-page',$desg->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('designation-delete-page',$desg->id) }}"><i class="fa fa-trash"></i></a>
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
                                    <a href="{{ route('designation-create-page') }}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড ডেজিগনেসন @else Add Designation @endif</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header">
                            <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History  @endif</h3>
                            </div>
                        <!-- /.box-header -->
                            <div class="box-body" >
                            {{-- History mess show here --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.main content -->
@endsection
