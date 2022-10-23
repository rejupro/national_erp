@extends("layouts/admin/main")
@section("content")
@php
 $mhead='company';
 $phead='lsetup';
@endphp
<section class="content-header">
   <h1>Local Setting</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#">Company</a></li>
      <li class="#"><a href="#">Local Setting</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h3 class="box-title">Local Setting</h3>
                </div>
                <div class="box-body">
                    <form action="axe_setting.php" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th hidden>ID</th>
                                    <th>Key</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[0][id]" id="id_1" value="1" class="form-control" autocomplete="off"></td>
                                        <td>Select Language</td>
                                        <td>Show Operating Language For Software</td>
                                        <td>
                                            <select class="form-control" name="data[0][action]">
                                                <option value="0">English</option>
                                                <option value="1">বাংলা</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[1][id]" id="id_2" value="2" class="form-control" autocomplete="off"></td>
                                        <td>Purchase Receive</td>
                                        <td>Purchase Product Received With Purchase Time</td>
                                        <td>
                                        <select class="form-control" name="">
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[2][id]" id="id_3" value="3" class="form-control" autocomplete="off"></td>
                                        <td>Sales Delivery</td>
                                        <td>Sales Product Deliver With Sales Time</td>
                                        <td>
                                        <select class="form-control" name="data[2][action]">
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[3][id]" id="id_4" value="4" class="form-control" autocomplete="off"></td>
                                        <td>Sales Time Show Cost</td>
                                        <td>Sales Time Show Product Cost</td>
                                        <td>
                                        <select class="form-control" name="data[3][action]">
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[4][id]" id="id_5" value="5" class="form-control" autocomplete="off"></td>
                                        <td>Invoice Due Print</td>
                                        <td>Sales Invoice Print Old Due</td>
                                        <td>
                                            <select class="form-control" name="data[4][action]">
                                                <option value="0">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="3" style="text-align:center">Invoice Note &amp; Terms</td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[5][id]" id="id_6" value="6" class="form-control" autocomplete="off"></td>
                                        <td colspan="3">
                                            <textarea class="form-control" id="editor_terms" maxlength="425" name="data[5][action]" placeholder="Terms & Conditions"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[6][id]" id="id_7" value="7" class="form-control" autocomplete="off"></td>
                                        <td>Invoice Note Print</td>
                                        <td>Sales Invoice Print With Terms &amp; Condition</td>
                                        <td>
                                            <select class="form-control" name="data[6][action]">
                                                <option value="0">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[7][id]" id="id_8" value="8" class="form-control" autocomplete="off"></td>
                                        <td>Enable Chat</td>
                                        <td>Fro Internal Communication</td>
                                        <td>
                                            <select class="form-control" name="data[7][action]">
                                                <option value="0">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td hidden><input type="hidden" maxlength="11" name="data[8][id]" id="id_9" value="9" class="form-control" autocomplete="off"></td>
                                        <td>Show Cost</td>
                                        <td>Sales Price Update Time Show Cost</td>
                                        <td>
                                            <select class="form-control" name="data[8][action]">
                                                <option value="0">Yes</option>
                                                <option value="1">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix" ></div>
                        <div class="row"style="margin-top: 15px" >
                            <div class="col-md-12 table-responsive">
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_setting" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/>
                                </div>
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
    <!-- /.main content -->


@endsection
