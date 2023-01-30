var myapp_get_color = {
    primary_50: "#bfc8df",
    primary_100: "#aeb9d7",
    primary_200: "#9daace",
    primary_300: "#8c9cc6",
    primary_400: "#7b8dbd",
    primary_500: "#6a7eb5",
    primary_600: "#596fad",
    primary_700: "#4e639e",
    primary_800: "#46598d",
    primary_900: "#3d4e7c",
    success_50: "#7aec94",
    success_100: "#63e982",
    success_200: "#4de570",
    success_300: "#37e25e",
    success_400: "#21df4c",
    success_500: "#1dc944",
    success_600: "#1ab33c",
    success_700: "#179c35",
    success_800: "#13862d",
    success_900: "#107026",
    info_50: "#78ebd1",
    info_100: "#62e8c9",
    info_200: "#4ce5c2",
    info_300: "#35e2ba",
    info_400: "#20ddb2",
    info_500: "#1dc7a0",
    info_600: "#1ab18e",
    info_700: "#179a7c",
    info_800: "#13846a",
    info_900: "#106e58",
    warning_50: "#fff1c1",
    warning_100: "#ffeca7",
    warning_200: "#ffe68e",
    warning_300: "#ffe074",
    warning_400: "#ffdb5b",
    warning_500: "#ffd541",
    warning_600: "#ffcf28",
    warning_700: "#ffca0e",
    warning_800: "#f4be00",
    warning_900: "#daaa00",
    danger_50: "#ffc1c1",
    danger_100: "#ffa8a7",
    danger_200: "#ff8f8e",
    danger_300: "#ff7574",
    danger_400: "#ff5c5b",
    danger_500: "#ff4341",
    danger_600: "#ff2a28",
    danger_700: "#ff110e",
    danger_800: "#f40300",
    danger_900: "#da0200",
    fusion_50: "#909090",
    fusion_100: "#838383",
    fusion_200: "#767676",
    fusion_300: "dimgray",
    fusion_400: "#5d5d5d",
    fusion_500: "#505050",
    fusion_600: "#434343",
    fusion_700: "#363636",
    fusion_800: "#2a2a2a",
    fusion_900: "#1d1d1d"
}
    , myapp_config = {
        VERSION: "4.0.1",
        root_: $("body"),
        root_logo: $(".page-sidebar > .page-logo"),
        throttleDelay: 450,
        filterDelay: 150,
        thisDevice: null,
        isMobile: /iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()),
        mobileMenuTrigger: null,
        mobileResolutionTrigger: 992,
        isWebkit: !0 == (!!window.chrome && !!window.chrome.webstore) || 0 < Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor") == !0,
        isChrome: /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()),
        isIE: 0 < window.navigator.userAgent.indexOf("Trident/") == !0,
        debugState: 0,
        rippleEffect: !0,
        mythemeAnchor: "#mytheme",
        navAnchor: $("#js-primary-nav"),
        navHooks: $("#js-nav-menu"),
        navAccordion: !0,
        navInitalized: "js-nav-built",
        navFilterInput: $("#nav_filter_input"),
        navHorizontalWrapperId: "js-nav-menu-wrapper",
        navSpeed: 500,
        navClosedSign: "fal fa-angle-down",
        navOpenedSign: "fal fa-angle-up",
        appDateHook: $(".js-get-date"),
        storeLocally: !0,
        jsArray: [],
        hostname: $("meta[name=hostname]").attr("content"),
        appUrl: $("meta[name=app-url]").attr("content"),
        assetsUrl: $("meta[name=assets-url]").attr("content"),
        __DEV__: "dev" === $('meta[name="environment"]').attr("content")
    };
