<?php get_header();  /*Template Name: Schedule a Visit */ ?>
    <section class="">
        <h1 style="display: none;"><?php the_title(); ?></h1>
        <div class="topSection alc">
            <div class="left alc">
                <div class="text">
                    <?php if ($title_sv = get_field('title_sv')) { ?>
                        <h3><?= $title_sv ?></h3>
                    <?php } ?>
                    <?php if ($subtitle_sv = get_field('subtitle_sv')) { ?>
                        <h2><?= $subtitle_sv ?></h2>
                    <?php } ?>
                    <?php if ($address = get_field('address_sv')) { ?>
                        <div class="address icon">
                            <?= $address ?>
                        </div>
                    <?php } ?>
                    <?php if ($phone = get_field('phone_sv')) { ?>
                        <div class="phone icon">
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                        </div>
                    <?php } ?>
                    <?php if ($mail = get_field('mail_sv')) { ?>
                        <div class="mail icon">
                            <a href="mailto:<?= $mail ?>"><?= $mail ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="imgRight">
                <?php if ($image = get_field('image_right_sv')) { ?>
                    <figure>
                        <img src="<?= $image['sizes']['right_image'] ?>" alt="<?= $image['alt'] ?>">
                    </figure>
                <?php } ?>
            </div>
        </div>

        <div class="middleSection">
            <div class="container alc">
                <div class="imgLeft">
                    <?php if ($image = get_field('image_left_sv')) { ?>
                        <figure>
                            <img src="<?= $image['sizes']['left_image'] ?>" alt="<?= $image['alt'] ?>">
                        </figure>
                    <?php } ?>
                </div>
                <div class="text customTitle">
                    <h3>Години роботи</h3>
                    <?php if($time_work = get_field('time_work')) { ?>
                        <div class="timeWork">
                            <?= $time_work ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="bottomSection">
            <div class="container">
                <?php if($price_box = get_field('price_box')) { ?>
                    <div class="items priceBox">
                        <?php foreach($price_box as $price) { ?>
                            <div class="item customTitle">
                                <?= $price['item'] ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>