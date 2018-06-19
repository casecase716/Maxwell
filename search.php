<?php
/*
Template Name: Search Page
*/
?>
    <?php get_header(); ?>

    <div class="row">
        <div class="large-12 columns">

            <?php if ( have_posts() ) : ?>
                <div class="row">
                    <div class="large-12 columns">
                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s'), get_search_query()); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'content', 'search' );
                            ?>

                        <?php endwhile; ?>

                        <?php inkberries_paging_nav(); ?>
                    </div>
                </div>
            <?php else : ?>

                <?php get_template_part( 'content', 'listing' ); ?>

            <?php endif; ?>

        </div>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>