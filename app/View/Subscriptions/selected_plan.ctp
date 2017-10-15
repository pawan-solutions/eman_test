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
                <span class="umstyle1"><?php echo __('Selected plans by customers'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <!-- <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add Plans",true), array('plugin'=>'', 'controller'=>'subscriptions', 'action'=>'all')) ?></span> -->
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
                                    <th><?php echo  __('Customer name'); ?></th>
                                    <th><?php echo __('Plan Name'); ?></th>
                                    <th><?php echo  __('Plan Type'); ?></th>
                                    <th><?php echo __('Plan Price'); ?></th>
                                    <th><?php echo __('Number of companies'); ?></th>
                                    <th><?php echo __('Created Date'); ?></th>
                                    <th><?php echo "Action"; ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php     if (!empty($results)) {
                                    $page = $this->request->params['paging']['SubOrder']['page'];
                                    $limit = $this->request->params['paging']['SubOrder']['limit'];
                                    $i=($page-1) * $limit;
                                    foreach ($results as $row) {
                                        $i++;
                                        echo "<tr id='rowId".$row['SubOrder']['id']."'>";
                                        echo "<td>".h($row['User']['first_name'])."</td>";
                                        echo "<td>".h($row['Subscription']['plan_name'])."</td>";
                                        echo "<td>".h($row['Subscription']['plan_type'])."</td>";
                                        echo "<td>$".$row['Subscription']['plan_price']."</td>";
                                        echo "<td>".$row['Subscription']['number_of_companies']."</td>";
                                        echo "<td>".date("d-m-Y", strtotime($row['SubOrder']['created_date']))."</td>";
                                        echo  "<td>";
                                        echo $this->Html->link(__("View",true),"/subscriptions/view/".$row['SubOrder']['id']);
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(!empty($results)) { echo $this->element('Usermgmt.pagination', array("totolText" => "Number of plans")); } ?>
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