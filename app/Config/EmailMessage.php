<?php
//Start constant for process event


define('SMS_USERNAME','strmor');
define('SMS_PASSWORD','bQq4rdxa');
define('SMS_TYPE','Individual');
define('SMS_MASK','STRMOR');

define('SENDGRID_USERNAME','it@storemore');
define('SENDGRID_PASSSWORD','Titan@123!');
define('SENDER_EMAILID','support@storemore.in');
define('STORE_MORE_SUPPORT',"StoreMore Support");

switch ($_SERVER['HTTP_HOST']) {
      case 'localhost':
        define('ADMIN_EMAILID','satendra.bharti@storemore.in');
       break;
      case 'localhost:8080':
        define('ADMIN_EMAILID','satendra.bharti@storemore.in');
        break;
      default:
        define('ADMIN_EMAILID','alina.chaudhary@storemore.in');
        break;
     }

define('RECEIVER_ID','1');
define('EVENT_MAIL_TYPE','1');
define('EVENT_SMS_TYPE','2');
define('EVENT_ADMIN_ONLY_MAIL_TYPE','4');

define('REGISTRATION','1');
define('FORGOT_POSSWORD','2');
define('ORDER_PLACED_ONLINE','3');
define('ORDER_PLACED_OFFLINE','4');
define('PAYMENT_RECEIVED_OFFLINE','5');
define('MOVEIN_DATE_CHANGE_REQUEST_RECEIVED','6');
define('INVENTORY_UPLOADED','7');
define('BILL_GENERATED','8');

define('REDELIVERY_REQUEST_PLACED','9'); // For redelievery and pick by self
define('REDELIVERY_REQUEST_WITH_ADDRESS_PLACED','10'); // For redelievery and by address

define('REDELIVERY_REQUEST_COMPLETE','22'); // For completion of redelievery and pick by self
define('REDELIVERY_REQUEST_WITH_ADDRESS_COMPLETE','14'); // For completion of redelievery and sent to address

define('PICKUP_REQUEST_PLACED','12');
define('PICKUP_REQUEST_WITH_ADDRESS_PLACED','20');


define('PICKUP_REQUEST_COMPLETE','13');
define('PICKUP_REQUEST_WITH_ADDRESS_COMPLETE','17');


define('REDELIVERY_REQUEST_CONFIRMED','18');
define('REDELIVERY_REQUEST_WITH_ADDRESS_CONFIRMED','11');


define('PICKUP_REQUEST_CONFIRMED','19');
define('PICKUP_REQUEST_WITH_ADDRESS_CONFIRMED','21');

define('CANCELLATION_REQUEST_RECEIVED','23');       // For Admin Only
define('REDELIVERY_REQUEST_MODIFIED','24');         // For Admin Only
define('PICKUP_REQUEST_MODIFIED','25');             // For Admin Only




define('CONTACT_FORM','15');
define('ADD_YOUR_FACILITY','16');


define("ORDER_EXTEND_REQUEST_RECEIVED", "26");
define("ORDER_EXTEND_REQUEST_APPROVED", "27");
define("ORDER_EXTEND_REQUEST_REJECTED", "28");

define("ORDER_CANCEL", "29");

define("ADMIN_MAIL_DEFAULT_TEMPLATE", "admin_email_default_template");






define("EMAIL_TEMPLATE_15_DAY", "30");
define("EMAIL_TEMPLATE_6_DAY", "31");
define("EMAIL_TEMPLATE_1_DAY", "32");
define("EMAIL_TEMPLATE_SAME_DAY", "33");
define("EMAIL_TEMPLATE_DUE_DAY", "34");


