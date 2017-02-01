
$(function() {
	"use strict";
	/*
    * Add collapse and remove events to boxes And save cookies
    */
		//$("[data-widget='collapse']").off("click");
		$("[data-widget='collapse']").each(function() {
			var box = $(this).parents(".box").first();
			//console.log('found '+box.attr('id') + 'cookstate = ' + Cookies.get(box.attr('id')+'_state') );
				if(Cookies.get(box.attr('id')+'_state') == "hide"){
					if (!box.hasClass("collapsed-box")) {
                         box.addClass("collapsed-box");
						 box.slideDown();
					};
			}
		});
		$("[data-widget='collapse']").on('click',function() {
			var box = $(this).parents(".box").first();
			//console.log('clicked '+box.attr('id') + 'cookstate = ' + Cookies.get(box.attr('id')+'_state') );
			if (!box.hasClass("collapsed-box")) {
                Cookies.set(box.attr('id')+'_state',"hide");
			} else {
                Cookies.set(box.attr('id')+'_state',"show");
			}
		});
});