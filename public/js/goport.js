

$(document).ready(function() {


    $('.learnMore').click(function() {

        $.fancybox({'href' :'/light/1',
            //'title' : 'so far so good',
            'padding'       : 0,
            'modal'     : false,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'showLoading' : 'true',
            'transitionOut' : 'none',
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