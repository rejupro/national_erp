<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdaterolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updateroles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('project_group')->nullable();
            $table->text('project_group_create')->nullable();
            $table->text('project_sub_group')->nullable();
            $table->text('project_sub_group_create')->nullable();
            $table->text('project_type')->nullable();
            $table->text('project_type_create')->nullable();
            $table->text('contractor_list')->nullable();
            $table->text('add_contractor')->nullable();
            $table->text('project_record')->nullable();
            $table->text('add_new_project')->nullable();
            //daily
            $table->text('daily_expense')->nullable();
            $table->text('daily_expense_create')->nullable();
            $table->text('expenses_record')->nullable();
            $table->text('create_expenses')->nullable();
            $table->text('expenses_head')->nullable();
            $table->text('add_expenses_head')->nullable();
            $table->text('daily_sales_report')->nullable();
            $table->text('bike_reading_report')->nullable();
            //requisition
            $table->text('requisition_create')->nullable();
            $table->text('all_requisitions')->nullable();
            $table->text('approve_requisitions')->nullable();
            $table->text('pending_requisitions')->nullable();
            // purchase
            $table->text('purchase_invoice')->nullable();
            $table->text('purchase_invoice_create')->nullable();
            // material use & sales
            $table->text('create_material_use_record')->nullable();
            $table->text('material_send_for_use')->nullable();
            $table->text('sales_invoice')->nullable();
            $table->text('sales_invoice_create')->nullable();
            // Inventory
            $table->text('product_delivery')->nullable();
            $table->text('product_received')->nullable();
            $table->text('branch_stock')->nullable();
            $table->text('warehouse_stock')->nullable();
            $table->text('transfer_from_branch')->nullable();
            $table->text('transfer_from_warehouse')->nullable();
            // client department setup
            $table->text('client_department_list')->nullable();
            $table->text('add_client_department')->nullable();
            $table->text('supplier_list')->nullable();
            $table->text('add_supplier')->nullable();
            $table->text('all_group')->nullable();
            $table->text('add_group')->nullable();
            // product setup
            $table->text('category_list')->nullable();
            $table->text('category_create')->nullable();
            $table->text('subcategory_list')->nullable();
            $table->text('subcategory_create')->nullable();
            $table->text('product_list')->nullable();
            $table->text('add_new_product')->nullable();
            // account setup
            $table->text('ac_class')->nullable();
            $table->text('ac_group_list')->nullable();
            $table->text('ac_group_create')->nullable();
            $table->text('ac_subgroup_list')->nullable();
            $table->text('ac_subgroup_create')->nullable();
            $table->text('ac_ledger_list')->nullable();
            $table->text('ac_ledger_create')->nullable();
            $table->text('ac_payment_voucherlist')->nullable();
            $table->text('ac_payment_vouchercreate')->nullable();
            $table->text('ac_receive_voucherlist')->nullable();
            $table->text('ac_receive_vouchercreate')->nullable();
            $table->text('ac_journal_entrylist')->nullable();
            $table->text('ac_journal_entrycreate')->nullable();
            // installment loan setup
            $table->text('loan_id_list')->nullable();
            $table->text('loan_id_create')->nullable();
            $table->text('loan_invoice_list')->nullable();
            $table->text('loan_invoice_create')->nullable();
            $table->text('loan_payment')->nullable();
            $table->text('loan_receive')->nullable();
            // lc setup
            $table->text('pi_list')->nullable();
            $table->text('pi_setup')->nullable();
            $table->text('lc_list')->nullable();
            $table->text('lc_setup')->nullable();
            // payroll
            $table->text('department_list')->nullable();
            $table->text('add_department')->nullable();
            $table->text('designation_list')->nullable();
            $table->text('add_designation')->nullable();
            $table->text('employee_list')->nullable();
            $table->text('add_employee')->nullable();
            $table->text('leave_type')->nullable();
            $table->text('add_leave_type')->nullable();
            $table->text('leav_record')->nullable();
            $table->text('add_leave_application')->nullable();
            $table->text('sallery_list')->nullable();
            $table->text('sallery_payslip')->nullable();
            // bank
            $table->text('bank_list')->nullable();
            $table->text('add_bank')->nullable();
            $table->text('bank_account')->nullable();
            $table->text('add_bank_account')->nullable();
            $table->text('mobile_account')->nullable();
            $table->text('add_mobile_account')->nullable();
            $table->text('all_transaction')->nullable();
            $table->text('add_transaction')->nullable();
            // user & role
            $table->text('role_list')->nullable();
            $table->text('add_role')->nullable();
            $table->text('all_user')->nullable();
            $table->text('add_user')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updateroles');
    }
}
