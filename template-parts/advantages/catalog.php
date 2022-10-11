<?php if (have_rows('catalog')) : ?>
    <?php while (have_rows('catalog')) : the_row();
        $text = get_sub_field('text');
        $url = get_sub_field('url');
    ?>
        <div class="container-fluid">
            <div class="container">
                <div class="catalog">
                    <a href="<?php echo $url; ?>"><?php echo $text; ?></a>
                </div>
            </div>
        </div>
        </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>