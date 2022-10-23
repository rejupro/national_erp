@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='jourl';
@endphp
<section class="content-header">
   <h1>Journal Record</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Journal Record</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Journal Entry Record</h3>
            </div>
            <div class="box-body">
               {{-- Error message show --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>JourNo</th>
                           <th>Project No</th>
                           <th>Amount</th>
                           <th>Note</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($journal as $data)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{date('d-m-Y', strtotime($data->journals->date))}}</td>
                           <td>{{$data->journals->journal_no}}</td>
                           @if($data->project !=null)
                           <td>{{$data->journals->projects->name}}</td>
                           @else
                           <td></td>
                           @endif
                           <td><span>৳ </span> @php echo number_format("$data->debit_amount",2) @endphp</td>
                           <td>{{$data->ref}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple details-invoice" href="{{route('journallist-view-route',['id'=>$data->id])}}"><i class="fa fa-eye cat-child"></i></a>
                              <!--<a class="btn btn-flat bg-purple" href="#"><i class="fa fa-edit"></i></a>-->
                              <a class="btn btn-flat bg-purple" href="{{route('journallist-destroy-route',['id'=>$data->id])}}"><i class="fa fa-trash"></i></a>
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
                        <a href="{{route('journallist-create-route')}}" class="btn btn-flat bg-purple">Create Journal</a>
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
                     {{-- History show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
