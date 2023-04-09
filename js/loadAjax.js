function wardWrap(s, e) {
    var t = s;
    if (s.length > e) {
        var a = s.substring(0, e),
            r = Number(a.lastIndexOf(" "));
        t = s.substring(0, r) + " ..."
    }
    return t
}

function gotoPage(s, e) {
    $("#" + e).attr("action", s), $("#" + e).submit()
}

function loadCourses(s, e, t, a) {
    var r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadCourses",
            intRecno: t,
            selEligibility: s,
            txtSearchCourse: e,
            intPagesize: a,
            hdnPrevSessionId: r
        },
        success: function(r) {
            var l = r.sectorDtls,
                i = "",
                n = r.sectorDtls.length,
                c = parseInt(t) + parseInt(a);
            if (n > 0) {
                for (var o = 0; n > o; o++) i += '<div class="coursesbg ' + (o % 2 == 1 ? "pull-right" : "") + '" >', i += '<div class="cimgbox"> <img src="' + appURL + "/uploadDocuments/sector/" + l[o].strImage + '" alt="' + l[o].strSecotrName + '" title="' + l[o].strSecotrName + '"/> </div>', i += '<div class="ctext">', i += '<h2 class="screenreader ' + l[o].strClass + '">' + l[o].strSecotrName + "</h2>", i += '<h5 class="screenreader ' + l[o].strDtlClass + '">' + l[o].courseCount + " " + l[o].strCourselbl + "</h5>", i += '<a href="javascript:void(0);" onclick="gotoPage(\'' + siteUrl + "/course-details/" + l[o].strSecotrAlias + "','frmOsda');\" class=\"screenreader btn-blue-sm hvr-rectangle-in " + l[o].strDtlClass + '">' + l[o].strDtlabl + "</a> </div>", i += "</div>", o % 2 == 1 && (i += '<div class="clearfix"></div>');
                t < l[n - 1].totalResultrec && c < l[n - 1].totalResultrec && (i += '<div class="screenreader clear30"></div><center><a href="javascript:loadCourses(' + s + ",'" + e + "'," + c + "," + a + ')" class="screenreader btn-blue hvr-rectangle-in loadmore ' + l[n - 1].strDtlClass + '" title="Load More">' + l[n - 1].strMorelbl + "</a></center> ")
            } else i += '<div align="screenreader center">No Course Available.</div>';
            $(".loadmore").hide(), 0 == t ? $("#dispCourses").html(i) : $("#dispCourses").append(i)
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
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillEligibility",
            selval: s,
            hdnPrevSessionId: t
        },
        success: function(s) {
            var t = s.eligibility;
            $("#" + e).html(t)
        }
    })
}

function fillDistricts(s, e) {
    var t = $("#hdnPrevSessionId").val(),
        a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistricts",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var r = t.result,
                l = t.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllDistcls + '">--' + r[l - 1].strAllDistlbl + "--</option>", n = 0; l > n; n++) a = s == r[n].intDistId ? 'selected="selected"' : "", i += '<option value="' + r[n].intDistId + '" ' + a + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strDistName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

/*function changeLanguage(s, e, t, a, r) {
    var l = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "changeLanguage",
            language: s,
            page: e,
            glPage: t,
            plPage: a,
            idPage: r,
            isPaging: k,
            intPgno: s,
            intRecno: c,
            hdnPrevSessionId: l
        },
        success: function(s) {
            window.location.href = siteUrl + "/" + s.result
        }
    })
}*/

 function changeLanguage(language,page,glPage,plPage,idPage,isPaging,intPgno,intRecno)
        { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
           $.ajax({
                type    : "POST",
                url     : siteUrl+'/proxy',         
                dataType: "json",
                data    : {method:'changeLanguage',language:language,page:page,glPage:glPage,plPage:plPage,idPage:idPage,isPaging:isPaging,intPgno:intPgno,intRecno:intRecno,hdnPrevSessionId:hdnPrevSessionId},
                success: function(data) {
                    
                        window.location.href = siteUrl+'/'+data.result;
                    }
        }); 
        }

function getHomepageSectors(s) {
    var e = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageSectors",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var a = e.result,
                r = e.result.length,
                l = 0,
                i = $(window).width() <= 700 ? 4 : 9;
            if (r > 0) {
                t += '<div class="item active">', t += ' <div class="row-fluid">';
                for (var n = 0; r > n; n++) {
                    var c = appURL + "/uploadDocuments/sector/" + a[n].strImageFile;
                    if (t += '   <div class="span3"> <a href="' + siteUrl + "/course/" + a[n].strAlias + '" class="thumbnail"> <div class="clsSectorimg"> <img src="' + c + '" alt="' + a[n].strName + '" title="' + a[n].strName + '"/></div>', t += '     <h3 class="screenreader ' + a[n].strClass + '">' + a[n].strName + '<br><small class="screenreader clsHomeCourse ' + a[n].strHeadClass + '">' + a[n].strCourselbl + " : <span class='" + a[n].strNumClass + "'>" + a[n].intCoursecount + "</span></small></h3>", t += "      </a> </div>", (n + 1) % i == 0 && n + 1 != r && (t += " </div>", t += "</div>", t += '<div class="item ">', t += ' <div class="row-fluid">'), (n + 1) % i == 0 || (n + 1) % i != 0 && n + 1 == r) {
                        var o = 0 == l ? "active" : "";
                        $(".homeSector").append('<li data-target="#slider" data-slide-to="' + l + '" class="' + o + '"></li>'), l++
                    }
                }
                t += " </div>", t += "</div>"
            }
            $("#" + s).html(t), r > i ? ($(".carousel-control").show(), $("#slider").carousel({
                interval: 0
            })) : $(".carousel-control").hide()
        }
    })
}

function fillSector(s, e) {
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillSector",
            selval: s,
            hdnPrevSessionId: t
        },
        success: function(s) {
            var t = s.category;
            $("#" + e).html(t)
        }
    })
}

function fillCourse(s, e, t) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillCourse",
            selval: s,
            selSector: t,
            hdnPrevSessionId: a
        },
        success: function(s) {
            var t = s.course;
            $("#" + e).html(t)
        }
    })
}

function getHomepageNews(s) {
    var e = "",
        t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getLatestNews",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var a = t.newsRes,
                r = "";
            if (a) {
                "" != a.strDesc && null != a.strDesc && (r = wardWrap(a.strDesc, 120));
                var l = appURL + "/uploadDocuments/news/" + a.strImageFile;
                e += '<div class="news-updates posrelative"> <img src="' + l + '" alt="' + a.strHeading + '" title="' + a.strHeading + '"/>', e += '<div class="news-text">', e += '  <h1 class="screenreader ' + a.strHeadClass + '">' + a.strHeading + "</h1>", e += ' <div class="newsblackbg "> <p class="screenreader ' + a.strDescClass + '">' + r + "</p>", e += '  <div class="clearfix"></div>', e += '  <span class="screenreader date-news pull-left ' + a.strHeadClass + '">' + a.dtmNewsDate + "</span> ", e += '  <span class="pull-right noPrint"><a href="' + a.vchSource + '" class="more ' + a.sourcenameCls + '" target="_blank"><i class="fa fa-angle-right "></i><span class="screenreader ' + a.strHeadClass + '"> ' + a.strMore + "</span></a></span></div>", e += "</div>", e += "</div>"
            }
            $("#" + s).html(e)
        }
    })
}

function getHomepageTestimonial(s, e) {
    var t = "",
        a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageTestimonial",
            intPgsize: e,
            hdnPrevSessionId: a
        },
        success: function(e) {
            var a = e.messageRes,
                r = "",
                l = e.messageRes.length;
            if (l > 0)
                for (var i = 0; l > i; i++) {
                    var n = appURL + "/uploadDocuments/messageBoard/" + a[i].strImageFile;
                    if ("" != a[i].strDesc && null != a[i].strDesc) var c = wardWrap(a[i].strDesc, 1500);
                    t += '<div class="item ' + (r = 0 == i ? "active" : "") + '">', t += '<div class="quote-container ">', t += '    <div class="portrait octogon"><img src="' + n + '" alt="' + a[i].strNameE + '" title="' + a[i].strNameE + '" /></div>', t += '    <div class="quote">', t += "      <blockquote>", t += '        <p class="screenreader ' + a[i].strDescClass + '">' + c + "</p>", t += '       <cite><span class="screenreader ' + a[i].strClass + '">' + a[i].strName + ', </span><br/><p class="clsDesignation"><span class="screenreader ' + a[i].strDsClass + '">' + a[i].strDesig + '</span><span class="screenreader ' + a[i].strOrgClass + '">, ' + a[i].strOrg + "</span></p></cite>", t += "      </blockquote>", t += "    </div>", t += "  </div>", t += " </div>", $(".homeEmpSpeak").append('<li data-target="#testimonial" data-slide-to="' + i + '" class="' + r + '"></li>')
                }
            $("#" + s).html(t), l > 2 ? ($(".carousel-indicators").show(), $("#testimonial").carousel({
                interval: 1e4
            })) : $(".carousel-indicators").hide()
        }
    })
}

function loadStoriesmobile(s, e, t) {
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadStories",
            intRecno: s,
            intPagesize: e,
            navPage: t
        },
        success: function(t) {
            var a = t.storyDtls,
                r = "",
                l = "",
                i = t.storyDtls.length,
                n = "",
                c = parseInt(s) + parseInt(e);
            if (i > 0) {
                for (var o = 0; i > o; o++) {
                    var d = appURL + "/uploadDocuments/successStory/" + a[o].strImage;
                    l = "", n = "", "" != a[o].strDesc && null != a[o].strDesc && (l = wardWrap(a[o].strDesc, 110)), r += '<div class="col-md-6 col-sm-6 col-xs-6 full480">', r += '  <div class="story-box">', r += '      <img src="' + d + '" alt="' + a[o].strNameE + '" title="' + a[o].strNameE + '"/>', r += '      <div class="sstext">', r += '         <a href="' + siteUrl + n + "/my-story-details/" + a[o].strAlias + '" data-toggle="tooltip" title="View Details"><h3 class="screenreader ' + a[o].strClass + '">' + a[o].strName + ' <i class="fa fa-external-link-square" aria-hidden="true"></i></h3></a> ', r += '           <p class="screenreader ' + a[o].strDesClass + '">' + l + "</p>", r += "      </div>", r += "  </div>", r += " </div>", o % 4 == 1 && (r += '<div class="clearfix"></div>')
                }
                s < a[i - 1].totalResultrec && c < a[i - 1].totalResultrec && (r += '<div class="clear50 loadmore"></div><center><a href="javascript:loadStories(' + c + "," + e + ')" class="screenreader btn-blue hvr-rectangle-in loadmore ' + a[i - 1].strHeadClass + '" title="More Story">' + a[i - 1].strMoreHeading + "</a></center> ")
            } else r += '<div align="center">No Story Available.</div>';
            $(".loadmore ").hide(), 0 == s ? $("#dispStories").html(r) : $("#dispStories").append(r)
        }
    })
}

