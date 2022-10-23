@extends("layouts/admin/main")
@section("content")

@php
$mhead='project';
$phead='prr';
$menuh='Report';
$page='Attendance Report';
$ractive='B';
$print='print';
$dtnow = date("Y-m-d h:i:s", time());
$today = strftime("%Y-%m-%d", time());
$oavno='REP'.date("dmy", strtotime($today)).'EMATDN';
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
                        <li class="invpiv active" id="pi_64">
                           <p><strong class="pino">{{$projects->project_id}}</strong><br><strong class="name">{{$projects->name}}</strong><br><strong>{{$projects->status}}</strong></p>
                           <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>
                               Value:  </strong><br><strong>৳ {{$projects->prjamount}}</strong></div>
                        </li>
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
                                   <div class="col-xs-5 invoice-header-info" id="adheight">
                                       <h4>{{ companyData()->name }}</h4>
                                       <p>{{ companyData()->address }}<br><strong>Phone:</strong>{{ companyData()->phone }}<br><strong>Mobile:</strong> {{ companyData()->mobile }}<br><strong>Email:</strong> {{ companyData()->email }}<br><strong>Web:</strong> {{ companyData()->web }}</p>
                                   </div>
                                  <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                    <img src = 'data:image/png;base64,{{DNS1D::getBarcodePNG($oavno, 'C39')}}' style='margin-right: -10px;padding-bottom: 5px;'/>
                                    <br><strong>Ref N°:</strong>{{$oavno }}
                                    <br><strong>Date:</strong> {{ $today }}   
                                  </div>
                               </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">Project Record Incoice</h3>
                              </center>
                              <div class="etat_content">
                                 <div class="page_split">
                                    <hr>
                                    <div class="row-cols row">
                                       <div class="clearfix"></div>
                                    </div>
                                    <br>
                                    <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                       <thead>
                                          <tr>
                                             <th style="width:5% !important;">N°</th>
                                             <th style="width:32.5% !important;">Description(Code)</th>
                                             <th style="width:12.5% !important;">Project Value</th>
                                             <th style="width:10% !important;">Department/Client</th>
                                             <th style="width:17.5% !important;">Target Expense</th>
                                             <th style="width:22.5% !important;">Contact Amount</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                       {{-- @foreach ($projects as $data) --}}
                                           
                                          <tr>
                                             <td class="text-md-center">{{$i++}}</td>
                                             <td class="text-md-left">{{$projects->project_id}}</td>
                                             <td class="text-md-right">{{$projects->prjamount}}</td>
                                             <td class="text-md-center">{{$projects->customer->name}}</td>
                                             <td class="text-md-center">{{$projects->prjexamount}}</td>
                                             <td class="text-md-right">{{$projects->coamount}}</td>
                                          </tr>
                                       {{-- @endforeach       --}}
                                          <!-- <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Discount Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">8888</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Vat Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">9999</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Tax Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">666</td>
                                          </tr> -->
                                          <tr>
                                             <td colspan="2"></td>
                                             {{-- <td colspan="2" class="text-md-right font-weight-bold">Grand Total</td> --}}
                                             {{-- <td colspan="2" class="text-md-right font-weight-bold text-nowrap"></td> --}}
                                          </tr>
                                          <p>
                                            <b>Amount in words:
                                            </b>
                                            <span style="text-transform: uppercase;">
                                            {{NumConvert::word($projects->coamount)}}
                                            <b>Taka</b> Only.</span>
                                         </p>
                                          
                                       </tbody>
                                    </table>
                                    <!-- AMOUNT IN WORDS -->
                                    <p>
                                    </p>
                                 </div>
                              </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                 <div class="row">
                                    <div class="col-xs-4 col-xs-offset-8">
                                       <p>&nbsp;</p>
                                       <p>&nbsp;</p>
                                       <p style="border-bottom: 1px solid #666;">&nbsp;</p>
                                       <p class="text-md-center">Authorized Singnature</p>
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