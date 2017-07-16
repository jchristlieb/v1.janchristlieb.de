<section class="welcome">

    <?php
    $image_object = get_field('image');
    $image_size = "150x150";
    $image = $image_object['sizes'][$image_size];
    $image_title = $image_object['title'];
    $image_alt = $image_object['alt'];
    ?>

        <div class="container" id="site-intro">
            <div class="row">
                <div class="d-md-inline-flex justify-content-center col-sm-3">
                    <img class=" greeting-image rounded-circle img-fluid" src="<?php echo $image ?>"
                         title="<?php echo $image_title ?>" alt="<?php echo $image_alt ?>">
                </div>
                <div class="col-sm-9">
                    <div id="about"></div>
                </div>
            </div>
        </div>


</section>

<section class="teasers">

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
                <div class="text-center lead-description">
                    <?php echo get_field('card_introduction'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card-deck">
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

                        <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">
                            <div class="card">
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
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<section class="testimonials">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2><?php echo get_field('testimonial_headline'); ?></h2>
                    <hr class="default-style">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center lead-description">
                    <?php echo get_field('testimonial_introduction'); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-8 offset-md-2">

        <?php
        $testimonials = new WP_Query([
            'post_type' => 'testimonials',
            'posts_per_page' => 0
        ]);
        ?>

        <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <?php if (have_rows('slider')):
                    $i = 0;
                    while (have_rows('slider')) : the_row(); ?>
                        <li data-target="#testimonial-carousel"
                            data-slide-to="<?php echo $i ?>"<?php if ($i == 0) echo ' class="active"' ?>></li>
                        <?php
                        $i++;
                    endwhile;
                endif; ?>
            </ol>

            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="carousel-inner" role="listbox">

                        <?php $i = 0; ?>
                        <?php while ($testimonials->have_posts()) :
                            $testimonials->the_post(); ?>

                            <div class="carousel-item<?php if ($i == 0) echo ' active' ?>">
                                <blockquote class="blockquote justify-content-center align-middle">
                                    <p class="quote"><?php echo get_field('quote'); ?></p>
                                    <div class="footer">
                                        <a href="<?php echo get_field('link') ?>"><em><?php echo get_field('client'); ?></em></a>
                                    </div>
                                </blockquote>
                            </div>

                            <?php $i++; ?>

                        <?php endwhile; ?>
                    </div>
                </div>


                <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    <?php wp_reset_query(); ?>

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