function loadStories(s, e, t) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadStories",
            intRecno: s,
            intPagesize: e,
            navPage: t,
            hdnPrevSessionId: a
        },
        success: function(s) {
            var e = s.storyDtls,
                t = "",
                a = "",
                r = "",
                l = "";
            if (e) {
                for (var i = s.storyDtls.length, n = 0; i > n; n++) {
                    var c = appURL + "/uploadDocuments/successStory/" + e[n].strImage;
                    a = "", r = "", l = "", "" != e[n].strSnippet && null != e[n].strSnippet && (r = wardWrap(e[n].strSnippet, 110)), "" != e[n].strDesc && null != e[n].strDesc && (a = wardWrap(e[n].strDesc, 200)), t += '<div class="carousel-feature">', t += '  <a href="' + siteUrl + l + "/my-story-details/" + e[n].strAlias + '"><img class="carousel-image" title="' + e[n].strNameE + '" alt="' + e[n].strNameE + '" src="' + c + '"></a>', t += '  <div class="carousel-caption">', t += '  <p class="screenreader headercaption ' + e[n].strSnippetClass + '">' + r + "</p>", t += '    <p class="screenreader ' + e[n].strDesClass + '">' + a + "</p>", t += '    <a href="' + siteUrl + l + "/my-story-details/" + e[n].strAlias + '"><p class="screenreader clsStorydtl ' + e[n].strHeadClass + '">' + e[n].strHeading + "</p></a>", t += '    <p class="screenreader caption ' + e[n].strClass + '">' + e[n].strName, t += '   <span class="screenreader ' + e[n].strDesigClass + '">' + e[n].strDesignation + "</span>", t += "    </p>", t += " </div>", t += "</div>"
                }
                $(".clsStorynav").show()
            } else t += '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '">' + s.noRecord.strNorecordlbl + "</div>", $(".clsStorynav").hide();
            $("#carousel").html(t);
            var o = $("#carousel").featureCarousel({
                movedToCenter: function(s) {
                    s.addClass("clsActiveStory")
                },
                leavingCenter: function(s) {
                    s.removeClass("clsActiveStory")
                }
            });
            $("#but_prev").click(function() {
                o.prev()
            }), $("#but_pause").click(function() {
                o.pause()
            }), $("#but_start").click(function() {
                o.start()
            }), $("#but_next").click(function() {
                o.next()
            })
        }
    })
}

function addQuery1(s, e, t, a, r, l, i) {
    var n = $("#hdnPrevSessionId").val(),
        c = l,
        o = $("#btnQuerySubmit");
    o.html("Please Wait"), $(".queryLoader").show(), $(o).attr("disabled", "true"), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "addQuery1",
            action: s,
            txtQueryName: e,
            txtQueryEmail: t,
            txtQueryPhone: a,
            txtQueryMsg: r,
            recaptcha: c,
            hdnPrevSessionId: n
        },
        success: function(s) {
            var e = s.outMsg,
                t = s.errFlag;
            viewAlert(e), o.html("reset"), 0 == t && ($("#txtQueryName").val(""), $("#txtQueryEmail").val(""), $("#txtQueryPhone").val(""), $("#txtQueryMsg").val(""), $("#txtCaptchaQry").val(""), $(".queryLoader").hide(), "O" == i ? o.html("&#2856;&#2879;&#2860;&#2887;&#2854;&#2856") : o.html("Submit"), $(o).attr("disabled", "false")), window.localStorage.setItem("clicks", 1);
            generateQueryCaptcha();
        }
    })
}

function getOurpridedetails(s, e) {
    var t = $("#hdnPrevSessionId").val();
    $("#ourpridesec").show(), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadInstituteStories",
            intInstituteId: e,
            hdnPrevSessionId: t
        },
        success: function(e) {
            var t = e.storyDtls,
                a = "",
                r = "",
                l = e.storyDtls.length;
            if (l > 0)
                for (var i = 0; l > i; i++) {
                    var n = appURL + "/uploadDocuments/successStory/" + t[i].strImage;
                    r = "", "" != t[i].strDesc && null != t[i].strDesc && (r = wardWrap(t[i].strDesc, 110)), a += " <li>", a += '   <div class="story-box">', a += '     <img src="' + n + '" alt="' + t[i].strNameE + '" title="' + t[i].strNameE + '" />', a += '       <div class="sstext">', a += '        <h3 class="screenreader ' + t[i].strClass + '">' + t[i].strName + "</h3>", a += '          <p class="screenreader ' + t[i].strDesClass + '">' + r + "</p>", a += '           <a href="' + siteUrl + "/my-story-details/" + t[i].strAlias + '" class="screenreader btn-yellow-sm hvr-rectangle-out ' + t[i].strHeadClass + '">' + t[i].strHeading + "</a>", a += "       </div>", a += "   </div>", a += "</li>   "
                } else $("#ourpridesec").hide(), a += '<div align="center">No Story Available.</div>';
            $("#" + s).html(a), $("#" + s).lightSlider({
                loop: !0,
                useCSS: !0,
                keyPress: !0,
                auto: !0,
                speed: 1500,
                pause: 6e3,
                item: 1,
                onSliderLoad: function() {
                    $("#" + s).removeClass("cS-hidden")
                }
            })
        }
    })
}

function getRecruiterdetails(s, e) {
    var t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRecruiterdetails",
            intInstituteId: e,
            hdnPrevSessionId: t
        },
        success: function(e) {
            var t = e.recruiterDtls,
                a = "";
            if (t) {
                var r = e.recruiterDtls.length;
                $("#our-recruiters").show();
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/recruitmentDetails/" + t[l].strImage;
                    a += '<li class="fat-l">', a += '    <a href="' + t[l].strLink + '" title=""><img src="' + i + '" alt="' + t[l].strNameE + '" title="' + t[l].strNameE + '" width="100%"/></a>', a += "</li>"
                }
            } else $("#our-recruiters").hide(), a = '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(a), $("#" + s).marquee({
                direction: "horizontal",
                delay: 0,
                timing: 20
            })
        }
    })
}

function getInstTestimonialdetails(s, e) {
    var t = $("#hdnPrevSessionId").val(),
        a = "";
    $(".ins-testimonials").show(), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageTestimonial",
            intInstituteId: e,
            hdnPrevSessionId: t
        },
        success: function(e) {
            var t = e.messageRes,
                r = e.messageRes.length;
            if (r > 0) {
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/messageBoard/" + t[l].strImageFile;
                    if ("" != t[l].strDesc && null != t[l].strDesc) var n = wardWrap(t[l].strDesc, 110);
                    a += '<div class="item ' + (0 == l ? "active" : "") + '">', a += '    <div class="ins-testimonials-name">', a += '       <img src="' + i + '" alt="' + t[l].strNameE + '" title="' + t[l].strNameE + '"  width="100%"/>', a += '       <h4> <span class="screenreader ' + t[l].strClass + '">' + t[l].strName + "</span> </br>", a += '       <small class="screenreader ' + t[l].strDsClass + '">' + t[l].strDesig + "</small>", a += "       </h4>", a += "    </div>", a += '    <div class="screenreader ins-testimonials-text ' + t[l].strDescClass + '">' + n + "</div>", a += "</div>"
                }
                a += '<a class="left carousel-control" href="#ins-testimonials" role="button" data-slide="prev">', a += '  <span class="fa fa-angle-left" aria-hidden="true"></span>', a += '  <span class="screenreader sr-only">Previous</span>', a += "</a>", a += '<a class="right carousel-control" href="#ins-testimonials" role="button" data-slide="next">', a += '  <span class="fa fa-angle-right" aria-hidden="true"></span>', a += '  <span class="screenreader sr-only">Next</span>', a += "</a>"
            } else $(".ins-testimonials").hide();
            $("#" + s).html(a), r > 1 ? ($(".carousel-control").show(), $("#ins-testimonials").carousel({
                interval: 0
            })) : $(".carousel-control").hide()
        }
    })
}

function fillCategory(s, e, t) {
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getCategory",
            SelVal: s,
            selType: t,
            hdnPrevSessionId: a
        },
        success: function(s) {
            var t = s.category;
            $("#" + e).html(t)
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
        success: function(e) {
            var t = e.result,
                a = "",
                r = "";
            if (t) {
                var l = appURL + "/uploadDocuments/successStory/" + t.strImageFile;
                r = "", "" != t.strDesc && null != t.strDesc && (r = wardWrap(t.strDesc, 130)), a += '<div class="text bgblue">', a += '    <h3 class="' + t.strHeadClass + '">', a += '      <img src="' + siteUrl + '/images/quoteicon.png" alt="" title="" class="quottop"/> ' + t.strHeading, a += "    </h3>", a += '      <p class="screenreader ' + t.strDesClass + '">' + r + "</p>", a += '     <span class="screenreader sname ' + t.strClass + '">- ' + t.strName + "</span> ", a += '     <div class="clearfix"></div>', a += "</div>", a += '<div class="rightimg">', a += '   <img src="' + l + '" alt="' + t.strNameE + '" title="' + t.strNameE + '" />', a += '   <div class="arrow-down arrow-blue"></div>', a += '   <div class="rightop">', a += "       <center>", a += '           <a href="' + siteUrl + "/my-story-details/" + t.strAlias + '" class="screenreader btn-white hvr-rectangle-out enter ' + t.strHeadClass + '" title="' + t.strMore + '">' + t.strMore + "</a>", a += "       </center>\t", a += "   </div>", a += "</div>"
            } else a += '<div align="center">No Story Available.</div>';
            $("#" + s).html(a)
        }
    })
}

function getRightpanelBlog(s) {
    var e = $("#hdnPrevSessionId").val(),
        t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelBlog",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var a = e.blogRes,
                r = "";
            a && ("" != a.strDesc && null != a.strDesc && (r = wardWrap(a.strDesc, 120) + '<br> <a target="_blank" href="' + siteUrl + "/bloginfo/" + a.intBlogId + '" class="screenreader ' + a.strDescClass + '" title="' + a.strMore + '">' + a.strMore + "</a>"), t += '<div class="text bgppl">', t += '   <h3 class="screenreader skill ' + a.strHeadClass + '">' + a.strHeading + "</h3>", t += '   <h4 class="screenreader font-lg ' + a.strClass + '"><a href="' + siteUrl + "/bloginfo/" + a.intBlogId + '" >' + a.strHeadLine + "</a></h4>", t += '   <p class="screenreader ' + a.strDescClass + '">' + r + "</p>", t += '   <div class="clearfix"></div>', t += '   <div class="clearfix"></div>', t += " </div>", t += ' <div class="col-sm-9 purple-blog-right">', t += "   <ul>", t += '     <li class="screenreader ' + a.strHeadClass + '">' + a.strShareOn + ' : <div id="blogshare" class="' + a.strNumLangCls + '"></div></li>', t += '     <div class="clearfix"></div>', t += "   </ul>", t += " </div>  "), $("#" + s).html(t), $("#blogshare").jsSocials({
                url: siteUrl + "/bloginfo/" + a.intBlogId,
                text: a.strSnippet,
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
        t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelNews",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var a = e.newsRes;
            if (a) {
                var r = appURL + "/uploadDocuments/news/" + a.strImageFile;
                t += '<div class="text bgblu">', t += '    <h3 class="screenreader skill ' + a.strHeadClass + '">' + a.strHeading + "</h3>", t += '   <p class="screenreader ' + a.strClass + '">' + a.strHeadLine + "</p>", t += ' <p class="screenreader date ' + a.strLangcls + '">' + a.dtmNewsDate + "</p>", "" != a.vchSourcename && (t += ' <p ><span class="screenreader ' + a.strLangcls + '">' + a.strNewsSourcelbl + '</span> : <a href="' + a.vchSource + '" class="screenreader ' + a.vchSourcenameCls + '"  target="_blank">' + a.vchSourcename + "</a></p>"), t += '    <div class="clearfix"></div>', t += "  </div>", t += '  <div class="rightimg"> <img src="' + r + '" alt="' + a.strHeadLineE + '" title="' + a.strHeadLineE + '" />', t += '    <div class="arrow-downn"></div>', t += '    <div class="rightop">', t += "      <center>", t += '        <a href="' + a.vchSource + '" class="screenreader btn-white hvr-rectangle-out enter ' + a.strHeadClass + '" title="Click Now">' + a.strMore + "</a>", t += "      </center>", t += "    </div>", t += "  </div>"
            }
            $("#" + s).html(t)
        }
    })
}

