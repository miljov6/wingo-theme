
<?php if (have_rows('hero_1')) : ?>
    <?php while (have_rows('hero_1')) : the_row();

        // Get sub field values.
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $video = get_sub_field('video');
    ?>
<div class="container-fluid">
    <div class="hero">
        <video class="fullscreen" src="<?php echo $video;?>" playsinline autoplay muted loop></video>
        <div class="hero-text">
    <h1><?php echo $title;?></h1>
  </div>

</div>
</div>

<?php endwhile; ?>
<?php endif; ?>