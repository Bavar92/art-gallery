<?php get_header(); ?>
    <section class="content">
        <div class="container">
            <div class="events grid">
                <div class="event grid-item"   style="opacity: 0; margin-bottom: 0; height: 0; padding: 0; padding-bottom: 1px">
                    <h2  style="opacity: 0; margin-bottom: 0; height: 0; padding: 0; padding-bottom: 1px">
                        <?php echo substr(get_the_archive_title(), strpos(get_the_archive_title(), ': ') + 2); ?>
                    </h2>
                </div>
                <div class="event grid-item">
                    <h1>
                        <?php echo substr(get_the_archive_title(), strpos(get_the_archive_title(), ': ') + 2); ?>
                    </h1>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                <?php endwhile; endif; ?>
            </div>
            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                </script>
                <div id="true_loadmore" class="button more">Завантажити ще</div>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>