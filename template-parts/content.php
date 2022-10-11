<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wingo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php wingo_post_thumbnail(); ?>
<div class="container-fluid">
                <div class="container">
<div class="<?php if(get_post_type()=='post'):?>up<?php else:?>up-w<?php endif;?>">
	<div class="mobile-thumb">
	<?php wingo_post_thumbnail(); ?>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				wingo_posted_on();
				//wingo_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wingo' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div>
	</div>
</div>
</div><!-- .entry-content -->

	
</article>
