<?php 
get_header();

if(is_category()):
$info_now_cat = get_category( $cat );
$slug = $info_now_cat->slug;

else:
$slug = get_post_type();
endif;

?>

<?php if($slug == 'news'): ?>
<section id="section-news" class="section-w">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/images/ti-news.png" alt="news"></h1>

	<div class="inner entries">
		<div class="grid cf">
			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="grid__item--3">
				<a href="<?php the_permalink(); ?>">
					<div class="imageWrap"><div class="image"><?php if(has_post_thumbnail()): the_post_thumbnail("medium"); else: echo '<img src="' . get_template_directory_uri().'/images/thumb.jpg" alt="no image">'; endif; ?></div></div>
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_excerpt();?>
					<div class="data">
						<span><?php the_time('d'); ?> <?php echo get_post_time('M') ?> <?php the_time('Y'); ?></span>
					</div>
				</a>
			</div>
			<?php endwhile; endif;?>
		</div>
	</div>

	<?php if (function_exists('wp_pagenavi')): ?>
	<div id="wpnav"><?php wp_pagenavi(); ?></div>
	<?php endif;?>

</section>

<?php elseif($slug == 'gallery'): ?>

<section id="section-gallery" class="section-w">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/images/ti-gallery.png" alt="GALLERY"></h1>

	<div class="inner gallery cf">
		<?php 
			if(have_posts()) :
			$count = 1;
			while (have_posts()) : the_post(); 
			$number = $count%4 ;
		?>
		<div class="item">
			<a href="<?php the_permalink(); ?>">
				<div class="imageWrap"><div class="image"><img src="<?php echo get_template_directory_uri() ?>/images/thumb-gl-<?php echo esc_html($number); ?>.jpg" alt="no image"></div></div>
				<h2 class="title"><span><?php the_title(); ?></span></h2>
			</a>
		</div>
		<?php $count++; endwhile; endif; ?>
		<div class="item">
			<div class="imageWrap"><div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/thumb-gl-2.jpg" alt="no image"></div></div>
		</div>
		<div class="item">
			<div class="imageWrap"><div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/thumb-gl-3.jpg" alt="no image"></div></div>
		</div>
		<div class="item">
			<div class="imageWrap"><div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/thumb-gl-4.jpg" alt="no image"></div></div>
		</div>
	</div>
	
	<?php if (function_exists('wp_pagenavi')): ?>
	<div id="wpnav"><?php wp_pagenavi(); ?></div>
	<?php endif;?>

</section>

<?php elseif($slug == 'profile'): ?>

<section id="section-about" class="section-b" style="padding-bottom:0;">
	<h1>ABOUT <br>FRESH ANGELS</h1>
	<p>毎年人気を集めるD'STATIONフレッシュエンジェルズ。<br>
2015年のメンバーは、2012年からフレッシュエンジェルズを務める佐崎愛里に、今年で4年目のレースクイーンとなる林紗久羅、2014年、日本レースクイーン大賞新人GPでルーキークイーンを受賞した清瀬まち、そして日本レースクイーン大賞2014グランプリを受賞し、人気No.1レースクイーンに輝いた日野礼香の3人が新たに加わり、その人気にさらに拍車をかける選りすぐりのメンバーで構成された。
人気抜群なメンバーをそろえた4人がフレッシュでクールなライブパフォーマンスを披露し、サーキットを華やかに彩る。今最も注目度の高いレースクイーンユニット。</p>
	<div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/profimg.jpg"></div>
</section>

<section id="section-profile" class="section-b" style="padding-top:0;">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/images/ti-profile.png" alt="プロフィール"></h1>
	<div class="inner entries">
		<div class="grid cf">
			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="grid__item--3">
				<a href="<?php the_permalink(); ?>">
					<div class="imageWrap"><div class="image"><?php if(has_post_thumbnail()): the_post_thumbnail("medium"); else: echo '<img src="' . get_template_directory_uri().'/images/thumb.jpg" alt="no image">'; endif; ?></div></div>
					<h2 class="title"><?php the_title(); ?><br><span><?php echo get_post_meta($post->ID, 'Name', true); ?></span></h2>
				</a>
			</div>
			<?php endwhile; endif;?>
		</div>
	</div>

</section>

<?php endif;?>


<?php get_footer(); ?>
	