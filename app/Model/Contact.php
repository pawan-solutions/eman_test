<?php
    class Contact extends AppModel{
        
          public $validate = array(
            "user_id" => array(
                "rule" => "notEmpty",
                "message" => "Select User"
            ),
            "name" => array(
                "rule" => "notEmpty",
                "message" => "Enter Your Name",
                "required" => false
            ),

            "quantity" => array(
                "rule" => "notEmpty",
                "message" => "Select Quantity",
                "required" => false
            ),
            "email" => array(
                "rule1" => array(
                    "rule" => "notEmpty",
                    "message" => "Enter User Email"
                ),
                "rule2" => array(
                    "rule" => "email",
                    "message" => "Enter valid email"
                )
            ),
            "address" => array(
                "rule" => "notEmpty",
                "message" => "Enter Your Address",
                "required" => false
            ),
            "city" => array(
                "rule" => "notEmpty",
                "message" => "Enter Your City",
                "required" => false
            ),
            "phone" => array(
                "rule1" => array(
                    "rule" => "notEmpty",
                    "message" => "Enter Phone Number",
                    "required" => false
                ),
                "rule2" => array(
                    "rule" => "numeric",
                    "message" => "Phone Number must be numeric (10 digits)"
                ),
                "rule3" => array(
                    "rule" => array('maxLength', 10),
                    "message" => "Phone Number must be numeric (10 digits)"
                ),
                "rule4" => array(
                    "rule" => array('minLength', 10),
                    "message" => "Phone Number must be numeric (10 digits)"
                )
            ),
            
            "shipping_address_id" => array(
                "rule" => "notEmpty",
                "message" => "Select Address",
                "required" => false
            ),
             "storage_payment_option_id" => array(
                "rule" => "notEmpty",
                "message" => "Select Payment Option"
            )
        );
    
    }