$sendMailSubject =array(
'1'=>'Welcome aboard StoreMore!',
'2'=>'Confirmation for Password Reset at StoreMore.in',
'3'=>'Confirmation for Booking ID %BOOKING_ID% on StoreMore.in',
'4'=>'Acknowledgement for Booking ID %BOOKING_ID% on StoreMore.in',
'5'=>'Confirmation for Payment against Booking ID %BOOKING_ID% on StoreMore.in',
'6'=>'Confirmation for Change against Booking ID %BOOKING_ID% on StoreMore.in',
'7'=>'Confirmation of Inventory against Booking ID %BOOKING_ID% on StoreMore.in',
'8'=>'Generation of Bill against Booking ID %BOOKING_ID% on StoreMore.in',
'9'=>'Request for Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'10'=>'Request for Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'11'=>'Confirmation of Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'12'=>'Request for Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
'13'=>'Confirmation of Pick-up Completion against Booking ID %BOOKING_ID% on StoreMore.in',
'14'=>'Confirmation of Re-delivery Completion against Booking ID %BOOKING_ID% on StoreMore.in',
'15'=>'Thank you for your %TYPES% on StoreMore.in',
'16'=>'Your request to add a new facility on StoreMore.in',
'17'=>'Confirmation of Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
'18'=>'Confirmation of Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'19'=>'Confirmation of Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
'20'=>'Request for Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
'21'=>'Confirmation of Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
'22'=>'Confirmation of Re-delivery Completion against Booking ID %BOOKING_ID% on StoreMore.in',
'26'=>'Request for Order Extend against Booking ID %BOOKING_ID% on StoreMore.in Received',
'27'=>'Request for Order Extend against Booking ID %BOOKING_ID% on StoreMore.in Approved',
'28'=>'Request for Order Extend against Booking ID %BOOKING_ID% on StoreMore.in Rejected',
'30'=>'Your Payment is due against Booking ID %BOOKING_ID% on StoreMore.in',
'31'=>'Your Payment is due against Booking ID %BOOKING_ID% on StoreMore.in',
'32'=>'Your Payment is due against Booking ID %BOOKING_ID% on StoreMore.in',
'33'=>'Your Payment is due against Booking ID %BOOKING_ID% on StoreMore.in',
'34'=>'Your Payment is overdue against Booking ID %BOOKING_ID% on StoreMore.in'

);
define("MAIL_SUBJECTS",serialize($sendMailSubject));

$sendAdminMailSubject =array(
'3'=>'Confirmation for Booking ID %BOOKING_ID% on StoreMore.in',
'4'=>'Acknowledgement for Booking ID %BOOKING_ID% on StoreMore.in',
'5'=>'Confirmation for Payment against Booking ID %BOOKING_ID%  on StoreMore.in',
'6'=>'Confirmation for Change against Booking ID %BOOKING_ID% on StoreMore.in',    
'9'=>'Request for Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'10'=>'Request for Re-delivery against Booking ID %BOOKING_ID% on StoreMore.in',
'12'=>'Request for Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
"15"=>"Thank you for %TYPES% on StoreMore.in", 
"16"=>"Request to add a new facility on StoreMore.in", 
'20'=>'Request for Pick-up against Booking ID %BOOKING_ID% on StoreMore.in',
"23"=>"Cancellation Request received", // Currently going with default template
"24"=>"Re-delivery Request modified",   // Currently going with default template
"25"=>"Pick-up Request modified",   // Currently going with default template
"26"=>"Request for Order Extend against Booking ID %BOOKING_ID% on StoreMore.in Received",   // Currently going with default template
"29"=>"Cancellation request received against Booking ID %BOOKING_ID% on StoreMore.in"
);
define("ADMIN_MAIL_SUBJECTS",serialize($sendAdminMailSubject));

