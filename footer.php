</div>
<footer class="footer">

    <div class="container alc">
        <div class="phoneBox">
            <h4>Контактні телефони:</h4>
            <?php if ($phone_1 = get_field('phone_1', 'option')) { ?>
                <a href="tel:<?= $phone_1 ?>"><?= $phone_1 ?></a><span>/</span>
            <?php } ?>
            <?php if ($phone_2 = get_field('phone_2', 'option')) { ?>
                <a href="tel:<?= $phone_2 ?>"><?= $phone_2 ?></a>
            <?php } ?>
        </div>
       <div class="centerFooter">
           <?php echo some() ?>
           <?php echo get_custom_logo(); ?>
       </div>
        <div class="addressBox">
            <h4>Адреса:</h4>
            <?php if ($address = get_field('address', 'option')) { ?>
                <span><?= $address?></span>
            <?php } ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
