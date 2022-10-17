@extends("layouts/admin/main")
@section("content")
@php
 $mhead='inventory';
 $phead='pror';
@endphp
    <section class="content-header">
    <h1>@if ( Auth::User()->language == 1 ) রিসিভড @else Received @endif</h1>
        <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) রিসিভড @else Received @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">@if ( Auth::User()->language == 1 ) রিসভ রেকর্ড @else Receive Record @endif</h3>
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
    {{-- Error messages show here    --}}
    <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped" id="datarec">
    <thead>
    <tr>
    <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
    <th>@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
    <th>@if ( Auth::User()->language == 1 ) চালান নাঃ @else Challan No @endif</th>
    <th>@if ( Auth::User()->language == 1 ) পারচেস নাঃ @else Purchase No @endif</th>
    <th>@if ( Auth::User()->language == 1 ) রিসিভ ডেট @else Receive Date @endif</th>
    <th>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</th>
    <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
    </tr>
    </thead>
    @php $i=1; @endphp
    <tbody>
    @foreach($receipt as $data)
    <tr>
    <td class="text-center">{{ $i++ }}</td>
    <td>{{ $data->created_at }}</td>
    <td>{{ $data->challan_no }}</td>
    <td>{{ $data->pur_invoice }}</td>
    <td>{{ $data->rcv_date }}</td>
    <td>{{ $data->note }}</td>
    <td nowrap="">
        <a class="btn btn-flat bg-purple details-invoice" href="{{route('proreceive-view',['id' => $data->id])}}"><i class="fa fa-eye cat-child"></i></a>
        <a class="btn btn-flat bg-purple" href="{{route('productreceive-delete',['id' => $data->challan_no])}}"><i class="fa fa-trash"></i></a>
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
    <a href="{{route('proreceive-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) ক্রিয়েট রিসিভ @else Create Receive @endif</a>
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
      {{-- History --}}
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- /.main content -->

@endsection
