<?php
// check if the repeater field has rows of data
if( have_rows('second_week_menu') ):?>

            <div class="row collapse">
                <div class="swe-margin-top-2 swe-margin-bottom-2">
                    <?php the_field('second_week_description');?>
                </div>
                <div class="large-12 columns">
                    <?php // loop through the rows of data
                    while ( have_rows('second_week_menu') ) : the_row();?>
                    <div class="swe-border-black"></div>
                        <div class="row collapse">
                            <div class="large-11 large-offset-1 columns">
                                <div class="row menu-listing">
                                    <div class="large-2 medium-3 columns menu-item-title">
                                        <h1><?php the_sub_field('second_week_section_title'); ?></h1>
                                    </div>
                                    <div class="large-10 medium-6 columns">
                                        <?php // loop through the rows of data
                                        while ( have_rows('second_week_item') ) : the_row();?>
                                            <div class="row menu-item-row">
                                                <div class="large-12 columns menu-pg-item">
                                                    <h3><?php the_sub_field('second_week_item_title');?></h3>
                                                    <p><?php the_sub_field('second_week_item_description');?></p>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>

        <div class="swe-border-black"></div>

    <?php
endif;
?>