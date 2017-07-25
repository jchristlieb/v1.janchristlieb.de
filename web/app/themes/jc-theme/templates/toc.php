<button type="button" class="btn-sidekick fa fa-arrow-circle-up fa-2x" id="toc-btn"></button>


<section class="toc">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <div class="toc-menu">
                    <div class="card-header">
                        <h3 class="anchor" id="toc"><i class="fa fa-bars " aria-hidden="true"></i>
                            Auf einen Blick</h3>
                    </div>
                    <ul class="toc-list">
                        <?php while (have_rows('content_block_a')) : the_row(); ?>
                            <a class="animated-link" href="#<?php the_sub_field('section_name') ?>">
                                <li>
                                    <h4 class="toc-item"><?php the_sub_field('headline') ?>:&nbsp;<?php the_sub_field('toc_info') ?></h4>
                                </li>
                            </a>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>