@extends("layouts/admin/main")
@section("content")
@php
 $mhead='requisition';
 $phead='balance_list';
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
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped" id="datarec">
                        <thead>
                            <tr>
                                <th style="width:40px;">SN</th>
                                <th>Name</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach($data as $emp)
                            <tr>
                                <td class="center">@php $i++; echo $i; @endphp</td>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->debit }}</td>
                                <td>{{ $emp->credit }}</td>
                                <td>{{ $emp->balance }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
    </div>


</section>
    <!-- /.main content -->


@endsection
