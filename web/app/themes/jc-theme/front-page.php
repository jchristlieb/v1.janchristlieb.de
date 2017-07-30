<section class="teasers" id="site-intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anchor text-center" id="teasers">
                    <h2><?php echo get_field('card_headline'); ?></h2>
                    <hr class="alt-style">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <p class="lead">
                        <?php echo get_field('card_introduction'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">

                <?php if (have_rows('icon_card')) :

                    while (have_rows('icon_card')) : the_row(); ?>

                        <?php
                        $icon_object = get_sub_field('icon');
                        $icon_size = "85x85";
                        $icon = $icon_object['sizes'][$icon_size];
                        $icon_title = $icon_object['title'];
                        $icon_alt = $icon_object['alt'];
                        ?>

                        <div class="col-md-8 offset-md-2 col-xl-4 offset-xl-0">
                            <a href="<?php the_sub_field('card_link') ?>">
                                <div class="card" data-mh="cards-group">
                                    <div class="card-top">
                                    </div>
                                    <img class="card-image" src="<?php echo $icon ?>"
                                         title="<?php echo $icon_title ?>"
                                         alt="<?php echo $icon_alt ?>">
                                    <div class="card-block">
                                        <h3 class="card-title text-center"><?php the_sub_field('card_title') ?></h3>
                                        <hr class="card-hr">
                                        <p class="card-text"><?php the_sub_field('card_body') ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

        </div>
    </div>
</section>

<section class="contact" id="contact">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php if ($form_headline = get_field('form_headline')): ?>
                    <h2 class="text-center"><?php echo($form_headline) ?></h2>
                <?php endif; ?>
                <hr/>
                <?php if ($form_about = get_field('form_about')): ?>
                    <p class="lead"><?php echo do_shortcode($form_about) ?></p>
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




