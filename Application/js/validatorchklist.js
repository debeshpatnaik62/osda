function escapeHtml(e){var t={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#039;"};return e.replace(/[&<>"']/g,function(e){return t[e]})}function maxLength(e,t,a){return!($("#"+e).val().length>t&&$("#"+e).val().length>0)||(viewAlert(a+" can not more than "+t+" charater !!!",e),$("#"+e).focus(),!1)}function minLength(e,t,a){return!($("#"+e).val().length<t&&$("#"+e).val().length>0)||(viewAlert(a+" can not less than "+t+" charater !!!",e),$("#"+e).focus(),!1)}function equalLength(e,t,a){return!($("#"+e).val().length!=t&&$("#"+e).val().length>0)||(viewAlert(a+" should be "+t+" digit length!!!",e),!1)}function blankCheck(e,t){return""!=$("#"+e).val()||(viewAlert(t,e),$("#"+e).focus(),!1)}function blankChkRad(e,t){return!($('input[name="'+e+'"]:checked').length<=0)||(viewAlert(t),$("input[name="+e+"]:first").focus(),!1)}function blockspecialchar_first(e){var t;t=e.value;var a=e.id;switch(t.charCodeAt(0)){case 44:return viewAlert(", Not allowed in 1st Place!!!",a),e.value="",!1;case 47:return viewAlert("/ Not allowed in 1st Place!!!",a),e.value="",!1;case 58:return viewAlert(": Not allowed in 1st Place!!!",a),e.value="",!1;case 46:return viewAlert(". Not allowed in 1st Place!!!",a),e.value="",!1;case 39:return viewAlert("Single Quote Not allowed in 1st Place!!!",a),e.value="",!1;case 32:return viewAlert("White Space Not allowed in 1st Place!!!",a),e.value="",!1;case 40:return viewAlert("( Not allowed in 1st Place!!!",a),e.value="",!1;case 41:return viewAlert(") Not allowed in 1st Place!!!",a),e.value="",!1;case 45:return viewAlert("- Not allowed in 1st Place!!!",a),e.value="",!1;case 95:return viewAlert("_ Not allowed in 1st Place!!!",a),e.value="",!1;case 59:return viewAlert("; Not allowed in 1st Place!!!",a),e.value="",!1;case 124:return viewAlert("| Not allowed in 1st Place!!!",a),e.value="",!1;case 63:return viewAlert("? Not allowed in 1st Place!!!",a),e.value="",!1;case 34:return viewAlert('" Not allowed in 1st Place!!!',a),e.value="",!1;case 35:return viewAlert("# Not allowed in 1st Place!!!",a),e.value="",!1;case 36:return viewAlert("$ Not allowed in 1st Place!!!",a),e.value="",!1;case 38:return viewAlert("& Not allowed in 1st Place!!!",a),e.value="",!1;case 126:return viewAlert("~ Not allowed in 1st Place!!!",a),e.value="",!1;case 96:return viewAlert("` Not allowed in 1st Place!!!",a),e.value="",!1;case 33:return viewAlert("! Not allowed in 1st Place!!!",a),e.value="",!1;case 37:return viewAlert("% Not allowed in 1st Place!!!",a),e.value="",!1;case 94:return viewAlert("^ Not allowed in 1st Place!!!",a),e.value="",!1;case 42:return viewAlert("* Not allowed in 1st Place!!!",a),e.value="",!1;case 92:return viewAlert("\\ Not allowed in 1st Place!!!",a),e.value="",!1;case 43:return viewAlert("+ Not allowed in 1st Place!!!",a),e.value="",!1;case 61:return viewAlert("= Not allowed in 1st Place!!!",a),e.value="",!1;case 123:return viewAlert("{ Not allowed in 1st Place!!!",a),e.value="",!1;case 125:return viewAlert("} Not allowed in 1st Place!!!",a),e.value="",!1;case 91:return viewAlert("[ Not allowed in 1st Place!!!",a),e.value="",!1;case 93:return viewAlert("] Not allowed in 1st Place!!!",a),e.value="",!1;case 60:return viewAlert("< Not allowed in 1st Place!!!",a),e.value="",!1;case 62:return viewAlert("> Not allowed in 1st Place!!!",a),e.value="",!1}}function blockspecialchar(e){switch(event.keyCode){case 44:case 47:case 58:case 46:case 39:case 40:case 41:case 45:case 95:case 59:case 124:case 63:case 64:case 34:case 35:case 36:case 38:case 126:case 96:case 33:case 37:case 94:case 42:case 92:case 43:case 61:case 123:case 125:case 91:case 93:case 60:case 62:return!1}}function isNumberKey(e){var t=e.which?e.which:event.keyCode;return!(t>31&&(t<48||t>57))}function isCharKey(e){var t=e.which?e.which:event.keyCode;return t>31&&(t<48||t>57)||13==t}function isDecimal(e){var t=$("#"+e).val();return 1==new RegExp(/^[0-9]+(\.[0-9]{1,2})?$/).test(t)||(viewAlert("Enter Only decimal values having 2 digit after decimal",e),!1)}function checkMaxDecimal(e,t){var a=new RegExp(/^\d+(\.\d{1,2})?$/),r=$("#"+e).val(),l=r.indexOf("."),i=r.split(".");return-1==l?!(r.length>t)||(viewAlert("Enter decimal value of total 13 character with 2 digit after decimal",e),!1):i[0].length<=10&&1==a.test(r)||(viewAlert("Enter decimal value of total 13 character with 2 digit after decimal",e),!1)}function validateNumber(e){var t=new RegExp(/^\d+$/),a=$("#"+e).val();return""==a||(1==t.test(a)||(viewAlert("Enter Only Numeric values",e),!1))}function validateCharNumber(e,t){var a=$("#"+e).val();return""==a||(!!/^[a-zA-Z0-9]+$/.test(a)||(viewAlert(t+" accept only Number and Character",e),!1))}function whiteSpaceLast(e){var t=$("#"+e).val();return" "!=t[t.length-1]||(viewAlert("Please remove space from last",e),!1)}function checkSpecialChar(e){for(var t=["%","<",">","\\",'"'],a=$("#"+e).val(),r=0;r<t.length;r++)if(a.indexOf(t[r])>0)return viewAlert("Special character "+t[r]+" is not allowed !!!",e),!1;return!0}function selectDropdown(e,t){var a=$("#"+e).val();return"0"!=a&&""!=a||(viewAlert(t,e),!1)}function validDesimal(e,t){var a=e.which?e.which:event.keyCode,r=$("#"+t).val();r.length;return(a>47&&a<58||46==a||8==a)&&!(r.indexOf(".")>0&&46==a)}function IsCheckFile(e,t,a){var r=a.split(","),l=$("#"+e).val(),i=l.length;if(0==i)return!0;for(var n=l.lastIndexOf(".")+1,c=l.substring(n,i).toLowerCase(),u=0;u<r.length;u++)if(c==r[u])return!0;return viewAlert(t+" ("+a+")",e),!1}function validEmail(e){var t=new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/),a=$("#"+e).val();return""==a||(1==t.test(a)||(viewAlert("Please enter a valid Email ID",e),!1))}function compareDate(e,t,a,r,l){var i=$("#"+e).val(),n=$("#"+t).val(),c=i.split("-");i=c[2]+"-"+c[1]+"-"+c[0];var u=n.split("-");return n=u[2]+"-"+u[1]+"-"+u[0],i=new Date(i),n=new Date(n),!(i>n)||(void 0===l?viewAlert(a+" can not be greater than "+r,e):viewAlert(l,e),!1)}function compareCurDate(e,t,a){var r=$("#"+e).val(),l=r.split("-");return r=l[2]+"-"+l[1]+"-"+l[0],curDate=new Date((new Date).setHours(0,0,0,0)),r=new Date(new Date(r).setHours(0,0,0,0)),"g"==a.toLowerCase()?!(r>curDate)||(viewAlert(t+" can not be greater than current date",e),!1):!(curDate>r)||(viewAlert(t+" can not be less than current date",e),!1)}function validateNumberSlash(e,t){var a=new RegExp(/^\d\/\d$/),r=$("#"+e).val();return""==r||(1==a.test(r)||(viewAlert(t,e),!1))}function validURL(e,t){var a=new RegExp(/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/),r=$("#"+e).val();return""==r||(1==a.test(r)||(viewAlert(t,e),!1))}function validatePhone(e,t){var a=$("#"+e).val(),r=/^[0-9]{4}[ \-][0-9]{7}?$/,l=/^[0-9]{5}[ \-][0-9]{6}?$/;return""==a||(!(!r.test(a)&&!l.test(a))||(viewAlert(t),!1))}function validateName(e,t){var a=$("#"+e).val(),r=/^[A-Za-z]{1}/;return""==a||(!!r.test(a)||(viewAlert(t,e),!1))}function validMobileNo(e,t){var a=$("#"+e).val(),r=/^[6-9][0-9]{9}$/;return""==a||(!!r.test(a)||(viewAlert(t,e),!1))}function validPHno(e,t){var a=e.which?e.which:event.keyCode,r=$("#"+t).val();r.length;return(a>47&&a<58||45==a||8==a)&&!(r.indexOf("-")>0&&45==a)}function validUserName(e){var t=e.which?e.which:event.keyCode;return t>47&&t<=57||t>=64&&t<=122||36==t||8==t}function chkFileSize(e,t,a,r){var l="";return l=1==r?"File size exceeds "+a+"KB.":"File size exceeds "+a+"MB.",!(Math.round($("#"+e)[0].files[0].size/1024)>t)||(viewAlert(l,e),!1)}function lessDateTime(e,t,a){var r=e.split("-"),l=new Date(r[2],Number(r[1]-1),r[0],r[3],r[4]),i=t.split("-"),n=new Date(i[2],Number(i[1]-1),i[0],i[3],i[4]);return!(l.getTime()>n.getTime())||(viewAlert(a,t),!1)}function convert12to24(e){var t=e.substr(e.length-2).toLowerCase(),a=e.substr(0,e.indexOf(":")),r=e.substring(e.indexOf(":")+1,e.indexOf(":")+3);return"pm"==t?a=12!=a?1*a+12:"12":12==a&&(a="00"),a+"-"+r}function changeTimeFormat(e){return convert12to24(document.getElementById(e).value)}$(document).ready(function(){$("input[type=text],input[type=password]").on("keyup",function(){if(!$(this).hasClass("odia"))return blockspecialchar_first(this)}),$("input[type=text],textarea").on("blur",function(){var e=$(this).val().trim();$(this).val(e)}),$("input[type=text]").attr("autocomplete","off")}),"undefined"==typeof escapeHtmlEntities&&(escapeHtmlEntities=function(e){return e.replace(/[\u00A0-\u2666<>\&]/g,function(e){return"&"+(escapeHtmlEntities.entityTable[e.charCodeAt(0)]||"#"+e.charCodeAt(0))+";"})},escapeHtmlEntities.entityTable={34:"quot",38:"amp",39:"apos",60:"lt",62:"gt",160:"nbsp",161:"iexcl",162:"cent",163:"pound",164:"curren",165:"yen",166:"brvbar",167:"sect",168:"uml",169:"copy",170:"ordf",171:"laquo",172:"not",173:"shy",174:"reg",175:"macr",176:"deg",177:"plusmn",178:"sup2",179:"sup3",180:"acute",181:"micro",182:"para",183:"middot",184:"cedil",185:"sup1",186:"ordm",187:"raquo",188:"frac14",189:"frac12",190:"frac34",191:"iquest",192:"Agrave",193:"Aacute",194:"Acirc",195:"Atilde",196:"Auml",197:"Aring",198:"AElig",199:"Ccedil",200:"Egrave",201:"Eacute",202:"Ecirc",203:"Euml",204:"Igrave",205:"Iacute",206:"Icirc",207:"Iuml",208:"ETH",209:"Ntilde",210:"Ograve",211:"Oacute",212:"Ocirc",213:"Otilde",214:"Ouml",215:"times",216:"Oslash",217:"Ugrave",218:"Uacute",219:"Ucirc",220:"Uuml",221:"Yacute",222:"THORN",223:"szlig",224:"agrave",225:"aacute",226:"acirc",227:"atilde",228:"auml",229:"aring",230:"aelig",231:"ccedil",232:"egrave",233:"eacute",234:"ecirc",235:"euml",236:"igrave",237:"iacute",238:"icirc",239:"iuml",240:"eth",241:"ntilde",242:"ograve",243:"oacute",244:"ocirc",245:"otilde",246:"ouml",247:"divide",248:"oslash",249:"ugrave",250:"uacute",251:"ucirc",252:"uuml",253:"yacute",254:"thorn",255:"yuml",402:"fnof",913:"Alpha",914:"Beta",915:"Gamma",916:"Delta",917:"Epsilon",918:"Zeta",919:"Eta",920:"Theta",921:"Iota",922:"Kappa",923:"Lambda",924:"Mu",925:"Nu",926:"Xi",927:"Omicron",928:"Pi",929:"Rho",931:"Sigma",932:"Tau",933:"Upsilon",934:"Phi",935:"Chi",936:"Psi",937:"Omega",945:"alpha",946:"beta",947:"gamma",948:"delta",949:"epsilon",950:"zeta",951:"eta",952:"theta",953:"iota",954:"kappa",955:"lambda",956:"mu",957:"nu",958:"xi",959:"omicron",960:"pi",961:"rho",962:"sigmaf",963:"sigma",964:"tau",965:"upsilon",966:"phi",967:"chi",968:"psi",969:"omega",977:"thetasym",978:"upsih",982:"piv",8226:"bull",8230:"hellip",8242:"prime",8243:"Prime",8254:"oline",8260:"frasl",8472:"weierp",8465:"image",8476:"real",8482:"trade",8501:"alefsym",8592:"larr",8593:"uarr",8594:"rarr",8595:"darr",8596:"harr",8629:"crarr",8656:"lArr",8657:"uArr",8658:"rArr",8659:"dArr",8660:"hArr",8704:"forall",8706:"part",8707:"exist",8709:"empty",8711:"nabla",8712:"isin",8713:"notin",8715:"ni",8719:"prod",8721:"sum",8722:"minus",8727:"lowast",8730:"radic",8733:"prop",8734:"infin",8736:"ang",8743:"and",8744:"or",8745:"cap",8746:"cup",8747:"int",8756:"there4",8764:"sim",8773:"cong",8776:"asymp",8800:"ne",8801:"equiv",8804:"le",8805:"ge",8834:"sub",8835:"sup",8836:"nsub",8838:"sube",8839:"supe",8853:"oplus",8855:"otimes",8869:"perp",8901:"sdot",8968:"lceil",8969:"rceil",8970:"lfloor",8971:"rfloor",9001:"lang",9002:"rang",9674:"loz",9824:"spades",9827:"clubs",9829:"hearts",9830:"diams",338:"OElig",339:"oelig",352:"Scaron",353:"scaron",376:"Yuml",710:"circ",732:"tilde",8194:"ensp",8195:"emsp",8201:"thinsp",8204:"zwnj",8205:"zwj",8206:"lrm",8207:"rlm",8211:"ndash",8212:"mdash",8216:"lsquo",8217:"rsquo",8218:"sbquo",8220:"ldquo",8221:"rdquo",8222:"bdquo",8224:"dagger",8225:"Dagger",8240:"permil",8249:"lsaquo",8250:"rsaquo",8364:"euro"});