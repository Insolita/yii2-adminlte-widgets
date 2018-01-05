$(function () {
    "use strict";
    var lteBoxOpts = {
        boxSelector: '.box.remember',
        statePrefix:'_state',
        expandState: 'show',
        collapseState: 'hide',
        expandEvent: 'expanded.boxwidget',
        collapseEvent: 'collapsed.boxwidget',
        collapsedClass: 'collapsed-box'
    };
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
        $(this).on(lteBoxOpts.collapseEvent, {state: lteBoxOpts.collapseState}, storeBoxState);
        $(this).on(lteBoxOpts.expandEvent, {state: lteBoxOpts.expandState}, storeBoxState);
    });
});