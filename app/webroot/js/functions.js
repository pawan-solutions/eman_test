function validateLogin (json_obj) {
    if(json_obj.status == "access_denied") {
        $('#signinModal').modal('show');
        $('#window_progress').hide();
    }
}
/**
 * If Url is query string then this will append query string after current url
 * @param String c_pageurl
 * @param Bool isQueryString
 */
function change_url (c_pageurl, isQueryString) {
    if(isQueryString) {
        /*var pageUrl = document.URL;
        if(pageUrl.indexOf("?") > 0) {
            c_pageurl = pageUrl.substring(pageUrl.indexOf("?")) + "&" + c_pageurl;
        } else {
            c_pageurl = "?" + c_pageurl;
        }
        */
        c_pageurl = "?" + c_pageurl;
        
    }

    var pageUrlArr = c_pageurl.split('/');
    var n_pageurl = new Array();
    for(var x = 0; x < pageUrlArr.length; x++) {
        if(isNaN(pageUrlArr[x]) || pageUrlArr[x] == '') {
            n_pageurl[x] = pageUrlArr[x];	
        } else {
            n_pageurl[x] = pageUrlArr[x];
            break;
        }
    }
    var pageurl = n_pageurl.join('/');
    if(pageurl!=window.location){
        if (window.history && window.history.pushState)  {
            window.history.pushState({path:c_pageurl},'',c_pageurl);
        } else {
            window.location = c_pageurl;
        }
    }
}

function redrawCateAvail (data, inputId) {
    if(data.success != true) {
        alert("Failed, refresh the page to continue.");
        if($("#"+inputId).prop("checked")) {
            $("#"+inputId).prop("checked", false);
        } else {
            $("#"+inputId).prop("checked", true);
        }
    }
}
function progressShow (divId) {
    $("#"+divId).show();
}
function progressHide (divId) {
    $("#"+divId).hide();
}


function ableToChangeStatusOuter(id,meta){
	    if (confirm('Are you sure ?')) {
		 var url = $('#'+id).attr('url');
		 var recordId = id.split('ableToChangeStatusOuter')[1];
        $.ajax({
            url: url,
            type: "POST",
            data: 'id=' + recordId,
            dataType: 'json',
            beforeSend: function () {
                $('#window_progress').show();
            },
            success: function (response) {
                if (response.status == 'success') {
                    if (response.enable == 1) {
						$('#' + id + ' img').attr('src', url + '/../../review/img/approve.png');
						$('#' + id).attr('title', 'Disable this one');
                        $('#status'+recordId).html('Enabled');
                    } else {
					
                        $('#' + id + ' img').attr('src', url + '/../../review/img/dis-approve.png');
					    $('#status'+recordId).html('Disabled');
                        $('#' + id).attr('title', 'Enable this one');
                    }
                } 
                else if (response.status == 'error'){
                    alert(response.message);
                } else {
                    alert('Status not updated successfully');
                }
            },
            complete: function () {
                $('#window_progress').hide();
            },
            error: function () {
                alert('There was a problem while requesting to change status. Please try again');
            }
        });
    }
}

function ChangeActiveOuter(id){
        if (confirm('Are you sure ?')) {
        var url = $('#'+id).attr('url');
        var recordId = id.split('ChangeActiveOuter')[1];
        $.ajax({
            url: url,
            type: "POST",
            data: 'id=' + recordId,
            dataType: 'json',
            beforeSend: function () {
                $('#window_progress').show();
            },
            success: function (response) {
                if (response.status == 'success') {
                    if (response.enable == 1) {
                        $('#' + id + ' img').attr('src', url + '/../../review/img/approve.png');
                        $('#active'+recordId).html('Active');
                        $('#' + id).attr('title', 'Inactive this one');
                    } else {
                        $('#' + id + ' img').attr('src', url + '/../../review/img/dis-approve.png');
                        $('#active'+recordId).html('Inactive');
                        $('#' + id).attr('title', 'Active this one');
                    }
                } else {
                    alert('Changes updated successfully');
                }
            },
            complete: function () {
                $('#window_progress').hide();
            },
            error: function () {
                alert('There was a problem while requesting to update. Please try again');
            }
        });
    }
}

/**
 * Function to set the dates in the search page
 * @param  moveDate :  To set the date according to this date
 * @returns options for the dates
 */
