<?php

/**
 * Template Name: Blog Archive
 *
 */

get_header();
?>
<main id="primary" class="site-main blog">
	<div class="container-fluid">
		<div class="container">
			<div class="header">
				<h1><?php echo the_title(); ?></h1>
			</div>
			<div class="over-section bb">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<?php
			$lastposts = get_posts(array(
				'posts_per_page' => 20
			));

			if ($lastposts) {
				foreach ($lastposts as $post) :
					setup_postdata($post); ?>
					<div class="post-box">
						<div>
							<h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
						</div>
						<div>
							<?php echo substr($post->post_content, 0, 245) . '...'; ?></div>
						<div>
							<?php echo the_post_thumbnail(array(400, 400)); ?>
						</div>
					</div>
			<?php
				endforeach;
				wp_reset_postdata();
			} ?>
			<div class="over-section">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
