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
            type: 'POST',
            success: function (data) {
                if (data) {
                    $('#true_loadmore').removeClass('load').text('Завантажити ще').before(data);
                    current_page++;
                    var $items = $(data);
                    $('.grid').append($items).masonry('appended', $items);
                    $container = $('.grid');
                    $(".grid").append().each(function () {
                        $('.grid').masonry('reloadItems', $items);
                    });

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
