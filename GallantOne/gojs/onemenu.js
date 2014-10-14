/**
 * jQuery Rollovers and Submenus
 * Version 0.1 - 03/01/2009
 * @author Greg A. Gallant
 *
 **/
//alert($('.rollover').src);
//$.preloadImages("/gfx/m_home.jpg","/gfx/o_home.jpg");
//alert('Currently undergoing redesign');

var noclick = 0;
var nomenu = 0;
var current_menu;
var previous_menu;

/* Preloading images */
jQuery.preloadImages = function() {

	for(var i=0; i<arguments.length; i++) 
	{
		jQuery("<img>").attr("src",arguments[i]);
	}
}


$.preloadImages(
	"/gfx/o_home.jpg",
	"/gfx/o_honors.jpg",
	"/gfx/o_linkedin.jpg",
	"/gfx/o_logodesign.jpg",
	"/gfx/o_printdesign.jpg",
	"/gfx/o_webdesign.jpg",
	"/gfx/o_websoftware.jpg",
	"/gfx/o_resume.jpg",
	"/gfx/o_linkedin.jpg",
	"/gfx/site_conductor.jpg",
	"/gfx/site_theladders.jpg",
	"/gfx/site_xbssolutions.jpg"
);


var obmenu = {

	home: "home",
	soft: "websoftware",
	desi: "webdesign",
	prin: "printdesign",
	logo: "logodesign",
	hono: "honors",
	resu: "resume",
	link: "linkedin"

};


