jQuery(document).ready(function(){
/*global jQuery:false */
/*jshint devel:true, laxcomma:true, smarttabs:true */
"use strict";

	// show navigation when scroll up
	var c, currentScrollTop = 0,
	 navbar = jQuery('.will_stick');
	
	jQuery(window).scroll(function () {
		var a = jQuery(window).scrollTop() -200;
		var b = navbar.height();
		
		currentScrollTop = a;
		
		if (c < currentScrollTop && a > b + b) {
		  navbar.addClass("scrollUp");
		} else if (c > currentScrollTop && !(a <= b)) {
		  navbar.removeClass("scrollUp");
		}
		c = currentScrollTop;
	});
	// fix navigation when scroll down 400px
	jQuery(".will_stick");
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 400) {
				jQuery('.will_stick').addClass("scrollDown")
			} else {
				jQuery('.will_stick').removeClass("scrollDown")
			}
		});
	});


	// scroll to top
	jQuery(".scrollTo_top").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.scrollTo_top').fadeIn();
			} else {
				jQuery('.scrollTo_top').fadeOut();
			}
		});

	jQuery('.scrollTo_top a').on('click',function(){
		jQuery('html, body').animate({scrollTop:0}, 500 );
		return false;
	});
	});
		
	// searchtrigger
	jQuery('a.searchOpen').on('click',function(){ 
			jQuery('#curtain').toggleClass('open'); 
            jQuery(this).toggleClass('opened'); 
			return false; 
	}); 
	
	jQuery('a.curtainclose').on('click',function(){ 
			jQuery('#curtain').removeClass('open'); 
			jQuery('a.searchOpen').removeClass('opened');
			return false; 
	});
	
	/* menutrigger */
	jQuery('a.menuOpen').on('click',function(){ 
            jQuery(this).toggleClass('opened'); 
			jQuery('#flyoff').toggleClass('visible'); 
			jQuery('.action-overlay').toggleClass('visible');
			jQuery('body').toggleClass('flyoff-is-visible');
			return false; 
	}); 
	
	jQuery('a.menuClose').on('click',function(){ 
			jQuery('a.menuOpen').removeClass('opened');
			jQuery('#flyoff').removeClass('visible');
			jQuery('.action-overlay').removeClass('visible');
			jQuery('body').removeClass('flyoff-is-visible');
			return false; 
	});
	
	jQuery('.action-overlay').on('click',function(){ 
			jQuery('a.menuOpen').removeClass('opened');
			jQuery('#flyoff').removeClass('visible');
			jQuery('.action-overlay').removeClass('visible');
			jQuery('body').removeClass('flyoff-is-visible');
			return false; 
	});

jQuery(function($) {
    //Create the cookie object
    var cookieStorage = {
        setCookie: function setCookie(key, value, time, path) {
            var expires = new Date();
            expires.setTime(expires.getTime() + time);
            var pathValue = '';
            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }
            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        },
        removeCookie: function removeCookie(key) {
            document.cookie = key + '=; Max-Age=0; path=/';
        }
    };

    //Click on dark mode icon. Add dark mode classes and wrappers. Store user preference through sessions
    $('.tmnf-button').click(function() {
        //Show either moon or sun
        $('.tmnf-button').toggleClass('active');
        //If dark mode is selected
        if ($('.tmnf-button').hasClass('active')) {
            //Add dark mode class to the body
            $('body').addClass('dark-mode');
            cookieStorage.setCookie('tmnfNightMode', 'true', 2628000000, '/');
        } else {
            $('body').removeClass('dark-mode');
            setTimeout(function() {
                cookieStorage.removeCookie('tmnfNightMode');
            }, 100);
        }
    })

    //Check Storage. Display user preference 
    if (cookieStorage.getCookie('tmnfNightMode')) {
        $('body').addClass('dark-mode');
        $('.tmnf-button').addClass('active');
    }
})

	// mobile menu
	
    jQuery(document).ready(function () {
        tmnf_dropdown_mobile();
    });
	
    window.tmnf_dropdown_mobile = () => {
        let windowW = jQuery(window).width();

        jQuery('#main-nav li.menu-item-has-children > a').each(function () {
            jQuery(this).append('<span class="tmnf_mobile_dropdown"></span>');
        });

        jQuery('body').find('.tmnf_mobile_dropdown').on('click', function (e) {
            e.preventDefault();
            let dd = jQuery(this);
            dd.closest('li').toggleClass(function () {
                if ( window.innerWidth < 1025) {
                    let subMenu = dd.closest('li').children('.sub-menu');
                    subMenu.toggle();
                }
                return 'active';
            });
        });
    };

});