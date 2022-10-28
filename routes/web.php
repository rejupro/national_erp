<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
// .............................Admin Dashboard.......................
Route::get('/home', 'HomeController@index')->name('home');
// .............................Mastering.......................


// Raw Material
Route::get('/rawmaterial-list','Raw\RawMaterialController@index')->name('rawmaterial-list');
Route::get('/rawmaterial-add','Raw\RawMaterialController@addraw')->name('rawmaterial-add');
Route::post('/rawmaterial-store','Raw\RawMaterialController@rawstore')->name('rawstore');
Route::get('/rawmaterial-edit/{id}','Raw\RawMaterialController@materialedit')->name('materialedit');
Route::post('/rawmaterial-update/{id}','Raw\RawMaterialController@materialupdate')->name('materialupdate');
Route::get('/rawmaterial-delete/{id}','Raw\RawMaterialController@materialdelete')->name('materialdelete');
// Raw Material Purchase
Route::get('/rawmaterial-purchase','Raw\MaterialPurchaseController@purchase')->name('rawmaterial-purchase');
Route::get('/rawtocart/{id}','Raw\MaterialPurchaseController@rawtocart')->name('rawtocart');
Route::get('/rawcartdata','Raw\MaterialPurchaseController@rawcartdata')->name('rawcartdata');
Route::get('/rawcartremove/{id}','Raw\MaterialPurchaseController@rawcartremove')->name('rawcartremove');
// Raw Purchase Store
Route::post('/rawmaterial-purchase/store','Raw\MaterialPurchaseController@rawmaterial_purchasestore')->name('rawmaterial_purchasestore');
// Raw Material Stock
Route::get('/rawmaterial-stock','Raw\MaterialPurchaseController@material_stock')->name('material_stock');
Route::get('/rawmaterial-stock/{id}','Raw\MaterialPurchaseController@material_stocksingle')->name('material_stocksingle');
// Other Material
Route::get('/other-rawmateriallist','Raw\MaterialPurchaseController@other_rawmaterial')->name('other_rawmaterial');
Route::get('/other-rawmaterialadd','Raw\MaterialPurchaseController@other_rawmaterialadd')->name('other_rawmaterialadd');
Route::post('/other-rawmaterialstore','Raw\MaterialPurchaseController@other_rawmaterialstore')->name('other_rawmaterialstore');
Route::get('/other-rawmaterialedit/{id}','Raw\MaterialPurchaseController@other_rawmaterialedit')->name('other_rawmaterialedit');
Route::post('/other-rawmaterialupdate/{id}','Raw\MaterialPurchaseController@other_rawmaterialupdate')->name('other_rawmaterialupdate');
Route::get('/other-rawmaterialdelete/{id}','Raw\MaterialPurchaseController@other_rawmaterialdelete')->name('other_rawmaterialdelete');
// Raw Product Create
Route::get('/rawproduct/create','Raw\RawProductController@rawproduct_create')->name('rawproduct_create');
// Product In Cart
Route::get('/rawproduct/cart/{id}','Raw\RawProductController@rawproduct_cart')->name('rawproduct_cart');
Route::get('/rawproduct/cartlist','Raw\RawProductController@rawproduct_cartlist')->name('rawproduct_cartlist');
// Remove From List
Route::get('/rawproduct/cartremove/{id}','Raw\RawProductController@rawproduct_cartremove')->name('rawproduct_cartremove');
// Expense Cart
Route::get('/rawproduct/expense_cartadd/{id}','Raw\RawProductController@expense_cartadd')->name('expense_cartadd');
Route::get('/rawproduct/expense_cartlist','Raw\RawProductController@expense_cartlist')->name('expense_cartlist');
Route::get('/rawproduct/expense_cartremove/{id}','Raw\RawProductController@expense_cartremove')->name('expense_cartremove');
// In Stock
Route::post('/rawproduct/store','Raw\RawProductController@rawproduct_store')->name('rawproduct_store');







//..............................Brand...........................
    Route::get('/brandlist','Master\BrandController@index')->name('brand-list');
    Route::get('/brand_create','Master\BrandController@create')->name('brand-create-route');
    Route::post('/brand_store','Master\BrandController@store')->name('brand-store-route');
    Route::get('/brand_edit/{id}','Master\BrandController@edit')->name('brand-edit-route');
    Route::patch('/brand_update/{id}','Master\BrandController@update')->name('brand-update-route');
    Route::get('/brand_destroy/{id}','Master\BrandController@destroy')->name('brand-destroy-route');

//..........................Manufacturing........................................
    Route::get('/manufacturelist','Master\ManufactureController@index')->name('manufacture-list');
    Route::get('/manufacture_create','Master\ManufactureController@create')->name('manufacture-create-route');
    Route::post('/manufacture_store','Master\ManufactureController@store')->name('manufacture-store-route');
    Route::get('/manufacture_edit/{id}','Master\ManufactureController@edit')->name('manufacture-edit-route');
    Route::patch('/manufacture_update/{id}','Master\ManufactureController@update')->name('manufacture-update-route');
    Route::get('/manufacture_destroy/{id}','Master\ManufactureController@destroy')->name('manufacture-destroy-route');

//...............................Unit..............................................................
    Route::get('/unitlist','Master\UnitController@index')->name('unit-list');
    Route::get('/unit_create','Master\UnitController@create')->name('unit-create-route');
    Route::post('/unit_store','Master\UnitController@store')->name('unit-store-route');
    Route::get('/unit_destroy/{id}','Master\UnitController@destroy')->name('unit-destroy-route');
    Route::get('/unit_edit/{id}','Master\UnitController@edit')->name('unit-edit-route');
    Route::patch('/unit_update/{id}','Master\UnitController@update')->name('unit-update-route');

//....................................Country.........................................
    Route::get('/country_list','Master\CountryController@index')->name('country-list');
    Route::get('/country_create','Master\CountryController@create')->name('country-create-route');
    Route::post('/country_store','Master\CountryController@store')->name('country-store-route');
    Route::get('/country_destroy/{id}','Master\CountryController@destroy')->name('country-destroy-route');
    Route::get('/country_edit/{id}','Master\CountryController@edit')->name('country-edit-route');
    Route::patch('/country_update/{id}','Master\CountryController@update')->name('country-update-route');

//....................................Transport...................................................
    Route::get('/transportlist','Master\TransportController@index')->name('transport-list');
    Route::get('/transport_create','Master\TransportController@create')->name('transport-create-route');
    Route::post('/transport_store','Master\TransportController@store')->name('transport-store-route');
    Route::get('/transport_destroy/{id}','Master\TransportController@destroy')->name('transport-destroy-route');
    Route::get('/transport_edit/{id}','Master\TransportController@edit')->name('transport-edit-route');
    Route::patch('/transport_update/{id}','Master\TransportController@update')->name('transport-update-route');

//......................................Color..............................................
    Route::get('/colorlist','Master\ColorController@index')->name('color-list');
    Route::get('/color_create','Master\ColorController@create')->name('color-create-route');
    Route::post('/color_store','Master\ColorController@store')->name('color-store-route');
    Route::get('/color_destroy/{id}','Master\ColorController@destroy')->name('color-destroy-route');
    Route::get('/color_edit/{id}','Master\ColorController@edit')->name('color-edit-route');
    Route::patch('/color_update/{id}','Master\ColorController@update')->name('color-update-route');

//......................................District..............................................
    Route::get('/districtlist','Master\DistrictController@index')->name('district-list');
    Route::get('/district_create','Master\DistrictController@create')->name('district-create-route');
    Route::post('/district_store','Master\DistrictController@store')->name('district-store-route');
    Route::get('/district_destroy/{id}','Master\DistrictController@destroy')->name('district-destroy-route');
    Route::get('/district_edit/{id}','Master\DistrictController@edit')->name('district-edit-route');
    Route::patch('/district_update/{id}','Master\DistrictController@update')->name('district-update-route');

//......................................Zone..............................................
    Route::get('/zonelist','Master\ZoneController@index')->name('zone-list');
    Route::get('/zone_create','Master\ZoneController@create')->name('zone-create-route');
    Route::post('/zone_store','Master\ZoneController@store')->name('zone-store-route');
    Route::get('/zone_destroy/{id}','Master\ZoneController@destroy')->name('zone-destroy-route');
    Route::get('/zone_edit/{id}','Master\ZoneController@edit')->name('zone-edit-route');
    Route::patch('/zone_update/{id}','Master\ZoneController@update')->name('zone-update-route');

//......................................Currency..............................................
    Route::get('/currencylist','Master\CurrencyController@index')->name('currency-list');
    Route::get('/currency_create','Master\CurrencyController@create')->name('currency-create-route');
    Route::post('/currency_store','Master\CurrencyController@store')->name('currency-store-route');
    Route::get('/currency_destroy/{id}','Master\CurrencyController@destroy')->name('currency-destroy-route');
    Route::get('/currency_edit/{id}','Master\CurrencyController@edit')->name('currency-edit-route');
    Route::patch('/currency_update/{id}','Master\CurrencyController@update')->name('currency-update-route');

