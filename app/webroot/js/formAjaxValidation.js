/**
 * 
 * This is using by User registration, Login form
 */
var ajaxValidation = (function() {
    return {
        doPost: function(settings){
            progressShow ("window_progress");
            this.settings   = settings;
            var formData = this.settings.element.serializeAll();
            var _this       = this;
            jQuery.ajax({
                type: "POST",
                url: this.settings.url,
                datatype: 'json',
                data: formData,
                success: function(data, textStatus, jqXHR) {
                    
                    jQuery("input, select, textarea").removeClass("fieldRequired");
                    _this.readResponse(data);
                },
                complete: function () {
                    
                    progressHide("window_progress");
                }
            });
        },
        readResponse: function(data) {
                try {
                    var data    = JSON.parse(data); // parse JSON to object

                    jQuery('body').find('.error-message').remove();
                    if(data.error != 1) {
                        if(data.callback != undefined ) {
                            var ajx_function = window[data.callback];
                            ajx_function(data.callback_data);
                        } else {

                            this.settings.callback(data.message);
                        }
                    } else {
                        if(data.callback != undefined ) {
                            var ajx_function = window[data.callback];
                            ajx_function(data.callback_data);
                        }
                        this.addValidation(data);
                    }
                } catch(e) {
                    this.settings.callback('error');
                }

        },
        addValidation: function(data) { 
            var _this   = this;
            console.log(_this.settings.element.selector);
            if(data.data) {
                var field_overlay = 0;
                jQuery.each(data.data, function(model, fields) {
                    if(fields) {
                        jQuery.each(fields, function(field, message) {
                            jQuery.each(_this.settings.element[0], function(field_n, fields) {             
                                if(fields.name=='data['+ _this.camelize(model)+']['+field+']') {
                                    var inputId = '#' +fields.id;
                                    var element = jQuery('<div>' + message + '</div>')
                                            .attr({'class' : 'error-message'})
                                            .css ({display: 'none'});
                                    jQuery(inputId).addClass("fieldRequired");
                                    field_overlay = field_overlay + 1;
                                    jQuery(inputId).after(element);
                                    jQuery(element).fadeIn();
                                }
                           });

                        });
                    }
                });
            }
            if(_this.settings.element.selector =='#OrderBookingForm'){
              $("html, body").animate({ scrollTop: 100 }, "slow");
            }
           
        },
        camelize: function(string) {
                var a = string.split('_'), i;
                s = [];
                for (i=0; i<a.length; i++){
                        s.push(a[i].charAt(0).toUpperCase() + a[i].substring(1));
                }
                s = s.join('');
                return s;
        }
    };
});
(function($) {
	$.fn.serializeAll = function() {
		var rselectTextarea = /^(?:select|textarea)/i;
		var rinput = /^(?:color|date|datetime|datetime-local|email|file|hidden|month|number|password|range|search|tel|text|time|url|week)$/i;
		var rCRLF = /\r?\n/g;

		var arr = this.map(function(){
			var elmt = this.elements ? jQuery.makeArray( this.elements ) : this;
			return elmt;
		})
		.filter(function(){
			return this.name && !this.disabled && (this.checked || rselectTextarea.test(this.nodeName) || rinput.test(this.type ));
		})
		.map(function( i, elem ){
			var val = jQuery( this ).val();
			if(this.type=='file') {
				elemName = elem.name+'[name]';
				val = (val==null) ? null : jQuery.isArray( val ) ?
												jQuery.map( val, function( val, i ){
													return { name: elemName, value: val.replace( rCRLF, "\r\n" ) };
												}) :
												{ name: elemName, value: val.replace( rCRLF, "\r\n" ) };
			} else {
				val = (val==null) ? null : jQuery.isArray( val ) ?
												jQuery.map( val, function( val, i ){
													return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
												}) :
												{ name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
			}
			return val;
		}).get();
		return $.param(arr);
	}
})(jQuery);
