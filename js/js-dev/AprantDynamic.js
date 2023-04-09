
/********************************************************************

CUSTOMIZE THE FOLLOWING IF REQUIRED.

********************************************************************/
var pathhost = window.location.host,
    pathpathInfo = window.location.pathname,
    pathFN1 = pathpathInfo.split("/")[1],
    pathsiteUrl = "http://" + pathhost + "/" + pathFN1;
    
// The path to the folder of eot files

var path_to_eot = pathsiteUrl +"/fonts/";

// Name of the custom font that you would like to use in your CSS or Style properties.

var aprant_custom_font ="apuniaprant";


/*******************************************************************

DO NOT CHANGE ANYTHING BELOW THIS LINE.

*******************************************************************/

var OSName="Unknown OS";
var browserName="Unknown browser";


if (navigator.userAgent.indexOf("Windows NT 5")!=-1) OSName="WinXP";
if (navigator.userAgent.indexOf("Windows NT 6")!=-1) OSName="Win7";
if (navigator.userAgent.indexOf("Mac")!=-1) OSName="MacOS";
if (navigator.userAgent.indexOf("X11")!=-1) OSName="UNIX";
if (navigator.userAgent.indexOf("Linux")!=-1) OSName="Linux";



if(navigator.appName.indexOf("Internet Explorer") != -1) {
 
browserName="IE";

} else if (!!navigator.userAgent.match(/Trident\/7\./)) {
    browserName="IE";

} else if(navigator.userAgent.indexOf("Safari")!=-1){
	 
    if ( navigator.userAgent.indexOf("Chrome")!=-1 )
		browserName = "NonIE"; 
	else 
		browserName = "Safari"; 
		
} else {
	
	
 
    browserName="NonIE";

}

if ( OSName =="WinXP") {
// code for XP Font goes here....


if(browserName=="NonIE") {


document.write("<style type='text/css'>");
document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
document.write(" src: url("+path_to_eot+"APUniAprantWebWinXP.ttf) format('truetype') ; } ");
document.write(" </style>");

} else {

document.write("<style type='text/css'>");
document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
document.write("   src: url("+path_to_eot+"APUniAprantWebWinXP.eot); }");
document.write(" </style>");
}


} else if ( OSName =="MacOS" || getMobileOperatingSystem()=="iOS") {
// code for Mac and iOS goes here....	
	if(browserName=="Safari"  ) {
		
		
		
		document.write("<style type='text/css'>");
		document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
		document.write(" src: url("+path_to_eot+"APUniAprantWebMac.ttf) format('truetype') ; } ");				          
		document.write(" </style>");
		
	} else {
		
		document.write("<style type='text/css'>");
		document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
		document.write(" src: url("+path_to_eot+"APUniAprantWebWin7.ttf) format('truetype') ; } ");				          
		document.write(" </style>");
		
	}	
	
}  else if ( OSName !="MacOS" && browserName=="Safari"  ) {
	
// code for Win and Safari.	
	
		
		document.write("<style type='text/css'>");
		document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
		document.write(" src: url("+path_to_eot+"APUniAprantWebWin7.ttf) format('truetype') ; } ");				          
		document.write(" </style>");
		
	
	
}


else {

// code for Win7 and other operating system and browsers goes here.


if(browserName=="NonIE") {


document.write("<style type='text/css'>");
document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
document.write(" src: url("+path_to_eot+"APUniAprantWebWin7.ttf) format('truetype') ; } ");				          
document.write(" </style>");

} else {

document.write("<style type='text/css'>");
document.write(" @font-face { font-family:"+aprant_custom_font +";font-style:  normal;font-weight: normal;");
document.write("   src: url("+path_to_eot+"APUniAprantWebWin7.eot); }");
document.write(" </style>");
}

}


/**
 * Determine the mobile operating system.
 * This function returns one of 'iOS', 'Android', 'Windows Phone', or 'unknown'.
 *
 * @returns {String}
 */
function getMobileOperatingSystem() {
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;

      // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
    }

    if (/android/i.test(userAgent)) {
        return "Android";
    }

    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }

    return "unknown";
}