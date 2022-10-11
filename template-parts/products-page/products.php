<?php if (have_rows('products')) : ?>
    <?php while (have_rows('products')) : the_row();
        $title = get_sub_field('title');
        $table_title_1 = get_sub_field('table_title_1');
        $table_title_2 = get_sub_field('table_title_2');
        $table_title_3 = get_sub_field('table_title_3');
    ?>
        <div class="container-fluid">
            <div class="container">
                <div class="over-section">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="product-boxes">
                    <?php
                    if (have_rows('product_box')) :
                        while (have_rows('product_box')) : the_row();
                            $product_title = get_sub_field('product_title');
                            $product_image = get_sub_field('product_image');
                            $product_description_text = get_sub_field('product_description_text');
                            $product_price = get_sub_field('product_price');
                            $learn_more = get_sub_field('learn_more');
                            $configure_text = get_sub_field('configure_text');
                            $configure_text_url = get_sub_field('configure_text_url');
                            $learn_more_url = get_sub_field('learn_more_url');
                    ?>
                            <div class="product-box">
                                <h3><?php echo $product_title; ?></h3>
                                <img src="<?php echo $product_image['url']; ?>">
                                <p><?php echo $product_description_text; ?></p>
                                <strong><?php echo $product_price; ?></strong>
                                <div class="links">
                                    <a href="<?php echo $learn_more_url; ?>" class="learn-more-url"><?php echo $learn_more; ?></a>
                                    <a href="<?php echo $configure_text_url; ?>" ><?php echo $configure_text; ?></a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="quick-look">
                    <h2><?php echo $title; ?></h3>
                </div>
                <div class="product-boxes-details">
                    <div class="product-table">
                        <div class="table-title">
                            <h3><?php echo $table_title_1; ?></h3>
                        </div>
                        <div class="table-items">
                            <?php
                            if (have_rows('product_table_1')) :
                                while (have_rows('product_table_1')) : the_row();
                                    $property_1 = get_sub_field('property_1');
                                    $property_2 = get_sub_field('property_2');
                                    $property_3 = get_sub_field('property_3');
                                    $property_icon = get_sub_field('property_icon');
                            ?>
                                    <div class="property-icon"><?php if (get_sub_field('property_icon')) : ?>
                                            <img src="<?php echo $property_icon['url']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p><?php echo $property_1; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_2; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_3; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-table">
                        <div class="table-title">
                            <h3><?php echo $table_title_2; ?></h3>
                        </div>
                        <div class="table-items">
                            <?php
                            if (have_rows('product_table_2')) :
                                while (have_rows('product_table_2')) : the_row();
                                    $property_1 = get_sub_field('property_1');
                                    $property_2 = get_sub_field('property_2');
                                    $property_3 = get_sub_field('property_3');
                                    $property_icon = get_sub_field('property_icon');
                            ?>
                                    <div class="property-icon"><?php if (get_sub_field('property_icon')) : ?>
                                            <img src="<?php echo $property_icon['url']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p><?php echo $property_1; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_2; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_3; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-table">
                        <div class="table-title">
                            <h3><?php echo $table_title_3; ?></h3>
                        </div>
                        <div class="table-items">
                            <?php
                            if (have_rows('product_table_3')) :
                                while (have_rows('product_table_3')) : the_row();
                                    $property_1 = get_sub_field('property_1');
                                    $property_2 = get_sub_field('property_2');
                                    $property_3 = get_sub_field('property_3');
                                    $property_icon = get_sub_field('property_icon');
                            ?>
                                    <div class="property-icon"><?php if (get_sub_field('property_icon')) : ?>
                                            <img src="<?php echo $property_icon['url']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p><?php echo $property_1; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_2; ?></p>
                                    </div>
                                    <div>
                                        <p><?php echo $property_3; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>