<div class="line-or">
    <div></div>
    <div></div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="footer-menus">
            <div class="footer-1">
                <div class="company-name"><strong><?php echo the_field('company_name', 'option'); ?></strong></div>
                <div class="address">
                    <p><?php echo the_field('address', 'option'); ?></p>
                </div>
                <div class="working-time"><?php echo the_field('working_time', 'option'); ?></div>
                <div class="email"><a href="mailto: <?php echo the_field('email', 'option'); ?>"><?php echo the_field('email', 'option'); ?></a></div>
                <div><a href="tel:<?php echo the_field('phone', 'option'); ?>">Tel: <?php echo the_field('phone', 'option'); ?></a></div>
                <div class="copy-right"><?php echo the_field('copyright', 'option'); ?></div>
            </div>
            <div class="footer-2">
                <?php wp_nav_menu(array('theme_location' => 'footer_menu_1'));  ?>
            </div>
            <div class="footer-3">
                <?php $youtube =  get_field('youtube_page', 'option'); ?>
                <?php $instagram =  get_field('instagram_page', 'option'); ?>
                <?php $facebook =  get_field('facebook_page', 'option'); ?>
                <?php $linkedin =  get_field('linkedin_page', 'option'); ?>
                <a href="<?php echo $youtube; ?>"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/youtube.svg" ></a>
                <a href="<?php echo $instagram; ?>"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/instagram.svg" ></a>
                <a href="<?php echo $facebook; ?>"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/facebook.svg" ></a>
                <a href="<?php echo $linkedin; ?>"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/linkedin.svg" ></a>
            </div>
        </div>
    </div>
</div>
<div class="supported">
<?php $support =  get_field('support_text', 'option'); ?>    
<?php $eu_icon_1 =  get_field('eu_icon_1', 'option'); ?>
<?php $eu_icon_2 =  get_field('eu_icon_2', 'option'); ?>
<?php $eu_icon_3 =  get_field('eu_icon_3', 'option'); ?>
    <div>
        <p><?php echo $support; ?></p>
    </div>
    <?php if(!empty($eu_icon_1)): ?>
    <div>
        <img src="<?php echo $eu_icon_1['url']; ?>">
    </div>
    <?php endif; ?>
    <?php if(!empty($eu_icon_2)): ?>
    <div>
        <img src="<?php echo $eu_icon_2['url']; ?>">
    </div>
    <?php endif; ?>
    <?php if(!empty($eu_icon_3)): ?>
    <div>
        <img src="<?php echo $eu_icon_3['url']; ?>">
    </div>
    <?php endif; ?>
</div>