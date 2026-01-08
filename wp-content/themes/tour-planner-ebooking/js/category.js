jQuery(function($){
    $('body').on('click', '.tour_planner_ebooking_upload_image_button', function(e){
        e.preventDefault();
        tour_planner_ebooking_aw_uploader = wp.media({
            title: 'Custom image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = tour_planner_ebooking_aw_uploader.state().get('selection').first().toJSON();
            $('#cat-image').val(attachment.url);
        })
        .open();
    });
});