<?php
/**
 * Template Name: Service Page
 */
?>

<?php
get_template_part('templates/site-intro');
get_template_part('templates/toc');
get_template_part('templates/qa-modal');
?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_rows('content_block_a')): ?>
                    <?php $i = 0; ?>

                    <?php while (have_rows('content_block_a')) : the_row(); ?>
                        <?php $i++ ?>
                        <div class="row content-item">
                            <div class="col-md-8<?php if ($i % 2 == 0) echo ' push-md-4' ?>">
                                <h2 class="anchor"
                                    id="<?php the_sub_field('section_name') ?>"><?php the_sub_field('headline') ?></h2>
                                <p><?php the_sub_field('text') ?></p>
                            </div>

                            <?php
                            $image_object = get_sub_field('image');
                            $image_size = "360x360";
                            $image = $image_object['sizes'][$image_size];
                            $image_alt = $image_object['alt'];
                            $image_title = $image_object['title'];
                            ?>

                            <div class="col-md-4 d-inline-flex justify-content-center align-items-center<?php if ($i % 2 == 0) echo ' pull-md-8' ?>">
                                <img class="img-fluid" src="<?php echo $image; ?>"
                                     alt="<?php echo $image_alt; ?>"
                                     title="<?php echo $image_title; ?>"/>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_template_part('templates/contact-form');
?>






