/**
 * Generate Storage List and set marker of map
 * @param JSON storages
 */
var additional_processed = false;
function redrawStorageList (storageJson, mode) {
    var markerJson = new Array();
    
    $("#paginator_start").html (storageJson.start);
    $("#paginator_end").html (storageJson.end);
    $("#paginator_total").html (storageJson.total);
    
    // Hide Advance filter panel and Show result bottom page
    $("#advanceSearchSection").hide();
    $("#js-scrollpane-close").hide();
    var location = "";
    if(storageJson.location != null) {
        location = storageJson.location; 
    }
    $("#storage_content .breadcrumb-container").children("li.last").text (location);
    
    if(mode == "add") {
        if(storageJson.hasMore != undefined) {
            load_init("search_location", storageJson.hasMore);
        }
        $("#storageResultSection ul.resultList").html("");
         $("section.advanceOption, section.resultDropdown, section#storageResultSection").show();
        clearMarkers(null);
        if(storageJson.content.length < 1) {
            $("#js-paginator, .search-results-header").hide();
            $(".resultList").html('<li><h3 style="padding:30px; line-height: 35px; text-align:center;">Oops. StoreMore hasn\'t found its way to your location yet. </br>We\'ll be there soon to serve you!</h3></li>');
            //return;
        }
    } else {
        /*if(storageJson.content.length < 1) {
            return;
        }*/
    }
    
    
    for (var i = 0; i < storageJson.content.length; i++) {
        var storage = storageJson.content[i];

        markerJson[i] = [storage.name, storage.lat, storage.long, storage.id, storage.def_img, storage.page_url];
        var element = "";
        if(storage.additional_strip == true) {
            element += '<li class="other_results">No more results found as per your search criteria. Here are few more suggestions..</li>';
        }
        element += '<li id="'+i+'">';
        if(storage.out_of_stock == true) {
            element += '<div class="out_of_stock"></div>';
        }
        element += '<span class="leftImage"><a class="facility-image" href="'+storage.page_url+'">';
        element += '<img src="'+storage.def_img+'" alt="'+storage.name+'"></a></span>';
        element += '<ul>';
        element += '<li class="first">';
        element += "<h4>";
        element += '<a href="'+storage.page_url+'" class="selenium-link-facility">'+storage.name+'</a>';
        
        element += '<a href="javascript:void(0)" title="'+storage.fav_title+'" id="manageFavourite'+storage.id+'"';
        if(storage.fav_datamodel != undefined) {
            element += ' datadata-toggle="'+storage.fav_datamodel+'"';
        }
        if(storage.fav_datatarget != undefined) {
            element += ' data-target="'+storage.fav_datatarget+'"';
        }
        
        if(storage.fav_url != undefined) {
            element += ' url="'+storage.fav_url+'"';
        }
        
        if(storage.fav_onclick != undefined) {
            element += ' onclick="'+storage.fav_onclick+'"';
        }
        element += " class='favIcon'>";
        element += " <img src='"+storage.fav_img_url+"' />";
        element += "</a>";
        element += "</h4>";
        element += '<span>'+storage.city_name+', '+storage.state_name+', '+storage.postalcode+'</span>';
        //element += '<strong>'+storage.payopt+'</strong>';
        element += '</li>';
        element += '<li class="last">';
        element += '<div style="float:left"><input class="rb-rating" data-glyphicon="0" value="'+storage.rating+'" style="display:none;" /></div>';
        if(storage.rating > 0) {
            element += '<div style="float:left; margin-left:10px;"><a href="'+storage.page_url+'#reviews">Read Reviews</a></div>';
        }
        element += '<div style="clear:both"></div></li>';
        element += '</ul>';
        element += '</li>';
        $("#storageResultSection ul.resultList").append (element);
        
        if(storage.fav_datamodel != undefined) {
            $("#manageFavourite"+storage.id).bind ("click", function () {
                $('#signinModal').modal('show'); 
            });
        }

        $("#"+i).unbind("mouseover");

        $("#"+i).bind("mouseover", function (){
            showStoreLocation($(this).attr("id"));
        }).mouseout(function (){
            hideStoreLocation($(this).attr("id"));
        });
    }
    
    $('.rb-rating').rating({
    'showCaption':false, 
    'stars':'5', 
    'min':'0', 
    'max':'5', 
    'step':'0.1', 
    'size':'xs', 
    'starCaptions': {1:'Very Poor', 2:'Poor', 3:'Good', 4:'Very Good', 5:'Excellent'}});
    $('.rb-rating').parent().unbind();

    setLocation(markerJson);
}

/**
 * Append Storage list
 */