$sendSmsArray =array(
'1'=>'Thank you for registering with StoreMore. The perfect space to store your goods is just three clicks away: Search, Book & Pay!',
'2'=>'Dear StoreMore User, the new password for click on link %PASSWORD_RESET_LINK%',
'3'=>'Dear %NAME%: Thank you for booking space on StoreMore. We have received Rs %AMOUNT% against Booking ID %BOOKING_ID%. Check email for details.',
'4'=>'Dear %NAME%: Thank you for booking space on StoreMore. We will be in touch for payment of Rs %AMOUNT%  against Booking ID %BOOKING_ID%.',
'5'=>'Dear %NAME%: Thank you for payment of Rs %AMOUNT% against Booking ID %BOOKING_ID% on StoreMore. Check email for details.',
'6'=>'Dear %NAME%: Thank you for request to change Move-in date against Booking ID %BOOKING_ID% on StoreMore. Check email for details.',
'7'=>'Dear %NAME%: Your list of stored goods against Booking ID %BOOKING_ID% has been uploaded. Log into your StoreMore account for details.',
'8'=>'Dear %NAME%: Bill generated for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%. Pay from your StoreMore account before %TODATE%',
'9'=>'Dear %NAME%: Thank you for your request for Self Pick-up against Booking ID %BOOKING_ID% at StoreMore.',
'10'=>'Dear %NAME%: Thank you for your request for Re-delivery and advance Rs 500 against Booking ID %BOOKING_ID% at StoreMore.',
'11'=>'Dear %NAME%: Your request for Re-delivery against Booking ID %BOOKING_ID% at StoreMore is confirmed for %DATE% between %TIME%.',
'12'=>'Dear %NAME%: Thank you for your request for Self Delivery of goods against Booking ID %BOOKING_ID% at StoreMore. ',
'13'=>'Dear %NAME%: Your request for Self Delivery of goods against Booking ID %BOOKING_ID% at StoreMore has been successfully completed. Check account for inventory details.',
'14'=>'Dear %NAME%: Your request for Re-delivery against Booking ID %BOOKING_ID% at StoreMore has been completed. Hope you were satisfied with our services!',
'15'=>'Thank you for getting in touch with StoreMore. We will contact you shortly, or you can call 95550 22330 for further assistance.',
'17' =>'Dear %NAME%: Your request for Self Pick-up of goods against Booking ID %BOOKING_ID% at StoreMore has been completed. Check account for inventory details.',
'18'=>'Dear %NAME%: Your request for Self Pick-up against Booking ID %BOOKING_ID% at StoreMore is confirmed for %DATE% between %TIME%',
'19'=>'Dear %NAME%: Your request for Self Delivery against Booking ID %BOOKING_ID% at StoreMore is confirmed for %DATE% between %TIME%.',
'20'=>'Dear %NAME%: Thank you for your request for Pick-up of goods and advance of Rs 500 against Booking ID %BOOKING_ID% at StoreMore.',
'21'=>'Dear %NAME%: Your request for Pick-up against Booking ID %BOOKING_ID% at StoreMore is confirmed for %DATE% between %TIME%.',
'22'=>'Dear %NAME%: Your request for Self Delivery of goods against Booking ID %BOOKING_ID% at StoreMore has been completed. Hope you were satisfied with our services!',
'26'=>'Dear %NAME%: Your request for Order Extend against Booking ID %BOOKING_ID% at StoreMore has been received.',
'27'=>'Dear %NAME%: Your request for Order Extend against Booking ID %BOOKING_ID% at StoreMore has been Approved till %REQUESTED_TO_DATE%.',
'28'=>'Dear %NAME%: Your request for Order Extend against Booking ID %BOOKING_ID% at StoreMore has been Rejected.',
'30'=>'Dear %NAME%: Your Payment is due for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%. Pay from your StoreMore account before %TODATE%',
'31'=>'Dear %NAME%: Your Payment is due for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%. Pay from your StoreMore account before %TODATE%',
'32'=>'Dear %NAME%: Your Payment is due for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%. Pay from your StoreMore account before %TODATE%',
'33'=>'Dear %NAME%: Your Payment is due for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%. Pay from your StoreMore account before %TODATE%',
'34'=>'Dear %NAME%: Your Payment is overdue for Booking ID %BOOKING_ID% for Rs %AMOUNT% for period %FROMDATE% - %TODATE%  '
);

define("SEND_SMSLIST",serialize($sendSmsArray));