//......................................Size..............................................
    Route::get('/sizelist','Master\SizeController@index')->name('size-list');
    Route::get('/size_create','Master\SizeController@create')->name('size-create-route');
    Route::post('/size_store','Master\SizeController@store')->name('size-store-route');
    Route::get('/size_destroy/{id}','Master\SizeController@destroy')->name('size-destroy-route');
    Route::get('/size_edit/{id}','Master\SizeController@edit')->name('size-edit-route');
    Route::patch('/size_update/{id}','Master\SizeController@update')->name('size-update-route');

//......................................accounts......................................

    Route::get('/class','Accounts\ClassController@index')->name('class-list');

//......................................Group.......................................
    Route::get('/acc_grouplist','Accounts\GroupController@index')->name('acc-group-list');
    Route::get('/acc_grouplist/create','Accounts\GroupController@create')->name('acc-group-create-route');
    Route::post('/acc_grouplist/store','Accounts\GroupController@store')->name('acc-group-store-route');
    Route::get('/acc_grouplist/edit/{id}','Accounts\GroupController@edit')->name('acc-group-edit-route');
    Route::patch('/acc_grouplist/update/{id}','Accounts\GroupController@update')->name('acc-group-update-route');
    Route::get('/acc_grouplist/destroy/{id}','Accounts\GroupController@destroy')->name('acc-group-destroy-route');

//...........................SubGroup..............................
    Route::get('/subgrouplist','Accounts\SubGroupController@index')->name('subgroup-list');
    Route::get('/subgrouplist/create','Accounts\SubGroupController@create')->name('subgroup-create-route');
    Route::post('/subgrouplist/store','Accounts\SubGroupController@store')->name('subgroup-store-route');
    Route::get('/subgrouplist/edit/{id}','Accounts\SubGroupController@edit')->name('subgroup-edit-route');
    Route::patch('/subgrouplist/update/{id}','Accounts\SubGroupController@update')->name('subgroup-update-route');
    Route::get('/subgrouplist/destroy/{id}','Accounts\SubGroupController@destroy')->name('subgroup-destroy-route');

//...........................Ledger..............................
    Route::get('/ledgerlist','Accounts\LedgerController@index')->name('ledger-list');
    Route::get('/ledgerlist/create','Accounts\LedgerController@create')->name('ledger-create-route');
    Route::post('/ledgerlist/store','Accounts\LedgerController@store')->name('ledger-store-route');
    Route::get('/ledgerlist/edit/{id}','Accounts\LedgerController@edit')->name('ledger-edit-route');
    Route::patch('/ledgerlist/update/{id}','Accounts\LedgerController@update')->name('ledger-update-route');
    Route::get('/ledgerlist/destroy/{id}','Accounts\LedgerController@destroy')->name('ledger-destroy-route');

//...................................Payment Vouchar...................................................
    Route::get('/paymentvoucharlist','Accounts\PaymentVoucharController@index')->name('paymentvouchar-list');
    Route::get('/countTotalCash','Accounts\PaymentVoucharController@countTotalCash')->name('countTotalCash');
    Route::get('/paymentvoucharlist/create','Accounts\PaymentVoucharController@create')->name('paymentvouchar-create-route');
    Route::get('/get-supplier-invoice/{supplier_id}','Accounts\PaymentVoucharController@getSupplierInvoice')->name('get-supplier-invoice-route');
    Route::get('paymentvoucherlist/destroy/{id}','Accounts\PaymentVoucharController@destroy')->name('paymentvoucher-destroy-route');
    Route::post('/paymentlist/store','Accounts\PaymentVoucharController@store')->name('paymentlist-store-route');
    Route::get('paymentvoucherlist/view/{id}','Accounts\PaymentVoucharController@view')->name('paymentvoucher-view-route');

//......................................Receive Voucher..........................................................
    Route::get('/receivevoucherlist','Accounts\ReceiveVoucharController@index')->name('receivevoucher-list');
    Route::get('/receivevoucherlist/create','Accounts\ReceiveVoucharController@create')->name('receivevoucher-create-route');
    Route::get('/get-supplier-rcv-invoice/{supplier_id}','Accounts\ReceiveVoucharController@getSupplierInvoice')->name('get-rcv-supplier-invoice-route');
    Route::get('receivevoucherlist/destroy/{id}','Accounts\ReceiveVoucharController@destroy')->name('receivevoucher-destroy-route');
    Route::post('/receivelist/store','Accounts\ReceiveVoucharController@store')->name('receivelist-store-route');

    Route::get('receivevoucherlist/view/{id}','Accounts\ReceiveVoucharController@view')->name('receivevoucher-view-route');

//......................................journal......................................................................
    Route::get('/journallist','Accounts\JournalController@index')->name('journal-list');
    Route::get('/journallist/create','Accounts\JournalController@create')->name('journallist-create-route');
    Route::get('/journallist/find_ledger','Accounts\JournalController@find_debit_ledger')->name('find_debit_ledger');
    Route::post('/journallist/store','Accounts\JournalController@store')->name('journallist-store-route');
    Route::get('/journallist/show/{id}','Accounts\JournalController@show')->name('journallist-view-route');
    Route::get('/journallist/destroy/{id}','Accounts\JournalController@destroy')->name('journallist-destroy-route');
// Route::post('/ledgerlist/store','Accounts\LedgerController@store')->name('ledger-store-route');
// Route::get('/ledgerlist/edit/{id}','Accounts\LedgerController@edit')->name('ledger-edit-route');
// Route::patch('/ledgerlist/update/{id}','Accounts\LedgerController@update')->name('ledger-update-route');
// Route::get('/ledgerlist/destroy/{id}','Accounts\LedgerController@destroy')->name('ledger-destroy-route');
//...................................Product Setup...................................................

//...................................Product Setup...................................................

//............................Category...........................................................
    Route::get('/categorylist','Product\CategoryController@index')->name('category-list');
    Route::get('/categorylist/create','Product\CategoryController@create')->name('category-create-route');
    Route::post('/categorylist/store','Product\CategoryController@store')->name('category-store-route');
    Route::get('/categorylist/edit/{id}','Product\CategoryController@edit')->name('category-edit-route');
    Route::patch('/categorylist/update/{id}','Product\CategoryController@update')->name('category-update-route');
    Route::get('/categorylist/destroy/{id}','Product\CategoryController@destroy')->name('category-destroy-route');

//......................................SubCategory...............................................
    Route::get('/subcategorylist','Product\SubCategoryController@index')->name('subcategory-list');
    Route::get('/subcategorylist/create','Product\SubCategoryController@create')->name('subcategory-create-route');
    Route::post('/subcategorylist/store','Product\SubCategoryController@store')->name('subcategory-store-route');
    Route::get('/subcategorylist/edit/{id}','Product\SubCategoryController@edit')->name('subcategory-edit-route');
    Route::patch('/subcategorylist/update/{id}','Product\SubCategoryController@update')->name('subcategory-update-route');
    Route::get('/subcategorylist/destroy/{id}','Product\SubCategoryController@destroy')->name('subcategory-destroy-route');

//......................................Product...............................................
    Route::get('/productlist','Product\ProductController@index')->name('product-list');
    Route::get('/productlist/create','Product\ProductController@create')->name('product-create-route');
    Route::post('/productlist/store','Product\ProductController@store')->name('product-store-route');
    Route::get('/productlist/edit/{id}','Product\ProductController@edit')->name('product-edit-route');
    Route::patch('/productlist/update/{id}','Product\ProductController@update')->name('product-update-route');
    Route::get('/productlist/destroy/{id}','Product\ProductController@destroy')->name('product-destroy-route');

//......................................Clint Setup...............................................
//................................Customer message.......................................................
    Route::get('/contact_message_list','Client\MessageController@index')->name('contact_message_list');
    Route::get('/contact_message/view/{id}','Client\MessageController@view_full_message')->name('view_full_message');

//................................Customer.......................................................
    Route::get('/clintlist','Client\CustomerController@index')->name('customer-list');
    Route::get('/clintlist/create','Client\CustomerController@create')->name('customer-create-route');
    Route::post('/clienttlist/store','Client\CustomerController@store')->name('customer-store-route');
    Route::get('/clienttlist/edit/{id}','Client\CustomerController@edit')->name('customer-edit-route');
    Route::patch('/clienttlist/update/{id}','Client\CustomerController@update')->name('customer-update-route');
    Route::get('/clienttlist/destroy/{id}','Client\CustomerController@destroy')->name('customer-destroy-route');
    Route::get('client/details/{id}','Client\CustomerController@client_details')->name('client-details-page');

