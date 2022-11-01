<div class="side-head">
    <div class="row">
       <div class="col-md-12">
          <div class="col-md-4 text-left">
             <button class="btn btn-flat bg-teal" id="print"><i class="fa fa-print"></i></button>
             <button class="btn btn-flat bg-blue"><i class="fa fa-envelope-o"></i></button>
             <button class="btn btn-flat bg-gray"><i class="fa fa-file-pdf-o"></i></button>
          </div>
          <div class="col-md-7 text-center">
             <select name="Page_resolution" id="resolution" onchange="setPrinterConfig()" style="width: 205px;height: 28px;border: 1px solid red;">
                <option value="A4" selected="selected">A4 [210mm × 297mm]</option>
                <option value="A5">A5 [148mm × 210mm]</option>
                <option value="Letter">US Letter [216mm × 279mm]</option>
                <option value="Legal">US Legal [216mm × 356mm]</option>
             </select>
             <select name="Page_size" id="rotate" onchange="setPrinterConfig()" style="width: 120px;height: 28px;border: 1px solid red;">
                <option value="portrait">Portrait</option>
                <option value="landscape">Landscape</option>
             </select>
             <select id="prtype" onchange="callPrintType()" style="width: 140px;height: 28px;border: 1px solid red;">
                <option value="invonly">Invoice Only</option>
                <option value="chaonly">Challan</option>
                <option value="chainv">Invoice With Challan</option>
                <option value="padonly">Pad Print</option>
                <option value="padcha">Pad Print (Challan)</option>
                <option value="padchainv">Invoice &amp; Challan (Pad)</option>
                <option value="fkinv">Alternate Invoice</option>
             </select>
          </div>
          <div class="col-md-1 text-right">
             <a href='<?php echo e(url()->previous()); ?>'><button class="btn btn-flat bg-red" id="closepop"><span><i class="fa fa-times"></i></span></button></a>
          </div>
       </div>
    </div>
 </div><?php /**PATH C:\xampp\htdocs\national2\resources\views/layouts/admin/print_head.blade.php ENDPATH**/ ?>