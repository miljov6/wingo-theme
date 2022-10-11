<?php if (have_rows('hero')) : ?>
    <?php while (have_rows('hero')) : the_row();

        // Get sub field values.
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
    ?>
        <div class="container-fluid">
            <div class="advantages-intro">
                <div class="overlay"></div>
                <div class="hero">
                    <img class="fullscreen" src="<?php echo $image['url']; ?>">
                    <div class="hero-inside">
                        <div class="hero-text">
                            <h1><?php echo $title; ?></h1>
                        </div>
                        <div class="hex">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/hexagons.svg">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>