<?php 
get_header(); 

the_post(); 
$cat = get_the_category();
$cat_slug = $cat[0]->slug;
$cat_name = $cat[0]->name; 
?>

<section <?php if($cat_slug =='news'): echo 'id="section-news" class="section-w"'; elseif(get_post_type() == 'profile'): echo 'id="section-profile" class="section-b" '; else: echo 'class="section-w"'; endif; ?>>
	<h1><?php if(get_post_type() == 'post'):?><img src="<?php echo get_template_directory_uri(); ?>/images/ti-<?php echo esc_attr($cat_slug); ?>.png" alt="<?php echo esc_attr($cat_name); ?>">
		<?php elseif(get_post_type() == 'profile'): ?><img src="<?php echo get_template_directory_uri(); ?>/images/ti-profile.png" alt="プロフィール">
		<?php else: echo esc_html(get_post_type_object(get_post_type())->label);  ?>
		<?php endif; ?>
	</h1>

	<?php if(get_post_type() == 'post'): ?>
	<div class="date">Publish / <?php the_time('d'); ?> <?php echo get_post_time('M') ?> <?php the_time('Y'); ?> </div>
	<?php endif; ?>

	<article class="entry <?php if(get_post_type() == 'profile') echo 'entry-prof'; ?>" >
		<?php if(get_post_type() == 'post'): ?>
		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>

		<?php elseif(get_post_type() == 'profile'): ?>

		<div class="eyecatch"><?php the_post_thumbnail("full"); ?></div>

		<div class="entry-prof__detail">
			<h2><span><?php echo get_post_meta($post->ID, 'Name', true); ?></span><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<p>
			<?php if(get_post_meta($post->ID, 'Blog', true)) echo 'オフィシャルブログ : <a href="' . get_post_meta($post->ID, 'Blog', true) . '" target="_blank">'.get_post_meta($post->ID, 'Blog', true).'</a><br>'; ?>
			<?php if(get_post_meta($post->ID, 'Twitter', true)) echo 'TWITTER : <a href="' . get_post_meta($post->ID, 'Twitter', true) . '" target="_blank">'.get_post_meta($post->ID, 'Twitter', true).'</a><br>'; ?>
			<?php if(get_post_meta($post->ID, 'Height', true)) echo 'Height : ' . get_post_meta($post->ID, 'Height', true) . '<br>'; ?>
			<?php if(get_post_meta($post->ID, 'Size', true)) echo '3 Size : ' . get_post_meta($post->ID, 'Size', true) . '<br>'; ?>
			<?php if(get_post_meta($post->ID, 'Bday', true)) echo 'Birthday : ' . get_post_meta($post->ID, 'Bday', true) . '<br>'; ?>
			<?php if(get_post_meta($post->ID, 'Hobby', true)) echo 'Hobby : ' . get_post_meta($post->ID, 'Hobby', true) . '<br>'; ?>
			<?php if(get_post_meta($post->ID, 'Special', true)) echo 'Special : <br>' . nl2br(get_post_meta($post->ID, 'Special', true)) ; ?>
			</p>

			<div class="grid grid-fill cf" >
				<?php
					$attachments = get_children( array(
						'post_parent' => get_the_ID(), 
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'orderby'=>'menu_order',
						'order' => 'ASC',
						'exclude'    => get_post_thumbnail_id()
					));
					if(!empty($attachments)){
						foreach($attachments as $attachment){
							$imageL = wp_get_attachment_image_src($attachment->ID,'large');
							$imageM = wp_get_attachment_image_src($attachment->ID,'medium');
							echo '<div class="grid__item--3 has-gutter"><a href="'.$imageL[0].'" rel="shadowbox[photo]"><img src="'.$imageM[0].'"></a></div>';
						}
					}
				?>
			</div>

		</div>

		<?php endif; ?>

	</article>

	<?php
	$prevpost = get_adjacent_post(false, '', true); 
	$nextpost = get_adjacent_post(false, '', false); 
	?>
	<div id="page-nav">
		<ul class="grid cf">
			<li class="grid__item--6">
				<?php if($prevpost): ?>
				<a href="<?php echo get_permalink($prevpost->ID); ?>">
					<div class="text"><span>Prev Post</span><p><?php echo get_the_title($prevpost->ID); ?></p></div>
				</a>
				<?php endif; ?>
			</li>
			<li class="grid__item--6 ">
				<?php if($nextpost): ?>
				<a href="<?php echo get_permalink($nextpost->ID); ?>">
					<div class="text"><span>Next Post</span><p><?php echo get_the_title($nextpost->ID); ?></p></div>
				</a>
				<?php endif; ?>
			</li>
		</ul>
	</div>
	

</section>

<?php get_footer(); ?>