function getRightpanelAllNews(s, e, t, a) {
    parseInt(e) > 0 && (a = 0);
    var r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getRightpanelAllNews",
            intRecno: e,
            intPagesize: t,
            intNewsId: a,
            hdnPrevSessionId: r
        },
        success: function(r) {
            var l = r.newsRes,
                i = "",
                n = "",
                c = parseInt(e) + parseInt(t);
            if (l) {
                var o = r.newsRes.length;
                i += '<ul class="newsdetail-list">';
                for (var d = 0; o > d; d++) {
                    var u = appURL + "/uploadDocuments/news/" + l[d].strImageFile;
                    n = "", a == l[d].intNewsId && (n = "active"), i += '<li class="' + n + '"><a href="' + siteUrl + "/newsinfo/" + l[d].intNewsId + '">', i += '  <div class="news-img-sm">', i += '     <img src="' + u + '" alt="' + l[d].strHeadLineE + '" title="' + l[d].strHeadLineE + '" />', i += "  </div>", i += '  <div class="news-text-smbox">', i += '     <h4 class="screenreader ' + l[d].strClass + '">' + l[d].strHeadLine + "</h4>", i += '     <h5 class="screenreader "><i class="fa fa-calendar"></i> &nbsp; ' + l[d].dtmNewsDate + "</h5>", i += "  </div>", i += "</a></li>"
                }
                i += "</ul>", e < l[o - 1].totalResultrec && c < l[o - 1].totalResultrec && (i += '<center class="loadmore"><a href="javascript:getRightpanelAllNews(\'' + s + "'," + c + "," + t + "," + a + ');" class="screenreader btn-blue-sm hvr-rectangle-in ' + l[o - 1].strHeadClass + '" title="Load More">' + l[o - 1].strMore + "</a></center> ")
            } else i += '<div align="center" class="screenreader noRecord ' + r.noRecord.strLangCls + '">' + r.noRecord.strNorecordlbl + "</div>";
            $(".loadmore ").hide(), 0 == e ? $("#" + s).html(i) : $("#" + s).append(i)
        }
    })
}

function getHomepageVideo(s) {
    var e = "",
        t = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageVideo",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var a = t.result;
            if (a)
                for (var r = t.result.length, l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/gallery/" + a[l].strImageFile;
                    if (e += ' <li class="active"><a href="' + siteUrl + "/video-gallery-details/" + a[l].intGalleryId + "/" + a[l].intCategoryId + '">', e += '    <div class="video-img-sm1"> <img src="' + i + '" alt="' + a[l].strCaptionE + '" title="' + a[l].strCaptionE + '"> <i class="fa fa-play-circle galleryvideoicon" aria-hidden="true"></i> </div>', e += '    <div class="video-text-smbox1">', e += '      <h4 class="screenreader ' + a[l].strClass + '">' + a[l].strCaption + "</h4>", e += '      <h5 class="screenreader ' + a[l].strClass + '">' + a[l].strDate + " </h5>", e += "    </div>", e += "    </a>", e += " </li>", 1 == l) break
                } else e = '<li class="screenreader noRecord ' + t.noRecord.strLangCls + '">' + t.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(e)
        }
    })
}

function getHomepageGallery(s) {
    var e = $("#hdnPrevSessionId").val(),
        t = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageGallery",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var a = e.galleryCatresult,
                r = e.galleryCatresult.length;
            if (r > 0) {
                t += '<div class="slider">', t += "<ul>";
                for (var l = 0; r > l; l++) {
                    var i = appURL + "/uploadDocuments/home_resize_img/" + a[l].strImageFile;
                    t += '<li class="slide">\n                                         <div class="imgbox">\n                                        <img src="' + i + '" alt="' + a[l].strCatgory + '"/>\n                                        <i class="fa fa-picture-o galleryicon" aria-hidden="true"></i>\n                                        <div class="pcategory-text">\n                                             <h3 class="screenreader ' + a[l].strCatClass + '">' + a[l].strCatgory + '</br><span class="yellowbar"></span></h3>\n                                             <div class="clearfix"></div>\n                                             <p class="screenreader ' + a[l].strCatDescClass + '">' + a[l].strDescription + '</p>\n                                             <div class="clearfix"></div>\n                                                <a href="' + siteUrl + "/photo-gallery-details/" + a[l].intCategoryId + '" class="screenreader ' + a[l].strLblClass + '">' + a[l].strViewlabl + "</a>\n                                           </div>\n                                       </div>\n                                     </li>"
                }
                t += '</ul>\n                            </div>\n                            <div class="switch" id="prev1" title="Previous"><i class="fa fa-arrow-left"></i></div>\n                            <div class="switch" id="next1" title="Next"><i class="fa fa-arrow-right"></i></div>'
            } else t += '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(t), $("#photogallery-slide").sliderUi({
                speed: 1e3,
                caption: !0,
                autoPlay: !1,
                controlShow: !1
            })
        }
    })
}

function loadSectors(s, e, t, a, r, l, i, n, c) {
    $("#filterSectors").html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var o = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadCourses",
            intRecno: a,
            selEligibility: i,
            txtSearchCourse: e,
            intPagesize: r,
            intDuration: l,
            hdnPrevSessionId: o
        },
        success: function(s) {
            var o = s.sectorDtls,
                d = "",
                u = "",
                v = [];
            if (d += '<div class="card card-body">', "" != n && null != n && (v = (n = (n += "").replace(/(^[,\s]+)|([,\s]+$)/g, "")).split(",")), o)
                for (var p = s.sectorDtls.length, h = 0; p > h; h++) u = "", v.length > 0 && (t == o[h].intCategoryId || v.indexOf(o[h].intCategoryId) >= 0) && (u = 'checked="checked"'), d += '<div class="form-check">\n\t\t\t\t<div class="custom-control custom-checkbox">\n                                                 <input id="sector' + o[h].intCategoryId + '" value="' + o[h].intCategoryId + '" type="checkbox" class="custom-control-input sector" ' + u + ' onchange="getValueUsingClass();">\n                                                <label for="sector' + o[h].intCategoryId + '" class="custom-control-label screenreader ' + o[h].strClass + '">' + o[h].strSecotrName + '</label>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t    <span class="screenreader clsCoursecount clsAllCount ' + o[h].strNumClass + '">' + o[h].courseCount + "</span>", d += " </div>";
            else d += '<li class="screenreader noRecord ' + s.noRecord.strLangCls + '">' + s.noRecord.strNorecordlbl + "</li>";
            d += "</div>", $("#filterSectors").html(d), 1 == c ? loadFilterCourses(i, n, l, e, t, a, r) : 2 == c && getValueUsingClass(e)
        }
    })
}

function loadEligibility(s, e, t) {
    $("#" + s).html('<div align="center"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadEligibility",
            intDuration: e,
            hdnPrevSessionId: a
        },
        success: function(e) {
            var a = "",
                r = e.eligibility,
                l = [];
            if (t && null != t && (l = (t = (t += "").replace(/(^[,\s]+)|([,\s]+$)/g, "")).split(",")), t.length > 0) var i = l.indexOf(r.intBelow10.toString()) >= 0 ? 'checked="checked"' : "",
                n = l.indexOf(r.int10th.toString()) >= 0 ? 'checked="checked"' : "",
                c = l.indexOf(r.int12th.toString()) >= 0 ? 'checked="checked"' : "",
                o = l.indexOf(r.intVal5.toString()) >= 0 ? 'checked="checked"' : "",
                d = l.indexOf(r.intVal6.toString()) >= 0 ? 'checked="checked"' : "";
            else i = "", n = "", c = "", o = "", d = "";
            a += '<div class="card card-body">', a += '<div class="form-check" >\n                         <div class="custom-control custom-checkbox">\n                        <input id="qual' + r.intBelow10 + '" value="' + r.intBelow10 + '" ' + i + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n                         <label for="qual' + r.intBelow10 + '" class="custom-control-label screenreader ' + r.strCls + '">' + r.strBelow + '</label></div>\n                     </div>\n                    <div class="form-check" >\n            <div class="custom-control custom-checkbox">\n                     <input id="qual' + r.int10th + '" value="' + r.int10th + '" ' + n + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n                         <label for="qual' + r.int10th + '" class="custom-control-label screenreader ' + r.strCls + '">' + r.str10th + '</label></div>\n                     </div>\n\n                     <div class="form-check" >\n         <div class="custom-control custom-checkbox">\n                           <input id="qual' + r.int12th + '" value="' + r.int12th + '" ' + c + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n                         <label for="qual' + r.int12th + '" class="custom-control-label screenreader ' + r.strCls + '">' + r.str12th + '</label></div>\n                     </div>\n                    <div class="form-check" >\n        <div class="custom-control custom-checkbox">\n                         <input id="qual' + r.intVal5 + '" value="' + r.intVal5 + '" ' + o + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n                         <label for="qual' + r.intVal5 + '" class="custom-control-label screenreader ' + r.strCls + '">' + r.strGrad + '</label></div>\n                     </div>\n\n                     <div class="form-check" >\n                       <div class="custom-control custom-checkbox">\n <input id="qual' + r.intVal6 + '" value="' + r.intVal6 + '" ' + d + ' class="qual custom-control-input" type="checkbox" onchange="getValueUsingClass();">\n                         <label for="qual' + r.intVal6 + '" class="custom-control-label screenreader ' + r.strCls + '">' + r.strPostGrad + "</label></div>\n                     </div></div>", $("#" + s).html(a)
        }
    })
}

/*function loadFilterCourses(s, e, t, a, r, l, i) {
    $("#loading").html('<div class="course-loader"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var n = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        beforeSend: function() {
            $("#loading").html('<center><span><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></span></center>')
        },
        data: {
            method: "loadFilterCourses",
            intRecno: l,
            selEligibility: s,
            selSectors: e,
            selDuration: t,
            course: a,
            sectorId: r,
            intPagesize: i,
            hdnPrevSessionId: n
        },
        success: function(a) {
            var r = a.sectorDtls,
                n = "",
                c = "",
                o = parseInt(l) + parseInt(i);
            if (r) {
                for (var d = a.sectorDtls.length, u = 0; u < d; u++) u == d && (c = "noborder"), n += '<div class="coursesportlet ' + c + '">\n                                             <div class="row">\n                                                 <div class="col-sm-10">\n                                                     <div class="coursestext ' + r[u].strCoursecls + '">\n                                                         <h3 class=' + r[u].strCoursecls + ">" + r[u].strCourseName + '<strong class="' + r[u].strClass + '">' + r[u].strSecotrName + '</strong></h3>\n                                                         <div class="row">\n                                                             <div class="col-sm-4">\n                                                                 <span class="' + r[u].strClass + '">' + r[u].strDtlabl + '</span>\n                                                                 <p class="' + r[u].strNumclass + '">' + r[u].strDurationLvl + '</p>\n                                                             </div>\n                                                             <div class="col-sm-4">\n                                                            <span class="' + r[u].strClass + '">' + r[u].strEligLvl + '</span>\n                                                                 <p class="' + r[u].strClass + '">' + r[u].strQual + '</p>\n                                                             </div>\n                                                             <div class="col-sm-4">\n                                                                 <span class="' + r[u].strClass + '">' + r[u].strOfferedbylbl + "</span>", null != r[u].intOfferedByITI && r[u].intOfferedByITI > 0 && (n += '<p class="textpurple ' + r[u].strClass + '"><a href="' + siteUrl + "/institution-profile/" + r[u].courseAlias + '" class="' + r[u].strClass + '" title="' + r[u].strInstituteITI + '" target="_blank" > ' + r[u].intOfferedBy + " " + r[u].strInstituteITI + "</a></p>"), null != r[u].intOfferedBy && r[u].intOfferedBy > 0 && r[u].intOfferedPIABy > 0 && (n += ","), null != r[u].intOfferedPIABy && r[u].intOfferedPIABy > 0 && (n += '<p class="textpurple ' + r[u].strClass + '"><a href="' + siteUrl + "/trainingPartner/" + r[u].courseAlias + '" class="' + r[u].strNumclass + '" title="' + r[u].strPIALvl + '" target="_blank"> ' + r[u].intOfferedPIABy + " " + r[u].strPIALvl + "</a></p>"), 0 == r[u].intOfferedPIABy && 0 == r[u].intOfferedBy && (n += '<p class="' + r[u].strClass + '">--</p>'), n += '</div>\n                                                         </div>\n                                                     </div>\n                                                 </div>\n                                            <div class="col-sm-2">\n                                                     <div class="coursesimg">\n                                                         <img src="' + appURL + "/uploadDocuments/sector/" + r[u].vchSectorImage + '" alt="' + r[u].strSecotrName + '"  title="' + r[u].strSecotrName + '" />\n                                                     </div>\n                                                 </div>\n                                             </div>\n                                             <div class="clearfix"></div>\n                                         </div>';
                l < r[d - 1].totalResultrec && o < r[d - 1].totalResultrec && (n += '<div class="loadmore text-center"><a href="javascript:loadFilterCourses(\'' + s + "','" + e + "','" + t + "','',0," + o + "," + i + ')" class="screenreader active1 loadmore ' + r[d - 1].strDtlClass + '" title="Load More">' + r[d - 1].strMorelbl + "</a></div>")
            } else n += '<div align="center" class="screenreader noRecord ' + a.noRecord.strNoRecordcls + '">' + a.noRecord.strNoRecordlbl + "</div>";
            $(".loadmore").hide(), $("#loading").html(""), 0 == l ? (d > 0 ? $("#courseresult").html('<span class="screenreader cresultno ' + r[0].strClass + '">' + r[0].strCourseSearchReslbl1 + " " + r[0].total + r[0].strCourseSearchReslbl2 + "</span>") : $("#courseresult").html(""), $("#listCourses").html(n)) : $("#listCourses").append(n)
        }
    })
}*/


