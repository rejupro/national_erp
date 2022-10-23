@extends("layouts/admin/main")
@section("content")
@php
$mhead='requisition';
$phead='req_app_list';
@endphp
<section class="content-header">
   <h1>Approve Requisition Record</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Requisition</a></li>
      <li class=""><a href="#">Approve Requisition Record</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Requisition List</h3>
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
                           <th width="30px">SN</th>
                           <th width="30px">Date & Time</th>
                           <th width="60px">Requisition V.No</th>
                           <th width="60px">Requisition For</th>
                           <th width="60px">Staff Name</th>
                           <th width="60px">Status</th>
                           <th width="60px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($requisition as $data)
                        <tr>
                           <td width="30px">{{$i++}}</td>
                           <td width="30px">{{date('d-m-Y', strtotime($data->created_at))}}</td>
                           <td width="60px">{{$data->code}}</td>
                           <td width="60px">{{$data->project->project_id}}</td>
                           <td width="65px">{{$data->staff->name}}</td>
                           <td width="65px">{{$data->status}}</td>
                           <td width="60px">
                              {{-- <a class="empty" style="cursor: pointer;" href="{{route('requisition-edit-route',$data->code)}}"><i class="fa fa-edit"></i></a>
                              <a class="empty" style="cursor: pointer;" href="{{route('requisition-delete-route',$data->id)}}"><i class="fa fa-trash"></i></a> --}}
                              <a class="empty" style="cursor: pointer;" href="{{route('requisition-view-route',$data->code)}}"><i class="fa fa-eye"></i></a>
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
                        <a href="{{route('requisition-create-route')}}" class="btn btn-flat bg-purple">Add Requisition</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
