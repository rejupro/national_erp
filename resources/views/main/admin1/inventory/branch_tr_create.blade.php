@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Branch Transfer Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Branch Transfer Create</a></li>
   </ol>
</section>


<section class="content">
        
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">Add New Branch Transfer</h3>
                    </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="box-body">
                        <form action="{{ route('branch-transfer-stock-store') }}" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Branch Name(From)</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">BNF</span>
                                                 <select class="form-control select2" name="branch_id_from" id="branch_id_from" onchange="return find_product_branch()">
                                                 <option value="">-Select-</option> 
                                                 @foreach($branches as $data)  
                                                 <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                 @endforeach
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Branch Name(To)</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">TBN</span>
                                                 <select class="form-control select2" name="branch_id_to" id="branch_id_to">
                                                 <option value="">-Select-</option> 
                                                 @foreach($branches as $emp)  
                                                 <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                                 @endforeach
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <center><h4>Or</h4></center>
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Warehouse Name(To)</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">TWN</span>
                                                 <select class="form-control select2" name="warehouse_id_to" id="warehouse_id_to">
                                                 <option value="">-Select-</option> 
                                                 @foreach($warehouse as $emp)  
                                                 <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                                 @endforeach
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Product Name</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">PN</span>
                                                 <select class="form-control select2" name="product_id" id="product_id">
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                       <div class="form-group">
                                             <label>Quantity</label>
                                             <div class="form-group">
                                               <div class="input-group">
                                                   <span class="input-group-addon">QT</span>    
                                                   <input type="number" data-minlength="8" name="quantity" class="form-control" id="pass" placeholder="Transfer Quantity" required="">
                                               </div>
                                           </div>
                                      </div>
                                   </div>
                                </div>    
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>    
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_user" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{ route('branch-transfer-stock-list') }}" class="btn btn-flat bg-gray  ">Close</a>
                                </div> 
                            </div>     
                        </form>    
                    </div>
                </div>
            </div>
        <div class="col-md-4">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">History </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
      
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>    
    </section>
@endsection

<script type="text/javascript">
    function find_product_branch() {
        var branch_id_from = $('#branch_id_from').val();
        alert(branch_id_from);
            $('#product_id').empty();
            $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
            var url = '{{ route("find_product_for_transfer_branch", ":slug") }}';
            url = url.replace(':slug', branch_id_from);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                     $('#product_id').empty();
                     $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
                    $.each(response.data, function(index, value) {
                        $('#product_id').append('<option value="'+value.product_id+'" selected >'+value.product_name+'</option>');
                    });
                }
            });
        };
</script>