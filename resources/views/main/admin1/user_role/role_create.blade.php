@extends("layouts/admin/main")
@section("content")
    @php
    $mhead='urole';
    $phead='rolec';
    @endphp
    <section class="content-header">
        <h1>Role Create</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('role-list-page') }}">User & Role</a></li>
            <li class=""><a href="{{ route('role-create-page') }}">Role Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assign New Role</h3>
                    </div>
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- error --}}

                        <form action="{{ route('role-store-page') }}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="col-md-12 popup_details_div">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label>User name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">N</span>
                                                <select class="form-control select2" name="id" id="uid">
                                                    <option value="">-Select-</option>
                                                    @foreach($user as $usr)
                                                        <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group" >
                                                <label>Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">De-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Module Access</label>
                                                <ul class="list-group">
                                                    <li class="list-groups-item">
                                                        Manage Project
                                                        <div class="material-switch pull-right">
                                                            <input id="project" name="manage_project" value="manage_project" type="checkbox" class="access" checked="">
                                                            <label for="project" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Daily Process
                                                        <div class="material-switch pull-right">
                                                            <input id="daily" name="daily_process" value="daily_process" type="checkbox" class="access" checked="">
                                                            <label for="daily" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Requisition Record
                                                        <div class="material-switch pull-right">
                                                            <input id="requisition_record" name="requisition_record" value="requisition_record" type="checkbox" class="access" checked="">
                                                            <label for="requisition_record" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Requisition Create
                                                        <div class="material-switch pull-right">
                                                            <input id="requisition_create" name="requisition_create" value="requisition_create" type="checkbox" class="access" checked="">
                                                            <label for="requisition_create" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Purchase
                                                        <div class="material-switch pull-right">
                                                            <input id="purchase" value="purchase" name="purchase" type="checkbox" class="access" checked="">
                                                            <label for="purchase" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Material Use & Sales
                                                        <div class="material-switch pull-right">
                                                            <input id="material_use" value="material_use" name="material_use" type="checkbox" class="access" checked="">
                                                            <label for="material_use" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Inventory
                                                        <div class="material-switch pull-right">
                                                            <input id="inventory" value="inventory" name="inventory" type="checkbox" class="access" checked="">
                                                            <label for="inventory" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Client Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="client" type="checkbox" value="client" name="client" class="access" checked="">
                                                            <label for="client" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Product Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="product" name="product" value="product" type="checkbox" class="access" checked="">
                                                            <label for="product" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Master Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="master" value="master" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Installment & Loan Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="loan" value="loan" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Accounts Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="account" name="account" value="account" type="checkbox" class="access" checked="">
                                                            <label for="account" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        LC Setup
                                                        <div class="material-switch pull-right">
                                                            <input id="master" name="lc" value="lc" type="checkbox" class="access" checked="">
                                                            <label for="master" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Financials
                                                        <div class="material-switch pull-right">
                                                            <input id="financial" name="financial" value="financial" type="checkbox" class="access" checked="">
                                                            <label for="financial" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Payroll
                                                        <div class="material-switch pull-right">
                                                            <input id="payroll" name="payroll" value="payroll" type="checkbox" class="access" checked="">
                                                            <label for="payroll" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Bank
                                                        <div class="material-switch pull-right">
                                                            <input id="bank" name="bank" value="bank" type="checkbox" class="access" checked="">
                                                            <label for="bank" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        User &amp; Role
                                                        <div class="material-switch pull-right">
                                                            <input id="user" name="user_role" value="user_role" type="checkbox" class="access" checked="">
                                                            <label for="user_role" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Report
                                                        <div class="material-switch pull-right">
                                                            <input id="report" name="report" value="report" type="checkbox" class="access" checked="">
                                                            <label for="report" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Personal
                                                        <div class="material-switch pull-right">
                                                            <input id="personal" name="personal" value="personal" type="checkbox" class="access" checked="">
                                                            <label for="personal" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                    <li class="list-groups-item">
                                                        Company Settings
                                                        <div class="material-switch pull-right">
                                                            <input id="company" name="company" value="company" type="checkbox" class="access" checked="">
                                                            <label for="company" class="label-success"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>

                                <div class="row" id="edaily">
                                    <div class="col-md-12">
                                        {{-- <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Daily Process</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Price List
                                        <input type="hidden" maxlength="11" name="data[2][id]" value="2" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[2][sec]" value="daily" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[2][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[2][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[2][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[2][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[2][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Expenses Record
                                        <input type="hidden" maxlength="11" name="data[3][id]" value="3" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[3][sec]" value="daily" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[3][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[3][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[3][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[3][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[3][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Expenses Head
                                        <input type="hidden" maxlength="11" name="data[4][id]" value="4" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[4][sec]" value="daily" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[4][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[4][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[4][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[4][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[4][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="eoperation">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Operation Process</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Proforma Invoice (PI)
                                        <input type="hidden" maxlength="11" name="data[5][id]" value="5" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[5][sec]" value="operation" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[5][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[5][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[5][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[5][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[5][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Letter of Credit (LC)
                                        <input type="hidden" maxlength="11" name="data[6][id]" value="6" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[6][sec]" value="operation" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[6][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[6][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[6][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[6][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[6][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Invoice
                                        <input type="hidden" maxlength="11" name="data[7][id]" value="7" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[7][sec]" value="operation" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[7][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[7][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[7][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[7][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[7][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Delivery Record
                                        <input type="hidden" maxlength="11" name="data[8][id]" value="8" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[8][sec]" value="operation" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[8][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[8][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[8][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[8][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[8][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="eclient">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Client</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Customer
                                        <input type="hidden" maxlength="11" name="data[9][id]" value="9" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[9][sec]" value="client" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[9][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[9][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[9][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[9][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[9][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Supplier
                                        <input type="hidden" maxlength="11" name="data[10][id]" value="10" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[10][sec]" value="client" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[10][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[10][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[10][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[10][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[10][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="eproduct">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Product</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Parent
                                        <input type="hidden" maxlength="11" name="data[11][id]" value="11" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[11][sec]" value="product" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[11][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[11][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[11][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[11][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[11][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Category
                                        <input type="hidden" maxlength="11" name="data[12][id]" value="12" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[12][sec]" value="product" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[12][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[12][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[12][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[12][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[12][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Sub-Category
                                        <input type="hidden" maxlength="11" name="data[13][id]" value="13" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[13][sec]" value="product" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[13][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[13][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[13][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[13][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[13][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Product
                                        <input type="hidden" maxlength="11" name="data[14][id]" value="14" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[14][sec]" value="product" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[14][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[14][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[14][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[14][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[14][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="emaster">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Master</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Brand
                                        <input type="hidden" maxlength="11" name="data[15][id]" value="15" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[15][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[15][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[15][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[15][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[15][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[15][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Manufacturer
                                        <input type="hidden" maxlength="11" name="data[16][id]" value="16" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[16][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[16][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[16][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[16][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[16][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[16][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Unit
                                        <input type="hidden" maxlength="11" name="data[17][id]" value="17" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[17][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[17][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[17][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[17][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[17][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[17][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Currency
                                        <input type="hidden" maxlength="11" name="data[18][id]" value="18" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[18][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[18][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[18][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[18][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[18][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[18][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Country
                                        <input type="hidden" maxlength="11" name="data[19][id]" value="19" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[19][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[19][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[19][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[19][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[19][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[19][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Shipping
                                        <input type="hidden" maxlength="11" name="data[20][id]" value="20" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[20][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[20][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[20][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[20][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[20][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[20][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Color
                                        <input type="hidden" maxlength="11" name="data[21][id]" value="21" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[21][sec]" value="master" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[21][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[21][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[21][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[21][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[21][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="eaccount">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Accounts</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Class
                                        <input type="hidden" maxlength="11" name="data[22][id]" value="22" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[22][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[22][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[22][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[22][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[22][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[22][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Account Group
                                        <input type="hidden" maxlength="11" name="data[23][id]" value="23" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[23][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[23][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[23][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[23][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[23][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[23][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Account Sub-Group
                                        <input type="hidden" maxlength="11" name="data[24][id]" value="24" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[24][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[24][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[24][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[24][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[24][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[24][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Account Ledger
                                        <input type="hidden" maxlength="11" name="data[25][id]" value="25" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[25][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[25][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[25][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[25][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[25][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[25][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Payment Voucher
                                        <input type="hidden" maxlength="11" name="data[26][id]" value="26" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[26][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[26][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[26][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[26][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[26][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[26][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Received Voucher
                                        <input type="hidden" maxlength="11" name="data[27][id]" value="27" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[27][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[27][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[27][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[27][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[27][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[27][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Journal Entry
                                        <input type="hidden" maxlength="11" name="data[28][id]" value="28" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[28][sec]" value="account" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[28][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[28][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[28][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[28][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[28][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="efinancial">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Financials</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Chart Of Account
                                        <input type="hidden" maxlength="11" name="data[29][id]" value="29" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[29][sec]" value="financial" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[29][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[29][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[29][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[29][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[29][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Profit &amp; Loss
                                        <input type="hidden" maxlength="11" name="data[30][id]" value="30" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[30][sec]" value="financial" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[30][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[30][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[30][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[30][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[30][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Trial Balance
                                        <input type="hidden" maxlength="11" name="data[31][id]" value="31" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[31][sec]" value="financial" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[31][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[31][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[31][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[31][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[31][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Balance Sheet
                                        <input type="hidden" maxlength="11" name="data[32][id]" value="32" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[32][sec]" value="financial" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[32][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[32][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[32][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[32][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[32][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Finance Analysis
                                        <input type="hidden" maxlength="11" name="data[33][id]" value="33" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[33][sec]" value="financial" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[33][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[33][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[33][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[33][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[33][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="epayrol">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Payroll</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Department
                                        <input type="hidden" maxlength="11" name="data[34][id]" value="34" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[34][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[34][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[34][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[34][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[34][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[34][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Designation
                                        <input type="hidden" maxlength="11" name="data[35][id]" value="35" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[35][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[35][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[35][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[35][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[35][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[35][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Employee
                                        <input type="hidden" maxlength="11" name="data[36][id]" value="36" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[36][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[36][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[36][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[36][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[36][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[36][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Leave
                                        <input type="hidden" maxlength="11" name="data[37][id]" value="37" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[37][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[37][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[37][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[37][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[37][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[37][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Leave Record
                                        <input type="hidden" maxlength="11" name="data[38][id]" value="38" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[38][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[38][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[38][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[38][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[38][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[38][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Leave Application
                                        <input type="hidden" maxlength="11" name="data[39][id]" value="39" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[39][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[39][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[39][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[39][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[39][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[39][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Attendance &amp; Payslip
                                        <input type="hidden" maxlength="11" name="data[40][id]" value="40" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[40][sec]" value="payrol" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[40][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[40][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[40][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[40][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[40][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                    </table>         --}}
                                    </div>
                                </div>

                                <div class="row" id="ebank">
                                    <div class="col-md-12">
                                        {{-- <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Bank</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Bank
                                        <input type="hidden" maxlength="11" name="data[41][id]" value="41" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[41][sec]" value="bank" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[41][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[41][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[41][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[41][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[41][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Account
                                        <input type="hidden" maxlength="11" name="data[42][id]" value="42" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[42][sec]" value="bank" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[42][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[42][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[42][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[42][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[42][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Transaction
                                        <input type="hidden" maxlength="11" name="data[43][id]" value="43" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[43][sec]" value="bank" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[43][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[43][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[43][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[43][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[43][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="euser">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">User &amp; Role</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>User Role
                                        <input type="hidden" maxlength="11" name="data[44][id]" value="44" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[44][sec]" value="user" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[44][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[44][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[44][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[44][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[44][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>User
                                        <input type="hidden" maxlength="11" name="data[45][id]" value="45" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[45][sec]" value="user" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[45][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[45][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[45][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[45][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[45][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>

                                        <div class="row" id="ereport">
                                        <div class="col-md-12">
                                        <table class="table">
                                        <thead>
                                        <tr>
                                        <th style="width:285px;">Report</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Print</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>Report
                                        <input type="hidden" maxlength="11" name="data[46][id]" value="46" class="form-control" autocomplete="off">
                                        <input type="hidden" maxlength="11" name="data[46][sec]" value="report" class="form-control" autocomplete="off">  </td>
                                        <td class="text-center">
                                        <input type="checkbox"  name="data[46][read]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[46][write]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[46][edit]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[46][delete]" class="role" checked="" value="1">
                                        </td>
                                        <td class="text-center">
                                        <input type="checkbox" name="data[46][print]" class="role" checked="" value="1">
                                        </td>
                                        </tr>
                                        </tbody>
                                    </table>   --}}
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                    <input type="submit" name="role_setting" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="{{ route('role-list-page') }}" class="btn btn-flat bg-gray  ">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
            <div class="row">
            <div class="col-md-12">
            <div class="box box-solid">
            <div class="box-header">
            <h3 class="box-title">History </h3>
            </div>
            <div class="box-body" >

            </div>
            </div>
            </div>
            </div>
        </div> --}}
        </div>

    </section>
    <!-- /.main content -->




@endsection
