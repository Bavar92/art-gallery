var current_page = 1;
jQuery(function ($) {
    $('#true_loadmore').click(function () {
        $(this).addClass('load').text('Завантажую...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page': current_page
        };
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'GET',
            success: function (data) {
                if (data) {
                    console.log(data);
                    $('#true_loadmore').removeClass('load').text('Завантажити ще');
                    current_page++;

                    var $items = data;
                    var $grid = $( '.grid' );
                    $grid.append( $items ).each( function() {
                        $grid.masonry( 'reloadItems' );
                    });
                    $grid.masonry( 'layout' );

                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });


    });
})
;
/**
 * Created by Vasil on 04.01.2020.
 */
