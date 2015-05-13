<?php get_header(); ?>

<section id="section-news" class="section-w">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/images/ti-topics.png" alt="topics"></h1>

	<div class="inner entries">
		<div class="grid cf">
			<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="grid__item--3">
				<a href="<?php the_permalink(); ?>">
					<div class="imageWrap">
						<div class="image">
							<?php if(has_post_thumbnail()): the_post_thumbnail("medium"); else: echo '<img src="' . get_template_directory_uri().'/images/thumb.jpg" alt="no image">'; endif; ?>
						</div>
					</div>
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_excerpt();?>
					<div class="data">
						<span><?php the_time('d'); ?> <?php echo get_post_time('M') ?> <?php the_time('Y'); ?></span>
						<img src="<?php echo get_template_directory_uri(); ?>/images/ca-<?php $cats = get_the_category(); foreach( $cats as $cat) { echo $cat->cat_name; } ?>.jpg" class="category">       
					</div>
				</a>
			</div>
			<?php endwhile; endif;?>
		</div>
	</div>

	<?php if(is_home()): ?>
	<!-- <div class="link"><a href="<?php echo esc_url( home_url('/')); ?>category/news">MORE</a></div>  -->
	<?php elseif(!(is_home()) && (function_exists('wp_pagenavi'))): ?>
	<div id="wpnav"><?php wp_pagenavi(); ?></div>
	<?php endif; ?>

</section>

<section id="section-about" class="section-b">
	<h1>ABOUT <br>FRESH ANGELS</h1>
	<p>毎年人気を集めるD'STATIONフレッシュエンジェルズ。<br>
2015年のメンバーは、2012年からフレッシュエンジェルズを務める佐崎愛里に、今年で4年目のレースクイーンとなる林紗久羅、2014年、日本レースクイーン大賞新人GPでルーキークイーンを受賞した清瀬まち、そして日本レースクイーン大賞2014グランプリを受賞し、人気No.1レースクイーンに輝いた日野礼香の3人が新たに加わり、その人気にさらに拍車をかける選りすぐりのメンバーで構成された。
人気抜群なメンバーをそろえた4人がフレッシュでクールなライブパフォーマンスを披露し、サーキットを華やかに彩る。今最も注目度の高いレースクイーンユニット。</p>
	<div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/profimg.jpg"></div>
	<div class="link"><a href="<?php echo esc_url( home_url('/')); ?>profile">MORE</a></div>
</section>

<?php 
if(is_home()):
$args = array( 'posts_per_page' => 4 , 'post_type' => 'post' , 'category_name' => 'gallery' ) ;
$my_query = new WP_Query($args); if ($my_query->have_posts()) :
?>

<section id="section-gallery" class="section-w">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/images/ti-gallery.png" alt="GALLERY"></h1>

	<div class="inner gallery cf">
		<?php $count=1; 
		while($my_query->have_posts()): $my_query->the_post(); 
		$number = $count%4 ;
		?>

		<div class="item">
			<a href="<?php the_permalink(); ?>">
				<div class="imageWrap"><div class="image"><img src="<?php echo get_template_directory_uri() ?>/images/thumb-gl-<?php echo esc_html($number); ?>.jpg" alt="no image"></div></div>
				<h2 class="title"><span><?php the_title(); ?></span></h2>
			</a>
		</div>
		<?php $count++; endwhile; ?>
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
	<div class="link"><a href="<?php echo esc_url( home_url('/')); ?>category/gallery">MORE</a></div>
</section>

<?php endif; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>