//.....................................Supplier..........................................
    Route::get('/supplierlist','Client\SupplierController@index')->name('supplier-list');
    Route::get('/supplierlist/create','Client\SupplierController@create')->name('supplier-create-route');
    Route::post('/supplierlist/store','Client\SupplierController@store')->name('supplier-store-route');
    Route::get('/supplierlist/edit/{id}','Client\SupplierController@edit')->name('supplier-edit-route');
    Route::patch('/supplierlist/update/{id}','Client\SupplierController@update')->name('supplier-update-route');
    Route::get('/supplierlist/destroy/{id}','Client\SupplierController@destroy')->name('supplier-destroy-route');
    Route::get('supplier/details/{id}','Client\SupplierController@supplier_details')->name('supplier-details-page');

/*.....................................Group.......................................... */
    Route::get('/grouplist','Client\GroupController@index')->name('group-list');
    Route::get('/grouplist/create','Client\GroupController@create')->name('group-create-route');
    Route::post('/grouplist/store','Client\GroupController@store')->name('group-store-route');
    Route::get('/grouplist/edit/{id}','Client\GroupController@edit')->name('group-edit-route');
    Route::patch('/grouplist/update/{id}','Client\GroupController@update')->name('group-update-route');
    Route::get('/grouplist/destroy/{id}','Client\GroupController@destroy')->name('group-destroy-route');

//....................................Inventory..........................................

//..........................................Branch..........................................
    Route::get('/branchlist','Inventory\BranchController@index')->name('branch-list');
    Route::get('/branchlist/create','Inventory\BranchController@create')->name('branch-create-route');
    Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
    Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
    Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
    Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');

//..........................................Branch Stock..........................................
    Route::get('/branchstock/list','Inventory\Transfer_B_Controller@index')->name('branch-transfer-stock-list');
    Route::get('/branchstock/create','Inventory\Transfer_B_Controller@create')->name('branch-transfer-stock-create');
    Route::get('/branchstock/productfind/{branch_id_from}','Inventory\Transfer_B_Controller@find_product')->name('find_product_for_transfer_branch');
    Route::post('/branchstock/store','Inventory\Transfer_B_Controller@store')->name('branch-transfer-stock-store');

//....................................Warehouse..........................................
    Route::get('/warehouselist','Inventory\WarehouseController@index')->name('warehouse-list');
    Route::get('/warehouselist/create','Inventory\WarehouseController@create')->name('warehouse-create-route');
    Route::post('/warehouselist/store','Inventory\WarehouseController@store')->name('warehouse-store-route');
    Route::get('/warehouselist/edit/{id}','Inventory\WarehouseController@edit')->name('warehouse-edit-route');
    Route::patch('/warehouselist/update/{id}','Inventory\WarehouseController@update')->name('warehouse-update-route');
    Route::get('/warehouselist/destroy/{id}','Inventory\WarehouseController@destroy')->name('warehouse-destroy-route');

//..........................................Warehouse Stock..........................................
    Route::get('/warehousestock/list','Inventory\Transfer_WH_Controller@index')->name('warehouse-transfer-stock-list');
    Route::get('/warehousestock/create','Inventory\Transfer_WH_Controller@create')->name('warehouse-transfer-stock-create');
    Route::get('/warehousestock/productfind/{warehouse_id_from}','Inventory\Transfer_WH_Controller@find_product')->name('find_product_for_transfer_warehouse');
    Route::post('/warehousestock/store','Inventory\Transfer_WH_Controller@store')->name('warehouse-transfer-stock-store');