function setDuration(moveDate){
    if(moveDate == "" )return;
    var date1 = new Date(moveDate);
    var date2 = new Date(moveDate);
    var date3 = new Date(moveDate);
    var date4 = new Date(moveDate);
    date1.setMonth(date1.getMonth() + 2);
    date2.setMonth(date2.getMonth() + 4);
    date3.setMonth(date3.getMonth() + 7);
    date4.setMonth(date4.getMonth() + 13);
    var c_date = date1.getDate();
    var c_month = date1.getMonth(); // get selected month index
    var startMonth = null;
    if(c_date == 1) {
        startMonth = c_month;
    } else {
        startMonth = c_month + 1;
    }
    startMonth = startMonth - 1; // Set prev asw start month, because month + 1 will return next to next month
    var interval = 3;
    var monthYear;
    var monthTxt = "";
    var options = "";
    // For 1 month
        options += "<option value='"+$.datepicker.formatDate('yy-mm-dd', new Date(date1.setDate(0)))+"'>1 Month</option>";
    // For 3 month
        options += "<option value='"+$.datepicker.formatDate('yy-mm-dd', new Date(date2.setDate(0)))+"'>3 Months</option>";
    // For 6 month
        options += "<option value='"+$.datepicker.formatDate('yy-mm-dd', new Date(date3.setDate(0)))+"'>6 Months</option>";
    // For 12 month
        options += "<option value='"+$.datepicker.formatDate('yy-mm-dd', new Date(date4.setDate(0)))+"'>12 Months</option>";
        
    $('#StorageSpaceEndDate').html(options);
}
function manageFavourite(id){
    var url = $('#'+id).attr('url');
        var recordId = id.split('manageFavourite')[1];
        $.ajax({
            url: url,
            type: "POST",
            data: 'id=' + recordId,
            dataType: 'json',
            beforeSend: function () {
                $('#window_progress').show();
            },
            success: function (response) {
                if (response.status == 'success') {
                    if (response.favourite == 1) {
                        $('#' + id + ' img').attr('src', url + '/../../img/hart_act.png');
                    } else if(response.favourite == 0){
                        $('#' + id + ' img').attr('src', url + '/../../img/hart.png');
                    }
                } else {
                    alert('Changes updated successfully');
                }
            },
            complete: function () {
                $('#window_progress').hide();
            },
            error: function () {
                alert('There was a problem while requesting to update. Please try again');
            }
        });
}

function addToCartDiscount (jsonObj, type) {
    $("#OrderDetailDiscount").val ();
    // Will not change when discount will applied
    if(type != undefined && type != "discount") {
        $("#total_amount").html (jsonObj.amount);
    }
    $("#discount_amt").html (jsonObj.discount);
    
    $("#service_tax").html (jsonObj.service_tax);
    $("#edu_cess").html (jsonObj.edu_cess);
    $("#add_shec").html (jsonObj.add_shec);
        
    $("#checkout_total").html (jsonObj.checkout_amount);   
}
// manage panel visibility
function hideshow(step){
    if($('.step_'+step).css ("display") == "block") {
        return;
    }
    $(".checkout_panel_tab").hide("slideOut");
    $('.step_'+step).show("slideIn");
    $("#checkout_step").val (step);
    for (var i = 1; i <= 4; i ++) {
        if(i <= step) {
            if(!$(".checkout_tab_"+i).hasClass("active")) {
                $(".checkout_tab_"+i).addClass("active");
            }
        } else {
            $(".checkout_tab_"+i).removeClass("active");
        }
    }
}

function checkout_shipping_address (id) {
    $(".address-item").removeClass ("selected");
    $("#"+id).addClass ("selected");
    $("#OrderShippingAddressId").val (id);
    $("#booking_"+id).click();
    amountCheck();
}

// Using at checkout page
function checkout_shipping_address_selected (id) {
    $(".address-item").removeClass ("selected");
    $("#"+id).addClass ("selected");
    $("#OrderShippingAddressId").val (id);
    amountCheck();  // most imp for maintain same ui of third step
}

// <<<<<<< HEAD
// function storageMinSpaceBasedOndateRange (divToUpdate, data_url, pay_option, old_pay_option) {
//     var old_sel_space = $(divToUpdate).val ();
//     if (old_sel_space == "") {
//         old_sel_space = 0;
//     }
//     var amountPerUnit = $('#amount_per_unit').val();

