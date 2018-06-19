<?php
/**
 * Template Name: Home
 * Created by: inkberries
 * Version: 2.0
 * Date: 3/25/15
 * Time: 1:20 PM
 */?>

<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row collapse hpg-gal">
        <?php

        // If at least 1 image is present in the Project Images Gallery field

        if( $images = get_field('dynamic_gallery') ) {

            $image_ids = wp_list_pluck( $images, 'id' );

            // Soliloquy Dynamic requires image IDs to be passed as a comma separated list
            $image_ids_string = implode( ',', $image_ids );

            echo '<div class="project-images-slider">';
            soliloquy_dynamic( array(
                'id' => 'custom-project-images',
                'images' => $image_ids_string
            ) );
            echo '</div>';

        } ?>
    </div>
    <div class="row collapse swe-margin-top-5">
        <div class="large-9 small-11 small-centered large-centered columns">
            <div class="row collapse text-center ipa-title firstWord">
                <?php the_title();?>
            </div>
            <div class="row swe-margin-top-2">
                <div class="large-6 columns text-right ipa-aside">
                    <?php the_field('info_aside');?>
                </div>
                <div class="large-6 columns">
                    <?php the_content();?>
                </div>
            </div>
            <div class="row swe-margin-top-5">
                <?php echo do_shortcode('[instagram-feed]');?>
            </div>
        </div>
    </div>



<?php endwhile; else:
    // no posts found
endif;?>
<?php get_footer();?>