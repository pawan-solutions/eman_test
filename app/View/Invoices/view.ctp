<div class="umtop">
<div class="container">
   <div class="row">
    <div class="col-md-12">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('Usermgmt.dashboard'); ?>
    <div class="um_box_up"></div>
     <div class="um_box_mid radius-all col-sm-11 col-md-10 col-lg-7 col-xs-12">
        <div class="um_box_mid_content mid_content-nospace">
            <div class="um_box_mid_content_top">
                <span class="umstyle1">
                    <?php echo __('Selected Plan Detail'); ?>
                </span>
                <div style="clear:both"></div>
            </div>
            <div class="head-border"></div>
            <div class="um_box_mid_content_mid" id="index">
                <div id="updateOnlineIndex">
                    <div class="tableContainer">
                    <div class="storegDetailBox">
                        <div class="searchTitle"><h2>Customer Details</h2></div>                          
                           <div class="row">
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label>Name: </label> 
                               </div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                       <label><?php echo $results['User']['first_name'];?></label>
                               </div>

                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label>Email: </label>
                               </div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label><?php echo $results['User']['email'];?></label>
                               </div>
                               <div class="clear"></div>
                           </div>
                        </div>

                       <div class="storegDetailBox">
                        <div class="searchTitle"><h2>Plan Details</h2></div> 
                           <div class="order_details">
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label>Plan</label>
                               </div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label><?php echo $results['Subscription']['plan_name'];?>
                               </div>
                                <div class="clear"></div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <label>Price</label>
                               </div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <?php echo CURRENCY. $results['Subscription']['plan_price']. '/ '.
                                    $results['Subscription']['plan_type'];?>
                               </div>
                                
                                <div class="clear"></div>
                              <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">    
                                   <label>Number of companies allowed</label>                                   
                               </div>
                               <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                                   <?php echo $results['Subscription']['number_of_companies'];?>
                               </div>
                               <div class="clear"></div>


                             </div>
                            </div>
                        
                        <div class="storegDetailBox">
                        <div class="searchTitle"><h2>Invoices</h2></div> 
                           <?php 
                           if(!empty($invoices)) { ?>
                                <div>
                                 <div class="tableContainer" style="overflow:auto;">
                                     <table cellspacing="0" cellpadding="0" border="0" class="umtable colored" style="min-width:540px;">
                                         <thead>
                                         <tr>
                                            <th>Duration</th>
                                            <th>Amount</th>
                                            <th>Generated On</th>
                                            <th>Action</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                        <?php
                                         foreach ($invoices as $invoice) { ?>
                                         <tr>
                                             <td><?php 
                                                    if(!empty($invoice['from']) && !empty($invoice['to'])){
                                                        echo date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($invoice['from'])) ." - ".date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($invoice['to']));
                                                    }else { 
                                                        echo "";
                                                    }
                                                ?></td>
                                             <td><?php if(!empty($invoice['invoice_amount'])) {
                                                 echo $this->Custom->getFormatedAmount($invoice['invoice_amount']);
                                             } else {
                                                 echo "";
                                             }?></td>
                                             <td><?php echo (!empty($invoice['date']) ? date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($invoice['date'])) : ''); ?></td>
                                             <td><?php 

                                                if($invoice['title'] =='View'){
                                                if(isset($invoice['title'])) {
                                                    echo $this->Html->link ($invoice['title'], 
                                                        array(
                                                            "controller" => $invoice['controller'],
                                                            "action" => $invoice['action'],
                                                            $invoice['id']
                                                            )
                                                        );
                                                }
                                              }else{
 
                                                  echo $this->Html->link ($invoice['title'], 
                                                        array(
                                                            "controller" => 'invoices',
                                                            "action" => 'generate_invoice',
                                                            $invoice['id']
                                                            )
                                                        ); 
                                              }
                                                ?>
                                             </td>
                                         </tr>
                                         <?php } ?>
                                         </tbody>
                                     </table>
                                </div>
                                <div class="clear"></div>
                             </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="um_box_down"></div>
</div>
<style>
.col-sm-6, .col-lg-6, .col-md-6, .col-xs-6{margin-bottom:5px;}
</style>

