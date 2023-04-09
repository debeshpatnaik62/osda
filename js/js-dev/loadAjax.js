function wardWrap(s, e) {
    var a = s;
    if (s.length > e) {
        var t = s.substring(0, e),
                r = Number(t.lastIndexOf(" "));
        a = s.substring(0, r) + " ..."
    }
    return a
}

function gotoPage(s, e) {
    $("#" + e).attr("action", s), $("#" + e).submit()
}

function loadCourses(s, e, a, t) {
    var r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadCourses",
            intRecno: a,
            selEligibility: s,
            txtSearchCourse: e,
            intPagesize: t,
            hdnPrevSessionId: r
        },
        success: function (r) {
            var l = r.sectorDtls,
                    i = "",
                    n = r.sectorDtls.length,
                    c = parseInt(a) + parseInt(t);
            if (n > 0) {
                for (var d = 0; n > d; d++) {
                    var o = appURL + "/uploadDocuments/sector/" + l[d].strImage;
                    i += '<div class="coursesbg ' + (d % 2 == 1 ? "pull-right" : "") + '" >', i += '<div class="cimgbox"> <img src="' + o + '" alt="' + l[d].strSecotrName + '" title="' + l[d].strSecotrName + '"/> </div>', i += '<div class="ctext">', i += '<h2 class="screenreader ' + l[d].strClass + '">' + l[d].strSecotrName + "</h2>", i += '<h5 class="screenreader ' + l[d].strDtlClass + '">' + l[d].courseCount + " " + l[d].strCourselbl + "</h5>", i += '<a href="javascript:void(0);" onclick="gotoPage(\'' + siteUrl + "/course-details/" + l[d].strSecotrAlias + "','frmOsda');\" class=\"screenreader btn-blue-sm hvr-rectangle-in " + l[d].strDtlClass + '">' + l[d].strDtlabl + "</a> </div>", i += "</div>", d % 2 == 1 && (i += '<div class="clearfix"></div>')
                }
                a < l[n - 1].totalResultrec && c < l[n - 1].totalResultrec && (i += '<div class="screenreader clear30"></div><center><a href="javascript:loadCourses(' + s + ",'" + e + "'," + c + "," + t + ')" class="screenreader btn-blue hvr-rectangle-in loadmore ' + l[n - 1].strDtlClass + '" title="Load More">' + l[n - 1].strMorelbl + "</a></center> ")
            } else
                i += '<div align="screenreader center">No Course Available.</div>';
            $(".loadmore").hide(), 0 == a ? $("#dispCourses").html(i) : $("#dispCourses").append(i)
        }
    })
}

function DoPaging(s, e) {
    $("#hdn_PageNo").val(s), $("#hdn_RecNo").val(e), $("form").submit()
}

function AlternatePaging() {
    "0" == $("#hdn_IsPaging").val() ? $("#hdn_IsPaging").val("1") : $("#hdn_IsPaging").val("0"), $("form").submit()
}

function fillEligibility(s, e) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillEligibility",
            selval: s,
            hdnPrevSessionId: a
        },
        success: function (s) {
            var a = s.eligibility;
            $("#" + e).html(a)
        }
    })
}

function fillDistricts(s, e) {
    var a = $("#hdnPrevSessionId").val(),
        t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistricts",
            hdnPrevSessionId: a
        },
        success: function(a) {
            var r = a.result,
                l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllDistcls + '">--' + r[l - 1].strAllDistlbl + "--</option>", n = 0; l > n; n++) t = s == r[n].intDistId ? 'selected="selected"' : "", i += '<option value="' + r[n].intDistId + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strDistName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

function changeLanguage(s, e, a, t, r) {
    var l = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "changeLanguage",
            language: s,
            page: e,
            glPage: a,
            plPage: t,
            idPage: r,
            hdnPrevSessionId: l
        },
        success: function (s) {
            window.location.href = siteUrl + "/" + s.result
        }
    })
}

function getHomepageSectors(s) {
    var e = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageSectors",
            hdnPrevSessionId: e
        },
        success: function (e) {
            var t = e.result,
                    r = e.result.length,
                    l = 0,
                    i = $(window).width() <= 700 ? 4 : 9;
            if (r > 0) {
                a += '<div class="item active">', a += ' <div class="row-fluid">';
                for (var n = 0; r > n; n++) {
                    var c = appURL + "/uploadDocuments/sector/" + t[n].strImageFile;
                    if (a += '   <div class="span3"> <a href="' + siteUrl + "/course/" + t[n].strAlias + '" class="thumbnail"> <div class="clsSectorimg"> <img src="' + c + '" alt="' + t[n].strName + '" title="' + t[n].strName + '"/></div>', a += '     <h3 class="screenreader ' + t[n].strClass + '">' + t[n].strName + '<br><small class="screenreader clsHomeCourse ' + t[n].strHeadClass + '">' + t[n].strCourselbl + " : <span class='" + t[n].strNumClass + "'>" + t[n].intCoursecount + "</span></small></h3>", a += "      </a> </div>", (n + 1) % i == 0 && n + 1 != r && (a += " </div>", a += "</div>", a += '<div class="item ">', a += ' <div class="row-fluid">'), (n + 1) % i == 0 || (n + 1) % i != 0 && n + 1 == r) {
                        var d = 0 == l ? "active" : "";
                        $(".homeSector").append('<li data-target="#slider" data-slide-to="' + l + '" class="' + d + '"></li>'), l++
                    }
                }
                a += " </div>", a += "</div>"
            }
            $("#" + s).html(a), r > i ? ($(".carousel-control").show(), $("#slider").carousel({
                interval: 0
            })) : $(".carousel-control").hide()
        }
    })
}

function fillSector(s, e) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillSector",
            selval: s,
            hdnPrevSessionId: a
        },
        success: function (s) {
            var a = s.category;
            $("#" + e).html(a)
        }
    })
}

function fillCourse(s, e, a) {
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillCourse",
            selval: s,
            selSector: a,
            hdnPrevSessionId: t
        },
        success: function (s) {
            var a = s.course;
            $("#" + e).html(a)
        }
    })
}

function getHomepageNews(s) {
    var e = "",
            a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getLatestNews",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var t = a.newsRes,
                    r = "";
            if (t) {
                "" != t.strDesc && null != t.strDesc && (r = wardWrap(t.strDesc, 120));
                var l = appURL + "/uploadDocuments/news/" + t.strImageFile;
                e += '<div class="news-updates posrelative"> <img src="' + l + '" alt="' + t.strHeading + '" title="' + t.strHeading + '"/>', e += '<div class="news-text">', e += '  <h1 class="screenreader ' + t.strHeadClass + '">' + t.strHeading + "</h1>", e += ' <div class="newsblackbg "> <p class="screenreader ' + t.strDescClass + '">' + r + "</p>", e += '  <div class="clearfix"></div>', e += '  <span class="screenreader date-news pull-left ' + t.strHeadClass + '">' + t.dtmNewsDate + "</span> ", e += '  <span class="pull-right noPrint"><a href="' + t.vchSource + '" class="more ' + t.sourcenameCls + '" target="_blank"><i class="fa fa-angle-right "></i><span class="screenreader ' + t.strHeadClass + '"> ' + t.strMore + "</span></a></span></div>", e += "</div>", e += "</div>"
            }
            $("#" + s).html(e)
        }
    })
}



function getHomepageTestimonial(s, e) {
    var a = "",
            t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageTestimonial",
            intPgsize: e,
            hdnPrevSessionId: t
        },
        success: function (e) {
            var t = e.messageRes,
                    r = "",
                    l = e.messageRes.length;
            if (l > 0)
                for (var i = 0; l > i; i++) {
                    var n = appURL + "/uploadDocuments/messageBoard/" + t[i].strImageFile;
                    if ("" != t[i].strDesc && null != t[i].strDesc)
                        var c = wardWrap(t[i].strDesc, 1500);
                    a += '<div class="item ' + (r = 0 == i ? "active" : "") + '">', a += '<div class="quote-container ">', a += '    <div class="portrait octogon"><img src="' + n + '" alt="' + t[i].strNameE + '" title="' + t[i].strNameE + '" /></div>', a += '    <div class="quote">', a += "      <blockquote>", a += '        <p class="screenreader ' + t[i].strDescClass + '">' + c + "</p>", a += '       <cite><span class="screenreader ' + t[i].strClass + '">' + t[i].strName + ', </span><br/><p class="clsDesignation"><span class="screenreader ' + t[i].strDsClass + '">' + t[i].strDesig + '</span><span class="screenreader ' + t[i].strOrgClass + '">, ' + t[i].strOrg + "</span></p></cite>", a += "      </blockquote>", a += "    </div>", a += "  </div>", a += " </div>", $(".homeEmpSpeak").append('<li data-target="#testimonial" data-slide-to="' + i + '" class="' + r + '"></li>')
                }
            $("#" + s).html(a), l > 2 ? ($(".carousel-indicators").show(), $("#testimonial").carousel({
                interval: 1e4
            })) : $(".carousel-indicators").hide()
        }
    })
}

function loadStoriesmobile(s, e, a) {
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadStories",
            intRecno: s,
            intPagesize: e,
            navPage: a
        },
        success: function (a) {
            var t = a.storyDtls,
                    r = "",
                    l = "",
                    i = a.storyDtls.length,
                    n = "",
                    c = parseInt(s) + parseInt(e);
            if (i > 0) {
                for (var d = 0; i > d; d++) {
                    var o = appURL + "/uploadDocuments/successStory/" + t[d].strImage;
                    l = "", n = "", "" != t[d].strDesc && null != t[d].strDesc && (l = wardWrap(t[d].strDesc, 110)), r += '<div class="col-md-6 col-sm-6 col-xs-6 full480">', r += '  <div class="story-box">', r += '      <img src="' + o + '" alt="' + t[d].strNameE + '" title="' + t[d].strNameE + '"/>', r += '      <div class="sstext">', r += '         <a href="' + siteUrl + n + "/my-story-details/" + t[d].strAlias + '" data-toggle="tooltip" title="View Details"><h3 class="screenreader ' + t[d].strClass + '">' + t[d].strName + ' <i class="fa fa-external-link-square" aria-hidden="true"></i></h3></a> ', r += '           <p class="screenreader ' + t[d].strDesClass + '">' + l + "</p>", r += "      </div>", r += "  </div>", r += " </div>", d % 4 == 1 && (r += '<div class="clearfix"></div>')
                }
                s < t[i - 1].totalResultrec && c < t[i - 1].totalResultrec && (r += '<div class="clear50 loadmore"></div><center><a href="javascript:loadStories(' + c + "," + e + ')" class="screenreader btn-blue hvr-rectangle-in loadmore ' + t[i - 1].strHeadClass + '" title="More Story">' + t[i - 1].strMoreHeading + "</a></center> ")
            } else
                r += '<div align="center">No Story Available.</div>';
            $(".loadmore ").hide(), 0 == s ? $("#dispStories").html(r) : $("#dispStories").append(r)
        }
    })
}

