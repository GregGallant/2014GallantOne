

$(document).ready(function() {


    /* Mobile redirect */
    if (window.location.pathname == '/portfolio/1') {
        if ($(window).width() <= 480) {
            window.location = "/mobile/1";
        }
    }


    /* Hide the page until the grueling portfolio of eye bleeding work is fully loaded */
    $(window).load(function() {
        $(".preLoader").hide();
        $(".portfolioContent").fadeIn(2000);
    });

    /* Port Screen Content handler */
    var tc = $('#totalScreenContent').val();
    for (var i=0; i < tc; i++ ) {
        var aScreen = document.getElementById('portScreenContent'+i);
        var aScreenJQ = '#' + aScreen.id;
        if (i != 0) {
            $(aScreenJQ).hide();

            //var leftPort = document.getElementById('portfolioImage'+i);
            //var rightPort = document.getElementById('innerPortRight'+i);
            //var lpjq = '#' + leftPort.id;
            //var rpjq = '#' + rightPort.id;
            //$(lpjq).hide();
           // $(rpjq).toggleClass("hidden");

            //$(aScreenJQ).toggleClass("hidden");
        }
    }

    // iControl - Get something (portfolio image) that was clicked
    $('a[name=imageControl]').click(function(){
        hideAllScreens();
        var currentControl = this.id;
        // Check to ensure this was an imageControl
        if (currentControl.indexOf("imageControl") != -1) {
            var icText = "imageControl";
            var screenNumber = currentControl.replace(icText,'');
            var ccJQ = "#portScreenContent"+screenNumber;
            $(ccJQ).fadeIn(1000);
            //$(ccJQ).show();
        }
    });


    //$('.portScreenContent').hide();

    /* The Learn More button */

    $('a[name=learnMore]').click(function() {

        var currentScreen = this.id;
        if (currentScreen.indexOf("learnMore") != -1) {
            var lmText = "learnMore";
            var cnum = currentScreen.replace(lmText,'');
        }

        $.fancybox({'href' :'/light/'+cnum,
            //'title' : 'so far so good',
            'padding'       : 0,
            'modal'     : true,
            'autoScale'     : false,
            'transitionIn'  : 'openEffect',
            'showLoading' : 'true',
            'transitionOut' : 'none',
            'openEffect' : 'fade',
            'openSpeed' : 500,
            'width'     : 800,
            'height'        : 600,
            'maxWidth'     : 800,
            'maxHeight'        : 600,
            'minWidth' : 800,
            'minHeight' : 600,
            'autoWidth'     : false,
            'autoHeight'        : false,
            'autoResize' : false,
            'autoScale' : false,
            'showCloseButton'   : false,
            'scrolling' : false,
            'type'                         :'iframe'
        });

    });


});

/* Please make a closure */
function hideAllScreens()
{

    /* Port Screen Content handler */
    var tc = $('#totalScreenContent').val();
    for (var i=0; i < tc; i++ ) {
        var aScreen = document.getElementById('portScreenContent'+i);
        var aScreenJQ = '#' + aScreen.id;
        $(aScreenJQ).hide();
    }
}


