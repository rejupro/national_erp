<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Role;
use App\Updaterole;
use App\User;
use DB;

class RoleController extends Controller
{
    public function role_index()
    {
        $user = User::orderBy('created_at','desc')->where('status','!=','007')->get();
        return view('main.admin.user_role.role_list',compact('user'));
    }
    public function role_create()
    {
        $user = User::orderBy('created_at','desc')->where('status','!=','007')->get();
        return view('main.admin.user_role.role_create',compact('user'));
    }
    public function role_store(Request $request)
    {
        $input['id'] = $request->id;
        $input['status'] = $request->status;
        $input['manage_project'] = $request->manage_project;
        $input['daily_process'] = $request->daily_process;
        $input['requisition_record'] = $request->requisition_record;
        //$input['requisition_create'] = $request->requisition_create;
        $input['purchase'] = $request->purchase;
        $input['material_use'] = $request->material_use;
        $input['inventory'] = $request->inventory;
        $input['client'] = $request->client;
        $input['product'] = $request->product;
        $input['master'] = $request->master;
        $input['account'] = $request->account;
        $input['loan'] = $request->loan;
        $input['lc'] = $request->lc;
        //$input['financial'] = $request->financial;
        $input['payroll'] = $request->payroll;
        $input['bank'] = $request->bank;
        $input['user_role'] = $request->user_role;
        $input['report'] = $request->report;
        //$input['personal'] = $request->personal;
        $input['company_set'] = $request->company_set;
        $data = DB::table('users')->where('id', $request->id)->update($input);


        $user = Updaterole::where('user_id',$request->id)->first();
        $roles['user_id'] = $request->id;
        // Project Group
        $roles['project_group'] = $request->project_group;
        $roles['project_group_create'] = $request->project_group_create;
        $roles['project_sub_group'] = $request->project_sub_group;
        $roles['project_sub_group_create'] = $request->project_sub_group_create;
        $roles['project_type'] = $request->project_type;
        $roles['project_type_create'] = $request->project_type_create;
        $roles['contractor_list'] = $request->contractor_list;
        $roles['add_contractor'] = $request->add_contractor;
        $roles['project_record'] = $request->project_record;
        $roles['add_new_project'] = $request->add_new_project;
        // Daily Process
        $roles['daily_expense'] = $request->daily_expense;
        $roles['daily_expense_create'] = $request->daily_expense_create;
        $roles['expenses_record'] = $request->expenses_record;
        $roles['create_expenses'] = $request->create_expenses;
        $roles['expenses_head'] = $request->expenses_head;
        $roles['add_expenses_head'] = $request->add_expenses_head;
        $roles['daily_sales_report'] = $request->daily_sales_report;
        $roles['bike_reading_report'] = $request->bike_reading_report;
        // Requisition
        $roles['requisition_create'] = $request->requisition_create;
        $roles['all_requisitions'] = $request->all_requisitions;
        $roles['approve_requisitions'] = $request->approve_requisitions;
        $roles['pending_requisitions'] = $request->pending_requisitions;
        // Purchase
        $roles['purchase_invoice'] = $request->purchase_invoice;
        $roles['purchase_invoice_create'] = $request->purchase_invoice_create;
        // Material use & sales
        $roles['create_material_use_record'] = $request->create_material_use_record;
        $roles['material_send_for_use'] = $request->material_send_for_use;
        $roles['sales_invoice'] = $request->sales_invoice;
        $roles['sales_invoice_create'] = $request->sales_invoice_create;
        // Inventory
        $roles['product_delivery'] = $request->product_delivery;
        $roles['product_received'] = $request->product_received;
        $roles['branch_stock'] = $request->branch_stock;
        $roles['warehouse_stock'] = $request->warehouse_stock;
        $roles['transfer_from_branch'] = $request->transfer_from_branch;
        $roles['transfer_from_warehouse'] = $request->transfer_from_warehouse;
        // Client department setup
        $roles['client_department_list'] = $request->client_department_list;
        $roles['add_client_department'] = $request->add_client_department;
        $roles['supplier_list'] = $request->supplier_list;
        $roles['add_supplier'] = $request->add_supplier;
        $roles['all_group'] = $request->all_group;
        $roles['add_group'] = $request->add_group;
        // Product setup
        $roles['category_list'] = $request->category_list;
        $roles['category_create'] = $request->category_create;
        $roles['subcategory_list'] = $request->subcategory_list;
        $roles['subcategory_create'] = $request->subcategory_create;
        $roles['product_list'] = $request->product_list;
        $roles['add_new_product'] = $request->add_new_product;
        // Account setup
        $roles['ac_class'] = $request->ac_class;
        $roles['ac_group_list'] = $request->ac_group_list;
        $roles['ac_group_create'] = $request->ac_group_create;
        $roles['ac_subgroup_list'] = $request->ac_subgroup_list;
        $roles['ac_subgroup_create'] = $request->ac_subgroup_create;
        $roles['ac_ledger_list'] = $request->ac_ledger_list;
        $roles['ac_ledger_create'] = $request->ac_ledger_create;
        $roles['ac_payment_voucherlist'] = $request->ac_payment_voucherlist;
        $roles['ac_payment_vouchercreate'] = $request->ac_payment_vouchercreate;
        $roles['ac_receive_voucherlist'] = $request->ac_receive_voucherlist;
        $roles['ac_receive_vouchercreate'] = $request->ac_receive_vouchercreate;
        $roles['ac_journal_entrylist'] = $request->ac_journal_entrylist;
        $roles['ac_journal_entrycreate'] = $request->ac_journal_entrycreate;
        // Installment loan setup
        $roles['loan_id_list'] = $request->loan_id_list;
        $roles['loan_id_create'] = $request->loan_id_create;
        $roles['loan_invoice_list'] = $request->loan_invoice_list;
        $roles['loan_invoice_create'] = $request->loan_invoice_create;
        $roles['loan_payment'] = $request->loan_payment;
        $roles['loan_receive'] = $request->loan_receive;
        // lc setup
        $roles['pi_list'] = $request->pi_list;
        $roles['pi_setup'] = $request->pi_setup;
        $roles['lc_list'] = $request->lc_list;
        $roles['lc_setup'] = $request->lc_setup;
        // lc setup
        $roles['department_list'] = $request->department_list;
        $roles['add_department'] = $request->add_department;
        $roles['designation_list'] = $request->designation_list;
        $roles['add_designation'] = $request->add_designation;
        $roles['employee_list'] = $request->employee_list;
        $roles['add_employee'] = $request->add_employee;
        $roles['leave_type'] = $request->leave_type;
        $roles['add_leave_type'] = $request->add_leave_type;
        $roles['leav_record'] = $request->leav_record;
        $roles['add_leave_application'] = $request->add_leave_application;
        $roles['sallery_list'] = $request->sallery_list;
        $roles['sallery_payslip'] = $request->sallery_payslip;
        // lc setup
        $roles['bank_list'] = $request->bank_list;
        $roles['add_bank'] = $request->add_bank;
        $roles['bank_account'] = $request->bank_account;
        $roles['add_bank_account'] = $request->add_bank_account;
        $roles['mobile_account'] = $request->mobile_account;
        $roles['add_mobile_account'] = $request->add_mobile_account;
        $roles['all_transaction'] = $request->all_transaction;
        $roles['add_transaction'] = $request->add_transaction;
        // lc setup
        $roles['role_list'] = $request->role_list;
        $roles['add_role'] = $request->add_role;
        $roles['all_user'] = $request->all_user;
        $roles['add_user'] = $request->add_user;


        if($user === null){
            $roles = Updaterole::insert($roles);
        }else{
            $roles = Updaterole::where('user_id', $request->id)->update($roles);
        }
        
        if($data || $roles){
            return Redirect::back()->with('success', 'Data Added Successfully...!!!');
        }
        else{
            return Redirect::back()->with('warning', 'Data Can not be Added Successfully...!!!');
        }
    }

