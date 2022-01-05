$(function() {
    $('.info').balloon({
	  showDuration: "slow",
	  showAnimation: function(d) { this.fadeIn(d); },
	  hideAnimation: function(d) { this.fadeOut(d); },
	  css: {
		  fontWeight: "bolder"
	  }
	});
	
	$.extend( $.tablesorter.ignoreArticles, {
	  "images" : "img, --"
	});
	
	$("#distribution").tablesorter({
		 headers: {
			 1: { sorter: false },
			 6: {
				  sorter: 'ignoreArticles',
				  ignoreArticles : 'images',
				},
			 7: { sorter: false },
		 }
	});
});