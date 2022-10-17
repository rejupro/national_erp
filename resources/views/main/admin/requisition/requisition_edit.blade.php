@extends("layouts/admin/main")
@section("content")
@php
$mhead='requisition';
$phead='req_list';
@endphp
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1>@if ( Auth::User()->language == 1 ) রিকুইজিশন ইডিট  @else Requisition Edit @endif</h1>
      <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>@if ( Auth::User()->language == 1 ) ড্যাসবোর্ড @else Dashboard @endif</a></li>
      <li class=""><a href="">@if ( Auth::User()->language == 1 ) রিকুইজিশন ইডিট @else Requisition Edit @endif</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">@if ( Auth::User()->language == 1 ) রিকুইজিশন ইডিট @else Requisition Edit @endif</h3>
            </div>
            <div class="box-body">
               {{-- Error   --}}
               <form id="dynamic_form" action="{{route('requisition-update-route',$requisition->id)}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('put')
                  <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                     <label>@if ( Auth::User()->language == 1 ) প্রোজেক্ট কোড @else Project Code @endif</label>
                                    <select class="form-control" name="project_id" id="project_id">
                                    <option value="">-Select-</option>
                                       @foreach ($projects as $data)
                                    <option value="{{$data->id}}" @php echo ($requisition->project_id == $data->id ? "selected" : ""); @endphp>{{$data->project_id}}</option>
                                        @endforeach

                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) স্ট্যাটাস @else Status @endif</label>
                                    <select class="form-control" name="status" id="status">
                                       <option value="Pending" @if($requisition->status=='Pending')   selected @endif>Pending</option>
                                       <option value="Approve" @if($requisition->status=='Approve')   selected @endif>Approve</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) রিকুইজিশন ভাঃ নাম্বার @else Requisition V.No @endif</label>
                                    <input type="text" name="code" maxlength="15" value="{{$requisition->code}}" id="code" class="form-control" placeholder="e.g. ABA/SU/001" readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <span class="input-group-addon">@if ( Auth::User()->language == 1 ) স্টাফ নেম @else Staff Name @endif</span>
                                    <select class="form-control" name="stf_id" id="stf_id" >
                                        @foreach ($employees as $data)
                                            <option value="{{$data->id}}" @if($requisition->stf_id == $data->id ) selected   @endif>{{$data->name}}</option>
                                         @endforeach
                                    </select>
                                 </div>
                              </div>
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) ডেজিগনেসন @else Designation @endif</label>
                                    <input type="text" name="dsgn_id" maxlength="45" value="{{$requisition->dsgn_id}}" id="dsgn_id" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কনটাক্ট নাম্বার @else Contact Number @endif</label>
                                    <input type="text" name="cnumber" maxlength="18" value="{{$requisition->cnumber}}" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) কনটাক্ট ইমেইল @else Contact Email @endif</label>
                                    <input type="text" name="cemail" maxlength="45" value="{{$requisition->cemail}}" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="table table-bordered table-striped" id="user_table">
                                    <thead>
                                       <tr>
                                       <th>@if ( Auth::User()->language == 1 ) এক্সপেন্সে/প্রোডাক্ট নাম @else Expense/Product Name @endif</th>
                                       <th>@if ( Auth::User()->language == 1 ) ইউনিট @else Unit @endif</th>
                                       <th>@if ( Auth::User()->language == 1 ) নেট প্রাইস @else Net Price @endif</th>
                                       <th>@if ( Auth::User()->language == 1 ) কোয়ানটিটি @else Quantity @endif</th>
                                       <th>@if ( Auth::User()->language == 1 ) টোটাল প্রাইস @else Total Price @endif</th>
                                       <th>@if ( Auth::User()->language == 1 ) অ্যাকশন @else Action @endif</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0; @endphp
                                        {{-- @dd($details->toArray()) --}}
                                        @foreach ($details as $d => $detail)
                                            @php $i=$i+1; @endphp
                                        <tr>
                                           
                                             <input type="hidden" name="detail_id[]" value='{{ $detail->id }}' />
                                            
                                            <td>
                                             <input type="text" name="requisition_item[]" id="requisition_item{{$i}}" value="{{$detail->requisition_item}}" class="form-control requisition_item" />
                                            </td>
                                            <td> <select name="unit_id[]" id="unit_id{{$i}}" class="form-control"><option selected value="">Choose Please.....</option>@foreach ($unit as $data)<option value="{{$data->id}}" @if($data->id == $detail->unit_id) selected @endif>{{$data->name}}</option>@endforeach</select></td>
                                            <td><input type="text" name="nprice[]" id="nprice{{$i}}" value="{{$detail->nprice}}" class="form-control nprice" /></td>
                                            <td><input type="text" name="qty[]" id="qty{{$i}}" value="{{$detail->qty}}"  onblur="net_price_count({{$i}})" class="form-control qty" /></td>
                                            <td><input type="text" name="price[]" id="price{{$i}}" value="{{$detail->price}}" onclick="calculationAll({{$i}})"  class="form-control price" /></td>
                                            @if($d != 0)
                                                <td><button type="button" name="remove" id="remove{{$i}}" class="btn btn-danger remove" onclick="remove_price({{$i}})">Remove</button></td>
                                            @else
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                     <input type="hidden" name="count" id="count" value="{{ $i }}">
                                    <tfoot>
                                       <td colspan="3">@if ( Auth::User()->language == 1 ) টোটাল @else Total @endif</td>
                                       <td colspan="1"><input type="text" name="total" maxlength="18" value="{{$requisition->grand_total}}" id="total" class="form-control" /></td>
                                    </tfoot>
                                 </table>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-13">
                                 <div class="form-group">
                                    <label>@if ( Auth::User()->language == 1 ) নোট @else Note @endif</label>
                                    <textarea class="form-control" name="address" id="address" value="" maxlength="200" rows="4" placeholder="Site Numbers, RMN Core, Office Address">{{$requisition->address}}</textarea>
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
                        {{-- <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="{{route('requisition-list-route')}}" class="btn btn-flat bg-gray  ">Close</a> --}}
                        <input type="submit" name="save" id="submit" class="btn btn-flat bg-purple btn-sm " value="@if ( Auth::User()->language == 1 ) আপডেট @else Update @endif"><a href="{{route('requisition-list-route')}}" class="btn btn-flat bg-gray  ">@if ( Auth::User()->language == 1 ) ক্লোজ @else Close @endif</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
   </div>


  
   <script>
      var number= $('#count').val();
      $(document).ready(function(){

       var count = @php echo $i; @endphp + 1;
       dynamic_field(count);

       function dynamic_field(number)
       {

        html = '<tr>';
              html += '<td><input type="text" name="requisition_item[]" id="requisition_item'+count+'" class="form-control requisition_item"/></td>';
               html += '<td> <select name="unit_id[]" id="unit_id'+count+'" class="form-control"><option value="" selected>Choose Please.....</option>@foreach ($unit as $data)<option value="{{$data->id}}">{{$data->name}}</option>@endforeach</select></td>';
               html += '<td><input type="text" name="nprice[]" id="nprice'+count+'" class="form-control nprice"/></td>';
               html += '<td><input type="text" name="qty[]" id="qty'+count+'" onblur="net_price_count('+count+')" class="form-control qty"/></td>';
               html += '<td><input type="text" name="price[]" id="price'+count+'" class="form-control price" onclick="calculationAll('+count+')" /></td>';
              if(number > 1)
              {
                  html += '<td><button type="button" name="remove" id="remove'+count+'" class="btn btn-danger remove" onclick="remove_price('+count+')">Remove</button></td></tr>';
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

      });
   </script>
    <script>
        function select_employee_phone(){
            var emp_id = $('#stf_id').val();
            $.ajax({
                type:'get',
                url:'{{ route('select_employee_phone') }}',
                data:{'id':emp_id},
                success:function(result){
                    $('#cnumber').val(result);
                    return false;
                },
                error:function(){

                },
            });
        }
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

   $('#stf_id').change(function(){
       var id = $(this).val();
       var url = '{{ route("requisitiongetDetails", ":id") }}';
       url = url.replace(':id', id);
   
       $.ajax({
           url: url,
           type: 'get',
           dataType: 'json',
           success: function(response){
               if(response != null){
                   $('#dsgn_id').val(response.designation.desg_name);
                   $('#cnumber').val(response.mobile);
                   $('#cemail').val(response.email);
               }
           }
       });
   });
   
   
   </script>
<!-- /.main content -->
@endsection