!function (o) {
    o.fn.extend({
        navigation: function (e) {
            var a = o.extend({
                accordion: !0,
                animate: "easeOutExpo",
                speed: 200,
                closedSign: "[+]",
                openedSign: "[-]",
                initClass: "js-nav-built"
            }, e)
                , t = o(this);
            t.hasClass(a.initClass) ? myapp_config.debugState && console.log(t.get(0) + " this menu already exists") : (t.addClass(a.initClass),
                t.find("li").each(function () {
                    0 !== o(this).find("ul").length && (o(this).find("a:first").append("<b class='collapse-sign'>" + a.closedSign + "</b>"),
                        "#" == o(this).find("a:first").attr("href") && o(this).find("a:first").click(function () {
                            return !1
                        }))
                }),
                t.find("li.active").each(function () {
                    o(this).parents("ul").parent("li").find("a:first").attr("aria-expanded", !0).find("b:first").html(a.openedSign)
                }),
                t.find("li a").on("mousedown", function (e) {
                    0 !== o(this).parent().find("ul").length && (a.accordion && (o(this).parent().find("ul").is(":visible") || (parents = o(this).parent().parents("ul"),
                        visible = t.find("ul:visible"),
                        visible.each(function (t) {
                            var n = !0;
                            parents.each(function (e) {
                                if (parents[e] == visible[t])
                                    return n = !1
                            }),
                                n && o(this).parent().find("ul") != visible[t] && o(visible[t]).slideUp(a.speed + 300, a.animate, function () {
                                    o(this).parent("li").removeClass("open").find("a:first").attr("aria-expanded", !1).find("b:first").html(a.closedSign),
                                        myapp_config.debugState && console.log("nav item closed")
                                })
                        }))),
                        o(this).parent().find("ul:first").is(":visible") && !o(this).parent().find("ul:first").hasClass("active") ? o(this).parent().find("ul:first").slideUp(a.speed + 100, a.animate, function () {
                            o(this).parent("li").removeClass("open").find("a:first").attr("aria-expanded", !1).find("b:first").delay(a.speed).html(a.closedSign),
                                myapp_config.debugState && console.log("nav item closed")
                        }) : o(this).parent().find("ul:first").slideDown(a.speed, a.animate, function () {
                            o(this).parent("li").addClass("open").find("a:first").attr("aria-expanded", !0).find("b:first").delay(a.speed).html(a.openedSign),
                                myapp_config.debugState && console.log("nav item opened")
                        }))
                }))
        },
        navigationDestroy: function () {
            self = o(this),
                self.hasClass(myapp_config.navInitalized) ? (self.find("li").removeClass("active open"),
                    self.find("li a").off("mousedown").removeClass("active").removeAttr("aria-expanded").find(".collapse-sign").remove(),
                    self.removeClass(myapp_config.navInitalized).find("ul").removeAttr("style"),
                    myapp_config.debugState && console.log(self.get(0) + " destroyed")) : console.log("menu does not exist")
        }
    })
}(jQuery, window, document),
    function (p) {
        var d = "menuSlider";
        function o(e, n) {
            var t, a, o, i, s = p(e), l = e;
            function r(e) {
                void 0 !== n[e] && n[e].call(l)
            }
            function c() {
                t = p("#" + n.wrapperId).outerWidth(),
                    o = p.map(s.children("li:not(.nav-title)"), function (e) {
                        return p(e).outerWidth(!0)
                    }).reduce(function (e, t) {
                        return e + t
                    }, 0),
                    a = parseFloat(s.css("margin-left"))
            }
            return n = p.extend({}, p.fn[d].defaults, n),
                s.css("margin-left", "0px"),
                s.wrap('<div id="' + n.wrapperId + '" class="nav-menu-wrapper d-flex flex-grow-1 width-0 overflow-hidden"></div>'),
                p("#" + n.wrapperId).before('<a href="#" id="' + n.wrapperId + '-left-btn" class="d-flex align-items-center justify-content-center width-4 btn mt-1 mb-1 mr-2 ml-1 p-0 fs-xxl text-primary"><i class="fal fa-angle-left"></i></a>'),
                p("#" + n.wrapperId).after('<a href="#" id="' + n.wrapperId + '-right-btn" class="d-flex align-items-center justify-content-center width-4 btn mt-1 mb-1 mr-1 ml-2 p-0 fs-xxl text-primary"><i class="fal fa-angle-right"></i></a>'),
                p.map(s.children("li:not(.nav-title)"), function (e) {
                    return p(e).outerWidth(!0)
                }),
                p("#" + n.wrapperId + "-left-btn").click(function (e) {
                    c(),
                        a < 0 ? i = Math.min(a + t, 0) : (i = a,
                            console.log("left end")),
                        s.css({
                            marginLeft: i
                        }),
                        e.preventDefault()
                }),
                p("#" + n.wrapperId + "-right-btn").click(function (e) {
                    c(),
                        -a + t < o ? i = Math.max(a - t, -(o - t)) : (i = a,
                            console.log("right end")),
                        s.css({
                            marginLeft: i
                        }),
                        e.preventDefault()
                }),
                r("onInit"),
            {
                option: function (e, t) {
                    if (!t)
                        return n[e];
                    n[e] = t
                },
                destroy: function (e) {
                    s.each(function () {
                        var e = p(this);
                        e.css("margin-left", "0px"),
                            e.unwrap(parent),
                            e.prev().off().remove(),
                            e.next().off().remove(),
                            r("onDestroy"),
                            e.removeData("plugin_" + d)
                    })
                }
            }
        }
        p.fn[d] = function (e) {
            if ("string" == typeof e) {
                var t, n = e, a = Array.prototype.slice.call(arguments, 1);
                return this.each(function () {
                    if (!p.data(this, "plugin_" + d) || "function" != typeof p.data(this, "plugin_" + d)[n])
                        throw new Error("Method " + n + " does not exist on jQuery." + d);
                    t = p.data(this, "plugin_" + d)[n].apply(this, a)
                }),
                    void 0 !== t ? t : this
            }
            if ("object" == typeof e || !e)
                return this.each(function () {
                    p.data(this, "plugin_" + d) || p.data(this, "plugin_" + d, new o(this, e))
                })
        }
            ,
            p.fn[d].defaults = {
                onInit: function () { },
                onDestroy: function () { },
                element: myapp_config.navHooks,
                wrapperId: myapp_config.navHorizontalWrapperId
            }
    }(jQuery);
