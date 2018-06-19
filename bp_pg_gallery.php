<?php
/**
 * Template Name: Gallery
 * Created by: inkberries
 * Version: 2.0
 * Date: 3/25/15
 * Time: 1:20 PM
 */?>

<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row collapse hpg-gal text-center swe-margin-top-2 gal">
        <?php the_content();?>
    </div>


<?php endwhile; else:
    // no posts found
endif;?>
<?php get_footer();?>