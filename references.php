<?php
/**
* Template Name: References
*
*/

get_header();
?>
<main id="primary" class="site-main contact">

<?php
while ( have_posts() ) :
    the_post();
    
    get_template_part( 'template-parts/references/wingo-1' );
    get_template_part( 'template-parts/references/wingo' );
    get_template_part( 'template-parts/references/employees' );
    get_template_part( 'template-parts/references/wingo-2' );
    get_template_part( 'template-parts/references/hero' );
    get_template_part( 'template-parts/references/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
