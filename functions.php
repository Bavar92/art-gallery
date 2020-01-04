<?php require_once 'include/plugins/init.php';
require_once('include/wpadmin/admin-addons.php');
require_once 'include/init.php';
require_once 'include/cpt.php';

//images sizes
add_image_size( 'free', '1920', '', true );
add_image_size( 'job', '220', '220', true );
add_image_size( 'event', '592', '320', true );

//light function fo wp_get_attachment_image_src()
function image_src($id, $size = 'full', $background_image = false, $height = false) {
    if ($image = wp_get_attachment_image_src($id, $size, true)) {
        return $background_image ? 'background-image: url('.$image[0].');' . ($height?'min-height:'.$image[2].'px':'') : $image[0];
    }
}

function content_button($atts,$content = null){
    extract(shortcode_atts(array(
        'link' => '#',
        'class' => false,
        'target' => false
    ), $atts ));
    return '<a href="' . $link . '" class="button'.($class?' '.$class:'').'" '.($target?'target="'.$target.'"':'').'>' . do_shortcode($content) . '</a>';
}
add_shortcode("button", "content_button");

function some() {
    $some = get_field('social', 'option');
    $soc = '';
    if($some) {
        $soc .= '<div class="some">';
        foreach($some as $sm) {
            $soc .= '<a class="fab fa-'.$sm['icon'].'" target="_blank" href="'.$sm['link'].'" rel="nofollow"></a>';
        }
        $soc .= '</div>';
    }
    return $soc;
}
add_shortcode("social", "some");

add_theme_support('custom-logo');

function true_loadmore_scripts() {
    wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
    wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';


    query_posts( $args );

    if( have_posts() ) :

        while( have_posts() ): the_post(); ?>

            <div class="event grid-item">
                <?php if ($thumbnail_image = get_field('thumbnail_image')) { ?>
                    <a class="thumb" href="<?php the_permalink(); ?>">
                        <img src="<?= $thumbnail_image['sizes']['event'] ?>"
                             alt="<?= $thumbnail_image['alt'] ?>">
                    </a>
                <?php } ?>
                <div class="info">
                    <div class="dateTitle flex">
                        <div class="date alc">
                            <div class="wrapDate alc">
                                <?php if ($number_a = get_field('number_a')) { ?>
                                    <span class="number"><?= $number_a ?></span>
                                <?php } ?>
                                <div class="rightDate flex">
                                    <?php if ($day_a = get_field('day_a')) { ?>
                                        <span class="day"><?= $day_a ?></span>
                                    <?php } ?>
                                    <?php if ($month_a = get_field('month_a')) { ?>
                                        <span class="month"><?= $month_a ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="text">
                        <?php if ($short_title = get_field('short_title')) { ?>
                            <p><?= $short_title ?></p>
                        <?php } ?>
                        <?php if ($gallery_short_name = get_field('gallery_short_name')) { ?>
                            <div class="shortGallery">
                                <?= $gallery_short_name ?>
                            </div>
                        <?php } ?>
                        <a class="more" href="<?php the_permalink(); ?>">Докладніше</a>
                    </div>
                </div>
            </div>

       <?php endwhile;
        wp_reset_postdata();
    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
