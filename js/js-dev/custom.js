function increaseFontSize() {
    var t = document.getElementsByTagName("body");
    for (i = 0; i < t.length; i++) {
        if (t[i].style.fontSize) var e = parseInt(t[i].style.fontSize.replace("px", ""));
        else var e = 16;
        e != max && (e += 1), t[i].style.fontSize = e + "px"
    }
}

function decreaseFontSize() {
    var t = document.getElementsByTagName("body");
    for (i = 0; i < t.length; i++) {
        if (t[i].style.fontSize) var e = parseInt(t[i].style.fontSize.replace("px", ""));
        else var e = 16;
        e != min && (e -= 1), t[i].style.fontSize = e + "px"
    }
}

function reSetFontSize() {
    var t = document.getElementsByTagName("body");
    for (i = 0; i < t.length; i++) {
        if (t[i].style.fontSize) var e = parseInt(t[i].style.fontSize.replace("px", ""));
        else var e = 16;
        e != reset && (e = 16), t[i].style.fontSize = e + "px"
    }
}


function PrintPage() {
    var t = "PrintPage",
        e = "width=1000,height=600,menubar=yes,scrollbars=yes,location=no,left=100,top=100",
        i = $("body").clone();
    i.find("input[type=text],select,textarea").each(function() {
        var t = $(this).prop("tagName");
        if ("SELECT" == t) var e = $(this).find("option:selected").text();
        else var e = $(this).val();
        $(this).replaceWith("<label>" + e + "</label>")
    }), i.find("a").each(function() {
        var t = $(this).html();
        $(this).replaceWith("<label>" + t + "</label>")
    });
    var n = $("#title").text(),
        a = window.open("", t, e);
    return a.document.open(), a.document.write("<html><head><link href='" + siteUrl + "/css/print.css' rel='stylesheet' media='all'><title></title></head><body>"), a.document.write("<div id='headerprint'><div class='text_logo'><img src='" + siteUrl + "/images/logo.png' alt='OSDA'/></div></div>"), a.document.write("<div class='printpage'><button onclick='window.print();'>Print</button></div>"), a.document.write("<div id='printHeader'>" + n + "</div>"), a.document.write("<div id='printContent'>" + i.html() + "</div>"), a.document.write("</body></html>"), a.document.close(), a.focus(), a
}

function TextCounter(t, e, i) {
    var n = $("#" + t).val(),
        a = n.length;
    if (parseInt(a) > parseInt(i)) {
        var r = n.substr(0, i);
        return $("#" + t).val(r), viewAlert("Entered Text Exceeds '" + i + "' Characters.", t), $("#" + e).text(0), !1
    }
    return $("#" + e).text(parseInt(i) - parseInt(a)), !0
}
var host = window.location.host,
    pathInfo = window.location.pathname,
    FN1 = pathInfo.split("/")[1],
    FN2 = pathInfo.split("/")[2],
    appURL = "http://" + host + "/" + FN1 + "/Application",
    siteUrl = "http://" + host + "/" + FN1;
$(function(t) {
    t('[data-toggle="tooltip"]').tooltip()
});
var min = 13,
    max = 19,
    reset = 16;
setInterval(function() {
    $(".screenreader").each(function(t) {
        $(this).attr("tabindex", t)
    })
}, 3e3);
