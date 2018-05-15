var LteBox = (function (window, $) {
    var boxOptions = {
        boxSelector: '.box.remember',
        statePrefix: '_state',
        expandState: 'show',
        collapseState: 'hide',
        expandEvent: 'expanded.boxwidget',
        collapseEvent: 'collapsed.boxwidget',
        collapsedClass: 'collapsed-box'
    };
    var initOldLteCollapseRemember = function () {
        $.AdminLTE.boxWidget.activate = function (_box) {
            var _this = this;
            if (!_box) {
                _box = document; // activate all boxes per default
            }
            $(_this.selectors.collapse).each(function () {
                var el = $(this);
                var box = el.parents(".box").first();
                if (box.hasClass('remember')) {
                    var boxState = Cookies.get(box.attr('id') + boxOptions.statePrefix) || boxOptions.expandState;
                    if (boxState === boxOptions.collapseState) {
                        el.children(":first").removeClass(_this.icons.open)
                            .addClass(_this.icons.collapse);
                        _this.collapse(el);
                    }
                }
            });
            $(_box).on('click', _this.selectors.collapse, function (e) {
                e.preventDefault();
                var box = $(this).parents(".box").first();
                if (box.hasClass('remember')) {
                    var newBoxState = box.hasClass(boxOptions.collapsedClass) ? boxOptions.expandState : boxOptions.collapseState;
                    Cookies.set(box.attr('id') + boxOptions.statePrefix, newBoxState);
                }
                _this.collapse($(this));
            });
            $(_box).on('click', _this.selectors.remove, function (e) {
                e.preventDefault();
                _this.remove($(this));
            });
        };
        $.AdminLTE.boxWidget.activate();
    };
    var initLteCollapseRemember = function () {
        var storeBoxState = function (e) {
            Cookies.set(e.target.getAttribute('id') + boxOptions.statePrefix, e.data.state);
        };
        var applyBoxState = function(e){
            var boxState = Cookies.get($(this).attr('id') + boxOptions.statePrefix);
            if (boxState === boxOptions.collapseState && !$(this).hasClass(boxOptions.collapsedClass)) {
                $(this).boxWidget('collapse');
            } else if (boxState === boxOptions.expandState && $(this).hasClass(boxOptions.collapsedClass)) {
                $(this).boxWidget('expand');
            }
        };
        $(boxOptions.boxSelector).boxWidget();
        $(boxOptions.boxSelector).each(applyBoxState);
        $(boxOptions.boxSelector).on(boxOptions.collapseEvent, {state: boxOptions.collapseState}, storeBoxState);
        $(boxOptions.boxSelector).on(boxOptions.expandEvent, {state: boxOptions.expandState}, storeBoxState);
    };
    var lteBox = {
        init: function (options) {
            boxOptions = $.extend(boxOptions, options||{});
            ($.AdminLTE !== undefined) ? initOldLteCollapseRemember() : initLteCollapseRemember();
        }
    };
    return lteBox;
})(window, jQuery);

$(window).on('load', function () {
    LteBox.init({});
});