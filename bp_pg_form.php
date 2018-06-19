<?php
/**
 * Template Name: Form
 * Created by: inkberries
 * Version: 2.0
 * Date: 3/25/15
 * Time: 1:20 PM
 */
get_header();
while ( have_posts() ) : the_post();?>

    <div class="row">
        <div class="large-3 medium-3 columns show-for-medium-up" style="background-image: url('<?php the_field('left_image');?>'); height:500px; background-size: cover;">
        </div>
        <div class="large-6 medium-6 columns pg-middle-img" style="background-image: url('<?php the_field('middle_image');?>'); background-size: cover;">
        </div>
        <div class="large-3 medium-3 columns show-for-medium-up" style="background-image: url('<?php the_field('right_image');?>'); height:500px !important; background-size: cover;">
        </div>
    </div>

    <div class="row collapse swe-margin-top-2">
        <div class="large-9 large-centered columns">
            <div class="row collapse text-center ipa-title firstWord">
                <?php the_title();?>
            </div>
            <div class="row swe-margin-top-2">
                <div class="large-4 medium-4 columns frm-aside ipa-aside swe-margin-top-2">
                    <?php the_field('info_aside');?>
                </div>
                <div class="large-8 medium-8 columns">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>


<?php endwhile;
get_footer();?>
