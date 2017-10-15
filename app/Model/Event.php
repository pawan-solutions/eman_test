<?php
App::uses('AppModel', 'Model');
class Event extends AppModel {
	/*
		Please note there is processed field in this table values are-
		processed =>0 : event is not processed.
		processed =>1 : event is processed.
		processed =>-1 : event is in processing.
	*/
	/**
	 * Used to add event in database
	 *
	 * @access public
	 * @param integer $event_type event type defined in Config/events.php
	 * @param integer $event_name event name defined in Config/events.php
	 * @param array $event_fields event fields array containing necessary information for processing events
	 * @param integer $priority event priority
	 * @param integer $userId user id
	 * @return void
	 */
	public function addEvent($event_type, $event_name, $event_fields, $userId=0) {
        $data=array();
        $data['Event']['id']=null;
        $notify_user_id  ='';
        if(!empty($userId)){
            $data['Event']['user_id']=$userId;
             $notify_user_id =$userId;
        } else {
            $data['Event']['user_id']=(isset($_SESSION['UserAuth']['User']['id'])) ? $_SESSION['UserAuth']['User']['id'] : null;
            $notify_user_id =(isset($_SESSION['UserAuth']['User']['id'])) ? $_SESSION['UserAuth']['User']['id'] : null;

        }
        
       $receiver_id = isset($event_fields['receiver_id'])?$event_fields['receiver_id']:'';  // user_id
       
       if($notify_user_id==1){
                $is_allow_notification  =  $this->isAllowNotification($receiver_id);
                if($is_allow_notification =='false'){
                  return true;  // not saved data for send a email
                 }

         }else{
                $is_allow_notification  =  $this->isAllowNotification($notify_user_id);
                if($is_allow_notification =='false'){
                   return true;  // not saved data for send a email
                 }
         }

        $data['Event']['event_type']=$event_type;
        $data['Event']['event_name']=$event_name;
        $data['Event']['event_fields']=serialize($event_fields);
        $data['Event']['created']= date('Y-m-d H:i:s');
        $data['Event']['modified']= date('Y-m-d H:i:s');
        $this->save($data, false);
	}

    
      public  function  isAllowNotification($user_id){
             if($user_id!=''){  // For New Registration
              App::import ("Model", "User");
              $obj_user = new User();
              $option['conditions'] =array('User.active'=>1,'User.is_subscription'=>1,'User.id'=>$user_id);
              $rs = $obj_user->find('count',$option);
               if($rs > 0){
                  return 'true';
              }else{
                  return 'false';
              }
          }else{
             return 'true';
          }



       }

	/**
	 * Used to updatate event in database
	 *
	 * @access public
	 * @param integer $id event id
	 * @return void
	 */
	public function updateEvent($id, $processed = false) {
		$this->updateAll(array(
                'Event.processed' => $processed, 
                'Event.modified' => '"'.date('Y-m-d H:i:s').'"'
            ), 
            array('Event.id' => $id)
        );
	}
	
	/**
	 * Used to get event name desc by event name
	 *
	 * @access public
	 * @param integer $event_name event name defined in Config/events.php
	 * @return String
	 */
	public function getEventNameDesc($event_name) {
		switch($event_name) {
			case SEND_MESSAGE:
				return SEND_MESSAGE_DESC;
				break;
			case SEND_SPONSOR:
				return SEND_SPONSOR_DESC;
			default:
				break;
		}
	}
    
