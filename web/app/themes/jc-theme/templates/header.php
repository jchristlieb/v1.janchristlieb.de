<nav class="navbar fixed-top navbar-toggleable-sm navbar-light nav-bg-default">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= esc_url(home_url('/#teasers')); ?>"><img class="nav-img"
                                                                                   src="<?= get_stylesheet_directory_uri(); ?>/dist/images/jc-logo-white.png"></a>

        <div class="collapse navbar-collapse navbar-toggleable-sm" id="navbarSupportedContent">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu([
                    'menu' => 'primary_navigation',
                    'theme_location' => 'primary_navigation',
                    'walker' => new wp_bootstrap_navwalker(),
                    'menu_class' => 'navbar-nav ml-auto',
                ]);
            endif;
            ?>
        </div>
    </div>
</nav>
