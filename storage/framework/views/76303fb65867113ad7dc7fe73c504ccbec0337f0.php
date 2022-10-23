<style media="all" type="text/css">
    @font-face {
      font-family: 'WebFont-Open Sans';
      src: local(Open Sans), url(https://fonts.gstatic.com/s/opensans/v14/K88pR3goAWT7BTt32Z01m4X0hVgzZQUfRDuZrPvH3D8.woff2);
    }
  
    .pcs-template {
        font-family: Open Sans, 'WebFont-Open Sans';
      font-size: 9pt;
      color: #333333;
        background:  #ffffff ;
    }
  
    .pcs-header-content {
      font-size: 9pt;
      color: #333333;
      background-color: #ffffff;
    }
    .pcs-template-body {
        padding: 0 0.400000in 0 0.550000in;
    }
    .pcs-template-footer {
        height: 0.700000in;
      font-size: 6pt;
      color: #aaaaaa;
      padding: 0 0.400000in 0 0.550000in;
      background-color: #ffffff;
    }
    .pcs-footer-content {
    word-wrap: break-word;
    color: #aaaaaa;
        border-top: 1px solid #adadad;
    }
  
    .pcs-label {
      color: #333333;
    }
    .pcs-entity-title {
      font-size: 16pt;
      color: #000000;
    }
    .pcs-orgname {
      font-size: 10pt;
      color: #333333;
    }
    .pcs-customer-name {
      font-size: 9pt;
      color: #333333;
    }
   .pcs-itemtable-header {
      font-size: 9pt;
      color: #ffffff;
      background-color: #3c3d3a;
    }
    .pcs-itemtable-breakword {
      word-wrap: break-word;
    }
    .pcs-taxtable-header {
      font-size: 9pt;
      color: #ffffff;
      background-color: #3c3d3a;
    }
    .breakrow-inside {
      page-break-inside: avoid;
    }
    .breakrow-after {
      page-break-after:auto;
    }
    .pcs-item-row {
      font-size: 9pt;
      border-bottom: 1px solid #adadad;
      background-color: #ffffff;
      color: #000000;
    }
    .pcs-item-sku {
      margin-top: 2px;
        font-size: 10px;
        color: #444444;
    }
    .pcs-item-desc {
        color: #727272;
        font-size: 9pt;
     }
    .pcs-balance {
      background-color: #f5f4f3;
      font-size: 9pt;
      color: #000000;
    }
    .pcs-totals {
      font-size: 9pt;
      color: #000000;
      background-color: #ffffff;
    }
    .pcs-notes {
      font-size: 8pt;
    }
    .pcs-terms {
      font-size: 8pt;
    }
    .pcs-header-first {
      background-color: #ffffff;
      font-size: 9pt;
      color: #333333;
        height: auto;
      }
  
   .pcs-status {
       color: ;
      font-size: 15pt;
      border: 3px solid ;
      padding: 3px 8px;
   }
   .billto-section {
       padding-top: 0mm;
       padding-left: 0mm;
     }
     .shipto-section {
       padding-top: 0mm;
       padding-left: 0mm;
     }
  
   @page  :first {
       @top-center {
          content: element(header);
      }
      margin-top: 0.700000in;
    }
  
    .pcs-template-header {
      padding: 0 0.400000in 0 0.550000in;
      height: 0.700000in;
    }
  
    .pcs-template-fill-emptydiv {
      display: table-cell;
      content: " ";
      width: 100%;
    }
  
  
  /* Additional styles for RTL compat */
  
  /* Helper Classes */
  
  .inline {
    display: inline-block;
  }
  .v-top {
    vertical-align: top;
  }
  .text-align-right {
    text-align: right;
  }
  .rtl .text-align-right {
    text-align: left;
  }
  .text-align-left {
    text-align: left;
  }
  .rtl .text-align-left {
    text-align: right;
  }
  
  /* Helper Classes End */
  
  .item-details-inline {
    display: inline-block;
    margin: 0 10px;
    vertical-align: top;
    max-width: 70%;
  }
  
  .total-in-words-container {
    width: 100%;
    margin-top: 10px;
  }
  .total-in-words-label {
    vertical-align: top;
    padding: 0 10px;
  }
  .total-in-words-value {
    width: 170px;
  }
  .total-section-label {
    padding: 5px 10px 5px 0;
    vertical-align: middle;
  }
  .total-section-value {
    width: 120px;
    vertical-align: middle;
    padding: 10px 10px 10px 5px;
  }
  .rtl .total-section-value {
    padding: 10px 5px 10px 10px;
  }
  
  .tax-summary-description {
    color: #727272;
    font-size: 8pt;
  }
  
  .bharatqr-bg {
    background-color: #f4f3f8;
  }
  
  /* Overrides/Patches for RTL compat */
    .rtl th {
      text-align: inherit; /* Specifically setting th as inherit for supporting RTL */
    }
  /* Overrides/Patches End */
  
  
  /* Subject field styles */
  .subject-block {
      margin-top: 20px;
  }
  .subject-block-value {
      word-wrap: break-word;
      white-space: pre-wrap;
      line-height: 14pt;
      margin-top:5px;
  }
  /* Subject field styles End*/
  </style>
  <style>
      .trclass_evenrow { background-color:#f6f5f5; }
      .trclass_oddrow { background-color: #ffffff; }
  
      table {
        -fs-table-paginate: paginate;
      }
      .title-section {
        float: right;
        margin-top:20px;
      }
      .rtl .title-section {
        float: left;
      }
      .pcs-itemtable-header {
        padding: 4px 4px;
      }
      .summary-section {
        float: right;
      }
      .rtl .summary-section {
        float: left;
      }
      .box-padding {
        padding:8px 4px;
      }
      </style><?php /**PATH /home/falconso/public_html/resources/views/main/admin/report/reportstylestate.blade.php ENDPATH**/ ?>