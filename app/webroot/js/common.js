$(document).ready(function() {
    $(".storage_unit").change(function () {
        //Submit form on change event
        $("#StorageSpaceSearchForm").submit ();
    });
    
    $(".storage_payment").click (function () {
        $(".storage_payment").prop ("checked", false);
        var currentIsAcive = $(this).parent("label.btn-payment").hasClass ("active");
        $(".btn-payment").removeClass("active");
        if(currentIsAcive == false) {
            $(this).prop("checked", true);
            $(this).parent("label.btn-payment").addClass ("active");
        }
    });
    
    $('.states').change(function(){
        $.ajax({
           url: JS_BASE_URL+'common/getCities/'+$(this).val(),
           dataType:'JSON',
           beforeSend:function(data){
                $('#window_progress').show();
           },
           success:function(data){
               $('.cities').html('<option value="">Please Select</option>');
               $.each(data, function(key, value){
                   $('.cities').append('<option value='+key+'>'+value+'</option>');
               })
               
           },
           complete:function(data){
               $('#window_progress').hide();
           },
        });
    });
    
    
    $("#view_all_filter").click (function () {
       $("#advanceSearchSection").show(300);
       $("#js-scrollpane-close").show();
       $("section.advanceOption").hide();
    });
    
    $("#collapse_filter").click (function () {
        $("#advanceSearchSection").hide(300);
        $("#js-scrollpane-close").hide();
        $("section.advanceOption").show();
    });
    if($("#searchInput").length > 0) {
        // Search Autocomplete JS
        $( "#searchInput" ).autocomplete({
            source: JS_BASE_URL+'storage_spaces/location_suggestion/',
            minLength: 2,
            search: function (data) {
                $("small.ajaxCall").show();
            },
            response: function (data) {
                $("small.ajaxCall").hide();
            }
        });
    }
    
    $("#StorageSpaceOrder").change (function () {
		$('#searchInput').val('');
         //Submit form on change event
        $("#StorageSpaceSearchForm").submit ();
    });
    
    
    
    $(".js_scroller").click (function () {
        var param = $(this).attr("reqparam");
          $.ajax({
           url: JS_BASE_URL+'storage_spaces/storage_images/'+param,
           beforeSend:function(data){
                $("#window_progress").show();
           },
           success:function(data){
               $("#updateStoreImageBlock").html (data);
           },
           complete:function(data){
               $("#window_progress").hide();
           },
        });
    });
    $('.toggleModal').click(function () {
        var id = $(this).attr ("data-target");
        if(id == "signupModal") {   
            $('#signinModal').modal('hide');
            $('#signupModal').modal('show');
        } else {
            $('#signupModal').modal('hide');
            $('#signinModal').modal('show');
        }
   });

    /*$("#OrderStoragePaymentOptionId").change (function () {
        renderOrderToDate(); 
   });*/ 
   
   /*$("#InvoiceAmount, #InvoiceDiscount").blur (function () {
       var amount = $("#InvoiceAmount").val ();
       var discount = $("#InvoiceDiscount").val ();
       
       var sTax = $("#invoiceSTax").attr("tax");
       var eduCess = $("#invoiceEdiCess").attr("tax");
       var shec = $("#invoiceShec").attr("tax");
       
       var t_amount = 0;
       if($.isNumeric(amount)) {
           t_amount = amount;
       }
       if($.isNumeric(discount)) {
           t_amount = t_amount - discount;
       }
       
       var taxableAmount = (t_amount * sTax/ 100).toFixed (2);
       $("#invoiceSTax").text(taxableAmount);
       var eduAmt = ((taxableAmount * eduCess) / 100).toFixed (2);
       $("#invoiceEdiCess").text(eduAmt);
       
       var shecAmt = ((eduAmt * shec) / 100).toFixed (2);
       $("#invoiceShec").text(shecAmt);
   });*/ 
$(".discount_type").click (function () {
    $('#InvoiceDiscountVal').trigger("blur");
});

$("#InvoiceAmount, #InvoiceDiscountVal").blur (function () {
       var amount = $("#InvoiceAmount").val ();
       var discount = $("#InvoiceDiscount").val ();
       var discount_type = $(".discount_type:checked").val();
       var InvoiceDiscountVal = $("#InvoiceDiscountVal").val ();
       
       var sTax = $("#invoiceSTax").attr("tax");
       var eduCess = $("#invoiceEdiCess").attr("tax");
       var shec = $("#invoiceShec").attr("tax");
       
       var t_amount = 0;
       if($.isNumeric(amount)) {
           t_amount = amount;
       }
       if($.isNumeric(InvoiceDiscountVal)) {
          if(discount_type=='flat')
          {
           $("#InvoiceDiscount").val (InvoiceDiscountVal);
           t_amount = t_amount - InvoiceDiscountVal;
          }else{
            var calcDiscount = t_amount*(InvoiceDiscountVal/100);
            t_amount = t_amount - calcDiscount;
            $("#InvoiceDiscount").val (calcDiscount);
          }
       }
       
       var taxableAmount = (t_amount * sTax/ 100).toFixed (2);
       $("#invoiceSTax").text(taxableAmount);
       var invoiceTotalAmount = Number(t_amount)+Number(taxableAmount);
       $("#invoiceTotalAmount").text(invoiceTotalAmount);
       
       var eduAmt = ((taxableAmount * eduCess) / 100).toFixed (2);
       $("#invoiceEdiCess").text(eduAmt);
       
       var shecAmt = ((eduAmt * shec) / 100).toFixed (2);
       $("#invoiceShec").text(shecAmt);
   });

   $(".callAjaxloader").click (function () {
        $('#window_progress').show();
   });
   $("#validateCoupon").click (function () {
       var moveoutdate = $("#OrderDetailToDate").val ();
       var moveinDate = $("#OrderDetailMoveinDate").val ();
       var storagePaymentOptionId = $("#OrderDetailSpace").val ();
       var bookingTenure = $("#OrderDetailBookingTenure").val ();
       var code = $("#OrderCouponBox").val ();
       var storage_id = $("#OrderDetailStorageSpaceId").val ();
       couponOnAjax (code, moveoutdate, moveinDate, storagePaymentOptionId, bookingTenure,storage_id);
   });
   
   $(".pay_opt").click(function () {
      $("#OrderDetailPType").val ($(this).attr("p_type"));
       $(".OrderDetailPTypeForZero").val ($(this).attr("p_type"));
   });
   
   /**
    * Manage Panel expand / collapse
    */
   $ ("#checkout_panel .titlebg").click (function () {
       var step = $(this).attr("step"); 
       if($(".checkout_tab_"+step).hasClass ("active")) {
            hideshow(step);
       }
   });
   
   $(".add_address_btn").click (function () {
    $('#UserAddressSaveAtCheckoutForm').trigger("reset");
    $('#UserAddressId').val("");
 });
 
 $(".number_only").keypress (function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
 });
 
 // Remove bottom message if anything exist in fields
 $("input, textarea").blur (function () {
     var f_id = this.id;
    remove_error (f_id);
 });
 
 // Remove bottom message if anything exist in fields
 $("select").change (function () {
     var f_id = this.id;
    remove_error (f_id);
 });
});
/*
$(document).ajaxStart(function() {
    $('#window_progress').show();
}).ajaxStop(function() {
    $('#window_progress').hide();
});*/