    public function role_edit($id)
    {
        $user = User::orderBy('created_at','desc')->where('id',$id)->first();
        $datas = Updaterole::where('user_id',$id)->first();
        return view('main.admin.user_role.role_edit',compact('user', 'datas'));
    }

    public function role_update(Request $request,$id)
    {

        $input['id'] = $request->id;
        $input['status'] = $request->status;
        $input['manage_project'] = $request->manage_project;
        $input['daily_process'] = $request->daily_process;
        $input['requisition_record'] = $request->requisition_record;
        $input['requisition_create'] = $request->requisition_create;
        $input['purchase'] = $request->purchase;
        $input['material_use'] = $request->material_use;
        $input['inventory'] = $request->inventory;
        $input['client'] = $request->client;
        $input['product'] = $request->product;
        $input['master'] = $request->master;
        $input['account'] = $request->account;
        $input['loan'] = $request->loan;
        $input['lc'] = $request->lc;
        $input['financial'] = $request->financial;
        $input['payroll'] = $request->payroll;
        $input['bank'] = $request->bank;
        $input['user_role'] = $request->user_role;
        $input['report'] = $request->report;
        $input['personal'] = $request->personal;
        $input['company_set'] = $request->company_set;
        $data = DB::table('users')->where('id', $request->id)->update($input);

        $user = Updaterole::where('user_id',$request->id)->first();
        $roles['user_id'] = $request->id;
        // Project Group
        $roles['project_group'] = $request->project_group;
        $roles['project_group_create'] = $request->project_group_create;
        $roles['project_sub_group'] = $request->project_sub_group;
        $roles['project_sub_group_create'] = $request->project_sub_group_create;
        $roles['project_type'] = $request->project_type;
        $roles['project_type_create'] = $request->project_type_create;
        $roles['contractor_list'] = $request->contractor_list;
        $roles['add_contractor'] = $request->add_contractor;
        $roles['project_record'] = $request->project_record;
        $roles['add_new_project'] = $request->add_new_project;
        // Daily Process
        $roles['daily_expense'] = $request->daily_expense;
        $roles['daily_expense_create'] = $request->daily_expense_create;
        $roles['expenses_record'] = $request->expenses_record;
        $roles['create_expenses'] = $request->create_expenses;
        $roles['expenses_head'] = $request->expenses_head;
        $roles['add_expenses_head'] = $request->add_expenses_head;
        $roles['daily_sales_report'] = $request->daily_sales_report;
        $roles['bike_reading_report'] = $request->bike_reading_report;
        // Requisition
        $roles['requisition_create'] = $request->requisition_create;
        $roles['all_requisitions'] = $request->all_requisitions;
        $roles['approve_requisitions'] = $request->approve_requisitions;
        $roles['pending_requisitions'] = $request->pending_requisitions;
        // Purchase
        $roles['purchase_invoice'] = $request->purchase_invoice;
        $roles['purchase_invoice_create'] = $request->purchase_invoice_create;
        // Material use & sales
        $roles['create_material_use_record'] = $request->create_material_use_record;
        $roles['material_send_for_use'] = $request->material_send_for_use;
        $roles['sales_invoice'] = $request->sales_invoice;
        $roles['sales_invoice_create'] = $request->sales_invoice_create;
        // Inventory
        $roles['product_delivery'] = $request->product_delivery;
        $roles['product_received'] = $request->product_received;
        $roles['branch_stock'] = $request->branch_stock;
        $roles['warehouse_stock'] = $request->warehouse_stock;
        $roles['transfer_from_branch'] = $request->transfer_from_branch;
        $roles['transfer_from_warehouse'] = $request->transfer_from_warehouse;
        // Client department setup
        $roles['client_department_list'] = $request->client_department_list;
        $roles['add_client_department'] = $request->add_client_department;
        $roles['supplier_list'] = $request->supplier_list;
        $roles['add_supplier'] = $request->add_supplier;
        $roles['all_group'] = $request->all_group;
        $roles['add_group'] = $request->add_group;
        // Product setup
        $roles['category_list'] = $request->category_list;
        $roles['category_create'] = $request->category_create;
        $roles['subcategory_list'] = $request->subcategory_list;
        $roles['subcategory_create'] = $request->subcategory_create;
        $roles['product_list'] = $request->product_list;
        $roles['add_new_product'] = $request->add_new_product;
        // Account setup
        $roles['ac_class'] = $request->ac_class;
        $roles['ac_group_list'] = $request->ac_group_list;
        $roles['ac_group_create'] = $request->ac_group_create;
        $roles['ac_subgroup_list'] = $request->ac_subgroup_list;
        $roles['ac_subgroup_create'] = $request->ac_subgroup_create;
        $roles['ac_ledger_list'] = $request->ac_ledger_list;
        $roles['ac_ledger_create'] = $request->ac_ledger_create;
        $roles['ac_payment_voucherlist'] = $request->ac_payment_voucherlist;
        $roles['ac_payment_vouchercreate'] = $request->ac_payment_vouchercreate;
        $roles['ac_receive_voucherlist'] = $request->ac_receive_voucherlist;
        $roles['ac_receive_vouchercreate'] = $request->ac_receive_vouchercreate;
        $roles['ac_journal_entrylist'] = $request->ac_journal_entrylist;
        $roles['ac_journal_entrycreate'] = $request->ac_journal_entrycreate;
        // Installment loan setup
        $roles['loan_id_list'] = $request->loan_id_list;
        $roles['loan_id_create'] = $request->loan_id_create;
        $roles['loan_invoice_list'] = $request->loan_invoice_list;
        $roles['loan_invoice_create'] = $request->loan_invoice_create;
        $roles['loan_payment'] = $request->loan_payment;
        $roles['loan_receive'] = $request->loan_receive;
        // lc setup
        $roles['pi_list'] = $request->pi_list;
        $roles['pi_setup'] = $request->pi_setup;
        $roles['lc_list'] = $request->lc_list;
        $roles['lc_setup'] = $request->lc_setup;
        // lc setup
        $roles['department_list'] = $request->department_list;
        $roles['add_department'] = $request->add_department;
        $roles['designation_list'] = $request->designation_list;
        $roles['add_designation'] = $request->add_designation;
        $roles['employee_list'] = $request->employee_list;
        $roles['add_employee'] = $request->add_employee;
        $roles['leave_type'] = $request->leave_type;
        $roles['add_leave_type'] = $request->add_leave_type;
        $roles['leav_record'] = $request->leav_record;
        $roles['add_leave_application'] = $request->add_leave_application;
        $roles['sallery_list'] = $request->sallery_list;
        $roles['sallery_payslip'] = $request->sallery_payslip;
        // lc setup
        $roles['bank_list'] = $request->bank_list;
        $roles['add_bank'] = $request->add_bank;
        $roles['bank_account'] = $request->bank_account;
        $roles['add_bank_account'] = $request->add_bank_account;
        $roles['mobile_account'] = $request->mobile_account;
        $roles['add_mobile_account'] = $request->add_mobile_account;
        $roles['all_transaction'] = $request->all_transaction;
        $roles['add_transaction'] = $request->add_transaction;
        // lc setup
        $roles['role_list'] = $request->role_list;
        $roles['add_role'] = $request->add_role;
        $roles['all_user'] = $request->all_user;
        $roles['add_user'] = $request->add_user;


        if($user === null){
            $roles = Updaterole::insert($roles);
        }else{
            $roles = Updaterole::where('user_id', $request->id)->update($roles);
        }

        if($data || $roles){
            return Redirect::back()->with('success', 'Data Updated Successfully...!!!');
        }
        else{
            return Redirect::back()->with('warning', 'Data Can not be Updated Successfully...!!!');
        }
    }

