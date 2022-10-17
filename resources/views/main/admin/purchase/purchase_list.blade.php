@extends("layouts/admin/main")
@section("content")
@php
 $mhead='purchase';
 $phead='puri';
@endphp
    <section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) পারচেস লিস্ট @else Purchase List @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) পারচেস লিস্ট @else Purchase List @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) পারচেস রেকর্ড @else Purchase Record @endif</h3>
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
        {{-- Error message here  --}}
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
        <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
        <th>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ @else Branch @endif</th>
        <th>@if ( Auth::User()->language == 1 ) প্রোজেক্ট কোড @else Project Code @endif</th>
        <th>@if ( Auth::User()->language == 1 ) ইনভয়েস @else Invoice @endif</th>
        <th>@if ( Auth::User()->language == 1 ) টোটাল @else Total @endif</th>
        <th>@if ( Auth::User()->language == 1 ) রিসিভড @else Received @endif</th>
        <th>@if ( Auth::User()->language == 1 ) ডিউ @else Due @endif</th>
        <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($purchase as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{date('d-m-Y', strtotime($data->purchase_date))}}</td>
            <td>@if($data->product_store=='BR-2') RM Construction @else Others @endif</td>
            <td>@if($data->project!=null){{$data->project->project_id}} @endif</td>
            <td>{{ $data->pur_invoice }}</td>
            <td>@php echo number_format("$data->payable",2) @endphp</td>
            <td>@php echo number_format("$data->paid",2) @endphp</td>
            <td>{{ $data->payable - $data->paid }}</td>
            <td nowrap="">
                <a class="btn btn-flat bg-purple details-invoice" href="{{route('purchese-view-page',$data->id)}}"><i class="fa fa-eye cat-child"></i></a>
                <a class="btn btn-flat bg-purple details-invoice" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('purchase-delete-page',$data->pur_invoice)}}"><i class="fa fa-trash cat-child"></i></a>
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
        <a href="{{route('purchase-create-page')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) ক্রিয়েট পারচেস @else Create Purchase @endif</a>
        </div>
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
        <!-- tools box -->
        <div class="pull-right box-tools">
        <a class=" pull-right" data-widget="collapse" style="margin-right: 5px;">
        <i class="fa fa-minus"></i></a>
        </div>
        <!-- /. tools -->
        <i class="fa fa-filter" aria-hidden="true"></i>
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) তারিখ অনুযায়ী ফিল্টার @else Date Range Filter @endif</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >

        <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="col-md-12 popup_details_div">
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10">

        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label>Date From</label>
        <div class="input-group date datetimepicker">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="text" name="tfdate" id="tfdate" value=""  class="form-control" placeholder="Date From" readonly="true">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group" >
        <label>Date To</label>
        <div class="input-group date datetimepicker">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="text" name="ttdate" id="tdate" value=""  class="form-control" placeholder="Date To" readonly="true">
        </div>
        </div>
        </div>
        </div>

        </div>
        <div class="col-md-1"></div>
        </div>
        </div>
        </div>

        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-2" >

        </div>
        <div class="col-md-10 text-right" >
        <input type="button" id="csvexp" class="btn btn-flat bg-purple btn-sm " value="Exp->CSV"/>
        </div>
        </div>
        </form>

        </div>
        </div>
        </div>

        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif </h3>
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
        <div style="display: none;">
        <table id="expcsv"></table>
        </div>
    </section>
    <!-- /.main content -->
@endsection