//     $.ajax({
//         url: JS_BASE_URL+'storage_inventories/getStorageAvailSpacesByPeriod',
//         method: "post",
//         data: data_url,
//         dataType: "json",
//         beforeSend:function(){
//              $('#window_progress').show();
//         },
//         success:function(data){
//             var maxAvailableArea = 0;
//             if(old_sel_space > 0) {
//                 $.each(data.space, function(key, value){
//                     maxAvailableArea = value;
//                 });
//             }
            
//             if(old_sel_space > 0){
//                 if(maxAvailableArea < old_sel_space){
//                     alert(maxAvailableArea +" "+ data.unit +" is available space for the selected Move-in Date or Duration. Please modify your selections and try again.");
//                     $(divToUpdate).val ("");
//                 }else if(parseInt(data.min_area_to_book) > parseInt(old_sel_space)){
                    
//                     alert('Minimum space can be booked for this storage is : '+ data.min_area_to_book + " " + data.unit);
//                     $(divToUpdate).val ("");
//                     $('#show_space').html('----');
//                 }else{
//                     $(divToUpdate).val (old_sel_space);
//                     var calculatedAmouont = parseInt(amountPerUnit)*parseInt(old_sel_space);
//                     $('#show_space').html("&#8377; "+calculatedAmouont.toLocaleString("en"));
//                 }
//             }else if(old_sel_space == 0){
//                 $(divToUpdate).val ("");
//             }
//             $("#prev_pay_opt").val (pay_option);
//             if(old_sel_space == 0 || maxAvailableArea < old_sel_space){
//                 $(divToUpdate).val ("");
//             }
            
//            $.each(data.space, function(key, value) {
//                var selected = "";
//                if(old_sel_space == value) {
//                    selected = "selected";
//=======
/**
 * Modified as "NOT IN USE" by manoj kumar on 03-07-2015 ....so commented out the function
 */
//function storageMinSpaceBasedOndateRange (divToUpdate, data_url, pay_option, old_pay_option) {
//    var old_sel_space = $(divToUpdate).val ();
//    if (old_sel_space == "") {
//        old_sel_space = 0;
//    }
//    
//    $.ajax({
//        url: JS_BASE_URL+'storage_inventories/getStorageAvailSpacesByPeriod',
//        method: "post",
//        data: data_url,
//        dataType: "json",
//        beforeSend:function(){
//             $('#window_progress').show();
//        },
//        success:function(data){
//            var maxAvailableArea = 0;
//            if(old_sel_space > 0) {
//                $.each(data.space, function(key, value){
//                    maxAvailableArea = value;
//                });
//            }
//            
//            if(old_sel_space > 0){
//                if(maxAvailableArea < old_sel_space){
//                    alert(maxAvailableArea +" "+ data.unit +" is available space for the selected Move-in Date or Duration. Please modify your selections and try again.");
//                    $(divToUpdate).val ("");
//                }else if(parseInt(data.min_area_to_book) > parseInt(old_sel_space)){
//                    alert('Minimum space can be booked for this storage is : '+ data.min_area_to_book + " " + data.unit);
//                    $(divToUpdate).val ("");
//                }else{
//                    $(divToUpdate).val (old_sel_space);
//>>>>>>> codefire
//                }
//            }else if(old_sel_space == 0){
//                $(divToUpdate).val ("");
//            }
//            $("#prev_pay_opt").val (pay_option);
//            if(old_sel_space == 0 || maxAvailableArea < old_sel_space){
//                $(divToUpdate).val ("");
//            }
//            
////            $.each(data.space, function(key, value) {
////                var selected = "";
////                if(old_sel_space == value) {
////                    selected = "selected";
////                }
////                $(divToUpdate).append('<option value='+key+' '+selected+'>'+value+'</option>');
////            });
//        },
//        complete:function(data){
//            $('#window_progress').hide();
//        },
//      });
//}

/**
 * Validate Space on change on Movein Date
 * @returns {undefined}
 */

