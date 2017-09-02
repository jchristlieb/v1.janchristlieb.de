<button type="button" class="btn-sidekick" id="toc-btn"></button>

<section class="toc">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="toc-menu">
                    <div class="card-header">
                        <h3 class="anchor" id="toc">Auf einen Blick</h3>
                    </div>
                    <ul class="toc-list">
                        <?php while (have_rows('content_block_a')) : the_row(); ?>
                            <a class="animated-link" href="#<?php the_sub_field('section_name'); ?>">
                                <li>
                                    <h4 class="toc-item"><?php the_sub_field('headline') ?>:&nbsp;<?php the_sub_field('toc_info'); ?></h4>
                                </li>
                            </a>
                        <?php endwhile; ?>

                        <?php if (get_field('form_section_name')): ?>
                        <a class="animated-link" href="#<?php echo get_field('form_section_name'); ?>">
                            <li>
                                <h4 class="toc-item"><?php echo get_field('form_toc_info'); ?></h4>
                            </li>
                        </a>
                        <?php else: ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
