@extends("layouts/admin/main")
@section("content")
@php
 $mhead='loan';
 $phead='loaninvlist';
@endphp
<section class="content-header">
   <h1>Loan Invoice</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan Invoice</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">Loan Invoice List</h3>
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
                   <table class="table table-bordered table-striped" >
                      <thead class="text-uppercase">
                         <tr>
                            <th style="width:40px;">SN</th>
                            <th>Invoice No</th>
                            <th>Loan ID</th>
                            <th>Amount</th>
                            <th>Profit Amount</th>
                            <th>Installment</th>
                            <th>Total</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             
                           @php $i=1; @endphp
                           @foreach ($loaninvoice as $data)
                              <tr>
                                 <td class="center">{{$i++}}</td>
                                 <td>{{$data->inv_no}}</td>
                                 <td>{{$data->loan_id}}</td>
                                 <td>@php echo number_format("$data->amount",2) @endphp</td>
                                 <td>@php echo number_format("$data->profit_amount",2) @endphp</td>
                                 <td>{{$data->installment}}</td>
                                 <td>@php echo number_format("$data->total",2) @endphp</td>
                                 <td nowrap="">
                                  {{-- <a class="btn btn-flat bg-purple" href="{{route('loaninvoice-edit-route',$data->id)}}"><i class="fa fa-edit"></i></a> --}}
                                   <a class="btn btn-flat bg-purple" href="{{route('loaninvoice-delete-route',$data->inv_no)}}"><i class="fa fa-trash"></i></a>
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
                         <a href="{{route('loaninvoice-create-route')}}" class="btn btn-flat bg-purple">Add Loan</a>
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