function loadFilterCourses(s,e,t,r,l,a,n){
    $("#loading").html('<div class="course-loader"><img src="'+siteUrl+'/images/loading-blue.gif" alt="loading" /></div>');
    var i=$("#hdnPrevSessionId").val();
    $.ajax({type:"POST",url:siteUrl+"/proxy",dataType:"json",
        beforeSend:function()
        {$("#loading").html('<center><span><img src="'+siteUrl+'/images/loading-blue.gif" alt="loading" /></span></center>')},
        data:{method:"loadFilterCourses",
        intRecno:a,
        selEligibility:s,
        selSectors:e,
        selDuration:t,
        course:r,
        sectorId:l,
        intPagesize:n,
        hdnPrevSessionId:i
    },success:function(r){var l=r.sectorDtls,i="",o="",c=parseInt(a)+parseInt(n);if(l){for(var d=r.sectorDtls.length,f=0;f<d;f++)f==d&&(o="noborder"),i+='<div class="coursesportlet '+o+'">\n                                             <div class="row">\n                                                 <div class="col-sm-10">\n                                                     <div class="coursestext '+l[f].strCoursecls+'">\n                                                         <h3 class='+l[f].strCoursecls+">"+l[f].strCourseName+'<strong class="'+l[f].strClass+'">'+l[f].strSecotrName+'</strong></h3>\n                                                         <div class="row">\n                                                             <div class="col-sm-4">\n                                                                 <span class="'+l[f].strClass+'">'+l[f].strDtlabl+'</span>\n                                                                 <p class="'+l[f].strNumclass+'">'+l[f].strDurationLvl+'</p>\n                                                             </div>\n                                                             <div class="col-sm-4">\n                                                            <span class="'+l[f].strClass+'">'+l[f].strEligLvl+'</span>\n                                                                 <p class="'+l[f].strClass+'">'+l[f].strQual+'</p>\n                                                             </div>\n                                                             <div class="col-sm-4">\n                                                                 <span class="'+l[f].strClass+'">'+l[f].strOfferedbylbl+"</span>",null!=l[f].intOfferedByITI&&l[f].intOfferedByITI>0&&(i+='<p class="textpurple '+l[f].strClass+'"><a href="'+siteUrl+"/institution-profile/"+l[f].courseAlias+'" class="'+l[f].strClass+'" title="'+l[f].strInstituteITI+'" > '+'<label class="d-inline '+l[f].strNumclass+'">'+l[f].intOfferedByITI+'</label>'+" "+l[f].strInstituteITI+"</a></p>"),null!=l[f].intOfferedByITI&&l[f].intOfferedByITI>0&&l[f].intOfferedPIABy>0&&(i+=","),null!=l[f].intOfferedByPOL&&l[f].intOfferedByPOL>0&&(i+='<p class="textpurple '+l[f].strClass+'"><a href="'+siteUrl+"/politechnic-profile/"+l[f].courseAlias+'" class="'+l[f].strClass+'" title="'+l[f].strInstitutePOL+'" > '+'<label class="d-inline '+l[f].strNumclass+'">'+l[f].intOfferedByPOL+'</label>' +" "+l[f].strInstitutePOL+"</a></p>"),null!=l[f].intOfferedByITI&&l[f].intOfferedByITI>0&&null!=l[f].intOfferedByPOL&&l[f].intOfferedByPOL>0&&l[f].intOfferedPIABy>0&&(i+=","),null!=l[f].intOfferedPIABy&&l[f].intOfferedPIABy>0&&(i+='<p class="textpurple '+l[f].strClass+'"><a href="'+siteUrl+"/trainingPartner/"+l[f].courseAlias+'" class="'+l[f].strNumclass+'" title="'+l[f].strPIALvl+'"> '+'<label class="d-inline '+l[f].strNumclass+'">'+l[f].intOfferedPIABy+'</label>'+" "+l[f].strPIALvl+"</a></p>"),0==l[f].intOfferedPIABy&&0==l[f].intOfferedBy&&(i+='<p class="'+l[f].strClass+'">--</p>'),i+='</div>\n                                                         </div>\n                                                     </div>\n                                                 </div>\n                                            <div class="col-sm-2">\n                                                     <div class="coursesimg">\n                                                         <img src="'+appURL+"/uploadDocuments/sector/"+l[f].vchSectorImage+'" alt="'+l[f].strSecotrName+'"  title="'+l[f].strSecotrName+'" />\n                                                     </div>\n                                                 </div>\n                                             </div>\n                                             <div class="clearfix"></div>\n                                         </div>';a<l[d-1].totalResultrec&&c<l[d-1].totalResultrec&&(i+='<div class="loadmore text-center"><a href="javascript:loadFilterCourses(\''+s+"','"+e+"','"+t+"','',0,"+c+","+n+')" class="screenreader active1 loadmore '+l[d-1].strDtlClass+'" title="Load More">'+l[d-1].strMorelbl+"</a></div>")}else i+='<div align="center" class="screenreader noRecord '+r.noRecord.strNoRecordcls+'">'+r.noRecord.strNoRecordlbl+"</div>";$(".loadmore").hide(),$("#loading").html(""),0==a?(d>0?$("#courseresult").html('<span class="screenreader cresultno '+l[0].strClass +'">'+l[0].strCourseSearchReslbl1+" "+'<span class="d-inline '+ l[0].strNumclass+'">'+l[0].total+'</span>'+l[0].strCourseSearchReslbl2+"</span>"):$("#courseresult").html(""),$("#listCourses").html(i)):$("#listCourses").append(i)
}
})
}



function loadVideoGallery(s, e, t) {
    var a = "",
        r = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadVideoGallery",
            albumId: s,
            typeid: t,
            hdnPrevSessionId: r
        },
        success: function(s) {
            var t = s.result;
            if (t) {
                var r = s.result.length;
                for (0 == e && (l = t[0].videourl, a += '<div class="col-lg-8 col-sm-8 ' + t[0].strVideoCls + '">\n                                      <div class="recent-video ">\n                                         <iframe width="100%" class="videoheight" src="' + l + '" frameborder="0" allowfullscreen></iframe>\n                                         <h4 class="screenreader ">' + t[0].strCaption + '</h4>\n                                         <p><span class="screenreader ">' + t[0].strDate + "</span></p>\n                                      </div>\n                                    </div>"), i = 0; r > i; i++)
                    if (e == t[i].intGalleryId) {
                        var l = t[i].videourl;
                        a += '<div class="col-lg-8 col-sm-8">\n                                  <div class="recent-video">\n                                     <iframe width="100%" height="500" src="' + l + '" frameborder="0" allowfullscreen></iframe>\n                                     <h4 class="screenreader ">' + t[i].strCaption + '</h4>\n                                     <p><span class="screenreader ">' + t[i].strDate + "</span></p>\n                                  </div>\n                                </div>"
                    }
                a += ' <div class="clearfix hidden-sm hidden-lg hidden-md "></div> <div class="col-lg-4 col-sm-4">\n                                    <h4 class="screenreader morevideoslist">More Videos</h4>\n                                    <ul class="videolistli">';
                for (var i = 0; r > i; i++) {
                    var n = appURL + "/uploadDocuments/gallery/" + t[i].strImageFile;
                    t[i].intGalleryId != e && (a += '<li><a href="javascript:void(0);" onclick="loadVideoGallery(' + t[i].intCategoryId + "," + t[i].intGalleryId + ',3);" class=""  data-group="set1">\n                                    <figure class="videolist  clsNocaption ' + t[i].strClass + '">\n                                  <img src="' + n + '" alt="' + t[i].strCaption + '" title="' + t[i].strCaption + '"/>\n                                            <i class="fa fa-play-circle galleryvideoicon"></i>\n                                        </figure>\n \n                                        <figcaption class="screenreader ' + t[i].strClass + '">' + t[i].strCaption + '<span class="screenreader ">' + t[i].strDate + "</span>\n                                        </figcaption></a>\n                                        </li>")
                }
                a += "</ul></div>", $("#albumname").addClass(t[0].strClass), $("#albumname").html(t[0].strCatgory + '<small class="screenreader ' + t[0].strVideoCls + '"><span class="' + t[0].strVideoNumCls + '">' + r + "</span> " + t[0].strVideolbl + "</small>"), $("#albumDesc").addClass(t[0].strCatDescClass), $("#albumDesc").html(t[0].strCatgoryDesc)
            } else a += '<div align="center" class="screenreader noRecord ' + s.noRecord.strNoRecordcls + '">' + s.noRecord.strNoRecordlbl + "</div>";
            $("#videoContent").html(a)
        }
    })
}

function loadPhotoGallery(s, e) {
    var t = "",
        a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadVideoGallery",
            albumId: s,
            typeid: e,
            hdnPrevSessionId: a
        },
        success: function(s) {
            var e = s.result;
            if (e) {
                for (var a = s.result.length, r = 0; r < a; r++) t += '<a href="' + appURL + "/uploadDocuments/gallery/" + e[r].strImageFile + '" class="fancybox" data-fancybox-group="gallery">\n                                    <img alt="' + e[r].strCaption + '" src="' + appURL + "/uploadDocuments/gallery/" + e[r].strImageFile + '"/>\n                                    </a>';
                $("#photoalbumname").addClass(e[0].strClass), $("#photoalbumname").html(e[0].strCatgory + '<small class="screenreader ' + e[0].strVideoCls + '">' + a + " " + e[0].strVideolbl + "</small>"), $("#albumDesc").addClass(e[0].strCatDescClass), $("#albumDesc").html(e[0].strCatgoryDesc)
            } else t += '<div align="center" class="screenreader noRecord ' + s.noRecord.strNoRecordcls + '">' + s.noRecord.strNoRecordlbl + "</div>";
            $("#mygallery").html(t), $("#mygallery").justifiedGallery()
        }
    })
}

