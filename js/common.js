$(function() {
	$(window).on("load resize", setSize);
	return false;

});
				
function setSize() {
	//画像サイズ指定
	imgW = 2000;
	var imgH = 1331;
	//ウィンドウサイズ取得
	var winW = $(window).width();
	var winH = $(window).height();
	var scaleW = winW / imgW;
	var scaleH = winH / imgH;
	var fixScale = Math.max(scaleW, scaleH);
	var setW = imgW * fixScale;
	var setH = imgH * fixScale;
	var moveX = Math.floor((winW - setW) / 2);
	var moveY = Math.floor((winH - setH) / 2);
	

	$('.home #header').css({
		'height' : winH
	});

	if(document.getElementById("mainimg")&& (!Modernizr.touch)){
		$('#mainimg').css({
			'padding-top' : winH
		});
	}

	return false;

}

jQuery(document).ready(function(){
	
	$('.scroll a[href^=#]').click(function() {
		var speed = 400; 
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});

	var flag = 0;
	$('#menu').click(function() {
		if(!flag) {
			$('#navigation').animate({right:0});
			$(this).addClass('open');
			flag = 1;
		}else{
			$('#navigation').animate({right:'-260px'});
			$(this).removeClass('open');
			flag = 0;
		}
	});


	if(document.getElementById("mainimg")&& (!Modernizr.touch)){
		$("#mainimg").bgswitcher({
			images: [
				"http://fresh-angels.com/wp/wp-content/themes/freshangels/images/top-b.jpg", 
				"http://fresh-angels.com/wp/wp-content/themes/freshangels/images/top-w-3.jpg"
				],
			interval: 6000,
			effect: "fade"
		});
	};

	if(document.getElementById("gallery")){
		var container = document.querySelector('#gallery');
		imagesLoaded(container, function () {
			var msnry = new Masonry(container, {
			    isFitWidth: true,
			  itemSelector: '.column'
			});
		});
	};

});

