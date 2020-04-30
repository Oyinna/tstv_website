<div class="panel panel-default">
    <div class="panel-heading">
        Registration functions
    </div>
    <div class="panel-body">
        <a href="admin_registrations-edit.php?code=<?php echo $registrationdetails['registration_id'] ?>" class="btn btn-default btn-block">Edit Information</a>
        <a href="admin_registrations-sendmessage.php?code=<?php echo $registrationdetails['registration_id'] ?>" class="btn btn-default btn-block">Message Dealer</a>
        <a href="admin_registrations-view.php?code=<?php echo $registrationdetails['registration_id'] ?>" class="btn btn-default btn-block">Dealer details</a>
        <a href="admin_registrations-view.php?code=<?php echo $registrationdetails['registration_id']."&approve=yes" ?>" onclick="if(!confirm('Do you want to approve this registration')) return false;" class="btn btn-success btn-block">Approve Registration</a>
        <a href="admin_registrations-view.php?code=<?php echo $registrationdetails['registration_id']."&delete=yes" ?>" onclick="if(!confirm('Do you want to delete this registration')) return false;" class="btn btn-danger btn-block">Delete Registration</a>
    </div>
</div><!-- /.box -->