//....................................Product  Receive..........................................
    Route::get('/product/delivery_list','Inventory\ProDeliveryController@index')->name('prodelivery-list');
    Route::get('/product/delivery_list/create','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
    Route::get('/product/receive_list','Inventory\ProReceiveController@index')->name('proreceive-list');
    Route::get('/product/receive','Inventory\ProReceiveController@create')->name('proreceive-create-route');
    Route::post('/product/receive/store','Inventory\ProReceiveController@receipt_store')->name('product-receive-store');
    Route::post('/product/stock/store','Inventory\ProReceiveController@stock_store')->name('product-stock-store');
    Route::get('/product/receive_view/{id}','Inventory\ProReceiveController@show')->name('proreceive-view');
    Route::get('/product/receivedestroy/{id}','Inventory\ProReceiveController@receive_destroy')->name('productreceive-delete');
// Route::get('/product/show/{id}','Inventory\ProReceiveController@show')->name('pro-receive-view');
// Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
// Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
// Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
// Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');

//....................................Product  Delivery..........................................
    Route::get('/product/delivery_list','Inventory\ProDeliveryController@index')->name('prodelivery-list');
    Route::get('/product/delivery','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
    Route::post('/product/delivery/store','Inventory\ProDeliveryController@delivery_store')->name('product-delivery-store');
    Route::post('/product/deliverystock/store','Inventory\ProDeliveryController@stock_store')->name('prodelivery-stock-store');
    Route::get('/product/delivery_view/{id}','Inventory\ProDeliveryController@show')->name('prodelivery-view');
    Route::get('/product/destroy/{id}','Inventory\ProDeliveryController@destroy')->name('prodelivery-destroy');

//....................................Stock..........................................
    Route::get('/branchstocklist','Inventory\B_StockController@index')->name('bstock-list');
    Route::get('/warehousestocklist','Inventory\WH_StockController@index')->name('whstock-list');
    Route::get('/combinedstocklist','Inventory\Combined_StockController@index')->name('combinedstock-list');
// Route::get('/prodeliverylist/create','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
// Route::get('/proreceivelist','Inventory\ProReceiveController@index')->name('proreceive-list');
// Route::get('/proreceivelist/create','Inventory\ProReceiveController@create')->name('proreceive-create-route');
// Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
// Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
// Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
// Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');


//....................................Payroll..........................................
//....................................Department Management..........................................
    Route::get('/payroll/department','Department\DepartmentController@department_index')->name('department-list-page');
    Route::get('/payroll/department/create','Department\DepartmentController@create_page')->name('department-create-page');
    Route::post('/payroll/department/store','Department\DepartmentController@dept_store')->name('department-store-page');
    Route::get('/payroll/department/edit/{id}','Department\DepartmentController@edit_page')->name('department-edit-page');
    Route::post('/payroll/departmentupdate/{id}','Department\DepartmentController@update_store')->name('department-update-page');
    Route::get('/payroll/department/delete/{id}','Department\DepartmentController@department_destroy')->name('department-delete-page');

//....................................Designation Management..........................................
    Route::get('/payroll/designation','Designation\DesignationController@designation_index')->name('designation-list-page');
    Route::get('/payroll/designation/create','Designation\DesignationController@create_page')->name('designation-create-page');
    Route::post('/payroll/designation/store','Designation\DesignationController@dept_store')->name('designation-store-page');
    Route::get('/payroll/designation/edit/{id}','Designation\DesignationController@edit_page')->name('designation-edit-page');
    Route::post('/payroll/designationupdate/{id}','Designation\DesignationController@update_store')->name('designation-update-page');
    Route::get('/payroll/designation/delete/{id}','Designation\DesignationController@designation_destroy')->name('designation-delete-page');
//....................................Employee Management..........................................
    Route::get('/payroll/employee','Employee\EmployeeController@employee_index')->name('employee-list-page');
    Route::get('/payroll/employee/create','Employee\EmployeeController@create_page')->name('employee-create-page');
    Route::post('/payroll/employee/store','Employee\EmployeeController@employee_store')->name('employee-store-page');
    Route::get('/payroll/employee/edit/{id}','Employee\EmployeeController@edit_page')->name('employee-edit-page');
    Route::post('/payroll/employee/update/{id}','Employee\EmployeeController@update_store')->name('employee-update-page');
    Route::get('/payroll/employee/delete/{id}','Employee\EmployeeController@employee_destroy')->name('employee-delete-page');
    Route::get('employee/details/{id}','Employee\EmployeeController@employee_details')->name('employee-details-page');
//....................................Leave Type Management..........................................
    Route::get('/payroll/leavetype','Payroll\LeaveController@leavetype_index')->name('leavetype-list-page');
    Route::get('/payroll/leavetype/create','Payroll\LeaveController@leavetype_create')->name('leavetype-create-page');
    Route::post('/payroll/leavetype/store','Payroll\LeaveController@leavetype_store')->name('leavetype-store-page');
    Route::get('/payroll/leavetype/edit/{id}','Payroll\LeaveController@leavetype_edit')->name('leavetype-edit-page');
    Route::post('/payroll/leavetype/update/{id}','Payroll\LeaveController@leavetype_update')->name('leavetype-update-page');
    Route::get('/payroll/leavetype/delete/{id}','Payroll\LeaveController@leavetype_destroy')->name('leavetype-delete-page');

//....................................Leave Type Management..........................................
    Route::get('/payroll/leaveapp','Payroll\LeaveController@leaveapp_index')->name('leaveapp-list-page');
    Route::get('/payroll/leaveapp/create','Payroll\LeaveController@leaveapp_create')->name('leaveapp-create-page');
    Route::post('/payroll/leaveapp/store','Payroll\LeaveController@leaveapp_store')->name('leaveapp-store-page');
    Route::get('/payroll/leaveapp/edit/{id}','Payroll\LeaveController@leaveapp_edit')->name('leaveapp-edit-page');
    Route::post('/payroll/leaveapp/update/{id}','Payroll\LeaveController@leaveapp_update')->name('leaveapp-update-page');
    Route::get('/payroll/leaveapp/delete/{id}','Payroll\LeaveController@leaveapp_destroy')->name('leaveapp-delete-page');
    Route::get('/payroll/salary','Payroll\SalaryController@salary_index')->name('salary-list-page');
    Route::get('/payroll/emp_salary/create','Payroll\SalaryController@salary_create')->name('salary-create-page');
    Route::post('/payroll/emp_salary/store','Payroll\SalaryController@salary_store')->name('salary-store');
    Route::get('/payroll/emp_salary/edit/{id}','Payroll\SalaryController@salary_edit')->name('salary-edit-page');
    Route::get('/payroll/emp_salary/delete/{id}','Payroll\SalaryController@salary_destroy')->name('salary-delete-page');
    Route::get('/payroll/payslip','Payroll\SalaryController@payslip_index')->name('payslip-list-page');
    Route::get('/payroll/payslip/create','Payroll\SalaryController@payslip_create')->name('payslip-create-page');
    Route::post('/payroll/payslip/store','Payroll\SalaryController@payslip_store')->name('payslip-store');
    Route::get('/payroll/payslip/edit/{id}','Payroll\SalaryController@payslip_edit')->name('payslip-edit-page');
    Route::get('/payroll/payslip/delete/{id}','Payroll\SalaryController@payslip_destroy')->name('payslip-delete-page');

    // payslip get sallery
    Route::get('/payroll/payslip/salaryajax/{id}','Payroll\SalaryController@payslip_salaryajax')->name('payslip_salaryajax');

//....................................Purchase Management.........................................
    Route::get('/purchase/list','Purchase\PurchaseController@purchase_index')->name('purchase-list-page');
    Route::get('/purchase/create','Purchase\PurchaseController@purchase_create')->name('purchase-create-page');
    Route::get('/purchase/search/product','Purchase\PurchaseController@search_product')->name('search_product_by_alphabet');
    Route::get('/purchase/search/title','Purchase\PurchaseController@search_product_title')->name('search_product_by_name');
    Route::get('/purchase/search','Purchase\PurchaseController@search_product_name_code')->name('search_product_by_name_code');
    Route::get('/cart/delete','Purchase\PurchaseController@delete_cart')->name('delete_cart_list');
    Route::get('/cart/create','Purchase\PurchaseController@add_to_cart')->name('add-to-cart');
    Route::post('/cart/process','Purchase\PurchaseController@add_product_details')->name('add_product_details');
    Route::get('/checkout/','Purchase\PurchaseController@checkout_page')->name('view_checkout_page');

    Route::get('/cart/list','Purchase\PurchaseController@view_cart')->name('view_cart_list');
    Route::get('/cart/edit/{id}','Purchase\PurchaseController@edit_cart')->name('edit-to-cart');
    Route::post('/purchase/store','Purchase\PurchaseController@purchase_store')->name('purchase-store-page');
    Route::get('/purchase/edit/{id}','Purchase\PurchaseController@purchase_edit')->name('purchase-edit-page');
    Route::post('/purchase/update/{id}','Purchase\PurchaseController@purchase_update')->name('purchase-update-page');
    Route::get('/purchase/delete/{id}','Purchase\PurchaseController@purchase_destroy')->name('purchase-delete-page');
    Route::get('/purchese/show/{id}','Purchase\PurchaseController@show')->name('purchese-view-page');


    // reju ajax cartdata
    Route::get('/ajax_cartdata','Purchase\PurchaseController@ajax_cartdata')->name('ajax_cartdata');
    Route::post('/ajax_cartdataupdate/{id}','Purchase\PurchaseController@ajax_cartdataupdate')->name('ajax_cartdataupdate');



//....................................Sales Management.........................................
    Route::get('/sales/list','Sales\salesController@sales_index')->name('sales-list-page');
    Route::get('/sales/create','Sales\salesController@sales_create')->name('sales-create-page');
    Route::get('/sales/search/product','Sales\salesController@search_product')->name('search_product_by_alphabet_for_sale');
    Route::get('/sales/search/title','Sales\salesController@search_product_title')->name('search_product_by_name_for_sale');
    Route::get('/sales/search','Sales\salesController@search_product_name_code')->name('search_product_by_name_code_for_sale');
    Route::get('/sales_cart/create','Sales\salesController@add_to_sales_cart')->name('add-to-cart_for_sale');
    Route::get('/sales_cart/delete/','Sales\salesController@delete_sales_cart')->name('delete_cart_list_for_sale');
    Route::post('/sales_cart/processing','Sales\salesController@add_purchase')->name('add_purchase_details');
    Route::get('/sales/checkout','Sales\salesController@sales_checkout_page')->name('view_sales_checkout_page');

    Route::get('/sales_cart/list','Sales\salesController@view_sales_cart')->name('view_sales_cart_list');
    Route::get('/sales_cart/edit/{id}','Sales\salesController@edit_sales_cart')->name('edit-to-sales-cart');
    Route::post('/sales/store','Sales\salesController@sales_store')->name('sales-store-page');
    Route::get('/sales/edit/{id}','Sales\salesController@sales_edit')->name('sales-edit-page');
    Route::post('/sales/update/{id}','Sales\salesController@sales_update')->name('sales-update-page');
    Route::get('/sales/delete/{id}','Sales\salesController@sales_destroy')->name('sales-delete-page');
    Route::get('/sales/show/{id}','Sales\salesController@show')->name('sales-view-page');

//....................................Daily Sales Report Management.........................................
    Route::get('/daily-sales-report/list','DailySales\DailySalesController@sales_report_index')->name('daily-sales-list-page');
    Route::get('/daily-sales-report/add','DailySales\DailySalesController@sales_report_add')->name('daily-sales-create-page');
    Route::post('/daily-sales-report/store','DailySales\DailySalesController@sales_report_store')->name('daily-sales-store-page');
    Route::get('/daily-sales-view/{id}','DailySales\DailySalesController@sales_report_view')->name('daily-sales-view-page');
    Route::get('/daily-sales-edit/{id}','DailySales\DailySalesController@sales_report_edit')->name('daily-sales-edit-page');

//....................................Daily Sales Report Management.........................................
    Route::get('/bike_reading/list','DailyProcess\BikeReadingController@index')->name('bike-reading-list-page');
    Route::get('/bike_reading/add','DailyProcess\BikeReadingController@addpage')->name('bike-reading-create-page');
    Route::post('/bike_reading/store','DailyProcess\BikeReadingController@store')->name('bike-reading-store');
    Route::get('/bike_reading-edit/{id}','DailyProcess\BikeReadingController@editpage')->name('bike-reading-edit-page');
    Route::post('/bike_reading-report','DailyProcess\BikeReadingController@report')->name('bike-reading-report-page');

//....................................Material Use Management.........................................
    Route::get('/materialuse/create','Materialrecord\MaterialUseRecordController@record_create')->name('materialuse-create-page');
    Route::post('/materialuse/cart','Materialrecord\MaterialUseRecordController@record_cart_create')->name('add-to-record-cart');
    Route::post('/materialuse/addcart','Materialrecord\MaterialUseRecordController@store_to_cart')->name('store-to-cart');
    Route::get('/materialuse/cart/list','Materialrecord\MaterialUseRecordController@cart_list')->name('view_material-cart_list');
    Route::get('/materialuse/checkout/','Materialrecord\MaterialUseRecordController@checkout_page')->name('materialuse-checkout-page');
    Route::post('/materialuse/record/store','Materialrecord\MaterialUseRecordController@record_store')->name('record-store-update');
    Route::get('/materialuse/record/list','Materialrecord\MaterialUseRecordController@record_list')->name('view_material-record-list');
    Route::get('/purchase/list','Purchase\PurchaseController@purchase_index')->name('purchase-list-page');

    Route::get('/materialuse/show/{id}','Materialrecord\MaterialUseRecordController@show')->name('material-view-page');
    Route::get('/materialuse/delete/{id}','Materialrecord\MaterialUseRecordController@destroy')->name('material-delete-page');

// Route::get('/checkout/','Purchase\PurchaseController@checkout_page')->name('view_checkout_page');
// Route::post('/purchase/store','Purchase\PurchaseController@purchase_store')->name('purchase-store-page');
// Route::get('/purchase/edit/{id}','Purchase\PurchaseController@purchase_edit')->name('purchase-edit-page');
// Route::post('/purchase/update/{id}','Purchase\PurchaseController@purchase_update')->name('purchase-update-page');
// Route::get('/purchase/delete/{id}','Purchase\PurchaseController@purchase_destroy')->name('purchase-delete-page');
// Route::get('/purchese/show/{id}','Purchase\PurchaseController@show')->name('purchese-view-page');

//....................................Role Management..........................................
    Route::get('/role/list','Role\RoleController@role_index')->name('role-list-page');
    Route::get('/role/create','Role\RoleController@role_create')->name('role-create-page');
    Route::post('/role/store','Role\RoleController@role_store')->name('role-store-page');
    Route::get('/role/edit/{id}','Role\RoleController@role_edit')->name('role-edit-page');
    Route::post('/role/update/{id}','Role\RoleController@role_update')->name('role-update-page');
    Route::get('/role/delete/{id}','Role\RoleController@role_destroy')->name('role-delete-page');
//....................................User Management..........................................
    Route::get('/user/list','Role\UserController@user_index')->name('user-list-page');
    Route::get('/user/create','Role\UserController@user_create')->name('user-create-page');
    Route::post('/user/store','Role\UserController@user_store')->name('user-store-page');
    Route::get('/user/edit/{id}','Role\UserController@user_edit')->name('user-edit-page');
    Route::post('/user/update/{id}','Role\UserController@user_update')->name('user-update-page');
    Route::get('/user/delete/{id}','Role\UserController@user_destroy')->name('user-delete-page');
    // language change
    Route::get('language_bn','Role\UserController@language_bn')->name('language_bn');
    Route::get('language_en','Role\UserController@language_en')->name('language_en');

///////////////////////////////////-----------BANK PART-------------//////////////////////////
//.................................Bank setup Management Section.....................................
    Route::get('/create_bank', 'Bank\bankController@create_bank')->name('create-bank-page');
    Route::post('/store_bank', 'Bank\bankController@store_bank')->name('create-bank-store');
    Route::get('/bank_list', 'Bank\bankController@list_bank')->name('create-bank-list');
    Route::get('/bank_edit/{id}', 'Bank\bankController@bank_edit')->name('edit-bank-page');
    Route::post('/bank_update/{id}', 'Bank\bankController@update_bank')->name('edit-bank-update');
    Route::get('/bank_delete/{id}', 'Bank\bankController@bank_destroy')->name('delete-bank-page');
//.................................Bank Account setup Management Section.....................................
    Route::get('/create_bankaccount', 'Bank\bankaccountController@create_bankaccount')->name('create-bankaccount-page');
    Route::post('/store_bankaccount', 'Bank\bankaccountController@store_bankaccount')->name('bankaccount_create_store');
    Route::get('/create_listbankaccount', 'Bank\bankaccountController@list_bankaccount')->name('create-bankaccount-list');
    Route::get('/bankaccount_edit/{id}', 'Bank\bankaccountController@bankaccount_edit')->name('edit-bankaccount-page');
    Route::post('/bankaccount_update/{id}', 'Bank\bankaccountController@update_bankaccount')->name('edit-bankaccount-update');
    Route::get('/bankaccount_delete/{id}', 'Bank\bankaccountController@bankaccount_destroy')->name('delete-bankaccount-page');
//.................................Mobile Acount setup Management Section.....................................
    Route::get('/create_mobileaccount', 'Bank\mobileaccountController@create_mobileaccount')->name('create-mobileaccount-page');
    Route::post('/store/mobileaccount', 'Bank\mobileaccountController@store_mobileaccount')->name('create-mobileaccount-store');
    Route::get('/mobileaccount_list', 'Bank\mobileaccountController@list_maccount')->name('mobileaccount-list');
    Route::get('/mobileaccount_edit/{id}', 'Bank\mobileaccountController@mobileaccount_edit')->name('edit-mobileaccount-page');
    Route::post('/mobileaccount_update/{id}', 'Bank\mobileaccountController@update_mobileaccount')->name('edit-mobileaccount-update');
    Route::get('/mobileaccount_delete/{id}', 'Bank\mobileaccountController@mobileaccount_destroy')->name('delete-mobileaccount');

//......................................Bank Transactions..........................................................
    Route::get('/banktransactionlist','Bank\banktransactionController@index')->name('banktransaction-list');
    Route::get('/banktransactionlist/create','Bank\banktransactionController@create')->name('banktransaction-create-route');
    Route::get('/get-supplier-bnk-invoice/{supplier_id}','Bank\banktransactionController@getSupplierInvoice')->name('get-bnk-supplier-invoice-route');
    Route::get('banktransactionlist/destroy/{id}','Bank\banktransactionController@destroy')->name('banktransaction-destroy-route');
    Route::post('/banktransactionlist/store','Bank\banktransactionController@store')->name('banktransactionlist-store-route');


    Route::get('banktransactionlist/view/{id}','Bank\banktransactionController@view')->name('banktransactionlist-view-route');

/////////////////////////-----------Manage Project-----------------//////////////////////

///.................................Project Group--------------/////

    Route::get('/progroup_create', 'Project\progroupController@create_progroup')->name('progroup-page-create');
    Route::post('/store/progroup', 'Project\progroupController@store_progroup')->name('progroup-store-create');
    Route::get('/progroup_list', 'Project\progroupController@list_progroup')->name('progroup-list-create');
    Route::get('/progroup_edit/{id}', 'Project\progroupController@progroup_edit')->name('progroup-page-edit');
    Route::post('/progroup_update/{id}', 'Project\progroupController@update_progroup')->name('edit-progroup-update');
    Route::get('/progroup_delete/{id}', 'Project\progroupController@progroups_destroy')->name('delete-progroup');


///.................................Project SubGroup--------------/////

    Route::get('/prosubgroup_create', 'Project\prosubgroupController@create_prosubgroup')->name('prosubgroup-page-create');
    Route::post('/store/prosubgroup', 'Project\prosubgroupController@store_prosubgroup')->name('prosubgroup-store-create');
    Route::get('/prosubgroup_list', 'Project\prosubgroupController@list_prosubgroup')->name('prosubgroup-list-create');
    Route::get('/prosubgroup_edit/{id}', 'Project\prosubgroupController@prosubgroup_edit')->name('prosubgroup-page-edit');
    Route::post('/prosubgroup_update/{id}', 'Project\prosubgroupController@update_prosubgroup')->name('edit-prosubgroup-update');
    Route::get('/prosubgroup_delete/{id}', 'Project\prosubgroupController@prosubgroups_destroy')->name('delete-prosubgroup');

///.................................Project Type--------------/////

    Route::get('/project/type/create', 'Project\protypeController@create_project_type')->name('project-type-create-page');
    Route::post('/project/type/store', 'Project\protypeController@store_project_type')->name('project-type-store-page');
    Route::get('/project/type', 'Project\protypeController@list_project_type')->name('project-type-list-page');
    Route::get('/project/type/edit/{id}', 'Project\protypeController@project_type_edit')->name('project-type-edit-page');
    Route::post('/project/type/update/{id}', 'Project\protypeController@update_project_type')->name('project-type-update-page');
    Route::get('/protype_delete/{id}', 'Project\protypeController@destroy')->name('delete-protype');


///.................................Project Contractor--------------/////

    Route::get('/project/contractor/create', 'Project\procontractorController@create_project_contractor')->name('project-contractor-create-page');
    Route::post('/project/contractor/store', 'Project\procontractorController@store_project_contractor')->name('project-contractor-store-page');
    Route::get('/project/contractor', 'Project\procontractorController@list_project_contractor')->name('project-contractor-list-page');
    Route::get('/project/contractor/edit/{id}', 'Project\procontractorController@project_contractor_edit')->name('project-contractor-edit-page');
    Route::post('/project/contractor/update/{id}', 'Project\procontractorController@update_project_contractor')->name('project-contractor-update-page');
    Route::get('/project/contractor/delete/{id}', 'Project\procontractorController@project_contractor_destroy')->name('project-contractor-delete-page');


///.................................Project Record--------------/////

    Route::get('/project/create', 'Project\projectController@create_project')->name('project-create-page');
    Route::post('/project/store', 'Project\projectController@store_project')->name('project-store-page');
    Route::get('/project', 'Project\projectController@list_project')->name('project-list-page');
    Route::get('/project/edit/{id}', 'Project\projectController@project_edit')->name('project-edit-page');
    Route::post('/project/update/{id}', 'Project\projectController@update_project')->name('project-update-page');
    Route::get('/project/delete/{id}', 'Project\projectController@project_destroy')->name('project-delete-page');
    Route::get('project/view/{id}','Project\projectController@show')->name('project-view-page');
    Route::get('project/details/{id}','Project\projectController@project_details')->name('project-details-page');

//....................................Expense Head..........................................
    Route::get('/expense_head_list','DailyProcess\ExpenseHeadController@index')->name('expense-head-list');
    Route::get('/expense_head_list/create','DailyProcess\ExpenseHeadController@create')->name('expense-head-create-route');
    Route::post('/expense_head_list/store','DailyProcess\ExpenseHeadController@store')->name('expense-head-store-route');
    Route::get('/expense_head_list/edit/{id}','DailyProcess\ExpenseHeadController@edit')->name('expense-head-edit-route');
    Route::patch('/expense_head_list/update/{id}','DailyProcess\ExpenseHeadController@update')->name('expense-head-update-route');
    Route::get('/expense_head_list/destroy/{id}','DailyProcess\ExpenseHeadController@destroy')->name('expense-head-destroy-route');

    // Expense Head Type
    Route::get('/head-typelist','DailyProcess\HeadTypeController@index')->name('expense-typelist');
    Route::get('/head-typecreate','DailyProcess\HeadTypeController@create')->name('expense-typecreate');
    Route::post('/head-typestore','DailyProcess\HeadTypeController@store')->name('expense-typestore');
    Route::get('/head-typeedit/{id}','DailyProcess\HeadTypeController@edit')->name('expense-typeedit');
    Route::post('/head-typeupdate/{id}','DailyProcess\HeadTypeController@update')->name('expense-typeupdate');

//......................................Expense Voucher..........................................................
    Route::get('/dailyexpenselist','DailyProcess\DailyExpenseController@index')->name('daily-expense-list');
    Route::get('/dailyexpenselist/getAmount/{id}','DailyProcess\DailyExpenseController@getAmount')->name('daily-expense');
    Route::get('/dailyexpenselist/create','DailyProcess\DailyExpenseController@create')->name('daily-expense-create-route');
    Route::post('/dailyexpenselist/store','DailyProcess\DailyExpenseController@store')->name('daily-expense-store-route');
    Route::post('dailyexpenselist/success', 'DailyProcess\DailyExpenseController@success')->name('dailyexpensesuccess');
    Route::get('dailyexpenselist/view/{id}','DailyProcess\DailyExpenseController@view')->name('daily-expense-view-route');
    Route::get('dailyexpenselist/destroy/{id}','DailyProcess\DailyExpenseController@destroy')->name('daily-expense-destroy-route');


    Route::get('/expensevoucherlist','DailyProcess\ExpenseController@index')->name('expense-list');
    Route::get('/expensevoucherlist/create','DailyProcess\ExpenseController@create')->name('expense-create-route');
    Route::get('/get-supplier-exp-invoice/{supplier_id}','DailyProcess\ExpenseController@getSupplierInvoice')->name('get-exp-supplier-invoice-route');
    Route::get('expensevoucherlist/destroy/{id}','DailyProcess\ExpenseController@destroy')->name('expensevoucher-destroy-route');
    Route::post('/expenselist/store','DailyProcess\ExpenseController@store')->name('expenselist-store-route');

    Route::get('expensevoucherlist/view/{id}','DailyProcess\ExpenseController@view')->name('expensevoucher-view-route');

//....................................Finance Management.........................................
    Route::get('/trial_balance/','Finance\FinanceController@trial_balance')->name('finance_trial_balance');
    Route::get('/trial_balance_filter_by_date/','Finance\FinanceController@trial_balance_filter_by_date')->name('trial_balance_filter_by_date');
    Route::get('/balance_sheet/','Finance\FinanceController@balance_sheet')->name('finance_balance_sheet');
    Route::get('/profit_and_loss/','Finance\FinanceController@profit_and_loss')->name('finance_profit_and_loss');
    Route::get('/chart_of_account/','Finance\FinanceController@chart_of_account')->name('finance_chart_of_account');

//------------------------LC SETUP-----------------------------

// Route::get('/lc/port_setup', 'lc\lcController@port_setup')->name('lc-port-setup');
// Route::get('/lc/cost_type', 'lc\lcController@cost_type')->name('lc-cost-type');


    Route::get('/lc/lc_setup', 'lc\lcController@lc_create')->name('create-lc-setup');
    Route::get('/lc/lc_list', 'lc\lcController@lc_list')->name('list-lc-setup');
    Route::post('/lc/lc_setup/insert', 'lc\lcController@lc_store')->name('lc-setup.insert');
    Route::get('/lc/lc_delete/{id}', 'lc\lcController@destroy')->name('lc-setup-delete');
    Route::get('get/details/{id}', 'lc\lcController@getDetails')->name('getDetails');
    Route::get('/lc_view/{id}', 'lc\lcController@show')->name('lc-setup-show');

//------------------------PI SETUP-----------------------------

    Route::get('/lc/pi_setup', 'lc\piController@pi_create')->name('lc-create-pi');
    Route::post('/lc/pi_setup/insert', 'lc\piController@insert')->name('pi-setup.insert');
    Route::get('/lc/pi_list', 'lc\piController@pi_list')->name('lc-list-pi');
    Route::get('/lc/pi_delete/{id}', 'lc\piController@destroy')->name('lc-pi-delete');
    Route::get('get/details1/{id}', 'lc\piController@getDetails1')->name('getDetails1');
    Route::get('/lc/pi_view/{id}', 'lc\piController@show')->name('lc-pi-view');

//----------------------------Company Setup------------------------------

    Route::get('/company/company_setup', 'Company\companyController@index')->name('company-create-setup');
    Route::post('/company/company_store', 'Company\companyController@store')->name('company-store-create');
    Route::post('/company/company_update/{id}', 'Company\companyController@update')->name('company-edit-store');

//----------------------------Local Setting------------------------------

    Route::get('/local/local_setup', 'Company\localsettingController@index')->name('local-create-setup');
    Route::post('/local/local_setup', 'Company\localsettingController@insert')->name('local-setup.insert');

//-----------------------Report----------------------------------------------
    Route::get('/report/report', 'Report\reportController@index')->name('report-all');

//---------------------------project report---------------------------------------------
    Route::get('/report/projectlist', 'Report\projectreportController@project_status')->name('project-list-report');
    Route::get('/report/projectdetails', 'Report\projectreportController@project_details')->name('project-details-report');
    Route::get('/report/projectcontructorlist', 'Report\projectreportController@project_contructorlist')->name('project-contructorlist-report');
    Route::get('/report/projectcontructorbalance', 'Report\projectreportController@project_contructorbalance')->name('project-contructorbalance-report');
    Route::get('/report/projectcontructorstate', 'Report\projectreportController@project_contructorstate')->name('project-contructorstate-report');
    Route::get('/report/projectoverview', 'Report\projectreportController@project_overview')->name('project-overview-report');

//---------------------------Purchaase report---------------------------------------------
    Route::get('/report/purchaselist', 'Report\purchasereportController@purchase_list')->name('purchase-list-report');
    Route::get('/report/return-purchase-list', 'Report\purchasereportController@returnPurchaseList')->name('return-purchase-list-report');
    Route::get('/report/supplier-list', 'Report\purchasereportController@supplierList')->name('supplier-list-report');
    Route::get('/report/item-list', 'Report\purchasereportController@itemList')->name('item-list-report');
    Route::get('/report/itemst-list', 'Report\purchasereportController@itemStList')->name('itemst-list-report');
    Route::get('/report/pur-reriodic', 'Report\purchasereportController@pur_periodic')->name('pur-reriodic-report');
    Route::get('/report/pur-overview', 'Report\purchasereportController@pur_overview')->name('pur-overview-report');

//.........................Inventory Report..................................................
    Route::get('/report/inv-product-list', 'Report\inventoryreportController@productList')->name('inv-product-list-report');
    Route::get('/report/inv-sales-list', 'Report\inventoryreportController@salesList')->name('inv-sales-list-report');
    Route::get('/report/inv-summary', 'Report\inventoryreportController@invSummary')->name('inv-summary-report');
    Route::get('/report/inv-periodic-count', 'Report\inventoryreportController@invPeriodic')->name('inv-periodic-count-report');
    Route::get('/report/inv-valuation', 'Report\inventoryreportController@invValuation')->name('inv-valuation-report');
    Route::get('/report/inv-perio-valuation', 'Report\inventoryreportController@invPerioValuation')->name('inv-perio-valuation-report');
    Route::get('/report/inv-overview', 'Report\inventoryreportController@inv_overview')->name('inv-overview-report');

//.............................Sales Report................................................
    Route::get('/report/salesList', 'Report\salesreportcontroller@sales_list')->name('sales-list-report');
    Route::get('/report/return-sales-list', 'Report\salesreportcontroller@returnSalesList')->name('return-sales-list-report');
    Route::get('/report/customer-list', 'Report\salesreportcontroller@customerList')->name('customer-list-report');
    Route::get('/report/sales-item-list', 'Report\salesreportcontroller@salesItemList')->name('sales-item-list-report');
    Route::get('/report/sales-itemst-list', 'Report\salesreportcontroller@salesItemStList')->name('sales-itemst-list-report');
    Route::get('/report/sales-reriodic', 'Report\salesreportcontroller@salesPeriodic')->name('sales-reriodic-report');
    Route::get('/report/sales-overview', 'Report\salesreportcontroller@salesOverview')->name('sales-overview-report');

//--------------------------------Employee Report----------------------------------------------------------
    Route::get('/report/employeelist', 'Report\payrollreportController@employee_list')->name('employee-list-report');
    Route::get('/report/attendance', 'Report\payrollreportController@attendance')->name('attendance-report');
    Route::get('/report/leaverecord', 'Report\payrollreportController@leaverecord')->name('leaverecord-report');
    Route::get('/report/salaryreport', 'Report\payrollreportController@salaryreport')->name('salaryreport-report');
    Route::get('/report/commissionreport', 'Report\payrollreportController@commissionreport')->name('commissionreport-report');
    Route::get('/report/payrrolloverview', 'Report\payrollreportController@overview')->name('payrrolloverview-report');

//--------------------------------Receiveable Report----------------------------------------------------------
    Route::get('/report/customerlist', 'Report\receiveablesreportController@customerlist')->name('customerlist-report');
    Route::get('/report/customerbalance', 'Report\receiveablesreportController@customerbalance')->name('customerbalance-report');
    Route::get('/report/customerstatement', 'Report\receiveablesreportController@customerstatement')->name('customerstatement-report');
    Route::get('/report/customeritemstate', 'Report\receiveablesreportController@customeritemstate')->name('customeritemstate-report');
    Route::get('/report/customerduecol', 'Report\receiveablesreportController@customerduecol')->name('customerduecol-report');
    Route::get('/report/customeroverview', 'Report\receiveablesreportController@customeroverview')->name('customeroverview-report');
    Route::get('/report/revoverview', 'Report\receiveablesreportController@overview')->name('revoverview-report');

//--------------------------------Payable Report----------------------------------------------------------
    Route::get('/report/supllierlist', 'Report\payablesreportController@supllierlist')->name('supllierlist-report');
    Route::get('/report/supllierbalance', 'Report\payablesreportController@supllierbalance')->name('supllierbalance-report');
    Route::get('/report/supllierstatement', 'Report\payablesreportController@supllierstatement')->name('supllierstatement-report');
    Route::get('/report/supllieritemstate', 'Report\payablesreportController@supllieritemstate')->name('supllieritemstate-report');
    Route::get('/report/supllieroverview', 'Report\payablesreportController@supllieroverview')->name('supllieroverview-report');
    Route::get('/report/revoverview', 'Report\payablesreportController@overview')->name('revoverview-report');

//--------------------------------Accounts Report----------------------------------------------------------
    Route::get('/report/ledgerstate', 'Report\accountsreportController@ledgerstate')->name('ledgerstate-report');
    Route::get('/report/cashstate', 'Report\accountsreportController@cashstate')->name('cashstate-report');
    Route::get('/report/bankstate', 'Report\accountsreportController@bankstate')->name('bankstate-report');
    Route::get('/report/mobilestate', 'Report\accountsreportController@mobilestate')->name('mobilestate-report');
    Route::get('/report/profitloss', 'Report\accountsreportController@profitloss')->name('profitloss-report');
    Route::get('/report/journalhistory', 'Report\accountsreportController@journalhistory')->name('journalhistory-report');
    Route::get('/report/trailbalance', 'Report\accountsreportController@trailbalance')->name('trailbalance-report');
    Route::get('/report/balancesheet', 'Report\accountsreportController@balancesheet')->name('balancesheet-report');
    Route::get('/report/accountoverview', 'Report\accountsreportController@overview')->name('accountoverview-report');

//--------------------------------Voucher Report----------------------------------------------------------
    Route::get('/report/payments', 'Report\voucherreportController@payments')->name('payments-report');
    Route::get('/report/receipts', 'Report\voucherreportController@receipts')->name('receipts-report');
    Route::get('/report/journal', 'Report\voucherreportController@journal')->name('journal-report');
    Route::get('/report/payrevstate', 'Report\voucherreportController@payrevstate')->name('payrevstate-report');
    Route::get('/report/internaltrans', 'Report\voucherreportController@internaltrans')->name('internaltrans-report');
    Route::get('/report/vouoverview', 'Report\voucherreportController@overview')->name('vouoverview-report');
//--------------------------------Daily Report----------------------------------------------------------
    Route::get('/report/dailycashstate', 'Report\dailyreportController@daicashst')->name('dailycashstate-report');

//..........................Requisition..................
    Route::get('requisition/approve/list','Requisition\RequisitionController@requisition_approve')->name('requisition-aprrovelist-route');
    Route::get('requisition/pending/list','Requisition\RequisitionController@requisition_pending')->name('requisition-pendinglist-route');
    Route::get('requisition/list','Requisition\RequisitionController@index')->name('requisition-list-route');
    Route::post('daterequisition/list','Requisition\RequisitionController@datefilter')->name('daterequisition-list-route');
    Route::get('requisition/create','Requisition\RequisitionController@create')->name('requisition-create-route');
    Route::post('requisition/store','Requisition\RequisitionController@store')->name('requisition-store-route');
    Route::get('requisition/edit/{id}','Requisition\RequisitionController@edit')->name('requisition-edit-route');
    Route::put('requisition/update/{id}','Requisition\RequisitionController@update')->name('requisition-update-route');

    Route::get('requisition/statusapprove/{id}','Requisition\RequisitionController@statusapprove')->name('requisition-statusapprove-route');
    Route::get('requisition/statuscancel/{id}','Requisition\RequisitionController@statuscancel')->name('requisition-statuscancel-route');

    Route::get('requisition/delete/{id}','Requisition\RequisitionController@destroy')->name('requisition-delete-route');
    Route::get('requisition/view/{id}','Requisition\RequisitionController@show')->name('requisition-view-route');
    Route::get('requisition/employee_phone','Requisition\RequisitionController@select_employee_phone')->name('select_employee_phone');
    Route::get('requisition/product_price','Requisition\RequisitionController@search_product_cost_by_id')->name('search_product_cost_by_id');
    Route::get('getrequisition/details/{id}', 'Requisition\RequisitionController@getDetails')->name('requisitiongetDetails');
    Route::get('requisition/success', 'Requisition\RequisitionController@success')->name('requisitionsuccess');
    Route::get('requisition/return', 'Requisition\RequisitionController@return_page')->name('requisitionreturn');
    Route::post('requisition/return/create', 'Requisition\RequisitionController@return_create')->name('return-requisition');
    Route::post('requisition/return/store','Requisition\RequisitionController@return_store')->name('requisitionreturn-store-route');
    Route::get('retutnrequisition/list','Requisition\RequisitionController@return_index')->name('returnrequisition-list-route');
    Route::get('returnrequisition/delete/{id}','Requisition\RequisitionController@return_destroy')->name('returnrequisition-delete-route');
    Route::get('returnrequisition/view/{id}','Requisition\RequisitionController@return_show')->name('returnrequisition-view-route');

    Route::get('requisition/balance/list','Requisition\RequisitionController@balance_list')->name('requisition-balancelist-route');

//..........................Loan..................
    Route::get('loan/list','Loan\loanController@index')->name('loan-list-route');
    Route::get('loan/create','Loan\loanController@create')->name('loan-create-route');
    Route::post('loan/store','Loan\loanController@store')->name('loan-store-route');
    Route::get('loan/edit/{id}','Loan\loanController@edit')->name('loan-edit-route');
    Route::post('loan/update/{id}','Loan\loanController@update')->name('loan-update-route');
    Route::get('loan/delete/{id}','Loan\loanController@destroy')->name('loan-delete-route');

//..........................Loan  Invoice..................
    Route::get('loaninvoice/list','Loan\loaninvoiceController@index')->name('loaninvoice-list-route');
    Route::get('loaninvoice/create','Loan\loaninvoiceController@create')->name('loaninvoice-create-route');
    Route::post('loloaninvoicean/store','Loan\loaninvoiceController@store')->name('loaninvoice-store-route');
    Route::get('loaninvoice/edit/{id}','Loan\loaninvoiceController@edit')->name('loaninvoice-edit-route');
    Route::post('loaninvoice/update/{id}','Loan\loaninvoiceController@update')->name('loaninvoice-update-route');
    Route::get('loaninvoice/delete/{id}','Loan\loaninvoiceController@destroy')->name('loaninvoice-delete-route');

//........................Loan Payment..............................................
    Route::get('loanpayment/create','Loan\loanpaymentController@create')->name('loanpayment-create-route');
    Route::post('loloanpaymentan/store','Loan\loanpaymentController@store')->name('loanpayment-store-route');
    Route::get('loan/get/details/{id}', 'Loan\loanpaymentController@getDetails')->name('loangetDetails');

//........................Loan Receive..............................................
    Route::get('loanreceive/create','Loan\loanreceiveController@create')->name('loanreceive-create-route');
    Route::post('loloanreceivean/store','Loan\loanreceiveController@store')->name('loanreceive-store-route');
    Route::get('loanr/get/details/{id}', 'Loan\loanreceiveController@getDetails')->name('loanrgetDetails');

});


