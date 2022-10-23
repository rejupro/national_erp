@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
    <h1>Invoice Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Invoice Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        
        <div class="row">
        <div class="col-md-7">
        <div class="box box-solid">
        <div class="box-body">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group text-center">
        <ul style="margin-top: 0;" class="pagination alphabets"><li><a data-id="" href="#"><b>ALL</b></a></li><li><a href="#" data-id="A"><b>A</b></a></li><li><a href="#" data-id="B"><b>B</b></a></li><li><a href="#" data-id="C"><b>C</b></a></li><li><a href="#" data-id="D"><b>D</b></a></li><li><a href="#" data-id="E"><b>E</b></a></li><li><a href="#" data-id="F"><b>F</b></a></li><li><a href="#" data-id="G"><b>G</b></a></li><li><a href="#" data-id="H"><b>H</b></a></li><li><a href="#" data-id="I"><b>I</b></a></li><li><a href="#" data-id="J"><b>J</b></a></li><li><a href="#" data-id="K"><b>K</b></a></li><li><a href="#" data-id="L"><b>L</b></a></li><li><a href="#" data-id="M"><b>M</b></a></li><li><a href="#" data-id="N"><b>N</b></a></li><li><a href="#" data-id="O"><b>O</b></a></li><li><a href="#" data-id="P"><b>P</b></a></li><li><a href="#" data-id="Q"><b>Q</b></a></li><li><a href="#" data-id="R"><b>R</b></a></li><li><a href="#" data-id="S"><b>S</b></a></li><li><a href="#" data-id="T"><b>T</b></a></li><li><a href="#" data-id="U"><b>U</b></a></li><li><a href="#" data-id="V"><b>V</b></a></li><li><a href="#" data-id="W"><b>W</b></a></li><li><a href="#" data-id="X"><b>X</b></a></li><li><a href="#" data-id="Y"><b>Y</b></a></li><li><a href="#" data-id="Z"><b>Z</b></a></li></ul>    
        </div>     
        <div class="form-group">  
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>
        <input type="text" class="form-control" name="search" id="search" placeholder="e.g. Product Code or Name" autocomplete="off">    
        </div>
        </div>   
        </div>   
        </div>
        <div class="row">
        <div class="product-panel style-2" id="purchaseitem">
        
        </div>
        </div>
        </div>    
        </div>
        </div>
        </div>
        <div class="col-md-5">
        <div class="box box-solid">
        <div class="box-body">
        
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-9">
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-user-o"></span></span>
        <span class="input-group-addon"><a data-toggle="collapse" data-target="#walkcus" class="accordion-toggle" id="walkin" style="cursor: pointer;">Walk-In</a></span>   
        <input type="text" class="form-control" id="cusname" value="" placeholder="Type Customer Code, Name Or Mobile No..." autocomplete="off" />
        <span class="input-group-addon"><a id="addcus" style="cursor: pointer;"><span class="fa fa-plus"></span></a></span>    
        </div>
        <input type="hidden" name="cusid" id="cusid" class="form-control" value="" readOnly />    
        </div>    
        </div>
        <div class="col-md-3"><span style="font-size: 18px;color: red;font-weight: bold;">Bal.: </span><span style="font-size: 18px;color: blue;font-weight: bold;" id="cusbal">0.00</span></div>    
        </div>
        <div class="row">   
        <div class="accordian-body collapse" id="walkcus">
        <div class="col-md-6">    
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-id-card-o"></span></span>    
        <input type="text" id="walkname" maxlength="35" class="form-control" value="Walk-In Customer" placeholder="Customer Name" autocomplete="off">
        </div>
        </div>
        <div class="form-group">
        <label>Select District</label>
        <select class="form-control select2" name="wdid" id="wdid" onchange="getAllSubwgroup(this.value)">
        <option value="">-Select-</option>
        <option value=""></option>
        </select>    
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="wemail" maxlength="50" value="" id="wemail" class="form-control" placeholder="e.g. info@axesgl.com"/>   
        </div>    
        </div>
        <div class="col-md-6">     
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-mobile"></span></span>    
        <input type="text" id="walkmobile" maxlength="18" class="form-control" value="" placeholder="e.g. 016167xx7x" autocomplete="off">
        </div>
        </div>
        <div class="form-group">
        <label>Select Zone</label>
        <select class="form-control select2" name="wzid" id="wzid">
        <option value="">-Select-</option>    
        </select>     
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" name="wadd" maxlength="250" value="" id="wadd" class="form-control" placeholder="e.g. B-323, Khilgaon"/>   
        </div>    
        </div>    
        </div>    
        </div>     
        <div class="row">
        <div class="col-md-8">
        <div class="form-group">  
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>
        <input type="text" class="form-control" id="pcode" placeholder="e.g. Product Code or Name" autocomplete="off">   <span class="input-group-addon"><a id="addpro" style="cursor: pointer;"><span class="fa fa-plus"></span></a></span>  
        </div>
        </div>       
        </div>
        <div class="col-md-4">
        <div class="form-group">  
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-barcode"></span></span>
        <input type="text" class="form-control" id="bcode" placeholder="e.g. Barcode" autocomplete="off">   
        </div>
        </div>
        </div>       
        </div>
            
        <div class="row">
        <div class="cart cart-sm">     
        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
        <thead>
        <th width="30px">SN</th>
        <th width="214px">Item</th>
        <th width="72px">Qty</th>
        <th width="72px">Price</th>
        <th width="35px">ASL</th>    
        <th width="77px">SubTotal</th>
        <th width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
        </thead>
        </table>
        <div class="cart-msg style-3 item" style="padding:0px;">    
        <table class="table table-bordered table-striped" style="margin-bottom: 0;">    
        <tbody id="itemdata">
        
        </tbody>    
        </table>
        </div>
        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
        <tfoot id="itemfoot">
        
        </tfoot>
        </table>    
        </div>    
        </div>
            
        <div class="row" id="serialpro">
            
            
        </div>    
        
        <div class="row" id="extra">
        
        </div>     
            
        </div> 
            
        </div>
        </div>
        </div>
        </div>
            
        <div class="rotate btn-cat-con">
        <button type="button" id="open-brands" class="btn btn-info open-brands" tabindex="-1">Brands</button>
        <button type="button" id="open-subcategory" class="btn btn-warning open-subcategory" tabindex="-1">Sub Categories</button>
        <button type="button" id="open-category" class="btn btn-primary open-category" tabindex="-1">Categories</button>
        </div>
            
        <div id="brands-slider">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>    
        <input type="text" class="form-control form-control-lg" id="searchbrands" placeholder="Search by Name" autocomplete="off">
        </div>
        </div>
        </div>    
        </div>
        <div class="col-md-2"></div>
        <div id="brands-list" class="ps-container style-2">
        <button id="brand_0" type="button" value="0" class="btn-prni brand" tabindex="-1"><img src="../img/product/no_image.png" class="img-rounded img-thumbnail"><span>ALL Brands</span></button>
        <button id="" type="button" value="" class="img-rounded img-thumbnail"><span class="bname"></span></button>    
        <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div>
        </div>
        </div>
        
        <div id="category-slider">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>     
        <input type="text" class="form-control form-control-lg" id="searchcategory" placeholder="Search by Name" autocomplete="off">
        </div>
        </div>
        </div>   
        <div class="col-md-2"></div>
        </div>
        <div id="category-list" class="ps-container style-2">
        <button id="category_0" type="button" value="0" class="btn-prni category" tabindex="-1"><img src="" class="img-rounded img-thumbnail"><span>All Categories</span></button>
        <button id="" type="button" value="" class="img-rounded img-thumbnail"><span class="cname"></span></button>    
        <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div>
        </div>
        </div>
        
        <div id="subcategory-slider">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>     
        <input type="text" class="form-control form-control-lg" id="searchsubcategory" placeholder="Search by Name" autocomplete="off">
        </div>
        </div>   
        </div>
        <div class="col-md-2"></div>
        </div>
        <div id="subcategory" class="ps-container style-2">
            
        </div>
        </div>
        
        <!-- Same Barcode Mutiproduct -->
        <div id="saleBarcode" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="global-modal-title">Fill the product's options</h4>
        </div>
        <div class="modal-body color-black" id="posProductOptions">
        <div class="form-group"> <label class="control-label">Purchase Batch</label>
        <div id="multipro">
        
        </div>
        </div>
        <input type="hidden" name="emn" id="emn" value="" readonly />
        <button type="button" id="cart_product" class="form-control btn-primary"><span class="hidden-xs hidden-sm hidden-md">Add to Cart</span> <i class="icon-cart-add2"></i></button>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        <!--end same barcode-->       
    </section>
    <!-- /.main content -->
@endsection