    /**
     * Function to send mail when order placed $FRONT_ORDER=null ADDED bY sAGTENDRA bharti
     * @param integer $order_id : id of the Order Model
     */
    public function mail_on_order ($order_id,$FRONT_ORDER=null) { die;
        App::import ("Model", "Order");
        $OrderModel = new Order();
        
        App::import ("Model", "StorageSpace");
        $StorageSpace = new StorageSpace();
        $order = $OrderModel->findById ($order_id);
        $storageDetail = $StorageSpace->find('first',array('conditions'=>array('StorageSpace.id'=>$order['OrderDetail']['storage_space_id'])));


        App::import ("Model", "StorageSpace");
        $StorageSpace = new StorageSpace();
        $storageDetail = $StorageSpace->find('first',array('conditions'=>array('StorageSpace.id'=>$order['OrderDetail']['storage_space_id'])));

        App::import ("Model", "City");
        $City = new City();
        $cityName = $City->getCityNameById($storageDetail['StorageSpace']['city']);
        App::import ("Model", "State");
        $State = new State();
        $stateName = $State->getStateNameById($storageDetail['StorageSpace']['state']);

        App::import("Model", "UserAddress");
        $userAddressModel = new UserAddress;
        
        
        //Process for event
        $sender_id = RECEIVER_ID;
        $receiver_id = $order['Order']['user_id'];
        $bookingID = $order['OrderDetail']['id'];
        $amount =$order['Order']['total_with_tax'];
        $booking_date =$order['Order']['order_time'];

        $booking_date =h(date(DATE_DAY_FORMAT_FOR_VIEW_PHP, strtotime($booking_date)));


        $stor_name =$storageDetail['StorageSpace']['name'];
        $stor_address =$storageDetail['StorageSpace']['address'];
        $stor_city = $cityName;
        $stor_state = $stateName;
        $stor_postalcode =$storageDetail['StorageSpace']['postalcode'];
        $stor_faddress =$stor_address;
        $stor_faddress .=", <br/>";
        $stor_faddress .=$stor_city;
        $stor_faddress .=", <br/>";
        $stor_faddress .=$stor_state;
        $stor_faddress .=" - ";
        $stor_faddress .=$stor_postalcode;
        $type = TXT_PAYMENT_PAY_ONLINE;     // == PAYMENT_PAY_ONLINE
        if($order["OrderDetail"]['p_type'] == PAYMENT_COLLECT_PERSON) {
            $type = TXT_PAYMENT_COLLECT_PERSON;
        }
        App::import("Model", "StoragePaymentOption");
        $stPayOptObj = new StoragePaymentOption;
        $area = $stPayOptObj->spaceDetailByStPayOptionId($order["StoragePaymentOption"]["id"]);
        $duration_from = $order['OrderDetail']['movein_date'];
        $duration_to = $order['OrderDetail']['to_date'];
        $duration_from = h(date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($duration_from)));
        $duration_to = h(date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($duration_to)));
        $duration = $duration_from." - ".$duration_to;


        $pricing_plan = $order['OrderDetail']['booking_tenure'];
        $expected_date = $order['OrderDetail']['movein_date'];
        $expected_date = h(date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($expected_date)));

        if($pricing_plan==1){
            $pricing_plan =$pricing_plan." Month";
        }else{
            $pricing_plan =$pricing_plan." Months";
        }
        $eventFields =array(
            'sender_id'=>$sender_id,
            'receiver_id'=>$receiver_id,
            'booking_id'=>$bookingID,
            'amount'=>$amount,
            'booking_date'=>$booking_date,
            'stor_name'=>$stor_name,
            'stor_address'=>$stor_faddress,
            'stor_city'=>$stor_city,
            'stor_state'=>$stor_state,
            'stor_postalcode'=>$stor_postalcode,
            'type'=>$type,
            'area_reserved'=>$area["space_txt"],
            'duration'=>$duration,
            'pricing_plan'=>$pricing_plan,
            'expected_date'=>$expected_date,
            'booking_name'=>$order["Order"]["name"],
            'booking_email'=>$order["Order"]["email"],
            'booking_phone'=>$order["Order"]["phone_number"],
            'booking_address'=>$userAddressModel->getUserAddressesByAddressId($order["Order"]["shipping_address_id"], true),
            'need_help_with_packing'=>!empty($order["Order"]["require_packers"]) ? 'Yes' : 'No',
            'need_help_with_transport'=>!empty($order["Order"]["require_movers"]) ? 'Yes' : 'No'
        );

        if($order["OrderDetail"]['p_type'] == 1) {	
            $this->addEvent(EVENT_MAIL_TYPE,ORDER_PLACED_ONLINE,$eventFields);
            $this->addEvent(EVENT_SMS_TYPE,ORDER_PLACED_ONLINE,$eventFields);
        } elseif($order["OrderDetail"]['p_type'] == 2) {	
             // Added  By Satendra Bharti  when COD
              if($FRONT_ORDER =='FRONT_ORDER'){
                 $this->addEvent(EVENT_MAIL_TYPE,ORDER_PLACED_OFFLINE,$eventFields);
                 $this->addEvent(EVENT_SMS_TYPE,ORDER_PLACED_OFFLINE,$eventFields);
              }else{
                $this->addEvent(EVENT_MAIL_TYPE,PAYMENT_RECEIVED_OFFLINE,$eventFields);
                $this->addEvent(EVENT_SMS_TYPE,PAYMENT_RECEIVED_OFFLINE,$eventFields); 
              }
             
             
        }
    }


    public function send_email($to,$subject,$required_fields){
      
        $message = $this->getMessageBody();
        mail($to,$subject, $message);
        return true;
    }


    function getMessageBody(){

        // Note Please ## Tag not Change...it is use and change at run time 
      $body='<table cellspacing="0" cellpadding="0" border="0" align="center" style="width:720px; margin: 0 auto; background:#ffffff; border:1px solid #3d4094; color:#000000; font-family:Arial;">
 <tbody>
 <tr> 
 <td valign="top"> 
   <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
    <tbody>
     <tr> 
          <td style="padding-top:20px;padding-bottom: 5px; text-align:center;">
          <img src="http://storemore.in/img/logo.png" alt="logo" width="300" height="85" border="0"> 
          </td>       
      </tr> 
       <tr>          
          <td colspan="2" style="padding-top: 10px; padding-bottom: 5px;"> <img width="720" height="32" src="http://storemore.in/img/mail_top_border.jpg" alt="top_border"> </td> 
      </tr> 
      <tr> 
      <td colspan="2"> 
         <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
         <tbody>
         <tr> 
         <td style="padding:0 25px 25px;font-size: 14px; line-height:30px; font-weight:normal; color: #6e6c6c;">
      <p>Dear ##NAME##,</p>
     
      <p>Greetings from StoreMore!  </p>

      <p>On popular demand, we are sending the login details of your account on our website again.   </p>

      <p>We urge you to use this account for all requests related to your goods in storage with StoreMore–including re-delivery of goods. You can also log in and view the inventory of your goods–just in case you are missing them :) </p>
      
      <p>Your login details for the StoreMore website <a href="http://storemore.in">http://storemore.in </a> are as follows:  <br>
         
            Email :  <b>##CUSTOMER_EMAIL##</b> <br>  
            Password :  ##CUSTOMER_PASSWORD## </p>

     <p>Do get in touch in case you have any problems logging in to your account, or if you notice any inconsistencies in your inventory. You can use the <a href="http://storemore.in/#contactus"> CONTACT US </a> form on the website, or call our helpline <a href="tel:+919555022330">95550 22330</a></p>
     
     <p>  Happy Storing! <br>
      Team StoreMore</p>

     <p style="font-size:12px;">LOG IN  >>> <span style="color:#3d4094;">VIEW INVENTORY </span> >>> <span style="color:#F58733;">REQUEST RE-DELIVERY OR PICK-UP</span> >>> <span style="color:#3d4094">PAY INVOICES</span> >>> <span style="color:#F58733;">BOOK SPACE</span></p>

     </tr> 
         </tbody>
         </table>
        <table cellspacing="0" cellpadding="0" border="0" align="center"> 
          <tbody>
              <tr>
              <td style="padding-bottom:20px;"> <img width="720" height="32" alt="top_border" src="http://storemore.in/img/mail_top_border.jpg"> </td> 
              </tr>
              <tr> 
              <td colspan="2">
              <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
              <tbody>
              <tr> 
              <td style="text-align:center; font-size:14px; padding-top: 15px; padding-bottom: 15px; color:#fff; background-color:#3d4094;">
              &copy; 2015 StoreMore Storage Solutions Pvt. Ltd.
               | <a  target="_blank" href="http://storemore.in/content/terms-conditions" style="color:#bdc3c7; text-decoration:none;">Terms &amp; Conditions</a> 
               | <a  target="_blank" href="http://storemore.in/content/privacy-policy/" style="color:#bdc3c7; text-decoration:none;">Privacy Policy</a>
               | <a  target="_blank" href="http://storemore.in/#contactus" style="color:#bdc3c7; text-decoration:none;">Contact Us</a>
              </td>
             </tr> 
            </tbody>
            </table> 
            </td> 
            </tr> 
            </tbody>
            </table>
            </td> 
            </tr> 
            </tbody>
            </table>
            </td> 
            </tr> 
          </tbody>
        </table>';
        return $body;

    }

}