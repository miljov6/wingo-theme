<?php if (have_rows('contact_details')) : ?>
        <div class="container-fluid">
            <div class="container">
                <div class="wingo-section">
                    <div class="contact-details">
                    <?php while (have_rows('contact_details')) : the_row();
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        $email = get_sub_field('email');
        $image = get_sub_field('image');
    ?>
                        <div class="contact-box">
                            <img src="<?php echo $image['url']; ?>">
                            <strong><?php echo $name;?></strong>
                            <p><?php echo $position;?></p>
                            <a href="mailto:<?php echo $email;?> "><?php echo $email; ?></a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php endif; ?>