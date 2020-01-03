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

            <div style="overflow:hidden;width: 100%;position: relative;"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=700&amp;height=300&amp;hl=en&amp;q=Kiev+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="https://embedgooglemaps.com/en/">embedgooglemaps EN</a> & <a href="https://iamsterdamcard.it">http://iamsterdamcard.it/</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
        </div>
    </section>
<?php get_footer(); ?>