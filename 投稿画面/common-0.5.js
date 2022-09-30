function setCookie(a, b, c) {
    c = a + "=" + encodeURIComponent(b) + "; ";
    document.cookie = c + "path=/; expires=Tue, 31-Dec-2030 23:59:59; "
}
function setCookieOneTime(a, b, c) {
    c = a + "=" + encodeURIComponent(b) + "; ";
    document.cookie = c + "path=/; "
}
function setCookie2(a, b, c) {
    dateExp = new Date;
    dateExp.setTime(dateExp.getTime() + 6048E5);
    c = a + "=" + encodeURIComponent(b) + "; ";
    c = c + "path=/; " + ("expires=" + dateExp.toGMTString());
    document.cookie = c
}
function getCookie(a) {
    var b = document.cookie;
    if (!b)
        return "";
    b = b.split(";");
    for (i = 0; i < b.length; i++) {
        var c = b[i].split("=");
        if (!(2 > c.length) && c[0].trim() == a)
            return decodeURIComponent(c[1])
    }
    return ""
}
function deleteCookie(a, b) {
    dTime = new Date;
    dTime.setTime(0);
    b = a + "=" + encodeURIComponent("0") + "; ";
    b = b + "path=/; " + ("expires=" + dTime.toGMTString() + "; ");
    document.cookie = b
}
function ChLang(a) {
    0 < a.length ? setCookie("LANG", a) : deleteCookie("LANG");
    $.ajaxSingle({
        type: "post",
        data: {
            LD: "ja" == a ? 1 : 0
        },
        url: "/UpdateLanguageV.jsp",
        success: function(a) {
            location.reload(!0)
        }
    })
}
var STYLE_PC = 0,
    STYLE_MB = 1;
