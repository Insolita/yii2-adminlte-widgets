$(function () {
    "use strict";
    var lteBoxOpts = {
        boxSelector: '.box.remember',
        statePrefix: '_state',
        expandState: 'show',
        collapseState: 'hide',
        expandEvent: 'expanded.boxwidget',
        collapseEvent: 'collapsed.boxwidget',
        collapsedClass: 'collapsed-box'
    };

    function initOldLteCollapseRemember() {
        $.AdminLTE.boxWidget.activate = function (_box) {
            var _this = this;
            if (!_box) {
                _box = document; // activate all boxes per default
            }
            $(_this.selectors.collapse).each(function () {
                var el = $(this);
                var box = el.parents(".box").first();
                if (box.hasClass('remember')) {
                    var boxState = Cookies.get(box.attr('id') + lteBoxOpts.statePrefix) || lteBoxOpts.expandState;
                    if (boxState === lteBoxOpts.collapseState) {
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
                    var newBoxState = box.hasClass(lteBoxOpts.collapsedClass) ? lteBoxOpts.expandState : lteBoxOpts.collapseState;
                    Cookies.set(box.attr('id') + lteBoxOpts.statePrefix, newBoxState);
                }
                _this.collapse($(this));
            });
            $(_box).on('click', _this.selectors.remove, function (e) {
                e.preventDefault();
                _this.remove($(this));
            });
        };
        $.AdminLTE.boxWidget.activate();
    }

    function initLteCollapseRemember() {
        var storeBoxState = function (e) {
            Cookies.set(e.target.getAttribute('id') + lteBoxOpts.statePrefix, e.data.state);
        };
        $(lteBoxOpts.boxSelector).each(function (e) {
            var boxState = Cookies.get($(this).attr('id') + lteBoxOpts.statePrefix);
            if (boxState === lteBoxOpts.collapseState && !$(this).hasClass(lteBoxOpts.collapsedClass)) {
                $(this).boxWidget('collapse');
            } else if (boxState === lteBoxOpts.expandState && $(this).hasClass(lteBoxOpts.collapsedClass)) {
                $(this).boxWidget('expand');
            }
        });
        $(lteBoxOpts.boxSelector).on(lteBoxOpts.collapseEvent, {state: lteBoxOpts.collapseState}, storeBoxState);
        $(lteBoxOpts.boxSelector).on(lteBoxOpts.expandEvent, {state: lteBoxOpts.expandState}, storeBoxState);
    }

    if ($.AdminLTE !== undefined) {
        initOldLteCollapseRemember();
    } else {
        initLteCollapseRemember();
    }
});