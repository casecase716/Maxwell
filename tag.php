<?php get_header(); ?>
    <div class="row">
        <div class="large-12 columns">
            <?php $args = array(
                'numberposts' => 10,
                'offset' => 0,
                'category' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
                'suppress_filters' => true );
            $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
            ?>
            <h2><?php single_tag_title(); ?></h2>
            <ul>
                <?php
                foreach( $recent_posts as $recent ){
                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                    echo '</br>'. the_excerpt();
                }
                ?>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>