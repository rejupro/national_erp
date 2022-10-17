@extends("layouts/admin/main")
@section("content")
@php
 $mhead='loan';
 $phead='loanlist';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) লন ইডিট @else Loan Edit @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) লন ইডিট @else Loan Edit @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) লন ইডিট @else Loan Edit @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error mess show here  --}}
               <form action="{{route('loan-update-route',$loan->id)}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                    <input type="text" name="name" maxlength="45" value="{{$loan->name}}" id="name" class="form-control" placeholder="e.g. "/>
                                 </div>
                              </div>
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>
                                    <input type="text" name="code" maxlength="15" value="{{$loan->code}}" id="code" class="form-control" readonly />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                   <label>@if ( Auth::User()->language == 1 ) টাইপ @else Type @endif</label>
                                   <select class="form-control" name="type" id="type">
                                      <option value="{{$loan->type}}">{{$loan->type}}</option>
                                      <option value="">Select One</option>
                                      <option value="Person">Person</option>
                                      <option value="Bank">Bank</option>
                                      <option value="Inter Company">Inter Company</option>
                                   </select>
                                </div>
                             </div>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>@if ( Auth::User()->language == 1 ) নাম্বার @else Number @endif</label>
                                  <input type="text" name="mobile" maxlength="11" value="{{$loan->mobile}}" id="mobile" class="form-control" placeholder="e.g.017XXXXXXXXXX"/>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                  <label>@if ( Auth::User()->language == 1 ) একাউন্ট নাঃ @else Account No @endif</label>
                                  <input type="text" name="acc_no" maxlength="16" value="{{$loan->acc_no}}" id="acc_no" class="form-control" placeholder="e.g. 142545554444" />
                               </div>
                            </div>
                         </div>
                           
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>@if ( Auth::User()->language == 1 ) এড্রেস @else Address @endif</label>
                                   <textarea class="form-control" name="address" id="address" value='{{$loan->address}}' maxlength="200" rows="4" placeholder="Address">{{$loan->address}}</textarea>
                                </div>
                             </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
                                    <textarea class="form-control" name="description" id="description" maxlength="200" value='{{$loan->description}}' rows="4" placeholder="Description">{{$loan->description}}</textarea>
                                 </div>
                              </div>
                             
                           </div>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm" value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"/> <a href="{{route('loan-list-route')}}" class="btn btn-flat bg-gray">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
