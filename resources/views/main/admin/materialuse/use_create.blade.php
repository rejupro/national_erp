@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
    <h1>Challan Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Challan Create</a></li>
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
        <div class="row">
        <div class="col-md-8"> 
        <div class="form-group">  
        <div class="input-group">
        <span class="input-group-addon"><span class="fa fa-search"></span></span>
        <input type="text" class="form-control" name="search" id="search" placeholder="e.g. Product Code or Name" autocomplete="off">    
        </div>
        </div>    
        </div>
        <div class="col-md-4">
        <div class="form-group" >
        <div class="input-group">
        <span class="input-group-addon"><b>Project:</b></span>    
        <select class="form-control select2" name="prjid" id="prjid">
        <option value="A">-All-</option>
        <option value=""></option>
        </select>    
        </div>   
        </div>
        </div>    
        </div>    
        </div>   
        </div>
        <div class="row">
        <div class="product-panel style-2" id="purchaseitem">
        {{-- <div class="product-image">
              <div class="info">
                <h3>ABA006P</h3>
                <p>Twill Tape</p>
                </div>
                <div class="product-detail">
                    <b class="name">Twill Tape</b>
                </div>
                <div class="product-code">
                    <b class="sku"></b>
                    <b class="indexg" style="display:none;">Twill Tape</b>
                </div>
        </div>	  --}}
        
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
        <input type="text" class="form-control" id="cusname" value="" placeholder="Type Project Code, Name..." autocomplete="off" />    
        </div>
        <input type="hidden" name="cusid" id="cusid" class="form-control" value="" readOnly />    
        </div>    
        </div>
        <div class="col-md-3"><span style="font-size: 18px;color: red;font-weight: bold;">Bal.: </span><span style="font-size: 18px;color: blue;font-weight: bold;" id="cusbal">0.00</span></div>    
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
        <th width="72px">Cost</th>    
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
        <button id="brand_0" type="button" value="0" class="btn-prni brand" tabindex="-1"><img src="" class="img-rounded img-thumbnail"><span>ALL Brands</span></button>

        <button id="" type="button" value="" class="btn-prni brand" tabindex="-1"><img src="" class="img-rounded img-thumbnail"><span class="bname"></span></button>    
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
        <button id="" type="button" value="" class="btn-prni category" tabindex="-1"><img src="" class="img-rounded img-thumbnail"><span class="cname"></span></button>    
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
    </section>
    <!-- /.main content -->
@endsection