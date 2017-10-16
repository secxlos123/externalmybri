/**
 * This file for handling select2 ajax and this require select2.min.js before u call this file
 * 
 * @author Candra Sudirman <candra.s@smooets.com>
 */
(function( $ ){
	$.fn.numeric = function( max = null, min = null ) {
		this.on('keydown keypress change keyup', function (e) {
	        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	            (e.keyCode == 65 && e.ctrlKey === true) ||
	            (e.keyCode == 67 && e.ctrlKey === true) ||
	            (e.keyCode == 88 && e.ctrlKey === true) ||
	            (e.keyCode === 320 && e.ctrlKey === true) ||
	            (e.keyCode >= 35 && e.keyCode <= 39)) {
	            return;
	        }
	        
	        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	            e.preventDefault();
	        }

	        if (max != null) {
		        if ($(this).val() > max) {
		            $(this).val(max).trigger('change');
		            max = null;
		        }
	        }

	        if (min != null) {
	        	if ($(this).val() < min) {
	        		$(this).val(min).trigger('change');
	        		min = null;
	        	}
	        }
	    });

		return this;
	}
})( jQuery );