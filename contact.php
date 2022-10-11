<?php
/**
* Template Name: Contact
*
*/

get_header();
?>
<main id="primary" class="site-main contact">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/contact/wingo' );
    get_template_part( 'template-parts/contact/employees' );
    get_template_part( 'template-parts/contact/wingo-2' );
    get_template_part( 'template-parts/contact/wingo-1' );
    get_template_part( 'template-parts/contact/hero' );
    get_template_part( 'template-parts/contact/catalog' );

endwhile;
?>
</main>

<?php
get_footer();
