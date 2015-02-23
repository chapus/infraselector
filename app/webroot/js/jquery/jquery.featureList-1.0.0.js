/*
 * FeatureList - simple and easy creation of an interactive "Featured Items" widget
 * Examples and documentation at: http://jqueryglobe.com/article/feature_list/
 * Version: 1.0.0 (01/09/2009)
 * Copyright (c) 2009 jQueryGlobe
 * Licensed under the MIT License: http://en.wikipedia.org/wiki/MIT_License
 * Requires: jQuery v1.3+
*/
;(function($) {
	$.fn.featureList = function(options) {
		var tabs	= $(this);
		var output	= $(options.output);
		var output2	= $(options.output2);

		new jQuery.featureList(tabs, output, options, output2);

		return this;	
	};

	$.featureList = function(tabs, output, options, output2) {
		function slide(nr) {
			if (typeof nr == "undefined") {
				nr = visible_item + 1;
				nr = nr >= total_items ? 0 : nr;
			}

			tabs.removeClass('current').filter(":eq(" + nr + ")").addClass('current');

			output.stop(true, true).filter(":visible").fadeOut();
			output.filter(":eq(" + nr + ")").fadeIn(function() {
				visible_item = nr;	
			});
			
			output2.stop(true, true).filter(":visible").hide();
			output2.filter(":eq(" + nr + ")").fadeIn(function() {
				visible_item = nr;	
			});
		}

		var options			= options || {}; 
		var total_items		= tabs.length;
		var visible_item	= options.start_item || 0;

		options.pause_on_hover		= options.pause_on_hover		|| true;
		options.transition_interval	= options.transition_interval	|| 0;

		output.hide().eq( visible_item ).show();
		output2.hide().eq( visible_item ).show();
		tabs.eq( visible_item ).addClass('current');

		tabs.click(function() {
			if ($(this).hasClass('current')) {
				return false;	
			}

			slide( tabs.index( this) );
		});

		if (options.transition_interval > 0) {
			var timer = setInterval(function () {
				slide();
			}, options.transition_interval);

			if (options.pause_on_hover) {
				tabs.mouseenter(function() {
					clearInterval( timer );

				}).mouseleave(function() {
					clearInterval( timer );
					timer = setInterval(function () {
						slide();
					}, options.transition_interval);
				});
			}
		}
	};
})(jQuery);