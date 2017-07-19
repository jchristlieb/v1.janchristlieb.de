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

