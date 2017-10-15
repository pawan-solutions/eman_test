<?php $urlActions = $this->params['action'];?>

<div class="col-md-3">
    <div class="list-group">
      <a href='<?php echo SITE_URL.'applications/new_residency';?>' class="list-group-item <?php echo ($urlActions=="new_residency")?'active':'';?>">New Residency</a>
      <a href='<?php echo SITE_URL.'applications/renew_residency';?>' class="list-group-item <?php echo ($urlActions=="renew_residency")?'active':'';?>">Renew Residency</a>
      <a href='<?php echo SITE_URL.'applications/local_transfer';?>' class="list-group-item <?php echo ($urlActions=="local_transfer")?'active':'';?>">Local Transfer</a>
      <a href='<?php echo SITE_URL.'applications/cancellation';?>' class="list-group-item <?php echo ($urlActions=="cancellation")?'active':'';?>">Cancellation</a>
      <a href='<?php echo SITE_URL.'applications/adjustment';?>' class="list-group-item <?php echo ($urlActions=="adjustment")?'active':'';?>">Adjustment</a>
        
    </div>
</div>

