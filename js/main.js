jQuery(document).ready(function(e) {
    if (e(window).scroll(function() {
            e(this).scrollTop() > 100 ? e(".back-to-top").fadeIn("slow") : e(".back-to-top").fadeOut("slow")
        }), e(".back-to-top").click(function() {
            return e("html, body").animate({
                scrollTop: 0
            }, 1e3), !1
        }), e(".nav-menu").superfish({
            animation: {
                opacity: "show"
            },
            speed: 400
        }), e("#nav-menu-container").length) {
        var o = e("#nav-menu-container").clone().prop({
            id: "mobile-nav"
        });
        o.find("> ul").attr({
            class: "",
            id: ""
        }), e("body").append(o), e("body").prepend('<button type="button" id="mobile-nav-toggle" aria-label="menu-toggle"><i class="fa fa-bars"></i></button>'), e("body").append('<div id="mobile-body-overly"></div>'), e("#mobile-nav").find(".menu-has-children").prepend('<i class="fa fa-chevron-down"></i>'), e(document).on("click", ".menu-has-children i", function(o) {
            e(this).next().toggleClass("menu-item-active"), e(this).nextAll("ul").eq(0).slideToggle(), e(this).toggleClass("fa-chevron-up fa-chevron-down")
        }), e(document).on("click", "#mobile-nav-toggle", function(o) {
            e("body").toggleClass("mobile-nav-active"), e("#mobile-nav-toggle i").toggleClass("fa-times fa-bars"), e("#mobile-body-overly").toggle()
        }), e(document).click(function(o) {
            var a = e("#mobile-nav, #mobile-nav-toggle");
            a.is(o.target) || 0 !== a.has(o.target).length || e("body").hasClass("mobile-nav-active") && (e("body").removeClass("mobile-nav-active"), e("#mobile-nav-toggle i").toggleClass("fa-times fa-bars"), e("#mobile-body-overly").fadeOut())
        })
    } else e("#mobile-nav, #mobile-nav-toggle").length && e("#mobile-nav, #mobile-nav-toggle").hide();
    e(".nav-menu a, #mobile-nav a, .scrollto").on("click", function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var o = e(this.hash);
            if (o.length) {
                var a = 0;
                return e("#header").length && (a = e("#header").outerHeight(), e("#header").hasClass("header-fixed") || (a -= 20)), e("html, body").animate({
                    scrollTop: o.offset().top - a
                }, 1500, "easeInOutExpo"), e(this).parents(".nav-menu").length && (e(".nav-menu .menu-active").removeClass("menu-active"), e(this).closest("li").addClass("menu-active")), e("body").hasClass("mobile-nav-active") && (e("body").removeClass("mobile-nav-active"), e("#mobile-nav-toggle i").toggleClass("fa-times fa-bars"), e("#mobile-body-overly").fadeOut()), !1
            }
        }
    }), e(window).scroll(function() {
        e(this).scrollTop() > 100 ? e("#header").addClass("header-scrolled") : e("#header").removeClass("header-scrolled")
    }), e(".skip-to-content").click(function() {
        e("#header").addClass("header-scrolled")
    }), e(".enquiry-form-container .osda--btn").click(function() {
        e(".enquiry-form").toggleClass("formToggle")
    }), e(".form-close").click(function() {
        e(".enquiry-form").toggleClass("formToggle")
    }), e(".socialIconBox").click(function() {
        e(".socialIconBox .icons").toggleClass("open"), e(".floatingSocial").toggleClass("open")
    })
});