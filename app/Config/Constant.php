<?php
switch ($_SERVER['HTTP_HOST']) {
    case 'localhost':
        //define('SITE_URL',"http://localhost/emandoobi/"); 
        define('IS_ONLINE', false);
        break;
    default:
        //define('SITE_URL',"http://emandoobi.com/"); 
        define('IS_ONLINE', true);
        break;
}

define("COMPANY_TYPE",serialize(array(''=>"Select company type",1=>"Under Labour",2=>"Immigration only")));
define("LABOUR_TYPE", 1);
define("IMMIGRATION_TYPE", 2);
define("COMPANY_FILES", "company_files"); 
define("SUPPORTING_DOCS", "applications/supporting_document"); 
define("COUNTRY_TYPE",serialize(array(''=>'Current location of employee',1=>"Inside",2=>"Outside")));    
define("MARITAL_STATUS",serialize(array(''=>'Select Marital Status',1=>"Single",2=>"Married")));

define("NEW_RESIDENCY",1);  
define("RENEW_RESIDENCY",2);   
define("LOCAL_TRANSFER",3);   
define("CANCELLATION",4);   
define("ADJUSTMENT",5); 

define("APPLICATION_TYPE",serialize(array(1=>'New Residency',2=>"Renew Residency",3=>"Local Transfer",4=>"Cancellation", 5=>"Adjustment")));
define("ROLE_FOR",serialize(array(0=>"Admin",1=>"Customer")));
define("PROCESS_STEPS",serialize(array(1=>6, 2=>4, 3=>6, 4=>1)));


define("NEW_RESIDENCY_PROCESS", serialize(array(1=>"Entry Permit",2=>"Outpass",3=>"Emirates ID", 4=>"Medical Test",5=>"Zajel",6=>"Residence Permit")));
define("RENEW_RESIDENCY_PROCESS",serialize(array(1=>"Emirates ID",2=>"Medical Test",3=>"Zajel",4=>"Residence Permit")));
define("LOCAL_TRANSFER_PROCESS", serialize(array(1=>"Immigration Approval",  2=>"Emirates ID", 3=>"Medical Test", 4=>"eVision Approval",5=>"Zajel",6=>"Residence Permit")));
define("CANCELLATION_PROCESS", serialize(array(1=>"Visa Cancellation")));
define("ADJUSTMENT_PROCESS", serialize(array(1=>"Immigration Adjustment")));

define("NEW_RESIDENCY_LABOUR", serialize(array(1=>"Entry Permit",2=>"Outpass",3=>"Emirates ID", 4=>"Medical Test",5=>"Zajel",6=>"Residence Permit", 7=>"Quota Approval", 8=>"Job Offer", 9=>"Work Permit")));
define("RENEW_RESIDENCY_LABOUR",serialize(array(1=>"Emirates ID",2=>"Medical Test",3=>"Zajel",4=>"Residence Permit", 5=>"Labour Card")));
define("LOCAL_TRANSFER_LABOUR", serialize(array(1=>"Immigration Approval",  2=>"Emirates ID", 3=>"Medical Test", 4=>"eVision Approval",5=>"Zajel",6=>"Residence Permit")));
define("CANCELLATION_LABOUR", serialize(array(1=>"Visa Cancellation", 2=>"Labour Card Cancellation")));
define("ADJUSTMENT_LABOUR", serialize(array(1=>"Immigration Adjustment", 2=>"Labour Adjustment")));

define("NOTIFICATION_TYPE",serialize(array(1=>'New Visa',2=>"Issue In Application",3=>"Issue Solved", 4=>'Visa Completed')));

define("OUTPASS_TYPE",serialize(array(1=>"Change Status", 2=>"Entry Stamp"))); //1=>inside, 2=>outside
define('PAGE_LIMIT',10);
define ("MOBILE_PRE_FIX",'+91-');  
define ("AUTH_USER_GROUP_ID", 2); // user Group id
define ("OPERATOR_USER_GROUP_ID", 4); // Operator Group id

