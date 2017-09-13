<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<!--[if IE]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your
    browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->
<?php
do_action('get_header');
get_template_part('templates/header');
get_template_part('templates/hero-image');
?>
<section class="container background">
    <div class="wrap" role="document">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.wrap -->
</section>
<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>
<script type="text/javascript" id="cookieinfo"
        src="//cookieinfoscript.com/js/cookieinfo.min.js"
        data-bg="#2e5c77"
        data-fg="#FFFFFF"
        data-link="#F1D600"
        data-cookie="CookieInfoScript"
        data-text-align="left"
        data-close-text="OK"
        data-font-size="16px"
        data-font-family="sans-serif"
        data-message="Ja, auch diese Seite nutzt Cookies. Durch Nutzung dieser Seite erklärst du dich damit einverstanden. Wieso, weshalb, warum? Mehr Infos findest du im"
        data-linkmsg="Datenschutz."
        data-moreinfo="https://janchristlieb.de/datenschutz">
</script>
</body>
</html>
