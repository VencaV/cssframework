/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

;(function($) {

  $.fn.unveil = function(threshold, callback) {

    var $w = $(window),
        th = threshold || 0,
        retina = window.devicePixelRatio > 1,
        attrib = retina? "data-src-retina" : "data-src",
        images = this,
        loaded;

    this.one("unveil", function() {
      var source = this.getAttribute(attrib);
      source = source || this.getAttribute("data-src");
      if (source) {
        this.setAttribute("src", source);
        if (typeof callback === "function") callback.call(this);
      }
    });

    function unveil() {
      var inview = images.filter(function() {
        var $e = $(this);
        if ($e.is(":hidden")) return;

        var wt = $w.scrollTop(),
            wb = wt + $w.height(),
            et = $e.offset().top,
            eb = et + $e.height();

        return eb >= wt - th && et <= wb + th;
      });

      loaded = inview.trigger("unveil");
      images = images.not(loaded);
    }

    $w.on("scroll.unveil resize.unveil lookup.unveil", unveil);

    unveil();

    return this;

  };

})(window.jQuery || window.Zepto);
;/*******************************************************************************

  Main JavaScript
  Author: Václav Vracovský (http://vracovsky.cz/)

*******************************************************************************/

$(function() {
	
	// Toggle menu
	$('.toggle-menu').on('click', function(e) {
		e.preventDefault()
		$('#navigation').toggle()
	})

	// Detect width of display
	function getScrollBarWidth () {
		var inner = document.createElement('p')
		inner.style.width = "100%"
		inner.style.height = "200px"

		var outer = document.createElement('div')
		outer.style.position = "absolute"
		outer.style.top = "0px"
		outer.style.left = "0px"
		outer.style.visibility = "hidden"
		outer.style.width = "200px"
		outer.style.height = "150px"
		outer.style.overflow = "hidden"
		outer.appendChild (inner)

		document.body.appendChild (outer)
		var w1 = inner.offsetWidth
		outer.style.overflow = 'scroll'
		var w2 = inner.offsetWidth
		if (w1 == w2) w2 = outer.clientWidth

		document.body.removeChild (outer)

		return (w1 - w2)
	}

	var narrow = false
	parseInt($(window).width()) + getScrollBarWidth() > 767 ? narrow = false : narrow = true

	$('img').unveil()
	
});