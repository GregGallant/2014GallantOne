/**
 * jQuery Pulldown menus
 * Version 0.1 - 03/01/2009
 * @author Greg A. Gallant
 *
 **/
//alert($('.rollover').src);
//$.preloadImages("/gfx/m_home.jpg","/gfx/o_home.jpg");
//alert('Currently undergoing redesign');

$(document).ready(function() {
	//console.log(jQuery.url.segment(0));

	// Chained hide on arrows
	$('#prp_1_on').hide();
	$('#prp_2_on').hide();
	$('#prp_3_on').hide();
		//.find('#prp_usa_on').hide().end()
		//.find('#prp_data_on').hide();


	// Chained event, hide my prop menus 
	$('.pro1').hide().end()
		.find('.pro2').hide().end()
		.find('.pro3').hide().end()
		.find('.pro4').hide();


	$('.apro1').click(function() {
		upslideAll('1');

		//alert ($('#prp_web_on').css("display")); 
		if ( $('#prp_1_on').css("display") == 'none') {
			$('#prp_1_on').show();
			$('#prp_1_off').hide();
		} else {
			$('#prp_1_on').hide();
			$('#prp_1_off').show();
		}

		$('.pro1').slideToggle();
	});

	$('.apro2').click(function() {
		upslideAll('2');

		if ( $('#prp_2_on').css("display") == 'none') {
			$('#prp_2_on').show();
			$('#prp_2_off').hide();
		} else {
			$('#prp_2_on').hide();
			$('#prp_2_off').show();
		}

		$('.pro2').slideToggle();
	});

	$('.apro3').click(function() {
		upslideAll('3');

		if ( $('#prp_3_on').css("display") == 'none') {
			$('#prp_3_on').show();
			$('#prp_3_off').hide();
		} else {
			$('#prp_3_on').hide();
			$('#prp_3_off').show();
		}
		
		$('.pro3').slideToggle();
	});

	$('.apro4').click(function() {
		upslideAll('4');
		$('.pro4').slideToggle();
	});

});



/* called from onclick, this should show my menu */
function upslideAll(prop) {

	//console.log(prop);

	for(var i=1; i < 5; i++) {

		obname = '.pro'+i;
		onidname = '#prp_'+i+'_on';
		offidname = '#prp_'+i+'_off';

		if (prop != i) {
			$(obname).slideUp();

			$(onidname).hide();
			$(offidname).show();
		}
	}
		
}


