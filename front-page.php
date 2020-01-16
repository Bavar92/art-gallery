<?php get_header();
global $post;
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<?php if($jobs_home = get_field('jobs_home')) { ?>
    <div class="sliderVertical cover alc" style="background-image: url('<?= $url?>')">

           <div class="titleHome">
               <h2>Національний музей</h2>
               <h1>Київська картинна галерея</h1>
           </div>
        <div class="contactHome alc">
            <a href="<?php echo site_url(); ?>/contact-us/" class="button">Контакти</a>
            <span>Підпишіться на наші новини!</span>
        </div>
           <div class="swiper-container homeSlider">
               <div class="swiper-wrapper">
                   <?php foreach($jobs_home as $jobs) { ?>
                       <div class="swiper-slide flex job">
                           <?php $image = $jobs['photo'] ?>
                           <figure>
                               <img src="<?= $image['sizes']['job'] ?>" alt="<?= $image['alt'] ?>">
                           </figure>
                           <div class="info">
                               <div class="text">
                                   <h4><?= $jobs['title'] ?></h4>
                                   <?= $jobs['description'] ?>
                                   <span class="galleryName"><?= $jobs['name_gallery'] ?></span>
                                   <span class="date"><?= $jobs['date'] ?></span>
                               </div>
                           </div>
                       </div>
                   <?php } ?>
               </div>
               <div class="swiper-pagination"></div>
           </div>

    </div>
<?php } ?>

<?php get_footer('home'); ?>