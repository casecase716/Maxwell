<a class="catering_menu swe-margin-bottom-2" target="_blank" href="<?php the_field('catering_menu','options');?>">Full Catering Menu</a>
<hr>
<a class="catering_menu swe-margin-bottom-2" href="/our-sandwiches/">Sandwich Menu</a>
<hr>
<a class="catering_menu swe-margin-bottom-2" href="/weekly-hot-menu">Weekly Hot Menu</a>
<hr>

<?php
// Use wp_list_pages to display parent and all child pages all generations (a tree with parent).
$parent = 52;
$args   = array( 'child_of' => $parent );
$pages  = get_pages( $args );

if ( $pages ) {
    $pageids = array();
    foreach ( $pages as $page ) {
        $pageids[] = $page->ID;
    }

    $args = array(
        'include'  =>  $parent . ',' . implode( ",", $pageids ),
        'title_li' => '',
        'exclude'      => '52',
    );
    wp_list_pages( $args );
}
?>
