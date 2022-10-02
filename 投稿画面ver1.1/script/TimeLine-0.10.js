var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.findInternal = function(a, b, c) {
    a instanceof String && (a = String(a));
    for (var d = a.length, e = 0; e < d; e++) {
        var f = a[e];
        if (b.call(c, f, e, a))
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
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function(a, b, c) {
    a != Array.prototype && a != Object.prototype && (a[b] = c.value)
};
$jscomp.getGlobal = function(a) {
    return "undefined" != typeof window && window === a ? a : "undefined" != typeof global && null != global ? global : a
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.polyfill = function(a, b, c, d) {
    if (b) {
        c = $jscomp.global;
        a = a.split(".");
        for (d = 0; d < a.length - 1; d++) {
            var e = a[d];
            e in c || (c[e] = {});
            c = c[e]
        }
        a = a[a.length - 1];
        d = c[a];
        b = b(d);
        b != d && null != b && $jscomp.defineProperty(c, a, {
            configurable: !0,
            writable: !0,
            value: b
        })
    }
};
$jscomp.polyfill("Array.prototype.find", function(a) {
    return a ? a : function(a, c) {
        return $jscomp.findInternal(this, a, c).v
    }
}, "es6", "es3");
var MY_HEART = ["0000000000000000005555000055550005555550055555505555555555555555555555555555555555555555555555555555555555555555555555555555555505555555555555500055555555555500000555555555500000005555555500000000055555500000000000555500000000000005500000000000000000000000"];
function UploadTlHeart(a, b, c, d, e) {
    $(e).addClass("Disable").prop("disabled", !0);
    $("#TL_HEART" + c).prepend($("<img />").addClass("IllustHeartItem").attr("src", "/img/loading_48.gif"));
    $.ajaxSingle({
        type: "post",
        data: {
            AID: a,
            UID: b,
            TID: c,
            CID: d,
            HRT: MY_HEART[0]
        },
        url: "/UploadTlHeartV2.jsp",
        success: function(a) {
            if (a = $($.parseHTML(a)))
                $("#TL_HEART" + c).empty(),
                $("#TL_HEART" + c).append(a),
                $(e).removeClass("Disable").prop("disabled", !1)
        }
    })
}
function DispMessageCharNum(a, b) {
    b = 200 - b.value.length;
    $("#MessageCharNum_" + a).html(b)
}
function ResComment(a, b, c) {
    $("#CommentTo_" + a).show();
    $("#CommentToTxt_" + a).html("> " + c);
    $("#CommentToId_" + a).val(b)
}
function DeleteRes(a) {
    $("#CommentTo_" + a).hide();
    $("#CommentToTxt_" + a).html("");
    $("#CommentToId_" + a).val(0)
}
function UploadTlComment(a, b, c) {
    var d = jQuery.trim($("#MessageTxt_" + b).val()),
        e = $("#CommentToId_" + b).val();
    1 > d.length || $.ajaxSingle({
        type: "post",
        data: {
            UID: a,
            TID: b,
            MSG: d,
            TOD: e
        },
        url: "/UploadTlCommentV.jsp",
        success: function(a) {
            if (a = $($.parseHTML(a)))
                a.find(".CommentItemUserIcon").each(function(a, b) {
                    $(b).attr("href", c + $(b).attr("href"))
                }),
                $("#TL_CMT" + b).append(a),
                $("#MessageTxt_" + b).val("")
        }
    })
}
function IllustDetail(a, b, c, d) {
    a = $("<form/>", {
        action: d + "IllustDetailV.jsp?ID=" + a + "&TD=" + b,
        method: "post",
        target: "_blank"
    });
    0 < c.length && a.append($("<input/>", {
        type: "hidden",
        name: "PAS",
        value: c
    }));
    a.appendTo(document.body);
    a.submit()
}
function CommentDetail(a, b, c, d, e) {
    a = $("<form/>", {
        action: e + "CommentDetailV.jsp?ID=" + a + "&TD=" + b + "&CD=" + c,
        method: "post",
        target: "_blank"
    });
    0 < d.length && a.append($("<input/>", {
        type: "hidden",
        name: "PAS",
        value: d
    }));
    a.appendTo(document.body);
    a.submit()
}
function OnChangePassword(a, b) {
    13 == window.event.keyCode && PostPassword(a, b)
}
function ResizeDesc(a, b) {
    a.resized || (a.resized = !0, $(a).animate({
        height: b
    }, 300), $("#ConnetctInfo").slideDown(300), $(".TagCmdDescDetail").slideDown(300))
}
function OnChangeNovelSeries() {
    var a = parseInt($("#NovelUploadSeries").val(), 10);
    $("#NewSeriesName").val("");
    -1 == a ? $("#NewSeriesName").show() : 0 == a ? $("#NewSeriesName").hide() : ($("#NewSeriesName").hide(), $("#NewSeriesName").val($("#NovelUploadSeries option:selected").text()))
}
function OnCoverFileSelectorChange(a) {
    if (0 < a.files.length) {
        a = a.files[0];
        var b = new FileReader;
        b.readAsDataURL(a);
        b.onload = function() {
            var a = new Image;
            a.src = b.result;
            $(a).addClass("CoverFile");
            $("#EditCoverImage").empty();
            $("#EditCoverImage").append(a);
            $("#ConverFileSelect").hide();
            $("#ConverFileClear").show()
        }
    }
}
function ClearCoverFile() {
    $("#EditCoverImage").empty();
    $("#CoverFileSelector").replaceWith($("#CoverFileSelector").clone(!0));
    $("#ConverFileSelect").show();
    $("#ConverFileClear").hide()
}
;
