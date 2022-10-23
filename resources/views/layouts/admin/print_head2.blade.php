<div class="printableArea">
    <style>
       html, body {
       height: 100%;
       }
       body {
       background: #dfdfdf;
       }
       .fixed-top {
       position: fixed;
       top: 0;
       right: 0;
       left: 0;
       padding: 0 20px;
       background: white;
       margin: 0;
       z-index: 10;
       }
       .font-weight-bold {
       font-weight: 700 !important;
       }
    </style>
    <style>
       body{
       -webkit-print-color-adjust:exact;
       print-color-adjust:exact;
       }
       @page {
       size: 21cm 29.7cm
       }
       @page {
       margin: 0;
       padding: 0;
       margin-left: 0px;
       margin-right: 0px;
       margin-top: 0px;
       margin-bottom: 0px;
       }
       #wrap_invoice {
       background: white;
       padding: 0.5cm;
       margin: 2mm auto;
       border: 1px #D3D3D3 solid;
       border-radius: 5px;
       box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
       position: relative;
       overflow: hidden;
       }
       #wrap_invoice,
       .text-color{
       color: #555;
       }
       #wrap_invoice .page{
       background: white;
       font-family: sans-serif;
       page-break-after: always;
       }
       #wrap_invoice .page:last-child {
       page-break-after: avoid;
       }
       #wrap_invoice h3{
       font-size: 24px;
       font-weight: bold;
       color: #3785B1;
       }
       #wrap_invoice h4{
       font-size: 15px;
       font-weight: bold;
       color: #3785B1;
       }
       #wrap_invoice p{
       font-size: 12px;
       }
       .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
       float: left;
       }
       .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
       position: relative;
       min-height: 1px;
       padding-left: 0.9375rem;
       padding-right: 0.9375rem;
       }
       .col-xs-pull-0 {
       right: auto; }
       .col-xs-pull-1 {
       right: 8.33333%; }
       .col-xs-pull-2 {
       right: 16.66667%; }
       .col-xs-pull-3 {
       right: 25%; }
       .col-xs-pull-4 {
       right: 33.33333%; }
       .col-xs-pull-5 {
       right: 41.66667%; }
       .col-xs-pull-6 {
       right: 50%; }
       .col-xs-pull-7 {
       right: 58.33333%; }
       .col-xs-pull-8 {
       right: 66.66667%; }
       .col-xs-pull-9 {
       right: 75%; }
       .col-xs-pull-10 {
       right: 83.33333%; }
       .col-xs-pull-11 {
       right: 91.66667%; }
       .col-xs-pull-12 {
       right: 100%; }
       .col-xs-push-0 {
       left: auto; }
       .col-xs-push-1 {
       left: 8.33333%; }
       .col-xs-push-2 {
       left: 16.66667%; }
       .col-xs-push-3 {
       left: 25%; }
       .col-xs-push-4 {
       left: 33.33333%; }
       .col-xs-push-5 {
       left: 41.66667%; }
       .col-xs-push-6 {
       left: 50%; }
       .col-xs-push-7 {
       left: 58.33333%; }
       .col-xs-push-8 {
       left: 66.66667%; }
       .col-xs-push-9 {
       left: 75%; }
       .col-xs-push-10 {
       left: 83.33333%; }
       .col-xs-push-11 {
       left: 91.66667%; }
       .col-xs-push-12 {
       left: 100%; }
       .col-xs-offset-0 {
       margin-left: 0%; }
       .col-xs-offset-1 {
       margin-left: 8.33333%; }
       .col-xs-offset-2 {
       margin-left: 16.66667%; }
       .col-xs-offset-3 {
       margin-left: 25%; }
       .col-xs-offset-4 {
       margin-left: 33.33333%; }
       .col-xs-offset-5 {
       margin-left: 41.66667%; }
       .col-xs-offset-6 {
       margin-left: 50%; }
       .col-xs-offset-7 {
       margin-left: 58.33333%; }
       .col-xs-offset-8 {
       margin-left: 66.66667%; }
       .col-xs-offset-9 {
       margin-left: 75%; }
       .col-xs-offset-10 {
       margin-left: 83.33333%; }
       .col-xs-offset-11 {
       margin-left: 91.66667%; }
       .col-xs-offset-12 {
       margin-left: 100%; }
       .row.row-equal [class*="col-"] {
       padding-right: 0.46875rem;
       padding-left: 0.46875rem;
       }
       .row.row-equal {
       padding-right: 0.46875rem;
       padding-left: 0.46875rem;
       margin-right: -0.9375rem;
       margin-left: -0.9375rem;
       }
       .invoice_status {
       display: block;
       width: 250px;
       background: gray;
       text-align: center;
       color: white;
       text-transform: uppercase;
       padding: 5px 10px;
       font-weight: bold;
       transform: rotate(45deg);
       -webkit-transform: rotate(45deg);
       -moz-transform: rotate(45deg);
       position: absolute;
       right: -70px;
       top: 40px;
       }
       .table_invoice{
       border-radius: 0px;
       font-size: 12px;
       width: 100% !important;
       }
       .table_invoice thead th{
       vertical-align: middle;
       text-align:center;
       padding: 5px 0;
       }
       .table_invoice th, .table_invoice td {
       padding: 2px 8px;
       border-radius: 0px !important;
       width: inherit !important;
       }
       .table_invoice tfoot{
       display: table-footer-group;
       }
       .A5 .table_invoice *{
       font-size: 10px !important;
       }
       .A5 .table_invoice th, .A5 .table_invoice td {
       line-height: 14px;
       padding: 3px 0;
       }
       .A5 p{
       font-size: 10px !important;
       margin: 0;
       }
       #wrap_invoice.A5 .inv{
       font-size: 10px !important;
       }
       .A5 .invoice-logo-center,
       .A5 .invoice-logo{
       height: 80px;
       line-height: 80px;
       }
       #wrap_invoice.A5 .A4_info{
       display: none;
       }
       #wrap_invoice hr{
       display:block;
       border-top-color: #dfdfdf;
       margin:10px 0;
       }
       #wrap_invoice .inv{
       vertical-align: middle;
       font-size: 12px;
       }
       #wrap_invoice .inv.col{
       line-height: 25px;
       margin: 10px 0 0 0;
       font-weight: normal;
       }
       #wrap_invoice .inv.col b{
       color: #363636;
       }
       #wrap_invoice .page-title{
       font-size: 18px;
       font-weight: bold;
       color: #3785B1 !important;
       margin: 10px auto 10px;
       line-height: 24px;
       }
       #wrap_invoice .pagging{
       position: absolute;
       right: 10px;
       bottom: 10px;
       padding: 0 10px;
       font-size: 9px;
       font-weight: bold;
       }
       #wrap_invoice,
       #wrap_invoice.portrait{
       width: 21cm;
       max-width: 21cm;
       min-height: 29.6cm;
       }
       #wrap_invoice.landscape{
       width: 29.7cm;
       max-width: 29.7cm;
       min-height: 20.9cm;
       }
       #wrap_invoice.A5,
       #wrap_invoice.A5.portrait{
       width: 14.85cm;
       max-width: 14.85cm;
       min-height: 20.9cm;
       }
       #wrap_invoice.A5.landscape{
       width: 21cm;
       max-width: 21cm;
       min-height: 14.75cm;
       }
       #wrap_invoice.Letter,
       #wrap_invoice.Letter.portrait{
       width: 21.6cm;
       max-width: 21.6cm;
       min-height: 27.8cm;
       }
       #wrap_invoice.Letter.landscape{
       width: 27.9cm;
       max-width: 27.9cm;
       min-height: 21.5cm;
       }
       #wrap_invoice.Legal,
       #wrap_invoice.Legal.portrait{
       width: 21.6cm;
       max-width: 21.6cm;
       min-height: 35.5cm;
       }
       #wrap_invoice.Legal.landscape{
       width: 35.6cm;
       max-width: 35.6cm;
       min-height: 21.5cm;
       }
       #wrap_invoice .text-bold{
       font-weight: bold;
       }
       #wrap_invoice .float-none{
       float: none !important;
       }
       #wrap_invoice .float-left{
       float: left !important;
       }
       #wrap_invoice .float-right{
       float: right !important;
       }
       #wrap_invoice .bordered{
       border: 1px solid #E0E0E0;
       }
       #wrap_invoice .overflow-hidden{
       overflow: hidden;
       }
       #wrap_invoice input.trans {
       width: inherit;
       margin: 0px;
       font-size: inherit;
       border: none;
       background: none;
       text-align: center;
       padding: 2px 8px;
       }
       .invoice_header .invoice-logo{
       height: 120px;
       line-height: 120px;
       text-align: center;
       }
       .invoice_header .invoice-logo-center{
       height: 90px;
       line-height: 90px;
       text-align: center;
       }
       .invoice_header .invoice-logo img{
       margin: auto !important;
       }
       .invoice_header .invoice-header-invoice{
       padding:10px;
       font-size:12px;
       text-align:right;
       min-height: 120px;
       }
       .invoice_header .model1 .invoice-header-invoice{
       border-left: 3px solid #dfdfdf;
       }
       .invoice_header .invoice-header-info{
       padding:10px;
       font-size:12px;
       min-height: 120px;
       }
       .invoice_header .model1 .invoice-logo{
       min-width: 120px;
       max-width: 240px;
       }
       .invoice_header .model1 .invoice-header-info{
       border-left: 3px solid #dfdfdf;
       }
       .invoice_header .model2 .invoice-header-info{
       border-right: 3px solid #dfdfdf;
       }
       .invoice_header .model2 .invoice-logo{
       text-align: center;
       }
       .invoice_header .model3{
       text-align: center;
       }
       .invoice_header .model3 .invoice-header-info{
       height: inherit;
       }
       .A5.portrait .invoice-header-info{
       max-width:310px;
       }
       .invoice_header .model3 .invoice-logo{
       height: 60px;
       width: inherit;
       line-height: 60px;
       margin: 10px 0 0 0;
       }
       .invoice_header .model4 .invoice-logo,
       .invoice_header .model3 .invoice-logo{
       max-width: inherit;
       }
       .invoice_header .model3 .invoice-logo img{
       height: inherit;
       }
       .invoice_header .model4{
       text-align: center;
       }
       .invoice_header .model4 .invoice-logo{
       height: 60px;
       width: inherit;
       line-height: 60px;
       margin: 30px 0;
       }
       .invoice_header .model4 .invoice-logo img{
       height: inherit;
       }
       .invoice_header{
       background: white;
       color: black;
       }
       .invoice_footer{
       text-align: center;
       font-size: 10px;
       position: absolute;
       left: 0;
       right: 0;
       bottom: 20px;
       }
       table {
       background-color: transparent;
       }
       th {
       text-align: left;
       }
       .table_invoice {
       width: 100%;
       max-width: 100%;
       margin-bottom: 20px;
       }
       .table_invoice > thead > tr > th,
       .table_invoice > tbody > tr > th,
       .table_invoice > tfoot > tr > th,
       .table_invoice > thead > tr > td,
       .table_invoice > tbody > tr > td,
       .table_invoice > tfoot > tr > td {
       padding: 8px;
       line-height: 1.42857143;
       vertical-align: center;
       border-top: 1px solid #dddddd;
       }
       .table_invoice > thead > tr > th {
       vertical-align: middle;
       border-bottom: 2px solid #dddddd;
       }
       .table_invoice > tfoot > tr > th,
       .table_invoice > tfoot > tr > td{
       border-top: 2px solid #aaaaaa;
       }
       .table_invoice > caption + thead > tr:first-child > th,
       .table_invoice > colgroup + thead > tr:first-child > th,
       .table_invoice > thead:first-child > tr:first-child > th,
       .table_invoice > caption + thead > tr:first-child > td,
       .table_invoice > colgroup + thead > tr:first-child > td,
       .table_invoice > thead:first-child > tr:first-child > td {
       border-top: 0;
       }
       .table_invoice > tbody + tbody {
       border-top: 2px solid #dddddd;
       }
       .table_invoice .table_invoice {
       background-color: #ffffff;
       }
       .table_invoice-condensed > thead > tr > th,
       .table_invoice-condensed > tbody > tr > th,
       .table_invoice-condensed > tfoot > tr > th,
       .table_invoice-condensed > thead > tr > td,
       .table_invoice-condensed > tbody > tr > td,
       .table_invoice-condensed > tfoot > tr > td {
       padding: 0 5px;
       }
       .table_invoice-bordered {
       border: 1px solid #dddddd;
       }
       .table_invoice-bordered > thead > tr > th,
       .table_invoice-bordered > tbody > tr > th,
       .table_invoice-bordered > tfoot > tr > th,
       .table_invoice-bordered > thead > tr > td,
       .table_invoice-bordered > tbody > tr > td,
       .table_invoice-bordered > tfoot > tr > td {
       border: 1px solid #dddddd;
       }
       .table_invoice-bordered > thead > tr > th,
       .table_invoice-bordered > thead > tr > td {
       border-bottom-width: 2px;
       }
       .table_invoice-striped > tbody > tr:nth-child(odd) > td,
       .table_invoice-striped > tbody > tr:nth-child(odd) > th {
       background-color: #f9f9f9;
       }
       table col[class*="col-"] {
       position: static;
       float: none;
       display: table-column;
       }
       table td[class*="col-"],
       table th[class*="col-"] {
       position: static;
       float: none;
       display: table-cell;
       }
       .table_invoice > thead > tr > td.active,
       .table_invoice > tbody > tr > td.active,
       .table_invoice > tfoot > tr > td.active,
       .table_invoice > thead > tr > th.active,
       .table_invoice > tbody > tr > th.active,
       .table_invoice > tfoot > tr > th.active,
       .table_invoice > thead > tr.active > td,
       .table_invoice > tbody > tr.active > td,
       .table_invoice > tfoot > tr.active > td,
       .table_invoice > thead > tr.active > th,
       .table_invoice > tbody > tr.active > th,
       .table_invoice > tfoot > tr.active > th {
       background-color: #f5f5f5;
       }
       .table_invoice > thead > tr > td.success,
       .table_invoice > tbody > tr > td.success,
       .table_invoice > tfoot > tr > td.success,
       .table_invoice > thead > tr > th.success,
       .table_invoice > tbody > tr > th.success,
       .table_invoice > tfoot > tr > th.success,
       .table_invoice > thead > tr.success > td,
       .table_invoice > tbody > tr.success > td,
       .table_invoice > tfoot > tr.success > td,
       .table_invoice > thead > tr.success > th,
       .table_invoice > tbody > tr.success > th,
       .table_invoice > tfoot > tr.success > th {
       background-color: #dff0d8;
       }
       .table_invoice > thead > tr > td.info,
       .table_invoice > tbody > tr > td.info,
       .table_invoice > tfoot > tr > td.info,
       .table_invoice > thead > tr > th.info,
       .table_invoice > tbody > tr > th.info,
       .table_invoice > tfoot > tr > th.info,
       .table_invoice > thead > tr.info > td,
       .table_invoice > tbody > tr.info > td,
       .table_invoice > tfoot > tr.info > td,
       .table_invoice > thead > tr.info > th,
       .table_invoice > tbody > tr.info > th,
       .table_invoice > tfoot > tr.info > th {
       background-color: #d9edf7;
       }
       .table_invoice > thead > tr > td.warning,
       .table_invoice > tbody > tr > td.warning,
       .table_invoice > tfoot > tr > td.warning,
       .table_invoice > thead > tr > th.warning,
       .table_invoice > tbody > tr > th.warning,
       .table_invoice > tfoot > tr > th.warning,
       .table_invoice > thead > tr.warning > td,
       .table_invoice > tbody > tr.warning > td,
       .table_invoice > tfoot > tr.warning > td,
       .table_invoice > thead > tr.warning > th,
       .table_invoice > tbody > tr.warning > th,
       .table_invoice > tfoot > tr.warning > th {
       background-color: #fcf8e3;
       }
       .table_invoice > thead > tr > td.danger,
       .table_invoice > tbody > tr > td.danger,
       .table_invoice > tfoot > tr > td.danger,
       .table_invoice > thead > tr > th.danger,
       .table_invoice > tbody > tr > th.danger,
       .table_invoice > tfoot > tr > th.danger,
       .table_invoice > thead > tr.danger > td,
       .table_invoice > tbody > tr.danger > td,
       .table_invoice > tfoot > tr.danger > td,
       .table_invoice > thead > tr.danger > th,
       .table_invoice > tbody > tr.danger > th,
       .table_invoice > tfoot > tr.danger > th {
       background-color: #f2dede;
       }
       .text-danger {
       color: #DD0703 !important;
       }
       a.text-danger:hover {
       color: #843534;
       }
       .vertical-middle{
       vertical-align: middle;
       }
       .control-label{
       width: 27%;
       display: inline-block;
       line-height: 20px;
       font-weight: bold;
       vertical-align: top;
       }
       .control-p{
       width: 65%;
       display: inline-block;
       line-height: 20px;
       }
       .col-sm-6 > .control-label{
       width: 42%;
       }
       .col-sm-6 > .control-p{
       width: 50%;
       }
       .column-border {
       border-right: 1px solid #ddd;
       }
       text[text-anchor="end"] {
       display:none;
       }
       .col-xs-offset-8 {
       margin-left: 66.66667%;
       }
       .demo_invoice{
       color: rgba(0,0,0,0.2);
       position: absolute;
       font-size: 9rem;
       top: 25%;
       left: 15%;
       transform: rotate(-45deg);
       }
       .clearfix::after {
       content: "";
       display: table;
       clear: both;
       }
       .text-md-center {
       text-align: center !important;
       }
       .text-md-left {
       text-align: left !important;
       }
       .text-md-right {
       text-align: right !important;
       }
       @media print {
       @page{
       size: A4;
       margin: 0.5cm;
       margin: 0cm;
       }
       #wrap_invoice {
       margin: 0;
       padding: 0.5cm;
       border: initial;
       border-radius: initial;
       box-shadow: initial;
       overflow: hidden;
       transform: inherit !important;
       -webkit-transform: inherit !important;
       transform-origin: inherit !important;
       -webkit-transform-origin: inherit !important;
       }
       #wrap_invoice {
       page-break-after: always;
       }
       #wrap_invoice:last-child {
       page-break-after: avoid;
       }
       #not-printed{
       display: none;
       }
       }
    </style>
    <div id="css_script">
       <style type="text/css" id="pageInit">@page{size: 21cm 29.7cm}</style>
       <style type="text/css">
          #wrap_invoice.page {
          font-family: Arial, Helvetica, sans-serif;
          background-color: #ffffff;
          padding: 0.5cm 0.5cm 0.5cm 0.5cm;
          z-index: 1;
          }
          #wrap_invoice::after {
          content: "";
          display: block;
          background-repeat: no-repeat;
          /*background-image: url(http://localhost/sis/storage/logo14.png);*/
          background-position: center center;
          background-size: initial;
          opacity: 0.4;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          position: absolute;
          z-index: -1;
          }
          #wrap_invoice h3 {
          color: #009be1;
          }
          #wrap_invoice h4 {
          color: #009be1;
          }
          .invoice_header .invoice-logo img {
          height: 100% !important;
          width: auto !important;
          max-width: 100%;
          }
          .A5 .invoice-logo img {
          height: auto !important;
          width: 100% !important;
          max-height: 100%;
          }
          #wrap_invoice,
          #wrap_invoice p,
          #wrap_invoice .text-color,
          #wrap_invoice .inv.col b,
          #wrap_invoice .table_invoice {
          font-size: 12px;
          color: #2e2e2e;
          }
          #wrap_invoice .table_invoice thead th {
          border: none;
          border-top: 1px solid red;
          border-left: 1px solid #dddddd;
          border-bottom: 1px solid black;
          line-height: 24px;
          height: 24px;
          }
          #wrap_invoice .table_invoice td {
          line-height: 23px;
          height: 23px;
          }
          #wrap_invoice .page-title {
          color: #009be1;
          text-align: center;
          }
          #wrap_invoice .invoice_header {
          background: #ffffff;
          color: #000000 !important;
          margin: -0.5cm -0.5cm 0 -0.5cm;
          padding: 0.5cm 0.5cm 0 0.5cm;
          }
          #wrap_invoice .invoice_header * {
          color: #000000 !important;
          margin: 0;
          }
          #wrap_invoice .invoice_footer,
          #wrap_invoice .invoice_footer p,
          #wrap_invoice .invoice_footer .pagging {
          background: #ffffff;
          color: #2e2e2e;
          }
       </style>
    </div>