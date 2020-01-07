<?php  get_header()  /*Template Name: Educational Programs */ ?>
<section class="content">
    <div class="container">
        <h1 style="display: none; padding-bottom: 0;"><?php the_title(); ?></h1>
        <?php if ($contacts_cs = get_field('contacts_cs')) { ?>
            <div class="contacts flex">
                <?php foreach ($contacts_cs as $contact) { ?>
                    <div class="contact">
                        <?= $contact['name_gallery'] ?>
                        <?php $image = $contact['image'] ?>
                        <figure>
                            <img src="<?= $image['sizes']['contact']?>" alt="<?= $image['alt'] ?>">
                        </figure>
                        <?= $contact['form'] ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php get_footer(); ?>