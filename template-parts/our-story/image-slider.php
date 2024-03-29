<style>
    .slide {
        width: 100%;
        height: 80vh;
        overflow: hidden;
        position: relative;
        background-color: #000;
    }

    .slide>div {
        width: 100%;
        height: 100%;
        background-size: cover;
        position: absolute;
        animation: slide 25s infinite;
        opacity: 0;
    }

    @keyframes slide {
        10% {
            opacity: 1;
        }

        20% {
            opacity: 1;
        }

        30% {
            opacity: 1;
        }

        40% {
            transform: scale(1.2);
        }
    }
</style>
<?php if (have_rows('image-slider')) : ?>
    <?php while (have_rows('image-slider')) : the_row();
        $i++;
    ?>
        <style>
            <?php if ($i == 2) { ?>.slide>div:nth-child(2) {
                animation-delay: 5s;
            }

            <?php } elseif ($i == 3) { ?>.slide>div:nth-child(3) {
                animation-delay: 10s;
            }

            <?php } elseif ($i == 4) { ?>.slide>div:nth-child(4) {
                animation-delay: 15s;
            }

            <?php } elseif ($i == 5) { ?>.slide>div:nth-child(5) {
                animation-delay: 20s;
            }

            <?php } ?>
        </style>
    <?php endwhile; ?>
<?php endif; ?>

<div class="container-fluid">
    <div class="container">
        <div class="wingo-section">
            <div class="img-slider">
            <div class="slide">
                    <?php if (have_rows('image-slider')) : ?>
                        <?php while (have_rows('image-slider')) : the_row();
                            $image = get_sub_field('image');
                        ?>
                            <div style="background-image:url(<?php echo $image['url']; ?>)"></div>
                        <?php endwhile; ?>
                    <?php endif; ?></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.img-slider').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
    })
</script>