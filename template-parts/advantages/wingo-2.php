<?php if (have_rows('wingo_2')) : ?>
    <?php while (have_rows('wingo_2')) : the_row();
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $text_2 = get_sub_field('text_2');
        $image_1 = get_sub_field('image_1');
        $image_2 = get_sub_field('image_2');
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
                    <div class="wingo">
                        <div class="img">
                            <img src="<?php echo $image_1['url']; ?>">
                        </div>
                    </div>
                    <div>
                    <p><?php echo $text_2; ?></p>
                    </div>
                    <div class="wingo">
                        <div class="img">
                            <img src="<?php echo $image_2['url']; ?>">
                        </div>
                    </div>

                </div>


            </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>