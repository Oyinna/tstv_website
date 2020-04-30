<div class="panel panel-default">
    <div class="panel-heading">
        Officer functions
    </div>
    <div class="panel-body">
        <a href="officers-badge.php?code=<?php echo $officerdetails['officer_id'] ?>" target="_blank" class="btn btn-default btn-block">View Badge</a>
        <a href="officers-edit.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">Edit Information</a>
        <a href="officers-sendmessage.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">Send SMS</a>
        <a href="officers-subscriptions.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">View Subscriptions</a>
        <a href="officers-incidents.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">View Incidents</a>
        <a href="officers-status-edit.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="officers-view.php?code=<?php echo $officerdetails['officer_id'] ?>" class="btn btn-default btn-block">Officer details</a>
        <a href="pictures/officers/<?php echo $officerdetails['officer_id'] ?>.jpg" target="_blank"><img src="pictures/officers/<?php echo $officerdetails['officer_id'] ?>.jpg" style="max-width: 100%; margin-top: 10px;" /></a>
    </div>
</div><!-- /.box -->
