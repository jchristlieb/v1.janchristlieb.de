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
                            <a href="<?php the_sub_field('card_link') ?>">
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
                            </a>
                        </div>

                    <?php endwhile ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

</section>
<?php wp_reset_query(); ?>