$(document).ready(function() {
	//console.log(jQuery.url.segment(0));
	setCurrentMenu('home');

	/* Preload remaining images */
   $.preloadImages(
	"/gfx/clients/client_chase.jpg",
	"/gfx/clients/client_esmu.jpg",
	"/gfx/clients/client_gm.jpg",
	"/gfx/clients/client_noah.jpg",
	"/gfx/clients/client_nyst.jpg",
	"/gfx/clients/client_tspot.jpg",
	"/gfx/clients/client_visage.jpg",
	"/gfx/clients/logo_nuea.jpg",
	"/gfx/clients/logo_nyst.jpg",
	"/gfx/clients/logo_one.jpg",
	"/gfx/clients/logo_uaxiom.jpg",
	"/gfx/clients/print_canopy.jpg",
	"/gfx/clients/print_eco.jpg",
	"/gfx/clients/print_gibson.jpg",
	"/gfx/clients/print_invite.jpg",
	"/gfx/clients/print_journal.jpg",
	"/gfx/clients/print_layout.jpg",
	"/gfx/clients/print_rapost.jpg",
	"/gfx/clients/print_tourism.jpg",
	"/gfx/clients/print_wbpost.jpg"
   );


	/* Sectional Highlights */
	
	$('.inversediv').hide();
	$('.alldetails').hide();

	$('.mhome').click(function() {
		resetMenus();
		if ( getCurrentMenu() == 'home' || nomenu == 1) { return; } 
		nomenu = 0;
		//resetMenu(getPreviousMenu());
		setCurrentMenu('home');
		setPreviousMenu('home');

		upslideAll('0'); // Zero means close anything that is open
		$('.inversediv').slideToggle();

        //$('#m_home').css('background-image', 'url("/gfx/m_home.jpg")');
        closeBlueBoard();
	});


	$('.msoft').click(function() {

		//resetMenus();
		if ( getCurrentMenu() == 'soft' || nomenu == 1) { return; } 
		nomenu = 1;

		resetMenu(getPreviousMenu());
		setCurrentMenu('soft');
		//setPreviousMenu('soft');
		//$(this).css({'background-image':'url("/gfx/o_websoftware.jpg")'});
		
		//$('#m_soft').css({'background-image':'url("/gfx/o_'+obmenu['soft']+'.jpg")'});


		//resetMenus();
		//$('#m_soft').css('background-image', 'url("/gfx/o_websoftware.jpg")');
		upslideAll('0'); // Zero means close anything that is open
	
		//stickMenus('#m_soft', 'websoftware');
		toggleBlueBoard();


		// Was matching highlighted css, just for fun 
		/*
		var $bk = $('#m_soft').css('background-image');
		var parser = /^.*\/([_A-Za-z0-9]*\.jpg).*$/;	
		var result = parser.exec($bk);
		*/

		callSubMenu(1);

	});



    $('.mdesi').click(function() {
	
		if ( getCurrentMenu() == 'desi' || nomenu == 1 ) { return; } 
		nomenu = 1;

		resetMenu(getPreviousMenu());
		setCurrentMenu('desi');
		//setPreviousMenu('desi');
		//$(this).css({'background-image':'url("/gfx/o_webdesign.jpg")'});


        //$('#m_desi').css('background-image', 'url("/gfx/o_webdesign.jpg")');
        upslideAll('0'); // Zero means close anything that is open

		//stickMenus('#m_desi', 'webdesign');
        toggleBlueBoard();

        callSubMenu(2);


    });


    $('.mprin').click(function() {
		
		if ( getCurrentMenu() == 'prin' || nomenu == 1 ) { return; } 
		nomenu = 1;

		resetMenu(getPreviousMenu());
		setCurrentMenu('prin');
		//setPreviousMenu('prin');
		//$(this).css({'background-image':'url("/gfx/o_printdesign.jpg")'});
		
        upslideAll('0'); // Zero means close anything that is open
		

        toggleBlueBoard();


        callSubMenu(3);
		

    });


    $('.mlogo').click(function() {
		
		if ( getCurrentMenu() == 'logo' || nomenu == 1 ) { return; } 
		nomenu = 1;
		resetMenu(getPreviousMenu());
		setCurrentMenu('logo');
		//setPreviousMenu('logo');
		//$(this).css({'background-image':'url("/gfx/o_logodesign.jpg")'});
		
        upslideAll('0'); // Zero means close anything that is open

        toggleBlueBoard();


        callSubMenu(4);
		

    });


    $('.mhono').click(function() {
		
		if ( getCurrentMenu() == 'hono' || nomenu == 1 ) { return; } 
		nomenu = 1;
		resetMenu(getPreviousMenu());
		setCurrentMenu('hono');
		//setPreviousMenu('hono');
		//$(this).css({'background-image':'url("/gfx/o_honors.jpg")'});
        
		upslideAll('0'); // Zero means close anything that is open

        toggleBlueBoard();

        callSubMenu(5);
		

    });

});


	/**
	 * Returns the height of my blueboard
	 */
	function getBlueboardHeight() {
		//console.log( $('.blueboard').css('height') );

		var bbheight = $('.blueboard').css('height');

		return bbheight;
		
	}

	/**
 	 * toggleBlueBoard pushes my backdrop down
	 */
	function toggleBlueBoard() {
		//console.log(noclick);
		if (noclick != 0) {
			return;
		}

		var bbh = getBlueboardHeight();

		$('.bluemt').fadeOut();

		if (bbh == '269px') {
			noclick = 1;
			$('.blueboard').animate({
				height:"538px"
			}, 650, 'linear', fadeInDetails );


		} else {

			noclick = 1;
			fadeOutDetails();

			$('.blueboard').animate({
				height:"269px"
			}, 200, 'linear', resetnoclick );

			$('.blueboard').animate({
				height:"538px"
			}, 650, 'linear', fadeInDetails );

		}

	}

	/* Just close the blue board */
	function closeBlueBoard() {

			noclick = 1;
			fadeOutDetails();

			$('.blueboard').animate({
				height:"269px"
			}, 600, 'linear', homereset );
			noclick = 0;
	}

	function fadeInDetails() {
		noclick = 0;
		nomenu = 0;
		$('.alldetails').fadeIn();
	}


	function fadeOutDetails() {
		$('.alldetails').fadeOut();
	}

	function resetnoclick() {
		noclick = 0;
	}

	function homereset() {
		noclick = 0;
		nomenu = 0;
		$('.bluemt').fadeIn();
	}


	function resetMenu(mitem) {
		initDetails();

		mid = '#m_'+mitem;

		var longname = obmenu[mitem];

		onitem = '/gfx/o_'+longname+'.jpg';
		offitem = '/gfx/m_'+longname+'.jpg';

		$(mid).css({'background-image':'url("'+offitem+'")'});

        $(mid).hover(function() {
			$(mid).css({'background-image':'url('+onitem+')'});
		}, function() {
			$(mid).css({'background-image':'url('+offitem+')'});
		});


	}


	/**
	 * There's gotta be a better way to do this 
	 * Like making each one of these its own object and cloning it
	 */
	function resetMenus() {

		initDetails();

        $('#m_home').css('background-image', 'url("/gfx/m_home.jpg")');
        $('#m_soft').css('background-image', 'url("/gfx/m_websoftware.jpg")');
        $('#m_desi').css('background-image', 'url("/gfx/m_webdesign.jpg")');
        $('#m_prin').css('background-image', 'url("/gfx/m_printdesign.jpg")');
        $('#m_logo').css('background-image', 'url("/gfx/m_logodesign.jpg")');
        $('#m_hono').css('background-image', 'url("/gfx/m_honors.jpg")');

        $('#m_home').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_home.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_home.jpg")'});
		});

        $('#m_soft').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_websoftware.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_websoftware.jpg")'});
		});

		

        $('#m_desi').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_webdesign.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_webdesign.jpg")'});
		});

        $('#m_prin').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_printdesign.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_printdesign.jpg")'});
		});

        $('#m_logo').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_logodesign.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_logodesign.jpg")'});
		});

        $('#m_hono').hover(function() {
			$(this).css({'background-image':'url("/gfx/o_honors.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/m_honors.jpg")'});
		});
	

	}

	/* My hover-click hack */
	function stickMenus($menuitem, image) {
        //$('a #m_desi').css('background-image', 'url("/gfx/m_webdesign.jpg")');
        //$('#m_desi').hover(function() {
        $($menuitem).hover(function() {
			$(this).css({'background-image':'url("/gfx/m_'+image+'.jpg")'});
		}, function() {
			$(this).css({'background-image':'url("/gfx/o_'+image+'.jpg")'});
		});
	}


	/**
	 * Build me submenu 
	 */
	function callSubMenu(type_id) {

		var submenu = '&nbsp;>>&nbsp; ';

		$.getJSON("http://www.gallantone.com/index/client/?cli=69",
			function(data) {
				$.each(data.clients, function(i,item){
						//alert(item.name);
					if (item.client_type_id == type_id) {
						submenu = submenu.concat('<a class="'+item.client_name+'" href="#" onclick="javascript:prepareDetails('+item.clients_id+')">'+item.name+'</a><img width="32px" height="1px" src="/gfx/spacer.gif"/>');

					}
			});
			
			$('.submenuDec').html(submenu);

		}); 

	}
	
	/**
	 * Build Details from whatever is clicked in me submenu
	 */
	function callDetails(id) {	

		initDetails();

		$.getJSON("http://www.gallantone.com/index/client/?cli=69",
		function(data) {
			$.each(data.clients, function(i,item){
				if (item.clients_id == id) {

					if (id == 19) {
						var img_detail = '<iframe src="http://rcm.amazon.com/e/cm?t=gallantnyccom-20&o=1&p=8&l=as1&asins=3908247667&fc1=000000&IS2=1&lt1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>';

					} else {
						var img_detail = '<img id="theimage" style="border:1px solid #000000;" src="/gfx/clients/'+item.image+'"/>';
					}

					$('.siteimg').html(img_detail);

					var shref = '<a class="hoturl" href="'+item.url+'">'+item.url+'</a>';
					$('.siteurl').html(shref);

					$('.sitename').html(item.name);
					
					if (id != 19) {
						var techbar = '<div class="techbar">Technologies</div><div>'+item.tech+'</div>';
						$('.sitetech').html(techbar);
					}

					var dbar = '<div class="techbar">Description</div><div>'+item.thejob+'</div>';
					$('.respect').html(dbar);
					$('.idetails').html(item.details);

				}
			});

			$('.sitedetails').fadeIn();

		}); 
	
	}

	/* Sub highlighter */
	function highlightSub(iname) {
		var subob = '.'+iname;
		$(subob).css({'background-color':'#fcfcff', 'padding':'2px', 'border':'1'});
			//$(this).css({'background-image':'url("/gfx/o_'+image+'.jpg")'});
	}

	function resetSubs(type_id) {

		$.getJSON("http://www.gallantone.com/index/client/?cli=69",
			function(data) {
				$.each(data.clients, function(i,item){
					if (item.client_type_id == type_id) {
						var osu = '.'+item.client_name;
						$(osu).css({'background-color':'#ffe98f'});

					}
			});
		}); 

	}


	/**
 	 * prepareDetails
	 * Makes sure the fadeout ends before the fadein begins
	 */	
	function prepareDetails(id) {

		if ('.sitedetails') {
			$('.sitedetails').fadeOut('normal', function() {
				callDetails(id);
			});
		} else {
			callDetails(id);
		}

	}

	/**
	 *  initDetails simply blanks all fields
	 */
	function initDetails() {

		var ginit = "&nbsp;";

		$('.siteimg').html(ginit);
		$('.sitename').html(ginit);
		$('.siteurl').html(ginit);
		$('.sitetech').html(ginit);
		$('.respect').html(ginit);
		$('.idetails').html(ginit);
		
	}


//// Getter/Setters /////

	/* Sets the current menu */
	function setCurrentMenu($val) {
		current_menu = $val;	
	}

	/* Gets the current menu */
	function getCurrentMenu() {
		return current_menu;
	}

	/* Sets the current menu */
	function setPreviousMenu($val) {
		previous_menu = $val;	
	}


	/* Gets the current menu */
	function getPreviousMenu() {
		return previous_menu;
	}


