<section class="toc-contact-form">

    <div class="container">
        <div class="row content-item">
            <div class="col-md-12">
                <?php if ($form_headline = get_field('form_headline')): ?>
                    <h2 class="anchor" id="<?php echo get_field('form_section_name') ?>"><?php echo($form_headline) ?></h2>
                <?php endif; ?>
                <div class="divider"></div>
                <?php if ($form_about = get_field('form_about')): ?>
                    <p><?php echo do_shortcode($form_about) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="contact-form">
            <?php
            $form = get_field('form_shortcode');
            ?>
            <?php if ($form): ?>
                <?php echo do_shortcode($form) ?>
            <?php endif; ?>
        </div>

    </div>
</section>