// JavaScript Document
jQuery(document).ready(function($) {
	
	$("#location-gallery").carouFredSel({
		items 	:	{
			visible: 3,
			minimum: 4
		},
		auto: {
			items	: 3,
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