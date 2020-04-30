<div class="panel panel-default">
    <div class="panel-heading">
        Program functions
    </div>
    <div class="panel-body">
        <a href="programs-edit.php?code=<?php echo $programdetails['program_id'] ?>" class="btn btn-default btn-block">Edit Program</a>
        <a href="programs-schedules-list.php?code=<?php echo $programdetails['program_id'] ?>" class="btn btn-default btn-block">View Schedules</a>
        <a href="programs-schedules-add.php?code=<?php echo $programdetails['program_id'] ?>" class="btn btn-default btn-block">Add Schedule</a>
        <a href="programs-status.php?code=<?php echo $programdetails['program_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="programs-view.php?code=<?php echo $programdetails['program_id'] ?>" class="btn btn-default btn-block">Program Details</a>
        <a href="channels-view.php?code=<?php echo $programdetails['channel_id'] ?>" class="btn btn-default btn-block">View Channel</a>
        <a href="programs-view.php?code=<?php echo $programdetails['program_id'] ?>&delete=yes" class="btn btn-warning btn-block" onclick="if(!confirm('Do you want to delete this program?')) return false;">Delete Program</a>
    </div>
</div><!-- /.box -->
