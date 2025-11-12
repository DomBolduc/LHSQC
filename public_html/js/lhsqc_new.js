$(document).ready(function() {

    console.log('LHSQC Javascript loaded'); // Check if the event is triggered



    // Mobile Nav

    $('.button-menu li').on('click', function(event) {

        event.stopPropagation(); // Prevent the event from bubbling up

        console.log('Menu button clicked'); // Check if the event is triggered

        const menu = $('.nav-mobile-menu');

        menu.toggleClass('active');

      

    });





    // Toggle submenus within the mobile menu

    $('.nav-mobile-menu > li > div').on('click', function() {

        console.log('SubMenu button clicked'); // Check if the event is triggered

        $(this).siblings('ul').slideToggle(); // Smooth toggle

        $(this).parent().siblings('li').find('ul').slideUp(); // Close other submenus

    });



    $('.nav-mobile-menu > li > ul').on('click', function(event) {

        event.stopPropagation(); // Prevent event bubbling up to parent menus

        console.log('SubSub Menu button clicked'); // Check if the event is triggered

        $(this).children('div').slideToggle(); // Slide toggle the submenu

        $(this).parent().siblings().find('ul').slideUp(); // Hide other open submenus

    });



    // Scroll link

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







    // Sticky Nav

    function isMobile() {

        return ('ontouchstart' in document.documentElement ? true : false);

    }



    function StickyNav() {

        if (isMobile()) return;

        var nav = $('nav');

        var sticky = nav.clone().prop('id', 'stickynav');

        sticky.html('<div class="shell">' + sticky.html() + '</div>');

        $('body').prepend(sticky);

        $(window).on('scroll', function() {

            var scrollTop = $(this).scrollTop();

            if (scrollTop > 60) {

                $('#stickynav').addClass('animate').css("visibility", "visible");

                $('header nav').css("visibility", "hidden");

            } else {

                $('#stickynav').removeClass('animate').css("visibility", "hidden");

                $('header nav').css("visibility", "visible");

            }

        });

    }



    StickyNav();



    // Alerts close button

    $('.close').on('click', function() {

        $(this).parent().fadeOut();

    });



    // Tabs item active state

    /*document.querySelectorAll('#tabsList .tabsItem').forEach(item => {

        item.addEventListener('click', function() {

            document.querySelectorAll('#tabsList .tabsItem').forEach(el => el.classList.remove('active'));

            this.classList.add('active');

        });

    });*/











    /*! Tab Menu .... in ProTeam page  */ 



    jQuery('.tabsmenu.standard .tabmenu-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmenu '+ currentAttrValue).show().siblings().hide();

        jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');

        e.preventDefault();

    });

    jQuery('.tabsmenu.animated-fade .tabmenu-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmenu '+ currentAttrValue).fadeIn(400).siblings().hide();

        jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();

    });

    jQuery('.tabsmenu.animated-slide-1 .tabmenu-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmenu '+ currentAttrValue).siblings().slideUp(400);

        jQuery('.tabsmenu '+ currentAttrValue).delay(400).slideDown(400);

        jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();

    });

    jQuery('.tabsmenu.animated-slide-menu .tabmenu-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmenu '+ currentAttrValue).slideDown(400).siblings().slideUp(400);

        jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');

        e.preventDefault();

    });



    jQuery('.tabsmain.standard .tabmain-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmain '+ currentAttrValue).show().siblings().hide();

        jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');

        e.preventDefault();

    });

    jQuery('.tabsmain.animated-fade .tabmain-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmain '+ currentAttrValue).fadeIn(400).siblings().hide();

        jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');

        e.preventDefault();

    });

    jQuery('.tabsmain.animated-slide-1 .tabmain-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmain '+ currentAttrValue).siblings().slideUp(400);

        jQuery('.tabsmain '+ currentAttrValue).delay(400).slideDown(400);

        jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');e.preventDefault();

    });

    jQuery('.tabsmain.animated-slide-main .tabmain-links a').on('click',function(e){

        var currentAttrValue=jQuery(this).attr('href');

        jQuery('.tabsmain '+ currentAttrValue).slideDown(400).siblings().slideUp(400);

        jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');

        e.preventDefault();

    });















  

  

    





       

       

     

        const tabsMenu = document.querySelector('.tabsMenu');

     

        // Function to show the menu

        function showMenu() {

            tabsMenu.classList.add('active'); // Add active class to indicate the menu is open

            document.querySelectorAll('.tabsMenu .nav-item').forEach(item => {

                item.style.display = 'block';

            });

        }

    

        // Function to hide the menu

        function hideMenu() {

            tabsMenu.classList.remove('active'); // Remove active class to indicate the menu is closed

            document.querySelectorAll('.tabsMenu .nav-item').forEach(item => {

                if (!item.classList.contains('active')) {

                    item.style.display = 'none';

                }

            });

        }

    

        // Desktop hover event

        if(tabsMenu)

        {

            tabsMenu.addEventListener('mouseover', showMenu);

            tabsMenu.addEventListener('mouseout', hideMenu);

        }

 



        //let isTouchEvent = false;

        

        // Function to handle touchstart events

      /*  function handleTouchStart(event) {

            isTouchEvent = true;

            console.log("Tooouuuccccchhhhhh")

            if (event.target.classList.contains('nav-link')) {



                const parentLi = event.target.parentElement;

                if (tabsMenu.classList.contains('active')) {

                   

                    // If menu is already open, activate the clicked button and hide the menu

                    document.querySelectorAll('.tabsMenu .nav-item').forEach(item => {

                        item.classList.remove('active');

                        item.style.display = 'none'; // Hide all items

                    });

                    parentLi.classList.add('active');

                    parentLi.style.display = 'block'; // Show the clicked item

                    hideMenu(); // Hide the menu

                } else {

                    // Show the menu if it's closed

                    showMenu();

                }

            }

        }*/

          /* button.addEventListener('touchstart', function(event) {

                // Ensure the event is not triggered twice

                event.stopPropagation();

    

                // Remove active class from all nav items

                document.querySelectorAll('.tabsMenu .nav-item').forEach(item => {

                    item.classList.remove('active');

                    item.style.display = 'none'; // Hide all items

                });

    

                // Add active class to the clicked button's parent li

                this.parentElement.classList.add('active');

                this.parentElement.style.display = 'block'; // Show the clicked item

    

                // Hide the menu

               // hideMenu();

            });*/

        

    

        // Add touchstart and click event listeners

       // tabsMenu.addEventListener('touchstart', handleTouchStart);

       // tabsMenu.addEventListener('click', handleClick);

    











    // Hide menu on menu item click

    document.querySelectorAll('.tabsMenu .nav-link').forEach(button => {

        button.addEventListener('click', function() {

            const parentLi = this.parentElement;

    

            // Check if the parent li is already active

            const wasActive = parentLi.classList.contains('active');

    

            // Remove active class from all nav items

            document.querySelectorAll('.tabsMenu .nav-item').forEach(item => {

                item.classList.remove('active');

                item.style.display = 'none'; // Hide all items

            });

    

            // If the clicked button was not active, activate it

            if (!wasActive) {

                parentLi.classList.add('active');

                parentLi.style.display = 'block'; // Show the clicked item

                hideMenu();

            } 

            else { 

                showMenu();

            }

    

        });

    });

            

    

     







        // Attach click event listener to toggle column visibility

        document.querySelectorAll('a.toggle-vis').forEach((el) => {

            el.addEventListener('click', function (e) {

                e.preventDefault();

    

                // Get the column index and table ID from data attributes

                let columnIdx = e.target.getAttribute('data-column');

                let tableId = e.target.getAttribute('data-attribute');

                

                // Retrieve the DataTable instance using the table ID

                let table = $(`#${tableId}`).DataTable();

    

                if (!table) {

                    console.error(`Table with ID "${tableId}" not found or not initialized.`);

                    return;

                }

    

                // Toggle the visibility of the column

                let column = table.column(columnIdx);

                console.log(`Toggling column ${columnIdx} visibility on table "${tableId}"`);

                column.visible(!column.visible());

            });

        });

  





      

});

    







