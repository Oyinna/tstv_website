<div class="panel panel-default">
    <div class="panel-heading">
        Channels functions
    </div>
    <div class="panel-body">
        <a href="channels-edit.php?code=<?php echo $channeldetails['channel_id'] ?>" class="btn btn-default btn-block">Edit Channel</a>
        <a href="channels-programs-list.php?code=<?php echo $channeldetails['channel_id'] ?>" class="btn btn-default btn-block">View Programs</a>
        <a href="channels-programs-add.php?code=<?php echo $channeldetails['channel_id'] ?>" class="btn btn-default btn-block">Add Program</a>
        <a href="channels-status.php?code=<?php echo $channeldetails['channel_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="channels-view.php?code=<?php echo $channeldetails['channel_id'] ?>" class="btn btn-default btn-block">Channel details</a>
        <a href="channels-view.php?code=<?php echo $channeldetails['channel_id'] ?>&delete=yes" class="btn btn-warning btn-block" onclick="if(!confirm('Do you want to delete this channel?')) return false;">Delete channel</a>
    </div>
</div><!-- /.box -->
