<?php
/**
* Template Name: All Products Page
*
*/

get_header();
?>
<main id="primary" class="site-main products-page">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/products-page/hero' );
	get_template_part( 'template-parts/homepage/wingo' );
    get_template_part( 'template-parts/products-page/products' );
    get_template_part( 'template-parts/products-page/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
