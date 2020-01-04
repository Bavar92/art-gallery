<?php get_header();  /*Template Name: Gallery */ ?>
    <section class="content">
        <div class="container">
            <?php if ($gallery_im = get_field('gallery_im')) { ?>
                <div class="gallery grid">
                    <h1 class="grid-item"><?php the_title(); ?></h1>
                    <?php foreach ($gallery_im as $gallery) { $i++; $j++?>
                        <a href="#fancyGallery_<?= $i ?>" class="item grid-item" data-fancybox="gallery">
                            <?php $image = $gallery['image'] ?>
                            <figure>
                                <img src="<?= $image['sizes']['gallery'] ?>" alt="<?= $image['alt'] ?>">
                            </figure>
                            <div class="text">
                                <h4><?= $gallery['title'] ?></h4>
                                <?= $gallery['text'] ?>
                            </div>
                        </a>
                        <div class="fancyGallery" id="fancyGallery_<?= $j ?>" style="display: none;">
                            <figure>
                                <img src="<?= $image['sizes']['gallery_fancy'] ?>" alt="<?= $image['alt'] ?>">
                            </figure>
                            <div class="text">
                                <h4><?= $gallery['title'] ?></h4>
                                <?= $gallery['text'] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>