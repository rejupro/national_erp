@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) ব্রাঞ্চ ট্রান্সফার ক্রিয়েট @else Branch Transfer Create @endif</h1>
   <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
        <li class=""><a href="">@if ( Auth::User()->language == 1 ) ব্রাঞ্চ ট্রান্সফার ক্রিয়েট @else Branch Transfer Create @endif</a></li>
   </ol>
</section>


<section class="content">
        
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">@if ( Auth::User()->language == 1 ) এড নিউ ব্রাঞ্চ ট্রান্সফার @else Add New Branch Transfer @endif</h3>
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
                                             <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চের নাম (হতে) @else Branch Name(From) @endif</label>
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
                                             <label>@if ( Auth::User()->language == 1 ) ব্রাঞ্চের নাম (কাছে) @else Branch Name(To) @endif</label>
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
                                    <center><h4>@if ( Auth::User()->language == 1 ) অথবা @else Or @endif</h4></center>
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>@if ( Auth::User()->language == 1 ) ওয়ারহাউজের নাম (কাছে) @else Warehouse Name(To) @endif</label>
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
                                             <label>@if ( Auth::User()->language == 1 ) প্রোডাক্টের নাম @else Product Name @endif</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">PN</span>
                                                 <select class="form-control select2" name="product_id" id="product_id">
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                       <div class="form-group">
                                             <label>@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</label>
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
                                <input type="submit" name="save_user" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) সেভ @else Save @endif"/> <a href="{{ route('branch-transfer-stock-list') }}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
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
        <h3 class="box-title">@if ( Auth::User()->language == 1 ) হিস্টোরি @else History @endif </h3>
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