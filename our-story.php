<?php
/**
* Template Name: Our Story
*
*/

get_header();
?>
<main id="primary" class="site-main our-story">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/our-story/hero' );
    get_template_part( 'template-parts/our-story/wingo' );
    get_template_part( 'template-parts/our-story/wingo-2' );
    get_template_part( 'template-parts/our-story/image-slider' );
    get_template_part( 'template-parts/our-story/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