// ################@@@@@@@@@@@@@%%%%%%%%%%%%%-----Front-end Routes Starts-----%%%%%%%%%%%%%@@@@@@@@@@@@@################
// .............@@@@@@@@@@@@...............Starts Front End Main Menues.............@@@@@@@@@@@@............... //
// Route::get('/', 'frontend\FrontendController@home')->name('index');
Route::get('/about_us', 'frontend\FrontendController@about_us')->name('about_us');
Route::get('/services', 'frontend\FrontendController@services')->name('services');
Route::get('/product-list', 'frontend\FrontendController@product_list')->name('product_list');
Route::get('/projects', 'frontend\FrontendController@projects')->name('projects');
Route::get('/meet-our-teams', 'frontend\FrontendController@meet_our_teams')->name('meet_our_teams');
Route::get('/blog', 'frontend\FrontendController@blog')->name('blog');
Route::get('/contact-us', 'frontend\FrontendController@contact_us')->name('contact_us');
Route::post('/send_contact-us_message', 'frontend\FrontendController@store_contact_us')->name('store_contact_us');
Route::get('/download', 'frontend\FrontendController@download')->name('download');
// .............@@@@@@@@@@@@...............Ends Front End Main Menues.............@@@@@@@@@@@@............... //

// .............@@@@@@@@@@@@...............Starts Front End Sub Menues.............@@@@@@@@@@@@............... //
// ---------Starts Service Menu's Sub-menues--------- //
Route::get('/polished-concrete-in-bangladesh', 'frontend\FrontendController@polished_concrete')->name('polished_concrete');
Route::get('/epoxy-flooring-in-bangladesh', 'frontend\FrontendController@epoxy_flooring')->name('epoxy_flooring');
Route::get('/pu-flooring-in-bangladesh', 'frontend\FrontendController@pu_flooring')->name('pu_flooring');
Route::get('/epoxy-parking-flooring-in-bangladesh', 'frontend\FrontendController@epoxy_parking')->name('epoxy_parking');
Route::get('/self-leveling-epoxy-flooring-in-bangladesh', 'frontend\FrontendController@self_leveling_epoxy_flooring')->name('self_leveling_epoxy_flooring');
Route::get('/metallic-epoxy-flooring-in-bangladesh', 'frontend\FrontendController@metallic_epoxy_flooring')->name('metallic_epoxy_flooring');
Route::get('/epoxy-3d-flooring-in-bangladesh', 'frontend\FrontendController@epoxy_3d_flooring')->name('epoxy_3d_flooring');
Route::get('/epoxy-wall-coating-and-paint-in-bangladesh', 'frontend\FrontendController@epoxy_wall_coating_and_paint')->name('epoxy_wall_coating_and_paint');
Route::get('/etp-protective-coating-in-bangladesh', 'frontend\FrontendController@etp_protective_coating')->name('etp_protective_coating');
Route::get('/fair-face-plaster', 'frontend\FrontendController@fair_face_plaster')->name('fair_face_plaster');
Route::get('/vinyl-flooring-in-bangladesh', 'frontend\FrontendController@vinyl_flooring')->name('vinyl_flooring');
Route::get('/waterproofing-in-bangladesh', 'frontend\FrontendController@waterproofing')->name('waterproofing');
Route::get('/dampproofing-in-bangladesh', 'frontend\FrontendController@dampproofing')->name('dampproofing');
Route::get('/floor-hardener-in-bangladesh', 'frontend\FrontendController@floor_hardener')->name('floor_hardener');
Route::get('/expansion-joint-work-in-bangladesh', 'frontend\FrontendController@expansion_joint_work')->name('expansion_joint_work');
Route::get('/construction-chemicals-in-bangladesh', 'frontend\FrontendController@construction_chemicals')->name('construction_chemicals');
Route::get('/interior-design-in-bangladesh', 'frontend\FrontendController@interior_design')->name('interior_design');
Route::get('/commercial-residential-flooring-in-bangladesh', 'frontend\FrontendController@commercial_residential_flooring')->name('commercial_residential_flooring');
Route::get('/pu-foam-spray-in-bangladesh', 'frontend\FrontendController@pu_foam_spray')->name('pu_foam_spray');
// ---------Ends Service Menu's Sub-menues--------- //
// ---------Starts Projects Menu's Sub-menues--------- //
Route::get('/project-polished-concrete', 'frontend\FrontendController@project_polished_concrete')->name('project_polished_concrete');
Route::get('/project-pu-flooring', 'frontend\FrontendController@project_pu_flooring')->name('project_pu_flooring');
Route::get('/project-vinyl-flooring', 'frontend\FrontendController@project_vinyl_flooring')->name('project_vinyl_flooring');
Route::get('/project-epoxy-flooring', 'frontend\FrontendController@project_epoxy_flooring')->name('project_epoxy_flooring');
Route::get('/project-epoxy-3d-flooring', 'frontend\FrontendController@project_epoxy_3d_flooring')->name('project_epoxy_3d_flooring');
Route::get('/project-epoxy-marking', 'frontend\FrontendController@project_epoxy_marking')->name('project_epoxy_marking');
Route::get('/project-epoxy-wall-coating-and-paint', 'frontend\FrontendController@project_epoxy_wall_coating_and_paint')->name('project_epoxy_wall_coating_and_paint');
Route::get('/project-fair-face-plaster', 'frontend\FrontendController@project_fair_face_plaster')->name('project_fair_face_plaster');
Route::get('/project-pu-foam-spray', 'frontend\FrontendController@project_pu_foam_spray')->name('project_pu_foam_spray');
Route::get('/project-waterproofing', 'frontend\FrontendController@project_waterproofing')->name('project_waterproofing');
Route::get('/project-floor-hardener', 'frontend\FrontendController@project_floor_hardener')->name('project_floor_hardener');
Route::get('/project-expansion-joint-work', 'frontend\FrontendController@project_expansion_joint_work')->name('project_expansion_joint_work');
Route::get('/project-interior-design', 'frontend\FrontendController@project_interior_design')->name('project_interior_design');
Route::get('/project-commercial-residential-flooring', 'frontend\FrontendController@project_commercial_residential_flooring')->name('project_commercial_residential_flooring');
// ---------Ends Projects Menu's Sub-menues--------- //
//.............@@@@@@@@@@@@...........Starts Commercial Chemicals Files............@@@@@@@@@@@@.......................//
Route::get('/grouting-in-bangladesh', 'frontend\FrontendController@grouting')->name('grouting');
Route::get('/repair-mortar-in-bangladesh', 'frontend\FrontendController@repair_mortar')->name('repair_mortar');
Route::get('/concrete-admixtures-in-bangladesh', 'frontend\FrontendController@concrete_admixtures')->name('concrete_admixtures');
Route::get('/joint-sealants-in-bangladesh', 'frontend\FrontendController@joint_sealants')->name('joint_sealants');
Route::get('/crack-repair-injection-systems-in-bangladesh', 'frontend\FrontendController@crack_repair_injection_systems')->name('crack_repair_injection_systems');
Route::get('/bonding-agents-in-bangladesh', 'frontend\FrontendController@bonding_agents')->name('bonding_agents');
Route::get('/concrete-auxiliaries-in-bangladesh', 'frontend\FrontendController@concrete_auxiliaries')->name('concrete_auxiliaries');

