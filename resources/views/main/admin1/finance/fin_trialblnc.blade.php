@extends("layouts/admin/main")
@section("content")
@php
 $mhead='finance';
 $phead='tb';
@endphp
<section class="content-header">
   <h1>Trial Balance</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Financials</a></li>
      <li class=""><a href="#">Trial Balance</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Trial Balanch</h3>
                </div>
                <div class="box-body">
                    {{-- Error     --}}
                    <div class="col-md-12 table-responsive">
                        <div class="row">
                            <center>
                                <h3 class="page-title">TRIAL BALANCE</h3>
                            </center>
                        </div>
                        <div class="row">
                            <table class="table table-bordered table-hover treetable" id="itemdata">

                                <thead>
                                    <tr>
                                     <th rowspan="3" style="text-align:center;"> Head of Accounts </th>
                                     <th rowspan="3" style="text-align:center;"> Beginning<br>Balance<br></th>
                                     <th colspan="3" style="text-align:center;"> During the Period </th>
                                     <th rowspan="3" style="text-align:center;"> Ending<br>Balance<br></th>
                                 </tr>
                                 <tr><th colspan="3" style="text-align:center;"> From:  To: </th></tr>
                                 <tr class="tabhead">
                                     <th style="text-align:center;">Debit</th>
                                     <th style="text-align:center;">Credit</th>
                                     <th style="text-align:center;">Net Activity</th>
                                 </tr>
                             </thead>
                            @if($trial_debit)
                             <tbody>
                                <!-- Debit -->
                                @php
                                $begining_balance=0;
                                $begining_balance_subgroup=0;
                                $begining_balance_ledger=0;
                                $total_debit=0;
                                $total_credit=0;
                                $total_net_activity=0;
                                $total_balance=0;
                                $count_group=0;
                                $count_subgroup=0;
                                @endphp
                                @foreach($trial_debit as $trials_debit)
                                @php $begining_balance = $trials_debit->debit_amount + $begining_balance; @endphp
                                @if($trials_debit->group_id != $count_group)
                                @php  $count_group=$trials_debit->group_id;  @endphp
                                <tr data-tt-id="" class="branch collapsed" style="background-color:#e0f7fa">
                                    <td><b>&nbsp;{{ $trials_debit->group_name }}</b></td>
                                    <td style="text-align:right;">{{ $begining_balance }}</td>
                                    <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                    <td style="text-align:right;">{{ $trials_debit->credit_amount }}</td>
                                    <td style="text-align:right;">0</td>
                                    @if($trials_debit->credit_amount == 0)
                                    <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                    @else
                                    <td style="text-align:right;">{{ $trials_debit->debit_amount - $trials_debit->credit_amount }}</td>
                                    @endif
                                </tr>
                                @endif
                                @php $begining_balance_subgroup = $trials_debit->debit_amount + $begining_balance_subgroup; @endphp
                                @if($trials_debit->subgroup_id != $count_subgroup)
                                @php  $count_subgroup=$trials_debit->subgroup_id;  @endphp
                                <p id="load_subgroups">
                                    <tr data-tt-id="" data-tt-parent-id="" class="table-success branch collapsed">
                                        <td style="padding-left: 15px;"><b>&nbsp;{{ $trials_debit->subgroup_name }}</b></td>
                                        <td style="text-align:right;">{{ $begining_balance_subgroup }}</td>
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                        <td style="text-align:right;">{{ $trials_debit->credit_amount }}</td>
                                        <td style="text-align:right;">0</td>
                                        @if($trials_debit->credit_amount == 0)
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                        @else
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount - $trials_debit->credit_amount }}</td>
                                        @endif
                                    </tr>
                                </p>
                                @endif
                                @php $begining_balance_ledger = $trials_debit->debit_amount + $begining_balance_ledger;
                                @endphp
                                <p id="load_ledger">
                                    <tr data-tt-id="" data-tt-parent-id="" class="leaf collapsed">
                                        <td style="padding-left:30px;">{{ $trials_debit->ledger_name }}</td>
                                        <td style="text-align:right;">{{ $begining_balance }}</td>
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                        <td style="text-align:right;">{{ $trials_debit->credit_amount }}</td>
                                        <td style="text-align:right;">0</td>
                                        @if($trials_debit->credit_amount == 0)
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount }}</td>
                                        @else
                                        <td style="text-align:right;">{{ $trials_debit->debit_amount - $trials_debit->credit_amount }}</td>
                                        @endif
                                    </tr>
                                </p>
                                @php
                                $total_debit = $total_debit + $trials_debit->debit_amount;
                                $total_credit = $total_credit + $trials_debit->credit_amount;
                                $total_net_activity = $total_net_activity + 0;
                                $total_balance = $total_balance + ($trials_debit->debit_amount - $trials_debit->credit_amount);
                                @endphp
                                @endforeach
                                <!-- /Debit -->
                            </tbody>
                            <tfoot>
                                <tr style="background-color:#ffeee8; font-weight:200px; background-color: #bfffa3;">
                                    <td style="padding-left: 15px;"><b>Total Trial Balance</b></td>
                                    <td style="text-align:right;"><b>Total Begining Balance = </b>{{ $begining_balance }}</td>
                                    <td style="text-align:right; color: green;"><b>Total Debit = </b>{{ $total_debit }}</td>
                                    <td style="text-align:right; color: red;"><b>Total Credit = </b>{{ $total_credit }}</td>
                                    <td style="text-align:right;">Total Activity = {{ $total_net_activity }}</td>
                                    <td style="text-align:right; color: blue;"><b>Total Balance = </b>{{ $total_balance }}</td>
                                </tr>
                                <tr style="background-color:#ffeee8; font-weight:200px; background-color: #ffcbb3;">
                                    <td style="padding-left: 15px;"><b>Mismatch</b></td>
                                    <td style="text-align:right;"><b>Total Begining Balance = </b>{{ $begining_balance }}</td>
                                    <td style="text-align:right; color: green;"><b>Total Debit = </b>{{ $total_debit }}</td>
                                    <td style="text-align:right; color: red;"><b>Total Credit = </b>{{ $total_credit }}</td>
                                    <td style="text-align:right;">Total Activity = {{ $total_net_activity }}</td>
                                    <td style="text-align:right; color: blue;"><b>Total Balance = </b>{{ $total_balance }}</td>
                                </tr>
                            </tfoot>
                            @else
                            <center><h4>There Is No Record To Show</h4></center>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Filter</h3>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('trial_balance_filter_by_date') }}" method="GET">
                        @csrf
                        <div class="box-body" >
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="form-group" >
                                        <label>From:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="start_date" placeholder="From Date" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label>To:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" maxlength="18" class="form-control datetimepicker" id="end_date" placeholder="End Date" autocomplete="off" readonly>
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
                                    {{-- <input type="button" id="reset" class="btn btn-flat bg-red btn-sm " value="Reset"/>  --}}
                                    <input type="submit" class="btn btn-flat bg-purple btn-sm" value="Submit"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
<!-- /.main content -->
{{-- <script>
   $(document).ready(function () {
      $('#trial_balance_filter_by_date').submit(function () {
         var dataString = new FormData($(this)[0]);
         $.ajax({
            type: "POST",
            url: '{{ route('trial_balance_filter_by_date') }}',
            data: dataString,
            async: false,
            success: function (result) {
               if (result) {

                  $('#itemdata').html(result);
               } else {
                  return false;
               }
            },
            cache: false,
            contentType: false,
            processData: false
         });
         return false;
      });
   });
</script> --}}

    <!-- /.main content -->
@endsection
