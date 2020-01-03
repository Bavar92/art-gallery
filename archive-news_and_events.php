<?php get_header(); ?>
    <section class="content">
        <div class="container">
            <div class="events grid">
                <h1 class="grid-item" style="opacity: 0; height: 0; padding: 0; padding-bottom: 1px">
                    <?php echo substr(get_the_archive_title(), strpos(get_the_archive_title(), ': ') + 2); ?>
                </h1>
                <h1 class="grid-item">
                    <?php echo substr(get_the_archive_title(), strpos(get_the_archive_title(), ': ') + 2); ?>
                </h1>
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
                                <span class="alc"><?php if ($date_from = get_field('date_from')) { ?>
                                        <?= $date_from ?>
                                    <?php } ?></span>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(get_option('date_format_custom')); ?></time>
                            <p><?php echo wp_trim_words(get_the_content(), 40); ?></p>
                            <a class="more" href="<?php the_permalink(); ?>">Read more ></a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>