<?php
    class SubOrder extends AppModel{

        var $belongsTo = array("User","Subscription");
    }