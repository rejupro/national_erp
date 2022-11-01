<style>
    .kchatslide{
      position: fixed;
      bottom:37px;
      z-index: 98888;    
      background: #00305d;
      width: 300px; 
      right: -300px;
      height: 400px;
      transition: right 0.4s ease-in-out;
      -o-transition: right 0.4s ease-in-out;
      -ms-transition: right 0.4s ease-in-out;
      -moz-transition: right 0.4s ease-in-out;
      -webkit-transition: right 0.4s ease-in-out;
    }
    .kchattoggle{
      position: absolute;
      bottom: 14px;
      width: 60px;
      height: 32px;
      right: 287px;
      padding: 6px;
      background: #f39c12;
      border-color: #e08e0b;
      font-size: 15px;
      text-align: center;
      vertical-align: middle;    
      color: #fff;
      cursor: pointer;    
    }
    .kchatbox {
      padding: 10px;
      background: #00305d;
      border-color: #00305d;    
    }
    .kchatslide-open{
      right: 0px;
    }
    .chat_con{
    height: 348px;
    background: #222d32;
    color: #fff;    
    overflow: hidden;
    overflow-y: auto;       
    }
        
    .subpanel_title {
        padding-top: 4px;
        line-height: 21px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .subpanel_title {
        background: #1d4a88;
        color: #FFFFFF;
    }
    .subpanel_title {
        background: #00b0ff;
        color: #fff;
    }
    .subpanel_title {
        cursor: pointer;
        font-weight: bold;
        padding: 3px 4px 3px 8px;
        font-size: 17px;
        display: block;
        height: 30px;
        overflow: hidden;
    }
    .subpanel_title span.options {
        width: 12px;
        height: 12px;
        display: none;
    }
    .subpanel_title span {
        filter: alpha(opacity=100);
        opacity: 1;
        -moz-opacity: 1;
        font-size: 17px;
        font-weight: bold;
        float: right;
        line-height: 1.7em;
        padding: 2px 0 1px 1px;
    }
    .subpanel_title .minusicon:hover {
        color: #060;
    }
    .subpanel_title span.min {
        padding: 0;
    }
        
    .chat_options {
        background: #f9f9f9;
        border-bottom: 1px solid #eee;
    }
    .chat_options {
        height: 37px;
    }
    .chat_options {
        overflow: hidden;
        position: relative;
    }
    .chat_options .drupalchat-self-profile {
        display: inline-block;
        height: 37px;
        width: 78%;
    }
    .chat_options .drupalchat-self-profile .drupalchat-self-profile-div {
        display: inline-block;
        width: 32px;
    }
    .chat_options .drupalchat-self-profile .drupalchat-self-profile-div .drupalchat-self-profile-img img {
        margin: 3px 0 4px 10px;
        float: left;
        height: 28px;
        width: 28px;
        -webkit-border-radius: 28px;
        -moz-border-radius: 28px;
        border-radius: 28px;
    }
    .localhost-avatar-sprite-28.R_3 {
        background-position: -56px -476px;
        width: 28px;
        height: 28px;
    }
    .chat_options .drupalchat-self-profile .drupalchat-self-profile-namdiv {
        display: inline-block;
        width: 70%;
        padding: 0;
        margin: 0;
        height: 100%;
        padding-left: 3px;
    }
    .chat_options .drupalchat-self-profile .drupalchat-self-profile-namdiv .drupalchat-profile-un {
        display: inline;
        border: 0;
        padding: 0;
        margin-left: 7px;
        margin-top: 11px;
        position: absolute;
        float: left;
        width: 118px;
        font-size: 13px;
        overflow: hidden;
        cursor: pointer;
        font-weight: bold;
    }
    .chat_options a {
        border-left: 1px solid #999;
        color: #333;
    }
    .chat_options a {
        float: right;
        padding: 3px 8px 3px 3px;
        width: 18px;
        height: 18px;
    }
    .chat_options .drupalchat-usermenu {
        height: 37px;
        display: inline-block;
        cursor: pointer;
        width: 22%;
    }
    .chat_options .drupalchat-usermenu .drupalchat-usermenu-img {
        color: #333;
    }
    .chat_options .drupalchat-usermenu .drupalchat-usermenu-img {
        padding-top: 8px;
        padding-left: 0;
        float: left;
        font-size: 22px;
    }
    .chat_options .drupalchat-usermenu a {
        display: block;
        position: absolute;
        height: 37px;
        width: 10%;
        border: 0;
        padding: 0;
        margin-left: 26px;
    }
    .chat_options span.status-1 {
        background: url(img/online.png) no-repeat left;
    }
    .chat_options a {
        border-left: 1px solid #999;
        color: #333;
    }
    .chat_options a {
        float: right;
        padding: 3px 8px 3px 3px;
        width: 18px;
        height: 18px;
    }
        
    .chat_options .drupalchat-self-profile .drupalchat-self-profile-div .drupalchat-self-profile-img img {
        margin: 3px 0 4px 10px;
        float: left;
        height: 28px;
        width: 28px;
        -webkit-border-radius: 28px;
        -moz-border-radius: 28px;
        border-radius: 28px;
    }
    
    .statuso {
        display: inline;
        width: 0px;
        height: 21px;
        float: right;
        padding-top: 10px;
    }
    .statuso.Online {
        color: green;
    }
    .statuso.Offline {
        color: gray;
    }    
        
    .drupalchat_search {
        background: #f9f9f9;
        border-bottom: 1px solid #eee;
    }
    .drupalchat_search {
        overflow: hidden;
        position: relative;
    }
    .drupalchat_search .drupalchat_searchinput {
        background: #f9f9f9;
    }
    .drupalchat_search .drupalchat_searchinput {
        height: 30px;
        outline: 0;
        vertical-align: middle;
        margin-left: 7px;
        border: 0;
        font-size: 12px;
    }
    .drupalchat_search .searchbutton {
        background: url(public/frontend/chat/chatcss/img/searchb.png) no-repeat center;
        width: 14px;
        height: 14px;
        float: right;
        filter: none;
    }
    .contact-list {
        width: 348px;
        height: 303px;
        overflow-y: scroll;
        background-color: #eceff1;
    }
    
    .chatboxcontent{
        width: 100%;padding: 0;
    }    
    
    .chatboxcontent{
        overflow-y: auto;
        overflow-x: hidden;
        height: 303px;
    }    
        
    .chat_box.img {
        float: left;
        height: 28px;
        width: 28px;
        -webkit-border-radius: 28px;
        -moz-border-radius: 28px;
        border-radius: 28px;
    }    
    </style>    
    
    <!--Contact List end-->
    
    <!--Contact List end-->
    
    <!--This div for modal light box chat box image-->
    <table id="lightbox" style="display: none;height: 100%">
    <tbody><tr>
    <td height="10px"><p><img src="<?php echo e(asset('public/frontend/chat/images/close-icon-white.png')); ?>" width="30px" style="cursor: pointer"></p></td>
    </tr>
    <tr>
    <td valign="middle"><div id="content"><img src="#"></div></td>
    </tr>
    </tbody></table>
    <!--This div for modal light box chat box image-->
    </div><aside class="right-side-free">
    <section class="side-cont">
    <div class="side-head">    
    <div class="row"> 
    <div class="col-md-12">
    <div class="col-md-10 text-right"></div>
    <div class="col-md-2 text-right">
    <button class="btn btn-flat bg-red" id="closefree"><span><i class="fa fa-times"></i></span></button>
    </div>    
    </div>
    </div>    
    </div>
    <div class="box box-solid">
    <div class="box-body">
    <div class="col-md-12">    
    <div class="row" id="datacon">
        
    </div>
    </div>    
    </div>
    </div>
    </section>    
    </aside>  
    <?php $comp = DB::table('companys')->orderBy('id','asc')->first(); ?>
    <footer class="main-footer">
        © 2010 - 2021. <a href="#" target="_blank" style="font-weight: 1000!important;"><?php echo e($comp->name); ?></a> - All Rights Reserved.<span class="footright"><i class="fa fa-heart" style="color: red;"></i> Crafted By <a href="https://webase.com.bd" target="__blank">Webase</a></span>
     </footer>
     <div class="modal holds-the-iframe" id="modal-default" style="z-index: 1500">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <a class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></a>
                    <h4 class="modal-title">&nbsp;</h4>
                    <input type="hidden" id="callback">
                </div>
                <div class="modal-body ">
                    <iframe src="" frameborder="0" id="modal_default_iframe"></iframe>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade modal-msg">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body"><p></p></div>
                <div class="modal-footer">
                    <span class="modal-msg-url hidden"></span>
                    <a class="btn btn-flat bg-purple" onclick="close_toaster()">OK</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade modal-confirm" style="z-index: 1151;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body"><p></p></div>
                <div class="modal-footer">
                    <a class="btn btn-flat bg-purple" data-dismiss="modal" aria-label="Close" onclick="confirmbox('', '', this)">OK</a>
                    <a class="btn btn-flat bg-gray" data-dismiss="modal" aria-label="Close">Cancel</a>
                    <input type="hidden" id="urlpath" value="">
                </div>
            </div>
        </div>
    </div>
    
    <div id="modal-activity-log" class="modal fade modal-activity-log">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title">Activity Log</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <a class="btn btn-flat bg-gray" data-target="modal-activity-log" data-dismiss="modal" aria-label="Close">Close</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="bcast-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="bcast_id">
                    <a class="btn btn-flat bg-gray btn-sm" onclick="confirm_broadcast(0)">Decline</a> 
                    <a class="btn btn-flat bg-purple btn-sm" onclick="confirm_broadcast(1)">Accept</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <div id="logout_reminder_modal" class="modal fade">
        <div class="modal-dialog" style="top: 30%;">
            <div class="modal-content">
    
                <div class="modal-body" style="min-height: 300px;    background: #00a3e3;">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center"><a style="color: #fff;font-size: 81px;"><i class="fa fa-clock-o"></i></a></p>
                            <p style="color: #fff;    font-size: 15px;text-align: center">Administration!!! You will be logged out in <span class="logout_interval" style="font-size:25px">15 minutes</span> due to inactivity.<br>If you wish to continue with this session please click on Renew<br><br></p>
                            <p class="text-center"><a class="btn btn-flat bg-purple" onclick="renew_session()">Renew Session</a> <a class="btn btn-flat bg-gray" href="inc/logout.php">Logout</a></p>
    
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
    <div id="modal-support" class="modal fade common_modal" role="dialog">
        <div class="modal-dialog modal-sm" style="width:1000px;">
            <!-- Modal content-->
            <div class="modal-content"></div>
        </div>
    </div>
    
    
    <div class="popup-box chat-popup" id="qnimate"></div>
    <div class="modal fade " id="chat_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    
    
    <div class="modal fade " id="file_upload_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="modal fade common_modal " id="public_modal" role="dialog">
        <div class="modal-dialog  modal-sm">
            <div class="modal-content"></div>
        </div>
    </div>
    <div id="view_msg" class="modal fade common_modal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" style="width:500px;">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top:300px;"></div>
        </div>
    </div>
    </div>
    <!-- ./wrapper -->
    <script src="<?php echo e(asset('public/frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap-datepicker.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/checkedit/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/piker/spectrum.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/datatable/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/treetable/js/jquery.treetable.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/select/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/axes.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/common.js?V=1.0')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/jquery.PrintArea.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/axes-scanner.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/notify/notify.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/list/list.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/list/list.pagination.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/plugins/livevalidation/live_validation.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/parsley.js')); ?>"></script>
    <script type="text/javascript">
        var siteurl = '';
        var chatmod = 'off';
        var chat;
        var chatlist;    
        var session_uname = '1';
        var session_img = 'DV-Lo_1586579338.jpg';
        </script>
    <!-- Media Uploader -->
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/smiley/js/emojione.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/smiley/smiley.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/chatjs/lightbox.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/chatjs/chat.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/chatjs/custom.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/uploader/plupload.full.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/chat/uploader/jquery.ui.plupload/jquery.ui.plupload.js')); ?>"></script>

    <!-- Toaster Add -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            <?php if(Session::has('error')): ?>
                toastr.error('<?php echo e(Session::get('error')); ?>');
            <?php elseif(Session::has('success')): ?>
                toastr.success('<?php echo e(Session::get('success')); ?>');
            <?php elseif(Session::has('warning')): ?>
                toastr.warning('<?php echo e(Session::get('warning')); ?>');
            <?php elseif(Session::has('info')): ?>
                toastr.info('<?php echo e(Session::get('info')); ?>');
            <?php endif; ?>
        });

    </script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>


    <script type="text/javascript">
    var AXES_PAGE_TITLE = document.title;
    $(document).ready(function () {
    
    $('body').on("click", ".notifi_delete", function () {
    delete_notification(this, 1);
    });
    $('body').on("click", ".notifi_clear_all", function () {
    delete_notification(this, 2);
    });
    
    $('body').on("click", ".notifications-menu .dropdown-menu", function (e) {
    e.stopPropagation();
    });
    $('.notifications-menu').on('show.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    $('.notifications-menu').on('hide.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    
    $('body').on("click", ".delete_confirm", function () {
    var msg = $(this).data("msg");
    var url = $(this).prop('href');
    
    confirmbox(msg, url);
    return false;
    });
    $('body').on("click", ".popup", function () {
    popup(this);
    return false;
    });
    
    $("#modal-default").on("hidden.bs.modal", function () {
    var callback = $('#callback').val();
    if (callback)
    excecute_callback(callback);
    $('#callback').val('');
    });
    
    check_window_is_child();
            
    toggle_sidebar_menu();
        
    document.getElementById('modal_default_iframe').onload = function () {
    $('.holds-the-iframe .modal-body').addClass('hideBg');
    };
    
    });
        
    setTimeout(function() {
    $('#mymsg').fadeOut('fast');
    $.ajax({
    url: 'msg.php',
    type: 'post',
    data: {shows:1},
    //dataType: 'json',
    success:function(data) {
    }
    });    
    }, 3000); // <-- time in milliseconds
        
    function check_window_is_child() {
    if (window.self !== window.top) {
    $('.main-header,.main-sidebar,.main-footer').hide();
    $('.content-wrapper, .main-footer').css({'margin-left': '0'});
    $('.skin-purple .wrapper, .skin-purple .main-sidebar, .skin-purple .left-side').css({'background-color': '#ecf0f5'});
    } else {
               
    }   
    }
        
    function popup(obj) {
    $('.holds-the-iframe .modal-body').removeClass('hideBg');
    var modal_title = $(obj).data('title');
    $('#modal-default .modal-title').text(modal_title);
    $('#modal-default .modal-body iframe').prop('src', '');
    $('#modal-default .modal-body iframe').contents().find("body").html("");
    var urllink = $(obj).prop('href');
    $('#modal_default_iframe').hide();
    $('#modal-default .modal-body iframe').prop('src', urllink);
    var callback = $(obj).data("callback");
    $('#callback').val(callback);
    $("#modal-default").modal();
    setTimeout(function () {
    $('#modal_default_iframe').show();
    
    }, 1500);
    return false;
    }
        
    function popup_open(data) {
    $('.holds-the-iframe .modal-body').removeClass('hideBg');
    $('#modal-default .modal-body iframe').prop('src', '');
    $('#modal-default .modal-body iframe').contents().find("body").html("");
    $('#modal_default_iframe').hide();
    
    $('#modal-default .modal-body iframe').prop('src', data['src']);
    $('#modal-default .modal-title').text(data['title']);
    $('#callback').val(data['callback']);
    $("#modal-default").modal();
    setTimeout(function () {
    $('#modal_default_iframe').show();
    
    }, 1500);
    
    }
    
    function toaster(msg) {
    $('.modal-msg .modal-body').html(msg);
    $('.modal-msg').modal({backdrop: 'static', keyboard: false});
    }
       
    function toaster2(msg, url) {
    $('.modal-msg .modal-msg-url').text('');
    if (url)
    $('.modal-msg .modal-msg-url').text(url);
    $('.modal-msg .modal-body').html(msg);
    $('.modal-msg').modal({backdrop: 'static', keyboard: false});
    }
        
    function close_toaster() {
    try {
    var modal_msg_url = $('.modal-msg .modal-msg-url').text();
    
    $('.modal-msg').modal('hide');
    if (modal_msg_url && modal_msg_url != '' && modal_msg_url != null) {
    window.location.href = modal_msg_url;
    }
    } catch (exception) {
    alert(exception);
    }
    
    }
        
    function confirmbox(msg, url, obj) {
    if (obj) {
    url = $('.modal-confirm #urlpath').val();
    if (url && url != 'undefined') {
    window.location = url;
    }
    } else {
    
    $('.modal-confirm .modal-body p').text(msg);
    $('.modal-confirm #urlpath').val(url);
    $('.modal-confirm').modal({backdrop: 'static', keyboard: false});
    }
    }
        
    var myFunction = function () {
    window.focus();
    };
    
    function toggle_sidebar_menu(key)
    {
    if (key == 1) {
    $('.sidebar-mini').addClass('sidebar-collapse');
    } else {
    $('.sidebar-mini').removeClass('sidebar-collapse');
    }
    }
        
    function CheckEmailVal(email, check_val) {
    try {
    var result = true;
    if (email) {
    email = email.split(",");
    for (var i = 0; i < email.length; i++) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,8}|[0-9]{1,3})(\]?)$/;
    result = expr.test(email[i]);
    }
    
    } else if (check_val > 0 && !email) {
    var result = false;
    }
    return result;
    } catch (exception) {
    return false;
    }
    
    }
        
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
    }
        
    $('.datetimepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, clearBtn: true, orientation: 'auto bottom'});    
    /* Select2 Init*/
    $(".select2").select2();
    
    // <?php 
    // $parray = array('porcreate','pinvcreate','precreate','sescreate','sinvcreate','srecreate','bratra','whotra'); 
    // if(strlen(array_search($phead,$parray))<1){
    // ?>    
    //Barcode
    var bscode='';    
    $(document).scannerDetection({
    timeBeforeScanTest: 200, 
    //startChar: [120],
    endChar: [13],
    avgTimeByChar: 30,
    onComplete: function(barcode,event){ 
    bscode = barcode;   
    $.ajax({
    url: 'axe_globalview.php',
    method: "POST",
    data:{sbcode: bscode},
    success: function(data){
    var foundSomething = false;
    for(var i=0; i<data.length; ++i) {
    if(data[i] !== null) foundSomething = true;
    break;
    }    
    if(foundSomething){
    $('#datacon').html(data);   
    $('.right-side-free').toggle('slide', { direction: 'right' }, 300);
    }
    }
    });    
    },
    onKeyDetect: function(event){
    if(event.keyCode === 13 || event.keyCode === 17 || event.keyCode === 74 ){
    if (event.target.tagName == "INPUT" || event.target.tagName == "TEXTAREA") {
    if(bscode.length>1){
    event.preventDefault();    
    }    
    }else{
    event.preventDefault();    
    }  
    }
    }
    });   
    
    $(document).on('keydown', '#glsearch', function() {
    $('#glsearch' ).autocomplete({
    source: function( request, response ) {
    $.ajax({
    url: 'axe_cart.php',
    type: 'post',
    dataType: 'json',
    data: {
    search: request.term,glsearch:1
    },
    success: function(data) {
    response(data);
    }
    });
    },
    select: function (event, ui) {
    var te='';
    $(this).val(te); // display the selected text
    var glval = ui.item.value; // selected id to input
    
    $.ajax({
    url: 'axe_globalview.php',
    method: "POST",
    data:{sbcode: glval},
    success: function(data){
    var foundSomething = false;
    for(var i=0; i<data.length; ++i) {
    if(data[i] !== null) foundSomething = true;
    break;
    }    
    if(foundSomething){
    $('#datacon').html(data);   
    $('.right-side-free').toggle('slide', { direction: 'right' }, 300);
    }
    }
    });
    return false;
    }
    });    
    });     
        
    
    $(document).on('click', '#kchat', function() {
    if($('.kchatslide').hasClass('kchatslide-open')){
    $('.kchatslide').removeClass('kchatslide-open');    
    }else{
    $('.kchatslide').addClass('kchatslide-open');     
    }        
    });
        
    $(document).on('change', '#chaton', function () {
    var chkid = 0;	
    $('#chaton').not(this).prop('checked', false);
    if ($('#chaton').is(":checked")){
    chkid = 1;
    }else{
    chkid = 0;	
    }
    
    $.ajax({
    url: 'axe_chatcart.php',
    method: "POST",
    data: {
    check: chkid
    },
    dataType: 'json',    
    success: function(data) {
    chatmod=data.status;
    if(chatmod==='on'){
    chatclientlist();    
    startChatSession();   
    }else{
    for (i=0;i<chatBoxes.length;i++) {
    chatboxtitle = chatBoxes[i];
    closeChatBox(chatboxtitle);    
    }
    clearTimeout(chatlist);
    $('#chat_list').html('');    
    clearTimeout(chat);
    }    
    }
    });
    });

        
    $(document).on('click', '#closefree', function() {    
    $('#datacon').html('');
    if($('.right-side-free').is(':visible')) {
    $('.right-side-free').toggle('slide', { direction: 'right' }, 300);
    }    
    });    
    </script>

    <script type="text/javascript">
    
    $("#print").click(function() {    
    var mode = 'iframe'; //popup
    var close = mode == "popup";
    var options = {
    mode: mode,
    popClose: close
    };
    $("div.printableArea").printArea(options);
    });
        
    function pagelist(){    
    var perPage = 10;
    
    new List("test-list", {
    valueNames: ["pino","name"],
    page: perPage,
    plugins: [
    
    ListPagination({
    paginationClass: "pagination-layout",
    left: 2,
    right: 2
    })
    ]
    }).on("updated", function(list) {
    var isFirst = list.i == 1;
    var isLast = list.i > list.matchingItems.length - list.page;
    
    // make the Prev and Nex buttons disabled on first and last pages accordingly
    $(".pagination-prev.disabled, .pagination-next.disabled").removeClass(
    "disabled"
    );
    if (isFirst) {
    $(".pagination-prev").addClass("disabled");
    }
    if (isLast) {
    $(".pagination-next").addClass("disabled");
    }
    
    // hide pagination if there one or less pages to show
    if (list.matchingItems.length <= perPage) {
    $(".pagination-wrap").hide();
    } else {
    $(".pagination-wrap").show();
    }
    });
    }
        
    $(".pagination-next").click(function(e) {
    $(".pagination-layout .active")
    .next()
    .trigger("click");
    e.preventDefault();    
    });
        
    $(".pagination-prev").click(function(e) {
    $(".pagination-layout .active")
    .prev()
    .trigger("click");
    e.preventDefault();    
    });    
        
    $("#print").click(function() {    
    var mode = 'iframe'; //popup
    var close = mode == "popup";
    var options = {
    mode: mode,
    popClose: close
    };
    $("div.printableArea").printArea(options);
    });    
            
    function setPrinterConfig(){
    resolution = $('#resolution').val()!=undefined?$('#resolution').val():"A4";
    rotate = $('#rotate').val()!=undefined?$('#rotate').val():"portrait";
    
    $('.page').removeClass('A2 A4 A5 Letter Legal');
    $('.page').addClass(resolution);
    $('.page').removeClass('portrait landscape');
    $('.page').addClass(rotate);
    
    w = "21cm"; h = "29.7cm";
    if( resolution == "A4" ){
    w = "21cm"; h = "29.7cm";     
    }else if( resolution == "A5" ){
    w = "14.8cm"; h = "21cm";
    }else if( resolution == "Letter" ){
    w = "21.6cm"; h = "27.9cm";
    }else if( resolution == "Legal" ){
    w = "21.6cm"; h = "35.6cm";
    }
    if( rotate == "landscape" ){
    $('#pageInit').html("@page{size: "+h+" "+w+"}");
    }else{
    $('#pageInit').html("@page{size: "+w+" "+h+"}");
    }
    scaleTemplate();
    };
    
    function getPageHeight(){
    resolution = $('#resolution').val()!=undefined?$('#resolution').val():"A4";
    rotate = $('#rotate').val()!=undefined?$('#rotate').val():"portrait";
    
    w = 21; h = 29.7;
    if( resolution == "A4" ){
    w = 21; h = 29.7;      
    }else if( resolution == "A5" ){
    w = 14.8; h = 21;
    }else if( resolution == "Letter" ){
    w = 21.6; h = 27.9;
    }else if( resolution == "Legal" ){
    w = 21.6; h = 35.6;
    }
    if( rotate == "landscape" ){
    return w;
    }else{
    return h;
    }
    };
    
    function getPageWidth(){
    resolution = $('#resolution').val()!=undefined?$('#resolution').val():"A4";
    rotate = $('#rotate').val()!=undefined?$('#rotate').val():"portrait";
    
    w = 21; h = 29.7;
    if( resolution == "A4" ){
    w = 21; h = 29.7;      
    }else if( resolution == "A5" ){
    w = 14.8; h = 21;
    }else if( resolution == "Letter" ){
    w = 21.6; h = 27.9;
    }else if( resolution == "Legal" ){
    w = 21.6; h = 35.6;
    }
    if( rotate == "landscape" ){
    return h;
    }else{
    return w;
    }
    };
    
    function scaleTemplate(){
    $.each($('[id=wrap_invoice]'), function(i, wrap_invoice){
    var scale = 1;
    if( $(wrap_invoice).parent().is(".wrapper") ){
    $(wrap_invoice).unwrap();
    }
    var parent = $(wrap_invoice).parent();
    var padding = $(parent).outerWidth()-$(parent).width();
    var outer_height = $(parent).height();
    var inner_height = $(wrap_invoice).outerHeight();
    var outer_width = $(parent).width();
    var inner_width = $(wrap_invoice).outerWidth();
    if( outer_width < inner_width ){
    if( padding == 0 ){
    scale = parseFloat(outer_width/(inner_width+20));
    padding = 20;
    }else{
    scale = parseFloat(outer_width/inner_width);
    padding = 0;
    }
    var x = padding/2;
    var origin = x.toFixed(2)+"px 0px 0px";
    $(wrap_invoice).css({'-webkit-transform': 'scale('+(scale.toFixed(2))+')', '-webkit-transform-origin': origin});
    var wrapper = $("<div class='wrapper'></div>");
    $(wrapper).css({'width': inner_width*scale, 'height': inner_height*scale, "overflow": "hidden"});
    $(wrap_invoice).wrap(wrapper);
    }else{
    $(wrap_invoice).css({'-webkit-transform': '', '-webkit-transform-origin': ""});
    }
    });
    };
    
    document.table_border = false;
    document.table_strip = false;
    document.table_border = true;
    document.table_strip = true;
    
    $(document).ready(function(){
    $('#wrap_invoice table').removeClass();
    $('#wrap_invoice table').addClass('table_invoice table_invoice-condensed');
    
    $('#wrap_invoice table').addClass('table_invoice-bordered');
      
    $('#wrap_invoice table').addClass('table_invoice-striped');
      
      
    
    setPrinterConfig();
    $('body').on('keyup', function(ev){
    if( ev.keyCode == 27 ){
    $('#close_page').click();
    }
    });
    
    $('#close_page').click(function(){
    window.close();
    window.parent.window.close();
    return false;
    });
    window.onresize = function() {
    scaleTemplate();
    }
    scaleTemplate();
    });
        
    setTimeout(function() {
    $(window).trigger("resize");
    }, 100);
        
    function sethead(){
    var maxh = 0;
    var ahe = $("#adheight").height();
    var ihe = $("#inheight").height();
    
    if(ahe>ihe){
    maxh=ahe;   
    }else{
    maxh=ihe;    
    }
    if(maxh>ahe){
     $("#adheight").height(maxh);    
    }else if(maxh>ihe){
     $("#inheight").height(maxh);        
    }    
    };
    sethead();    
    </script>

<!-- page script -->
<!-- page script -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#datarec').DataTable({stateSave: true});
    } );
    function edit_item(id) {
       document.getElementById(id).submit(); 
    }
    function remove_item(id) {
            bootbox.confirm({
                title: "Confirm",
                message: "Are you sure to delete ?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-flat bg-purple'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-flat bg-gray'
                    }
                },
                callback: function (result) {
                    if (result == true) {
                        document.getElementById(id).submit();
                    }
                }
            });
    
        } 
    </script>  