function CreateTitleUserObj(a, b, c) {
    var d = c == STYLE_MB ? "/s" : "",
        h = $("<div/>").addClass("ContentsListTitleUser").addClass("Solo"),
        l = $("<div/>").addClass("ContentsListTitleUserTable"),
        n = $("<div/>").addClass("ContentsListTitleUserTableImg"),
        k = $("<a/>").addClass("ContentsListTitleUserImgFrame").attr("href", d + "/" + a.user_id + "/").attr("target", "_blank"),
        g = $("<img/>").addClass("ContentsListTitleUserImg").attr("src", a.prf_file);
    k.append(g);
    n.append(k);
    k = $("<div/>").addClass("ContentsListTitleUserTableInfo");
    g = $("<div/>").addClass("ContentsListTitleUserInfoFrame");
    var e = $("<div/>").addClass("ContentsListTitleUserInfo"),
        f = $("<div/>").addClass("ContentsListTitleUserName"),
        m = $("<a/>").attr("href", d + "/" + a.user_id + "/").attr("target", "_blank").html(a.nick_name + ' <span class="ContentsListTitleUserNameId">(ID:' + a.user_id + ")</span>");
    f.append(m);
    e.append(f);
    f = $("<a/>").addClass("BtnBase").addClass("ContentsListTitleUserCmd").addClass("BtnUserId" + a.user_id).attr("href", "javascript:void(0);").html("Link").click(function() {
        UpdateFollowTl(b, a.user_id, this)
    });
    a.following && f.addClass("Selected");
    e.append(f);
    g.append(e);
    e = $("<div/>").addClass("ContentsListTitleUserUrl").attr("id", "ContentsListTitleUserUrl").html(a.url);
    g.append(e);
    if (c == STYLE_PC) {
        c = $("<div/>").addClass("ContentsListTitleUserImgList");
        for (e = 0; e < a.img_list.length; e++)
            f = $("<a/>").addClass("ContentsListTitleUserImgListImgFrame").attr("href", d + "/" + a.user_id + "/").attr("target", "_blank"),
            m = $("<img/>").addClass("ContentsListTitleUserImgListImg").attr("src", a.img_list[e].file_name),
            f.append(m),
            c.append(f);
        g.append(c)
    }
    k.append(g);
    l.append(n);
    l.append(k);
    h.append(l);
    return h
}
function fnWinClose() {
    $.colorbox.close()
}
function DispMsg(a) {
    $("#UploadMsg").html(a);
    $("#UploadMsg").show();
    setTimeout(function() {
        $("#UploadMsg").fadeOut(1E3)
    }, 5E3)
}
function DispMsgStatic(a) {
    $("#UploadMsg").html(a);
    $("#UploadMsg").show()
}
function insertAtCaret(a, b) {
    a.focus();
    if (navigator.userAgent.match(/MSIE/))
        a = document.selection.createRange(),
        a.text = b,
        a.select();
    else {
        var c = a.val(),
            d = a.get(0).selectionStart,
            h = d + b.length;
        a.val(c.substr(0, d) + b + c.substr(d));
        a.get(0).setSelectionRange(h, h)
    }
}
function fixedEncodeURIComponent(a) {
    return encodeURIComponent(a).replace(/[!'()*]/g, function(a) {
        return "%" + a.charCodeAt(0).toString(16)
    })
}
function moveTagSearch(a, b) {
    location.href = b + "SearchIllustByTagV.jsp?KWD=" + fixedEncodeURIComponent(a)
}
function moveMyTagSearch(a, b, c) {
    location.href = c + a + "/" + fixedEncodeURIComponent(b) + "/"
}
jQuery.fn.protectImage = function(a) {
    a = jQuery.extend({
        image: "/img/blank.gif",
        zIndex: 2
    }, a);
    return this.each(function() {
        var b = $(this).position(),
            c = $(this).width(),
            d = $(this).height();
        $("<a />").attr("href", $(this).attr("href")).append($("<img />").attr({
            width: c,
            height: d,
            src: a.image
        }).on("contextmenu", function(a) {
            return !1
        }).on("drag", function(a) {
            return !1
        }).on("dragstart", function(a) {
            return !1
        })).css({
            display: "block",
            top: b.top,
            left: b.left,
            position: "absolute",
            width: a.width ? a.width : c,
            height: d,
            zIndex: a.zIndex
        }).appendTo("body")
    })
};
$(function() {
    jQuery.extend({
        ajaxSingle: function(a) {
            var b = !1;
            return function(a) {
                try {
                    b || (b = !0, a.complete = function() {
                        return function(a, c) {
                            b = !1
                        }
                    }(), $.ajax(a))
                } catch (d) {
                    b = !1
                }
            }
        }()
    });
    $("#InfoNumFrame").click(function(a) {
        $("#InfoBodyFrame").slideToggle(100);
        "block" == $("#SettingMenu").css("display") && $("#SettingMenu").slideUp(100);
        "block" == $("#SafeFilerMenu").css("display") && $("#SafeFilerMenu").slideUp(100);
        a.stopPropagation()
    });
    $("#SettingMenuFrame").click(function(a) {
        $("#SettingMenu").slideToggle(100);
        "block" == $("#InfoBodyFrame").css("display") && $("#InfoBodyFrame").slideUp(100);
        "block" == $("#SafeFilerMenu").css("display") && $("#SafeFilerMenu").slideUp(100);
        a.stopPropagation()
    });
    $("#SafeFilerBtn").click(function(a) {
        $("#SafeFilerMenu").slideToggle(100);
        "block" == $("#InfoBodyFrame").css("display") && $("#InfoBodyFrame").slideUp(100);
        "block" == $("#SettingMenu").css("display") && $("#SettingMenu").slideUp(100);
        a.stopPropagation()
    });
    $(document).click(function() {
        "block" == $("#InfoBodyFrame").css("display") && $("#InfoBodyFrame").slideUp(100);
        "block" == $("#SettingMenu").css("display") && $("#SettingMenu").slideUp(100);
        "block" == $("#SafeFilerMenu").css("display") && $("#SafeFilerMenu").slideUp(100)
    });
    $(".guide")
});
$.ajaxSetup({
    cache: !1
});
