var controller;
if (Modernizr.touch) {
}else {
	
	// init the controller
	controller = new ScrollMagic({
		globalSceneOptions: {
		triggerHook: "onLeave"
		}
	});

};


$(document).ready(function () {

	var $moveObj = $(".backImg");
	var scene = new ScrollScene({triggerElement: ".backImg", duration: 1250})
					.on("progress", function (prog) { 
					    var p = prog.progress; 
					    $moveObj.css({"background-position-y":-300 * p});
					})
					.addTo(controller);

	new ScrollScene({ offset: 50})
	.addTo(controller)
	.setTween(new TimelineMax({delay: .2})
		.add(TweenMax.to("#topname .name_01", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut}))
		.add(TweenMax.to("#topname .name_02", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_03", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_04", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_05", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_06", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_07", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_08", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_09", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_10", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
		.add(TweenMax.to("#topname .name_11", .2, {top:'-=100px' , autoAlpha:0, ease:Sine.easeInOut, delay: -0.1}))
	)

	new ScrollScene({ offset: "-100"})
	.addTo(controller)
	.triggerHook("onCenter")
	.triggerElement("#section-news")
	.setTween(new TimelineMax({delay: .3})
		.add(TweenMax.from("#section-news .grid__item--3:nth-child(1)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-news .grid__item--3:nth-child(2)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-news .grid__item--3:nth-child(3)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-news .grid__item--3:nth-child(4)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
	)
	
	new ScrollScene({ offset: "-100"})
	.addTo(controller)
	.triggerHook("onCenter")
	.triggerElement("#section-about")
	.setTween(new TimelineMax({delay: .3})
		.add(TweenMax.from("#section-about h1", .5, {autoAlpha: 0, "margin-left" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-about p", .5, {autoAlpha: 0, "margin-left" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-about .image", .5, {autoAlpha: 0, "margin-left" : "-30px" , ease:Sine.easeInOut}))
	)

	new ScrollScene({ offset: "-100"})
	.addTo(controller)
	.triggerHook("onCenter")
	.triggerElement("#section-gallery")
	.setTween(new TimelineMax({delay: .3})
		.add(TweenMax.from("#section-gallery .item:nth-child(1)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-gallery .item:nth-child(2)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-gallery .item:nth-child(3)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
		.add(TweenMax.from("#section-gallery .item:nth-child(4)", .5, {autoAlpha: 0, "margin-top" : 30 , ease:Sine.easeInOut}))
	)

	new ScrollScene({ offset: 200})
	.addTo(controller)
	.triggerHook("onEnter")
	.triggerElement("#footer")
	.setTween(TweenMax.from("#contact", 1, {autoAlpha: 0}))

	

});



