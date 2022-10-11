<?php
/**
* Template Name: Advantages
*
*/

get_header();
?>
<main id="primary" class="site-main advantages">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/advantages/hero' );
    get_template_part( 'template-parts/advantages/wingo' );
    get_template_part( 'template-parts/advantages/wingo-2' );
    get_template_part( 'template-parts/advantages/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
