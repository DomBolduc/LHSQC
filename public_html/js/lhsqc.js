$(document).ready(function() {



    console.log('LHSQC Javascript loaded'); // Check if the event is triggered



    







    //Mobile Nav



      // Toggle the main mobile menu

      $('ul.button-menu').on('click', function(){

            console.log('Menu button clicked'); // Check if the event is triggered

       

            $('.nav-mobile-menu').toggleClass('active');//		$('.nav-mobile ul.nav-mobile-menu').toggle();

        });



 

        // Toggle submenus within the mobile menu

        $('.nav-mobile-menu > li > div').on('click', function() {

            console.log('SubMenu button clicked'); // Check if the event is triggered

            // Toggle the submenu for the clicked menu item

            $(this).siblings('ul').slideToggle(); // Smooth toggle

            // Optionally, close other submenus when a new one is opened

            $(this).parent().siblings('li').find('ul').slideUp();

        });



        $('.nav-mobile-menu > li > ul').on('click', function(event) {

            event.stopPropagation(); // Prevent event bubbling up to parent menus

            console.log('SubSub Menu button clicked'); // Check if the event is triggered

            

            // Toggle the submenu inside the clicked menu item

            $(this).children('div').slideToggle(); // Slide toggle the submenu

            

            // Optionally, hide other open submenus (to close them when one is opened)

            $(this).parent().siblings().find('ul').slideUp();

        });





            





    document.querySelectorAll('.scroll-link').forEach(link => {

        link.addEventListener('click', function(event) {

        event.preventDefault();  // Prevent default anchor behavior



        const targetId = this.getAttribute('href').substring(1);  // Get the ID without the '#'

        const targetElement = document.getElementById(targetId);



        if (targetElement) {

            const offset = 80;  // Set your offset value here

            const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;

            const offsetPosition = elementPosition - offset;



            window.scrollTo({

            top: offsetPosition,

            behavior: 'smooth'

            });

        }

        });

    });



    

    

    







    

//StickyNav

	function isMobile() {

		return ( 'ontouchstart' in document.documentElement ? true : false );

	}

	function StickyNav() {



		if ( isMobile() )

			return;

		

		var nav = $('nav');

		

		var sticky = nav.clone().prop('id','stickynav');

		sticky.html( '<div class="shell">'+ sticky.html() +'</div>' );

		$('body').prepend(sticky);



		$(window).on('scroll', function() {

			var scrollTop = $(this).scrollTop();



			if ( scrollTop > 60 ) {

				$('#stickynav').addClass('animate').css( "visibility", "visible" );;

				$('header nav').css( "visibility", "hidden" );

			}

			else {

				$('#stickynav').removeClass('animate').css( "visibility", "hidden" );;

				$('header nav').css( "visibility", "visible" );

			}

		});



	}



	$(function() {

		StickyNav();

	});





    



   



//Alerts

	$('.close').on('click', function(){

		$(this).parent().fadeOut();

	});

	

//Vertical Hover Tab

	$('.tab-content div').hide(); 

	$('.tab-content div:first-child').show(); 

	$('.tab-nav li:first-child').addClass('active'); 



	$('.hover-tab').each(function() { 

		$(this).find('li').on('mouseenter', function() { 

		var index = $(this).parent().children().index($(this)); 

		$(this).addClass('active').siblings('.active').removeClass('active'); 

		$(this).closest('.module-content').find('.tab-content div').eq(index).show().siblings().hide(); 

		}); 

	});



//Vertical Click Tab

	$('.tab-content div').hide(); 

	$('.tab-content div:first-child').show(); 

	$('.tab-nav li:first-child').addClass('active'); 



	$('.click-tab').each(function() { 

		$(this).find('li').on('click', function() { 

		var index = $(this).parent().children().index($(this)); 

		$(this).addClass('active').siblings('.active').removeClass('active'); 

		$(this).closest('.module-content').find('.tab-content div').eq(index).show().siblings().hide(); 

		}); 

	});



//StickyNav

	function isMobile() {

		return ( 'ontouchstart' in document.documentElement ? true : false );

	}

	function StickyNav() {



		if ( isMobile() )

			return;

		

		var nav = $('nav');

		

		var sticky = nav.clone().prop('id','stickynav');

		sticky.html( '<div class="shell">'+ sticky.html() +'</div>' );

		$('body').prepend(sticky);



		$(window).on('scroll', function() {

			var scrollTop = $(this).scrollTop();



			if ( scrollTop > 60 ) {

				$('#stickynav').addClass('animate').css( "visibility", "visible" );;

				$('header nav').css( "visibility", "hidden" );

			}

			else {

				$('#stickynav').removeClass('animate').css( "visibility", "hidden" );;

				$('header nav').css( "visibility", "visible" );

			}

		});



	}



	$(function() {

		StickyNav();

	});



/*

 $('.list-group li').click(function(e) {

        e.preventDefault()

        

        $that = $(this);

        

        $('.list-group').find('li').removeClass('active');

        $that.addClass('active');

    });



*/



});					