var initApp = function (e) {
    return e.listFilter = function (n, e, t) {
        t ? $(t).addClass("js-list-filter") : $(n).addClass("js-list-filter"),
            $(e).change(function () {
                var e = $(this).val().toLowerCase()
                    , t = $(n).next().filter(".js-filter-message");
                return 1 < e.length ? ($(n).find($("[data-filter-tags]:not([data-filter-tags*='" + e + "'])")).parentsUntil(n).removeClass("js-filter-show").addClass("js-filter-hide"),
                    $(n).find($("[data-filter-tags*='" + e + "']")).parentsUntil(n).removeClass("js-filter-hide").addClass("js-filter-show"),
                    t && t.text("showing " + $(n).find("li.js-filter-show").length + " from " + $(n).find("[data-filter-tags]").length + " total")) : ($(n).find("[data-filter-tags]").parentsUntil(n).removeClass("js-filter-hide js-filter-show"),
                        t && t.text("")),
                    !1
            }).keyup($.debounce(myapp_config.filterDelay, function (e) {
                $(this).change()
            }))
    }
        ,
        e.loadScript = function (e, t) {
            if (myapp_config.jsArray[e])
                myapp_config.debugState && console.log("This script was already loaded: " + e);
            else {
                var n = jQuery.Deferred()
                    , a = document.getElementsByTagName("body")[0]
                    , o = document.createElement("script");
                o.type = "text/javascript",
                    o.src = e,
                    o.onload = function () {
                        n.resolve()
                    }
                    ,
                    a.appendChild(o),
                    myapp_config.jsArray[e] = n.promise()
            }
            myapp_config.jsArray[e].then(function () {
                "function" == typeof t && t()
            })
        }
        ,
        e.saveSettings = function () {
            "undefined" != typeof saveSettings && $.isFunction(saveSettings) && myapp_config.storeLocally ? (initApp.accessIndicator(),
                saveSettings(),
                myapp_config.debugState && console.log("Theme settings: \n" + localStorage.getItem("themeSettings"))) : console.log("save function does not exist")
        }
        ,
        e.resetSettings = function () {
            myapp_config.root_.removeClass(function (e, t) {
                return (t.match(/(^|\s)(nav-|header-|mod-|display-)\S+/g) || []).join(" ")
            }),
                $(myapp_config.mythemeAnchor).attr("href", ""),
                initApp.checkNavigationOrientation(),
                initApp.saveSettings(),
                myapp_config.debugState && console.log("App reset successful")
        }
        ,
        e.factoryReset = function () {
            initApp.playSound(myapp_config.assetsUrl + "/media/sound", "messagebox"),
                $(".js-modal-settings").modal("hide"),
                "undefined" != typeof bootbox ? bootbox.confirm({
                    title: "<i class='fal fa-exclamation-triangle text-warning mr-2'></i> You are about to reset all of your localStorage settings",
                    message: "<span><strong>Warning:</strong> This action is not reversable. You will lose all your layout settings.</span>",
                    centerVertical: !0,
                    swapButtonOrder: !0,
                    buttons: {
                        confirm: {
                            label: "Factory Reset",
                            className: "btn-warning shadow-0"
                        },
                        cancel: {
                            label: "Cancel",
                            className: "btn-success"
                        }
                    },
                    className: "modal-alert",
                    closeButton: !1,
                    callback: function (e) {
                        1 == e && (localStorage.clear(),
                            initApp.resetSettings(),
                            location.reload())
                    }
                }) : confirm("You are about to reset all of your localStorage to null state. Do you wish to continue?") && (localStorage.clear(),
                    initApp.resetSettings(),
                    location.reload()),
                myapp_config.debugState && console.log("App reset successful")
        }
        ,
        e.accessIndicator = function () {
            myapp_config.root_.addClass("saving").delay(600).queue(function () {
                return $(this).removeClass("saving").dequeue(),
                    !0
            })
        }
        ,
        e.pushSettings = function (e, t) {
            return 0 != t && localStorage.setItem("themeSettings", ""),
                myapp_config.root_.addClass(e),
                initApp.checkNavigationOrientation(),
                0 != t && initApp.saveSettings(),
                e
        }
        ,
        e.getSettings = function () {
            return myapp_config.root_.attr("class").split(/[^\w-]+/).filter(function (e) {
                return /^(nav|header|mod|display)-/i.test(e)
            }).join(" ")
        }
        ,
        e.playSound = function (e, t) {
            var n = document.createElement("audio");
            navigator.userAgent.match("Firefox/") ? n.setAttribute("src", e + "/" + t + ".ogg") : n.setAttribute("src", e + "/" + t + ".mp3"),
                n.addEventListener("load", function () {
                    n.play()
                }, !0),
                n.pause(),
                n.play()
        }
        ,
        e.detectBrowserType = function () {
            return myapp_config.isChrome ? (myapp_config.root_.addClass("chrome webkit"),
                "chrome webkit") : myapp_config.isWebkit ? (myapp_config.root_.addClass("webkit"),
                    "webkit") : myapp_config.isIE ? (myapp_config.root_.addClass("ie"),
                        "ie") : void 0
        }
        ,
        e.addDeviceType = function () {
            return myapp_config.isMobile ? (myapp_config.root_.addClass("mobile"),
                myapp_config.thisDevice = "mobile") : (myapp_config.root_.addClass("desktop"),
                    myapp_config.thisDevice = "desktop"),
                myapp_config.thisDevice
        }
        ,
        e.windowScrollEvents = function () {
            myapp_config.root_.is(".nav-function-hidden.header-function-fixed:not(.nav-function-top)") && "desktop" === myapp_config.thisDevice ? myapp_config.root_logo.css({
                top: $(window).scrollTop()
            }) : myapp_config.root_.is(".header-function-fixed:not(.nav-function-top):not(.nav-function-hidden)") && "desktop" === myapp_config.thisDevice && myapp_config.root_logo.attr("style", "")
        }
        ,
        e.checkNavigationOrientation = function () {
            switch (!0) {
                case myapp_config.root_.hasClass("nav-function-fixed") && !myapp_config.root_.is(".nav-function-top, .nav-function-minify, .mod-main-boxed") && "desktop" === myapp_config.thisDevice:
                    void 0 !== $.fn.slimScroll ? (myapp_config.navAnchor.slimScroll({
                        height: "100%",
                        color: "#fff",
                        size: "4px",
                        distance: "4px",
                        railOpacity: .4,
                        wheelStep: 10
                    }),
                        document.getElementById(myapp_config.navHorizontalWrapperId) && (myapp_config.navHooks.menuSlider("destroy"),
                            myapp_config.debugState && console.log("----top controls destroyed")),
                        myapp_config.debugState && console.log("slimScroll created")) : console.log("$.fn.slimScroll...NOT FOUND");
                    break;
                case myapp_config.navAnchor.parent().hasClass("slimScrollDiv") && "desktop" === myapp_config.thisDevice && void 0 !== $.fn.slimScroll:
                    myapp_config.navAnchor.slimScroll({
                        destroy: !0
                    }),
                        myapp_config.navAnchor.attr("style", ""),
                        events = jQuery._data(myapp_config.navAnchor[0], "events"),
                        events && jQuery._removeData(myapp_config.navAnchor[0], "events"),
                        myapp_config.debugState && console.log("slimScroll destroyed")
            }
            switch (!0) {
                case $.fn.menuSlider && myapp_config.root_.hasClass("nav-function-top") && 0 == $("#js-nav-menu-wrapper").length && !myapp_config.root_.hasClass("mobile-view-activated"):
                    myapp_config.navHooks.menuSlider({
                        element: myapp_config.navHooks,
                        wrapperId: myapp_config.navHorizontalWrapperId
                    }),
                        myapp_config.debugState && console.log("----top controls created -- case 1");
                    break;
                case myapp_config.root_.hasClass("nav-function-top") && 1 == $("#js-nav-menu-wrapper").length && myapp_config.root_.hasClass("mobile-view-activated"):
                    myapp_config.navHooks.menuSlider("destroy"),
                        myapp_config.debugState && console.log("----top controls destroyed -- case 2");
                    break;
                case !myapp_config.root_.hasClass("nav-function-top") && 1 == $("#js-nav-menu-wrapper").length:
                    myapp_config.navHooks.menuSlider("destroy"),
                        myapp_config.debugState && console.log("----top controls destroyed -- case 3")
            }
        }
        ,
        e.buildNavigation = function (e) {
            if ($.fn.navigation)
                return $(e).navigation({
                    accordion: myapp_config.navAccordion,
                    speed: myapp_config.navSpeed,
                    closedSign: '<em class="' + myapp_config.navClosedSign + '"></em>',
                    openedSign: '<em class="' + myapp_config.navOpenedSign + '"></em>',
                    initClass: myapp_config.navInitalized
                }),
                    e;
            myapp_config.debugState && console.log("WARN: navigation plugin missing")
        }
        ,
        e.destroyNavigation = function (e) {
            if ($.fn.navigation)
                return $(e).navigationDestroy(),
                    e;
            myapp_config.debugState && console.log("WARN: navigation plugin missing")
        }
        ,
        e.appForms = function (t, n, e) {
            $(t).each(function () {
                var e = $(this).find(".form-control");
                e.on("focus", function () {
                    !function (e, t, n) {
                        $(e).parents(t).addClass(n)
                    }(this, t, n)
                }),
                    e.on("blur", function () {
                        !function (e, t, n) {
                            $(e).parents(t).removeClass(n)
                        }(this, t, n)
                    })
            })
        }
        ,
        e.mobileCheckActivation = function () {
            return window.innerWidth < myapp_config.mobileResolutionTrigger ? (myapp_config.root_.addClass("mobile-view-activated"),
                myapp_config.mobileMenuTrigger = !0) : (myapp_config.root_.removeClass("mobile-view-activated"),
                    myapp_config.mobileMenuTrigger = !1),
                myapp_config.debugState && console.log("mobileCheckActivation on " + $(window).width() + " | activated: " + myapp_config.mobileMenuTrigger),
                myapp_config.mobileMenuTrigger
        }
        ,
        e.toggleVisibility = function (e) {
            var t = document.getElementById(e);
            "block" == t.style.display ? t.style.display = "none" : t.style.display = "block"
        }
        ,
        e.domReadyMisc = function () {
            if ($(".modal-backdrop-transparent").on("show.bs.modal", function (e) {
                setTimeout(function () {
                    $(".modal-backdrop").addClass("modal-backdrop-transparent")
                })
            }),
                myapp_config.appDateHook.length) {
                var e = new Date
                    , t = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][e.getDay()] + ", " + ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][e.getMonth()] + " " + e.getDate() + ", " + e.getFullYear();
                myapp_config.appDateHook.text(t)
            }
            initApp.checkNavigationOrientation();
            var n = localStorage.getItem("lastTab");
            if ($('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
                localStorage.setItem("lastTab", $(this).attr("href"))
            }),
                n && $('[href="' + n + '"]').tab("show"),
                void 0 !== $.fn.slimScroll && "desktop" === myapp_config.thisDevice ? ($(".custom-scroll:not(.disable-slimscroll) >:first-child").slimscroll({
                    height: $(this).data("scrollHeight") || "100%",
                    size: $(this).data("scrollSize") || "4px",
                    position: $(this).data("scrollPosition") || "right",
                    color: $(this).data("scrollColor") || "rgba(0,0,0,0.6)",
                    alwaysVisible: $(this).data("scrollAlwaysVisible") || !1,
                    distance: $(this).data("scrollDistance") || "4px",
                    railVisible: $(this).data("scrollRailVisible") || !1,
                    railColor: $(this).data("scrollRailColor") || "#fafafa",
                    allowPageScroll: !1,
                    disableFadeOut: !1
                }),
                    myapp_config.debugState && console.log("%c✔ SlimScroll plugin active", "color: #148f32")) : (console.log("WARN! $.fn.slimScroll not loaded or user is on desktop"),
                        myapp_config.root_.addClass("no-slimscroll")),
                void 0 !== initApp.listFilter && $.isFunction(initApp.listFilter) && $("[data-listfilter]").length) {
                var a = $("[data-listfilter]").attr("id")
                    , o = $("[data-listfilter]").attr("data-listfilter");
                initApp.listFilter(o, "#" + a)
            }
            if (void 0 !== $.fn.tooltip && $('[data-toggle="tooltip"]').length ? $('[data-toggle="tooltip"]').tooltip() : console.log("OOPS! bs.tooltip is not loaded"),
                void 0 !== $.fn.popover && $('[data-toggle="popover"]').length) {
                $.fn.tooltip.Constructor.Default.whiteList;
                $('[data-toggle="popover"]').popover({
                    sanitize: !1
                })
            }
            if (void 0 !== $.fn.dropdown ? Popper.Defaults.modifiers.computeStyle.gpuAcceleration = !1 : console.log("OOPS! bs.popover is not loaded"),
                $(document).on("click", ".dropdown-menu", function (e) {
                    e.stopPropagation()
                }),
                window.Waves && myapp_config.rippleEffect ? (Waves.attach(".nav-menu:not(.js-waves-off) a, .btn:not(.js-waves-off):not(.btn-switch), .js-waves-on", ["waves-themed"]),
                    Waves.init(),
                    myapp_config.debugState && console.log("%c✔ Waves plugin active", "color: #148f32")) : myapp_config.debugState && console.log("%c✘ Waves plugin inactive! ", "color: #fd3995"),
                myapp_config.root_.on("click touchend", "[data-action]", function (e) {
                    var t = $(this).data("action");
                    switch (!0) {
                        case "toggle" === t:
                            var n = $(this).attr("data-target") || myapp_config.root_
                                , a = $(this).attr("data-class")
                                , o = $(this).attr("data-focus");
                            -1 !== a.indexOf("mod-bg-") && $(n).removeClass(function (e, t) {
                                return (t.match(/(^|\s)mod-bg-\S+/g) || []).join(" ")
                            }),
                                $(n).toggleClass(a),
                                $(this).hasClass("dropdown-item") && $(this).toggleClass("active"),
                                null != o && setTimeout(function () {
                                    $("#" + o).focus()
                                }, 200),
                                "undefined" == typeof classHolder && null == classHolder || (initApp.checkNavigationOrientation(),
                                    initApp.saveSettings());
                            break;
                        case "toggle-swap" === t:
                            n = $(this).attr("data-target"),
                                a = $(this).attr("data-class");
                            $(n).removeClass().addClass(a);
                            break;
                        case "panel-collapse" === t:
                            (s = $(this).closest(".panel")).children(".panel-container").collapse("toggle").on("show.bs.collapse", function () {
                                s.removeClass("panel-collapsed"),
                                    myapp_config.debugState && console.log("panel id:" + s.attr("id") + " | action: uncollapsed")
                            }).on("hidden.bs.collapse", function () {
                                s.addClass("panel-collapsed"),
                                    myapp_config.debugState && console.log("panel id:" + s.attr("id") + " | action: collapsed")
                            });
                            break;
                        case "panel-fullscreen" === t:
                            (s = $(this).closest(".panel")).toggleClass("panel-fullscreen"),
                                myapp_config.root_.toggleClass("panel-fullscreen"),
                                myapp_config.debugState && console.log("panel id:" + s.attr("id") + " | action: fullscreen");
                            break;
                        case "panel-close" === t:
                            function i() {
                                s.fadeOut(500, function () {
                                    $(this).remove(),
                                        myapp_config.debugState && console.log("panel id:" + s.attr("id") + " | action: removed")
                                })
                            }
                            var s = $(this).closest(".panel");
                            "undefined" != typeof bootbox ? (initApp.playSound(myapp_config.assetsUrl + "/media/sound", "messagebox"),
                                bootbox.confirm({
                                    title: "<i class='fal fa-times-circle text-danger mr-2'></i> Do you wish to delete panel <span class='fw-500'>&nbsp;'" + s.children(".panel-hdr").children("h2").text().trim() + "'&nbsp;</span>?",
                                    message: "<span><strong>Warning:</strong> This action cannot be undone!</span>",
                                    centerVertical: !0,
                                    swapButtonOrder: !0,
                                    buttons: {
                                        confirm: {
                                            label: "Yes",
                                            className: "btn-danger shadow-0"
                                        },
                                        cancel: {
                                            label: "No",
                                            className: "btn-default"
                                        }
                                    },
                                    className: "modal-alert",
                                    closeButton: !1,
                                    callback: function (e) {
                                        1 == e && i()
                                    }
                                })) : confirm("Do you wish to delete panel " + s.children(".panel-hdr").children("h2").text().trim() + "?") && i();
                            break;
                        case "theme-update" === t:
                            if ($(myapp_config.mythemeAnchor).length)
                                $(myapp_config.mythemeAnchor).attr("href", $(this).attr("data-theme"));
                            else {
                                var l = $("<link>", {
                                    id: myapp_config.mythemeAnchor.replace("#", ""),
                                    rel: "stylesheet",
                                    href: $(this).attr("data-theme")
                                });
                                $("head").append(l)
                            }
                            null != $(this).attr("data-themesave") && initApp.saveSettings();
                            break;
                        case "app-reset" === t:
                            initApp.resetSettings();
                            break;
                        case "factory-reset" === t:
                            initApp.factoryReset();
                            break;
                        case "app-print" === t:
                            window.print();
                            break;
                        case "app-loadscript" === t:
                            var r = $(this).attr("data-loadurl")
                                , c = $(this).attr("data-loadfunction");
                            initApp.loadScript(r, c);
                            break;
                        case "lang" === t:
                            var p = $(this).attr("data-lang").toString();
                            $.i18n ? i18n.setLng(p, function () {
                                $("[data-i18n]").i18n(),
                                    $("[data-lang]").removeClass("active"),
                                    $(this).addClass("active")
                            }) : initApp.loadScript("js/i18n/i18n.js", function () {
                                $.i18n.init({
                                    resGetPath: myapp_config.assetsUrl + "/media/data/__lng__.json",
                                    load: "unspecific",
                                    fallbackLng: !1,
                                    lng: p
                                }, function (e) {
                                    $("[data-i18n]").i18n()
                                })
                            });
                            break;
                        case "app-fullscreen" === t:
                            document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ? (document.exitFullscreen ? document.exitFullscreen() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen(),
                                myapp_config.debugState && console.log("%capp fullscreen toggle inactive! ", "color: #ed1c24")) : (document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.msRequestFullscreen ? document.documentElement.msRequestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT),
                                    myapp_config.debugState && console.log("app fullscreen toggle active"));
                            break;
                        case "playsound" === t:
                            var d = $(this).attr("data-soundpath") || myapp_config.assetsUrl + "/media/sound/"
                                , f = $(this).attr("data-soundfile");
                            initApp.playSound(d, f)
                    }
                    $(this).tooltip("hide"),
                        myapp_config.debugState && console.log("data-action clicked: " + t),
                        e.stopPropagation(),
                        e.preventDefault()
                }),
                navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var i = document.createElement("style");
                i.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),
                    document.head.appendChild(i)
            }
            myapp_config.debugState && console.log("%c✔ Finished app.init() v" + myapp_config.VERSION + "\n---------------------------", "color: #148f32")
        }
        ,
        e
}({});
console.log("%c⛔Mau apa ya kesini?", "color: red;font-size:30px;");
console.log("%cKalau tidak ada keperluan mending close inspectnya?\n\n Hormat saya: dafan", "color: green;font-size:20px;");