function loadStories(s, e, a) {
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadStories",
            intRecno: s,
            intPagesize: e,
            navPage: a,
            hdnPrevSessionId: t
        },
        success: function (s) {
            var e = s.storyDtls,
                    a = "",
                    t = "",
                    r = "",
                    l = "";
            if (e) {
                for (var i = s.storyDtls.length, n = 0; i > n; n++) {
                    var c = appURL + "/uploadDocuments/successStory/" + e[n].strImage;
                    t = "", r = "", l = "", "" != e[n].strSnippet && null != e[n].strSnippet && (r = wardWrap(e[n].strSnippet, 110)), "" != e[n].strDesc && null != e[n].strDesc && (t = wardWrap(e[n].strDesc, 200)), a += '<div class="carousel-feature">', a += '  <a href="' + siteUrl + l + "/my-story-details/" + e[n].strAlias + '"><img class="carousel-image" title="' + e[n].strNameE + '" alt="' + e[n].strNameE + '" src="' + c + '"></a>', a += '  <div class="carousel-caption">', a += '  <p class="screenreader headercaption ' + e[n].strSnippetClass + '">' + r + "</p>", a += '    <p class="screenreader ' + e[n].strDesClass + '">' + t + "</p>", a += '    <a href="' + siteUrl + l + "/my-story-details/" + e[n].strAlias + '"><p class="screenreader clsStorydtl ' + e[n].strHeadClass + '">' + e[n].strHeading + "</p></a>", a += '    <p class="screenreader caption ' + e[n].strClass + '">' + e[n].strName, a += '   <span class="screenreader ' + e[n].strDesigClass + '">' + e[n].strDesignation + "</span>", a += "    </p>", a += " </div>", a += "</div>"
                }
                $(".clsStorynav").show()
            } else
                a += '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '">' + s.noRecord.strNorecordlbl + "</div>", $(".clsStorynav").hide();
            $("#carousel").html(a);
            var d = $("#carousel").featureCarousel({
                movedToCenter: function (s) {
                    s.addClass("clsActiveStory")
                },
                leavingCenter: function (s) {
                    s.removeClass("clsActiveStory")
                }
            });
            $("#but_prev").click(function () {
                d.prev()
            }), $("#but_pause").click(function () {
                d.pause()
            }), $("#but_start").click(function () {
                d.start()
            }), $("#but_next").click(function () {
                d.next()
            })
        }
    })
}

function addQuery1(s, e, a, t, r, l, i) {
    var n = $("#hdnPrevSessionId").val(),
            c = l,
            d = $("#btnQuerySubmit");
    d.html("Please Wait"), $(".queryLoader").show(), $(d).attr("disabled", "true");
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "addQuery1",
            action: s,
            txtQueryName: e,
            txtQueryEmail: a,
            txtQueryPhone: t,
            txtQueryMsg: r,
            recaptcha: c,
            hdnPrevSessionId: n
        },
        success: function (s) {
            var e = s.outMsg,
                    a = s.errFlag;
            viewAlert(e), d.html("reset"), 0 == a && ($("#txtQueryName").val(""), $("#txtQueryEmail").val(""), $("#txtQueryPhone").val(""), $("#txtQueryMsg").val(""), $("#txtCaptchaQry").val(""), $(".queryLoader").hide(), "O" == i ? d.html("&#2856;&#2879;&#2860;&#2887;&#2854;&#2856") : d.html("Submit"), $(d).attr("disabled", "false"));
           
            window.localStorage.setItem('clicks',1);
        }
    })
}

function getOurpridedetails(s, e) {
    var a = $("#hdnPrevSessionId").val();
    $("#ourpridesec").show(), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadInstituteStories",
            intInstituteId: e,
            hdnPrevSessionId: a
        },
        success: function (e) {
            var a = e.storyDtls,
                    t = "",
                    r = "",
                    l = e.storyDtls.length;
            if (l > 0)
                for (var i = 0; l > i; i++) {
                    var n = appURL + "/uploadDocuments/successStory/" + a[i].strImage;
                    r = "", "" != a[i].strDesc && null != a[i].strDesc && (r = wardWrap(a[i].strDesc, 110)), t += " <li>", t += '   <div class="story-box">', t += '     <img src="' + n + '" alt="' + a[i].strNameE + '" title="' + a[i].strNameE + '" />', t += '       <div class="sstext">', t += '        <h3 class="screenreader ' + a[i].strClass + '">' + a[i].strName + "</h3>", t += '          <p class="screenreader ' + a[i].strDesClass + '">' + r + "</p>", t += '           <a href="' + siteUrl + "/my-story-details/" + a[i].strAlias + '" class="screenreader btn-yellow-sm hvr-rectangle-out ' + a[i].strHeadClass + '">' + a[i].strHeading + "</a>", t += "       </div>", t += "   </div>", t += "</li>   "
                }
            else
                $("#ourpridesec").hide(), t += '<div align="center">No Story Available.</div>';
            $("#" + s).html(t), $("#" + s).lightSlider({
                loop: !0,
                useCSS: !0,
                keyPress: !0,
                auto: !0,
                speed: 1500,
                pause: 6e3,
                item: 1,
                onSliderLoad: function () {
                    $("#" + s).removeClass("cS-hidden")
                }
            })
        }
    })
}

function getRecruiterdetails(s, e) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRecruiterdetails",
            intInstituteId: e,
            hdnPrevSessionId: a
        },
        success: function (e) {
            var a = e.recruiterDtls,
                    t = "";
            if (a) {
                var r = e.recruiterDtls.length;
                $("#our-recruiters").show();
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/recruitmentDetails/" + a[l].strImage;
                    t += '<li class="fat-l">', t += '    <a href="' + a[l].strLink + '" title=""><img src="' + i + '" alt="' + a[l].strNameE + '" title="' + a[l].strNameE + '" width="100%"/></a>', t += "</li>"
                }
            } else
                $("#our-recruiters").hide(), t = '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(t), $("#" + s).marquee({
                direction: "horizontal",
                delay: 0,
                timing: 20
            })
        }
    })
}

function getInstTestimonialdetails(s, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $(".ins-testimonials").show(), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageTestimonial",
            intInstituteId: e,
            hdnPrevSessionId: a
        },
        success: function (e) {
            var a = e.messageRes,
                    r = e.messageRes.length;
            if (r > 0) {
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/messageBoard/" + a[l].strImageFile;
                    if ("" != a[l].strDesc && null != a[l].strDesc)
                        var n = wardWrap(a[l].strDesc, 110);
                    t += '<div class="item ' + (0 == l ? "active" : "") + '">', t += '    <div class="ins-testimonials-name">', t += '       <img src="' + i + '" alt="' + a[l].strNameE + '" title="' + a[l].strNameE + '"  width="100%"/>', t += '       <h4> <span class="screenreader ' + a[l].strClass + '">' + a[l].strName + "</span> </br>", t += '       <small class="screenreader ' + a[l].strDsClass + '">' + a[l].strDesig + "</small>", t += "       </h4>", t += "    </div>", t += '    <div class="screenreader ins-testimonials-text ' + a[l].strDescClass + '">' + n + "</div>", t += "</div>"
                }
                t += '<a class="left carousel-control" href="#ins-testimonials" role="button" data-slide="prev">', t += '  <span class="fa fa-angle-left" aria-hidden="true"></span>', t += '  <span class="screenreader sr-only">Previous</span>', t += "</a>", t += '<a class="right carousel-control" href="#ins-testimonials" role="button" data-slide="next">', t += '  <span class="fa fa-angle-right" aria-hidden="true"></span>', t += '  <span class="screenreader sr-only">Next</span>', t += "</a>"
            } else
                $(".ins-testimonials").hide();
            $("#" + s).html(t), r > 1 ? ($(".carousel-control").show(), $("#ins-testimonials").carousel({
                interval: 0
            })) : $(".carousel-control").hide()
        }
    })
}

function fillCategory(s, e, a) {
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getCategory",
            SelVal: s,
            selType: a,
            hdnPrevSessionId: t
        },
        success: function (s) {
            var a = s.category;
            $("#" + e).html(a)
        }
    })
}

function getRightpanelStory(s) {
    var e = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelStory",
            hdnPrevSessionId: e
        },
        success: function (e) {
            var a = e.result,
                    t = "",
                    r = "";
            if (a) {
                var l = appURL + "/uploadDocuments/successStory/" + a.strImageFile;
                r = "", "" != a.strDesc && null != a.strDesc && (r = wardWrap(a.strDesc, 130)), t += '<div class="text bgblue">', t += '    <h3 class="' + a.strHeadClass + '">', t += '      <img src="' + siteUrl + '/images/quoteicon.png" alt="" title="" class="quottop"/> ' + a.strHeading, t += "    </h3>", t += '      <p class="screenreader ' + a.strDesClass + '">' + r + "</p>", t += '     <span class="screenreader sname ' + a.strClass + '">- ' + a.strName + "</span> ", t += '     <div class="clearfix"></div>', t += "</div>", t += '<div class="rightimg">', t += '   <img src="' + l + '" alt="' + a.strNameE + '" title="' + a.strNameE + '" />', t += '   <div class="arrow-down arrow-blue"></div>', t += '   <div class="rightop">', t += "       <center>", t += '           <a href="' + siteUrl + "/my-story-details/" + a.strAlias + '" class="screenreader btn-white hvr-rectangle-out enter ' + a.strHeadClass + '" title="' + a.strMore + '">' + a.strMore + "</a>", t += "       </center>	", t += "   </div>", t += "</div>"
            } else
                t += '<div align="center">No Story Available.</div>';
            $("#" + s).html(t)
        }
    })
}

function getRightpanelBlog(s) {
    var e = $("#hdnPrevSessionId").val(),
            a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelBlog",
            hdnPrevSessionId: e
        },
        success: function (e) {
            var t = e.blogRes,
                    r = "";
            t && ("" != t.strDesc && null != t.strDesc && (r = wardWrap(t.strDesc, 120) + '<br> <a target="_blank" href="' + siteUrl + "/bloginfo/" + t.intBlogId + '" class="screenreader ' + t.strDescClass + '" title="' + t.strMore + '">' + t.strMore + "</a>"), a += '<div class="text bgppl">', a += '   <h3 class="screenreader skill ' + t.strHeadClass + '">' + t.strHeading + "</h3>", a += '   <h4 class="screenreader font-lg ' + t.strClass + '"><a href="' + siteUrl + "/bloginfo/" + t.intBlogId + '" >' + t.strHeadLine + "</a></h4>", a += '   <p class="screenreader ' + t.strDescClass + '">' + r + "</p>", a += '   <div class="clearfix"></div>', a += '   <div class="clearfix"></div>', a += " </div>", a += ' <div class="col-sm-9 purple-blog-right">', a += "   <ul>", a += '     <li class="screenreader ' + t.strHeadClass + '">' + t.strShareOn + ' : <div id="blogshare" class="' + t.strNumLangCls + '"></div></li>', a += '     <div class="clearfix"></div>', a += "   </ul>", a += " </div>  "), $("#" + s).html(a), $("#blogshare").jsSocials({
                url: siteUrl + "/bloginfo/" + t.intBlogId,
                text: t.strSnippet,
                shares: [{
                        share: "twitter",
                        via: "skilledinodisha"
                    }, "facebook", "googleplus", "linkedin", "pinterest", "whatsapp"],
                showLabel: !1,
                showCount: "inside",
                shareIn: "popup"
            })
        }
    })
}

