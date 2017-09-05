<?php
/**
 * Template Name: Portfolio Overview
 */
?>

<?php get_template_part('templates/site-intro') ?>

<section class="portfolio">
    <div class="container">
        <div class="row">

            <?php $args = array(
                'post_type' => 'projects',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'orderby' => 'title',
                'order' => 'DESC',
            );
            ?>

            <?php $project_query = new wp_query($args); ?>
            <?php while ($project_query->have_posts()) :
                $project_query->the_post();

                $logo_object = get_field('project_logo');
                $logo_size = "150x150";
                $project_logo = $logo_object['sizes'][$logo_size];
                $logo_title = $logo_object['title'];
                $logo_alt = $logo_object['alt'];

                ?>

                <div class="col-xl-4 col-md-6 col-sm-12">
                    <a href="<?php the_permalink(); ?>">
                        <div class="card d-flex align-items-center" data-mh="teaser-card">
                            <img class="card-img-top img-fluid" src="<?php echo $project_logo ?>"
                                 title="<?php echo $logo_title ?>" alt="<?php echo $logo_alt ?>">
                            <div class="card-block">
                                <hr>
                                <h3 class="text-center"><?php echo the_field('project_title') ?></h3>
                                <p><?php echo the_field('project_excerpt') ?></p>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>

        </div>
    </div>

    <?php wp_reset_postdata(); ?>
</section>