function validate_space_movein () {
    var storageId = $("#OrderDetailStorageSpaceId").val ();
    var storage_payment_option_id = $("#OrderDetailSpace").val (); // already selected space
    var movein_date = $("#OrderDetailMoveinDate").val();
    var to_date = $("#OrderDetailToDate").val ();
    if(movein_date == "" || to_date == "") { return; }
    var data_url = "storage_id="+storageId +"&to_date="+to_date+"&movein_date="+movein_date+"&storage_payment_option_id="+storage_payment_option_id;
    $.ajax({
        url: JS_BASE_URL+'storage_inventories/getStorageAvailSpacesByPeriod',
        method: "post",
        data: data_url,
        dataType: "json",
        beforeSend:function(){ $('#window_progress').show(); },
        success:function(data){
            var options = "";
            var selected = "";
            var max_available_not_in_list = true;
            var max_available_space_to_book = 0;
            $.each(data.space, function(key, value){
                if(data.old_selected_space == key){
                    selected = "selected";
                    max_available_not_in_list = false;
                }else{
                    selected = "";
                }
                options += "<option value=" + key + " "+ selected + ">" + value + "</option>";
                if(data.space.length > 1){
                    max_available_space_to_book = value;
                }
            });
            if(max_available_not_in_list){
                alert(max_available_space_to_book +" "+ data.unit +" is available space for the selected Move-in Date or Duration. Please modify your selections and try again.");
            }
            $("#OrderDetailSpace").html(options);
            
//            $("#OrderDetailMoveinDate").val (movein_date);
//            $("#OrderDetailMoveinDate").attr("default", movein_date);
        },
        complete:function(data){
            calculateTotalAmount ();
            $('#window_progress').hide();
        },
      });
}
function validate_space_movein (customtoDate) {
    var storageId = $("#OrderDetailStorageSpaceId").val ();
    var storage_payment_option_id = $("#OrderDetailSpace").val (); // already selected space
    var movein_date = $("#OrderDetailMoveinDate").val();
    var to_date = customtoDate;
    if(movein_date == "" || to_date == "") { return; }
    var data_url = "storage_id="+storageId +"&to_date="+to_date+"&movein_date="+movein_date+"&storage_payment_option_id="+storage_payment_option_id;
    $.ajax({
        url: JS_BASE_URL+'storage_inventories/getStorageAvailSpacesByPeriod',
        method: "post",
        data: data_url,
        dataType: "json",
        beforeSend:function(){ $('#window_progress').show(); },
        success:function(data){
            var options = "";
            var selected = "";
            var max_available_not_in_list = true;
            var max_available_space_to_book = 0;
            $.each(data.space, function(key, value){
                if(data.old_selected_space == key){
                    selected = "selected";
                    max_available_not_in_list = false;
                }else{
                    selected = "";
                }
                options += "<option value=" + key + " "+ selected + ">" + value + "</option>";
                if(data.space.length > 1){
                    max_available_space_to_book = value;
                }
            });
            if(max_available_not_in_list){
                alert(max_available_space_to_book +" "+ data.unit +" is available space for the selected Move-in Date or Duration. Please modify your selections and try again.");
            }
            $("#OrderDetailSpace").html(options);
            
//            $("#OrderDetailMoveinDate").val (movein_date);
//            $("#OrderDetailMoveinDate").attr("default", movein_date);
        },
        complete:function(data){
            calculateTotalAmount ();
            $('#window_progress').hide();
        },
      });
}
/**
 * Modified as NOT IN USE by manoj kumar on 03-07-2015
 */
//function validateCheckoutDuration () {
//    
//    var storageId = $("#OrderDetailStorageSpaceId").val ();
//    var selectedSpace = $("#OrderDetailSpace").val (); // already selected space
//    var to_date = $("#OrderDetailToDate").val ();
//    var movein_date = $("#OrderDetailMoveinDate").val();
//    if(to_date == "") { return; }
//    var data_url = "storage_id="+storageId +"&to_date="+to_date+"&movein_date="+movein_date;
//    
//    var divToUpdate = "#OrderDetailSpace";
//            
//    var old_pay_option = $("#prev_pay_opt").val ();
//    if (selectedSpace == "") {
//        selectedSpace = 0;
//    }
//    $.ajax({
//        url: JS_BASE_URL+'storage_inventories/getStorageAvailSpacesByPeriod',
//        method: "post",
//        data: data_url,
//        async: "false",
//        dataType: "json",
//        beforeSend:function(){
//             $('#window_progress').show();
//        },
//        success:function(data){
//            var maxAvailableArea = 0;
//            if(selectedSpace > 0) {
//                $.each(data.space, function(key, value){
//                    maxAvailableArea = value;
//                });
//            }
//            if(selectedSpace > 0){
//                if(maxAvailableArea < selectedSpace){
//                    alert(maxAvailableArea +" "+ data.unit +" is available space for the selected Move-in Date or Duration. Please modify your selections and try again.");
//                $(divToUpdate).val ("");    
//                }else if(parseInt(data.min_area_to_book) > parseInt(selectedSpace)){
//                    alert('Minimum space can be booked for this storage is : '+ data.min_area_to_book + " " + data.unit);
//                    $(divToUpdate).val ("");
//                }else{
//                    $(divToUpdate).val (selectedSpace);
//                }
//            }else if(selectedSpace == 0){
//                $(divToUpdate).val ("");
//            }
//            $("#prev_pay_opt").val (to_date);
//            if(selectedSpace == 0 || maxAvailableArea < selectedSpace){
//                $(divToUpdate).val ("");
//            }
//            //updateJsPaymentPlan (storageId, pay_option);
//        },
//        complete:function(){
//            calculateTotalAmount ();
//            $('#window_progress').hide();
//        },
//      });
//}