function getRightpanelNews(s) {
    var e = $("#hdnPrevSessionId").val(),
            a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelNews",
            hdnPrevSessionId: e
        },
        success: function (e) {
            var t = e.newsRes;
            if (t) {
                var r = appURL + "/uploadDocuments/news/" + t.strImageFile;
                a += '<div class="text bgblu">', a += '    <h3 class="screenreader skill ' + t.strHeadClass + '">' + t.strHeading + "</h3>", a += '   <p class="screenreader ' + t.strClass + '">' + t.strHeadLine + "</p>", a += ' <p class="screenreader date ' + t.strLangcls + '">' + t.dtmNewsDate + "</p>", "" != t.vchSourcename && (a += ' <p ><span class="screenreader ' + t.strLangcls + '">' + t.strNewsSourcelbl + '</span> : <a href="' + t.vchSource + '" class="screenreader ' + t.vchSourcenameCls + '"  target="_blank">' + t.vchSourcename + "</a></p>"), a += '    <div class="clearfix"></div>', a += "  </div>", a += '  <div class="rightimg"> <img src="' + r + '" alt="' + t.strHeadLineE + '" title="' + t.strHeadLineE + '" />', a += '    <div class="arrow-downn"></div>', a += '    <div class="rightop">', a += "      <center>", a += '        <a href="' + t.vchSource + '" class="screenreader btn-white hvr-rectangle-out enter ' + t.strHeadClass + '" title="Click Now">' + t.strMore + "</a>", a += "      </center>", a += "    </div>", a += "  </div>"
            }
            $("#" + s).html(a)
        }
    })
}

function getRightpanelAllNews(s, e, a, t) {
    parseInt(e) > 0 && (t = 0);
    var r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelAllNews",
            intRecno: e,
            intPagesize: a,
            intNewsId: t,
            hdnPrevSessionId: r
        },
        success: function (r) {
            var l = r.newsRes,
                    i = "",
                    n = "",
                    c = parseInt(e) + parseInt(a);
            if (l) {
                var d = r.newsRes.length;
                i += '<ul class="newsdetail-list">';
                for (var o = 0; d > o; o++) {
                    var u = appURL + "/uploadDocuments/news/" + l[o].strImageFile;
                    n = "", t == l[o].intNewsId && (n = "active"), i += '<li class="' + n + '"><a href="' + siteUrl + "/newsinfo/" + l[o].intNewsId + '">', i += '  <div class="news-img-sm">', i += '     <img src="' + u + '" alt="' + l[o].strHeadLineE + '" title="' + l[o].strHeadLineE + '" />', i += "  </div>", i += '  <div class="news-text-smbox">', i += '     <h4 class="screenreader ' + l[o].strClass + '">' + l[o].strHeadLine + "</h4>", i += '     <h5 class="screenreader "><i class="fa fa-calendar"></i> &nbsp; ' + l[o].dtmNewsDate + "</h5>", i += "  </div>", i += "</a></li>"
                }
                i += "</ul>", e < l[d - 1].totalResultrec && c < l[d - 1].totalResultrec && (i += '<center class="loadmore"><a href="javascript:getRightpanelAllNews(\'' + s + "'," + c + "," + a + "," + t + ');" class="screenreader btn-blue-sm hvr-rectangle-in ' + l[d - 1].strHeadClass + '" title="Load More">' + l[d - 1].strMore + "</a></center> ")
            } else
                i += '<div align="center" class="screenreader noRecord ' + r.noRecord.strLangCls + '">' + r.noRecord.strNorecordlbl + "</div>";
            $(".loadmore ").hide(), 0 == e ? $("#" + s).html(i) : $("#" + s).append(i)
        }
    })
}

function getHomepageVideo(s) {
    var e = "",
            a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageVideo",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var t = a.result;
            if (t)
                for (var r = a.result.length, l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/gallery/" + t[l].strImageFile;
                    if (e += ' <li class="active"><a href="' + siteUrl + "/video-gallery-details/" + t[l].intGalleryId + "/" + t[l].intCategoryId + '">', e += '    <div class="video-img-sm1"> <img src="' + i + '" alt="' + t[l].strCaptionE + '" title="' + t[l].strCaptionE + '"> <i class="fa fa-play-circle galleryvideoicon" aria-hidden="true"></i> </div>', e += '    <div class="video-text-smbox1">', e += '      <h4 class="screenreader ' + t[l].strClass + '">' + t[l].strCaption + "</h4>", e += '      <h5 class="screenreader ' + t[l].strClass + '">' + t[l].strDate + " </h5>", e += "    </div>", e += "    </a>", e += " </li>", 1 == l)
                        break
                }
            else
                e = '<li class="screenreader noRecord ' + a.noRecord.strLangCls + '">' + a.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(e)
        }
    })
}

function getHomepageGallery(s) {
    var e = $("#hdnPrevSessionId").val(),
            a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageGallery",
            hdnPrevSessionId: e
        },
        success: function (e) {
            var t = e.galleryCatresult,
                    r = e.galleryCatresult.length;
            if (r > 0) {
                a += '<div class="slider">', a += "<ul>";
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/home_resize_img/" + t[l].strImageFile;
                    a += '<li class="slide">\n                                         <div class="imgbox">\n                                        <img src="' + i + '" alt="' + t[l].strCatgory + '"/>\n                                        <i class="fa fa-picture-o galleryicon" aria-hidden="true"></i>\n                                        <div class="pcategory-text">\n                                             <h3 class="screenreader ' + t[l].strCatClass + '">' + t[l].strCatgory + '</br><span class="yellowbar"></span></h3>\n                                             <div class="clearfix"></div>\n                                             <p class="screenreader ' + t[l].strCatDescClass + '">' + t[l].strDescription + '</p>\n                                             <div class="clearfix"></div>\n                                                <a href="' + siteUrl + "/photo-gallery-details/" + t[l].intCategoryId + '" class="screenreader ' + t[l].strLblClass + '">' + t[l].strViewlabl + "</a>\n                                           </div>\n                                       </div>\n                                     </li>"
                }
                a += '</ul>\n                            </div>\n                            <div class="switch" id="prev1" title="Previous"><i class="fa fa-arrow-left"></i></div>\n                            <div class="switch" id="next1" title="Next"><i class="fa fa-arrow-right"></i></div>'
            } else
                a += '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(a), $("#photogallery-slide").sliderUi({
                speed: 1e3,
                caption: !0,
                autoPlay: !1,
                controlShow: !1
            })
        }
    })
}

function loadSectors(selNone, e, a, t, r, l, s, i, n) {
    $("#filterSectors").html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var c = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadCourses",
            intRecno: t,
            selEligibility: s,
            txtSearchCourse: e,
            intPagesize: r,
            intDuration: l,
            hdnPrevSessionId: c
        },
        success: function (c) {
            var d = c.sectorDtls,
                    o = "",
                    u = "",
                    v = [];
            o += '<div class="card card-body">';
            if ("" != i && void 0 != i && (v = (i = (i += "").replace(/(^[,\s]+)|([,\s]+$)/g, "")).split(",")), d)
                for (var h = c.sectorDtls.length, p = 0; h > p; p++)
                    u = "", v.length > 0 && (a == d[p].intCategoryId || v.indexOf(d[p].intCategoryId) >= 0) && (u = 'checked="checked"'),
                            o += '<div class="form-check">\n\
				<div class="custom-control custom-checkbox">\n\
                                                 <input id="sector' + d[p].intCategoryId + '" value="' + d[p].intCategoryId + '" type="checkbox" class="custom-control-input sector" ' + u + ' onchange="getValueUsingClass();">\n\
                                                <label for="sector' + d[p].intCategoryId + '" class="custom-control-label screenreader '  + d[p].strClass + '">' + d[p].strSecotrName + '</label>\n\
											</div>\n\
											    <span class="screenreader clsCoursecount clsAllCount ' + d[p].strNumClass + '">' + d[p].courseCount + "</span>", o += " </div>";

            else
                o += '<li class="screenreader noRecord ' + c.noRecord.strLangCls + '">' + c.noRecord.strNorecordlbl + "</li>";
            o += '</div>';
            $("#filterSectors").html(o), 1 == n ? loadFilterCourses(s, i, l, e, a, t, r) : 2 == n && getValueUsingClass(e)
        }
    })
}

/*
 Function to eligibility details
 By  : Ashis kumar Patra
 On  : 24-March-2017
 */
function loadEligibility(fillCtrlId, intDuration, strQualArray)
{
    $("#" + fillCtrlId).html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();
    $.ajax({
        type: "POST",
        url: siteUrl + '/proxy',
        dataType: "json",
        data: {method: "loadEligibility", intDuration: intDuration, hdnPrevSessionId: hdnPrevSessionId},
        success: function (data)
        {
            var tabDiv = '';
            var res = data.eligibility;
            var noneStyle = 'display:none';
            var showStyle = '';
            var aryQualArray = [];
            if (strQualArray && strQualArray != undefined) {
                strQualArray = strQualArray + '';
                strQualArray = strQualArray.replace(/(^[,\s]+)|([,\s]+$)/g, '');
                aryQualArray = strQualArray.split(",");
            }

            if (strQualArray.length > 0) {
                var below10chksts = (aryQualArray.indexOf(res.intBelow10.toString()) >= 0) ? 'checked="checked"' : '';
                var same10chksts = (aryQualArray.indexOf(res.int10th.toString()) >= 0) ? 'checked="checked"' : '';
                var same12chksts = (aryQualArray.indexOf(res.int12th.toString()) >= 0) ? 'checked="checked"' : '';
                var gardchksts = (aryQualArray.indexOf(res.intVal5.toString()) >= 0) ? 'checked="checked"' : '';
                var postgradchksts = (aryQualArray.indexOf(res.intVal6.toString()) >= 0) ? 'checked="checked"' : '';

            } else {
                var below10chksts = '';
                var same10chksts = '';
                var same12chksts = '';
                var gardchksts = '';
                var postgradchksts = '';
            }


            tabDiv += '<div class="card card-body">';
            
            
            
            tabDiv += '<div class="form-check" >\n\
                         <div class="custom-control custom-checkbox">\n\
                        <input id="qual' + res.intBelow10 + '" value="' + res.intBelow10 + '" ' + below10chksts + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n\
                         <label for="qual' + res.intBelow10 + '" class="custom-control-label screenreader ' + res.strCls + '">' + res.strBelow + '</label></div>\n\
                     </div>\n\
                    <div class="form-check" >\n\
            <div class="custom-control custom-checkbox">\n\
                     <input id="qual' + res.int10th + '" value="' + res.int10th + '" ' + same10chksts + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n\
                         <label for="qual' + res.int10th + '" class="custom-control-label screenreader ' + res.strCls + '">' + res.str10th + '</label></div>\n\
                     </div>\n\
\n\                     <div class="form-check" >\n\
         <div class="custom-control custom-checkbox">\n\
                           <input id="qual' + res.int12th + '" value="' + res.int12th + '" ' + same12chksts + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n\
                         <label for="qual' + res.int12th + '" class="custom-control-label screenreader ' + res.strCls + '">' + res.str12th + '</label></div>\n\
                     </div>\n\
                    <div class="form-check" >\n\
        <div class="custom-control custom-checkbox">\n\
                         <input id="qual' + res.intVal5 + '" value="' + res.intVal5 + '" ' + gardchksts + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n\
                         <label for="qual' + res.intVal5 + '" class="custom-control-label screenreader ' + res.strCls + '">' + res.strGrad + '</label></div>\n\
                     </div>\n\
\n\                     <div class="form-check" >\n\
                       <div class="custom-control custom-checkbox">\n\
 <input id="qual' + res.intVal6 + '" value="' + res.intVal6 + '" ' + postgradchksts + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n\
                         <label for="qual' + res.intVal6 + '" class="custom-control-label screenreader ' + res.strCls + '">' + res.strPostGrad + '</label></div>\n\
                     </div></div>';
            $("#" + fillCtrlId).html(tabDiv);
        }
    });

}

