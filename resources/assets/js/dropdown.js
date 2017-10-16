/**
 * This file for handling select2 ajax and this require select2.min.js before u call this file
 * 
 * @author Candra Sudirman <candra.s@smooets.com>
 */
(function( $ ){
	$.fn.dropdown = function( type, options ) {
		this.select2({
			width : '100%',
			allowClear: true,
			ajax: {
				url: `/dropdown/${type}`,
				dataType: 'json',
				delay: 250,
				data: function (params) {
					return $.extend({
						name: params.term,
						page: params.page || 1
					}, options)
				},
				processResults: results,
				cache: true
			},
		});
		
		return this;
	};

	function results(data, params) {
		params.page = params.page || 1;

		return {
			results: data.results.data,
			pagination: {
				more: (params.page * data.results.per_page) < data.results.total
			}
		};
	}
})( jQuery );