function updateRightsButton() {
    bRightsReprint || (bRightsCredit = bRightsCommercial = bRightsChange = bRightsLicense = !1);
    bRightsChange || (bRightsLicense = !1);
    bRightsReprint ? ($(".RightsReprint").removeClass("disabled"), $(".RightsReprint input:checkbox").prop("disabled", !1)) : ($(".RightsReprint").addClass("disabled"), $(".RightsReprint input:checkbox").prop("disabled", !0));
    bRightsChange ? ($(".RightsChange").removeClass("disabled"), $(".RightsChange input:checkbox").prop("disabled", !1)) : ($(".RightsChange").addClass("disabled"), $(".RightsChange input:checkbox").prop("disabled", !0));
    $("#RightsReprint").prop("checked", bRightsReprint);
    $("#RightsCredit").prop("checked", bRightsCredit);
    $("#RightsCommercial").prop("checked", bRightsCommercial);
    $("#RightsChange").prop("checked", bRightsChange);
    $("#RightsLicense").prop("checked", bRightsLicense);
    $("#RightsSave").prop("checked", bRightsSave);
    $("#RightsShare").prop("checked", bRightsShare);
    $("#RightsTrace").prop("checked", bRightsTrace);
    setCookie("RightsReprint", bRightsReprint ? 1 : 0);
    setCookie("RightsCredit", bRightsCredit ? 1 : 0);
    setCookie("RightsCommercial", bRightsCommercial ? 1 : 0);
    setCookie("RightsChange", bRightsChange ? 1 : 0);
    setCookie("RightsLicense", bRightsLicense ? 1 : 0);
    setCookie("RightsSave", bRightsSave ? 1 : 0);
    setCookie("RightsShare", bRightsShare ? 1 : 0);
    setCookie("RightsTrace", bRightsTrace ? 1 : 0)
}
function DispTitleCharNum() {
    var a = 50 - $("#TitleEdit").val().length;
    $("#TitleCharNum").html(a)
}
var timerConnectedDelay = null;
function DispDescCharNum() {
    var a = $("#DescriptionEdit").val(),
        b = 1E5 - a.length;
    $("#DescriptionCharNum").html(b);
    timerConnectedDelay && clearTimeout(timerConnectedDelay);
    timerConnectedDelay = setTimeout(function() {
        0 >= a.length ? $("#ConnetNum").html(0) : $.ajax({
            type: "post",
            data: {
                TXT: a
            },
            url: "/f/GetConnectedNum.jsp",
            dataType: "json",
            success: function(a) {
                var b = parseInt($("#ConnetNum").text(), 10),
                    c = a.result;
                $({
                    count: b
                }).animate({
                    count: c
                }, {
                    duration: 1E3,
                    easing: "linear",
                    progress: function() {
                        $("#ConnetNum").text(Math.ceil(this.count))
                    }
                });
                $("#ConnetNum").text(a.result);
                timerConnectedDelay = null
            }
        })
    }, 1E3)
}
function DispDescCharNumComment(a, b) {
    a = 500 - a.value.length;
    $("#DescriptionCharNumComment_" + b).html(a)
}
function DispNovelBodyCharNum() {
    var a = 1E5 - $("#BodyEdit").val().length;
    $("#BodyCharNum").html(a)
}
;