/*
 Function to get courses by multiple filters
 By: Ashis kumar Patra
 On: 6-june-2017
 */
function loadFilterCourses(selEligibility, selSectors, selDuration, courseName, sectorId, intRecno, intPagesize)
{
    $("#loading").html('<div class="course-loader"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();


    $.ajax({
        type: "POST",
        url: siteUrl + '/proxy',
        dataType: "json",
        beforeSend: function () {
            $("#loading").html('<center><span><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></span></center>');
        },
        data: {method: "loadFilterCourses", intRecno: intRecno, selEligibility: selEligibility, selSectors: selSectors, selDuration: selDuration, course: courseName, sectorId: sectorId, intPagesize: intPagesize, hdnPrevSessionId: hdnPrevSessionId},
        success: function (data)
        {
            var res = data.sectorDtls;
            var tabDiv = '';
            var singlequote = "'";

            var strBorderClass = '';
            var intnextRecno = parseInt(intRecno) + parseInt(intPagesize);

            if (res)
            {
                var totalRecord = data.sectorDtls.length;
                for (var i = 0; i < totalRecord; i++)
                {
                    if (i == totalRecord) {
                        strBorderClass = 'noborder';
                    }

                    tabDiv += '<div class="coursesportlet ' +strBorderClass + '">\n\
                                             <div class="row">\n\
                                                 <div class="col-sm-10">\n\
                                                     <div class="coursestext ' + res[i].strCoursecls + '">\n\
                                                         <h3 class='+res[i].strCoursecls+'>' + res[i].strCourseName + '<strong class="'+res[i].strClass+'">' + res[i].strSecotrName + '</strong></h3>\n\
                                                         <div class="row">\n\
                                                             <div class="col-sm-4">\n\
                                                                 <span class="' + res[i].strClass + '">' + res[i].strDtlabl + '</span>\n\
                                                                 <p class="' + res[i].strNumclass + '">' + res[i].strDurationLvl + '</p>\n\
                                                             </div>\n\
                                                             <div class="col-sm-4">\n\
                                                            <span class="' + res[i].strClass + '">' + res[i].strEligLvl + '</span>\n\
                                                                 <p class="' + res[i].strClass + '">' + res[i].strQual + '</p>\n\
                                                             </div>\n\
                                                             <div class="col-sm-4">\n\
                                                                 <span class="' + res[i].strClass+ '">' + res[i].strOfferedbylbl + '</span>';
                    if (res[i].intOfferedByITI != null && res[i].intOfferedByITI > 0)
                        tabDiv += '<p class="textpurple ' + res[i].strClass + '"><a href="' + siteUrl + '/institution-profile/' + res[i].courseAlias + '" class="' + res[i].strClass + '" title="' + res[i].strInstituteITI + '" target="_blank" > ' +'<label class="d-inline">'+res[i].intOfferedByITI+'</label>'+ ' ' + res[i].strInstituteITI + '</a></p>';

                    if (res[i].intOfferedByITI != null && res[i].intOfferedByITI > 0 && res[i].intOfferedPIABy > 0)
                        tabDiv += ',';

                    if (res[i].intOfferedByPOL != null && res[i].intOfferedByPOL > 0)
                        tabDiv += '<p class="textpurple ' + res[i].strClass + '"><a href="' + siteUrl + '/politechnic-profile/' + res[i].courseAlias + '" class="' + res[i].strClass + '" title="' + res[i].strInstitutePOL + '" target="_blank" > ' +'<label class="d-inline">'+res[i].intOfferedByPOL+'</label>' + ' ' + res[i].strInstitutePOL + '</a></p>';

                    if (res[i].intOfferedByITI != null && res[i].intOfferedByITI > 0 && res[i].intOfferedByPOL != null && res[i].intOfferedByPOL > 0 && res[i].intOfferedPIABy > 0)
                        tabDiv += ',';


                    if (res[i].intOfferedPIABy != null && res[i].intOfferedPIABy > 0)
                        tabDiv += '<p class="textpurple ' + res[i].strClass + '"><a href="' + siteUrl + '/trainingPartner/' + res[i].courseAlias + '" class="' + res[i].strNumclass  + '" title="' + res[i].strPIALvl + '" target="_blank"> ' + '<label class="d-inline">'+res[i].intOfferedPIABy+'</label>' + ' ' + res[i].strPIALvl + '</a></p>';

                    if (res[i].intOfferedPIABy == 0 && res[i].intOfferedByITI == 0)
                        tabDiv += '<p class="' + res[i].strClass + '">--</p>';
                    tabDiv += '</div>\n\
                                                         </div>\n\
                                                     </div>\n\
                                                 </div>\n\
                                            <div class="col-sm-2">\n\
                                                     <div class="coursesimg">\n\
                                                         <img src="' + appURL + '/uploadDocuments/sector/' + res[i].vchSectorImage + '" alt="' + res[i].strSecotrName + '"  title="' + res[i].strSecotrName + '" />\n\
                                                     </div>\n\
                                                 </div>\n\
                                             </div>\n\
                                             <div class="clearfix"></div>\n\
                                         </div>';

                }
                if (intRecno < res[totalRecord - 1].totalResultrec && intnextRecno < res[totalRecord - 1].totalResultrec)
                    tabDiv += '<div class="loadmore text-center"><a href="javascript:loadFilterCourses(' + singlequote + selEligibility + singlequote + ',' + singlequote + selSectors + singlequote + ',' + singlequote + selDuration + singlequote + ',' + singlequote + singlequote + ',0,' + intnextRecno + ',' + intPagesize + ')" class="screenreader active1 loadmore ' + res[totalRecord - 1].strDtlClass + '" title="Load More">' + res[totalRecord - 1].strMorelbl + '</a></div>';

            } else
                tabDiv += '<div align="center" class="screenreader noRecord ' + data.noRecord.strNoRecordcls + '">' + data.noRecord.strNoRecordlbl + '</div>';
            // alert(res);
            $(".loadmore").hide();
            $("#loading").html('');
            if (intRecno == 0) {
                if (totalRecord > 0)
                    $("#courseresult").html('<span class="screenreader cresultno ' + res[0].strClass + '">' + res[0].strCourseSearchReslbl1 + ' ' + res[0].total + res[0].strCourseSearchReslbl2 + '</span>');
                else
                    $("#courseresult").html('');

                $("#listCourses").html(tabDiv);
            } else {
                $("#listCourses").append(tabDiv);
            }


        }
    });

}

function loadVideoGallery(s, e, a) {
    var t = "",
            r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadVideoGallery",
            albumId: s,
            typeid: a,
            hdnPrevSessionId: r
        },
        success: function (s) {
            var a = s.result;
            if (a) {
                var r = s.result.length;
                for (0 == e && (l = a[0].videourl, t += '<div class="col-lg-8 col-sm-8 ' + a[0].strVideoCls + '">\n                                      <div class="recent-video ">\n                                         <iframe width="100%" class="videoheight" src="' + l + '" frameborder="0" allowfullscreen></iframe>\n                                         <h4 class="screenreader ">' + a[0].strCaption + '</h4>\n                                         <p><span class="screenreader ">' + a[0].strDate + "</span></p>\n                                      </div>\n                                    </div>"), i = 0; r > i; i++)
                    if (e == a[i].intGalleryId) {
                        var l = a[i].videourl;
                        t += '<div class="col-lg-8 col-sm-8">\n                                  <div class="recent-video">\n                                     <iframe width="100%" height="500" src="' + l + '" frameborder="0" allowfullscreen></iframe>\n                                     <h4 class="screenreader ">' + a[i].strCaption + '</h4>\n                                     <p><span class="screenreader ">' + a[i].strDate + "</span></p>\n                                  </div>\n                                </div>"
                    }
                t += ' <div class="clearfix hidden-sm hidden-lg hidden-md "></div> <div class="col-lg-4 col-sm-4">\n                                    <h4 class="screenreader morevideoslist">More Videos</h4>\n                                    <ul class="videolistli">';
                for (var i = 0; r > i; i++) {
                    var n = appURL + "/uploadDocuments/gallery/" + a[i].strImageFile;
                    a[i].intGalleryId != e && (t += '<li><a href="javascript:void(0);" onclick="loadVideoGallery(' + a[i].intCategoryId + "," + a[i].intGalleryId + ',3);" class=""  data-group="set1">\n                                    <figure class="videolist  clsNocaption ' + a[i].strClass + '">\n                                  <img src="' + n + '" alt="' + a[i].strCaption + '" title="' + a[i].strCaption + '"/>\n                                            <i class="fa fa-play-circle galleryvideoicon"></i>\n                                        </figure>\n \n                                        <figcaption class="screenreader ' + a[i].strClass + '">' + a[i].strCaption + '<span class="screenreader ">' + a[i].strDate + "</span>\n                                        </figcaption></a>\n                                        </li>")
                }
                t += "</ul></div>", $("#albumname").addClass(a[0].strClass), $("#albumname").html(a[0].strCatgory + '<small class="screenreader ' + a[0].strVideoCls + '"><span class="' + a[0].strVideoNumCls + '">' + r + "</span> " + a[0].strVideolbl + "</small>"), $("#albumDesc").addClass(a[0].strCatDescClass), $("#albumDesc").html(a[0].strCatgoryDesc)
            } else
                t += '<div align="center" class="screenreader noRecord ' + s.noRecord.strNoRecordcls + '">' + s.noRecord.strNoRecordlbl + "</div>";
            $("#videoContent").html(t)
        }
    })
}

