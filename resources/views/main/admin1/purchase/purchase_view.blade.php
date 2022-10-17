@extends("layouts/admin/main")
@section("content")
@php
 $mhead='purchase';
 $phead='puri';
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

                        @foreach ($details as $detail)
                        <li class="invpiv active" id="pi_64">
                           <p><strong class="pino">{{$detail->purchase_track}}</strong><br><strong class="name">{{$detail->item_name}}</strong><br><strong>{{$detail->supplier_name}}</strong></p>
                           <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>P: ৳ @php echo number_format("$results->paid",2) @endphp</strong><br><strong>D: ৳ @php echo number_format("$results->balance",2) @endphp</strong></div>
                        </li>
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
                                       <img src="{{asset('public/frontend/img/no_logo_1589308197.png')}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>Axes Business Automation</h4>
                                       <p>Banasree Staff Quarter Road, Nagdarpar (Police Box), Khilgaon, Dhaka - 1219<br><strong>Phone:</strong> 7217831<br><strong>Mobile:</strong> 01616170070<br><strong>Email:</strong> axes@gmail.com<br><strong>Web:</strong> http://www.axesgl.com</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($detail->purchase_track, 'C39')}}" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Transaction N°:</strong> {{$detail->purchase_track}}
                                        <br><strong>Supplier Name:</strong> {{$detail->supplier_name}}
                                     </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">PURCHASE INVOICE</h3>
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
                                             <th style="width:52.5% !important;">Description(Code)</th>
                                             <th style="width:12.5% !important;">Price</th>
                                             <th style="width:10% !important;">Qty</th>
                                             <th style="width:7.5% !important;">Dis</th>
                                             <th style="width:12.5% !important;">Total</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach ($details as $detail)
                                          <tr>
                                             <td class="text-md-center">{{$i++}}</td>
                                             <td class="text-md-left">{{$detail->purchase_track}}</td>
                                             <td class="text-md-right">@php echo number_format("$detail->price",2) @endphp</td>
                                             <td class="text-md-center">{{$detail->quantity}}</td>
                                             <td class="text-md-center">@php echo number_format("$detail->discount",2) @endphp</td>
                                             <td class="text-md-right">@php echo number_format("$detail->total",2) @endphp</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Discount Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">@php echo number_format("$detail->discount_amount",2) @endphp</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Vat Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">@php echo number_format("$detail->vat_amount",2) @endphp</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Tax Amount</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">@php echo number_format("$detail->tax_amount",2) @endphp</td>
                                          </tr>
                                          <tr>
                                             <td colspan="2"></td>
                                             <td colspan="2" class="text-md-right font-weight-bold">Grand Total</td>
                                             <td colspan="2" class="text-md-right font-weight-bold text-nowrap">@php echo number_format("$detail->grand_total",2) @endphp</td>
                                          </tr>
                                          <p>
                                            <b>Amount in words:
                                            </b>
                                            <span style="text-transform: uppercase;">
                                            {{NumConvert::word($detail->grand_total)}}
                                            <b>Taka</b> Only.</span>
                                         </p>
                                          @endforeach
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
