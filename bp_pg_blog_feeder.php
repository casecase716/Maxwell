<?php
/**
 * Template Name: Blog Feeder
 * Created by: inkberries
 * Version: 2.0
 */
get_header();
while ( have_posts() ) : the_post();?>


    <div class="row collapse">
        <div class="large-9 large-centered columns">
            <div class="row text-center firstWord">
                <?php the_title();?>
            </div>


            <div class="row">

                <?php
                $args = array('posts_per_page' => 6,);
                $counter = 0; //count rows

                $post_query = new WP_Query($args);
                    if($post_query->have_posts() ) {
                        while ($post_query->have_posts()) {
                        $post_query->the_post();
                ?>


                <?php if ($counter == 0 ) { ?>

                    <div class="large-12 columns swe-margin-top-1">
                        <div class="row swe-margin-top-2 collapse">
                            <div class="large-8 large-push-4 medium-8 medium-push-4 columns">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="large-4 large-pull-8 medium-4 medium-pull-8 columns text-right featured-post-content">
                                <a href="<?php the_permalink();?>">
                                    <h1><?php the_title();?></h1>
                                    <?php the_excerpt();?>
                                </a>
                                <a class="fdr-read-more" href="<?php the_permalink();?>">Read More</a>
                            </div>
                        </div>
                    </div>

                <?php } else { ?>

                    <div class="large-6 medium-6 columns fdr swe-margin-top-1">
                        <div class="row collapse">
                            <?php the_post_thumbnail();?>
                            <a href="<?php the_permalink();?>">
                                <div class="row collapse fdr-hover">
                                    <div class="large-11 large-centered columns">
                                        <div class="row swe-margin-top-1">
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

                <?php }
                $counter++;;
                 };
                };
                ?>

            </div>


        </div>
    </div>


<?php endwhile;
get_footer();?>
