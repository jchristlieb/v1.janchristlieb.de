<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/fp-head'); ?>
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
?>
<section class="welcome">

    <?php
    $image_object = get_field('image');
    $image_size = "150x150";
    $image = $image_object['sizes'][$image_size];
    $image_title = $image_object['title'];
    $image_alt = $image_object['alt'];
    ?>

    <div class="container" id="#site-intro">
        <div class="row">
            <div class="d-md-inline-flex justify-content-center col-sm-3">
                <img class=" greeting-image rounded-circle img-fluid" src="<?php echo $image ?>"
                     title="<?php echo $image_title ?>" alt="<?php echo $image_alt ?>">
            </div>
            <div class="col-sm-9">
                <div id="about"></div>
            </div>
        </div>
    </div>

</section>
<section class="container background">
    <div class="wrap" role="document">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
    </div><!-- /.wrap -->
</section>
<?php
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
    ?>
</body>
</html>
