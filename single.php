<?php get_header(); ?>

    <div class="row collapse bfp-prev-posts swe-margin-bottom-3" id="container">
        <div id="parent">
            <?php $the_query = new WP_Query( 'posts_per_page=16' ); ?>

            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

                <div class="contentBlock">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail();?>
                        <div class="block-hover">
                            <div class="row">
                                <div class="large-4 columns text-right swe-margin-top-1">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <div class="large-8 columns text-justify">
                                    <p><?php the_excerpt();?></p>
                                    <a class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            <span id="panLeft" class="panner" data-scroll-modifier='-1'><</span>

            <span id="panRight" class="panner" data-scroll-modifier='1'>></span>
        </div>
    </div>

<?php while ( have_posts() ) : the_post();
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
    ?>

    <div class="row swe-margin-top-5">
        <div class="large-6 large-centered medium-9 small-11 small-centered columns">
            <?php the_post_thumbnail();?>
            <div class="row swe-margin-top-2">
                <div class="large-3 medium-3 columns" data-equalizer-watch>
                    <div class="row text-right">
                        <h1><?php the_title();?></h1>
                        <div class="spg-date">
                            <?php the_date();?>
                        </div>
                    </div>
                </div>
                <div class="large-8 medium-8 columns spg-content" data-equalizer-watch>
                    <?php the_content();?>
                </div>

            </div>
        </div>
    </div>

<?php endwhile;
get_footer();?>