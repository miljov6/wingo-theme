<?php if (have_rows('wingo_2')) : ?>
    <?php while (have_rows('wingo_2')) : the_row();
        $form = get_sub_field('form');
        $form2 = get_sub_field('form2');
    ?>
        <div class="container-fluid">
            <div class="container">
                <div class="wingo-section">
                    <div class="text">
                        <?php echo do_shortcode($form); ?>
                    </div>

                </div>


            </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>