$(window).resize($.throttle(myapp_config.throttleDelay, function (e) {
    initApp.mobileCheckActivation(),
        initApp.checkNavigationOrientation()
})),
    $(window).scroll($.throttle(myapp_config.throttleDelay, function (e) { })),
    $(window).on("scroll", initApp.windowScrollEvents),
    jQuery(document).ready(function () {
        initApp.addDeviceType(),
            initApp.detectBrowserType(),
            initApp.mobileCheckActivation(),
            initApp.buildNavigation(myapp_config.navHooks),
            initApp.listFilter(myapp_config.navHooks, myapp_config.navFilterInput, myapp_config.navAnchor),
            initApp.domReadyMisc(),
            initApp.appForms(".input-group", "has-length", "has-disabled")
    }),
    $(window).on("orientationchange", function (e) {
        myapp_config.debugState && console.log("orientationchange event")
    }),
    $(window).on("blur focus", function (e) {
        if ($(this).data("prevType") != e.type)
            switch (e.type) {
                case "blur":
                    myapp_config.root_.toggleClass("blur"),
                        myapp_config.debugState && console.log("blur");
                    break;
                case "focus":
                    myapp_config.root_.toggleClass("blur"),
                        myapp_config.debugState && console.log("focused")
            }
        $(this).data("prevType", e.type)
    });
