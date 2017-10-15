<?php if(!$this->request->isAjax) { ?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/um.autocomplete')); ?>
<div class="umtop">
 <div class="container">
   <div class="row">
    <div class="col-md-12">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('Usermgmt.dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid radius-all">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('All Invoices'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="head-border"></div>
            <div class="um_box_mid_content_mid" id="index">
                <div id="updateSubscriptionIndex">
<?php } ?>
                    <?php //echo $this->Search->searchForm('Subscription', array('legend' => 'Search', "updateDivId" => "updateSubscriptionIndex")); ?>
                    <?php //echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateSubscriptionIndex")); ?>
                    <div class="tableContainer">
                        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
                            <thead>
                                <tr>
                                   
                                    <th><?php echo __('id'); ?></th>
                                    <th><?php echo __('Customer Name'); ?></th>
                                    <th><?php echo __('From Date'); ?></th>
                                    <th><?php echo  __('To Date'); ?></th>
                                    <th><?php echo  __('Amount'); ?></th>
                                    <th><?php echo __('Created Date'); ?></th>
                                    <th><?php echo "Status"; ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php     if (!empty($invoices)) {
                                    $page = $this->request->params['paging']['Invoice']['page'];
                                    $limit = $this->request->params['paging']['Invoice']['limit'];
                                    $i=($page-1) * $limit;
                                    
                                    foreach ($invoices as $row) {
                                        if($row['Invoice']['status']==1 && $row['Invoice']['payment_status']==1)
                                        {
                                            $status = "Paid";
                                        }elseif($row['Invoice']['status']==0){
                                            $status = "Cancelled";
                                        }else{
                                            $status = "Open";
                                        }

                                        $i++;
                                        echo "<tr id='rowId".$row['Invoice']['id']."'>";
                                        echo "<td>".h($row['Invoice']['id'])."</td>";
                                        echo "<td>".h($row['User']['first_name'])."</td>";
                                        echo "<td>".date("d-m-Y", strtotime($row['Invoice']['from_date']))."</td>";
                                        echo "<td>".date("d-m-Y", strtotime($row['Invoice']['to_date']))."</td>";
                                        echo "<td>".$this->Custom->getFormatedAmount($row['Invoice']['amount'])."</td>";
                                        echo "<td>".date("d-m-Y", strtotime($row['Invoice']['invoice_date']))."</td>";
                                        echo "<td>".$status."</td>";
                                        
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(!empty($invoices)) { echo $this->element('Usermgmt.pagination', array("totolText" => "Number of Subscription")); } ?>
<?php if(!$this->request->isAjax) { ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="um_box_down"></div>
</div>
<?php } ?>