    public function role_destroy(Request $request,$id)
    {
        $input['status'] = "";
        $input['manage_project'] = "";
        $input['daily_process'] = "";
        $input['requisition_record'] = "";
        $input['requisition_create'] = "";
        $input['purchase'] = "";
        $input['material_use'] = "";
        $input['inventory'] = "";
        $input['client'] = "";
        $input['product'] = "";
        $input['master'] = "";
        $input['account'] = "";
        $input['loan'] = "";
        $input['lc'] = "";
        $input['financial'] = "";
        $input['payroll'] = "";
        $input['bank'] = "";
        $input['user_role'] = "";
        $input['report'] = "";
        $input['personal'] = "";
        $input['company_set'] = "";
        $data = DB::table('users')->where('id', $request->id)->update($input);

        $user = Updaterole::where('user_id',$request->id)->first();
        // Project Group
        $roles['project_group'] = "";
        $roles['project_group_create'] = "";
        $roles['project_sub_group'] = "";
        $roles['project_sub_group_create'] = "";
        $roles['project_type'] = "";
        $roles['project_type_create'] = "";
        $roles['contractor_list'] = "";
        $roles['add_contractor'] = "";
        $roles['project_record'] = "";
        $roles['add_new_project'] = "";
        // Daily Process
        $roles['daily_expense'] = "";
        $roles['daily_expense_create'] = "";
        $roles['expenses_record'] = "";
        $roles['create_expenses'] = "";
        $roles['expenses_head'] = "";
        $roles['add_expenses_head'] = "";
        $roles['daily_sales_report'] = "";
        $roles['bike_reading_report'] = "";
        // Requisition
        $roles['requisition_create'] = "";
        $roles['all_requisitions'] = "";
        $roles['approve_requisitions'] = "";
        $roles['pending_requisitions'] = "";
        // Purchase
        $roles['purchase_invoice'] = "";
        $roles['purchase_invoice_create'] = "";
        // Material use & sales
        $roles['create_material_use_record'] = "";
        $roles['material_send_for_use'] = "";
        $roles['sales_invoice'] = "";
        $roles['sales_invoice_create'] = "";
        // Inventory
        $roles['product_delivery'] = "";
        $roles['product_received'] = "";
        $roles['branch_stock'] = "";
        $roles['warehouse_stock'] = "";
        $roles['transfer_from_branch'] = "";
        $roles['transfer_from_warehouse'] = "";
        // Client department setup
        $roles['client_department_list'] = "";
        $roles['add_client_department'] = "";
        $roles['supplier_list'] = "";
        $roles['add_supplier'] = "";
        $roles['all_group'] = "";
        $roles['add_group'] = "";
        // Product setup
        $roles['category_list'] = "";
        $roles['category_create'] = "";
        $roles['subcategory_list'] = "";
        $roles['subcategory_create'] = "";
        $roles['product_list'] = "";
        $roles['add_new_product'] = "";
        // Account setup
        $roles['ac_class'] = "";
        $roles['ac_group_list'] = "";
        $roles['ac_group_create'] = "";
        $roles['ac_subgroup_list'] = "";
        $roles['ac_subgroup_create'] = "";
        $roles['ac_ledger_list'] = "";
        $roles['ac_ledger_create'] = "";
        $roles['ac_payment_voucherlist'] = "";
        $roles['ac_payment_vouchercreate'] = "";
        $roles['ac_receive_voucherlist'] = "";
        $roles['ac_receive_vouchercreate'] = "";
        $roles['ac_journal_entrylist'] = "";
        $roles['ac_journal_entrycreate'] = "";
        // Installment loan setup
        $roles['loan_id_list'] = "";
        $roles['loan_id_create'] = "";
        $roles['loan_invoice_list'] = "";
        $roles['loan_invoice_create'] = "";
        $roles['loan_payment'] = "";
        $roles['loan_receive'] = "";
        // lc setup
        $roles['pi_list'] = "";
        $roles['pi_setup'] = "";
        $roles['lc_list'] = "";
        $roles['lc_setup'] = "";
        // lc setup
        $roles['department_list'] = "";
        $roles['add_department'] = "";
        $roles['designation_list'] = "";
        $roles['add_designation'] = "";
        $roles['employee_list'] = "";
        $roles['add_employee'] = "";
        $roles['leave_type'] = "";
        $roles['add_leave_type'] = "";
        $roles['leav_record'] = "";
        $roles['add_leave_application'] = "";
        $roles['sallery_list'] = "";
        $roles['sallery_payslip'] = "";
        // lc setup
        $roles['bank_list'] = "";
        $roles['add_bank'] = "";
        $roles['bank_account'] = "";
        $roles['add_bank_account'] = "";
        $roles['mobile_account'] = "";
        $roles['add_mobile_account'] = "";
        $roles['all_transaction'] = "";
        $roles['add_transaction'] = "";
        // lc setup
        $roles['role_list'] = "";
        $roles['add_role'] = "";
        $roles['all_user'] = "";
        $roles['add_user'] = "";


        if($user !== null){
            $roles = Updaterole::where('user_id', $request->id)->update($roles);
        }

        if($data && $roles){
            return Redirect::back()->with('success', 'Data Deleted Successfully...!!!');
        }
        else{
            return Redirect::back()->with('error', 'Data Can not be Deleted Successfully...!!!');
        }
    }
}
