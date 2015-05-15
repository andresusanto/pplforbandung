<?php ?>
@if (Session::has('notif-danger'))
<div class='alert alert-danger notification' style='margin-top:15px;'>
    {{Session::pull('notif-danger')}}
</div>
@endif
@if (Session::has('notif-success'))
<div class='alert alert-success notification' style='margin-top:15px;'>
    {{Session::pull('notif-success')}}
</div>
@endif