/** Identified as not in use on 03-07-2015
 * Update Storage Payment Plan in checkout page (Not in use currently)
 * @returns {undefined}
 */
//function updateJsPaymentPlan (storageId, pay_option) {
//    var movein_date = $("#OrderDetailMoveinDate").val();
//    var data_url = "storage_space_id="+storageId+"&movein_date="+movein_date+"&to_date="+pay_option;
//    $.ajax({
//        url: JS_BASE_URL+'storage_payment_options/getJsPaymentPlan',
//        method: "post",
//        data: data_url,
//        async: "false",
//        beforeSend:function(){
//             $('#window_progress').show();
//        },
//        success:function(data) {
//            $("#OrderDetailBookingTenure").html (data);
//        },
//        complete:function(){
//            calculateTotalAmount ();
//            $('#window_progress').hide();
//        },
//      });
//}

function edit_address (address_id, type) {
    $('#UserAddressSaveAtCheckoutForm .error-message').remove();
    $('#UserAddressSaveAtCheckoutForm input, #UserAddressSaveAtCheckoutForm select, #UserAddressSaveAtCheckoutForm textarea').removeClass("fieldRequired");
    
    var url;
    if(type != undefined) {
        url = JS_BASE_URL+'user_addresses/save_at_checkout/'+address_id+'/'+type;
    } else {
        url = JS_BASE_URL+'user_addresses/save_at_checkout/'+address_id;
    }
    
    $.ajax({
        url: url,
        method: "get",
        dataType: "json",
        beforeSend:function(){
             $('#window_progress').show();
        },
        success:function(data) {
            if(data.error == 1) {
                alert(data.message);
            } else {
                $("#UserAddressId").val (data.address.id);
                $("#UserAddressName").val (data.address.name);
                $("#UserAddressPostalcode").val (data.address.postalcode);
                $("#UserAddressPhoneNumber").val (data.address.phone_number);
                $("#UserAddressAddress").val (data.address.address);
                $("#UserAddressState").val (data.address.state);
                $("#UserAddressCity").html ("");
                $("#UserAddressCity").html ("<option value>Select City</option>");
                $.each(data.cities, function (index, data) {
                    $("#UserAddressCity").append ("<option value='"+index+"'>"+data+"</option>");
                });
                $("#UserAddressCity").val (data.address.city);
                $('#BookingAddress').modal('show');
            }
        },
        complete:function(){
            $('#window_progress').hide();
        },
      });
}

function delete_address (address_id, type) {
    var url;
    if(type != undefined) {
        url = JS_BASE_URL+'user_addresses/delete/'+address_id+'/'+type;
    } else {
        url = JS_BASE_URL+'user_addresses/delete/'+address_id;
    }
    $.ajax({
        url: url,
        method: "get",
        dataType: "json",
        beforeSend:function(){
             $('#window_progress').show();
        },
        success:function(data) {
            if(data.success == true) {
                if(data.r_type == "json") {
                    render_user_address(data.address);
                } else if(data.r_type == 'rm'){
                    $("#"+address_id).remove ();
                }
            } else {
                alert("Unable to delete.")
            }
        },
        complete:function(){
            $('#window_progress').hide();
        },
      });
}

function storage_pay_option (storage_id) {
   var url = JS_BASE_URL+'storage_payment_options/get_options/'+storage_id;

    $.ajax({
        url: url,
        method: "post",
        beforeSend:function(){
             $('#window_progress').show();
        },
        success:function(data) {
            $("#storage_pay_option").html (data);
        },
        complete:function(){
            $('#window_progress').hide();
        },
      });
}


function chooseAction (action, rowId) {
    $("#action_"+rowId).val (action);
}
function change_inventory_status (status, order_id) {
    $("#return_"+order_id).val (status);
}

