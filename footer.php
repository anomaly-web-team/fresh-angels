</main><!--main-->

<nav id="navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
<ul id="navigationUl" class="scroll">
<li><a href="<?php echo esc_url( home_url()); ?>">TOP</a></li>
<li><a href="<?php echo esc_url( home_url('/')); ?>category/news">NEWS</a></li>
<li><a href="<?php echo esc_url( home_url('/')); ?>report/">REPORT</a></li>
<li><a href="<?php echo esc_url( home_url('/')); ?>profile">PROFILE</a></li>
<li><a href="<?php echo esc_url( home_url('/')); ?>category/gallery">GALLERY</a></li>
<li><a href="<?php echo esc_url( home_url('/')); ?>schedule">SCHEDULE</a></li>
</ul>
<ul class="socialLink">
    <li class="fb"><a href="" target="_blank">FACEBOOK</a></li>
    <li class="tw"><a href="" target="_blank">TWITTER</a></li>
    <li class="rss"><a href="" target="_blank">RSS</a></li>
    <li class="ab"><a href="" target="_blank">AMEBLO</a></li>
</ul>
</nav>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div id="contact">
        <div id="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-ft.png" alt="FRASH ANGELS ロゴマーク"></div>
        <p>CONTACT</p>
        <p><a href="mailto:mail@fresh-angels.com"><img src="<?php echo get_template_directory_uri(); ?>/images/address.png" alt="メールアドレス"></a></p>

        <ul class="socialLink">
            <li class="fb"><a href="" target="_blank">FACEBOOK</a></li>
            <li class="tw"><a href="" target="_blank">TWITTER</a></li>
            <li class="rss"><a href="" target="_blank">RSS</a></li>
            <li class="ab"><a href="" target="_blank">AMEBLO</a></li>
        </ul>
    </div>
    <div id="copyright" >
        Copyright ©FRESH ANGELS. All Rights Reserved.
    </div>
</footer>

</div><!--wrapper-->

<?php if(is_home()): ?>
<div class="progress" id="progress">
    <span class="progress-bar"></span>
    <span class="progress-text">0%</span>
</div>
<?php endif; ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing-1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bgswitcher.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>

<?php if(is_home()): ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/loading.js"></script>
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/greensock/TweenMax.min.js"></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollmagic.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scroll.js"></script>
<!--<![endif]-->
<?php endif; ?>



<?php wp_footer(); ?>

<script type="text/javascript">
(function(w,d){
     w.___gcfg={lang:"ja"};
     var s,e = d.getElementsByTagName("script")[0],
     a=function(u,f){if(!d.getElementById(f)){s=d.createElement("script");
     s.src=u;if(f){s.id=f;}e.parentNode.insertBefore(s,e);}};
    a("//connect.facebook.net/en_US/all.js#xfbml=1&version=v2.0", "facebook-jssdk");
    a("//platform.twitter.com/widgets.js", "twitter-wjs");
})(this, document);
</script>

</body>
</html>