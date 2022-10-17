@extends("layouts/admin/main")
@section("content")
@php
$mhead='requisition';
$phead='req_list';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) রিকুইজিশন রেকর্ড @else Requisition Record @endif</h1>
      <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) রিকুইজিশন রেকর্ড @else Requisition Record @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) রিকুইজিশন লিস্ট @else Requisition List @endif</h3>
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
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">@if ( Auth::User()->language == 1 ) সিরিয়াল @else SN @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) তারিখ ও সময় @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) ভাউচার নাঃ @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) রিকুইজিশন ফর @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) স্টাফ নেম @else Name @endif</th>
                           <th>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Name @endif</th>
                           <th style="width:40px; text-align:center;">@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                        </tr>
                     </thead>
                    
                     @if($requisition)
                        <tbody>
                           @php
                               $i=1;
                           @endphp
                           @foreach ($requisition as $data)
                          <tr>
                             <td width="30px">{{$i++}}</td>
                             <td width="30px">{{$data->created_at}}</td>
                             <td width="60px">{{$data->code}}</td>
                             <td width="60px">{{$data->project->name}}-{{$data->project->project_id}}</td>
                              @if($data->stf_id != null)
                                 <td width="65px">{{$data->staff->name}}</td>
                              @else
                              <td></td>
                              @endif
                             <td width="65px">{{$data->status}}</td>
                             <td width="60px">
                                @if($data->status=='Pending') <a class="empty" style="cursor: pointer;" href="{{route('requisition-edit-route',$data->code)}}"><i class="fa fa-edit"></i></a>
                                <a class="empty" onclick="return confirm('Are you sure you want to delete this item?');" style="cursor: pointer;" href="{{route('requisition-delete-route',$data->code)}}"><i class="fa fa-trash"></i></a>@endif
                                <a class="empty" style="cursor: pointer;" href="{{route('requisition-view-route',$data->id)}}"><i class="fa fa-eye"></i></a>
                             </td>
                          </tr>
                          @endforeach
                       </tbody>

                     @endif

                      <!-- /if -->
                      @if($daterequisition)
                      <tbody>
                       @php
                           $i=1;
                       @endphp
                       @foreach ($daterequisition as $data)
                      <tr>
                         <td width="30px">{{$i++}}</td>
                         <td width="30px">{{$data->created_at}}</td>
                         <td width="60px">{{$data->code}}</td>
                         <td width="60px">{{$data->project->name}}-{{$data->project->project_id}}</td>
                         @if($data->staff->name != null)
                           <td width="65px">{{$data->staff->name }}</td>
                         @else
                          <td></td>
                         @endif
                         <td width="65px">{{$data->status}}</td>
                         <td width="60px">
                            @if($data->status=='Pending') <a class="empty" style="cursor: pointer;" href="{{route('requisition-edit-route',$data->code)}}"><i class="fa fa-edit"></i></a>
                            <a class="empty" style="cursor: pointer;" href="{{route('requisition-delete-route',$data->code)}}"><i class="fa fa-trash"></i></a>@endif
                            <a class="empty" style="cursor: pointer;" href="{{route('requisition-view-route',$data->code)}}"><i class="fa fa-eye"></i></a>
                         </td>
                      </tr>
                      @endforeach
                   </tbody>

                   @endif
                    
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="{{route('requisition-create-route')}}" class="btn btn-flat bg-purple">@if ( Auth::User()->language == 1 ) এড রিকুইজিশন @else Add Requisition @endif</a>
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
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) তারিখ অনুযায়ী ফিল্টার @else Date Range Filter @endif</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     <form action="{{route('daterequisition-list-route')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                     @csrf
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
                                                <input type="text" name="start_date" value=""  class="form-control" placeholder="Date From" readonly="true">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group" >
                                             <label>Date To</label>
                                             <div class="input-group date datetimepicker">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" name="end_date" value=""  class="form-control" placeholder="Date To" readonly="true">
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
                              <input type="submit" name="date_filter" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সাবমিট @else Submit @endif"/>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">History </h3>
                  </div>
                 
                  <div class="box-body" >
                     {{-- history message show here --}}
                  </div>
               </div>
            </div>
         </div> -->
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
