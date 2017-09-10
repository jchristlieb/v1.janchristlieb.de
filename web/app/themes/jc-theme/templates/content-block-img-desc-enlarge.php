<!--This template uses thumbnails of images with optional description and image enlargement on click-->

<section class="content" id="section-content">

    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php if (have_rows('content_block_a')): ?>
                    <?php $i = 0; ?>

                    <?php while (have_rows('content_block_a')) :
                        the_row(); ?>
                        <?php $i++ ?>

                        <?php
                        $image_object = get_sub_field('image');
                        $image_size = "360x360";
                        $image = $image_object['sizes'][$image_size];
                        $image_modal_size = "800x800";
                        $image_modal = $image_object['sizes'][$image_modal_size];
                        $image_alt = $image_object['alt'];
                        $image_title = $image_object['title'];
                        $image_desc = $image_object['description'];
                        ?>


                        <div class="row content-item">
                            <?php if ($image) : ?>
                            <div class="col-md-8<?php if ($i % 2 == 0) echo ' push-md-4' ?>">
                                <h2 class="anchor"
                                    id="<?php the_sub_field('section_name') ?>"><?php the_sub_field('headline') ?></h2>
                                <div class="divider"></div>
                                <p><?php the_sub_field('text') ?></p>
                            </div>
                            <?php else: ?>
                            <div class="col-md-12">
                                <h2 class="anchor"
                                    id="<?php the_sub_field('section_name') ?>"><?php the_sub_field('headline') ?></h2>
                                <div class="divider"></div>
                                <p><?php the_sub_field('text') ?></p>
                            </div>
                            <?php endif; ?>


                            <?php if ($image) : ?>
                            <div class="sidebar-image col-md-4 d-inline-flex flex-column justify-content-top align-items-center<?php if ($i % 2 == 0) echo ' pull-md-8' ?>">
                                <a href="#img-modal-<?php echo $i ?>" data-toggle="modal">
                                    <div class="img-enlarge justify-content-top align-items-center" id="img-enlarge">
                                        <?php if ($image_desc) : ?>
                                            <img class="img-fluid rounded-top border-bottom-0" src="<?php echo $image; ?>"
                                                 alt="<?php echo $image_alt; ?>"
                                                 title="<?php echo $image_title; ?>"/>
                                            <div class="img-description rounded-bottom border-top-0">
                                                <p><?php echo $image_desc; ?></p>
                                            </div>
                                        <?php else: ?>
                                            <img class="no-img-border img-fluid rounded" src="<?php echo $image; ?>"
                                                 alt="<?php echo $image_alt; ?>"
                                                 title="<?php echo $image_title; ?>"/>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <?php else: ?>
                            <?php endif; ?>

                            <div class="image-modal">
                                <div class="modal fade" id="img-modal-<?php echo $i ?>" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-inline-flex justify-content-center align-items-center">
                                                <img class="img-fluid rounded" src="<?php echo $image_modal; ?>"
                                                     alt="<?php echo $image_alt; ?>"
                                                     title="<?php echo $image_title; ?>"/>
                                            </div>
                                            <div class="modal-footer d-inline-flex justify-content-center align-items-center">
                                                <div class="img-description rounded-bottom">
                                                    <p><?php echo $image_desc; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>