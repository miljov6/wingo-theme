<?php if (have_rows('wingo')) : ?>
    <?php while (have_rows('wingo')) : the_row();
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $image = get_sub_field('image');
    $more = get_sub_field('more_text');
    ?>
            <div class="container-fluid">
                <div class="container">
                    <div class="over-section">
                    <div></div>
                    <div></div>
                    <div></div>
                    </div>
                    <div class="wingo-section">
                                    <h2><?php echo $title; ?></h2>
                                    <div class="text">
                                        <p><?php echo $text; ?></p>
                                    </div>
                                    <div class="img">
                                    <img src="<?php echo $image['url']; ?>">
                                    </div>
                                    <div class="text">
                                    <p><?php echo $more; ?></p>
                                    </div>

                    </div>


                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>