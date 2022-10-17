@extends("layouts/admin/main")
@section("content")
@php
 $mhead='bank';
 $phead='alltran';
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
                        <a href="{{route('banktransactionlist-view-route',['id'=>$lists->trans_no])}}">
                           @if($lists->trans_no==$data->trans_no)
                           <li class="invpiv active" >
                           @else
                           <li class="invpiv" >
                           @endif
                              <p><strong class="pino">{{$lists->trans_no}}</strong><br><br><strong>{{date('d-m-Y', strtotime($lists->date))}}</strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳ @php echo number_format("$lists->amount",2) @endphp</strong></div>
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
                                       <img src="{{asset('public/frontend/img/no_logo_1589308197.png')}}" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>Axes Business Automation</h4>
                                       <p>Banasree Staff Quarter Road, Nagdarpar (Police Box), Khilgaon, Dhaka - 1219<br><strong>Phone:</strong> 7217831<br><strong>Mobile:</strong> 01616170070<br><strong>Email:</strong> axes@gmail.com<br><strong>Web:</strong> http://www.axesgl.com</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($data->trans_no, 'C39')}}" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Transaction N°:</strong> {{$data->trans_no}}
                                       <br><strong>Date:</strong>{{date('d-m-Y', strtotime($data->date))}}
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">TRANSACTION RECORD</h3>
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
                                    <tr>
                                        <td class="text-md-center" rowspan="2">{{$i++}}</td>
                                        <td class="text-md-left">{{$detail->deposit_to}}</td>
                                        <td class="text-md-right">@php echo number_format("$detail->amount",2) @endphp</td>
                                        <td class="text-md-right">0.00</td>
                                        <td class="text-md-left" rowspan="2">{{$detail->ref}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-md-left">{{$detail->deposit_from}}</td>
                                        <td class="text-md-right">0.00</td>
                                        <td class="text-md-right">@php echo number_format("$detail->amount",2) @endphp</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <td colspan="2" style="font-weight: bold;text-align:center;">-Total-</td>
                                <td style="text-align:right;">@php echo number_format("$data->amount",2) @endphp</td>
                                <td style="text-align:right;">@php echo number_format("$data->amount",2) @endphp</td>
                                <td></td>
                                </tr>
                                <tr>
                                <td colspan="5"><span style="font-weight: bold;">In Word:</span>{{ NumConvert::word($data->amount)}} Taka Only</td>
                                </tr>

                                </tfoot>
                                </table>
                                </div>
                                </div>

                              <div style="clear: both;"></div>
                              <div class="etat_footer">

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
