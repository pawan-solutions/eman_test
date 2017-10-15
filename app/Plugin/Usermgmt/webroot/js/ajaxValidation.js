var ajaxValidation = (function(){
	return {
		doPost: function(settings){
            progressShow("window_progress");
			this.settings   = settings;
			var formData = this.settings.element.serializeAll();
			var _this       = this;
			$.ajax({
				type: "POST",
				url: this.settings.url,
				datatype: 'json',
				data: formData,
				success: function(data, textStatus, jqXHR) {
                                        jQuery("input, select, textarea").removeClass("fieldRequired");
					_this.readResponse(data);
                                         progressHide("window_progress");
				}
			});
		},
		readResponse: function(data) {
			try {
				var data    = JSON.parse(data); // parse JSON to object
				$('body').find('.error-message').remove();
				if(data.error != 1) {
					this.settings.callback(data.message);
				} else {
					this.addValidation(data);
				}
			} catch(e) {
				this.settings.callback('error');
			}

		},
		addValidation: function(data) {
			var _this   = this;
			if(data.data) {
				$.each(data.data, function(model, fields) {
					if(fields) {
						$.each(fields, function(field, message) {
							var inputId = '#' + _this.camelize(model+'_'+field);
							var element = $('<div>' + message + '</div>')
											.attr({
												'class' : 'error-message'
											})
											.css ({
												display: 'none'
											});
							$(inputId).after(element);
                                                        jQuery(inputId).addClass("fieldRequired");
							$(element).fadeIn();
						});
					}
				});
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