
<div class="modal fade" id="alert_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h3 class="modal-title" id="myModalLabel"><?php echo $header;?></h3>
            </div>
            <div class="modal-body">
                <div id="msg_box_body" class="um_box_mid_content" style="text-align: center;">
                 <?php echo $message; ?>
                </div>
            </div>
            
            <div class="modal-footer"  style="text-align: right;padding: 8px 9% 15px 15px;"> 
                <a href="#" class="btn btn-warning" data-dismiss="modal">OK</a>
               </div>
        </div>
    </div>
</div>


<div class="modal fade" id="duration_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h3 class="modal-title" id="myModalLabel"><?php echo $header_duration;?></h3>
            </div>
            <div class="modal-body">
                <div id="msg_box_body" class="um_box_mid_content" style="text-align: center;">
                 <?php echo $message_duration; ?>
                </div>
            </div>
             <div class="modal-footer"> 
                <a href="#" class="btn btn-warning" data-dismiss="modal">OK</a>
               </div>
            
           
        </div>
    </div>
</div>

