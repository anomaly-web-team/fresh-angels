function setSize(){imgW=2e3;{var e=1331,t=$(window).width(),i=$(window).height(),n=t/imgW,a=i/e,o=Math.max(n,a),r=imgW*o,m=e*o;Math.floor((t-r)/2),Math.floor((i-m)/2)}return $(".home #header").css({height:i}),document.getElementById("mainimg")&&!Modernizr.touch&&$("#mainimg").css({"padding-top":i}),!1}$(function(){return $(window).on("load resize",setSize),!1}),jQuery(document).ready(function(){$(".scroll a[href^=#]").click(function(){var e=400,t=$(this).attr("href"),i=$("#"==t||""==t?"html":t),n=i.offset().top;return $("body,html").animate({scrollTop:n},e,"swing"),!1});var e=0;if($("#menu").click(function(){if(e)$("#navigation").animate({right:"-260px"}),$("#navigation").find("li").css({left:"100%"}),$(this).removeClass("open"),e=0;else{var t=0;$("#navigation").animate({right:0}),$("#navigation").find("li").each(function(){$(this).hide().delay(100*t++).fadeIn("5000").animate({left:0})}),$(this).addClass("open"),e=1}}),document.getElementById("mainimg")&&!Modernizr.touch&&$("#mainimg").bgswitcher({images:["http://fresh-angels.com/wp/wp-content/themes/freshangels/images/top-b.jpg","http://fresh-angels.com/wp/wp-content/themes/freshangels/images/top-w-3.jpg"],interval:6e3,effect:"fade"}),document.getElementById("gallery")){var t=document.querySelector("#gallery");imagesLoaded(t,function(){new Masonry(t,{isFitWidth:!0,itemSelector:".column"})})}});