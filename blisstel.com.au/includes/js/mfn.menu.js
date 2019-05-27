




/*
     FILE ARCHIVED ON 6:45:49 Mar 27, 2016 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 6:22:28 May 3, 2016.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
@Name:		Horizontal Multilevel Menu with WP MegaMenu Support
@Author:    Muffin Group
@WWW:       www.muffingroup.com
@Version:   2.0
*/

;(function($){
	$.fn.extend({
		muffingroup_menu: function(options) {
			var menu = $(this);
			
			var defaults = {
				addLast		: false,
				animation   : 'fade',	
				arrows      : false,
				delay       : 100,
				hoverClass  : 'hover'
			};
			options = $.extend(defaults, options);
			
			// .submenu --------------------------
			menu.find("li:has(ul)")
				.addClass("submenu")
				.append("<span class='menu-toggle'>") // responsive menu toggle
			;	
			
			// .mfn-megamenu-parent -------------
			menu.children("li:has(ul.mfn-megamenu)").addClass("mfn-megamenu-parent");	

			// .last-item - submenu -------------
			$(".submenu ul li:last-child", menu).addClass("last-item");
			
			// options.addLast ------------------
			if(options.addLast) {
				$("> li:last-child", menu)
					.addClass("last")
					.prev()
						.addClass("last");
			}
			
			// options.arrows -------------------
			if( options.arrows ) {
				menu.find( "li ul li:has(ul) > a" ).append( "<i class='menu-arrow icon-right-open'></i>" );
			}
			
			// .hover() -------------------------
			menu.find("> li, ul:not(.mfn-megamenu) li").hover(function() {
				$(this).stop(true,true).addClass(options.hoverClass);
				if (options.animation === "fade") {
					$(this).children("ul").stop(true,true).fadeIn(options.delay);
				} else if (options.animation === "toggle") {
					$(this).children("ul").stop(true,true).slideDown(options.delay);
				}
			}, function(){
				$(this).stop(true,true).removeClass(options.hoverClass);
				if (options.animation === "fade") {
					$(this).children("ul").stop(true,true).fadeOut(options.delay);
				} else if (options.animation === "toggle") {
					$(this).children("ul").stop(true,true).slideUp(options.delay);
				}
			});
	
		}
	});
})(jQuery);