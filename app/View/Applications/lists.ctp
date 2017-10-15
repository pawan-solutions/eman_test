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
                <span class="umstyle1"><?php echo __('All Application'); ?></span>
                <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add Application",true), array('plugin'=>'', 'controller'=>'applications', 'action'=>'lists')) ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="head-border"></div>
            <div class="um_box_mid_content_mid" id="index">
                <div id="updateCompanyIndex">
<?php } ?>
                    <?php //echo $this->Search->searchForm('Application', array('legend' => 'Search', "updateDivId" => "updateApplicationIndex")); ?>
                    <?php //echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateCompanyIndex")); ?>
                    <div class="tableContainer">
                        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('Application.id', __('Application Id')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Application.employee_name', __('Applicant Name')); ?></th>
                                    <th><?php echo $this->Paginator->sort('Application.process_type', __('Application Type')); ?></th>
                                    
                                    <th><?php echo $this->Paginator->sort('Application.created', __('Created')); ?></th>
                                    
                                    <th><?php echo  __('Status'); ?></th>
                                    <!-- <th style="width:185px;"><?php echo __('Action');?></th> -->
                                </tr>
                            </thead>
                            <tbody>
                    <?php     if (!empty($applications)) {
                                    $page = $this->request->params['paging']['Application']['page'];
                                    $limit = $this->request->params['paging']['Application']['limit'];
                                    $i=($page-1) * $limit;
                                    foreach ($applications as $row) {
                                      $app_type = $application_type[$row['Application']['process_type']];
                                        $i++;
                                        echo "<tr id='rowId".$row['Application']['id']."'>";
                                        echo "<td>".$row['Application']['id']."</td>";
                                        echo "<td>".ucfirst($row['Application']['employee_name'])."</td>";
                                        echo "<td>". $app_type ."</td>";
                                        echo "<td>".$row['Application']['created']."</td>";
                                         echo "<td>";
                                        if ($row['Application']['process_status']==1) {
                                            echo "Completed";
                                        } else {
                                            echo "In process";
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
                    <?php if(!empty($applications)) { echo $this->element('Usermgmt.pagination', array("totolText" => "Number of Application")); } ?>
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