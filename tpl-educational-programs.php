<?php get_header()  /*Template Name: Educational Programs */ ?>
    <section class="content">
        <div class="container">
            <h1 style="display: none; padding-bottom: 0;"><?php the_title(); ?></h1>
            <div class="programs">
                <div class="item flex">
                    <div class="titleBox">
                        <h2><?php the_field('lyceum_title') ?></h2>
                        <h3><?php the_field('lyceum_description') ?></h3>
                    </div>
                    <div class="infoBox wysiwyg">
                        <div><?php the_field('lyceum_text') ?></div>
                        <div class="eventsPro">
                            <?php $data = new WP_Query(
                                array('post_type' => 'news_and_events',
                                    'post_status' => array('publish'),
                                    'posts_per_page' => 4,
                                    'order' => 'ASC',
                                )); ?>
                            <?php while ($data->have_posts()) : $data->the_post(); ?>
                                <div class="event">
                                    <?php if ($thumbnail_image = get_field('thumbnail_image', $p->ID)) { ?>
                                        <a class="thumb" href="<?php the_permalink(); ?>">
                                            <img src="<?= $thumbnail_image['sizes']['event'] ?>"
                                                 alt="<?= $thumbnail_image['alt'] ?>">
                                        </a>
                                    <?php } ?>
                                    <div class="info">
                                        <div class="dateTitle flex">
                                            <div class="date alc">
                                                <div class="wrapDate alc">
                                                    <?php if ($number_a = get_field('number_a', $p->ID)) { ?>
                                                        <span class="number"><?= $number_a ?></span>
                                                    <?php } ?>
                                                    <div class="rightDate flex">
                                                        <?php if ($day_a = get_field('day_a', $p->ID)) { ?>
                                                            <span class="day"><?= $day_a ?></span>
                                                        <?php } ?>
                                                        <?php if ($month_a = get_field('month_a', $p->ID)) { ?>
                                                            <span class="month"><?= $month_a ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3>
                                                <a href="<?php the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                        <div class="btnCenter">
                            <a href="<?php echo site_url(); ?>/news_and_events/" class="button">Показати всі</a>
                        </div>
                    </div>
                </div>
                <div class="item flex">
                    <div class="titleBox">
                        <h2><?php the_field('title_educational') ?></h2>
                    </div>
                    <div class="infoBox flex">
                        <?php if ($left_text_e = get_field('left_text_e')) { ?>
                            <div class="left part">
                                <?= $left_text_e ?>
                            </div>
                        <?php } ?>
                        <?php if ($right_text_e = get_field('right_text_e')) { ?>
                            <div class="right part">
                                <?= $right_text_e ?>
                            </div>
                        <?php } ?>
                        <?php if ($bottom_text_e = get_field('bottom_text_e')) { ?>
                            <div class="bottom">
                                <?= $bottom_text_e ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="item flex">
                    <div class="titleBox">
                        <h2><?php the_field('title_publications') ?></h2>
                    </div>
                    <div class="infoBox">
                        <?php if ($list_p = get_field('list_p')) { ?>
                            <div class="list">
                                <?= $list_p ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>