function storage_json_append (storagesObj) {
    storagesObj = jQuery.parseJSON(storagesObj);
    redrawStorageList (storagesObj, "append");
}

// Validate Payment Option Form
function processForms (dataVal) {
    $(".error").hide();
    dataVal = jQuery.parseJSON(dataVal);
    if(dataVal.error == false) {
        if(dataVal.callback != undefined) {
             var ajx_function = window[dataVal.callback];
             ajx_function(dataVal.callback_data);
        } else {
            $("#flash_message").html (dataVal.messages);
            setTimeout(function(){ $("#message").html (""); }, 3000);
        }
    } else {
        $(".smAjax").remove();
        var fieldName = "data["+dataVal.type+"]["+dataVal.model+"]";
        $.each (dataVal.messages, function (index, message) {
            fieldName += "["+index+"]";
            var msgText = "<span class='error'>" +message+"</span>";
            $("input[name='"+fieldName+"']").parent("div.input").after(msgText);
        });
    }
}
function processFormModel (dataVal) {
    $(".error").hide();
    dataVal = jQuery.parseJSON(dataVal);
    if(dataVal.error == false) {
       $("#flash_message").html (dataVal.messages);
       setTimeout(function(){ 
           if(dataVal.stop_message == undefined){
               $("#message").html ("");
           } 
           if(dataVal.stop_redirection == undefined){
               window.location.reload();
           }
       }, 1000);
       
    } else {
        var fieldName = "data["+dataVal.model+"]";
        $.each (dataVal.messages, function (index, message) {
            fieldName = "data["+dataVal.model+"]"+"["+index+"]";
            var msgText = "<span class='error'>" +message+"</span>";
            $("input[name='"+fieldName+"'], select[name='"+fieldName+"'], textarea[name='"+fieldName+"']").parent().after(msgText);
        });
    }
}

// Enable/Disable Child Category and options
function redrawCateOpt (jsonObj, inputId) {
    jsonObj = jQuery.parseJSON(jsonObj);
    if(jsonObj.success == true) {
       if(jsonObj.jsonData.status == true) {
           // If parent is checked then all child will be marked as checked
           $("."+jsonObj.jsonData.div_class).show();
           $("."+jsonObj.jsonData.div_class+".cat_status").children("form").children("input[type='checkbox']").prop("checked", true);
       } else {
           $("."+jsonObj.jsonData.div_class+".cat_status").children("form").children("input[type='checkbox']").prop("checked", false);
           $("."+jsonObj.jsonData.div_class).hide();
        }
    } else {
        alert("Failed, refresh the page to continue.");
        if(inputId != undefined) {
            if($("#"+inputId).prop("checked")) {
                $("#"+inputId).prop("checked", false);
            } else {
                $("#"+inputId).prop("checked", true);
            }
        }
    }
}
function updateStorageDiv (jsonObj) {
    if(jsonObj == "") {
        return;
    }
    $('#OrderDetailSpace').html("<option value>Please Select</option>");
    $.each(jsonObj.payment_opt, function (i, v){
        $('#OrderDetailSpace').append($("<option></option>") .attr("value",i) .text(v)); 
    });
    
}

function change_cart_panel (jsonObj) {
    //$("#OrderId").val (jsonObj.order_id);
    //change_url("order_id="+jsonObj.order_id+"&step="+jsonObj.step, true);
    //change_url("step="+jsonObj.step, true);
    
    if(jsonObj.step != undefined) {
        hideshow(jsonObj.step);
    }
    
    if(jsonObj.redirect != undefined) {
        window.location = jsonObj.redirect;
    }
    
    // Processed 1
    if(jsonObj.step == 2 || jsonObj.step == 3) {
        $("#area_size").text (jsonObj.cart.spaceTxt);
        $("#movein_date").text (jsonObj.cart.from_date);
        $("#duration_date").text (jsonObj.cart.to_date);
        $("#checkout_total").html (jsonObj.cart.amount);
        
        $("#checkout_pay_cycle_type").text (jsonObj.cart.p_type);
        
        /*if(jsonObj.cart.additional_amount != undefined) {
            $("#additional_amount_caption").show();
            $("#additional_amount").show();
            $("#additional_amount_caption").html(jsonObj.cart.amt_caption);
            $("#additional_amount").html(jsonObj.cart.additional_amount);
            $("#additional_amount_tooltip").show();
        } else {
            $("#additional_amount_caption").hide();
            $("#additional_amount").hide();
            $("#additional_amount_tooltip").hide();
        }*/
        $("#total_amount").html (jsonObj.cart.total_amount);
        $("#discount_amt").html (jsonObj.cart.discount);
    
        $("#service_tax").html (jsonObj.cart.service_tax);
        $("#edu_cess").html (jsonObj.cart.edu_cess);
        $("#add_shec").html (jsonObj.cart.add_shec);
        
		 
		 
        $("#checkout_pay_cycle").show();
    } 
    if(jsonObj.step == 3){
        $("#checkout_address").show();
        $("#checkout_address_name").text (jsonObj.shipping_address.User.first_name);
        $("#checkout_address_address").text (jsonObj.shipping_address.UserAddress.address);
        $("#checkout_address_city").text (jsonObj.shipping_address.UserAddress.postalcode+", "+jsonObj.shipping_address.UserAddress.city);
        $("#checkout_address_state").text (jsonObj.shipping_address.UserAddress.state);
        $("#checkout_address_mobile").text ();
    }
    
    $("#checkout_step").val (jsonObj.step);
}


