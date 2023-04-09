$(document).ready(function () {
    increaseFontSize();
    decreaseFontSize();
    reSetFontSize();
    

   // $("#skipbtn").click(function () {
       // $('html, body').animate({
          //  scrollTop: $("#smoothmenu1, .Menu").offset().top - 100
       // }, 1000);
 //   });

	
	/*Skip Content*/
$(function() {	
  $("#skipbtn").bind("click", function() {
	$('html, body').animate({
    scrollTop: $("#smoothmenu1").offset().top
	}, 2000);
  });
});
	
	
	
	
    $('#menu-button').click(function () {
        $('#nav').toggle();
    });

    $('title').html('ST & SC');

    
});


function loadNavigation(pgName, pgId, lftnavId, strFirstLink, strLastLink) {
    var pathName = window.location.pathname;
    var path = pathName.split("/");
    var fPath = path[0];
    var sPath = path[1];
    var getPath = sPath.split(".");
    var absPath = getPath[0];
    //alert(path);
    if (pgName == absPath)
        $('.' + pgId).addClass('actives ');
        $('#' + lftnavId).addClass('actives');
        $('#sFL').text(strFirstLink);
            if (strLastLink != '')
        $('#sSL').html(strLastLink);

}

var min = 14;
var max = 16;
var reset = 15;
function increaseFontSize() {
    var p = document.getElementsByTagName('body');
    for (i = 0; i < p.length; i++) {
        if (p[i].style.fontSize) {
            var s = parseInt(p[i].style.fontSize.replace("px", ""));
        } else {
            var s = 15;
        }
        if (s != max) {
            s += 1;
        }
        p[i].style.fontSize = s + "px"
    }
}
function decreaseFontSize() {
    var p = document.getElementsByTagName('body');
    for (i = 0; i < p.length; i++) {
        if (p[i].style.fontSize) {
            var s = parseInt(p[i].style.fontSize.replace("px", ""));
        } else {
            var s = 15;
        }
        if (s != min) {
            s -= 1;
        }
        p[i].style.fontSize = s + "px"
    }
}

function reSetFontSize() {
    var p = document.getElementsByTagName('body');
    for (i = 0; i < p.length; i++) {
        if (p[i].style.fontSize) {
            var s = parseInt(p[i].style.fontSize.replace("px", ""));
        } else {
            var s = 15;
        }
        if (s != reset) {
            s = 15;
        }
        p[i].style.fontSize = s + "px"
    }
}

setInterval(function () {
    $('.screenReader').each(function (i) {
        $(this).attr('tabindex', i);
    });
}, 3000);