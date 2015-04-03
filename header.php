<!DOCTYPE HTML>
<html lang="ja">
<head>

<meta charset="utf-8">
<meta name = "viewport" content = "width = device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

<?php
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-1.11.1.min.js', array(), '1.11.1');
wp_enqueue_script('jqueryui', 'http://code.jquery.com/ui/1.11.2/jquery-ui.js', array(), '1.11.2');
?>

<?php wp_head(); ?>

<!--[if lte IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
<![endif]-->

</head>
<body role="document" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="fb-root"></div>

<div id="wrapper" <?php if(is_home()) echo 'class="home"'; ?>>

<header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<h1 <?php if(is_home()) echo 'id="topname"'; ?>>
		<span id="title"><a href="<?php echo esc_url( home_url()); ?>">FRESH ANGELS</a></span>
		<?php if(is_home()):?>
		<span class="name_01"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_01.png"></span>
		<span class="name_02"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_02.png"></span>
		<span class="name_03"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_03.png"></span>
		<span class="name_04"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_04.png"></span>
		<span class="name_05"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_05.png"></span>
		<span class="name_06"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_06.png"></span>
		<span class="name_07"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_07.png"></span>
		<span class="name_08"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_08.png"></span>
		<span class="name_09"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_09.png"></span>
		<span class="name_10"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_10.png"></span>
		<span class="name_11"><img src="<?php echo get_template_directory_uri(); ?>/images/name/name_11.png"></span>
		<?php endif; ?>
	</h1>
	<div id="menu" ><span class="menu__1"></span><span class="menu__2"></span><span class="menu__3"></span></div>

	<?php if(!is_home()):
		if(is_singular('profile')): $back_link = 'profile';
		elseif(is_single()): $cat = get_the_category(); $cat_slug = $cat[0]->slug; $back_link = 'category/'. $cat_slug ;
		endif;
	?>
	<div class="back"><a href="<?php echo esc_url( home_url('/')).esc_html($back_link); ?>">BACK</a></div>
	<?php endif; ?>
	<?php if(is_home() && !wp_is_mobile()): ?><div id="mainimg"></div><?php endif; ?>
</header>

<main id="mainContent" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" >

<?php if(function_exists('bcn_display') && !is_home()){ echo '<div id="breadcrumbs"><div>'; bcn_display(); echo '</div></div>'; } ?>