/*
function checkout_side_panel (jsonObj) {
    if(jsonObj.p_type != undefined) {
        $("#checkout_pay_cycle_type").text (jsonObj.p_type);
        $("#checkout_pay_cycle_unit").text (jsonObj.unitAmt);
        $("#checkout_total").text (jsonObj.amount);
        $("#checkout_pay_cycle").show();
    }
}*/
/**
 * Apply discount coupon when Enter coupon and click to apply on checkout page
 * @param Json jsonObj
 * @returns {undefined}
 */
function applyDiscountCoupon (jsonObj, code) {
    $("#coupon-error").html ("");
    
    if(jsonObj.status == false && code != "") {
        $("#coupon-error").html (jsonObj.message);
    } else if(code != undefined && code != "") {
        $("#OrderDetailCouponCode").val (code);
        $("#coupon_code, #coupon_code_box").hide();
        $("#coupon-text").children ("span#text").text(code);
        $("#coupon-text").children ("span#text").attr("title", code);
        $("#coupon-text").show();
    } else if(code == ""){
        $("#OrderDetailCouponCode").val (code);
    }
    addToCartDiscount (jsonObj, "discount");
    setTimeout (function () {$("#coupon-error").html ("")}, 3000);
}

/**
 * Change Checkout panel after error on step 4
 * @param JSON jsonObj
 * @returns {undefined}
 */
function change_cart_panel_on_error (jsonObj) {
    hideshow (jsonObj.step);
}

function render_user_address (jsonObj) {
    progressShow('window_progress');
    $("#myCarousel .carousel-inner").html ('<span class="no-address-txt">No saved addresses found. Please add a new address.</span>');
    var html = "";
    for (var i = 0; i < jsonObj.length; i++) {
        var uAddress = jsonObj[i];
        var index = i + 1;
        if(index % 2 == 1) {
            var cls = "";
            if(index == 1) {
                cls = "active";
            }
            html += "<div class='item "+cls+"'>";
            html += '<ul class="thumbnails">';
        }
        html += '<li class="col-sm-6 col-lg-6 col-xs-6 col-md-6 responsiveMobWidth">';
        html += '<div class="address_detail ng-scope">';
        html +='<a class="padding20 address-item shippingAddress" onclick="javascript:checkout_shipping_address('+uAddress.UserAddress.id+')" id="'+uAddress.UserAddress.id+'">';
        html += '<div class="name rposition">';
        html += '<span class="tick-icon tick-mark"></span>';
        html += '<span title="'+uAddress.UserAddress.name+'" class="text-ellipsis ng-binding">'+uAddress.UserAddress.name+'</span>';
        html += '</div>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.address;
        html += '</p>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.postalcode +", "+uAddress.UserAddress.city;
        html += '</p>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.state;
        html += '</p>';
        html += '<span class="phone ng-binding">';
        html += uAddress.UserAddress.phone_number;
        html += '</span>';
        html += '<p>';
        html += '<input class="btn orange-btn continue-btn bookingSubmitBtn sel_address" id="booking_'+uAddress.UserAddress.id+'" type="submit" value="continue" onclick="javascript:checkout_shipping_address_selected('+uAddress.UserAddress.id+')">';
        html += '</p>';
        html += '</a>';
        html += '<div class="address-icons">';
        html += '<a class="delete-icon margin5" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="javascript:delete_address('+uAddress.UserAddress.id+')"></a>';
        html += '<a class="address-edit-icon margin5" data-toggle="tooltip" data-placement="bottom" title="Edit" onclick="javascript:edit_address('+uAddress.UserAddress.id+')"></a>';
        html += '</div>';
        html += '</div>';
        html += '</li>';
        
        if(index % 2 == 0 || index == jsonObj.length) {
            html += '</ul>';
            html += '</div>'  
        }
    }
    if(html != "") {
        $("#myCarousel .carousel-inner").html (html);
    }
    if(jsonObj.length > 2) {
        $(".nextPrev").removeClass ("disabled");
    } else {
        $(".nextPrev").addClass ("disabled");
    }
    
    
    // Mapping again
    var formId  = '#OrderBookingForm';
    var button  = '.sel_address';
    var validate    = ajaxValidation();
    $(button).click(function(e){
        var self= this;
        var url     = $(formId).attr('action');
        var element = $(formId);
        validate.doPost({
            url: url,
            element: element,
            callback: function(message) {
                if(message=='error') {
                    $(self).unbind();
                } else {
                    $(formId).submit();
                }
            }
        });
        return false;
    });
    $("#add_popup_close").click();
    progressHide('window_progress');

    // Added By Satendra Bharti //
    var is_edit_pop_up  = $('#UserAddressId').val();
    var add_id = uAddress.UserAddress.id;
    if(add_id!='' && is_edit_pop_up ==''){
         checkout_shipping_address(add_id);
         
    }
    // Added By Satendra Bharti //
    
   $('#UserAddressSaveAtCheckoutForm').trigger("reset");
}




