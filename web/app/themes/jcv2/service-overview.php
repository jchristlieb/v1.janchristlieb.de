<?php
/**
 * Template Name: Service Overview
 */
?>

<?php get_template_part('templates/site-intro'); ?>

<section class="service-teasers">

    <div class="card-deck">
        <div class="container">
            <div class="row">

                <?php if (have_rows('image_card')) :

                while (have_rows('image_card')) : the_row(); ?>


                    <?php
                    $image_object = get_sub_field('image');
                    $image_size = "360x360";
                    $image = $image_object['sizes'][$image_size];
                    $image_title = $image_object['title'];
                    $image_alt = $image_object['alt'];
                    ?>

                    <div class="col-md-8 offset-md-2 col-lg-4 offset-lg-0">
                        <article class="card">
                            <div class="card-block">
                                <h3 class="card-title"><?php the_sub_field('card_title') ?></h3>
                                <h6 class="text-muted"><?php the_sub_field('card_subtitle') ?></h6>
                            </div>
                            <img class="img-responsive" src="<?php echo $image; ?>"
                                 title="<?php echo $image_title; ?>" alt="<?php echo $image_alt; ?>"/>
                            <div class="card-block">
                                <p class="card-text"><?php the_sub_field('card_body') ?></p>
                                <a href="<?php the_sub_field('button_link') ?>"
                                   class="btn btn-primary"><?php the_sub_field('card_button') ?></a>
                            </div>
                        </article>
                    </div>

                <?php endwhile ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

</section>
<?php wp_reset_query(); ?>


