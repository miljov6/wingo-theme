<?php
/**
* Template Name: Homepage
*
*/

get_header();
?>
<main id="primary" class="site-main front">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/homepage/hero' );
    get_template_part( 'template-parts/homepage/wingo' );
    get_template_part( 'template-parts/homepage/products' );
    get_template_part( 'template-parts/homepage/advantages' );
    get_template_part( 'template-parts/homepage/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
