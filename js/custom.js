$('#3dgenerator').click(function(e){
    var url = $(this).attr('data-url');
    var decor = $(this).attr('data-decor');
    var color = $(this).attr('data-color');
    var shape = $(this).attr('data-shape');
    console.log(url);
    jQuery.ajax({
            url: url,
            headers : { "cache-control": "no-cache" },
            cache: false,
            method: 'POST',
            data: {
                decor : decor,
                color : color, 
                shape : shape
            },
            success: function(data) {
                console.log(data);
                jQuery('.woocommerce-product-gallery').html(data);
            }
        });
})
    