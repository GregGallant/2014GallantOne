

$(document).ready(function() {



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
        }
    }

    //$('.portScreenContent').hide();

    /* The Learn More button */

    $('.learnMore').click(function() {

        $.fancybox({'href' :'/light/1',
            //'title' : 'so far so good',
            'padding'       : 0,
            'modal'     : true,
            'autoScale'     : false,
            'transitionIn'  : 'openEffect',
            'showLoading' : 'true',
            'transitionOut' : 'none',
            'openEffect' : 'elastic',
            'openSpeed' : 500,
            'width'     : '800px',
            'height'        : '600px',
            'maxWidth'     : '800px',
            'maxHeight'        : '600px',
            'autoWidth'     : false,
            'autoHeight'        : false,
            'autoResize' : false,
            'showCloseButton'   : true,
            'type'                         :'iframe'
        });

    });

});

