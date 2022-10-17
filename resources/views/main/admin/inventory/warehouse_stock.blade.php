@extends("layouts/admin/main")
@section("content")
@php
 $mhead='inventory';
 $phead='warehs';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ওয়ারহাউজ স্টক @else Warehouse Stock @endif</h1>
   <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ওয়ারহাউজ স্টক @else Warehouse Stock @endif</a></li>
        </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) ওয়ারহাউজ স্টক স্ট্যাটাস @else Warehouse Stock Status @endif</h3>
            </div>
            <div class="box-body">
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped table-hover table_list" id="datarec">
                     <thead>
                        <tr>
                           <th rowspan="2" style="width:40px;" class="text-center">SN</th>
                           <th rowspan="2" style="width:80px;">Image</th>
                           <th rowspan="2">Name</th>
                           <th rowspan="2">SKU</th>
                           <th rowspan="2">Warehouse</th>
                           <th colspan="2" class="text-center">Purchase Details</th>
                           <th colspan="2" class="text-center">Sales Details</th>
                           <th colspan="2" class="text-center">Transaction Details</th>
                           <th rowspan="2" class="text-center">Adjust</th>
                           <th rowspan="2" class="text-center">Available</th>
                        </tr>
                        <tr>
                           <th class="text-center">Purchase</th>
                           <th class="text-center">Received</th>
                           <th class="text-center">Sold</th>
                           <th class="text-center">Delivery</th>
                           <th class="text-center">Received</th>
                           <th class="text-center">Send</th>
                        </tr>
                     </thead>
                        @php
                             $i=1; $total=0;
                         @endphp
                     <tbody>
                         @foreach ($stock as $data)
                         {{-- dd($stock); --}}
                        <tr>
                           <td class="text-center">{{ $i++ }}</td>
                           <td class="text-center"><img src="" height="40px" width="40px"></td>
                           <td><b class="prodetail" id="" style="cursor: pointer;"></b>{{ $data->product_name }}</td>
                           <td>{{ $data->code }}</td>
                           <td>{{ $data->name }}</td>
                           <td class="text-center">{{ $data->quantity }}</td>
                           <td class="text-center">{{ $data->recv_qty }}</td>
                           <td class="text-center">{{ $data->sold_qty }}</td>
                           <td class="text-center">{{ $data->deli_qty }}</td>
                           <td class="text-center">{{ $data->recv_qty }}</td>
                           <td class="text-center">{{ $data->deli_qty }}</td>
                           <td class="text-center">{{ $data->recv_qty - $data->deli_qty }}</td>
                           <td class="text-center">{{ $data->quantity - $data->sold_qty }}</td>
                        </tr>
                        @php $total = $total + $data->quantity - $data->sold_qty; @endphp
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <td class="text-center" colspan="5"><strong>-Total-</strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong></td>
                           <td class="text-center"><strong></strong>{{ $total }}</td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
