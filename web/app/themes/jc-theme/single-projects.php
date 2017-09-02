<section class="project-gallery">

    <?php
    $desktop = get_field('screenshot_desktop');
    $tablet = get_field('screenshot_tablet');
    $mobile = get_field('screenshot_mobile');
    ?>

    <div class="show-all-devices">
        <div class="container">
            <div id="device" class="device-wrapper desktop">
                <div class="screen-outer">
                    <div class="screen-inner">
                        <div class="content-container">
                            <img class="img-fluid screenshot-desktop"
                                 src="<?php echo $desktop['sizes']['600x400'] ?>"
                                 title="<?php echo $desktop['title'] ?>"
                                 alt="<?php echo $desktop['alt'] ?>">
                            <img class="img-fluid screenshot-tablet"
                                 src="<?php echo $tablet['sizes']['350x500'] ?>"
                                 title="<?php echo $tablet['title'] ?>"
                                 alt="<?php echo $tablet['alt'] ?>">
                            <img class="img-fluid screenshot-mobile"
                                 src="<?php echo $mobile['sizes']['250x420'] ?>"
                                 title="<?php echo $mobile['title'] ?>"
                                 alt="<?php echo $mobile['alt'] ?>">
                        </div>
                    </div>
                </div>
                <div class="bottom"></div>
            </div>
        </div>
    </div>

    <div class="show-mobile-only">
        <div class="d-flex justify-content-center">
            <div class="device-wrapper tablet mobile d-flex justify-content-center">
                <div class="screen-outer">
                    <div class="screen-inner">
                        <div class="content-container">
                            <img class="img-fluid screenshot-mobile"
                                 src="<?php echo $mobile['sizes']['250x420'] ?>"
                                 title="<?php echo $mobile['title'] ?>"
                                 alt="<?php echo $mobile['alt'] ?>">
                        </div>
                    </div>
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
                <div class="show-all-devices">
                    <button type="button" id="switchDevice" class="btn btn-primary">Responsives Design testen</button>
                </div>
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
                        <hr>
                        <p><?php echo the_field('project_about'); ?></p>
                        <?php if (get_field('project_url')) : ?>
                            <hr>
                            <p><a class="project-link" href="<?php echo the_field('project_url') ?>"
                                  target="_blank"><?php echo the_field('project_url_anchor') ?></a></p>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
