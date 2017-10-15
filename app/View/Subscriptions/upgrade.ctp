    <div class="container wrapper">      
       <div  class="row">
        <div class="col-lg-12 gride-itm">
            <ol class="breadcrumb">
                <li class="active">Upgrade your plan and run your visa process better</li>
            </ol>
            
        </div>
    </div>


<!-- <div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> Your message has been sent successfully.
</div> -->

        <?php echo $this->Session->flash(); ?>
    
        <div id="products"  class="row list-group">    
        
       <?php 
        foreach ($subscriptions as $subscription) {
            $id = $subscription['Subscription']['id'];
            $allowed_company = $subscription['Subscription']['number_of_companies'];
          ?>
            <div class="col-md-3 item">
             <div class="data-tab">
              <div class="data-tabin">
                <h3><?php echo ucfirst($subscription['Subscription']['plan_name'])?> </h3>
                <h4><?php echo ($allowed_company==100)?$allowed_company."+" :$allowed_company; ?> Companies</h4>
                <p><b>$<?php echo $subscription['Subscription']['plan_price']; ?>/
                <?php echo $subscription['Subscription']['plan_type']; ?></b>
                </p>
                <?php 
                if(in_array($id, $selected_plans))
                { ?>
                  <a href="javascript:void(0)" data-toggle="modal" class="btn btn-primary btn-block"  disabled='disabled' style="text-decoration:none;">Choose this plan</a>
                <?php }else{ ?>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block" onclick="select_plan(<?php echo $id;?>)" id="button_<?php echo $id;?>">Choose this plan</a>
                <?php }  ?>
                
               </div>
               </div>    
            </div>
        <?php }?>
        </div>
    </div>

 <script type="text/javascript">
      $(document).ready(function(){
          $('#plan_confirmation').click(function(){
              var $id = $(this).attr('plan_id');
              var values = "plan_id="+$id;
              $.ajax({
                  url: "<?php echo SITE_URL?>subscriptions/choose_plan_user",
                  type: "post",
                  data: values,
                  success: function(res){
                    alert(res);
                    $('.close').trigger('click');
                    $('#button_'+$id).attr("disabled", true);
                    $('#button_'+$id).removeAttr("data-target");
                  }
              }); 
          });
      });

      function select_plan($id)
      {
         $('#plan_confirmation').attr("plan_id",$id);
      }
 </script>

 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">
        <fieldset>
        <div class="form-group">
          <p>Are you sure want to purchase this plan</p>
        </div>
         
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" id="plan_confirmation" plan_id="" >Yes</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
          </div>
        </div>
        </fieldset>
      </div>
      
    </div>

  </div>
</div>