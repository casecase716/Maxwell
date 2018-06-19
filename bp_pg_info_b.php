<?php
/**
 * Template Name: Info B
 * Created by: inkberries
 * Version: 2.0
 * Date: 3/25/15
 * Time: 1:20 PM
 */
get_header();
while ( have_posts() ) : the_post();?>

    <div class="row swe-margin-top-2">
        <div class="large-9 large-centered columns firstWord text-center">
            <h1><?php the_title();?></h1>
        </div>
    </div>

    <div class="row swe-margin-top-2">
        <div class="large-8 large-centered small-10 small-centered columns">
            <div class="row">
                <div class="large-5 medium-5 columns ipb-content">
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('image_repeater') ):
                        // loop through the rows of data
                        while ( have_rows('image_repeater') ) : the_row();?>

                            <div class="row collapse">
                                <img src="<?php the_sub_field('image');?>">
                            </div>

                        <?php endwhile;
                    else :
                        echo 'No listings';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="large-7 medium-7 columns text-justify">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>


<?php endwhile;
get_footer();?>


