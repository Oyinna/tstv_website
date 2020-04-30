<div class="panel panel-default">
    <div class="panel-heading">
        Tranmission functions
    </div>
    <div class="panel-body">
        <a href="transmissions-edit.php?code=<?php echo $transmissiondetails['transmission_id'] ?>" class="btn btn-default btn-block">Edit Transmission</a>
        <a href="transmissions-pictures.php?code=<?php echo $transmissiondetails['transmission_id'] ?>" class="btn btn-default btn-block">Pictures</a>
        <a href="transmissions-reviews.php?code=<?php echo $transmissiondetails['transmission_id'] ?>" class="btn btn-default btn-block">View Reviews</a>
        <a href="transmissions-status.php?code=<?php echo $transmissiondetails['transmission_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="transmissions-view.php?code=<?php echo $transmissiondetails['transmission_id'] ?>" class="btn btn-default btn-block">Transmission details</a>
        <a href="transmissions-view.php?code=<?php echo $transmissiondetails['transmission_id'] ?>&delete=yes" class="btn btn-warning btn-block" onclick="if(!confirm('Do you want to delete this transmission?')) return false;">Delete transmission</a>
    </div>
</div><!-- /.box -->
