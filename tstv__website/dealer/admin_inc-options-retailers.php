<div class="panel panel-default">
    <div class="panel-heading">
        Retailer functions
    </div>
    <div class="panel-body">
        <a href="admin_retailers-edit.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-default btn-block">Edit Information</a>
        <a href2="admin_retailers-retailers.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-default btn-block">View Sales</a>
        <a href="admin_retailers-sendmessage.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-default btn-block">Message Retailer</a>
        <a href="admin_retailers-status-edit.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="admin_retailers-view.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-default btn-block">Retailer details</a>
        <a href="admin_retailers-delete.php?code=<?php echo $retailerdetails['retailer_id'] ?>" class="btn btn-warning btn-block">Delete Retailer</a>
    </div>
</div><!-- /.box -->