/*
        Function to load Photo Gallery
        By: Ashis kumar Patra
         On: 12-june-2017
        */
        function loadPhotoGallery(albumid,typeid) 
        {
           
            var tabDiv='';
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
             $.ajax({
                  type: "POST",
                  url: siteUrl + '/proxy',
                  dataType: "json",
                  data: {method: "loadVideoGallery",albumId:albumid,typeid:typeid,hdnPrevSessionId:hdnPrevSessionId},
                  success: function (data)
                  {
                       var res                = data.result;  
                   
                     if(res)
                      { var totalRecord = data.result.length; 
                         for (var i=0;i<totalRecord;i++)
                          {
                             tabDiv+='<a href="'+appURL+'/uploadDocuments/gallery/'+res[i].strImageFile+'" class="fancybox" data-fancybox-group="gallery">\n\
                                    <img alt="'+res[i].strCaption+'" src="'+appURL+'/uploadDocuments/gallery/'+res[i].strImageFile+'"/>\n\
                                    </a>';
                          }
                          
                            $('#photoalbumname').addClass(res[0].strClass);
                            $('#photoalbumname').html(''+res[0].strCatgory+'<small class="screenreader '+res[0].strVideoCls+'">'+totalRecord+' '+res[0].strVideolbl+'</small>');

                             $('#albumDesc').addClass(res[0].strCatDescClass);
                            $('#albumDesc').html(res[0].strCatgoryDesc);
                      }else{
                             tabDiv+='<div align="center" class="screenreader noRecord '+data.noRecord.strNoRecordcls+'">'+data.noRecord.strNoRecordlbl+'</div>'; 
                       }
                      
                       
                       $('#mygallery').html(tabDiv);
                       $("#mygallery").justifiedGallery();
                   }
            });
        }

function loadDistwiseInstitute(s, e, a, t, r) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var l = $("#hdnPrevSessionId").val(),
            i = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadDistwiseInstitute",
            intDistrict: e,
            strInstitute: a,
            intCourseId: t,
            intPIAStatus: r,
            hdnPrevSessionId: l
        },
        success: function (e) {
            var l = e.result,
                    n = 0,
                    c = 0,
                    d = "";
            if (l) {
                var o = e.result.length;
                if (t > 0 || null != a && "" != a) {
                    var u = "";
                    $(".dist-block").each(function () {
                        u = $(this).attr("class").replace("active", ""), $(this).attr("class", u)
                    })
                }
                for (var v = 0; o > v; v++) {
                    if (c = l[v].intDistrictid, d = 0 == v ? "show" : "", n != c && v > 0 && (i += "           </ul>", i += "</div>", i += "</div>", i += "</div>"), n != c) {
                        if (t > 0 || null != a && "" != a) {
                            var h = $("#" + c).attr("class") + " active";
                            $("#" + c).attr("class", h)
                        }
                        i += '<div class="panel panel-default">', i += '   <div class="panel-heading">', i += '    <h4 class="panel-title ' + l[v].strClass + '"> ', i += '     <a data-toggle="collapse" data-distid="' + l[v].intDistrictid + '" class="screenreader clsDistMapview" data-parent="#accordion" href="#collapse' + l[v].intDistrictid + '">', i += "     " + l[v].strDistrictname + "</a>", i += "   </h4>", i += " </div>", i += ' <div id="collapse' + l[v].intDistrictid + '" class="panel-collapse collapse ' + d + '">', i += '   <div class="panel-body">', i += '     <ul class="nearestinst"> '
                    }
                    "" != l[v].vchInstituteName ? 1 == r ? (i += "                 <li>", i += '                    <a href="' + siteUrl + "/profile-details/" + l[v].vchInstituteAlias + '" title="' + l[v].vchInstituteName + '" class="screenreader ' + l[v].strInstituteClass + ' "> ' + l[v].vchInstituteName + "</a>", i += '                    <small class="screenreader ' + l[v].txtAddressClass + '">' + l[v].txtAddress + "</small>", i += '          <a href="' + siteUrl + "/profile-details/" + l[v].vchInstituteAlias + '#instCoursesec"  class="screenreader ' + l[v].strLangCls + '" data-id="' + l[v].intInstituteId + '" data-name="' + l[v].vchInstituteName + '">' + l[v].strViewCourselbl + "</a> ", i += "                </li>") : (i += "        <li>", i += '          <span title="' + l[v].vchInstituteName + '" class="screenreader ' + l[v].strInstituteClass + ' font600"> ' + l[v].vchInstituteName + "</span>", i += '          <small class="screenreader ' + l[v].txtAddressClass + '">' + l[v].txtAddress + "</small>", "" != l[v].vchPhoneno && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strPhonelbl + '</span> : <span class="screenreader ' + l[v].strNumLangCls + '">' + l[v].vchPhoneno + "</span></small>"), "--" != l[v].vchEmailId && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strEmaillbl + '</span> : <span ><a href="mailto:' + l[v].vchEmailId + '" target="_top" class="screenReader">' + l[v].vchEmailId + "</a></span></small>"), "" != l[v].strCourseStr && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strCourselbl + '</span> : <span class="screenreader ' + l[v].strLangCls + '">' + l[v].strCourseStr + "</span></small>"), "" != l[v].vchWebsite && (i += '         <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strWebsitelbl + '</span> : <a target="_blank" href="' + l[v].vchWebsite + '">' + l[v].vchWebsite + "</a></small>"), i += '          <a href="javascript:void(0)"  class="screenreader courseClick ' + l[v].strLangCls + '" data-target="#piacourseModal" data-id="' + l[v].intInstituteId + '" data-name="' + (l[v].vchInstituteName) + '">' + l[v].strViewCourselbl + "</a> ", i += "        </li>") : i += '<li class="screenreader noRecord ' + l[v].strLangCls + '">' + l[v].strNorecordlbl + "</li>", n = l[v].intDistrictid
                }
            } else
                i += '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(i), $(".clsDistMapview").on("click", function () {
                var s = "",
                        e = $(this).data("distid");
                $(".dist-block").each(function () {
                    s = $(this).attr("class").replace("active", ""), $(this).attr("class", s)
                });
                var a = $("#" + e).attr("class").replace("active", "") + " active";
                $("#" + e).attr("class", a)
            })
        }
    })
}

function searchbyPincode(s, e) {
    $("#preLoadersearch").html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = "",
            t = "",
            r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "searchbyPincode",
            pincode: s,
            distid: e,
            hdnPrevSessionId: r
        },
        success: function (s) {
            var e = s.result,
                    r = 0,
                    l = "",
                    i = 0,
                    n = 0,
                    c = "",
                    d = "";
            if ($("#dispsearchResult").show(), e) {
                var o = s.result.length;
                $(".dispTabs").show();
                for (var u = 0; o > u; u++) {
                    l = "";
                    var v = $("#" + e[u].intDistrictid).attr("class").replace("active", "") + " active";
                    $("#" + e[u].intDistrictid).attr("class", v), c = 1 == e[u].tinIsPIA ? "profile-details" : "pia-profile", 1 == e[u].tinIsPIA ? (r = siteUrl + "/" + c + "/" + e[u].strInstituteAlias, d = "") : (r = e[u].vchWebsite, d = 'target="_blank"'), l += ' <li data-instid="' + e[u].strInstituteAlias + '">';

                    //   "" == r && 1 != e[u].tinIsPIA || (l += '    <a href="' + r + '" class="screenreader ' + e[u].strInstituteCls + '" ' + d + ">"),

                    if (r != '' || e[u].tinIsPIA == 1)
                        l += '    <a href="' + r + '" class="screenreader ' + e[u].strInstituteCls + ' " ' + d + ">";
                    else
                        l += '    <span class="screenreader ' + e[u].strInstituteCls + ' font600" ' + d + ">";

                    l += "       " + e[u].strInstituteName;
                    if (r == '' || e[u].tinIsPIA != 1)
                        l += "    </span>";

                    l += ' <small class="screenreader ' + e[u].strAddressCls + '">' + e[u].strAddress + "</small>";

                    if (r != '' || e[u].tinIsPIA == 1)
                        l += "    </a>";

                    l += " </li>", 1 == e[u].tinIsPIA ? (a += l, i++) : (t += l, n++)
                }
                $("#searchCount").html(o), "" == a && (a = '<div align="center" class="screenreader noRecord ' + e[0].strLangCls + '" >' + e[0].strNorecordlbl + "</div>"), $("#dispIti").html(a), "" == t && (t = '<div align="center" class="screenreader noRecord ' + e[0].strLangCls + '" >' + e[0].strNorecordlbl + "</div>"), $("#dispPartners").html(t)
            } else
                $("#searchCount").html("0"), a = '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '" >' + s.noRecord.strNorecordlbl + "</div>", t = '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '" >' + s.noRecord.strNorecordlbl + "</div>", $(".dispTabs").hide(), $("#dispIti").html(""), $("#dispPartners").html("");
            $("#govtCount").html(i), $("#tpCount").html(n), $("#preLoadersearch").html(""), $("#seachDiv").removeClass("beforesearch"), $("#btnSearch").html('<i class="fa fa-search"></i>')
        }
    })
}

