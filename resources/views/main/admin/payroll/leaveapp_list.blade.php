@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='lar';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) লিভ রেকর্ড @else Leave Record @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) লিভ রেকর্ড @else Leave Record @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">@if ( Auth::User()->language == 1 ) লিভ রেকর্ড @else Leave Record @endif</h3>
    </div>
    <div class="box-body">
    {{-- Error message show here     --}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
    <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
    <th>@if ( Auth::User()->language == 1 ) ইমপ্লয়ি @else Employee @endif</th>
    <th>@if ( Auth::User()->language == 1 ) লিভ টাইপ @else Leave Type @endif</th>
    <th>@if ( Auth::User()->language == 1 ) কারন @else Reason @endif</th>
    <th>@if ( Auth::User()->language == 1 ) হতে @else From @endif</th>
    <th>@if ( Auth::User()->language == 1 ) কাছে @else To @endif</th>
    <th>@if ( Auth::User()->language == 1 ) ডেজ @else Days @endif</th>
    <th>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</th>
    <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
    </tr>
    </thead>
    <tbody>
        @php $i=0; @endphp
        @foreach($data as $leave)
    <tr>
    <td class="center">{{ $i++ }}</td>
    <td>{{ $leave->created_at }}</td>
    <td>{{ $leave->name }}</td>
    <td>{{ $leave->leave_name }}</td>
    <td>{{ $leave->reason }}</td>
    <td>{{ date('d-m-Y', strtotime($leave->start_date)) }}</td>
    <td>{{ date('d-m-Y', strtotime($leave->end_date)) }}</td>
    <td>{{ $leave->days }}</td>
    <td>
     @if($leave->status==1)
     Approved
     @elseif($leave->status==2)
     Pending
     @else
     Disapprove
     @endif
    </td>
    <td nowrap="" style="text-align:center;">
    <a class="btn btn-flat bg-purple" href="{{ route('leaveapp-edit-page',$leave->id) }}"><i class="fa fa-edit"></i>
    </a> <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('leaveapp-delete-page',$leave->id) }}"><i class="fa fa-trash"></i></a>
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
    <a href="{{ route('leaveapp-create-page') }}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড অ্যাপ্লিকেশান @else Add Application @endif</a>
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
    <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
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
