

$(document).ready(function() {


    $('.learnMore').click(function() {

        $.fancybox({'href' :'http://www.gallantone.com',
            //'title' : 'so far so good',
            'padding'       : 0,
            'modal'     : false,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'showLoading' : 'true',
            'transitionOut' : 'none',
            'width'     : 680,
            'height'        : 495,
            'showCloseButton'   : true,
            'type'                         :'iframe'
        });

    });


});