<?php
/**
 * Template Name: Portfolio
 */
?>

<?php get_template_part('templates/site-intro') ?>

<section class="portfolio">
<div class="container">
    <div class="row">

        <?php $args = array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => 10
        );
        ?>


        <?php $project_query = new wp_query($args); ?>
        <?php $i = 1 ?>
        <?php while ($project_query->have_posts()) :
            $project_query->the_post(); ?>


            <?php
            $image = get_field('card_image');
            $size = "800x450";
            $image_size = $image['sizes'][$size];
            $url_image = $image['url'];
            $title_image = $image['title'];
            $alt_image = $image['alt'];
            ?>
            <div class="col-md-6 portfolio-item">
                <a href="#portfolio-modal-<?php echo $i ?>" class="portfolio-link" data-toggle="modal">
                    <div class="card">
                        <div class="portfolio-image">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="card-img-top img-fluid" src="<?php echo $image_size ?>"
                                 title="<?php echo $title_image ?>" alt="<?php echo $alt_image ?>">
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><?php echo get_field('title') ?></h4>
                            <p class="card-text"><?php echo get_field('excerpt') ?></p>
                        </div>
                    </div>

                </a>
            </div>

            <?php $i++ ?>
        <?php endwhile; ?>

    </div>
</div>
<?php wp_reset_postdata(); ?>

<?php $args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
);
?>

<?php $project_query = new wp_query($args); ?>
<?php $i = 1 ?>
<?php while ($project_query->have_posts()) :
    $project_query->the_post(); ?>


    <div class="modal fade" id="portfolio-modal-<?php echo $i ?>" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-portfolio">
            <div class="modal-content">
                <div class="close-modal-top" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8 col-md-offset-2 col-xl-6 col-md-offset-3">
                            <div class="modal-body">
                                <h2 class="text-center"><?php echo get_field('title'); ?><br>
                                    <small class="text-muted"><?php echo get_field('sub_title') ?></small>
                                </h2>
                                <div class="modal-img">
                                    <img class="rounded img-fluid mx-auto d-block"
                                         src="<?php the_post_thumbnail_url('800x450') ?>">
                                </div>
                                <h6><?php echo get_field('description_label'); ?></h6>
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <div class="divider"></div>
                                <h6><?php echo get_field('tool_label'); ?></h6>
                                <p><?php echo get_field('tools'); ?></p>
                                <div class="divider"></div>
                                <h6><?php echo get_field('client_label'); ?></h6>
                                <p><?php echo get_field('client'); ?></p>
                                <div class="divider"></div>
                                <h6><?php echo get_field('website_label'); ?></h6>
                                <a href="<?php echo get_field('client_website'); ?>" target="_blank">
                                    <?php echo get_field('client_website'); ?></a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="close-modal-button" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $i++ ?>
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

</section>
