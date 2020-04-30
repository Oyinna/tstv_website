<div class="panel panel-default">
    <div class="panel-heading">
        Manager functions
    </div>
    <div class="panel-body">
        <a href="admin_managers-edit.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-default btn-block">Edit Information</a>
        <a href="admin_managers-dealers.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-default btn-block">View Dealers</a>
        <a href="admin_managers-sendmessage.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-default btn-block">Message Manager</a>
        <a href="admin_managers-status-edit.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="admin_managers-view.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-default btn-block">Manager details</a>
        <a href="admin_managers-delete.php?code=<?php echo $managerdetails['manager_id'] ?>" class="btn btn-warning btn-block">Delete Manager</a>
    </div>
</div><!-- /.box -->
