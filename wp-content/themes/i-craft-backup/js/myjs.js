   jQuery(document).ready(function() {
	  
	  jQuery(".zimu-list").mouseover(function(){
		  jQuery(this).children("span").addClass("over");
	  }).mouseout(function(){
		  jQuery(this).children("span").removeClass("over");
		})
   });