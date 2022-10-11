<?php if (have_rows('wingo')) : ?>
    <?php while (have_rows('wingo')) : the_row();
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $image = get_sub_field('image');
    ?>
        <div class="container-fluid">
            <div class="container">
                <div class="wingo-section">
                    <h2><?php echo $title; ?></h2>
                    <div class="text">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>