/**
 * Created by MinhMan.Tran on 3/4/2016.
 */
var BBO = (function(){
    'use strict';
    var method = {
        windowWidthHeight: function(){
            var heightWindow = document.documentElement.clientHeight;
            var widthWindow = document.documentElement.clientWidth;
            var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
            if (iOS) {
                var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
                heightWindow = window.innerHeight * zoomLevel;
                widthWindow = window.innerWidth * zoomLevel;
            }
            return {width: widthWindow, height: heightWindow};
        },
        watchHeight: function(selector){
            $(window).on('load resize', function(){

                $(selector).removeAttr('style');

                if($(window).width() >= 768) {
                    var maxHeight = Math.max.apply(null, $(selector).map(function () {
                        return $(this).height();
                    }).get());
                    $(selector).height(maxHeight);
                }
            });
        },
        init: function () {
            //method.watchHeight();
        }
    };
    return {
        init: method.init,
        watchHeight: method.watchHeight
    }
})();


$(function(){
    'use strict';

    $('a[target="null"]').removeAttr('target');
    $(document).on('click', 'a', function(event){
        var url = $(this).attr('href');
        if(url && url[0] === '#' && url[1]) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $(url).offset().top - 30
            }, 500);
        }
    });

    BBO.init();
    BBO.watchHeight('#ht-featured-post-section .ht-featured-post .watch');
});