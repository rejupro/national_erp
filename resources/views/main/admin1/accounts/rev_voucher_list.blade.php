@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='recl';
@endphp
<section class="content-header">
   <h1>Receive Record</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Receive Record</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Receive Record</h3>
            </div>
            <div class="box-body">
               {{-- Error messages show --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>Vaucher No</th>
                           <th>Project Name</th>
                           <th>Amount</th>
                           <th>Note</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($results as $result)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{date('d-m-Y', strtotime($result->date))}}</td>
                           <td>{{$result->voucher_no}}</td>
                           @if($result->project !=null)
                           <td>{{$result->project->name}}</td>
                           @else 
                           <td></td>
                           @endif
                           <td><span>৳ </span>@php echo number_format("$result->amount",2) @endphp</td>
                           <td>{{$result->note}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple details-invoice" href="{{route('receivevoucher-view-route',['id'=>$result->voucher_no])}}" id=""><i class="fa fa-eye cat-child"></i></a>
                              <!--<a class="btn btn-flat bg-purple" href="#"><i class="fa fa-edit"></i></a>-->
                              <a class="btn btn-flat bg-purple" href="{{route('receivevoucher-destroy-route',['id'=>$result->voucher_no])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('receivevoucher-create-route')}}" class="btn btn-flat bg-purple">Create Receive</a>
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
                     <h3 class="box-title">History </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History show here  --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
