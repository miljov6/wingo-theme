<?php

/**
 * Template Name: Blog
 *
 */

get_header();
?>
<main id="primary" class="site-main blog">
	<div class="container-fluid">
		<div class="container">
			<div class="header">
				<a class="back" href="<?php echo get_site_url(); ?>">Back</a>
			</div>
		</div>
	</div>
	<?php
	$recent_posts = wp_get_recent_posts(array(
		'numberposts' => 1, // Number of recent posts thumbnails to display
		'post_status' => 'publish' // Show only the published posts
	));
	foreach ($recent_posts as $post_item) :
	?>

		<div class="post-thumbnail"><?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?></div>
		<div class="container-fluid">
			<div class="container">
				<div class="up">
					<div class="mobile-thumb">
						<?php wingo_post_thumbnail(); ?>
					</div>
					<h2 class="except"><?php echo $post_item['post_title'] ?></h2>
					<span class="publish-date"><?php echo wingo_posted_on(); ?></span>
					<p><?php echo $post_item['post_content']; ?></p>
				</div>
			<?php endforeach;
		wp_reset_postdata();
			?>
			<div class="other-news">
				<h3>Other News</h3>
				<div class="news-boxes">
					<?php
					$other_posts = wp_get_recent_posts(array(
						'numberposts' => 4, // Number of recent posts thumbnails to display
						'post_status' => 'publish' // Show only the published posts
					));
					$i = 1;
					foreach ($other_posts as $post_item) :
						if ($i != 1) {
					?>
							<div class="news-box">
								<span class="publish-date"><?php echo wingo_posted_on(); ?></span>
								<h4 class="slider-caption-class"><?php echo $post_item['post_title']; ?></h4>
								<p><?php echo substr($post_item['post_content'], 0, 100); ?></p>
								<a href="<?php echo get_permalink($post_item['ID']); ?>">More details</a>
							</div>
					<?php
						}
						$i++;
					endforeach;
					?>
				</div>
				<div class="view-all"> <a href="<?php echo the_field('blog_archive_link', 'option'); ?>"><?php echo the_field('blog_archive_link_text', 'option'); ?></a>
				</div>
				<div>
				</div>
			</div>
			</div>
		</div>
</main>

<?php
get_footer();