/*
        Function to fill Districts list.
        By: T Ketaki Debadarshini
        On: 01-July-2017
        */
        function fillDistrictLists(intDistId,fillCtrlId,strSearchtxt,piaStatus,intCourseId)
        {
            
             $("#"+fillCtrlId).html('<div align="center" ><img src="'+siteUrl+'/images/loading-blue.gif" alt="loading" /></div>');
            var activeCls='';
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
             $.ajax({
                  type: "POST",
                  url: siteUrl + '/proxy',
                  dataType: "json",
                  data: {method: "fillDistricts",intDistId:intDistId,strSearchtxt:strSearchtxt,intCourseId:intCourseId,piaStatus:piaStatus,hdnPrevSessionId:hdnPrevSessionId},
                  success: function (data)
                  {
                     var res = data.result;
                      var singlequote = "'"; var instControlid = "listInstitute";
                       var tabDiv='';
                     if(res){
                      var totalRecord = data.result.length;
                        tabDiv += '<div class="card card-body">';
                        for (var i=0;i<totalRecord;i++)
                        {
                           if(intDistId==res[i].intDistId || i==0){
                             activeCls='active';

                             //load the first selected dist institute details
                             //fillDistwiseInstituteLists('dispInstListview',res[i].intDistId,strSearchtxt,piaStatus,intCourseId);
                            } else{
                                activeCls='';
                            }

                         tabDiv += '<div class="form-check">\n\
                            <div class="custom-control custom-checkbox">\n\
                                             <input id="distList_' +res[i].intDistId+ '"  type="checkbox" class="custom-control-input distListChk '+activeCls+' '+res[i].strClass+'"  value= "'+res[i].intDistId+'" onChange="getDistInstitutes('+res[i].instCount+');">\n\
                                            <label for="distList_' +res[i].intDistId+ '" class="custom-control-label screenreader ' +res[i].strClass+ '">'+res[i].strDistName+ '</label>\n\
                                                                                            </div>\n\
                                                                                         <span class="screenreader clsInstcount '+res[i].strNumLangCls+'">('+res[i].instCount+')</span>'; 
                              tabDiv += " </div>";

                        }
                     }else{

                        tabDiv='<li class="screenreader noRecord '+data.noRecord.strLangCls+'">'+data.noRecord.strNorecordlbl+'</li>';
                     }

                      $("#"+fillCtrlId).html(tabDiv);
                  }
             });

        }


 /*
        Function to get distwise institute list view
        By: T Ketaki Debadarshini
        On: 01-July-2017
        */
        function fillDistwiseInstituteLists_bkp(fillCtrlId,intDistId,strSearchtxt,piaStatus,intCourseId)
        { 
             $('.distListChk').attr('checked', false);
             $('#distList_'+intDistId).attr('checked', true);  
             $(".inst-coursename").hide();
             //remove the other active classes
            $("#dispDistrictListview li").each(function(){
                           
                $(this).removeClass('active');
             });
            
             $("#distList_"+intDistId).addClass('active');
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
             
             $("#"+fillCtrlId).html('<div align="center" ><img src="'+siteUrl+'/images/loading-blue.gif" alt="loading" /></div>'); 
             $.ajax({
                  type      : "POST",
                  url       : siteUrl + '/proxy',
                  dataType  : "json",
                  data      : {method: "fillDistwiseInstituteLists",intDistId:intDistId,strSearchtxt:strSearchtxt,piaStatus:piaStatus,intCourseId:intCourseId,hdnPrevSessionId:hdnPrevSessionId},
                  success   : function (data)
                  {
                     var res = data.result;
                      var activeCls='';  var tabDiv='';                     
                     var singlequote = "'"; var courseControlid = "dispCourseListview";
                     
                     if(res){
                         var totalRecord = data.result.length;
                        for (var i=0;i<totalRecord;i++)
                        {                            
                          if(piaStatus==1 || piaStatus==2){
                            tabDiv+=' <li class="'+activeCls+'" id="instList_'+res[i].intInstituteId+'" onclick="fillInstwiseCourseLists('+singlequote+courseControlid+singlequote+','+res[i].intInstituteId+','+intCourseId+');">';
                            tabDiv+='<a href="javascript:void(0)" title="'+res[i].vchInstituteName+'" class="screenreader '+res[i].strInstituteClass+'">'+res[i].vchInstituteName+'</a></br>';
                            tabDiv+='<small class="screenreader '+res[i].txtAddressClass+'">'+res[i].txtAddress+'</small>';
                            tabDiv+='</li>';
                           }else{
                                    
                                    tabDiv+=' <li class="'+activeCls+'" id="instList_'+res[i].intInstituteId+'" onclick="fillInstwiseCourseLists('+singlequote+courseControlid+singlequote+','+res[i].intInstituteId+','+intCourseId+');">';
                                    tabDiv+='<a href="javascript:void(0)" title="'+res[i].vchInstituteName+'" class="screenreader '+res[i].strInstituteClass+'">'+res[i].vchInstituteName+'</a></br>';
                                    tabDiv+='<small class="screenreader '+res[i].txtAddressClass+'">'+res[i].txtAddress+'</small>';
                                     if(res[i].vchPhoneno!='')
                                      tabDiv+='          </br><small><span class="screenreader selectlabelpia '+res[i].strLangCls+'">'+res[i].strPhonelbl+'</span> : <span class="screenreader '+res[i].strLangCls+'">'+res[i].vchPhoneno+'</span></small>';
                                    if(res[i].vchEmailId!='--')
                                        tabDiv+='          </br><small><span class="screenreader selectlabelpia '+res[i].strLangCls+'">'+res[i].strEmaillbl+'</span> : <span ><a href="mailto:'+res[i].vchEmailId+'" target="_top" class="screenReader">'+res[i].vchEmailId+'</a></span></small>';
                                    if(res[i].vchWebsite!='')
                                        tabDiv+='          </br><small><span class="screenreader selectlabelpia '+res[i].strLangCls+'">'+res[i].strWebsitelbl+'</span> : <a target="_blank" href="'+res[i].vchWebsite+'" class="screenreader ">'+res[i].vchWebsite+'</a></small>';  
                                   
                                    tabDiv+='</li>';
                            
                            
                                 }    
            
                        }
                     }else{
                         
                        tabDiv='<li class="screenreader noRecord '+data.noRecord.strLangCls+'">'+data.noRecord.strNorecordlbl+'</li>'; 
                     }
			
                      $("#"+fillCtrlId).html(tabDiv);	
                  }
             });

        }
        
  /*
        Function to get distwise institute list view
        By: T Ketaki Debadarshini
        On: 01-July-2017
        */
        function fillDistwiseInstituteLists(fillCtrlId,intDistId,strSearchtxt,piaStatus,intCourseId)
        { 
            
             $(".inst-coursename").hide();
             //remove the other active classes
           
             var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
             
             $("#"+fillCtrlId).html('<div align="center" ><img src="'+siteUrl+'/images/loading-blue.gif" alt="loading" /></div>'); 
             $.ajax({
                  type      : "POST",
                  url       : siteUrl + '/proxy',
                  dataType  : "json",
                  data      : {method: "fillDistwiseInstituteLists",intDistIdS:intDistId,strSearchtxt:strSearchtxt,piaStatus:piaStatus,intCourseId:intCourseId,hdnPrevSessionId:hdnPrevSessionId},
                  success   : function (data)
                  {
                     var res = data.result;
                      var activeCls='';  var tabDiv='';                     
                     var singlequote = "'"; var courseControlid = "dispCourseListview";
                     
                     if(res){
                         var totalRecord = data.result.length;
                        for (var i=0;i<totalRecord;i++)
                        {
                             tabDiv+=  '<div class="coursesportlet" id="instList_'+res[i].intInstituteId+'">\n\
                                <div class="row">';
                          if(piaStatus==1 || piaStatus==2 ){
                              
                                  if(res[i].vchImage!=''){
                                    tabDiv+= ' <div class="col-sm-3">\n\
                                        <div class="coursesimg">\n\
                                            <img src="'+res[i].vchImage+'" alt="'+res[i].vchInstituteName+'"/>\n\
                                        </div>\n\
                                    </div>';
                                  }
                                    tabDiv+='<div class="col-sm-9">\n\
                                        <div class="coursestext">\n\
                                            <h3 class="screenreader '+res[i].strInstituteClass+'">'+res[i].vchInstituteName+'</h3>\n\
                                            <p class="screenreader '+res[i].txtAddressClass+'">'+res[i].txtAddress+'</p>';
                                            tabDiv+='<div class="insbtn '+res[i].strOdiaCls+'"><a href="'+siteUrl+'/profile-details/'+res[i].vchInstituteAlias+'#instCoursesec">'+res[i].strAvailCourselbl+'</a></div> <div class="insbtn"><a href="'+siteUrl+'/profile-details/'+res[i].vchInstituteAlias+'" class="'+res[i].strOdiaCls+'">'+res[i].strInstitutelbl+'</a></div> \n\
                                        </div>\n\
                                    </div>';
                              }else{
                                  
                                tabDiv+='<div class="col-sm-9">\n\
                                        <div class="coursestext">\n\
                                            <h3 class="screenreader '+res[i].strInstituteClass+'">'+res[i].vchInstituteName+'</h3>\n\
                                            <span class="screenreader '+res[i].txtAddressClass+'">'+res[i].txtAddress+'</span>';
                                   if(res[i].vchPhoneno!='')
                                      tabDiv+='         <span class="screenreader selectlabelpia '+res[i].strOdiaCls+'">'+res[i].strPhonelbl+' : '+res[i].vchPhoneno+'</span>';
                                    if(res[i].vchEmailId!='--')
                                         tabDiv+='         <span class="screenreader selectlabelpia '+res[i].strOdiaCls+'">'+res[i].strEmaillbl+' : <a href="mailto:' + res[i].vchEmailId + '" target="_top" class="screenReader">' + res[i].vchEmailId + '</a></span>';
                                    if(res[i].vchWebsite!='')
                                        tabDiv+='          <span class="screenreader selectlabelpia '+res[i].strOdiaCls+'">'+res[i].strWebsitelbl+' : <a target="_blank" href="'+res[i].vchWebsite+'" class="screenreader ">'+res[i].vchWebsite+'</a></span>';
                                    
                                            tabDiv+='<div class="insbtn"><a href="javascript:void(0)"  class="screenreader courseClick ' + res[i].strOdiaCls + '" data-target="#piacourseModal" data-id="' + res[i].intInstituteId + '" data-name="' + res[i].vchInstituteName + '">'+res[i].strAvailCourselbl+'</a> \n\
                                        </div>\n\
                                    </div></div>'; 
                                  
                              }
                                  
                                tabDiv+='</div>\n\
                                <div class="clearfix"></div>\n\
                            </div>';
                            
                                 }    
            
                        }
                     else{
                         
                        tabDiv='<li class="screenreader noRecord '+data.noRecord.strLangCls+'">'+data.noRecord.strNorecordlbl+'</li>'; 
                     }
			
                      $("#"+fillCtrlId).html(tabDiv);	
                  }
             });

        }



function fillInstwiseCourseLists(s, e, a) {
    $(".inst-coursename").show(), $("#dispInstListview li").each(function () {
        $(this).removeClass("active")
    }), $("#instList_" + e).addClass("active");
    var t = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>'), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillInstwiseCourseLists",
            intInstituteId: e,
            intCourseId: a,
            hdnPrevSessionId: t
        },
        success: function (e) {
            var a = e.result,
                    t = "";
            if (a)
                for (var r = e.result.length, l = 0; r > l; l++)
                    t += ' <li class="screenreader  ' + a[l].strCourseClass + '">', t += a[l].strCoursename + "</br>", t += ' <small ><span class="screenreader ' + a[l].strDtlClass + '">' + a[l].strDtlabl + " : " + a[l].strDuration + " <br> " + a[l].strEligLvl + ' : </span><span class="screenreader ' + a[l].strQualClass + '">' + a[l].strQual + "</span></small>", t += " </li>";
            else
                t = '<li class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(t)
        }
    })
}

function fillDistrictDataLists(s, e, a) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistricts",
            distVal: e,
            hdnPrevSessionId: t
        },
        success: function (t) {
            var r = t.result,
                    l = "'",
                    i = "";
            if (r) {
                for (var n = t.result.length, c = 0; n > c; c++)
                    a > 0 && a == r[c].intDistId ? ($("#txtDistName").val(r[c].strDistName), i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#txtDistName-hidden" + l + ").val(" + r[c].intDistId + ");$(" + l + ".resultList" + l + ").hide();$(" + l + "#txtDistName" + l + ").val(" + l + r[c].strDistName + l + ');">' + r[c].strDistName + "</div>") : i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#txtDistName-hidden" + l + ").val(" + r[c].intDistId + ");$(" + l + ".resultList" + l + ").hide();$(" + l + "#txtDistName" + l + ").val(" + l + r[c].strDistName + l + ');">' + r[c].strDistName + "</div>";
                $("#" + s).html(i), 0 == a && "" != e ? $("#" + s).show() : $("#" + s).hide()
            } else
                $("#" + s).hide(), $("#txtDistName-hidden").val(0)
        }
    })
}

