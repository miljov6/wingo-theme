<?php if (have_rows('advantages')) :
    while (have_rows('advantages')) : the_row();
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $learn_more = get_sub_field('learn_more');
    $learn_more_url = get_sub_field('learn_more_url');
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

                    </div>
                    <div class="advantages-boxes">
                    <?php if (have_rows('boxes')) :
    while (have_rows('boxes')) : the_row();
    $image = get_sub_field('image');
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    ?>
    <div class="box">
        <img src="<?php echo $image['url'] ?>">
        <h4><?php echo $title; ?></h4>
        <p><?php echo $text; ?></p>
    </div>
<?php endwhile; ?>
<?php endif; ?>
                    </div>

                <div class="learn-more">
                    <a href="<? echo $learn_more_url;?>" ><? echo $learn_more;?></a>
                </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
