var BONELOC = function () {
    if (window.Prototype) {
        delete Object.prototype.toJSON;
        delete Array.prototype.toJSON;
        delete Hash.prototype.toJSON;
        delete String.prototype.toJSON
    }

    function el(id) {
        return document.getElementById(id)
    }

    function removeElement(obj) {
        if (obj) {
            return obj.parentNode.removeChild(obj)
        }
        return
    }

    function textNodesUnder(el) {
        var n, a = [],
                b = [],
                walk = document.createTreeWalker(el, 4, null, false);
        var c = [];
        var d = [];
        while (n = walk.nextNode()) {
            if (n.textContent.trim() != "" && n.textContent.trim().indexOf("BESbswy") < 0 && n.textContent.trim().indexOf("){") < 0 && n.textContent.trim().indexOf(") {") < 0 && isNaN(n.textContent.trim()) && !(n.textContent.trim().length == 1 && !isALetter(n.textContent.trim())) && n.parentNode.nodeName.toUpperCase() != "SCRIPT" && n.parentNode.nodeName.toUpperCase() != "STYLE" && n.parentNode.nodeName.toUpperCase() != "NOSCRIPT" && !hasAncestorAttribute(n.parentNode, "wg-notranslate")) {
                a.push(n.textContent);
                b.push(n);
                c.push(1);
                d.push({
                    t: 1,
                    w: n.textContent.replace(/\s/g, "~::~")
                })
            }
        }
        if (typeof el !== "undefined") {
            var inputs = el.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                if (!hasAncestorAttribute(input, "wg-notranslate") && input.type != "hidden") {
                    if (input.placeholder.trim() != "" && isNaN(input.placeholder.trim())) {
                        a.push(input.placeholder);
                        b.push(input);
                        c.push(3);
                        d.push({
                            t: 3,
                            w: input.placeholder
                        })
                    }
                    if (input.value.trim() != "" && isNaN(input.value.trim())) {
                        a.push(input.value);
                        b.push(input);
                        c.push(2);
                        d.push({
                            t: 2,
                            w: input.value
                        })
                    }
                }
            }
            var textareas = el.getElementsByTagName("textarea");
            for (var i = 0; i < textareas.length; i++) {
                var textarea = textareas[i];
                if (!hasAncestorAttribute(textarea, "wg-notranslate")) {
                    if (textarea.placeholder.trim() != "" && isNaN(textarea.placeholder.trim())) {
                        a.push(textarea.placeholder);
                        b.push(textarea);
                        c.push(3);
                        d.push({
                            t: 3,
                            w: textarea.placeholder
                        })
                    }
                    if (textarea.value.trim() != "" && isNaN(textarea.value.trim())) {
                        a.push(textarea.value);
                        b.push(textarea);
                        c.push(1);
                        d.push({
                            t: 1,
                            w: textarea.value
                        })
                    }
                }
            }
        }
        return {
            values: a,
            nodes: b,
            types: c,
            payload: d
        }
    }

    function isALetter(letter) {
        var firstLetter = letter.toUpperCase();
        if (firstLetter.toLowerCase() != firstLetter) {
            return true
        } else {
            return false
        }
    }

    function jsoncount(obj) {
        return Object.keys(obj).length
    }

    function hasAncestorAttribute(el, attr) {
        while (el && el.nodeType === 1 && !el.hasAttribute(attr)) {
            el = el.parentNode
        }
        if (el && el.nodeType === 1 && el.hasAttribute(attr))
            return true;
        else
            return false
    }

    function getXMLHTTP() {
        var xhr = null;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest
        } else if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP")
            } catch (e) {
                try {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP")
                } catch (e1) {
                    xhr = null
                }
            }
        } else {
            alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...")
        }
        return xhr
    }

    function updateProgressBar() {
        var pb = el("wg_progress");
        var c = pb.firstChild.getAttribute("aria-valuenow");
        var newc = parseInt(c) + (Math.random() * (6 - 2) + 2);
        pb.firstChild.setAttribute("aria-valuenow", newc);
        pb.firstChild.style.width = newc + "%"
    }

    function createProgressBar(body) {
        var progressBar = document.createElement("div");
        progressBar.className = "wg-progress";
        progressBar.id = "wg_progress";
        progressBar.innerHTML = '<div class="wg-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>';
        body.appendChild(progressBar);
        var prog = setInterval(updateProgressBar, 100);
        return prog
    }

    function removeProgressBar(prog) {
        clearInterval(prog);
        removeElement(el("wg_progress"))
    }

    function translatePage(res, options, title_page) {

        var body = document.getElementsByTagName("body")[0];
        if (options.transition == "wait")
            body.style.visibility = "hidden";
        var nodes = res.nodes;
        var types = res.types;

        var values = res.values;
        var payload = res.payload;

        if (options.originalLanguage == options.destinationLanguage) {
            for (var i = 0; i < nodes.length; i++) {
                try {
                    var translated_word = values[i];

                    if (types[i] == 1)
                        nodes[i].textContent = translated_word;
                    else if (types[i] == 3)
                        nodes[i].placeholder = translated_word;
                    else if (types[i] == 2)
                        nodes[i].value = translated_word;
                    else if (types[i] == 6)
                        nodes[i].src = translated_word
                } catch (e) {
                    console.log(e)
                }
            }
            document.getElementsByTagName("html")[0].setAttribute("lang", options.destinationLanguage);
            return
        } else {
            if (options.loadingBar != false) {
                var prog = createProgressBar(body)
            }
            // var apiurl = "https://api.weglot.com/translate?api_key=" + options.api_key;
            //var apiurl="data.json"
            //var apiurl="http://192.168.103.62/Bhubaneswar_One/translate";
            var apiurl = SITE_URL + "proxy";

            var xhr = getXMLHTTP();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    if (options.loadingBar != false) {
                        removeProgressBar(prog)
                    }
                    if (options.transition == "wait")
                        body.style.visibility = "visible";
                    var jsonObj = JSON.parse(xhr.responseText);

                    var wordsObj = jsonObj.to_words;

                    var wordsFrom = jsonObj.from_words;

                    for (var i = 0; i < jsoncount(nodes); i++) {
                        try {
                            //console.log(values[i]);
                            var translated_word = wordsObj[wordsFrom.indexOf(values[i])];
                            //console.log(wordsFrom);
                            //console.log(wordsFrom.indexOf(values[i]))
                            if (typeof translated_word === "undefined") {
                                if (types[i] == 1)
                                    translated_word = nodes[i].textContent;
                                else if (types[i] == 3)
                                    translated_word = nodes[i].placeholder;
                                else if (types[i] == 2)
                                    translated_word = nodes[i].value;
                                else if (types[i] == 6)
                                    translated_word = nodes[i].src
                            }
                            if (types[i] == 1)
                                nodes[i].textContent = translated_word;
                            else if (types[i] == 3)
                                nodes[i].placeholder = translated_word;
                            else if (types[i] == 2)
                                nodes[i].value = translated_word;
                            else if (types[i] == 6)
                                nodes[i].src = translated_word
                        } catch (e) {
                            console.log(e)
                        }
                    }
                    document.getElementsByTagName("html")[0].setAttribute("lang", options.destinationLanguage)
                }
                if (xhr.readyState == 4 && (xhr.status != 200 && xhr.status != 0)) {
                    //console.log(xhr.responseText)
                }
            };
            xhr.open("POST", apiurl, true);
            xhr.setRequestHeader("Content-type", "application/json");
            var data = '{"method": "translatePage","l_from":"' + options.originalLanguage + '","l_to":"' + options.destinationLanguage + '","title":' + JSON.stringify(title_page) + ',"request_url":"' + window.location.href + '","words":' + JSON.stringify(payload) + "}";
            xhr.send(data)
        }
    }

    function translateElem(res, options, l_to, title_page) {
        var nodes = res.nodes;
        var types = res.types;
        var values = res.values;
        var payload = res.payload;
        //var apiurl = "https://api.weglot.com/translate?api_key=" + options.api_key;
        //var apiurl="http://192.168.103.62/Bhubaneswar_One/translate";
        var apiurl = SITE_URL + "/translate";

        var xhr = getXMLHTTP();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                var jsonObj = JSON.parse(xhr.responseText);
                var wordsObj  = jsonObj.to_words;
                var wordsFrom = jsonObj.from_words;
               
                for (var i = 0; i < jsoncount(nodes); i++) {
                    var translated_word = wordsObj[wordsFrom.indexOf(values[i])];
                    if (typeof translated_word === "undefined") {
                        if (types[i] == 1)
                            translated_word = nodes[i].textContent;
                        else if (types[i] == 3)
                            translated_word = nodes[i].placeholder;
                        else if (types[i] == 2)
                            translated_word = nodes[i].value;
                        else if (types[i] == 6)
                            translated_word = nodes[i].src
                    }
                    if (types[i] == 1)
                        nodes[i].textContent = translated_word;
                    else if (types[i] == 3)
                        nodes[i].placeholder = translated_word;
                    else if (types[i] == 2)
                        nodes[i].value = translated_word;
                    else if (types[i] == 6)
                        nodes[i].src = translated_word
                }
            }
            if (xhr.readyState == 4 && (xhr.status != 200 && xhr.status != 0)) {
                // console.log(xhr.responseText)
            }
        };
        xhr.open("POST", apiurl, true);
        xhr.setRequestHeader("Content-type", "application/json");
        var data = '{"_token": "' + csrftoken + '","l_from":"' + options.originalLanguage + '","l_to":"' + l_to + '","title":' + JSON.stringify(title_page) + ',"request_url":"' + window.location.href + '","words":' + JSON.stringify(payload) + "}";
        xhr.send(data)
    }

    function getNameForCode(l) {
        var english = false;
        switch (l) {
            case "en":
                return english ? "English" : "English";

//            case "hi":
//                return english ? "Hindi" : "हिंदी";
            case "od":
                return english ? "Odia" : "ଓଡ଼ିଆ"
        }
    }

    function switchLangElement(elem) {
        var prevLCode = elem.parentNode.previousSibling.getAttribute("data-l");
        var prevLName = elem.parentNode.previousSibling.firstChild.innerHTML;
        elem.parentNode.previousSibling.setAttribute("data-l", elem.getAttribute("data-l"));
        elem.parentNode.previousSibling.setAttribute("class", "current " + elem.getAttribute("data-l"));
        elem.parentNode.previousSibling.firstChild.innerHTML = elem.firstChild.innerHTML;
        elem.setAttribute("data-l", prevLCode);
        elem.setAttribute("class", prevLCode);
        elem.setAttribute("id", "wg-" + prevLCode);
        elem.firstChild.innerHTML = prevLName
    }

    function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling)
    }

    function insertBef(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode)
    }

    function getElementByXpath(xPath, doc) {
        if (!doc)
            doc = document;
        if (doc.evaluate)
            return doc.evaluate(xPath, document, null, 9, null).singleNodeValue;
        while (xPath.charAt(0) == "/")
            xPath = xPath.substr(1);
        var prevElem = doc;
        var arr = xPath.split("/");
        for (var i = 0; i < arr.length; i++) {
            var step = arr[i].split(/(\w*)\[(\d*)\]/gi).filter(function (v) {
                return !(v == "" || v.match(/\s/gi))
            }, this);
            var elem = step[0];
            var elemNum = step[1] ? step[1] - 1 : 0;
            if (i < arr.length - 1)
                prevElem = prevElem.getElementsByTagName(elem)[elemNum];
            else
                return prevElem.getElementsByTagName(elem)[elemNum]
        }
    }

    function getOffset(element) {
        var top = 0,
                left = 0;
        do {
            top += element.offsetTop || 0;
            left += element.offsetLeft || 0;
            element = element.offsetParent
        } while (element);
        return {
            top: top,
            left: left
        }
    }

    function addLangSwitcher(res, options, title_page) {

        var body = document.getElementsByTagName("body")[0];
        var head = document.getElementsByTagName("head")[0];
        var switcherWrap = document.createElement("div");
        switcherWrap.innerHTML = '<aside style="display:none;" wg-notranslate="" id="weglot_switcher" class="country-selector closed" onclick="BONELOC.openClose(this);"></aside>';
        var switcher = switcherWrap.firstChild;
        var currentLang = document.createElement("div");
        currentLang.innerHTML = '<a href="javascript:%20void(0);">' + getNameForCode(options.originalLanguage) + "</a>";
        currentLang.className = "current " + options.originalLanguage;
        currentLang.setAttribute("data-l", options.originalLanguage);
        var langcont = document.createElement("ul");
        var languages = options.destinationLanguages.split(",");

        for (index = 0; index < languages.length; index++) {
            var l = languages[index];
            if (l == options.originalLanguage)
                continue;
            var one = document.createElement("li");
            // one.className = l;
            one.innerHTML = '<a href="javascript:%20void(0);">' + getNameForCode(l) + "</a>";
            one.setAttribute("data-l", l);
            one.id = "wg-" + l;
            one.onclick = function () {
                var opt = {
                    api_key: options.api_key,
                    originalLanguage: options.originalLanguage,
                    destinationLanguage: this.getAttribute("data-l"),
                    transition: options.transition
                };
                translatePage(res, opt, title_page);
                if (typeof Storage !== "undefined") {
                    sessionStorage.setItem("wglang", opt.destinationLanguage)
                }
                switchLangElement(this)
                location.reload();
            };
            langcont.appendChild(one)
        }
        switcher.appendChild(currentLang);
        switcher.appendChild(langcont);
        if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.flags !== "undefined" && !options.buttonOption.flags) {
            head.innerHTML += "<style>.country-selector a:before {display:none;}</style>"
        }
        if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.rules !== "undefined" && options.buttonOption.rules != "") {
            head.innerHTML += "<style>" + options.buttonOption.rules + "</style>"
        }
        try {
            if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.after !== "undefined") {
                insertAfter(switcher, getElementByXpath(options.buttonOption.after))
            } else if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.before !== "undefined") {
                insertBef(switcher, getElementByXpath(options.buttonOption.before))
            } else if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.atbeginning !== "undefined") {
                insertBef(switcher, getElementByXpath(options.buttonOption.atbeginning).firstChild)
            } else if (typeof options.buttonOption !== "undefined" && typeof options.buttonOption.atend !== "undefined") {
                getElementByXpath(options.buttonOption.atend).appendChild(switcher)
            } else {
                body.appendChild(switcher);
                if (options.position && options.position == "left") {
                    head.innerHTML += "<style>.country-selector {position : fixed;bottom : 0px;left : 20px;}</style>"
                } else {
                    head.innerHTML += "<style>.country-selector {position : fixed;bottom : 0px;right : 20px;}</style>"
                }
            }
        } catch (e) {
            body.appendChild(switcher);
            if (options.buttonOption.position && options.buttonOption.position == "left") {
                head.innerHTML += "<style>.country-selector {position : fixed;bottom : 0px;left : 20px;}</style>"
            } else {
                head.innerHTML += "<style>.country-selector {position : fixed;bottom : 0px;right : 20px;}</style>"
            }
        }
    }

    function isExcludedURL(url, excluded) {
        var parts = excluded.split(",");
        for (var i = 0; i < parts.length; i++) {
            var re = new RegExp(parts[i]);
            if (re.test(url))
                return true
        }
        return false
    }
    var observeDOM = function () {
        var MutationObserver = window.MutationObserver || window.WebKitMutationObserver,
                eventListenerSupported = window.addEventListener;
        return function (obj, callback) {
            if (MutationObserver) {
                var obs = new MutationObserver(function (mutations, observer) {
                    if (mutations[0].addedNodes.length || mutations[0].removedNodes.length)
                        callback(mutations)
                });
                obs.observe(obj, {
                    childList: true,
                    subtree: true
                })
            } else if (eventListenerSupported) {
                obj.addEventListener("DOMNodeInserted", callback, false);
                obj.addEventListener("DOMNodeRemoved", callback, false)
            }
        }
    }();
    return {
        openClose: function openClose(link) {
            link.className = link.className.indexOf("country-selector closed") < 0 ? "country-selector closed" : "country-selector";
            var body = document.body,
                    html = document.documentElement;
            var page_height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            var h = getOffset(link).top;
            var position = window.getComputedStyle(link).getPropertyValue("position");
            var bottom = window.getComputedStyle(link).getPropertyValue("bottom");
            var top = window.getComputedStyle(link).getPropertyValue("top");
            if (h > page_height / 2 || position == "fixed" && bottom != "auto") {
                link.className += " weg-openup"
            }
            return false
        },
        setup: function (options) {

            var cssLink = document.createElement("link");
            cssLink.rel = "stylesheet";
            cssLink.type = "text/css";
          
            //cssLink.href = "/Bhubaneswar_One/public/lang/b-one-lang.css";
            cssLink.href = SITE_URL + "lang/b-one-lang.css";
            document.getElementsByTagName("HEAD").item(0).appendChild(cssLink);
            // var cssLink2 = document.createElement("link");
            // cssLink2.rel = "stylesheet";
            // cssLink2.type = "text/css";
            // cssLink2.href = "//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
            //document.getElementsByTagName("HEAD").item(0).appendChild(cssLink2);
            document.addEventListener("DOMContentLoaded", function (event) {
                //$(window).bind("load", function () {
                var html = document.getElementsByTagName("html")[0];
                if (options.exceptions) {
                    var excps = options.exceptions.split(",");
                    for (var i = 0; i < excps.length; i++) {
                        var currentElem = document.querySelectorAll(excps[i]);
                        if (currentElem) {
                            for (var j = 0; j < currentElem.length; j++) {
                                var curr = currentElem[j];
                                curr.setAttribute("wg-notranslate", "")
                            }
                        }
                    }
                }
                if (options.dynamic) {
                    var dyn = options.dynamic.split(",");
                    for (var i = 0; i < dyn.length; i++) {
                        var currentElem = document.querySelectorAll(dyn[i]);
                        if (currentElem) {
                            for (var j = 0; j < currentElem.length; j++) {
                                var curr = currentElem[j];
                                curr.setAttribute("wg-dynamic", "")
                            }
                        }
                    }
                }
                if (!options.excludeURLs || options.excludeURLs && !isExcludedURL(window.location.pathname, options.excludeURLs)) {
                    var res = textNodesUnder(html);
                    var title_page = document.title;
                    addLangSwitcher(res, options, title_page);
                    if (typeof Storage !== "undefined" && sessionStorage.wglang) {
                        if (sessionStorage.wglang != options.originalLanguage && sessionStorage.wglang.length == 2) {
                            var opt = {
                                api_key: options.api_key,
                                originalLanguage: options.originalLanguage,
                                destinationLanguage: sessionStorage.wglang,
                                transition: options.transition,
                                loadingBar: options.loadingBar
                            };
                            translatePage(res, opt, title_page);
                            switchLangElement(el("wg-" + opt.destinationLanguage))
                        }
                    } else {
                        if (options.autoSwitch) {
                            var browserl = navigator.language || navigator.userLanguage;
                            browserl = browserl.substring(0, 2);
                            if (options.destinationLanguages.indexOf(browserl) > -1) {
                                var opt = {
                                    api_key: options.api_key,
                                    originalLanguage: options.originalLanguage,
                                    destinationLanguage: browserl,
                                    transition: options.transition,
                                    loadingBar: options.loadingBar
                                };
                                translatePage(res, opt, title_page);
                                switchLangElement(el("wg-" + opt.destinationLanguage))
                            }
                        }
                    }
                }
                observeDOM(document.getElementsByTagName("body")[0], function (mutation) {
                    var all = {
                        values: [],
                        nodes: [],
                        types: [],
                        payload: []
                    };
                    for (var i = 0; i < mutation.length; i++) {
                        var nodes = mutation[i].addedNodes;
                        if (typeof nodes[0] !== "undefined" && nodes[0] != null) {
                            if (hasAncestorAttribute(nodes[0], "wg-dynamic")) {
                                var r = textNodesUnder(nodes[0]);
                                all.values = all.values.concat(r.values);
                                all.nodes = all.nodes.concat(r.nodes);
                                all.types = all.types.concat(r.types);
                                all.payload = all.payload.concat(r.payload);
                                // console.log(all)
                            }
                        }
                    }
                    var l_to = "";
                    if (typeof Storage !== "undefined" && sessionStorage.wglang) {
                        if (sessionStorage.wglang != options.originalLanguage && sessionStorage.wglang.length == 2) {
                            l_to = sessionStorage.wglang
                        }
                    }
                    if (l_to != "" && all.values.length > 0) {
                        var title_page = document.title;
                        //console.log("translate to " + l_to);
                        //console.log(all);
                        translateElem(all, options, l_to, title_page)
                    }
                })
            })
        }
    }
}();