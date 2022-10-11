<?php if (have_rows('products')) : ?>
    <?php while (have_rows('products')) : the_row();
        $title = get_sub_field('title');
        $text = get_sub_field('text');
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
                </div>
                <div class="product-boxes">
                    <?php
                    if (have_rows('product_box')) :
                        while (have_rows('product_box')) : the_row();
                            $product_title = get_sub_field('product_title');
                            $product_image = get_sub_field('product_image');
                            $product_description_title = get_sub_field('product_description_title');
                            $product_description_text = get_sub_field('product_description_text');
                            $learn_more = get_sub_field('learn_more');
                            $learn_more_url = get_sub_field('learn_more_url');
                            $more = get_sub_field('more_text');
                    ?>
                            <div class="product-box">
                                <h3><?php echo $product_title; ?></h3>
                                <img src="<?php echo $product_image['url']; ?>">
                                <strong><?php echo $product_description_title; ?></strong>
                                <p><?php echo $product_description_text; ?></p>
                                <a href="<?php echo $learn_more_url; ?>" ><?php echo $learn_more; ?></a>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>