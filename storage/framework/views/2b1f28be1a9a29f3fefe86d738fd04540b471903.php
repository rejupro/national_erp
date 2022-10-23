
<?php $__env->startSection("content"); ?>
<?php
 $phead='dashboard';
?>

<!-- Main content -->
<section class="content">
<?php
    $message = DB::table('contact_messages')->orderBy('created_at', 'desc')->take(10)->get();
?>
        <div class="row">
            
            <div class="col-md-4 col-xs-12 " >
                <div class="box " style="height: 458px;">
                    <div class="box-header">
                        <i class="fa fa-bell"></i>
                        <h3 class="box-title">
                        Contact Message
                        </h3>
                    </div>
                    <div class="box-body" >
                        <div class="col-md-12 no-padding db-notification-container" style="">
                            <table id="dash_notifications" class="table notification_table">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><a href="<?php echo e(route('view_full_message',$data->id)); ?>"><?php echo e($data->name); ?></a></td>
                                            <td><a href="<?php echo e(route('view_full_message',$data->id)); ?>"><?php echo e($data->email); ?></a></td>
                                            <td><a href="<?php echo e(route('view_full_message',$data->id)); ?>"><?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <td colspan="2"></td>
                                    <td><a href="<?php echo e(route('contact_message_list')); ?>" type="button" class="btn btn-flat bg-purple btn-sm"><span>See More..</span></a></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                
                </div> 
            </div>    
        
            <div class="col-md-8 shortcuts">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <!-- small box -->
                        <a href="">
                            <div class="small-box">
                                <div class="ribbon"><span>Total</span></div>
                                <div class="icon">
                                    <i class="fa fa-handshake-o"></i>
                                </div>
                                <div class="inner">
                                    <h3 id="crm-count"><?php echo e(count($products)); ?></h3>
                                    <p>Products</p>
                                </div>
                            
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <!-- small box -->
                        <a href="">
                            <div class="small-box ">
                                    <div class="ribbon"><span>Total</span></div>
                                    <div class="inner">
                                        <h3 id="lead-count"><?php echo e(count($projects)); ?></h3>
                                        <p>Projects</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sun-o"></i>
                                    </div>
                            </div>
                        </a>
                        
                    </div>
                    
                    <div class="col-md-3 col-xs-6">
                    
                        <a href="">
                            <!-- small box -->
                            <div class="small-box ">
                                <div class="ribbon"><span>Total</span></div>
                                <div class="inner">
                                    <h3 id="opportunity-count"><?php echo e(count($purchases)); ?></h3>
                                    <p>Purchase</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                            </div>
                        </a>
                    
                    </div>
                    <div class="col-md-3 col-xs-6">
                    
                        <a href="">
                            <!-- small box -->
                            <div class="small-box">
                                <div class="ribbon"><span>Total</span></div>
                                <div class="icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="inner">
                                    <h3 id="sale-count"><?php echo e(count($sales)); ?></h3>
                                    <p>Sales</p>
                                </div>
                            </div>
                        </a>
                    
                    </div>
                
                
                    <div class="clearfix"></div>
                </div>
                <div class = "nav-tabs-custom enquiry_tab" style="box-shadow: none;border-radius: 0;border: 1px solid #d9d7d7;">
                    <ul class = "nav nav-tabs" style="background: #8DC43E; border-radius: 0;">
                        <li class = "active">
                            <a href = "#enqueries_block" data-toggle = "tab" class="text-uppercase"><i class = "fa fa-inbox" aria-hidden = "true"></i> Enquiries</a>
                        </li>
                
                        <li >
                            <a href = "#target_achiement_block" data-toggle = "tab" onclick="setTimeout(validate_target_chart_filter, 100)"><i class = "fa fa-trophy" aria-hidden = "true"></i> Target & Achievements</a>
                        </li>
                
                    </ul>
                    <div class = "tab-content" style="height: 302px;">
                        <div class = "active tab-pane" id = "enqueries_block">
                            <style>
                                .db_enq_filter td{
                                    padding-right:3px;   
                                }
                                .enqueries_block_wrapper .created_on_text{
                                    font-size: 11px;
                                    margin-bottom: 0px;
                                    color: #999;
                                    text-transform: none !important;
                                }
                                .enqueries_block_wrapper .name_tag{
                                    width: 35px;
                                    margin: 0;
                                    text-align: center;
                                    height: 35px;
                                    padding-top: 5px;
                                    font-size: 18px;
                                    font-weight: bold;
                                    border-radius: 50%;
                                }
                                .enqueries_block_wrapper .enq_table td{
                                    border-right: 0px ;
                                    border-left: 0px ;
                                }
                                .enqueries_block_wrapper .enq_table{
                                    border: 1px solid #e8e6e6;
                                }
                                .enqueries_block_wrapper .statusbox{
                                    font-weight: bold;
                                    text-transform: uppercase;
                                    font-size: 15px;
                                    background: #3c8dbc;
                                    color: #fff;
                                    padding: 5px;
                                }
                                .db_enq_table_div::-webkit-scrollbar-track {
                                    background-color: #fff;
                                }
                                .db_enq_table_div::-webkit-scrollbar {
                                    width: 6px;
                                    background-color: #fff;
                                }
                                .db_enq_table_div::-webkit-scrollbar-thumb {
                                    border-radius: 10px;
                                    background-color: #ddd;
                                }
                                .db_enq_table_div{
                                    max-height: 173px;
                                    overflow: auto;
                            
                                }
                            
                            </style>
                            <div class="row">
                                <div class="col-md-11">
                                    <form action="" id="db_enquiry_form" onsubmit="return false" method="post" accept-charset="utf-8">
                                        <table class="db_enq_filter">
                                            <tr>
                                                <td></td>
                                                <td style="">
                                                    <div class="form-group">
                                                        <label>Play By</label>
                                                        <select name="db_enquiry_member" id="db_enquiry_member" class="form-control text-uppercase">
                                                        <option selected value=""></option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="width: 123px;">
                                                    <div class="form-group">
                                                        <label>Date From</label>
                                                        <div class="input-group date datetimepicker">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" value="<?php echo date('Y').'-'.date('m').'-01';?>" id="db_enquiry_date_from" class="form-control filter_date" placeholder="FROM DATE" readonly="true"  />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 123px;">
                                                    <div class="form-group">
                                                        <label>Date To</label>
                                                        <div class="input-group date datetimepicker">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" value="" id="db_enquiry_date_to" class="form-control filter_date" placeholder="TO DATE" readonly="true"  />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group" style="padding-top: 23px;">
                                                        <input type="button" value="Enquiries" id="db_enquiry_submit" class="btn btn-flat bg-purple " onclick="get_enquiries_list(1)"  />
                                                        <input type="button" value="Follow-ups" id="db_enquiry_submit2" class="btn btn-flat bg-purple " onclick="get_enquiries_list(2)"  />
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>    
                                </div>
                                <div class="col-md-1 form-group text-right">
                                    <a class="label label-success bg-purple text-uppercase" onclick="load_enquiry_form()"><i class="fa fa-plus"></i> New</a>
                                </div>
                            </div>
                            <div class="row enqueries_block_wrapper"></div>
                            <script>
                                    function get_enquiries_list(type) {
                                    try {
                                    var error = '';
                                    var branch = $('#db_enquiry_form').find('#db_enquiry_branch').val();
                                    var member = $('#db_enquiry_form').find('#db_enquiry_member').val();
                                    var date_from = $('#db_enquiry_form').find('#db_enquiry_date_from').val();
                                    var date_to = $('#db_enquiry_form').find('#db_enquiry_date_to').val();
                                    if(!type)type=1;
                                    if (!checkValueExists(branch))
                                    //error = error + 'Branch is required<br>';
                                    if (!checkValueExists(date_from))
                                    error = error + 'Date from is required<br>';
                                    if (!checkValueExists(date_to))
                                    error = error + 'Date to is required<br>';
                                    if (error) {
                                    toaster(error);
                                    return false;
                                    } else {
                                    
                                    $('#db_enquiry_submit').prop('disabled', true);
                                    $('#db_enquiry_submit2').prop('disabled', true);
                                    $('.enqueries_block_wrapper').html('<div class="col-md-12">Loading...</div>');
                                    $.ajax({
                                    type: "POST",
                                    url: "axe_enquirylist.php",
                                    cache: false,
                                    dataType: 'json',
                                    data: {'branch': branch, 'member': member, 'date_from': date_from, 'date_to': date_to,'type':type},
                                    timeout: 15000,
                                    success: function (data)
                                    {
                                    $('.enqueries_block_wrapper').html(data['result']);
                                    $('#db_enquiry_submit').prop('disabled', false);
                                    $('#db_enquiry_submit2').prop('disabled', false);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                    $('.enqueries_block_wrapper').html('<div class="col-md-12">Error</div>');
                                    
                                    $('#db_enquiry_submit').prop('disabled', false);
                                    $('#db_enquiry_submit2').prop('disabled', false);
                                    }
                                    
                                    });
                                    }
                                    } catch (exception) {
                                    alert(exception);
                                    }
                                    
                                    return false;
                                    }
                                    function load_enquiry_form(id) {
                                    $("#public_modal .modal-content").html('Loading..');
                                    $("#public_modal").addClass('common_modal_mediaum');
                                    $.ajax({
                                    type: "POST",
                                    url: "",
                                    cache: false,
                                    data: {'id': id},
                                    timeout: 15000,
                                    success: function (data)
                                    {
                                    $("#public_modal").modal('show');
                                    $("#public_modal .modal-content").html(data);
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                    alert("Error");
                                    }
                                    });
                                    }
                            </script>                                    
                        </div>
                        <div class = "tab-pane" id = "target_achiement_block">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" id="target_chart_form" method="post" accept-charset="utf-8">
                                        <div class=" form-group">
                                            <table class="chart_filter">
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form> 
                                </div>
                                <div class="col-md-6 text-right">
                                    <a style="color: #0084bf"><i class="fa fa-square"></i> Target</a>&nbsp;&nbsp;<a style="color: #009900"><i class="fa fa-square"></i> Achievement</a>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 target_chart_container nopadding" style="overflow: hidden"></div>
                                </div>
                            </div> 
                        </div>
                
                    </div>
                </div>
            </div>
        </div>

</section>   
    <!-- /.main content -->  
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webases1/ayeshaerp.webase.solutions/resources/views/main/admin/dashboard.blade.php ENDPATH**/ ?>