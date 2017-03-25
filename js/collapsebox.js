$(function() {
	"use strict";

	$.AdminLTE.boxWidget.activate = function (_box) {
		var _this = this;
		if (!_box) {
			_box = document; // activate all boxes per default
		}
		$(_this.selectors.collapse).each(function() {
			var el = $(this);
			var box = el.parents(".box").first();
			if(box.hasClass('remember')) {
				var cookState = Cookies.get(box.attr('id') + '_state')||"show";
				if (cookState === "hide") {
					console.log(el.children(":first").attr('class') + '//'+_this.icons.open+'//'+_this.icons.collapse);
					el.children(":first").removeClass(_this.icons.open)
						.addClass(_this.icons.collapse);
					_this.collapse(el);
				}
			}
		});
		//Listen for collapse event triggers
		$(_box).on('click', _this.selectors.collapse, function (e) {
			e.preventDefault();
			var box = $(this).parents(".box").first();
			if(box.hasClass('remember')){
				if (!box.hasClass("collapsed-box")) {
					Cookies.set(box.attr('id')+'_state',"hide");
				} else {
					Cookies.set(box.attr('id')+'_state',"show");
				}
			}
			_this.collapse($(this));
		});

		//Listen for remove event triggers
		$(_box).on('click', _this.selectors.remove, function (e) {
			e.preventDefault();
			_this.remove($(this));
		});
	};
	$.AdminLTE.boxWidget.activate();
});