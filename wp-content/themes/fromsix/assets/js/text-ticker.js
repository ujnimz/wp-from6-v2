/* 
// 
//
// options:
//
// effect: fade/slide
// speed: milliseconds
*/

(function($){
  $.fn.list_ticker = function(options) {
    
    var defaults = {
      speed:4000,
      effect:'slide'
    };
    
    var options = $.extend(defaults, options);
    
    return this.each(function() {
      
      var obj = $(this);
      var list = obj.children();
      list.not(':first').hide();
      
      setInterval(function() {
        
        list = obj.children();
        list.not(':first').hide();
        
        var first_li = list.eq(0);
        var second_li = list.eq(1);
    
    if(options.effect == 'slide') {
      first_li.slideUp(600);
      second_li.slideDown(600, function() {
        first_li.remove().appendTo(obj);
      });
    } else if(options.effect == 'fade') {
      first_li.fadeOut(600, function() {
        second_li.fadeIn(600);
        first_li.remove().appendTo(obj);
      });
    }
      }, options.speed);
    });
  };
})(jQuery);