var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.findInternal = function(a, c, b) {
    a instanceof String && (a = String(a));
    for (var d = a.length, e = 0; e < d; e++) {
        var f = a[e];
        if (c.call(b, f, e, a))
            return {
                i: e,
                v: f
            }
    }
    return {
        i: -1,
        v: void 0
    }
};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function(a, c, b) {
    a != Array.prototype && a != Object.prototype && (a[c] = b.value)
};
$jscomp.getGlobal = function(a) {
    return "undefined" != typeof window && window === a ? a : "undefined" != typeof global && null != global ? global : a
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.polyfill = function(a, c, b, d) {
    if (c) {
        b = $jscomp.global;
        a = a.split(".");
        for (d = 0; d < a.length - 1; d++) {
            var e = a[d];
            e in b || (b[e] = {});
            b = b[e]
        }
        a = a[a.length - 1];
        d = b[a];
        c = c(d);
        c != d && null != c && $jscomp.defineProperty(b, a, {
            configurable: !0,
            writable: !0,
            value: c
        })
    }
};
$jscomp.polyfill("Array.prototype.find", function(a) {
    return a ? a : function(a, b) {
        return $jscomp.findInternal(this, a, b).v
    }
}, "es6", "es3");
var _load_next = !1,
    _$current_html = null;
function getNextData(a) {
    $("#IllustTimeLine").append($("<div />").addClass("LoadingInfo").append($("<img />").attr("src", "/img/loading.gif")));
    $.ajaxSingle({
        type: "get",
        url: a,
        success: function(c) {
            _$current_html = $($.parseHTML(c));
            var b = _$current_html.find(".TimeLineItem");
            b && ($("#IllustTimeLine").append(b), (b = _$current_html.find(".RelatedContents")) && $("#IllustTimeLine").append(b), _load_next = !1, $(c).find(".TimeLineItem script").each(function() {
                $.globalEval(this.text || this.textContent || this.innerHTML || "")
            }), ga("send", "pageview", a));
            $(".LoadingInfo").remove();
            $(".SideBar").show()
        }
    })
}
function getNextLink() {
    var a = _$current_html.find(".PageBarItem").first().attr("href");
    $(".PageBarItem").remove();
    return a
}
function getScrollBottom() {
    var a = window.document.documentElement;
    return a.scrollHeight - a.clientHeight - (window.document.body.scrollTop || a.scrollTop)
}
$(function() {
    _$current_html = $("html");
    $(window).bind("scroll", function() {
        if (!_load_next && 1E3 > getScrollBottom()) {
            _load_next = !0;
            var a = getNextLink();
            a && getNextData(a)
        }
    })
});
z