@extends("layouts/admin/main")
@section("content")
@php
 $mhead='daily';
 $phead='der';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) এক্সপেন্সেস লিস্ট @else Expenses List @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) এক্সপেন্সেস লিস্ট @else Expenses List @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) এক্সপেন্সেস রেকর্ড @else Expenses Record @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here    --}}
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
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) এক্সপেন্সেস নাঃ @else Expenses No @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) প্রোজেক্ট আইডি @else Project Id @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) স্টাফ নেম @else Staff Name @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) এমাউন্ট @else Amount @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) নোট @else Note @endif</th>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) ডিটেইলস @else Details @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach ($expenses as $expense)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{date('d-m-Y', strtotime($expense->date))}}</td>
                           <td>{{$expense->voucher_no}}</td>
                           <td>@if($expense->project!=null){{$expense->project->project_id}} @endif</td>
                           <td>@if($expense->stf_id !=null)
                              @php
                                    $first = filter_var($expense->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($expense->stf_id, FILTER_SANITIZE_STRING);
                                    $type = preg_replace("/[^A-Za-z\-]/",'', $second);
                                    
                                    if($type == 'CO'){
                                        $sname=DB::table('procontractors')->where('id', $id)->first();
                                        $revname=$sname->name;
                                    }
                                    if($type == 'EP'){
                                        $sname=DB::table('employees')->where('id', $id)->first(); 
                                        $revname=$sname->name;
                                    
                                        }
                              @endphp
                             {{$revname}}
                                 
                              @endif
                           </td>
                           <td style="text-align:right;">@php echo number_format("$expense->amount",2) @endphp</td>
                           <td>{{$expense->note}}</td>
                           <td>@foreach($details as $data) @if($expense->voucher_no==$data->voucher_no)<p>{{$data->expense_name}}</p>@endif @endforeach</td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="{{route('expensevoucher-view-route',['id' => $expense->voucher_no])}}"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('expensevoucher-destroy-route',['id' => $expense->voucher_no])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('expense-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড এক্সপেন্সেস @else Add Expenses @endif</a>
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
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else  History  @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history message show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
