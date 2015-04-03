$(function(){

    if($.cookie("loding")){
        $('#progress').fadeOut(1000);
    } else {
        $.cookie("loding" , "open" , { expires: 1,  path: "/" });
        imagesProgress();
    }

});


function imagesProgress () {
    var $container    = $('#progress'),                    
        $progressBar  = $container.find('.progress-bar'),  
        $progressText = $container.find('.progress-text'), 
        imgLoad       = imagesLoaded('body'),
        imgTotal      = imgLoad.images.length,
        imgLoaded     = 0,
        current       = 0,
        progressTimer = setInterval(updateProgress, 1000 / 60);
    imgLoad.on('progress', function () {
        imgLoaded++;
    });
    function updateProgress () {
        var target = (imgLoaded / imgTotal) * 100;
        current += (target - current) * 0.1;
        $progressBar.css({ width: current + '%' });
        $progressText.text(Math.floor(current) + '%');

        if(current >= 100){
            clearInterval(progressTimer);
            $container.addClass('progress-complete');
            $progressBar.add($progressText)
                .delay(500)
                .animate({ opacity: 0 , top: '40%' }, 1000, function () {
                	$('#wrapper').css({display:'block',opacity:0}).animate({opacity:1});
                    $container.fadeOut(1000);
                });
        }
        if (current > 99.9) {
            current = 100;
        }
    }
};
