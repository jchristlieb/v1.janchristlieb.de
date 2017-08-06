<section class="project-gallery">
    <div class="container d-flex p-2 justify-content-center">
        <div class="row">
            <div class="col-12">

                <?php
                $images = get_field('project_gallery');
                $count = 0;
                $count1 = 0;

                if ($images) : ?>
                    <div id="slider">
                        <div id="project-carousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <?php foreach ($images as $image): ?>
                                    <li data-target="#carousel" data-slide-to="<?php echo $count; ?>"
                                        <?php if ($count == 0) : ?>class="active"<?php endif; ?>></li>
                                    <?php
                                    $count++;
                                endforeach; ?>
                            </ol>

                            <div class="carousel-inner">
                                <?php foreach ($images as $image): ?>
                                    <div class="carousel-item<?php if ($count1 == 0) : echo ' active'; endif; ?>">
                                        <img class="d-block img-fluid" src="<?php echo $image['sizes']['960x640']; ?>"
                                             title="<?php echo $image['title']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                    </div>
                                    <?php
                                    $count1++;
                                endforeach;
                                ?>
                            </div>

                            <a class="carousel-control-prev" href="#project-carousel" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#project-carousel" role="button" data-slide="next">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<section class="project-info">
    <div class="container d-flex p-2 justify-content-center">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="project-item">
                    <h2><?php echo the_field('project_description_label') ?></h2>
                    <div class="divider"></div>
                    <p><?php echo the_field('project_description') ?></p>
                </div>
                <div class="project-item">
                    <h2><?php echo the_field('technology_label') ?></h2>
                    <div class="divider"></div>
                    <ul>
                        <?php while (has_sub_field('technology')) {
                            $tech_item = get_sub_field('tech_item'); ?>

                            <li class="tech-item"><?php echo $tech_item ?></li>

                        <?php } ?>
                    </ul>
                </div>
                <?php if (get_field('project_credits')) : ?>
                    <div class="project-item">
                        <h2><?php echo the_field('credit_label') ?></h2>
                        <div class="divider"></div>
                        <p><?php echo the_field('project_credits') ?></p>
                    </div>
                <?php else: ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="project-box">
                    <div class="project-logo d-flex p-2 justify-content-center">

                        <?php
                        $logo_object = get_field('project_logo');
                        $logo_size = "150x150";
                        $project_logo = $logo_object['sizes'][$logo_size];
                        $logo_title = $logo_object['title'];
                        $logo_alt = $logo_object['alt'];
                        ?>

                        <img class="img-fluid" src="<?php echo $project_logo ?>"
                             title="<?php echo $logo_title ?>" alt="<?php echo $logo_alt ?>">
                    </div>
                    <div class="project-about">
                        <p><?php echo the_field('project_about'); ?></p>
                        <?php if (get_field('project_url')) : ?>
                            <p><a class="project-link" href="<?php echo the_field('project_url') ?>"
                                  target="_blank"><?php echo the_field('project_url_anchor') ?></a></p>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php if (get_field('project_duration')) : ?>
                            <p class="project-duration"><?php echo the_field('project_duration') ?></p>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



