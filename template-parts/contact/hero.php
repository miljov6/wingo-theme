<?php if (have_rows('hero')) : ?>
    <?php while (have_rows('hero')) : the_row();

        // Get sub field values.
        $image = get_sub_field('image');
    ?>
        <div class="container-fluid">
            <div class="map-img">
                <div class="hero">
                    <img class="map" src="<?php echo $image['url']; ?>">
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>