function loadDistwiseInstitute(s, e, t, a, r) {
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
            strInstitute: t,
            intCourseId: a,
            intPIAStatus: r,
            hdnPrevSessionId: l
        },
        success: function(e) {
            var l = e.result,
                n = 0,
                c = 0,
                o = "";
            if (l) {
                var d = e.result.length;
                if (a > 0 || null != t && "" != t) {
                    var u = "";
                    $(".dist-block").each(function() {
                        u = $(this).attr("class").replace("active", ""), $(this).attr("class", u)
                    })
                }
                for (var v = 0; d > v; v++) {
                    if (o = 0 == v ? "show" : "", n != (c = l[v].intDistrictid) && v > 0 && (i += "           </ul>", i += "</div>", i += "</div>", i += "</div>"), n != c) {
                        if (a > 0 || null != t && "" != t) {
                            var p = $("#" + c).attr("class") + " active";
                            $("#" + c).attr("class", p)
                        }
                        i += '<div class="panel panel-default">', i += '   <div class="panel-heading">', i += '    <h4 class="panel-title ' + l[v].strClass + '"> ', i += '     <a data-toggle="collapse" data-distid="' + l[v].intDistrictid + '" class="screenreader clsDistMapview" data-parent="#accordion" href="javascript: void(0);" data-target="#collapse' + l[v].intDistrictid + '">', i += "     " + l[v].strDistrictname + "</a>", i += "   </h4>", i += " </div>", i += ' <div id="collapse' + l[v].intDistrictid + '" class="panel-collapse collapse ' + o + '" data-parent="#accordion">', i += '   <div class="panel-body">', i += '     <ul class="nearestinst"> '
                    }
                    "" != l[v].vchInstituteName ? 1 == r ? (i += "                 <li>", i += '                    <a href="' + siteUrl + "/profile-details/" + l[v].vchInstituteAlias + '" title="' + l[v].vchInstituteName + '" class="screenreader ' + l[v].strInstituteClass + ' "> ' + l[v].vchInstituteName + "</a>", i += '                    <small class="screenreader ' + l[v].txtAddressClass + '">' + l[v].txtAddress + "</small>", i += '          <a href="' + siteUrl + "/profile-details/" + l[v].vchInstituteAlias + '#instCoursesec"  class="screenreader ' + l[v].strLangCls + '" data-id="' + l[v].intInstituteId + '" data-name="' + l[v].vchInstituteName + '">' + l[v].strViewCourselbl + "</a> ", i += "                </li>") : (i += "        <li>", i += '          <span title="' + l[v].vchInstituteName + '" class="screenreader ' + l[v].strInstituteClass + ' font600"> ' + l[v].vchInstituteName + "</span>", i += '          <small class="screenreader ' + l[v].txtAddressClass + '">' + l[v].txtAddress + "</small>", "" != l[v].vchPhoneno && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strPhonelbl + '</span> : <span class="screenreader ' + l[v].strNumLangCls + '">' + l[v].vchPhoneno + "</span></small>"), "--" != l[v].vchEmailId && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strEmaillbl + '</span> : <span ><a href="mailto:' + l[v].vchEmailId + '" target="_top" class="screenReader">' + l[v].vchEmailId + "</a></span></small>"), "" != l[v].strCourseStr && (i += '          <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strCourselbl + '</span> : <span class="screenreader ' + l[v].strLangCls + '">' + l[v].strCourseStr + "</span></small>"), "" != l[v].vchWebsite && (i += '         <small><span class="screenreader textblack ' + l[v].strLangCls + '">' + l[v].strWebsitelbl + '</span> : <a target="_blank" href="' + l[v].vchWebsite + '">' + l[v].vchWebsite + "</a></small>"), i += '          <a href="javascript:void(0)"  class="screenreader courseClick ' + l[v].strLangCls + '" data-target="#piacourseModal" data-id="' + l[v].intInstituteId + '" data-name="' + l[v].vchInstituteName + '">' + l[v].strViewCourselbl + "</a> ", i += "        </li>") : i += '<li class="screenreader noRecord ' + l[v].strLangCls + '">' + l[v].strNorecordlbl + "</li>", n = l[v].intDistrictid
                }
            } else i += '<div align="center" class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            $("#" + s).html(i), $(".clsDistMapview").on("click", function() {
                var s = "",
                    e = $(this).data("distid");
                $(".dist-block").each(function() {
                    s = $(this).attr("class").replace("active", ""), $(this).attr("class", s)
                });
                var t = $("#" + e).attr("class").replace("active", "") + " active";
                $("#" + e).attr("class", t)
            })
        }
    })
}

function searchbyPincode(s, e) {
    $("#preLoadersearch").html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var t = "",
        a = "",
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
        success: function(s) {
            var e = s.result,
                r = 0,
                l = "",
                i = 0,
                n = 0,
                c = "",
                o = "";
            if ($("#dispsearchResult").show(), e) {
                var d = s.result.length;
                $(".dispTabs").show();
                for (var u = 0; d > u; u++) {
                    l = "";
                    var v = $("#" + e[u].intDistrictid).attr("class").replace("active", "") + " active";
                    $("#" + e[u].intDistrictid).attr("class", v), c = 1 == e[u].tinIsPIA ? "profile-details" : "pia-profile", 1 == e[u].tinIsPIA ? (r = siteUrl + "/" + c + "/" + e[u].strInstituteAlias, o = "") : (r = e[u].vchWebsite, o = 'target="_blank"'), l += ' <li data-instid="' + e[u].strInstituteAlias + '">', "" != r || 1 == e[u].tinIsPIA ? l += '    <a href="' + r + '" class="screenreader ' + e[u].strInstituteCls + ' " ' + o + ">" : l += '    <span class="screenreader ' + e[u].strInstituteCls + ' font600" ' + o + ">", l += "       " + e[u].strInstituteName, "" != r && 1 == e[u].tinIsPIA || (l += "    </span>"), l += ' <small class="screenreader ' + e[u].strAddressCls + '">' + e[u].strAddress + "</small>", "" == r && 1 != e[u].tinIsPIA || (l += "    </a>"), l += " </li>", 1 == e[u].tinIsPIA ? (t += l, i++) : (a += l, n++)
                }
                $("#searchCount").html(d), "" == t && (t = '<div align="center" class="screenreader noRecord ' + e[0].strLangCls + '" >' + e[0].strNorecordlbl + "</div>"), $("#dispIti").html(t), "" == a && (a = '<div align="center" class="screenreader noRecord ' + e[0].strLangCls + '" >' + e[0].strNorecordlbl + "</div>"), $("#dispPartners").html(a)
            } else $("#searchCount").html("0"), t = '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '" >' + s.noRecord.strNorecordlbl + "</div>", a = '<div align="center" class="screenreader noRecord ' + s.noRecord.strLangCls + '" >' + s.noRecord.strNorecordlbl + "</div>", $(".dispTabs").hide(), $("#dispIti").html(""), $("#dispPartners").html("");
            $("#govtCount").html(i), $("#tpCount").html(n), $("#preLoadersearch").html(""), $("#seachDiv").removeClass("beforesearch"), $("#btnSearch").html('<i class="fa fa-search"></i>')
        }
    })
}

function fillDistrictLists(s, e, t, a, r) {
    $("#" + e).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var l = "",
        i = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistricts",
            intDistId: s,
            strSearchtxt: t,
            intCourseId: r,
            piaStatus: a,
            hdnPrevSessionId: i
        },
        success: function(t) {
            var a = t.result,
                r = "";
            if (a) {
                var i = t.result.length;
                r += '<div class="card card-body">';
                for (var n = 0; n < i; n++) l = s == a[n].intDistId || 0 == n ? "active" : "", r += '<div class="form-check">\n                            <div class="custom-control custom-checkbox">\n                                             <input id="distList_' + a[n].intDistId + '"  type="checkbox" class="custom-control-input distListChk ' + l + " " + a[n].strClass + '"  value= "' + a[n].intDistId + '" onChange="getDistInstitutes(' + a[n].instCount + ');">\n                                            <label for="distList_' + a[n].intDistId + '" class="custom-control-label screenreader ' + a[n].strClass + '">' + a[n].strDistName + '</label>\n                                                                                            </div>\n                                                                                         <span class="screenreader clsInstcount ' + a[n].strNumLangCls + '">(' + a[n].instCount + ")</span>", r += " </div>"
            } else r = '<li class="screenreader noRecord ' + t.noRecord.strLangCls + '">' + t.noRecord.strNorecordlbl + "</li>";
            $("#" + e).html(r)
        }
    })
}

function fillDistwiseInstituteLists_bkp(s, e, t, a, r) {
    $(".distListChk").attr("checked", !1), $("#distList_" + e).attr("checked", !0), $(".inst-coursename").hide(), $("#dispDistrictListview li").each(function() {
        $(this).removeClass("active")
    }), $("#distList_" + e).addClass("active");
    var l = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>'), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistwiseInstituteLists",
            intDistId: e,
            strSearchtxt: t,
            piaStatus: a,
            intCourseId: r,
            hdnPrevSessionId: l
        },
        success: function(e) {
            var t = e.result,
                l = "";
            if (t)
                for (var i = e.result.length, n = 0; n < i; n++) 1 == a || 2 == a ? (l += ' <li class="" id="instList_' + t[n].intInstituteId + "\" onclick=\"fillInstwiseCourseLists('dispCourseListview'," + t[n].intInstituteId + "," + r + ');">', l += '<a href="javascript:void(0)" title="' + t[n].vchInstituteName + '" class="screenreader ' + t[n].strInstituteClass + '">' + t[n].vchInstituteName + "</a></br>", l += '<small class="screenreader ' + t[n].txtAddressClass + '">' + t[n].txtAddress + "</small>", l += "</li>") : (l += ' <li class="" id="instList_' + t[n].intInstituteId + "\" onclick=\"fillInstwiseCourseLists('dispCourseListview'," + t[n].intInstituteId + "," + r + ');">', l += '<a href="javascript:void(0)" title="' + t[n].vchInstituteName + '" class="screenreader ' + t[n].strInstituteClass + '">' + t[n].vchInstituteName + "</a></br>", l += '<small class="screenreader ' + t[n].txtAddressClass + '">' + t[n].txtAddress + "</small>", "" != t[n].vchPhoneno && (l += '          </br><small><span class="screenreader selectlabelpia ' + t[n].strLangCls + '">' + t[n].strPhonelbl + '</span> : <span class="screenreader ' + t[n].strLangCls + '">' + t[n].vchPhoneno + "</span></small>"), "--" != t[n].vchEmailId && (l += '          </br><small><span class="screenreader selectlabelpia ' + t[n].strLangCls + '">' + t[n].strEmaillbl + '</span> : <span ><a href="mailto:' + t[n].vchEmailId + '" target="_top" class="screenReader">' + t[n].vchEmailId + "</a></span></small>"), "" != t[n].vchWebsite && (l += '          </br><small><span class="screenreader selectlabelpia ' + t[n].strLangCls + '">' + t[n].strWebsitelbl + '</span> : <a target="_blank" href="' + t[n].vchWebsite + '" class="screenreader ">' + t[n].vchWebsite + "</a></small>"), l += "</li>");
            else l = '<li class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(l)
        }
    })
}

