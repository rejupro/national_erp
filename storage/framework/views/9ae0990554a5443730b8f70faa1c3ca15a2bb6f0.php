<?php
   use App\Updaterole;
   $user_id = Auth::User()->id;
   $datas = Updaterole::where('user_id',$user_id)->first();
   $project_group = isset($datas['project_group']) ? $datas['project_group'] : "";
   
?><?php /**PATH C:\xampp\htdocs\erp\resources\views/layouts/admin/aside_condition.blade.php ENDPATH**/ ?>