/*! Tab Menu Next 4 Lines*/ 

jQuery(document).ready(function(){jQuery('.tabsmenu.standard .tabmenu-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmenu '+ currentAttrValue).show().siblings().hide();jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();});jQuery('.tabsmenu.animated-fade .tabmenu-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmenu '+ currentAttrValue).fadeIn(400).siblings().hide();jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();});jQuery('.tabsmenu.animated-slide-1 .tabmenu-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmenu '+ currentAttrValue).siblings().slideUp(400);jQuery('.tabsmenu '+ currentAttrValue).delay(400).slideDown(400);jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();});jQuery('.tabsmenu.animated-slide-menu .tabmenu-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmenu '+ currentAttrValue).slideDown(400).siblings().slideUp(400);jQuery(this).parent('li').addClass('activemenu').siblings().removeClass('activemenu');e.preventDefault();});});

jQuery(document).ready(function(){jQuery('.tabsmain.standard .tabmain-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmain '+ currentAttrValue).show().siblings().hide();jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');e.preventDefault();});jQuery('.tabsmain.animated-fade .tabmain-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmain '+ currentAttrValue).fadeIn(400).siblings().hide();jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');e.preventDefault();});jQuery('.tabsmain.animated-slide-1 .tabmain-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmain '+ currentAttrValue).siblings().slideUp(400);jQuery('.tabsmain '+ currentAttrValue).delay(400).slideDown(400);jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');e.preventDefault();});jQuery('.tabsmain.animated-slide-main .tabmain-links a').on('click',function(e){var currentAttrValue=jQuery(this).attr('href');jQuery('.tabsmain '+ currentAttrValue).slideDown(400).siblings().slideUp(400);jQuery(this).parent('li').addClass('activemain').siblings().removeClass('activemain');e.preventDefault();});});









// helper function



function inArray(needle, haystack) {

	var ret = false;

    var length = haystack.length;

    for(var i = 0; i < length; i++) {

        if(haystack[i] == needle){ret = true;}

    }

    return ret;

}





//  toggle a div visibility

function toggleDiv(divId) {

    $("#"+divId).toggle();

}





//  toggle active class on a target and its source

function toggler(event, target)  {

    

    const divName = target ;   // `${target}${block}`;



    console.log("clicked",divName);

    const targetDiv = document.getElementById(divName);





    const source = event.target;

    source.classList.toggle('active'); // Toggle the active class on the button

    targetDiv.classList.toggle('active'); // Toggle the active class on the target div



}







// Helper function to format position

function formatPosition(player) {

    let position = '';

    position += player.PosC === "True" ? "C" : '';

    position += player.PosLW === "True" ? (position ? "/LW" : "LW") : '';

    position += player.PosRW === "True" ? (position ? "/RW" : "RW") : '';

    position += player.PosD === "True" ? (position ? "/D" : "D") : '';

    position += player.PosG === "True" ? (position ? "/G" : "G") : '';

    return position;

}

function formatPosition(PosC, PosLW, PosRW, PosD, PosG) {

    let position = '';

    position += PosC === "True" ? "C" : '';

    position += PosLW === "True" ? (position ? "/LW" : "LW") : '';

    position += PosRW === "True" ? (position ? "/RW" : "RW") : '';

    position += PosD === "True" ? (position ? "/D" : "D") : '';

    position += PosG === "True" ? (position ? "/G" : "G") : '';

    return position;

}
