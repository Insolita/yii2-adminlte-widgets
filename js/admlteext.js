
$(function() {
	"use strict";
	/*
    * Add collapse and remove events to boxes And save cookies
    */
		$("[data-widget='collapse']").off("click");
		$("[data-widget='collapse']").click(function() {
			var box = $(this).parents(".box").first();
			//Find the body and the footer
			var bf = box.find(".box-body, .box-footer");
			if (!box.hasClass("collapsed-box")) {
				box.addClass("collapsed-box");
				$.cookie(box.attr('id')+'_state',"hide");
				bf.slideUp();
			} else {
				box.removeClass("collapsed-box");
				$.cookie(box.attr('id')+'_state',"show");
				bf.slideDown();
			}
		});
});