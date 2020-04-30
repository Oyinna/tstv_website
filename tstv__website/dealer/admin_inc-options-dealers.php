<div class="panel panel-default">
    <div class="panel-heading">
        Dealer functions
    </div>
    <div class="panel-body">
        <a href="admin_dealers-edit.php?code=<?php echo $dealerdetails['dealer_id'] ?>" class="btn btn-default btn-block">Edit Information</a>
        <a href="admin_dealers-sendmessage.php?code=<?php echo $dealerdetails['dealer_id'] ?>" class="btn btn-default btn-block">Message Dealer</a>
        <a href="admin_dealers-status-edit.php?code=<?php echo $dealerdetails['dealer_id'] ?>" class="btn btn-default btn-block">Status</a>
        <a href="admin_dealers-view.php?code=<?php echo $dealerdetails['dealer_id'] ?>" class="btn btn-default btn-block">Dealer details</a>
<?php if(file_exists("agreements/agreement_{$dealerdetails['dealer_id']}.pdf")) { ?>
        <a href="agreements/agreement_<?php echo $dealerdetails['dealer_id']?>.pdf" target="_blank" download class="btn btn-default btn-block">Original Agreement</a>
<?php } ?>        
<?php if(file_exists("agreements/agreement_{$dealerdetails['dealer_id']}_signed.pdf")) { ?>
        <a href="agreements/agreement_<?php echo $dealerdetails['dealer_id']?>_signed.pdf" target="_blank" download class="btn btn-default btn-block">Signed Agreement</a>
<?php } ?>        
        <a href2="admin_dealers-delete.php?code=<?php echo $dealerdetails['dealer_id'] ?>" class="btn btn-warning btn-block">Delete Dealer</a>
    </div>
</div><!-- /.box -->
