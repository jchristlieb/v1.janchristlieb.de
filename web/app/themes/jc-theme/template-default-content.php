<?php
/**
 * Template Name: Default Content
 */
?>

<?php
get_template_part('templates/site-intro');
get_template_part('templates/qa-modal');
get_template_part('templates/toc');
?>

<section class="content">
    <div class="container">
        <?php if (have_rows('content_block_b')): ?>

            <?php while (have_rows('content_block_b')) : the_row(); ?>

                <?php
                $icon_object = get_sub_field('icon');
                $icon_size = "50x50";
                $icon = $icon_object['sizes'][$icon_size];
                $icon_alt = $icon_object['alt'];
                $icon_title = $icon_object['title'];
                ?>

                <div class="row content-item">
                    <div class="col-12 content-block-b d-flex align-items-center">
                        <img src="<?php echo $icon; ?>"
                             alt="<?php echo $icon_alt; ?>"
                             title="<?php echo $icon_title; ?>"/>
                        <h2 class="anchor"
                            id="<?php the_sub_field('headline') ?>"><?php the_sub_field('headline') ?></h2>
                    </div>
                    <div class="col-12">
                        <p><?php the_sub_field('text_body') ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>






