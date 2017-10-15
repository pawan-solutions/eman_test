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
                <span class="umstyle1"><?php echo __('All Plans'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add Plans",true), array('plugin'=>'', 'controller'=>'subscriptions', 'action'=>'all')) ?></span>
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
                                   
                                    <th><?php echo $this->Paginator->sort('Subscription.plan_name', __('Plan Name')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Subscription.plan_type', __('Plan Type')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Subscription.plan_price', __('Plan Price')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Subscription.number_of_companies', __('Number of companies')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Subscription.created_date', __('Created Date')); ?></th>
                                    <th><?php echo "Status"; ?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php     if (!empty($subscriptions)) {
                                    $page = $this->request->params['paging']['Subscription']['page'];
                                    $limit = $this->request->params['paging']['Subscription']['limit'];
                                    $i=($page-1) * $limit;
                                    foreach ($subscriptions as $row) {
                                        $i++;
                                        echo "<tr id='rowId".$row['Subscription']['id']."'>";
                                        echo "<td>".h($row['Subscription']['plan_name'])."</td>";
                                        echo "<td>".h($row['Subscription']['plan_type'])."</td>";
                                        echo "<td>$".$row['Subscription']['plan_price']."</td>";
                                        echo "<td>".$row['Subscription']['number_of_companies']."</td>";
                                        echo "<td>".date("d-m-Y", strtotime($row['Subscription']['created_date']))."</td>";
                                        echo "<td id='activeInactive".$row['Subscription']['id']."'>";
                                        if ($row['Subscription']['status']==1) {
                                            echo "Active";
                                        } else {
                                            echo "Inactive";
                                        }
                                        echo"</td>";
                                        
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(!empty($subscriptions)) { echo $this->element('Usermgmt.pagination', array("totolText" => "Number of Subscription")); } ?>
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