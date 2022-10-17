@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='class';
@endphp
    <section class="content-header">
        <h1>@if ( Auth::User()->language == 1 ) ক্লাস @else Class @endif</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
            <li class=""><a href="">@if ( Auth::User()->language == 1 ) ক্লাস @else Class @endif</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">@if ( Auth::User()->language == 1 ) একাউন্ট ক্লাস @else Account Class @endif</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:40px; text-align:center;">SN</th>
                                            <th>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</th>
                                            <th>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($class as $data)
                                        <tr>
                                            <td class="text-center">{{$i++}}</td>
                                            <td style="font-style: italic; font-weight: 600;">{{$data->name}}</td>
                                            <td>{{$data->description}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
