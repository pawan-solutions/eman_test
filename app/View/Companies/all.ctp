<?php
?>
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
                <span class="umstyle1"><?php echo __('All Companies'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add Company",true), array('plugin'=>'', 'controller'=>'companies', 'action'=>'all')) ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="head-border"></div>
            <div class="um_box_mid_content_mid" id="index">
                <div id="updateCompanyIndex">
<?php } ?>
                    <?php echo $this->Search->searchForm('Company', array('legend' => 'Search', "updateDivId" => "updateCompanyIndex")); ?>
                    <?php //echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateCompanyIndex")); ?>
                    <div class="tableContainer">
                        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('Company.id', __('Company Id')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Company.user_id', __('Owner')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Company.company_name', __('Company Name')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Company.company_email', __('Email')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Company.company_phone', __('Phone')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Company.created', __('Created')); ?></th>
                                    
                                    <th><?php echo $this->Paginator->sort('Company.status', __('Status')); ?></th>
                                    <!-- <th style="width:185px;"><?php echo __('Action');?></th> -->
                                </tr>
                            </thead>
                            <tbody>
                    <?php     if (!empty($companies)) {
                                    $page = $this->request->params['paging']['Company']['page'];
                                    $limit = $this->request->params['paging']['Company']['limit'];
                                    $i=($page-1) * $limit;
                                    foreach ($companies as $row) {
                                        $i++;
                                        echo "<tr id='rowId".$row['Company']['id']."'>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".h($row['User']['first_name'])."</td>";
                                        echo "<td>".h($row['Company']['company_name'])."</td>";
                                        echo "<td>".h($row['Company']['company_email'])."</td>";
                                        echo "<td>".$row['Company']['company_phone']."</td>";
                                        echo "<td>".$row['Company']['created']."</td>";
                                        echo "<td id='activeInactive".$row['Company']['id']."'>";
                                        if ($row['Company']['status']==1) {
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
                    <?php if(!empty($companies)) { echo $this->element('Usermgmt.pagination', array("totolText" => "Number of Company")); } ?>
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