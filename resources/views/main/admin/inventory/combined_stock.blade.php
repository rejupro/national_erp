@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
    <h1>Combined Stock</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Combined Stock</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">All Over Stock Status (Warehouse + Branch)</h3>
        </div>
        <div class="box-body">    
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped table-hover table_list" id="datarec">
        <thead>
        <tr>
        <th rowspan="2" style="width:40px;" class="text-center">SN</th>
        <th rowspan="2" style="width:80px;">Image</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">SKU</th>    
        <th colspan="4" class="text-center">Purchase Details</th>
        <th colspan="4" class="text-center">Sold Details</th>
        <th rowspan="2" class="text-center">Adjust</th>     
        <th rowspan="2" class="text-center">Available</th>    
        </tr>
        <tr>
        <th class="text-center">Purchase</th>
        <th class="text-center">Receive</th>    
        <th class="text-center">Return</th>
        <th class="text-center">Balance</th>
        <th class="text-center">Sold</th>
        <th class="text-center">Deliverd</th>    
        <th class="text-center">Return</th>
        <th class="text-center">Balance</th>    
        </tr>    
        </thead>    
        <tbody>
        <tr>
        <td class="text-center"></td>
        <td class="text-center"><img src="" height="40px" width="40px"></td>
        <td><b class="prodetail"  style="cursor: pointer;"></b></td>
        <td></td>
        <td class="text-center"></td>    
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>    
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>     
        <td class="text-center"></td>    
        </tr>        
        </tbody>
        <tfoot>
        <tr>
        <td class="text-center" colspan="4"><strong>-Total-</strong></td>
        <td class="text-center"><strong></strong></td>    
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>    
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>
        <td class="text-center"><strong></strong></td>    
        <td class="text-center"><strong></strong></td>    
        </tr>    
        </tfoot>    
        </table>    
        </div>
        </div>
        </div>
        </div>
        </div>    
    </section>
    <!-- /.main content -->

@endsection