function loadInstituteCourses(s, e, a) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillInstwiseCourseLists",
            intInstituteId: e,
            hdnPrevSessionId: t
        },
        success: function (e) {
            var t = e.result,
                    r = "";
            if (t) {
                r += '<table class="table table-striped">\n                                    <thead>\n                                       <tr>\n                                        <td class="screenreader text-white bgcyan ' + t[0].strLangClass + '">' + t[0].strCourselbl + '</td>\n                                        <td class="screenreader bgblue text-white ' + t[0].strLangClass + '">' + t[0].strDtlabl + '</td>\n                                        <td class="screenreader text-white bgpurple ' + t[0].strLangClass + '">' + t[0].strEligLvl + "</td>\n                                      </tr>\n                                    </thead> <tbody>";
                for (var l = e.result.length, i = 0; l > i; i++)
                    r += '<tr>\n                                        <td scope="row" class="screenreader ' + t[i].strCourseClass + '">' + t[i].strCoursename + '</td>\n                                        <td class="screenreader ' + t[i].strDtlClass + '">' + t[i].strDuration + '</td>\n                                        <td class="screenreader ' + t[i].strQualClass + '">' + t[i].strQual + "</td>\n                                     </tr>";
                r += "</tbody>\n                                    </table>"
            } else
                r = '<div class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            0 == a && $("#piacourseModal").modal(), $("#" + s).html(r)
        }
    })
}

/*
 Function to fill Course list.
 By      : T Ketaki Debadarshini
 On      : 11-Aug-2017
 */
function fillCourseDataLists(fillCtrlId, courseVal, selVal)
{
    $("#" + fillCtrlId).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();
    $.ajax({
        type: "POST",
        url: siteUrl + '/proxy',
        dataType: "json",
        data: {method: "fillCourse", courseVal: courseVal, hdnPrevSessionId: hdnPrevSessionId},
        success: function (data)
        {
            var res = data.result;
            var qt = "'";
            var tabDiv = '';
            if (res.length>0) {
                var totalRecord = data.result.length;
                for (var i = 0; i < totalRecord; i++)
                {

                    if (selVal > 0 && selVal == res[i].intCourseId) {
                        $("#txtCourse").val(res[i].strCourseName);

                        tabDiv += '<div class="screenreader resultList ' + res[i].strClass + '" onclick="$(' + qt + '#hidCourseId' + qt + ').val(' + res[i].intCourseId + ');$(' + qt + '.resultList' + qt + ').hide();$(\'#' + fillCtrlId + '\').hide();$(' + qt + '#txtCourse' + qt + ').val(' + qt + res[i].strCourseName + qt + ');">' + res[i].strCourseName + '</div>';

                    } else {
                        tabDiv += '<div class="screenreader resultList ' + res[i].strClass + '" onclick="$(' + qt + '#hidCourseId' + qt + ').val(' + res[i].intCourseId + ');$(' + qt + '.resultList' + qt + ').hide();$(\'#' + fillCtrlId + '\').hide();$(' + qt + '#txtCourse' + qt + ').val(' + qt + res[i].strCourseName + qt + ');">' + res[i].strCourseName + '</div>';

                    }

                }
                $("#" + fillCtrlId).html(tabDiv);
                $("#hidCourseId").val(0);

                if (selVal == 0 && courseVal != '')
                    $("#" + fillCtrlId).show();
                else
                    $("#" + fillCtrlId).hide();
            } else {
                $("#" + fillCtrlId).hide();
                $("#hidCourseId").val(0);
            }


        }
    });

}

function storageAvailable(s) {
    try {
        var e = window[s],
                a = "__storage_test__";
        return e.setItem(a, a), e.removeItem(a), !0
    } catch (s) {
        return s instanceof DOMException && (22 === s.code || 1014 === s.code || "QuotaExceededError" === s.name || "NS_ERROR_DOM_QUOTA_REACHED" === s.name) && 0 !== e.length
    }
}

function setSearchcriterias() {
    storageAvailable("sessionStorage")
}

function uniques(s) {
    for (var e = [], a = 0, t = s.length; t > a; a++)
        -1 === e.indexOf(s[a]) && "" !== s[a] && e.push(s[a]);
    return e
}

function setCookie(s, e, a) {
    removeCookie(s);
    var t = new Date;
    t.setTime(t.getTime() + 60 * a * 60 * 1e3);
    var r = "expires=" + t.toGMTString();
    document.cookie = s + "=" + e + "; " + r
}

function getCookie(s) {
    for (var e = s + "=", a = document.cookie.split(";"), t = 0; t < a.length; t++) {
        for (var r = a[t];
                " " == r.charAt(0); )
            r = r.substring(1);
        if (-1 != r.indexOf(e))
            return r.substring(e.length, r.length)
    }
    return ""
}

function removeCookie(s) {
    document.cookie = s + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC"
}

function getFacebooklatestfeed(s) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" title="loading" /></div>');
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getFacebooklatestfeed"
        },
        success: function (t) {
            var r = t.result;
            //console.log(r);
            var i = "";
            if (r) {
                i += ' <div class="fbprofile">';
                i += '       <img src="' + r.fb_page_photo + '" alt="SkilledinOdisha" title="SkilledinOdisha" class="img-responsive"/>';
                i += '      <div class="fbtxt">';
                i += '         <a href="' + r.fb_page_link + '" target="_blank" title="' + r.fb_from_name + '">' + r.fb_from_name + '</a><small>' + r.fbDate + '</small>';
                i += '     </div>';
                i += ' </div>';
                if (r.fb_post_photo != '' && r.fb_post_photo != undefined && r.fb_post_photo != null) {

                    if (r.fb_page_photo != '' && r.fb_page_photo != undefined && r.fb_page_photo != null)
                        i += '<a href="' + r.fb_post_permalink_url + '" target="_blank" title="SkilledinOdisha">';
                    i += ' <img src="' + r.fb_post_photo + '" alt="SkilledinOdisha"  title="SkilledinOdisha" class="img-responsive" />';
                    if (r.fb_page_photo != '' && r.fb_page_photo != undefined && r.fb_page_photo != null)
                        i += '</a>';
                }
                if (r.fb_post_link != '' && r.fb_post_link != undefined && r.fb_post_link != null)
                    i += '<a href="' + r.fb_post_permalink_url + '" target="_blank" title="SkilledinOdisha">';
                i += ' <p>' + r.fb_text + '</p>';
                if (r.fb_post_link != '' && r.fb_post_link != undefined && r.fb_post_link != null)
                    i += '</a>';
                i += ' <div class="fbaction noPrint"><a href="' + r.fb_post_permalink_url + '" target="_blank" title="like"><i class="fa fa-thumbs-o-up"></i> ' + r.fb_post_likes + '</a></div>';
                i += '<div class="fbaction noPrint"><a href="' + r.fb_post_permalink_url + '" target="_blank" title="Comment"><i class="fa fa-comment"></i> ' + r.fb_post_comments + '</a></div>';
                //  i+='<div class="fbaction"><a href="'+r.fb_post_permalink_url+'" title="Share"><i class="fa fa-share"></i> Share</a></div>';

                i += '<div class="clear15"></div>';
                i += '<span class="noPrint"><a href="' + r.fb_page_link + '" target="_blank" title="Find us on Facebook" class="btn btn-default btn-block">Find us on Facebook </a></span>';
            } else {
                i = '<div class="screenreader noRecord ' + t.noRecord.strLangCls + '">' + t.noRecord.strNorecordlbl + "</div>";
            }

            $("#" + s).html(i);
        }
    })
}

function fillIndiaStates(s, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillIndiaStates",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var r = a.result,
                    l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++)
                    t = s == r[n].intStateId ? 'selected="selected"' : "", i += '<option value="' + r[n].intStateId + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strStateName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

function fillIndiaDistricts(s, intStateId, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillIndiaDistricts",
            hdnPrevSessionId: a,
            intStateId: intStateId
        },
        success: function (a) {
            var r = a.result,
                    l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++)
                    t = s == r[n].intDistId ? 'selected="selected"' : "", i += '<option value="' + r[n].intDistId + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strDistName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}



function fillQualification(s, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillQualification",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var r = a.result,
                    l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++)
                    t = s == r[n].intQualifyValue ? 'selected="selected"' : "", i += '<option value="' + r[n].intQualifyValue + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strQualification, i += "</option>";
            $("#" + e).html(i)
        }
    })
}


function uploadFileToTemp(forFileName, filename, hdnFilename, fileType, loadingId, fileSize, errMsgSize, mbKbType, imageId, topFlag, conformImg) {
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();
     // if (!IsCheckFile(filename, 'Invalid File Type', fileType)) {
     //     $("#" + hdnFilename).val('');
     //     return false;
     // }
     // if (!chkFileSize(filename, fileSize, errMsgSize, mbKbType)) {
     //     $("#" + hdnFilename).val('');
     //     return false;
     // }

    $("#" + loadingId).show();
    var hdnVal = $("#" + hdnFilename).val();

    $("#btnSubmitSkill").attr('disable', true);

    $.ajaxFileUpload({
        url: siteUrl + '/proxy',
        secureuri: false,
        fileElementId: filename,
        dataType: 'json',
        data: {
            method: 'uploadToTemp',
            filename: filename,
            fName: forFileName,
            hdnVal: hdnVal,
            hdnPrevSessionId: hdnPrevSessionId
        },
        success: function (data) {

            // console.log(data)
            if (data.status == '0') {

                if (topFlag == 2) {
                    top.$("#" + hdnFilename).val(data.savedFileName);
                    top.$("#" + conformImg).show();
                } else {
                    $("#" + hdnFilename).val(data.savedFileName);
                    $("#" + conformImg).show();
                }

                if (imageId != '') {
                    if (topFlag == 2)
                        top.$("#" + imageId).attr('src', data.filePath + data.savedFileName);
                    else
                        $("#" + imageId).attr('src', data.filePath + data.savedFileName);
                }
            } else {
                $("#" + hdnFilename).val('');
                $("#" + imageId).prop('src', siteUrl+"/images/demo-profile.png");
                viewAlert(data.msg);
                $("#" + loadingId).hide();
                return false;
            }
            $("#" + loadingId).hide();
            $("#btnSubmitSkill").attr('disable', false);
        },
        error: function (data, status, e) {
            console.log(data+'===='+e);
            alert(e);

        }
    })
    return false;
}

function loadVenueDetails() {
    var a = $("#hdnPrevSessionId").val(),
            strAckNo = $("#txtAckNo").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadVenueDetails",
            hdnPrevSessionId: a,
            strAckNo: strAckNo
        },
        success: function (a) {
            var res = a.result;
            var tabDiv = '';
            var prevAckno = '';
            var prevMobno = '';
            if (a.result) {

                var l = a.result.length;
                for (var i = 0; i < l; i++) {

                    if (i == 0 || (prevAckno != res[i].strAckNo) || (prevMobno != res[i].strMobileNo)) {
                        tabDiv += '<div class="clear30"></div><h5 class="cyan"> <span class="screenreader">' + res[i].strName + ' (' + res[i].strAckNo + ')</span><small>Email : ' + res[i].strMailId + ', Mobile No : ' + res[i].strMobileNo + '</small></h5>';
                    }

                    tabDiv += '<ul class="courseul">';
                    tabDiv += '   <li>';
                    tabDiv += '   <span class="screenreader greysm display-block " tabindex="93">Skill</span>';
                    tabDiv += '       <span class="screenreader " > <span class="">' + res[i].strSkill + '</span></span>';
                    tabDiv += '   </li>';
                    tabDiv += '    <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="95">Date & Time</span>';
                    tabDiv += '       <span class="screenreader " >' + res[i].strExamdate + ' ,' + res[i].strExamtime + '</span>';
                    tabDiv += '   </li>';
                    tabDiv += '   <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="97">Venue</span>';

                    tabDiv += '       <span class="screenreader " >';
                    tabDiv += '          ' + res[i].strVenueAddress;
                    tabDiv += '       </span> ';
                    tabDiv += '   </li> ';
                    tabDiv += '</ul>';

                    if (i != 0)
                        tabDiv += '<div class="clearfix"></div>';
                    prevAckno = res[i].strAckNo;
                    prevMobno = res[i].strMobileNo;
                }

            } else {
                tabDiv = '<div class="screenreader noRecord ' + a.noRecord.strLangCls + '">' + a.noRecord.strNorecordlbl + '</div>';
            }

            $("#dispVenueRes").html(tabDiv);
        }
    })
}