function print_window() {
      //Get the print button and put it into a variable
      var chatError = document.getElementById("webengage-error-messages");
      //Set the print button visibility to 'hidden' 
      if(chatError != undefined) {
        chatError.style.visibility = 'hidden';
      }
      var chat2Error = document.getElementById("tawkchat-iframe-container");
      if(chat2Error != undefined) {
        chat2Error.style.visibility = 'hidden';
      }
      
      window.print();
      if(chatError != undefined) {
        chatError.style.visibility = 'show';
      }
      if(chat2Error != undefined) {
        chat2Error.style.visibility = 'show';
      }
}

/**
 * Booking tenure will reset when we chnge the duration, Then we will trate as Booking tenure will be 1 month
 * This will call on change on size, movein date, duration, payment type
 * @param Integer booking_tenure
 * @returns {undefined}
 */ 
function calculateTotalAmount (booking_tenure) {
    var area = $("#OrderDetailSpace").val ();
    var movein = $("#OrderDetailMoveinDate").val ();
    var durationToPay = $("#OrderDetailToDate").val ();
    var storage_space_id = $("#OrderDetailStorageSpaceId").val ();
    if(booking_tenure == undefined) {
        booking_tenure = $("#OrderDetailBookingTenure").val ();
    }
    
    var data = "storage_id="+storage_space_id+"&space="+area+"&movein_date="+movein+"&to_date="+durationToPay+"&booking_tenure="+booking_tenure;
    var url = JS_BASE_URL+'storage_payment_options/getJsCalculatedAmount';
    $.ajax({
        url: url,
        method: "post",
        data: data,
        dataType: "json",
        beforeSend:function(){
             $('#window_progress').show();
        },
        success:function(jsonObj) {
            //alert(JSON.stringify(jsonObj));
            if(jsonObj.space == undefined || jsonObj.space == "") {
                $("#checkout_pay_cycle").hide();
            } else {

                $("#area_size").text (jsonObj.spaceTxt);
                $("#movein_date").text (jsonObj.from_date);
                $("#duration_date").text (jsonObj.to_date);
                $("#checkout_total").html (jsonObj.amount);
                //$("#checkout_pay_cycle_type").text (jsonObj.p_type);
				 //<!-- this line edit by satendra bharti for calcultig 12.36 value -->
				$("#int_service_tax").html(jsonObj.int_service_tax);
                
                /*if(jsonObj.additional_amount != undefined) {
                    $("#additional_amount_caption").show();
                    $("#additional_amount").show();
                    $("#additional_amount_caption").html(jsonObj.amt_caption);
                    $("#additional_amount").html(jsonObj.additional_amount);
                    $("#additional_amount_tooltip").show();
                } else {
                    $("#additional_amount_caption").hide();
                    $("#additional_amount").hide();
                    $("#additional_amount_tooltip").hide();
                }-*/
                
                $("#total_amount").html (jsonObj.total_amount);
                $("#discount_amt").html (jsonObj.discount);
                $("#service_tax").html (jsonObj.service_tax);
                $("#edu_cess").html (jsonObj.edu_cess);
                $("#add_shec").html (jsonObj.add_shec);
                $("#checkout_pay_cycle").show();

            }
            
        },
        complete:function(){
            $('#window_progress').hide();
        }
      });
}

function couponOnAjax (code, moveoutdate, moveinDate, storagePaymentOptionId, bookingTenure,storage_id) {
    var data = "to_date=" + moveoutdate
            + "&movein_date=" + moveinDate 
            + "&storage_payment_option_id=" + storagePaymentOptionId
            + "&booking_tenure=" +bookingTenure
            + "&storage_id=" + storage_id
            + "&coupon_code=" + code;
     $.ajax({
         url: JS_BASE_URL+'coupons/checkout_execute_coupon_code',
         method: "post",
         data: data,
         dataType: "json",
         beforeSend:function(data){
              $('#window_progress').show();
         },
         success:function(data){
             applyDiscountCoupon(data, code);
            
         },
         complete:function(data){
             $('#window_progress').hide();
             amountCheck();
         },
       });
}

function remove_error(f_id) {
    if($("#" + f_id).hasClass("fieldRequired") && $("#" + f_id).val() != "") {
       $("#" + f_id).siblings ("div.error-message").remove(); 
       $("#" + f_id).removeClass("fieldRequired");
    } else if($("#" + f_id).hasClass("form-error") && $("#" + f_id).val() != "") {
        $("#" + f_id).siblings ("div.error-message").remove(); 
        $("#" + f_id).removeClass("form-error");
    }
}