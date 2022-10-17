@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='lar';
@endphp
    <section class="content-header">
        <h1>Leave Record</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class="active"><a href="{{ route('leaveapp-list-page') }}">Leave Record</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Leave Record</h3>
    </div>
    <div class="box-body">
    {{-- Error message show here     --}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th rowspan="2" style="width:40px;">SN</th>
    <th rowspan="2">Date</th>
    <th rowspan="2">Employee</th>
    <th rowspan="2">Leave</th>
    <th rowspan="2">Reason</th>
    <th rowspan="2">From</th>
    <th rowspan="2">To</th>
    <th rowspan="2">Days</th>
    <th rowspan="2">Status</th>
    <th rowspan="2">Action</th>
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
    </a> <a class="btn btn-flat bg-purple" href="{{ route('leaveapp-delete-page',$leave->id) }}"><i class="fa fa-trash"></i></a>
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
    <a href="{{ route('leaveapp-create-page') }}" class="btn btn-flat bg-purple">Add Application</a>
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
    <h3 class="box-title">History </h3>
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
