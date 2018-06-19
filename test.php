<?php
/**
 * Template Name: Test
 * Created by: inkberries
 * Version: 2.0
 * Date: 3/25/15
 * Time: 1:20 PM
 */
;?>

<?php get_header();?>

<div class="row text-center">
    <h1>Weekly Hot Menu</h1>
</div>
    <div class="row">
        <div class="large-12 large-centered columns menu-main-menu-container">
            <div>
                <?php wp_nav_menu(array(
                    'theme_location'    =>  'menu-menu',
                    'container' => 'nav',
                    'depth'             =>  2,
                    'items_wrap'        => '%3$s'
                ));?>
            </div>
        </div>
    </div>


<div class="row">
    <div class="large-3 columns" style="background-image: url('http://joannas-marketplace.dev/wp-content/uploads/2017/03/DSC_0885-RET.jpg'); height:500px; background-size: cover;">
    </div>
    <div class="large-2 columns" style="background-image: url('http://joannas-marketplace.dev/wp-content/uploads/2017/03/DSC_0695.jpg'); height:500px; background-size: cover;">
    </div>
    <div class="large-3 columns" style="background-image: url('http://joannas-marketplace.dev/wp-content/uploads/2017/03/DSC_0270.jpg'); height:500px; background-size: cover;">
    </div>
    <div class="large-4 columns" style="background-image: url('http://joannas-marketplace.dev/wp-content/uploads/2017/03/DSC_0314.jpg'); height:500px; background-size: cover;">
    </div>
</div>



<?php get_footer();?>