define ("EMANDOOBI_ADMIN_GROUP_ID", serialize([4,5]));  
if(isset($_SERVER['SERVER_NAME']) && strstr($_SERVER['SERVER_NAME'], "emandoobi")) {
	
    define('MERCHANT_KEY', 'hiL8X2');
    define('SALT', 'zgP7YwlX');
    define('PAYU_BASE_URL', 'https://secure.payu.in');
 
    define('GOOGLE_CAPTCHA_SITE_KEY', '6Lf8BQUTAAAAAEhGAiswNCrEOr6IdpRr3J9LhcKA');
    define('GOOGLE_CAPTCHA_SECRET',   '6Lf8BQUTAAAAAPNXVhY4fEIJWfbs_btCBXDRnDwD');
} else {
	
    define('MERCHANT_KEY', 'JBZaLc');
    define('SALT', 'GQs7yium');
    define('PAYU_BASE_URL', 'https://test.payu.in');
    define('GOOGLE_CAPTCHA_SITE_KEY', '6Le4qAQTAAAAAJHmHbr0XroxrM8AkBZ0zq2i8aQN');
    define('GOOGLE_CAPTCHA_SECRET',   '6Le4qAQTAAAAAElK1znCzE3eCtdhhzMZmneAEuLZ');
}


define ("DATE_FORMAT", "d-m-Y");
define ("TXT_DATE_FORMAT", "YYYY-MM-DD"); // For Notification

define ("DATE_FORMAT_FOR_JS", "dd-mm-yy");      // for jquery datepicker properties etc.
define ("DATE_FORMAT_FOR_PHP", "d-m-Y");        // For code purpuse like showing in datepicker
define ("DATE_FORMAT_FOR_VIEW_PHP", "d M Y");  // For view
define ("DATE_DAY_FORMAT_FOR_VIEW_PHP", "D, jS M'Y");  // For view
define ("TIME_FORMAT_PHP", "H:i:s");   // For view
define ("TIME_FORMAT_FOR_VIEW_PHP", "h:i:s A");   // For view
define ("TIME_FORMAT_WITHOUT_SECOND_VIEW_PHP", "h:i A");   // For view
define ("DATE_FORMAT_FOR_DB", "yy-mm-dd");

define('API_KEY_MESSAGE_WORK_ORDER','Your key is not valid.');
define('NO_IMAGE','no-image.jpg');
define('WORK_ORDER_FILE_LOG',"files/work_order_log/");
define('GRO','gro');
define('HR','hr');
define('USER','user');
define('SUPER_USER',2); //2 from user_group table
define('ADMIN',1);
define('PROCESS_STAGES',serialize(array(1=>'entry_permit',2=>'entry_stamp', 3=>'emirates_id',4=>'medical_test', 5=>'zajel', 6=>'residence_permit', 7=>'immigration_approval', 8=>'evision_approval', 9=>'visa_cancellation', 'change_status')));
define('CURRENCY','$');
define("COMPANY_LICENSE_PERMIT", serialize(array("trade_license"=>"Trade License", "establishment_card_hr"=>"Establishment Card (HR Visa Card)", "establishment_card_guest"=>"Establishment Card (Guest Visa Card)", 'liquor_license'=>"Liquor License", "shisha_license"=>"Shisha License", "e_connection_license"=>"E-Connection License (For Hotels)", "flag_license"=>"Flag License (For Hotels)", "hotel_classification_certificate"=>"Hotel Classification Certificate" , "labour_card"=>"Labour Card")));
define("COMPANY_LEGAL_DOCUMENT", serialize(array("moa"=>"Memorandum Of Association (MOA)", 'amoa'=>"Addendum Memorandum Of Association (AMOA)", "poa"=>"Power Of Attorney","ejari_deed"=>"Ejari/ Title Deed", "other"=>"Other", "other1"=>"Other1")));

define("PASSPORT_DIPATCH_HR", 1);
define("PASSPORT_RECEIVED_GRO", 2);
define("PASSPORT_DIPATCH_GRO", 3);
define("PASSPORT_RECEIVED_HR", 4);

define("PASSPORT_TRACK_TYPE", serialize(array(1=>"passport_released_hr",2=>"passport_received_gro", 3=>"passport_released_gro", 
                4=>"passport_received_hr")));