function getEmployerSpeak(ctrlId) {
    var e = "";
     var addses = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getEmployerSpeak",
            hdnPrevSessionId: addses
        },
        success: function (data) {
            var res = data.empRes;
              var  r = "";
            if (res) {
               if(res.strDesc!='' && res.strDesc!=null)
                 var desc  = res.strDesc;
                var image = appURL + "/uploadDocuments/messageBoard/" + res.strImageFile;
                
                 r+='\n\
                <div class="imgparents"><img class="img-responsive" src="'+image+'" alt=""> </div>\n\
                \n\
                <div class="card-body">\n\
                <p class="card-text"><small class="text-muted '+res.readMoreLblCls+'"><i class="icon-RoleModel"></i> '+res.strEmpSpeakLevel+'</small> </p>\n\
\n\<h3 class="'+res.strClass+'">'+res.strName+'</h3><footer class="blockquote-footer '+res.strDesigClass+'">'+res.strDesig+'</footer>\n\
                <p class="card-text '+res.strDescClass+'">'+desc+'</p>\n\
\n\
                       <a href="javascript:void(0);" onClick="goToEmpSpeak('+res.intemployerId+');" class="purplebtn hvr-grow '+res.readMoreLblCls+'">'+res.readMoreLbl+'<i class="fa fa-chevron-right"></i> </a></div>';
                
                
             }
            $("#" + ctrlId).html(r);
        }
    })
}

function getSuccessStories(ctrlId) {
    var e = "";
     var addses = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageStory",
            hdnPrevSessionId: addses
        },
        success: function (data) {
            var res = data.successStory;
              var  r = "";
            if (res) {
               if(res.strDesc!='' && res.strDesc!=null)
                 var desc  = res.strDesc;
                var image = appURL + "/uploadDocuments/ThumbImage/Stories/" + res.strImageFile;
                
                 r+='<div class="imgparents"><img class="img-responsive" src="'+image+'" alt=""> </div>\n\
                <div class="card-body">\n\
                <p class="card-text"><small class="text-muted '+res.langCls+'"><i class="icon-successstory"></i> '+res.strHeading+'</small> </p>\n\
 <h3 class="'+res.langCls+'">'+res.strName+'</h3><footer class="blockquote-footer '+res.strDesigClass+'">'+res.strDesig+'</footer>\n\
                <p class="card-text mrgn90 '+res.strDesClass+'">'+desc+'</p>\n\
\n\<a href="'+siteUrl+'/success-stories-details/'+res.strAlias+'" class="purplebtn hvr-grow '+res.langCls+'">'+res.readMoreLbl+'<i class="fa fa-chevron-right"></i> </a></div>';
                
             }
            $("#" + ctrlId).html(r);
        }
    })
}

/*
 Function to Get home page Gallery.
 By: Ashis kumar Patra
 On: 29-Dec-2018
 */


function getHomeGallery(ctrlId) {
    var e = "";
     var addses = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageGallery",
            hdnPrevSessionId: addses
        },
        success: function (data) {
            var res = data.galleryCat;
              var  r = "";
            if (res) {
               if(res.strDesc!='' && res.strDesc!=null)
                 var desc  = res.strDesc;
                var image = res.strImageFile;
                
                 r+='<div class="imgparents"><img class="img-responsive" src="'+image+'" alt=""> </div>\n\
                <div class="card-body">\n\
                <p class="card-text"><small class="text-muted '+res.strHeadClass+'"><i class="icon-PhotoEssay"></i> '+res.strHeading+'</small> </p>\n\
 <h3 class="'+res.strHeadClass+'">'+res.txtName+'</h3>\n\
                <p class="card-text mrgn90 '+res.strDescClass+'">'+desc+'</p>\n\
\n\<a href="'+siteUrl+'/gallery-details/'+res.intCategoryId+'" class="purplebtn hvr-grow '+res.strHeadClass+'">'+res.strViewAlbumlbl+'<i class="fa fa-chevron-right"></i> </a></div>';
                
             }
            $("#" + ctrlId).html(r);
        }
    })
}

/*
 Function to Get home page Biswa Bijayee.
 By: Ashis kumar Patra
 On: 29-Dec-2018
 */

function getHomepageBlog(ctrlId) {
    var e = "",
            a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getLatestBlog",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var res = a.blogRes,
                    r = "";
            if (res) {
               if(res.strDesc!='' && res.strDesc!=null)
                 var desc  = wardWrap(res.strDesc,100);
             if(typeof(desc)=='undefined'){
                 desc='';
             }
                var image = res.strImageFile;
                
                 r+='<div class="imgparents"><img class="img-responsive" src="'+image+'" alt=""> </div>\n\
                <div class="card-body innews">\n\
<p class="card-text"><small class="text-muted '+res.strHeadClass+'"><i class="icon-BlogPost"></i>&nbsp;'+res.strHeading+'</small> </p>\n\
                <h4 class="odia">'+res.strHeadline+'</h4>\n\
                <p class="card-text mrgn90 odia">'+desc+'</p>\n\
\n\<a href="'+siteUrl+'/biswabijayee/'+res.intNewsId+'" class="purplebtn hvr-grow '+res.strHeadClass+'">'+res.readMoreLbl+'<i class="fa fa-chevron-right"></i> </a></div>';
                
             }
            $("#" + ctrlId).html(r);
          
        }
    })
}

/*
 Function to Get home page Focus Details.
 By: Ashis kumar Patra
 On: 29-Dec-2018
 */

function getInFocusDetails(ctrlId,focusId) {
    var e = "";
     $("#"+ctrlId).html('<div class="course-loader"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomeFocusDetails",
            focusId:focusId,
            hdnPrevSessionId: a
        },
        success: function (a) {
            var res = a.FocusDetail,
                    r = "";
            if (res) {
               if(res.strDesc!='' && res.strDesc!=null)
                 var desc  =res.strDesc ;
             
                var image = res.strImageFile;
                
               r+='<div class="modal-dialog modal-lg">\n\
        <div class="modal-content">\n\
            <div class="modal-header">\n\
                <h4 class="modal-title '+res.txtTitleCls+'">'+res.txtTitle+'</h4>\n\
                <button type="button" class="close" data-dismiss="modal">&times;</button>\n\
            </div>\n\
            <div class="modal-body">\n\
                <div class="homecard">\n\
                    <div class="listimg"> <img src="'+image+'" alt="'+res.txtTitle+'"> </div>\n\
                    <div class="homebody">\n\
                        <h5 class="mt-0 '+res.txtTitleCls+'">'+res.txtName+'</h5>\n\
                        <small class="text-muted '+res.txtNamecls+'">'+res.txtTitle+'</small> </div>\n\
                    <div class="clearfix"></div>\n\
                    <p>'+desc+'</p>\n\
                </div>\n\
            </div>\n\
        </div>\n\
    </div>';   
             }
            $("#" + ctrlId).html(r);
            $
          
        }
    })
}


function fillBlocks(s, intDistId, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillBlocks",
            hdnPrevSessionId: a,
            intDistId: intDistId
        },
        success: function (a) {
            var r = a.result,
                    l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++)
                    t = s == r[n].intBlockId ? 'selected="selected"' : "", i += '<option value="' + r[n].intBlockId + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strBlockName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

/*
 Function to fill Skill Institutes list.
 By      : Ashis kumar Patra
 On      : 04-March-2019
 */
function fillSkillInstitutes(fillCtrlId, instituteVal, selVal,hiddenId,txtFieldId,QualifyId)
{
    $("#" + fillCtrlId).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();
    $.ajax({
        type: "POST",
        url: siteUrl + '/proxy',
        dataType: "json",
        data: {method: "fillSkillInstitute", instituteName: instituteVal,qualId:QualifyId, hdnPrevSessionId: hdnPrevSessionId,type:'cssSelect'},
        success: function (data)
        {
            var res = data.result;
            var count=(data.result !=null || data.result!='')?res.length:0;
            var qt = "'";
            var tabDiv = '';
            if (count>0) {
                var totalRecord = data.result.length;
                for (var i = 0; i < totalRecord; i++)
                {

                    if (selVal > 0 && selVal == res[i].intInsId) {
                        $("#txtAcademicInstitute").val(res[i].strInsName);

                        tabDiv += '<div class="screenreader resultList ' + res[i].strClass + '" onclick="$(' + qt + '#'+hiddenId + qt + ').val(' + res[i].intInsId + ');$(' + qt + '.resultList' + qt + ').hide();$(\'#' + fillCtrlId + '\').hide();$(' + qt + '#'+txtFieldId+ qt + ').val(' + qt + res[i].strInsName + qt + ');">' + res[i].strInsName + '</div>';

                    } else {
                        tabDiv += '<div class="screenreader resultList ' + res[i].strClass + '" onclick="$(' + qt + '#'+hiddenId + qt + ').val(' + res[i].intInsId + ');$(' + qt + '.resultList' + qt + ').hide();$(\'#' + fillCtrlId + '\').hide();$(' + qt + '#'+txtFieldId + qt + ').val(' + qt + res[i].strInsName + qt + ');">' + res[i].strInsName + '</div>';

                    }

                }
                $("#" + fillCtrlId).html(tabDiv);
                $("#"+hiddenId).val(0);

                if (selVal == 0 && instituteVal != ''){
                    $("#" + fillCtrlId).show();}
                else{
                    $("#" + fillCtrlId).hide();
                }
            } else {
                $("#" + fillCtrlId).hide();
                $("#"+hiddenId).val(0);
            }


        }
    });

}

/*
 Function to fill Skill competition Qualifications mapped to institutes.
 By      : Ashis kumar Patra
 On      : 13-March-2019
 */

function fillSkillQualification(s, e) {
    var a = $("#hdnPrevSessionId").val(),
            t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillSkillQualification",
            hdnPrevSessionId: a
        },
        success: function (a) {
            var r = a.result,
                    l = a.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++)
                    t = s == r[n].intQualifyValue ? 'selected="selected"' : "", i += '<option value="' + r[n].intQualifyValue + '" ' + t + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strQualification, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

/*
 Function to fill Popular Web Pages.
 By      : Ashis kumar Patra
 On      : 13-March-2019
 */

function loadPopularPages() {
       var t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadPopularPages"
        },
        success: function (a) {
            var r = a.PagesHTML;
            if(r!='' && r!=null){
              
            $("#popularPages").html(r);
        }}
    })
}
   