function fillDistwiseInstituteLists(s, e, t, a, r) {
    $(".inst-coursename").hide();
    var l = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>'), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistwiseInstituteLists",
            intDistIdS: e,
            strSearchtxt: t,
            piaStatus: a,
            intCourseId: r,
            hdnPrevSessionId: l
        },
        success: function(e) {
            var t = e.result,
                r = "";
            if (t)
                for (var l = e.result.length, i = 0; i < l; i++) r += '<div class="coursesportlet" id="instList_' + t[i].intInstituteId + '">\n                                <div class="row">', 1 == a || 2 == a ? ("" != t[i].vchImage && (r += ' <div class="col-sm-3">\n                                        <div class="coursesimg">\n                                            <img src="' + t[i].vchImage + '" alt="' + t[i].vchInstituteName + '"/>\n                                        </div>\n                                    </div>'), r += '<div class="col-sm-9">\n                                        <div class="coursestext">\n                                            <h3 class="screenreader ' + t[i].strInstituteClass + '">' + t[i].vchInstituteName + '</h3>\n                                            <p class="screenreader ' + t[i].txtAddressClass + '">' + t[i].txtAddress + "</p>", r += '<div class="clearfix"></div> <div class="insbtn ' + t[i].strOdiaCls + '"><a href="' + siteUrl + "/profile-details/" + t[i].vchInstituteAlias + '#instCoursesec">' + t[i].strAvailCourselbl + '</a></div><div class="insbtn"><a href="' + siteUrl + "/profile-details/" + t[i].vchInstituteAlias + '" class="' + t[i].strOdiaCls + '">' + t[i].strInstitutelbl + "</a> </div> \n                                        </div>\n                                    </div>") : (r += '<div class="col-sm-9">\n                                        <div class="coursestext">\n                                            <h3 class="screenreader ' + t[i].strInstituteClass + '">' + t[i].vchInstituteName + '</h3>\n                                            <span class="screenreader ' + t[i].txtAddressClass + '">' + t[i].txtAddress + "</span>", "" != t[i].vchPhoneno && (r += '         <span class="screenreader selectlabelpia ' + t[i].strOdiaCls + '">' + t[i].strPhonelbl + " : " + t[i].vchPhoneno + "</span>"), "--" != t[i].vchEmailId && (r += '         <span class="screenreader selectlabelpia ' + t[i].strOdiaCls + '">' + t[i].strEmaillbl + ' : <a href="mailto:' + t[i].vchEmailId + '" target="_top" class="screenReader">' + t[i].vchEmailId + "</a></span>"), "" != t[i].vchWebsite && (r += '          <span class="screenreader selectlabelpia ' + t[i].strOdiaCls + '">' + t[i].strWebsitelbl + ' : <a target="_blank" href="' + t[i].vchWebsite + '" class="screenreader ">' + t[i].vchWebsite + "</a></span>"), r += '<div class="clearfix"></div> <div class="insbtn"><a href="javascript:void(0)"  class="screenreader courseClick ' + t[i].strOdiaCls + '" data-target="#piacourseModal" data-id="' + t[i].intInstituteId + '" data-name="' + t[i].vchInstituteName + '">' + t[i].strAvailCourselbl + "</a> \n                                        </div>\n                                    </div></div>"), r += '</div>\n                                <div class="clearfix"></div>\n                            </div>';
            else r = '<li class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(r)
        }
    })
}

function fillInstwiseCourseLists(s, e, t) {
    $(".inst-coursename").show(), $("#dispInstListview li").each(function() {
        $(this).removeClass("active")
    }), $("#instList_" + e).addClass("active");
    var a = $("#hdnPrevSessionId").val();
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>'), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillInstwiseCourseLists",
            intInstituteId: e,
            intCourseId: t,
            hdnPrevSessionId: a
        },
        success: function(e) {
            var t = e.result,
                a = "";
            if (t)
                for (var r = e.result.length, l = 0; r > l; l++) a += ' <li class="screenreader  ' + t[l].strCourseClass + '">', a += t[l].strCoursename + "</br>", a += ' <small ><span class="screenreader ' + t[l].strDtlClass + '">' + t[l].strDtlabl + " : " + t[l].strDuration + " <br> " + t[l].strEligLvl + ' : </span><span class="screenreader ' + t[l].strQualClass + '">' + t[l].strQual + "</span></small>", a += " </li>";
            else a = '<li class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</li>";
            $("#" + s).html(a)
        }
    })
}

function fillDistrictDataLists(s, e, t) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillDistricts",
            distVal: e,
            hdnPrevSessionId: a
        },
        success: function(a) {
            var r = a.result,
                l = "'",
                i = "";
            if (r) {
                for (var n = a.result.length, c = 0; n > c; c++) t > 0 && t == r[c].intDistId ? ($("#txtDistName").val(r[c].strDistName), i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#txtDistName-hidden" + l + ").val(" + r[c].intDistId + ");$(" + l + ".resultList" + l + ").hide();$(" + l + "#txtDistName" + l + ").val(" + l + r[c].strDistName + l + ');">' + r[c].strDistName + "</div>") : i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#txtDistName-hidden" + l + ").val(" + r[c].intDistId + ");$(" + l + ".resultList" + l + ").hide();$(" + l + "#txtDistName" + l + ").val(" + l + r[c].strDistName + l + ');">' + r[c].strDistName + "</div>";
                $("#" + s).html(i), 0 == t && "" != e ? $("#" + s).show() : $("#" + s).hide()
            } else $("#" + s).hide(), $("#txtDistName-hidden").val(0)
        }
    })
}

function loadInstituteCourses(s, e, t) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillInstwiseCourseLists",
            intInstituteId: e,
            hdnPrevSessionId: a
        },
        success: function(e) {
            var a = e.result,
                r = "";
            if (a) {
                r += '<table class="table table-striped">\n                                    <thead>\n                                       <tr>\n                                        <td class="screenreader text-white bgcyan ' + a[0].strLangClass + '">' + a[0].strCourselbl + '</td>\n                                        <td class="screenreader bgblue text-white ' + a[0].strLangClass + '">' + a[0].strDtlabl + '</td>\n                                        <td class="screenreader text-white bgpurple ' + a[0].strLangClass + '">' + a[0].strEligLvl + "</td>\n                                      </tr>\n                                    </thead> <tbody>";
                for (var l = e.result.length, i = 0; l > i; i++) r += '<tr>\n                                        <td scope="row" class="screenreader ' + a[i].strCourseClass + '">' + a[i].strCoursename + '</td>\n                                        <td class="screenreader ' + a[i].strDtlClass + '">' + a[i].strDuration + '</td>\n                                        <td class="screenreader ' + a[i].strQualClass + '">' + a[i].strQual + "</td>\n                                     </tr>";
                r += "</tbody>\n                                    </table>"
            } else r = '<div class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>";
            0 == t && $("#piacourseModal").modal(), $("#" + s).html(r)
        }
    })
}

function fillCourseDataLists(s, e, t) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var a = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillCourse",
            courseVal: e,
            hdnPrevSessionId: a
        },
        success: function(a) {
            var r = a.result,
                l = "'",
                i = "";
            if (r.length > 0) {
                for (var n = a.result.length, c = 0; c < n; c++) t > 0 && t == r[c].intCourseId ? ($("#txtCourse").val(r[c].strCourseName), i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#hidCourseId" + l + ").val(" + r[c].intCourseId + ");$(" + l + ".resultList" + l + ").hide();$('#" + s + "').hide();$(" + l + "#txtCourse" + l + ").val(" + l + r[c].strCourseName + l + ');">' + r[c].strCourseName + "</div>") : i += '<div class="screenreader resultList ' + r[c].strClass + '" onclick="$(' + l + "#hidCourseId" + l + ").val(" + r[c].intCourseId + ");$(" + l + ".resultList" + l + ").hide();$('#" + s + "').hide();$(" + l + "#txtCourse" + l + ").val(" + l + r[c].strCourseName + l + ');">' + r[c].strCourseName + "</div>";
                $("#" + s).html(i), $("#hidCourseId").val(0), 0 == t && "" != e ? $("#" + s).show() : $("#" + s).hide()
            } else $("#" + s).hide(), $("#hidCourseId").val(0)
        }
    })
}

function storageAvailable(s) {
    try {
        var e = window[s],
            t = "__storage_test__";
        return e.setItem(t, t), e.removeItem(t), !0
    } catch (s) {
        return s instanceof DOMException && (22 === s.code || 1014 === s.code || "QuotaExceededError" === s.name || "NS_ERROR_DOM_QUOTA_REACHED" === s.name) && 0 !== e.length
    }
}

function setSearchcriterias() {
    storageAvailable("sessionStorage")
}

function uniques(s) {
    for (var e = [], t = 0, a = s.length; a > t; t++) - 1 === e.indexOf(s[t]) && "" !== s[t] && e.push(s[t]);
    return e
}

function setCookie(s, e, t) {
    removeCookie(s);
    var a = new Date;
    a.setTime(a.getTime() + 60 * t * 60 * 1e3);
    var r = "expires=" + a.toGMTString();
    document.cookie = s + "=" + e + "; " + r
}

function getCookie(s) {
    for (var e = s + "=", t = document.cookie.split(";"), a = 0; a < t.length; a++) {
        for (var r = t[a];
            " " == r.charAt(0);) r = r.substring(1);
        if (-1 != r.indexOf(e)) return r.substring(e.length, r.length)
    }
    return ""
}

function removeCookie(s) {
    document.cookie = s + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC"
}

function getFacebooklatestfeed(s) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" title="loading" /></div>'), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getFacebooklatestfeed"
        },
        success: function(e) {
            var t = e.result,
                a = "";
            t ? (a += ' <div class="fbprofile">', a += '       <img src="' + t.fb_page_photo + '" alt="SkilledinOdisha" title="SkilledinOdisha" class="img-responsive"/>', a += '      <div class="fbtxt">', a += '         <a href="' + t.fb_page_link + '" target="_blank" title="' + t.fb_from_name + '">' + t.fb_from_name + "</a><small>" + t.fbDate + "</small>", a += "     </div>", a += " </div>", "" != t.fb_post_photo && null != t.fb_post_photo && null != t.fb_post_photo && ("" != t.fb_page_photo && null != t.fb_page_photo && null != t.fb_page_photo && (a += '<a href="' + t.fb_post_permalink_url + '" target="_blank" title="SkilledinOdisha">'), a += ' <img src="' + t.fb_post_photo + '" alt="SkilledinOdisha"  title="SkilledinOdisha" class="img-responsive" />', "" != t.fb_page_photo && null != t.fb_page_photo && null != t.fb_page_photo && (a += "</a>")), "" != t.fb_post_link && null != t.fb_post_link && null != t.fb_post_link && (a += '<a href="' + t.fb_post_permalink_url + '" target="_blank" title="SkilledinOdisha">'), a += " <p>" + t.fb_text + "</p>", "" != t.fb_post_link && null != t.fb_post_link && null != t.fb_post_link && (a += "</a>"), a += ' <div class="fbaction noPrint"><a href="' + t.fb_post_permalink_url + '" target="_blank" title="like"><i class="fa fa-thumbs-o-up"></i> ' + t.fb_post_likes + "</a></div>", a += '<div class="fbaction noPrint"><a href="' + t.fb_post_permalink_url + '" target="_blank" title="Comment"><i class="fa fa-comment"></i> ' + t.fb_post_comments + "</a></div>", a += '<div class="clear15"></div>', a += '<span class="noPrint"><a href="' + t.fb_page_link + '" target="_blank" title="Find us on Facebook" class="btn btn-default btn-block">Find us on Facebook </a></span>') : a = '<div class="screenreader noRecord ' + e.noRecord.strLangCls + '">' + e.noRecord.strNorecordlbl + "</div>", $("#" + s).html(a)
        }
    })
}

function fillIndiaStates(s, e) {
    var t = $("#hdnPrevSessionId").val(),
        a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillIndiaStates",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var r = t.result,
                l = t.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++) a = s == r[n].intStateId ? 'selected="selected"' : "", i += '<option value="' + r[n].intStateId + '" ' + a + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strStateName, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

function fillIndiaDistricts(s, e, t) {
    var a = $("#hdnPrevSessionId").val(),
        r = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillIndiaDistricts",
            hdnPrevSessionId: a,
            intStateId: e
        },
        success: function(e) {
            var a = e.result,
                l = e.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + a[l - 1].strAllcls + '">--' + a[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++) r = s == a[n].intDistId ? 'selected="selected"' : "", i += '<option value="' + a[n].intDistId + '" ' + r + ' class="screenreader ' + a[n].strClass + '">', i += a[n].strDistName, i += "</option>";
            $("#" + t).html(i)
        }
    })
}

function fillQualification(s, e) {
    var t = $("#hdnPrevSessionId").val(),
        a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillQualification",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var r = t.result,
                l = t.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++) a = s == r[n].intQualifyValue ? 'selected="selected"' : "", i += '<option value="' + r[n].intQualifyValue + '" ' + a + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strQualification, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

