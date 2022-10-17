@extends("layouts/admin/main")
@section("content")
@php
 $mhead='payroll';
 $phead='empl';
@endphp
    <section class="content-header">
        <h1>Employee List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Employee List</a></li>
        </ol>
    </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h3 class="box-title">Employee List</h3>
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
                                <th style="width:40px;">SN</th>
                                <!-- <th>Image</th> -->
                                <th>Id No</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                {{-- <th>Work Place</th> --}}
                                <th>Mobile</th>
                                <th>Email</th>
                                <!-- <th>Salary</th> -->
                                <!-- <th>Debit</th> -->
                                <!-- <th>Credit</th> -->
                                <!-- <th>Balance</th> -->
                                <th style="width:40px; text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($data as $emp)
                            <tr>
                                <td class="center">@php $i++; echo $i; @endphp</td>
                                <!-- <td><img style="height: 80px; width: 80px; border-radius :50%;" src="{{ asset($emp->item) }}"></td> -->
                                <td>{{ $emp->id }}</td>
                                <td>{{ $emp->name }}</td>
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
                                    <a class="btn btn-flat bg-purple" href="{{ route('employee-delete-page',$emp->id) }}"><i class="fa fa-trash"></i></a>
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
                                <a href="{{ route('employee-create-page') }}" class="btn btn-flat bg-purple">Add Employee</a>
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
