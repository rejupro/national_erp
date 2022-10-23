@extends("layouts/admin/main")
@section("content")
@php
 $mhead='account';
 $phead='jourl';
@endphp
<section class="side-cont">
   @include('layouts.admin.print_head')
   <div class="box box-solid">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-3">
                  <div id="test-list" class="notebooks">
                     <input type="text" class="search">
                     <ul class="list" id="listitem">
                        @foreach ($list as $lists)
                        <a href="{{route('journallist-view-route',['id'=>$lists->id])}}">
                           @if($lists->journal_no==$data->journal_no)
                           <li class="invpiv active" >
                           @else
                           <li class="invpiv" >
                           @endif
                              <p><strong class="pino">{{$lists->journal_no}}</strong><br><br><strong>{{date('d-m-Y', strtotime($lists->date))}}</strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳@php echo number_format("$lists->total",2) @endphp</strong></div>
                           </li>
                        </a>
                        @endforeach
                     </ul>
                     <div class="whole">
                        <span>
                       <a class="pagination-prev disabled" href="#">
                           &lt;&lt;
                           </a>
                           <ul class="pagination-layout">
                              <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                           </ul>
                           <a class="pagination-next" href="#">
                           &gt;&gt;
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="invhold scrol-y" id="invhold">
                      @include('layouts.admin.print_head2')
                        <div class="wrapper" style="width: 407.726px; height: 574.703px; overflow: hidden;">
                           <div id="wrap_invoice" class="page A4 portrait" style="transform: scale(0.51); transform-origin: 10px 0px 0px;">
                              <div class="invoice_header etat_header">
                                 <div class="row model1">
                                    <div class="col-xs-3 invoice-logo">
                                       <img src="{{asset(companyData()->image)}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>{{ companyData()->name }}</h4>
                                       <p>{{ companyData()->address }}<br><strong>Phone:</strong>{{ companyData()->phone }}<br><strong>Mobile:</strong> {{ companyData()->mobile }}<br><strong>Email:</strong> {{ companyData()->email }}<br><strong>Web:</strong> {{ companyData()->web }}</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->journal_no, 'C39')}}" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Journal N°:</strong> {{$data->journal_no}}
                                       <br><strong>Date:</strong>{{date('d-m-Y', strtotime($data->date))}} 
                                       @if($data->project_id!=null)<br><strong>Project Code:</strong> {{$project->project_id}}@endif
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">JOURNAL VOUCHER</h3>
                              </center>
                              <div class="etat_content">
                                    <div class="page_split">
                                        <hr>
                                        <br>
                                        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                          <thead>
                                          <tr>
                                          <th style="width:5% !important;">N°</th>
                                          <th style="width:35% !important;">Head of Accounts</th>
                                          <th style="width:15% !important;">Debit</th>
                                          <th style="width:15% !important;">Credit</th>
                                          <th style="width:30% !important;">Remarks</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                             @php
                                             $i=1;
                                             @endphp
                                             @foreach ($details as $detail)
                                             @php
                                             $dfirst = filter_var($detail->debit_ledger_id, FILTER_SANITIZE_NUMBER_INT);
                                             $did = preg_replace("/[^[:alnum:][:space:]]/u", '', $dfirst);
                                             $dsecond=filter_var($detail->debit_ledger_id, FILTER_SANITIZE_STRING);
                                             $dtype = preg_replace("/[^A-Za-z\-]/",'', $dsecond);

                                             $cfirst = filter_var($detail->credit_ledger_id, FILTER_SANITIZE_NUMBER_INT);
                                             $cid = preg_replace("/[^[:alnum:][:space:]]/u", '', $cfirst);
                                             $csecond=filter_var($detail->credit_ledger_id, FILTER_SANITIZE_STRING);
                                             $ctype = preg_replace("/[^A-Za-z\-]/",'', $csecond);

                                          //dd($id);
                                          if($dtype == 'SU'){
                                             $sname=DB::table('suppliers')->where('id', $did)->first();
                                             $dname=$sname->name;
                                          }
                                          if($dtype == 'PO'){
                                             $sname=DB::table('products')->where('id', $did)->first();
                                             $dname=$sname->name;
                                          }

                                          if($dtype == 'CU'){
                                             $sname=DB::table('customers')->where('id', $did)->first(); 
                                             $dname=$sname->name;
                                          }
                                          if($dtype == 'LD'){
                                             $sname=DB::table('ledgers')->where('id', $did)->first(); 
                                             $dname=$sname->name;
                                          }
                                          if($dtype == 'BA'){
                                             $sname=DB::table('bankaccounts')->where('id', $did)->first(); 
                                             $dname=$sname->acc_no;
                                          }
                                          if($dtype == 'MA'){
                                             $sname=DB::table('mobileaccounts')->where('id', $did)->first(); 
                                             $dname=$sname->name;
                                          }

                                          if($ctype == 'SU'){
                                             $sname=DB::table('suppliers')->where('id', $cid)->first();
                                             $cname=$sname->name;
                                          }
                                          if($ctype == 'PO'){
                                             $sname=DB::table('products')->where('id', $cid)->first();
                                             $cname=$sname->name;
                                          }

                                          if($ctype == 'CU'){
                                             $sname=DB::table('customers')->where('id', $cid)->first(); 
                                             $cname=$sname->name;
                                          }
                                          if($ctype == 'LD'){
                                             $sname=DB::table('ledgers')->where('id', $cid)->first(); 
                                             $cname=$sname->name;
                                          }
                                          if($ctype == 'BA'){
                                             $sname=DB::table('bankaccounts')->where('id', $cid)->first(); 
                                             $cname=$sname->acc_no;
                                          }
                                          if($ctype == 'MA'){
                                             $sname=DB::table('mobileaccounts')->where('id', $cid)->first(); 
                                             $cname=$sname->name;
                                          }
                                          @endphp
                                                <tr>
                                                   <td class="text-md-center" rowspan="2">{{$i++}}</td>
                                                   <td class="text-md-left">{{$dname}}</td>    
                                                   <td class="text-md-right">@php echo number_format("$detail->debit_amount",2) @endphp</td> 
                                                   <td class="text-md-right">0.00</td>     
                                                   <td class="text-md-left" rowspan="2"></td>   
                                                </tr>
                                                <tr>
                                                   <td class="text-md-left">{{$cname}}</td>
                                                   <td class="text-md-right">0.00</td>     
                                                   <td class="text-md-right">@php echo number_format("$detail->debit_amount",2) @endphp</td>   
                                                </tr>  
                                             @endforeach  
                                                  
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                          <td colspan="2" style="font-weight: bold;text-align:center;">-Total-</td>
                                          <td style="text-align:right;">@php echo number_format("$data->total",2) @endphp</td>
                                          <td style="text-align:right;">@php echo number_format("$data->total",2) @endphp</td>    
                                          <td></td>
                                          </tr>
                                          <tr>
                                             <td id="word_translate" colspan="5"><span style="font-weight: bold;">In Word:</span>{{ NumConvert::word($data->total)}} taka only</td>
                                         </tr>
                                         <tr>
                                             <td colspan="5"><span style="font-weight: bold;">Note:{{$data->narration}} </span></td>
                                         </tr>
                                          </tfoot>    
                                          </table>
                                    </div>
                                </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Received By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Prepared By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Checked By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Approved By</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div style="clear: both;"></div>
                                </div>
                              <div class="invoice_footer">
                                 <hr>
                                 <p style="margin-top: -5px;">Axes Business Automation. © 2021</p>
                              </div>
                              <div style="clear: both;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
