@extends("layouts/admin/main")
@section("content")
@php
 $mhead='loan';
 $phead='loaninvcreate';
@endphp
<section class="content-header">
   <h1>Loan Invoice Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Loan</a></li>
      <li class=""><a href="#">Loan Invoice Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Loan Invoice</h3>
            </div>
            <div class="box-body">
               {{-- Error mess show here  --}}
               <form action="{{route('loaninvoice-store-route')}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                @csrf
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Loan ID</label>
                                    <select class="form-control" name="loan_id" id="loan_id">
                                        <option selected>Choose Please.....</option>
                                        @foreach ($loanid as $loanids)
                                         <option value="{{$loanids->code}}">{{$loanids->code}}</option>
                                        @endforeach
                                     </select>
                                 </div>
                              </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>Loan Invoice No.</label>
                                      <input type="text" name="inv_no" maxlength="45" value="{{$loaninv_track}}"  id="inv_no" class="form-control"/>
                                   </div>
                                </div>
                            </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                     <label>Loan Amount</label>
                                     <input type="text" name="amount"  value="" id="amount" class="form-control"/>
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Profit Amount</label>
                                    <input type="text" name="profit_amount"  value="" id="profit_amount" value="0" onchange="count_grand_total()" class="form-control" placeholder="2000"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Profit %</label>
                                    <input type="text" name="profit_per"  value="" id="profit_per" value="0" onchange="count_grand_total()"  class="form-control" placeholder="10%"/>
                                 </div>
                              </div>
                           </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" name="total"  value="" id="total" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Installment</label>
                                     <input type="text" name="installment"  value="" id="installment" class="form-control"/>
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
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="{{route('loaninvoice-list-route')}}" class="btn btn-flat bg-gray  ">Close</a>
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


<script type="text/javascript">
   function count_grand_total(){
       var amount = $('#amount').val();
       var profit_per = $('#profit_per').val();
       var profit_amount = $('#profit_amount').val();

           if(profit_per>0){
               var with_discount = parseInt(amount) + (parseInt(amount) * parseInt(profit_per)/100);
               $('#profit_amount').hide();
               $('#total').val(with_discount);
               return false;
           }else{
               var with_amount = parseInt(amount) + parseInt(profit_amount);
               $('#profit_per').hide()
               $('#total').val(with_amount);
               return false;
           }

           return false;
         
   }
</script>


@endsection