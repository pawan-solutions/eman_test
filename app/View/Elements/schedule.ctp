<?php echo $this->Html->css('jquery.datetimepicker'); ?>
<?php echo $this->Html->script(array("jquery.datetimepicker")); ?>
<?php $day  = date('l'); //Sunday 
      $time =  date('H:i');
      $hourPart = explode ( ":" , $time)[0]; 
      // /pr($hourPart);die;
      $message = '';
      if($time >='18:30' && $time <= '9:30'){
        $message ='<span style="color:red;"> * This option is not available at this time of the day. Our operators are available on Mon-Sat between 9.30 AM- 6.30 PM. You can schedule a call for operational hours. We will get back to you for sure.
        </span> <script> $(function () {
                              disableButton(); }); </script> ';

        }
      if($day=='Sunday'){
          $message =' <span style="color:red;"> * This option is not available at this time of the day. Our operators are available on Mon-Sat between 9.30 AM- 6.30 PM. You can schedule a call for operational hours. We will get back to you for sure. </span> <script> $(function () {
                              disableButton(); }); </script> ';
      }  
 ?>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Request a Call Back</h4>
      </div>
      <div class="modal-body">
        <form id ="form_id">
          <div class="form-group">
          <div>
            <label for="recipient-name" class="control-label">Enter Your 10 Digit Mobile Number:</label>
          
          </div>
          <div class="clear"></div>
          <p>
            <input type="text" class="form-control" style="width:20%;float:left" value="+91" disabled id="recipient-name">
            <input type="text" class="form-control" maxlength="10"   onkeypress="return isNumber(event)" 
                    id="customer_phone_no" style="width:80%;float:left"  >
          </p>
          <br/>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Select Calling Option:</label>
            <div class="clear"></div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Call me now</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Call me in 10 mins </a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Schedule for later</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                <p>
                   <label class="hideCallContent">You will receive the call instantly.</label>
                  <div class="clear"></div>
                  <br/>
                  <?php echo $message; ?> 
                  <br/>
         <button type="button"  onClick="callMe(1)" class="btn btn-primary loader_1 hideCallContent" id="call1request">Send Request</button>
         
                </p>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                <p>
                   <label class="hideCallContent">You will receive the call in next 10 minutes</label>
                  <div class="clear"></div>
                  <br/>
                  <?php echo $message; ?> 
                  <br/>
            <button type="button"  onClick="callMe(2)" class="btn btn-primary loader_2 hideCallContent" id="call2request">Send Request </button>
             
                </p>
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <p>Please select the date and time (within our office hours) when you want our customer support to call you back :</p>
                <p> 
                  
                <div style="overflow:hidden;">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-10">
                              <div ><input type="text" id="datetimepicker12"  ></div>
                          </div>
                      </div>
                  </div>
              <button type="button"  onClick="callMe(3)" class="btn btn-primary loader_3">Send Request</button>
                 
                  <script type="text/javascript">
                      function disabledWeekdays(date) {
                          var day = date.getDay();
                          //alert(day);
                          //0 is Sunday, 1 is Monday, 2 is Tuesday , 3 is Wednesday, 4 is Thursday, 5 is Friday and 6 is Saturday
                          if (day == 0) {
                              return [false] ; 
                          } else { 
                              return [true] ;
                          }
                      }
                      var logic = function( currentDateTime ){
                                  alert('hi');
                                  // 'this' is jquery object datetimepicker
                                  var time = '<?php echo $hourPart ?>' ;
                                  alert(time);
                                  if( currentDateTime.getDay()==6 ){
                                    this.setOptions({
                                      minTime:'11:00'
                                    });
                                  }else
                                    this.setOptions({
                                      minTime:'8:00'
                                    });
                                };
                      
                      $(function () {
                          
                          $('#datetimepicker12').datetimepicker({
                                inline: true,
                                step: 15,
                                minDate: 0,
                                maxDate: '+1970/01/15',
                                format:'g:i A',
                                formatTime: 'g:i A',
                                minTime: '9:30 AM',
                                maxTime: '18:30 PM',
                                ampm: true,
                                beforeShowDay: disabledWeekdays,
                                defaultSelect: true//,
                               // onChangeDateTime:logic,
                                //onShow:logic
                          });
                      });
                      function disableButton()
                      {
                          $('.hideCallContent').hide();
                      }
                  </script>
                </div>
              </p>
              </div>
              
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- <p class="head_contact"><a href="#" data-toggle="modal" data-target="#exampleModal" > <img src="<?php echo SITE_URL.'img/storemorerequestcall.png';?>"  > </a></p> -->
<p class="head_contact"><img src="<?php echo SITE_URL.'img/callnow.png';?>"></p>