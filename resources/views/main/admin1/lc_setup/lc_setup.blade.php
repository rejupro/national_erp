@extends("layouts/admin/main")
@section("content")
@php
 $mhead='lcsetup';
 $phead='lcsetupc';
@endphp
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
<section class="content-header">
   <h1>LC Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC Setup</a></li>
      <li class=""><a href="#">LC Setup</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add LC Information</h3>
            </div>
            <div class="box-body">
               {{-- Error mess show here  --}}
               <form action="{{route('lc-setup.insert')}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>LC NO</label>
                                      <input type="text" name="lc_no" maxlength="45" value="{{$lc_track}}" placeholder="LC-000001" id="lc_no" class="form-control"/>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Shipment date </label>
                                      <input type="date" name="ship_date"  value="{{ date('Y-m-d', strtotime(now())) }}" id="ship_date" class="form-control"/>
                                  </div>
                              </div>
                            </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>PI Code</label>
                                    <select class="form-control" name="pi_code" id="pi_code">
                                        <option selected>Choose Please.....</option>
                                        @foreach ($pi as $pis)
                                         <option value="{{$pis->pi_code}}">{{$pis->pi_code}}</option>
                                        @endforeach
                                     </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry date </label>
                                    <input type="date" name="exp_date"  value="{{ date('Y-m-d', strtotime(now())) }}" id="exp_date" class="form-control"/>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input type="text" name="s_name"  value="" id="s_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Local Bank</label>
                                        <select class="form-control" name="local_bank" id="local_bank">
                                            <option selected>Choose Please.....</option>
                                            @foreach ($bank as $banks)
                                             <option value="{{$banks->id}}">{{$banks->name}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Buyer name</label>
                                        <input type="text" name="b_name"  value="" id="b_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Beneficiary Bank</label>
                                        <select class="form-control" name="bene_bank" id="bene_bank">
                                            <option selected>Choose Please.....</option>
                                            @foreach ($bank as $banks)
                                             <option value="{{$banks->id}}">{{$banks->name}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" name="t_amount" maxlength="45" value="" id="t_amount" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" name="note"  value="" id="note" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped" id="user_table">
                                        <thead>
                                         <tr>
                                             <th>Item</th>
                                             <th>Oty</th>
                                             <th>Cost</th>
                                             <th>Price</th>
                                             <th>Action</th>
                                         </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                         <tr>
                                             <td colspan="2">Total</td>
                                             <td><input type="text" name="extra1" class="form-control" /></td>

                                         </tr>
                                        </tfoot>
                                     </table>
                                </div>
                            </div> --}}
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
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="{{route('list-lc-setup')}}" class="btn btn-flat bg-gray  ">Close</a>
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
                     <h3 class="box-title">History </h3>
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

<script>

$('#pi_code').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetails", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#t_amount').val(response.extra1);
                $('#s_name').val(response.supplier.name);
                $('#b_name').val(response.buyer.name);
            }
        }
    });
});


</script>


@endsection