<script>

        
function getDatebd(arg){
const rojAdd = ' রোজ ';
const esheAdd = { e:' ',she:' শে'}
const kalAdd = ' কাল';
const abodo = ' বঙ্গাব্দ' ;
const monthName = [
'বৈশাখ',//0
'জ্যৈষ্ঠ ',//1
'আষাঢ় ',//2
'শ্রাবণ ',//3
'ভাদ্র',//4
'আশ্বিন ',//5
'কার্তিক ',//6
'অগ্রহায়ণ ',//7
'পৌষ ',//8
'মাঘ',//9
'ফাল্গুন ',//10
'চৈত্র '//11
];
const dayName = [
  'বৃহস্পতিবার',
'শুক্রবার',
'শনিবার',
'রবিবার',
'সোমবার',
'মঙ্গলবার',
'বুধবার',

];
const session = [
'গ্রীষ্ম',
'বর্ষা',
'শরৎ',
'হেমন্ত',
'শীত',
'বসন্ত',
];
const numBd =['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
const convertNumber = (n)=>n.toString().split("").map(num=> numBd[num]).join('');
const addEe = n=>{ let x,y;
  x = n>=10&&n<20 ?  esheAdd.e:''; y= n>=20&&n<=31 ? esheAdd.she:'';return x || y?y+x:''
}



const getYear = (dmy)=>dmy.month<=4 && dmy.date<=13? dmy.year-594 : dmy.year-593;
const getMonthDate = (d,m)=>{
   switch (true) {
      case m==1 && d<=13 :m=8;d= d+17;
     break; 
     case m==1 && d>13 :m=9;d= d-13;
     break;
      case m==2 && d<=12 :m=9;d= d+18;
     break;
      case m==2 && d>12:m=10;d= d-12;
     break;
      case m==3 && d<=14 :m=10;d= d+16;
     break;
      case m==3 && d>14 :m=11;d= d-14;
     break;
      case m==4 && d<=13 :m=11;d= d+17;
     break;
      case m==4 && d>13 :m=0;d= d-13;
     break;
      case m==5 && d<=14 :m=0;d= d+17;
     break;
      case m==5 && d>14 :m=1;d= d-14;
     break;
      case m==6 && d<=14 :m=1;d= d+17;
     break;
      case m==6 && d>14 :m=2;d= d-14;
     break;
      case m==7 && d<=15 :m=2;d= d+16;
     break;
      case m==7 && d>15 :m=3;d= d-15;
     break;
      case m==8 && d<=15 :m=3;d= d+16;
     break;
      case m==8 && d>15 :m=4;d= d-15;
     break;
      case m==9 && d<=15 :m=4;d= d+16;
     break;
      case m==9 && d>15 :m=5;d= d-15;
     break;
      case m==10 && d<=15 :m=5;d= d+15;
     break;
      case m==10 && d>15 :m=6;d= d-15;
     break;
      case m==11 && d<=14 :m=6;d= d+16;
     break;
      case m==11 && d>14 :m=7;d= d-14;
     break;
      case m==12 && d<=14 :m=7;d= d+16;
     break;
      case m==12 && d>14 :m=8;d= d-14;
      default:
        m  = false,
        d=false;
    }

return {month:m,date:d};

}

var GetdayName =  dayName[new Date(arg.year,arg.month,arg.date).getDay()];
let daymon = getMonthDate(arg.date,arg.month);
let getSession = session[Math.floor(daymon.month/2)];

return {
day:rojAdd+GetdayName,
date:convertNumber(daymon.date) +addEe(daymon.date),
month:monthName[daymon.month],
session:getSession+kalAdd,
year:convertNumber(getYear(arg)) +abodo,
}

}


const setDateEng = (tarik)=>{
let dayName = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
let monthName = ["January","February", "March","April","May","June","July","August","September","October","November", "December"]
const arg = {
date:tarik.getDate(),
month:tarik.getMonth()+1,
year:tarik.getFullYear(),
} 
console.log(arg)
const dateEn = {
day:dayName[tarik.getDay()],
date:arg.date,
month:monthName[arg.month-1],
year:arg.year
}

const dateBd =  getDatebd(arg);
return { dateEn,dateBd}
}


function setDatetimeHtml(dateVal){
let { dateEn,dateBd}= setDateEng(new Date(dateVal))
console.log({ dateEn,dateBd})
const app = document.getElementById('app');
const dtext = app.querySelectorAll('[d-text]');
for (let i = 0; i < dtext.length; i++) {
  let att =  dtext[i].getAttribute('d-text');
  if (att) {
  dtext[i].textContent=eval(att);
  }
}



}


setDatetimeHtml(new Date());
flatpickr("#indate");
document.getElementById('indate').onchange=function(){
setDatetimeHtml(this.value);

}



</script>  
    <!-- /page script --><?php /**PATH C:\xampp\htdocs\national2\resources\views/layouts/admin/footer.blade.php ENDPATH**/ ?>