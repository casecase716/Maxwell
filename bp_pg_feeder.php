<?php
/**
 * Template Name: Feeder
 * Created by PhpStorm.
 * User: casey
 */;?>


<?php get_header();?>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
);

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <div class="row collapse">
        <div class="large-10 large-centered columns">
            <div class="row">

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                        <div class="large-6 medium-6 columns fdr swe-margin-top-2">
                            <div class="row collapse">
                              <?php the_post_thumbnail();?>
                                <a href="<?php the_permalink();?>">
                                    <div class="row collapse fdr-hover">
                                        <div class="large-11 large-centered columns">
                                            <div class="row swe-margin-top-2">
                                                <div class="large-4 columns text-right">
                                                    <h1><?php the_title();?></h1>
                                                </div>
                                                <div class="large-8 columns text-justify">
                                                    <?php the_excerpt();?>
                                                    <a class="fdr-read-more" href="<?php the_permalink();?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php
                endwhile;?>
            </div>
        </div>
    </div>

<?php endif;?>

<?php get_footer();?>