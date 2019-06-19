(function() {
(function($) {
var Slider, autoplay, interval, opts, spy, touch, transitionTime;
Slider = function(element, options) {
this.$element = element;
this.$slides = this.$element.find('.slides ul li');
if (this.$slides.length < 1) {
this.$slides = this.$element.find('[data-group="slides"] ul li');
}
this.$prevNext = this.$element.find('[data-jump]');
this.$pages = this.$element.find('[data-jump-to]');
this.$rel = this.$element.find('[data-group="slides"]');
this.$prevNext = this.$element.find('[data-jump=prev], [data-jump=next]');
this.slideChangeInProgress = false;
this.options = options;
this.current = options.current;
this.set(2, true);
return null;
};
Slider.prototype = {
getGlobalWidth: function() {
return this.$element.width();
},
updateControls: function() {
this.$pages.removeClass('active');
return this.$pages.filter('[data-jump-to=' + (this.current - 1) + ']').addClass('active');
},
runAnimations: function() {
var captions, thisRef;
thisRef = this;
captions = $(this.$slides[this.current - 1]).find('[data-animate]');
return captions.each(function() {
var $caption;
$caption = $(this);
return thisRef.options.animations[$caption.data('animate')]($caption, $caption.data('delay'), $caption.data('length'));
});
},
hideAnimatedCaptions: function(slide) {
return $(this.$slides[slide - 1]).find('[data-animate]').css({
'opacity': 0
});
},
calculateScroll: function(slide) {
var gWidth;
gWidth = this.getGlobalWidth();
return (slide - 1) * gWidth;
},
resize: function() {
return this.$rel.scrollLeft(this.calculateScroll(this.current));
},
jump: function(slide, transitionTime, noanimation) {
var animateOptions, gWidth, thisRef;
if (transitionTime == null) {
transitionTime = this.options.transitionTime;
}
if (noanimation == null) {
noanimation = false;
}
thisRef = this;
if (slide === thisRef.current) {
noanimation = true;
}
if (this.$slides.length >= slide && !this.slideChangeInProgress) {
gWidth = this.getGlobalWidth();
if (!noanimation) {
  this.hideAnimatedCaptions(slide);
}
animateOptions = {
  duration: transitionTime,
  done: function() {
	if (slide === 1) {
	  thisRef.hideAnimatedCaptions(thisRef.$slides.length - 1);
	  thisRef.set(thisRef.$slides.length - 1);
	} else if (slide === thisRef.$slides.length) {
	  thisRef.hideAnimatedCaptions(2);
	  thisRef.set(2);
	} else {
	  thisRef.current = slide;
	}
	thisRef.updateControls();
	if (!noanimation) {
	  thisRef.runAnimations();
	}
	thisRef.options.onSlideChange.call(this);
	thisRef.slideChangeInProgress = false;
	return null;
  },
  fail: function() {
	thisRef.slideChangeInProgress = false;
	return null;
  }
};
this.slideChangeInProgress = true;
this.$rel.animate({
  'scrollLeft': this.calculateScroll(slide)
}, animateOptions);
}
return null;
},
set: function(slide, init) {
var gWidth;
if (init == null) {
init = false;
}
gWidth = this.getGlobalWidth();
this.$rel.scrollLeft(this.calculateScroll(slide));
this.current = slide;
this.updateControls();
return null;
},
movestart: function() {
this.hideAnimatedCaptions(this.current - 1);
this.hideAnimatedCaptions(this.current + 1);
this.moveStartScroll = parseInt(this.$rel.scrollLeft(), 10);
this.$rel.stop();
return this.timeStart = new Date();
},
move: function(dist) {
return this.$rel.scrollLeft(this.moveStartScroll - dist);
},
moveend: function(dist) {
var absDist, distLeftFrac, gWidth, timeDelta, transitionTime;
absDist = Math.abs(dist);
timeDelta = (new Date()).getTime() - this.timeStart.getTime();
gWidth = this.getGlobalWidth();
distLeftFrac = absDist / gWidth;
transitionTime = (timeDelta / distLeftFrac) * (1 - distLeftFrac);
transitionTime = transitionTime < 1000 ? transitionTime : 1000;
if (absDist < gWidth / this.options.moveDistanceToSlideChange) {
return this.jump(this.current, transitionTime, true);
} else {
if (dist < 0) {
  return this.next(transitionTime);
} else {
  return this.prev(transitionTime);
}
}
},
prev: function(transitionTime, noanimation) {
if (transitionTime == null) {
transitionTime = this.options.transitionTime;
}
if (noanimation == null) {
noanimation = false;
}
this.jump(this.current - 1, transitionTime, noanimation);
return this.options.onSlidePrev.call(this);
},
next: function(transitionTime, noanimation) {
if (transitionTime == null) {
transitionTime = this.options.transitionTime;
}
if (noanimation == null) {
noanimation = false;
}
this.jump(this.current + 1, transitionTime, noanimation);
return this.options.onSlideNext.call(this);
}
};
$.fn.responsiveSlider = function(option) {
var clearAutoplay, init, options, publicFunc, thisRef;
thisRef = this;
options = $.extend({}, $.fn.responsiveSlider.defaults, typeof option === 'object' && option);
options.animations = $.fn.responsiveSlider.animations;
publicFunc = {
next: 'next',
prev: 'prev'
};
clearAutoplay = function($this, interval) {
clearInterval(interval);
$this.off('mouseover');
$this.off('mouseout');
return null;
};
init = function($this) {
var $firstSlide, $lastSlide, data, interval, slides;
options = $.metadata ? $.extend({}, options, $this.metadata()) : options;
slides = $this.find('ul li');
if (slides.length > 1) {
$firstSlide = $(slides[0]);
$lastSlide = $(slides[slides.length - 1]);
$firstSlide.before($lastSlide.clone());
$lastSlide.after($firstSlide.clone());
}
$this.data('slider', (data = new Slider($this, options)));
if (options.autoplay) {
interval = setInterval((function() {
  return data.next();
}), options.interval);
$this.on('mouseover', function() {
  return clearInterval(interval);
});
$this.on('mouseout', function() {
  clearInterval(interval);
  return interval = setInterval((function() {
	return data.next();
  }), options.interval);
});
}
$(window).on('resize', function() {
return data.resize();
});
$this.find('[data-jump]').on('click', function() {
data[$(this).data('jump')]();
return false;
});
$this.find('[data-jump-to]').on('click', function() {
data.jump($(this).data('jump-to') + 1);
options.onSlidePageChange.call(this);
return false;
});
if (options.touch) {
return $this.find('[data-group="slide"]').on('movestart', function(e) {
  clearAutoplay($this, interval);
  return data.movestart();
}).on('move', function(e) {
  return data.move(e.distX);
}).on('moveend', function(e) {
  return data.moveend(e.distX);
});
}
};
return $(window).on('load', function() {
return thisRef.each(function() {
var $this, data;
$this = $(this);
data = $this.data('slider');
if (!data) {
  init($this, options);
} else if (typeof option === 'string') {
  data[publicFunc[option]]();
} else if (typeof option === 'number') {
  data.jump(Math.abs(option) + 1);
}
return $this;
});
});
};
$.fn.responsiveSlider.animations = {
slideAppearRightToLeft: function($caption, delay, length) {
var animate, css;
if (delay == null) {
delay = 0;
}
if (length == null) {
length = 300;
}
css = {
'margin-left': 100,
'margin-right': -100
};
$caption.css(css);
animate = function() {
css = {
  'margin-left': 0,
  'margin-right': 0,
  'opacity': 1
};
return $caption.animate(css, length);
};
if (delay > 0) {
return setTimeout(animate, delay);
} else {
return animate();
}
},
slideAppearLeftToRight: function($caption, delay, length) {
var animate, css;
if (delay == null) {
delay = 0;
}
if (length == null) {
length = 300;
}
css = {
'margin-left': -100,
'margin-right': 100
};
$caption.css(css);
animate = function() {
css = {
  'margin-left': 0,
  'margin-right': 0,
  'opacity': 1
};
return $caption.animate(css, length);
};
if (delay > 0) {
return setTimeout(animate, delay);
} else {
return animate();
}
},
slideAppearUpToDown: function($caption, delay, length) {
var animate, css;
if (delay == null) {
delay = 0;
}
if (length == null) {
length = 300;
}
css = {
'margin-top': 100,
'margin-bottom': -100
};
$caption.css(css);
animate = function() {
css = {
  'margin-top': 0,
  'margin-bottom': 0,
  'opacity': 1
};
return $caption.animate(css, length);
};
if (delay > 0) {
return setTimeout(animate, delay);
} else {
return animate();
}
},
slideAppearDownToUp: function($caption, delay, length) {
var animate, css;
if (delay == null) {
delay = 0;
}
if (length == null) {
length = 300;
}
css = {
'margin-top': -100,
'margin-bottom': 100
};
$caption.css(css);
animate = function() {
css = {
  'margin-top': 0,
  'margin-bottom': 0,
  'opacity': 1
};
return $caption.animate(css, length);
};
if (delay > 0) {
return setTimeout(animate, delay);
} else {
return animate();
}
}
};
$.fn.responsiveSlider.defaults = {
autoplay: false,
interval: 5000,
touch: true,
transitionTime: 1200,
moveDistanceToSlideChange: 4,
onSlideChange: function() {},
onSlideNext: function() {},
onSlidePrev: function() {},
onSlidePageChange: function() {}
};
spy = $('[data-spy="responsive-slider"]');
if (spy.length) {
opts = {};
if (autoplay = spy.data('autoplay')) {
opts.autoplay = autoplay;
}
if (interval = spy.data('interval')) {
opts.interval = interval;
}
if (!(touch = spy.data('touch'))) {
opts.touch = touch;
}
if (transitionTime = spy.data('transitiontime')) {
opts.transitionTime = transitionTime;
}
spy.responsiveSlider(opts);
}
return null;
})(jQuery);
}).call(this);
