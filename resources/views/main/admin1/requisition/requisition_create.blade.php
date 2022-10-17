@extends("layouts/admin/main")
@section("content")
    @php
    $mhead='requisition';
    $phead='req_create';
    @endphp
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <section class="content-header">
        <h1>Requisition Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="">Requisition</a></li>
            <li class=""><a href="#">Requisition Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Requisition</h3>
                    </div>
                    <div class="box-body">
                    </div id="result">
                    </div>
                        <form id="dynamic_form" action="{{route('requisition-store-route')}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Project Code</label>
                                                    <select class="form-control select2" name="project_id" id="project_id">
                                                        <option value="">-Select-</option>
                                                        @foreach ($projects as $data)
                                                            <option value="{{$data->id}}">{{$data->project_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" name="status" maxlength="15" value="Pending" id="status" class="form-control"  readonly/>
                                                    {{-- <select class="form-control" name="status" id="status">
                                                        <option value="Pending">Pending</option>
                                                        <option value="Approve">Approve</option>
                                                    </select> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Requisition V.No</label>
                                                    <input type="text" name="code" maxlength="15" value="{{$code}}" id="code" class="form-control" placeholder="e.g. ABA/SU/001" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <select class="form-control select2" name="stf_id" id="stf_id" required>
                                                        <option value="">-Select-</option>
                                                        @foreach ($employees as $data)
                                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                               
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" name="dsgn_id" maxlength="45" value="" id="dsgn_id" class="form-control" placeholder="e.g. CEO"/>
                                                </div>
                                               
                                                {{-- <div class="form-group">
                                                    <span class="input-group-addon">Designation</span>
                                                    <select class="form-control" name="dsgn_id" id="dsgn_id">
                                                        <option value="">-Select-</option>
                                                        @foreach ($designations as $data)
                                                            <option value="{{$data->id}}">{{$data->desg_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" name="cnumber" maxlength="18" value="" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contact Email</label>
                                                    <input type="text" name="cemail" maxlength="45" value="" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-striped" id="user_table">
                                                    <thead>
                                                    <tr>
                                                        <th>Expense/Product Name</th>
                                                        <th>Unit</th>
                                                        <th>Net Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <td colspan="4">Total</td>
                                                    <td colspan="1"><input type="text" name="total" maxlength="18" value="0" id="total" class="form-control" /></td>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-13">
                                                <div class="form-group">
                                                    <label>Note</label>
                                                    <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Write your note here"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8 "></div>
                                <div class="col-md-4 text-right" >
                                    <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="{{route('requisition-list-route')}}" class="btn btn-flat bg-gray">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
        <script>
            var number=0;
            $(document).ready(function(){

                var count = 1;
                

                dynamic_field(count);

                function dynamic_field(number)
                {
                    
                    html = '<tr>';
                    html += '<td><select onchange="getNewVal(this);" class="form-control select2" name="requisition_item[]" required><option selected value="">-Select-</option><optgroup label="Expenses">@foreach($expenses as $data)<option style="background-color:ash;" value="{{$data->name}}">{{$data->name}}</option>@endforeach</optgroup><optgroup label="Products">@foreach($products as $product)<option style="background-color:ash;" value="{{$product->name}}">{{$product->name}}</option>@endforeach</optgroup></select></td>';
                    html += '<td> <select name="unit_id[]" id="unit_id'+count+'" class="form-control"><option value="" selected>Choose Please.....</option>@foreach ($unit as $data)<option value="{{$data->id}}">{{$data->name}}</option>@endforeach</select></td>';
                    html += '<td><input type="number" name="nprice[]" id="nprice'+count+'" class="form-control nprice"/></td>';
                    html += '<td><input type="number" name="qty[]" id="qty'+count+'" class="form-control qty" onblur="net_price_count('+count+')" /></td>';
                    html += '<td><input type="number" name="price[]" id="price'+count+'" class="form-control price" onclick="calculationAll('+count+')" /></td>';
                    if(number > 1)
                    {
                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove" onclick="remove_price('+count+')">Remove</button></td></tr>';
                        $('tbody').append(html);
                    }
                    else
                    {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
                }

                $(document).on('click', '#add', function(){
                    count++;
                    dynamic_field(count);
                });
                $(document).on('click', '.remove', function(){
                    count--;
                    $(this).closest("tr").remove();
                });

                $('#dynamic_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:'{{ url('requisition/store') }}',
                        method:'POST',
                        data:$(this).serialize(),
                        dataType:'json',
                        beforeSend:function(){
                            $('#save').attr('disabled','disabled');
                        },
                        success:function(data)
                        {
                            if(data.error)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    error_html += '<p>'+data.error[count]+'</p>';
                                }
                                $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                            }
                            else
                            {
                                window.location.href = "{{ route('requisitionsuccess')}}";
                                
                            }
                            $('#save').attr('disabled', false);
                        }
                    })
                });

            });

          
            

        </script>  
        <script>
            function net_price_count($id){
                var set_id = $id;
                var qty = $('#qty'+set_id+"").val();
                var nprice = $('#nprice'+set_id+"").val();
                var price = parseInt(qty) * parseInt(nprice);
                $('#price'+set_id+"").val(price);

            }
            function calculationAll($id){
                var initial_total = 0;
                var i = $id;
                var j = 1;
                for(j; j<=i ; j++) {
                    var amount = $('#price'+j+"").val();
                    var set_initial_total = parseInt(initial_total) + parseInt(amount);
                    var initial_total = set_initial_total;
                    $('#total').val(set_initial_total);
                }
            }
            function remove_price($id) {
                var i = $id;
                var initial_total = $('#total').val();
                var price = $('#price'+i+"").val();
                if(price>0) {
                    var set_initial_total = parseInt(initial_total) - parseInt(price);
                    $('#total').val(set_initial_total);
                }else{
                    $('#total').val(0);
                }
            }
        </script>
    </section>

    <script>

$(function () {
    $(document).on("change", "#stf_id", function () {
        var id = $(this).val();
            var url = '{{ route("requisitiongetDetails", ":id") }}';
            url = url.replace(':id', id);
        
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    //alert(response.mobile);
                    if(response != null){
                        $('#dsgn_id').val(response.designation.desg_name);
                        $('#cnumber').val(response.mobile);
                        $('#cemail').val(response.email);
                    }
                }
            });
        

    });
});

        // $('#stf_id').change(function(){
        //     var id = $(this).val();
        //     var url = '{{ route("requisitiongetDetails", ":id") }}';
        //     url = url.replace(':id', id);
        
        //     $.ajax({
        //         url: url,
        //         type: 'get',
        //         dataType: 'json',
        //         success: function(response){
        //             alert(response);
        //             if(response != null){
        //                 $('#dsgn_id').val(response.designation.desg_name);
        //                 $('#cnumber').val(response.mobile);
        //                 $('#cemail').val(response.email);
        //             }
        //         }
        //     });
        // });
        
        $(function () {
                $("select").select2();
            });
        </script>
    <!-- /.main content -->
@endsection