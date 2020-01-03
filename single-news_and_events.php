<?php get_header();
global $post;
$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
    <div class="topBox cover alc" style="background-image: url('<?= $url ?>')">
        <div class="container">
            <div class="info">
                <h1><?php the_title(); ?></h1>
                <?php if ($short_title = get_field('short_title')) { ?>
                    <p><?= $short_title ?></p>
                <?php } ?>
                <a href="#" class="button">Реєстрація</a>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="twoColumns flex">
                <div class="left part">
                    <h2>Час і місце</h2>
                    <div class="date">
                        <?php if ($date_from = get_field('date_from')) { ?>
                            <?= $date_from ?>
                        <?php } ?>
                        <?php if ($date_to = get_field('date_to')) { ?>
                            <?= $date_to ?>
                        <?php } ?>
                    </div>
                    <div class="galleryMarker">
                        <?php if ($gallery_name_s = get_field('gallery_name_s')) { ?>
                            <?= $gallery_name_s ?>
                        <?php } ?>
                    </div>
                    <a href="#" class="button">Реєстрація</a>
                </div>
                <div class="right part">
                    <h2>Про подію</h2>
                    <?php if ($short_text = get_field('short_text')) { ?>
                        <div class="shortInfo">
                            <?= $short_text ?>
                        </div>
                    <?php } ?>
                    <?php if ($full_text = get_field('full_text')) { ?>
                        <div class="fullInfo" style="display: none">
                            <?= $full_text ?>
                        </div>
                        <span class="learnMore">Докладніше</span>
                    <?php } ?>
                </div>
            </div>
            <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&language=en&key=AIzaSyADCYn5c_s4xWt0WpHAWN7p0VtOyz-QZsk" type="text/javascript"></script>

            <?php
            $location = get_field('map_s');
            if( $location ): ?>
                <div class="acf-map" data-zoom="13">
                    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"  data-img="<?php echo theme() ?>/images/map.png" ></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>