<?php
/**
 * Template Name: Splash
 * Created by: inkberries
 * Version: 2.0
 * Date: 9/29/2017
 * Time: 1:20 PM
 */?>

<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <div class="row collapse">
        <div class="large-3 large-offset-8 small-8 small-centered columns spl-content swe-margin-bottom-2 text-right">
            <?php the_content();?>
        </div>
    </div>

<?php endwhile; else:
    // no posts found
endif;?>
<?php get_footer();?>