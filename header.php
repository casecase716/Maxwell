<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>
<?php
    /* Declare Menu options
    ----------------------------*/
    /* Mobile Menu
    ----------------------------*/
    $mobile_menu_options = array(
        'theme_location'    =>  'mobile-menu',
        'container'         =>  false,
        'depth'             =>  2,
        'items_wrap'        =>  '<ul id="%1$s" class="left %2$s">%3$s</ul>',
        'walker'            =>  new GC_walker_nav_menu()
    );
    /* Main Menu
    ----------------------------*/
    $left_menu_options = array(
        'theme_location'    =>  'left-main-menu',
        'container' => 'nav',
        'depth'             =>  2,
        'items_wrap'        => '%3$s'
    );
    /* Right Menu
    ----------------------------*/
    $right_menu_options = array(
        'theme_location'    =>  'right-main-menu',
        'container' => 'nav',
        'depth'             =>  2,
        'items_wrap'        => '%3$s'
    );
?>

<?php if (!is_front_page()){ ?>
<body <?php body_class(); ?>>

    <div id="page" class="hfeed site" >
        <!-- Mobile Top-Bar -->
        <div class="off-canvas-wrap" data-offcanvas><!-- off canvas div -->
            <div class="inner-wrap"><!-- inner wrap div -->

                <a class="left-off-canvas-toggle hide-for-large-up menu-icon" href="#" ><span></span></a>

                <!-- Off Canvas Menu -->
                <aside class="left-off-canvas-menu">
                    <!-- Mobile Menu -->
                    <?php wp_nav_menu($mobile_menu_options); ?>
                </aside>
                <!-- Main content row -->
                <div class="row">
                    <div class="large-12 columns main-row"> <!-- Main content column-->
                        <!-- Main Menu -->
                        <div class="row text-center swe-logo">
                            <a href="<?php echo site_url();?>/home"><img src="<?php the_field('logo','options');?>"></a>
                        </div>
                        <div class="row collapse menu-main-menu-container">
                            <div class="large-5 columns show-for-large-up">
                                <?php wp_nav_menu($left_menu_options); ?>
                            </div>
                            <div class="large-2 columns">
                                &nbsp;
                            </div>
                            <div class="large-5 columns show-for-large-up">
                                <?php wp_nav_menu($right_menu_options); ?>
                            </div>
                        </div>

<?php }
else {
// If it is home page, do this ?>
<body <?php body_class(); ?> style="height:100%;">

    <?php while (have_posts()) : the_post();
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(5600, 1000), false, ''); ?>
            <div id="page" onclick="location.href='/home'" class="hfeed site" style="background-image: url(<?php echo $src[0]; ?>); background-size: cover; min-height: 100%;background-position: center;">
                <div class="row text-center swe-logo spl-logo">
                    <img src="<?php the_field('inverted_logo');?>">
                </div>
    <?php endwhile; // end of the loop. ?>
    <?php wp_reset_postdata(); ?>

<?php } // End if home page test
?>

