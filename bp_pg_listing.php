<?php
/**
 * Template Name: Listing
 * Created by: inkberries
 * Version: 2.0
 */
get_header();
while ( have_posts() ) : the_post();?>


    <div class="row">
        <div class="large-3 medium-3 columns show-for-medium-up" style="background-image: url('<?php the_field('left_image');?>'); height:500px; background-size: cover;">
        </div>
        <div class="large-6 medium-6 columns pg-middle-img" style="background-image: url('<?php the_field('middle_image');?>'); background-size: cover;">
        </div>
        <div class="large-3 medium-3 columns show-for-medium-up" style="background-image: url('<?php the_field('right_image');?>'); height:500px; background-size: cover;">
        </div>
    </div>

    <div class="row collapse">
        <div class="large-11 large-centered columns">
            <div class="row collapse text-center">
                <div class="ipa-title firstWord swe-margin-top-2">
                    <?php the_title();?>
                </div>
            </div>
            <div class="row collapse text-center">
                <?php the_content();?>
            </div>
            <div class="row swe-margin-top-2">
                <div class="large-9 large-centered columns menu-listing">

                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('listing') ):
                        // loop through the rows of data
                        while ( have_rows('listing') ) : the_row();?>

                                <div class="row swe-margin-top-2">
                                    <div class="large-11 large-offset-1 columns">
                                        <div class="row menu-listing">
                                            <div class="large-3 medium-3 columns menu-item-title">
                                                <h1><?php the_sub_field('listing_repeater_title'); ?></h1>
                                            </div>
                                            <div class="large-9 medium-9 columns">
                                                <?php while( have_rows('listing_repeater') ): the_row();?>
                                                    <div class="row menu-item-row">
                                                        <div class="large-12 columns menu-pg-item">
                                                            <h3><?php the_sub_field('listing_title');?></h3>
                                                            <p><?php the_sub_field('listing_copy');?></p>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <hr>

                        <?php endwhile;
                    else :
                        echo 'No listings';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>

            </div>
        </div>
    </div>


<?php endwhile;
get_footer();?>
