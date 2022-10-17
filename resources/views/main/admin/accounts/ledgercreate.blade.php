@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='ledgrc';
@endphp
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) লেদজার ক্রিয়েট @else Ledger Create @endif</h1>
   <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) লেদজার ক্রিয়েট @else Ledger Create @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) লেদজার ক্রিয়েট @else Ledger Create @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here --}}
               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
               <form action="{{route('ledger-store-route')}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-7">
                                       <div class="form-group">
                                          <label>@if ( Auth::User()->language == 1 ) নাম @else Name @endif</label>
                                          <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Petty Cash" />
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label>@if ( Auth::User()->language == 1 ) কোড @else Code @endif</label>
                                          <input type="text" name="code" maxlength="3" value="{{$codes}}" id="code" class="form-control" placeholder="e.g. 11-4040" readonly/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>@if ( Auth::User()->language == 1 ) গ্রুপ @else Group @endif</label>
                                          <select class="form-control select2" name="grp_id" id="grp_id" onchange="getAllSubgroup(this.value)">
                                             <option value="">-Select-</option>
                                             @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>@if ( Auth::User()->language == 1 ) সাব-গ্রুপ @else Sub-Group @endif</label>
                                          <select class="form-control select2" name="sub_grp_id" id="sub_grp_id">
                                            <option value="">-Select-</option>
                                            @foreach($subgroups as $subgroup)
                                            <option value="{{$subgroup->id}}">{{$subgroup->name}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>@if ( Auth::User()->language == 1 ) ডিসক্রিপসন @else Description @endif</label>
                                          <textarea class="form-control" maxlength="150" rows="6" name="description" placeholder="Description"></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_ledger" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{route('ledger-list')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
                     </div>
                  </div>
               </form>
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
                     {{-- History Show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
<!-- page script -->
<script type="text/javascript">
   $(document).ready(function () {
   var name = new LiveValidation('name');
   name.add(Validate.Presence);
   var grid = new LiveValidation('grid');
   grid.add(Validate.Presence);
   var sgrid = new LiveValidation('sgrid');
   sgrid.add(Validate.Presence);
   });

   function getAllSubgroup(id){
   $.ajax({
   url: 'axe_getsub.php',
   type: 'post',
   data: {subgroup : id},
   success:function(data) {
   $('#sgrid').html(data);
   }
   });
   };
</script>
<!-- /page script -->
@endsection