/*function uploadFileToTemp(s, e, t, a, r, l, i, n, c, o, d) {
    var u = $("#hdnPrevSessionId").val();
    if (!IsCheckFile(e, "Invalid File Type", a)) return $("#" + t).val(""), !1;
    if (!chkFileSize(e, l, i, n)) return $("#" + t).val(""), !1;
    $("#" + r).show();
    var v = $("#" + t).val();
    return $("#btnSubmitSkill").attr("disable", !0), $.ajaxFileUpload({
        url: siteUrl + "/proxy",
        secureuri: !1,
        fileElementId: e,
        dataType: "json",
        data: {
            method: "uploadToTemp",
            filename: e,
            fName: s,
            hdnVal: v,
            hdnPrevSessionId: u
        },
        success: function(s) {
            if ("0" != s.status) return viewAlert(s.msg), $("#" + r).hide(), !1;
            2 == o ? (top.$("#" + t).val(s.savedFileName), top.$("#" + d).show()) : ($("#" + t).val(s.savedFileName), $("#" + d).show()), "" != c && (2 == o ? top.$("#" + c).attr("src", s.filePath + s.savedFileName) : $("#" + c).attr("src", s.filePath + s.savedFileName)), $("#" + r).hide(), $("#btnSubmitSkill").attr("disable", !1)
        },
        error: function(s, e, t) {
            console.log(s + "====" + t), alert(t)
        }
    }), !1
}*/

function uploadFileToTemp(e,a,l,t,i,r,s,o,d,n,m){
    var p=$("#hdnPrevSessionId").val();
    $("#"+i).show();
    var u=$("#"+l).val();
    return $("#btnSubmitSkill").attr("disable",!0),$.ajaxFileUpload({url:siteUrl+"/proxy",
        secureuri:!1,
        fileElementId:a,
        dataType:"json",
        data:{method:"uploadToTemp",
        filename:a,
        fName:e,
        hdnVal:u,
        hdnPrevSessionId:p
    },
    success:function(e){if("0"!=e.status)return $("#"+l).val(""),$("#"+d).prop("src",siteUrl+"/images/demo-profile.png"),viewAlert(e.msg),$("#"+i).hide(),!1;2==n?(top.$("#"+l).val(e.savedFileName),top.$("#"+m).show()):($("#"+l).val(e.savedFileName),$("#"+m).show()),""!=d&&(2==n?top.$("#"+d).attr("src",e.filePath+e.savedFileName):$("#"+d).attr("src",e.filePath+e.savedFileName)),$("#"+i).hide(),$("#btnSubmitSkill").attr("disable",!1)},error:function(e,a,l){console.log(e+"===="+l),alert(l)}}),!1}


    function uploadFileToTempRegd(e,a,l,t,i,r,s,o,d,n,m){
    var p=$("#hdnPrevSessionId").val();
    $("#"+i).show();
    var u=$("#"+l).val();
    return $("#btnSubmitSkill").attr("disable",!0),$.ajaxFileUpload({url:siteUrl+"/proxy",
        secureuri:!1,
        fileElementId:a,
        dataType:"json",
        data:{method:"uploadToTempRegd",
        filename:a,
        fName:e,
        hdnVal:u,
        hdnPrevSessionId:p
    },
    success:function(e){if("0"!=e.status)return $("#"+l).val(""),$("#"+d).prop("src",siteUrl+"/images/demo-profile.png"),viewAlert(e.msg),$("#"+i).hide(),!1;2==n?(top.$("#"+l).val(e.savedFileName),top.$("#"+m).show()):($("#"+l).val(e.savedFileName),$("#"+m).show()),""!=d&&(2==n?top.$("#"+d).attr("src",e.filePath+e.savedFileName):$("#"+d).attr("src",e.filePath+e.savedFileName)),$("#"+i).hide(),$("#btnSubmitSkill").attr("disable",!1)},error:function(e,a,l){console.log(e+"===="+l),alert(l)}}),!1}


/*function loadVenueDetails() {
    var s = $("#hdnPrevSessionId").val(),
        e = $("#txtAckNo").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadVenueDetails",
            hdnPrevSessionId: s,
            strAckNo: e
        },
        success: function(s) {
            var e = s.result,
                t = "",
                a = "",
                r = "";
            if (s.result)
                for (var l = s.result.length, i = 0; i < l; i++) 0 != i && a == e[i].strAckNo && r == e[i].strMobileNo || (t += '<div class="clear30"></div><h5 class="cyan"> <span class="screenreader">' + e[i].strName + " (" + e[i].strAckNo + ")</span><small>Email : " + e[i].strMailId + ", Mobile No : " + e[i].strMobileNo + "</small></h5>"), t += '<ul class="courseul">', t += "   <li>", t += '   <span class="screenreader greysm display-block " tabindex="93">Skill</span>', t += '       <span class="screenreader " > <span class="">' + e[i].strSkill + "</span></span>", t += "   </li>", t += "    <li>", t += '       <span class="screenreader greysm display-block " tabindex="95">Date & Time</span>', t += '       <span class="screenreader " >' + e[i].strExamdate + " ," + e[i].strExamtime + "</span>", t += "   </li>", t += "   <li>", t += '       <span class="screenreader greysm display-block " tabindex="97">Venue</span>', t += '       <span class="screenreader " >', t += "          " + e[i].strVenueAddress, t += "       </span> ", t += "   </li> ", t += "</ul>", 0 != i && (t += '<div class="clearfix"></div>'), a = e[i].strAckNo, r = e[i].strMobileNo;
            else t = '<div class="screenreader noRecord ' + s.noRecord.strLangCls + '">' + s.noRecord.strNorecordlbl + "</div>";
            $("#dispVenueRes").html(t)
        }
    })
}*/

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
                        tabDiv += '<div class="clear30"></div><h5 class="cyan"> <span class="screenreader">' + res[i].strName + ' (' + res[i].strAckNo + ')</span></h5>';
                    }

                    tabDiv += '<ul class="courseul">';
                    tabDiv += '    <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="95"><strong>Email : </strong></span>';
                    tabDiv += '       <span class="screenreader " >' + res[i].strMailId + '</span>';
                    tabDiv += '   </li>';
                    tabDiv += '    <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="95"><strong>Mobile No :</strong></span>';
                    tabDiv += '       <span class="screenreader " >' + res[i].strMobileNo +'</span>';
                    tabDiv += '   </li>';
                    tabDiv += '   <li>';
                    tabDiv += '   <span class="screenreader greysm display-block " tabindex="93"><strong>Skill :</strong></span>';
                    tabDiv += '       <span class="screenreader " > <span class="">' + res[i].strSkill + '</span></span>';
                    tabDiv += '   </li>';
                    tabDiv += '    <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="95"><strong>Date & Time :</strong></span>';
                    tabDiv += '       <span class="screenreader " >' + res[i].strExamdate + ' ,' + res[i].strExamtime + '</span>';
                    tabDiv += '   </li>';
                    tabDiv += '   <li>';
                    tabDiv += '       <span class="screenreader greysm display-block " tabindex="97"><strong>Venue :</strong></span>';

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

function getEmployerSpeak(s) {
    var e = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getEmployerSpeak",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var t = e.empRes,
                a = "";
            if (t) {
                if ("" != t.strDesc && null != t.strDesc) var r = t.strDesc;
                a += '\n  <a href="javascript:void(0);" onClick="goToEmpSpeak(' + t.intemployerId + ');">              <div class="hovereffect"><div class="imgparents"><img class="img-responsive" src="' + appURL + "/uploadDocuments/messageBoard/" + t.strImageFile + '" alt=""> </div><div class="overlay"> </div></div>\n                \n                <div class="card-body">\n                <p class="card-text"><small class="text-muted ' + t.readMoreLblCls + '"><i class="icon-RoleModel"></i> ' + t.strEmpSpeakLevel + '</small> </p>\n\n<h3 class="' + t.strClass + '">' + t.strName + '</h3><footer class="blockquote-footer ' + t.strDesigClass + '">' + t.strDesig + '</footer>\n                <p class="card-text ' + t.strDescClass + '">' + r + '</p>\n\n                       <a href="javascript:void(0);" onClick="goToEmpSpeak(' + t.intemployerId + ');" class="purplebtn hvr-grow ' + t.readMoreLblCls + '">' + t.readMoreLbl + '<i class="fa fa-chevron-right"></i> </a></div></a>'
            }
            $("#" + s).html(a)
        }
    })
}

function getSuccessStories(s) {
    var e = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageStory",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var t = e.successStory,
                a = "";
            if (t) {
                if ("" != t.strDesc && null != t.strDesc) var r = t.strDesc;
                a += '<a href="' + siteUrl + "/success-stories-details/" + t.strAlias + '"><div class="hovereffect"> <div class="imgparents"><img class="img-responsive" src="' + appURL + "/uploadDocuments/ThumbImage/Stories/" + t.strImageFile + '" alt=""> </div><div class="overlay"> </div></div>\n                <div class="card-body">\n                <p class="card-text"><small class="text-muted ' + t.langCls + '"><i class="icon-successstory"></i> ' + t.strHeading + '</small> </p>\n <h3 class="' + t.langCls + '">' + t.strName + '</h3><footer class="blockquote-footer ' + t.strDesigClass + '">' + t.strDesig + '</footer>\n                <p class="card-text mrgn90 ' + t.strDesClass + '">' + r + '</p>\n\n<a href="' + siteUrl + "/success-stories-details/" + t.strAlias + '" class="purplebtn hvr-grow ' + t.langCls + '">' + t.readMoreLbl + '<i class="fa fa-chevron-right"></i> </a></div></a>'
            }
            $("#" + s).html(a)
        }
    })
}

function getHomeGallery(s) {
    var e = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomepageGallery",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var t = e.galleryCat,
                a = "";
            if (t) {
                if ("" != t.strDesc && null != t.strDesc) var r = t.strDesc;
                a += '<a href="' + siteUrl + "/gallery-details/" + t.intCategoryId + '"><div class="hovereffect"><div class="imgparents"><img class="img-responsive" src="' + t.strImageFile + '" alt=""> </div><div class="overlay"> </div></div>\n                <div class="card-body">\n                <p class="card-text"><small class="text-muted ' + t.strHeadClass + '"><i class="icon-PhotoEssay"></i> ' + t.strHeading + '</small> </p>\n <h3 class="' + t.strHeadClass + '">' + t.txtName + '</h3>\n                <p class="card-text mrgn90 ' + t.strDescClass + '">' + r + '</p>\n\n<a href="' + siteUrl + "/gallery-details/" + t.intCategoryId + '" class="purplebtn hvr-grow ' + t.strHeadClass + '">' + t.strViewAlbumlbl + '<i class="fa fa-chevron-right"></i> </a></div></a>'
            }
            $("#" + s).html(a)
        }
    })
}

function getHomepageBlog(s) {
    var e = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getLatestBlog",
            hdnPrevSessionId: e
        },
        success: function(e) {
            var t = e.blogRes,
                a = "";
            if (t) {
                if ("" != t.strDesc && null != t.strDesc) var r = wardWrap(t.strDesc, 100);
                void 0 === r && (r = ""), a += '<a href="' + siteUrl + "/biswabijayee/" + t.intNewsId + '"><div class="hovereffect"><div class="imgparents"><img class="img-responsive" src="' + t.strImageFile + '" alt=""> </div><div class="overlay"> </div></div>\n                <div class="card-body innews">\n<p class="card-text"><small class="text-muted ' + t.strHeadClass + '"><i class="icon-BlogPost"></i>&nbsp;' + t.strHeading + '</small> </p>\n                <h4 class="odia">' + t.strHeadline + '</h4>\n                <p class="card-text mrgn90 odia">' + r + '</p>\n\n<a href="' + siteUrl + "/biswabijayee/" + t.intNewsId + '" class="purplebtn hvr-grow ' + t.strHeadClass + '">' + t.readMoreLbl + '<i class="fa fa-chevron-right"></i> </a></div></a>'
            }
            $("#" + s).html(a)
        }
    })
}