//.............@@@@@@@@@@@@...........Ends Commercial Chemicals Files............@@@@@@@@@@@@.......................//

//.............@@@@@@@@@@@@.................Starts Commented Out Files...................@@@@@@@@@@@@.......................//
Route::get('/project-epoxy-parking-flooring', 'frontend\FrontendController@project_epoxy_parking_flooring')->name('project_epoxy_parking_flooring');
Route::get('/project-self-leveling-epoxy-flooring', 'frontend\FrontendController@project_self_leveling_epoxy_flooring')->name('project_self_leveling_epoxy_flooring');
Route::get('/project-metallic-epoxy-flooring', 'frontend\FrontendController@project_metallic_epoxy_flooring')->name('project_metallic_epoxy_flooring');
Route::get('/project-etp-protective-coating', 'frontend\FrontendController@project_etp_protective_coating')->name('project_etp_protective_coating');
Route::get('/project-dampproofing', 'frontend\FrontendController@project_dampproofing')->name('project_dampproofing');
Route::get('/project-construction-chemicals', 'frontend\FrontendController@project_construction_chemicals')->name('project_construction_chemicals');
//.............@@@@@@@@@@@@.................Ends Commented Out Files...................@@@@@@@@@@@@.......................//
// ################@@@@@@@@@@@@@%%%%%%%%%%%%%-----Front-end Routes Ends-----%%%%%%%%%%%%%@@@@@@@@@@@@@################