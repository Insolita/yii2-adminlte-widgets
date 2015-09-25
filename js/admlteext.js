
$(function() {
	"use strict";
	/*
    * Add collapse and remove events to boxes And save cookies
    */
		//$("[data-widget='collapse']").off("click");
		$("[data-widget='collapse']").each(function() {
			var box = $(this).parents(".box").first();
			//console.log('found '+box.attr('id') + 'cookstate = ' + $.cookie(box.attr('id')+'_state') );
				if($.cookie(box.attr('id')+'_state') == "hide"){
					if (!box.hasClass("collapsed-box")) {
                         box.addClass("collapsed-box");
						 box.slideDown();
					};
			}
		});
		$("[data-widget='collapse']").on('click',function() {
			var box = $(this).parents(".box").first();
			//console.log('clicked '+box.attr('id') + 'cookstate = ' + $.cookie(box.attr('id')+'_state') );
			if (!box.hasClass("collapsed-box")) {
				$.cookie(box.attr('id')+'_state',"hide");
			} else {
				$.cookie(box.attr('id')+'_state',"show");
			}
		});
});