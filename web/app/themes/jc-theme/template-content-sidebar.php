<?php
/**
 * Template Name: Content + Sidebar
 */
?>

<?php
get_template_part('templates/site-intro');
?>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <?php echo the_field('main_text') ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="project-item">
                    <div class="project-box">
                        <div class="project-logo d-flex p-2 justify-content-center">

                            <?php
                            $image_object = get_field('sidebar_image');
                            $image_size = "200x200";
                            $image = $image_object['sizes'][$image_size];
                            $title = $image_object['title'];
                            $alt = $image_object['alt'];
                            ?>

                            <img class="img-fluid" src="<?php echo $image ?>"
                                 title="<?php echo $title ?>" alt="<?php echo $alt ?>">
                        </div>
                        <div class="project-about">
                            <hr>
                            <p><?php echo the_field('sidebar_text'); ?></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?php
get_template_part('templates/contact-form');
?>





