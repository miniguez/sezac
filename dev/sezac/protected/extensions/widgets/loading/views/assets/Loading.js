
$(function() {

        var permanotice = $.pnotify({
                    title: "<center>Cargando</center>",
                    text:"<center>Espere un Momento por Favor..<br><div class='loading'></div></center>",
                    type: 'success',
                    icon: 'picon picon-throbber',
                    hide: true,
                    closer: false,
                    sticker: false,
                    opacity: .75,
                    shadow: false,
                    width: "250px",   
                    min_height: "140px",
                    stack: false,
                    mouse_reset : false,
                    before_open: function(pnotify) {
                    // Position this notice in the center of the screen.
                    pnotify.css({
                        "top": ($(window).height() / 2) - (pnotify.height() / 2),
                        "left": ($(window).width() / 2) - (pnotify.width() / 2)
                    });
                   }
                });
	function LoadingConstructor(config) {
            
//		if (window.Loading) 
//                   return window.Loading;
//		
	
                
        }

	LoadingConstructor.prototype = {
            
		show:function() {
		//	this.$el.show().css('opacity', 0).animate({opacity:this.maxOpacity}, this.animationDuration);
                     permanotice.pnotify_display();   
		},
		hide:function() {
                     permanotice.pnotify_remove();
		}
	}

	window.Loading = new LoadingConstructor();
         $(window).load(function() {
           permanotice.pnotify_remove();
       });
       $(window).ready(function() {
           permanotice.pnotify_remove();
       });
});