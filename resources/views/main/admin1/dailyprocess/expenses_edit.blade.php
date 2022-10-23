@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Expenses Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Daily Process</a></li>
      <li class=""><a href="#">Expenses Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Expenses</h3>
            </div>
            <div class="box-body">
               {{-- Error messagess   --}}
               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
               <form action="{{route('expense-update-route',$expense->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">EXPENSES VOUCHER</h3>
                        </center>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <center>
                                 <a id="addcash" style="cursor: pointer;font-size: 16px;margin-right: 4px;color: red;"><span class="fa fa-plus"></span></a>
                                 <span style="font-size: 20px;font-weight: bold;">Balance: </span><span style="font-size: 20px;font-weight: bold;color:red" id="cbal"></span>
                              </center>
                           </div>
                           <div class="form-group" >
                              <label>Other Credit</label>
                              <select class="form-control select2" name="other_creadit_id" id="other_creadit_id">
                                <option value="">-Select-</option>
                                @foreach($other_creadits as $other_creadit)
                                <option value="{{$other_creadit->id}}" @if($expense->other_creadit_id == $other_creadit->id) selected @endif>{{$other_creadit->name}}</option>
                               @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Expenses No:</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="expense_no" id="expense_no" value="{{ $expense->expense_no }}" placeholder="e.g. AXE121119101" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date" id="date" value="{{ $expense->expense_no }}" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Project:</b></span>
                                 <select class="form-control select2" name="project_id" id="project_id">
                                    <option value="">-Select-</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}" @if($expense->project_id == $project->id) selected @endif>{{$project->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group" >
                              <label>Expenses Head</label>
                              <div class="input-group">
                                 <select class="form-control select2" name="expid" id="expid">
                                    <option value="">-Select-</option>
                                    @foreach($expense_heads as $expense_head)
                                    <option value="{{$expense_head->id}}" @if($expense->expid == $expense_head->id) selected @endif>{{$expense_head->name}}</option>
                                   @endforeach
                                 </select>
                                 <span class="input-group-addon"><a id="aexpi"><span class="fa fa-plus"></span></a></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group" >
                              <label>Ref</label>
                              <input type="text" maxlength="45" class="form-control" name="ref" id="ref" value="{{ $expense->ref }}" placeholder="e.g. Sumon" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Amount</label>
                              <input type="text" maxlength="6" class="form-control" name="amount" id="amount" value="{{ $expense->amount }}" placeholder="e.g. 500" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Type</label>
                              <select class="form-control select2" name="mtype" id="mtype">
                                <option value="">-Select-</option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}" @if($expense->mtype == $type->id) selected @endif>{{$type->name}}</option>
                               @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group">
                              <label>&nbsp;</label>
                              <input type="button" id="addexp" class="btn btn-flat bg-red" value="Add"/>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Expenses Head</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Ref</th>
                                    <th style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;">
                                        <i class="fa fa-trash"></i></a></th>
                                 </tr>
                              </thead>
                              <tbody id="itemdata">
                                @foreach ($expense->details as $data)
                                <tr>
                                    <td>
                                        <p>{{$data->expense_head->name}}</p>
                                        <input type="hidden" name="expid_dtl[]" value="{{$data->expense_head->id}}" />
                                    </td>
                                    <td>
                                        <p>{{$data->type->name}}</p>
                                        <input type="hidden" name="mtype_dtl[]" value="{{$data->type->id}}" />
                                    </td>
                                    <td>
                                        <p>{{$data->amount}}</p>
                                        <input type="hidden" name="amount_dtl[]" value="{{$data->amount}}" />
                                    </td>
                                    <td>
                                        <p>{{$data->ref}}</p>
                                        <input type="hidden" name="ref_dtl[]" value="{{ $data->ref }}" />
                                    </td>
                                    <td style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;" href="">{{$data->id}}
                                        <i class="fa fa-trash"></i></a></td>
                                   </td>
                                </tr>
                                @endforeach
                              </tbody>
                              <tfoot id="itemfoot">
                              </tfoot>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Note</label>
                              <textarea class="form-control" name="note" id="note" maxlength="250" rows="3" placeholder="e.g. Note"><?php if(isset($_SESSION['axes_expdata']['note'])){echo $_SESSION['axes_expdata']['note'];}?>{{$expense->note}}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="button" id="expreset" class="btn btn-flat bg-red btn-sm " value="Reset"/>
                        <input type="submit" name="save_expenses" id="submit" class="btn btn-flat bg-purple btn-sm" value="Update"/> <a href="dai_expenlist.php" class="btn btn-flat bg-gray  ">Close</a>
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
                     {{-- History message show --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection

@section('custom-script')
<script>
      $(function(){
         $('#addexp').click(function(){
            const expid = $('#expid').val(),
                ref = $('#ref').val(),
                amount = $('#amount').val(),
                mtype = $('#mtype').val()

            if(expid == '' || ref == '' || amount == '' || mtype == ''){
               return false
            }

            let content = `<tr>
                <td>
                    <p>${$( "#expid option:selected" ).text()}</p>
                    <input type="hidden" name="expid_dtl[]" value="${expid}" />
                </td>
                <td>
                    <p>${ ref }</p>
                    <input type="hidden" name="ref_dtl[]" value="${ref}" />
                </td>
                <td>
                    <p>${ amount }</p>
                    <input type="hidden" name="amount_dtl[]" value="${amount}" />
                </td>
                <td>
                    <p>${$( "#mtype option:selected" ).text()}</p>
                    <input type="hidden" name="mtype_dtl[]" value="${mtype}" />
                </td>
                <td style="width:40px; text-align:center">
                  <a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
               </td>
            </tr>`

            $('#expid').val('').trigger('change')
            $('#ref').val('')
            $('#amount').val('')
            $('#mtype').val('').trigger('change')

            $('#itemdata').append(content)
        })
    })

    $(document).on('click', '.empty', function(){
      $(this).parents('tr').remove()
    })
</script>
@endsection