function getInFocusDetails(s, e) {
    $("#" + s).html('<div class="course-loader"><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>'), a = $("#hdnPrevSessionId").val(), $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "getHomeFocusDetails",
            focusId: e,
            hdnPrevSessionId: a
        },
        success: function(e) {
            var t = e.FocusDetail,
                a = "";
            if (t) {
                if ("" != t.strDesc && null != t.strDesc) var r = t.strDesc;
                var l = t.strImageFile;
                a += '<div class="modal-dialog modal-lg">\n        <div class="modal-content">\n            <div class="modal-header">\n                <h4 class="modal-title ' + t.txtTitleCls + '">' + t.txtTitle + '</h4>\n                <button type="button" class="close" data-dismiss="modal">&times;</button>\n            </div>\n            <div class="modal-body">\n                <div class="homecard">\n                    <div class="listimg"> <img src="' + l + '" alt="' + t.txtTitle + '"> </div>\n                    <div class="homebody">\n                        <h5 class="mt-0 ' + t.txtTitleCls + '">' + t.txtName + '</h5>\n                        <small class="text-muted ' + t.txtNamecls + '">' + t.txtTitle + '</small> </div>\n                    <div class="clearfix"></div>\n                    <p>' + r + "</p>\n                </div>\n            </div>\n        </div>\n    </div>"
            }
            $("#" + s).html(a), $
        }
    })
}

function fillBlocks(s, e, t) {
    var a = $("#hdnPrevSessionId").val(),
        r = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillBlocks",
            hdnPrevSessionId: a,
            intDistId: e
        },
        success: function(e) {
            var a = e.result,
                l = e.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + a[l - 1].strAllcls + '">--' + a[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++) r = s == a[n].intBlockId ? 'selected="selected"' : "", i += '<option value="' + a[n].intBlockId + '" ' + r + ' class="screenreader ' + a[n].strClass + '">', i += a[n].strBlockName, i += "</option>";
            $("#" + t).html(i)
        }
    })
}

/*function fillSkillInstitutes(s, e, t, a, r, l) {
    $("#" + s).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var i = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillSkillInstitute",
            instituteName: e,
            qualId: l,
            hdnPrevSessionId: i,
            type: "cssSelect"
        },
        success: function(l) {
            var i = l.result,
                n = "'",
                c = "";
            if ((null != l.result || "" != l.result ? i.length : 0) > 0) {
                for (var o = l.result.length, d = 0; d < o; d++) t > 0 && t == i[d].intInsId ? ($("#txtAcademicInstitute").val(i[d].strInsName), c += '<div class="screenreader resultList ' + i[d].strClass + '" onclick="$(' + n + "#" + a + n + ").val(" + i[d].intInsId + ");$(" + n + ".resultList" + n + ").hide();$('#" + s + "').hide();$(" + n + "#" + r + n + ").val(" + n + i[d].strInsName + n + ');">' + i[d].strInsName + "</div>") : c += '<div class="screenreader resultList ' + i[d].strClass + '" onclick="$(' + n + "#" + a + n + ").val(" + i[d].intInsId + ");$(" + n + ".resultList" + n + ").hide();$('#" + s + "').hide();$(" + n + "#" + r + n + ").val(" + n + i[d].strInsName + n + ');">' + i[d].strInsName + "</div>";
                $("#" + s).html(c), $("#" + a).val(0), 0 == t && "" != e ? $("#" + s).show() : $("#" + s).hide()
            } else $("#" + s).hide(), $("#" + a).val(0)
        }
    })
}*/
function fillSkillInstitutes(fillCtrlId, instituteVal, selVal,hiddenId,txtFieldId,QualifyId)
{
    $("#" + fillCtrlId).html('<div align="center" ><img src="' + siteUrl + '/images/loading-blue.gif" alt="loading" /></div>');
    var hdnPrevSessionId = $('#hdnPrevSessionId').val();
    $.ajax({
        type: "POST",
        url: siteUrl + '/proxy',
        dataType: "json",
        data: {method: "fillSkillInstitute", instituteName: instituteVal,qualId:QualifyId,selVal:selVal, hdnPrevSessionId: hdnPrevSessionId,type:'cssSelect'},
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

function fillSkillQualification(s, e) {
    var t = $("#hdnPrevSessionId").val(),
        a = "";
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "fillSkillQualification",
            hdnPrevSessionId: t
        },
        success: function(t) {
            var r = t.result,
                l = t.result.length;
            if (l > 0)
                for (var i = '<option value="0" class="screenreader ' + r[l - 1].strAllcls + '">--' + r[l - 1].strAlllbl + "--</option>", n = 0; l > n; n++) a = s == r[n].intQualifyValue ? 'selected="selected"' : "", i += '<option value="' + r[n].intQualifyValue + '" ' + a + ' class="screenreader ' + r[n].strClass + '">', i += r[n].strQualification, i += "</option>";
            $("#" + e).html(i)
        }
    })
}

function loadPopularPages() {
    $.ajax({
        type: "POST",
        url: siteUrl + "/proxy",
        dataType: "json",
        data: {
            method: "loadPopularPages"
        },
        success: function(s) {
            var e = s.PagesHTML;
            "" != e && null != e && $("#popularPages").html(e)
        }
    })
}


//$.maintenanceStatusPai = function(controlId, typename)
function maintenanceStatusPai(controlId, typename)
{   
    host=window.location.host;
    siteUrl="https://"+host;
    var hdnPrevSessionId = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl+'/proxy',
        dataType: "json",
        data: {method:'maintenanceStatusPai',hdnPrevSessionId:hdnPrevSessionId},
        success: function(data){
            var count           = 0;
            var results         = data.StatusPai;

            if(results!=null){
                count           = data.StatusPai.length; 
            }
            var osda          = parseInt(results[0].institute);
            var ddu           = parseInt(results[1].institute);
            var pmkvy         = parseInt(results[2].institute);
            var pmkk          = parseInt(results[3].institute);
            if(results!=null){ 
                if(osda==0 && ddu==0 && pmkvy==0 && pmkk==0){
                    $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
                }else{
                    $('#'+controlId).highcharts({    

                        colors: ['#52BE80', '#A04000', '#F7DC6F','#800080'],
                        chart: {
                                type: 'pie'
                                },
                        exporting: { enabled: false }, 
                        title: {
                            text: typename
                        },
                        /*tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f} </b>'
                        },*/
                        tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                footerFormat: '</table>'
            },
                       /* plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },*/

                        plotOptions: {
                            series: {
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.name}: {point.y}'
                                }
                            }
                        },
    
                        series: [{
                            name: '',
                            colorByPoint: true,
                            data: [{
                                name: pltp,
                                y: osda,
                            }, {
                                name: ddugky,
                                y: ddu,
                            }, {
                                name: pmkvy1,
                                y: pmkvy,
                            }, {
                                name: pmkk1,
                                y: pmkk,
                            }]
                        }]
                    });
                }
            } else { 
                $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
            }      
        }
    });
}


function sectorWiseCourses(controlId, typename)
{ 
    host=window.location.host;
    siteUrl="https://"+host;
    var hdnPrevSessionId = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl+'/proxy',
        dataType: "json",
        data: {method:'sectorWiseCourses',hdnPrevSessionId:hdnPrevSessionId},
        success: function(data){
            var count           = 0;
            var results         = data;
            
            if(results!=null){
                count           = data.length; 
            }
            
            var sectorName      = eval(results.SectorName);
            var courCount       = eval(results.SectorCount);
            
            if(results!=null){ 
                if(sectorName==0 && courCount==0){
                    $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
                }else{
                    $('#'+controlId).highcharts({    
                        chart: {
                                type: 'bar'
                                },
                        exporting: { enabled: false }, 
                        title: {
                            text: typename
                        },
                         xAxis: {
                            categories: sectorName,
                            title: {
                              text: '<strong>'+sectorN+'</strong>'
                            }
                          },
                          yAxis: {
                            tickInterval : 5,
                            min: 0,
                            title: {
                              text: '<strong>'+noOfCourses+'</strong>',
                            }
                          },
                        plotOptions: {
                            bar: {
                              dataLabels: {
                                enabled: true
                              }
                            }
                          },
                           legend: {
                            enabled: false
                          },
                          credits: {
                            enabled: false
                          },
                        series: [{
                            color: '#8C1EEE',
                            name: courses,
                            data: courCount
                          }]
                    });
                }
            } else { 
                $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
            }      
        }
    });
}

function districtWiseITIInstitute(controlId, typename)
{ 
    host=window.location.host;
    siteUrl="https://"+host;
    var hdnPrevSessionId = $("#hdnPrevSessionId").val();
    $.ajax({
        type: "POST",
        url: siteUrl+'/proxy',
        dataType: "json",
        data: {method:'districtWiseITIInstitute',hdnPrevSessionId:hdnPrevSessionId},
        success: function(data){
            var count           = 0;
            var results         = data;
            
            if(results!=null){
                count           = data.length; 
            }
            
            var districtName      = eval(results.DistrictName);
            var instCount         = eval(results.InstituteCount);

            if(results!=null){ 
                if(districtName==0 && instCount==0){
                    $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
                }else{
                    $('#'+controlId).highcharts({    
                        chart: {
                                type: 'column'
                                }, 
                        title: {
                            text: typename
                        },
                           xAxis: {
                            type: 'category',
                            labels: {
                              rotation: -45,
                              style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                              }
                            }
                          },
                          yAxis: {
                            tickInterval : 10,
                            min: 0,
                            title: {
                              text: '<strong>'+noOfITI+'</strong>'
                            }
                          },

                       legend: {
                            enabled: false
                          },
                        series: [{
                            name: institute,
                            data: districtName,
                            dataLabels: {
                              enabled: true,
                              rotation: -90,
                              color: '#000',
                              align: 'right',
                              y: -15, 
                              style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                              }
                            }
                          }]
                    });
                }
            } else { 
                $('#'+controlId).html('<div class="noRecord">No Record Found</div>');
            }      
        }
    });
}


/*
    Function to fill Govt. ITI.
    By: Rahul Kumar Saw
    On: 28-Nov-2019
    */
       function fillITI(selVal,fillCtrlId)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            var tabDiv='<option value="0">--Select--</option>';
           var selected='';
            $.ajax({
                 type: "POST",
                 url: siteUrl+'/proxy',
                 dataType: "json",
                 data: {method: "fillITI",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;

                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intInstituteId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intInstituteId+'" '+selected+'>';
                             tabDiv+= res[i].strInstituteName;
                             tabDiv+='</option>'; 
                         }
                    }

                     $("#"+fillCtrlId).html(tabDiv);                
                 }
            });

       }


/*
    Function to fill Training Center.
    By: Rahul Kumar Saw
    On: 28-Nov-2019
    */
       function fillTrainingCenter(selVal,fillCtrlId)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            var tabDiv='<option value="0">--Select--</option>';
           var selected='';
            $.ajax({
                 type: "POST",
                 url: siteUrl+'/proxy',
                 dataType: "json",
                 data: {method: "fillTrainingCenter",hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;

                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intInstituteId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intInstituteId+'" '+selected+'>';
                             tabDiv+= res[i].strInstituteName;
                             tabDiv+='</option>'; 
                         }
                    }

                     $("#"+fillCtrlId).html(tabDiv);                
                 }
            });

       } 

  /*
    Function to fill Trade Name.
    By: Rahul Kumar Saw
    On: 28-Nov-2019
    */
       function fillTrade(selVal,fillCtrlId,instituteId)
       { 
            var hdnPrevSessionId            = $('#hdnPrevSessionId').val();
            var tabDiv='<option value="0">--Select--</option>';
           var selected='';
            $.ajax({
                 type: "POST",
                 url: siteUrl+'/proxy',
                 dataType: "json",
                 data: {method: "fillTrade",instituteId:instituteId,hdnPrevSessionId:hdnPrevSessionId},
                 success: function (data)
                 {
                    var res = data.result;
                    var totalRecord = data.result.length;

                    if(totalRecord>0){
                         for (var i=0;i<totalRecord;i++)
                         {                            
                            if(selVal==res[i].intCourseId)
                              selected='selected="selected"';
                            else
                              selected='';
                             tabDiv+='<option value="'+res[i].intCourseId+'" '+selected+'>';
                             tabDiv+= res[i].strCourseName;
                             tabDiv+='</option>'; 
                         }
                    }

                     $("#"+fillCtrlId).html(tabDiv);                
                 }
            });

       }           