function render_user_addressfront (jsonObj) {
    
    progressShow('window_progress');
    $("#myCarousel .carousel-inner").html ('<span class="no-address-txt">No saved addresses found. Please add a new address.</span>');
    var html = "";
    for (var i = 0; i < jsonObj.length; i++) {
        var uAddress = jsonObj[i];
        var index = i + 1;
        if(index % 2 == 1) {
            var cls = "";
            if(index == 1) {
                cls = "active";
            }
            html += "<div class='item "+cls+"'>";
            html += '<ul class="thumbnails">';
        }
        html += '<li class="col-sm-6 col-lg-6 col-xs-6 col-md-6 responsiveMobWidth">';
        html += '<div class="address_detail ng-scope">';
        html +='<a class="padding20 address-item shippingAddress" onclick="javascript:checkout_shipping_address('+uAddress.UserAddress.id+')" id="'+uAddress.UserAddress.id+'">';
        html += '<div class="name rposition">';
        html += '<span class="tick-icon tick-mark"></span>';
        html += '<span title="'+uAddress.UserAddress.name+'" class="text-ellipsis ng-binding">'+uAddress.UserAddress.name+'</span>';
        html += '</div>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.address;
        html += '</p>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.postalcode +", "+uAddress.UserAddress.city;
        html += '</p>';
        html += '<p class="ng-binding">';
        html += uAddress.UserAddress.state;
        html += '</p>';
        html += '<span class="phone ng-binding">';
        html += uAddress.UserAddress.phone_number;
        html += '</span>';
        html += '<p>';
        html += '<input class="btn orange-btn continue-btn bookingSubmitBtn sel_address" id="booking_'+uAddress.UserAddress.id+'" type="submit" value="continue" onclick="javascript:checkout_shipping_address_selected('+uAddress.UserAddress.id+')">';
        html += '</p>';
        html += '</a>';
        html += '<div class="address-icons">';
        html += '<a class="delete-icon margin5" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="javascript:delete_address('+uAddress.UserAddress.id+')"></a>';
        html += '<a class="address-edit-icon margin5" data-toggle="tooltip" data-placement="bottom" title="Edit" onclick="javascript:edit_address('+uAddress.UserAddress.id+')"></a>';
        html += '</div>';
        html += '</div>';
        html += '</li>';
        
        if(index % 2 == 0 || index == jsonObj.length) {
            html += '</ul>';
            html += '</div>'  
        }
    }
    if(html != "") {
        $("#myCarousel .carousel-inner").html (html);
    }
    if(jsonObj.length > 2) {
        $(".nextPrev").removeClass ("disabled");
    } else {
        $(".nextPrev").addClass ("disabled");
    }
    
    
    // Mapping again
    var formId  = '#OrderBookingForm';
    var button  = '.sel_address';
    var validate    = ajaxValidation();
    $(button).click(function(e){
        var self= this;
        var url     = $(formId).attr('action');
        var element = $(formId);
        validate.doPost({
            url: url,
            element: element,
            callback: function(message) {
                if(message=='error') {
                    $(self).unbind();
                } else {
                    $(formId).submit();
                }
            }
        });
        return false;
    });
    $("#add_popup_close").click();
    progressHide('window_progress');

    
   $('#UserAddressSaveAtCheckoutForm').trigger("reset");
}

function reload_user_address () {
    window.location.reload ();
}

function process_pay_option (jsonObj) {
    $("#pay_"+jsonObj.ptype).html (jsonObj.messages);
}