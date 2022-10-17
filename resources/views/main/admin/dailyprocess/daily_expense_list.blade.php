@extends("layouts/admin/main")
@section("content")
@php
 $mhead='daily';
 $phead='dexr';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ডেইলি এক্সপেন্সেস লিস্ট @else Daily Expenses List @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) ডেইলি এক্সপেন্সেস লিস্ট @else Daily Expenses List @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) ডেইলি এক্সপেন্সেস লিস্ট @else Daily Expenses List @endif</h3>
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
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) তারিখ @else Date @endif</th>ক
                           <th>@if ( Auth::User()->language == 1 ) প্রোজেক্ট কোড @else Project Code @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) স্টাফ নাম @else Staff Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) টোটাল প্রাইস @else Total Price @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ডিটেইলস @else Details @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           @php
                               $i=1;
                           @endphp
                           {{-- @dd($expenses) --}}
                           @foreach ($expenses as $data)
                           
                           <td class="center">{{$i++}}</td>
                           <td>{{date('d-m-Y', strtotime($data->date))}}</td>
                           <td>@if($data->project_id !=null)<a  href="{{route('project-details-page',['id' => $data->project_id])}}">{{data_get($data,'project.project_id')}}</a>@endif</td>
                           <td>@if($data->stf_id !=null)
                              @php
                                    $first = filter_var($data->stf_id, FILTER_SANITIZE_NUMBER_INT);
                                    $id = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                                    $second=filter_var($data->stf_id, FILTER_SANITIZE_STRING);
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
                           <td style="text-align:right;">@php echo number_format("$data->grand_total") @endphp</td>
                           <td>{{$data->address}}</td>
                           <td>@foreach($details as $datas) @if($data->id==$datas->daily_expense_model_id)<p>{{$datas->requisition_item}}</p>@endif @endforeach</td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="{{route('daily-expense-view-route',['id' => $data->voucher_no])}}"><i class="fa fa-eye"></i></a>
                             <a class="btn btn-flat bg-purple" onclick="return confirm('Are you sure you want to delete this item?');" href="{{route('daily-expense-destroy-route',['id' => $data->id])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('daily-expense-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড এক্সপেন্সেস @else Add Expenses @endif</a>
                        
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
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                        <a class=" pull-right" data-widget="collapse" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i></a>
                     </div>
                     <!-- /. tools -->
                     <i class="fa fa-filter" aria-hidden="true"></i>
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) তারিখ দিয়ে ফিল্টার @else Date Range Filter @endif</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                                                <input type="text" name="tfdate" value=""  class="form-control" placeholder="Date From" readonly="true">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group" >
                                             <label>Date To</label>
                                             <div class="input-group date datetimepicker">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" name="ttdate" value=""  class="form-control" placeholder="Date To" readonly="true">
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
                           <div class="col-md-8"></div>
                           <div class="col-md-4 text-right" >
                              <input type="submit" name="date_filter" id="submit" class="btn btn-flat bg-purple btn-sm " value="Submit"/>
                           </div>
                        </div>
                     </form> --}}
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
