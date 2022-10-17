@extends("layouts/admin/main")
@section("content")
@php
 $mhead='daily';
 $phead='dexr';
@endphp
<section class="content-header">
   <h1>Expenses List</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Daily Process</a></li>
      <li class=""><a href="#">Daily Expenses List</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Daily Expenses Record</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here    --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>Project Id</th>
                           <th>Staff Name</th>
                           <th>Product Item</th>
                           <th>Total Price</th>
                           <th>Note</th>
                           <th style="width:40px; text-align:center;">Action</th>
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
                           <td>{{$data->date}}</td>
                           <td>{{data_get($data,'project.project_id')}}</td>
                           <td>{{$data->staff->name}}</td>
                           <td>{{$data->product->name}}</td>
                           <td>{{$data->grand_total}}</td>
                           <td>{{$data->address}}</td>
                           <td nowrap="">
                             <a class="btn btn-flat bg-purple" href="{{route('daily-expense-view-route',['id' => $data->id])}}"><i class="fa fa-eye"></i></a>
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
                        <a href="{{route('daily-expense-create-route')}}" class="btn btn-flat bg-purple">Add Expenses</a>
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
                     <h3 class="box-title">Date Range Filter</h3>
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
                     <h3 class="box-title">History </h3>
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
