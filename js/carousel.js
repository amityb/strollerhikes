// JavaScript Document
jQuery(document).ready(function($) {
	
	$(window).resize(function() {
		$("#location-gallery").trigger("configuration", ["items.visible", getVisibleItems()]);

	});


	/**
	 * Determine how many images to display in carousel based on device/window with
	 * @return {integer / number of items to display in carousel}
	 */
	function getVisibleItems() {

		var viewport_width = document.documentElement.clientWidth;
		var device_width = window.screen.width;

		if (viewport_width < 480 || device_width < 480) {
			return 1;
		}
		else if (viewport_width < 768 || device_width < 768) {
			return 2;
		}
		return 3;
	}

	var visible_items = getVisibleItems();

	$("#location-gallery").carouFredSel({
		items 	:	{
			visible: visible_items,
			minimum: 4
		},
		auto: {
			items	: visible_items,
			duration: 2800,
			easing: "swing",
			delay: 2800
		}
	});
	$("#location-gallery a").fancybox({
		cyclic: 	true,
		afterClose:	function() {
			$("#location-gallery").trigger("play");
		}
	});
	$("#location-gallery a").click(function() {
		$("#location-gallery").trigger("pause");
	});
});