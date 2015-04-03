<?php 
get_header(); 
the_post(); 
?>

<section id="section-page" class="section-w">
	<h1><?php the_title(); ?></h1>

	<?php if(is_page('schedule')):?><div class="date">Update / <?php echo the_modified_date('d M Y') ?></div><?php endif; ?>

	<div class="entry">

		<?php the_content(); ?>

	</div>
</section>

<?php get_footer(); ?>