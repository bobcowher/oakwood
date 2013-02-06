/*
 * fadeLinks
 * jquery based script for color fading inline text links 
 * author: Alen Grakalic
 * more info on http://cssglobe.com/
 *
 * Copyright (c) 2008 Alen Grakalic (cssglobe.com)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 */


this.fadeLinks = function() {		
	var selector = ".footer .footer-inner li a"; //modify this line to set the selectors
	var speed = "slow" // adjust the fading speed ("slow", "normal", "fast")
	
	var bgcolor = "#fff"; 	// unfortunately we have to set bg color because of that freakin' IE *!jQuery%#!!?!?%jQuery! 
							//please use the same background color in your links as it is in your document. 
							
	jQuery(selector).each(function(){ 
		jQuery(this).css("position","relative");
		var html = jQuery(this).html();
		jQuery(this).html("<span class=\"one\">"+ html +"</span>");
		jQuery(this).append("<span class=\"two\">"+ html +"</span>");		
		if(jQuery.browser.msie){
			jQuery("span.one",jQuery(this)).css("background",bgcolor);
			jQuery("span.two",jQuery(this)).css("background",bgcolor);	
			jQuery("span.one",jQuery(this)).css("opacity",1);			
		};
		jQuery("span.two",jQuery(this)).css("opacity",0);		
		jQuery("span.two",jQuery(this)).css("position","absolute");		
		jQuery("span.two",jQuery(this)).css("top","0");
		jQuery("span.two",jQuery(this)).css("left","0");		
		jQuery(this).hover(
			function(){
				jQuery("span.one",this).fadeTo(speed, 0);				
				jQuery("span.two",this).fadeTo(speed, 1);
			},
			function(){
				jQuery("span.one",this).fadeTo(speed, 1);	
				jQuery("span.two",this).fadeTo(speed, 0);
			}			
		)
	});
};

jQuery(document).ready(function(){	
	fadeLinks();
});