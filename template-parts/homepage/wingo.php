<?php if (have_rows('wingo')) : ?>
    <?php while (have_rows('wingo')) : the_row();
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $more = get_sub_field('more_text');
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
                                    <div id="more"></div>
                                    <div class="more">
                                        <p><?php echo $more; ?></p>
                                    </div>
                                </div>

                    </div>


                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<script>
    $('#more').click(function(){
        $('#more').hide();
        $('.text').css('padding-bottom','0px');
        $('.more').show();
    })
</script>
<script type="module">

var plant_cube = undefined;
mtlLoader.load("http://127.0.0.1:8084/wingo/test/SX_Arezzo_RAL_1026_70_Rectengular.mtl", function(materials)
{
    materials.preload();
    var objLoader = new OBJLoader();
    objLoader.setMaterials(materials);
    objLoader.load("plant_block.obj", function(object)
    {    
        plant_cube = object;
        scene.add( plant_cube );
    });
});

</script>